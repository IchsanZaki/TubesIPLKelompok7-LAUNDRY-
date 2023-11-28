<?php
include"koneksi.php";
$IdTransaksi =$_GET["IdTransaksi"];
$data =mysqli_query($conn, "delete from tbtransaksi where IdTransaksi ='$IdTransaksi'");
$sql2 ="DELETE FROM tbtransaksi WHERE IdTransaksi='IdTransaksi'";
$query = mysqli_query($conn,$sql2);

	if($query)
	{
		header('location:TampilTransaksi.php');
	}
?>