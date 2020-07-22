<?php
  if (isset($_POST['submitted'])) { 
    foreach($_POST AS $key => $value) { $_POST[$key] = mysqli_real_escape_string($con,$value); }
    $nama=$_FILES['gambar']['name'];
    $file=$_FILES['gambar']['tmp_name'];
    //buat folder bernama gambar
    move_uploaded_file($file,"dist/agenda/$nama");
    $sql = "INSERT INTO agenda (  judul, 
                                  deskripsi,
                                  gambar
                                ) 
                        VALUES (  '{$_POST['judul']}', 
                                  '{$_POST['deskripsi']}',
                                  '$nama'
                                ) 
            "; 
    $hasilkueri = mysqli_query($con,$sql) or die(mysqli_error($con)); 
    if($hasilkueri==1) {
        echo '  <div class="widget-content">
              <div class="alert alert-success">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <i class="fa fa-ok-sign"></i><strong>Sukses!</strong> 
                Data Agenda Disimpan.
              </div>
                      </div>';
      } else {
        echo '  <div class="widget-content">
              <div class="alert alert-danger">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <i class="fa fa-ban-circle"></i><strong>Terjadi Kesalahan!</strong> 
                Maaf data agenda gagal disimpan.
              </div>
                      </div>';
      }
    echo '<meta http-equiv="refresh" content="2;url=index.php?mod=agenda">'; 
    buatngosongindibawah();
} 
?>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Form Entry Agenda</h3>
    </div>
              <!-- /.card-header -->
              <!-- form start -->
    <form role="form" method="post" enctype="multipart/form-data">
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputPassword1">Judul</label>
            <input  name="judul" 
                    type="text" 
                    class="form-control" 
                    id="exampleInputPassword1" 
                    placeholder="Nama Lengkap"
            >
          </div>
          <div class="form-group">
              <label>Deskripsi</label>
                  <textarea class="form-control" 
                      rows="3" 
                      placeholder="Masukan Alasan"  
                      name="deskripsi"     
                  >
                  </textarea>
            </div>
        </div>
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
            <button type="submit" class="btn btn-primary">Submit</button>
            <input type="hidden" value="1" name="submitted" /> 
        </div>
    </form>
</div>