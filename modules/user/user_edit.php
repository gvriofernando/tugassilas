<?php
	if (isset($_GET['id']) ) { 
		$id = (int) $_GET['id']; 
		$row = mysqli_fetch_array ( mysqli_query($con,"SELECT * FROM user WHERE id_user = '$id' "));
		$kodedon = $row['kode_donatur'];
		$pas=md5($_POST['password']);
			if($_POST["password"] == $row["password"]){
				$rubahpas = "," ;
			} else {
				$rubahpas = ",password='$pas'," ;
			}
	
		if (isset($_POST['submitted'])) {
			$paseword = MD5($_POST['password']) ;
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
				$sql = "UPDATE user set 	username            ='{$_POST['username']}',
											nama_lengkap		='{$_POST['nama_lengkap']}', 
											email               ='{$_POST['email']}'".$rubahpas."
											id_level            ='1', 
											aktif               ='{$_POST['aktif']}', 
											nohp                ='{$_POST['nohp']}', 
											tempat_lahir        ='{$_POST['tempat_lahir']}', 
											alamat              ='{$_POST['alamat']}', 
											jenis_kelamin       ='$kelaminnya', 
											tgl_lahir           ='{$_POST['tgl_lahir']}'
									WHERE 	id_user='$id'";
				$hasilkueri = mysqli_query($con,$sql) or die(mysqli_error($con)); 
				if($hasilkueri==1) {
						echo ' 	<div class="widget-content">
									<div class="alert alert-success">
					                    <button type="button" class="close" data-dismiss="alert">&times;</button>
					                    <i class="fa fa-ok-sign"></i><strong>Sukses!</strong> 
										Data User Diupdate.
									</div>
			                  	</div>';
					} else {
						echo '	<div class="widget-content">
									<div class="alert alert-danger">
					                    <button type="button" class="close" data-dismiss="alert">&times;</button>
					                    <i class="fa fa-ban-circle"></i><strong>Terjadi Kesalahan!</strong> 
										Maaf data user gagal diupdate.
									</div>
			                  	</div>';
					} 
			$sql2 = "UPDATE donatur set 	username			='{$_POST['username']}'".$rubahpas." 
											email               ='{$_POST['email']}',
											nohp                ='{$_POST['nohp']}', 
											tempat_lahir        ='{$_POST['tempat_lahir']}', 
											alamat              ='{$_POST['alamat']}', 
											jk       	        ='$kelaminnya', 
											tgl_lahir           ='{$_POST['tgl_lahir']}'
									WHERE 	kode_donatur        ='$kodedon'";
									$hasilkueri2 = mysqli_query($con,$sql2) or die(mysqli_error($con)); 
				if($hasilkueri2==1) {
						echo ' 	<div class="widget-content">
									<div class="alert alert-success">
					                    <button type="button" class="close" data-dismiss="alert">&times;</button>
					                    <i class="fa fa-ok-sign"></i><strong>Sukses!</strong> 
										Data Donatur Diupdate.
									</div>
			                  	</div>';
					} else {
						echo '	<div class="widget-content">
									<div class="alert alert-danger">
					                    <button type="button" class="close" data-dismiss="alert">&times;</button>
					                    <i class="fa fa-ban-circle"></i><strong>Terjadi Kesalahan!</strong> 
										Maaf data donatur gagal diupdate.
									</div>
			                  	</div>';
					}
				echo '<meta http-equiv="refresh" content="2;url=index.php?mod=user">'; 
				buatngosongindibawah();
		}
		$row = mysqli_fetch_array ( mysqli_query($con,"SELECT * FROM user WHERE id_user = '$id' "));
		$jk=$row['jenis_kelamin'];
		//echo $jk;
		if($jk=="Laki-Laki"){
			$cowo="checked";
			$cewe="";
		} elseif ($jk="Perempuan"){
			$cowo="";
			$cewe="checked";
		} else {
			$cowo="";
			$cewe="";
		}
?>

<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Formulir Edit User</h3>
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
	              value="<?php echo $row['username']; ?>" 
          >
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input  name="password" 
	                type="password" 
	                class="form-control" 
	                id="exampleInputPassword1" 
	                placeholder="Password"
	                value="<?php echo $row['password']; ?>"
            >
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Nama Lengkap</label>
            <input  name="nama_lengkap" 
	                type="text" 
	                class="form-control" 
	                id="exampleInputPassword1" 
	                placeholder="Nama Lengkap"
	                value="<?php echo $row['nama_lengkap']; ?>"
            >
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Email</label>
            <input  name="email" 
	                type="email" 
	                class="form-control" 
	                id="exampleInputPassword1" 
	                placeholder="Masukan Email"
	                value="<?php echo $row['email']; ?>"
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
	                    value="<?php echo $row['nohp']; ?>"
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
	                value="<?php echo $row['tempat_lahir']; ?>"
            >
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Alamat</label>
            <input  name="alamat" 
	                type="text" 
	                class="form-control" 
	                id="exampleInputPassword1" 
	                placeholder="Masukan Alamat"
	                value="<?php echo $row['alamat']; ?>"
            >
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Jenis Kelamin</label>
          </div>
          <div class="col-sm-6">
                <div class="form-group clearfix">
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="radioPrimary1" name="jk" value="cowo" <?php echo $cowo; ?>>
                        <label for="radioPrimary1">
                        </label>Laki - Laki &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
                    <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary2" name="jk" value="cewe" <?php echo $cewe; ?>>
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
	                        value="<?php echo $row['tgl_lahir']; ?>"
                    >
                </div>
          </div>
        </div>
                <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Edit</button>
            <input type="hidden" value="1" name="submitted" /> 
        </div>
    </form>
</div>
<?php } ?>
