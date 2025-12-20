<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

    <div class="card shadow mb-4">
        <div class="card-body">

            <form method="post" action="<?= base_url('konsumen/simpan'); ?>">

                <div class="form-group">
                    <input type="text"
                           name="kode_konsumen"
                           value="<?= $kode_konsumen; ?>"
                           class="form-control"
                           readonly>
                </div>

                <div class="form-group">
                    <input type="text"
                           name="nama_konsumen"
                           class="form-control"
                           placeholder="Input Nama Konsumen" required>
                </div>

                <div class="form-group">
                    <textarea name="alamat_konsumen"
                              class="form-control"
                              placeholder="Input Alamat" required></textarea>
                </div>

                <div class="form-group">
                    <input type="text"
                           name="no_telp"
                           class="form-control"
                           placeholder="Input No. Telepon" required>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('konsumen'); ?>" class="btn btn-danger">Batal</a>

            </form>

        </div>
    </div>
</div>
