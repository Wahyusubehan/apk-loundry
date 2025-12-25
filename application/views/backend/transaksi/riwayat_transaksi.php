<div class="container-fluid">
<h1 class="h3 mb-2 text-gray-800"><?= $judul ?></h1>

<div class="card shadow mb-4">
<div class="card-body">
<div class="table-responsive">

<table class="table table-bordered" id="dataTable">
<thead>
<tr>
    <th>No</th>
    <th>Tanggal Masuk</th>
    <th>Kode</th>
    <th>Konsumen</th>
    <th>Paket</th>
    <th>Berat</th>
    <th>Total</th>
    <th>Tgl Ambil</th>
    <th>Status Bayar</th>
    <th>Status</th>
    <th>Opsi</th>
</tr>
</thead>

<tbody>
<?php $no=1; foreach($data as $row): ?>
<tr>
<td><?= $no++ ?></td>
<td><?= $row->tgl_masuk ?></td>
<td><?= $row->kode_transaksi ?></td>
<td><?= $row->nama_konsumen ?></td>
<td><?= $row->nama_paket ?></td>
<td><?= $row->berat ?> Kg</td>
<td>Rp <?= number_format($row->grand_total,0,',','.') ?></td>
<td><?= $row->tgl_ambil ?></td>
<td><?= $row->bayar ?></td>

<td>
<?php if($row->status != 'Selesai'): ?>
<select class="badge badge-info status" data-kode="<?= $row->kode_transaksi ?>">
    <option value="Baru" <?= $row->status=='Baru'?'selected':'' ?>>Baru</option>
    <option value="Proses" <?= $row->status=='Proses'?'selected':'' ?>>Proses</option>
    <option value="Selesai">Selesai</option>
</select>
<?php else: ?>
<span class="badge badge-success">Selesai</span>
<?php endif; ?>
</td>

<td>
<a href="#" class="btn btn-warning btn-sm">Detail</a>
</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>

</div>
</div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
$('.status').change(function(){
    let status = $(this).val();
    let kode   = $(this).data('kode');

    $.post("<?= base_url('transaksi/update_status') ?>", {
        kt: kode,
        stt: status
    }, function(){
        location.reload();
    });
});
</script>
