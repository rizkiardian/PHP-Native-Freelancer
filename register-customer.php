<!DOCTYPE html>
<html lang="en">

<?php
  require_once("models/freelanceModel.php");
  require_once("controller/loginController.php");

if(isset($_POST['submit']))tambah_registrasi_customer();
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Fitur 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/Material-Text-Input.css">
    <link rel="stylesheet" href="css/Navbar-With-Button-icons.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div class="d-flex flex-row" style="min-height: 100vh;">
        <div style="flex: 1 1 50%;background: var(--bs-blue);">
            <div class="container d-flex flex-column justify-content-between" style="padding-top: 1rem;padding-right: 2rem;padding-left: 2rem;height: 100%;">
                <div class="row">
                    <div class="col d-flex justify-content-between"><a class="d-xl-flex align-items-xl-center" href="#"><img src="assets/logo/Logo.png" style="width: 105px;"></a>
                        <div class="d-flex"><a class="h5" href="./" style="color: black;text-decoration: none;">Sign In</a>
                            <h5 style="color: white;">&nbsp;|&nbsp;</h5>
                            <h5 style="color: white;">&nbsp;<strong><span style="text-decoration: underline;">Sign Up as Customer</span></strong><br></h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col d-flex align-items-xl-end" style="color: white;">
                        <h1><strong>Register</strong></h1>
                        <h2>&nbsp;yourself now!</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col d-flex d-xl-flex justify-content-xl-end align-items-xl-end"><img src="assets/img/Regist_Customer_image.png" width="50%"></div>
                </div>
            </div>
        </div>
        <div style="flex: 1 1 50%;">
            <div class="container" style="padding-top: 1rem;padding-bottom: 1rem;height: 100%;">
                <div class="row" style="height: 100%;">
                    <div class="col d-flex flex-column justify-content-between align-items-xl-center" style="height: 100%;">
                        <form class="d-flex flex-column justify-content-between align-items-center" style="width: 100%;height: 100%;" method="post" onsubmit="return validateForm(this)" enctype="multipart/form-data">
                            <div style="width: 100%;">
                                <div style="width: 100%;">
                                    <h5 style="color: var(--bs-blue-dark);margin-bottom: 0.25rem;margin-top: 0.5rem;">Nama Perusahaan</h5>
                                    
                                    <input 
                                    class="form-control" 
                                    type="text" 
                                    style="border-color: var(--bs-blue-dark);" 
                                    name="nama_perusahaan" 
                                    placeholder="Masukkan Nama Perusahaan" 
                                    required>
                                </div>
                                <div style="width: 100%;">
                                    <h5 style="color: var(--bs-blue-dark);margin-bottom: 0.25rem;margin-top: 0.5rem;">Email</h5>
                                    <input 
                                    class="form-control" 
                                    type="text" 
                                    style="border-color: var(--bs-blue-dark);" 
                                    placeholder="Masukkan Alamat Email Perusahaan" 
                                    name="email" 
                                    required 
                                    inputmode="email">
                                </div>
                                <div style="width: 100%;">
                                    <h5 style="color: var(--bs-blue-dark);margin-bottom: 0.25rem;margin-top: 0.5rem;">Buat Password</h5>
                                    <div id="Password-Container">
                                        <input 
                                        class="form-control" 
                                        type="password" 
                                        id="Psw" 
                                        style="border-color: var(--bs-blue-dark);" 
                                        name="password" 
                                        placeholder="Masukkan Password" 
                                        required="">
                                        
                                        <i class="far fa-eye-slash" id="Psw-Icon" style="position: absolute;top: 30%;right: 2%;" onclick="ShowPsw()"></i><i class="far fa-check-circle text-success" id="Psw-Icon-Valid" style="position: absolute;top: 30%;right: 6%;display: none;" onclick="ShowPsw()"></i><i class="far fa-times-circle text-danger" id="Psw-Icon-Invalid" style="position: absolute;top: 30%;right: 6%;display: none;" onclick="ShowPsw()"></i>
                                    </div>
                                    <p id="Psw-Validation" class="invalid" style="margin-bottom: 0px;color: var(--bs-red);font-size: 0.8rem;display: none;">*Min 6 karakter terdiri dari huruf dan angka</p>
                                </div>
                                <div style="width: 100%;">
                                    <h5 style="color: var(--bs-blue-dark);margin-bottom: 0.25rem;margin-top: 0.5rem;">Konfirmasi Password</h5>
                                    <div id="Password-Container">
                                        <input 
                                        class="form-control" 
                                        type="password" 
                                        id="PswConfirmation" 
                                        style="border-color: var(--bs-blue-dark);" 
                                        name="password_konfirmasi" 
                                        placeholder="Masukkan Ulang Password" 
                                        required=""
                                        >
                                        
                                        <i class="far fa-eye-slash" id="PswConfirmation-Icon" style="position: absolute;top: 30%;right: 2%;" onclick="ShowPswConfirmation()"></i><i class="far fa-check-circle text-success" id="PswConfirmation-Icon-Valid" style="position: absolute;top: 30%;right: 6%;display: none;" onclick="ShowPsw()"></i><i class="far fa-times-circle text-danger" id="PswConfirmation-Icon-Invalid" style="position: absolute;top: 30%;right: 6%;display: none;" onclick="ShowPsw()"></i></div>
                                    <p id="PswConfirmation-Validation" class="invalid" style="margin-bottom: 0px;color: var(--bs-red);font-size: 0.8rem;display: none;">*Password tidak cocok</p>
                                </div>
                                <div style="width: 100%;">
                                    <h5 style="color: var(--bs-blue-dark);margin-bottom: 0.25rem;margin-top: 0.5rem;">Nomor Induk Bisnis (NIB)</h5>
                                    <input 
                                    class="form-control" 
                                    type="text" 
                                    style="border-color: var(--bs-blue-dark);" 
                                    placeholder="Masukkan Nomor Induk Bisnis" 
                                    name="NIB" 
                                    autofocus="" 
                                    required="" 
                                    inputmode="numeric">
                                </div>
                                <div style="width: 100%;">
                                    <h5 style="color: var(--bs-blue-dark);margin-bottom: 0.25rem;margin-top: 0.5rem;">Nomor Pokok Wajib Pajak (NPWP)</h5>
                                    <input 
                                    class="form-control" 
                                    type="text" 
                                    style="border-color: var(--bs-blue-dark);" 
                                    name="NPWP" 
                                    placeholder="Masukkan NPWP" 
                                    autofocus="" 
                                    required="" 
                                    inputmode="numeric"
                                    >
                                </div>
                                <div style="width: 100%;">
                                    <h5 style="color: var(--bs-blue-dark);margin-bottom: 0.25rem;margin-top: 0.5rem;">No Rekening</h5>
                                    <input 
                                    class="form-control" 
                                    type="text" 
                                    style="border-color: var(--bs-blue-dark);" 
                                    name="rekening" 
                                    placeholder="Masukkan NPWP" 
                                    autofocus="" 
                                    required="" 
                                    inputmode="numeric"
                                    >
                                </div>
                                <div style="width: 100%;">
                                    <h5 style="color: var(--bs-blue-dark);margin-bottom: 0.25rem;margin-top: 0.5rem;">Upload foto profil</h5>
                                    <input class="form-control" type="file" name="profile_photo" required="">
                                </div>
                            </div><button class="btn btn-primary" type="submit" name="submit" value="send" style="width: 50%;font-size: 1.2rem;font-weight: bold;margin-top: 1rem;">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<div id="popup" class="d-flex align-items-center popup-success <?php if(!empty($_POST['submit'])){ if($success) {echo "show";} }?>" style="position: fixed;display: block;z-index: 1002;top: 2%;right: 2%;padding-right: 1rem;padding-left: 1rem;padding-top: 0.5rem;padding-bottom: 0.5rem;border-radius: 15px;background: var(--bs-success-highlight);color: var(--bs-success);border-width: 1px;border-style: solid;">
		<h4 style="margin: 0px;">Sign Up Success </h4><i class="fas fa-check fs-4"></i>
	</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="js/Material-Text-Input.js"></script>
    <script src="js/Password-Validation.js"></script>
    <script src="js/Password-Visibility.js"></script>
</body>

</html>