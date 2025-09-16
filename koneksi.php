<?php
$host = "localhost";
$user = "xirpl2-5";   // sesuaikan user mysql
$pass = "0085924637";       // sesuaikan password mysql
$db   = "db_xirpl2-5_1"; // nama database

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>