<?php
require('fpdf182/fpdf.php');
$pdf = new FPDF('p','mm','a4');
$pdf -> AddPage();
$pdf -> SetFont('Arial','B','16');

$pdf ->Cell(190,7,'E - Laundry' ,0,1,'C');
$pdf ->SetFont('Arial','','12');
$pdf ->Cell(190,3,'Cuci cepat dan bersih',0,1,'C');

$pdf->Cell(190,7,'Jl. asdasdasdadadasda',0,1,'C');
$pdf->Cell(190,4,'Telp/fax : (022)1432141 Email : Laundry@gmail.com Kota Cimahi 40512',0,1,'C');

$pdf->Cell(190,3,'','B',1,'L');
$pdf->Cell(190,1,'','B',0,'L');

$pdf->Ln(10);
	//mencetak string
$pdf -> Cell(190,7,'Data Transaksi E-Laundry',0,1,'C');
$pdf -> Cell(190,7,'Data Transaksi',0,1,'J');
	$pdf ->lN(5);
//mencetak string 
	$pdf -> SetFont('Arial','B',10);
	$pdf -> Cell(24,6,'ID Transaksi',1,0,'C');
	$pdf -> Cell(24,6,'ID Customer',1,0,'C');
    $pdf -> Cell(24,6,'Nama',1,0,'C');
	$pdf -> Cell(24,6,'Nama Paket',1,0,'C');
	$pdf -> Cell(24,6,'alamat',1,0,'C');
	$pdf -> Cell(24,6,'Berat',1,0,'C');
    $pdf -> Cell(24,6,'Pengambilan',1,0,'C');
    $pdf -> Cell(24,6,'Harga Total',1,1,'C');

	$pdf ->SetFont('Arial','','10');

	include 'koneksi.php';
	include 'functions.php';
	$awal=$_POST['awal'];
	$akhir=$_POST['akhir'];
	$customer = mysqli_query($conn,"SELECT * FROM tbtransaksi INNER JOIN tbcustomer ON tbcustomer.IdCustomer = tbtransaksi.IdCustomer INNER JOIN tbpaket ON tbpaket.IdPaket = tbtransaksi.IdPaket WHERE Pengambilan BETWEEN '".$awal."' and '".$akhir."'");
	while($row = mysqli_fetch_array($customer)) {
		$pdf -> Cell(24,6,$row['IdTransaksi'],1,0,'C');
		$pdf -> Cell(24,6,$row['IdCustomer'],1,0,'C');
        $pdf -> Cell(24,6,$row['nama'],1,0,'C');
		$pdf -> Cell(24,6,$row['JenisPaket'],1,0,'C');
        $pdf -> Cell(24,6,$row['alamat'],1,0,'C');
        $pdf -> Cell(24,6,$row['berat'],1,0,'C');
        $pdf -> Cell(24,6,date('d-m-Y', strtotime($row["Pengambilan"])),1,0,'C');
        $pdf -> Cell(24,6,rupiah($row['HargaTotal']),1,1,'C');
	}

	$pdf -> SetFont('Arial','B',10);
	$pdf ->SetFont('Arial','','10');

	include 'koneksi.php';
	 $a = 0;
	 $sql = mysqli_query($conn,"SELECT * FROM tbtransaksi WHERE Pengambilan BETWEEN '".$awal."' and '".$akhir."' ORDER BY IdTransaksi");
	 while($data = mysqli_fetch_array($sql)) {
	 	$a++;
	 	$total[$a] = $data['HargaTotal'];
	 }
	 	$pdf -> Cell(168,6,'Total Pendapatan :',1,0,'C');
	 	$pdf -> Cell(24,6,"" .rupiah(array_sum($total)),1,0,'C');


	$pdf->SetY(175);
	$pdf -> SetFont('Arial','B',11);
	$pdf -> Cell(190,3,'Hormat Saya',0,1,'R');
	$pdf -> Cell(190,3,'Owner Outlet',0,1,'R');

	$pdf->SetY(215);
	$pdf -> SetFont('Arial','B',11);
	$pdf -> Cell(190,3,'Ichsan Zaki Heryadi',0,1,'R');
	$pdf -> Cell(190,3,'Laundry Cimahi',0,1,'R');

	$pdf->SetY(210);

	$pdf->Line(145,$pdf->GetY(),200,$pdf->GetY());
	//footer
	//posisi 15cm dari bawah =-15
	$pdf->SetY(260);

	//line footer
	$pdf->Line(10,$pdf->GetY(),200,$pdf->GetY());

	//Arial ittalic
	$pdf->SetFont('Arial','I',8);

	$pdf -> Cell(0,7,'DATA LAUNDRY',0,1,'R');

	//page number
	$pdf -> Cell(0,5,'page '.$pdf->Pageno().'/{nb}',0,0,'C');


	//menutup dokumen
	$pdf->Output('I',"cetak_struk.php",false);
?>