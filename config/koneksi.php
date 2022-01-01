<?php 
date_default_timezone_set('Asia/Jakarta');
$conn=mysqli_connect("localhost","root","","db_revijaya");
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

 ?>