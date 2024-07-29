<?php require '../template/header.php'; ?>

<?php

$id = $_GET['id'];
$galery = getWhere("SELECT * FROM galery WHERE id = $id ");

if (isset($_POST['submit'])) {
    $urutan = $_POST['urutan'];

    if ($_FILES['file']['error'] == 4) {
        $file = $galery['file'];
    } else {
        $file = upload('file', ['jpg', 'png', 'jpeg', 'mp4', 'mkv'], 500, '../../assets/uploads/galery/');
    }

    $query = "UPDATE galery SET
            urutan    = '$urutan',
            file    = '$file'
            WHERE id = $id
    ";

    mysqli_query($koneksi, $query);

    if (mysqli_affected_rows($koneksi) > 0) {
        $_SESSION['berhasil'] = 'Data Berhasil diubah';
        redirectTo('admin/galery');
    } else {
        $_SESSION['gagal'] = 'Data Gagal diubah';
        redirectTo('admin/galery/ubah.php?id=' . $id);
    }
}

?>

<div class="card shadow p-3">
    <h5>Halaman Ubah galery</h5>
</div>

<div class="card shadow p-3">

    <form action="" method="post" id="form" enctype="multipart/form-data">
        <div class="row mb-3">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="file" class="form-label">File <span class="text-danger">*</span></label>
                    <input class="form-control" type="file" id="upload" name="file" onchange="previewFile()">
                </div>
                <div id="preview-container">
                    <?php
                    $file = $galery['file'];
                    $file_extension = pathinfo($file, PATHINFO_EXTENSION);
                    if (in_array($file_extension, ['mp4', 'mkv'])) {
                        // Display video
                        echo "<video src='{$base_url}/assets/uploads/galery/{$file}' controls class='rounded w-100'></video>";
                    } else {
                        // Display image
                        echo "<img src='{$base_url}/assets/uploads/galery/{$file}' alt='' id='preview' class='rounded w-100'>";
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-8">
                <div class="mb-3">
                    <label for="urutan" class="form-label">Urutan <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="urutan" name="urutan" required value="<?= $galery['urutan']; ?>">
                </div>
            </div>
        </div>
        <a class="btn btn-warning" href="<?= $base_url; ?>admin/galery" role="button">Cancel</a>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>

</div>

<?php require '../template/footer.php'; ?>

<script>
function previewFile() {
    const file = document.querySelector('input[type=file]').files[0];
    const previewContainer = document.getElementById('preview-container');
    const preview = document.getElementById('preview');
    const videoPreview = document.createElement('video');
    videoPreview.setAttribute('controls', 'controls');
    videoPreview.classList.add('rounded', 'w-100');

    if (file) {
        const reader = new FileReader();
        reader.onloadend = function() {
            const fileType = file.type;
            if (fileType.includes('video')) {
                previewContainer.innerHTML = '';
                videoPreview.src = reader.result;
                previewContainer.appendChild(videoPreview);
            } else {
                preview.src = reader.result;
                preview.style.display = 'block';
                if (videoPreview) {
                    videoPreview.style.display = 'none';
                }
            }
        }
        reader.readAsDataURL(file);
    } else {
        preview.src = '<?= $base_url; ?>assets/img/noimage.jpg';
        preview.style.display = 'block';
        if (videoPreview) {
            videoPreview.style.display = 'none';
        }
    }
}
</script>
