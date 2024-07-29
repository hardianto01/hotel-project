<?php

require '../template/header.php';
$id = $_GET['id'];

$berita = getWhere("SELECT * FROM berita WHERE id_news = $id ");

mysqli_query($koneksi, "DELETE FROM berita WHERE  id_news = $id");

if ($berita['gambar']) {
    unlink('../../assets/uploads/berita/' . $berita['gambar']);
}

if (mysqli_affected_rows($koneksi) > 0) {
    $_SESSION['berhasil'] = 'Data Berhasil Dihapus';
    redirectTo('admin/berita');
} else {
    $_SESSION['gagal'] = 'Data Gagal Dihapus';
    redirectTo('admin/berita');
}
