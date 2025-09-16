<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Ubah Buku</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-6">

    <div class="w-full max-w-md bg-white p-6 rounded-xl shadow-lg">
        <h2 class="text-xl font-bold text-gray-700 mb-4">✏️ Ubah Buku</h2>
        <?php
        $id = $_GET['id'];
        $sql = "SELECT * FROM buku WHERE id_buku=$id";
        $query = mysqli_query($koneksi, $sql);
        $row = mysqli_fetch_assoc($query);
        ?>
        <form action="" method="POST" class="space-y-4">
            <div>
                <label class="block text-gray-600">Judul</label>
                <input type="text" name="judul" value="<?= $row['judul'] ?>" required class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400">
            </div>
            <div>
                <label class="block text-gray-600">Penulis</label>
                <input type="text" name="penulis" value="<?= $row['penulis'] ?>" required class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400">
            </div>

            <div>
                <label class="block text-gray-600">Stok</label>
                <input type="number" name="stok" value="<?= $row['stok'] ?>" required class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400">
            </div>
            <div>
                <label class="block text-gray-600">Kategori</label>
                <input type="text" name="kategori" value="<?= $row['kategori'] ?>" required class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400">
            </div>
            <div class="flex justify-between">
                <a href="index.php" class="text-gray-500 hover:underline">Kembali</a>
                <button type="submit" name="update" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg">Update</button>
            </div>
            <div>
                <label class="block text-gray-600">Penerbit</label>
                <input type="text" name="penerbit" value="<?= $row['penerbit'] ?>" required class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-400">
            </div>
        </form>

        <?php
        if (isset($_POST['update'])) {
            $judul = $_POST['judul'];
            $penulis = $_POST['penulis'];
            $stok = $_POST['stok'];
            $kategori = $_POST['kategori'];
            $penerbit = $_POST['penerbit'];

            $sql = "UPDATE buku SET judul='$judul', penulis='$penulis', stok='$stok', kategori='$kategori', penerbit='$penerbit' WHERE id_buku=$id";
            if (mysqli_query($koneksi, $sql)) {
                echo "<script>alert('Data berhasil diubah');window.location='index.php';</script>";
            } else {
                echo "Error: " . mysqli_error($koneksi);
            }
        }
        ?>
    </div>
</body>
</html>
