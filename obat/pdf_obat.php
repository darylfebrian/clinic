<?php
// memanggil library FPDF
require('../assets/fpdf/fpdf.php');
include '../koneksi.php';
 
// intance object dan memberikan pengaturan halaman PDF
$pdf=new FPDF('P','mm','A4');
$pdf->AddPage();
 
$pdf->SetFont('Times','B',14);
$pdf->Cell(200,10,'DATA OBAT',0,0,'C');
 
$pdf->Cell(10,15,'',0,1);
$pdf->SetFont('Times','B',10);
$pdf->Cell(8,7,'No',1,0,'C');
$pdf->Cell(30,7,'Nama',1,0,'C');
$pdf->Cell(30,7,'Bentuk',1,0,'C');
$pdf->Cell(25,7,'Golongan' ,1,0,'C');
$pdf->Cell(25,7,'Kategori' ,1,0,'C');
$pdf->Cell(35,7,'Digunakan Oleh' ,1,0,'C');
$pdf->Cell(37,7,'Manfaat',1,0,'C');


 
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Times','',12);
$no=1;
$data = mysqli_query($koneksi,"SELECT  * FROM tb_obat");
while($d = mysqli_fetch_array($data)){
  $pdf->Cell(8,7, $no++,1,0,'C');

    $pdf->Cell(30,7, $d['nama_obat'],1,0);
    $pdf->Cell(30,7, $d['bentuk'] ,1,0,'C');
    $pdf->Cell(25,7, $d['golongan'] ,1,0,'C');
    $pdf->Cell(25,7, $d['kategori'] ,1,0);
    $pdf->Cell(35,7, $d['digunakan_oleh'] ,1,0);
    $pdf->Cell(37,7, $d['manfaat'] ,1,1);
}
 
$pdf->Output();
 
?>