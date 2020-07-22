<?php
  $idd=$_SESSION['skodedonatur'];
 
  if($_SESSION['suser']=="admin"){
    $sql = "SELECT * FROM transaksi_donasi";
    $result = mysqli_query($con,$sql);
  } else {
    $sql = "SELECT * FROM transaksi_donasi where id_donatur= '$idd' ";
    $result = mysqli_query($con,$sql);
  }
    $modname="donasi";  
?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Tabel Data Donasi</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php?mod=home">Home</a></li>
          <li class="breadcrumb-item active">Tabel Data Donasi</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="row">
  <div class="col-12">
    <div class="card">
      <form name="form1" method="post" > 
        <div class="card-header">
          <a href="index.php?mod=<?php echo $modname; ?>_new" class="btn btn-s-md btn-success"> + Tambah Baru</a>
        </div>
        <input type="hidden" name="kirim" value="1">
      </form>
                                <!-- /.card-header -->
      <div class="card-body table-responsive p-0" style="height: 300px;">
        <table class="table table-head-fixed text-nowrap">
          <thead>
            <tr>
<?php if ($_SESSION['suser'] == 'admin') { ?>
              <th>Action</th>
<?php } ?>
              <th width="20">No</th>
              <th>ID</th>
              <th>ID Donatur</th>
              <th>Kode Transaksi</th>
              <th>Nominal</th>
              <th>Tanggal Transaksi</th>
              <th>No. Rekening</th>
              <th>Nama Rekening</th>
              <th>Bank</th>
              <th>Gambar</th>
              <th>Jam</th>
              <th>Konfirmasi</th>
            </tr>
          </thead>
          <tbody>
<?php
  $i=1;
  while($data = mysqli_fetch_array($result)){
    $idi=$data['id'];
    $tgl=$data['tgl_transaksi'];
    $tgl_now = date("Y-m-d");
    $gambar=$data['gambar'];
    $konfirmasigagal = 'Gagal';
    $jangka_waktu = strtotime('+1 days', strtotime($tgl));// jangka waktu + 365 hari
    $tgl_exp=date("Y-m-d",$jangka_waktu);//tanggal expired
    if($tgl_now >= $tgl_exp and $gambar == "" ){
      $sql = "UPDATE transaksi_donasi set   konfirmasi='$konfirmasigagal' 
                                      WHERE id='$idi'";
      mysqli_query($con,$sql) or die(mysqli_error($con));     
    }
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
                    &nbsp;&nbsp;
                    <a href="index.php?mod=<?php echo $modname; ?>_upload&id=<?php echo $data['id'] ?>">
                      <span class="fa fa-upload" style="font-size:16px">
                      </span>
                    </a>
                  </div>
                </td>
<?php } ?>
                <td><?php echo $i; ?></td>
                <td><?php echo $data['id'] ?></td>
                <td><?php echo $data['id_donatur'] ?></td>
                <td><?php echo $data['kode_transaksi'] ?></td>
                <td><?php echo $data['nominal'] ?></td>
                <td><?php echo $data['tgl_transaksi'] ?></td>
                <td><?php echo $data['no_rek'] ?></td>
                <td><?php echo $data['nama_rekening'] ?></td>
                <td><?php echo $data['bank'] ?></td>
                <td><img src ="dist/transfer/<?php echo $data['gambar'] ?>" width = 50px height=50px></td>
                <td><?php echo $data['jam'] ?></td>
                <td><?php echo $data['konfirmasi'] ?></td>
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