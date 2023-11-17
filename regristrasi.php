<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrastion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style-login.css">
</head>
<body class="bg-primary " style="font-family: 'Poppins', sans-serif;">
    <div class="d-flex jus justify-content-center align-items-center" style="min-height: 90vh">
        
    <!-- Card -->
    <div class="card bg-primary-subtle" style="width: 30rem;">
        <h3 class="text-center my-3">Regristration</h3>
        <form class="mb-3 container text-sm" method="post" action="<?=htmlspecialchars($_SERVER["PHP_SELF"]);?>">

        <!-- Tombol Memilih Regristrasi Sebagai apa  -->
        <div class="d-flex flex-row">
            <span id="visible-umkm" class="btn btn-primary mx-3" style="width: 20vw;" onclick="tampak_regristrasi_umkm()">Regristrasi sebagai UMKM</span>
            <span id="visible-pekerja-jasa" class="btn btn-primary" style="width: 20vw;" onclick="tampak_regristrasi_pekerja_jasa()">Regristrasi sebagai Pekerja Jasa</span>
        </div>

        <div class="umkm" id="umkm-registrasi">
            <div class="d-flex flex-row">
                <!-- Div 1 -->
                <div>
                    <div class="mb-3">
                        <label for="username" class="form-label">username</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?=(isset($_POST["username"])) ? $_POST["username"] : ''?>" autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">password</label>
                        <input type="password" class="form-control" id="password" name="password" value="<?=(isset($_POST["password"])) ? $_POST["password"] : ''?>">  
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">name User</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?=(isset($_POST["name"])) ? $_POST["name"] : ''?>">
                    </div>
                </div>

                <!-- Div 2 -->
                <div class="mx-3">
                    <div class="mb-3">
                        <label for="alamat" class="form-label">alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat"><?=(isset($_POST["alamat"])) ? $_POST["alamat"] : ''?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="nomor-hp" class="form-label">nomor HP</label>
                        <input type="nomor-hp" class="form-control" id="nomor-hp" name="nomor-hp" value="<?=(isset($_POST["nomor-hp"])) ? $_POST["nomor-hp"] : ''?>">
                    </div>
                    <div class="mb-3">
                        <label for="level" class="form-label">Level</label>
                        <select type="level" class="form-control" id="level" name="level">
                            <option selected hidden>-- Pilih Jenis User --</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="mb-3 text-center">
                <a href="index.php" class="text-black text-decoration-none">Already have account ?</a>
            </div>
                <div class="mb-3">
                    <a href="<?=$_SERVER["PHP_SELF"]?>" class="btn btn-primary" style="width: 100%;" >Reset</a>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" style="width: 100%;" name="submit">Regristasi</button>
                </div>
            </form>
        </div>
        
        <!-- Pekerja Jasa -->

        <div class="pekerja_jasa" id="pekerja-jasa-registrasi">
            <div class="d-flex flex-row">
                <!-- Div 1 -->
                <div>
                    <div class="mb-3">
                        <label for="username" class="form-label">username</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?=(isset($_POST["username"])) ? $_POST["username"] : ''?>" autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">password</label>
                        <input type="password" class="form-control" id="password" name="password" value="<?=(isset($_POST["password"])) ? $_POST["password"] : ''?>">  
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">name User</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?=(isset($_POST["name"])) ? $_POST["name"] : ''?>">
                    </div>
                </div>

                <!-- Div 2 -->
                <div class="mx-3">
                    <div class="mb-3">
                        <label for="alamat" class="form-label">alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat"><?=(isset($_POST["alamat"])) ? $_POST["alamat"] : ''?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="nomor-hp" class="form-label">nomor HP</label>
                        <input type="nomor-hp" class="form-control" id="nomor-hp" name="nomor-hp" value="<?=(isset($_POST["nomor-hp"])) ? $_POST["nomor-hp"] : ''?>">
                    </div>
                    <div class="mb-3">
                        <label for="level" class="form-label">Level</label>
                        <select type="level" class="form-control" id="level" name="level">
                            <option selected hidden>-- Pilih Jenis User --</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="mb-3 text-center">
                <a href="index.php" class="text-black text-decoration-none">Already have account ?</a>
            </div>
                <div class="mb-3">
                    <a href="<?=$_SERVER["PHP_SELF"]?>" class="btn btn-primary" style="width: 100%;" >Reset</a>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" style="width: 100%;" name="submit">Regristasi</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="js/script-login.js"></script>

</body>
</html>