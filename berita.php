<?php require 'header.php'; ?>

<div class="page-title" data-aos="fade">
    <div class="container py-5">
    <div class="card mb-3">

        <h1 class="p-2">BERITA</h1>

        <?php 
        // Fetch news articles from the database
        $berita = get("SELECT * FROM berita ORDER BY urutan ASC"); 
        ?>

        <?php if (!empty($berita)) : ?>
            <?php foreach ($berita as $row) : ?>
                    <div class="card-body p-5 border rounded mb-4">
                        <!-- Display the title of the news article -->
                        <h5 class="card-title fw-bold"><?= htmlspecialchars($row['judul'], ENT_QUOTES, 'UTF-8'); ?></h5>
                        <span class="text-muted pb-2"><?=$row['tanggal']?></span>
                        <div class="overflow-container">
                        <img  src="<?= htmlspecialchars($base_url . '/assets/uploads/berita/' . $row['gambar'], ENT_QUOTES, 'UTF-8'); ?>" class="img-fluid overflow-img pb-5" alt="<?= htmlspecialchars($row['judul'], ENT_QUOTES, 'UTF-8'); ?>">

                        </div>
                        <!-- Display the image of the news article -->

                        <!-- Display the description of the news article -->
                        <p class="card-text p-2"><?= nl2br(htmlspecialchars($row['deskripsi'], ENT_QUOTES, 'UTF-8')); ?></p>

                        <!-- Link to read more -->
                        <a class="btn bg-success text-white rounded" href="<?= htmlspecialchars($row['link'], ENT_QUOTES, 'UTF-8'); ?>">Lihat Selengkap Nya</a>
                    </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>No news articles available.</p>
        <?php endif; ?>

    </div>
    </div>

</div>

<?php require 'footer.php'; ?>
