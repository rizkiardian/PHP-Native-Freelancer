<?php 
	session_start();
	include_once "config.php";
	$outgoing_id = $_SESSION['email'];
	if ($_SESSION["level"] == "pekerja_jasa") {
	$sql = mysqli_query($conn, "SELECT 
									* 
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
									mj.status = 'terima' AND pj.email='{$outgoing_id}'");
	}elseif ($_SESSION["level"] == "umkm") {
		$sql = mysqli_query($conn, "SELECT 
									* 
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
									mj.status = 'terima' AND u.email='{$outgoing_id}'");
	}
	$output = " ";

	if(mysqli_num_rows($sql) == 0){
		$output .= "No users are available to chat";
	}elseif(mysqli_num_rows($sql) > 0) {
		include "data.php";
	}
	echo $output;
?>
