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
    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
        $query = "SELECT hasil_diagnosa.id_penyakit,hasil_diagnosa.tanggal, tbl_penyakit.nama_penyakit FROM hasil_diagnosa,tbl_penyakit WHERE hasil_diagnosa.id_penyakit=tbl_penyakit.id_penyakit AND hasil_diagnosa.id_pas=".$_SESSION['user_id']." ORDER BY id_hasil DESC ";
        $result = mysqli_query($koneksi, $query);

         while($p= mysqli_fetch_array($result)){
                $penyakit[]=$p;
        }

?>
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
                        
                        <div class="card-body">
                        <h1 class="text-center">Riwayat Diagnosa Anda</h1>
                        <div class="container my-4">
                            <div class="row">
                            <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Penyakit</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <?php if(isset($penyakit)){ ?>
                                        <?php
                                            $no = 0;
                                            foreach($penyakit as $data): ?>
                                        <?php $no++ ?>
                                        <tr>
                                            <td><?=$no?></td>
                                            <td><?= $data['nama_penyakit'] ?></td>
                                            <td><?= $data['tanggal'] ?></td>
                                            
                                        </tr>
                                        <?php endforeach ?>
                                                <?php }else{ ?>
                                                    <tr class="bg-white border-b">
                                                            <td colspan="4" class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Data tidak tersedia</td>
                                                        </tr>
                                                <?php } ?>
                                            </div>
                                            </div>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

        
	

                    <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
</html>

