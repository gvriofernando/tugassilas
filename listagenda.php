<style type="text/css">
    body { 
        font-family: Calibri, Helvetica, Arial, sans-serif; 
    }
    h3 { 
        font-family: Cambria,"Times New Roman",serif; 
    }
    #paragraf2 { 
        font-family: Georgia, serif;
    }
</style>
<?php 
    session_start();
    error_reporting(0);
    include "inc/config.php";
    include 'header.php';
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
                                <h1 class="m-0 text-dark"><center>Agenda Kegiatan</center></h1>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <?php       
                    $sql = "SELECT * FROM agenda";
                    $result = mysqli_query($con,$sql);
                ?>
                <?php
                    while($data = mysqli_fetch_array($result)){
                ?> 
                    <center><!--Tag untuk ke tengah gambarnya-->
                        <img src="dist/agenda/<?php echo $data['gambar'] ?>" width="200" height="200" alt="image in here"><!--tag img src itu sesuaikan nama file di dalam folder dan file gambar harus di dalam folder yang sama dengan file web kita-->
                    </center>
                    <strong><?php echo $data['judul'] ?></strong>
                    <p id="paragraf2">
                        <?php echo $data['deskripsi'] ?>
                    </p>
                    <hr>  
                    <?php } ?>  
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