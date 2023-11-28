<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Laporan Transaksi</title>
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
                    <a class="nav-link" href="#">Overview</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Editor</a>
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
        <br>
        <form method="POST" action="CetakReportTransaksi.php" target="_blank" >
            <label>Tanggal Awal</label>
            <input type="date" name="awal" id="stayf" value="<?php echo date('Y-m-d'); ?>" class="form-control">

            <label>Tanggal Akhir</label>
            <input type="date" name="akhir" id="stayf" value="<?php echo date('Y-m-d'); ?>" class="form-control">
            
            <button class="btn btn-info" type="submit" name="submit" value="proses" onclick="return valid();">Cetak</button>
        </form>
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
              </tr>
          </thead>
          <tbody>
              <?php
                  if (isset($_POST['tgl_awal'])&& isset($_POST['tgl_akhir'])) {
                        $tgl_awal=date('Y-m-d', strtotime($_POST["tgl_awal"]));
                        $tgl_akhir=date('Y-m-d', strtotime($_POST["tgl_akhir"]));
                        $query=mysqli_query($conn,"SELECT *FROM tbtransaksi INNER JOIN tbcustomer ON tbcustomer.IdCustomer = tbtransaksi.IdCustomer where Pengambilan between '".$tgl_awal."' and '".$tgl_akhir."' order by IdTransaksi asc");
                  }else {
                        $query=mysqli_query($conn,"SELECT *FROM tbtransaksi INNER JOIN tbcustomer ON tbcustomer.IdCustomer = tbtransaksi.IdCustomer order by IdTransaksi asc");
                  }
                  $no=1;
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
                  </tr>
                          ";
                          $no++;
                        }

              ?><br><br>
          </tbody>
      </table>
    </div>
</body>
</html>