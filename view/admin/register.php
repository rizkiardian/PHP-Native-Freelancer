<?php
  require_once("../../models/freelanceModel.php");

   // Session Start
   session_start();

   
   $query = "SELECT * , pekerja_jasa.id_user FROM pekerja_jasa INNER JOIN kategori_pekerja ON pekerja_jasa.id_kategori_pekerja = kategori_pekerja.id_user";
   $result = mysqli_query($conn, $query);

   
   if(isset($_POST['terima'])){
    $id_user = $_POST['id_user'];
    $query_terima = "UPDATE pekerja_jasa SET status = 'terima' WHERE id_user = $id_user";
    mysqli_query($conn, $query_terima);
    header('Location:register.php');
  }

  if(isset($_POST['tolak'])){
    $id_user = $_POST['id_user'];
    $query_tolak = "UPDATE pekerja_jasa SET status = 'tolak' WHERE id_user = $id_user";
    mysqli_query($conn, $query_tolak);
    header('Location:register.php');
  }

  // Logout
  if (isset($_POST["logout"])) {
    session_destroy();
  }

  // Auth
  if ($_SESSION) {
    if ($_SESSION["level"] != "admin") {
      session_destroy();
      echo '<script>window.location.href="../../";</script>';
      exit;
    }
  }else{
    header("Location: ../../");
  }

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register - Admin</title>
  <link rel="shortcut icon" type="image/png" href="../../assets/logos/logo2.png" />
  <link rel="stylesheet" href="../../css/styles.min-admin.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.php" class="text-nowrap logo-img">
            <img src="../../assets/logos/logo.png" width="180" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./index.php" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Data Master</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./register.php" aria-expanded="false">
                <span>
                  <i class="ti ti-user-check"></i>
                </span>
                <span class="hide-menu">Register Freelancer</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./freelancer.php" aria-expanded="false">
                <span>
                  <i class="ti ti-users"></i>
                </span>
                <span class="hide-menu">Freelancer</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./pelanggan.php" aria-expanded="false">
                <span>
                  <i class="ti ti-users"></i>
                </span>
                <span class="hide-menu">Pelanggan</span>
              </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="./jasa.php" aria-expanded="false">
                  <span>
                    <i class="ti ti-brand-slack"></i>
                  </span>
                  <span class="hide-menu">Jasa</span>
                </a>
              </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./pembayaran.php" aria-expanded="false">
                <span>
                  <i class="ti ti-cash"></i>
                </span>
                <span class="hide-menu">Pembayaran</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./cek_pembayaran.php" aria-expanded="false">
                <span>
                  <i class="ti ti-cash"></i>
                </span>
                <span class="hide-menu">Cek Pembayaran</span>
              </a>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./report.php" aria-expanded="false">
                <span>
                  <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">Report</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                <i class="ti ti-bell-ringing"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="../../assets/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">My Profile</p>
                    </a>
                    <form action="" method="post">
                      <button class="btn btn-outline-primary mx-3 mt-2 d-block" name="logout">Logout</button>
                  </form>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <div class="container-fluid">
        <!--  Row 1 -->
        <h2>Data Master</h2>
        <div class="row">
          <div class="col-lg-12 d-flex align-items-strech">
            <div class="card w-100">
              <!-- partial -->
              <div class="main-panel">
                <div class="content-wrapper">
                  <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                      <div class="card">
                        <div class="card-body">
                          <h4 class="card-title">Data Registrasi Freelancer</h4>
                          <!-- <button class="btn btn-primary mt-2 mb-2">Tambah Data</button> -->
                          <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Nama</th>
                                  <th>Curriculum Vitae</th>
                                  <th>Status</th>
                                  <th>Kategori</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  $count = 1;
                                  foreach($result as $row):
                                ?>
                                <tr>
                                <td><?= $count ?></td>
                                  <td><?= $row['nama_pertama']. ' '. $row['nama_terakhir'] ?></td>
                                  <td><a href="cv.php?cv=<?= $row['cv'] ?>" target="_blank" title="Lihat CV"><?= $row['cv'] ?></a></td>
                                  <td><?= $row['status'] ?></td>
                                  <td><?= $row['nama_kategori'] ?></td>
                                  <td>
                                    <div class="container">
                                      <div class="d-flex align-items-center">
                                        <form action="" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menerima freelancer?');">
                                          <input type="hidden" name="id_user" value="<?= $row['id_user'] ?>">
                                          <button type="submit" name="terima" class="btn btn-success m-1">Terima</button>
                                        </form>
                                        <form action="" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menolak freelancer?');">
                                          <input type="hidden" name="id_user" value="<?= $row['id_user'] ?>">
                                          <button type="submit" name="tolak" class="btn btn-danger m-1">Tolak</button>
                                        </form>
                                      </div>
                                    </div>
                                  </td>
                                </tr>
                                <?php
                                  $count++; 
                                  endforeach;
                                ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
        
        <div class="py-6 px-6 text-center">
          <p class="mb-0 fs-4">Develoveper By <a href="#" target="_blank" class="pe-1 text-primary text-decoration-underline">Freelancer</a></p>
        </div>
      </div>
    </div>
  </div>
  <script src="../../libs/jquery/dist/jquery.min.js"></script>
  <script src="../../libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../../js/sidebarmenu.js"></script>
  <script src="../../js/app.min.js"></script>
  <script src="../../libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="../../libs/simplebar/dist/simplebar.js"></script>
  <script src="../../js/dashboard.js"></script>
</body>

</html>