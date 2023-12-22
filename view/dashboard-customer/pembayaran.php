<?php
require_once("../../models/freelanceModel.php");
require_once("../../controller/umkmController.php");
session_start();
$id_menawar = $_GET["id_menawar"];
$id_pekerjaan = $_GET["id_pekerjaan"];
if (isset($_POST["pay"]))pembayaran();

// Ambil data pekerjaan_request yang belum dibayar
// $query = "SELECT id_pekerjaan, nama_pekerjaan, id_umkm, harga 
// FROM pekerjaan_request WHERE status = 'mulai' 
// AND id_pekerjaan NOT IN (SELECT id_pekerjaan FROM pembayaran)";
// $result = mysqli_query($conn, $query);

// // Tambahkan variabel untuk menyimpan data pekerjaan terpilih
// $selected_pekerjaan = null;


// Handle form submission
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Ambil data dari formulir
//     $id_pekerjaan_selected = $_POST['id_pekerjaan'];

//     // Ambil data pekerjaan terpilih
//     $query_selected_pekerjaan = "SELECT id_pekerjaan, nama_pekerjaan, id_umkm, harga FROM pekerjaan_request WHERE id_pekerjaan = $id_pekerjaan_selected";
//     $result_selected_pekerjaan = mysqli_query($conn, $query_selected_pekerjaan);

//     // Simpan data pekerjaan terpilih
//     $selected_pekerjaan = mysqli_fetch_assoc($result_selected_pekerjaan);

//     // Simpan data pembayaran ke tabel pembayaran
//     $id_umkm = $selected_pekerjaan['id_umkm'];
//     $id_pekerjaan = $selected_pekerjaan['id_pekerjaan'];
//     $harga = $selected_pekerjaan['harga'];
//     $status = 'menunggu';  // Ubah status sesuai kebutuhan, contoh: menunggu
//     $tanggal = date("Y-m-d");  // Tanggal sekarang
//     $countdown = '00:00:00';  // Sesuaikan countdown sesuai kebutuhan

//     $query_insert_pembayaran = "INSERT INTO pembayaran (id_pekerjaan, id_umkm, status, tanggal, countdown) VALUES ('$id_pekerjaan', '$id_umkm', '$status', '$tanggal', '$countdown')";
//     mysqli_query($conn, $query_insert_pembayaran);
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/tailwindcss-colors.css">
    <link rel="stylesheet" href="../../css/style-pembayaran.css">
    <script src="index.js"></script>
    <title>Payment Page</title>
</head>
<body>
    
    <!-- start: Payment -->
    <section class="payment-section">
        <div class="container" >
            <div class="payment-wrapper">
                <div class="payment-left">
                    <div class="payment-header">
                        <div class="payment-header-title">
                            <?php
                            $result_nama_pekerjaan = mysqli_query($conn,"SELECT nama_pekerjaan FROM pekerjaan_request where status = 'mulai' order by nama_pekerjaan desc");
                            // cek query
                            if($result_nama_pekerjaan){
                                while($database = mysqli_fetch_assoc($result_nama_pekerjaan)){
                                echo $database['nama_pekerjaan'];
                                }
                            } else{
                                echo "Query failed: " . mysqli_error($conn); 
                            }
                            
                            ?>
                            
                        </div>
                    </div>
                    <div class="payment-content">
                        <div class="payment-body">
                            <div class="payment-plan">
                                <div class="payment-plan-type"></div>
                                <div class="payment-plan-info">
                                <?php
                                    $result_umkm = mysqli_query(
                                        $conn,
                                        "SELECT umkm.nama_perusahaan
                                        FROM umkm
                                        JOIN pekerjaan_request ON umkm.id_user = pekerjaan_request.id_umkm
                                        WHERE pekerjaan_request.status = 'mulai'"
                                    );
                                     // cek query
                                     if ($result_umkm) {
                                        while ($database = mysqli_fetch_assoc($result_umkm)) {
                                            echo $database['nama_perusahaan'];
                                        }
                                    } else {
                                        die("Error running query: " . mysqli_error($conn));
                                    }
                                ?> 
                                </div>
                            </div>
                            <div class="payment-summary">
                                <div class="payment-summary-divider"></div>
                                <div class="payment-summary-item payment-summary-total">
                                    <?php
                                                $result_harga = mysqli_query($conn,"SELECT pr.harga , pr.nama_pekerjaan FROM `menawarkan_jasa` mj JOIN `pekerjaan_request` pr ON mj.id_pekerjaan = pr.id_pekerjaan WHERE mj.id_menawar = $id_menawar");
                                                if($result_harga){
                                                    $database = mysqli_fetch_assoc($result_harga);
                                                    $harga = "Rp ".number_format($database['harga'],0,",",".");
                                                    $judul = $database['nama_pekerjaan'];
                                                } else {
                                                    echo "belum ada pekerjaan dengan status 'mulai'";
                                                }
                                                ?>
                                    <div class="payment-summary-name">Judul</div>
                                    <div class="payment-summary-price"><?=$judul?></div>
                                </div>
                                <div class="payment-summary-item payment-summary-total">
                                    <div class="payment-summary-name">Total</div>
                                    <div class="payment-summary-price"><?=$harga?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="payment-right">
                    <form action="" class="payment-form" method="post" enctype="multipart/form-data">
                        <h1 class="payment-title">Payment Details</h1>
                        <div class="payment-method" id="metode_pembayaran">
                            <input type="radio" name="payment-method" id="method-1" value="bri" checked>
                            <label for="method-1" class="payment-method-item">
                                <img src="../../assets/bri.png" alt="">
                            </label>
                            <input type="radio" name="payment-method" id="method-2" value="indomaret">
                            <label for="method-2" class="payment-method-item">
                                <img src="../../assets/indomaret.png" alt="">
                            </label>
                            <input type="radio" name="payment-method" id="method-3" value="shopee">
                            <label for="method-3" class="payment-method-item">
                                <img src="../../assets/shopee.png" alt="">
                            </label>
                            <input type="radio" name="payment-method" id="method-4" value="dana">
                            <label for="method-4" class="payment-method-item">
                                <img src="../../assets/dana.png" alt="">
                            </label>
                        </div>

                        <div class="payment-form-group">
                            <input type="file" id="harga_input" name="harga_input" placeholder=" " class="payment-form-control" required>
                            <label for="harga_input" class="payment-form-label payment-form-label-required">Bukti Pembayaran</label>
                        </div>
                        <div class="payment-form-group-flex">
                            <div class="payment-form-group">
                                <input 
                                type="date" 
                                placeholder=" " 
                                class="payment-form-control"
                                name="tanggal" 
                                id="expiry-date"
                                value="<?=date("Y-m-d")?>"
                                readonly
                                >
                                <label for="expiry-date" class="payment-form-label payment-form-label-required">Expiry Date</label>
                            </div>
                        </div>
                        <button 
                        type="submit" 
                        class="payment-form-submit-button"
                        name="pay"
                        >
                        <i class="ri-wallet-line"></i> 
                        Pay
                        </button>
                        <a 
                        href="periksa_tawaran.php"
                        class="payment-form-submit-button"
                        style="margin: 20px 0 0 0;text-decoration: none;"
                        >Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- end: Payment -->

</body>
</html>