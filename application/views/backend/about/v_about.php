<div class="container-fluid">

    <?php
        if (!empty($this->session->flashdata('info'))) {?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Selamat!</strong> <?= $this->session->flashdata('info')?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

        <?php }
    ?>

    <div class="row">
        <div class ="col-md-12">
             <a href="<?= base_url()?>about/tambah" class="btn btn-danger">Tambah About</a> <br><br>
        </div>
    </div>    
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $judul?></h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $judul?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            $no = 1;
                            foreach ($data as $row) {?>
                                <tr>
                                   <td><?= $no++;?></td>
                                   <td>
                                      <a href="<?= base_url()?>assets/images/about/<?= $row->gambar_about;?>" target="_blank">
                                        <img src="<?= base_url()?>assets/images/about/<?= $row->gambar_about;?>" alt="" width="70">
                                      </a>
                                   </td>
                                   <td><?= $row->judul_about; ?></td>
                                   <td><?= $row->deskripsi_about; ?></td>
                                   <td>
                                      <a href="<?= base_url()?>about/edit/<?= $row->id_about;?>" class="btn btn-success">Edit</a>
                                      <a href="<?= base_url()?>about/delete/<?= $row->id_about;?>" class="btn btn-danger" onclick="return confirm('Yakin Mau Menghapus ?');">Delete</a>
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
