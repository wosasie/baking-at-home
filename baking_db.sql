CREATE DATABASE IF NOT EXISTS baking_db;
USE baking_db;

CREATE TABLE recipes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    deskripsi TEXT,
    foto VARCHAR(255)
);
