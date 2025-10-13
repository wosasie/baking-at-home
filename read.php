<?php
include 'koneksi.php';
$result = $conn->query("SELECT * FROM recipes");
?>

<div class="table-container">
  <h2>Daftar Resep 🍪</h2>
  <a href="create.php" class="add-btn">+ Tambah Resep Baru</a>
  <table>
    <tr>
      <th>ID</th>
      <th>Nama</th>
      <th>Deskripsi</th>
      <th>Foto</th>
      <th>Aksi</th>
    </tr>
    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?= $row['id'] ?></td>
      <td><?= $row['nama'] ?></td>
      <td><?= $row['deskripsi'] ?></td>
      <td><img src="<?= $row['foto'] ?>" width="80"></td>
      <td>
        <a href="update.php?id=<?= $row['id'] ?>">Edit</a> |
        <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </table>
</div>
