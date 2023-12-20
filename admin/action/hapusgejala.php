<html>
    <script src="../js/sweetalert2.all.min.js"></script>
</html>
<?php
$id = $_GET['id_gejala'];

include '../koneksi.php';


$hapus = mysqli_query($koneksi, "DELETE FROM tbl_gejala WHERE id_gejala = '$id' ");
if($hapus){
    echo"<script>
    Swal.fire({
      icon: 'success',
      title: 'Berhasil Hapus Data',
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
      title: 'Gagal Hapus Data',
      showConfirmButton: false,
      timer: 1500
    }).then(function() {
      window.location.href = '../gejala.php';
    });
  </script>";
}
?>