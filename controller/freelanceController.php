<?php

$conn = mysqli_connect("localhost","root","","db_freelance");

function menawarkan_jasa_tambah()
{
    global $conn;
    $email = $_SESSION["email"];
    $tanggal = date("Y-m-d");

    $pekerja_jasa_query = mysqli_query($conn,"SELECT id_user FROM `pekerja_jasa` WHERE email='$email'")->fetch_assoc();
    $pekerja_jasa = $pekerja_jasa_query["id_user"];

    $nama_pertama = $_POST["nama_pertama"];
    $nama_terakhir = $_POST["nama_terakhir"];
    $fortofolio = $_POST["fortofolio"];
    $status = "menunggu";
    $id_pekerjaan = $_POST["id_pekerjaan"];

    $sql = "INSERT INTO `menawarkan_jasa`(`tanggal`, `fortofolio`, `status`, `id_pekerja_jasa`, `id_pekerjaan`) VALUES ('$tanggal','$fortofolio','$status',$pekerja_jasa,$id_pekerjaan)";
    $result = mysqli_query($conn,$sql);

    if ($result) {
        echo "<script>
                alert('Berhasil menawarkan projek');
                window.location.href = '../tawaran-project/';
            </script>";
    }else {
        echo "<script>
                alert('Gagal Menawarkan Projek');
            </script>";
            return false;
    }
}

function upload_hasil()
{
    global $conn;

    $id_pekerjaan = $_GET["id_pekerjaan"];
    $hasil_lampiran = upload_hasil_lampiran();
    $keterangan = $_POST["keterangan"];
    $status = "menunggu";
    $tanggal = date("Y-m-d");

    $sql = "INSERT INTO `hasil_pekerjaan`(`tanggal`, `hasil_lampiran`, `keterangan`, `status`, `id_pekerjaan`) VALUES ('$tanggal','$hasil_lampiran','$keterangan','$status',$id_pekerjaan)";
    $result = mysqli_query($conn,$sql);

    if ($result) {
        echo "<script>
                alert('Berhasil diupload');
                window.location.href = 'cek_tawaran.php';
            </script>";
    }else {
        echo "<script>
                alert('Gagal Menawarkan Projek');
            </script>";
            return false;
    }
}

function upload_hasil_lampiran()
{
    global $conn;
    $namaFile = $_FILES['hasil_lampiran']['name'];
    $ukuranFile = $_FILES['hasil_lampiran']['size'];
    $error = $_FILES['hasil_lampiran']['error'];
    $tmpName = $_FILES['hasil_lampiran']['tmp_name'];

    
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
    $id_query = mysqli_query($conn,"SELECT * FROM `hasil_pekerjaan`");
    $uniqe = 1;

    while($row = mysqli_fetch_array($id_query))
    {
        $uniqe++;
    }

    $id_pekerjaan = $_GET["id_pekerjaan"];
    $namaFile = ($uniqe."_".$id_pekerjaan."_hasil_lampiran".".".$ekstensiGambar);
    move_uploaded_file($tmpName, '../../assets/revisian/' . $namaFile);
    
    return $namaFile;
}

function edit_profile_freelance($id)
{
    global $conn;

    // var_dump($_POST);
    // die;
    // array(4) { ["nama_pertama"]=> string(5) "Dimas" ["nama_terakhir"]=> string(14) "Dliyaur Rahman" ["no_rek"]=> string(10) "2147483647" ["submit"]=> string(0) "" }

    $nama_pertama = $_POST["nama_pertama"];
    $nama_terakhir = $_POST["nama_terakhir"];
    $no_rek = $_POST["no_rek"];
    $bank = $_POST["bank"];

    if (isset($_FILES["profile_photo"])) {
        update_photo_profile();
    }

    $sql = "UPDATE `pekerja_jasa` SET `nama_pertama`='$nama_pertama',`nama_terakhir`='$nama_terakhir',`no_rek`='$no_rek',`bank`='$bank' WHERE `id_user`=$id";
    $result = mysqli_query($conn,$sql);

    if ($result) {
        
        echo "<script>
                alert('Berhasil update');
                window.location.href = '../homepage/edit_profile.php';
            </script>";
    }else {
        echo "<script>
                alert('Gagal Menawarkan Projek');
            </script>";
            return false;
    }
}

function edit_profile_customer($id)
{
    global $conn;

    var_dump($_POST,$_FILES);
    die;
    // array(4) { ["nama_pertama"]=> string(5) "Dimas" ["nama_terakhir"]=> string(14) "Dliyaur Rahman" ["no_rek"]=> string(10) "2147483647" ["submit"]=> string(0) "" }

    $nama_pertama = $_POST["nama_pertama"];
    $nama_terakhir = $_POST["nama_terakhir"];
    $no_rek = $_POST["no_rek"];
    $bank = $_POST["bank"];

    if (isset($_FILES["profile_photo"])) {
        update_photo_profile();
    }

    $sql = "UPDATE `pekerja_jasa` SET `nama_pertama`='$nama_pertama',`nama_terakhir`='$nama_terakhir',`no_rek`='$no_rek',`bank`='$bank' WHERE `id_user`=$id";
    $result = mysqli_query($conn,$sql);

    if ($result) {
        
        echo "<script>
                alert('Berhasil update');
                window.location.href = '../homepage/edit_profile.php';
            </script>";
    }else {
        echo "<script>
                alert('Gagal Menawarkan Projek');
            </script>";
            return false;
    }
}

function update_photo_profile()
{
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
    
    $oldFile = $_POST["foto_lama"];
    $oldFilePath = '../../assets/profile_photo/' . $oldFile;
    
    if (file_exists($oldFilePath)) {
        unlink($oldFilePath);
    }

    move_uploaded_file($tmpName, '../../assets/profile_photo/' . $oldFile);
    
    return $oldFile;
}