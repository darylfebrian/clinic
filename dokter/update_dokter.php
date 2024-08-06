<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Klinik RYL | Update Data Dokter</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../assets/plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

<?php include ('navbar_dokter.php'); ?>


  <!-- Isi dari dashboard -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1>Dokter</h1>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <?php
// Load file koneksi.php
include "../koneksi.php";
// Ambil data NIS yang dikirim oleh index.php melalui URL
$id_dokter = $_GET['id_dokter'];
// Query untuk menampilkan data siswa berdasarkan nim yang dikirim
$query = "SELECT * FROM tb_dokter WHERE id_dokter='".$id_dokter."'";
$sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
$data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi
$sql
?>
    <!-- Main content -->
    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="aksi_update_dokter.php?id_dokter=<?php echo $id_dokter; ?>" method="POST" enctype="multipart/form-data" >
                <div class="card-body">

                <div class="form-group">
                    <label>Foto</label> <br>
                    <input type="checkbox" name="ubah_foto" value="true"> Ceklis jika ingin mengubah foto<br> <input type="file" name="foto" required>
                  </div>

                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" placeholder="Masukkan Nama" name="nama_dokter" value="<?php echo $data['nama_dokter'];?>" required>
                  </div>

                  <div class="form-group">
                    <label>Gender</label>
                    <select class="form-control select2" style="width: 100%;" name="jenis_kelamin" id="jenis_kelamin"   required>

                    <option <?php if($data['jenis_kelamin'] == 'Pria'){echo "selected";}?> value="Pria">Pria</option>
                    <option <?php if($data['jenis_kelamin'] == 'Wanita'){echo "selected";}?> value="Wanita">Wanita</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>No HP </label>
                    <input type="number" class="form-control" placeholder="Masukkan Nomor HP" name="nomor_telepon" value="<?php echo $data['nomor_telepon'];?>" required>
                  </div>                  

                  <div class="form-group">
                        <label>Alamat </label>
                        <textarea class="form-control" rows="2" placeholder="Masukkan Alamat" name="alamat" required><?php echo $data['alamat'];?>      </textarea>
                    </div>

                <div class="form-group">
                    <label>No STR </label>
                    <input type="number" class="form-control" placeholder="Masukkan Nomor STR" name="nomor_STR" value="<?php echo $data['nomor_STR'];?>" required>
                </div>     

                <div class="form-group">
                    <label>Spesialis </label>
                    <input type="text" class="form-control" placeholder="Masukkan Spesialis" name="spesialis" value="<?php echo $data['spesialis'];?>" required>
                </div> 

                <div class="form-group">
                    <label>Pengalaman </label>
                    <input type="text" class="form-control" placeholder="Masukkan Pengalaman Dokter" name="pengalaman_dokter" value="<?php echo $data['pengalaman_dokter'];?>" required>
                    <br>
                </div> 

                  
                    <!-- /.card-body -->

               
                 <input type="hidden" name="id_dokter" value="<?php echo $data['id_dokter'];?>">
                  <button type="submit" class="btn btn-primary">Submit</button>

               
              </form>
            </div>
    <!-- /.content -->
  </div>
  <!-- End Isi dari dashboard -->





  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../assets/plugins/moment/moment.min.js"></script>
<script src="../assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.js"></script>
</body>
</html>
