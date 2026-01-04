<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Transaksi</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
        }
        .wrapper {
            width: 100%;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 6px;
        }
        th {
            background-color: #eee;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="wrapper">

    <div>
        <h3 style="text-align:center;">LAPORAN TRANSAKSI</h3>
    </div>

    <div>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Transaksi</th>
                    <th>Tanggal</th>
                    <th>Grand Total</th>
                </tr>
            </thead>
            <tbody>
                    <?php $no = 1; foreach ($laporan as $row) : ?>
						<tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row->kode_transaksi; ?></td>
                        <td><?= $row->tgl_masuk; ?></td>
                        <td><?= $row->grand_total; ?></td>
                    </tr>
                    <?php endforeach; ?>
                
            </tbody>
        </table>
    </div>

</div>

</body>
</html>
