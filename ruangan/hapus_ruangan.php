<?php
session_start();

include("../koneksi.php");
$sql="delete from tb_ruangan where id_ruangan='$_GET[id_ruangan]'";
$query=mysqli_query($koneksi,$sql);
if ($query) {
	$_SESSION['eksekusi'] = "Data Berhasil di Hapus";
	header("location:tampil_ruangan.php?hal=tampil_ruangan&pesan=berhasil_hapus");
}else{
	header("location:tampil_ruangan.php?hal=tampil_ruangan&pesan=gagal_hapus");
	echo mysqli_error();
	echo "$sql";
}
?>