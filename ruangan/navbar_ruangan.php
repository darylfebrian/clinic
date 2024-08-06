<?php
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
          <a href="../logout.php" class="dropdown-item dropdown-footer navbar-danger small-box inner" >Logout</a>
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
      <img src="../assets/dist/img/RYL3.png" alt="logo" class="brand-image img-circle elevation-3" style="opacity: .8">
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
            <a href="../dashboard.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <!-- End Menu Dashboard -->

          <!-- Menu Dokter -->
          <li class="nav-item">
            <a href="../dokter/tampil_dokter.php" class="nav-link">
            <i class="nav-icon fa fa-stethoscope"></i>
              <p>
                Dokter
              </p>
            </a>
          </li>
           <!-- End Menu Dokter --> 
         
          <!-- Menu Pasien -->
          <li class="nav-item">
            <a href="../pasien/tampil_pasien.php" class="nav-link">
            <i class="nav-icon fa fa-hospital-user"></i>
              <p>
                Pasien
              </p>
            </a>
          </li>
          <!-- End Menu Pasien --> 

          <!-- Menu Obat -->
          <li class="nav-item">
            <a href="../obat/tampil_obat.php" class="nav-link">
            <i class="nav-icon fa fa-tablets"></i>
              <p>
                Obat
              </p>
            </a>
          </li>
          <!-- End Menu Obat --> 

          <!-- Menu Ruangan -->
          <li class="nav-item">
            <a href="tampil_ruangan.php" class="nav-link">
            <i class="nav-icon fa fa-bed"></i>
              <p>
                Ruangan
              </p>
            </a>
          </li>
          <!-- End Menu Ruangan --> 

          <!-- Menu Rekam Medis -->
          <li class="nav-item">
            <a href="../rekam medis/tampil_rekam.php" class="nav-link">
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