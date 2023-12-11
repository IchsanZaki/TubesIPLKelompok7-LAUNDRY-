<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Transaksi Cucian</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Form Transaksi Cucian</h2>
    <form action="proses_transaksi.php" method="post">
        <label for="nama">Nama :</label>
        <input type="text" name="nama" required>

        <label for="alamat">Alamat :</label>
        <input type="text" name="alamat" required>

        <label for="berat">Berat Cucian (kg) :</label>
        <input type="number" name="berat" required>

        <label for="paket">Jenis Paket :</label>
        <select name="paket" required>
            <option value="reguler">Reguler</option>
            <option value="express">Express</option>
        </select>

        <label for="tgl_pengambilan">Tanggal Pengambilan :</label>
        <input type="date" name="tgl_pengambilan" required>

        <button type="submit">Submit</button>
    </form>
   
</div>
</body>
</html>
