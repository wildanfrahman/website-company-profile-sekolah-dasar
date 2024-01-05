<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SD Bani Saleh 5</title>
    <!-- icon -->
    <link rel="icon" href="assets/img/logobansal5.png">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="assets_lain/css/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets_lain/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-success">
            <div class="card-header text-center">

                <img src="assets/img/logobansal5.png" class="" alt="" width="50" height="50">
            </div>
            <div class="card-body">
                <p class="login-box-msg">MASUK KE HALAMAN ADMIN</p>
                <!-- notifikasi -->
                <div class="mb-4">
                    <?php
                    if (isset($_GET['pesan'])) {
                        if ($_GET['pesan'] == "gagal") {
                            echo "<script>alert('username atau password Anda salah. Silahkan coba lagi!')</script>";
                        } else if ($_GET['pesan'] == "belum_login") {
                            echo "Anda harus login untuk mengakses halaman admin";
                        }
                    }
                    ?>
                </div>
                <form action="aksi_login.php" method="POST">
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <button type="submit" name="submit" value="LOGIN" class="btn btn-success btn-block w-100">Sign In</button>
                    </div>
                    <!-- /.col -->

                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="aseets_login/js/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="aseets_login/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="aseets_login/js/adminlte.min.js"></script>
</body>

</html>