<?php include 'koneksi.php'; 
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku=$id");
$row = mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Ubah Buku</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
  <div class="max-w-lg mx-auto bg-white p-6 shadow rounded-lg">
    <h1 class="text-xl font-bold mb-4">Ubah Buku</h1>
    <form method="POST">
      <input type="text" name="judul" value="<?= $row['judul'] ?>" class="w-full border p-2 mb-2 rounded" required>
      <input type="number" name="stok" value="<?= $row['stok'] ?>" class="w-full border p-2 mb-2 rounded" required>
      <input type="text" name="kategori" value="<?= $row['kategori'] ?>" class="w-full border p-2 mb-2 rounded" required>
      <input type="text" name="penerbit" value="<?= $row['penerbit'] ?>" class="w-full border p-2 mb-2 rounded" required>
      <textarea name="alamat_penerbit" class="w-full border p-2 mb-2 rounded" required><?= $row['alamat_penerbit'] ?></textarea>
      <button type="submit" name="update" class="bg-green-500 text-white px-4 py-2 rounded">Update</button>
      <a href="index.php" class="ml-2 text-gray-600">Batal</a>
    </form>
    <?php
    if (isset($_POST['update'])) {
      $judul   = $_POST['judul'];
      $stok    = $_POST['stok'];
      $kategori= $_POST['kategori'];
      $penerbit= $_POST['penerbit'];
      $alamat  = $_POST['alamat_penerbit'];

      $sql = "UPDATE buku 
              SET judul='$judul', stok='$stok', kategori='$kategori', penerbit='$penerbit', alamat_penerbit='$alamat' 
              WHERE id_buku=$id";
      mysqli_query($koneksi, $sql);
      header("Location: index.php");
    }
    ?>
  </div>
</body>
</html>
