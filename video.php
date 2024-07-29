<?php require 'header.php'; ?>

<div class="page-title" data-aos="fade">
    <div class="container py-5">
        <div class="card mb-3">
            <h1 class="p-2">Gallery</h1>

            <?php 
            // Fetch gallery items from the database
            $galery = get("SELECT * FROM galery ORDER BY urutan ASC");

            // Define the video extensions
            $video_extensions = ['mp4', 'mkv'];

            // Filter the gallery items to only include videos
            $videos = array_filter($galery, function($item) use ($video_extensions) {
                $file_extension = pathinfo($item['file'], PATHINFO_EXTENSION);
                return in_array($file_extension, $video_extensions);
            });

            // Check if there are any videos
            if (count($videos) > 0) {
                echo '<div class="row">';
                foreach ($videos as $video) {
                    $file_path = "assets/uploads/galery/" . $video['file'];
                    echo '
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <video src="' . $file_path . '" controls class="card-img-top"></video>
                                
                            </div>
                        </div>
                    ';
                }
                echo '</div>';
            } else {
                echo '<p>No videos found in the gallery.</p>';
            }
            ?>

        </div>
    </div>
</div>

<?php require 'footer.php'; ?>
