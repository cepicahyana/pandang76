    <style>
    textarea{
        min-height:300px;
    }
    </style>
 
                <!-- Task Info -->
                <div class="col-lg-12 col-md-12 card">
                    <div >
                        <div class="card-header">
                        <b>  Autodispo untuk umum </b>
                          
							 
                        </div>
                         
                           <!----->
				 
                        <div class="row card-body">
                            
	 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        
                        <div class="body"><center><b>DATA BLOK PAGI</b></center>
                            <div class="table-responsive">
                                <table class="entry2" width="100%">
                                    <thead>
                                        <tr >
                                            <th  class='bg-primary'>NO</th>
                                            <th  class='bg-primary'>BLOK</th>
                                            <th  class='bg-primary'>QUOTA</th>
                                            <th  class='bg-primary'>DISPO</th>
                                            <th  class='bg-primary'>DISTRIBUSI</th>
                                            <th  class='bg-primary'>AUTODISPO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php 
									$datablokpagi=$this->db->query("select * from tr_blok where jenis=1 order by nama asc ")->result();
									$no=1;
									foreach($datablokpagi as $val)
									{
										if($val->peruntukan==1)
										{
											$checked="checked";
										}else{
											$checked="";
										}
									?>
                                      <tr>
									  <td><?php echo $no++;?></td>
									  <td> <?php echo $val->nama;?></td>
									  <td><?php echo $this->umum->jmlQuota(1,$val->id);?></td>
									  <td><?php echo $this->umum->jmlDispoByBlok(1,$val->id);?></td>
									  <td><?php echo $this->umum->jmlDistribusi(1,$val->id);?></td>
									  <td>
									  <div class="form-check">
												<label class="form-check-label">
													<input <?php echo $checked;?> onclick="setCek(`cek<?php echo $val->id?>`,`<?php echo $val->id?>`)" class="form-check-input" value="1" type="checkbox" name='cek<?php echo $val->id;?>'>
													<span class="form-check-sign">pilih</span>
												</label>
											</div>
									  
									  </td>
									   
									  </tr>  
									<?php } ?>  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </div>
                        </div>


						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        
                        <div class="body"><center><b>DATA BLOK SORE</b></center>
                            <div class="table-responsive">
                                <table class="entry2" width="100%">
                                    <thead >
                                        <tr  >
                                           <th  class='bg-primary'>NO</th>
                                            <th  class='bg-primary'>BLOK</th>
                                            <th  class='bg-primary'>QUOTA</th>
                                            <th  class='bg-primary'>DISPO</th>
                                            <th  class='bg-primary'>DISTRIBUSI</th>
                                            <th  class='bg-primary'>AUTODISPO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php 
									$databloksore=$this->db->query("select * from tr_blok where jenis=2 order by nama asc ")->result();
									$no=1;$val="";
									foreach($databloksore as $val)
									{
										if($val->peruntukan==1)
										{
											$checked="checked";
										}else{
											$checked="";
										}
									?>
                                      <tr>
									  <td><?php echo $no++;?></td>
									  <td> <?php echo $val->nama;?></td>
									  <td><?php echo $this->umum->jmlQuota(2,$val->id);?></td>
									  <td><?php echo $this->umum->jmlDispoByBlok(2,$val->id);?></td>
									  <td><?php echo $this->umum->jmlDistribusi(2,$val->id);?></td>
									   <td>
									 <div class="form-check">
												<label class="form-check-label">
													<input <?php echo $checked;?> onclick="setCek(`cek<?php echo $val->id?>`,`<?php echo $val->id?>`)" class="form-check-input" value="1" type="checkbox" name='cek<?php echo $val->id;?>'>
													<span class="form-check-sign">pilih</span>
												</label>
											</div>
									  
									  </td>
									  </tr>  
									<?php } ?>  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </div>
                        </div>		
					 					
					 
                           <!----->
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
				
 
  
	
 

	
 
   
<script>
 
  
  //$('#val_6').jqte();
 
 function setCek(name,id)
	 {	 
	 loading("loading");
	 var idkonten=$("[name='"+name+"']").is(":checked"); 
	 if(idkonten==true)
	 {
		 var set=1;
	 }else{
		var set=0;
	 }
	 	 $.ajax({
		 url:"<?php echo base_url()?>autodispo/save_",
		 data: "id="+id+"&set="+set,
		 method:"POST",
		 success: function(data)
            {	 
			unblock("loading");
            }
		});
		 
	 }
	 
    
	
</script>


 