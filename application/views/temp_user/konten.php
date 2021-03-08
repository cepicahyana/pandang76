<?php 
if(isset($konten)){?>
	<section class="main-panel">
        <div class="container" id='loading'>
		<div class="page-inner">
		 <div class="row content">
		 
             <?php echo $this->load->view($konten);?>
        
        </div>
        </div>
        </div>
    </section>
<?php 	}else{	echo "File Konten Tidak Ada";}; ?>



<script>
function mappingBlok()
{
  
 $("#isiModal").html("Loading..."); 
		 $("#mdl_modal").modal("show");
		 $.post("<?php echo site_url("dashboard/mappingBlok"); ?>",function(data){
		   $("#isiModal").html(data); 
		 });
}

function mappingWilayah()
{
  
 $("#isiModal").html("Loading..."); 
		 $("#mdl_modal").modal("show");
		 $.post("<?php echo site_url("dashboard/mappingWilayah"); ?>",function(data){
		   $("#isiModal").html(data); 
		 });
}

</script>	
			
		 
	
	
<!-- Modal -->
<div class="modal fade " id="mdl_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
 
   <div class="modal-dialog   modal-lg" role="document" >
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="modal-content">
                <div class="modal-body">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button><b>Tentukan jadwal distirbusi</b>
					<hr>
					<div  id="isiModal"></div>
                </div> 
            </div>
        </div>
    </div>
</div>	
	
