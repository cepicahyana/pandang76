<?php
	$this->load->model("model", "mdl");

	//pagi
	$a1 = $this->mdl->getSouvenir(1);
	$b1 = $this->mdl->getSouvenir(2);
	$c1 = $this->mdl->getSouvenir(3);
	$d1 = $this->mdl->getSouvenir(4);
	$e1 = $this->mdl->getSouvenir(5);
	 

	//sore
	$jml1 = $this->mdl->getJmlPemohon(1);
	$jml2 = $this->mdl->getJmlPemohon(2);
	$jml3 = $this->mdl->getJmlPemohon(3);
	$jml4 = $this->mdl->getJmlPemohonUnd("jml_pagi"); //undangan
	$jml5 = $this->mdl->getJmlPemohonUnd("jml_sore"); //undangan
	 
?>

<style type="text/css">
	.pointer{
		cursor: pointer;
	}
	.right{
	float:right;
	}
</style>



<div class="card-body">
<div class="row row-card-no-pd mt--2 col-md-12">
  
<?php
$this->db->limit(3);
$db=$this->db->get("tr_souvenir")->result();
foreach($db as $val)
{
	$a1 	= $this->mdl->getSouvenir($val->id);
	$jml1 	= $this->mdl->getJmlPemohon($val->id);
	?>
						<div class="col-12 col-sm-6 col-md-4">
						
							<div class="card">
								<div class="card-body cursor"  onclick="detail('<?php echo $val->nama?>', '<?php echo $val->id?>')">
									<div class="d-flexs justify-content-betweens">
										<div>
											<h5><b><?php echo $val->nama?></b></h5>
											<div >
											Jumlah permohonan <span class="right"><?php echo $jml1." / ".$a1; ?></span>
											</div>
											
										 
										</div>
										 
									</div>
									<div class="progress progress-sm">
										<div class="progress-bar bg-info" style="width:<?php echo $this->mdl->persenPermohonan($a1,$jml1);?>%" role="progressbar" aria-valuenow="<?php echo $this->mdl->persenPermohonan($a1,$jml1);?>" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<div class="d-flex justify-content-between mt-2">
										<p class="text-muted mb-0">progress</p>
										<p class="text-muted mb-0"><?php echo $this->mdl->persenPermohonan($a1,$jml1);?>%</p>
									</div>
								</div>
							</div>
						</div>
						 
<?php } ?>						 
						 
					</div>
			 




 
<div class="row row-card-no-pd mt--2 col-md-12">
  
<?php
$this->db->where("id in (4,5)");
$this->db->order_by("id","asc");
$db=$this->db->get("tr_souvenir")->result();
foreach($db as $val)
{
	$a1 	= $this->mdl->getSouvenir($val->id);
	if($val->id==4)
	{
		$id="jml_pagi";
	}if($val->id==5)
	{
		$id="jml_sore";
	}
	$jml1 	= $this->mdl->getJmlPemohonUnd($id);
	?>
						<div class="col-12 col-sm-6 col-md-6">
						
							<div class="card">
								<div class="card-body cursor"  onclick="detail_und('<?php echo $val->nama?>', '<?php echo $val->id?>')">
									<div class="d-flexs justify-content-betweens">
										<div>
											<h5><b><?php echo $val->nama?></b></h5>
											<div >
											Jumlah permohonan <span class="right"><?php echo $jml1." / ".$a1; ?></span>
											</div>
											
										 
										</div>
										 
									</div>
									<div class="progress progress-sm">
										<div class="progress-bar bg-success" style="width:<?php echo $this->mdl->persenPermohonan($a1,$jml1);?>%" role="progressbar" aria-valuenow="<?php echo $this->mdl->persenPermohonan($a1,$jml1);?>" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<div class="d-flex justify-content-between mt-2">
										<p class="text-muted mb-0">progress</p>
										<p class="text-muted mb-0"><?php echo $this->mdl->persenPermohonan($a1,$jml1);?>%</p>
									</div>
								</div>
							</div>
						</div>
						 
<?php } ?>						 
						 
					</div>
					</div>











 
<div class="modal fade " id="mdl_detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document" >
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="modal-content">
            	<div class="modal-header">
            		<h5>Progres distribusi  <span id="detail_name" style="text-transform: lowercase;"></span></h5>
					 <a href="<?php echo base_url()?>mapping_blok/souvenir" type="button" class="close"  >
          <span aria-hidden="true">&times;</span>
        </a>
            	</div>
                <div class="modal-body" id="detail_area">
                	<div class="row" id="data_blok">
                		
                	</div>
                </div>
            </div>
        </div>
    </div>
</div>	

<?php
$level	=	$this->session->userdata("level");
if(strtolower($level)=="user"){?>
<script type="text/javascript">
	
	function detail(newBlok,id){
		 

		$("#mdl_detail").modal({backdrop: 'static', keyboard: false});
		$("#detail_name").html(newBlok);
		loading("detail_area");
		$.post("<?php echo site_url("mapping_blok/detail_souvenir"); ?>",{id:id},function(data){
	 	     unblock('detail_area');
	 	     $("#data_blok").html(data);
		});
	}
	
function detail_und(newBlok,id){
		 

		$("#mdl_detail").modal("toggle");
		$("#detail_name").html(newBlok);
		loading("detail_area");
		$.post("<?php echo site_url("mapping_blok/detail_souvenir_und"); ?>",{id:id},function(data){
	 	     unblock('detail_area');
	 	     $("#data_blok").html(data);
		});
	}

</script>
	<div class="card-body  col-md-12">
	* Untuk merubah jumlah quota silahkan klik pada area kotak souvenir diatas.
	</div>
<?php } ?>

	
		