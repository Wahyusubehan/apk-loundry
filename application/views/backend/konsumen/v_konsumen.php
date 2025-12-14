<div class="container-fluid">

    <!-- Judul & Tombol -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 text-gray-800"><?= $judul; ?></h1>
        <a href="<?= base_url('konsumen/tambah') ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Konsumen
        </a>
    </div>

    <!-- Card -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $judul; ?></h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr class="text-center">
                            <th width="5%">No.</th>
                            <th>Kode</th>
                            <th>Nama Konsumen</th>
                            <th>Alamat</th>
                            <th>No. Telepon</th>
                            <th width="15%">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- isi data -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
