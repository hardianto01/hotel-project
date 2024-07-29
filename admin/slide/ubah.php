<?php require '../template/header.php' ?>
<?php

$id = $_GET['id'];

$slide = getWhere("SELECT * FROM slide WHERE id_slide = $id ");

if (isset($_POST['submit'])) {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $tombol = $_POST['tombol'];
    $link = $_POST['link'];
    $urutan = $_POST['urutan'];

    if ($_FILES['gambar']['error'] == 4) {
        $gambar = $slide['gambar'];
    } else {
        $gambar = upload('gambar', ['jpg', 'png', 'jpeg'], 500, '../../assets/uploads/slide/');
    }

    $query = "UPDATE slide SET
            judul       = '$judul',
            deskripsi    = '$deskripsi',
            tombol    = '$tombol',
            link    = '$link',
            urutan    = '$urutan',
            gambar    = '$gambar'
            WHERE id_slide = $id
    ";

    mysqli_query($koneksi, $query);

    if (mysqli_affected_rows($koneksi) > 0) {
        $_SESSION['berhasil'] = 'Data Berhasil diubah';
        redirectTo('admin/slide');
    } else {
        $_SESSION['gagal'] = 'Data Gagal diubah';
        redirectTo('admin/slide/ubah.php?id=' . $id);
    }
}

?>

<div class="card shadow p-3">
    <h5>Halaman Ubah Slide</h5>
</div>

<div class="card shadow p-3">

    <form action="" method="post" id="form" enctype="multipart/form-data">

        <div class="row mb-3">

            <div class="col-md-4">
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar <span class="text-danger">*</span></label>
                    <input class="form-control" type="file" id="upload" name="gambar">
                </div>
                <img src="<?= $base_url; ?>/assets/uploads/slide/<?= $slide['gambar']; ?>" alt="" id="preview" class="rounded w-100 ">
            </div>

            <div class="col-md-8">
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="judul" name="judul" required value="<?= $slide['judul']; ?>">
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" required><?= $slide['deskripsi']; ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="tombol" class="form-label">Tombol <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="tombol" name="tombol" required value="<?= $slide['tombol']; ?>">
                </div>

                <div class="mb-3">
                    <label for="link" class="form-label">Link <span class="text-danger">*</span></label>
                    <input type="url" class="form-control" id="link" name="link" required value="<?= $slide['link']; ?>">
                </div>

                <div class="mb-3">
                    <label for="urutan" class="form-label">Urutan <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="urutan" name="urutan" required value="<?= $slide['urutan']; ?>">
                </div>

            </div>

        </div>

        <a class="btn btn-warning" href="<?= $base_url; ?>admin/slide" role="button">Cancel</a>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>

</div>

<?php require '../template/footer.php' ?>