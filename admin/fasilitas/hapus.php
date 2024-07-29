<?php

require '../template/header.php';
$id = $_GET['id'];

$fasilitas = getWhere("SELECT * FROM fasilitas WHERE id_fasilitas = $id ");

mysqli_query($koneksi, "DELETE FROM fasilitas WHERE  id_fasilitas = $id");

if (mysqli_affected_rows($koneksi) > 0) {
    $_SESSION['berhasil'] = 'Data Berhasil Dihapus';
    redirectTo('admin/fasilitas');
} else {
    $_SESSION['gagal'] = 'Data Gagal Dihapus';
    redirectTo('admin/fasilitas');
}
