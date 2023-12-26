<?php
include 'koneksi.php';
session_start();
$id = $_GET['id'];
$data = mysqli_query($conn,"SELECT * FROM tbtransaksi where IdTransaksi='$id'");
while($d = mysqli_fetch_array($data)) {
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Transaksi</title>
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
                            <a href="TampilCustomer.php">Data Customer</a>
                        </li>
                        <li>
                            <a href="TampilPaket.php">Data Paket</a>
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
            <h2>EditTransaksi</h2>
            <form role="form" method="post" enctype="multipart/form-data" onsubmit="return validasi()" name="biodata">
              <div class="form-group">
                <label>ID Transaksi</label>
                <input class="form-control" type="hidden" name="IdTransaksi" value="<?php echo $d['IdTransaksi'];?>">
                <input class="form-control" type="Text" name="IdTransaksi" value="<?php echo $d['IdTransaksi'];?>"readonly>
              </div>
              <div class="form-group">
               <label>Pilih Customer</label>
                <select class="form-control" name="IdCustomer" onchange="changeValue(this.value)">
               <?php  
                  $sql="select * from tbcustomer ";

                    $hasil=mysqli_query($conn,$sql);
                    $no=0;
                    while ($data1 = mysqli_fetch_array($hasil)) {
                    $no++;
                 ?>
                 <option value="<?php echo $data1['IdCustomer'];?>"><?php echo $data1['nama'];?></option>
                 <?php
                }
                 ?>
                </select>
              </div>
              <div class="form-group">
                <label>Pilih Jenis Laundry</label>
                <select class="form-control" name="IdPaket" onchange="changeValue(this)">
                    <?php  
                    $sql = "SELECT * FROM tbpaket";
                    $hasil = mysqli_query($conn, $sql);
                    while ($data1 = mysqli_fetch_array($hasil)) {
                    ?>
                    <option value="<?php echo $data1['IdPaket'];?>" data-harga="<?php echo $data1['harga'];?>">
                        <?php echo $data1['JenisPaket'];?> | <?php echo $data1['harga'];?>
                    </option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label>Harga</label>
                <input class="form-control" type="text" name="harga" id="harga" readonly>
            </div>
            <div class="form-group">
                <label>IdPaket</label>
                <input class="form-control" type="text" name="IdPaket" id="IdPaket" readonly>
            </div>
              <div class="form-group">
                <label>Berat</label>
                <input class="form-control" type="number" name="berat" value="<?php echo $d['berat'];?>">
              </div>
              <div class="form-group">
                <label>Pengambilan</label>
                <input class="form-control" type="date" name="Pengambilan"  value="<?php echo $d['Pengambilan'];?>">
              </div>
              <div class="form-group">
                <label>status</label>
                <input class="form-control" type="Text" name="status"  value="<?php echo $d['status'];?>">
              </div>
              <br>
              <input type="submit" name="ubah" value="Edit Data" class="btn btn-primary" >
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
    <script>
         function changeValue(selectObject) {
            // Mendapatkan nilai IdPaket dan harga dari opsi yang dipilih
            var selectedIdPaket = selectObject.value;
            var selectedHarga = selectObject.options[selectObject.selectedIndex].getAttribute('data-harga');

            // Mengubah nilai input harga dan IdPaket sesuai dengan jenis paket yang dipilih
            document.getElementById('IdPaket').value = selectedIdPaket;
            document.getElementById('harga').value = selectedHarga;
        }
    </script>
    <?php
        if (isset($_POST['ubah'])) {
            include "koneksi.php";
            $idtransaksi = $_POST['IdTransaksi'];
            $idcustomer = $_POST['IdCustomer'];
            $idpaket = $_POST['IdPaket'];
            $berat = $_POST['berat'];
            $harga = $_POST['harga'];
            $hargatotal = $berat * $harga; 
            $pengambilan = $_POST['Pengambilan'];
            $status = $_POST['status'];
    
            $sql2 = "UPDATE tbtransaksi SET IdTransaksi = '$idtransaksi', IdCustomer = '$idcustomer', IdPaket = '$idpaket', berat = '$berat', hargatotal = '$hargatotal', Pengambilan = '$pengambilan', status = '$status' WHERE IdTransaksi = '$idtransaksi'";
            $query = mysqli_query($conn, $sql2);
            if ($query) {
                echo "<script>alert('Data Transaksi telah diubah');</script>";
                echo "<script> location = 'TampilTransaksi.php'</script>";
            } else {
                echo "gagal";
            }
        }
        ?>
    <?php
    }
    ?>
</body>

</html>
