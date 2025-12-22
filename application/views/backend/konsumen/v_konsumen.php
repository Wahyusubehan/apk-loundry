<div class="container-fluid">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <?php
        if (!empty($this->session->flashdata('info'))) {?>
           <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Selamat!</strong> <?=$this->session->flashdata('info')?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
        <?php }
    ?>

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
                        <?php 
                            $no = 1;
                            foreach ($data as $row) {?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row->kode_konsumen;?></td>
                                    <td><?= $row->nama_konsumen;?></td>
                                    <td><?= $row->alamat_konsumen;?></td>
                                    <td><?= $row->no_telp;?></td>
                                    <td>
                                        <a href="<?= base_url() ?>konsumen/edit/<?= $row->kode_konsumen?>" class="btn btn-success btn-sm"> Edit</a>
                                        <a href="<?= base_url() ?>konsumen/delete/<?= $row->kode_konsumen?>" class="btn btn-danger btn-sm"> Delete</a>
                                    </td>
                                </tr>                            
                            <?php }                        
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
