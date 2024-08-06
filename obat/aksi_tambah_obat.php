<?php
session_start();

$nama_obat = $_POST['nama_obat'];
$bentuk = $_POST['bentuk'];
$golongan = $_POST['golongan'];
$kategori = $_POST['kategori'];
$digunakan_oleh = $_POST['digunakan_oleh'];
$manfaat = $_POST['manfaat'];

include("../koneksi.php");

$sql="insert into tb_obat( nama_obat, bentuk, golongan, kategori, digunakan_oleh, manfaat) VALUES ( '$nama_obat', '$bentuk', '$golongan', '$kategori', '$digunakan_oleh', '$manfaat')";

$query=mysqli_query($koneksi,$sql);
if ($query) {
	$_SESSION['eksekusi'] = "Data Berhasil di Tambahkan";
	header("location:tampil_obat.php?hal=tampil_obat&pesan=berhasil_tambah");
}else{
	header("location:tampil_obat.php?hal=tampil_obat&pesan=gagal_tambah");
	echo mysqli_error();
	echo "$sql";
}
