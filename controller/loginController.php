<?php
$conn = mysqli_connect("localhost","root","","db_freelance");

function login()
{
    global $conn;

    if (isset($_POST['user-type'])) {
        $user_type = $_POST['user-type'];
    }else{
        echo "<script>alert('Silahkan masukkan tipe user!')</script>";
        return false;
    }

    $email = $_POST['email'];
	$password = $_POST['password'];


    
    if ($user_type === "umkm") {
        $sql = "SELECT * FROM $user_type WHERE email='$email'";
        $check = mysqli_query($conn, $sql)->fetch_array();
        // Cek keberadaan akun
        if ($check ) {

            // Cek keberadaan password

            if (password_verify($password,$check["password"])) {
                session_start();

                // Set SESSION untuk UMKM
                $_SESSION['username'] = $check['nama_perusahaan'];
                $_SESSION['email'] = $check['email'];
                $_SESSION['level'] = $user_type;
                header("Location:./view/homepage/");
                exit();
            }
        } else {
            echo "<script>alert('Email, password, atau tipe user Anda salah. Silakan coba lagi!')</script>";
        }
    }else{

	    $sql = "SELECT * FROM $user_type WHERE `email`='$email'";
        $check = mysqli_query($conn, $sql)->fetch_array();

        // Cek keberadaan
        if ($check) {

            // Cek Password
            if (password_verify($password,$check["password"])) {

                // Cek status
                
                if($check["status"] === "terima")
                {
                    session_start();
                    $_SESSION['username'] = $check['username'];
                    $_SESSION['email'] = $check['email'];
                    $_SESSION['level'] = $user_type;
                    header("Location:./view/homepage/");
                    exit();
                }else if ($check["status"] === "menunggu")
                {
                    echo "<script>alert('Akun anda sedang diproses oleh admin , Silahkan tunggu')</script>";
                }else{
                    echo "<script>alert('Mohon coba kembali lain waktu')</script>";
                }
            }else{
                echo "<script>alert('password anda salah. Silakan coba lagi!')</script>";
            }
        } else {
            echo "<script>alert('Email, password, atau tipe user Anda salah. Silakan coba lagi!')</script>";
        }

    }
}

// ========================================================================================================================================================================================
// Freelance

function tambah_registrasi_freelance()
{
    global $conn;
    $username = $_POST['username'];
	$email = $_POST['email'];
	$nama_pertama = $_POST['nama_pertama'];
	$nama_terakhir = $_POST['nama_terakhir'];
    $password = password_hash($_POST["password"] , PASSWORD_DEFAULT);
	$foto_profile = foto_profile_upload();
    $cv = cv_upload();
	$bank = $_POST['bank'];
	$rekening = $_POST['rekening'];
    $kategori_pekerja = $_POST['kategori_pekerja'];

    $check_username = mysqli_query($conn,"SELECT * `pekerja_jasa` WHERE username='$username'");
    $check_username = mysqli_fetch_array($check_username);


    if (!$cv) {
        echo "<script>
            alert('Masukkan file cv terlebih dahulu!');
        </script>";
        return false;
    }elseif($check_username) {
        echo "<script>
            alert('Akun Sudah ada');
        </script>";
        return false;
    }

    
	$sql = "INSERT INTO `pekerja_jasa`
    
    (`username`,`email`, `password`, `nama_pertama`, `nama_terakhir`, `no_rek`, `bank`, `profile_photo`, `cv`, `status`, `id_kategori_pekerja`) 
    
    VALUES 
    
    ('$username' ,'$email', '$password', '$nama_pertama', '$nama_terakhir', '$rekening', '$bank' , '$foto_profile' , '$cv' , 'menunggu' , $kategori_pekerja);";
    $result = mysqli_query($conn, $sql);

    if ($result) {
            echo "<script>
            alert('Berhhasil ditambahkan tunggu hingga di terima oleh admin');
            </script>";
            header("Location:index.php");
    }else{
        return false;
    }

}


