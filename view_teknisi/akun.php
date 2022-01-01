  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
        <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
   <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img style="width: 128px;height: 128px;object-fit: cover;" class="profile-user-img img-fluid img-circle"
                       src="../foto/<?= $dataUser['foto'] ?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?= $dataUser['nama'] ?></h3>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Alamat</b> <a class="float-right"><?= $dataUser['alamat'] ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>No.Telp</b> <a class="float-right"><?= $dataUser['no_telp'] ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Jenis Kelamin</b> <a class="float-right"><?= $dataUser['jk'] ?></a>
                  </li>
                   <li class="list-group-item">
                    <b>Email</b> <a class="float-right"><?= $dataUser['email'] ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Level</b> <a class="float-right"><?= $dataUser['level'] ?></a>
                  </li>
                </ul>

                <a href="index.php?module=edit_akun&id_user=<?= $dataUser['id_user'] ?>" class="btn btn-primary btn-block"><b>Edit</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>