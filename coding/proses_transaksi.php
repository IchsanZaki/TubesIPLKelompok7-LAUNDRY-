<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$pass = "";
$db = "cucian_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
}

// Proses form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $berat = $_POST["berat"];
    $paket = $_POST["paket"];
    $tgl_pengambilan = $_POST["tgl_pengambilan"];

    // Simpan data ke database
    $sql = "INSERT INTO transaksi (nama, alamat, berat, jenis_paket, tgl_pengambilan)
            VALUES ('$nama', '$alamat', '$berat', '$paket', '$tgl_pengambilan')";

    if ($conn->query($sql) === TRUE) {
        echo "<h2>Transaksi Berhasil</h2>";
        echo "<p>Nama: $nama</p>";
        echo "<p>Alamat: $alamat</p>";
        echo "<p>Berat Cucian: $berat kg</p>";
        echo "<p>Jenis Paket: $paket</p>";
        echo "<p>Tanggal Pengambilan: $tgl_pengambilan</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

?>
