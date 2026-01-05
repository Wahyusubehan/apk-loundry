<?php
// pengaman kalau data kosong
if (!isset($slider)) {
    $slider = [];
}
if (!isset($paket)) {
    $paket = [];
}
?>

<!-- ================= SLIDER ================= -->
<?php if (!empty($slider)) : ?>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

    <!-- Indicator -->
    <ol class="carousel-indicators">
        <?php $no = 0; foreach ($slider as $s) : ?>
            <li data-target="#carouselExampleIndicators"
                data-slide-to="<?= $no ?>"
                class="<?= $no == 0 ? 'active' : '' ?>">
            </li>
        <?php $no++; endforeach; ?>
    </ol>

    <!-- Isi Slider -->
    <div class="carousel-inner">
        <?php $no = 0; foreach ($slider as $s) : ?>
            <div class="carousel-item <?= $no == 0 ? 'active' : '' ?>">
                <img
                    src="<?= base_url('assets/images/slider/'.$s->gambar_slider) ?>"
                    class="d-block w-100"
                    style="height:450px; object-fit:cover;"
                    alt="Slider <?= $no ?>"
                >

                <div class="carousel-caption d-none d-md-block bg-dark p-3 rounded">
                    <h5><?= $s->judul_slider ?></h5>
                    <p><?= $s->deskripsi_slider ?></p>
                </div>
            </div>
        <?php $no++; endforeach; ?>
    </div>

    <!-- Tombol -->
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>

</div>
<?php endif; ?>
<!-- ================= END SLIDER ================= -->


<!-- ================= CONTENT ================= -->
<div class="container">

    <!-- Profil -->
    <div class="row my-5" data-aos="fade-up" data-aos-duration="1000">
        <div class="col-md-4">
            <img class="set-image img-fluid"
                 src="<?= base_url('assets/images/gambar.jpg') ?>">
        </div>

        <div class="col-md-8">
            <h5>Laundry Online</h5>
            <p>
                Laundry merupakan layanan pencucian pakaian secara online
                yang memudahkan pelanggan tanpa harus datang langsung.
            </p>
        </div>
    </div>

    <!-- Jenis Paket -->
    <div class="row mb-5" data-aos="fade-up" data-aos-duration="1000">
        <div class="col-md-12">
            <h5>Jenis Paket</h5>

            <table class="table table-bordered">
                <thead>
                    <tr class="th-warna">
                        <th>No</th>
                        <th>Nama Paket</th>
                        <th>Harga Paket</th>
                    </tr>
                </thead>
                <tbody>

                <?php if (!empty($paket)) : ?>
                    <?php $no = 1; foreach ($paket as $pkt) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $pkt->nama_paket; ?></td>
                            <td>Rp <?= number_format($pkt->harga_paket, 0, '.', '.'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="3" class="text-center">
                            Data paket belum tersedia
                        </td>
                    </tr>
                <?php endif; ?>

                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- ================= END CONTENT ================= -->
