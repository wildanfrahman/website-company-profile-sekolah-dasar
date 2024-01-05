<?php include 'config/connection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SD Bani Saleh 5</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script type="assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container">
            <img src="assets/img/logobansal5.png" class="me-2" alt="" width="30" height="24">
            <a class="navbar-brand" href="#">SD Bani Saleh 5</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index2.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="artikel2.php">Artikel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tambah_artikel.php">Tambah Artikel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="tambah_artikel.php">Welcome, Admin</a>
                    </li>
                </ul>
                <div class="justify-content-end ms-2">
                    <a href="logout.php" class="btn btn-outline-light"> Logout </a>
                </div>
            </div>
        </div>
    </nav>
    <!-- akhir navbar -->
    <!-- content -->
    <h1 class="text-light text-center p-4 mb-5 bg-dark shadow-sm">ARTIKEL</h1>
    <div class="container mt-3 mb-5">
        <div class="row">
            <?php
            $batas = 3;
            $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
            $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

            $previous = $halaman - 1;
            $next = $halaman + 1;

            $data = mysqli_query($koneksi, "select * from artikel");
            $jumlah_data = mysqli_num_rows($data);
            $total_halaman = ceil($jumlah_data / $batas);

            $data_artikel = mysqli_query($koneksi, "SELECT * FROM artikel ORDER BY idartikel DESC LIMIT $halaman_awal, $batas");
            $nomor = $halaman_awal + 1;
            while ($d = mysqli_fetch_array($data_artikel)) {
            ?>
                <div class="col-md-4">
                    <div class="card mb-3 shadow-sm">
                        <img src="assets/img/<?php echo $d["foto"]; ?>" class="card-img-top" style="height: 15rem;;">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $d['judul']; ?></h4>
                            <p style="text-align: justify;" class="card-text mb-4"><?php echo substr($d['konten'], 0, 43) ?>...</p>
                            <div class="d-flex justify-content-end">
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    <a href="detailpost2.php?idartikel=<?= $d['idartikel'] ?>"><button type="button" class="btn btn-success me-2"><i class="fa fa-external-link me-1"></i>Lebih Lanjut</button></a>
                                    <a href="edit_artikel.php?idartikel=<?= $d['idartikel']; ?>"><button type="button" class="btn btn-warning me-2 text-light"><i class="fa fa-edit me-1" style="color:white;"></i>Edit</button></a>
                                    <a href="hapus_artikel.php?id=<?= $d['idartikel']; ?>"><button type="button" class="btn btn-danger me-2"><i class="fa fa-trash me-1"></i>Hapus</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
            }
            ?>
        </div>
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
    <!-- akhir content -->
    <!-- Footer -->
    <footer class="text-center text-lg-start bg-dark text-muted shadow-sm">
        <!-- Section: Social media -->
        <section class="border-bottom">
        </section>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="text-light">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-school me-3"></i>SD Bani Saleh 5
                        </h6>
                        <small>
                            SD Bani Saleh 5 Bekasi merupakan salah satu lembaga pendidikan yang berusaha mencerdaskan anak bangsa yang didalamnya berusaha mengeimbangkan antara kecerdasan intelektual (IQ), Kecerdasan Emosiorial (EQ) dan Kecerdasan Spiriftial (SQ), sehingga pada akhirnya siswa mampu mengatasi kesulitan-kesulitan dan mampu menilai sesualu hal yang sekiranya akan mendatangkan masalah pada dirinya.
                        </small>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-user me-3"></i>Tentang Kami
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Visi Misi</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Sejarah Yayasan Bani Saleh</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Sejarah SD Bani Saleh 5</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-door-open me-3"></i> Fasilitas
                        </h6>
                        <p class="text-decoration-underline">Ruang Perpustakaan
                        </p>
                        <p class="text-decoration-underline">Pelayanan Kesehatan
                        </p>
                        <p class="text-decoration-underline">Pembayaran Sistem Perbankan
                        </p>
                        <p class="text-decoration-underline">Kantin dan Katering
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-address-book me-3"></i>Kontak
                        </h6>
                        <p><i class="fas fa-home me-3"></i>Jalan RA.Kartini kampus kenari No.7</p>
                        <p><i class="fas fa-phone me-3"></i> + 082124917642</p>
                        <p><i class="fas fa-print me-3"></i> + 021-88343362</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center text-light p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2021 Copyright:
            <span class="text-reset fw-bold">SD Bani Saleh 5</span>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
</body>

</html>