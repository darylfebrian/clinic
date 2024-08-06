<?php
session_start();

$id_pasien = $_POST['id_pasien'];
$nama_pasien = $_POST['nama_pasien'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$nomor_telepon = $_POST['nomor_telepon'];
$alamat = $_POST['alamat'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];

include("../koneksi.php");

$sql = "UPDATE tb_pasien SET nama_pasien='$nama_pasien', jenis_kelamin='$jenis_kelamin', nomor_telepon='$nomor_telepon', alamat='$alamat', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir' WHERE id_pasien='$id_pasien'";

$query = mysqli_query($koneksi, $sql);
if ($query) {
	$_SESSION['eksekusi'] = "Data Berhasil di Update";

    header("location:tampil_pasien.php?hal=tampil_pasien&pesan=berhasil_edit");
} else {
    header("location:tampil_pasien.php?hal=tampil_pasien&pesan=gagal_edit");
    echo mysqli_error($koneksi);
    echo "$sql";
}
?>