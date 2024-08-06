<?php
session_start();

include("../koneksi.php");
$sql="delete from tb_pasien where id_pasien='$_GET[id_pasien]'";
$query=mysqli_query($koneksi,$sql);
if ($query) {
	$_SESSION['eksekusi'] = "Data Berhasil di Hapus";
	header("location:tampil_pasien.php?hal=tampil_pasien&pesan=berhasil_hapus");
}else{
	header("location:tampil_pasien.php?hal=tampil_pasien&pesan=gagal_hapus");
	echo mysqli_error();
	echo "$sql";
}
?>