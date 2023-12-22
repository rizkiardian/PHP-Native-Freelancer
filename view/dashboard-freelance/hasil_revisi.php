<?php 
require_once("../../models/freelanceModel.php");
session_start();
?>

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


          <!-- ================= New Customers ================ -->
          <div class="recentCustomers">
            <table style="font-size: large; padding: 0;">
                <tr>
                    <th>No</th>
                    <th>Deskripsi</th>
                </tr>
                <?php 
            $data = mysqli_query($conn,"SELECT 
            * 
        FROM 
            `revisi` r 
        JOIN
            `pekerjaan_request` pr
        ON
            r.id_pekerjaan = pr.id_pekerjaan
        JOIN
            `pekerja_jasa` pj
        ON
            pj.id_user = pr.id_pekerja_jasa
        JOIN
            `hasil_pekerjaan` hp
        ON
            hp.id_hasil_pekerjaan = r.id_hasil_pekerjaan
        WHERE
            pj.email = '{$_SESSION['email']}' AND pr.id_pekerjaan={$_GET['id_pekerjaan']}");
            $no = 0;
            while($row = mysqli_fetch_assoc($data))
            {
                $no++;
            ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $row["keterangan_revisi"] ?></td>
                </tr>
            <?php }?>
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
