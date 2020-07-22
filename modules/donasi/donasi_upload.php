<?php
	if (isset($_GET['id']) ) { 
		$id = (int) $_GET['id']; 
		if (isset($_POST['submitted'])) { 
			foreach($_POST AS $key => $value) { $_POST[$key] = mysqli_real_escape_string($con,$value); } 
				$nama=$_FILES['gambar']['name'];
				$file=$_FILES['gambar']['tmp_name'];
				move_uploaded_file($file,"dist/transfer/$nama");

				if ($nama == ""){
					$konfirmasi="Tanda Bukti Tidak Ada";
					$sql = "UPDATE transaksi_donasi set 	gambar='$nama', 
															konfirmasi='$konfirmasi' 
													WHERE 	id='$id'";
					$hasilkueri = mysqli_query($con,$sql) or die(mysqli_error($con));
					if($hasilkueri==1) {
						echo ' 	<div class="widget-content">
									<div class="alert alert-success">
					                    <button type="button" class="close" data-dismiss="alert">&times;</button>
					                    <i class="fa fa-ok-sign"></i><strong>Sukses!</strong> 
										Data Foto tidak ditemukan.
									</div>
			                  	</div>';
					} else {
						echo '	<div class="widget-content">
									<div class="alert alert-danger">
					                    <button type="button" class="close" data-dismiss="alert">&times;</button>
					                    <i class="fa fa-ban-circle"></i><strong>Terjadi Kesalahan!</strong> 
										Maaf foto struk gagal di upload.
									</div>
			                  	</div>';
					}
					echo '<meta http-equiv="refresh" content="2;url=index.php?mod=donasi">'; 
					buatngosongindibawah();
				} else {
					$konfirmasi="Proses";
					$sql = "UPDATE transaksi_donasi set 	gambar='$nama', 
															konfirmasi='$konfirmasi' 
													WHERE 	id='$id'";
					$hasilkueri = mysqli_query($con,$sql) or die(mysqli_error($con));
					if($hasilkueri==1) {
						echo ' 	<div class="widget-content">
									<div class="alert alert-success">
					                    <button type="button" class="close" data-dismiss="alert">&times;</button>
					                    <i class="fa fa-ok-sign"></i><strong>Sukses!</strong> 
										Bukti pembayaran berhasil di upload. Tunggu konfirmasi Admin.
									</div>
			                  	</div>';
					} else {
						echo '	<div class="widget-content">
									<div class="alert alert-danger">
					                    <button type="button" class="close" data-dismiss="alert">&times;</button>
					                    <i class="fa fa-ban-circle"></i><strong>Terjadi Kesalahan!</strong> 
										Maaf foto struk gagal di upload.
									</div>
			                  	</div>';
					}
					echo '<meta http-equiv="refresh" content="2;url=index.php?mod=donasi">'; 
					buatngosongindibawah();
					} 
		}
					$row = mysqli_fetch_array (mysqli_query($con,"SELECT * FROM transaksi_donasi WHERE id = '$id' ")); 
					$iddonaturs = $row['id_donatur'];
?>

<div class="card card-success">
  	<div class="card-header">
        <h3 class="card-title">Formulir Upload Bukti Pembayaran</h3>
  	</div>
              <!-- /.card-header -->
              <!-- form start -->
  	<form role="form" method="post" enctype="multipart/form-data">
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
          		<select class="form-control" name="id_donatur" disabled>
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
            	<label for="exampleInputFile">File Struk Tanda Pembayaran</label>
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
      	</div>
                <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <input type="hidden" value="1" name="submitted" /> 
        </div>
    </form>
</div>
<?php } ?>