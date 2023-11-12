<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Homepage | Nganggur</title>
        <!-- FAVICON -->
        <link rel="icon" type="image/x-icon" href="assets/logo/Logo.png" />
        <!-- ICON -->
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css" />
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
        <!-- Swiper -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
        <!-- AOS -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
        <!-- CSS Ku -->
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>
        <!-- NAVBAR -->
        <nav class="navbar navbar-expand-lg fixed-top navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="#"><img class="logoImg" src="assets/logo/Logo.png" alt="" /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Kategori</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Portofolio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Testimoni</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Cara Kerja</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Login <i class="uil uil-signin"></i></a>
                        </li>
                        <li class="nav-item mx-3 mt-2">
                            <div class="pemisahLogin"></div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Register <i class="uil uil-user"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- NAVBAR END -->

        <!-- CAROUSEL -->
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="3000">
                    <img src="assets/banner1.jpg" class="d-block w-100 filter-dark" alt="..." />
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Kemudahan Dalam Mencari Pekerjaan</h5>
                        <p>Dapatkan proyek impianmu dengan lebih mudah bersama Nganggur corps</p>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <img src="assets/banner2.jpg" class="d-block w-100 filter-dark" alt="..." />
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Bekerja Dimanapun dan Kapanpun</h5>
                        <p>Tidak perlu pergi ke kantor untuk menyelesaikan pekerjaan</p>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <img src="assets/banner3.jpg" class="d-block w-100 filter-dark" alt="..." />
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Kemudahan Komunikasi Client dan Freelancer</h5>
                        <p>Sampaikan project impianmu dan buat itu menjadi nyata dengan Nganggur Corps</p>
                    </div>
                </div>
            </div>
            <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button> -->
        </div>
        <!-- CAROUSEL END -->

        <!-- TRUSTED -->
        <div class="trusted-box">
            <div class="container pt-3">
                <div class="row justify-content-center align-items-center">
                    <div class="col"><h6>Trusted by :</h6></div>
                    <div class="col"><img src="assets/logo/logo-google.png" alt="" /></div>
                    <div class="col"><img src="assets/logo/logo-paytrend.png" alt="" /></div>
                    <div class="col"><img src="assets/logo/logo-meta.png" alt="" /></div>
                    <div class="col"><img src="assets/logo/logo-yt.png" alt="" /></div>
                </div>
            </div>
        </div>
        <!-- TRUSTED END-->

        <!-- AKSEN IMG -->
        <img src="assets/aksen.png" alt="" class="aksenImg" />

        <!-- POPULAR SERVICES -->
        <div class="container mt-5 popular-service" data-aos="fade-up" data-aos-duration="1500">
            <div class="row">
                <h1>Popular Services :</h1>
            </div>
            <div class="row mt-5">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <a href="#"><img src="assets/kategori/webDesign.png" alt="" /></a>
                        </div>
                        <div class="swiper-slide">
                            <a href="#"><img src="assets/kategori/logoDesign.png" alt="" /></a>
                        </div>
                        <div class="swiper-slide">
                            <a href="#"><img src="assets/kategori/vo.png" alt="" /></a>
                        </div>
                        <div class="swiper-slide">
                            <a href="#"><img src="assets/kategori/wordpress.png" alt="" /></a>
                        </div>
                        <div class="swiper-slide">
                            <a href="#"><img src="assets/kategori/AIartist.png" alt="" /></a>
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
        <!-- POPULAR SERVICES END -->

        <!-- Project Categories -->
        <div class="container mt-5" data-aos="fade-up" data-aos-duration="1500">
            <div class="row project-kategori">
                <div class="col">
                    <div class="row">
                        <h1>Kategori :</h1>
                    </div>
                    <div class="row mt-5 justify-content-center align-items-center">
                        <a class="col-md-3 col-sm-6 icon-wrapper" href="">
                            <div class="row justify-content-center align-items-center"><img src="assets/icon/graphic-design.png" alt="" class="icon-kategori" /></div>
                            <div class="row justify-content-center">
                                <div class="underline-kategori"></div>
                            </div>
                            <div class="row justify-content-center align-items-center mt-3">Graphics Design</div>
                        </a>

                        <a href="" class="col-md-3 col-sm-6 icon-wrapper">
                            <div class="row justify-content-center align-items-center"><img src="assets/icon/digital-marketing.png" alt="" class="icon-kategori" /></div>
                            <div class="row justify-content-center">
                                <div class="underline-kategori"></div>
                            </div>
                            <div class="row justify-content-center align-items-center mt-3">Digital Marketing</div>
                        </a>
                        <a href="" class="col-md-3 col-sm-6 icon-wrapper">
                            <div class="row justify-content-center align-items-center"><img src="assets/icon/writing-translation.png" alt="" class="icon-kategori" /></div>
                            <div class="row justify-content-center">
                                <div class="underline-kategori"></div>
                            </div>
                            <div class="row justify-content-center align-items-center mt-3">Writing & Translation</div>
                        </a>
                        <a href="" class="col-md-3 col-sm-6 icon-wrapper">
                            <div class="row justify-content-center align-items-center"><img src="assets/icon/video-animation.png" alt="" class="icon-kategori" /></div>
                            <div class="row justify-content-center">
                                <div class="underline-kategori"></div>
                            </div>
                            <div class="row justify-content-center align-items-center mt-3">Video & Animation</div>
                        </a>
                    </div>
                    <div class="row mt-5 justify-content-center align-items-center">
                        <a href="" class="col-md-3 col-sm-6 icon-wrapper">
                            <div class="row justify-content-center align-items-center"><img src="assets/icon/music-audio.png" alt="" class="icon-kategori" /></div>
                            <div class="row justify-content-center">
                                <div class="underline-kategori"></div>
                            </div>
                            <div class="row justify-content-center align-items-center mt-3">Musik & Audio</div>
                        </a>
                        <a href="" class="col-md-3 col-sm-6 icon-wrapper">
                            <div class="row justify-content-center align-items-center"><img src="assets/icon/programming.png" alt="" class="icon-kategori" /></div>
                            <div class="row justify-content-center">
                                <div class="underline-kategori"></div>
                            </div>
                            <div class="row justify-content-center align-items-center mt-3">Programming</div>
                        </a>
                        <a href="" class="col-md-3 col-sm-6 icon-wrapper">
                            <div class="row justify-content-center align-items-center"><img src="assets/icon/bussiness.png" alt="" class="icon-kategori" /></div>
                            <div class="row justify-content-center">
                                <div class="underline-kategori"></div>
                            </div>
                            <div class="row justify-content-center align-items-center mt-3">Bussiness</div>
                        </a>
                        <a href="" class="col-md-3 col-sm-6 icon-wrapper">
                            <div class="row justify-content-center align-items-center"><img src="assets/icon/photography.png" alt="" class="icon-kategori" /></div>
                            <div class="row justify-content-center">
                                <div class="underline-kategori"></div>
                            </div>
                            <div class="row justify-content-center align-items-center mt-3">Photography</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Project Categories END-->

        <!-- FOR CLIENT -->
        <div class="container mt-5 mb-5" data-aos="fade-up" data-aos-duration="1500">
            <div class="for-client">
                <div class="row">
                    <h3>For client</h3>
                </div>

                <div class="row mt-5">
                    <div class="col-4"><h1>Find Talent for Your Project</h1></div>
                </div>
                <div class="row desc-for-client"><div class="col-7">Work with the largest network of independent professionals and get things done—from quick turnarounds to big transformations.</div></div>
                <div class="row">
                    <button style="width: fit-content" class="button-for-client">
                        <h6>Post a job and hire a pro</h6>
                        <p>View freelancers <i class="uil uil-arrow-circle-right"></i></p>
                    </button>
                </div>
            </div>
        </div>
        <!-- FOR CLIENT END -->

        <!-- FOR Talent -->
        <div class="container mt-5 mb-5" data-aos="fade-up" data-aos-duration="1500">
            <div class="for-talent">
                <div class="row">
                    <div class="col-6">
                        <img src="assets/foto2.png" alt="" />
                    </div>
                    <div class="col-4 offset-1">
                        <div class="row"><h3>For Freelancer</h3></div>
                        <div class="row">
                            <div class="col-8 mt-4"><h1>Find great work</h1></div>
                        </div>
                        <div class="row mt-5"><p>Meet clients you’re excited to work with and take your career or business to new heights.</p></div>
                        <br />
                        <div class="row"><div class="line"></div></div>
                        <div class="row mt-4">
                            <div class="col-4">Find opportunities for every stage of your freelance career</div>
                            <div class="col-4">Control when, where, and how you work</div>
                            <div class="col-4">Explore different ways to earn</div>
                        </div>
                        <div class="row mt-5">
                            <button class="button-for-talent">Find opportunities</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- FOR CLIENT END -->

        <!-- PORTO -->
        <div class="container-fluid mt-5 mb-5 portofolio" data-aos="fade-up" data-aos-duration="1500">
            <div class="container">
                <div class="row">
                    <div class="col mt-5"><h1>Make your project come true with freelancers.</h1></div>
                </div>
                <div class="row">
                    <div class="col mt-3 mb-5"><h3 class="sub-tittle-porto">Get some inspirations :</h3></div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="row">
                        <div class="col m-0 p-0 align-items-center justify-content-center overflow-hidden">
                            <div class="imgContainer">
                                <img src="assets/porto/porto1.png" alt="Avatar" class="image" />
                                <div class="imgOverlay">
                                    <div class="textOverlay">Hello World</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col m-0 p-0 align-items-center justify-content-center overflow-hidden">
                            <div class="imgContainer">
                                <img src="assets/porto/porto2.png" alt="Avatar" class="image" />
                                <div class="imgOverlay">
                                    <div class="textOverlay">Hello World</div>
                                </div>
                            </div>
                        </div>
                        <div class="col m-0 p-0 align-items-center justify-content-center overflow-hidden">
                            <div class="imgContainer">
                                <img src="assets/porto/porto3.png" alt="Avatar" class="image" />
                                <div class="imgOverlay">
                                    <div class="textOverlay">Hello World</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col m-0 p-0 align-items-center justify-content-center overflow-hidden">
                            <div class="imgContainer">
                                <img src="assets/porto/porto4.png" alt="Avatar" class="image" />
                                <div class="imgOverlay">
                                    <div class="textOverlay">Hello World</div>
                                </div>
                            </div>
                        </div>
                        <div class="col m-0 p-0 align-items-center justify-content-center overflow-hidden">
                            <div class="imgContainer">
                                <img src="assets/porto/porto5.png" alt="Avatar" class="image" />
                                <div class="imgOverlay">
                                    <div class="textOverlay">Hello World</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row">
                        <div class="col m-0 p-0 align-items-center justify-content-center overflow-hidden">
                            <div class="imgContainer">
                                <img src="assets/porto/porto6.png" alt="Avatar" class="image" />
                                <div class="imgOverlay">
                                    <div class="textOverlay">Hello World</div>
                                </div>
                            </div>
                        </div>
                        <div class="col m-0 p-0 align-items-center justify-content-center overflow-hidden">
                            <div class="imgContainer">
                                <img src="assets/porto/porto7.png" alt="Avatar" class="image" />
                                <div class="imgOverlay">
                                    <div class="textOverlay">Hello World</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col m-0 p-0 align-items-center justify-content-center overflow-hidden">
                            <div class="imgContainer">
                                <img src="assets/porto/porto8.png" alt="Avatar" class="image" />
                                <div class="imgOverlay">
                                    <div class="textOverlay">Hello World</div>
                                </div>
                            </div>
                        </div>
                        <div class="col m-0 p-0 align-items-center justify-content-center overflow-hidden">
                            <div class="imgContainer">
                                <img src="assets/porto/porto9.png" alt="Avatar" class="image" />
                                <div class="imgOverlay">
                                    <div class="textOverlay">Hello World</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col m-0 p-0 align-items-center justify-content-center overflow-hidden">
                            <div class="imgContainer">
                                <img src="assets/porto/porto10.png" alt="Avatar" class="image" />
                                <div class="imgOverlay">
                                    <div class="textOverlay">Hello World</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col text-center mt-5 mb-5">
                        <a href="#">View More Project <i class="uil uil-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- PORTO END-->

        <!-- CLIENT REVIEW -->
        <div class="container mb-5 client-review" data-aos="fade-up" data-aos-duration="1500">
            <div class="row text-center mt-5">
                <div class="col">
                    <h1>Client Reviews</h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="row mt-5">
                        <div class="swiper mySwiper2">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="review d-flex flex-column justify-content-center align-items-center p-5">
                                        <img class="mb-3" src="assets/ava1.png" alt="" />
                                        <h4>Kang Cecep</h4>
                                        <p>Joki design</p>
                                        <br />
                                        <p>“Ada begitu banyak cara agar kamu bisa maju akan tetapi hanya ada satu cara untuk tetap diam.”</p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="review d-flex flex-column justify-content-center align-items-center p-5">
                                        <img class="mb-3" src="assets/ava2.png" alt="" />
                                        <h4>Kaesang</h4>
                                        <p>Anak Presiden</p>
                                        <br />
                                        <p>“Ada begitu banyak cara agar kamu bisa maju akan tetapi hanya ada satu cara untuk tetap diam.”</p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="review d-flex flex-column justify-content-center align-items-center p-5">
                                        <img class="mb-3" src="assets/foto1.png" alt="" />
                                        <h4>Hasib The Championship</h4>
                                        <p>Pemenang liga Badminton</p>
                                        <br />
                                        <p>“Ada begitu banyak cara agar kamu bisa maju akan tetapi hanya ada satu cara untuk tetap diam.”</p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="review d-flex flex-column justify-content-center align-items-center p-5">
                                        <img class="mb-3" src="assets/porto/porto5.png" alt="" />
                                        <h4>Kang Cecep</h4>
                                        <p>Joki design</p>
                                        <br />
                                        <p>“Ada begitu banyak cara agar kamu bisa maju akan tetapi hanya ada satu cara untuk tetap diam.”</p>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="review d-flex flex-column justify-content-center align-items-center p-5">
                                        <img class="mb-3" src="assets/banner2.jpg" alt="" />
                                        <h4>Kang Cecep</h4>
                                        <p>Joki design</p>
                                        <br />
                                        <p>“Ada begitu banyak cara agar kamu bisa maju akan tetapi hanya ada satu cara untuk tetap diam.”</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- CLIENT REVIEW END -->

        <!-- HOW WE WORK -->
        <div class="container mt-5 mb-5 how-we-work" data-aos="fade-up" data-aos-duration="1500">
            <div class="row text-center">
                <div class="col"><h1>How do we work?</h1></div>
            </div>
        </div>
        <div class="container-fluid" data-aos="fade-up" data-aos-duration="1500">
            <div class="d-flex justify-content-center mt-5">
                <img src="assets/howwework.png" alt="" class="how-we-work-img" />
            </div>
        </div>
        <div class="container mt-5 mb-5 how-we-work mx-auto" data-aos="fade-up" data-aos-duration="1500">
            <div class="row text-center">
                <div class="col-3 ps-5"><h5>Search and select packages / freelancers</h5></div>
                <div class="col"></div>
                <div class="col-3 ps-4"><h5>Discuss and pay</h5></div>
                <div class="col"></div>
                <div class="col-3"><h5>Receive results and leave a review</h5></div>
            </div>
            <div class="row text-center mt-3">
                <div class="col-3 ps-5"><p>search and select packages or freelancers based on portfolio, capabilities and reviews</p></div>
                <div class="col"></div>
                <div class="col-3 ps-4"><p>Discuss the details of the work then negotiate the price and package with the freelancer. make payment.</p></div>
                <div class="col"></div>
                <div class="col-3"><p>Approve and accept work results from freelancers and provide reviews to freelancers</p></div>
            </div>
        </div>
        <!-- HOW WE WORK END -->

        <br /><br /><br />

        <!-- FOOTER -->
        <div class="container-fluid footer" data-aos="fade-up" data-aos-duration="1500">
            <div class="container py-5">
                <div class="row">
                    <div class="col-2">
                        <h4>Kategori</h4>
                        <a href="#">Graphic & Design</a>
                        <a href="#">Digital Marketing</a>
                        <a href="#">Writing & Translation</a>
                        <a href="#">Video & Animation</a>
                        <a href="#">Music & Audio</a>
                        <a href="#">Programming</a>
                        <a href="#">Business</a>
                        <a href="#">LifeStyle</a>
                        <a href="#">Video & Animation</a>
                    </div>
                    <div class="col-4">
                        <h4>Cara Penggunaan</h4>
                        <a href="#">Cara memulai Job sebagai Klien</a>
                        <a href="#">cara mendaftar sebagai Freelancer</a>
                        <a href="#">Pembayaran</a>
                        <a href="#">Peraturan Klien</a>
                        <a href="#">Peraturan Freelancer</a>
                        <a href="#">Syarat dan Ketentuan</a>
                        <a href="#">Kebijakan Privasi</a>
                    </div>
                    <div class="col-2">
                        <h4>Tentang</h4>
                        <a href="#">Tentang Kami</a>
                        <a href="#">Nganggur Tech</a>
                        <a href="#">Nganggur Solution</a>
                        <a href="#">Blog</a>
                        <a href="#">Hak Cipta</a>
                        <a href="#">Partner</a>
                        <a href="#">FAQ/Bantuan</a>
                    </div>
                    <div class="col-2 offset-2">
                        <h4>Hubungi kami</h4>
                        <a href="#"><i class="uil uil-envelope"></i>nganggurcariloker@gmail.com</a>
                        <a href="#"><i class="uil uil-phone"></i>0895-3047-1637</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- FOOTER END -->

        <!-- SWIPER JS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <!-- JAVASCRIPT Bootstrap-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <!-- AOS -->
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <!-- JAVASCRIPT Ku-->
        <script src="js/script.js"></script>
    </body>
