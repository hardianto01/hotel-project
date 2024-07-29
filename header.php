<?php require 'helper.php' ?>
<?php $pengaturan = getWhere("SELECT * FROM pengaturan WHERE id_pengaturan = 1 "); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $pengaturan['appname']; ?></title>
    <meta content="<?= $pengaturan['description']; ?>" name="description">
    <meta content="<?= $pengaturan['keyword']; ?>" name="keywords">
    <meta content="<?= $pengaturan['author']; ?>" name="author">

    <!-- Favicons -->
    <link href="<?= $base_url; ?>assets/img/<?= $pengaturan['logo']; ?>" rel="icon">
    <link href="<?= $base_url; ?>assets/img/<?= $pengaturan['logo']; ?>" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- plugins CSS Files -->
    <link href="<?= $base_url; ?>front/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= $base_url; ?>front/plugins/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= $base_url; ?>front/plugins/aos/aos.css" rel="stylesheet">
    <link href="<?= $base_url; ?>front/plugins/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="<?= $base_url; ?>front/plugins/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= $base_url; ?>assets/plugins/boxicons/css/boxicons.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="<?= $base_url; ?>front/css/main.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Eterna
  * Template URL: https://bootstrapmade.com/eterna-free-multipurpose-bootstrap-template/
  * Updated: Jun 29 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

    <header id="header" class="header sticky-top">

        <div class="topbar d-flex align-items-center dark-background">
            <div class="container d-flex justify-content-center justify-content-md-between">
                <div class="contact-info d-flex align-items-center">
                </div>
                <div class="social-links d-none d-md-flex align-items-center">
                    <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
                    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
        </div><!-- End Top Bar -->

        <div class="branding">

            <div class="container position-relative d-flex align-items-center justify-content-between">
                <a href="<?= $base_url; ?>" class="logo d-flex align-items-center">
                    <img src="<?= $base_url; ?>assets/img/<?= $pengaturan['logo']; ?>" alt="">
                    <h1 class="sitename"><?= $pengaturan['appname']; ?><br></h1>
                </a>

                <nav id="navmenu" class="navmenu">
                    <ul>
                        <li><a href="<?= $base_url; ?>">Beranda</a></li>
                        <li class="dropdown"><a href="#"><span>Profil</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                            <ul>
                                <li><a href="<?= $base_url; ?>tentang.php">Tentang Kami</a></li>
                                <li><a href="<?= $base_url; ?>struktur.php">Struktur Perusahaan</a></li>
                            </ul>
                        </li>
                        <li><a href="<?= $base_url; ?>berita.php">Berita</a></li>
                        <li class="dropdown"><a href="#"><span>Galeri</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                            <ul>
                                <li><a href="<?= $base_url; ?>foto.php">Foto</a></li>
                                <li><a href="<?= $base_url; ?>video.php">Video</a></li>
                            </ul>
                        </li>
                        <li><a href="<?= $base_url; ?>kontak.php">Kontak</a></li>
                    </ul>
                    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                </nav>

            </div>

        </div>

    </header>

    <main class="main">