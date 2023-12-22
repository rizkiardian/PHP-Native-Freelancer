<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Freelance Dashboard | Nganggur</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="../../css/style-dashboard-freelance.css" />
    <link rel="icon" type="image/x-icon" href="../../assets/logo/Logo.png" />
  </head>
  <?php
require("../../models/freelanceModel.php");
session_start();
?>
  <body>
    <!-- =============== Navigation ================ -->
    <?php include("component/side_bar.php"); ?>

      <!-- ========================= Main ==================== -->
      <div class="main">
        <div class="topbar">
          <div class="toggle">
            <ion-icon name="menu-outline"></ion-icon>
          </div>

          <div class="search">
            <label>
              <input type="text" placeholder="Search here" />
              <ion-icon name="search-outline"></ion-icon>
            </label>
          </div>

          <div class="user">
            <img src="assets/imgs/customer01.jpg" alt="" />
          </div>
        </div>

        <!-- ======================= Cards ================== -->
        <div class="cardBox">
          <div class="card">
            <?php
                        $pesanandata = mysqli_query($conn, "SELECT COUNT(pr.id_pekerjaan) FROM menawarkan_jasa mj INNER JOIN pekerjaan_request pr ON pr.id_pekerjaan = mj.id_menawar INNER JOIN umkm ON pr.id_umkm = umkm.id_user WHERE mj.status = 'terima' AND pr.status = 'mulai' OR pr.status = 'revisi' OR pr.status = 'selesai' AND mj.id_pekerja_jasa = 1");
                        $pesanan = mysqli_fetch_array($pesanandata) 
                    ?>
            <div>
              <div class="numbers"><?php echo $pesanan[0]; ?></div>
              <div class="cardName">Penjualan</div>
            </div>

            <div class="iconBx">
              <ion-icon name="cart-outline"></ion-icon>
            </div>
          </div>

          <div class="card">
            <div>
              <?php
                        $penilaiandata = mysqli_query($conn, "SELECT COUNT(penilaian.id_penilaian) FROM penilaian INNER JOIN pekerjaan_request ON penilaian.id_pekerjaan = pekerjaan_request.id_pekerjaan INNER JOIN menawarkan_jasa ON pekerjaan_request.id_pekerjaan = menawarkan_jasa.id_menawar WHERE pekerjaan_request.status = 'selesai'  AND menawarkan_jasa.id_menawar = 1;");
                        $penilaian = mysqli_fetch_array($penilaiandata); 
                    ?>
              <div class="numbers">
                <?= (isset($penilaian) or $penilaian != NULL) ? $penilaian[0] : "" ?>
              </div>
              <div class="cardName">Penilain</div>
            </div>

            <div class="iconBx">
              <ion-icon name="chatbubbles-outline"></ion-icon>
            </div>
          </div>

          <div class="card">
            <?php
                        $penghasilandata = mysqli_query($conn, "SELECT 
                        SUM(pr.harga)
                      FROM 
                        `pekerjaan_request` pr
                      JOIN
                        `pekerja_jasa` pj
                      ON
                        pr.id_pekerja_jasa = pj.id_user
                      WHERE 
                        pj.email='{$_SESSION['email']}' AND pr.status='selesai'");
                        $penghasilan = mysqli_fetch_array($penghasilandata) 
                    ?>
            <div>
              <div class="numbers">
                Rp.
                <?php echo $penghasilan[0]; ?>
              </div>
              <div class="cardName">Penghasilan</div>
            </div>

            <div class="iconBx">
              <ion-icon name="cash-outline"></ion-icon>
            </div>
          </div>
        </div>

        <!-- ================ Order Details List ================= -->
        <div class="details">
          <div class="recentOrders">
            <div class="cardHeader">
              <h2>Recent Orders</h2>
              <a href="#" class="btn">View All</a>
            </div>

            <table>
              <thead>
                <tr>
                  <td>No</td>
                  <td>Nama Pekerjaan</td>
                  <td>Pelanggan</td>
                  <td>Status</td>
                </tr>
              </thead>
              <tbody>
                <?php
                            $row = mysqli_query($conn, "SELECT menawarkan_jasa.id_menawar,pekerjaan_request.nama_pekerjaan,pekerjaan_request.harga,umkm.nama_perusahaan,pekerjaan_request.status,pekerjaan_request.status as statusclass FROM menawarkan_jasa INNER JOIN pekerjaan_request ON pekerjaan_request.id_pekerjaan = menawarkan_jasa.id_menawar INNER JOIN umkm ON pekerjaan_request.id_umkm = umkm.id_user WHERE menawarkan_jasa.status = 'terima' AND pekerjaan_request.status = 'mulai' OR pekerjaan_request.status = 'revisi' OR pekerjaan_request.status = 'selesai' AND menawarkan_jasa.id_pekerja_jasa = 1;");
                            $no = 0;
                            while ($data = mysqli_fetch_array($row)) {
                                $no++;
                        ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $data['nama_pekerjaan']; ?></td>
                  <td><?php echo $data['nama_perusahaan']; ?></td>
                  <td>
                    <span><?php echo $data['status']; ?></span>
                  </td>
                </tr>
                <?php
                                }
                            ?>
              </tbody>
            </table>
          </div>

          <!-- ================= New Customers ================ -->
          <div class="recentCustomers">
            <div class="cardHeader">
              <h2>Recent Customers</h2>
              <a href="#" class="btn">View All</a>
            </div>

            <table>
              <thead>
                <tr>
                  <td>No</td>
                  <td>Pelanggan</td>
                </tr>
              </thead>
              <?php
                            $row = mysqli_query($conn, "SELECT umkm.nama_perusahaan FROM menawarkan_jasa INNER JOIN pekerjaan_request ON pekerjaan_request.id_pekerjaan = menawarkan_jasa.id_menawar INNER JOIN umkm ON pekerjaan_request.id_umkm = umkm.id_user WHERE menawarkan_jasa.status = 'terima' AND pekerjaan_request.status = 'mulai' OR pekerjaan_request.status = 'revisi' OR pekerjaan_request.status = 'selesai' AND menawarkan_jasa.id_menawar = 1 GROUP BY umkm.nama_perusahaan");
                            $no = 0;
                            while ($data = mysqli_fetch_array($row)) {
                                $no++;
                        ?>
              <tr>
                <td><?php echo $no; ?></td>
                <td>
                  <h4><?php echo $data['nama_perusahaan']; ?></h4>
                </td>
              </tr>
              <?php
                                }
                            ?>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="../../js/script-dashboard.js"></script>

    <!-- ====== ionicons ======= -->
    <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
    ></script>
  </body>
</html>
