<?php
include '../config/koneksi.php';
$id=$_GET['id'];
$idM=$_GET['id_m'];

$qDelete=$conn->query("DELETE FROM dokumentasi WHERE id='$id'");

 if ($qDelete) {
        echo "<script>alert('data Terhapus');window.location.href='index.php?module=detail_maintenance&id=$idM'</script>";
      } else {
        echo mysqli_error($conn);
        echo "<script>alert('data tidak Terhapus');window.location.href='index.php?module=detail_maintenance&id=$idM'></script>";
      }
?>