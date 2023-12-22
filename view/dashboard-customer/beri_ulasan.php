<?php
require_once("../../models/freelanceModel.php");
session_start();
$id = $_GET["id_pekerjaan"];
$query = "SELECT DISTINCT pekerjaan_request.*, pekerja_jasa.nama_pertama, pekerja_jasa.nama_terakhir, hasil_pekerjaan.tanggal
FROM pekerjaan_request
JOIN hasil_pekerjaan ON pekerjaan_request.id_pekerjaan = hasil_pekerjaan.id_pekerjaan
JOIN pekerja_jasa ON pekerjaan_request.id_pekerja_jasa = pekerja_jasa.id_user
WHERE pekerjaan_request.id_pekerjaan = ".$_GET["id_pekerjaan"]."";
$result = mysqli_query($conn,$query);
$datas = mysqli_fetch_assoc($result);

// Periksa apakah formulir telah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Periksa apakah semua data yang diperlukan telah diterima
    if (isset($_POST['idProject'], $_POST['bintang'], $_POST['ulasan'])) {
        $idProject = $_POST['idProject'];
        $bintang = $_POST['bintang'];
        $ulasan = $_POST['ulasan'];
        $tanggal = date("Y-m-d");

        // Periksa apakah bintang dan ulasan kosong
        if (empty($bintang) || empty($ulasan)) {
            // Data yang diperlukan tidak lengkap
            echo "<script>
                var errorMessage = 'Data yang diperlukan tidak lengkap.';
            </script>";
        } else {
            // Jalankan query untuk menyimpan ulasan
            $sql = "INSERT INTO `penilaian` (`range_penilaian`, `deskripsi`, `tanggal`, `id_pekerjaan`) VALUES ($bintang, '$ulasan','$tanggal',$idProject)";

            if (mysqli_query($conn,$sql) === TRUE) {
                // Data berhasil disimpan, tampilkan SweetAlert
                echo "<script>
                    var successMessage = 'Berhasil Ulas Project';
                </script>";
            } else {
                // Kesalahan saat menyimpan data
                echo "<script>
                    var errorMessage = 'Gagal Ulas Project. Error: " . $conn->error . "';
                </script>";
            }
        }
    } else {
        // Data yang diperlukan tidak lengkap
        echo "<script>
            var errorMessage = 'Data yang diperlukan tidak lengkap.';
        </script>";
    }
}


