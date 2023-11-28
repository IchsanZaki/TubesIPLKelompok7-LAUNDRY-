<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Konsumen</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
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
        }

        input {
            padding: 8px;
            margin-bottom: 16px;
            width: 100%;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .result-container {
            background-color: #e0f7fa;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
            text-align: center;
        }

        .result-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .result-table th, .result-table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        .result-table th {
            background-color: #4caf50;
            color: white;
        }

        .result-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Proses transaksi 
        $nama_pelanggan = $_POST["nama_pelanggan"];
        $berat_cucian = $_POST["berat_cucian"];
        $jenis_paket = $_POST["jenis_paket"];
        $alamat_pengambilan = $_POST["alamat_pengambilan"];
        $tanggal_pengambilan = $_POST["tanggal_pengambilan"];
    ?>

        <div class="result-container">
            <h3>Transaksi Laundry Berhasil</h3>
            <table class="result-table">
                <tr>
                    <th>Informasi</th>
                    <th>Detail</th>
                </tr>
                <tr>
                    <td>Nama Pelanggan</td>
                    <td><?php echo $nama_pelanggan; ?></td>
                </tr>
                <tr>
                    <td>Berat Cucian</td>
                    <td><?php echo $berat_cucian; ?> kg</td>
                </tr>
                <tr>
                    <td>Jenis Paket</td>
                    <td><?php echo $jenis_paket; ?></td>
                </tr>
                <tr>
                    <td>Alamat Pengambilan</td>
                    <td><?php echo $alamat_pengambilan; ?></td>
                </tr>
                <tr>
                    <td>Tanggal Pengambilan</td>
                    <td><?php echo $tanggal_pengambilan; ?></td>
                </tr>
                
            </table>
        </div>

    <?php
    } else {
    ?>
        <form action="" method="post">
            <h2>Formulir Transaksi Konsumen</h2>

            <label for="nama_pelanggan">Nama Pelanggan:</label>
            <input type="text" name="nama_pelanggan" required>

            <label for="berat_cucian">Berat Cucian (kg):</label>
            <input type="number" name="berat_cucian" required>

            <label for="jenis_paket">Jenis Paket Laundry:</label>
            <input type="text" name="jenis_paket" required>

            <label for="alamat_pengambilan">Alamat Pengambilan:</label>
            <input type="text" name="alamat_pengambilan" required>

            <label for="tanggal_pengambilan">Tanggal Pengambilan:</label>
            <input type="date" name="tanggal_pengambilan" required>

            <input type="submit" value="Proses Transaksi">
        </form>
    <?php
    }
    ?>
</body>
</html>
