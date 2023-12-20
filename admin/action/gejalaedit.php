<html>
    <script src="../js/sweetalert2.all.min.js"></script>
</html>
<?php

include '../koneksi.php';

if(isset($_POST['ubah'])){
    $id = $_POST['id_gejala'];
    $nama_gejala = $_POST['nama_gejala'];

$rubah = mysqli_query($koneksi, "UPDATE tbl_gejala SET 
                                                        nama_gejala = '$nama_gejala'
                                                        WHERE id_gejala ='$id'");
if($rubah){
    echo "<script>
    Swal.fire({
      icon: 'success',
      title: 'Berhasil Edit Data',
      showConfirmButton: false,
      timer: 1500
    }).then(function() {
      window.location.href = '../gejala.php';
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
      window.location.href = '../gejala.php';
    });
  </script>";
}
}
?>