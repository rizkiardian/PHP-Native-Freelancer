<?php
require_once("../../models/freelanceModel.php");
require_once("../../controller/umkmController.php");

if (isset($_POST["submit"]))tambah_revisi();

// Mengambil data berdasarkan ID
$sql = "SELECT 
    pr.id_pekerjaan,
    pj.nama_pertama,
    pj.nama_terakhir,
    hp.hasil_lampiran,
    hp.tanggal,
    hp.keterangan
FROM 
`hasil_pekerjaan` hp
JOIN
`pekerjaan_request` pr
ON
hp.id_pekerjaan = pr.id_pekerjaan
JOIN
`pekerja_jasa` pj
ON
pr.id_pekerja_jasa = pj.id_user
WHERE
hp.id_hasil_pekerjaan = ".$_GET["id_hasil_pekerjaan"]."";  // Ganti "nama_tabel" dengan nama tabel Anda
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    // Tampilkan data yang diambil berdasarkan ID
    
} else {
    echo "Data tidak ditemukan";
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nganggur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body style="font-family: Poppins, sans-serif;">
  <img src="img/bg.png" style="z-index: -1; position: fixed; margin-left: 930px; height: 400px;">
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">
            <img src="../../assets/logo/Logo.png" class="navbar-brand" style="height: 50px; margin-left: 100px;"></img>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="margin-left: 30px;">
                <p class="text-light font-large">Form Revisi</p>
            </ul>
            </div>
        </div>
    </nav>
    <p style="margin-top: 30px; margin-left: 115px; font-size: 2.5rem; z-index: 1; position: relative;"> Revisi </p>
    <div class="card mb-3" style="width: 65rem; margin-top: 15px; margin-left: 115px; border-width: 2px; border-color: #9D9D9D;">
    <div class="card">
    <div class="card-header" style="border-width: 2px; border-color: #9D9D9D; height: 49px;">
        <ul class="nav nav-underline" style="padding-top: 0.1px;">
            <li class="nav-item">
                <a class="nav-link active" style="color: #042672;" href="#">Project Selesai</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #000000;" href="#">Project Berhasil</a>
            </li>
        </ul>
    </div>
        <div class="card-body">
            <p class="fw-semibold" style="margin-top: 10px; margin-left: 20px;"> < Kembali </p>
            <div class="card" style="max-width: 965px; margin-left: 20px; margin-bottom: 30px;">
                <div class="card-header fw-semibold" style="height: 30px; font-size: 10pt; background-color: #5191FF; color: white;">
                    <p> Freelancer : <?php echo $data['nama_pertama']; ?> <?php echo $data['nama_terakhir']; ?> 
                        <span style="margin-left: 520px; position: relative; float: right;">Pesanan diterima : <?php echo $data['tanggal']; ?> </span>
                    </p>
                </div>
                <div class="card-body">
                    <div class="card mb-3" style="max-width: 950px; border-color: #FFFFFF; height: 500px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                            <img src="../../assets/revisian/<?= $data["hasil_lampiran"] ?>" class="img-fluid ratio ratio-1x1" style="height: 266px; width: 288px;">
                            </div>
                            <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title" style="margin-bottom: 30px; font-family: Poppins, sans-serif;"><?php echo $data['keterangan']; ?></h5>
                                <p class="card-text" style="font-family: Poppins, sans-serif;">Penjelasan :</p>
                                <p class="card-text"><small class="text-body">
                                   <form action="" method="post">
                                    <div class="mb-3">
                                        <textarea 
                                        class="form-control" 
                                        name="keterangan" 
                                        id="exampleFormControlTextarea1" 
                                        rows="3" 
                                        placeholder="Input text here. . ." 
                                        style="width: 560px; height: 150px; font-family: Poppins, sans-serif;"></textarea>

                                    
                                    <input type="text" name="id_pekerjaan" value="<?= $data['id_pekerjaan']?>" hidden>
                                    <input type="text" name="id_hasil_pekerjaan" value="<?= $_GET['id_hasil_pekerjaan']?>" hidden>
                                        <input 
                                        class="btn btn-primary" 
                                        type="reset"
                                        value="Batal" 
                                        style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem; width: 100px; margin-left: 350px; margin-top: 20px; background-color: #F5F9FC; border-color: #7685A2; color: #415270; font-family: Poppins, sans-serif;">
                                        
                                        <input 
                                        class="btn" 
                                        type="submit" 
                                        value="Kirim"
                                        name="submit" 
                                        style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem; width: 100px; margin-top: 20px; background-color: #5191FF; border-color: #5191FF; color: white; font-family: Poppins, sans-serif;">
                                    </div>
                                </form>
                                </small></p>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
