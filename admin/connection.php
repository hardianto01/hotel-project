
<?php
include './config.php';

echo $password;
echo $username;
// Membuat koneksi
$conn = new mysqli($server, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
