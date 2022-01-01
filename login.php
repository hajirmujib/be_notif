<?php 
session_start();
 //Koneksi database 
 include 'config/koneksi.php';

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Revijaya Maintenance | Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body>
  <div class="wrapper">
     <!-- Preloader -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->
    <div class="container" style="margin-top: 10%;">
        <div class="d-flex justify-content-center align-items-center row">
          <div class="col-md-6">
            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Login</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="post">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck2">
                        <label class="form-check-label" for="exampleCheck2">Remember me</label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <input type="submit" href="view_admin" class="btn btn-info" name="login" value="Log In">
                 
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->
          </div>
      </div><!-- /.container-fluid -->
      </div>
  </div>
      
      <?php 
        if (isset($_POST['login']))                             
        {
          $password=md5($_POST['password']);
          $email=$_POST['email'];
          $ambil=mysqli_query($conn,"SELECT * FROM users WHERE email='$email' AND password='$password'");
          $yangcocok = $ambil->num_rows;

            if ($yangcocok==1)                          
            {
              $data=$ambil->fetch_assoc();

              $_SESSION['login']="login";
              $_SESSION['id_user']=$data['id_user'];
              if($data['level']=="Admin"){
                $_SESSION['level']="Admin";

              }else{
                $_SESSION['level']='Teknisi';
              }
              // echo "nama".$data_login['nama'];
             
              echo "<center><div class='alert alert-info col-md-3 d-flex justify-content-center align-items-center row'>Login Sukses</div></center>";
              echo "<meta http-equiv='refresh' content='1;url=index.php'>";
              // echo "<script>location='view_admin/index.php';</script>";
              // header('location:view_admin/');

            }else  
            {
              echo "<center><div class='alert alert-danger col-md-3 d-flex justify-content-center align-items-center row'>Login Gagal</div></center>";
              // echo "<meta http-equiv='refresh' content='1;url=login.php'>";
              // echo $yangcocok;

            }                           

            }

    ?>
      
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>