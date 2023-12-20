<?php

session_start();

include '../eadmin/koneksi.php';

$email = $_POST['email'];

$password = md5($_POST['password']);

// menyeleksi data admin dengan email dan password yang sesuai
$data = mysqli_query($koneksi,"select * from user where email='$email' and password='$password'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
$user = mysqli_fetch_array($data);

if($cek > 0){
	if($user['role'] == 1){
		$_SESSION['username'] = $user['username'];
		echo 'successA';
	}else{
		$_SESSION['email'] = $email;
		$_SESSION['status'] = "login";
		$_SESSION['user_id'] = $user['user_id'];
		$_SESSION['username'] = $user['username'];
		echo 'success';
	}

}else{
	echo 'failed';
}



?>