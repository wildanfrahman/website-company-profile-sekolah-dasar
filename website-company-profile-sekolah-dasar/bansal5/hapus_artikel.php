<?php

include('config/connection.php');
$idartikel = $_GET['idartikel'];
mysqli_query($koneksi, "DELETE FROM artikel WHERE idartikel='$idartikel'");
header("location:artikel_admin.php");
