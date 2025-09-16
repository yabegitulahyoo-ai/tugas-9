<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Ubah Buku</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen flex items-center justify-center">

  <?php
  $id = $_GET['id'];
  $result = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku=$id");
  $row = mysqli_fetch_assoc($result);
  ?>

  <div class="bg-gray-800 p-8 rounded-2xl shadow-lg w-96">
    <h2 class="text-2xl font-bold mb-6 text-center text-yellow-400">Ubah Buku</h2>
    <form method="post" class="space-y-4">
      <div>
        <label class="block mb-1">Judul:</label>
        <input type="text" name="judul" value="<?= $row['judul']; ?>" class="w-full px-3 py-2 rounded-lg bg-gray-700 border border-gray-600 focus:ring-2 focus:ring-yellow-400" required>
      </div>
      <div>
        <label class="block mb-1">Stok:</label>
        <input type="number" name="stok" value="<?= $row['stok']; ?>" class="w-full px-3 py-2 rounded-lg bg-gray-700 border border-gray-600 focus:ring-2 focus:ring-yellow-400" required>
      </div>
      <div>
        <label class="block mb-1">Kategori:</label>
        <input type="text" name="kategori" value="<?= $row['kategori']; ?>" class="w-full px-3 py-2 rounded-lg bg-gray-700 border border-gray-600 focus:ring-2 focus:ring-yellow-400" required>
      </div>
      <div>
        <label class="block mb-1">Harga:</label>
        <input type="number" name="harga" value="<?= $row['harga']; ?>" required class="w-full px-3 py-2 rounded-lg bg-gray-700 border border-gray-600 focus:ring-2 focus:ring-yellow-400">
      </div>
      <div>
        <label class="block mb-1">Penerbit:</label>
        <input type="text" name="penerbit" value="<?= $row['penerbit']; ?>" required class="w-full px-3 py-2 rounded-lg bg-gray-700 border border-gray-600 focus:ring-2 focus:ring-yellow-400">
      </div>
      <button type="submit" name="update" class="w-full bg-yellow-500 hover:bg-yellow-600 py-2 rounded-lg font-bold">Update</button>
    </form>
    <a href="index.php" class="block text-center mt-4 text-gray-400 hover:text-yellow-400">← Kembali</a>
  </div>

  <?php
  if (isset($_POST['update'])) {
      $judul = $_POST['judul'];
      $stok = $_POST['stok'];
      $kategori = $_POST['kategori'];
      $harga = $_POST['harga'];
      $penerbit = $_POST['penerbit'];
      $query = "UPDATE buku 
          SET judul='$judul', stok='$stok', kategori='$kategori', harga='$harga', penerbit='$penerbit' 
          WHERE id_buku=$id";
      mysqli_query($koneksi, "UPDATE buku SET judul='$judul', stok='$stok', kategori='$kategori' WHERE id_buku=$id");
      echo "<script>alert('Data berhasil diubah');window.location='index.php';</script>";
  }
  ?>
</body>
</html>
