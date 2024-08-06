


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Klinik RYL | Tampil Data Dokter</title>


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
  <!-- data tabels -->
  <link rel="stylesheet" href="../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../assetsplugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <style>
/* Style pagination container */
.halaman {
  margin-top: 20px;
  text-align: left;
}

/* Style pagination links */
.halaman a {
  display: inline-block;
  padding: 8px 16px;
  margin: 0 4px;
  text-decoration: none;
  color: #333;
  background-color: #f2f2f2;
  border-radius: 4px;
}

/* Style active pagination link */
.halaman a.active {
  background-color: #4CAF50;
  color: white;
}

/* Hover effect on pagination links */
.halaman a:hover {
  background-color: #ddd;
}

/* Disabled pagination links */
.halaman a.disabled {
  pointer-events: none;
  color: #aaa;
  background-color: #ddd;
}

  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">
<?php include ('navbar_dokter.php'); ?>


  <!-- Isi dari Dokter -->
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
    <section class="content">

<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-header">
         <h2 align="center">Data Dokter</h2>
        </div>

        <?php
          if (isset($_SESSION['eksekusi'])) :
          ?>
              <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <?php echo $_SESSION['eksekusi']; ?> 
              </div>
          <?php
              unset($_SESSION['eksekusi']); 
          endif;
          ?>

        <div class="card-body">
        <a href="tambah_dokter.php" class="btn btn-primary">Tambah</a> 
        <a href="pdf_dokter.php" class="btn btn-danger">PDF</a>



        <!-- Tabel -->
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr align="center">
              <th>No</th>
              <th>Foto</th>
              <th>Nama</th>
              <th>Gender</th>
              <th>No HP</th>
              <th>Alamat</th>
              <th>No STR</th>
              <th>Spesialis</th>
              <th>Pengalaman</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>

            <?php
    // Load file koneksi.php
    include "../koneksi.php";
    $query = "SELECT * FROM tb_dokter"; // Query untuk menampilkan semua data dokter
    $no=1;
    $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
    while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
        echo "<tr>";
        echo "<td>".$no."</td>";
        echo "<td><img src='../assets/images/".$data['foto']."' width='100' height='100'></td>";
        echo "<td>".$data['nama_dokter']."</td>";
        echo "<td>".$data['jenis_kelamin']."</td>";
        echo "<td>".$data['nomor_telepon']."</td>";
        echo "<td>".$data['alamat']."</td>";
        echo "<td>".$data['nomor_STR']."</td>";
        echo "<td>".$data['spesialis']."</td>";
        echo "<td>".$data['pengalaman_dokter']."</td>";
        echo "<td class='d-flex justify-content-center'>
                <a href='update_dokter.php?hal=update_dokter&id_dokter=".$data['id_dokter']."'>
                    <button type='button' class='btn btn-success' name=''><i class='fa fa-pen'></i> Update</button>
                </a>
                <a onclick='return confirm(\"Apakah Anda Ingin Menghapus Data Ini?\")' href='hapus_dokter.php?id_dokter=".$data['id_dokter']."'>
                    <button type='button' class='btn btn-danger' name=''> <i class='fa fa-trash'></i> Hapus</button>
                </a>
            </td>";
        echo "</tr>";
        $no++; // Increment nomor setelah data ditampilkan
    }
?>



            </tbody>

            </table>

        
<div class="halaman">
     <?php
    //  for ($i=1; $i<=$pages ; $i++){ 
        ?>
    <!-- <a href="?halaman=<?php 
    // echo $i; ?>"><?php 
    // echo $i; 
    ?></a> -->
  <?php 
//   } 
  ?>
</div>

        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</div>
<!-- /.container-fluid -->
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
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../assets/plugins/jszip/jszip.min.js"></script>
<script src="../assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
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
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({

      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

</body>
</html>
