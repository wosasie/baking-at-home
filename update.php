<?php
include 'koneksi.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "ID tidak ditemukan.";
    exit();
}

$id = (int) $_GET['id'];
$result = $conn->query("SELECT * FROM recipes WHERE id=$id");
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $fileName = $_FILES['foto']['name'];

    if (!empty($fileName)) {
        $tmpName = $_FILES['foto']['tmp_name'];
        $uploadDir = "uploads/";
        $filePath = $uploadDir . basename($fileName);
        move_uploaded_file($tmpName, $filePath);
        $sql = "UPDATE recipes SET nama='$nama', deskripsi='$deskripsi', foto='$filePath' WHERE id=$id";
    } else {
        $sql = "UPDATE recipes SET nama='$nama', deskripsi='$deskripsi' WHERE id=$id";
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: read.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<div class="crud-container">
  <h2>Edit Resep 📝</h2>
  <form method="POST" enctype="multipart/form-data">
    <input type="text" name="nama" value="<?= htmlspecialchars($row['nama']) ?>" required>
    <textarea name="deskripsi"><?= htmlspecialchars($row['deskripsi']) ?></textarea>
    <input type="file" name="foto">
    <button type="submit">Update</button>
  </form>
  <a href="read.php" class="back-link">⬅ Kembali ke daftar</a>
</div>
