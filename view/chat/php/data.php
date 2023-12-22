   <?php 


	if ($_SESSION["level"] == "pekerja_jasa") {
		
	$sql = mysqli_query($conn,"SELECT 
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
	mj.status = 'terima' AND pj.email='{$_SESSION['email']}'");

	}elseif ($_SESSION["level"] == "umkm") {
		$sql = "SELECT 
		* ,
		pj.profile_photo ,
		pj.nama_pertama,
		pj.nama_terakhir,
		pj.email
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
		mj.status = 'terima' AND u.email='{$_SESSION['email']}'";
	}

if ($_SESSION["level"] == "umkm") {
	$sql = mysqli_query($conn,$sql);
}


	while ($row = mysqli_fetch_assoc($sql)) {
		$sql2 = "SELECT * FROM chat_detail WHERE (incoming_msg_id = '{$row['email']}'
		OR outgoing_msg_id = '{$row['email']}') AND (outgoing_msg_id = '{$outgoing_id}'
				OR outgoing_msg_id = '{$row['email']}') ORDER BY id_chat_detail DESC LIMIT 1";
		$query2 = mysqli_query($conn, $sql2);

		$row2 = mysqli_fetch_assoc($query2);
		if(mysqli_num_rows($query2) > 0){
			$result = $row2['msg'];
		}else{
			$result = "No message available";
		}

		(strlen($result) > 28) ? $msg = substr($result, 0, 28).'...' : $msg = $result;
		if(isset($row2['outgoing_msg_id'])){
            ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
        }else{
            $you = "";
        }

		if ($_SESSION["level"] == "pekerja_jasa") {
			$nama = $row['nama_perusahaan'];
		}elseif ($_SESSION["level"] == "umkm") {
			$nama = $row['nama_pertama'] . " " . $row['nama_terakhir'];
		}

		$output .= '<a href="chat.php?user_id='.$row['email'].'">
					<div class="content">
					<img src="../../assets/profile_photo/'. $row['profile_photo'].'" alt="">
					<div class="details">
						<span>'. $nama .'</span>
						<p>'. $you . $msg .'</p>
					</div>
					</div>
					</a>';
	}
?>