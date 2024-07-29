<?php require '../template/header.php'; ?>

<?php $slide = get("SELECT * FROM galery ORDER BY id DESC"); ?>

<div class="card shadow p-3">
    <h5>Gallery</h5>
</div>

<div class="card shadow p-3">
    <div class="mb-3">
        <a class="btn btn-primary" href="<?= $base_url; ?>admin/galery/tambah.php" role="button">Tambah</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered w-100" id="data-table">
            <thead>
                <tr>
                    <th class="text-center">Urutan</th>
                    <th class="text-center">File</th>
                    <th class="text-center">Extension</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($slide as $row) : ?>
                    <tr>
                        <td><?= $row['urutan']; ?></td>
                        <td class="text-center">
                            <?php
                            $file = $row['file'];
                            $file_extension = pathinfo($file, PATHINFO_EXTENSION);
                            $mime_type = getMimeType($file_extension);
                            if (strpos($mime_type, 'video') === 0) {
                                // Display video
                                echo "<video src='{$base_url}/assets/uploads/galery/{$file}' width='70' controls></video>";
                            } else {
                                // Display image
                                echo "<img src='{$base_url}/assets/uploads/galery/{$file}' width='70' />";
                            }
                            ?>
                        </td>
                        <td>
                            <?= $mime_type ?>
                        </td>
                        <td class="text-center text-nowrap">
                            <a class="btn btn-warning me-1" href="<?= $base_url; ?>admin/galery/ubah.php?id=<?= $row['id']; ?>" role="button"><i class='bx bx-edit-alt'></i></a>
                            <a class="btn btn-danger button-delete" href="<?= $base_url; ?>admin/galery/hapus.php?id=<?= $row['id']; ?>" role="button"><i class='bx bx-trash'></i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<?php require '../template/footer.php'; ?>

<?php
function getMimeType($extension) {
    $mime_types = [
        'jpg'  => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'png'  => 'image/png',
        'gif'  => 'image/gif',
        'bmp'  => 'image/bmp',
        'webp' => 'image/webp',
        'mp4'  => 'video/mp4',
        'mkv'  => 'video/x-matroska',
        'mov'  => 'video/quicktime',
        'avi'  => 'video/x-msvideo'
    ];

    return isset($mime_types[$extension]) ? $mime_types[$extension] : 'application/octet-stream';
}
?>
