<?php
  if(isset($_POST['kirim'])==1){
    $c=" where nama_lengkap like '%" . $_POST['table_search']. "%'";
    //$c=" where nim = '" . $_POST['cari']. "'";
  } else {
    $c="";
  }

  $sql = "SELECT * FROM user" . $c;
  $result = mysqli_query($con,$sql);
  $modname="user";  
  //echo $sql;  
?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Tabel Data User</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php?mod=home">Home</a></li>
          <li class="breadcrumb-item active">Tabel Data User</li>
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
          <a href="index.php?mod=<?php echo $modname; ?>_new" class="btn btn-s-md btn-success"> + Tambah Baru</a>
            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 300px;">
               Cari Nama&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;                 
                <input type="text" name="table_search" class="form-control float-right" placeholder="Tulis Nama User">
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
              <th>Username</th>
              <th>Password</th>
              <th>Nama Lengkap</th>
              <th>Email</th>
              <th>Id Level</th>
              <th>Aktif/Tidak</th>
              <th>No HP</th>
              <th>Tempat Lahir</th>
              <th>Alamat</th>
              <th>Jenis Kelamin</th>
              <th>Tanggal Lahir</th>
              <th>Kode Donatur</th>
            </tr>
          </thead>
          <tbody>
            <?php
                $i=1;
                while($data = mysqli_fetch_array($result)){
            ?>    
            <tr>
                <td>
                  <div align="center">
                    <a href="index.php?mod=<?php echo $modname; ?>_edit&id=<?php echo $data['id_user'] ?>">
                      <span class="fa fa-edit" style="font-size:16px">
                      </span>
                    </a>
                    &nbsp;&nbsp;
                    <a href="index.php?mod=<?php echo $modname; ?>_delete&id=<?php echo $data['id_user'] ?>">
                      <span class="fa fa-trash" style="font-size:16px">
                      </span>
                    </a>
                  </div>
                </td>
                <td><?php echo $i; ?></td>
                <td><?php echo $data['id_user'] ?></td>
                <td><?php echo $data['username'] ?></td>
                <td><?php echo $data['password'] ?></td>
                <td><?php echo $data['nama_lengkap'] ?></td>
                <td><?php echo $data['email'] ?></td>
                <td>
                  <?php if($data['id_level'] == '1')  {
                          echo "admin";
                        }else{
                          echo "donatur";
                        }
                  ?>
                </td>
                <td><?php echo $data['aktif'] ?></td>
                <td><?php echo $data['nohp'] ?></td>
                <td><?php echo $data['tempat_lahir'] ?></td>
                <td><?php echo $data['alamat'] ?></td>
                <td><?php echo $data['jenis_kelamin'] ?></td>
                <td><?php echo $data['tgl_lahir'] ?></td>
                <td><?php echo $data['kode_donatur'] ?></td>
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