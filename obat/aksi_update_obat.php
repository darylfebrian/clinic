<?php
session_start();

$id_obat = $_POST['id_obat'];
$nama_obat = $_POST['nama_obat'];
$bentuk = $_POST['bentuk'];
$golongan = $_POST['golongan'];
$kategori = $_POST['kategori'];
$digunakan_oleh = $_POST['digunakan_oleh'];
$manfaat = $_POST['manfaat'];

include("../koneksi.php");

$sql = "UPDATE tb_obat SET nama_obat='$nama_obat', bentuk='$bentuk', golongan='$golongan', kategori='$kategori', digunakan_oleh='$digunakan_oleh', manfaat='$manfaat' WHERE id_obat='$id_obat'";

$query = mysqli_query($koneksi, $sql);
if ($query) {
	$_SESSION['eksekusi'] = "Data Berhasil di Update";
    header("location:tampil_obat.php?hal=tampil_obat&pesan=berhasil_edit");
} else {
    header("location:tampil_obat.php?hal=tampil_obat&pesan=gagal_edit");
    echo mysqli_error($koneksi);
    echo "$sql";
}
?>