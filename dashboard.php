<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="assets/plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">


<div class="wrapper">
<?php
include "koneksi.php";

// Membuat koneksi ke database
// Membuat koneksi ke database
$mysqli = mysqli_connect("localhost", "root", "", "db_klinik");

// Memeriksa koneksi
if (!$mysqli) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Hitung jumlah data dokter
$queryCountDok = "SELECT COUNT(*) as total_dok FROM tb_dokter";
$resultCountDok = mysqli_query($mysqli, $queryCountDok);

// Hitung jumlah data pasien
$queryCountSien = "SELECT COUNT(*) as total_sien FROM tb_pasien";
$resultCountSien = mysqli_query($mysqli, $queryCountSien);

// Hitung jumlah data obat
$queryCountBat = "SELECT COUNT(*) as total_bat FROM tb_obat";
$resultCountBat = mysqli_query($mysqli, $queryCountBat);

// Hitung jumlah data rekam
$queryCountKam = "SELECT COUNT(*) as total_kam FROM tb_rekam";
$resultCountKam = mysqli_query($mysqli, $queryCountKam);

// Hitung jumlah data ruangan
$queryCountRua = "SELECT COUNT(*) as total_rua FROM tb_ruangan";
$resultCountRua = mysqli_query($mysqli, $queryCountRua);

// Periksa hasil query untuk dokter
if ($resultCountDok) {
    $rowCountDok = mysqli_fetch_assoc($resultCountDok);
    $totalDok = $rowCountDok['total_dok'];
    $totalDok;
} else {
    echo "Error in query for dokter: " . mysqli_error($mysqli);
}

// Periksa hasil query untuk pasien
if ($resultCountSien) {
    $rowCountSien = mysqli_fetch_assoc($resultCountSien);
    $totalSien = $rowCountSien['total_sien'];
    
} else {
    echo "Error in query for pasien: " . mysqli_error($mysqli);
}

// Periksa hasil query untuk obat
if ($resultCountBat) {
  $rowCountBat = mysqli_fetch_assoc($resultCountBat);
  $totalBat = $rowCountBat['total_bat'];
  $totalBat;
} else {
  echo "Error in query for obat: " . mysqli_error($mysqli);
}

// Periksa hasil query untuk rekam
if ($resultCountKam) {
  $rowCountKam = mysqli_fetch_assoc($resultCountKam);
  $totalKam = $rowCountKam['total_kam'];
 $totalKam;
} else {
  echo "Error in query for rekam: " . mysqli_error($mysqli);
}

// Periksa hasil query untuk ruangan
if ($resultCountRua) {
  $rowCountRua = mysqli_fetch_assoc($resultCountRua);
  $totalRua = $rowCountRua['total_rua'];
 $totalRua;
} else {
  echo "Error in query for rekam: " . mysqli_error($mysqli);
}

// Pastikan untuk menutup koneksi database setelah digunakan
mysqli_close($mysqli);


session_start();
if($_SESSION['status']!="login"){
  header("location:index.html?pesan=belum_login");
}
?>
  <!-- header -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light bg-lightblue" style="box-shadow: none">
    <!-- Hamburger Menu -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars text-light"></i></a>
      </li>
    </ul>

    <!-- Header Right  -->
    <ul class="navbar-nav ml-auto" style="box-shadow: none;">

        <!-- gambar orang tampil username dan logout -->
        <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fa fa-user text-light"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <div class="media">
              <div class="media-body">
                <h3 class="dropdown-item-title" align="center">
                <?php echo $_SESSION['username'];?>
                </h3>
              </div>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="logout.php" class="dropdown-item dropdown-footer navbar-danger small-box inner" >Logout</a>
        </div>
        <!-- gambar orang tampil username dan logout -->

      <!-- Start full screen -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt text-light"></i>
        </a>
      </li>
      <!-- End full screen -->
      

    </ul>
      <!-- End Header Right -->

  </nav>
  <!-- /.End header -->


  <!-- Isi Menu Hamurger -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand Logo -->
    <a href="#" class="brand-link bg-lightblue">
      <img src="assets/dist/img/RYL3.png" alt="logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Klinik RYL</span>
    </a>
    <!-- End Brand Logo -->

    <!-- Sidebar -->
    <div class="sidebar"  >

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <!-- Menu Dashboard -->
          <li class="nav-item">
            <a href="dashboard.php" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>

            </a>
          </li>
          <!-- End Menu Dashboard -->

          <!-- Menu Dokter -->
          <li class="nav-item">
            <a href="dokter/tampil_dokter.php" class="nav-link">
            <i class="nav-icon fa fa-stethoscope"></i>
              <p>
                Dokter
              </p>
            </a>
          </li>
           <!-- End Menu Dokter --> 
         
          <!-- Menu Pasien -->
          <li class="nav-item">
            <a href="pasien/tampil_pasien.php" class="nav-link">
            <i class="nav-icon fa fa-hospital-user"></i>
              <p>
                Pasien
              </p>
            </a>
          </li>
          <!-- End Menu Pasien --> 

          <!-- Menu Obat -->
          <li class="nav-item">
            <a href="obat/tampil_obat.php" class="nav-link">
            <i class="nav-icon fa fa-tablets"></i>
              <p>
                Obat
              </p>
            </a>
          </li>
          <!-- End Menu Obat --> 

          <!-- Menu Ruangan -->
          <li class="nav-item">
            <a href="ruangan/tampil_ruangan.php" class="nav-link">
            <i class="nav-icon fa fa-bed"></i>
              <p>
                Ruangan
              </p>
            </a>
          </li>
          <!-- End Menu Ruangan --> 

          <!-- Menu Rekam Medis -->
          <li class="nav-item">
            <a href="rekam medis/tampil_rekam.php" class="nav-link">
            <i class="nav-icon fa fa-file-medical"></i>
              <p>
                Rekam Medis
              </p>
            </a>
          </li>
          <!-- End Menu Rekam Medis --> 
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>



  <!-- Isi dari dashboard -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

     <!-- Main content -->
     <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="nav-icon fa fa-stethoscope"></i></span>

              <div class="info-box-content">
              <span class="info-box-text">Dokter</span>
                <span class="info-box-number">
                <?php echo $totalDok; ?>
                </span>
                <a href="dokter/tampil_dokter.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="nav-icon fa fa-hospital-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pasien</span>
                <span class="info-box-number">
                <?php echo $totalSien; ?>
                </span>
                <a href="pasien/tampil_pasien.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="nav-icon fa fa-tablets"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">obat</span>
                <span class="info-box-number">
                <?php echo $totalBat; ?>
                </span>
                <a href="obat/tampil_obat.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"> <i class="nav-icon fa fa-bed"></i>
              </span>

              <div class="info-box-content">
                <span class="info-box-text">Ruangan</span>
                <span class="info-box-number">
                <?php echo $totalRua; ?>
                </span>
                <a href="ruangan/tampil_ruangan.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-primary elevation-1">
              <i class="nav-icon fa fa-file-medical"></i>
              </span>

              <div class="info-box-content">
                <span class="info-box-text">Rekam Medis</span>
                <span class="info-box-number">
                <?php echo $totalKam; ?>
                </span>
                <a href="rekam medis/tampil_rekam.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        </div>
        <!-- /.row -->



      </div><!--/. container-fluid -->
    </section>
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
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="assets/plugins/moment/moment.min.js"></script>
<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.js"></script>

</body>
</html>
