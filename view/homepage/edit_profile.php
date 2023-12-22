<?php
require_once("../../models/freelanceModel.php");
session_start();

if ($_SESSION["level"] == "pekerja_jasa") {
    require_once("../../controller/freelanceController.php");
}elseif($_SESSION["level"] == "umkm"){
    require_once("../../controller/umkmController.php");
}

$email = $_SESSION["email"];

if ($_SESSION["level"] == "pekerja_jasa") {
    $sql = "SELECT * FROM `pekerja_jasa` WHERE `email`='$email'";
    $data = mysqli_query($conn,$sql)->fetch_assoc();
}elseif($_SESSION["level"] == "umkm"){
    $sql = "SELECT * FROM `umkm` WHERE `email`='$email'";
    $data = mysqli_query($conn,$sql)->fetch_assoc();
}

$id = $data["id_user"];

if (isset($_POST["submit"])){

    if ($_SESSION["level"] == "pekerja_jasa") {

        edit_profile_freelance($id);
        
    }elseif($_SESSION["level"] == "umkm"){
        
        edit_profile_customer($id);

    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Photo Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .rounded-circle-container {
            width: 150px;
            height: 150px;
            overflow: hidden;
            border-radius: 50%;
            margin: auto;
            margin-top: 20px;
        }

        .rounded-circle-container img {
            width: 100%;
            height: auto;
        }
        div{
            border-radius: 1px solid black;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-primary">
    <div class="container">
        <a href="../homepage/">
            <img src="../../assets/logo/Logo.png" class="navbar-brand" style="height: 50px; margin-left: 100px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        
    </div>
</nav>

<div class="container">
    <div style='background-image: url("bg.png"); background-size:contain; background-repeat:no-repeat; background-position: right;'>
    <p class="fs-1 text-center">Edit Photo Profile</p>
    <div class="card">
        
    <div class="container-sm p-5 ">
            <div class="rounded-circle-container">
                <img src="../../assets/profile_photo/<?= $data["profile_photo"] ?>" alt="Profile Photo">
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <?php 
                if ($_SESSION["level"] == "pekerja_jasa") {
                ?>

                <input type="text" value="<?=$data['username']?>" name="username" hidden>
                <input type="text" value="<?=$data['profile_photo']?>" name="foto_lama" hidden>

                <div class="mb-3">
                    <label for="profilePhoto" class="form-label">Upload Photo</label>
                    <input type="file" class="form-control" id="profilePhoto" name="profile_photo" accept="image/*">
                </div>
                
                <div class="mb-3">
                    <label for="nama_pertama" class="form-label">Nama Pertama</label>
                    <input type="text" class="form-control" name="nama_pertama" value="<?= $data['nama_pertama'] ?>">
                </div>

                <div class="mb-3">
                    <label for="nama_terakhir" class="form-label">Nama Terakhir</label>
                    <input type="text" class="form-control" id="nama_terakhir" name="nama_terakhir" value="<?= $data['nama_terakhir'] ?>">
                </div>

                <div class="mb-3">
                    <label for="no_rek" class="form-label">No Rekening</label>
                    <input type="text" class="form-control" id="no_rek" name="no_rek" value="<?= $data['no_rek'] ?>">
                </div>

                <div class="mb-3">
                    <label for="bank" class="form-label">Bank</label>
                    <select type="text" class="form-control" id="bank" name="bank">
                    <option selected value="<?= $data['bank'] ?>" hidden><?= $data['bank'] ?></option>
                        <option value="BCA">BCA</option>
                        <option value="BNI">BNI</option>
                        <option value="BRI">BRI</option>
                        <option value="BSI">BSI</option>
                        <option value="BTN">BTN</option>
                        <option value="Mandiri">Mandiri</option>
                        <option value="Sinarmas">Sinarmas</option>
                    </select>
                </div>

                <?php }else{ ?>

                    <input type="text" value="<?=$data['username']?>" name="username" hidden>
                <input type="text" value="<?=$data['profile_photo']?>" name="foto_lama" hidden>

                <div class="mb-3">
                    <label for="profilePhoto" class="form-label">Upload Photo</label>
                    <input type="file" class="form-control" id="profilePhoto" name="profile_photo" accept="image/*">
                </div>
                
                <div class="mb-3">
                    <label for="nama_pertama" class="form-label">Nama Pertama</label>
                    <input type="text" class="form-control" name="nama_pertama" value="<?= $data['nama_perusahaan'] ?>">
                </div>

                <div class="mb-3">
                    <label for="no_rek" class="form-label">No Rekening</label>
                    <input type="text" class="form-control" id="no_rek" name="no_rek" value="<?= $data['no_rek'] ?>">
                </div>

                <?php } ?>
                

                <button type="submit" name="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
    <div style="margin: 0; border-width:3px; margin-left: 115px;">
        <div class="d-flex justify-content-end" style="margin-right: 5vw; margin-top: 2vw;">
            <a class="nav-link text-light" href="#"></a>
        </div>
    </div>
</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
