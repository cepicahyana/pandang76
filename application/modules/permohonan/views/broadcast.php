<?php
$id		=	$this->input->get_post("val");
$jml	=	count($this->m_reff->clearkomaray($id));
?>

<script>
confirm();
var jml="<?php echo $jml;?>";
function confirm(){
swal({
						title: 'Kirim ulang notifikasi  ?',
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
	var durasi =<?php echo (40/$jml);?>;
 //  event.preventDefault();
 $("#progress_distribusi").html("");
   var count_error = 0;
 var id	= "<?php echo $id;?>";
    $.ajax({
     url:"<?php echo site_url("permohonan/setBroadcast"); ?>",
     method:"POST",
     data:{id:id},
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
	    reload_table();
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
