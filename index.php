<?php
require_once("models/freelanceModel.php");
require_once("controller/loginController.php");
session_start();

if(isset($_POST['submit']))login();

if (isset($_SESSION["level"])) {
    if ($_SESSION['level'] == 'umkm' OR $_SESSION['level'] == 'pekerja_jasa') {

        header("Location:./view/homepage");
    }elseif($_SESSION['level'] == "admin") {
        header("Location:./view/admin/");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins&amp;display=swap">

    <!-- CSS LINK -->

    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/Material-Text-Input.css">
    <link rel="stylesheet" href="css/Navbar-With-Button-icons.css">
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- JAVASCRIPT LINK -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
    <div style="height: 100vh;width:100vw;">
        <div class="container d-flex flex-column justify-content-xl-center" style="height: 100%;">
            <div class="row" style="height: 100%;">
                <div class="col" style="padding: 0px;">
                    <div style="height: 100%;padding:10%;">
                        <div class="card-body" style="height: 100%;border-radius:0;">
                            <div class="row" style="height: 20%;">
                                <div class="col" style="height: 100%;">
                                    <h5><strong><span style="text-decoration: underline;">Sign In</span></strong> | Sign Up as&nbsp;<a href="register-freelancer.php" style="color: black;">freelancer</a>&nbsp;or&nbsp;<a href="register-customer.php" style="color: black;">customer</a></h5>
                                </div>
                            </div>
                            <div class="row" style="height: 10%;">
                                <div class="col d-xl-flex align-items-xl-end" style="height: 100%;">
                                    <h3 style="margin-bottom: 0px;margin-right: 0.5rem;color: var(--bs-blue);font-weight: bold;">Sign in</h3>
                                    <p style="margin-bottom: 0px;color: #7fa6ff;">to continue our Application</p>
                                </div>
                            </div>
                            <div class="row" style="height: 70%;">

                                <!-- Email -->
                            <div class="col">
                                    <form class="d-flex flex-column justify-content-evenly" style="height: 100%;" method="post">
                                    <input 
                                    type="text" 
                                    class="form-control-SignInPage" 
                                    style="border-width: 0px;border-bottom-width: 1px;border-bottom-style: solid;" 
                                    placeholder="email" 
                                    name="email"
                                    value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>" 
                                    required="" 
                                    inputmode="email"
                                    >
                                <!-- Login sebagai -->
                                
                            <div style="position: relative;">
                                <input 
                                type="password" 
                                id="Psw" 
                                class="form-control-SignInPage" 
                                style="border-width: 0px;border-bottom-width: 1px;border-bottom-style: solid;" 
                                placeholder="password" 
                                name="password" 
                                required
                                >
                                <i class="far fa-eye-slash" id="Psw-Icon" style="position: absolute;top: 30%;right: 2%;" onclick="ShowPsw()"></i>
                            </div>
								<select class="form-select" name="user-type" required>
									<option selected disabled hidden>login as...</option>
									<option value="umkm">Customer</option>
									<option value="pekerja_jasa">Freelancer</option>
								</select>
								<button class="btn btn-primary" type="submit" name="submit" value="send">Login</button>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col" style="padding: 0px;">
                    <div style="background: var(--bs-blue);height: 100%; width:40vw;">
                        <div class="card-body d-flex justify-content-xl-center"><img src="assets/Login_image.png" style="background-repeat: no-repeat; height:500px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/Material-Text-Input.js"></script>
    <script src="js/Password-Validation.js"></script>
    <script src="js/Password-Visibility.js"></script>
    <script>

    </script>

</body>

</html>