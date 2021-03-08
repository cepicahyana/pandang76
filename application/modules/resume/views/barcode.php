<style>
a{
	color:black;
}
</style>
<?php $con=new umum(); 
$event=$this->event->dataEvent($id);
 
if(!isset($event)){ redirect('myevent'); }; 

$jmlKolom=$this->event->jmlKolom($event->id_form); 
$order="";
for($i=1;$i<=($jmlKolom+1);$i++)
{
$order.=$i.",";
$order=$order;
}


$dataForm=$this->event->getDataForm($event->id_form); ?> 
<?php

$date=$this->db->query("SELECT DISTINCT(SUBSTR(tgl,1,10)) AS tgl FROM data_peserta where id_event='".$id."' order by tgl asc")->result();
$dat=$this->db->query("SELECT SUBSTR(startdate,1,10) as startdate,SUBSTR(enddate,1,10) as enddate FROM data_event where id_event='".$id."'")->row();
$selisih=$this->tanggal->selisih($dat->startdate,$dat->enddate);
$dbase[]=array();
$dbasex[]=array();

$tglin=date("Y-m-d H:i:s");
if($tglin<=date("Y-m-d 14:00:00"))
{
  $sd=$this->session->set_userdata("dates",1);
  $value="1";
}else{
	  $sd=$this->session->set_userdata("dates",2);
	    $value="2";
}
 
if(!$sd)
{
$this->session->set_userdata(array("date"=>1));
}

for($i=0;$i<=$selisih;$i++)
		{
		$tgl = mktime(0, 0, 0, SUBSTR($dat->enddate,5,2), SUBSTR($dat->enddate,8,2)-$i, SUBSTR($dat->enddate,0,4));
		$tglE=date("Y-m-d", $tgl);
		$tgl=date("Y-m-d", $tgl);
$dbase[$tglE]="Absen Hari ".$this->tanggal->hariLengkap($tgl,"/");
}


 ?>
