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
							method="post" url="<?php echo base_url()?>registrasi/insert_persus_souvenir">
                        
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
                                       <label for="hp"  >  Nomor Hp  </label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line"> 
												
												 <input type="text" name='f[hp]' required    class="form-control" />	 
											</div>
                                        </div>
                                    </div> 
                                                   
									
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
									
									
									
                                </div>  
							 
								 <div class="row clearfix">	
																	
									
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
								 
								  
						 
												 
							
                         
								<hr>
								 <div class="row clearfix  " id='jml'>		
								  <div class="form-group   col-lg-1 col-md-1 col-sm-5 mt-sm-2 text-right">
                                        <label for="password_2">  <b>VVIP</b></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                            
												 <input type="number" name='f[souvenir_1]'    class="form-control" />	 
												 
                                            </div>
                                        </div>
                                    </div>
									
								 
									
                                		
							 	
								<div class="form-group   col-lg-1 col-md-1 col-sm-5 mt-sm-2 text-right">
                                        <label for="password_2">  <b>VIP</b></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                            
												 <input type="number" name='f[souvenir_2]'   class="form-control" />	 
												 
                                            </div>
                                        </div>
                                    </div> 
								
                                		
							 	
								<div class="form-group   col-lg-1 col-md-1 col-sm-5 mt-sm-2 text-right">
                                        <label for="password_2">  <b>UMUM</b></label>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                            
												 <input type="number" name='f[souvenir_3]'   class="form-control" />	 
												 
                                            </div>
                                        </div>
                                    </div> 
								 		
								  <div class="form-group   col-lg-2 col-md-2 col-sm-5 mt-sm-2 text-right">
                                        <label for="password_2">  <b>Undangan Pagi</b></label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                            
												 <input type="number" name='f[jml_pagi]'    class="form-control" />	 
												 
                                            </div>
                                        </div>
                                    </div>
									
								 
									
                                		
							 	
								<div class="form-group   col-lg-2 col-md-2 col-sm-5 mt-sm-2 text-right">
                                        <label for="password_2">  <b>Undangan Sore</b></label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                            
												 <input type="number" name='f[jml_sore]'   class="form-control" />	 
												 
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
		
		
		
		
		