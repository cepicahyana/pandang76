 <style>
     .tag{
         font-size:14px;
     }
 </style>
  
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  id="area_formSubmit">
				
                    <div class="card">
					<div class="card-header">
									<div class="card-title">Input Permohonan Khusus</div>
								</div>
					  <form class="form-horizontal" id="formSubmit" action="javascript:submitForm('formSubmit')"
							method="post" url="<?php echo base_url()?>registrasi/insert_persus">
                        
                        <div class="card-body" >
                        
							
								 
			 

							
                                <div class="row clearfix">
								 <div class="form-group form-show-validation  col-lg-2 col-md-2 col-sm-5 mt-sm-2 text-right">
                                        <label for="nik" > Nama pemohon</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name='f[nama]' required   required class="form-control" />
                                            </div>
                                        </div>
                                    </div>
									 <div class="form-group   col-lg-2 col-md-2 col-sm-5 mt-sm-2 text-right">
                                       <label for="email">  Email  </label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line"> 
												
												 <input type="mail" name='f[email]'  required   class="form-control" />	 
											</div>
                                        </div>
                                    </div> 
									
                                   <div class="form-group   col-lg-2 col-md-2 col-sm-5 mt-sm-2 text-right">
                                       <label for="email">  Kategory  </label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line"> 
												 
												<?php 
												$dt=array();	
												if($this->m_reff->tm_pengaturan(39)==2)
												{
													$this->db->where("id in(3)");	
												}else{
													$dt[null]="--- pilih ----";
													$this->db->where("id not in(1)");
												}
												
												 
											
												$data=$this->db->get("tr_kategory")->result();
												foreach($data as $val)
												{
													$dt[$val->id]=$val->nama;
												}
												echo form_dropdown("f[jenis_permohonan]",$dt,"","id='kat' class='form-control' required onchange='getKategory(this.value)'");
												?>
											</div>
                                        </div>
                                    </div> 

									<div class="form-group   col-lg-2 col-md-2 col-sm-5 mt-sm-2 text-right">
                                       <label for="hp"  >  Nomor Hp  </label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line"> 
												
												 <input type="text" name='f[hp]' required    class="form-control" />	 
											</div>
                                        </div>
                                    </div> 
                                                   
									
									
									
									
									
                                </div>  
							 
								 <div class="row clearfix">	
									<p id='instansi'>								 
										<div class="form-group   col-lg-2 col-md-2 col-sm-5 mt-sm-2 text-right">
											<label for="password_2">  <b>Instansi</b></label>
										</div>
										<div class="col-lg-4 col-md-4  ">
											<div class="form-group">
												<div class="form-line">
												<input type="text" class="form-control" name='f[instansi]'/>  
												</div>
											</div>
										</div>
									</p>									
									
									<div class="form-group   col-lg-2 col-md-2 col-sm-5 mt-sm-2 text-right">
                                        <label for="password_2">  <b class='ket_label'>Ket. Alamat (label)</b></label>
                                    </div>
                                    <div class="col-lg-4 col-md-4  ">
                                        <div class="form-group">
                                            <div class="form-line">
                                            <input type="text"  class="form-control" name='f[ket]'/>  
                                            </div>
                                        </div>
                                    </div>			
							</div>			
								 
								  
						<?php
						if($this->m_reff->tm_pengaturan(39)==1)
						 { ?>
												 
							 <div class="row clearfix" id='jml'>		
								  <div class="form-group   col-lg-2 col-md-2 col-sm-5 mt-sm-2 text-right">
                                        <label for="password_2">  <b>Jumlah Pagi</b></label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                            
												 <input type="number" name='f[jml_pagi]'    class="form-control" />	 
												 
                                            </div>
                                        </div>
                                    </div>
									
								 
									
                                		
							 	
								<div class="form-group   col-lg-2 col-md-2 col-sm-5 mt-sm-2 text-right">
                                        <label for="password_2">  <b>Jumlah Sore</b></label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                            
												 <input type="number" name='f[jml_sore]'   class="form-control" />	 
												 
                                            </div>
                                        </div>
                                    </div> 
								</div> 
                              
						 <?php } ?>		 
                        
							 <div class="row clearfix" id='jmlUndangan' style='margin-top:-60px'>		
								  <div class="form-group   col-lg-2 col-md-2 col-sm-5 mt-sm-2 text-right">
                                        <label for="password_2">  <b>Jumlah undangan</b></label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                            
												 <input type="number" name='f[jml]'    class="form-control" />	 
												 
                                            </div>
                                        </div>
                                    </div>
                                </div>
							  	        
						
								
								  
  <div > 
            </div>
			 
							 
							 
								
                                   <div class="col-md-12"><center>
								<button onclick="submitForm('formSubmit')"  class="  btn btn-primary  waves-effect fa fa-save">   Simpan </button>  
                                 </center>   </div>
                                 <div class="rows">&nbsp;</div>
								 <br>
                            
                        </div>
                    </div>
					</form>
                </div>
            
			
 <script>
document.getElementById("jmlUndangan").style.visibility = "hidden";  
function reload_table()
{
	
}

function getKategory(id)
{
	if(id==2 || id==3)
	{
		$(".ket_label").html("Ket. Alamat (label) ");
		$("[name='f[ket]']").val("Tempat");
		document.getElementById("jmlUndangan").style.visibility = "hidden";
		document.getElementById("jml").style.visibility = "visible";
	}else{
		$("[name='f[ket]']").val("");
		$(".ket_label").html("Keterangan");
		document.getElementById("jmlUndangan").style.visibility = "visible";
		document.getElementById("jml").style.visibility = "hidden";
	}
	 
}	
$('#katxx').select2({
														theme: "bootstrap"
													});
 </script>	
		
		
		
		
		