
<?php
	if (isset($_GET['id']) ) { 
	$id = (int) $_GET['id']; 
	$jkelamin =  $_POST['jk'];
		if ($jkelamin == "cowo") {  
			$kelaminnya = "Laki-Laki";     
		   // echo 'Laki - Laki';    
		}
		elseif ($jkelamin == "cewe") {
			$kelaminnya = "Perempuan";
			//echo 'Perempuan';
		}else {
		   // echo 'SALAH KODENYA';
		}
	if (isset($_POST['submitted'])) { 
		foreach($_POST AS $key => $value) { $_POST[$key] = mysqli_real_escape_string($con,$value); } 
		$kode=$_POST['kode_donatur'];
		//echo $kode;
		$sql2 = "UPDATE donatur 	set 	kode_donatur='$kode', 
											nama_lengkap='{$_POST['nama_lengkap']}', 
											jk='$kelaminnya', 
											tempat_lahir='{$_POST['tempat_lahir']}', 
											tgl_lahir='{$_POST['tgl_lahir']}', 
											email='{$_POST['email']}', 
											nohp='{$_POST['nohp']}', 
											alamat='{$_POST['alamat']}' 

									WHERE 	id='$id'";
		$hasilkueri = mysqli_query($con,$sql2) or die(mysqli_error());

		if($hasilkueri==1) {
				echo ' 	<div class="widget-content">
							<div class="alert alert-success">
			                    <button type="button" class="close" data-dismiss="alert">&times;</button>
			                    <i class="fa fa-ok-sign"></i><strong>Sukses!</strong> 
								Data Donatur berhasil di Update.
							</div>
	                  	</div>';
			} else {
				echo '	<div class="widget-content">
							<div class="alert alert-danger">
			                    <button type="button" class="close" data-dismiss="alert">&times;</button>
			                    <i class="fa fa-ban-circle"></i><strong>Terjadi Kesalahan!</strong> 
								Maaf data donatur gagal di Update.
							</div>
	                  	</div>';
			}

		$sql3 = "UPDATE user 	set 	nama_lengkap='{$_POST['nama_lengkap']}', 
										email='{$_POST['email']}', 
										aktif='1', 
										nohp='{$_POST['nohp']}', 
										tempat_lahir='{$_POST['tempat_lahir']}', 
										alamat='{$_POST['alamat']}', 
										jenis_kelamin='$kelaminnya', 
										tgl_lahir='{$_POST['tgl_lahir']}' 

								WHERE 	kode_donatur='$kode'";
		$hasilkueri2 = mysqli_query($con,$sql3) or die(mysqli_error());

		if($hasilkueri2==1) {
				echo ' 	<div class="widget-content">
							<div class="alert alert-success">
			                    <button type="button" class="close" data-dismiss="alert">&times;</button>
			                    <i class="fa fa-ok-sign"></i><strong>Sukses!</strong> 
								Data User berhasil di Update.
							</div>
	                  	</div>';
			} else {
				echo '	<div class="widget-content">
							<div class="alert alert-danger">
			                    <button type="button" class="close" data-dismiss="alert">&times;</button>
			                    <i class="fa fa-ban-circle"></i><strong>Terjadi Kesalahan!</strong> 
								Maaf data user gagal di Update.
							</div>
	                  	</div>';
			}

		echo '<meta http-equiv="refresh" content="2;url=index.php?mod=donatur">'; 
		buatngosonginhalamanbawah();
	}
	$sql = "SELECT * FROM donatur WHERE id = '$id' ";
	$row = mysqli_fetch_array (mysqli_query($con,$sql)); 
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

<?php
	$pas=md5($_POST['password']);
	if($_POST["password"] == $row["password"]){
		$rubahpas = "" ;
	} else {
		$rubahpas = ",password='$pas'" ;
	}
	
	$kd=$row['kode_donatur'];
		
	if (isset($_POST['submitted2'])) { 
		foreach($_POST AS $key => $value) { $_POST[$key] = mysqli_real_escape_string($con,$value); } 
		$sql1 = "UPDATE donatur set 	username='{$_POST['username']}'".$rubahpas."
								WHERE 	id ='$id'";
		$hasilkueri1 = mysqli_query($con,$sql1) or die(mysqli_error($con));
		if($hasilkueri1==1) {
				echo ' 	<div class="widget-content">
							<div class="alert alert-success">
			                    <button type="button" class="close" data-dismiss="alert">&times;</button>
			                    <i class="fa fa-ok-sign"></i><strong>Sukses!</strong> 
								Data Donatur berhasil di Update.
							</div>
	                  	</div>';

			} else {
				echo '	<div class="widget-content">
							<div class="alert alert-danger">
			                    <button type="button" class="close" data-dismiss="alert">&times;</button>
			                    <i class="fa fa-ban-circle"></i><strong>Terjadi Kesalahan!</strong> 
								Maaf data donatur gagal di Update.
							</div>
	                  	</div>';
			}

		$sql2 = "UPDATE user 	set 	username='{$_POST['username']}', 
										password='$pas' 

								WHERE 	kode_donatur='$kd'";

		$hasilkueri2 = mysqli_query($con,$sql2) or die(mysqli_error()); 

		if($hasilkueri2==1) {
				echo ' 	<div class="widget-content">
							<div class="alert alert-success">
			                    <button type="button" class="close" data-dismiss="alert">&times;</button>
			                    <i class="fa fa-ok-sign"></i><strong>Sukses!</strong> 
								Data User berhasil di Update.
							</div>
	                  	</div>';
			} else {
				echo '	<div class="widget-content">
							<div class="alert alert-danger">
			                    <button type="button" class="close" data-dismiss="alert">&times;</button>
			                    <i class="fa fa-ban-circle"></i><strong>Terjadi Kesalahan!</strong> 
								Maaf data user gagal di Update.
							</div>
	                  	</div>';
			}

	echo '<meta http-equiv="refresh" content="2;url=index.php?mod=donatur">'; 
	buatngosonginhalamanbawah();

	}
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-6">   
			<div class="card card-primary">
			  	<div class="card-header">
			        <h3 class="card-title">Formulir Update Data</h3>
			  	</div>
			              <!-- /.card-header -->
			              <!-- form start -->
			  	<form role="form" method="post">
			        <div class="card-body">
			        	<div class="form-group">
				        	<label for="exampleInputPassword1">Kode Donatur</label>
				        	<input 	name="kode_donatur" 
				        			type="text" 
				        			class="form-control" 
				        			id="exampleInputPassword1" 
				        			placeholder="Nama Lengkap"
				        			value="<?php echo $row['kode_donatur']; ?>"
				        			readonly
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
				        	>
      					</div>
				      	<div class="form-group">
				        	<label for="exampleInputPassword1">Jenis Kelamin</label>
				      	</div>
				      	<div class="col-sm-7">
				            <div class="form-group clearfix">
				                <div class="icheck-primary d-inline">
				                	<input type="radio" id="radioPrimary1" name="jk" value="cowo" <?php echo $cowo; ?>>
				                    <label for="radioPrimary1">
				                    </label>Laki - Laki &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				              	</div>
				              	<div class="icheck-primary d-inline">
				                    <input type="radio" id="radioPrimary2" name="jk" value="cewe" <?php echo $cewe; ?>>
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
				        	>
				      	</div>
			        </div>
						                <!-- /.card-body -->
			        <div class="card-footer">
			            <button type="submit" class="btn btn-primary">Edit</button>
			            <input type="hidden" value="1" name="submitted" /> 
			        </div>
			    </form>
			</div>
		</div>

		<div class="col-md-6">
			<div class="card card-warning">
			  	<div class="card-header">
			        <h3 class="card-title">Formulir Update Username & Password</h3>
			  	</div>
			          <!-- /.card-header -->
			          <!-- form start -->
				<form role="form" method="post">
				    <div class="card-body">
				      	<div class="form-group">
			    			<label for="exampleInputEmail1">Username</label>
							    <input 	name="username"
							    		type="text" 
							    		class="form-control" 
							    		id="exampleInputEmail1" 
							    		placeholder="Masukan Username"
							    		value="<?php echo $row['username']; ?>"
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
					        	>
	      				</div>
				    </div>
				            <!-- /.card-body -->
				    <div class="card-footer">
				        <button type="submit" class="btn btn-primary">Edit</button>
				        <input type="hidden" value="1" name="submitted2" /> 
				    </div>
				</form>
			</div>
		</div>
	</div>
</div>





<?php } ?>
