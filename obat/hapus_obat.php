<?php
session_start();

include("../koneksi.php");
$sql="delete from tb_obat where id_obat='$_GET[id_obat]'";
$query=mysqli_query($koneksi,$sql);
if ($query) {
	$_SESSION['eksekusi'] = "Data Berhasil di Hapus";
	header("location:tampil_obat.php?hal=tampil_obat&pesan=berhasil_hapus");
}else{
	header("location:tampil_obat.php?hal=tampil_obat&pesan=gagal_hapus");
	echo mysqli_error();
	echo "$sql";
}
?>