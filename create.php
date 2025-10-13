<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $fileName = $_FILES['foto']['name'];
    $tmpName = $_FILES['foto']['tmp_name'];
    $uploadDir = "uploads/";

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $filePath = $uploadDir . basename($fileName);
    move_uploaded_file($tmpName, $filePath);

    $sql = "INSERT INTO recipes (nama, deskripsi, foto) VALUES ('$nama', '$deskripsi', '$filePath')";
    if ($conn->query($sql) === TRUE) {
        header("Location: read.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<div class="crud-container">
  <h2>Tambah Resep 🍰</h2>
  <form method="POST" enctype="multipart/form-data">
    <input type="text" name="nama" placeholder="Nama Resep" required>
    <textarea name="deskripsi" placeholder="Deskripsi Resep"></textarea>
    <input type="file" name="foto" required>
    <button type="submit">Tambah</button>
  </form>
  <a href="read.php" class="back-link">⬅ Kembali ke daftar</a>
</div>
