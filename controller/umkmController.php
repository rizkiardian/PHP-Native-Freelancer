<?php
$conn = mysqli_connect("localhost","root","","db_freelance");


function menambahkan_proyek()
{
    global $conn;   
    
    if (isset($_SESSION["email"])) {
        $email = $_SESSION["email"];
        $sql = mysqli_query($conn,"SELECT * FROM `umkm` WHERE `email`='$email'")->fetch_assoc();
        $id_umkm = $sql["id_user"];
    }else{
        echo "<script>
                alert('Anda Belom login !');
                window.location.href = '../../';
            </script>";
    }
    
    $nama_pekerjaan = $_POST["nama_pekerjaan"];
    $deskripsi_pekerjaan = $_POST["deskripsi_pekerjaan"];
    $batas_waktu = $_POST["batas_waktu"];
    $tanggal_request = date('Y-m-d');
    $harga = $_POST["harga"];
    $status = "belum dimulai";
    $kategori = $_POST["kategori"];

    // var_dump([$nama_pekerjaan,$deskripsi_pekerjaan,$batas_waktu,$tanggal_request,$status,$harga,$id_umkm,$kategori]);
    // die;

    $sql = "INSERT INTO `pekerjaan_request`(`nama_pekerjaan`, `deskripsi_pekerjaan`, `batas_waktu`, `tanggal_request`, `status`, `harga`, `id_umkm`, `id_kategori`) VALUES ('$nama_pekerjaan','$deskripsi_pekerjaan','$batas_waktu','$tanggal_request','$status',$harga,$id_umkm,$kategori)";
    $result = mysqli_query($conn,$sql);

    if ($result) {
        echo "<script>
        alert('berhasil ditambahkan');
        window.location.href = '../homepage';
        </script>";
    }else{
        echo "<script>
        alert('Gagal Ditambahkan');
        </script>";
    }
}

function terima_tawaran($status,$id_status)
{
    global $conn;

    $id = $_GET[$id_status];
    $sql = "UPDATE `menawarkan_jasa` SET `status`='$status' WHERE id_menawar=$id";
    $result = mysqli_query($conn,$sql);
    if ($result) {
        echo "<script>
                alert('berhasil di".$status."');
                window.loaction.href = '../dashboard-customer/periksa_tawaran.php';
            </script>";
    }else{
        echo "<script>
        alert('Gagal di".$status."');
    </script>";
    }
}

function pembayaran()
{   
    global $conn;

    // Mencari ID UMKM
    $email = $_SESSION["email"];
    $id_umkm_query = mysqli_query($conn,"SELECT id_user FROM `umkm` WHERE email='$email'")->fetch_assoc();
    $id_umkm = $id_umkm_query["id_user"];

    // Inisisasi Data
    $tanggal = $_POST["tanggal"];
    $payment_method = $_POST["payment-method"];
    $id_pekerjaan = $_GET["id_pekerjaan"];
    $status = "menunggu";
    $foto = bukti_pembayaran();
    $id_pekerja_jasa = $_GET["id_pekerja_jasa"];

    // Menambahkan date Expired
    $countdown = date("Y-m-d", strtotime($tanggal . " +1 day"));

    $sql = "INSERT INTO `pembayaran`(`tanggal`, `status`, `countdown`, `foto`, `id_pekerjaan`, `id_umkm` , `id_pekerja_jasa`) VALUES ('$tanggal','$status','$countdown','$foto','$id_pekerjaan',$id_umkm , $id_pekerja_jasa)";
    $result = mysqli_query($conn,$sql);

    if ($result) {
        echo "<script>
                alert('Berhasil ditambahkan');
                window.location.href = 'hasil_lampiran.php';
            </script>";
    }else{
        echo "<script>
                alert('Gagal ditambahkan".mysqli_error($conn)."');
            </script>";

    }
}

function bukti_pembayaran()
{
    $namaFile = $_FILES['harga_input']['name'];
    $ukuranFile = $_FILES['harga_input']['size'];
    $error = $_FILES['harga_input']['error'];
    $tmpName = $_FILES['harga_input']['tmp_name'];

    
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

    $email = $_SESSION['email'];
    $namaFile = ($email."_".$_GET["id_menawar"]."_pembayaran".".".$ekstensiGambar);
    move_uploaded_file($tmpName, '../../assets/bukti_pembayaran/' . $namaFile);
    
    return $namaFile;
}

function tambah_revisi()
{
    global $conn;

    $keterangan = $_POST["keterangan"];
    $id_pekerjaan = $_POST["id_pekerjaan"];
    $id_hasil_pekerjaan = $_POST["id_hasil_pekerjaan"];

    // Update status revisi Request Project
    $update = mysqli_query($conn,"UPDATE `pekerjaan_request` SET `status`='revisi' WHERE id_pekerjaan = ".$id_pekerjaan = $_POST["id_pekerjaan"]."");
    
    // Update status revisi Hasil Pekrjaan
    $update = mysqli_query($conn,"UPDATE `pekerjaan_request` SET `status`='revisi' WHERE id_hasil_pekerjaan = ".$id_hasil_pekerjaan = $_POST["id_hasil_pekerjaan"]."");


    $sql = "INSERT INTO `revisi`( `keterangan_revisi`, `id_pekerjaan`, `id_hasil_pekerjaan`) VALUES ('$keterangan',$id_pekerjaan,$id_hasil_pekerjaan)";

    $result = mysqli_query($conn,$sql);

    if ($result) {
        echo "<script>
                alert('Berhasil ditambahkan');
                window.location.href = 'hasil_lampiran.php';
            </script>";
    }else{
        echo "<script>
                alert('Gagal ditambahkan".mysqli_error($conn)."');
            </script>";
    }    

}

function project_selesai()
{
    global $conn;
    $result = mysqli_query($conn,"UPDATE `pekerjaan_request` SET `status`='selesai' WHERE id_pekerjaan = ".$_GET["id_pekerjaan"]."");

    if ($result) {
        echo "<script>
                alert('Berhasil ditambahkan');
                window.location.href = 'hasil_lampiran.php';
            </script>";
    }else{
        echo "<script>
                alert('Gagal ditambahkan".mysqli_error($conn)."');
            </script>";
    }
}

function edit_profile()
{
    var_dump($_POST);
    die;
}