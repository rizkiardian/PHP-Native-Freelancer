<?php
$conn = mysqli_connect("localhost","root","","db_freelance");

if (isset($_POST["logout"])) {
    session_start();
    echo "<script>
    alert('Selamat kamu berhasil logout kak ".$_SESSION["username"]."');
    </script>";
    session_destroy();
    header("Location:../../");
}
?>

<nav class="navbar navbar-expand-lg fixed-top navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="../homepage/"><img class="logoImg" src="../../assets/logo/Logo.png" alt="" /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
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
                        <?php 
                            if (isset($_SESSION)) // Cek apakah session sudah di inisiasi
                            {
                        ?>
                        <li class="nav-item">
                            <div class="dropdown">
                                <button class="nav-link" aria-current="page" data-bs-toggle="dropdown" aria-expanded="false">Profile <i class="uil uil-signin"></i></button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="edit_profile.php">Edit Profile</a></li>
                                    <?php 
                                    if ($_SESSION["level"] == "pekerja_jasa") {
                                    ?>
                                    <li><a class="dropdown-item" href="../dashboard-freelance">Dashboard</a></li>
                                    <?php }elseif($_SESSION["level"] == "umkm"){?>
                                    <li><a class="dropdown-item" href="../dashboard-customer">Dashboard</a></li>
                                    <?php }?>
                                    <li><a class="dropdown-item" href="#"></a></li>

                                </ul>
                            </div>
                        </li>
                        <li class="nav-item mx-3 mt-2">
                            <div class="pemisahLogin"></div>
                        </li>
                        <li class="nav-item">
                            <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                                <button class="nav-link" aria-current="page" name="logout">Logout <i class="uil uil-signin"></i></button>
                            </form>
                        </li>
                        <?php
                            }else{
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Login <i class="uil uil-signin"></i></a>
                        </li>
                        <li class="nav-item mx-3 mt-2">
                            <div class="pemisahLogin"></div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Register <i class="uil uil-user"></i></a>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                    <span class="navbar-text">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a href="../chat/users.php">
                                    <img src="../../assets/message.png" class="navbar-brand" style="height: 45px" />
                                </a>
                            </li>
                            <li class="nav-item">
                                <?php 
                                    if ($_SESSION["level"] == "umkm") {
                                        $photo_profile_sql = mysqli_query($conn,"SELECT * FROM `umkm` where `email`='".$_SESSION['email']."'")->fetch_assoc();
                                        $photo_profile = $photo_profile_sql["profile_photo"];
                                    }elseif ($_SESSION["level"] == "pekerja_jasa"){
                                        $photo_profile_sql = mysqli_query($conn,"SELECT * FROM `pekerja_jasa` where `email`='".$_SESSION['email']."'")->fetch_assoc();
                                        $photo_profile = $photo_profile_sql["profile_photo"];
                                    }
                                        ?>
                                <img src="../../assets/profile_photo/<?= $photo_profile ?>" class="navbar-brand rounded-circle" style="height: 40px;width: 40px;" />
                            </li>
                        </ul>
                    </span>
                </div>
            </div>
        </nav>
        <!-- NAVBAR END -->