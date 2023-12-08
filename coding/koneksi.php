<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'cucian_db';

// Lakukan koneksi ke database
$conn = new mysqli($hostname, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
