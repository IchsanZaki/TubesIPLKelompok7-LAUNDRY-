<?php
//membuat koneksi ke database
$host = "localhost";
$user = "root";
$pass = "";
$db = "laundryipl";

$koneksi = new mysqli($host, $user, $pass, $db);

//cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi Gagal: " . $koneksi->connect_error);
}

//cek apakah tombol login sudah diklik atau belum
if (isset($_POST['login'])) {

    //mengambil data dari form login
    $username = $_POST['username'];
    $password = $_POST['password'];

    //cek username dan password apakah cocok dengan tabel pegawai atau tabel customer
    $sql_pegawai = "SELECT * FROM tbpegawai WHERE username='$username' and password='$password'";
    $sql_customer = "SELECT * FROM tbcustomer WHERE username='$username' and password='$password'";

    $result_pegawai = $koneksi->query($sql_pegawai);
    $result_customer = $koneksi->query($sql_customer);

    //cek apakah username dan password cocok dengan tabel pegawai
    if ($result_pegawai->num_rows > 0) {
        //buat session untuk pegawai
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        //redirect ke halaman pegawai
        header("location:halaman_pegawai.php");
    }

    //cek apakah username dan password cocok dengan tabel customer
    else if ($result_customer->num_rows > 0) {
        //buat session untuk customer
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        //redirect ke halaman customer
        header("location:halaman_customer.php");
    }

    //jika username dan password tidak cocok dengan tabel pegawai ataupun customer
    else {
        echo "<script>alert('Username atau Password salah!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: url(background1.jpg) center/cover no-repeat; /* Ganti dengan path yang sesuai */
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

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1></h1>
    <form action="" method="post">
        <label>Username</label>
        <input type="text" name="username" required>
        <br>
        <label>Password</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit" name="login">Login</button>
    </form>
</body>
</html>
