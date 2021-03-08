    <style>
    textarea{
        min-height:300px;
    }
    </style>
 
                <!-- Task Info -->
                <div class="col-lg-12 col-md-12 card">
                    <div >
                        <div class="card-header">
                        <b>  Konfigurasi </b>
                          
							 
                        </div>
                         
                           <!----->
				 
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
								<td>Usermail</td>
								<td>
								 
								<input class='form-control' type="text" id="val_2" name="val_2" onchange='save_(`2`,`val_2`)' value="<?php echo $this->m_reff->goField("tm_pengaturan","val","where id='2' ");?>">
							 
								</td>
								</tr>
								
								<tr>
								<td><?php echo $no++;?></td>
								<td>Password email</td>
								<td>
								 
								<input class='form-control' type="password" id="val_3" name="val_3" onchange='save_(`3`,`val_3`)' value="<?php echo $this->m_reff->goField("tm_pengaturan","val","where id='3' ");?>">
							 
								</td>
								</tr>
								
								<tr>
								<td><?php echo $no++;?></td>
								<td>Subject email</td>
								<td>
								 
								<input class='form-control' type="text" id="val_4" name="val_4" onchange='save_(`4`,`val_4`)' value="<?php echo $this->m_reff->goField("tm_pengaturan","val","where id='4' ");?>">
							 
								</td>
								</tr>
								
								<tr>
								<td><?php echo $no++;?></td>
								<td>Mail host</td>
								<td>
								 
								<input class='form-control' type="text" id="val_18"
								name="val_18" 
								onchange="save_(`18`,`val_18`)"	value="<?php echo $this->m_reff->goField("tm_pengaturan","val","where id='18' ");?>">
							 
								</td>
								</tr>
								
								<tr>
								<td><?php echo $no++;?></td>
								<td>Mail port</td>
								<td>
								 
								<input class='form-control' type="text" id="val_19"
								name="val_19" 
								onchange='save_(`19`,`val_19`)'
								value="<?php echo $this->m_reff->goField("tm_pengaturan","val","where id='19' ");?>">
							 
								</td>
								</tr>
								
								<tr>
								<td><?php echo $no++;?></td>
								<td>Mail SMTPSecure </td>
								<td>
								 
								<input class='form-control' type="text" id="val_19"
								name="val_20" 
								onchange='save_(`20`,`val_20`)'
								value="<?php echo $this->m_reff->goField("tm_pengaturan","val","where id='20' ");?>">
							 
								</td>
								</tr>
								
							 
								
								
							</table>
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


 