<?php 
include "koneksi.php";

// Pastikan parameter id ada di URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<script>alert('ID buku tidak ditemukan');window.location='index.php';</script>";
    exit();
}

$id = (int) $_GET['id']; // pastikan id aman
$result = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku = $id");

if (!$result || mysqli_num_rows($result) == 0) {
    echo "<script>alert('Data buku tidak ditemukan');window.location='index.php';</script>";
    exit();
}

$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Ubah Buku</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen flex items-center justify-center">

  <div class="bg-gray-800 p-8 rounded-2xl shadow-lg w-96">
    <h2 class="text-2xl font-bold mb-6 text-center text-yellow-400">Ubah Buku</h2>
    <form method="post" class="space-y-4">
      <div>
        <label class="block mb-1">Judul:</label>
        <input type="text" name="judul" value="<?= htmlspecialchars($row['judul']); ?>" class="w-full px-3 py-2 rounded-lg bg-gray-700 border border-gray-600 focus:ring-2 focus:ring-yellow-400" required>
      </div>
      <div>
        <label class="block mb-1">Stok:</label>
        <input type="number" name="stok" value="<?= htmlspecialchars($row['stok']); ?>" class="w-full px-3 py-2 rounded-lg bg-gray-700 border border-gray-600 focus:ring-2 focus:ring-yellow-400" required>
      </div>
      <div>
        <label class="block mb-1">Kategori:</label>
        <input type="text" name="kategori" value="<?= htmlspecialchars($row['kategori']); ?>" class="w-full px-3 py-2 rounded-lg bg-gray-700 border border-gray-600 focus:ring-2 focus:ring-yellow-400" required>
      </div>
      <div>
        <label class="block mb-1">Harga:</label>
        <input type="number" name="harga" value="<?= htmlspecialchars($row['harga']); ?>" required class="w-full px-3 py-2 rounded-lg bg-gray-700 border border-gray-600 focus:ring-2 focus:ring-yellow-400">
      </div>
      <div>
        <label class="block mb-1">Penerbit:</label>
        <input type="text" name="penerbit" value="<?= htmlspecialchars($row['penerbit']); ?>" required class="w-full px-3 py-2 rounded-lg bg-gray-700 border border-gray-600 focus:ring-2 focus:ring-yellow-400">
      </div>
      <button type="submit" name="update" class="w-full bg-yellow-500 hover:bg-yellow-600 py-2 rounded-lg font-bold">Update</button>
    </form>
    <a href="index.php" class="block text-center mt-4 text-gray-400 hover:text-yellow-400">← Kembali</a>
  </div>

  <?php
  if (isset($_POST['update'])) {
      $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
      $stok = (int) $_POST['stok'];
      $kategori = mysqli_real_escape_string($koneksi, $_POST['kategori']);
      $harga = (int) $_POST['harga'];
      $penerbit = mysqli_real_escape_string($koneksi, $_POST['penerbit']);

      // Gunakan query lengkap dan benar
      $query = "UPDATE buku 
                SET judul='$judul', stok='$stok', kategori='$kategori', harga='$harga', penerbit='$penerbit' 
                WHERE id_buku=$id";

      $result = mysqli_query($koneksi, $query);

      if ($result) {
          echo "<script>alert('Data berhasil diubah');window.location='index.php';</script>";
      } else {
          echo "<script>alert('Gagal mengubah data: " . mysqli_error($koneksi) . "');</script>";
      }
  }
  ?>
</body>
</html>