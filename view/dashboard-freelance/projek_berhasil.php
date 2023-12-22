<?php
require_once("../../models/freelanceModel.php");
// -----------------------------------------------

session_start();

$selectedCategory = isset($_GET['kategori']) ? $_GET['kategori'] : '1';

$sql = "SELECT 
pr.id_pekerjaan,
pr.tanggal_request,
pj.profile_photo,
pj.nama_pertama,
pj.nama_terakhir,
pr.nama_pekerjaan,
kr.nama_kategori,
p.deskripsi,
hp.hasil_lampiran,
p.range_penilaian
FROM 
`pekerjaan_request` pr
JOIN
	`pekerja_jasa` pj
ON
	pr.id_pekerja_jasa = pj.id_user
JOIN
	`kategori_request` kr
ON
	pr.id_kategori = kr.id
JOIN
	`hasil_pekerjaan` hp
ON
	pr.id_pekerjaan = hp.id_pekerjaan
JOIN
	`penilaian` p
ON
	p.id_pekerjaan = pr.id_pekerjaan";
if (!empty($selectedCategory) && $selectedCategory !== 0) {
    $sql .= "  WHERE kr.id = $selectedCategory AND pr.status = 'selesai' AND pj.email='{$_SESSION['email']}'";
}else{
    $sql .= " WHERE pr.status = 'selesai' AND pj.email='{$_SESSION['email']}'";
}

// var_dump($sql);
// die;

$sql_kategori = "SELECT * FROM `kategori_request` WHERE id = $selectedCategory";
$kategori = mysqli_query($conn, $sql_kategori);

$result = $conn->query($sql);
$projects = array();

// -------------------------------------------------

$projects = array();
if ($result->num_rows > 0) {
    while ($row = $result -> fetch_assoc()){
        $projects[]= $row;
    }
} 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Project Berhasil | Nganggur</title>
        <!-- FAVICON -->
        <link rel="icon" type="image/x-icon" href="../../assets/logo/Logo.png" />
        <!-- ICON -->
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css" />
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
        <!-- Swiper -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
        <!-- AOS -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
        <!-- CSS Ku -->
        <link rel="stylesheet" href="../../css/style-project-selesai.css" />
    </head>
    <body>
        
        <img src="../../assets/bg.png" style="z-index: -1; position: absolute; right: 0; top: -25px" />
        <!-- NAVBAR -->
        <nav class="navbar navbar-expand-lg bg-primary fixed-top">
            <div class="container">
                <a href="#"><img src="../../assets/logo/Logo.png" class="navbar-brand" style="height: 50px" /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
                                <img src="../../assets/message.png" class="navbar-brand" style="height: 45px" />
                            </li>
                            <li class="nav-item">
                                <img src="../../assets/profile.png" class="navbar-brand" style="height: 40px" />
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light fw-bolder">|</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" style="margin-right: 90px" href="#"
                                    >Logout
                                    <img src="../../assets/sign.png" class="navbar-brand" style="height: 30px" />
                                </a>
                            </li>
                        </ul>
                    </span>
                </div>
            </div>
        </nav>
        <!-- NAVBAR END -->

        <!-- PROJECT SELESAI -->
        <div class="container mt-5" style="transform: translateY(75px)">
            <div class="row">
                <div class="col">
                    <div class="page-tittle">
                        <h2>Project Selesai</h2>
                    </div>
                </div>
            </div>
            <div class="content-wrapper mt-3 p-5">
                <div class="sub-tittle pb-3 d-flex" style="width: 100%; background-color: #f7f7f7; border-radius: 20px 20px 0 0; border-bottom: 3px solid #e7e7e7; height: fit-content">
                    <h5 class="align-items-center">Beri Ulasan</h5>
                </div>
                <div class="row mt-5 mb-5">
                    <div class="col">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <div class="filter">
                                <form action="" method="GET">
                                    <label for="disabledSelect" class="form-label"><h6>Kategori :</h6></label>
                                    <select id="" name="kategori" class="dropdown-filter ms-3">
                                        <option <?php if(!isset($_GET['kategori']) || $_GET['kategori'] == '0') echo 'selected'; ?> value="0">Semua Kategori</option>
                                        <?php 
                                        $pilih_kategori = mysqli_query($conn,"SELECT * FROM `kategori_request`");

                                        while ($row = mysqli_fetch_assoc($pilih_kategori)) {
                                        ?>
                                        <option <?php if(isset($_GET['kategori']) && $_GET['kategori'] == $row['id']) echo 'selected'; ?> value="<?=$row['id']?>"><?=$row['nama_kategori']?></option>
                                        <?php }?>
                                    </select>
                                    <button type="submit" class="btn btn-primary ms-2 p-2 px-2"><i class="uil uil-search"></i></button>
                                </form>

                            </div>

                            <div class="search">
                                <input type="text" class="search-box" placeholder="Search by Invoice / Project / Talent" />
                            </div>
                        </div>
                    </div>
                </div>

                <?php foreach ($projects as $project) {
                    
                ?>
                <!-- PROJECT WRAP -->
                <div class="row mb-3" data-aos="fade-up" data-aos-duration="1500">
                    <div class="col">
                        <div class="project-wrapper d-flex flex-column shadow-sm">
                            <div class="tgl-invoice d-flex flex-row justify-content-between pt-3 px-3">
                                <p class="tgl-pesanan">Pesanan diterima: <?=date('d M Y', strtotime($project['tanggal_request']));?></p>
                            </div>
                            <div class="content-main d-flex flex-row mt-3 px-4">
                                <img src="../../assets/profile_photo/<?= $project['profile_photo']?>" alt="" class="avatar-freelancer" />
                                <div class="namaFreelancer ms-4">
                                    <h4 class="mb-3"><?= $project['nama_pertama'].$project['nama_terakhir'] ?></h4>
                                    <div class="role"><p>Freelancer</p></div>
                                    <h6 class="p-3 fs-5">RATING : <?= $project["range_penilaian"] ?></h6> 
                                </div>
                                <div class="line-project-card mb-3"></div>
                                <div class="d-flex flex-column project ms-4">
                                    <h3><?= $project['nama_pekerjaan'] ?></h3>
                                    <div class="row gx-5">
                                        <div class="col-5 me-2">
                                            <img src="../../assets/revisian/<?= $project['hasil_lampiran'] ?>" alt="" class="gambarProject" />
                                        </div>
                                        <div class="col-5 d-flex flex-column justify-content-evenly judul-project ms-5">
                                            <div class="text">
                                                <h6><?= $project['deskripsi'] ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- END PROJECT WRAP -->
                <?php } ?>

                <br /><br /><br /><br /><br />
            </div>
        </div>
        <!-- PROJECT SELESAI END -->

        <!-- SWIPER JS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <!-- JAVASCRIPT Bootstrap-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <!-- AOS -->
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <!-- JAVASCRIPT Ku-->
        <script src="../../js/script.js"></script>
    </body>
</html>
