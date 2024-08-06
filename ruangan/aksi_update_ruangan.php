<?php
session_start();

$id_ruangan = $_POST['id_ruangan'];
$nama_ruangan = $_POST['nama_ruangan'];
$keterangan = $_POST['keterangan'];


include("../koneksi.php");

$sql = "UPDATE tb_ruangan SET nama_ruangan='$nama_ruangan', keterangan='$keterangan' WHERE id_ruangan='$id_ruangan'";

$query = mysqli_query($koneksi, $sql);
if ($query) {
    $_SESSION['eksekusi'] = "Data Berhasil di Update";
    header("location:tampil_ruangan.php?hal=tampil_ruangan&pesan=berhasil_edit");
} else {
    header("location:tampil_ruangan.php?hal=tampil_ruangan&pesan=gagal_edit");
    echo mysqli_error($koneksi);
    echo "$sql";
}
?>