?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Beri Ulasan | Nganggur</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <!-- FAVICON -->
        <link rel="icon" type="image/x-icon" href=../../assets/Logo.png" />
        <!-- FA ICON -->
        <link
            rel="stylesheet"
            href="path/to/font-awesome/css/font-awesome.min.css"
        />
        <!-- ICON -->
        <link
            rel="stylesheet"
            href="https://unicons.iconscout.com/release/v4.0.8/css/line.css"
        />
        <!-- Swiper -->
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
        />
        <!-- AOS -->
        <link
            href="https://unpkg.com/aos@2.3.1/dist/aos.css"
            rel="stylesheet"
        />
        <!-- CSS Ku -->
        <link rel="stylesheet" href="../../css/style_beriulasan.css" />
        <style>
            input[type="radio"] {
                display: none;
            }

            label {
                cursor: pointer;
                font-size: 20px;
                color: #ccc; /* warna default bintang */
            }

            /* Tambahkan warna berbeda untuk bintang yang dipilih */
            .star-rating input.checked ~ label{
                color: #ffcc00; /* Warna bintang saat diklik atau dihover */
            }
        </style>
    </head>
    <body>
        <img
            src="../../assets/bg.png"
            style="z-index: -1; position: absolute; right: 0; top: -25px"
        />
        <!-- NAVBAR -->
        <nav class="navbar navbar-expand-lg bg-primary fixed-top">
            <div class="container">
                <a href="#"
                    ><img
                        src="../../assets/Logo.png"
                        class="navbar-brand"
                        style="height: 50px"
                /></a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarText"
                    aria-controls="navbarText"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a
                                class="nav-link active text-light"
                                aria-current="page"
                                href="#"
                                >Kategori</a
                            >
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#"
                                >Portofolio</a
                            >
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#"
                                >Testimoni</a
                            >
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#"
                                >Cara Kerja</a
                            >
                        </li>
                    </ul>
                    <span class="navbar-text">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <img
                                    src="../../assets/message.png"
                                    class="navbar-brand"
                                    style="height: 45px"
                                />
                            </li>
                            <li class="nav-item">
                                <img
                                    src="../../assets/profile.png"
                                    class="navbar-brand"
                                    style="height: 40px"
                                />
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light fw-bolder">|</a>
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link text-light"
                                    style="margin-right: 90px"
                                    href="#"
                                    >Logout
                                    <img
                                        src="../../assets/sign.png"
                                        class="navbar-brand"
                                        style="height: 30px"
                                    />
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
                        <h2>Ulasan</h2>
                    </div>
                </div>
            </div>
            <div class="content-wrapper mt-3 p-5">
                <div
                    class="sub-tittle pb-3 d-flex"
                    style="
                        width: 100%;
                        background-color: #f7f7f7;
                        border-radius: 20px 20px 0 0;
                        border-bottom: 3px solid #e7e7e7;
                        height: fit-content;
                    "
                >
                    <h5 class="align-items-center">Beri Ulasan</h5>
                </div>
                <div class="row mt-3 mb-2">
                    <div class="col">
                        <div
                            class="d-flex flex-row align-items-center justify-content-between tombol-kembali"
                        >
                            <a href="projectselesai.php"
                                ><p>
                                    <i class="uil uil-angle-left"></i> Kembali
                                </p></a
                            >
                        </div>
                    </div>
                </div>

                <!-- PROJECT WRAP -->
                <!-- AOS JIKA BUTUH -->
                <!-- 
                    data-aos="fade-up"
                    data-aos-duration="1500"
                 -->
                <div
                    class="row mb-3"
                    
                >
                    <div class="col">
                        <div
                            class="project-wrapper d-flex flex-column shadow-sm"
                        >
                            <div
                                class="tgl-invoice d-flex flex-row justify-content-between pt-3 px-3"
                            >
                                <p class="invoice">Freelancer :<?= $datas["nama_pertama"]." ".$datas["nama_terakhir"] ?></p>
                                <p class="tgl-pesanan">
                                    Pesanan diterima: <?=date('d F Y', strtotime($datas['tanggal']));?>
                                </p>
                            </div>
                            <div
                                class="content-main d-flex flex-row mt-3 px-4 column-gap-4"
                            >
                                <div class="ulas-gambar-project">
                                    <img src="../../assets/project1_.png" alt="" />
                                </div>
                                <div
                                    class="form-ulas d-flex flex-column justify-content-evenly"
                                >
                                    <div class="judul-project">
                                        <div class="row">
                                            <div class="col-10">
                                                <h6 style="font-size: 24px">
                                                <?= $datas['nama_pekerjaan'] ?>
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <p>
                                                    Beri ulasan untuk project
                                                    yang telah diselesaikan
                                                    freelancer
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-ulasan">
                                    <form action="" method="POST" id="ratingForm">
                                    <div
                                        class="d-flex flex-row star-rating justify-content-left mb-3" style="direction: rtl;"
                                    >
                                    <div class="col"></div>
                                        
                                        <input type="radio" name="bintang" value="5" id="bintang1" style="display:none;">
                                        <label for="bintang1"><i class="fa fa-star  me-2"></i></label>

                                        <input type="radio" name="bintang" value="4" id="bintang2" style="display:none;">
                                        <label for="bintang2"><i class="fa fa-star  me-2"></i></label>

                                        <input type="radio" name="bintang" value="3" id="bintang3" style="display:none;">
                                        <label for="bintang3"><i class="fa fa-star  me-2"></i></label>

                                        <input type="radio" name="bintang" value="2" id="bintang4" style="display:none;">
                                        <label for="bintang4"><i class="fa fa-star  me-2"></i></label>

                                        <input type="radio" name="bintang" value="1" id="bintang5" style="display:none;">
                                        <label for="bintang5"><i class="fa fa-star  me-2"></i></label>
                                        
                                    </div>
                                    <input type="hidden" name="idProject" value="<?=$id?>">
                                        
                                        <textarea
                                            id="ulasan"
                                            name="ulasan"
                                            cols="70"
                                            rows="5"
                                            class="shadow-sm"
                                            placeholder="Tulis ulasan disini..."
                                            
                                        ></textarea>
                                        <div
                                            class="button-kirim d-flex justify-content-end column-gap-3"
                                        >
                                            <button class="cancel-button"><a href="projectselesai.php">Kembali</a>
                                                
                                            </button>
                                            <button
                                                type="submit"
                                                class="kirim-button"
                                                id="kirimButton"
                                            >
                                                Kirim
                                            </button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- END PROJECT WRAP -->

                    <br /><br /><br /><br /><br />
                </div>
            </div>
        </div>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"
        ></script>
        <!-- SWIPER JS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script
            src="https://kit.fontawesome.com/02f5ebcb51.js"
            crossorigin="anonymous"
        ></script>
        <!-- AOS -->
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <!-- JAVASCRIPT Ku-->
        <script src="js/script.js" defer></script>
        <script
            src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
            crossorigin="anonymous"
        ></script>
        <!--Sweet Alert-->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

        <script>
            $(document).ready(function() {
                $('.star-rating label').on('click', function() {
                    $(this).prevAll('input[type="radio"]').prop('checked', true);
                });
            });

            document.addEventListener('DOMContentLoaded', function () {
                var stars = document.querySelectorAll('.star-rating input');

                stars.forEach(function (star) {
                    star.addEventListener('click', function () {
                        var clickedStarValue = parseInt(this.value);

                        // Tambahkan kelas "checked" untuk bintang dengan nilai kurang dari atau sama dengan yang diklik
                        stars.forEach(function (star) {
                            var starValue = parseInt(star.value);
                            if (starValue <= clickedStarValue) {
                                star.classList.add('checked');
                            } else {
                                star.classList.remove('checked');
                            }
                        });

                        // Lakukan sesuatu dengan nilai bintang yang diklik
                        console.log('Bintang yang diklik: ' + clickedStarValue);

                        // Misalnya, kirim nilai ke server atau ubah elemen lain
                    });
                });
            });

        </script>
        <script>
            // Tampilkan SweetAlert berdasarkan hasil operasi
            if (typeof successMessage !== 'undefined') {
                Swal.fire({
                    title: "Sukses",
                    text: "Ulasan Berhasil Disimpan",
                    icon: "success"
                }).then(function() {
                    window.location.href = 'projectselesai.php';
                });
            } else if (typeof errorMessage !== 'undefined') {
                Swal.fire({
                    icon: "error",
                    title: "Gagal",
                    text: "Mohon isi Rating dan Ulasan sebelum mengirim",
                });
            }
        </script>

</body>
</html>

