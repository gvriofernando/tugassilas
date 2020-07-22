
<?php
  if (isset($_GET['id']) ) { 
    $id = (int) $_GET['id']; 
    if (isset($_POST['submitted'])) {
      $row = mysqli_fetch_array (mysqli_query($con,"SELECT * FROM agenda WHERE id = '$id' "));
      $namagambar = $row['gambar'];
      $target="dist/agenda/$namagambar";
      unlink($target); 
      foreach($_POST AS $key => $value) { $_POST[$key] = mysqli_real_escape_string($con,$value); }
        $sql = "DELETE FROM agenda WHERE id = '$id' ";
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
<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Form Delete Agenda</h3>
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
                    readonly
            >
          </div>
          <div class="form-group">
              <label>Deskripsi</label>
                  <textarea class="form-control" 
                      rows="3" 
                      placeholder="Masukan Alasan"  
                      name="deskripsi"   
                      readonly  
                  >
                  <?php echo $row['deskripsi']; ?>
                  </textarea>
          </div>
          <div class="form-group">
              <label>Gambar</label>
                  <br/>
                  <img  src="dist/agenda/<?php echo $row['gambar']; ?>"
                        width = 100px
                        length = 100px
                  />
          </div>
        </div>
                <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Delete</button>
            <input type="hidden" value="1" name="submitted" /> 
        </div>
    </form>
</div>

<?php } ?>