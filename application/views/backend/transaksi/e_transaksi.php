<?php
date_default_timezone_set('Asia/Jakarta');
?>

<div class="container-fluid">

    <h1 class="h3 mb-3 text-gray-800"><?= $judul ?></h1>

    <div class="card shadow mb-4">
        <div class="card-body">

            <form action="<?= base_url('transaksi/update') ?>" method="post">

                <!-- KODE TRANSAKSI -->
                <div class="form-group">
                    <label>Kode Transaksi</label>
                    <input type="text" name="kode_transaksi"
                           value="<?= $transaksi->kode_transaksi ?>"
                           class="form-control" readonly>
                </div>

                <!-- KONSUMEN -->
                <div class="form-group">
                    <label>Konsumen</label>
                    <select name="kode_konsumen" class="form-control" required>
                        <?php foreach($konsumen as $k): ?>
                            <option value="<?= $k->kode_konsumen ?>"
                                <?= $k->kode_konsumen == $transaksi->kode_konsumen ? 'selected' : '' ?>>
                                <?= $k->nama_konsumen ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- PAKET -->
                <div class="form-group">
                    <label>Paket</label>
                    <select name="kode_paket" id="paket" class="form-control" required>
                        <?php foreach($paket as $p): ?>
                            <option value="<?= $p->kode_paket ?>"
                                <?= $p->kode_paket == $transaksi->kode_paket ? 'selected' : '' ?>>
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
                           value="<?= $transaksi->berat ?>"
                           class="form-control" required>
                </div>

                <!-- GRAND TOTAL -->
                <div class="form-group">
                    <label>Grand Total</label>
                    <input type="number" name="grand_total" id="grand_total"
                           value="<?= $transaksi->grand_total ?>"
                           class="form-control" readonly>
                </div>

                <!-- TANGGAL MASUK -->
                <div class="form-group">
                    <label>Tanggal Masuk</label>
                    <input type="text"
                           value="<?= date('d-m-Y H:i', strtotime($transaksi->tgl_masuk)) ?>"
                           class="form-control" readonly>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update
                </button>

                <a href="<?= base_url('transaksi/riwayat') ?>" class="btn btn-danger">
                    Batal
                </a>

            </form>

        </div>
    </div>
</div>

<!-- JQUERY -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
function hitungTotal(){
    let berat = $('#berat').val();
    let harga = $('#harga').val();
    $('#grand_total').val(berat * harga);
}

$('#paket').change(function(){
    let kode_paket = $(this).val();

    $.ajax({
        url: '<?= base_url('transaksi/getHargaPaket') ?>',
        type: 'POST',
        dataType: 'JSON',
        data: {kode_paket: kode_paket},
        success: function(res){
            $('#harga').val(res.harga_paket);
            hitungTotal();
        }
    });
});

$('#berat').keyup(function(){
    hitungTotal();
});

// load harga awal
$(document).ready(function(){
    $('#paket').trigger('change');
});
</script>
