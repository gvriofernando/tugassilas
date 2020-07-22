<?php
  if (isset($_GET['id']) ) { 
    $id = (int) $_GET['id']; 
    if (isset($_POST['submitted'])) { 
      foreach($_POST AS $key => $value) { $_POST[$key] = mysqli_real_escape_string($con,$value); }
        $sql = "UPDATE agenda set     judul       ='{$_POST['judul']}', 
                                      deskripsi   ='{$_POST['deskripsi']}'
                              WHERE   id          ='$id'";
        $hasilkueri = mysqli_query($con,$sql) or die(mysqli_error($con)); 
        if($hasilkueri==1) {
          echo '  <div class="widget-content">
                <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <i class="fa fa-ok-sign"></i><strong>Sukses!</strong> 
                  Data Agenda Diupdate.
                </div>
                        </div>';
        } else {
          echo '  <div class="widget-content">
                <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <i class="fa fa-ban-circle"></i><strong>Terjadi Kesalahan!</strong> 
                  Maaf Data Agenda gagal diupdate.
                </div>
                        </div>';
        }
      echo '<meta http-equiv="refresh" content="2;url=index.php?mod=agenda">'; 
      buatngosonginhalamanbawah();
    }
  $row = mysqli_fetch_array (mysqli_query($con,"SELECT * FROM agenda WHERE id = '$id' ")); 
?>

<?php
    if (isset($_POST['submitted2'])) {
      $nama=$_FILES['gambar']['name'];
      $file=$_FILES['gambar']['tmp_name'];
      $lama=$_POST['gambar1']; //variabel foto lama
      //buat folder bernama gambar
      $target="dist/agenda/$lama";
        if($nama == ""){
          $nama = $lama;
        }else{
          unlink($target); //hapus foto lama
        }
        move_uploaded_file($file,"dist/agenda/$nama");

      foreach($_POST AS $key => $value) { $_POST[$key] = mysqli_real_escape_string($con,$value); } 
        $sql = "UPDATE agenda   set     gambar    ='$nama'
                                WHERE   id        ='$id'";
        $hasilkueri = mysqli_query($con,$sql);

        if($hasilkueri==1) {
          echo '  <div class="widget-content">
                <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <i class="fa fa-ok-sign"></i><strong>Sukses!</strong> 
                  Data Foto Agenda Diupdate.
                </div>
                        </div>';
        } else {
          echo '  <div class="widget-content">
                <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <i class="fa fa-ban-circle"></i><strong>Terjadi Kesalahan!</strong> 
                  Maaf foto agenda diupdate.
                </div>
                        </div>';
        }
        echo '<meta http-equiv="refresh" content="2;url=index.php?mod=agenda">'; 
        buatngosonginhalamanbawah();
    }
?>
<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Form Edit Agenda</h3>
    </div>
              <!-- /.card-header -->
              <!-- form start -->
    <form role="form" method="post">
        <div class="card-body">
          <div class="form-group">
          <label for="exampleInputEmail1">ID</label>
          <input  name="id"
  	              type="text" 
  	              class="form-control" 
  	              id="exampleInputEmail1" 
  	              placeholder="Masukan Username"
  	              value="<?php echo $row['id']; ?>" 
                  readonly
          >
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Judul</label>
            <input  name="judul" 
  	                type="text" 
  	                class="form-control" 
  	                id="exampleInputPassword1" 
  	                placeholder="Nama Lengkap"
  	                value="<?php echo $row['judul']; ?>"
            >
          </div>
          <div class="form-group">
              <label>Deskripsi</label>
                  <textarea class="form-control" 
                      rows="3" 
                      placeholder="Masukan Alasan"  
                      name="deskripsi"     
                  >
                  <?php echo $row['deskripsi']; ?>
                  </textarea>
            </div>
        </div>
                <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Edit</button>
            <input type="hidden" value="1" name="submitted" /> 
        </div>
    </form>
</div>
<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">Form Edit Foto Agenda</h3>
    </div>
              <!-- /.card-header -->
              <!-- form start -->
    <form role="form" method="post" enctype="multipart/form-data">
        <div class="card-body">
                <div class="form-group">
              <label for="exampleInputFile">File Gambar</label>
              <div class="input-group">
                <div class="custom-file">
                  <input  type="file" 
                      class="custom-file-input" 
                      id="exampleInputFile"
                      name="gambar" 
                  >
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text" id="">Upload</span>
                </div>
              </div>
            </div>
            </div>
                    <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update Foto</button>
                <input type="text"  name="gambar1" id="gambar1" readonly value="<?php echo $row['gambar']; ?>" />
                <input type="hidden" value="1" name="submitted2" /> 
            </div>
    </form>
</div>
<?php } ?>