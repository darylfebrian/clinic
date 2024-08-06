<?php
// memanggil library FPDF
require('../assets/fpdf/fpdf.php');
include '../koneksi.php';
 
// intance object dan memberikan pengaturan halaman PDF
$pdf=new FPDF('L','mm','A4');
$pdf->AddPage();
 
$pdf->SetFont('Times','B',16);
$pdf->Cell(260,10,'DATA REKAM MEDIS',0,0,'C');
 
$pdf->Cell(10,15,'',0,1);
$pdf->SetFont('Times','B',12);
$pdf->Cell(10,7,'No',1,0,'C');
$pdf->Cell(35,7,'Tanggal Periksa',1,0,'C');
$pdf->Cell(45,7,'Nama Pasien',1,0,'C');
$pdf->Cell(40,7,'Diagnosa' ,1,0,'C');
$pdf->Cell(60,7,'Nama Dokter' ,1,0,'C');
$pdf->Cell(40,7,'Nama Obat' ,1,0,'C');
$pdf->Cell(30,7,'Ruangan',1,0,'C');


 
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Times','',12);
$no=1;
$data = mysqli_query($koneksi,"SELECT  * FROM tb_rekam
 INNER JOIN tb_pasien ON tb_rekam.id_pasien = tb_pasien.id_pasien
 INNER JOIN tb_dokter ON tb_rekam.id_dokter = tb_dokter.id_dokter
 INNER JOIN tb_ruangan ON tb_rekam.id_ruangan = tb_ruangan.id_ruangan
");
while($d = mysqli_fetch_array($data)){
  $pdf->Cell(10,7, $no++,1,0,'C');

    $pdf->Cell(35,7, $d['tanggal_periksa'],1,0);
    $pdf->Cell(45,7, $d['nama_pasien'] ,1,0,'C');
    $pdf->Cell(40,7, $d['diagnosa'] ,1,0);
    $pdf->Cell(60,7, $d['nama_dokter'] ,1,0,'C');
    $pdf->Cell(40,7, $d['obat'] ,1,0,'C');
    $pdf->Cell(30,7, $d['nama_ruangan'] ,1,1,'C');
}
 
$pdf->Output();
 
?>