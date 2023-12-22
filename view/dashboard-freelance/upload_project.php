<?php
require_once("../../models/freelanceModel.php");
require_once("../../controller/freelanceController.php");

session_start();

if (isset($_POST["submit"]))upload_hasil();

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Upload File</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">
            <img src="../../assets/logo/Logo.png" class="navbar-brand" style="height: 50px; margin-left: 100px;"></img>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="margin-left: 30px;">
                <li class="nav-item">
                <a class="nav-link active text-light" aria-current="page" href="#">Kategori</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-light" href="#">Portofolio</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-light" href="#">Testimoni</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-light" href="#">Cara Kerja</a>
                </li>
            </ul>
            <span class="navbar-text">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <img src="message.png" class="navbar-brand" style="height: 45px;"></img>
                    </li>
                    <li class="nav-item">
                        <img src="profile.png" class="navbar-brand" style="height: 40px;"></img>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light fw-bolder">|</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" style="margin-right: 90px;" href="#">Logout
                        <img src="sign.png" class="navbar-brand" style="height: 30px;"></img>
                        </a>
                    </li>
                </ul>
            </span>
            </div>
        </div>
    </nav>
    <div style= 'background-image: url("bg.png"); background-size:contain; background-repeat:no-repeat; background-position: right;'>
    <p style="margin-top: 30px; margin-left: 115px; font-size: 2.5rem;"> Upload Revisi </p>
    <div class="card" style="width: 85vw; height: 60vh; margin: 0; border-width:3px; margin-left: 115px;">
        <div class="card-header">
            <form action="" method="POST" enctype="multipart/form-data">

                <div class="mb-3">
                    <label for="hasil_lampiran" class="form-label">File Upload</label> 
                    <input type="file" name="hasil_lampiran" class="form-control">
                </div>
                
                <div class="mb-3">
                    <label for="hasil_lampiran" class="form-label">Keterangan</label> 
                    <textarea type="file" name="keterangan" class="form-control"></textarea>
                </div>
                <input type="text" value="<?= $_GET['id_pekerjaan'] ?>" hidden>
                <button type="submit" name="submit" class="btn btn-primary">Upload</button>
                <a href="cek_tawaran.php" class="btn btn-info">Kembali</a>
            </form>


                
                <ul class="nav nav-pills card-header-pills"> 
                </div>
            </div>
            <div style="margin: 0; border-width:3px; margin-left: 115px;">
                <div class="d-flex justify-content-end" style="margin-right: 5vw; margin-top: 2vw;">
                    <a class="nav-link text-light" href="#"></a>
                </div>
            </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  </body>
</html>