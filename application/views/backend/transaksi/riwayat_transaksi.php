<div class="container-fluid">

    <h1 class="h3 mb-3 text-gray-800"><?= $judul ?></h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Riwayat Transaksi</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered table-hover text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Tgl Masuk</th>
                            <th>Kode</th>
                            <th>Konsumen</th>
                            <th>Paket</th>
                            <th>Berat</th>
                            <th>Total</th>
                            <th>Tgl Ambil</th>
                            <th>Bayar</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php $no = 1; foreach($data as $row): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= date('d-m-Y', strtotime($row->tgl_masuk)) ?></td>
                            <td><strong><?= $row->kode_transaksi ?></strong></td>
                            <td><?= $row->nama_konsumen ?></td>
                            <td><?= $row->nama_paket ?></td>
                            <td><?= $row->berat ?> Kg</td>
                            <td class="text-right">
                                Rp <?= number_format($row->grand_total, 0, ',', '.') ?>
                            </td>
                            <td>
                                <?= $row->tgl_ambil ? date('d-m-Y', strtotime($row->tgl_ambil)) : '-' ?>
                            </td>

                            <!-- STATUS BAYAR -->
                            <td>
                                <?php if($row->bayar == 'Lunas'): ?>
                                    <span class="badge badge-success">Lunas</span>
                                <?php else: ?>
                                    <span class="badge badge-danger">Belum</span>
                                <?php endif; ?>
                            </td>

                            <!-- STATUS TRANSAKSI -->
                            <td>
                            <?php if($row->status != 'Selesai'): ?>
                                <select class="form-control form-control-sm status"
                                        data-kode="<?= $row->kode_transaksi ?>">
                                    <option value="Baru" <?= $row->status=='Baru'?'selected':'' ?>>Baru</option>
                                    <option value="Proses" <?= $row->status=='Proses'?'selected':'' ?>>Proses</option>
                                    <option value="Selesai">Selesai</option>
                                </select>
                            <?php else: ?>
                                <span class="badge badge-success">Selesai</span>
                            <?php endif; ?>
                            </td>

                            <!-- AKSI -->
                            <td>
                            <?php if($row->status != 'Selesai' && $row->bayar != 'Lunas'): ?>
                                <a href="<?= base_url('transaksi/edit/'.$row->kode_transaksi) ?>"
                                   class="btn btn-success btn-sm mb-1">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                            <?php endif; ?>

                                <a href="<?= base_url('transaksi/detail/'.$row->kode_transaksi) ?>"
                                   class="btn btn-warning btn-sm mb-1">
                                    <i class="fas fa-eye"></i> Detail
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>

                </table>

            </div>
        </div>
    </div>
</div>

<!-- JQUERY -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
$('.status').change(function(){
    let status = $(this).val();
    let kode   = $(this).data('kode');

    if(status === 'Selesai'){
        if(!confirm('Yakin transaksi ini sudah selesai dan dibayar?')){
            location.reload();
            return;
        }
    }

    $.post("<?= base_url('transaksi/update_status') ?>", {
        kt: kode,
        stt: status
    }, function(){
        location.reload();
    });
});
</script>

