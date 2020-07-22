<?php
	include 'inc/config.php';
	include "inc/constant.php";
	include 'header.php';
    error_reporting(0);
    $msg = "";
    $valid = 0;
?>
<?php
    if (isset($_POST['submitted'])){
        session_start();
        $txt_user = $_POST['username'];
        $en_pass = MD5($_POST['password']);

        $sql = "select * from user where username='$txt_user' and password='$en_pass'";

        $hasil = mysqli_query($con,$sql);
        $rec = mysqli_num_rows($hasil);

        if ($rec == 1) {   
            $data = mysqli_fetch_array($hasil);  
            $kodedonatur = $data['kode_donatur'];
            $password = $data['password'];
            $_SESSION['suser'] = $txt_user;
            $_SESSION['spass'] = $password;
            $_SESSION['skodedonatur'] = $kodedonatur;
            $valid = 1;
        } else {
            $valid = 0;
        }

        if($valid==1){
            $msg = '
                <div class="widget-content">
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <i class="fa fa-ok-sign"></i><strong>Sukses!</strong> 
                                Login Sukses.
                    </div>
                </div>';  
                echo '<meta http-equiv="refresh" content="2;url=index.php" />';
                
        } else {
            $msg = '
                <div class="widget-content">
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <i class="fa fa-ban-circle"></i><strong>Oh snap!</strong> 
                                Login Gagal
                    </div>
                </div>';  
               echo '<meta http-equiv="refresh" content="2;url=login.php" />';
        }
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
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-10">
                                <h1 class="m-0 text-dark"><center>Selamat Datang di Website Panti Asuhan Silas</center></h1>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
        <!-- /.content-header -->
<?php 
  echo $msg;
?>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Form Login</h3>
                                </div>
                                <form role="form" id="quickForm" method="post">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Username</label>
                                            <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Masukan Username">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Login</button>
                                        <input type="hidden" value="1" name="submitted">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
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

