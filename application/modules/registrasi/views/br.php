 <style>
     .tag{
         font-size:14px;
     }
 </style>
 <div  >
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  id="area_formSubmit">
				
                    <div class="card">
					<div class="card-header">
									<div class="card-title">Form Registrasi</div>
								</div>
					  <form class="form-horizontal" id="formSubmit" action="javascript:submitForm('formSubmit')"
							method="post" url="<?php echo base_url()?>registrasi/insert">
                        
                        <div class="card-body" >
                        
							
								 
			 

							
                                <div class="row clearfix">
                                   <div class="form-group   col-lg-2 col-md-2 col-sm-5 mt-sm-2 text-right">
                                       <label class='text-right'>NIK Pemohon</label> 
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name='f[nik]' required   required class="form-control" />
                                            </div>
                                        </div>
                                    </div>
									
									 <div class="form-group   col-lg-2 col-md-2 col-sm-5 mt-sm-2 text-right">
                                       <label for="email">  Email  </label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line"> 
												
												 <input type="mail" name='f[email]'  required  class="form-control" />	 
											</div>
                                        </div>
                                    </div> 
									
									
                                </div>  
							 
								<div class="row  clearfix">
								     
									  <div class="form-group form-show-validation  col-lg-2 col-md-2 col-sm-5 mt-sm-2 text-right">
                                        <label for="nik" >  Nama Pemohon</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name='f[nama]' required   required class="form-control" />
                                            </div>
                                        </div>
                                    </div>
									

                                  
									<div class="form-group   col-lg-2 col-md-2 col-sm-5 mt-sm-2 text-right">
                                       <label for="hp"  >  Nomor Hp  </label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line"> 
												
												 <input type="text" name='f[hp]'  required  class="form-control" />	 
											</div>
                                        </div>
                                    </div> 
									
									
                                </div>
								
								  
								 
								
								 <div class="row clearfix">
                                  <div class="form-group   col-lg-2 col-md-2 col-sm-5 mt-sm-2 text-right">
                                        <label for="password_2">  Instansi/lembaga  </label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line"> 
												 <input type="text" name='f[lembaga]' required   class="form-control" />	 
											</div>
                                        </div>
                                    </div> 
                                
                                   <div class="form-group   col-lg-2 col-md-2 col-sm-5 mt-sm-2 text-right">
                                        <label for="password_2">  Kategory  </label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line"> 
												<?php
												$datak=$this->db->get("tr_kategory")->result();
												foreach($datak as $val)
												{
													$opsi[$val->id]=$val->nama;
												}
												echo form_dropdown("f[id_kategory]",$opsi,"","data-live-search='true' required class='select form-control'");
												?>
											</div>
                                        </div>
                                    </div> 
                                </div>
								
								 
								 
                                    
									
								 
									
							 <div class="row clearfix">		
								  <div class="form-group   col-lg-2 col-md-2 col-sm-5 mt-sm-2 text-right">
                                        <label for="password_2">  <b>Jumlah Pagi</b></label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                            
												 <input type="text" name='jml_pagi'    class="form-control" />	 
												 
                                            </div>
                                        </div>
                                    </div>
									
								 
									
                                		
							 	
							  <div class="form-group   col-lg-2 col-md-2 col-sm-5 mt-sm-2 text-right">
                                        <label for="password_2">  <b>Jumlah Sore</b></label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                            
												 <input type="text" name='jml_sore'   class="form-control" />	 
												 
                                            </div>
                                        </div>
                                    </div> 
                        </div> 
                              
								 
                                
						 <div class="row clearfix">			
								<div class="form-group   col-lg-2 col-md-2 col-sm-5 mt-sm-2 text-right">
                                        <label for="password_2">  <b>Keterangan</b></label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                            <input type="text" class="form-control" name='f[ket]'/>  
                                            </div>
                                        </div>
                                    </div>			
                  </div>			
								 
								
								  
  <div > 
            </div>
			 
							 
							 
								
                                   <div class="col-md-12"><center>
								<button onclick="submitForm('formSubmit')"  class="  btn btn-primary  waves-effect fa fa-save">   Simpan </button> </button>
                                 </center>   </div>
                                 <div class="rows">&nbsp;</div>
								 <br>
                            
                        </div>
                    </div>
					</form>
                </div>
            </div>
			
		<script>
$("select").selectpicker();	
function reload_table()
{
}	
		</script>	
		
		
		
		
		