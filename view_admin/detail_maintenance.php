<?php 
  $id = $_GET['id'];

  // Fetech user data based on id
  $result = $conn->query("SELECT * FROM maintenance WHERE id=$id");

  while ($user_data = mysqli_fetch_assoc($result)) {

    $instansi = $user_data['instansi'];
    $status = $user_data['status'];
    $jenis_pekerjaan=$user_data['jenis_pekerjaan'];
    $keluhan=$user_data['keluhan'];
    $keterangan=$user_data['keterangan'];
    $laporan_akhir=$user_data['laporan'];
    $lap_survey=$user_data['lap_survey'];
    $tgl_masuk=$user_data['tgl_masuk'];
    $surat_kerja=$user_data['surat_kerja'];
    $tgl_mulai=$user_data['tgl_mulai'];
    $tgl_selesai=$user_data['tgl_selesai'];
    $alat=$user_data['alat'];
    $id_pelanggan=$user_data['id_pelanggan'];
    $id_teknisi1=$user_data['id_teknisi1'];
    $id_teknisi2=$user_data['id_teknisi2'];
    $id_teknisi3=$user_data['id_teknisi3'];
    $id_teknisi4=$user_data['id_teknisi4'];
    $id_teknisi5=$user_data['id_teknisi5'];

  }
  $pelanggan=$conn->query("SELECT * FROM users WHERE id_user='$id_pelanggan'");
  $teknisi1=$conn->query("SELECT * FROM users WHERE id_user='$id_teknisi1'");
  $teknisi2=$conn->query("SELECT * FROM users WHERE id_user='$id_teknisi2'");
  $teknisi3=$conn->query("SELECT * FROM users WHERE id_user='$id_teknisi3'");
  $teknisi4=$conn->query("SELECT * FROM users WHERE id_user='$id_teknisi4'");
  $teknisi5=$conn->query("SELECT * FROM users WHERE id_user='$id_teknisi5'");

  $qt1=$teknisi1->fetch_assoc();
  $qt2=$teknisi2->fetch_assoc();
  $qt3=$teknisi3->fetch_assoc();
  $qt4=$teknisi4->fetch_assoc();
  $qt5=$teknisi5->fetch_assoc();

  $qDokumentasi=$conn->query("SELECT * FROM dokumentasi WHERE id_maintenance='$id'");
  $dokRow=$qDokumentasi->num_row
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Project Detail</h1>
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

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Projects Detail</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
          
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <h3 class="text"><i class="fas fa-sticky-note"></i> Data Maintenance</h3>
             
              <br>
              <div class="project-info-box text-mute">
                <p class="text-secondary d-block"><b>Instansi:</b> <?= $instansi ?></p>
                <p class="text-secondary d-block"><b>Status Pekerjaan:</b> <?= $status ?></p>
                <p class="text-secondary d-block"><b>Jenis Pekerjaan:</b> <?= $jenis_pekerjaan ?></p>
                <p class="text-secondary d-block"><b>Keluhan:</b> <?= $keluhan ?></p>
                <p class="text-secondary d-block"><b>Keterangan:</b> <?= $keterangan ?></p>
                <p class="text-secondary d-block"><b>Tanggal Masuk:</b> <?= $tgl_masuk ?></p>
                <p class="text-secondary d-block"><b>Laporan Survey:</b><a href="download.php?filename=<?= $lap_survey ?>" id="download" target="_blank"><?php
                    $name=substr($lap_survey,22);
                    echo $name;
                    ?></a></p>
                <p class="text-secondary d-block"><b>Surat Kerja:</b> <?php if($surat_kerja=="") {?>
                  <form method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="file1" class="custom-file-input" id="inputGroupFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <input type="submit" name="upload1" class="input-group-text" value="Upload">
                      </div>
                    </div>
                  </div>
                  
                  <?php }else{ ?>
                    <a href="download.php?filename=<?= $surat_kerja ?>" id="download" target="_blank"><?php
                    $name=substr($surat_kerja,22);
                    echo $name;
                    ?></a>
                    <a href="delete_survey.php?id=<?= $id ?>" ><i class="fas fa-trash-alt btn-danger"></i></a>
                 <?php }
                    ?>
                </form></p>
                <p class="text-secondary d-block"><b>Tanggal Pengerjaan:</b> <?= $tgl_mulai?></p>
                <p class="text-secondary d-block"><b>Tanggal Selesai:</b> <?= $tgl_selesai ?></p>
                <p class="text-secondary d-block"><b>Alat:</b> <?= $alat ?></p>
                
                
            </div>
          </div>
          <!-- end data maintenance -->

           <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <h3 class="text"><i class="fas fa-user"></i> Data Pelanggan</h3>
             
              <br>
              <?php while ($row=mysqli_fetch_array($pelanggan)) {?>
              
              <div class="project-info-box text-mute">
                <p class="text-secondary d-block"><b>Nama:</b> <?= $row['nama'] ?></p>
                <p class="text-secondary d-block"><b>Alamat:</b> <?= $row['alamat'] ?></p>
                <p class="text-secondary d-block"><b>Jenis Kelamin:</b> <?= $row['jk'] ?></p>
                <p class="text-secondary d-block"><b>Kontak:</b><?= $row['no_telp'] ?></p>
                
            </div>
          <?php } ?>
          </div>
          <!-- end data user -->
           <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <h3 class="text"><i class="fas fa-sticky-note"></i> Data Teknisi</h3>
             
              <br>
              <div class="project-info-box text-mute">
                <p class="text-secondary d-block"><b>Teknisi 1:</b> <?= $qt1['nama'] ?></p>
                <p class="text-secondary d-block"><b>Teknisi 2:</b> <?= $qt2['nama'] ?></p>
                <p class="text-secondary d-block"><b>Teknisi 3:</b> <?= $qt3['nama'] ?></p>
                <p class="text-secondary d-block"><b>Teknisi 4:</b> <?= $qt4['nama'] ?></p>
                <p class="text-secondary d-block"><b>Teknisi 5:</b> <?= $qt5['nama'] ?></p>
                
            </div>
          </div>
          <!-- end data teknisi -->
          <div class="col-12 col-md-12 col-lg-12 order-1 order-md-2">
           <h3 class="text"><i class="fas fa-image"></i> Dokumentasi</h3>
              <div class="row mb-12">
               <?php
               while ($row=mysqli_fetch_array($qDokumentasi)) { ?>
              
            <div class="col-sm-4">
                <div class="card" style="width: 18rem;">
                  <a href="#" class="pop">
                  <img class="card-img-top" src="../foto/<?= $row['foto'] ?>" alt="Card image cap">
                </a>
                  <div class="card-body">
                    <p class="card-text"><?= $row['keterangan'] ?></p>
                  </div>
                  
                </div>
              </div>
            <?php }?>
              </div>
            </div>
            <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
              <div class="modal-dialog" data-dismiss="modal">
                <div class="modal-content"  >              
                  <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <img src="" class="imagepreview" style="width: 100%;" >
                  </div> 

                </div>
              </div>
            </div>
            
                        <!-- /.col -->
          </div>
                      <!-- /.row -->
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php 

  if(isset($_POST['upload1'])){

    $namafoto=explode(".", $_FILES["file1"]["name"]);
    $newNameUser=strtok($instansi,' ');
    $newName=date('D-M-Y H:i:s').'_'.'surat_kerja'.'_'.$newNameUser.''.end($namafoto);

    $lokasi = $_FILES ['file1']['tmp_name'];
    $move=move_uploaded_file($lokasi,"../laporan/".$newName);


    $result=mysqli_query($conn,"UPDATE maintenance SET surat_kerja='$newName' WHERE id='$id'");

    if ($result) {
      echo "<script>alert('data tersimpan');window.location.href=''</script>";
    } else {
      echo mysqli_error($conn);
      echo "<script>alert('data tidak tersimpan');window.location.href=''></script>";
    }

  }
 ?>
