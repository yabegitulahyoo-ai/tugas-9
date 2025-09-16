<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Buku</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col items-center p-6">

    <div class="w-full max-w-5xl bg-white shadow-lg rounded-xl p-6">
        <h2 class="text-2xl font-bold text-gray-700 mb-4">📚 Daftar Buku</h2>
        <a href="tambah.php" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium">+ Tambah Buku</a>
        
        <div class="overflow-x-auto mt-4">
            <table class="w-full border-collapse bg-white shadow-md rounded-lg overflow-hidden">
                <thead class="bg-blue-500 text-white">
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Judul</th>
                        <th class="px-4 py-2">Penulis</th>
                        <th class="px-4 py-2">Stok</th>
                        <th class="px-4 py-2">Kategori</th>
                        <th class="px-4 py-2">Penerbit</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $sql = "SELECT * FROM buku";
                $query = mysqli_query($koneksi, $sql);
                while ($row = mysqli_fetch_assoc($query)) {
                    echo "<tr class='border-b hover:bg-gray-50'>
                        <td class='px-4 py-2 text-center'>".$row['id_buku']."</td>
                        <td class='px-4 py-2 text-center'>".$row['judul']."</td>
                        <td class='px-4 py-2 text-center'>".$row['penulis']."</td>
                        <td class='px-4 py-2 text-center'>".$row['stok']."</td>
                        <td class='px-4 py-2 text-center'>".$row['kategori']."</td>
                        <td class='px-4 py-2 text-center'>".$row['penerbit']."</td>
                        <td class='px-4 py-2 text-center'>
                            <a href='ubah.php?id=".$row['id_buku']."' class='text-green-600 hover:underline'>Ubah</a> |
                            <a href='hapus.php?id=".$row['id_buku']."' onclick=\"return confirm('Yakin hapus data ini?')\" class='text-red-600 hover:underline'>Hapus</a>
                        </td>
                    </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
