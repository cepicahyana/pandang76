<?php
$mode	=	$this->m_reff->tm_pengaturan(39);
?>

  <style>
    textarea{
        min-height:300px;
    }
    </style>
 	 <script src="<?php echo base_url()?>plug/ckeditor/ckeditor.js"></script> 
                <!-- Task Info -->
                <div class="col-lg-12 col-md-11 card">
                    <div >
                        
						  <div class="row card-body">
                            <div class="table-responsive col-md-12">
                               <table id='table' class="tabel black table-bordered  table-hover dataTable" style="width:100%">
								<thead  class='sadow bg-blue'>			
									<th class='thead' axis="string" width='15px'>&nbsp;NO</th>
								
									<th class='thead' >Konfigurasi </th>
									<th class='thead' >Value </th>
									 
								</thead>
								<?php   $no=1;?>
								<tr>
								<td><?php echo $no++;?></td>
								<td>Mode Aplikasi</td>
								<td>
							<?php
							$datamode[1]="Distribusi undangan";
							$datamode[2]="Distribusi souvenir";
							echo form_dropdown("val_39",$datamode, $this->m_reff->goField("tm_pengaturan","val","where id='39'"),"  class='form-control' onchange='save_(`39`,`val_39`)' ");
							?>
							  
								</td>
								</tr>
								
							 
								
							 <?php 
							 if($mode==1){?>
								
									 
								
								<tr>
								<td><?php echo $no++;?></td>
								<td>Konten Notif Whatsapp (permohonan diterima)</td>
								<td>
								 
								<textarea class='form-control' id="val_7" name="val_7" onchange='save_(`7`,`val_7`)'><?php echo $this->m_reff->goField("tm_pengaturan","val","where id='7' ");?></textarea>
								<button onclick='save_(`7`,`val_7`)' class="btn btn-block btn-primary">SIMPAN</button>
								</td>
								</tr>
								
									<tr>
								<td><?php echo $no++;?></td>
								<td>Konten Notif Whatsapp (permohonan ditolak)</td>
								<td>
								 
								<textarea class='form-control' id="val_8" name="val_8" onchange='save_(`8`,`val_8`)'><?php echo $this->m_reff->goField("tm_pengaturan","val","where id='8' ");?></textarea>
								<button onclick='save_(`8`,`val_8`)' class="btn btn-block btn-primary">SIMPAN</button>
								</td>
								</tr>
								 
								
									<tr>
								<td><?php echo $no++;?></td>
								<td>Konten Notif SMS (permohonan diterima)</td>
								<td>
								 
								<textarea class='form-control' id="val_9" name="val_9" onchange='save_(`9`,`val_9`)'><?php echo $this->m_reff->goField("tm_pengaturan","val","where id='9' ");?></textarea>
								<button onclick='save_(`9`,`val_9`)' class="btn btn-block btn-primary">SIMPAN</button>
								</td>
								</tr>
								
									<tr>
								<td><?php echo $no++;?></td>
								<td>Konten Notif SMS (permohonan ditolak)</td>
								<td>
								 
								<textarea id="val_10" class='form-control' name="val_10" onchange='save_(`10`,`val_10`)'><?php echo $this->m_reff->goField("tm_pengaturan","val","where id='10' ");?></textarea>
								<button onclick='save_(`10`,`val_10`)' class="btn btn-block btn-primary">SIMPAN</button>
								</td>
								</tr>
								
									<tr>
								<td><?php echo $no++;?></td>
								<td>Konten Notif WA registrasi</td>
								<td>
								 
								<textarea id="val_15" class='form-control' name="val_15" onchange='save_(`15`,`val_15`)'><?php echo $this->m_reff->goField("tm_pengaturan","val","where id='15' ");?></textarea>
								<button onclick='save_(`15`,`val_15`)' class="btn btn-block btn-primary">SIMPAN</button>
								</td>
								</tr>	<tr>
								<td><?php echo $no++;?></td>
								<td>Konten Notif SMS registrasi</td>
								<td>
								 
								<textarea id="val_16" class='form-control' name="val_16" onchange='save_(`16`,`val_16`)'><?php echo $this->m_reff->goField("tm_pengaturan","val","where id='16' ");?></textarea>
								<button onclick='save_(`16`,`val_16`)' class="btn btn-block btn-primary">SIMPAN</button>
								</td>
								</tr>
								
								
								<tr>
								<td><?php echo $no++;?></td>
								<td>Konten Notif WA pengambilan Persus,Given & Acara lainnya</td>
								<td>
								 
								<textarea id="val_32" class='form-control' name="val_32" onchange='save_(`32`,`val_32`)'><?php echo $this->m_reff->goField("tm_pengaturan","val","where id='32' ");?></textarea>
								<button onclick='save_(`32`,`val_32`)' class="btn btn-block btn-primary">SIMPAN</button>
								</td>
								</tr>
								
								<tr>
								<td><?php echo $no++;?></td>
								<td>Konten Notif SMS pengambilan Persus,Given & Acara lainnya</td>
								<td>
								 
								<textarea id="val_33" class='form-control' name="val_33" onchange='save_(`33`,`val_33`)'><?php echo $this->m_reff->goField("tm_pengaturan","val","where id='33' ");?></textarea>
								<button onclick='save_(`33`,`val_33`)' class="btn btn-block btn-primary">SIMPAN</button>
								</td>
								</tr>
				<?php  }else{?>
								<tr>
								<td><?php echo $no++;?></td>
								<td>Notif Whatsapp Registrasi VCON (bahasa indonesia)</td>
								<td>
								 
								<textarea   class='form-control' id="val_55" name="val_55"  ><?php echo $this->m_reff->goField("tm_pengaturan","val","where id='55' ");?></textarea>
								<button onclick='save_(`55`,`val_55`)' class="btn btn-block btn-primary">SIMPAN</button>
								</td>
								</tr>
								<tr>
								<td><?php echo $no++;?></td>
								<td>Notif Whatsapp Registrasi VCON (bahasa inggris)</td>
								<td>
								 
								<textarea   class='form-control' id="val_57" name="val_57"  ><?php echo $this->m_reff->goField("tm_pengaturan","val","where id='57' ");?></textarea>
								<button onclick='save_(`57`,`val_57`)' class="btn btn-block btn-primary">SIMPAN</button>
								</td>
								</tr>
								
								<tr id="area_formSubmit54">
								<td><?php echo $no++;?></td>
								 
								<td colspan="2">
								 <form class="form-horizontal" id="formSubmit54" action="javascript:submitFormNoResset('formSubmit54')"
							method="post" url="<?php echo base_url()?>konfigurasi/save_">
								<input type="hidden" value="54" name="idpengaturan"> 
								<b> Notif email registrasi VCON (bahasa indonesia)</b><br>
								<textarea id="val_54" class='form-control' name="idkonten"  ><?php echo $this->m_reff->goField("tm_pengaturan","val","where id='54' ");?></textarea>
								<button onclick='submitFormNoResset("formSubmit54")' class="btn btn-block btn-primary">SIMPAN</button>
								</form>
								</td>
								</tr>
								<script>
								  CKEDITOR.replace('val_54'); 
								  CKEDITOR.config.height = 220;
								</script>
								<tr id="area_formSubmit">
								<td><?php echo $no++;?></td>
								 
								<td colspan="2">
								 <form class="form-horizontal" id="formSubmit" action="javascript:submitFormNoResset('formSubmit')"
							method="post" url="<?php echo base_url()?>konfigurasi/save_">
								<input type="hidden" value="56" name="idpengaturan"> 
								<b> Notif email registrasi VCON (bahasa inggris)</b><br>
								<textarea id="val_56" class='form-control' name="idkonten"  ><?php echo $this->m_reff->goField("tm_pengaturan","val","where id='56' ");?></textarea>
								<button onclick='submitFormNoResset("formSubmit")' class="btn btn-block btn-primary">SIMPAN</button>
								</form>
								</td>
								</tr>
					
								<script>
								  CKEDITOR.replace('val_56'); 
								  CKEDITOR.config.height = 220;
								</script>
								
								
								
								<tr>
								<td><?php echo $no++;?></td>
								<td>Konten Notif whatsapp jadwal pengambilan</td>
								<td>
								 
								<textarea id="val_41" class='form-control' name="val_41" onchange='save_(`41`,`val_41`)'><?php echo $this->m_reff->goField("tm_pengaturan","val","where id='41' ");?></textarea>
								<button onclick='save_(`41`,`val_41`)' class="btn btn-block btn-primary">SIMPAN</button>
								</td>
								</tr>
					
							<!--		<tr>
								<td><?php echo $no++;?></td>
								<td>Konten Notif sms jadwal pengambilan</td>
								<td>
								 
								<textarea id="val_42" class='form-control' name="val_42" onchange='save_(`42`,`val_42`)'><?php echo $this->m_reff->goField("tm_pengaturan","val","where id='42' ");?></textarea>
								<button onclick='save_(`42`,`val_42`)' class="btn btn-block btn-primary">SIMPAN</button>
								</td>
								</tr>--->
					
							<tr id="area_formSubmit">
								<td><?php echo $no++;?></td>
								 
								<td colspan="2">
								 <form class="form-horizontal" id="formSubmites" action="javascript:submitFormNoResset('formSubmites')"
							method="post" url="<?php echo base_url()?>konfigurasi/save_">
								<input type="hidden" value="40" name="idpengaturan"> 
								<b> Konten notif email keterangan jadwal pengambilan</b><br>
								<textarea id="val_40" class='form-control' name="idkonten"  ><?php echo $this->m_reff->goField("tm_pengaturan","val","where id='40' ");?></textarea>
								<button onclick='submitFormNoResset("formSubmites")' class="btn btn-block btn-primary">SIMPAN</button>
								</form>
								</td>
								</tr>
					
								<script>
								  CKEDITOR.replace('val_40'); 
								  CKEDITOR.config.height = 220;
								</script>
					
					
				<?php }	?>
								
							</table>
							</div>						
							</div>						
					 					
					 
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   <hr>
						   
						   
						   
						   
                           <!----->
				 
                        <div class=" ">
                            <div class="table-responsive  ">
                               <table id='table' class="tabel black table-bordered  table-hover dataTable" style="width:100%">
								<thead  class='sadow bg-success'>			
									<th class='thead' axis="string" width='15px'>&nbsp;NO</th>
								
									<th class='thead' >Konfigurasi </th>
									<th class='thead' >Value </th>
									 
								</thead>
								<?php   $no=1;?>
								 
								
								<tr>
								<td><?php echo $no++;?></td>
								<td>Maksimal distribusi undangan perhari</td>
								<td>
								 
								<input class='form-control' type="text" id="val_1" name="val_1" onchange='save_(`1`,`val_1`)' value="<?php echo $this->m_reff->goField("tm_pengaturan","val","where id='1' ");?>">
							 
								</td>
								</tr>
								
								<tr>
								<td><?php echo $no++;?></td>
								<td>Url Rest Pandang</td>
								<td>
								 
								<input class='form-control' type="text" id="val_35" name="val_35" onchange='save_(`35`,`val_35`)' value="<?php echo $this->m_reff->tm_pengaturan('35');?>">
							 
								</td>
								</tr>
								
								<tr>
								<td><?php echo $no++;?></td>
								<td>Direktory upload </td>
								<td>
								 
								<input class='form-control' type="text" id="val_37" name="val_37" onchange='save_(`37`,`val_37`)' value="<?php echo $this->m_reff->tm_pengaturan('37');?>">
							 
								</td>
								</tr>
								
								<tr>
								<td><?php echo $no++;?></td>
								<td>Link profile kepegawaian </td>
								<td>
								 
								<input class='form-control' type="text" id="val_38" name="val_38" onchange='save_(`38`,`val_38`)' value="<?php echo $this->m_reff->tm_pengaturan('38');?>">
							 
								</td>
								</tr>
								
								<tr>
								<td><?php echo $no++;?></td>
								<td>Link upload file pendaftaran</td>
								<td>
								 
								<input type="text" id="val_14" class='form-control' name="val_14" onchange='save_(`14`,`val_14`)' value="<?php echo $this->m_reff->goField("tm_pengaturan","val","where id='14' ");?>">
		 
								</td>
								</tr>
							
							 
								
									<tr>
								<td><?php echo $no++;?></td>
								<td>Url API Whatsapp pesan biasa</td>
								<td>
								 
								<input class='form-control' type="text" id="val_6" name="val_6" onchange='save_(`6`,`val_6`)'
								value="<?php echo $this->m_reff->goField("tm_pengaturan","val","where id='6' ");?>">
							 
								</td>
								</tr>
								
									<tr>
								<td><?php echo $no++;?></td>
								<td>Url API Whatsapp pesan dokumen</td>
								<td>
								 
								<input class='form-control' type="text" id="val_13" name="val_13" onchange='save_(`13`,`val_13`)'
								value="<?php echo $this->m_reff->goField("tm_pengaturan","val","where id='13' ");?>">
							 
								</td>
								</tr>
								
								
									<tr>
								<td><?php echo $no++;?></td>
								<td>Token API Whatsapp</td>
								<td>
								 
								<input class='form-control' type="text" id="val_5" name="val_5" onchange='save_(`5`,`val_5`)'
								value="<?php echo $this->m_reff->goField("tm_pengaturan","val","where id='5' ");?>">
							 
								</td>
								</tr>
								
							 
								
									<tr>
								<td><?php echo $no++;?></td>
								<td>Url API Sms</td>
								<td>
								 
								<input class='form-control' type="text" id="val_11" name="val_11" onchange='save_(`11`,`val_11`)'
								value="<?php echo $this->m_reff->goField("tm_pengaturan","val","where id='11' ");?>">
							 
								</td>
								</tr>
								
									<tr>
								<td><?php echo $no++;?></td>
								<td>Token API Sms</td>
								<td>
								 
								<input class='form-control' type="text" id="val_12" name="val_12" onchange='save_(`12`,`val_12`)'
								value="<?php echo $this->m_reff->goField("tm_pengaturan","val","where id='12' ");?>">
							 
								</td>
								</tr>
								
								<tr>
								<td><?php echo $no++;?></td>
								<td>zoom api key</td>
								<td>
								 
								<input class='form-control' type="text" id="val_45" name="val_45" onchange='save_(`45`,`val_45`)'
								value="<?php echo $this->m_reff->goField("tm_pengaturan","val","where id='45' ");?>">
							 
								</td>
								</tr>
								<tr>
								<td><?php echo $no++;?></td>
								<td>zoom api secret</td>
								<td>
								 
								<input class='form-control' type="text" id="val_46" name="val_46" onchange='save_(`46`,`val_46`)'
								value="<?php echo $this->m_reff->goField("tm_pengaturan","val","where id='46' ");?>">
							 
								</td>
								</tr>
								
								
							 <?php 
							 if($mode==1){?>
								
								<tr>
								<td><?php echo $no++;?></td>
								<td>Konten Notif Whatsapp (permohonan diterima)</td>
								<td>
								 
								<textarea class='form-control' id="val_7" name="val_7" onchange='save_(`7`,`val_7`)'><?php echo $this->m_reff->goField("tm_pengaturan","val","where id='7' ");?></textarea>
								<button onclick='save_(`7`,`val_7`)' class="btn btn-block btn-primary">SIMPAN</button>
								</td>
								</tr>
								
									<tr>
								<td><?php echo $no++;?></td>
								<td>Konten Notif Whatsapp (permohonan ditolak)</td>
								<td>
								 
								<textarea class='form-control' id="val_8" name="val_8" onchange='save_(`8`,`val_8`)'><?php echo $this->m_reff->goField("tm_pengaturan","val","where id='8' ");?></textarea>
								<button onclick='save_(`8`,`val_8`)' class="btn btn-block btn-primary">SIMPAN</button>
								</td>
								</tr>
								 
								
									<tr>
								<td><?php echo $no++;?></td>
								<td>Konten Notif SMS (permohonan diterima)</td>
								<td>
								 
								<textarea class='form-control' id="val_9" name="val_9" onchange='save_(`9`,`val_9`)'><?php echo $this->m_reff->goField("tm_pengaturan","val","where id='9' ");?></textarea>
								<button onclick='save_(`9`,`val_9`)' class="btn btn-block btn-primary">SIMPAN</button>
								</td>
								</tr>
								
									<tr>
								<td><?php echo $no++;?></td>
								<td>Konten Notif SMS (permohonan ditolak)</td>
								<td>
								 
								<textarea id="val_10" class='form-control' name="val_10" onchange='save_(`10`,`val_10`)'><?php echo $this->m_reff->goField("tm_pengaturan","val","where id='10' ");?></textarea>
								<button onclick='save_(`10`,`val_10`)' class="btn btn-block btn-primary">SIMPAN</button>
								</td>
								</tr>
								
									<tr>
								<td><?php echo $no++;?></td>
								<td>Konten Notif WA registrasi</td>
								<td>
								 
								<textarea id="val_15" class='form-control' name="val_15" onchange='save_(`15`,`val_15`)'><?php echo $this->m_reff->goField("tm_pengaturan","val","where id='15' ");?></textarea>
								<button onclick='save_(`15`,`val_15`)' class="btn btn-block btn-primary">SIMPAN</button>
								</td>
								</tr>	<tr>
								<td><?php echo $no++;?></td>
								<td>Konten Notif SMS registrasi</td>
								<td>
								 
								<textarea id="val_16" class='form-control' name="val_16" onchange='save_(`16`,`val_16`)'><?php echo $this->m_reff->goField("tm_pengaturan","val","where id='16' ");?></textarea>
								<button onclick='save_(`16`,`val_16`)' class="btn btn-block btn-primary">SIMPAN</button>
								</td>
								</tr>
								
								
								<tr>
								<td><?php echo $no++;?></td>
								<td>Konten Notif WA pengambilan Persus,Given & Acara lainnya</td>
								<td>
								 
								<textarea id="val_32" class='form-control' name="val_32" onchange='save_(`32`,`val_32`)'><?php echo $this->m_reff->goField("tm_pengaturan","val","where id='32' ");?></textarea>
								<button onclick='save_(`32`,`val_32`)' class="btn btn-block btn-primary">SIMPAN</button>
								</td>
								</tr>
								
								<tr>
								<td><?php echo $no++;?></td>
								<td>Konten Notif SMS pengambilan Persus,Given & Acara lainnya</td>
								<td>
								 
								<textarea id="val_33" class='form-control' name="val_33" onchange='save_(`33`,`val_33`)'><?php echo $this->m_reff->goField("tm_pengaturan","val","where id='33' ");?></textarea>
								<button onclick='save_(`33`,`val_33`)' class="btn btn-block btn-primary">SIMPAN</button>
								</td>
								</tr>
				<?php  } ?>
								
							</table>
							</div>						
					 					
					 
                           <!----->
                        </div>
						
						
						
						
						
						
						
                           <!----->
                        </div>
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
                    </div>
                </div>
                <!-- #END# Task Info -->
				
 
  
	
 

	
 
   
<script>
 
  
  //$('#val_6').jqte();
 
 function save_(idpengaturan,idkonten)
	 {	 
	 var idkonten=$("[name='"+idkonten+"']").val();
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
	 
    
	
</script>


 