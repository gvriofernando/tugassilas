<?php
    if (isset($_GET['id']) ) { 
        $id = (int) $_GET['id']; 
        if (isset($_POST['submitted'])) { 
            foreach($_POST AS $key => $value) { $_POST[$key] = mysqli_real_escape_string($con,$value); }
            $sql = "UPDATE pengeluaran  set     id_donatur='{$_POST['id_donatur']}', 
                                                id_ank='{$_POST['id_ank']}', 
                                                jumlah='{$_POST['jumlah_uang']}', 
                                                keterangan='{$_POST['keterangan']}' 
                                        WHERE   id='$id'";
            $hasilkueri = mysqli_query($con,$sql) or die(mysqli_error($con)); 
            if($hasilkueri==1) {
                        echo '  <div class="widget-content">
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <i class="fa fa-ok-sign"></i><strong>Sukses!</strong> 
                                        Data Pengeluaran DiUpdate.
                                    </div>
                                </div>';
                    } else {
                        echo '  <div class="widget-content">
                                    <div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <i class="fa fa-ban-circle"></i><strong>Terjadi Kesalahan!</strong> 
                                        Maaf data pengeluaran gagal diupdate.
                                    </div>
                                </div>';
                    }
            echo '<meta http-equiv="refresh" content="2;url=index.php?mod=pengeluaran">'; 
            buatngosonginhalamandibawah();
    }
    $row = mysqli_fetch_array ( mysqli_query($con,"SELECT * FROM pengeluaran WHERE id = '$id' ")); 
?>
<?php
    $idanaks = $row['id_ank'];
    $iddonaturs = $row['id_donatur'];
    $kets = $row['keterangan'];
    if ($kets == "Saldo Mencukupi"){
        $sm = "selected";
        $stm = "";
    }elseif ($kets == "Saldo Tidak Mencukupi") {
        $sm = "";
        $stm = "selected";
    }else{
        $sm = "";
        $stm = "";
    }
?>
<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Formulir Edit Pembagian Donasi</h3>
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
                    <option value="<?php echo $qtabel['kode_donatur'] ?>"
                <?php        
                    if($qtabel['kode_donatur'] == $iddonaturs){
                        echo "selected";
                    } else {
                        echo "";
                    }
                ?>
                    >
                <?php         echo $qtabel['kode_donatur'];
                              echo"-";
                              echo $qtabel['nama_lengkap'];
                ?>  </option>
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
                    <option value="<?php echo $qtabel['id_ank'] ?>" 
                <?php
                    if($qtabel['id_ank'] == $idanaks){
                        echo "selected";
                    } else {
                        echo "";
                    }
                ?>
                    >
                        <?php echo $qtabel['id_ank'];
                              echo"-";
                              echo $qtabel['nama_anak'];
                ?>  </option>
                <?php
                    }
                ?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Jumlah Uang</label>
                <input  name="jumlah_uang" 
                        type="number" 
                        class="form-control" 
                        id="exampleInputPassword1" 
                        placeholder="Masukan Nominal"
                        value = <?php echo $row['jumlah']; ?>
                >
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Keterangan</label>
                <select class="form-control" name="keterangan">
                    <option value="Saldo Mencukupi" <?php echo $sm; ?>>Saldo Mencukupi</option>
                    <option value="Saldo Tidak Mencukupi" <?php echo $stm; ?>>Saldo Tidak Mencukupi</option>
                </select>
            </div>
        </div>
                <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Edit</button>
            <input type="hidden" value="1" name="submitted" /> 
        </div>
    </form>
</div>
<?php } ?>