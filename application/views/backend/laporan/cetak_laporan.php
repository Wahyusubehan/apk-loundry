<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Transaksi</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 11px;
        }

        h2 {
            text-align: center;
            margin-bottom: 5px;
        }

        .periode {
            text-align: center;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            border: 1px solid #000;
            padding: 6px 5px;
            text-align: center;
            vertical-align: middle;
        }

        table th {
            font-weight: bold;
            background-color: #f2f2f2;
        }

        .text-left {
            text-align: left;
        }

        .text-right {
            text-align: right;
        }
    </style>
</head>
<body>

<h2>Laporan Transaksi</h2>

<div class="periode">
    Dari Tanggal
    <?= date('d-m-Y', strtotime($this->session->userdata('tanggal_mulai'))); ?>
    sampai tanggal
    <?= date('d-m-Y', strtotime($this->session->userdata('tanggal_ahir'))); ?>
</div>


<table>
    <thead>
        <tr>
            <th width="15%">Tanggal Masuk</th>
            <th width="15%">Kode Transaksi</th>
            <th width="15%">Konsumen</th>
            <th width="15%">Paket</th>
            <th width="10%">Berat (KG)</th>
            <th width="15%">Grand Total</th>
            <th width="15%">Status</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($laporan)) : ?>
            <?php foreach ($laporan as $row) : ?>
                <tr>
                    <td><?= date_indo($row->tgl_masuk); ?></td>
                    <td><?= $row->kode_transaksi; ?></td>
                    <td class="text-left"><?= $row->nama_konsumen; ?></td>
                    <td><?= $row->nama_paket; ?></td>
                    <td><?= $row->berat; ?></td>
                    <td class="text-right">Rp <?= number_format($row->grand_total, 0, ',', '.'); ?></td>
                    <td><?= $row->status; ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="7">Data tidak ditemukan</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>