function foto_profile_upload(){
    $namaFile = $_FILES['profile_photo']['name'];
    $ukuranFile = $_FILES['profile_photo']['size'];
    $error = $_FILES['profile_photo']['error'];
    $tmpName = $_FILES['profile_photo']['tmp_name'];

    
    // cek apakah tidak ada gambar yang diupload
    if( $error === 4 ) {
        echo "<script>
        alert('pilih gambar terlebih dahulu!');
        </script>";
        return false;
    }
    
    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    
    // Fungsi dari in_array adalah untuk mencarai string di dalam array
    if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
        echo "<script>
        alert('yang anda upload bukan gambar!');
        </script>";
        return false;
        }
        
        // cek jika ukurannya terlalu besar
        if( $ukuranFile > 1000000000 ) {
            echo "<script>
            alert('ukuran gambar terlalu besar!');
            </script>";
            return false;
        }
    
    
    // lolos pengecekan, gambar siap diupload

    $username = $_POST['username'];
    $namaFile = ($username."_pp".".".$ekstensiGambar);
    move_uploaded_file($tmpName, './assets/profile_photo/' . $namaFile);
    
    return $namaFile;   
}

function cv_upload()
{
    global $conn;
    $namaFile = $_FILES['cv']['name'];
    $ukuranFile = $_FILES['cv']['size'];
    $error = $_FILES['cv']['error'];
    $tmpName = $_FILES['cv']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if( $error === 4 ) 
    {
        echo "<script>
        alert('pilih file terlebih dahulu!');
        </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png','pdf'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    // Fungsi dari in_array adalah untuk mencarai string di dalam array
    if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
        echo "<script>
            alert('Sistem tidak support apa yang anda upload !');
        </script>";
    return false;
    }

    // cek jika ukurannya terlalu besar
    if( $ukuranFile > 1000000000 ) {
    echo "<script>
    alert('ukuran file terlalu besar!');
    </script>";
    return false;
    }


    // lolos pengecekan, gambar siap diupload
    
    $username = $_POST['username'];
    $namaFile = ($username."_cv".".".$ekstensiGambar);
    move_uploaded_file($tmpName, './assets/cv/' . $namaFile);

    return $namaFile;
}

// Customer UMKM

function tambah_registrasi_customer()
{
    global $conn;

    $photo_profile = foto_profile_upload_customer();
    $nama_perusahaan = $_POST["nama_perusahaan"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $NIB = $_POST["NIB"];
    $NPWP = $_POST["NPWP"];
    $rekening  = $_POST["rekening"];


    // Cek nama perusahaan
    $check_nama_perusahaan_quary = mysqli_query($conn,"SELECT * FROM `umkm` WHERE nama_perusahaan='$nama_perusahaan'");
    $check_nama_perusahaan = mysqli_fetch_array($check_nama_perusahaan_quary);
    // Enskripsi Password

    $password = password_hash($password, PASSWORD_DEFAULT);

    if ($check_nama_perusahaan) {
        echo "<script>
        alert('Akun sudah ada');
        </script>";
        return false;
    }


    $sql = "INSERT INTO `umkm`
    
    (`email`, `password`, `nama_perusahaan`, `NIB`, `NPWP`, `no_rek`, `profile_photo`, `status`) 
    
    VALUES 
    
    ('$email', '$password', '$nama_perusahaan', '$NIB', '$NPWP', '$rekening' , '$photo_profile' , 'menunggu');";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>
        alert('Berhhasil ditambahkan tunggu hingga di terima oleh admin');
        </script>";

        header("Location:index.php");
    }else{
        return false;
    }
}

function foto_profile_upload_customer(){
    $namaFile = $_FILES['profile_photo']['name'];
    $ukuranFile = $_FILES['profile_photo']['size'];
    $error = $_FILES['profile_photo']['error'];
    $tmpName = $_FILES['profile_photo']['tmp_name'];

    
    // cek apakah tidak ada gambar yang diupload
    if( $error === 4 ) {
        echo "<script>
        alert('pilih gambar terlebih dahulu!');
        </script>";
        return false;
    }
    
    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    
    // Fungsi dari in_array adalah untuk mencarai string di dalam array
    if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
        echo "<script>
        alert('yang anda upload bukan gambar!');
        </script>";
        return false;
        }
        
        // cek jika ukurannya terlalu besar
        if( $ukuranFile > 1000000000 ) {
            echo "<script>
            alert('ukuran gambar terlalu besar!');
            </script>";
            return false;
        }
    
    
    // lolos pengecekan, gambar siap diupload

    $username = $_POST['nama_perusahaan'];
    $namaFile = ($username."_pp".".".$ekstensiGambar);
    move_uploaded_file($tmpName, './assets/profile_photo/' . $namaFile);
    
    return $namaFile;   
}
