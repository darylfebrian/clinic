<?php
session_start();

include("../koneksi.php");

$nama_dokter = $_POST['nama_dokter'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$nomor_telepon = $_POST['nomor_telepon'];
$alamat = $_POST['alamat'];
$nomor_STR = $_POST['nomor_STR'];
$spesialis = $_POST['spesialis'];
$pengalaman_dokter = $_POST['pengalaman_dokter'];
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];
$path = "../assets/images/".$foto;




if(move_uploaded_file($tmp, $path)){
    $query = "INSERT INTO tb_dokter ( nama_dokter, jenis_kelamin, nomor_telepon, alamat, nomor_STR, spesialis, pengalaman_dokter, foto) VALUES ('$nama_dokter', '$jenis_kelamin', '$nomor_telepon', '$alamat', '$nomor_STR', '$spesialis', '$pengalaman_dokter', '$foto')";
	
    $sql = mysqli_query($koneksi, $query);

    if($sql){
	$_SESSION['eksekusi'] = "Data Berhasil di Tambahkan";
        header("location: tampil_dokter.php");
    } else {
        echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
        echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
    }
} else {
    echo "Maaf, Gambar gagal untuk diupload.";
    echo "<br><a href='tambah_dokter.php'>Kembali Ke Form</a>";
}
?>