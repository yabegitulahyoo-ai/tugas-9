<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Buku</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen flex items-center justify-center">

  <div class="bg-gray-800 p-8 rounded-2xl shadow-lg w-96">
    <h2 class="text-2xl font-bold mb-6 text-center text-cyan-400">Tambah Buku</h2>
    <form method="post" class="space-y-4">
      <div>
        <label class="block mb-1">Judul:</label>
        <input type="text" name="judul" class="w-full px-3 py-2 rounded-lg bg-gray-700 border border-gray-600 focus:ring-2 focus:ring-cyan-500" required>
      </div>
      <div>
        <label class="block mb-1">Stok:</label>
        <input type="number" name="stok" class="w-full px-3 py-2 rounded-lg bg-gray-700 border border-gray-600 focus:ring-2 focus:ring-cyan-500" required>
      </div>
      <div>
        <label class="block mb-1">Kategori:</label>
        <input type="text" name="kategori" class="w-full px-3 py-2 rounded-lg bg-gray-700 border border-gray-600 focus:ring-2 focus:ring-cyan-500" required>
      </div>
      <div>
        <label class="block mb-1">Harga:</label>
        <input type="number" name="harga" required class="w-full px-3 py-2 rounded-lg bg-gray-700 border border-gray-600 focus:ring-2 focus:ring-cyan-500">
      </div>
      <div>
        <label class="block mb-1">Penerbit:</label>
        <input type="text" name="penerbit" required class="w-full px-3 py-2 rounded-lg bg-gray-700 border border-gray-600 focus:ring-2 focus:ring-cyan-500">
      </div>
      <button type="submit" name="simpan" class="w-full bg-cyan-500 hover:bg-cyan-600 py-2 rounded-lg font-bold">Simpan</button>
    </form>
    <a href="index.php" class="block text-center mt-4 text-gray-400 hover:text-cyan-400">← Kembali</a>
  </div>

  <?php
  if (isset($_POST['simpan'])) {
      $judul = $_POST['judul'];
      $stok = $_POST['stok'];
      $kategori = $_POST['kategori'];
      $harga = $_POST['harga'];
      $penerbit = $_POST['penerbit'];
      $query = "INSERT INTO buku (judul, stok, kategori, harga, penerbit) VALUES ('$judul','$stok','$kategori','$harga','$penerbit')";
      mysqli_query($koneksi, $query);
      echo "<script>alert('Data berhasil disimpan');window.location='index.php';</script>";
  }
  ?>
</body>
</html>
