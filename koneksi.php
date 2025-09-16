<?php
$host = "localhost";
$user = "xirpl2-5";
$pass = "0085924637";
$db   = "db_xirpl2-5_1";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
