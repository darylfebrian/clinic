<?php
session_start();

$tanggal_periksa = $_POST['tanggal_periksa'];
$id_pasien = $_POST['id_pasien'];
$diagnosa = $_POST['diagnosa'];
$id_dokter = $_POST['id_dokter'];
$obat = $_POST['obat'];
$id_ruangan = $_POST['id_ruangan'];

include("../koneksi.php");

$sql="insert into tb_rekam( tanggal_periksa, id_pasien, diagnosa, id_dokter, obat, id_ruangan) VALUES ( '$tanggal_periksa', '$id_pasien', '$diagnosa', '$id_dokter', '$obat' ,'$id_ruangan')";


$query=mysqli_query($koneksi,$sql);
if ($query) {
	$_SESSION['eksekusi'] = "Data Berhasil di Tambahkan";
	header("location:tampil_rekam.php?hal=tampil_rekam&pesan=berhasil_tambah");
}else{
	header("location:tampil_rekam.php?hal=tampil_rekam&pesan=gagal_tambah");
	echo mysqli_error();
	echo "$sql";
}
