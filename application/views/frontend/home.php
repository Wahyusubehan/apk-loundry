<!-- ===================== SLIDER ===================== -->
<?php if (!empty($slider)) : ?>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

    <!-- Indicator -->
    <ol class="carousel-indicators">
        <?php $no = 0; foreach ($slider as $s) : ?>
            <li data-target="#carouselExampleIndicators"
                data-slide-to="<?= $no ?>"
                class="<?= $no == 0 ? 'active' : '' ?>"></li>
        <?php $no++; endforeach; ?>
    </ol>

    <!-- Isi Slider -->
    
    <!-- Tombol -->
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>
</div>
<?php endif; ?>
<!-- =================== END SLIDER =================== -->


<!-- =================== CONTENT =================== -->
<div class="container mt-5">

    <div class="row mb-4">
        <div class="col-md-8">
            <h5>Laundry Online</h5>
            <p>
                Laundry adalah kegiatan atau layanan untuk mencuci, mengeringkan,
                menyetrika, dan merawat pakaian atau tekstil agar bersih, rapi,
                dan siap digunakan kembali.
            </p>
        </div>
    </div>

    <!-- =================== PAKET =================== -->
    <div class="row mb-5">
        <div class="col-md-12">
            <h5>Jenis Paket</h5>

            <table class="table table-bordered">
                <thead>
                    <tr class="bg-primary text-white">
                        <th>No</th>
                        <th>Nama Paket</th>
                        <th>Harga Paket</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($paket)) : ?>
                        <?php $no = 1; foreach ($paket as $pkt) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $pkt->nama_paket ?></td>
                                <td>Rp <?= number_format($pkt->harga_paket, 0, ',', '.') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="3" class="text-center">Data paket belum tersedia</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

        </div>
    </div>

</div>
<!-- ================= END CONTENT ================= -->
