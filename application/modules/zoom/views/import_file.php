 Import data 
 <hr>
 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  id="area_formSubmitZoom">
				
                  
					  <form class="form-horizontal" id="formSubmit" action="javascript:submitFormZoom('formSubmit')"
							method="post" url="<?php echo base_url()?>zoom/import_zoom">
                        
                        <div class="card-body" >
                         
                                <div class="  clearfix col-md-12">
                                <center>
								<a style="margin-left:30px" href="<?php echo base_url()?>format_vcon.xlsx"  ><i class='fa fa-download'></i> Download Format File</a>
								</center> 
								</div>
                                <div class="row clearfix">
                      
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="form-line">  
												 <input type="file" required name='file'  class="form-control"/>	 
											</div>
                                        </div>
									<center>	  <button onclick="submitFormZoom('formSubmit')"  class=" btn-sm btn btn-primary  waves-effect fa fa-upload">   Upload </button></center> 
                                    </div> 
									
									 
									
                                </div>  
                      </div>  
					
                                   </div>
                                 <div class="rows" id="hasil">&nbsp;</div>
								 <br>
                            
                         
					</form>
                   
       </div>  
        
		
		<script> 
function submitFormZoom(id)
{		
		var form = $("#"+id);
		var link = $(form).attr("url");
	 
		$(form).ajaxForm({
		 url:link,
		 data: $(form).serialize(),
		 method:"POST",
		 dataType:"JSON",
		 beforeSend: function() {
               loading("area_formSubmitZoom");
            },
		 success: function(data)
				{ 	unblock("area_formSubmitZoom"); 	
					if(data["gagal"]==true)
					{	  
							notif(data["info"]);
					} else{
					  $("#"+id)[0].reset(); 
					  reload_table();
					  berhasil_disimpan(); 
					  $("#hasil").html(data.info);
					}
					 			
				}
		});     
}; 	</script>