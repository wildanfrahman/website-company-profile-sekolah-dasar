<?php include 'config/connection.php'; ?>
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
              <a href="tambah_artikel_admin.php" class="nav-link">
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
              <h1 class="m-0">Artikel</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Artikel</li>
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
              <div class="card card-outline card-success">
                <div class="card-header">
                  <h3 class="card-title">List Artikel</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead class="bg-success">
                      <tr>
                        <th>NO</th>
                        <th>ID ARTIKEL</th>
                        <th>FOTO</th>
                        <th>JUDUL ARTIKEL</th>
                        <th>KONTEN</th>
                        <TH>AKSI</TH>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $batas = 3;
                      $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                      $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                      $previous = $halaman - 1;
                      $next = $halaman + 1;

                      $no = 0;
                      $data = mysqli_query($koneksi, "select * from artikel");
                      $jumlah_data = mysqli_num_rows($data);
                      $total_halaman = ceil($jumlah_data / $batas);

                      $data_artikel = mysqli_query($koneksi, "SELECT * FROM artikel ORDER BY idartikel LIMIT $halaman_awal, $batas");
                      $nomor = $halaman_awal + 1;
                      while ($d = mysqli_fetch_array($data_artikel)) {
                      ?>
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $d['idartikel']; ?></td>
                          <td><?php echo $d['foto']; ?></td>
                          <td><?php echo $d['judul']; ?></td>
                          <td><?php echo substr($d['konten'], 0, 43) ?>...</td>
                          <td> <a href="edit_artikel.php?idartikel=<?= $d['idartikel']; ?>"><button type="button" class="btn btn-warning"><i class="fa fa-edit" style="color:white;"></i></button></a>
                            <a href="hapus_artikel.php?idartikel=<?= $d['idartikel']; ?>"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                    <tfoot>
                    </tfoot>
                  </table>
                </div>
                <!-- /.card-body -->
                <nav>
                  <ul class="pagination justify-content-center">
                    <li class="page-item">
                      <a class="page-link" <?php if ($halaman > 1) {
                                              echo "href='?halaman=$previous'";
                                            } ?>>Previous</a>
                    </li>
                    <?php
                    for ($x = 1; $x <= $total_halaman; $x++) {
                    ?>
                      <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                    <?php
                    }
                    ?>
                    <li class="page-item"><a class="page-link" <?php if ($halaman < $total_halaman) {
                                                                  echo "href='?halaman=$next'";
                                                                } ?>>Next</a>
                    </li>
                  </ul>
                </nav>

              </div>
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
  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>

</html>