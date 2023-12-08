<?php
include('koneksi.php');

// Ambil data dari formulir
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telepon = $_POST['telepon'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Enkripsi password

// Query untuk menyimpan data konsumen
$query = "INSERT INTO editdata (nama, alamat, telepon, username, password) VALUES ('$nama', '$alamat', '$telepon', '$username', '$password')";

// Periksa apakah penyimpanan berhasil
if ($conn->query($query) === TRUE) {
    echo "Data konsumen berhasil disimpan.";
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}

// Tutup koneksi
$conn->close();
?>
