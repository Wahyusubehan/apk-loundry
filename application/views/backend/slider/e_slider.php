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
                <form method="post" action="<?= base_url() ?>slider/Update" enctype="multipart/form-data">
                   
				<div class="form-group" hidden>
                        <input type="text" name="id_slider" value="<?= $slider['id_slider'] ?>" class="form-control" placeholder="Input Judul Slider" required>
                    </div>
				
				<div class="form-group">
                        <input type="text" name="judul_slider" value="<?= $slider['judul_slider'];?>" class="form-control" placeholder="Input Judul Slider">
                    </div>

                    <div class="form-group">
                         <textarea name="deskripsi_slider" class="form-control" cols="30" rows="6" placeholder="Input Deskripsi Slider" > <?= $slider['deskripsi_slider'];?> </textarea>
                    </div>

                    <div class="form-group">
                        <input type="file" name="gambar_slider" class="form-control" placeholder="Input Gambar Slider">
                    <img src="<?= base_url()?>assets/images/slider/<?= $slider['gambar_slider'];?>" alt="" width="200"><br>
				<small class="text-danger">Format gambar (jpg | png) ukuran gambar 1440 pixel X 500 pixel</small>	
				</div>

                     <div class="form-group">
                       <select name="status_slider" class="form-control">
					<?php
					if($slider['status_slider'] == "Aktif"){?>
						<option value="Aktif" selected> Aktif</option>
						<option value="Tidak Aktif"> Tidak Aktif</option>
						<?php }else{?>
						<option value="Aktif" > Aktif</option>
						<option value="Tidak Aktif" selected>"Tidak Aktif</option>
						<?php }
                          ?>
                    
                       </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"> Update </button>
                        <a href="<?= base_url() ?>paket" class="btn btn-danger"> Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
