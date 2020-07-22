<?php
	if (isset($_GET['id']) ) { 
		$id = (int) $_GET['id']; 
		if (isset($_POST['submitted'])) {
		$nama_gambar =  $row['gambar'];

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
			$sql = "UPDATE ank_asuh set 	nama_anak 		='{$_POST['nama_anak']}', 
											jenis_kelamin	='$kelaminnya', 
											tempat_lahir	='{$_POST['tempat_lahir']}', 
											tanggal_lahir	='{$_POST['tanggal_lahir']}', 
											nama_ayah		='{$_POST['nama_ayah']}', 
											nama_ibu		='{$_POST['nama_ibu']}', 
											sekolah 		='{$_POST['sekolah']}', 
											tgl_masuk 		='{$_POST['tgl_masuk']}', 
											kelas 			='{$_POST['kelas']}', 
											alamat_asal 	='{$_POST['alamat_asal']}', 
											nik_sekolah 	='{$_POST['nik_sekolah']}', 
											alasan_masuk 	='{$_POST['alasan_masuk']}', 
											tahun_masuk 	='{$_POST['tahun_masuk']}'
									WHERE 	id_ank 			='$id'";
			$hasilkueri = mysqli_query($con,$sql) ; 

			if($hasilkueri==1) {
				echo ' 	<div class="widget-content">
							<div class="alert alert-success">
			                    <button type="button" class="close" data-dismiss="alert">&times;</button>
			                    <i class="fa fa-ok-sign"></i><strong>Sukses!</strong> 
								Data Anak Asuh Diupdate.
							</div>
	                  	</div>';
			} else {
				echo '	<div class="widget-content">
							<div class="alert alert-danger">
			                    <button type="button" class="close" data-dismiss="alert">&times;</button>
			                    <i class="fa fa-ban-circle"></i><strong>Terjadi Kesalahan!</strong> 
								Maaf data anak asuh gagal diupdate.
							</div>
	                  	</div>';
			}

			//echo (mysqli_affected_rows()) ? pesan_sukses("record is deleted.") : pesan_gagal("Delete failed."); 
			echo '<meta http-equiv="refresh" content="3;url=index.php?mod=anak">'; 
			buatngosonginhalamanbawah();
		}
	$row = mysqli_fetch_array ( mysqli_query($con,"SELECT * FROM ank_asuh WHERE id_ank = '$id' "));
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

<?php
		if (isset($_POST['submitted2'])) {
			$nama=$_FILES['gambar']['name'];
			$file=$_FILES['gambar']['tmp_name'];
			$lama=$_POST['gambar1']; //variabel foto lama
			//buat folder bernama gambar
			$target="dist/img/$lama";
			if($nama == ""){
				$nama = $lama;
			}else{
				unlink($target); //hapus foto lama
			}
			move_uploaded_file($file,"dist/img/$nama");

			foreach($_POST AS $key => $value) { $_POST[$key] = mysqli_real_escape_string($con,$value); } 
				$sql = "UPDATE ank_asuh set 	gambar 		='$nama'
										WHERE 	id_ank 		='$id'";
										// echo $sql;
										// echo $lama;
				$hasilkueri2 = mysqli_query($con,$sql);

				if($hasilkueri2==1) {
					echo ' 	<div class="widget-content">
								<div class="alert alert-success">
				                    <button type="button" class="close" data-dismiss="alert">&times;</button>
				                    <i class="fa fa-ok-sign"></i><strong>Sukses!</strong> 
									Data Foto Anak Asuh Diupdate.
								</div>
		                  	</div>';
				} else {
					echo '	<div class="widget-content">
								<div class="alert alert-danger">
				                    <button type="button" class="close" data-dismiss="alert">&times;</button>
				                    <i class="fa fa-ban-circle"></i><strong>Terjadi Kesalahan!</strong> 
									Maaf foto anak asuh gagal diupdate.
								</div>
		                  	</div>';
				}

				//echo (mysqli_affected_rows()) ? pesan_sukses("record is deleted.") : pesan_gagal("Delete failed."); 
				echo '<meta http-equiv="refresh" content="3;url=index.php?mod=anak">'; 
				buatngosonginhalamanbawah();
		}
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-6">
			<div class="card card-primary">
			  	<div class="card-header">
			        <h3 class="card-title">Formulir Hapus Data</h3>
			  	</div>
			              <!-- /.card-header -->
			              <!-- form start -->
			  	<form role="form" method="post">
			        <div class="card-body">
						<div class="form-group">
							<label for="exampleInputEmail1">Nama Anak</label>
							<input  name="nama_anak"
							    type="text" 
							    class="form-control" 
							    id="exampleInputEmail1" 
							    placeholder="Masukan Nama"
							    value="<?php echo $row['nama_anak']; ?>"
							>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Jenis Kelamin</label>
						</div>
						<div class="col-sm-8">
						    <div class="form-group clearfix">
						        <div class="icheck-primary d-inline">
						          <input type="radio" id="radioPrimary1" name="jenis_kelamin" value="cowo" <?php echo $cowo; ?> >
						            <label for="radioPrimary1">
						            </label>Laki - Laki &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						        </div>
						        <div class="icheck-primary d-inline">
						            <input type="radio" id="radioPrimary2" name="jenis_kelamin" value="cewe" <?php echo $cewe; ?> >
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
							    value="<?php echo $row['tempat_lahir']; ?>"
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
						            value="<?php echo $row['tanggal_lahir']; ?>"
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
							  value="<?php echo $row['nama_ayah']; ?>"
							>
						</div>	
						<div class="form-group">
							<label for="exampleInputEmail1">Nama Ibu</label>
								<input  name="nama_ibu"
								    type="text" 
								    class="form-control" 
								    id="exampleInputEmail1" 
								    placeholder="Masukan Nama Ibu"
								    value="<?php echo $row['nama_ibu']; ?>"
								>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Nama Sekolah</label>
								<input  name="sekolah"
								    type="text" 
								    class="form-control" 
								    id="exampleInputEmail1" 
								    placeholder="Masukan Nama"
								    value="<?php echo $row['sekolah']; ?>"
								    
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
						            value="<?php echo $row['tgl_masuk']; ?>"
						            
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
								    value="<?php echo $row['kelas']; ?>"
								    
								>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Alamat Asal</label>
							<input  name="alamat_asal" 
							    type="text" 
							    class="form-control" 
							    id="exampleInputPassword1" 
							    placeholder="Masukan Alamat"
							    value="<?php echo $row['alamat_asal']; ?>"
							    
							>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">NIK Sekolah</label>
							<input  name="nik_sekolah"
							    type="number" 
							    class="form-control" 
							    id="exampleInputEmail1" 
							    placeholder="Masukan Nama"
							    value="<?php echo $row['nik_sekolah']; ?>"
							    
							>
						</div>
						<div class="form-group">
							<label>Alasan Masuk</label>
							  	<textarea class="form-control" 
							  			rows="3" 
							  			placeholder="Masukan Alasan"  
							  			name="alasan_masuk"
							  				
					  			>
					  			<?php echo $row['alasan_masuk']; ?>
				  				</textarea>
						</div>
						<div class="form-group">
							<label>Tahun Masuk</label>
							  <select class="form-control" name="tahun_masuk">
							 
							  <option value="<?php echo $row['tahun_masuk']; ?>"><?php echo $row['tahun_masuk']; ?></option>
							 
							  </select>
						</div>
						    <!-- /.card-body -->
						<div class="card-footer">
							<button type="submit" class="btn btn-primary">Update</button>
							<input type="hidden" value="1" name="submitted" /> 
						</div>
					</div>
			    </form>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card card-warning">
			  	<div class="card-header">
			        <h3 class="card-title">Formulir Update Foto Anak Asuh</h3>
			  	</div>
			          <!-- /.card-header -->
			          <!-- form start -->
				<form role="form" method="post"  enctype="multipart/form-data">
				    <div class="card-body">
				      	<div class="form-group">
							<label for="exampleInputFile">File Gambar</label>
							<div class="input-group">
							  <div class="custom-file">
							    <input 	type="file" 
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
				        <input type="hidden"  name="gambar1" id="gambar1" readonly value="<?php echo $row['gambar']; ?>" />
				        <input type="hidden" value="1" name="submitted2" /> 
				    </div>
				</form>
			</div>
		</div>
	</div>
</div>



<?php } ?>
