<?php require 'header.php'; ?>

<div class="page-title" data-aos="fade">
    <div class="container py-5">
        <div class="card mb-3">
            <h1 class="p-2">Gallery</h1>

            <?php 
            // Fetch gallery items from the database
            $galery = get("SELECT * FROM galery ORDER BY urutan ASC");

            // Define the video extensions
            $video_extensions = ['jpeg', 'webp', 'jpg', 'png'];

            // Filter the gallery items to only include images
            $images = array_filter($galery, function($item) use ($video_extensions) {
                $file_extension = pathinfo($item['file'], PATHINFO_EXTENSION);
                return in_array($file_extension, $video_extensions);
            });

            // Check if there are any images
            if (count($images) > 0) {
                echo '<div class="row">';
                foreach ($images as $img) {
                    $file_path = "assets/uploads/galery/" . $img['file'];
                    echo '
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <img src="' . $file_path . '" controls class="card-img-top"></img>
                            </div>
                        </div>
                    ';
                }
                echo '</div>';
            } else {
                echo '<p>No images found in the gallery.</p>';
            }
            ?>

        </div>
    </div>
</div>

<?php require 'footer.php'; ?>
