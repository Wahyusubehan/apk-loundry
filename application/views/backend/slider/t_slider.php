<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>
        <div class="card shadow mb-4">
            <div class="card-body">
                <form method="post" action="<?= base_url() ?>slider/simpan" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" name="judul_slider" class="form-control" placeholder="Input Judul Slider" required>
                    </div>

                    <div class="form-group">
                         <textarea name="deskripsi_slider" class="form-control" cols="30" rows="6" placeholder="Input Deskripsi Slider" required></textarea>
                    </div>

                    <div class="form-group">
                        <input type="file" name="gambar_slider" class="form-control" placeholder="Input Gambar Slider" required>
                    </div>

                     <div class="form-group">
                       <select name="status_slider" class="form-control" required>
                           <option value="">= Pilih Status =</option>
                           <option value="Aktif">Aktif</option>
                           <option value="Tidak Aktif">Tidak Aktif</option>
                       </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"> simpan </button>
                        <a href="<?= base_url() ?>paket" class="btn btn-danger"> Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>