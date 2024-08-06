<?php
session_start();

include("../koneksi.php");
$sql="delete from tb_dokter where id_dokter='$_GET[id_dokter]'";
$query=mysqli_query($koneksi,$sql);
if ($query) {
	$_SESSION['eksekusi'] = "Data Berhasil di Hapus";
	header("location:tampil_dokter.php?hal=tampil_dokter&pesan=berhasil_hapus");
}else{
	header("location:tampil_dokter.php?hal=tampil_dokter&pesan=gagal_hapus");
	echo mysqli_error();
	echo "$sql";
}
?>