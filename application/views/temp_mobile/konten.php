<?php 
if(isset($konten)){?>
	<section class="contents"><br><br><br><br><br>
        <div class="container-fluid">
             <?php echo $this->load->view($konten);?>
        </div>
    </section>
<?php 	}else{	echo "File Konten Tidak Ada";}; ?>