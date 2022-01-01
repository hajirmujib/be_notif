<?php 
  $id_user = $_GET['id_user'];

  // Fetech user data based on id
  $result = $conn->query("SELECT * FROM users wHERE id_user=$id_user");

  while ($user_data = mysqli_fetch_assoc($result)) {

    $nama = $user_data['nama'];
    $jk = $user_data['jk'];
    $email=$user_data['email'];
    $notelp=$user_data['no_telp'];
    $foto=$user_data['foto'];
    $level=$user_data['level'];
    $alamat=$user_data['alamat'];
  }

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Akun</h1>
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
                    <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Nama" value="<?= $nama ?>">
                  </div>
                  <div class="form-group">
                    <label for="inputStatus">Jenis Kelamin</label>
                    <select id="inputStatus" name="jk" class="form-control custom-select">    
                      <option value="Laki-Laki" <?php if($jk=="Laki-Laki"){echo "selected";} ?>>Laki-Laki</option>
                      <option value="Perempuan"  <?php if($jk=="Perempuan"){echo "selected";} ?>>Perempuan</option>
                    </select>
                  </div>

                 <div class="form-group">
                  <label for="inputClientCompany">No.Telp/Whatsapp</label>
                  <input type="text" id="inputClientCompany" name="no_telp" class="form-control" placeholder="No.Telp/Whatsapp" value="<?= $notelp ?>">
                </div>
                <div class="form-group">
                  <label for="inputProjectLeader">Alamat</label>
                  <input type="text" name="alamat" id="inputProjectLeader" class="form-control" placeholder="Alamat" value="<?= $alamat ?>">
                </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="email" value="<?= $email ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Foto</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="foto" class="custom-file-input" id="image">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>
                     <div class="col-sm-6" id="preview">
                      <img class="img-fluid mb-3" src="../foto/<?= $foto ?>"  alt="Photo">
                    </div>
                    <!-- /.col -->
                  
                  <input type="submit" class="btn btn-primary" name="edit" value="Edit">
                 
                
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
  $id_user = $_GET['id_user'];

  if(isset($_POST['edit'])){
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $email=$_POST['email'];
    $notelp=$_POST['no_telp'];
    $foto=$_FILES['foto'];
    $level=$_POST['level'];
    $alamat=$_POST['alamat'];
    $password=md5($_POST['password']);

    //cek password
    $cekPW=$conn->query("SELECT * FROM users WHERE id_user='$id_user' AND password='$password'");
    if(mysqli_affected_rows($conn)>0){
      //update tanpa pw;
      //cek foto
      if($_FILES["foto"]["error"] == 0){
        //update tanpa pw & update dengan foto baru
        $namafoto=explode(".", $_FILES["foto"]["name"]);
        $newNameUser=strtok($nama,' ');
        $newName=date('dmYHis').'_'.$newNameUser.'.'.end($namafoto);

        $lokasi = $_FILES ['foto']['tmp_name'];
        $move=move_uploaded_file($lokasi,"../foto/".$newName);
        $qUpdate=$conn->query("UPDATE users SET nama='$nama',foto='$newName',email='$email',no_telp='$notelp',alamat='$alamat',jk='$jk',level='$level' WHERE id_user='$id_user'");

      }else{
        //update tanpa pw dan tanpa foto baru
        $qUpdate=$conn->query("UPDATE users SET nama='$nama',email='$email',no_telp='$notelp',alamat='$alamat',jk='$jk',level='$level' WHERE id_user='$id_user'");
      }
    }else{
      //update pw
       //cek foto
      if($_FILES["foto"]["error"] == 0){
        //update pw & update dengan foto baru
        $namafoto=explode(".", $_FILES["foto"]["name"]);
        $newNameUser=strtok($nama,' ');
        $newName=date('dmYHis').'_'.$newNameUser.'.'.end($namafoto);

        $lokasi = $_FILES ['foto']['tmp_name'];
        $move=move_uploaded_file($lokasi,"../foto/".$newName);
        $qUpdate=$conn->query("UPDATE users SET nama='$nama',foto='$newName',email='$email',password='$password',no_telp='$notelp',alamat='$alamat',jk='$jk',level='$level' WHERE id_user='$id_user'");

      }else{
        //update pw dan tanpa foto baru
        $qUpdate=$conn->query("UPDATE users SET nama='$nama',email='$email',password='$password',no_telp='$notelp',alamat='$alamat',jk='$jk',level='$level' WHERE id_user='$id_user'");
      }
    }

    if ($qUpdate) {
        echo "<script>alert('data tersimpan');window.location.href=''</script>";
      } else {
        echo mysqli_error($conn);
        echo "<script>alert('data tidak tersimpan');window.location.href=''></script>";
      }
  }
 ?>