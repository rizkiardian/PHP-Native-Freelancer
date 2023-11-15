<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freelance Dashboard | Nganggur</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<?php
require("config.php");
?>
<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <img src="assets/imgs/Logo.png" alt="" srcset="">
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="briefcase-outline"></ion-icon>
                        </span>
                        <span class="title">Projek Yang Ditawarkan</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="cart-outline"></ion-icon>
                        </span>
                        <span class="title">Orders</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Customers</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">Messages</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

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
                        $pesanandata = mysqli_query($conn, "SELECT COUNT(pekerjaan_request.id_pekerjaan) FROM menawarkan_jasa INNER JOIN pekerjaan_request ON pekerjaan_request.id_pekerjaan = menawarkan_jasa.id_pekerjaan INNER JOIN umkm ON pekerjaan_request.id_umkm = umkm.id_user WHERE menawarkan_jasa.status = 'terima' AND pekerjaan_request.status = 'mulai' OR pekerjaan_request.status = 'revisi' OR pekerjaan_request.status = 'selesai' AND menawarkan_jasa.id_pekerja_jasa = 1;");
                        $pesanan = mysqli_fetch_array($pesanandata) 
                    ?>
                    <div>
                        <div class="numbers"><?php echo $pesanan[0]; ?></div>
                        <div class="cardName">Penjualan</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                    <?php
                        $penilaiandata = mysqli_query($conn, "SELECT COUNT(penilaian.id_penilaian) FROM penilaian INNER JOIN pekerjaan_request ON penilaian.id_pekerjaan = pekerjaan_request.id_pekerjaan INNER JOIN menawarkan_jasa ON pekerjaan_request.id_pekerjaan = menawarkan_jasa.id_pekerjaan WHERE pekerjaan_request.status = 'selesai'  AND menawarkan_jasa.id_pekerja_jasa = 1;");
                        $penilaian = mysqli_fetch_array($penilaiandata) 
                    ?>
                        <div class="numbers"><?php echo $penilaian[0]; ?></div>
                        <div class="cardName">Penilain</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <?php
                        $penghasilandata = mysqli_query($conn, "SELECT sum(penghasilan.pemasukan) FROM penghasilan INNER JOIN pembayaran ON penghasilan.id_pembayaran = pembayaran.id_pembayaran INNER JOIN menawarkan_jasa ON menawarkan_jasa.id_pekerjaan = pembayaran.id_pekerjaan WHERE penghasilan.status = 'lunas'  AND menawarkan_jasa.id_pekerja_jasa = 1");
                        $penghasilan = mysqli_fetch_array($penghasilandata) 
                    ?>
                    <div>
                        <div class="numbers">Rp. <?php echo $penghasilan[0]; ?></div>
                        <div class="cardName">Penghasilan</div>
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
                                <td>Pelanggan</td>
                                <td>Status</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $row = mysqli_query($conn, "SELECT menawarkan_jasa.id_pekerja_jasa,pekerjaan_request.nama_pekerjaan,pekerjaan_request.harga,umkm.nama_perusahaan,pekerjaan_request.status,pekerjaan_request.status as statusclass FROM menawarkan_jasa INNER JOIN pekerjaan_request ON pekerjaan_request.id_pekerjaan = menawarkan_jasa.id_pekerjaan INNER JOIN umkm ON pekerjaan_request.id_umkm = umkm.id_user WHERE menawarkan_jasa.status = 'terima' AND pekerjaan_request.status = 'mulai' OR pekerjaan_request.status = 'revisi' OR pekerjaan_request.status = 'selesai' AND menawarkan_jasa.id_pekerja_jasa = 1;");
                            $no = 0;
                            while ($data = mysqli_fetch_array($row)) {
                                $no++;
                        ?>
                            <tr>
                                <td><?php echo $no; ?> </td>
                                <td><?php echo $data['nama_pekerjaan']; ?></td>
                                <td><?php echo $data['nama_perusahaan']; ?></td>
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
                        <h2>Recent Customers</h2>
                        <a href="#" class="btn">View All</a>
                    </div>

                    <table>
                    <thead>
                            <tr>
                                <td>No</td>
                                <td>Pelanggan</td>
                            </tr>
                        </thead>
                    <?php
                            $row = mysqli_query($conn, "SELECT umkm.nama_perusahaan FROM menawarkan_jasa INNER JOIN pekerjaan_request ON pekerjaan_request.id_pekerjaan = menawarkan_jasa.id_pekerjaan INNER JOIN umkm ON pekerjaan_request.id_umkm = umkm.id_user WHERE menawarkan_jasa.status = 'terima' AND pekerjaan_request.status = 'mulai' OR pekerjaan_request.status = 'revisi' OR pekerjaan_request.status = 'selesai' AND menawarkan_jasa.id_pekerja_jasa = 1 GROUP BY umkm.nama_perusahaan");
                            $no = 0;
                            while ($data = mysqli_fetch_array($row)) {
                                $no++;
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td>
                                <h4><?php echo $data['nama_perusahaan']; ?></h4>
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
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>