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
    <style>
      .my-button {
        /* Gaya tombol Anda di sini */
        background-color: #007bff; /* Warna latar belakang */
        color: #fff; /* Warna teks */
        padding: 10px 20px; /* Padding tombol */
        border: none; /* Menghilangkan border */
        border-radius: 4px; /* Border radius untuk sudut melengkung */
        cursor: pointer; /* Menampilkan cursor pointer saat dihover */
      }

      .my-button:hover {
        background-color: #0056b3; /* Warna latar belakang saat tombol dihover */
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
          <div class="recentCustomers">
            <div>
              <a href="tambah_request_project.php"><button type="button" class="my-button">Tambah</button></a>
            </div>
            <table style="font-size: large; padding: 0;">
                <tr>
                    <th>No</th>
                    <th>Nama Pekerjaan</th>
                    <th>Deskripsi Pekerjaan</th>
                    <th>Batas Waktu</th>
                    <th>status</th>
                </tr>
                <?php 
            $data = mysqli_query($conn,
            "SELECT pekerjaan_request.*, umkm.nama_perusahaan, kategori_request.nama_kategori, pekerja_jasa.nama_pertama, pekerja_jasa.nama_terakhir
            FROM pekerjaan_request
            JOIN umkm ON pekerjaan_request.id_umkm = umkm.id_user
            JOIN kategori_request ON pekerjaan_request.id_kategori = kategori_request.id
            LEFT JOIN pekerja_jasa ON pekerjaan_request.id_pekerja_jasa = pekerja_jasa.id_user
            WHERE umkm.email = '{$_SESSION['email']}'
            ");
            $no = 0;
            while($row = mysqli_fetch_assoc($data))
            {
            $no++;
            ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><a href="../dashboard-customer/periksa_tawaran.php?id_pekerjaan=<?= $row["id_pekerjaan"] ?>" style="color: black;"><?= $row["nama_pekerjaan"] ?></a></td>
                    <td><?= $row["deskripsi_pekerjaan"] ?></td>
                    <td><?= $row["batas_waktu"] ?></td>
                    <td><?= $row["status"] ?></td>
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
