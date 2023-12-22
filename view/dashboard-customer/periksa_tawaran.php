<?php
session_start();
require_once("../../controller/umkmController.php");

if (isset($_SESSION["email"])) {
    $email = $_SESSION["email"];
}else
{
    echo "<script>
            alert('Silahkan login terlebih dahulu !');
            window.location.href = '../homepage';
        </script>";
}

if (isset($_GET["id_terima"])) terima_tawaran('terima','id_terima');
if (isset($_GET["id_tolak"])) terima_tawaran('tolak','id_tolak');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="../../css/style-dashboard-customer.css">
</head>
<?php
require_once("../../models/freelanceModel.php");
?>
<body>
    <!-- =============== Navigation ================ -->
    <div class="container">

    <?php include("component/side_bar.php"); ?>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="user">
                    <img src="assets/imgs/customer01.jpg" alt="">
                </div>
            </div>

            <!-- ======================= Cards ================== -->

            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Orders</h2>
                        <a href="#" class="btn">View All</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Nama Pekerjaan</td>
                                <td>Nama Pekerja</td>
                                <td>tanggal</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            
                        <?php
                            $row = mysqli_query($conn, "SELECT pr.* , mj.id_pekerja_jasa , mj.status ,mj.tanggal , mj.id_menawar , pj.nama_pertama , pj.nama_terakhir  FROM `pekerjaan_request` pr JOIN `umkm` u ON pr.id_umkm = u.id_user JOIN `menawarkan_jasa` mj ON pr.id_pekerjaan = mj.id_pekerjaan JOIN `pekerja_jasa` pj ON mj.id_pekerja_jasa = pj.id_user WHERE pr.id_pekerjaan=".$_GET["id_pekerjaan"]."");
                            $no = 0;
                            while ($data = mysqli_fetch_array($row)) {
                                $no++;
                        ?>
                            <tr>
                                <td><?= $no; ?> </td>
                                <td><?= $data['nama_pekerjaan']; ?></td>
                                <td><?php echo $data['nama_pertama']." ".$data['nama_terakhir'] ; ?></td>
                                <td><span><?= date('d M Y', strtotime($data['tanggal']))?></span></td>
                                <td><span><?= $data['status']; ?></span></td>
                                <td>
                                    <?php if ($data["status"] != "terima") {?>
                                    <a href="pembayaran.php?id_menawar=<?= $data['id_menawar'] ?>&id_pekerjaan=<?= $data['id_pekerjaan'] ?>&id_pekerja_jasa=<?= $data['id_pekerja_jasa']?>" class="btn-terima">Terima</a>
                                        <a href="?id_tolak=<?= $data['id_menawar'] ?>" class="btn-tolak">Tolak</a>
                                    <?php } ?>
                                    </td>
                            </tr>
                            <?php
                                }
                            ?>

                        </tbody>
                    </table>
                </div>

                <!-- ================= New Customers ================ -->
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Recent Workers</h2>
                        <a href="#" class="btn">View All</a>
                    </div>

                    <table>
                    <thead>
                            <tr>
                                <td>No</td>
                                <td>Nama Pekerja</td>
                            </tr>
                        </thead>
                    <?php
                            $row = mysqli_query($conn, "SELECT pekerjaan_request.id_umkm,menawarkan_jasa.id_pekerja_jasa,pekerjaan_request.nama_pekerjaan,pekerjaan_request.harga,pekerja_jasa.nama_pertama,pekerja_jasa.nama_terakhir,pekerjaan_request.status,pekerjaan_request.status as statusclass FROM menawarkan_jasa INNER JOIN pekerjaan_request ON pekerjaan_request.id_pekerjaan = menawarkan_jasa.id_pekerjaan INNER JOIN pekerja_jasa ON menawarkan_jasa.id_pekerja_jasa = pekerja_jasa.id_user WHERE menawarkan_jasa.status = 'terima' AND pekerjaan_request.id_umkm = 3 GROUP BY pekerja_jasa.id_user");
                            $no = 0;
                            while ($data = mysqli_fetch_array($row)) {
                                $no++;
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td>
                                <h4><?php echo $data['nama_pertama']." ".$data['nama_terakhir'] ; ?></h4>
                            </td>
                        </tr>
                        <?php
                                }
                            ?>

                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="../../js/dashboard-customer-main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script></script>
</body>

</html>