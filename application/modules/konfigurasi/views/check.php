 
          
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                   
                         
                        <div class="body row">
                           <!----->
				 
			 
						<div class="col-md-4">
							<div class="card card-info card-annoucement card-round">
								<div class="card-body text-center">
									<div class="card-opening">LINK WEB</div>
									<div class="card-desc">
										 Verifikasi tamu undangan dengan aplikasi pandang check di PC
									</div>
									<div class="card-detail">
									 <a href="<?php echo base_url()?>resume" target="_blank">	<div class="btn btn-light btn-rounded">click </div></a>
									</div>
								</div>
							</div> 
						</div>
				 
						<div class="col-md-4">
							<div class="card card-info card-annoucement card-round">
								<div class="card-body text-center">
									<div class="card-opening">ANDROID GUEST CHECK</div>
									<div class="card-desc">
										 Verifikasi tamu undangan dengan aplikasi android pandang check
									</div>
									<div class="card-detail">
										<a  href="<?php echo base_url()?>file_upload/app-pandangistana.apk" download target="_blank"><div class="btn btn-light btn-rounded"> download apk </div></a> 
									</div>
								</div>
							</div> 
						</div>
				 
						<div class="col-md-4">
							<div class="card card-info card-annoucement card-round">
								<div class="card-body text-center">
									<div class="card-opening">ANDROID SOUVENIR CHECK</div>
									<div class="card-desc">
										 Verifikasi pendistribusian souvenir dengan aplikasi android pandang check
									</div>
									<div class="card-detail">
										<a  href="<?php echo base_url()?>file_upload/app-pandang-souvenir.apk" download target="_blank"><div class="btn btn-light btn-rounded"> download apk </div></a> 
									</div><br>
									<div class="card-detail">
										<a  href="<?php echo base_url()?>check_souvenir/in"   target="_blank"><div class="btn btn-light btn-rounded"> Link Web Scanner Gun </div></a> 
									</div>
								</div>
								 
							</div> Mode scan 
							
							<?php
							$dt=array();
							$dt[1]="Cepat";
							$dt[2]="Normal";
							echo form_dropdown("scan",$dt,$this->m_reff->tm_pengaturan(43),"class='form-control'  onchange='setMode(43,this.value)' ");
							?>
							Defauld Jenis Pengiriman
							
							<?php
							$dtpengiriman=array();
							$db=$this->db->get("tr_pengiriman")->result();
							foreach($db as $val)
							{
								$dtpengiriman[$val->id]	=	$val->nama;
							}
							 
							echo form_dropdown("scan",$dtpengiriman,$this->m_reff->goField("tr_pengiriman","id","where default=1  "),"class='form-control'  onchange='setPengiriman(this.value)' ");
							?>
							
						 
						</div>
				  
                </div>
 
                <!-- #END# Task Info -->
				
 
  <script>
  
 function setMode(idpengaturan,idkonten)
	 {	 
	 
		 $.ajax({
		 url:"<?php echo base_url()?>konfigurasi/save_",
		 data: "idpengaturan="+idpengaturan+"&idkonten="+idkonten,
		 method:"POST",
		 success: function(data)
            {	 
				 notif("   Tersimpan! ");
            }
		});
	 }
	 
	 function setPengiriman(value)
	 {	 
	 
		 $.ajax({
		 url:"<?php echo base_url()?>konfigurasi/setPengiriman",
		 data: "value="+value,
		 method:"POST",
		 success: function(data)
            {	 
				 notif("   Tersimpan! ");
            }
		});
	 }
	  
  </script>
	
 

 
									
  