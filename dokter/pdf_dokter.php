<?php
// memanggil library FPDF
require('../assets/fpdf/fpdf.php');
include '../koneksi.php';
 
// intance object dan memberikan pengaturan halaman PDF
$pdf=new FPDF('L','mm','A4');
$pdf->AddPage();
 
$pdf->SetFont('Times','B',13);
$pdf->Cell(280,10,'DATA DOKTER',0,0,'C');
 
$pdf->Cell(10,15,'',0,1);
$pdf->SetFont('Times','B',9);
$pdf->Cell(10,7,'No',1,0,'C');
$pdf->Cell(50,7,'Nama',1,0,'C');
$pdf->Cell(20,7,'Gender',1,0,'C');
$pdf->Cell(30,7,'No HP' ,1,0,'C');
$pdf->Cell(40,7,'Alamat' ,1,0,'C');
$pdf->Cell(27,7,'No STR' ,1,0,'C');
$pdf->Cell(30,7,'Spesialis' ,1,0,'C');
$pdf->Cell(30,7,'Pengalaman',1,0,'C');


 
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Times','',10);
$no=1;
$data = mysqli_query($koneksi,"SELECT  * FROM tb_dokter");
while($d = mysqli_fetch_array($data)){
  $pdf->Cell(10,7, $no++,1,0,'C');


    $pdf->Cell(50,7, $d['nama_dokter'],1,0);
    $pdf->Cell(20,7, $d['jenis_kelamin'] ,1,0,'C');
    $pdf->Cell(30,7, $d['nomor_telepon'] ,1,0,'C');
    $pdf->Cell(40,7, $d['alamat'] ,1,0);
    $pdf->Cell(27,7, $d['nomor_STR'] ,1,0,'C');
    $pdf->Cell(30,7, $d['spesialis'] ,1,0);
    $pdf->Cell(30,7, $d['pengalaman_dokter'] ,1,1,'C');
}
 
$pdf->Output();
 
?>