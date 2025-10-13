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
    <style>
        .dashboard-container {
            max-width: 900px;
            margin: 40px auto;
            padding: 20px;
            background: #fff6f7;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            border: 2px solid #cb7885;
            text-align: center;
        }

        .dashboard-container h1 {
            color: #893941;
            margin-bottom: 10px;
        }

        .dashboard-nav {
            margin-bottom: 20px;
        }

        .dashboard-nav a {
            display: inline-block;
            background: #893941;
            color: white;
            padding: 10px 15px;
            border-radius: 8px;
            text-decoration: none;
            margin: 0 5px;
            font-weight: bold;
            transition: background 0.2s;
        }

        .dashboard-nav a:hover {
            background: #cb7885;
        }
    </style>
</head>
<body>

<div class="dashboard-container">
    <h1>Selamat Datang, <?= htmlspecialchars($username) ?>! 🧁</h1>
    <p>Kelola resep kamu dari satu halaman ini~</p>

    <div class="dashboard-nav">
        <a href="dashboard.php?page=read">📜 Lihat Resep</a>
        <a href="dashboard.php?page=create">➕ Tambah Resep</a>
        <a href="logout.php">🚪 Logout</a>
    </div>

    <div class="dashboard-content">
        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            if ($page == 'create') {
                include 'create.php';
            } elseif ($page == 'read') {
                include 'read.php';
            } elseif ($page == 'update') {
                include 'update.php';
            } elseif ($page == 'delete') {
                include 'delete.php';
            } else {
                echo "<p>Halaman tidak ditemukan.</p>";
            }
        } else {
            echo "<p>Silakan pilih menu di atas untuk mulai CRUD 🍰</p>";
        }
        ?>
    </div>
</div>

</body>
</html>
