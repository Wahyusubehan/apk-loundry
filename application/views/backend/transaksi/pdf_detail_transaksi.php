<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Detail Transaksi</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
        }
        h3 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        th, td {
            border: 1px solid #000;
            padding: 6px;
        }
        th {
            background-color: #f2f2f2;
            text-align: left;
            width: 35%;
        }
        .text-right {
            text-align: right;
        }
        .no-border td {
            border: none;
            padding: 3px;
        }
    </style>
</head>
<body>

<h3>DETAIL TRANSAKSI LAUNDRY</h3>

<table>
    <tr>
        <th>Kode Transaksi</th>
        <td><?= $transaksi->kode_transaksi ?></td>
    </tr>
    <tr>
        <th>Nama Konsumen</th>
        <td><?= $transaksi->nama_konsumen ?? '-' ?></td>
    </tr>
    <tr>
        <th>Paket</th>
        <td><?= $transaksi->nama_paket ?? '-' ?></td>
    </tr>
    <tr>
        <th>Tanggal Masuk</th>
        <td><?= date('d-m-Y', strtotime($transaksi->tgl_masuk)) ?></td>
    </tr>
    <tr>
        <th>Status</th>
        <td><?= $transaksi->status ?></td>
    </tr>
    <tr>
        <th>Status Pembayaran</th>
        <td><?= $transaksi->bayar ?></td>
    </tr>
    <?php if (!empty($transaksi->tgl_ambil)) : ?>
    <tr>
        <th>Tanggal Ambil</th>
        <td><?= date('d-m-Y H:i', strtotime($transaksi->tgl_ambil)) ?></td>
    </tr>
    <?php endif; ?>
</table>

<table>
    <tr>
        <th>Berat (Kg)</th>
        <td class="text-right"><?= number_format($transaksi->berat, 2) ?></td>
    </tr>
    <tr>
        <th>Total Bayar</th>
        <td class="text-right">
            Rp <?= number_format($transaksi->grand_total, 0, ',', '.') ?>
        </td>
    </tr>
</table>

<br>

<table class="no-border">
    <tr>
        <td width="60%"></td>
        <td width="40%" style="text-align:center;">
            <p>Petugas</p>
            <br><br>
            <p>( __________________ )</p>
        </td>
    </tr>
</table>

</body>
</html>
