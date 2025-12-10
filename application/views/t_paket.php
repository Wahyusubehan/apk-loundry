<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul; ?></title>
</head>

<body>
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>

        <div class="card shadow mb-4">
            <div class="card-body">

                <form method="post" action="<?= base_url('paket/simpan') ?>">

                    <!-- KODE PAKET -->
                    <div class="form-group mb-3">
                        <input type="text" 
                               name="kode_paket" 
                               value="<?= $kode_paket; ?>" 
                               class="form-control" 
                               readonly>
                    </div>

                    <!-- NAMA PAKET -->
                    <div class="form-group mb-3">
                        <input type="text" 
                               name="nama_paket" 
                               class="form-control" 
                               placeholder="Input Nama Paket" 
                               required>
                    </div>

                    <!-- HARGA PAKET -->
                    <div class="form-group mb-3">
                        <input type="number" 
                               name="harga_paket" 
                               class="form-control" 
                               placeholder="Input Harga Paket" 
                               required>
                    </div>

                    <!-- BUTTON -->
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?= base_url('paket') ?>" class="btn btn-danger">Batal</a>
                    </div>

                </form>

            </div>
        </div>

    </div>
</body>
</html>
