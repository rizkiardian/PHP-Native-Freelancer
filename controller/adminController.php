<?php
$conn = mysqli_connect("localhost","root","","db_freelance");

function registrasi_admin($data) {
        global $conn;
        $username = $data['registrationUsername'];
        $nama = $data['registrationNama'];
        $password = password_hash($data['registrationPassword'], PASSWORD_DEFAULT);
        $noRekening = $data['noRekening'];
    
        // Cek apakah username sudah ada dalam database
        $check_username_quary = mysqli_query($conn , "SELECT * FROM `admin` WHERE username = '$username'");
        $check_username = mysqli_fetch_array($check_username_quary);

        if ($check_username == NULL) {
            $result = mysqli_query($conn, "INSERT INTO admin (id_user, username, password, nama, no_rek) VALUES (null ,'$username','$password','$nama','$noRekening')");
            echo "<script>alert('berhasil   Ditambahkan')</script>";
        }else{
            echo "<script>alert('Usernama Sudah ada silahkan pilih lagi')</script>";
        }
}

function login_admin($data){
    global $conn;
    $username = $data['username'];
    $password = $data['password'];

    // Cek Username
    $check_username_query = mysqli_query($conn,"SELECT * FROM `admin` WHERE username = '$username'");
    $check_username = mysqli_fetch_array($check_username_query);

    if ($check_username) {
        
        // Cek Password
        $check_password_query = mysqli_query($conn,"SELECT password FROM `admin` WHERE username = '$username'");
        $check_password = mysqli_fetch_assoc($check_password_query);

        if(password_verify($password,$check_password["password"])){
            session_start();
            $_SESSION["username"] = $username;
            $_SESSION["level"] = "admin";
            return 1;
        }else{
            echo "<script>alert('Username dan Password tidak cocok');</script>";
            return 0;
        }
    }else{
        echo "<script>alert('Username dan Password tidak cocok');</script>";
        return 0;
    }
}

function terima_pembayaran()
{
    global $conn;

    $id_pembayaran = $_POST['id_pembayaran'];
    $id_pekerja_jasa = $_POST['id_pekerja_jasa'];
    $id_pekerjaan = $_POST['id_pekerjaan'];
    $id_menawar = $_POST['id_menawar'];

    
    // Update pembayaran
    $query_terima = "UPDATE pembayaran SET `status` = 'berhasil' WHERE id_pembayaran = ?";
    $stmt_terima = mysqli_prepare($conn, $query_terima);
    mysqli_stmt_bind_param($stmt_terima, "s", $id_pembayaran);
    mysqli_stmt_execute($stmt_terima);
    
    // Update Pekerja Request
    $query_pekerja_request = "UPDATE `pekerjaan_request` SET `id_pekerja_jasa` = $id_pekerja_jasa , `status`='mulai' WHERE id_pekerjaan = ?";
    $stmt_pekerja_request = mysqli_prepare($conn, $query_pekerja_request);
    mysqli_stmt_bind_param($stmt_pekerja_request, "s", $id_pekerjaan);
    $result = mysqli_stmt_execute($stmt_pekerja_request);
    
    // Update Tawaran Jasa
    $query_menawarkan_jasa = "UPDATE `menawarkan_jasa` SET `status`='terima' WHERE id_menawar= ?";
    $stmt_menawarkan_jasa = mysqli_prepare($conn,$query_menawarkan_jasa);
    mysqli_stmt_bind_param($stmt_menawarkan_jasa , "s" , $id_menawar);
    $result_menawarkan_jasa = mysqli_stmt_execute($stmt_menawarkan_jasa);

    if ($result) {
        echo "<script>
            alert('Berhasil Menambahkan');
            window.location.href = 'cek_pembayaran.php';
        </script>";
    }else {
        echo "<script>
            alert('Gagal Menambahkan".mysqli_error($conn)."');
            window.location.href = 'cek_pembayaran.php';
        </script>";
        
    }

    exit();
}