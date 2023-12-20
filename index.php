<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pakar Diagnosa Penyakit Mata</title>
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="script.js" defer></script>
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
                    <?php if(!isset($_SESSION['status'])){ ?>
                        <li class="nav-item">
                            <a href="login.php" class="btn btn-primary">Daftar / Login</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a href="logout.php" class="btn btn-primary">Logout</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <!-- untuk home -->
        <section id="home" class="my-5">
            <div class="row">
                <div class="col-md-6">
                    <img src="img/diagnosa.avif" class="img-fluid rounded" alt="Sistem Pakar">
                </div>
                <div class="col-md-6 align-self-center">
                    <h1 class="font-weight-bold">Sistem Pakar Diagnosa Penyakit Mata</h1>
                    <p>Website ini menyediakan diagnosis gratis mengenai penyakit mata yang anda rasakan. Diagnosa dilakukan menggunakan teknologi sistem pakar dan sesuai dengan dokter. Mulailah melakukan diagnosa sesuai dengan gejala yang anda rasakan.</p>
                    <a href="diagnosa.php" class="btn btn-danger">Diagnosa Sekarang</a>
                </div>
            </div>
        </section>
    </div>

     <!-- Bootstrap core JavaScript-->
     <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>
</html>



