<?php
  require_once("../../models/freelanceModel.php");
  
  // Session Start
  session_start();
  
  $query = "SELECT * FROM pekerjaan_request";
  $result = mysqli_query($conn, $query);

  // Query untuk mengambil data jumlah request project per bulan
  $query_jumlah = "SELECT MONTH(tanggal_request) as bulan, COUNT(id_pekerjaan) as jumlah_request FROM pekerjaan_request GROUP BY bulan";
  $result_jumlah = mysqli_query($conn, $query_jumlah);
  // Proses hasil query untuk membentuk data yang dapat digunakan oleh Chart.js
  $data_bulan = [];
  $data_jumlah = [];
  while ($row = mysqli_fetch_assoc($result_jumlah)) {
      $nama_bulan = date('F', mktime(0, 0, 0, $row['bulan'], 1));
      $data_bulan[] = $nama_bulan;
      $data_jumlah[] = $row['jumlah_request'];
  }

  $query_penghasilan_tahun = "SELECT YEAR(tanggal_request) AS tahun, SUM(harga) AS jumlah_transaksi FROM pekerjaan_request GROUP BY tahun";
  $result_penghasilan_tahun = mysqli_query($conn, $query_penghasilan_tahun);

  $query_penghasilan_bulanan = "SELECT MONTH(tanggal_request) AS bulan, SUM(harga) AS jumlah_transaksi_bulanan FROM pekerjaan_request GROUP BY bulan ORDER BY bulan DESC LIMIT 1";
  $result_penghasilan_bulanan = mysqli_query($conn, $query_penghasilan_bulanan);

  // Logout
  if (isset($_POST["logout"])) {
    session_destroy();
  }

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
  <title>Dashboard - Admin</title>
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
          <a href="../homepage/" class="text-nowrap logo-img">
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
            </li>
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
        <h2>Good Morning, <span class="font-weight-bold"><?=$_SESSION["username"]?></span></h2>
        <p>Your performance summary this week</p>
        <div class="row">
          <div class="col-lg-8 d-flex align-items-strech">
            <div class="card w-100">
              <div class="card-body">
                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                  <div class="mb-3 mb-sm-0">
                    <h5 class="card-title fw-semibold">Jumlah Request Project</h5>
                  </div>
                  <!-- <div>
                    <select class="form-select">
                      <option value="1">March 2023</option>
                      <option value="2">April 2023</option>
                      <option value="3">May 2023</option>
                      <option value="4">June 2023</option>
                    </select>
                  </div> -->
                </div>
                <!-- <div id="chart"></div> -->
                <canvas id="myChart" width="400" height="200"></canvas>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="row">
              <div class="col-lg-12">
                <!-- Yearly Breakup -->
                <div class="card overflow-hidden">
                  <div class="card-body p-4">
                    <h5 class="card-title mb-9 fw-semibold">Penghasilan Tahunan</h5>
                    <div class="row align-items-center">
                      <div class="">
                        <?php
                          foreach($result_penghasilan_tahun as $row):
                        ?>
                        <div class="d-flex align-items-center justify-content-between">
                            <h4 class="fw-semibold">Rp<?= $row['jumlah_transaksi']; ?></h4>
                            <div>
                                <span class="round-8 bg-primary rounded-circle me-2 d-inline-block"></span>
                                <span class="fs-2"><?= $row['tahun']; ?></span>
                            </div>
                        </div>
                        <?php
                          endforeach;
                        ?>
                      </div>
                        <!-- <h4 class="fw-semibold mb-3">Rp</h4> -->
                        <!-- <div class="d-flex align-items-center mb-3">
                          <span
                            class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                            <i class="ti ti-arrow-up-left text-success"></i>
                          </span>
                          <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                          <p class="fs-3 mb-0">last year</p>
                        </div> -->
                        <!-- <div class="d-flex align-items-center"> -->
                          <!-- <div class="me-4">
                            <span class="round-8 bg-primary rounded-circle me-2 d-inline-block"></span>
                            <span class="fs-2"></span>
                          </div> -->
                          <!-- <div>
                            <span class="round-8 bg-light-primary rounded-circle me-2 d-inline-block"></span>
                            <span class="fs-2">2023</span>
                          </div> -->
                        <!-- </div> -->
                      <!-- </div> -->
                      <!-- <div class="col-4">
                        <div class="d-flex justify-content-center">
                          <div id="breakup"></div>
                        </div>
                      </div> -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <!-- Monthly Earnings -->
                <div class="card">
                  <div class="card-body">
                    <div class="row alig n-items-start">
                      <div class="col-8">
                        <h5 class="card-title mb-9 fw-semibold">Penghasilan Bulan Ini</h5>
                        <?php
                          foreach($result_penghasilan_bulanan as $row):
                        ?>
                          <h4 class="fw-semibold mb-3">Rp<?= $row['jumlah_transaksi_bulanan']; ?></h4>
                        <?php
                          endforeach;
                        ?>
                        <!-- <div class="d-flex align-items-center pb-1">
                          <span
                            class="me-2 rounded-circle bg-light-danger round-20 d-flex align-items-center justify-content-center">
                            <i class="ti ti-arrow-down-right text-danger"></i>
                          </span>
                          <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                          <p class="fs-3 mb-0">last year</p>
                        </div> -->
                      </div>
                      <div class="col-4">
                        <div class="d-flex justify-content-end">
                          <div
                            class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                            <i class="ti ti-currency-dollar fs-6"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- <div id="earning"></div> -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8 d-flex align-items-stretch">
          <div class="card w-100">
            <div class="card-body p-4">
              <h5 class="card-title fw-semibold mb-4">Daftar Freelancer</h5>
              <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle">
                  <thead class="text-dark fs-4">
                    <tr>
                      <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">No</h6>
                      </th>
                      <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">Nama</h6>
                      </th>
                      <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">Jasa</h6>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $query = "SELECT * FROM pekerja_jasa INNER JOIN kategori_pekerja ON pekerja_jasa.id_kategori_pekerja = kategori_pekerja.id_user where status='terima'";
                      $result = mysqli_query($conn, $query);
                    ?>

                    <?php 
                      $count = 1;
                      foreach($result as $row):
                    ?>
                    <tr>
                      <td class="border-bottom-0"><h6 class="fw-semibold mb-0"><?= $count ?></h6></td>
                      <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-1"><?= $row['nama_pertama']. ' '. $row['nama_terakhir'] ?></h6>
                          <!-- <span class="fw-normal"><?= $row['status'] ?></span>                           -->
                      </td>
                      <td class="border-bottom-0">
                        <p class="mb-0 fw-normal"><?= $row['nama_kategori'] ?></p>
                      </td>
                    </tr> 
                    <?php
                      $count++; 
                      endforeach;
                    ?>                  
                  </tbody>
                </table>
                  <!-- <a href="register.php"><button class="btn btn-primary mt-2">Lihat selengkapnya</button></a> -->
              </div>
            </div>
          </div>
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

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Inisialisasi data untuk Chart.js
        var data = {
            labels: <?php echo json_encode($data_bulan); ?>,
            datasets: [{
                label: 'Jumlah Request Project',
                data: <?php echo json_encode($data_jumlah); ?>,
                backgroundColor: 'rgba(0, 141, 255, 0.8)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        };

        // Konfigurasi Chart.js
        var options = {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        };

        // Membuat chart
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });
    </script>
</body>

</html>