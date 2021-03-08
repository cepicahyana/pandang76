<?php
$id		=	$this->input->get_post("val");
$jml	=	count($this->m_reff->clearhasray($id));
?>
<div class='col-md-12' id="load_viewKonten">
<ul class="nav nav-pills nav-secondary" id="pills-tab" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Bahasa Indonesia</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Bahasa Inggris</a>
										</li>
										 
									</ul>
									<div class="tab-content mt-2 mb-3" id="pills-tabContent">
										<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
											<div id="viewKonten"></div>
										 </div>
										<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
											 <div id="viewKonten_english"></div>
										</div>
										 
									</div>
 



</div>


							 

<script>
viewKonten();
function viewKonten()
{		
			$("#viewKonten").html("mohon tunggu..."); 
		$.post("<?php echo base_url()?>zoom/viewKontenOnline",function(data){ 
			$("#viewKonten").html(data); 
		});
}

viewKonten_english();
function viewKonten_english()
{		
			$("#viewKonten_english").html("mohon tunggu..."); 
		$.post("<?php echo base_url()?>zoom/viewKontenOnline_english",function(data){ 
			$("#viewKonten_english").html(data); 
		});
}
function editKonten()
{				loading("load_viewKonten"); 
				$.post("<?php echo base_url()?>zoom/editKontenOnline",function(data){ 
				$("#viewKonten").html(data); 
				unblock("load_viewKonten");
		});
}function editKonten_english()
{				loading("load_viewKonten"); 
				$.post("<?php echo base_url()?>zoom/editKontenOnline_english",function(data){ 
				$("#viewKonten_english").html(data); 
				unblock("load_viewKonten");
		});
}



var jml="<?php echo $jml;?>";
function confirm(){
swal({
						title: 'Kirim notifikasi  ?',
						text: '<?php echo $jml;?> data terpilih',
						type: 'warning',
						buttons:{
							cancel: {
								visible: true,
								text : 'batal',
								className: 'btn btn-danger'
							},        			
							confirm: {
								text : 'Ya',
								className : 'btn btn-success'
							}
						}
					}).then((willDelete) => {
						if (willDelete) {
					        $("#mdl_konfirm").modal("show");
							jadwalkan2();
						 
						}else{
						  ///  alert();
						}
					});
				}
</script>
 

 <div class="row  card-body">
     
  <div class="col-md-12 card-body">
<div class="form-group row" id="process" style="display:none;">
        <div class="progress">
       <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="">
       </div>
       </div>
  </div>


<div id="report" class="alert alert-danger">Mohon tunggu...</div>
</div>
</div>



<script>
 
  $("#report").hide();
function jadwalkan2(){
	var subject		= "";
	var kontent		= "";
	var durasi	    =<?php echo (150/$jml);?>;
 //  event.preventDefault();
 $("#progress_distribusi").html("");
   var count_error = 0;
 var id	= "<?php echo $id;?>";
    $.ajax({
     url:"<?php echo site_url("zoom/setBroadcastOnline"); ?>",
     method:"POST",
     data:{id:id,subject:subject,kontent:kontent},
     beforeSend:function()
     {
      $('#save').attr('disabled', 'disabled');
      $('#process').css('display', 'block');
	  var percentage = 0;

      var timer = setInterval(function(){
       percentage = percentage + durasi;
       progress_bar_process(percentage, timer);
      }, 1000);
     },
     success:function(data)
     {
      $("#report").html(data);
     }
    })
 
   }
  

  function progress_bar_process(percentage, timer)
  {
   $('.progress-bar').css('width', percentage + '%');
   if(percentage > 100)
   {	  $("#report").show();
	   // reload_table();
	 /*   $("#mdl_modal").modal("hide");
		 
		 window.swal({
                      title: "Finished!",
                      showConfirmButton: false,
                      timer: 1000
                    });
	*/				
    clearInterval(timer);
    $('#sample_form')[0].reset();
    $('#process').css('display', 'none');
    $('.progress-bar').css('width', '0%');
    $('#save').attr('disabled', false);
    $('#success_message').html("<div class='alert alert-success'>Data Saved</div>");
    setTimeout(function(){
     $('#success_message').html('');
    }, 5000);
   }
  }


</script>
