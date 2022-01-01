
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Akun</h1>
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
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Data Diri Karyawan/Admin</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Nama" required>
                  </div>
                  <div class="form-group">
                    <label for="inputStatus">Jenis Kelamin</label>
                    <select id="inputStatus" name="jk" class="form-control custom-select" required>    
                      <option value="Laki-Laki">Laki-Laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                  </div>

                 <div class="form-group">
                  <label for="inputClientCompany">No.Telp/Whatsapp</label>
                  <input type="text" name="no_telp" id="inputClientCompany" class="form-control" placeholder="No.Telp/Whatsapp" required>
                </div>
                <div class="form-group">
                  <label for="inputProjectLeader">Alamat</label>
                  <input type="text" name="alamat" id="inputProjectLeader" class="form-control" placeholder="Alamat" required>
                </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="email" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                  </div>
                   <div class="form-group">
                    <label for="inputStatus">Level</label>
                    <select id="inputStatus" name="level" class="form-control custom-select" required>    
                      <option>Admin</option>
                      <option>Teknisi</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Foto</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="foto" class="custom-file-input" id="image" required>
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      
                    </div>
                  </div>
                 <div class="col-sm-6" id="preview">
                      
                    </div>
                 
                  <input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
                 
                
                </div>
                <!-- /.card-body -->
              </form>

            </div>
            <!-- /.card -->

                  <div class="form-group">
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php 
   
 
  if(isset($_POST['simpan'])){

    $nama=$_POST['nama'];
    $jk=$_POST['jk'];
    $alamat=$_POST['alamat'];
    $notelp=$_POST['no_telp'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $level=$_POST['level'];

    $namafoto=explode(".", $_FILES["foto"]["name"]);
    $newNameUser=strtok($nama,' ');
    $newName=date('dmYHis').'_'.$newNameUser.'.'.end($namafoto);

    $lokasi = $_FILES ['foto']['tmp_name'];
    $move=move_uploaded_file($lokasi,"../foto/".$newName);

      $result=mysqli_query($conn,"INSERT INTO users VALUES(NULL,'$nama','$newName','$email','$password','$notelp','$alamat','$jk','$level')");

      if ($result) {
        echo "<script>alert('data tersimpan');window.location.href=''</script>";
      } else {
        echo mysqli_error($conn);
        echo "<script>alert('data tidak tersimpan');window.location.href=''></script>";
      }


   
  }
?>
