<?php
session_start();

if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>

<html lang="id">

<head>

  <meta charset="UTF-8">
  <title> Dashboard - Baking at Home </title>
  <link rel="stylesheet" href="style.css">

</head>

<body>

  <h1> Selamat Datang, <?php echo htmlspecialchars($username); ?>! 🧁 </h1>
  <p> Ini adalah halaman dashboard Baking at Home. </p>

  <p><a href="index.php?from=dashboard"> Kembali ke halaman utama </a> </p>
  <p><a href="logout.php"> Logout </a> </p>

</body>

</html>

