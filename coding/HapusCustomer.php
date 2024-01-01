<?php
include"koneksi.php";
$IdCustomer =$_GET["IdCustomer"];
$data =mysqli_query($conn, "delete from tbcustomer where IdCustomer ='$IdCustomer'");
$sql2 ="DELETE FROM tbcustomer WHERE IdCustomer='IdCustomer'";
$query = mysqli_query($conn,$sql2);

	if($query)
	{
		header('location:TampilCustomer.php');
	}
?>