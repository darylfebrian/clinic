<?php
session_start();

$id_rekam = $_POST['id_rekam'];
$tanggal_periksa = $_POST['tanggal_periksa'];
$id_pasien = $_POST['id_pasien'];
$diagnosa = $_POST['diagnosa'];
$id_dokter = $_POST['id_dokter'];
$obat = $_POST['obat'];
$id_ruangan = $_POST['id_ruangan'];

include("../koneksi.php");

$sql = "UPDATE tb_rekam SET tanggal_periksa='$tanggal_periksa', id_pasien='$id_pasien', diagnosa='$diagnosa', id_dokter='$id_dokter', obat='$obat', id_ruangan='$id_ruangan' WHERE id_rekam='$id_rekam'";

$query = mysqli_query($koneksi, $sql);
if ($query) {
	$_SESSION['eksekusi'] = "Data Berhasil di Update";
    header("location:tampil_rekam.php?hal=tampil_rekam&pesan=berhasil_edit");
} else {
    header("location:tampil_rekam.php?hal=tampil_rekam&pesan=gagal_edit");
    echo mysqli_error($koneksi);
    echo "$sql";
}
?>