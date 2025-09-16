<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Buku</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
  <div class="max-w-lg mx-auto bg-white p-6 shadow rounded-lg">
    <h1 class="text-xl font-bold mb-4">Tambah Buku</h1>
    <form method="POST">
      <input type="text" name="judul" placeholder="Judul" class="w-full border p-2 mb-2 rounded" required>
      <input type="number" name="stok" placeholder="Stok" class="w-full border p-2 mb-2 rounded" required>
      <input type="text" name="kategori" placeholder="Kategori" class="w-full border p-2 mb-2 rounded" required>
      <input type="text" name="penerbit" placeholder="Penerbit" class="w-full border p-2 mb-2 rounded" required>
      <textarea name="alamat_penerbit" placeholder="Alamat Penerbit" class="w-full border p-2 mb-2 rounded" required></textarea>
      <button type="submit" name="simpan" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
      <a href="index.php" class="ml-2 text-gray-600">Batal</a>
    </form>
    <?php
    if (isset($_POST['simpan'])) {
      $judul   = $_POST['judul'];
      $stok    = $_POST['stok'];
      $kategori= $_POST['kategori'];
      $penerbit= $_POST['penerbit'];
      $alamat  = $_POST['alamat_penerbit'];

      $sql = "INSERT INTO buku (judul, stok, kategori, penerbit, alamat_penerbit) 
              VALUES ('$judul', '$stok', '$kategori', '$penerbit', '$alamat')";
      mysqli_query($koneksi, $sql);
      header("Location: index.php");
    }
    ?>
  </div>
</body>
</html>
