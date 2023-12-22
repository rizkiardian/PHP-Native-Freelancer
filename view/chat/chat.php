<?php
	session_start(); 
	$_SESSION['user_id'] = $_GET['user_id'];
?>
<?php include_once "header.php"; ?>
<body>
     <!-- AKSEN IMG -->
    <!-- <img src="aksen.png" alt="" class="aksenImg" /> -->
	<div class="container-fluid">
		<section class="chat-area">
			<header class="d-flex align-items-center">
				<?php 
				include_once "php/config.php"; 

				if (isset($_GET['user_id'])) {
					$user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
					if ($_SESSION["level"]=="pekerja_jasa") {						
						$sql = mysqli_query($conn, "SELECT * FROM `umkm` WHERE email = '$user_id'");
					}elseif($_SESSION["level"] == "umkm"){
						$sql = mysqli_query($conn, "SELECT * FROM `pekerja_jasa` WHERE email = '$user_id'");
					}

					// if ($_SESSION["level"] == "pekerja_jasa") {
					// 	$nama = $row['nama_perusahaan'];
					// }elseif ($_SESSION["level"] == "umkm") {
					// 	$nama = $row['nama_pertama'] . " " . $row['nama_terakhir'];
					// }
					if (mysqli_num_rows($sql) > 0) {
						$row = mysqli_fetch_assoc($sql);
					} else {
						// Handle jika data pengguna tidak ditemukan
						header("location: users.php");
					}
				} else {
					// Handle jika 'user_id' tidak tersedia atau tidak valid
					header("location: users.php");
				}
				
				?>

					<a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>

				<img src="../../assets/profile_photo/<?php echo $row['profile_photo']; ?>" alt="" class="rounded-circle" width="50">
				<div class="details ml-3">
					<span>
					<?php 
					if ($_SESSION["level"] == "pekerja_jasa") {
					 	echo $row['nama_perusahaan']; 
					}elseif($_SESSION["level"] == "umkm")
					{
						echo $row["nama_pertama"] ." ". $row["nama_terakhir"];
					}
					?></span>
				</div>
			</header>
			<div class="chat-box">
				<!-- Chat messages go here -->
			</div>
			<form action="#" class="typing-area" autocomplete="off">
				<input type="text" name="outgoing_id" value="<?php echo $_SESSION['email'];?>" hidden>
				<input type="text" name="incoming_id" value="<?php echo $user_id;?>" hidden>
				<input type="text" name="message" class="form-control input-field" placeholder="Type a message here..." autocomplete="off">
				<button type="submit" class="btn btn-primary"><i class="fab fa-telegram-plane"></i></button>
			</form>
		</section>
	</div>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="javascript/chat.js"></script>
</body>
</html>
