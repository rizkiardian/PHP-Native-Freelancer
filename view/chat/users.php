<?php
	session_start(); 

	$login = true



?>

<?php include_once "header.php"; ?>



  </head>
<body>
	   <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
      <div class="container">
        <a class="navbar-brand" href="../homepage/"><img class="logoImg" src="Logo.png" alt="" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <p class="text-light">Chating</p>
          <ul class="navbar-nav ms-auto">
            <?php 
            if (!$login) {
            ?>
              <li class='nav-item'><a class='nav-link' aria-current='page' href='#'>Login<i class='uil uil-signin'></i></a></li>
              <li class='nav-item mx-3 mt-2'><div class='pemisahLogin'></div></li>
              <li class='nav-item'><a class='nav-link' href='#'>Register <i class='uil uil-user'></i></a></li>
            <?php
            }else{
             ?>
             <li class='nav-item'><a class='nav-link' aria-current='page' href=''><?= "dimas" ?></a></li>
             <li class='nav-item'><a class='nav-link' aria-current='page' href='login.php'>Logout <i class="uil uil-sign-in-alt"></i></a></li>
             <?php 
            }
            ?>
          </ul>
        </div>
      </div>
    </nav>
    <!-- NAVBAR END -->
     <!-- AKSEN IMG -->
    <!-- <img src="aksen.png" alt="" class="aksenImg" /> -->
	<div class="container-fluid">
		<section class="users mt-5">
			<header class="d-flex justify-content-between align-items-center ">
				<?php 
					include_once "php/config.php";
          if ($_SESSION["level"] == "pekerja_jasa") {
            $sql = mysqli_query($conn, "SELECT * FROM `pekerja_jasa` WHERE email='{$_SESSION['email']}'");
          }elseif ($_SESSION["level"] == "umkm") {
            $sql = mysqli_query($conn, "SELECT * FROM `umkm` WHERE email='{$_SESSION['email']}'");
          }
            


					if(mysqli_num_rows($sql) > 0){
						$row = mysqli_fetch_assoc($sql);
					}  
				?>

				<div class="content d-flex align-items-center">
					<a href="users.php" class="back-icon"><i class="fas fa-arrow-left arrow-black"></i></a>
					
					<img src="../../assets/profile_photo/<?= ($_SESSION['level'] == 'pekerja_jasa') ? $row['profile_photo'] : $row['profile_photo'] ?>" alt="" class="rounded-circle" >
					<div class="details ml-3">
						<span ><?= ($_SESSION['level'] == 'pekerja_jasa') ? ($row['nama_pertama'] . " " . $row['nama_terakhir']) : $row['nama_perusahaan']; ?></span>
					</div>
				</div>

			</header>
			<div class="search mt-3">
				<span class="text-muted"></span>
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Enter name to search...">
					<div class="input-group-append">
						<button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
					</div>
				</div>
			</div>
			<div class="users-list mt-3">
				<!-- User list content goes here -->
			</div>
		</section>
	</div>
	<script src="javascript/navbar.js"></script>
	<script src="javascript/users.js"></script>
</body>
</html>
