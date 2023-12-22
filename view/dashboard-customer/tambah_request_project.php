<?php
require_once("../../models/freelanceModel.php");
session_start();

// mysqli_query($koneksi, "SELECT * FROM ");

// Proses jika formulir dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $nama_pekerjaan = $_POST["nama_pekerjaan"];
    $deskripsi_pekerjaan = $_POST["deskripsi_pekerjaan"];
    $batas_waktu = $_POST["batas_waktu"];
    $tanggal_request = date("Y-m-d H:i:s"); // Waktu saat ini
    $status = "belum dimulai"; // Default status
    $harga = $_POST["harga"];
    $id_umkm = 1; // Default status
    $id_kategori = 1; // Default status

    // Persiapkan statement SQL untuk menyimpan data
    $sql = "INSERT INTO pekerjaan_request (nama_pekerjaan, deskripsi_pekerjaan, batas_waktu, tanggal_request, status, harga, id_umkm, id_kategori)
            VALUES ('$nama_pekerjaan', '$deskripsi_pekerjaan', '$batas_waktu', '$tanggal_request', '$status', '$harga', '$id_umkm', '$id_kategori')";

    // Eksekusi statement SQL
    $data = mysqli_query($conn, $sql);
    if ($data) {
      header("Location:order.php");
    } else {
        echo "Error: ";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <title>Formulir Proyek</title>
</head>
<body>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <h2 class="text-center mb-4">Formulir Proyek</h2>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
          <label for="nama_pekerjaan">Nama Pekerjaan:</label>
          <input type="text" class="form-control" id="nama_pekerjaan" name="nama_pekerjaan" placeholder="Masukkan nama pekerjaan" required>
        </div>

        <div class="form-group">
          <label for="deskripsi_pekerjaan">Deskripsi Pekerjaan:</label>
          <textarea class="form-control" id="deskripsi_pekerjaan" name="deskripsi_pekerjaan" rows="4" placeholder="Deskripsikan pekerjaan Anda" required></textarea>
        </div>

        <div class="form-group">
          <label for="batas_waktu">Batas Waktu:</label>
          <input type="datetime-local" class="form-control" id="batas_waktu" name="batas_waktu" required>
        </div>

        <div class="form-group">
          <label for="harga">Harga:</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">IDR</span>
            </div>
            <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan harga pekerjaan" required>
          </div>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Kirim Permintaan</button>
      </form>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