</div>
 
 
<?php
$dbm=$this->db->query("select mode from data_event where id_event='".$id."'")->row();
$dbm=isset($dbm->mode)?($dbm->mode):1;
if($dbm==1)
{?>
<a style="margin-top:-10px" class="hide btn btn-danger " href="javascript:mode(<?php echo $id;?>)">Mode Operator</a>
<?php } ?>
 
 
 
  
<script type="text/javascript" src="<?php echo base_url();?>plug/js/barcode.js"></script>
 <!-- Bootstrap modal -->
  <div class="modal fade" id="barcode" role="dialog" onclick="barcodeHide()">
 <div class="modal-dialog">
      <div class="modal-barcode">
      
    </div><!-- /.modal -->
    </div><!-- /.modal -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->
  <script>
  function pb(id)
	{
    // ajax delete data to database
          $.ajax({
            url : "<?php echo base_url();?>myevent/getPb/"+id,
            type: "POST",
            data: "JSON",
            success: function(data)
            {
			var dt=data.split("::");
            var idp=$("#idPeserta").val(dt[0]);
            var vket=$(".pb").val(dt[1]);
            $(".tpb").html(dt[2]);
            $("#pb").modal("show");
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
	}	
	function sv(id)
	{
    // ajax delete data to database
          $.ajax({
            url : "<?php echo base_url();?>myevent/getSv/"+id,
            type: "POST",
            data: "JSON",
            success: function(data)
            {
			var dt=data.split("::");
            var idp=$("#idPeserta").val(dt[0]);
            var vket=$(".sv").val(dt[1]);
			   $(".tsv").html(dt[2]);
            $("#sv").modal("show");
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
	}	  
	
	function blokan(id)
	{
            $.ajax({
            url : "<?php echo base_url();?>myevent/getBlok/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
				var idp=$("#idblokan").val(data["id"]);
				var vket=$(".blokan").val(data["blok"]);
				$("#blokan").modal("show");
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
	}	  
	
	function berlakukan(id)
	{
            $.ajax({
            url : "<?php echo base_url();?>myevent/getberlaku/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
				var idp=$("#idberlaku").val(data["id"]);
				var vket=$(".berlaku").val(data["berlaku"]);
				$("#berlakukan").modal("show");
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
	}	  
	
	
	function pic(id)
	{
            $.ajax({
            url : "<?php echo base_url();?>myevent/getpic/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
				var idp=$("#idpic").val(data["id"]);
				var vket=$(".pic").val(data["pic"]);
				$("#pican").modal("show");
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
	}	  
	
	function makan(id)
	{
    // ajax delete data to database
          $.ajax({
            url : "<?php echo base_url();?>myevent/getMakan/"+id,
            type: "POST",
            data: "JSON",
            success: function(data)
            {
			var dt=data.split("::");
            var idp=$("#idPeserta").val(dt[0]);
            var vket=$(".makan").val(dt[1]);
			   $(".tmakan").html(dt[2]);
            $("#makan").modal("show");
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
	}	  
	function ket(id)
	{
    // ajax delete data to database
          $.ajax({
            url : "<?php echo base_url();?>myevent/getKet/"+id,
            type: "POST",
            data: "JSON",
            success: function(data)
            {
			var dt=data.split("::");
            var idp=$("#idPeserta").val(dt[0]);
            var vket=$(".vket").val(dt[1]);
            $("#ket").modal("show");
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
	}	
	
	function saveSv()
	{
	var idp=$("#idPeserta").val();
	var makan=$(".sv").val();
	// ajax delete data to database
          $.ajax({
            url : "<?php echo base_url();?>myevent/saveSv",
            type: "POST",
            data: "idPeserta="+idp+"&sv="+makan,
            success: function(data)
            {
              reload_table()
              $("#sv").modal("hide");
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
	}	
	
	function savePb()
	{
	var idp=$("#idPeserta").val();
	var makan=$(".pb").val();
	// ajax delete data to database
          $.ajax({
            url : "<?php echo base_url();?>myevent/savePb",
            type: "POST",
            data: "idPeserta="+idp+"&pb="+makan,
            success: function(data)
            {
              reload_table()
              $("#pb").modal("hide");
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
	}	
	
	function saveblokan()
	{
	var idp=$("#idblokan").val();
	var param=$(".blokan").val();
	// ajax delete data to database
          $.ajax({
            url : "<?php echo base_url();?>myevent/saveblokan",
            type: "POST",
            data: "idPeserta="+idp+"&blok="+param,
            success: function(data)
            {
              reload_table()
              $("#blokan").modal("hide");
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
	}	
	
	function savepic()
	{
	var idp=$("#idpic").val();
	var param=$(".pic").val();
	// ajax delete data to database
          $.ajax({
            url : "<?php echo base_url();?>myevent/savepic",
            type: "POST",
            data: "idPeserta="+idp+"&pic="+param,
            success: function(data)
            {
              reload_table()
              $("#pican").modal("hide");
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
	}	
	
	function saveberlaku()
	{
	var idp=$("#idberlaku").val();
	var param=$(".berlaku").val();
	// ajax delete data to database
          $.ajax({
            url : "<?php echo base_url();?>myevent/saveberlaku",
            type: "POST",
            data: "idPeserta="+idp+"&berlaku="+param,
            success: function(data)
            {
              reload_table()
              $("#berlakukan").modal("hide");
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
	}	
	
	
	function saveMakan()
	{
	var idp=$("#idPeserta").val();
	var makan=$(".makan").val();
	// ajax delete data to database
          $.ajax({
            url : "<?php echo base_url();?>myevent/saveMakan",
            type: "POST",
            data: "idPeserta="+idp+"&makan="+makan,
            success: function(data)
            {
              reload_table()
              $("#makan").modal("hide");
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
	}	
	
	function saveket()
	{
	var idp=$("#idPeserta").val();
	var vket=$(".vket").val();
	// ajax delete data to database
          $.ajax({
            url : "<?php echo base_url();?>myevent/saveket",
            type: "POST",
            data: "idPeserta="+idp+"&ket="+vket,
            success: function(data)
            {
              reload_table()
              $("#ket").modal("hide");
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
	}
  </script>
 
 <!--- <center >
  <div style="width:50%">
  
  <select class="form-control" name="jenis" id="jenis">
  <option value="1">PAGI</option>
  <option value="2">SORE</option>
  </select>
    <br>
    <br>
  <input type="text" name="pjawab" placeholder="Penanggung jawab..." class="form-control">
    <br>
	 <input type="text" placeholder="scand barcode disini..." name="regbar" id="regbar" class="form-control">
	</div>
  </center>
  <br>
 <!-- Bootstrap modal -->
  <div class="modal fade" id="sv" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title black"><b>Jam Scand</b></h4>
      </div>
      <div class="modal-body form">
	  <input type="hidden" id="idPeserta">
        <input type="text" class="form-control sv"></input><br>
		 <div class="tsv"></div><br>
		<button class='btn btn-primary' onclick="saveSv()">simpan</button>
      </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->    
 <!-- Bootstrap modal -->
  <div class="modal fade" id="pb" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title black"><b>Jam Scand</b></h4>
      </div>
      <div class="modal-body form">
	  <input type="hidden" id="idPeserta">
        <input type="text" class="form-control pb"></input><br>
        <div class="tpb"></div><br>
		<button class='btn btn-primary' onclick="savePb()">simpan</button>
      </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->    
  
 <!-- Bootstrap modal -->
  <div class="modal fade" id="makan" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title black"><b>Jam Scand</b></h4>
      </div>
      <div class="modal-body form">
	  <input type="hidden" id="idPeserta">
        <input type="text" class="form-control makan"></input><br>
		   <div class="tmakan"></div><br>
		<button class='btn btn-primary' onclick="saveMakan()">simpan</button>
      </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->  
  
  
  
  
  <!-- Bootstrap modal -->
  <div class="modal fade" id="pican" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title black"><b>PIC</b></h4>
      </div>
      <div class="modal-body form">
		<input type="hidden" id="idpic">
        <input type="text" class="form-control pic"></input><br>
		  
		<button class='btn btn-primary' onclick="savepic()">simpan</button>
      </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->  
  
  
   
  
  
  <!-- Bootstrap modal -->
  <div class="modal fade" id="blokan" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title black"><b>BLOK</b></h4>
      </div>
      <div class="modal-body form">
		<input type="hidden" id="idblokan">
        <input type="text" class="form-control blokan"></input><br>
		  
		<button class='btn btn-primary' onclick="saveblokan()">simpan</button>
      </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->  
  
  
    
  
  <!-- Bootstrap modal -->
  <div class="modal fade" id="berlakukan" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title black"><b>PENANGGUNG JAWAB</b></h4>
      </div>
      <div class="modal-body form">
		<input type="hidden" id="idberlaku">
        <input type="text" class="form-control berlaku"></input><br>
		  
		<button class='btn btn-primary' onclick="saveberlaku()">simpan</button>
      </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->  
  
  
   
  
  
  
  
  <!-- Bootstrap modal -->
  <div class="modal fade" id="ket" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title black"><b>Class</b></h4>
      </div>
      <div class="modal-body form">
	  <input type="hidden" id="idPeserta">
        <input type="text" class="form-control vket"></input><br>
		<button class='btn btn-primary' onclick="saveket()">simpan</button>
      </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->  
  
  
  

 
 
 <script type="text/javascript">
      function generateBarcode(id){ 
	        var settings = {
			output:"bmp",
          bgColor: "#f9f9f9",
       //   color: $("#color").val(),
          barWidth: 2,
         // barHeight: $("#barHeight").val(),
        //  moduleSize: $("#moduleSize").val(),
         //posX:12,
        //  posY: $("#posY").val(),
        //  addQuietZone: $("#quietZoneSize").val()
        };

          $("#barcodeTarget").html("").show().barcode(id, "code128",settings);
          } 
  
    </script>
	
	
	
	
	
	
	
<script>	
function import_file(id)
    {
	
	  $('#modal_form_import').modal('show'); // show bootstrap modal

    }
</script>		
	
<script>	
function import_file_khusus(id)
    {
	
	  $('#modal_form_import_khusus').modal('show'); // show bootstrap modal

    }
</script>	
	
	
	
	
	 <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_edit" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title-edit black"><b>Edit</b></h4>
      </div>
      <div class="modal_edit form">
        
          
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
	</div>
  <!-- End Bootstrap modal -->	
	
	
	
	
	 <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title black"><b>Add Data Peserta</b></h4>
      </div>
      <div class="modal-body bodyx form">
        
          
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
	</div>
  <!-- End Bootstrap modal -->
	
	
	 
  
  
  
  
	<!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form_import_khusus" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <h4 class="modal-title black"><b>Import Data Peserta Format Khusus</b></h4>
      </div>
      <div class="modal-body form">
       
		 
 
      <!-- general form elements -->
      <div class="box box-primary">
        
          <div class="box-body">                      
            <form role="form" name="uploadfilexl_khusus" id="uploadfilexl_khusus" 
                  action="javascript:submitForm('uploadfilexl_khusus');" method="post" enctype="multipart/form-data" 
					url="<?php echo base_url()?>myevent/upload_file_barcode"
				  >
               
				   <br>
				 <input type="number" name="jml" class='form-control' placeholder='Jumlah cetak'>
				<br>
				<br>
                <button type="submit" onclick="javascript:submitForm('uploadfilexl_khusus');" class="btn pull-right bg-teal">
                    <i class="material-icons">refresh</i>&nbsp;Build
                </button>
				<br>
                <div class="form-group">
                    <div class="hasil_khusus"></div>
                    <div class="hasil_khusus_data"></div>
                </div>
            </form>
          </div><!-- /.box-body -->
      </div><!-- /.box -->
 
 
 

          </div>
           
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->
  

  <script type="text/javascript">
function simpanfile(){
	var load='<img src="<?php echo base_url();?>plug/img/load.gif" />';
    var userfile=$('#userfile').val();
	 var mode=$('[name="moderator"]').val();
    $('.hasil_akhir').html('');
    $('#uploadfilexl').ajaxForm({
     url:'<?php echo base_url();?>myevent/upload_file/<?php echo $this->uri->segment(3);?>',
     type: 'post',
      data:{"userfile":userfile,"mode":mode},
     beforeSend: function() {
        var percentVal = 'Mohon Tunggu ini berlangsung lama... ';
        $('.msg').html(percentVal);
     },
	 
     uploadProgress: function(event, position, total, percentComplete) {
        var percentVal = load+' Mohon Tunggu ini berlangsung lama... ';
        $('.hasil').html(percentVal);
     },
     beforeSubmit: function() {
      $('.hasil').html(load+' Mohon Tunggu ini berlangsung lama... ');
     },
     complete: function(xhr) {
        $('.hasil').html('');
		 reload_table();
     }, 
     success: function(resp) {
        $('.hasil').html(resp);
        $('.hasil_akhir').html(resp);
		$('[name="moderator"]').val(0);
		 
     },
    });     
};
</script>    	






<script type="text/javascript">
function simpanfile_khusus(){
	 $('.hasil_khusus_data').html('');
	var load='<img src="<?php echo base_url();?>plug/img/load.gif" />';
    var userfile=$('#userfile_khusus').val();
    var mode=$('[name="mode"]').val();
    
    $('#uploadfilexl_khusus').ajaxForm({
     url:'<?php echo base_url();?>myevent/upload_file_khusus/<?php echo $this->uri->segment(3);?>',
     type: 'post',
     data:{"userfile":userfile,"mode":mode},
     beforeSend: function() {
        var percentVal = 'Mohon Tunggu ini berlangsung lama... ';
        $('.msg_khusus').html(percentVal);
     },
	 
     uploadProgress: function(event, position, total, percentComplete) {
        var percentVal = load+' Mohon Tunggu ini berlangsung lama... ';
        $('.hasil_khusus').html(percentVal);
     },
     beforeSubmit: function() {
      $('.hasil_khusus').html(load+' Mohon Tunggu ini berlangsung lama... ');
     },
     complete: function(xhr) {
        $('.hasil_khusus').html('');
		 reload_table();
     }, 
     success: function(resp) {
     $('[name="mode"]').val(0);
        $('.hasil_khusus_data').html(resp);
     },
    });     
};
</script>    	











































               <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card" >
                        <div class="header"> 
						
						
                        
						 <div class="btn-group pull-right" role="group">
                         <button    onclick="import_file_khusus(<?php echo $id; ?>)" class="btn bg-teal waves-effect"><i class="material-icons">add</i>BUAT BARCODE </button>
                   <!--      <button    onclick="import_file(<?php echo $id; ?>)" class="btn bg-teal waves-effect"><i class="material-icons">file_download</i>IMPORT FORMAT 2</button>
                 <!--        <button onclick="add(<?php echo $id; ?>)"class=" waves-effect btn bg-blue-grey"><i class="material-icons">person_add</i> INPUT </button>
                 -->        <button onclick="reload_table()" class=" waves-effect btn bg-blue-grey"><i class="material-icons">refresh</i> REFRESH </button>
                         </div>
						
						
						<h2 class="sound">DATA TAMU</h2>
                           
                        </div>
						    <div class="body">
                           <div class="row clearfix">
	 
 
								
							 
						 
						    
                           </div>
						  
				 <div class="cards" id="area_lod">
			            <div class="body">
                            <div class="table-responsive">
<?php $date=date("Y-m-d");?>
						
<span style='color:black;position:absolute;margin-top:-20px;z-index:222' class="cursor btnhapus">
<!--<a href="#" onclick="hapusAll()" style="color:red"><i class='fa fa-trash'></i> Hapus </a>
 |--> <span style="bottom:0;position:fixed" class="hide bg-pink"><a style="col-cyan" href="#" onclick="cetak()"><i class='fa fa-print'></i> Barcode</a></span>
<?php
if($date!="2019-08-17"){?>	 
 <a class="col-pink"  href="#" onclick="hapus()"><i class='fa fa-print'></i> Hapus </a>
 | <?php } ?><a class="col-indigo" href="#" onclick="cetak()"><i class='fa fa-print'></i> Cetak Barcode</a> 
</span>


<form action="#" name="delcheck" id="delcheck" class="form-horizontal" method="post">
<table id='table' class="tabel black table-striped table-bordered table-hover dataTable">
		  	<thead style="background-color:#1ABC9C">	
<th class='thead col-white'   width='5px'>
  
                                <input type="checkbox" id="md_checkbox"  value="ya" class="pilihsemua filled-in chk-col-red"   />
                                <label for="md_checkbox" class="col-white">&nbsp;</label>
						 
</th>		
				<th class='thead' axis="string" width='15px'>No</th> 
			
				<th  class='thead'>BARCODE</th> 
			  	<th  class='thead' >STATUS CETAK</th> 
				
			</thead>
</table>
</form>
</div>
						</div>						
					</div>	
                           <!----->
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
				 
	 
		</div>
 
 
 
	
  <script type="text/javascript">
	 
   var  dataTable = $('#table').DataTable({ 
	 
        "processing": true, //Feature control the processing indicator.
		"language": {
						"processing": ' <span class="sr-only">Loading...</span> <br><b style="color:#;background:white">Proses menampilkan data<br> Mohon Menunggu..</b>',
						  "oPaginate": {
							"sFirst": "Halaman Pertama",
							"sLast": "Halaman Terakhir",
							 "sNext": "Selanjutnya",
							 "sPrevious": "Sebelumnya"
							 },
						"sInfo": "Total :  _TOTAL_ , Halaman (_START_ - _END_)",
						 "sInfoEmpty": "Tidak ada data yang di tampilkan",
						   "sZeroRecords": "Data tidak tersedia",
						  
				    },
        "serverSide": true, //Feature control DataTables' server-side processing mode.
		 "responsive": false,
		 "searching": true,
		 "lengthMenu":
		 [[16, 32,48,64,80,96,112, 128,144,160,176,192,208,224,240,256,272,288,304,320], 
		 [1, 2,3,4,5,6,7, 8,9,10,11,12,13,14,15,16,17,18,19,20]],
         dom: 'Blfrtip',
		buttons: [
           // 'copy', 'csv', 'excel', 'pdf', 'print'
			 
		/*	 {
					extend: 'excel',
                        exportOptions: {
                    columns: [ 1,2,3,4,5,6,7,8   ]
                },text:'Download Excell',
							
                    },
					
				
					{extend: 'colvis',
                        exportOptions: {
                    columns: [ 0, 1, 2,3,4,5,6,7,8 ]
                },text:' Kolom',
							
                    },
					 
					*/
        ],
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('myevent/ajax_barcode/'.$this->uri->segment(3).'')?>",
            "type": "POST",
			"data": function ( data ) {
						
						  data.waktu = $('#waktu').val();
						  data.status = $('#status').val();
						  data.blok = $('#blok').val();
						  data.lembaga = $('#lembaga').val();
						  data.pic = $('#pic').val();
						  data.no_surat = $('#no_surat').val();
						  data.nama_file = $('#nama_file').val();
						  data.cetak = $('#cetak').val();
						  data.cadangan = $('#cadangan').val();
						  data.gate = $('#gate').val();
						 
		 },
		   beforeSend: function() {
               loading("area_lod");
            },
			complete: function() {
              unblock('area_lod');
            },
		 
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
          "targets": [ 0,-1,-2    ], //last column
          "orderable": false, //set not orderable
        },
        ],
	
      });
    
  
	
	//   $(document).on('change', '#cadangan,#gate,#waktu,#status,#nama_file,#blok,#lembaga,#pic,#no_surat,#cetak', function (event, messages) {			
	//		  dataTable.ajax.reload(null,false);  
   //     });
		
		 function reload_table()
    {
      dataTable.ajax.reload(null,false); //reload datatable ajax 
    }
	
function tinjau(id)
{			var url="<?php echo base_url();?>data_pendaftar/tinjau";
			$.post(url,{id:id},function(data){
				   $("#judul_tinjau").html("TINJAU DATA PESERTA");
				   $("#isi").html(data);
				   $("#modal_tinjau").modal();
			  });
}
function setKode(id)
{			var url="<?php echo base_url();?>myevent/setKode";
			var kode=$("#kod"+id).val();
			$.post(url,{id:id,kode:kode},function(data){
				  if(data=="false")
				  {
					  notif("KODE BARCODE SUDAH DIGUNAKAN");
				  }else{
					  var no=Number(id)+1;
					  
				  $("#kod"+no).focus();
				  
				  }
			  });
}

</script>
  
	
	
	 <script>
  
	function cetak()
	{	
	 var checkbox_value = "";
    $("[name='hapus[]']").each(function () {
        var ischecked = $(this).is(":checked");
        if (ischecked) {
            checkbox_value += $(this).val() + ",";
        }
    });
   window.open("<?php echo base_url()?>myevent/cetak/?id="+checkbox_value,"cetak");
	
		 
	}
	function cetak_label()
	{	
	 var checkbox_value = "";
    $("[name='hapus[]']").each(function () {
        var ischecked = $(this).is(":checked");
        if (ischecked) {
            checkbox_value += $(this).val() + ",";
        }
    });
   window.open("<?php echo base_url()?>myevent/cetak_label/?id="+checkbox_value,"_blank");
	 
	}
	function cetak_barcode()
	{	
	 var checkbox_value = "";
    $("[name='hapus[]']").each(function () {
        var ischecked = $(this).is(":checked");
        if (ischecked) {
            checkbox_value += $(this).val() + ",";
        }
    });
   window.open("<?php echo base_url()?>myevent/cetak_barcode/?id="+checkbox_value,"_blank");
	 
	}
	
	function hapus()
	{

 alertify.confirm("<center>  Hapus data terpilih ?</center>",function(){
	 
	 	 var checkbox_value = "";
    $("[name='hapus[]']").each(function () {
        var ischecked = $(this).is(":checked");
        if (ischecked) {
            checkbox_value += $(this).val() + ",";
        }
    });
	 
	 
		   $.post("<?php echo base_url();?>myevent/deletePeserta/",{id:checkbox_value},function(){
				notif("Data berhasil dihapus !!");			  
			  reload_table();
		      })
		   });

		 
	}
	function hapusAll()
	{	
		var con=window.confirm("hapus data terpilih ?");
		if(con==false){ return false; };
		$.ajax({
		url:"<?php echo base_url();?>myevent/hapusAll",
		type: "POST",
		data: $('#delcheck').serialize(),
	//	dataType: "JSON",
		success: function(data)
				{	 $(".btnhapus").hide();
					$(".pilihsemua").removeAttr("checked");
					$(".pilihsemua").val("ya");
					reload_table();
				},
				error: function (jqXHR, textStatus, errorThrown)
				{
					alert('Try Again!');
				}
		});
	}
  
  
  $(".btnhapus").hide();
  	$(".pilihsemua").click(function(){
	
		if($(".pilihsemua").val()=="ya") {
		$(".pilih").prop("checked", "checked");
		$(".pilihsemua").val("no");
		  $(".btnhapus").show();
		} else {
		$(".pilih").removeAttr("checked");
		$(".pilihsemua").val("ya");
		  $(".btnhapus").hide();
		}
	
	});
	
	function pilcek(){
		$(".btnhapus").show();
		$(".pilihsemua").removeAttr("checked");
		$(".pilihsemua").val("ya");
		 
	};
  
  </script>
  <script>
  $(".tabel-inputan").hide();
  $(".pratampil").hide();
  function addForm(){
  $(".tabel-inputan").fadeIn(1000);
  $("#dataTable").fadeOut(1000);
  $(".crt").hide();
  }
  </script>

  
 
  
  <script type="text/javascript">
  	 function date()
    {
      var date=$("#date").val();
        // ajax delete data to database
          $.ajax({
            url : "<?php echo base_url();?>myevent/sessiondate/"+date,
            type: "POST",
            data: "JSON",
            success: function(data)
            {
               //if success reload ajax table
               reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
         
     
    } 
	
	function deleted(id)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo base_url();?>myevent/deletePeserta/"+id,
            type: "POST",
            data: "JSON",
            success: function(data)
            {
               //if success reload ajax table
               reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
         
      }
    }	 
	
	
	function not(id)
    {
     
        // ajax delete data to database
          $.ajax({
            url : "<?php echo base_url();?>myevent/not/"+id,
            type: "POST",
            data: "JSON",
            success: function(data)
            {
               //if success reload ajax table
               reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
         
      
    }
	
	function acc(id)
    {
     
        // ajax delete data to database
          $.ajax({
            url : "<?php echo base_url();?>myevent/acc/"+id+"/<?php echo $this->uri->segment(3);?>",
            type: "POST",
            data: "JSON",
            success: function(data)
            {
               //if success reload ajax table
			   if(data==3){ alert('Quota penuh!'); }
               reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
         
      
    }
	
	
	
	function add(id)
	{
	// ajax delete data to database
          $.ajax({
            url : "<?php echo base_url();?>myevent/addPeserta/"+id,
            type: "POST",
            data: "JSON",
            success: function(data)
            {
               //if success reload ajax table
              $("#modal_form").modal("show");
              $(".bodyx").html(data);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
	
	}
	
	function mode(id)
	{
	// ajax delete data to database
          $.ajax({
            url : "<?php echo base_url();?>myevent/modeEvent/"+id,
            type: "POST",
            data: "JSON",
            success: function(data)
            {
              window.location.href="<?php echo base_url();?>myevent/register/"+id;
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
	
	}
	
	
	function edit(urut,idPeserta)
	{
	    $.ajax({
            url : "<?php echo base_url();?>myevent/editPeserta/<?php echo $this->uri->segment(3);?>",
            type: "POST",
            data: "idPeserta="+idPeserta+"&urut="+urut,
            success: function(data)
            {
               //if success reload ajax table
              $("#modal_edit").modal("show");
              $(".modal_edit").html(data);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
	}
	
	function getbarcode(id)
	{
	// ajax delete data to database
          $.ajax({
            url : "<?php echo base_url();?>myevent/getBarcode/"+id,
            type: "POST",
            data: "JSON",
            success: function(data)
            {
               //if success reload ajax table
              $("#barcode").modal("show");
              $(".modal-barcode").html(data);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
	}	
	
	function barcodeHide()
	{
	
              $("#barcode").modal("hide");
             
	}	
	
	$("select").selectpicker();
	

</script>

 