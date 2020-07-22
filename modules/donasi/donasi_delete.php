<?php
	if (isset($_GET['id']) ) { 
		$id = (int) $_GET['id']; 
		if (isset($_POST['submitted'])) { 
			$hasilkueri = mysqli_query($con,"DELETE FROM transaksi_donasi WHERE id= '$id' "); 
			if($hasilkueri==1) {
						echo ' 	<div class="widget-content">
									<div class="alert alert-success">
					                    <button type="button" class="close" data-dismiss="alert">&times;</button>
					                    <i class="fa fa-ok-sign"></i><strong>Sukses!</strong> 
										Data Donasi Dihapus.
									</div>
			                  	</div>';
					} else {
						echo '	<div class="widget-content">
									<div class="alert alert-danger">
					                    <button type="button" class="close" data-dismiss="alert">&times;</button>
					                    <i class="fa fa-ban-circle"></i><strong>Terjadi Kesalahan!</strong> 
										Maaf data donasi gagal dihapus.
									</div>
			                  	</div>';
					}
			echo '<meta http-equiv="refresh" content="2;url=index.php?mod=donasi">'; 
			buatngosongindibawah();
}
	$sql2 = "SELECT * FROM transaksi_donasi WHERE id = '$id' ";
	$row = mysqli_fetch_array(mysqli_query($con,$sql2)); 
	$iddonaturs = $row['id_donatur'];
	if ($row['bank'] == "BCA") {	
		$bca = "selected";
		$bni = "";
		$mandiri = "";
		$danamon = "";
		$bri = "";
		$panin = "";
		$cimb = "";
	} elseif ($row['bank'] == "BNI") {
		$bca = "";
		$bni = "selected";
		$mandiri = "";
		$danamon = "";
		$bri = "";
		$panin = "";
		$cimb = "";
	} elseif ($row['bank'] == "Mandiri") {
		$bca = "";
		$bni = "";
		$mandiri = "selected";
		$danamon = "";
		$bri = "";
		$panin = "";
		$cimb = "";
	} elseif ($row['bank'] == "Danamon") {
		$bca = "";
		$bni = "";
		$mandiri = "";
		$danamon = "selected";
		$bri = "";
		$panin = "";
		$cimb = "";
	} elseif ($row['bank'] == "BRI") {
		$bca = "";
		$bni = "";
		$mandiri = "";
		$danamon = "";
		$bri = "selected";
		$panin = "";
		$cimb = "";
	} elseif ($row['bank'] == "Panin") {
		$bca = "";
		$bni = "";
		$mandiri = "";
		$danamon = "";
		$bri = "";
		$panin = "selected";
		$cimb = "";
	} elseif ($row['bank'] == "CIMB") {
		$bca = "";
		$bni = "";
		$mandiri = "";
		$danamon = "";
		$bri = "";
		$panin = "";
		$cimb = "selected";	
	} else { 
		$bca = "";
		$bni = "";
		$mandiri = "";
		$danamon = "";
		$bri = "";
		$panin = "";
		$cimb = "";
	}
?>
<div class="card card-danger">
  	<div class="card-header">
        <h3 class="card-title">Formulir Delete Donasi</h3>
  	</div>
              <!-- /.card-header -->
              <!-- form start -->
  	<form role="form" method="post">
        <div class="card-body">
        	<div class="form-group">
			    <label for="exampleInputEmail1">Kode Transaksi</label>
			    <input 	name="kode_donatur"	
			    		type="text" 
			    		class="form-control" 
			    		id="exampleInputEmail1" 
			    		placeholder="" 
			    		value='<?php echo $row['kode_transaksi']; ?>'
			    		readonly
			    >
			</div>
	      	<div class="form-group">
            	<label>Nama Donatur</label>
          		<select class="form-control" name="id_donatur" readonly>
              	<?php
              		$query = "select * from donatur";
					$hasil = mysqli_query($con,$query); 
                	while ($qtabel = mysqli_fetch_assoc($hasil)) {
          		?>
          			<option value="<?php echo $qtabel['kode_donatur']; ?>"
          				<?php        
                    		if($qtabel['kode_donatur'] == $iddonaturs){
                        		echo "selected";
                    		} else {
                        		echo "";
                    		}
                ?>
          			>
          				<?php echo $qtabel['kode_donatur'];
  							  echo"-";
  							  echo $qtabel['nama_lengkap'];
      			?>	</option>
              	<?php
                  	}
              	?>
              	</select>
          	</div>
	      	<div class="form-group">
	        	<label for="exampleInputPassword1">Nominal</label>
	        	<input 	name="nominal" 
	        			type="number" 
	        			class="form-control" 
	        			id="exampleInputPassword1" 
	        			placeholder="Masukan Nominal"
	        			value="<?php echo $row['nominal']; ?>"
	        			readonly
	        	>
	      	</div>
	      	<div class="form-group">
			    <label>Tanggal Transaksi</label>
			    <div class="input-group">
			        <div class="input-group-prepend">
			          <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
			        </div>
			        <input  name="tgl_transaksi"
				            type="text" 
				            class="form-control"
				            data-inputmask-alias="datetime"
				            data-inputmask-inputformat="yyyy/mm/dd"
				            data-mask
				            value="<?php echo $row['tgl_transaksi']; ?>"
				            readonly
			        >
			    </div>
			</div>
	      	<div class="form-group">
	        	<label for="exampleInputPassword1">No. Rekening</label>
	        	<input 	name="no_rek" 
	        			type="number" 
	        			class="form-control" 
	        			id="exampleInputPassword1" 
	        			placeholder="Masukan Nomor Rekening (maks 9 karakter)"
	        			value="<?php echo $row['no_rek']; ?>"
	        			readonly
	        	/>
	      	</div>
	      	<div class="form-group">
	        	<label for="exampleInputPassword1">Nama Rekening</label>
	        	<input 	name="nama_rek"
	        			type="text" 
	        			class="form-control" 
	        			id="exampleInputPassword1" 
	        			placeholder="Masukan Nama pada Rekening"
	        			value="<?php echo $row['nama_rekening']; ?>"
	        			readonly
	        	>
	      	</div>
	      	<div class="form-group">
	      		<label for="exampleInputPassword1">Nama Bank</label>
	        	<select class="form-control" name="bank" readonly>
	        		<option value="BCA" <?php echo $bca ?>>BCA</option>
	        		<option value="BNI" <?php echo $bni ?>>BNI</option>
	        		<option value="Mandiri" <?php echo $mandiri ?>>Mandiri</option>
	        		<option value="Danamon" <?php echo $danamon ?>>Danamon</option>
	        		<option value="BRI" <?php echo $bri ?>>BRI</option>
	        		<option value="Panin" <?php echo $pamin ?>>Panin</option>
	        		<option value="CIMB" <?php echo $cimb ?>>CIMB</option>
	        	</select>
	      	</div>
	      	<div class="form-group">
	      		<label for="exampleInputPassword1">Konfirmasi</label>
	        	<select class="form-control" name="konfirmasi" readonly>
					<option value="Ya">Ya</option>
					<option value="Gagal">Gagal</option>
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
<?php } ?>