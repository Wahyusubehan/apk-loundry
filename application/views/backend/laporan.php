<!DOCTYPE html>
<html>
<head>
    <title>Laporan Transaksi</title>
</head>
<body>

<h2>LAPORAN TRANSAKSI</h2>

<form action="<?= base_url('laporan/cek') ?>" method="POST">
    <label>Tanggal Mulai :</label>
    <input type="date" name="tgl_awal" required>

    <label>Tanggal Akhir :</label>
    <input type="date" name="tgl_akhir" required>

    <button type="submit">Tampilkan</button>
</form>

<hr>

<?php if (!empty($laporan)) : ?>
    <h3>Hasil Laporan</h3>
    <table border="1" cellpadding="8">
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama</th>
            <th>Jumlah</th>
        </tr>

        <?php
        $no = 1;
        foreach ($laporan as $row): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $row->tanggal ?></td>
            <td><?= $row->nama ?></td>
            <td><?= $row->jumlah ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>

<br>
<a href="<?= base_url('auth/logout') ?>">Logout</a>

</body>
</html>
