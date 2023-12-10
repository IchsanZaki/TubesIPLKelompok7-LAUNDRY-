<?php
include"koneksi.php";
$IdPegawai =$_GET["IdPegawai"];
$data =mysqli_query($conn, "delete from tbpegawai where IdPegawai ='$IdPegawai'");
$sql2 ="DELETE FROM tbpegawai WHERE IdPegawai='IdPegawai'";
$query = mysqli_query($conn,$sql2);

	if($query)
	{
		header('location:TampilPegawai.php');
	}
?>