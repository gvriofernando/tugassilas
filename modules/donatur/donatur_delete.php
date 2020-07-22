<?php
	if (isset($_GET['id']) ) { 
		$id = (int) $_GET['id']; 
		if (isset($_POST['submitted'])) {
			$sql = "SELECT * FROM donatur WHERE id = '$id' ";
			$row = mysqli_fetch_array ( mysqli_query($con,$sql)); 
			$kd=$row['kode_donatur'];
			$sql2 = "DELETE FROM user WHERE kode_donatur = '$kd' ";
			$hasilkueri2 = mysqli_query($con,$sql2) ; 

			if($hasilkueri2==1) {
				echo ' 	<div class="widget-content">
							<div class="alert alert-success">
			                    <button type="button" class="close" data-dismiss="alert">&times;</button>
			                    <i class="fa fa-ok-sign"></i><strong>Sukses!</strong> 
								Data User Dihapus.
							</div>
	                  	</div>';
			} else {
				echo '	<div class="widget-content">
							<div class="alert alert-danger">
			                    <button type="button" class="close" data-dismiss="alert">&times;</button>
			                    <i class="fa fa-ban-circle"></i><strong>Terjadi Kesalahan!</strong> 
								Maaf data user gagal dihapus.
							</div>
	                  	</div>';
			}

			$sql3 = "DELETE FROM donatur WHERE id = '$id' ";
			$hasilkueri3 = mysqli_query($con,$sql3) ; 

			if($hasilkueri3==1) {
				echo ' 	<div class="widget-content">
							<div class="alert alert-success">
			                    <button type="button" class="close" data-dismiss="alert">&times;</button>
			                    <i class="fa fa-ok-sign"></i><strong>Sukses!</strong> 
								Data Donatur Dihapus.
							</div>
	                  	</div>';
			} else {
				echo '	<div class="widget-content">
							<div class="alert alert-danger">
			                    <button type="button" class="close" data-dismiss="alert">&times;</button>
			                    <i class="fa fa-ban-circle"></i><strong>Terjadi Kesalahan!</strong> 
								Maaf data donatur gagal dihapus.
							</div>
	                  	</div>';
			}

			//echo (mysqli_affected_rows()) ? pesan_sukses("record is deleted.") : pesan_gagal("Delete failed."); 
			echo '<meta http-equiv="refresh" content="3;url=index.php?mod=donatur">'; 
			buatngosonginhalamanbawah();
		}
	$row = mysqli_fetch_array ( mysqli_query($con,"SELECT * FROM donatur WHERE id = '$id' "));
	$jk=$row['jk'];
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

<div class="card card-primary">
  	<div class="card-header">
        <h3 class="card-title">Formulir Hapus Data</h3>
  	</div>
              <!-- /.card-header -->
              <!-- form start -->
  	<form role="form" method="post">
        <div class="card-body">
        	<div class="form-group">
			    <label for="exampleInputEmail1">ID</label>
			    <input 	name="kode_donatur"	
			    		type="text" 
			    		class="form-control" 
			    		id="exampleInputEmail1" 
			    		placeholder="" 
			    		value="<?php echo $id ?>"
			    		disabled
			    >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Kode Donatur</label>
			    <input 	name="kode_donatur"	
			    		type="text" 
			    		class="form-control" 
			    		id="exampleInputEmail1" 
			    		placeholder="" 
			    		value="<?php echo $row['kode_donatur'] ?>"
			    		disabled
			    >
			</div>
	      	<div class="form-group">
			    <label for="exampleInputEmail1">Username</label>
			    <input 	name="username"
			    		type="text" 
			    		class="form-control" 
			    		id="exampleInputEmail1" 
			    		placeholder="Masukan Username"
			    		value="<?php echo $row['username']; ?>"
			    		disabled
			   	>
			</div>
	      	<div class="form-group">
	        	<label for="exampleInputPassword1">Password</label>
	        	<input 	name="password" 
	        			type="password" 
	        			class="form-control" 
	        			id="exampleInputPassword1" 
	        			placeholder="Password"
	        			value="<?php echo $row['password']; ?>"
	        			disabled
	        	>
	      	</div>
	      	<div class="form-group">
	        	<label for="exampleInputPassword1">Nama Lengkap</label>
	        	<input 	name="nama_lengkap" 
	        			type="text" 
	        			class="form-control" 
	        			id="exampleInputPassword1" 
	        			placeholder="Nama Lengkap"
	        			value="<?php echo $row['nama_lengkap']; ?>"
	        			disabled
	        	>
	      	</div>
	      	<div class="form-group">
	        	<label for="exampleInputPassword1">Jenis Kelamin</label>
	      	</div>
	      	<div class="col-sm-6">
                <div class="form-group clearfix">
                    <div class="icheck-primary d-inline">
                    	<input type="radio" id="radioPrimary1" name="jk" value="cowo" <?php echo $cowo; ?> disabled>
                        <label for="radioPrimary1">
                        </label>Laki - Laki &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  	</div>
                  	<div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary2" name="jk" value="cewe" <?php echo $cewe; ?> disabled>
                        <label for="radioPrimary2">
                        </label>Perempuan
                  	</div>
                </div>
            </div>
	      	<div class="form-group">
	        	<label for="exampleInputPassword1">Tempat Lahir</label>
	        	<input 	name="tempat_lahir"
	        			type="text" 
	        			class="form-control" 
	        			id="exampleInputPassword1" 
	        			placeholder="Tempat Lahir"
	        			value='<?php echo $row['tempat_lahir']; ?>'
	        			disabled
	        	>
	      	</div>
	      	<div class="form-group">
              	<label>Tanggal Lahir</label>
              	<div class="input-group">
                    <div class="input-group-prepend">
                  		<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input 	name="tgl_lahir"
                    		type="text" 
                    		class="form-control"
                    		data-inputmask-alias="datetime"
                    		data-inputmask-inputformat="yyyy/mm/dd"
                    		data-mask
                    		value="<?php echo $row['tgl_lahir']; ?>"
                    		disabled
                    >
              	</div>
            </div>
	      	<div class="form-group">
	        	<label for="exampleInputPassword1">Email</label>
	        	<input 	name="email" 
	        			type="email" 
	        			class="form-control" 
	        			id="exampleInputPassword1" 
	        			placeholder="Masukan Email"
	        			value="<?php echo $row['email']; ?>"
	        			disabled
	        	>
	      	</div>
	      	<div class="form-group">
              	<label>No Handphone</label>
              	<div class="input-group">
                    <div class="input-group-prepend">
                  		<span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <input 	name="nohp" 
                    		type="text" 
                    		class="form-control" 
                    		data-inputmask='"mask": "9999-9999-9999"' 
                    		data-mask
                    		value="<?php echo $row['nohp']; ?>"
                    		disabled
                    >
          		</div>
                  <!-- /.input group -->
            </div>

	      	<div class="form-group">
	        	<label for="exampleInputPassword1">Alamat</label>
	        	<input 	name="alamat" 
	        			type="text" 
	        			class="form-control" 
	        			id="exampleInputPassword1" 
	        			placeholder="Masukan Alamat"
	        			value="<?php echo $row['alamat']; ?>"
	        			disabled
	        	>
	      	</div>
        </div>
                <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Delete</button>
            <input type="hidden" value="1" name="submitted" /> 
        </div>
    </form>
</div>
</div>

<?php } ?>
