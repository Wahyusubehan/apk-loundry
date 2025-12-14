<!DOCTYPE html>
<html>
<head>
    <title>Laporan Transaksi</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
        .judul {
            text-align: center;
            margin-top: 30px;
        }
        .judul h2 {
            margin-bottom: 5px;
        }
        .judul p {
            font-size: 14px;
        }
        .filter {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<!-- FILTER -->
<div class="filter">
    <form method="get" action="">
        Tanggal Mulai :
        <input type="date" name="tgl_awal" required>

        Tanggal Akhir :
        <input type="date" name="tgl_akhir" required>

        <button type="submit">Tampilkan</button>
    </form>
</div>

<!-- JUDUL LAPORAN -->
<?php if (!empty($_GET['tgl_awal']) && !empty($_GET['tgl_akhir'])): ?>
<div class="judul">
    <h2>Laporan Transaksi</h2>
    <p>
        Dari Tanggal 
        <b><?= date('d F Y', strtotime($_GET['tgl_awal'])) ?></b>
        Sampai Tanggal 
        <b><?= date('d F Y', strtotime($_GET['tgl_akhir'])) ?></b>
    </p>
</div>
<?php endif; ?>

</body>
</html>
