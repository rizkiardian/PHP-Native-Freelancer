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
          <?php 
					$sql = mysqli_query($conn, "SELECT * FROM umkm WHERE email = '".$_SESSION["email"]."'");
					if(mysqli_num_rows($sql) > 0){
						$row = mysqli_fetch_assoc($sql);
					}  
				?>

				<div class="content d-flex align-items-center">
					<a href="users.php" class="back-icon"><i class="fas fa-arrow-left arrow-black"></i></a>
					
					<img src="php/images/<?php echo $row['profile_photo']?>" alt="" class="rounded-circle" >
					<div class="details ml-3">
						<span ><?php echo $row['fname'] . " " . $row['lname']; ?></span>
						<p ><?php echo $row['status']?></p>
					</div>
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
