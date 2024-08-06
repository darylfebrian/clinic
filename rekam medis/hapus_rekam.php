<?php
session_start();

include("../koneksi.php");
$sql="delete from tb_rekam where id_rekam='$_GET[id_rekam]'";
$query=mysqli_query($koneksi,$sql);
if ($query) {
	$_SESSION['eksekusi'] = "Data Berhasil di Hapus";
	header("location:tampil_rekam.php?hal=tampil_rekam&pesan=berhasil_hapus");
}else{
	header("location:tampil_rekam.php?hal=tampil_rekam&pesan=gagal_hapus");
	echo mysqli_error();
	echo "$sql";
}
?>