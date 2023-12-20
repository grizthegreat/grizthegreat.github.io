<html>
    <script src="../js/sweetalert2.all.min.js"></script>
</html>
<?php

include '../koneksi.php';

if(isset($_POST['ubah'])){
    $id = $_POST['id_penyakit'];
    $nama_penyakit = $_POST['nama_penyakit'];
    $solusi = $_POST['solusi'];

$rubah = mysqli_query($koneksi, "UPDATE tbl_penyakit SET 
                                                        nama_penyakit = '$nama_penyakit',
                                                        solusi = '$solusi'
                                                        WHERE id_penyakit ='$id'");
if($rubah){
    echo "<script>
    Swal.fire({
      icon: 'success',
      title: 'Berhasil Edit Data',
      showConfirmButton: false,
      timer: 1500
    }).then(function() {
      window.location.href = '../penyakit.php';
    });
  </script>";

}else {
    echo"<script>
    Swal.fire({
      icon: 'error',
      title: 'Gagal Edit Data',
      showConfirmButton: false,
      timer: 1500
    }).then(function() {
      window.location.href = '../penyakit.php';
    });
  </script>";
}
}
?>