<?php 
include '../config/koneksi.php';
$id=$_GET['id'];

 $result=mysqli_query($conn,"UPDATE maintenance SET laporan='' WHERE id='$id'");

    if ($result) {
      echo "<script>alert('data Terhapus');window.location.href='index.php?module=detail_maintenance&id=$id'</script>";
      } else {
        echo mysqli_error($conn);
        echo "<script>alert('data tidak Terhapus');window.location.href='index.php?module=detail_maintenance&id=$id'></script>";
      }

 ?>