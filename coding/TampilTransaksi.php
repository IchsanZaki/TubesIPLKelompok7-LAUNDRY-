<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Data Transaksi</title>
</head>
<body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">LAUNDRY</a>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tabel Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Laporan Keuangan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Log out</a>
                </li>
                <!-- Tambahkan lebih banyak item navbar jika diperlukan -->
            </ul>
        </div>
    </nav>
    <?php
      session_start();
      include'koneksi.php';
      include'functions.php';
    ?>
    <div class="container">
      <table id="customers" border="1" class="table table-bordered">
          <thead>
              <tr class="bg bg-info">
                  <th>No</th>
                  <th>ID Transaksi</th>
                  <th>ID Customer</th>
                  <th>nama</th>
                  <th>Jenis Laundry</th>
                  <th>Alamat</th>
                  <th>Berat</th>
                  <th>Total Harga</th>
                  <th>Tanggal Pengambilan</th>
                  <th>status</th>
                  <th>aksi</th>
              </tr>
          </thead>
          <tbody>
              <?php
                  $no=1;
                  $search = @$_POST['search'];
                  $query = mysqli_query($conn,"SELECT *FROM tbtransaksi INNER JOIN tbcustomer ON tbcustomer.IdCustomer = tbtransaksi.IdCustomer ");
                  while ($data = mysqli_fetch_array($query)) {
                  echo "
                  <tr>
                      <td>$no</td>
                      <td>$data[IdTransaksi]</td>
                      <td>$data[IdCustomer]</td>
                      <td>$data[nama]</td>
                      <td>$data[JenisLaundry]</td>
                      <td>$data[alamat]</td>
                      <td>$data[berat]</td>
                      <td>".rupiah($data['HargaTotal'])."</td>
                      <td>$data[Pengambilan]</td>
                      <td>$data[status]</td>
                      <td>
                          <a href='EditTransaksi.php?id=$data[IdTransaksi]' >EDIT</a> |
                          <a href='HapusTransaksi.php?IdTransaksi=$data[IdTransaksi]' onClick=\"return confirm('anda yakin?')\">HAPUS</a> |
                          <a href='CetakStruk.php?id=$data[IdTransaksi]' >CETAK</a> 
                      </td>
                  </tr>
                          ";
                          $no++;
                        }

              ?><br><br>
          </tbody>
      </table>
    </div>
</body>
<footer class="bg-dark text-center text-white fixed-bottom">
    <p>Alamat Toko | (022) 849204183 | LaundryJaya12@gmail.com</p>
    <p>&copy; 2023 - Laundry Jaya. All rights reserved.</p>
</footer>
</html>