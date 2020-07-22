<?php
include "inc/config";
    $sql = "SELECT * FROM agenda";
    $result = mysqli_query($con,$sql);
	$modname="agenda";		
?>
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
            <br/>
            <strong><?php echo $data['judul'] ?></strong>
            <p id="paragraf2">
                <?php echo $data['deskripsi'] ?>
            </p>
            <hr>  
            <?php } ?>  
    </section>
</div>