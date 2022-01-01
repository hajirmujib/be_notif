<?php 
$result = $conn->query("SELECT * FROM users WHERE level='Customer' ORDER BY id_user DESC");

 ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Pelanggan</h1>
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

              <div class="col-md-2" style="margin-bottom: 12px;">
              <a type="button" href="index.php?module=add_pelanggan" class="btn btn-block btn-primary">Tambah Data  <i class="nav-icon fas fa-plus"></i></a> 
              </div>

            <div class="card">
             
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Kontak</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php  
                  $no=1;
                  while($user_data = mysqli_fetch_array($result)) { ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $user_data['nama'] ;?></td>
                    <td><?= $user_data['alamat'] ;?>
                    </td>
                    <td><?= $user_data['jk'] ;?></td>
                     <td><?= $user_data['no_telp']; ?></td>
                    <td><a href="index.php?module=edit_pelanggan&id_user=<?= $user_data['id_user'] ?>"><i class="fa fa-edit"></i></a></td>
                  </tr>
                <?php } ?>
                  </tbody>
                 
                </table>
              </div>
              <!-- /.card-body -->
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