<?php
	$sql = "SELECT max(kode_transaksi) FROM transaksi_donasi";
	$query = mysqli_query($con,$sql) or die (mysqli_error($con));
 
	$kode_faktur = mysqli_fetch_array($query);
 
	if($kode_faktur){
		$nilai = substr($kode_faktur[0], 1);
		$kode = (int) $nilai;
 
		//tambahkan sebanyak + 1
		$kode++;
		$auto_kode = "T" .str_pad($kode, 3, "0",  STR_PAD_LEFT);
	} else {
		$auto_kode = "T001";
	}
?>

<?php
	if (isset($_POST['submitted'])) { 
		$no_rekening = $_POST['no_rek'];
		if (strlen($no_rekening) > 9) {
			echo '	<div class="widget-content">
									<div class="alert alert-danger">
					                    <button type="button" class="close" data-dismiss="alert">&times;</button>
					                    <i class="fa fa-ban-circle"></i><strong>Terjadi Kesalahan!</strong> 
										No Rekening Tidak Valid.
									</div>
			                  	</div>';
			echo '<meta http-equiv="refresh" content="2;url=index.php?mod=donasi">'; 
			buatngosongindibawah();
		} else {
					if($_SESSION['suser']=='admin'){ 
						$komfirmasi='Pending';
						$kode_donatur = $_POST['id_donatur'];
					} else {
						$kode_donatur = $_SESSION['skodedonatur'];
						$komfirmasi='Pending';
					}
					foreach($_POST AS $key => $value) { $_POST[$key] = mysqli_real_escape_string($con,$value); }
					$jam=date("H:i:s");
					$tgl = date("Y-m-d");
					$sql = "INSERT INTO transaksi_donasi(	id_donatur, 
															kode_transaksi, 
															nominal, 
															tgl_transaksi, 
															no_rek, 
															nama_rekening, 
															bank, 
															jam, 
															konfirmasi
														) 
												VALUES ('$kode_donatur', 
														'$auto_kode', 
														'{$_POST['nominal']}',  
														'$tgl', 
														'{$_POST['no_rek']}', 
														'{$_POST['nama_rek']}',
														'{$_POST['bank']}', 
														'$jam', 
														'$komfirmasi'
														) 
							";
					$hasilkueri = mysqli_query($con,$sql) or die(mysqli_error($con));  
					if($hasilkueri==1) {
						echo ' 	<div class="widget-content">
									<div class="alert alert-success">
					                    <button type="button" class="close" data-dismiss="alert">&times;</button>
					                    <i class="fa fa-ok-sign"></i><strong>Sukses!</strong> 
										Data Donasi Disimpan.
									</div>
			                  	</div>';
					} else {
						echo '	<div class="widget-content">
									<div class="alert alert-danger">
					                    <button type="button" class="close" data-dismiss="alert">&times;</button>
					                    <i class="fa fa-ban-circle"></i><strong>Terjadi Kesalahan!</strong> 
										Maaf data donasi gagal disimpan.
									</div>
			                  	</div>';
					}
					echo '<meta http-equiv="refresh" content="2;url=index.php?mod=donasi">'; 
					buatngosongindibawah();
				}
	} 
?>
<div class="card card-primary">
  	<div class="card-header">
        <h3 class="card-title">Formulir Donasi</h3>
  	</div>
              <!-- /.card-header -->
              <!-- form start -->
  	<form role="form" method="post" >
        <div class="card-body">
        	<div class="form-group">
			    <label for="exampleInputEmail1">Kode Transaksi</label>
			    <input 	name="kode_donatur"	
			    		type="text" 
			    		class="form-control" 
			    		id="exampleInputEmail1" 
			    		placeholder="" 
			    		value='<?php echo $auto_kode ?>'
			    		readonly
			    >
			</div>
<?php if ($_SESSION['suser'] == 'admin') { ?> 
	      	<div class="form-group">
            	<label>Nama Donatur</label>
          		<select class="form-control" name="id_donatur">
              	<?php
              		$query = "select * from donatur";
					$hasil = mysqli_query($con,$query); 
                	while ($qtabel = mysqli_fetch_assoc($hasil)) {
          		?>
          			<option value="<?php echo $qtabel['kode_donatur'] ?>">
          				<?php echo $qtabel['kode_donatur'];
  							  echo"-";
  							  echo $qtabel['nama_lengkap'];
      			?>	</option>
              	<?php
                  	}
              	?>
              	</select>
          	</div>
<?php } else { ?>
			<div class="form-group">
	        	<label for="exampleInputPassword1">Nama Donatur</label>
	        	<input 	name="nama_donatur" 
	        			type="text" 
	        			class="form-control" 
	        			id="exampleInputPassword1" 
	        			placeholder="Masukan Nama"
	        			readonly
	        	<?php
	        		$kode_d = $_SESSION['skodedonatur'];
	        		$query = "Select * from donatur where kode_donatur = '$kode_d'";
	        		$hasil = mysqli_query($con,$query);
	        		$qtabel = mysqli_fetch_assoc($hasil);
	        	?>
	        			value="<?php echo $qtabel['nama_lengkap']; ?>"
	        	>
	      	</div>
<?php } ?>
	      	<div class="form-group">
	        	<label for="exampleInputPassword1">Nominal</label>
	        	<input 	name="nominal" 
	        			type="number" 
	        			class="form-control" 
	        			id="exampleInputPassword1" 
	        			placeholder="Masukan Nominal"
	        	>
	      	</div>
	      	<div class="form-group">
	        	<label for="exampleInputPassword1">No. Rekening</label>
	        	<input 	name="no_rek" 
	        			type="number" 
	        			class="form-control" 
	        			id="exampleInputPassword1" 
	        			placeholder="Masukan Nomor Rekening (maks 9 karakter)"
	        	/>
	      	</div>
	      	<div class="form-group">
	        	<label for="exampleInputPassword1">Nama Rekening</label>
	        	<input 	name="nama_rek"
	        			type="text" 
	        			class="form-control" 
	        			id="exampleInputPassword1" 
	        			placeholder="Masukan Nama pada Rekening"
	        	>
	      	</div>
	      	<div class="form-group">
	        	<select class="form-control" name="bank">
	        		<option value="BCA">BCA</option>
	        		<option value="BNI">BNI</option>
	        		<option value="Mandiri">Mandiri</option>
	        		<option value="Danamon">Danamon</option>
	        		<option value="BRI">BRI</option>
	        		<option value="Panin">Panin</option>
	        		<option value="CIMB">CIMB</option>
	        	</select>
	      	</div>
        </div>
                <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <input type="hidden" value="1" name="submitted" /> 
        </div>
    </form>
</div>