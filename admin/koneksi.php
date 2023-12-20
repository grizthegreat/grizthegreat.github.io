<?php
$koneksi = mysqli_connect ("localhost","root","","sispakar");

if(mysqli_connect_error()){
    echo "Koneksi Database Gagal : .mysqli_connect_error()";
}

?>