<?php
		$tgl			=	$this->input->get_post("tgl");
		$tgl			=	explode(",",$tgl);
		$tgl			=	trim($tgl[1]);
		$tgl			=	$this->tanggal->eng_($tgl,"-");
?>
<div style='width:100%'><center><b> <?php echo $this->tanggal->hariLengkap($tgl,"-");?></b></center></div><br>
<div class="row col-md-12">&nbsp;</div>
<div class="col-md-12">
 
 
 
 
 
 
 
 
 
 
 
 
<div class="row   mt--2 col-md-12">
  
<?php
$this->db->limit(3);
$db=$this->db->get("tr_souvenir")->result();
foreach($db as $val)
{
	$a1 	= 	$this->mdls->jmlDistribusiByItem($val->id,$tgl);// distribusi
	$jml1 	=  $this->mdls->getSouvenir($val->id,$tgl); // dijadwalkan
	?>
						<div class="col-12 col-sm-6 col-md-4">
						
							<div class="card">
								<div class="card-body cursor"  onclick="detail('<?php echo $val->nama?>', '<?php echo $val->id?>')">
									<div class="d-flexs justify-content-betweens">
										<div>
											<h5><b><?php echo $val->nama?></b></h5>
											<div >
											Jumlah dijadwalkan : <span class="right text-secondary" style='font-size:20px;font-weight:bold'><?php echo $jml1 ?></span>
											</div><div >
											Telah distribusi <span class="right"> : <?php echo $a1; ?></span>
											</div>
											
										 
										</div>
										 
									</div>
									<div class="progress progress-sm">
										<div class="progress-bar bg-info" style="width:<?php echo $this->mdls->persenPermohonan($a1,$jml1);?>%" role="progressbar" aria-valuenow="<?php echo $this->mdls->persenPermohonan($a1,$jml1);?>" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<div class="d-flex justify-content-between mt-2">
										<p class="text-muted mb-0">progress</p>
										<p class="text-muted mb-0"><?php echo $this->mdls->persenPermohonan($a1,$jml1);?>%</p>
									</div>
								</div>
							</div>
						</div>
						 
<?php } ?>						 
						 
 </div>
			 



 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
</div>
 

 