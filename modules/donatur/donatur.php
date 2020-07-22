<?php
  if(isset($_POST['kirim'])==1){
    $c=" where nama_lengkap like '%" . $_POST['table_search']. "%'";
    //$c=" where nim = '" . $_POST['cari']. "'";
  } else {
    $c="";
  }

  $sql = "SELECT * FROM donatur" . $c;
  $result = mysqli_query($con,$sql);
  $modname="donatur";  
  //echo $sql;  
?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Tabel Data Donatur</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php?mod=home">Home</a></li>
          <li class="breadcrumb-item active">Tabel Data Donatur</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="row">
  <div class="col-12">
    <div class="card">
      <form name="form1" method="post" action=""> 
        <div class="card-header">
<?php if ($_SESSION['suser'] == 'admin') { ?>
          <a href="index.php?mod=<?php echo $modname; ?>_new" class="btn btn-s-md btn-success"> + Tambah Baru</a>
<?php } else { ?>
          <h3 class="card-title">Daftar Data Donatur</h3>
<?php } ?>
            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 300px;">
               Cari Nama&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;                 
                <input type="text" name="table_search" class="form-control float-right" placeholder="Tulis Nama Donatur">
                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                  </div>
              </div>
            </div>
        </div>
        <input type="hidden" name="kirim" value="1">
      </form>
                                <!-- /.card-header -->
      <div class="card-body table-responsive p-0" style="height: 300px;">
        <table class="table table-head-fixed text-nowrap">
          <thead>
            <tr>
              <th>Action</th>
              <th width="20">No</th>
              <th>ID</th>
              <th>Kode Donatur</th>
              <th>Username</th>
              <th>Password</th>
              <th>Nama Lengkap</th>
              <th>Jenis Kelamin</th>
              <th>Tempat Lahir</th>
              <th>Tanggal Lahir</th>
              <th>Email</th>
              <th>No HP</th>
              <th>Alamat</th>
              <th>Id Level</th>
            </tr>
          </thead>
          <tbody>
            <?php
                $i=1;
                while($data = mysqli_fetch_array($result)){
            ?>    
            <tr>
<?php if ($_SESSION['suser'] == 'admin') { ?>
                <td>
                  <div align="center">
                    <a href="index.php?mod=<?php echo $modname; ?>_edit&id=<?php echo $data['id'] ?>">
                      <span class="fa fa-edit" style="font-size:16px">
                      </span>
                    </a>
                    &nbsp;&nbsp;
                    <a href="index.php?mod=<?php echo $modname; ?>_delete&id=<?php echo $data['id'] ?>">
                      <span class="fa fa-trash" style="font-size:16px">
                      </span>
                    </a>
                  </div>
                </td>
<?php } ?>
                <td><?php echo $i; ?></td>
                <td><?php echo $data['id'] ?></td>
                <td><?php echo $data['kode_donatur'] ?></td>
                <td><?php echo $data['username'] ?></td>
                <td><?php echo $data['password'] ?></td>
                <td><?php echo $data['nama_lengkap'] ?></td>
                <td><?php echo $data['jk'] ?></td>
                <td><?php echo $data['tempat_lahir'] ?></td>
                <td><?php echo $data['tgl_lahir'] ?></td>
                <td><?php echo $data['email'] ?></td>
                <td><?php echo $data['nohp'] ?></td>
                <td><?php echo $data['alamat'] ?></td>
                <td><?php echo $data['id_level'] ?></td>
            </tr>
            <?php
                $i++;
                }
            ?>      
          </tbody>
        </table>
      </div>
              <!-- /.card-body -->
    </div>
        <!-- /.card -->
  </div>
</div>