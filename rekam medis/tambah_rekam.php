<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

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

  <style>
    .error {color: #FF0000;}
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">
<?php include ('navbar_rekam.php'); ?>
<?php include ('../koneksi.php'); ?>



  <!-- Isi dari dashboard -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1 class="m-0">Rekam Medis</h1>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Data</h3>
              </div>
              <!-- /.card-header -->


              <!-- form start -->
              <form action="aksi_tambah_rekam.php" method="POST">
                <div class="card-body">

                  <div class="form-group">
                    <label>Tanggal Periksa <span class="error">* </label>
                    <input type="date" class="form-control" placeholder="Masukkan Tanggal Periksa" name="tanggal_periksa" value="<?php echo date('Y-m-d') ?>" required>
                   </div> 


                    <div class="form-group">
                    <label>Nama Pasien <span class="error">* </span></label>
                    <select class="form-control select2" style="width: 100%;" name="id_pasien" id="id_pasien" required>
                    <option>pilih</option>
                    <?php 
                        $sql_pasien = mysqli_query($koneksi, "SELECT * FROM tb_pasien ORDER BY nama_pasien ASC") or die
                        (mysqli_error($koneksi));
                        while($data_pasien = mysqli_fetch_array($sql_pasien)) {
                            echo '<option value="'.$data_pasien['id_pasien'].'">'.$data_pasien['nama_pasien'].'</option>';
                        }
                        ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Diagnosa <span class="error">* </span></label>
                    <input type="text" class="form-control" placeholder="Masukkan Diagnosa" name="diagnosa" required>
                  </div>

                  <div class="form-group">
                    <label>Nama Dokter <span class="error">* </span></label>
                    <select class="form-control select2" style="width: 100%;" name="id_dokter" id="id_dokter" required>
                    <option>pilih</option>
                    <?php 
                        $sql_dokter = mysqli_query($koneksi, "SELECT * FROM tb_dokter ORDER BY nama_dokter ASC") or die
                        (mysqli_error($koneksi));
                        while($data_dokter = mysqli_fetch_array($sql_dokter)) {
                            echo '<option value="'.$data_dokter['id_dokter'].'">'.$data_dokter['nama_dokter'].'</option>';
                        }
                        ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Obat <span class="error">* </span></label>
                    <input type="text" class="form-control" placeholder="Masukkan Obat" name="obat" required>
                  </div>

                  <div class="form-group">
                    <label>Nama Ruangan <span class="error">* </span></label>
                    <select class="form-control select2" style="width: 100%;" name="id_ruangan" id="id_ruangan" required>
                    <option>pilih</option>
                    <?php 
                        $sql_ruangan = mysqli_query($koneksi, "SELECT * FROM tb_ruangan ORDER BY nama_ruangan ASC") or die
                        (mysqli_error($koneksi));
                        while($data_ruangan = mysqli_fetch_array($sql_ruangan)) {
                            echo '<option value="'.$data_ruangan['id_ruangan'].'">'.$data_ruangan['nama_ruangan'].'</option>';
                        }
                        ?>
                    </select>
                  </div>

                 <input type="hidden" name="simpan">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <button type="reset" class="btn btn-danger">Reset</button>

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
