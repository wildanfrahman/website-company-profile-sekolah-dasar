<?php
if (isset($_GET['idartikel'])) {
  $idartikel = $_GET['idartikel'];
} else {
  die("Error. No ID Selected!");
}
include "config/connection.php";
$query = mysqli_query($koneksi, "SELECT * FROM artikel WHERE idartikel='$idartikel'");
$result = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $result['judul'] ?> - SD Bani Saleh 5</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script type="assets/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
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
            <a class="nav-link" aria-current="page" href="index.php">Beranda</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Tentang Kami
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="visimisi.php">Visi Misi</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="sejarahyayasan.php">Sejarah Yayasan Bani Saleh</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Sejarah SD Bani Saleh 5</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="artikel.php">Artikel</a>
          </li>
        </ul>
        <div class="justify-content-end ms-2">
          <a href="" class="btn btn-outline-success rounded-pill"> login </a>
        </div>
      </div>
    </div>
  </nav>
  <!-- akhir navbar -->
  <!-- konten -->
  <h1 class="text-light text-center p-4 bg-dark shadow-sm"><?php echo $result['judul'] ?></h1>
  <div class="container-fluid p-3">
    <div class="card mb-3 shadow-sm p-4">
      <a href="artikel.php"><button type="button" class="btn btn-outline-success mb-4">Kembali</button></a>
      <img src="assets/img/<?php echo $result["foto"]; ?>" class="card-img-top mb-3">
      <textarea style="text-align: justify;" name="konten" readonly class="form-control-plaintext" rows="30"><?php echo $result['konten'] ?></textarea>
    </div>
  </div>
  <!-- akhir konten -->
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