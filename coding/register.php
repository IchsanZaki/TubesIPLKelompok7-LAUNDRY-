<?php
// Informasi koneksi database
$host = "localhost";
$user = "root";
$pass = "";
$db = "laundryipl";

$koneksi = new mysqli($host, $user, $pass, $db);

// Mengecek apakah ada data yang dikirimkan melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $IdCustomer = $_POST["IdCustomer"];
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $NoHP = $_POST["NoHP"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Menghindari SQL injection
    $IdCustomer = $koneksi->real_escape_string($IdCustomer);
    $nama = $koneksi->real_escape_string($nama);
    $alamat = $koneksi->real_escape_string($alamat);
    $NoHP = $koneksi->real_escape_string($NoHP);
    $username = $koneksi->real_escape_string($username);
    $password = $koneksi->real_escape_string($password);

    // Membuat query untuk menyimpan data ke tabel_customer
    $sql = "INSERT INTO tbcustomer (IdCustomer, nama, alamat, NoHP, username, password) VALUES ('$IdCustomer','$nama', '$alamat', '$NoHP', '$username', '$password')";

    // Mengeksekusi query dan mengecek apakah berhasil
    if ($koneksi->query($sql) === TRUE) {
        echo "Registrasi berhasil. <a href='login.php'>Login sekarang</a>";
    } else {
        echo "Kesalahan: " . $sql . "<br>" . $koneksi->error;
    }

    // Menutup koneksi
    $koneksi->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Customer</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: url(background2.jpg) center/cover no-repeat; /* Ganti dengan path yang sesuai */
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            color: #fff;
        }

        form {
            background-color: rgba(255, 255, 255, 0.8); /* Warna latar belakang form dengan opasitas */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

    </style>
</head>
<body>
<body>
    <form action="register.php" method="post">
        <label for="nama">IdCustomer:</label>
        <input type="text" id="IdCustomer" name="IdCustomer" required><br>

        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required><br>

        <label for="alamat">Alamat:</label>
        <input type="text" id="alamat" name="alamat" required><br>

        <label for="NoHP">No. HP:</label>
        <input type="text" id="NoHP" name="NoHP" required><br>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Register">
        <p style="margin-top: 10px; text-align: center; color: #555;">Sudah mempunyai akun?</p>
        <button type="button" onclick="window.location.href='login.php'">Login</button>    
    </form>
</body>
</html>
