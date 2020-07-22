<?php
  if (isset($_POST['submitted'])) {
    $jkelamin =  $_POST['jenis_kelamin'];
    if ($jkelamin == "cowo") {  
      $kelaminnya = "Laki-Laki";     
        //echo 'Laki - Laki';    
    }
    elseif ($jkelamin == "cewe") {
      $kelaminnya = "Perempuan";
      //echo 'Perempuan';
    }else {
        echo 'SALAH KODENYA';
    }

    foreach($_POST AS $key => $value) { $_POST[$key] = mysqli_real_escape_string($con,$value); }
      //$ekstensi_diperbolehkan = array('png','jpg');
      $nama=$_FILES['gambar']['name'];
      $file=$_FILES['gambar']['tmp_name'];
      $size=$_FILES['gambar']['size'];

      //buat folder bernama gambar
      move_uploaded_file($file,"dist/img/$nama");
      //$nyambungin = mysqli_connect("localhost","root","",$dbname);
      $sql1 = "INSERT INTO ank_asuh (   nama_anak, 
                                        jenis_kelamin, 
                                        tempat_lahir, 
                                        tanggal_lahir, 
                                        nama_ayah, 
                                        nama_ibu, 
                                        sekolah, 
                                        tgl_masuk, 
                                        kelas,
                                        alamat_asal, 
                                        nik_sekolah, 
                                        alasan_masuk, 
                                        tahun_masuk, 
                                        gambar
                                    ) 
              VALUES  (   '{$_POST['nama_anak']}', 
                          '$kelaminnya', 
                          '{$_POST['tempat_lahir']}',
                          '{$_POST['tanggal_lahir']}', 
                          '{$_POST['nama_ayah']}', 
                          '{$_POST['nama_ibu']}', 
                          '{$_POST['sekolah']}', 
                          '{$_POST['tgl_masuk']}', 
                          '{$_POST['kelas']}', 
                          '{$_POST['alamat_asal']}', 
                          '{$_POST['nik_sekolah']}',
                          '{$_POST['alasan_masuk']}', 
                          '{$_POST['tahun_masuk']}', 
                          '$nama'
                      ) 
          ";
      //echo $sql;
      $hasilkueri = mysqli_query($con,$sql1) or die(mysqli_error()); 

      if($hasilkueri==1) {
        echo '  <div class="widget-content">
              <div class="alert alert-success">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <i class="fa fa-ok-sign"></i><strong>Sukses!</strong> 
                Data Anak Asuh Disimpan.
              </div>
                      </div>';
      } else {
        echo '  <div class="widget-content">
              <div class="alert alert-danger">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <i class="fa fa-ban-circle"></i><strong>Terjadi Kesalahan!</strong> 
                Maaf data anak gagal disimpan.
              </div>
              </div>';
      }
      // echo $nama;
      // echo $file;
      // echo $size;
      echo '<meta http-equiv="refresh" content="2;url=index.php?mod=anak">' ;
      buatngosonginhalamanbawah();  
  } 
?>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Formulir Tambah Anak Asuh</h3>
    </div>
              <!-- /.card-header -->
              <!-- form start -->
    <form role="form" method="post" enctype="multipart/form-data">
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Nama Anak</label>
            <input  name="nama_anak"
                type="text" 
                class="form-control" 
                id="exampleInputEmail1" 
                placeholder="Masukan Nama"
            >
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Jenis Kelamin</label>
          </div>
          <div class="col-sm-6">
                <div class="form-group clearfix">
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="radioPrimary1" name="jenis_kelamin" value="cowo" checked>
                        <label for="radioPrimary1">
                        </label>Laki - Laki &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
                    <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary2" name="jenis_kelamin" value="cewe">
                        <label for="radioPrimary2">
                        </label> Perempuan
                    </div>
                </div>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Tempat Lahir</label>
            <input  name="tempat_lahir"
                type="text" 
                class="form-control" 
                id="exampleInputPassword1" 
                placeholder="Tempat Lahir"
            >
          </div>
          <div class="form-group">
                <label>Tanggal Lahir</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input  name="tanggal_lahir"
                        type="text" 
                        class="form-control"
                        data-inputmask-alias="datetime"
                        data-inputmask-inputformat="yyyy/mm/dd"
                        data-mask
                    >
                </div>
          </div>
          <div class="form-group">
          <label for="exampleInputEmail1">Nama Ayah</label>
          <input  name="nama_ayah"
              type="text" 
              class="form-control" 
              id="exampleInputEmail1" 
              placeholder="Masukan Nama Ayah"
          >
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Nama Ibu</label>
            <input  name="nama_ibu"
                type="text" 
                class="form-control" 
                id="exampleInputEmail1" 
                placeholder="Masukan Nama Ibu"
            >
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Nama Sekolah</label>
            <input  name="sekolah"
                type="text" 
                class="form-control" 
                id="exampleInputEmail1" 
                placeholder="Masukan Nama"
            >
          </div>
          <div class="form-group">
                <label>Tanggal Masuk</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input  name="tgl_masuk"
                        type="text" 
                        class="form-control"
                        data-inputmask-alias="datetime"
                        data-inputmask-inputformat="yyyy/mm/dd"
                        data-mask
                    >
                </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Kelas</label>
            <input  name="kelas"
                type="number" 
                class="form-control" 
                id="exampleInputEmail1" 
                placeholder="Masukan Nama"
            >
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Alamat Asal</label>
            <input  name="alamat_asal" 
                type="text" 
                class="form-control" 
                id="exampleInputPassword1" 
                placeholder="Masukan Alamat"
            >
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">NIK Sekolah</label>
            <input  name="nik_sekolah"
                type="number" 
                class="form-control" 
                id="exampleInputEmail1" 
                placeholder="Masukan Nama"
            >
          </div>
          <div class="form-group">
            <label>Alasan Masuk</label>
              <textarea class="form-control" rows="3" placeholder="Masukan Alasan"  name="alasan_masuk"></textarea>
          </div>
          <div class="form-group">
            <label>Tahun Masuk</label>
              <select class="form-control" name="tahun_masuk">
              <?php
                for ($i=1990; $i<=2018 ; $i++) {
              ?>
              <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
              <?php
                  }
              ?>
              </select>
          </div>
          <div class="form-group">
            <label for="exampleInputFile">File Gambar</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="exampleInputFile" name="gambar">
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
              </div>
              <div class="input-group-append">
                <span class="input-group-text" id="">Upload</span>
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
