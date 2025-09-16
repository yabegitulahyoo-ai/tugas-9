<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Buku</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen">

  <div class="container mx-auto px-6 py-10">
    <h1 class="text-4xl font-bold text-center mb-8 text-cyan-400">📚 Daftar Buku</h1>
    
    <div class="flex justify-between items-center mb-6">
      <a href="tambah.php" class="bg-cyan-500 hover:bg-cyan-600 text-white px-4 py-2 rounded-lg shadow-md transition">+ Tambah Buku</a>
    </div>

    <div class="overflow-x-auto">
      <table class="w-full border-collapse border border-gray-700">
        <thead class="bg-gray-800">
          <tr>
            <th class="border border-gray-700 px-4 py-2">ID</th>
            <th class="border border-gray-700 px-4 py-2">Judul</th>
            <th class="border border-gray-700 px-4 py-2">Stok</th>
            <th class="border border-gray-700 px-4 py-2">Kategori</th>
            <th class="border border-gray-700 px-4 py-2">Harga</th>
            <th class="border border-gray-700 px-4 py-2">Penerbit</th>
            <th class="border border-gray-700 px-4 py-2">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $result = mysqli_query($koneksi, "SELECT * FROM buku ORDER BY id_buku DESC");
          while ($row = mysqli_fetch_assoc($result)) {
          ?>
          <tr class="hover:bg-gray-800 transition">
            <td class="border border-gray-700 px-4 py-2 text-center"><?= $row['id_buku']; ?></td>
            <td class="border border-gray-700 px-4 py-2 text-center"><?= $row['judul']; ?></td>
            <td class="border border-gray-700 px-4 py-2 text-center"><?= $row['stok']; ?></td>
            <td class="border border-gray-700 px-4 py-2 text-center"><?= $row['kategori']; ?></td>
            <td class="border border-gray-700 px-4 py-2 text-center">Rp <?= number_format($row['harga'], 0, ',', '.'); ?></td>
            <td class="border border-gray-700 px-4 py-2 text-center"><?= $row['penerbit']; ?></td>
            <td class="border border-gray-700 px-4 py-2 text-center">
              <a href="ubah.php?id=<?= $row['id_buku']; ?>" class="bg-yellow-500 hover:bg-yellow-600 text-black px-3 py-1 rounded-lg mr-2">Ubah</a>
              <a href="hapus.php?id=<?= $row['id_buku']; ?>" onclick="return confirm('Yakin mau hapus?')" class="bg-red-600 hover:bg-red-700 px-3 py-1 rounded-lg">Hapus</a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
