<?php 
  $id = $_GET['id'];

  // Fetech user data based on id
  $query = $conn->query("SELECT * FROM maintenance WHERE id=$id");

  while ($maintenance = mysqli_fetch_assoc($query)) {

    $status = $maintenance['status'];
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
                <label for="inputStatus">Status Pekerjaan</label>
                <select id="inputStatus" class="form-control custom-select" name="status" required>  
                  <option disabled>Status Pekerjaan</option>
                  <option value="Baru"<?php if($status=="Baru"){echo "selected";} ?>>Baru</option>
                  <option value="Proses" <?php if($status=="Proses"){echo "selected";} ?>>Proses</option>
                  <option value="Selesai" <?php if($status=="Selesai"){echo "selected";} ?>>Selesai</option>

                </select>
              </div>
              <input type="submit" class="btn btn-primary" value="Edit" name="edit">
              
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

            
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

    $status=$_POST['status'];
    $date = date_create()->format('Y-m-d H:i:s');

    if($status=="Proses"){
      $result=mysqli_query($conn,"UPDATE maintenance SET status='$status',tgl_mulai='$date' WHERE id='$id'");

    }else if($status=="Selesai"){
      $result=mysqli_query($conn,"UPDATE maintenance SET status='$status',tgl_selesai='$date' WHERE id='$id'");

    }else{
      $result=mysqli_query($conn,"UPDATE maintenance SET status='$status',tgl_mulai='0000-00-00 00:00:00.00',tgl_selesai='0000-00-00 00:00:00' WHERE id='$id'");

    }


      if ($result) {
        echo "<script>alert('data tersimpan');window.location.href=''</script>";
      } else {
        echo mysqli_error($conn);
        echo "<script>alert('data tidak tersimpan');window.location.href=''></script>";
      }


   
  }
?>