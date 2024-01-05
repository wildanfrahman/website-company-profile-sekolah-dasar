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
        document.location.href = 'artikel2.php';
      </script>
      ";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SD Bani Saleh 5</title>
    <!-- icon -->
    <link rel="icon" href="assets/img/logobansal5.png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script type="assets/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
                        <a class="nav-link" href="artikel2.php">Artikel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="tambah_artikel.php">Tambah Artikel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="tambah_artikel.php">Welcome, Admin</a>
                    </li>
                </ul>
                <div class="justify-content-end ms-2">
                    <a href="logout.php" class="btn btn-outline-success rounded-pill"> Logout </a>
                </div>
            </div>
        </div>
    </nav>
    <!-- akhir navbar -->
    <!-- form tambah artikel -->
    <div class="container">
        <div class="card m-3 ">
            <div class="card-body">
                <h5 class="card-title text-center mb-3">Form Tambah Artikel</h5>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="idartikel">
                        <label for="floatingInput">ID Artikel</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="judul">
                        <label for="floatingInput">Judul</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 200px" name="konten"></textarea>
                        <label for="floatingTextarea2">Konten</label>
                    </div>
                    <div class="mb-3">
                        <input class="form-control mb-3" type="file" id="formFile" name="foto">
                        <input type="submit" name="submit" value="Post" class="btn btn-success w-100">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- akhir form -->
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