<html>
    <script src="../js/sweetalert2.all.min.js"></script>
</html>
<?php

$id = $_GET['id'];

include("../koneksi.php");

$hapus = mysqli_query($koneksi, "DELETE FROM tbl_aturan WHERE id = '$id'");

if($hapus){
    echo "<script>
    Swal.fire({
      icon: 'success',
      title: 'Berhasil Hapus Data',
      showConfirmButton: false,
      timer: 1500
    }).then(function() {
      window.location.href = '../aturan.php';
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
      window.location.href = '../aturan.php';
    });
  </script>";
}

?>