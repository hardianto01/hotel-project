<?php

require '../template/header.php';
$id = $_GET['id'];

$slide = getWhere("SELECT * FROM slide WHERE id_slide = $id ");

mysqli_query($koneksi, "DELETE FROM slide WHERE  id_slide = $id");

if ($slide['gambar']) {
    unlink('../../assets/uploads/slide/' . $slide['gambar']);
}

if (mysqli_affected_rows($koneksi) > 0) {
    $_SESSION['berhasil'] = 'Data Berhasil Dihapus';
    redirectTo('admin/slide');
} else {
    $_SESSION['gagal'] = 'Data Gagal Dihapus';
    redirectTo('admin/slide');
}
