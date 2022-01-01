<?php 
  $id = $_GET['id'];
$result=$conn->query("SELECT * FROM users WHERE level='Customer'");
$teknisiList=$conn->query("SELECT * FROM users WHERE level='Teknisi'");
$teknisiList2=$conn->query("SELECT * FROM users WHERE level='Teknisi'");
$teknisiList3=$conn->query("SELECT * FROM users WHERE level='Teknisi'");
$teknisiList4=$conn->query("SELECT * FROM users WHERE level='Teknisi'");
$teknisiList5=$conn->query("SELECT * FROM users WHERE level='Teknisi'");
  // Fetech user data based on id
  $query = $conn->query("SELECT * FROM maintenance WHERE id=$id");

  while ($maintenance = mysqli_fetch_assoc($query)) {

    $id_pelanggan = $maintenance['id_pelanggan'];
    $jenis_pekerjaan = $maintenance['jenis_pekerjaan'];
    $keluhan=$maintenance['keluhan'];
    $keterangan=$maintenance['keterangan'];
    $alat=$maintenance['alat'];
    $instansi=$maintenance['instansi'];
    $id_teknisi1=$maintenance['id_teknisi1'];
    $id_teknisi2=$maintenance['id_teknisi2'];
    $id_teknisi3=$maintenance['id_teknisi3'];
    $id_teknisi4=$maintenance['id_teknisi4'];
    $id_teknisi5=$maintenance['id_teknisi5'];
  }

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Data Maintenance</h1>
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
              <h3 class="card-title">Data Maintenance</h3>
            </div>
            <form method="post" action="">
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Pelanggan</label>
               <select class="select2 form-control" multiple="multiple" data-placeholder="Pelanggan" name="pelanggan" required>
                  <?php 
                    while ($row=mysqli_fetch_array($result)) {?>
                    <option value="<?= $row['id_user'] ?>" <?php if($id_pelanggan==$row['id_user']){echo "selected";} ?>><?= $row['nama']; ?></option>
                  <?php }
                  ?>  
                </select>
              </div>
              <div class="form-group">
                <label for="inputName">Instansi</label>
                <input type="text" id="search_pelanggan" class="form-control" value="<?= $instansi ?>" name="instansi" required>
              </div>
               <div class="form-group">
                <label for="inputStatus">Jenis Pekerjaan</label>
                <select id="inputStatus" class="form-control custom-select" name="jenis" required>  
                  <option disabled>Jenis</option>
                  <option value="Pemasangan Baru"<?php if($jenis_pekerjaan=="Pemasangan Baru"){echo "selected";} ?>>Pemasangan Baru</option>
                  <option value="Perbaikan" <?php if($jenis_pekerjaan=="Perbaikan"){echo "selected";} ?>>Perbaikan</option>
                </select>
              </div>
           
              <div class="form-group">
                <label for="inputDescription">Keluhan</label>
                <textarea id="inputDescription" class="form-control" rows="4" name="keluhan" required> <?= $keluhan ?></textarea>
              </div>
              <div class="form-group">
                <label for="inputDescription">Keterangan</label>
                <textarea id="inputDescription" class="form-control" rows="4" name="keterangan" required><?= $keterangan ?></textarea>

              </div>
              <div class="form-group">
                <label for="inputDescription">Alat</label>
                <textarea id="inputDescription" class="form-control" rows="4" name="alat" required><?= $alat ?></textarea>

              </div>
            
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
          <!-- /.col -->
           <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Data Teknisi</h3>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Teknisi 1</label>
                <select class="select2 form-control" multiple="multiple" size="1" data-placeholder="Teknisi 1" name="teknisi1" required>   
                  <?php 

                  while ($row=mysqli_fetch_array($teknisiList)) {?>
                  <option value="<?= $row['id_user'] ?>" <?php if($id_teknisi1==$row['id_user']){echo "selected";} ?>><?= $row['nama']; ?></option>
                  
                  <?php }
                  ?>  
                </select>
              </div>
               <div class="form-group">
                <label for="inputName">Teknisi 2</label>
                <select class="select2 form-control" multiple="multiple" size="1" data-placeholder="Teknisi 2" name="teknisi2">   
                  <?php 
                  while ($row=mysqli_fetch_array($teknisiList2)) {?>
                  <option value="<?= $row['id_user'] ?>" <?php if($id_teknisi2==$row['id_user']){echo "selected";} ?>><?= $row['nama']; ?></option>             
                  <?php }
                  ?>  
                </select>
              </div>
               <div class="form-group">
                <label for="inputName">Teknisi 3</label>
                <select class="select2 form-control" multiple="multiple" size="1" data-placeholder="Teknisi 3" name="teknisi3">   
                  <?php 

                  while ($row=mysqli_fetch_array($teknisiList3)) {?>
                  <option value="<?= $row['id_user'] ?>" <?php if($id_teknisi3==$row['id_user']){echo "selected";} ?>><?= $row['nama']; ?></option>
                  
                  <?php }
                  ?>  
                </select>
              </div>
               <div class="form-group">
                <label for="inputName">Teknisi 4</label>
                <select class="select2 form-control" multiple="single" size="1" data-placeholder="Teknisi 4" name="teknisi4">   
                  
                  <?php 

                  while ($row=mysqli_fetch_array($teknisiList4)) {?>
                  <option value="<?= $row['id_user'] ?>" <?php if($id_teknisi4==$row['id_user']){echo "selected";} ?>><?= $row['nama']; ?></option>
                  
                  <?php }
                  ?>  
                </select>
              </div>
               <div class="form-group">
                <label for="inputName">Teknisi 5</label>
                <select class="select2 form-control" multiple="single" size="1" data-placeholder="Teknisi 5" name="teknisi5">   
                  
                  <?php 

                  while ($row=mysqli_fetch_array($teknisiList5)) {?>
                  <option value="<?= $row['id_user'] ?>" <?php if($id_teknisi5==$row['id_user']){echo "selected";} ?>><?= $row['nama']; ?></option>
                  
                  <?php }
                  ?>  
                </select>
              </div>
              <input type="submit" class="btn btn-primary" value="Edit" name="edit">
            
            </div>
            <!-- /.card-body -->
          </from>
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
   $id = $_GET['id'];
  if(isset($_POST['edit'])){

    $pelanggan=$_POST['pelanggan'];
    $instansi=$_POST['instansi'];
    $jenis=$_POST['jenis'];
    $keluhan=$_POST['keluhan'];
    $keterangan=$_POST['keterangan'];
    $alat=$_POST['alat'];
    $teknisi1=$_POST['teknisi1'];
    $teknisi2=$_POST['teknisi2']==null?0:$_POST['teknisi2'];
    $teknisi3=$_POST['teknisi3']==null?0:$_POST['teknisi3'];
    $teknisi4=$_POST['teknisi4']==null?0:$_POST['teknisi4'];
    $teknisi5=$_POST['teknisi5']==null?0:$_POST['teknisi5'];
    $date = date_create()->format('Y-m-d H:i:s');

      $result=mysqli_query($conn,"UPDATE maintenance SET id_pelanggan='$pelanggan',jenis_pekerjaan='$jenis',keluhan='$keluhan',keterangan='$keterangan',id_teknisi1='$teknisi1',id_teknisi2='$teknisi2',id_teknisi3='$teknisi3',id_teknisi4='$teknisi4',id_teknisi5='$teknisi5',instansi='$instansi',status='Baru',alat='$alat' WHERE id='$id'");

      if ($result) {
        echo "<script>alert('data tersimpan');window.location.href=''</script>";
      } else {
        echo mysqli_error($conn);
        echo "<script>alert('data tidak tersimpan');window.location.href=''></script>";
      }


   
  }
?>