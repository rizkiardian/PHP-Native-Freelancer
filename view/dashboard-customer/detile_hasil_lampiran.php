<?php 
require_once("../../models/freelanceModel.php");
require_once("../../controller/umkmController.php");


session_start();

if (isset($_POST["selesai"]))project_selesai();

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
    <style>
      .table1 tr:hover{
        background-color: white;
      }
    </style>
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
          <div class="recentCustomers" style="
          height: 80vh;
          overflow-y: visible;
          ">
            <table style="font-size: large; padding: 0;">
                <tr>
                    <th>No</th>
                    <th>Hasil Lampiran</th>
                    <th>Keterangan</th>
                    <th>Tanggal Pengumpulan</th>
                    <th>Action</th>
                </tr>
                <?php 
            $data = mysqli_query($conn,
            "SELECT
                hp.id_hasil_pekerjaan, 
                pr.id_pekerjaan,
                hp.hasil_lampiran,
                hp.keterangan,
                hp.tanggal,
                pr.status
        FROM 
            `hasil_pekerjaan` hp
        JOIN
            `pekerjaan_request` pr
        ON
            hp.id_pekerjaan = pr.id_pekerjaan
        WHERE
            pr.id_pekerjaan = ".$_GET["id_pekerjaan"]."
         ");
            $no = 0;
            while($row = mysqli_fetch_assoc($data))
            {
            $no++;
            ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><a style="text-decoration: none; color: white; padding: 20px; background-color: var(--blue); border-radius: 20%;" href="../../assets/revisian/<?= $row["hasil_lampiran"] ?>">Lihat Hasil</a></td>
                    <td><?= $row["keterangan"] ?></td>
                    <td><?= $row["tanggal"] ?></td>
                    <td><a href="revisi.php?id_hasil_pekerjaan=<?= $row["id_hasil_pekerjaan"] ?>" style="
                    text-decoration: none;
                    color: var(--white);
                    border-radius: 20%;
                    background-color: var(--blue);
                    padding: 20px 10px;
                    ">Revisi</a></td>
                </tr>
            <?php }?>
            </table>
          </div>

            <form action="" method="post">

              <button style="
                        position: absolute;
                        top: 90vh;
                        left: 70vw;
                        font-size: large;
                        text-decoration: none;
                        color: var(--white);
                        border-radius: 20%;
                        background-color: var(--blue);
                        padding: 20px 40px;
                        "

                        onclick="return confirm('apakah anda ingin menyetujui projek ini ?')"

                        name="selesai"
                        >Selesai</button>
            
            </form>
            <?php 
            // Cek apakah status pekerjaan sudah selesai apa tidak
              $sql = "SELECT `status` FROM `pekerjaan_request` WHERE id_pekerjaan = ".$_GET["id_pekerjaan"]."";
              $cek_status = mysqli_query($conn , $sql)->fetch_assoc();


            if ($cek_status["status"] == "selesai") {
              
            ?>
            <a style="
                        position: absolute;
                        top: 90vh;
                        left: 59vw;
                        font-size: large;
                        text-decoration: none;
                        color: var(--white);
                        border-radius: 20%;
                        background-color: var(--blue);
                        padding: 20px 40px;
                        "

                href="beri_ulasan.php?id_pekerjaan=<?= $_GET["id_pekerjaan"] ?>"
                        name="selesai"
                        >Beri Rating</a>
              <?php } ?>
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
