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
            <div class="cardBox">

                <div class="card">
                    <?php
                        $pesanandata = mysqli_query($conn, "SELECT count(pembayaran.id_pembayaran) FROM `pembayaran`INNER JOIN pekerjaan_request ON pembayaran.id_pekerjaan = pekerjaan_request.id_pekerjaan WHERE pembayaran.id_umkm = 3 and pembayaran.status ='berhasil';");
                        $pesanan = mysqli_fetch_array($pesanandata) 
                    ?>
                    <div>
                        <div class="numbers"><?php echo $pesanan[0]; ?></div>
                        <div class="cardName">Project Yang Ditawarkan</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="briefcase-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                    <?php
                        $penilaiandata = mysqli_query($conn, "SELECT count(chat.id_chat) FROM `chat` WHERE chat.id_umkm = 3;");
                        $penilaian = mysqli_fetch_array($penilaiandata) 
                    ?>
                        <div class="numbers"><?php echo $penilaian[0]; ?></div>
                        <div class="cardName">Inbox</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <?php
                        $penghasilandata = mysqli_query($conn, "SELECT sum(pekerjaan_request.harga) FROM `pembayaran`INNER JOIN pekerjaan_request ON pembayaran.id_pekerjaan = pekerjaan_request.id_pekerjaan WHERE pembayaran.id_umkm = 3 and pembayaran.status ='berhasil';");
                        $penghasilan = mysqli_fetch_array($penghasilandata) 
                    ?>
                    <div>
                        <div class="numbers">Rp. <?php echo $penghasilan[0]; ?></div>
                        <div class="cardName">Pengeluaran</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>

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
                                <td>Status</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $row = mysqli_query($conn, "SELECT pekerjaan_request.id_umkm,menawarkan_jasa.id_pekerja_jasa,pekerjaan_request.nama_pekerjaan,pekerjaan_request.harga,pekerja_jasa.nama_pertama,pekerja_jasa.nama_terakhir,pekerjaan_request.status,pekerjaan_request.status as statusclass FROM menawarkan_jasa INNER JOIN pekerjaan_request ON pekerjaan_request.id_pekerjaan = menawarkan_jasa.id_pekerjaan INNER JOIN pekerja_jasa ON menawarkan_jasa.id_pekerja_jasa = pekerja_jasa.id_user WHERE menawarkan_jasa.status = 'terima' AND pekerjaan_request.id_umkm = 3;");
                            $no = 0;
                            while ($data = mysqli_fetch_array($row)) {
                                $no++;
                        ?>
                            <tr>
                                <td><?php echo $no; ?> </td>
                                <td><?php echo $data['nama_pekerjaan']; ?></td>
                                <td><?php echo $data['nama_pertama']." ".$data['nama_terakhir'] ; ?></td>
                                <td><span><?php echo $data['status']; ?></span></td>
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
</body>

</html>