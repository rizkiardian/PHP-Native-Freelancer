<?php
require_once("models/freelanceModel.php");
require_once("controller/adminController.php");

session_start();

if (isset($_POST["regristrasi"])) {
    registrasi_admin($_POST);
}

if (isset($_POST["login"])) {
    if(login_admin($_POST) > 0){
        header("Location:view/admin");
    }
}

if (isset($_SESSION["level"])) {
    if ($_SESSION['level'] == 'umkm' AND $_SESSION['level'] == 'pekerja_jasa') {
        header("Location:./view/homepage");
    }elseif($_SESSION['level'] == "admin") {
        header("Location:./view/admin/");
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins&amp;display=swap">

    <!-- CSS LINK -->

    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/Material-Text-Input.css">
    <link rel="stylesheet" href="css/Navbar-With-Button-icons.css">
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- JAVASCRIPT LINK -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="bg-primary " style="font-family: 'Poppins', sans-serif;">
    <div class="d-flex jus justify-content-center align-items-center" style="min-height: 90vh">
        
    <!-- Card -->
    <div class="card bg-primary-subtle " style="width: 18rem;">
        <h3 class="text-center my-3">Login</h3>
        <form class="mb-3 container text-sm" method="post" action="<?=htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="mb-3">
                <label for="username" class="form-label">username</label>
                <input type="text" class="form-control" id="username" name="username" autofocus>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3 text-center">
                <a href="#" class="text-black text-decoration-none" data-bs-toggle="modal" data-bs-target="#registrationModal">Need Registration?</a>
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%;" name="login">Login</button>
        </form>
        </div>

        <!-- Model Regristrasi -->

        <div class="modal fade" id="registrationModal" tabindex="-1" aria-labelledby="registrationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registrationModalLabel">Registration Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Isi formulir registrasi di sini -->
                    <form method="post" action="" onsubmit="return validateForm();">
                        <!-- Tambahkan elemen formulir registrasi sesuai kebutuhan -->

                        <!-- Username -->

                        <div class="mb-3">
                            <label for="registrationUsername" class="form-label">Username</label>
                            <input type="text" class="form-control" id="registrationUsername" name="registrationUsername" required>
                        </div>

                        <!-- Nama -->

                        <div class="mb-3">
                            <label for="registrationNama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="registrationNama" name="registrationNama" required>
                        </div>

                        <!-- Password -->

                        <div class="mb-3">
                            <label for="registrationPassword" class="form-label">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="registrationPassword" name="registrationPassword" required>
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Konfrimasi Password -->

                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Konfirmasi Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                                <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Konfirmasi Password -->

                        <div class="mb-3">
                            <label for="noRekening" class="form-label">No Rekening</label>
                            <input type="text" class="form-control" id="noRekening" name="noRekening" required>
                        </div>
                        <!-- Tambahkan elemen formulir lainnya -->

                        <button type="submit" class="btn btn-primary" name="regristrasi">Register</button>
                    </form>
                </div>
            </div>

    </div>

    <head>
    <!-- ... (kode HTML yang sudah ada) ... -->

    <script>
        // Fungsi untuk melakukan validasi password di sisi klien
        function validatePassword() {
            var password = document.getElementById("registrationPassword").value;
            var confirmPassword = document.getElementById("confirmPassword").value;

            if (password !== confirmPassword) {
                alert("Konfirmasi Password tidak cocok.");
                return false;
            }

            return true;
        }

        // Fungsi untuk memanggil validasi saat formulir disubmit
        function validateForm() {
            return validatePassword();
        }

        // Fungsi untuk menangani toggle visibilitas password
        function togglePasswordVisibility(inputId, buttonId) {
            var passwordInput = document.getElementById(inputId);
            var type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            // Ganti ikon mata (eye) sesuai dengan visibilitas password
            var eyeIcon = document.querySelector('#' + buttonId + ' i');
            eyeIcon.classList.toggle('fa-eye-slash');
        }

        // Menangani toggle visibilitas password
        document.getElementById('togglePassword').addEventListener('click', function () {
            togglePasswordVisibility('registrationPassword', 'togglePassword');
        });

        // Menangani toggle visibilitas konfirmasi password
        document.getElementById('toggleConfirmPassword').addEventListener('click', function () {
            togglePasswordVisibility('confirmPassword', 'toggleConfirmPassword');
        });
    </script>
</head>

</body>
\
</html>