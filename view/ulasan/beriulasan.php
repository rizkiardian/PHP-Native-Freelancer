<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Bootstrap demo</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <!-- FAVICON -->
        <link rel="icon" type="image/x-icon" href="img/Logo.png" />
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
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>
        <img
            src="img/bg.png"
            style="z-index: -1; position: absolute; right: 0; top: -25px"
        />
        <!-- NAVBAR -->
        <nav class="navbar navbar-expand-lg bg-primary fixed-top">
            <div class="container">
                <a href="#"
                    ><img
                        src="img/Logo.png"
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
                                    src="img/message.png"
                                    class="navbar-brand"
                                    style="height: 45px"
                                />
                            </li>
                            <li class="nav-item">
                                <img
                                    src="img/profile.png"
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
                                        src="img/sign.png"
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
                            <a href="projectselesai.html"
                                ><p>
                                    <i class="uil uil-angle-left"></i> Kembali
                                </p></a
                            >
                        </div>
                    </div>
                </div>

                <!-- PROJECT WRAP -->
                <div
                    class="row mb-3"
                    data-aos="fade-up"
                    data-aos-duration="1500"
                >
                    <div class="col">
                        <div
                            class="project-wrapper d-flex flex-column shadow-sm"
                        >
                            <div
                                class="tgl-invoice d-flex flex-row justify-content-between pt-3 px-3"
                            >
                                <p class="invoice">Freelancer : Junaedi</p>
                                <p class="tgl-pesanan">
                                    Pesanan diterima: 22 Okt 2023
                                </p>
                            </div>
                            <div
                                class="content-main d-flex flex-row mt-3 px-4 column-gap-4"
                            >
                                <div class="ulas-gambar-project">
                                    <img src="img/project1_.png" alt="" />
                                </div>
                                <div
                                    class="form-ulas d-flex flex-column justify-content-evenly"
                                >
                                    <div class="judul-project">
                                        <div class="row">
                                            <div class="col-10">
                                                <h6 style="font-size: 24px">
                                                    Design 3D Animation Logo for
                                                    Youtube | 3D Blender
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
                                        <textarea
                                            name=""
                                            id=""
                                            cols="70"
                                            rows="5"
                                            class="shadow-sm"
                                            placeholder="Tulis ulasan disini..."
                                        ></textarea>
                                        <div
                                            class="button-kirim d-flex justify-content-end column-gap-3"
                                        >
                                            <button class="cancel-button">
                                                Cancel
                                            </button>
                                            <button
                                                type="button"
                                                class="kirim-button"
                                                data-bs-toggle="modal"
                                                data-bs-target="#exampleModal"
                                            >
                                                Kirim
                                            </button>
                                        </div>
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
    </body>
</html>

<!-- Modal -->
<div
    class="modal fade"
    id="exampleModal"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body d-flex flex-column align-items-center">
                <div
                    class="checklist d-flex justify-content-center align-items-center my-3"
                >
                    <i class="uil uil-check"></i>
                </div>
                <h3>Berhasil Menambahkan Ulasan</h3>
                <h6>Beri rating untuk project ini</h6>
                <div
                    class="d-flex flex-row star-rate justify-content-center mt-3"
                >
                    <i class="fa fa-star fa-2x"></i>
                    <i class="fa fa-star fa-2x"></i>
                    <i class="fa fa-star fa-2x"></i>
                    <i class="fa fa-star fa-2x"></i>
                    <i class="fa fa-star fa-2x"></i>
                </div>
            </div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal"
                >
                    Close
                </button>
                <button type="button" class="btn btn-primary">Rate</button>
            </div>
        </div>
    </div>
</div>
