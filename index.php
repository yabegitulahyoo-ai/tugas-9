<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Buku</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
  <div class="max-w-6xl mx-auto bg-white p-6 shadow rounded-lg">
    <h1 class="text-2xl font-bold mb-4">Daftar Buku</h1>
    <a href="tambah.php" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">+ Tambah Buku</a>
    <table class="w-full border-collapse border border-gray-300">
      <thead class="bg-gray-200">
        <tr>
          <th class="border px-3 py-2">ID</th>
          <th class="border px-3 py-2">Judul</th>
          <th class="border px-3 py-2">Stok</th>
          <th class="border px-3 py-2">Kategori</th>
          <th class="border px-3 py-2">Penerbit</th>
          <th class="border px-3 py-2">Alamat Penerbit</th>
          <th class="border px-3 py-2">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $query = mysqli_query($koneksi, "SELECT * FROM buku");
        while ($row = mysqli_fetch_assoc($query)) {
        ?>
        <tr>
          <td class="border px-3 py-2"><?= $row['id_buku'] ?></td>
          <td class="border px-3 py-2"><?= $row['judul'] ?></td>
          <td class="border px-3 py-2"><?= $row['stok'] ?></td>
          <td class="border px-3 py-2"><?= $row['kategori'] ?></td>
          <td class="border px-3 py-2"><?= $row['penerbit'] ?></td>
          <td class="border px-3 py-2"><?= $row['alamat_penerbit'] ?></td>
          <td class="border px-3 py-2">
            <a href="ubah.php?id=<?= $row['id_buku'] ?>" class="bg-yellow-500 text-white px-2 py-1 rounded">Ubah</a>
            <a href="hapus.php?id=<?= $row['id_buku'] ?>" class="bg-red-500 text-white px-2 py-1 rounded" onclick="return confirm('Yakin hapus?')">Hapus</a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</body>
</html>