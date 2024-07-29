<?php require 'header.php' ?>

<div class="page-title mb-5" data-aos="fade">
    <div class="container py-5">
        <h1>STRUKTUR PERUSAHAAN</h1>
    </div>
</div>

<?php $profil = getWhere("SELECT * FROM profil WHERE id_profil = 1 "); ?>
<div class="container">
    <div class="card shadow p-3">
        <img src="<?= $base_url; ?>assets/img/<?= $profil['struktur'] ? $profil['struktur'] : 'noimage.jpg'; ?>" alt="struktur" class="rounded w-100 ">
    </div>
</div>

<?php require 'footer.php' ?>