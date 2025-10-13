<?php

$servername = "localhost";

$username = "root";

$password = "";

$dbname = "baking_db"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal euy: " . $conn->connect_error);
}

?>
