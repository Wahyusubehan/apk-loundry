<?php
date_default_timezone_set('Asia/Yogyakarta');
$tgl_masuk = date('Y-m-d H:i:s');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Transaksi</title>
</head>

<body>

<?php if (!empty($this->session->flashdata('info'))) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Selamat!</strong> <?= $this->session->flashdata('info'); ?>
        <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    </div>
<?php endif; ?>

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post" action="<?= base_url('transaksi/simpan'); ?>">

                <div class="form-group">
                    <input type="text" name="kode_transaksi"
                           value="<?= 'TR' . date('Ymd') . $kode_transaksi ?>"
                           class="form-control" readonly>
                </div>

                <div class="form-group">
                    <select name="kode_konsumen" class="form-control" required>
                        <option value="">- Pilih Konsumen -</option>
                        <?php foreach ($konsumen as $row): ?>
                            <option value="<?= $row->kode_konsumen; ?>">
                                <?= $row->nama_konsumen; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <select name="kode_paket" id="paket" class="form-control" required>
                        <option value="">- Pilih Paket -</option>
                        <?php foreach ($paket as $row): ?>
                            <option value="<?= $row->kode_paket; ?>">
                                <?= $row->nama_paket; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <input type="text" id="harga" name="harga"
                           class="form-control" placeholder="Harga Paket" readonly>
                </div>

                <div class="form-group">
                    <input type="number" name="berat" id="berat"
                           class="form-control" placeholder="Berat (KG)" required>
                </div>

                <div class="form-group">
                    <input type="number" name="grand_total" id="grand_total"
                           class="form-control" placeholder="Grand Total" readonly>
                </div>

                <input type="hidden" name="tgl_masuk" value="<?= $tgl_masuk; ?>">
                <input type="hidden" name="status" value="Baru">

                <div class="form-group">
                    <select name="bayar" class="form-control" required>
                        <option value="">- Pilih Status Bayar -</option>
                        <option value="Lunas">Lunas</option>
                        <option value="Belum Lunas">Belum Lunas</option>
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= base_url('transaksi'); ?>" class="btn btn-danger">Batal</a>
                </div>

            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
$('#paket').change(function () {
    var kode_paket = $(this).val();

    $.ajax({
        url: '<?= base_url("transaksi/getHargaPaket"); ?>',
        method: 'POST',
        data: {kode_paket: kode_paket},
        dataType: 'JSON',
        success: function (hasil) {
            $('#harga').val(hasil.harga_paket);
            $('#grand_total').val('');
        }
    });
});

$('#berat').keyup(function () {
    var berat = $(this).val();
    var harga = $('#harga').val();
    $('#grand_total').val(berat * harga);
});
</script>

</body>
</html>
