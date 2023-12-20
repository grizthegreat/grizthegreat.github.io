<?php
$username = $_POST['username'];
$jeniskelamin = $_POST['jeniskelamin'];
$email = $_POST['email'];
$password = md5($_POST['password']);
$role = 2;

include '../admin/koneksi.php';

$simpan = mysqli_query($koneksi, "INSERT into user(username,jeniskelamin, email, password, role) VALUES('$username','$jeniskelamin','$email','$password','$role')");
if($simpan){
    echo"<script>alert('Berhasil Register');document.location.href='../login.php';</script>";

}else {
    echo"<script>alert('Gagal Register');document.location.href='../register.php';</script>";
}
?>