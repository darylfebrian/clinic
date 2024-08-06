
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Klinik RYL | Tambah Data Dokter</title>

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

<?php include ('navbar_dokter.php'); ?>




  <!-- Isi dari dashboard -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1 class="m-0">Dokter</h1>
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
              <form action="aksi_tambah_dokter.php" method="post" enctype="multipart/form-data" >
                <div class="card-body">

                <div class="form-group">
                    <label>Foto </label>
                    <input type="file" class="form-control" name="foto" id="foto" required>
                </div> 

                  <div class="form-group">
                    <label>Nama <span class="error">* </span></label>
                    <input type="text" class="form-control" placeholder="Masukkan Nama" name="nama_dokter" required>
                  </div>

                  <div class="form-group">
                    <label>Gender <span class="error">* </span></label>
                    <select class="form-control select2" style="width: 100%;" name="jenis_kelamin" id="jenis_kelamin" required>
                    <option value="Pria">Pria</option>
                    <option value="Wanita">Wanita</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>No HP <span class="error">* </label>
                    <input type="number" class="form-control" placeholder="Masukkan Nomor HP" name="nomor_telepon" required>
                  </div>                  

                  <div class="form-group">
                        <label>Alamat <span class="error">* </label>
                        <textarea class="form-control" rows="2" placeholder="Masukkan Alamat" name="alamat" required></textarea>
                    </div>

                <div class="form-group">
                    <label>No STR <span class="error">* </span></label>
                    <input type="number" class="form-control" placeholder="Masukkan Nomor STR" name="nomor_STR" required>
                </div>     

                <div class="form-group">
                    <label>Spesialis <span class="error">* </span></label>
                    <input type="text" class="form-control" placeholder="Masukkan Spesialis" name="spesialis" required>
                </div> 

                <div class="form-group">
                    <label>Pengalaman <span class="error">* </span></label>
                    <input type="text" class="form-control" placeholder="Masukkan Pengalaman Dokter" name="pengalaman_dokter" required>
                    <br>
                </div> 


                    <!-- /.card-body -->

                 <input type="hidden" name="simpan">
                  <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
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
