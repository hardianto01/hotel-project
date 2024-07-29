<?php require '../template/header.php' ?>
<?php cekSuperadmin() ?>
<?php

if (isset($_POST['submit'])) {
    $username = $_POST['username'];

    $user = getWhere("SELECT * FROM user WHERE username = '$username'");
    if ($user) {
        $_SESSION['gagal'] = 'Data Gagal Ditambahkan, Username Sudah Digunakan';
        redirectTo('admin/user/tambah.php');
    }

    $password = $_POST['password'];
    $password = password_hash($password, PASSWORD_DEFAULT);
    $nama = $_POST['nama'];
    $role = $_POST['role'];

    if ($_FILES['foto']['error'] == 4) {
        $foto = null;
    } else {
        $foto = upload('foto', ['jpg', 'png', 'jpeg'], 500, '../../assets/uploads/user/');
    }

    $query = "INSERT INTO user VALUES (null, '$username', '$password','$nama', '$role', '$foto')";

    mysqli_query($koneksi, $query);

    if (mysqli_affected_rows($koneksi) > 0) {
        $_SESSION['berhasil'] = 'Data Berhasil Ditambahkan';
        redirectTo('admin/user');
    } else {
        $_SESSION['gagal'] = 'Data Gagal Ditambahkan';
        redirectTo('admin/user/tambah.php');
    }
}

?>

<div class="card shadow p-3">
    <h5>Halaman Tambah User</h5>
</div>

<div class="card shadow p-3">

    <form action="" method="post" id="form" enctype="multipart/form-data">

        <div class="row mb-3">

            <div class="col-md-4">
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    <input class="form-control" type="file" id="upload" name="foto">
                </div>
                <img src="<?= $base_url; ?>assets/img/noprofil.png" alt="" id="preview" class="rounded w-100 ">
            </div>

            <div class="col-md-8">
                <div class="mb-3">
                    <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="password" name="password" required minlength="8">
                </div>
                <div class="mb-3">
                    <label for="passwordconfirm" class="form-label">Konfirmasi Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="passwordconfirm" name="passwordconfirm" required minlength="8" data-parsley-equalto="#password">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Role <span class="text-danger">*</span></label>
                    <select class="form-select" id="role" name="role" required>
                        <option value="1">Superadmin</option>
                        <option value="2">Admin</option>
                    </select>
                </div>
            </div>

        </div>


        <a class="btn btn-warning" href="<?= $base_url; ?>admin/user" role="button">Cancel</a>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>

</div>

<?php require '../template/footer.php' ?>