<?php
  if($mod == "modules/donatur/donatur"){
    $adon = "active";
    $aanak = "";
    $auser = "";
    $apengeluaran = "";
    $adonasi = "";
    $aagenda = "";
    $ahome = "";
  }elseif ($mod == "modules/anak/anak") {
    $adon = "";
    $aanak = "active";
    $auser = "";
    $apengeluaran = "";
    $adonasi = "";
    $aagenda = "";
    $ahome = "";
  }elseif ($mod == "modules/user/user") {
    $adon = "";
    $aanak = "";
    $auser = "active";
    $apengeluaran = "";
    $adonasi = "";
    $aagenda = "";
    $ahome = "";
  }elseif ($mod == "modules/pengeluaran/pengeluaran") {
    $adon = "";
    $aanak = "";
    $auser = "";
    $apengeluaran = "active";
    $adonasi = "";
    $aagenda = "";
    $ahome = "";
  }elseif ($mod == "modules/donasi/donasi") {
    $adon = "";
    $aanak = "";
    $auser = "";
    $apengeluaran = "";
    $adonasi = "active";
    $aagenda = "";
    $ahome = "";
  }elseif ($mod == "modules/agenda/agenda") {
    $adon = "";
    $aanak = "";
    $auser = "";
    $apengeluaran = "";
    $adonasi = "";
    $aagenda = "active";
    $ahome = "";
  }elseif ($mod == "modules/home/home") {
    $adon = "";
    $aanak = "";
    $auser = "";
    $apengeluaran = "";
    $adonasi = "";
    $aagenda = "";
    $ahome = "active";
  }else{
    $adon = "";
    $aanak = "";
    $auser = "";
    $apengeluaran = "";
    $adonasi = "";
    $aagenda = "";
    $ahome = "";
  }
?>

<!-- Main Sidebar Container -->
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
          <a href="#" class="d-block">Silas Kampret</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="./index.php?mod=home" class="nav-link <?php echo $ahome; ?>" >
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Master Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
<?php if ($_SESSION['suser'] == 'admin') { ?>
              <li class="nav-item">
                <a href="./index.php?mod=donatur" class="nav-link <?php echo $adon; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Donatur</p>
                </a>
              </li>
<?php } ?>
              <li class="nav-item">
                <a href="./index.php?mod=anak" class="nav-link <?php echo $aanak; ?> ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Anak Asuh</p>
                </a>
              </li>
<?php if ($_SESSION['suser'] == 'admin') { ?>
              <li class="nav-item">
                <a href="./index.php?mod=user" class="nav-link <?php echo $auser; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User</p>
                </a>
              </li>
<?php }  ?>
              <li class="nav-item">
                <a href="./index.php?mod=donasi" class="nav-link <?php echo $adonasi; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Transaksi Donasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?mod=pengeluaran" class="nav-link <?php echo $apengeluaran; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengeluaran</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
                <a 
<?php if ($_SESSION['suser'] == 'admin') { ?>
                  href="./index.php?mod=agenda" 
<?php } else { ?>
                  href="./index.php?mod=agenda_list"
<?php } ?>
                  class="nav-link <?php echo $aagenda; ?>">
                  <i class="far fa-calendar-alt"></i>
                  <p>Agenda</p>
                </a>
          </li>
          <li class="nav-item">
            <a href="./logout.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>