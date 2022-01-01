<?php 
include '../config/koneksi.php';

session_start();
$id_login=$_SESSION['id_user'];

$mBaru=$conn->query("SELECT count(id) AS jumlah FROM maintenance WHERE status='Baru' AND (id_teknisi1='$id_login' OR id_teknisi2='$id_login' OR id_teknisi3='$id_login' OR id_teknisi4='$id_login' OR id_teknisi5='$id_login') ");
$qMBaru=$mBaru->fetch_assoc();

$mProses=$conn->query("SELECT count(id) AS jumlah FROM maintenance WHERE status='Proses' AND (id_teknisi1='$id_login' OR id_teknisi2='$id_login' OR id_teknisi3='$id_login' OR id_teknisi4='$id_login' OR id_teknisi5='$id_login')");
$qProses=$mProses->fetch_assoc();


$data = [
	"maintenance" 	=> intVal($qMBaru["jumlah"])+intval($qProses["jumlah"]),
];

echo json_encode($data);


 ?>