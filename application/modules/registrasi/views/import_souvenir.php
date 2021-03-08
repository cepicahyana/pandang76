 <style>
     .tag{
         font-size:14px;
     }
 </style>
  
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  id="area_formSubmit">
				
                    <div class="card">
					<div class="card-header">
									<div class="card-title">Import data </div>
								

							</div>
					  <form class="form-horizontal" id="formSubmit" action="javascript:submitFormAkun('formSubmit')"
							method="post" url="<?php echo base_url()?>registrasi/import_persus_souvenir">
                        
                        <div class="card-body" >
                        
							
								
			            
				
							
                                <div class="  clearfix col-md-6">
                                <center>
								<a style="margin-left:30px" href="<?php echo base_url()?>format_souvenir.xlsx"  ><i class='fa fa-download'></i> Download Format File</a>
								</center><br>
								</div>
                                <div class="row clearfix">
                     
                                        
									
									 <div class="form-group   col-lg-2 col-md-2 col-sm-5 mt-sm-2 text-right">
                                       <label for="Upload"> Upload File  </label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line"> 
												
												 <input type="file" required name='file'     class="form-control"/>	 
											</div>
                                        </div>
                                    </div> 
									
									 
									
                                </div>  
							 
								 
					 
								  
  <div > 
            </div>
			 
							<hr> 
							 
								
                                   <div class="col-md-12"><center>
								<button onclick="submitFormAkun('formSubmit')"  class="  btn btn-primary  waves-effect fa fa-upload">   Upload </button> </button>
                                 </center>   </div>
                                 <div class="rows">&nbsp;</div>
								 <br>
                            
                        </div>
                    </div>
					</form>
                </div>
            
			
		<script>
function reload_table()
{
}	
 
		</script>	
		
		
		
		
		