</html>

<!-- 

    <div class="row">
                        <div class="col-6 m-0 p-0 align-items-center justify-content-center overflow-hidden">
                            <div class="imgContainer">
                                <img src="assets/porto/porto1.png" alt="Avatar" class="image" />
                                <div class="imgOverlay">
                                    <div class="textOverlay">Hello World</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col m-0 p-0 align-items-center justify-content-center overflow-hidden">
                                    <div class="imgContainer">
                                        <img src="assets/porto/porto2.png" alt="Avatar" class="image" />
                                        <div class="imgOverlay">
                                            <div class="textOverlay">Hello World</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col m-0 p-0 align-items-center justify-content-center overflow-hidden">
                                    <div class="imgContainer">
                                        <img src="assets/porto/porto3.png" alt="Avatar" class="image" />
                                        <div class="imgOverlay">
                                            <div class="textOverlay">Hello World</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col m-0 p-0 align-items-center justify-content-center overflow-hidden">
                                    <div class="imgContainer">
                                        <img src="assets/porto/porto4.png" alt="Avatar" class="image" />
                                        <div class="imgOverlay">
                                            <div class="textOverlay">Hello World</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col m-0 p-0 align-items-center justify-content-center overflow-hidden">
                                    <div class="imgContainer">
                                        <img src="assets/porto/porto5.png" alt="Avatar" class="image" />
                                        <div class="imgOverlay">
                                            <div class="textOverlay">Hello World</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-6">
                            <div class="row">
                                <div class="col m-0 p-0 align-items-center justify-content-center overflow-hidden">
                                    <div class="imgContainer">
                                        <img src="assets/porto/porto6.png" alt="Avatar" class="image" />
                                        <div class="imgOverlay">
                                            <div class="textOverlay">Hello World</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col m-0 p-0">
                                    <div class="imgContainer">
                                        <img src="assets/porto/porto7.png" alt="Avatar" class="image" />
                                        <div class="imgOverlay">
                                            <div class="textOverlay">Hello World</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col m-0 p-0 align-items-center justify-content-center overflow-hidden">
                                    <div class="imgContainer">
                                        <img src="assets/porto/porto8.png" alt="Avatar" class="image" />
                                        <div class="imgOverlay">
                                            <div class="textOverlay">Hello World</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col m-0 p-0 align-items-center justify-content-center overflow-hidden">
                                    <div class="imgContainer">
                                        <img src="assets/porto/porto9.png" alt="Avatar" class="image" />
                                        <div class="imgOverlay">
                                            <div class="textOverlay">Hello World</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 m-0 p-0 align-items-center justify-content-center overflow-hidden">
                            <div class="imgContainer">
                                <img src="assets/porto/porto10.png" alt="Avatar" class="image" />
                                <div class="imgOverlay">
                                    <div class="textOverlay">Hello World</div>
                                </div>
                            </div>
                        </div>
                    </div>


 -->
