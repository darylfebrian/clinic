<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Klinik RYL | Update Data Rekam</title>

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


<?php include ('navbar_rekam.php'); ?>


  <!-- Isi dari dashboard -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1>Rekam</h1>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
   <!-- /.content-header -->
<?php
include("../koneksi.php");

// Mendapatkan data rekam medis yang akan diupdate
$id_rekam = isset($_GET['id_rekam']) ? $_GET['id_rekam'] : '';
$sql = "SELECT * FROM tb_rekam WHERE id_rekam='$id_rekam'";
$query = mysqli_query($koneksi, $sql);

// Pastikan query berhasil dijalankan dan ada hasilnya
if ($query) {
    $data = mysqli_fetch_array($query);

    // Mendapatkan data pasien untuk opsi dropdown
    $query_pasien = mysqli_query($koneksi, "SELECT * FROM tb_pasien ORDER BY nama_pasien ASC") or die(mysqli_error($koneksi));

        // Mendapatkan data dokter untuk opsi dropdown
        $query_dokter = mysqli_query($koneksi, "SELECT * FROM tb_dokter ORDER BY nama_dokter ASC") or die(mysqli_error($koneksi));

                // Mendapatkan data ruangan untuk opsi dropdown
                $query_ruangan = mysqli_query($koneksi, "SELECT * FROM tb_ruangan ORDER BY nama_ruangan ASC") or die(mysqli_error($koneksi));
} else {
    // Handle kesalahan query
    echo "Error: " . mysqli_error($koneksi);
}
?>

<!-- Main content -->
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Update Data</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="aksi_update_rekam.php" method="POST">
        <div class="card-body">

            <input type="hidden" name="id_rekam" value="<?php echo $data['id_rekam']; ?>" required>

            <div class="form-group">
                <label>Tanggal Periksa </label>
                <input type="date" class="form-control" placeholder="Masukkan Tanggal Periksa" name="tanggal_periksa"
                    value="<?php echo $data['tanggal_periksa']; ?>" required>
            </div>

            <div class="form-group">
                <label>Nama Pasien</label>
                <select class="form-control select2" style="width: 100%;" name="id_pasien" id="id_pasien" required>
                    <?php
                    while ($row_pasien = mysqli_fetch_array($query_pasien)) {
                        $selected = ($data['id_pasien'] == $row_pasien['id_pasien']) ? "selected" : "";
                        echo "<option value=$row_pasien[id_pasien] $selected> $row_pasien[nama_pasien] </option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label>Diagnosa</label>
                <input type="text" class="form-control" placeholder="Masukkan Diagnosa" name="diagnosa"
                    value="<?php echo $data['diagnosa']; ?>" required>
            </div>



            <div class="form-group">
                <label>Nama dokter</label>
                <select class="form-control select2" style="width: 100%;" name="id_dokter" id="id_dokter" required>
                    <?php
                    while ($row_dokter = mysqli_fetch_array($query_dokter)) {
                        $selected = ($data['id_dokter'] == $row_dokter['id_dokter']) ? "selected" : "";
                        echo "<option value=$row_dokter[id_dokter] $selected> $row_dokter[nama_dokter] </option>";
                    }
                    ?>
                </select>
            </div>


            <div class="form-group">
                <label>Nama Obat</label>
                <input type="text" class="form-control" placeholder="Masukkan Nama Obat" name="obat"
                    value="<?php echo $data['obat']; ?>" required>
            </div>


            <div class="form-group">
                <label>Nama ruangan</label>
                <select class="form-control select2" style="width: 100%;" name="id_ruangan" id="id_ruangan" required>
                    <?php
                    while ($row_ruangan = mysqli_fetch_array($query_ruangan)) {
                        $selected = ($data['id_ruangan'] == $row_ruangan['id_ruangan']) ? "selected" : "";
                        echo "<option value=$row_ruangan[id_ruangan] $selected> $row_ruangan[nama_ruangan] </option>";
                    }
                    ?>
                </select>
            </div>

            <!-- /.card-body -->

            <button type="submit" class="btn btn-primary">Submit</button>

        </div>
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
