<?php

session_start();

$user_id = $_SESSION['user_id'];

    if(!isset($_SESSION['status'])){
        header("location:login.php");
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pakar Diagnosa Penyakit Mata</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <!-- <script src="script.js" defer></script> -->
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#" style="color: #ffffff;">Sistem Pakar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link active" href="index.php" style="color: #ffffff;">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="diagnosa.php" style="color: #ffffff;">Diagnosa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="riwayat.php" style="color: #ffffff;">Riwayat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php" style="color: #ffffff;">About</a>
                    </li>
                <?php
                    if(isset($_SESSION['status'])){
                        echo '<li class="nav-item"><a href="logout.php" class="btn btn-primary">Logout</a></li>';
                    }
                ?>
            </ul>
            </div>
        </nav>

            <?php 
            include  "admin/koneksi.php";

                $answer = isset($_GET['answer']) ? $_GET['answer'] : '';
                $pilihan = isset($_GET['pilihan']) ? $_GET['pilihan'] : '';
                if ($answer != '') {
                    $_SESSION['jawaban'][$answer] = $pilihan;
                } elseif (empty($_GET['pilih'])) {
                    unset($_SESSION['jawaban']);
                }
                
                if (!$answer) {
                    $answer = 'g001';
                    
                }
                $sql2 = mysqli_query($koneksi, "SELECT * FROM tbl_penyakit WHERE id_penyakit='{$answer}'");
                $s = mysqli_fetch_array($sql2);
                $id_penyakit = isset($s['id_penyakit']) ? $s['id_penyakit'] :'';
                $nama_penyakit = isset($s['nama_penyakit']) ? $s['nama_penyakit'] :'';
                $solusi = isset($s['solusi']) ? $s['solusi'] :'';
                $pencegahan = isset($s['pencegahan']) ? $s['pencegahan'] :'';

                $result = mysqli_query($koneksi, "SELECT * FROM tbl_gejala WHERE id_gejala='{$answer}'");
                $result1 = mysqli_query($koneksi, "SELECT * FROM tbl_aturan WHERE kode='{$answer}'");
                if (mysqli_num_rows($result)) {
                    $row = mysqli_fetch_array($result);
                    $pertanyaan = $row['nama_gejala'];
                    echo"<br><div class'container'>
                         <div class='row justify-content-center'>
                         <div class='col-8 col-md-5 col-lg-4'>
                         <h3 class='mb-3 text-center font-bold'>Pilih Gejala Yang Anda Rasakan</h3>
                         <div class='card bg-dark shadow-lg'>";
                    echo"<figure class='p-4'>
                            <img src='img/diagnosa.avif' alt='Shoes' class='rounded-sm w-100' />
                        </figure>";
                    echo "<div class='card-body text-center'>";
                    echo "<h5 class='mb-3 text-center font-bold' style='color: white;'>Apakah Anda Mengalami</h5>";
                    echo("<span class='d-flex justify-content-center' style='font-size:20px; color: #FFFFFF;'>".$pertanyaan." ?</span>");
                    echo("<br/>");
                    if (mysqli_num_rows($result1)) {
                        $row1 = mysqli_fetch_array($result1);
                    if ($row1['ifyes'] != "0" && $row1['ifno'] != "0") {
                        echo("<a class='btn btn-success rounded-sm px-5 py-2 mr-3' href=\"?pilih=tanya&pilihan=Y&answer={$row1['ifyes']}\">Ya</a>&nbsp;
                            <a class='btn btn-danger rounded-sm px-5 py-2' href=\"?pilih=tanya&pilihan=N&answer={$row1['ifno']}\">Tidak</a>");
                    } else {
                        echo "";
                    }
                    echo "</center>";
                }
                }
                        echo"</div>
                        </div>
                    </div>                
                    </div>
                </div>
                </div>";
                if (!empty($s) && $s['ifyes'] == "0" && $s['ifno'] == "0") {
                    
                    $quer_pas = "SELECT * FROM user WHERE user_id='$user_id'";
                    $res_pas = mysqli_query($koneksi, $quer_pas);
                    if (mysqli_num_rows($res_pas) > 0) {
                    $pas = mysqli_fetch_array($res_pas);
                    $id_pasien = $pas['user_id'];
                    $input_hasil =  "INSERT INTO hasil_diagnosa VALUES ('','$id_pasien','$id_penyakit',NOW())";
                    $result_diagnosa = mysqli_query($koneksi, $input_hasil);
                    } else {
                    // handle jika query tidak mengembalikan hasil
                    }
                    
                echo "
                <div class='container text-dark bg-info'>
                <h1 class='mb-20 text-center font-bold'>Hasil Diagnosa Anda</h1>
                <div class='mx-4'>
                <div class='card bg-light mt-2 p-2 text-dark w-100 mx-auto'>
                <h5 class='mb-20 text-left font-bold'>" . date("d-m-Y", time()) . "</h5>
                <span class='mx-auto my-auto d-flex flex-column justify-content-center' style=' font-size:16px; color: #000000;'><b>Hasil Diagnosa Anda :</b><br><h1><b> Penyakit ".$nama_penyakit."</b></h1><br> <b>Solusi : </b><br>".$solusi."<br><br>
                <b>Rule yang Di lewati :</b><ol>
                <p>Mata Merah</p>";
                if (isset($_SESSION['jawaban']['g001'])) {
                    $jawaban1 = ($_SESSION['jawaban']['g001'] == 'Y') ? "<span style='color:green'>Yes</span>" : "<span style='color:red'>No</span>";
                    $gejala1 = mysqli_query($koneksi, "SELECT * FROM tbl_gejala WHERE id_gejala='g001'");
                    $g = mysqli_fetch_array($gejala1);
                    echo "<li> $g[nama_gejala] $pertanyaan </li>";
                }
                
                foreach ($_SESSION['jawaban'] as $key => $value) {
                    $rule = mysqli_query($koneksi, "SELECT * FROM tbl_gejala WHERE id_gejala='{$key}'");
                    $o = mysqli_fetch_array($rule);
                    if ($value == 'Y') {
                        $jawaban;
                    } else {
                        $jawaban;
                    }
                    if ($o && !empty($o)) {
                        echo "<p> $o[nama_gejala]</p>";
                    } else {
                        // handle jika $o kosong atau null
                    }
                }
                echo "<br><a class=' btn btn-primary' href='diagnosa.php'>Diagnosa Kembali</a></span>";
                }
            ?>
            
            </div>
        </div>
        </div>
                

    <div class="container-fluid d-flex justify-content-center align-items-end">
      <div class="row flex-grow-1">
         <div class="col">
            <!-- Isi halaman di sini -->
            <!-- <p class="mt-auto">&copy; 2023. <b>Grizzthegreat.</b> All Rights Reserved.</p>
         </div>
      </div>
   </div> -->
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>
</html>