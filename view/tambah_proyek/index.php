<?php
require_once("../../models/freelanceModel.php");
require_once("../../controller/umkmController.php");
session_start();
if (isset($_POST["submit"]))menambahkan_proyek();

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form_Request</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <!-- CSS Ku -->
    <link rel="stylesheet" type="text/css" href="../../css/style-tambah-proyek.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
  <!-- NAVBAR -->
  <?php include("../component/nav.php") ?>
<div class="container mt-3">
<div class="card text" style="margin: 0; border-width:3px; margin-left: 115px;">
    <div class="card p-3">
    <div class="card-header" style="border-width: 2px; border-color: #9D9D9D; height: 45px;">
      <ul class="nav nav-pills card-header-pills" style="padding-top: 0.1px;">
        <li class="nav-item">
          <a class="btn" href="#">Form Request</a>
        </li>
      </ul>
    </div>
  <div class="container mt-3">
  <div class="card">
  <div class="card-body">
  <form action="" method="post"  autocomplete="off">
    
    <!-- Nama Pekerjaan -->
    
    <div class="mb-3 mt-3">
      <label for="nama_peker" class="form-label">Nama Untuk Proyek Anda</label>
      <input 
      type="text" 
      class="form-control" 
      id="nama_peker" 
      placeholder="Nama Proyek Anda..." 
      name="nama_pekerjaan" 
      value="<?= (isset($_POST["nama_pekerjaan"]) ? $_POST["nama_pekerjaan"] : "") ?>"
      autofocus >
    </div>
    
    <!-- Deskripsi Pekerjaan -->

    <div class="mb-3">
        <label for="des_peker" class="form-label">Beritahu kami lebih jauh tentang proyek Anda</label>
        <textarea 
        class="form-control" 
        rows="5" 
        id="des_peker" 
        name="deskripsi_pekerjaan" 
        minlength="10" 
        placeholder="Deskripsi Proyek Anda ..." 
        required><?= (isset($_POST["deskripsi_pekerjaan"]) ? $_POST["deskripsi_pekerjaan"] : "") ?>
      </textarea>
    </div>

    <!-- Harga -->

    <div class="mb-3">
      <label for="harga_peker" class="form-label">Berapa Perkiraan Anggaran Anda ?</label>

      <input 
      type="number" 
      class="form-control" 
      id="harga_peker" 
      placeholder="Tuliskan Nominal angka..." 
      name="harga"
      value="<?= (isset($_POST["harga"]) ? $_POST["harga"] : "") ?>" 
      min="1000" 
      required>
    </div>

    <!-- Kategori -->

    <div class="form-group col-md-4">
      <label for="kategori" class="form-label">Kategori</label>
      <select 
      id="kategori" 
      class="form-control" 
      name="kategori" 
      required>
        <option selected disabled>>>>Pilih Katergori dari Proyek Anda<<<</option>
        <?php 
          $kategori = mysqli_query($conn,"SELECT * FROM kategori_request");
          while ($row = mysqli_fetch_assoc($kategori)) {
        ?>
          <option 
          <?php 
          if(isset($_POST["kategori"]))
          {
            if($row["id"] === $_POST["kategori"])
            { 
              echo "selected";
            }
          }
          ?> 
          value="<?= $row["id"] ?>"><?= $row["nama_kategori"] ?></option>
        <?php } ?>
      </select>
    </div>

    <!-- Batas Waktu   -->
    <div class="my-3 form-group">

      <label for="end" class="col-sm-2 col-form-label">Batas Waktu</label>
      <div class="col-sm-4">
        <input 
        type="date" 
        class="form-control" 
        name="batas_waktu" 
        id="end" 
        value="<?= (isset($_POST["batas_waktu"]) ? $_POST["batas_waktu"] : '') ?>"
        onchange="validateDate()"
        >
      </div>
      <span id="error_batas_waktu" class="text-danger"></span>
    </div>
    
    <button type="submit" name="submit" value="submit" class="btn btn-primary">Kirim Request</button>
  </form>
  </div>
</div>
  </div>
</div>
<!-- SWIPER JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- JAVASCRIPT Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- AOS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- JAVASCRIPT Ku-->
    <!-- <script src="js/script.js"></script>     -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>
      function validateDate() {
            var inputDate = document.getElementById('end').value;
            var currentDate = new Date().toISOString().split('T')[0];

            if (inputDate <= currentDate) {
                document.getElementById('error_batas_waktu').innerText = 'Batas waktu tidak boleh melebihi hari ini atau hari ini.';
                // Optional: Reset the input value to today's date
                // document.getElementById('end').value = currentDate;
            } else {
                document.getElementById('error_batas_waktu').innerText = '';  
            }
    }
</script>

</body>
</html>