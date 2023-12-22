<?php 
require_once("../../models/freelanceModel.php") ;
session_start();

if (isset($_GET["idHapus"])) {
    $id = $_GET["idHapus"];
    $result = mysqli_query($conn,"DELETE FROM `pekerjaan_request` WHERE id_pekerjaan = $id");
}

$selectedCategory = isset($_GET['kategori']) ? $_GET['kategori'] : '1';

$sql = "SELECT * FROM pekerjaan_request pr join kategori_request kr on kr.id = pr.id_kategori";
if (!empty($selectedCategory)) {
    $sql .= " WHERE kr.id =$selectedCategory AND status='belum dimulai'";
}

$kategori = mysqli_query($conn, "SELECT nama_kategori FROM `kategori_request` WHERE id = $selectedCategory");
$namaKategori = mysqli_fetch_assoc($kategori);


$result = mysqli_query($conn,$sql);


$projects = array();

if ($result) {
    if ($result->num_rows > 0) {
        // Memasukkan hasil query ke dalam array
        while ($row = $result->fetch_assoc()) {
            $projects[] = $row;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Tawaran Project | Nganggur</title>
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
        <link rel="stylesheet" href="../../css/style-detil-tawaran.css" />

        <style>
            .modal-backdrop {
                z-index: -1;
            }
        </style>
    </head>
    <body>
        <img src="../../assets/bg.png" style="z-index: -1; position: absolute; right: 0; top: -25px" />
        
        <!-- NAVBAR -->
        
        <?php include("../component/nav.php") ?>
        
        <!-- NAVBAR END -->

        <!-- CONTAINER PROJECT SELESAI -->
        <div class="container mt-5" style="transform: translateY(75px)">
            <div class="row">
                <div class="col">
                    <div class="page-tittle">
                        <h2>Tawaran Project</h2>
                    </div>
                </div>
            </div>
            <div class="content-wrapper mt-3 p-5">
                <div class="sub-tittle pb-3 d-flex" style="width: 100%; background-color: #f7f7f7; border-radius: 20px 20px 0 0; border-bottom: 3px solid #e7e7e7; height: fit-content">
                    <h5 class="align-items-center">Daftar Project</h5>
                </div>
                <div class="row mt-5 mb-5">
                    <div class="col">
                        <div class="d-flex flex-row align-items-center justify-content-between">
                            <div class="filter">
                                <form action="" method="GET">
                                    <label for="disabledSelect" class="form-label"><h6>Kategori :</h6></label>
                                    <select id="" name="kategori" class="dropdown-filter ms-3">
                                    <?php 
                                    $kategori = mysqli_query($conn,"SELECT * FROM `kategori_request`");
                                    while ($row = mysqli_fetch_assoc($kategori)) {
                                    ?>
                                        <option <?php if(isset($_GET['kategori']) && $_GET['kategori'] == $row["id"]) echo 'selected'; ?> value="<?= $row["id"] ?>"><?= $row["nama_kategori"] ?></option>
                                    <?php }?>
                                    </select>
                                    <input type="submit" class="btn btn-primary ms-2 p-2" value="Tampilkan Kategori">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- KATEGORI NAME -->
                    <?php
                    if ($projects != NULL) {
                    ?>
                <h3 class="mb-4"><?= $namaKategori['nama_kategori']?></h3>
                <!-- KATEGORI NAME END -->

                <!-- CARD TAWARAN -->
                <div class="d-flex flex-row column-gap-3 flex-wrap justify-content-start">
                <?php foreach ($projects as $project) { ?>
                    <!-- CARD ITEM -->
                    <div class="card p-3 mb-3" style="width: 14rem" data-aos="fade-up" data-aos-duration="1500">
                        <img src="../../assets/kategori/<?= $project['id'] ?>.jpg" class="card-img-top" alt="..." style="width:190px;height:172.5px;" />
                        <div class="card-body">
                            <h5 class="card-title" style="color: #042672"><?= $project['nama_pekerjaan'] ?></h5>
                            <p class="card-text" style="font-size: 14px">Tenggat : <?=date('d M Y', strtotime($project['batas_waktu']));?></p>
                            <p class="card-text">Rp. <?= number_format($project['harga'],0,",",".");?>,-</p>
                            <a href="detil_tawaran.php?id=<?= $project['id_pekerjaan'] ?>" class="btn btn-primary">Detail</a>
                            <?php
                                if ($_SESSION["level"] == "admin") {
                            ?>
                            <button  type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $project['id_pekerjaan'] ?>">Hapus</button>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- CARD ITEM END-->
                    <!-- Modal -->
                    
                <?php }}?>

                <!-- END CARD TAWARAN -->

                <br /><br /><br /><br /><br />
            </div>
        </div>
        <!-- CONTAINER PROJECT SELESAI END -->

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


<?php foreach ($projects as $project) { ?>
<!-- Modal -->
<div class="modal fade" id="exampleModal<?= $project['id_pekerjaan'] ?>" tabindex="-3" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel" style="color:#ff3030;"><i class="uil uil-trash-alt"></i> Delete</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="text-align:center;">
        Anda yakin akan menghapus Project? <br>
        <strong style="color:#ff3030; font-size:20px;"><?= $project['nama_pekerjaan'] ?></strong>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <a href="?idHapus=<?= $project['id_pekerjaan'] ?>" class="btn btn-danger" id="tombolHapus">Delete</a>
            <script>
                // Tambahkan event listener menggunakan JavaScript
                document.getElementById('tombolHapus').addEventListener('click', function() {
                    // Set variabel link_ditekan dalam URL dengan PHP
                    window.location.href = '?idHapus=<?= $project['idProject'] ?>';
                });
            </script>
      </div>
    </div>
  </div>
</div>
<?php } ?> 

<?php
if (isset($_GET['idHapus'])) {
    $idHapus = $_GET['idHapus'];
    $queryHapus = "DELETE FROM `pekerjaan_request` WHERE id_pekerjaan = $idHapus";
    $resultHapus = mysqli_query($conn,$queryHapus);
    echo"
    <script>
    window.location.href = 'tawaran-project.php';
    </script>
    ";
}