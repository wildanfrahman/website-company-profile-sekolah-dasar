<?php
include 'config/connection.php';
if (isset($_POST["submit"])) {
    $idartikel = $_POST["idartikel"];
    $judul = $_POST["judul"];
    $konten = $_POST["konten"];
    if ($_FILES["foto"]["error"] == 4) {
        echo
        "<script> alert('Image Does Not Exist'); </script>";
    } else {
        $fileName = $_FILES["foto"]["name"];
        $fileSize = $_FILES["foto"]["size"];
        $tmpName = $_FILES["foto"]["tmp_name"];

        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));
        if (!in_array($imageExtension, $validImageExtension)) {
            echo
            "
      <script>
        alert('Ekstensi gambar salah');
      </script>
      ";
        } else if ($fileSize > 10000000) {
            echo
            "
      <script>
        alert('Ukuran gambar terlalu besar');
      </script>
      ";
        } else {
            $newImageName = uniqid();
            $newImageName .= '.' . $imageExtension;

            move_uploaded_file($tmpName, 'assets/img/' . $newImageName);
            $query = "INSERT INTO artikel VALUES('$idartikel','$newImageName', '$judul', '$konten')";
            mysqli_query($koneksi, $query);
            echo
            "
      <script>
        alert('Artikel Berhasil Ditambah');
        document.location.href = 'tambah_artikel_admin.php';
      </script>
      ";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Artikel Admin | SD Bani Saleh 5</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="assets_lain/css/all.min.css" />
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="assets_lain/css/adminlte.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="assets_lain/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 0.8" />
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="assets_lain/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Admin</a>
                    </div>
                </div>



                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="index_admin.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="artikel_admin.php" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Artikel
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="tambah_artikel.php" class="nav-link">
                                <i class="nav-icon fas fa-plus-square"></i>
                                <p>
                                    Tambah Artikel
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="logout.php" class="nav-link">
                                <i class="nav-icon fa fa-window-close"></i>
                                <p>
                                    Log Out
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Tambah Artikel</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Tambah Artikel</li>
                            </ol>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-outline card-success">
                                <div class="card-header">
                                    <h3 class="card-title"><i class="nav-icon fas fa-plus-square" style="padding-right:10px;"></i>Tambah Artikel</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">ID Artikel</label>
                                            <input type="text" class="form-control" placeholder="Contoh : 1, 2, 3 dst" name="idartikel">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Judul</label>
                                            <input type="text" class="form-control" placeholder="Masukkan Judul" name="judul">
                                        </div>
                                        <div class="form-group">
                                            <label>Textarea</label>
                                            <textarea class="form-control" rows="3" placeholder="Tulis Konten" name="konten"></textarea>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="foto">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" name="submit" value="Post" class="btn btn-success">Post</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->
                            <!-- /.card -->

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <!-- pagination -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block"><b>Version</b> 3.2.0</div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="assets_lain/js/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="assets_lain/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="assets_lain/js/adminlte.js"></script>
    <!-- Custom File Input -->
    <script src="assets_lain/js/bs-custom-file-input.min.js"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
</body>

</html>