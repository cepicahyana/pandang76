      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  id="area_formSubmit">
				
                    <div class="card">
					<div class="card-header" >
									<div class="card-title"> SINKRONISASI DATA KEHADIRAN </div> 
					</div>
				
			 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  id="area_formSubmitDurasi">
				
                  
					  <form class="form-horizontal" id="formSubmit" action="javascript:submitFormDurasi('formSubmit')"
							method="post" url="<?php echo base_url()?>zoom/import_durasi">
                        
                        <div class="card-body" >
                         
                                <div class="  clearfix col-md-12">
                                
								</div>
                                <div class="row clearfix">
                      
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line">  
												 <input type="file" required name='file'  class="form-control"/>	 
											</div>
                                        </div>
									<center>	  <button onclick="submitFormDurasi('formSubmit')"  class=" btn-sm btn btn-primary  waves-effect fa fa-upload">   Upload </button></center> 
                                    </div> 
									
									 
									
                                </div>  
                      </div>  
					   <div class="rows" id="hasil">&nbsp;</div>
								 <br>
                            
                         
					</form>
					
					
                                   </div>
					</div>
	 </div>
					
				 	
					 
					 
					 
					 

                                
                   
       </div>  
        
		
		<script> 
function submitFormDurasi(id)
{		
		var form = $("#"+id);
		var link = $(form).attr("url");
	 
		$(form).ajaxForm({
		 url:link,
		 data: $(form).serialize(),
		 method:"POST",
		 dataType:"JSON",
		 beforeSend: function() {
               loading("area_formSubmitDurasi");
            },
		 success: function(data)
				{ 	unblock("area_formSubmitDurasi"); 	
					if(data["gagal"]==true)
					{	  
							notif(data["info"]);
					} else{
					  $("#"+id)[0].reset(); 
					   
					  berhasil_disimpan(); 
					  $("#hasil").html(data.info);
					}
					 			
				}
		});     
}; 	</script>