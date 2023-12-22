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
                    <th>Nama Perusaaan</th>
                    <th>Harga</th>
                    <th>Status</th>
                </tr>
                <?php 
            $data = mysqli_query($conn,"SELECT 
            pr.nama_pekerjaan,
            pr.id_pekerjaan,
            mj.status,
            pr.status status_pekerjaan,
            pr.harga
        FROM 
            `menawarkan_jasa` mj 
        JOIN 
            `pekerjaan_request` pr 
        ON 
            mj.id_pekerjaan = pr.id_pekerjaan 
        JOIN 
            `pekerja_jasa` pj 
        ON 
            pr.id_pekerja_jasa = pj.id_user
        JOIN
            `umkm` u
        ON
            pr.id_umkm = u.id_user
        WHERE 
            pj.email='".$_SESSION["email"]."' ");
            $no = 0;
            while($row = mysqli_fetch_assoc($data))
            {
                if ($row["status"] == "terima") {
                    $id_pekerjaan = $row["id_pekerjaan"];

                    $status ="<a href='upload_project.php?id_pekerjaan=$id_pekerjaan' style='padding: 10px 20px; text-decoration: none; background-color: var(--blue); color: var(--white); border-radius: 10%;'>Upload</a>" 

                    ."<a href='hasil_revisi.php?id_pekerjaan=$id_pekerjaan' style='padding: 10px 20px; text-decoration: none; background-color: var(--blue); color: var(--white); border-radius: 10%; margin : 0 0 0 5px;'>Lihat Revisi</a>"; 
                }else if($row["status_pekerjaan"] == "revisi"){
                  echo "revisi";
                }
                else{
                    $status = $row["status"];
                }
                $no++;
            ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $row["nama_pekerjaan"] ?></td>
                    <td><?= $row["harga"] ?></td>
                    <td><?= $status ?></td>
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
