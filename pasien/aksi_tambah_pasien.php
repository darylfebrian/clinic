<?php
session_start();

$nama_pasien = $_POST['nama_pasien'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$nomor_telepon = $_POST['nomor_telepon'];
$alamat = $_POST['alamat'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];

include("../koneksi.php");

$sql="insert into tb_pasien( nama_pasien, jenis_kelamin, nomor_telepon, alamat, tempat_lahir, tanggal_lahir) VALUES ( '$nama_pasien', '$jenis_kelamin', '$nomor_telepon', '$alamat', '$tempat_lahir', '$tanggal_lahir')";

$query=mysqli_query($koneksi,$sql);
if ($query) {
	$_SESSION['eksekusi'] = "Data Berhasil di Tambahkan";

	header("location:tampil_pasien.php?hal=tampil_pasien&pesan=berhasil_tambah");
}else{
	header("location:tampil_pasien.php?hal=tampil_pasien&pesan=gagal_tambah");
	echo mysqli_error();
	echo "$sql";
}







