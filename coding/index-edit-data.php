<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Edit Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <h2>Input Edit Data</h2>
        <?php include('koneksi.php'); ?>
        <form action="save_data.php" method="post">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" required>

            <label for="alamat">Alamat:</label>
            <input type="text" name="alamat" required>

            <label for="telepon">Telepon:</label>
            <input type="tel" name="telepon" required>

            <label for="username">Username:</label>
            <input type="text" name="username" required>

            <label for="password">Password:</label>
            <input type="password" name="password" required>

            <button type="submit">Simpan Data</button>
        </form>
    </div>
</body>
</html>
