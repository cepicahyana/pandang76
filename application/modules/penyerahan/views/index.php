 
 <div style="margin-top:-50px">
 <center>
 <span style='color:white'>Pencarian : NIK / Nomor HP / Email</span>
 
 
 
 <div class="input-group mb-3">
													<input type="text" class="form-control"    name='kode' value="" onchange="kode(this.value)">
													<div class="input-group-append">
														<span class="input-group-text fa fa-undo cursor" onclick='resset()' id="basic-addon2"> RESSET</span>
													</div>
												</div>
 
 
 
 </center>
 </div> 
 <div class="  clearfix col-md-12">&nbsp;</div>
  <div class='row col-md-12'> 
 <br> 
<div id="data" class=" "></div>
 		
</div>			
		 
<script>	 
$("[name='kode']").focus();
function resset()
{
	$("[name='kode']").val("");
	$("[name='kode']").focus();
	$("#data").html("");
}
function kode(kode)
{
        	loading();
			var url="<?php echo base_url();?>penyerahan/getData"; 
			$.post(url,{ kode:kode},function(data){
				$("#data").html(data);
			 	unblock(); 
						  $("#kod11").focus();
			  });
}
</script>	 




  