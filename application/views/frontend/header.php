<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <!-- CSS Lokal -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <title>Laundry Online</title>
</head>

<body>

<!-- ================= NAVBAR ================= -->
<nav class="navbar navbar-expand-lg navbar-dark bg-navbar">
    <a class="navbar-brand" href="<?= base_url() ?>">
        <img src="<?= base_url('assets/images/logo.png') ?>" height="40">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url() ?>">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('cek_londri') ?>">Cek Laundry</a>
            </li>
        </ul>
    </div>
</nav>
<!-- ================= END NAVBAR ================= -->


<!-- ================= SLIDER ================= -->
<?php if (!empty($slider)) : ?>
<div id="carouselSlider" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->
    <ol class="carousel-indicators">
        <?php foreach ($slider as $key => $s) : ?>
            <li data-target="#carouselSlider"
                data-slide-to="<?= $key ?>"
                class="<?= $key == 0 ? 'active' : '' ?>">
            </li>
        <?php endforeach; ?>
    </ol>

    <!-- Slides -->
    <div class="carousel-inner">
        <?php foreach ($slider as $key => $s) : ?>
            <div class="carousel-item <?= $key == 0 ? 'active' : '' ?>">
                <img
                    src="<?= base_url('assets/images/slider/'.$s->gambar_slider) ?>"
                    class="d-block w-100 image-slider"
                    style="height:450px; object-fit:cover;"
                    alt="Slider <?= $key ?>"
                >

                <div class="carousel-caption d-none d-md-block bg-caption">
                    <h5><?= $s->judul_slider ?></h5>
                    <p><?= $s->deskripsi_slider ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Controls -->
    <a class="carousel-control-prev btn-slider" href="#carouselSlider" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next btn-slider" href="#carouselSlider" role="button" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>

</div>
<?php endif; ?>
<!-- ================= END SLIDER ================= -->
