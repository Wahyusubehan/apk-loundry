<?php
date_default_timezone_set('Asia/Yogyakarta');
$tgl_masuk = date('Y-m-d H:i:s');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Transaksi</title>
</head>

<body>
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>

        <div class="card shadow mb-4">
            <div class="card-body">

                <!-- PERBAIKAN: action ke Transaksi/simpan -->
                <form method="post" action="<?= base_url() ?>Transaksi/simpan">

                    <div class="form-group">
                        <input type="text" 
                               name="kode_transaksi" 
                               value="<?= "TR".date('Ymd'). $kode_transaksi ?>" 
                               class="form-control" 
                               readonly>
                    </div>

                    <div class="form-group">
                        <select name="kode_konsumen" class="form-control" required>
                            <option value="" selected> - Pilih Konsumen - </option>
                            <?php foreach ($konsumen as $row) { ?>
                                <option value="<?= $row->kode_konsumen ?>">
                                    <?= $row->nama_konsumen ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <select name="kode_paket" id="paket" class="form-control" required>
                            <option value="" selected> - Pilih Paket - </option>
                            <?php foreach ($paket as $row) { ?>
                                <option value="<?= $row->kode_paket ?>">
                                    <?= $row->nama_paket ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <!-- PERBAIKAN: TAMBAH name="harga_paket" -->
                    <div class="form-group">
                        <input type="text" name="harga_paket" id="harga" class="form-control" placeholder="Harga Paket" readonly>
                    </div>

                    <!-- PERBAIKAN: 'nama' -> 'name' -->
                    <div class="form-group">
                        <input type="number" name="berat" id="berat" class="form-control" placeholder="Berat (KG)" required>
                    </div>

                    <!-- PERBAIKAN: TAMBAH name="grand_total" -->
                    <div class="form-group">
                        <input type="number" name="grand_total" id="grand_total" class="form-control" placeholder="Grand Total" readonly>
                    </div>

                    <!-- PERBAIKAN: 'nama' -> 'name' -->
                    <div class="form-group" hidden>
                        <input type="text" name="tgl_masuk" value="<?= $tgl_masuk; ?>" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <select name="bayar" class="form-control" required>
                            <option value="">- Pilih Status Bayar -</option>
                            <option value="Lunas">Lunas</option>
                            <option value="Belum Lunas">Belum Lunas</option>
                        </select>
                    </div>

                    <!-- PERBAIKAN: 'nama' -> 'name' -->
                    <div class="form-group" hidden>
                        <input type="text" name="status" value="Baru" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <!-- PERBAIKAN: botton -> button -->
                        <button type="submit" class="btn btn-primary">Simpan</button>

                        <!-- PERBAIKAN: arahkan ke Transaksi -->
                        <a href="<?= base_url() ?>transaksi" class="btn btn-danger">Batal</a>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</body>
</html>

<script>
    $('#paket').change(function(){
        var kode_paket = $(this).val();

        $.ajax({
            url : '<?= base_url()?>transaksi/getHargaPaket',
            method : 'post',
            data : {kode_paket : kode_paket},
            dataType : 'JSON',
            success : function(hasil){
                $('#harga').val(hasil.harga_paket);
            }
        });
    });

    $('#berat').keyup(function(){
        var berat = $(this).val();
        var harga = $('#harga').val();
        $('#grand_total').val(berat * harga);
    });
</script>
