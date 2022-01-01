<?php 
  $id_user = $_GET['id_user'];

  // Fetech user data based on id
  $result = $conn->query("SELECT * FROM users wHERE id_user=$id_user");

  while ($user_data = mysqli_fetch_assoc($result)) {

    $nama = $user_data['nama'];
    $jk = $user_data['jk'];
    $notelp=$user_data['no_telp'];
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
            <h1>Edit Data Pelanggan</h1>
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
          <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Data Pelanggan</h3>

              <div class="card-tools">
               
              </div>
            </div>
             <form method="POST" action="">
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Nama Lengkap</label>
                <input type="text" name="nama" id="inputName" class="form-control" value="<?= $nama ?>">
              </div>
               <div class="form-group">
                <label for="inputStatus">Jenis Kelamin</label>
                <select id="inputStatus" class="form-control custom-select" name="jk">    
                   <option value="Laki-Laki" <?php if($jk=="Laki-Laki"){echo "selected";} ?>>Laki-Laki</option>
                  <option value="Perempuan"  <?php if($jk=="Perempuan"){echo "selected";} ?>>Perempuan</option>
                </select>
              </div>

              <div class="form-group">
                <label for="inputClientCompany">No.Telp/Whatsapp</label>
                <input type="text" id="inputClientCompany" class="form-control" name="no_telp" value="<?= $notelp ?>">
              </div>
              <div class="form-group">
                <label for="inputProjectLeader">Alamat</label>
                <input type="text" id="inputProjectLeader" class="form-control" name="alamat" value="<?= $alamat ?>">
              </div>
               <input type="submit" class="btn btn-primary" name="edit" value="Edit">
            
            </div>
            <!-- /.card-body -->
          </form>
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
    <?php 
  $id_user = $_GET['id_user'];

  if(isset($_POST['edit'])){
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $notelp=$_POST['no_telp'];
    $alamat=$_POST['alamat'];

    $qUpdate=$conn->query("UPDATE users SET nama='$nama',no_telp='$notelp',alamat='$alamat',jk='$jk' WHERE id_user='$id_user'");

    if ($qUpdate) {
        echo "<script>alert('data tersimpan');window.location.href=''</script>";
      } else {
        echo mysqli_error($conn);
        echo "<script>alert('data tidak tersimpan');window.location.href=''></script>";
      }
  }
 ?>