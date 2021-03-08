 
 <div class="row clearfix" id="area_formSubmit">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
					  <form class="form-horizontal" id="formSubmit" action="javascript:submitForm('formSubmit')"
							method="post" url="<?php echo base_url()?>registrasi/insert">
                        
                        <div class="body" >
                        
							

			 

							
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 form-control-label">
                                        <label for="password_2">Nomor NIK</label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name='f[nik]'   required class="form-control" >
                                            </div>
                                        </div>
                                    </div>
									
									 <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 form-control-label">
                                        <label for="password_2">  Email  </label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line"> 
												
												 <input type="mail" name='f[email]'    class="form-control" >	 
											</div>
                                        </div>
                                    </div> 
									
									
                                </div>  
							 
								<div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 form-control-label">
                                        <label for="password_2">  Nama Penanggung Jawab  </label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line"> 
												
												 <input type="text" name='f[nama]'    class="form-control" >	 
											</div>
                                        </div>
                                    </div> 
									 <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 form-control-label">
                                        <label for="password_2">  Telp  </label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line"> 
												
												 <input type="text" name='f[hp]'    class="form-control" >	 
											</div>
                                        </div>
                                    </div>
                                </div>
								
								  
								 
								
								 <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 form-control-label">
                                        <label for="password_2">  Kategory  </label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line"> 
												<?php
												$datak=$this->db->get("tr_kategory")->result();
												foreach($datak as $val)
												{
													$opsi[$val->id]=$val->nama;
												}
												echo form_dropdown("f[id_kategory]",$opsi,"","data-live-search='true' class='select form-control'");
												?>
											</div>
                                        </div>
                                    </div> 
                                </div>
								
								 
								 <div class="row clearfix">
                                    
									
								 
									
							 <div class="row clearfix">		
								<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-control-label">
                                        <label for="password_2">  <b>JML PAGI</b></label>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                            
												 <input type="text" name='jml_pagi'    class="form-control" >	 
												 
                                            </div>
                                        </div>
                                    </div>
									
									<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-control-label">
                                        <label for="password_2">  <b>DOUBEL</b></label>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                            
												 <input type="text" name='pagi_double'    class="form-control" >	 
												 
                                            </div>
                                        </div>
                                    </div>
									
								<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-control-label">
                                        <label for="password_2">  <b>SINGLE</b></label>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                            
												 <input type="text" name='sore_single'  class="form-control" >	 
												 
                                            </div>
                                        </div>
                                    </div>
                             </div>
									
                                		
							 <div class="row clearfix">		
								<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-control-label">
                                        <label for="password_2">  <b>JML SORE</b></label>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                            
												 <input type="text" name='jml_sore'   class="form-control" >	 
												 
                                            </div>
                                        </div>
                                    </div>
									
									<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-control-label">
                                        <label for="password_2">  <b>DOUBEL</b></label>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                            
												 <input type="text" name='sore_double'   class="form-control" >	 
												 
                                            </div>
                                        </div>
                                    </div>
									
								<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-control-label">
                                        <label for="password_2">  <b>SINGLE</b></label>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                            
												 <input type="text" name='sore_single'  class="form-control" >	 
												 
                                            </div>
                                        </div>
                                    </div>
                             </div>
									
                                
						 <div class="row clearfix">			
								 <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 form-control-label">
                                        <label for="password_2">  <b>KETERANGAN</b></label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                            <textarea class="form-control" name='f[ket]'></textarea>  
                                            </div>
                                        </div>
                                    </div>			
                  </div>			
								 
								
								  
  <div > 
            </div>
			 
							 
							 
								
                                   <div class="col-md-12">
								<button onclick="submitForm('formSubmit')"  class="pull-right btn bg-teal  waves-effect"> <i class="material-icons">save</i> SIMPAN INPUTAN</button> </button>
                                    </div>
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
	 