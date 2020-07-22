<?php
	if (isset($_POST['submitted'])) { 
		foreach($_POST AS $key => $value) { $_POST[$key] = mysqli_real_escape_string($con,$value); }
		$kodedonatur=$_POST['id_donatur'];
		$uang=$_POST['jumlah_uang']; 
		$sql="SELECT sum(nominal) as saldo 	FROM `transaksi_donasi` 
											WHERE id_donatur='$kodedonatur' 
											and `konfirmasi` = 'Ya' 
											GROUP by id_donatur ";
		$row1 = mysqli_fetch_array (mysqli_query($con,$sql));
		$saldo=$row1['saldo']; 
		$sql2="SELECT sum(jumlah) as keluar FROM `pengeluaran`  
											WHERE id_donatur='$kodedonatur' AND keterangan = 'Saldo Mencukupi'
											GROUP by id_donatur ";
		$row2 = mysqli_fetch_array(mysqli_query($con,$sql2));
		$keluar=$row2['keluar']; 
		$akhir=$saldo - $keluar;
	
		if ($akhir < $uang){
			$ket='Saldo Tidak Mencukupi';
			$sql3 = "INSERT INTO pengeluaran 	(	id_donatur, 
													id_ank, 
													jumlah, 
													keterangan
												) 
								VALUES (	'$kodedonatur', 
											'{$_POST['id_ank']}', 
											'$uang', 
											'$ket'
										)
				"; 
			$hasilkueri = mysqli_query($con,$sql3) or die(mysqli_error($con)); 
			if($hasilkueri==1) {
						echo ' 	<div class="widget-content">
									<div class="alert alert-success">
					                    <button type="button" class="close" data-dismiss="alert">&times;</button>
					                    <i class="fa fa-ok-sign"></i><strong>Sukses!</strong> 
										Data Pengeluaran Disimpan.
									</div>
			                  	</div>';
					} else {
						echo '	<div class="widget-content">
									<div class="alert alert-danger">
					                    <button type="button" class="close" data-dismiss="alert">&times;</button>
					                    <i class="fa fa-ban-circle"></i><strong>Terjadi Kesalahan!</strong> 
										Maaf data pengeluaran gagal disimpan.
									</div>
			                  	</div>';
					}
			echo '<meta http-equiv="refresh" content="2;url=index.php?mod=pengeluaran">';
			buatngosonginhalamandibawah();
		} else {
			$ket='Saldo Mencukupi';
			$sql3 = "INSERT INTO pengeluaran 	(	id_donatur, 
													id_ank, 
													jumlah, 
													keterangan
												) 
										VALUES (	'$kodedonatur', 
													'{$_POST['id_ank']}', 
													'$uang', 
													'$ket'
												) 
					"; 
			$hasilkueri = mysqli_query($con,$sql3) or die(mysqli_error($con)); 
			if($hasilkueri==1) {
						echo ' 	<div class="widget-content">
									<div class="alert alert-success">
					                    <button type="button" class="close" data-dismiss="alert">&times;</button>
					                    <i class="fa fa-ok-sign"></i><strong>Sukses!</strong> 
										Data Pengeluaran Disimpan.
									</div>
			                  	</div>';
					} else {
						echo '	<div class="widget-content">
									<div class="alert alert-danger">
					                    <button type="button" class="close" data-dismiss="alert">&times;</button>
					                    <i class="fa fa-ban-circle"></i><strong>Terjadi Kesalahan!</strong> 
										Maaf data pengeluaran gagal disimpan.
									</div>
			                  	</div>';
					}
			echo '<meta http-equiv="refresh" content="2;url=index.php?mod=pengeluaran">';
			buatngosonginhalamandibawah();
		} 
	}
?>

<div class="card card-primary">
  	<div class="card-header">
        <h3 class="card-title">Formulir Pembagian Donasi untuk Anak</h3>
  	</div>
              <!-- /.card-header -->
              <!-- form start -->
  	<form role="form" method="post" >
        <div class="card-body">
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
			<div class="form-group">
	        	<label for="exampleInputPassword1">ID Anak</label>
	        	<select class="form-control" name="id_ank">
              	<?php
              		$query = "select * from ank_asuh";
					$hasil = mysqli_query($con,$query); 
                	while ($qtabel = mysqli_fetch_assoc($hasil)) {
          		?>
          			<option value="<?php echo $qtabel['id_ank'] ?>">
          				<?php echo $qtabel['id_ank'];
  							  echo"-";
  							  echo $qtabel['nama_anak'];
      			?>	</option>
              	<?php
                  	}
              	?>
              	</select>
	      	</div>
	      	<div class="form-group">
	        	<label for="exampleInputPassword1">Jumlah Uang</label>
	        	<input 	name="jumlah_uang" 
	        			type="number" 
	        			class="form-control" 
	        			id="exampleInputPassword1" 
	        			placeholder="Masukan Nominal"
	        	>
	      	</div>
        </div>
                <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <input type="hidden" value="1" name="submitted" /> 
        </div>
    </form>
</div>