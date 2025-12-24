<?php
date_default_timezone_set('Asia/Jakarta');
$tgl_masuk = date('Y-m-d H:i:s');
?>

<?php if ($this->session->flashdata('info')) : ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= $this->session->flashdata('info'); ?>
    <button type="button" class="close" data-dismiss="alert">&times;</button>
</div>
<?php endif; ?>

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>

    <div class="card shadow mb-4">
        <div class="card-body">

            <form method="post" action="<?= base_url('transaksi/simpan') ?>">

                <!-- KODE TRANSAKSI -->
                <div class="form-group">
                    <label>Kode Transaksi</label>
                    <input type="text" name="kode_transaksi"
                        value="<?= 'TR'.date('Ymd').$kode_transaksi; ?>"
                        class="form-control" readonly>
                </div>

                <!-- KONSUMEN -->
                <div class="form-group">
                    <label>Konsumen</label>
                    <select name="kode_konsumen" class="form-control" required>
                        <option value="">-- Pilih Konsumen --</option>
                        <?php foreach ($konsumen as $k): ?>
                            <option value="<?= $k->kode_konsumen ?>">
                                <?= $k->nama_konsumen ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- PAKET -->
                <div class="form-group">
                    <label>Paket</label>
                    <select name="kode_paket" id="paket" class="form-control" required>
                        <option value="">-- Pilih Paket --</option>
                        <?php foreach ($paket as $p): ?>
                            <option value="<?= $p->kode_paket ?>">
                                <?= $p->nama_paket ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- HARGA -->
                <div class="form-group">
                    <label>Harga Paket</label>
                    <input type="text" id="harga" class="form-control" readonly>
                </div>

                <!-- BERAT -->
                <div class="form-group">
                    <label>Berat (Kg)</label>
                    <input type="number" name="berat" id="berat"
                        class="form-control" required>
                </div>

                <!-- TOTAL -->
                <div class="form-group">
                    <label>Grand Total</label>
                    <input type="number" name="grand_total" id="grand_total"
                        class="form-control" readonly>
                </div>

                <!-- TANGGAL -->
                <div class="form-group">
                    <label>Tanggal Masuk</label>
                    <input type="text" name="tgl_masuk"
                        value="<?= $tgl_masuk ?>"
                        class="form-control" readonly>
                </div>

                <!-- STATUS BAYAR -->
                <div class="form-group">
                    <label>Status Bayar</label>
                    <select name="bayar" class="form-control" required>
                        <option value="">-- Pilih Status --</option>
                        <option value="Lunas">Lunas</option>
                        <option value="Belum Lunas">Belum Lunas</option>
                    </select>
                </div>

                <!-- STATUS -->
                <input type="hidden" name="status" value="Baru">

                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>
                <a href="<?= base_url('transaksi') ?>" class="btn btn-danger">
                    Batal
                </a>

            </form>
        </div>
    </div>
</div>

<!-- JQUERY -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
$('#paket').change(function(){
    let kode_paket = $(this).val();

    $.ajax({
        url: '<?= base_url('transaksi/getHargaPaket') ?>',
        type: 'POST',
        dataType: 'JSON',
        data: {kode_paket: kode_paket},
        success: function(res){
            $('#harga').val(res.harga_paket);
        }
    });
});

$('#berat').keyup(function(){
    let berat = $(this).val();
    let harga = $('#harga').val();
    $('#grand_total').val(berat * harga);
});
</script>
