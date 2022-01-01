
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Data Pelanggan</h1>
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
              <h3 class="card-title">General</h3>

              <div class="card-tools">
               
              </div>
            </div>
              <!-- form start -->
              <form method="POST" action="">
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Nama Lengkap</label>
                <input type="text" name="nama" id="inputName" class="form-control">
              </div>
               <div class="form-group">
                <label for="inputStatus">Jenis Kelamin</label>
                <select id="inputStatus" name="jk" class="form-control custom-select">    
                  <option value="Laki-Laki">Laki-Laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>

              <div class="form-group">
                <label for="inputClientCompany">No.Telp/Whatsapp</label>
                <input type="text" name="no_telp" id="inputClientCompany" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputProjectLeader">Alamat</label>
                <input name="alamat" type="text" id="inputProjectLeader" class="form-control">
              </div>
               <input type="submit" class="btn btn-primary" value="Simpan" name="simpan">
            
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
  if(isset($_POST['simpan'])){

    $nama=$_POST['nama'];
    $jk=$_POST['jk'];
    $alamat=$_POST['alamat'];
    $notelp=$_POST['no_telp'];

      $result=mysqli_query($conn,"INSERT INTO users VALUES(NULL,'$nama','','','','$notelp','$alamat','$jk','Customer')");

      if ($result) {
        echo "<script>alert('data tersimpan');window.location.href=''</script>";
      } else {
        echo mysqli_error($conn);
        echo "<script>alert('data tidak tersimpan');window.location.href=''></script>";
      }


   
  }
?>