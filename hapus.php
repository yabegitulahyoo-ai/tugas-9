<?php
include "koneksi.php";

// Pastikan parameter id ada
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<script>alert('ID tidak ditemukan!');window.location='index.php';</script>";
    exit();
}

$id = (int) $_GET['id']; // pastikan hanya angka yang bisa masuk

// Jalankan query hapus
$query = mysqli_query($koneksi, "DELETE FROM buku WHERE id_buku = $id");

if ($query) {
    echo "<script>alert('Data berhasil dihapus');window.location='index.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus data: " . mysqli_error($koneksi) . "');window.location='index.php';</script>";
}
?>