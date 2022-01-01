<?php 
// session_start();
// include 'config/koneksi.php';

// if($_SESSION['login']=="login"){
// 	if($_SESSION['level']=="Admin"){
// 		header("location:view_admin/");
// 	}else{
// 		header("location:view_teknisi/")

// 	}
// }else{
// 	header('location:login.php');
// }	
 
 session_start();
 include 'config/koneksi.php';

 if($_SESSION['login']=='login'){
 	if($_SESSION['level']=='Admin'){
 		// header('location:view_admin/');
        echo "<meta http-equiv='refresh' content='1;url=view_admin/'>";

 	}else if($_SESSION['level']==='Teknisi'){
 		// header('location:view_teknisi/');
        echo "<meta http-equiv='refresh' content='1;url=view_teknisi/'>";

 	}else{
 		echo "level:".$_SESSION['level'];
 	}
 }else{
 	header('location:login.php');
 }
?>
