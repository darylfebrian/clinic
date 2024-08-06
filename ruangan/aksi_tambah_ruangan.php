<?php
session_start();

$nama_ruangan = $_POST['nama_ruangan'];
$keterangan = $_POST['keterangan'];

include("../koneksi.php");

$sql = "INSERT INTO tb_ruangan(nama_ruangan, keterangan) VALUES ('$nama_ruangan', '$keterangan')";
$query = mysqli_query($koneksi, $sql);

if ($query) {
    $_SESSION['eksekusi'] = "Data Berhasil di Tambahkan";
    header("location:tampil_ruangan.php");
} else {
    header("location:tambah_ruangan.php");
    echo mysqli_error($koneksi);
    echo "$sql";
}
?>
