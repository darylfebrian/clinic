<?php
session_start();

include "../koneksi.php";

$id_dokter = $_GET['id_dokter'];
$nama_dokter = $_POST['nama_dokter'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$nomor_telepon = $_POST['nomor_telepon'];
$alamat = $_POST['alamat'];
$nomor_STR = $_POST['nomor_STR'];
$spesialis = $_POST['spesialis'];
$pengalaman_dokter = $_POST['pengalaman_dokter'];

if (isset($_POST['ubah_foto'])) {
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    $fotobaru = date('dmYHis') . $foto;
    $path = "../assets/images/" . $fotobaru;

    if (move_uploaded_file($tmp, $path)) {
        $query = "SELECT * FROM tb_dokter WHERE id_dokter='$id_dokter'";
        $sql = mysqli_query($koneksi, $query);
        $data = mysqli_fetch_array($sql);

        if (is_file("../assets/images/" . $data['foto'])) {
            unlink("../assets/images/" . $data['foto']);
        }

        $query = "UPDATE tb_dokter SET 
        nama_dokter='$nama_dokter', jenis_kelamin='$jenis_kelamin', nomor_telepon='$nomor_telepon', alamat='$alamat', nomor_STR='$nomor_STR', spesialis='$spesialis', pengalaman_dokter='$pengalaman_dokter', foto='$fotobaru' WHERE id_dokter='$id_dokter'";
        $sql = mysqli_query($koneksi, $query);

        if ($sql) {
	$_SESSION['eksekusi'] = "Data Berhasil di Update";
            header("location: tampil_dokter.php");
        } else {
            echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
            echo "<br><a href='update_dokter.php'>Kembali Ke Form</a>";
        }
    } else {
        echo "Maaf, Gambar gagal untuk diupload.";
        echo "<br><a href='update_dokter.php'>Kembali Ke Form</a>";
    }
} else {
    $query = "UPDATE tb_dokter SET 
        nama_dokter='$nama_dokter', jenis_kelamin='$jenis_kelamin', nomor_telepon='$nomor_telepon', alamat='$alamat', nomor_STR='$nomor_STR', spesialis='$spesialis', pengalaman_dokter='$pengalaman_dokter' WHERE id_dokter='$id_dokter'";
    $sql = mysqli_query($koneksi, $query);

    if ($sql) {
	$_SESSION['eksekusi'] = "Data Berhasil di Update";
        header("location: tampil_dokter.php");
    } else {
        echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
        echo "<br><a href='update_dokter.php'>Kembali Ke Form</a>";
    }
}
?>
