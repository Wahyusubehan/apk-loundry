<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Transaksi</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 15px;
        }

        /* ===== KOP ===== */
        .kop {
            margin-bottom: 10px;
        }

        .kop h3 {
            margin: 0;
        }

        .kop p {
            margin: 2px 0;
        }

        .garis {
            border-top: 1px solid #000;
            margin: 5px 0 15px;
        }

        /* ===== JUDUL ===== */
        h2 {
            text-align: center;
            margin-bottom: 5px;
        }

        .periode {
            text-align: center;
            margin-bottom: 15px;
        }

        /* ===== TABEL ===== */
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

        /* ===== REKAP ===== */
        .rekap {
            margin-top: 15px;
            width: 40%;
        }

        .rekap td {
            padding: 4px;
        }

        /* ===== TANDA TANGAN ===== */
        .ttd {
            margin-top: 40px;
            width: 100%;
            text-align: right;
        }

        .ttd .nama {
            margin-top: 60px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<!-- ===== KOP ===== -->
<div class="kop">
    <h3>Laundry Online</h3>
    <p>
        WAZZFUN<br>
        Telpon : 0858 7453 8473<br>
        Email : LaundryOnline@gmail.com
    </p>
    <div class="garis"></div>
</div>

<!-- ===== JUDUL ===== -->
<h2>Laporan Transaksi</h2>

<div class="periode">
    Dari Tanggal
    <?= date('d-m-Y', strtotime($this->session->userdata('tanggal_mulai'))); ?>
    sampai tanggal
    <?= date('d-m-Y', strtotime($this->session->userdata('tanggal_akhir'))); ?>
</div>

<!-- ===== TABEL ===== -->
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
        <?php
        $total_berat = 0;
        $total_pendapatan = 0;
        $total_transaksi = 0;
        ?>

        <?php if (!empty($laporan)) : ?>
            <?php foreach ($laporan as $row) : ?>
                <?php
                $total_berat += $row->berat;
                $total_pendapatan += $row->grand_total;
                $total_transaksi++;
                ?>
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

<!-- ===== REKAP TOTAL ===== -->
<table class="rekap">
    <tr>
        <td>Total Transaksi</td>
        <td>: <?= $total_transaksi; ?></td>
    </tr>
    <tr>
        <td>Total Berat</td>
        <td>: <?= $total_berat; ?> KG</td>
    </tr>
    <tr>
        <td>Total Pendapatan</td>
        <td>: Rp <?= number_format($total_pendapatan, 0, ',', '.'); ?></td>
    </tr>
</table>

<!-- ===== TANDA TANGAN ===== -->
<div class="ttd">
    <p>
        Wazzfun, <?= date('d F Y'); ?><br>
        Wahyu Subehan,<br>
        Admin Laundry
    </p>

    <div class="nama">
        ( ____________________ )
    </div>
</div>

</body>
</html>
