<?php
 $login = true;
 require_once("../../models/freelanceModel.php");
 require_once("../../controller/freelanceController.php");
 session_start();
if (isset($_GET["id_pekerjaan"])) {
    $id = $_GET["id_pekerjaan"];
}else
{
    echo "<script>
            alert('Mohon untuk memilih proyek');
            window.location.href = '../tawaran-project/';
        </script>";
}

if (isset($_POST["daftar"])) menawarkan_jasa_tambah();

$check_formulir_query = mysqli_query($conn,"SELECT 
* 
FROM 
`menawarkan_jasa` mj
JOIN
`pekerja_jasa` pj
ON
mj.id_pekerja_jasa = pj.id_user
JOIN 
`pekerjaan_request` pr 
ON
mj.id_pekerjaan = pr.id_pekerjaan
WHERE
pj.email='{$_SESSION['email']}' AND pr.id_pekerjaan = {$_GET['id_pekerjaan']}");



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Menawarkan Jasa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
   
    <link rel="stylesheet" href="../../css/style-menawar.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link rel="stylesheet" type="style">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5/5v73f0Hk3SX8v+fZpIu0RrT4BzB69MUf/3JqVzKWQTKFgEhGQDQVlO1H2cTQ+T0QE1TJ2eVNdDtCxBPJxU1" crossorigin="anonymous">
    <!-- CSS Ku 
    <link rel="stylesheet" href="css/style.css"/>
    -->
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <!-- <a class="navbar-brand" href="#"><img class="logoImg" src="image/Logo.png" alt="" /></a>-->
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="../../assets/logo.png"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            
        
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#kategori">Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#portofolio">Portofolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimoni">Testimoni</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#cara-kerja">Cara Kerja</a>
                    </li>
                </ul>
            
        

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
             <li class='nav-item'><a class='nav-link' aria-current='page' href='#'>Logout <i class="uil uil-sign-in-alt"></i></a></li>
             <?php 
            }
            ?>
          </ul>
      </div>
    </div>

        
    
    </nav>
    <br>
     <!-- AKSEN IMG -->
    <img src="../image/aksen.png" alt="" class="aksenImg" />
    <!-- Formulir Pendaftaran -->
    <div class="container mt-4">
        <?php 
        if (mysqli_num_rows($check_formulir_query) > 0) {
        ?>
            <p class="text-center fs-1">Anda sudah mendaftar</p>
        <?php
        die;
        }

        ?>
        <h2 class="text-center mb-4">Formulir Menawarkan Jasa</h2>
        <form action="" method="post">
            <div class="container mt-4">
        <!-- Add a hidden input field for ID Pekerja Jasa -->
        <div class="row">
            <div class="col">
                <label for="comment" >Nama Depan</label>

                   <!-- menampilkan nama pertama -->
                   <?php
                      $tampil = mysqli_query($conn, "SELECT nama_pertama FROM pekerja_jasa WHERE email='{$_SESSION['email']}'");          
                            // cek apakah query berhasil dijalankan
                            if ($tampil){
                                // Fetch data dari hasil query
                                $database = mysqli_fetch_assoc($tampil);
                                // Tampilkan data nama depan di dalam input readonlu
                                echo '<input type="text" class="form-control" placeholder="" id="nama_pertama" name="nama_pertama" value="' . $database['nama_pertama'] . '" readonly>';
                            } else {
                            // Tampilkan pesan kesalahan jika query gagal
                            echo "Error: " . mysqli_error($conn);
                        }
                        ?>
                            
                            <!-- <input type="text" class="form-control" placeholder="" name="nama_depan" readonly> -->
                        </div>
                        <div class="col">
                <!-- menampilkan nama terakhir -->
                <label for="comment" class="fw-bold">Nama terakhir</label>  
                    <?php

                    // Query untuk mengambil data nama belakang dari tabel pekerja_jasa
                    $tampil_terakhir = mysqli_query($conn, "SELECT nama_terakhir FROM pekerja_jasa WHERE email='{$_SESSION['email']}'");
                    // Cek apakah query berhasil dijalankan
                        if ($tampil_terakhir) {
                        // Fetch data dari hasil query
                        $database_terakhir = mysqli_fetch_assoc($tampil_terakhir);
                        // Tampilkan data nama belakang di dalam input readonly
                        echo '<input type="text" class="form-control" placeholder="" name="nama_terakhir" value="' . $database_terakhir['nama_terakhir'] . '" readonly>';
                            } else {
                                // Tampilkan pesan kesalahan jika query gagal
                                echo "Error: " . mysqli_error($conn);
                            }    
                        ?>  
                        </div>
                    </div>

   <!-- Portofolio -->
    <div class="mb-3">
        <label for="fortofolio" class="form-label custom-label">Portofolio</label>
        <input 
        type="text" 
        class="form-control" 
        id="fortofolio" 
        name="fortofolio"
        value="<?= (isset($_POST['fortofolio'])?$_POST['fortofolio']:'') ?>" 
        required
        >    
    </div>
    
        <div class="mb-3">
            <input 
            type="text" 
            class="form-control" 
            id="id_pekerjaan" 
            name="id_pekerjaan" 
            value="<?= $id ?>" 
            hidden
            >
        </div>

        <button type="submit" class="btn btn-primary" name="daftar">Daftar</button>
    </form>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-GLhlTQ8iKt6U/xIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/j" crossorigin="anonymous"></script>
</body>
</html>