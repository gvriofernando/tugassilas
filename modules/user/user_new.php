<?php
  $sql = "SELECT max(kode_donatur) FROM donatur";
  //$nyambungin = mysqli_connect("localhost","root","",$dbname);
  $query = mysqli_query($con,$sql)  or die (mysqli_error());
  $kode_faktur = mysqli_fetch_array($query);
  if(isset($kode_faktur)){
    $nilai = substr($kode_faktur[0], 1);
    $kode = (int) $nilai;
    // echo $kode;
 
    //tambahkan sebanyak + 1
    $kode++;
    $auto_kode = "D" .str_pad($kode, 3, "0",  STR_PAD_LEFT);
  } else {
    $auto_kode = "D001";
  }
?>

<?php
  if (isset($_POST['submitted'])) {
    $jkelamin =  $_POST['jk'];
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
      $pas=md5($_POST['password']);
      //$nyambungin = mysqli_connect("localhost","root","",$dbname);
      $sql1 = "INSERT INTO user (   username, 
                                    password, 
                                    nama_lengkap, 
                                    email, 
                                    id_level, 
                                    aktif, 
                                    nohp, 
                                    tempat_lahir, 
                                    alamat,
                                    jenis_kelamin,
                                    tgl_lahir,
                                    kode_donatur
                                ) 
              VALUES  (   '{$_POST['username']}', 
                          '$pas', 
                          '{$_POST['nama_lengkap']}', 
                          '{$_POST['email']}',
                          '1',
                          '1',
                          '{$_POST['nohp']}',
                          '{$_POST['tempat_lahir']}',
                          '{$_POST['alamat']}', 
                          '$kelaminnya',  
                          '{$_POST['tgl_lahir']}',
                          '$auto_kode'
                      ) 
          ";
      //echo $sql;
      $hasilkueri = mysqli_query($con,$sql1) or die(mysqli_error()); 

      if($hasilkueri==1) {
        echo '  <div class="widget-content">
              <div class="alert alert-success">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <i class="fa fa-ok-sign"></i><strong>Sukses!</strong> 
                Data User Disimpan.
              </div>
                      </div>';
      } else {
        echo '  <div class="widget-content">
              <div class="alert alert-danger">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <i class="fa fa-ban-circle"></i><strong>Terjadi Kesalahan!</strong> 
                Maaf data user gagal disimpan.
              </div>
              </div>';
      }

      echo '<meta http-equiv="refresh" content="2;url=index.php?mod=user">' ;
      buatngosonginhalamanbawah();  
  } 
?>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Formulir Tambah User</h3>
    </div>
              <!-- /.card-header -->
              <!-- form start -->
    <form role="form" method="post">
        <div class="card-body">
          <div class="form-group">
          <label for="exampleInputEmail1">Username</label>
          <input  name="username"
              type="text" 
              class="form-control" 
              id="exampleInputEmail1" 
              placeholder="Masukan Username"
          >
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input  name="password" 
                type="password" 
                class="form-control" 
                id="exampleInputPassword1" 
                placeholder="Password"
            >
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Nama Lengkap</label>
            <input  name="nama_lengkap" 
                type="text" 
                class="form-control" 
                id="exampleInputPassword1" 
                placeholder="Nama Lengkap"
            >
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Email</label>
            <input  name="email" 
                type="email" 
                class="form-control" 
                id="exampleInputPassword1" 
                placeholder="Masukan Email"
            >
          </div>
          <div class="form-group">
            <label>No Handphone</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-phone"></i></span>
                </div>
                <input  name="nohp" 
                    type="text" 
                    class="form-control" 
                    data-inputmask='"mask": "9999-9999-9999"' 
                    data-mask
                >
              </div>
                  <!-- /.input group -->
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
            <label for="exampleInputPassword1">Alamat</label>
            <input  name="alamat" 
                type="text" 
                class="form-control" 
                id="exampleInputPassword1" 
                placeholder="Masukan Alamat"
            >
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Jenis Kelamin</label>
          </div>
          <div class="col-sm-6">
                <div class="form-group clearfix">
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="radioPrimary1" name="jk" value="cowo" checked="true">
                        <label for="radioPrimary1">
                        </label>Laki - Laki &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
                    <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary2" name="jk" value="cewe">
                        <label for="radioPrimary2">
                        </label> Perempuan
                    </div>
                </div>
          </div>
          <div class="form-group">
                <label>Tanggal Lahir</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input  name="tgl_lahir"
                        type="text" 
                        class="form-control"
                        data-inputmask-alias="datetime"
                        data-inputmask-inputformat="yyyy/mm/dd"
                        data-mask
                    >
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
