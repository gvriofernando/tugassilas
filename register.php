<?php 
	session_start();
	error_reporting(0);
	include "inc/constant.php";
	include "inc/config.php";
	include 'header.php';
?>

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
			$sql1 = "INSERT INTO donatur (	kode_donatur, 
											username, 
											password, 
											nama_lengkap, 
											jk, 
											tempat_lahir, 
											tgl_lahir, 
											email, 
											nohp, 
											alamat, 
											id_level
										) 
						VALUES (	'$auto_kode', 
									'{$_POST['username']}', 
									'$pas', 
									'{$_POST['nama_lengkap']}', 
									'$kelaminnya', 
									'{$_POST['tempat_lahir']}', 
									'{$_POST['tgl_lahir']}', 
									'{$_POST['email']}', 
									'{$_POST['nohp']}', 
									'{$_POST['alamat']}', 
									'2'
								) 
					";
			//echo $sql;
			$hasilkueri1 = mysqli_query($con,$sql1) or die(mysqli_error()); 

			if($hasilkueri1==1) {
				echo ' 	<div class="widget-content">
							<div class="alert alert-success">
			                    <button type="button" class="close" data-dismiss="alert">&times;</button>
			                    <i class="fa fa-ok-sign"></i><strong>Sukses!</strong> 
								Data Donatur Disimpan.
							</div>
	                  	</div>';
			} else {
				echo '	<div class="widget-content">
							<div class="alert alert-danger">
			                    <button type="button" class="close" data-dismiss="alert">&times;</button>
			                    <i class="fa fa-ban-circle"></i><strong>Terjadi Kesalahan!</strong> 
								Maaf data donatur gagal disimpan.
							</div>
	                  	</div>';
			}

			$sql2 = "INSERT INTO user (	username, 
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
										kode_donatur) 
					VALUES (	'{$_POST['username']}', 
								'$pas', 
								'{$_POST['nama_lengkap']}', 
								'{$_POST['email']}', 
								'2', 
								'1', 
								'{$_POST['nohp']}', 
								'{$_POST['tempat_lahir']}', 
								'{$_POST['alamat']}', 
								'$kelaminnya', 
								'{$_POST['tgl_lahir']}', 
								'$auto_kode'
							) 
					"; 

			$hasilkueri2 = mysqli_query($con,$sql2) or die(mysqli_error()); 


			if($hasilkueri2==1) {
				echo ' 	<div class="widget-content">
							<div class="alert alert-success">
			                    <button type="button" class="close" data-dismiss="alert">&times;</button>
			                    <i class="fa fa-ok-sign"></i><strong>Sukses!</strong> 
								Data User Disimpan.
							</div>
	                  	</div>';
			} else {
				echo '	<div class="widget-content">
							<div class="alert alert-danger">
			                    <button type="button" class="close" data-dismiss="alert">&times;</button>
			                    <i class="fa fa-ban-circle"></i><strong>Terjadi Kesalahan!</strong> 
								Maaf data user gagal disimpan.
							</div>
	                  	</div>';
			}

			echo '<meta http-equiv="refresh" content="2;url=index.php?mod=donatur">' ;
 			buatngosonginhalamanbawah();	
	} 
?>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php
            include "topnav.php";    
        ?>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <!-- <a href="index3.html" class="brand-link">
              <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                   style="opacity: .8">
              <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a> -->

            <!-- Sidebar -->
            <div class="sidebar">
              <!-- Sidebar user panel (optional) -->
              <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                  <img src="dist/img/monyetnaruto.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                  <a href="#" class="d-block">PANTI ASUHAN SILAS</a>
                </div>
              </div>

              <!-- Sidebar Menu -->
              <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <li class="nav-header">MENU</li>
                  <li class="nav-item">
                    <a href="login.php" class="nav-link">
                      <i class="nav-icon fas fa-laptop"></i>
                      <p>
                        Login
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="listagenda.php" class="nav-link">
                      <i class="nav-icon far fa-calendar-alt"></i>
                      <p>
                        Agenda Kegiatan
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="register.php" class="nav-link">
                      <i class="nav-icon far fa-image"></i>
                      <p>
                        SignUp
                      </p>
                    </a>
                  </li>
                </ul>
              </nav>
              <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <div class="content-wrapper">
            <section class="content">
				<div class="card card-primary">
				  	<div class="card-header">
				        <h3 class="card-title">Formulir Tambah Donatur</h3>
				  	</div>
				              <!-- /.card-header -->
				              <!-- form start -->
				  	<form role="form" method="post">
				        <div class="card-body">
				        	<div class="form-group">
							    <label for="exampleInputEmail1">Kode Donatur</label>
							    <input 	name="kode_donatur"	
							    		type="text" 
							    		class="form-control" 
							    		id="exampleInputEmail1" 
							    		placeholder="" 
							    		value='<?php echo $auto_kode ?>'
							    >
							</div>
					      	<div class="form-group">
							    <label for="exampleInputEmail1">Username</label>
							    <input 	name="username"
							    		type="text" 
							    		class="form-control" 
							    		id="exampleInputEmail1" 
							    		placeholder="Masukan Username"
							   	>
							</div>
					      	<div class="form-group">
					        	<label for="exampleInputPassword1">Password</label>
					        	<input 	name="password" 
					        			type="password" 
					        			class="form-control" 
					        			id="exampleInputPassword1" 
					        			placeholder="Password"
					        	>
					      	</div>
					      	<div class="form-group">
					        	<label for="exampleInputPassword1">Nama Lengkap</label>
					        	<input 	name="nama_lengkap" 
					        			type="text" 
					        			class="form-control" 
					        			id="exampleInputPassword1" 
					        			placeholder="Nama Lengkap"
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
					        	<label for="exampleInputPassword1">Tempat Lahir</label>
					        	<input 	name="tempat_lahir"
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
				                    <input 	name="tgl_lahir"
				                    		type="text" 
				                    		class="form-control"
				                    		data-inputmask-alias="datetime"
				                    		data-inputmask-inputformat="yyyy/mm/dd"
				                    		data-mask
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
			</section>
		</div>
		<?php
        include "footer.php";
        ?>
    </div>
    <script src="plugins/jquery/jquery.min.js"></script>
            <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>

    <!-- buat coba2 tambah -->

    <!-- Select2 -->
    <script src="plugins/select2/js/select2.full.min.js"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <!-- InputMask -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
    <!-- date-range-picker -->
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Bootstrap Switch -->
    <script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <!-- Page script -->
    <script src="plugins/tambahansendiri.js"></script>
</body>


