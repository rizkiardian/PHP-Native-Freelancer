<?php
	session_start();
	include_once "config.php";
	$outgoing_id = $_SESSION['email'];
	$searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
	$output = "";
	if ($_SESSION['level'] == "pekerja_jasa") {
		$sql = mysqli_query($conn, "SELECT * FROM `umkm` WHERE NOT email ='{$outgoing_id}' AND (nama_perusahaan LIKE '%{$searchTerm}%')");
	}else{
		$sql = mysqli_query($conn, "SELECT 
		* ,
		u.profile_photo ,
		u.nama_perusahaan,
		u.email
	 FROM 
		`umkm` u
	 JOIN
		`pekerjaan_request` pr 
	 ON
		pr.id_umkm = u.id_user
	 JOIN
		`menawarkan_jasa` mj
	 ON
		pr.id_pekerjaan = mj.id_pekerjaan
	 JOIN
		`pekerja_jasa` pj
	 ON
		pr.id_pekerja_jasa = pj.id_user
	WHERE  
		u.email ='{$outgoing_id}' AND pj.nama_pertama LIKE '%{$searchTerm}%' OR pj.nama_terakhir LIKE '%{$searchTerm}%'");
	}
	if (mysqli_num_rows($sql) > 0) {
		include_once "data.php";
	}else{
		$output .= "No user found related to your search term";
	}
	echo $output;
?>