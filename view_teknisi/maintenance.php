<?php 

$id_login=$_SESSION['id_user'];
$resultBaru = $conn->query("SELECT * FROM maintenance WHERE status='Baru' AND (id_teknisi1='$id_login' OR id_teknisi2='$id_login' OR id_teknisi3='$id_login' OR id_teknisi4='$id_login' OR id_teknisi5='$id_login') ORDER BY id DESC");
$resultProses = $conn->query("SELECT * FROM maintenance WHERE status='Proses' AND (id_teknisi1='$id_login' OR id_teknisi2='$id_login' OR id_teknisi3='$id_login' OR id_teknisi4='$id_login' OR id_teknisi5='$id_login') ORDER BY id DESC");
$resultSelesai = $conn->query("SELECT * FROM maintenance WHERE status='Selesai' AND (id_teknisi1='$id_login' OR id_teknisi2='$id_login' OR id_teknisi3='$id_login' OR id_teknisi4='$id_login' OR id_teknisi5='$id_login') ORDER BY id DESC");

 ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Maintenance</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?= $_GET['module'] ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            <div class="card">
            <div class="card-tools" style="margin-top:10px;margin-left: 10px;">
              <ul class="nav nav-pills ml-auto">
                <li class="nav-item">
                  <a class="nav-link active" href="#baru" data-toggle="tab">Baru</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#proses" data-toggle="tab">Proses</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#selesai" data-toggle="tab">Selesai</a>
                </li>
              </ul>
            </div>
              <!-- /.card-header -->
               <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="baru">
                     <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Instansi</th>
                    <th>Keluhan</th>
                    <th>Tgl Masuk</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                     <?php  
                  $no=1;
                  while($maintenance = mysqli_fetch_array($resultBaru)) { ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $maintenance['instansi'] ?></td>
                    <td><?= $maintenance['keluhan']; ?>
                    </td>
                    <td><?= $maintenance['tgl_masuk'] ?></td>
                    <td><?= $maintenance['status'] ?></td>
                    <td class="project-actions text-center"> <a class="btn btn-primary btn-sm" href="index.php?module=detail_maintenance&id=<?= $maintenance['id'] ?>">
                          <i class="fas fa-folder"></i>View
                          </a>
                          <a class="btn btn-info btn-sm" href="index.php?module=edit_maintenance&id=<?= $maintenance['id'] ?>"><i class="fas fa-pencil-alt"></i>Edit</a>
                         </td>
                  </tr>
                   <?php } ?>
                 
                  </tbody>
                 
                </table>
                   </div>
                  <div class="chart tab-pane" id="proses">
                    <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Instansi</th>
                    <th>Keluhan</th>
                    <th>Tgl Masuk</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                     <?php  
                  $no=1;
                  while($maintenance = mysqli_fetch_array($resultProses)) { ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $maintenance['instansi'] ?></td>
                    <td><?= $maintenance['keluhan']; ?>
                    </td>
                    <td><?= $maintenance['tgl_masuk'] ?></td>
                    <td><?= $maintenance['status'] ?></td>
                    <td class="project-actions text-center"> <a class="btn btn-primary btn-sm" href="index.php?module=detail_maintenance&id=<?= $maintenance['id'] ?>">
                          <i class="fas fa-folder"></i>View
                          </a>
                          <a class="btn btn-info btn-sm" href="index.php?module=edit_maintenance&id=<?= $maintenance['id'] ?>"><i class="fas fa-pencil-alt"></i>Edit</a>
                         </td>
                  </tr>
                   <?php } ?>
                 
                  </tbody>
                 
                  </table>
                  </div>

                  <div class="chart tab-pane" id="selesai">
                     <table id="example3" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Instansi</th>
                    <th>Keluhan</th>
                    <th>Tgl Masuk</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                     <?php  
                  $no=1;
                  while($maintenance = mysqli_fetch_array($resultSelesai)) { ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $maintenance['instansi'] ?></td>
                    <td><?= $maintenance['keluhan']; ?>
                    </td>
                    <td><?= $maintenance['tgl_masuk'] ?></td>
                    <td><?= $maintenance['status'] ?></td>
                    <td class="project-actions text-center"> <a class="btn btn-primary btn-sm" href="index.php?module=detail_maintenance&id=<?= $maintenance['id'] ?>">
                          <i class="fas fa-folder"></i>View
                          </a>
                          <a class="btn btn-info btn-sm" href="index.php?module=edit_maintenance&id=<?= $maintenance['id'] ?>"><i class="fas fa-pencil-alt"></i>Edit</a>
                           <a class="btn btn-info btn-sm" target="_blank" href="../cetak.php?id=<?= $maintenance['id'] ?>"><i class="fas fa-print"></i>cetak</a>
                         </td>
                  </tr>
                   <?php } ?>
                 
                  </tbody>
                 
                </table>
                  </div>
                </div>
              </div><!-- /.card-body -->
               
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->