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

    <div class="dashboard-container">
      <h1> Welcome, <?php echo htmlspecialchars($username); ?>! 🧁</h1>
      <p> This is the Baking at Home dashboard page.</p>

      <a href="index.php?from=dashboard"> 🏠 Dashboard </a>
      <a href="logout.php"> 🚪 Logout </a>
    </div>
 
  </body>

</html>

