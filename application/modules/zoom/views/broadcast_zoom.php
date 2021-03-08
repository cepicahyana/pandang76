
<div class='col-md-12' id="load_viewKonten">

<div id="viewKonten">

</div>



</div>


 <?php
  $id		=	$this->input->get_post("val");
$jml	=	count($this->m_reff->clearhasray($id));
?>			 

<script>
viewKonten();
function viewKonten()
{		
			$("#viewKonten").html("mohon tunggu..."); 
		$.post("<?php echo base_url()?>zoom/viewKontenGiven",function(data){ 
			$("#viewKonten").html(data); 
		});
}
function editKonten()
{				loading("load_viewKonten"); 
				$.post("<?php echo base_url()?>zoom/editKontenGiven",function(data){ 
				$("#viewKonten").html(data); 
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
	var jml			="<?php echo $jml; ?>";
	
	/*if(durasi<=4)
	{
		durasi		=	35;
	}else if(durasi<=4)
	{
		durasi		=	30;
	}else if(durasi<=3)
	{
		durasi		=	25;
	}else if(durasi<=2)
	{
		durasi		=	20;
	}else if(durasi<=1)
	{
		durasi		=	15;
	}
	alert(durasi);*/
 //  event.preventDefault();
 $("#progress_distribusi").html("");
   var count_error = 0;
 var id	= "<?php echo $id;?>";
    $.ajax({
     url:"<?php echo site_url("zoom/setBroadcast"); ?>",
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
	  //  reload_table();
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
