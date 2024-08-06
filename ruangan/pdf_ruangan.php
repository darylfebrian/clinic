<?php
// memanggil library FPDF
require('../assets/fpdf/fpdf.php');
include '../koneksi.php';
 
// intance object dan memberikan pengaturan halaman PDF
$pdf=new FPDF('P','mm','A4');
$pdf->AddPage();
 
$pdf->SetFont('Times','B',18);
$pdf->Cell(200,10,'DATA RUANGAN',0,0,'C');
 
$pdf->Cell(10,15,'',0,1);
$pdf->SetFont('Times','B',16);
$pdf->Cell(15,7,'No',1,0,'C');
$pdf->Cell(75,7,'Nama',1,0,'C');
$pdf->Cell(75,7,'Keterangan',1,0,'C');


 
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Times','',16);
$no=1;
$data = mysqli_query($koneksi,"SELECT  * FROM tb_ruangan");
while($d = mysqli_fetch_array($data)){
  $pdf->Cell(15,7, $no++,1,0,'C');


    $pdf->Cell(75,7, $d['nama_ruangan'],1,0);
    $pdf->Cell(75,7, $d['keterangan'] ,1,1);
}
 
$pdf->Output();
 
?>