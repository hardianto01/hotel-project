<?php require '../template/header.php' ?>
<?php

if (isset($_POST['submit'])) {
    $fasilitas = $_POST['fasilitas'];
    $deskripsi = $_POST['deskripsi'];
    $deskripsi = str_replace("'", "", $deskripsi);
    $icon = $_POST['icon'];
    $urutan = $_POST['urutan'];

    $query = "INSERT INTO fasilitas VALUES (null, '$fasilitas', '$deskripsi', '$icon', '$urutan')";

    mysqli_query($koneksi, $query);

    if (mysqli_affected_rows($koneksi) > 0) {
        $_SESSION['berhasil'] = 'Data Berhasil Ditambahkan';
        redirectTo('admin/fasilitas');
    } else {
        $_SESSION['gagal'] = 'Data Gagal Ditambahkan';
        redirectTo('admin/fasilitas/tambah.php');
    }
}

?>

<div class="card shadow p-3">
    <h5>Halaman Tambah fasilitas</h5>
</div>

<div class="card shadow p-3">

    <form action="" method="post" id="form" enctype="multipart/form-data">

        <div class="row mb-3 g-3">

            <div class="col-12">
                <label for="fasilitas" class="form-label">fasilitas <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="fasilitas" name="fasilitas" required>
            </div>

            <div class="col-12">
                <label for="deskripsi" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
            </div>

            <div class="col-md-6">
                <label for="icon" class="form-label">Icon <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="icon" name="icon" required>
            </div>

            <div class="col-md-6">
                <label for="urutan" class="form-label">Urutan <span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="urutan" name="urutan" required>
            </div>


        </div>

        <a class="btn btn-warning" href="<?= $base_url; ?>admin/fasilitas" role="button">Cancel</a>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>

</div>

<?php require '../template/footer.php' ?>