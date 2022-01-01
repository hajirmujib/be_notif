<?php 
include '../config/koneksi.php';

$id_login=$_SESSION['id_user'];

$mBaru=$conn->query("SELECT count(id) AS jumlah FROM maintenance WHERE status='Baru' AND (id_teknisi1='$id_login' OR id_teknisi2='$id_login' OR id_teknisi3='$id_login' OR id_teknisi4='$id_login' OR id_teknisi5='$id_login') ");
$qMBaru=$mBaru->fetch_assoc();

$mProses=$conn->query("SELECT count(id) AS jumlah FROM maintenance WHERE status='Proses' AND (id_teknisi1='$id_login' OR id_teknisi2='$id_login' OR id_teknisi3='$id_login' OR id_teknisi4='$id_login' OR id_teknisi5='$id_login')");
$qProses=$mProses->fetch_assoc();

$mSelesai=$conn->query("SELECT count(id) AS jumlah FROM maintenance WHERE status='Selesai' AND (id_teknisi1='$id_login' OR id_teknisi2='$id_login' OR id_teknisi3='$id_login' OR id_teknisi4='$id_login' OR id_teknisi5='$id_login')");
$qSelesai=$mSelesai->fetch_assoc();

 ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?= $_GET['module'] ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $qMBaru['jumlah'] ?></h3>

                <p>Maintenance Baru</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $qProses['jumlah'] ?></h3>

                <p>Maintenance Proses</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?= $qSelesai['jumlah'] ?></h3>

                <p>Maintenance Selesai</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
         
        </div>
        <!-- /.row -->
       
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->