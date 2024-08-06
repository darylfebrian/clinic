<?php
// memanggil library FPDF
require('../assets/fpdf/fpdf.php');
include '../koneksi.php';
 
// intance object dan memberikan pengaturan halaman PDF
$pdf=new FPDF('L','mm','A4');
$pdf->AddPage();
 
$pdf->SetFont('Times','B',16);
$pdf->Cell(260,10,'DATA PASIEN',0,0,'C');
 
$pdf->Cell(10,15,'',0,1);
$pdf->SetFont('Times','B',12);
$pdf->Cell(10,7,'No',1,0,'C');
$pdf->Cell(50,7,'Nama',1,0,'C');
$pdf->Cell(20,7,'Gender',1,0,'C');
$pdf->Cell(30,7,'No HP' ,1,0,'C');
$pdf->Cell(40,7,'Alamat' ,1,0,'C');
$pdf->Cell(35,7,'Tempat Lahir' ,1,0,'C');
$pdf->Cell(30,7,'Tanggal Lahir',1,0,'C');


 
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Times','',12);
$no=1;
$data = mysqli_query($koneksi,"SELECT  * FROM tb_pasien");
while($d = mysqli_fetch_array($data)){
  $pdf->Cell(10,7, $no++,1,0,'C');

    $pdf->Cell(50,7, $d['nama_pasien'],1,0);
    $pdf->Cell(20,7, $d['jenis_kelamin'] ,1,0,'C');
    $pdf->Cell(30,7, $d['nomor_telepon'] ,1,0,'C');
    $pdf->Cell(40,7, $d['alamat'] ,1,0);
    $pdf->Cell(35,7, $d['tempat_lahir'] ,1,0,'C');
    $pdf->Cell(30,7, $d['tanggal_lahir'] ,1,1,'C');
}
 
$pdf->Output();
 
?>