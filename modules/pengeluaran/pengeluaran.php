<?php	    
    $sql = "SELECT * FROM pengeluaran";
    $result = mysqli_query($con,$sql);
	$modname="pengeluaran";		
?>

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Tabel Data Pengeluaran</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php?mod=home">Home</a></li>
          <li class="breadcrumb-item active">Tabel Data Pengeluaran</li>
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
<?php if ($_SESSION['suser'] == 'admin') { ?>
        <div class="card-header">
          <a href="index.php?mod=<?php echo $modname; ?>_new" class="btn btn-s-md btn-success"> + Tambah Baru</a>
        </div>
<?php } ?>      
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
              <th>ID Anak</th>
              <th>Jumlah</th>
              <th>Keterangan</th>
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
                <td><?php echo $data['id_donatur'] ?></td>
                <td><?php echo $data['id_ank'] ?></td>
                <td><?php echo $data['jumlah'] ?></td>
                <td><?php echo $data['keterangan'] ?></td>
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