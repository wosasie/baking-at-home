<?php

include 'koneksi.php';

$id = $_GET['id'];

$conn->query("DELETE FROM recipes WHERE id=$id");

header("Location: read.php");

exit();

?>
