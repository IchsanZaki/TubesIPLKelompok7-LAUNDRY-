<?php
include 'koneksi.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Input Pegawai</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="styleside.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>
<body>
    <div class="wrapper">
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>LAUNDRY</h3>
                <strong>BS</strong>
            </div>
            <ul class="list-unstyled components">
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-home"></i>
                        Data Tabel
                    </a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Data Customer</a>
                        </li>
                        <li>
                            <a href="#">Data Paket</a>
                        </li>
                        <li>
                            <a href="TampilPegawai.php">Data Pegawai</a>
                        </li>
                        <li>
                            <a href="TampilTransaksi.php">Data Transaksi</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="ReportTransaksi.php">
                        <i class="fas fa-copy"></i>
                        Report Transaksi
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <i class="fas fa-paper-plane"></i>
                        Log Out
                    </a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
            </ul>
        </nav>

        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <!-- Page Content  -->
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Sidebar</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    </div>
                </div>
            </nav>
            <h2>Input Pegawai</h2>
            <form role="form" method="post" enctype="multipart/form-data" onsubmit="return validasi()" name="biodata">
              <div class="form-group">
                <label>ID Pegawai</label>
                <input class="form-control" type="Text" name="IdPegawai" >
              </div>
              <div class="form-group">
                <label>Nama</label>
                <input class="form-control" type="Text" name="nama"  >
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <input class="form-control" type="Text" name="alamat"  >
              </div>
              <div class="form-group">
                <label>NO HP</label>
                <input class="form-control" type="Text" name="NoHP"  >
              </div>
              <div class="form-group">
                <label>NO KTP</label>
                <input class="form-control" type="Text" name="NoKTP"  >
              </div>
              <div class="form-group">
                <label>Tanggal Lahir</label>
                <input class="form-control" type="date" name="TglLahir"  >
              </div>
              <div class="form-group">
                <label>Username</label>
                <input class="form-control" type="Text" name="username"  >
              </div>
              <div class="form-group">
                <label>Password</label>
                <input class="form-control" type="Text" name="password"  >
              </div><br>
              <input type="submit" name="cek" value="Tambah Data" class="btn btn-primary" >
          	</form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
    <?php
        if (isset($_POST['cek'])) {
            include "koneksi.php";
            $idpegawai = $_POST['IdPegawai'];
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $nohp = $_POST['NoHP'];
            $noktp = $_POST['NoKTP'];
            $tgllahir = $_POST['TglLahir'];
            $username = $_POST['username'];
            $password = $_POST['password'];

            $sql = "INSERT INTO tbpegawai VALUES('$idpegawai','$nama','$alamat','$nohp','$noktp','$tgllahir','$username','$password')";
            $query = mysqli_query($conn, $sql);
            if ($query) {
                echo "<script>alert('Data Pegawai telah diinput');</script>";
                echo "<script> location = 'TampilPegawai.php'</script>";
            } else {
                echo "gagal";
            }
  }
        ?>
</body>

</html>