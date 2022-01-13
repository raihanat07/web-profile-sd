
<!DOCTYPE html>
<html lang="en">



<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- <link rel="icon" type="image/png" > -->
  <link rel="shortcut icon" href="../../logo/logo_sekolah.ico" type="image/x-icon">
  <!-- <link rel="shortcut icon" href="../../logo/logo_sekolah.png"> -->
  <title>pengelola Website</title>

  <!-- Custom fonts for this template -->
  <link href="../vendor1/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../https://fonts.googleapis.com/css?family=Viga" rel="stylesheet">
  <link href="../https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


  <!-- Custom styles for this template -->
  <link href="../css_admin/sb-admin-2.min.css" rel="stylesheet">
  <!-- <link rel="stylesheet" type="text/css" href="../css/cssadmin.css"> -->

  <!-- Custom styles for this page -->
  <!-- <link href="../vendor1/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
  
  
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <a class="sidebar-brand d-flex align-items-center " href="#">
        <div class="sidebar-brand-icon">
          <img src="../../../logo/logo_sekolah.png" height="40px" width="40px">
        </div>
        <div class="sidebar-brand-text mx-2">website</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

                                            <!-- data dashboard Dashboard -->
      <li class="nav-item">
                              <a class="nav-link" 

                                              <?php if ($halaman == "data_dashboard") {?>
                                                    href="data_dashboard.php"
                                              <?php } else  {?>
                                                    href="../file_dashboard/data_dashboard.php"
                                              <?php } ?>

                               >
                              <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading dari judul SIDEBARNYA-->
        <div class="sidebar-heading">
          Interface
        </div> 


                                  <!-- ini adalah link untuk  BERITA -->
                                  <li class="nav-item">
                                         <a class="nav-link"
                                                                <?php if ($halaman == "data_berita") {?>
                                                                    href="data_berita.php"
                                                                <?php } else  {?>
                                                                    href="../file_berita/data_berita.php"
                                                                <?php } ?>
                                                   >
                                                  <i class="fas fa-newspaper "></i>
                                                  <span>Kelola Data Berita</span>
                                         </a>
                                  </li>


                                  <!-- ini adalah link untuk  KEGIATAN -->
                                  <li class="nav-item">
                                         <a class="nav-link"
                                                                <?php if ($halaman == "data_kegiatan") {?>
                                                                    href="data_kegiatan.php"
                                                                <?php } else  {?>
                                                                    href="../file_kegiatan/data_kegiatan.php"
                                                                <?php } ?>
                                                   >
                                                  <i class="fab fa-accessible-icon "></i>
                                                  <span>Kelola Data kegiatan</span>
                                         </a>
                                  </li>

                                  <!-- ini adalah link untuk  siswa_siswi -->
                                  <li class="nav-item">
                                         <a class="nav-link"
                                                                <?php if ($halaman == "data_siswa_siswi") {?>
                                                                    href="data_siswa_siswi.php"
                                                                <?php } else  {?>
                                                                    href="../file_siswa_siswi/data_siswa_siswi.php"
                                                                <?php } ?>
                                                   >
                                                  <i class="fas fa-users "></i>
                                                  <span>Kelola Data siswa siswi</span>
                                         </a>
                                  </li>



                                                    


      <!-- <div style=" min-width: 1500px; position:relative;">   -->
      <hr class="sidebar-divider" "> 
      <!-- Heading -->
      <div class="sidebar-heading">
        Addons
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
<i class="fas fa-fw fa-folder"></i>
      <span>Lainya</span>
</a>
<div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
                  <h6 class="collapse-header">Lihat Lainya:</h6>
                                      
                                      <!-- link untuk ptk  -->
                                      <a class="collapse-item" 
                                                                <?php if ($halaman == "data_ptk") {?>
                                                                    href="data_ptk.php"
                                                                <?php } else  {?>
                                                                    href="../file_ptk/data_ptk.php"
                                                                <?php } ?>
                                                 >
                                             <i class="far fa-address-card">
                                             </i> PTK
                                      </a>

                                      <!-- link untuk struktur organisasi -->
                                      <a class="collapse-item" 
                                                                <?php if ($halaman == "ubah_struktur") {?>
                                                                    href="ubah_struktur.php"
                                                                <?php } else  {?>
                                                                    href="../file_struktur/ubah_struktur.php"
                                                                <?php } ?>
                                                 >
                                             <i class="fas fa-project-diagram">
                                             </i> Struktur Organisasi
                                      </a>
                                      

                                      <!-- link untuk prestasi -->
                                      <a class="collapse-item" 
                                                                <?php if ($halaman == "data_prestasi") {?>
                                                                    href="data_prestasi.php"
                                                                <?php } else  {?>
                                                                    href="../file_prestasi/data_prestasi.php"
                                                                <?php } ?>
                                                 >
                                             <i class="fas fa-trophy">
                                             </i>  Data Prestasi
                                      </a>

                                      <!-- link untuk sarana -->
                                      <a class="collapse-item" 
                                                                <?php if ($halaman == "data_sarana") {?>
                                                                    href="data_sarana.php"
                                                                <?php } else  {?>
                                                                    href="../file_sarana/data_sarana.php"
                                                                <?php } ?>
                                                 >
                                             <i class="fas fa-inbox">
                                             </i>  Data sarana
                                      </a>

                                      <!-- link untuk prasarana -->
                                      <a class="collapse-item" 
                                                                <?php if ($halaman == "data_prasarana") {?>
                                                                    href="data_prasarana.php"
                                                                <?php } else  {?>
                                                                    href="../file_prasarana/data_prasarana.php"
                                                                <?php } ?>
                                                 >
                                             <i class="fas fa-school">
                                             </i>  Data prasarana
                                      </a>

                                      <!-- link untuk kritik dan saran-->
                                      <a class="collapse-item" 
                                                                <?php if ($halaman == "data_kritik") {?>
                                                                    href="data_kritik.php"
                                                                <?php } else  {?>
                                                                    href="../file_kritik/data_kritik.php"
                                                                <?php } ?>
                                                 >
                                             <i class="fas fa-envelope">
                                             </i> Kritik & saran
                                      </a>
                                                                    
                    <div class="collapse-divider"></div>
          </div>
</div>
</li>






      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
         
          
          
          
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <h4 style="margin-top: 20px; "> UPTD SD NEGERI 01 SUNGAI RIMBANG </h4>

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
                
              </div>
            </li>

            <!-- Nav Item - Alerts -->
      

            <!-- Nav Item - Messages -->
            
            <div class="topbar-divider d-none d-sm-block"></div>
        
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Pengelola Web</span>
                <img src="../../../logo/logo_admin.png" height="35px" width="35px">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../file_login/logout.php">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Keluar
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

    </div>
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

 
  <script src="../vendor1/jquery/jquery.min.js"></script>
  <script src="../vendor1/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor1/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../vendor1/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor1/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/datatables-demo.js"></script>


      

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <!-- <script src="asset/js/jquery-1.10.2.js"></script> -->
    <!-- <script src="asset/js/bootstrap.js"></script> -->
 

  </body>
</html>