<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Diri Konsumen</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form, .result-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            margin-bottom: 8px;
            color: #333;
        }

        input {
            padding: 10px;
            margin-bottom: 16px;
            width: 100%;
            box-sizing: border-box;
        }

        input[type="password"] {
            margin-bottom: 24px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
            padding: 12px;
            border: none;
            border-radius: 4px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .result-container {
            display: none;
        }

        .result-container p {
            margin-bottom: 8px;
        }
    </style>
</head>
<body>
    <?php
    // Simulasi data konsumen 
    $konsumen = [
        'nama' => 'dadang',
        'alamat' => 'Jl.jalan-jalan',
        'telepon' => '081234567890',
        'username' => 'dadang_12',
        'password' => 'hashed_password', // 
    ];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Proses penyimpanan data diri 
        $konsumen['nama'] = $_POST["nama"];
        $konsumen['alamat'] = $_POST["alamat"];
        $konsumen['telepon'] = $_POST["telepon"];
        $konsumen['username'] = $_POST["username"];
        $konsumen['password'] = password_hash($_POST["password"], PASSWORD_DEFAULT);

        // Menampilkan hasil penyimpanan
        echo "<div class='result-container'>";
        echo "<h3>DATA DIRI ANDA BERHASIL DI UPDATE :</h3>";
        echo "<p>Nama: {$konsumen['nama']}</p>";
        echo "<p>Alamat: {$konsumen['alamat']}</p>";
        echo "<p>Telepon: {$konsumen['telepon']}</p>";
        echo "<p>Username: {$konsumen['username']}</p>";
        // Password tidak ditampilkan
        echo "</div>";
    }
    ?>

    <form action="" method="post">
        <h2>Edit Data Diri Konsumen</h2>

        <label for="nama">Nama:</label>
        <input type="text" name="nama" value="<?php echo $konsumen['nama']; ?>" required>

        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" value="<?php echo $konsumen['alamat']; ?>" required>

        <label for="telepon">Telepon:</label>
        <input type="text" name="telepon" value="<?php echo $konsumen['telepon']; ?>" required>

        <label for="username">Username:</label>
        <input type="text" name="username" value="<?php echo $konsumen['username']; ?>" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <input type="submit" value="Simpan Data Diri">
    </form>

    <script>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "document.querySelector('form').style.display = 'none';";
            echo "document.querySelector('.result-container').style.display = 'block';";
        }
        ?>
    </script>
</body>
</html>
