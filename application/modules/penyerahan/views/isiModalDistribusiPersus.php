<?php
$id		=	$this->input->get_post("id");
$jml	=	count($this->m_reff->clearkomaray($id));
$tgl	=	date("Y-m-d");
$target	=	$this->m_reff->tm_pengaturan(1);
$durasi	=	10;
$end	=	$this->tanggal->tambahTgl($tgl,$durasi);
$range				=	"";	
$data_jmlDistribusi	=	"";
$akanDistribusi		=	"";
$data_tanggal		=	"";
$defauld			=	"";
for($i=0;$i<$durasi;$i++)
{	
	$tgli				=	$this->tanggal->tambahTgl($tgl,$i);
	$tanggal			=	$this->tanggal->hariLengkap($tgli,"/");
	$jmlDistribusi		=	  $this->mdl->jmlDistribusi($tgli);
	$data_jmlDistribusi.=	$jmlDistribusi.",";
	$akanDistribusi.=		$jml.",";
	$data_tanggal.= "'".$tanggal."',";

	
}


$defauld=" {
        name: 'Telah distribusi',
        data: [".$data_jmlDistribusi."]
    },";
	
$tambahan=" {
        name: 'Akan distribusi',
        data: [".$akanDistribusi."]
    },";

?>
<center>

<label class="selectgroup-item">
														<input name="value" value="JavaScript" class="selectgroup-input" type="checkbox" checked>
														<span class="selectgroup-button">  <?php echo $jml;?> data Terpilih</span>
													</label>
  </center><hr>

<div id="progress_distribusi"></div>
 <br>

<script>

 Highcharts.chart('progress_distribusi', {
    chart: {
        type: 'column',
		 
    },
	 
    title: {
        text: 'Maksimal perhari : <?php echo $target;?> distribusi'
    }, subtitle: {
        text: 'Silahkan klik pada batang diagram untuk menentukan tanggal distribusi'
    },
    xAxis: {
        categories: [<?php echo $data_tanggal?>]
    },
    yAxis: {
        min: 0,
        title: {
            text: ' '
        },
        stackLabels: {
            enabled: true,
            style: {
                fontWeight: 'bold',
                color: ( // theme
                    Highcharts.defaultOptions.title.style &&
                    Highcharts.defaultOptions.title.style.color
                ) || 'gray'
            }
        }
    },
    legend: {
        align: 'center',
       
        verticalAlign: 'bottom',
       
        shadow: false
    },
    tooltip: {
        headerFormat: '<b>{point.x}</b><br/>',
        pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
    },
    plotOptions: {
        column: {
            stacking: 'normal',
            dataLabels: {
                enabled: true
            }
        },
		 series: {
            cursor: 'pointer',
            point: {
                events: {
                    click: function () {
                        confirm(this.category);
                    }
                }
            }
        }
    },
    series: [<?php echo $tambahan; ?><?php echo $defauld; ?> ]
});
</script>

<script>
function confirm(tgl){
swal({
						title: 'siap dijadwalkan ?',
						text: "<?php echo $jml;?> pemohon untuk hari "+tgl,
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
						/*	swal("<?php echo $jml;?> pemohon telah dijadwalkan", {
								icon: "success",
								buttons : {
									confirm : {
										className: 'btn btn-success'
									}
								}
							});
									 swal({
									  title: "Checking...",
									  text: "Please wait",
									  imageUrl: "<?php echo base_url()?>plug/img/loader.gif",
									  showConfirmButton: false,
									  allowOutsideClick: false
									});*/
							jadwalkan2(tgl);
							
						}  
					});
				}
</script>
<script>
function jadwalkan(tgl)
	{	
		 var id	= "<?php echo $id;?>";
		 loading("mdl_modal");
		 $.post("<?php echo site_url("distribusi/setDistribsi"); ?>",{id:id,tgl:tgl},function(data){
			 $("#mdl_modal").modal("hide");
		  reload_table();
		 window.swal({
                      title: "Finished!",
                      showConfirmButton: false,
                      timer: 1000
                    });
		 });
	}
</script>











<div class="form-group row" id="process" style="display:none;">
        <div class="progress">
       <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="">
       </div>
       </div>
  </div>


<div id="report" class="alert alert-danger">Mohon tunggu...</div>





<script>
 
  $("#report").hide();
function jadwalkan2(tgl){
	var durasi =<?php echo (40/$jml);?>;
 //  event.preventDefault();
 $("#progress_distribusi").html("");
   var count_error = 0;
 var id	= "<?php echo $id;?>";
    $.ajax({
     url:"<?php echo site_url("distribusi/setDistribusi"); ?>",
     method:"POST",
     data:{id:id,tgl:tgl},
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
