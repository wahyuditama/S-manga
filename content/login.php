<?php

include '../database/koneksi.php';
session_start();

// Register
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $queryRegister = mysqli_query($koneksi, "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')");

    header('Location: ?login.php');
}

// Login 

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $queryLogin = mysqli_query($koneksi, "SELECT * FROM user ");

    $rowLogin = mysqli_fetch_assoc($queryLogin);
    if ($rowLogin['email'] == $email || $rowLogin['password'] == $password) {
        $_SESSION['ID'] = $rowLogin['id'];
        header('Location: ../?');
    }
}

// Logout

if (isset($_GET['logout'])) {
    session_destroy();
    session_unset();
    echo "<script>
        alert('Anda Sudah Logout');
        window.location.href = '../?';
    </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login-Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<style>
    .gradient-custom {
        background: #6a11cb;

        background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgb(134, 37, 252));

        background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
    }
</style>

<body>
    <section class="<?php echo isset($_GET['register']) ? 'vh-200' : 'vh-100'  ?> gradient-custom">
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-2 mt-md-4">
                                <h2 class="fw-bold mb-2 "><?php echo isset($_GET['register']) ? 'Register' : 'Login' ?></h2>
                                <p class="text-white-50 mb-5"><?php echo isset($_GET['register']) ? 'Please eyour register at here!' : 'Please enter your email and password!' ?></p>
                                <form action="" method="post">

                                    <div data-mdb-input-init class="form-outline form-white mb-4">
                                        <?php if (isset($_GET['register'])) : ?>
                                            <div data-mdb-input-init class="form-outline form-white mb-4">
                                                <input type="username" id="typeX" name="username" class="form-control form-control-lg" />
                                                <label class="form-label" for="Username">Username</label>
                                            </div>
                                        <?php endif ?>

                                        <input type="email" id="typeEmailX" name="email" class="form-control form-control-lg" />
                                        <label class="form-label" for="typeEmailX">Email</label>
                                    </div>

                                    <div data-mdb-input-init class="form-outline form-white mb-4">
                                        <input type="password" id="typePasswordX" name="password" class="form-control form-control-lg" />
                                        <label class="form-label" for="typePasswordX">Password</label>
                                    </div>

                                    <!-- <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p> -->

                                    <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5" name="<?php echo isset($_GET['register']) ? 'register' : 'login' ?>" type="submit"><?php echo (isset($_GET['register']) ? 'Register' : 'Login') ?></button>
                                </form>

                                <div class="d-flex justify-content-center text-center mt-2 pt-1">
                                    <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                                    <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                    <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                                </div>

                            </div>

                            <div>
                                <!-- <p class="mb-0">Don't have an account? <a href="?register" class="text-white-50 fw-bold">Sign Up</a>
                                </p> -->
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>