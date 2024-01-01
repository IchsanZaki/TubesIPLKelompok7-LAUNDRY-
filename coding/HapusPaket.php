<?php
include"koneksi.php";
$IdPaket =$_GET["IdPaket"];
$data =mysqli_query($conn, "delete from tbpaket where IdPaket ='$IdPaket'");
$sql2 ="DELETE FROM tbpaket WHERE IdPaket='IdPaket'";
$query = mysqli_query($conn,$sql2);

	if($query)
	{
		header('location:TampilPaket.php');
	}
?>