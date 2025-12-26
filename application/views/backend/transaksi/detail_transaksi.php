<div class="card">
    <div class="card-body">
        <h4>Detail Transaksi</h4>

        <table class="table table-bordered">
            <tr>
                <th>Kode Transaksi</th>
                <td><?= $transaksi->kode_transaksi ?></td>
            </tr>
            <tr>
                <th>Kode Konsumen</th>
                <td><?= $transaksi->kode_konsumen ?></td>
            </tr>
            <tr>
                <th>Kode Paket</th>
                <td><?= $transaksi->kode_paket ?></td>
            </tr>
            <tr>
                <th>Berat</th>
                <td><?= $transaksi->berat ?> Kg</td>
            </tr>
            <tr>
                <th>Total</th>
                <td>Rp <?= number_format($transaksi->grand_total) ?></td>
            </tr>
            <tr>
                <th>Status</th>
                <td><?= $transaksi->status ?></td>
            </tr>
            <tr>
                <th>Pembayaran</th>
                <td><?= $transaksi->bayar ?></td>
            </tr>
        </table>

        <a href="<?= base_url('transaksi/riwayat') ?>" class="btn btn-secondary">
            Kembali
        </a>
    </div>
</div>
