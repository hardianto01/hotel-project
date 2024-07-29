<?php

require '../template/header.php';
$id = $_GET['id'];

$galery = getWhere("SELECT * FROM galery WHERE id = $id ");

mysqli_query($koneksi, "DELETE FROM galery WHERE  id = $id");

if ($galery['gambar']) {
    unlink('../../assets/uploads/galery/' . $galery['file']);
}

if (mysqli_affected_rows($koneksi) > 0) {
    $_SESSION['berhasil'] = 'Data Berhasil Dihapus';
    redirectTo('admin/galery');
} else {
    $_SESSION['gagal'] = 'Data Gagal Dihapus';
    redirectTo('admin/galery');
}
