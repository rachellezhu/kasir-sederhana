<?php
session_start();
(isset($_SESSION['login'])) ? (header('location: admin/index.php')) : '';

require  'config/functions.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $result = mysqli_query($koneksi, "select * from admin where username =
    '$username' and password = '$password'");

    while ($data = mysqli_fetch_assoc($result)) {
        if (mysqli_num_rows($result) === 1) {
            $_SESSION['login'] = true;
            $_SESSION['name'] = $data['nama'];

            header('location: admin/index.php');
            exit;
        }
        $error = true;
    }
}
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Kasir</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/
    font/bootstrap-icons.css">
</head>

<body>
    <section class="vh-100">
        <div class="container-fluid h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-6">
                    <form class="form-control" action="" method="POST">
                        <h2 class="text-center mt-4 mb-4">
                            Kasir
                        </h2>
                        <p class="text-center">
                            Masukkan username dan password untuk masuk
                        </p>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="username" id="floatingInput" placeholder="Admin" autocomplete="off" required>
                            <label for="floatingInput">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <button class="btn btn-primary mb-4" type="submit" name="login">
                            <i class="bi bi-box-arrow-in-right"></i>
                            Login
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.js"></script>
</body>

</html>