<?php
	require('fpdf182/fpdf.php');
	date_default_timezone_set('Asia/Jakarta');
    $bulan = date('m');

	$pdf = new FPDF ('P','mm','A5');
	$pdf -> AddPage();


	$pdf -> SetFont('Arial','B','16');

	$pdf -> Cell(120,7,'Laundry',0,1,'C');
	$pdf ->SetFont('Arial','','12');
	$pdf ->Cell(110,7,'Cuci cepat , bersih , dan nyaman',0,1,'C');
	$pdf->Cell(110,7,'Telp/fax : (022)1234567',0,1,'C');

	$pdf->Ln(7);

	$pdf -> Cell(130,3,'','B','1','L');
	$pdf -> Cell(130,1,'','B','0','L');

	//line break 10mm
	$pdf->Ln(10);

	//mencetak string 
	$pdf -> SetFont('Arial','B',10);

	$pdf ->SetFont('Arial','','14');

	include 'koneksi.php';
	include 'functions.php';
	$id = $_GET['id']; 
	$member = mysqli_query($conn,"SELECT * FROM tbtransaksi INNER JOIN tbcustomer ON tbcustomer.IdCustomer = tbtransaksi.IdCustomer WHERE IdTransaksi like '%$id%'");;
	while($row = mysqli_fetch_array($member)) {
		$pdf -> Cell(55,6,'ID Transaksi :',0,0,'L');
		$pdf -> Cell(20,6,$row['IdTransaksi'],0,1,'L');
		$pdf -> Cell(55,6,'Nama Member :',0,0,'L');
		$pdf -> Cell(20,6,$row['nama'],0,1,'L');
		$pdf -> Cell(55,6,'Jenis Paket :',0,0,'L');
		$pdf -> Cell(20,6,$row['JenisLaundry'],0,1,'L');
		$pdf -> Cell(55,6,'Alamat :',0,0,'L');
		$pdf -> Cell(20,6,$row['alamat'],0,1,'L');
		$pdf -> Cell(55,6,'Berat :',0,0,'L');
		$pdf -> Cell(20,6,$row['berat'],0,1,'L');
		$pdf -> Cell(55,6,'Harga Total :',0,0,'L');
		$pdf -> Cell(24,6,Rupiah($row['HargaTotal']),0,1,'L');
		$pdf -> Cell(55,6,'Pengambilan :',0,0,'L');
		$pdf -> Cell(20,6,$row['Pengambilan'],0,1,'L');
	}

	$pdf -> Cell(130,3,'','B','1','L');
	$pdf->Ln(7);
	$pdf -> SetFont('Arial','B',10);
	$pdf ->SetFont('Arial','','14');

	$pdf -> Cell(130,3,'','B','1','L');
	$pdf -> Cell(130,1,'','B','0','L');

	//footer
	//posisi 15cm dari bawah =-15
	$pdf->SetY(170);

	//line footer
	$pdf->Line(10,$pdf->GetY(),140,$pdf->GetY());

	//Arial ittalic
	$pdf->SetFont('Arial','I',8);

	$pdf -> Cell(0,7,'STRUK LAUNDRY',0,1,'R');


	//menutup dokumen
	$pdf->Output('I',"CetakStruk.php",false);


?>