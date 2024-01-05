<?php
    $koneksi = mysqli_connect("localhost", "root", "", "dbbs5");
 
    //cek koneksi
    if (mysqli_connect_errno()){
        echo "Koneksi database gagal : " . mysqli_connect_error();
    }
?>