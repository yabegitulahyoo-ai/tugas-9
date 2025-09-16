<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Buku</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-6">

    <div class="w-full max-w-md bg-white p-6 rounded-xl shadow-lg">
        <h2 class="text-xl font-bold text-gray-700 mb-4">➕ Tambah Buku</h2>
        <form action="" method="POST" class="space-y-4">
            <div>
                <label class="block text-gray-600">Judul</label>
                <input type="text" name="judul" required class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400">
            </div>
            <div>
                <label class="block text-gray-600">Penulis</label>
                <input type="text" name="penulis" required class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400">
            </div>

            <div>
                <label class="block text-gray-600">Stok</label>
                <input type="number" name="stok" required class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400">
            </div>
            <div>
                <label class="block text-gray-600">Kategori</label>
                <input type="text" name="kategori" required class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400">
            </div>
            <div>
                <label class="block text-gray-600">Penerbit</label>
                <input type="text" name="penerbit" required class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400">
            </div>
            <div class="flex justify-between">
                <a href="index.php" class="text-gray-500 hover:underline">Kembali</a>
                <button type="submit" name="simpan" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">Simpan</button>
            </div>
        </form>

        <?php
        if (isset($_POST['simpan'])) {
            $judul = $_POST['judul'];
            $penulis = $_POST['penulis'];
            $stok = $_POST['stok'];
            $kategori = $_POST['kategori'];
            $penerbit = $_POST['penerbit'];


           $sql = "INSERT INTO buku (judul, penulis, stok, kategori, penerbit) VALUES ('$judul', '$penulis', '$stok', '$kategori', '$penerbit')";
            if (mysqli_query($koneksi, $sql)) {
                echo "<script>alert('Data berhasil disimpan');window.location='index.php';</script>";
            } else {
                echo "Error: " . mysqli_error($koneksi);
            }
        }
        ?>
    </div>
</body>
</html>
