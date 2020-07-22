<?php
  if (isset($_GET['id']) ) { 
  $id = (int) $_GET['id']; 
  $row = mysqli_fetch_array ( mysqli_query($con,"SELECT * FROM ank_asuh WHERE id_ank = '$id' ")); 
?>

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Detail Data Anak</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php?mod=home">Home</a></li>
          <li class="breadcrumb-item active">Data Anak</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<br/>
<h1 align="center">Profil Anak</h1>
<center><!--Tag untuk ke tengah gambarnya-->
        <img src="dist/img/<?php echo $row['gambar'];?>" width="200" height="200" alt="image in here"><!--tag img src itu sesuaikan nama file di dalam folder dan file gambar harus di dalam folder yang sama dengan file web kita-->
</center>
<br/>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title" align="center">Data Anak</h3>
    </div>
              <!-- /.card-header -->
              <!-- form start -->
    <div class="card-body">
    <div class="card">
  <!-- /.card-header -->
      <div class="card-body">
        <table class="table table-bordered">
            <tbody>
              <tr>
                <td><b>Nama</b></td>
                <td><?php echo $row['nama_anak']; ?></td>
              </tr>
              <tr>
                <td><b>Jenis Kelamin</b></td>
                <td><?php echo $row['jenis_kelamin'];?></td>
              </tr>
              <tr>
                <td><b>Tempat Lahir</b></td>
                <td><?php echo $row['tempat_lahir'];?></td>
              </tr>
              <tr>
                <td><b>Tanggal lahir</b></td>
                <td><?php echo $row['tanggal_lahir'];?></td>
              </tr>
              <tr>
                <td><b>Nama Ayah</b></td>
                <td><?php echo $row['nama_ayah']; ?></td>
              </tr>
              <tr>
                <td><b>Nama Ibu</b></td>
                <td><?php echo $row['nama_ibu']; ?></td>
              </tr>
              <tr>
                <td><b>Sekolah</b></td>
                <td><?php echo $row['sekolah']; ?></td>
              </tr>
              <tr>
                <td><b>Tanggal Masuk</b></td>
                <td><?php echo $row['tgl_masuk']; ?></td>
              </tr>
              <tr>
                <td><b>Kelas</b></td>
                <td><?php echo $row['kelas']; ?></td>
              </tr>
              <tr>
                <td><b>Alamat asal</b></td>
                <td><?php echo $row['alamat_asal']; ?></td>
              </tr>
              <tr>
                <td><b>NIK Sekolah</b></td>
                <td><?php echo $row['nik_sekolah']; ?></td>
              </tr>
              <tr>
                <td><b>Alamat Masuk</b></td>
                <td><?php echo $row['alasan_masuk']; ?></td>
              </tr>
              <tr>
                <td><b>Tahun Masuk</b></td>
                <td><?php echo $row['tahun_masuk']; ?></td>
              </tr>
            </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php } ?>