<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <?php
        if(!file_exists($mod.'.php')){        
           echo "Halaman Tidak Ditemukan";
           echo "MOD:".$mod;   
        } else {         
            include $mod.'.php';    
        }
      ?>
    </section>
    <!-- /.content -->
</div>