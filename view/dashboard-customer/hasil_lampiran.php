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
                    <th>Nama Pekerjaan</th>
                    <th>Deskripsi Pekerjaan</th>
                    <th>Batas Waktu</th>
                    <th>Nama Pertama</th>
                </tr>
                <?php 
            $data = mysqli_query($conn,
            "SELECT 
            * ,
            pr.status

            FROM 
                `pekerjaan_request` pr 
            JOIN 
                `umkm` u 
            ON 
                pr.id_umkm = u.id_user 
            JOIN
                `pekerja_jasa` pj
            ON
                pr.id_pekerja_jasa = pj.id_user 
          WHERE 
                u.email ='".$_SESSION["email"]."' ");
            $no = 0;
            while($row = mysqli_fetch_assoc($data))
            {
            $no++;
            ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><a href="../dashboard-customer/detile_hasil_lampiran.php?id_pekerjaan=<?= $row["id_pekerjaan"] ?>" style="color: black;"><?= $row["nama_pekerjaan"] ?></a></td>
                    <td><?= $row["deskripsi_pekerjaan"] ?></td>
                    <td><?= date('d M Y', strtotime($row['batas_waktu']))?></td>
                    <td><?= $row["nama_pertama"] ?></td>
                    <td><?= $row["status"] ?></td>
                </tr>
            <?php }?>
            </table>
            </div>
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
