<?php require '../template/header.php'; ?>
<?php

if (isset($_POST['submit'])) {
    $urutan = $_POST['urutan'];
    if ($_FILES['file']['error'] == 4) {
        $_SESSION['gagal'] = 'Data Gagal Ditambahkan, file wajib diupload';
        redirectTo('admin/galery/tambah.php');
    } else {
        $file = upload('file', ['jpg', 'png', 'jpeg', 'mp4', 'mkv'], 5000, '../../assets/uploads/galery/');
        if ($file === false) {
            $_SESSION['gagal'] = 'Data Gagal Ditambahkan, file tidak valid atau terlalu besar';
            redirectTo('admin/galery/tambah.php');
        } else {
            $_SESSION['uploaded_file'] = $file; // Save uploaded file name in session
        }
    }

    $query = "INSERT INTO galery VALUES (null, '$file', '$urutan');";

    mysqli_query($koneksi, $query);

    if (mysqli_affected_rows($koneksi) > 0) {
        $_SESSION['berhasil'] = 'Data Berhasil Ditambahkan';
        redirectTo('admin/galery');
    } else {
        $_SESSION['gagal'] = 'Data Gagal Ditambahkan';
        redirectTo('admin/galery/tambah.php');
    }
}
?>

<div class="card shadow p-3">
    <h5>Halaman Tambah Galeri</h5>
</div>

<div class="card shadow p-3">
    <form action="" method="post" id="form" enctype="multipart/form-data">
        <div class="row mb-3">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="file" class="form-label">File <span class="text-danger">*</span></label>
                    <input class="form-control" type="file" id="upload" name="file" required onchange="previewFile()">
                </div>
                <div id="preview-container">
                    <img src="<?= $base_url; ?>assets/img/noimage.jpg" alt="" id="preview" class="rounded w-100">
                </div>
            </div>
            <div class="col-md-8">
                <div class="mb-3">
                    <label for="urutan" class="form-label">Urutan <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="urutan" name="urutan" required>
                </div>
            </div>
        </div>
        <a class="btn btn-warning" href="<?= $base_url; ?>admin/galery" role="button">Cancel</a>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

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

<?php require '../template/footer.php'; ?>