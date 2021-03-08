 <style>
 .btn span{
 font-size:14px; 
 padding:0px;
 }
 .size{
 font-size:18px; 
  padding:5px;
 }
 </style>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  id="area_formSubmit">
				
                    <div class="card">
					<div class="card-header" >
									<div class="card-title">  ONLINE </div> 
										start from : <input type="text" id="start" > <button onclick="reload_table()" class="dt-button btn btn-danger btn-border  btn-sm dt-padding-right"> submit</button>
					</div>
				
				<div class='row card-body' style='padding-top:10px;padding-bottom:20px'>	 
					 
					<div class='col-md-3'>
					<select class='form-control' id='zoomin' onchange="reload_table()">
					<option value="">--- status data --- </option>
					<option value="1"> Sudah masuk vicon</option>
					<option value="2"> Belum masuk vicon (draft)</option>
					<option value="5"> Sudah dapat Link</option> 
					<option value="6"> Belum dapat Link</option> 					
					<option value="3"> Sudah kirim e-sertifikat</option> 
					<option value="4"> Belum kirim e-sertifikat</option> 
					 
					</select>
					</div>
					
				 	<div class='col-md-3'>
				 
					<?php
									$this->db->order_by("title","asc");
					$db			=	$this->db->get("zoom_event")->result();
					$dataevent[null]	=	" --- filter event ---";
					foreach($db as $val)
					{
						$jml	=	$this->db->query("select * from zoom_data where id_event='".$val->id."' and registrant_id is not null ")->num_rows();
						$dataevent[$val->id]	=	 $val->kode." - ".$val->title;
					}
					echo form_dropdown("event",$dataevent,"","class='form-control' id='event'  onchange='reload_table()' ");
					?>
					</select>
					</div>
					
				 	<div class='col-md-3'>
				 
					<?php
					$dataevent	=	array();		 
									$this->db->order_by("urut","asc");
					$db			=	$this->db->get("tr_pekerjaan")->result();
					$dataevent[null]	=	" --- filter pekerjaan ---";
					foreach($db as $val)
					{
					 	$dataevent[$val->id]	=	$val->id." - ".$val->nama;
					}
					echo form_dropdown("id_pekerjaan",$dataevent,"","class='form-control' id='id_pekerjaan'  onchange='reload_table()' ");
					?>
					</select>
					</div>
					<div class='col-md-3'>
				 
					<?php
					$dataevent	=	array();	 
					$dataevent[null]	=	" --- filter negara ---";
					$dataevent[1]	=	"Dalam Negeri"; 
					$dataevent[2]	=	"Luar Negeri"; 
					echo form_dropdown("negara",$dataevent,"","class='form-control' id='negara'  onchange='reload_table()' ");
					?>
					</select>
					</div>
					
				 	
					 	
				</div>	
					<div class='col-md-4'>
					 <input type="number" id="join" name="join" class='form-control' placeholder="Filter durasi join" onchange="reload_table()" onkeyup="reload_table()">
					</div>
					<div class="col-md-12"><br></div>
					<div class="table-responsive">
					 <table id='table' width="100%" class="tabel black table-striped table-bordered table-hover dataTable">
					  <thead  >	 
					 			<th class='thead' style='max-width:15px' >
									<input id="md_checkbox" value="ya" class="pilihsemua filled-in chk-col-red" type="checkbox"></th>
									<th   class='thead' axis="string" width='15px'>No</th> 
									<th    class='thead'  >Nama  </th> 
									<th    class='thead' width="160px" >Email / Telp / Link  </th> 
									<th    class='thead'  >Alamat </th> 
									<th    class='thead'  >Pekerjaan </th> 
									 <th    class='thead'>Status vcon</th> 
									 <th    class='thead'>e-sertifikat</th> 
									 
									<th    class='thead ' >Action</th> 
								 </thead>
					</table>
					 </div>
					 
					 
					 
					 
                </div>
                </div>
            
			
			
			
<div class="modal fade" id="mdl_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" id="area_edit">
	<form method="POST" url="<?php echo base_url() ?>zoom/update_peserta_zoom" id="edit" action="javascript:submitForm('edit')">
      	<div class="modal-header">
	        <h5>Edit  </h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	    </div>
	    <div class="modal-body" id="dt-edit">
	    </div>
	    <div class="modal-footer">
	    	<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
	        <button type="submit" class="btn btn-primary" onclick="submitForm('edit')">Simpan Perubahan</button>
	    </div>
      </form>
    </div>
  </div>
</div>	

<div class="modal fade" id="mdl_detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" id="area_detail">
  	<div class="modal-header">
        <h5>Detail zoom</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body" id="dt-detail">
    </div>
    </div>
  </div>
</div>

<div class="modal" id="mdl_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id="area_edit">
      	<div class="modal-header">
	        <h5>Apa anda yakin ?</h5><br>
			 
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	    </div>

	    <div class="modal-footer" style="margin:auto;">

	    	<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak !</button>
	        <button type="submit" class="btn btn-danger" onclick="delete_peserta_zoom()">Yakin, Hapus</button>
	    </div>
    </div>
  </div>
</div>			
			
<input type="hidden" id="getId" />				


<script type="text/javascript">
	function edit(id){
		loading("area_edit");
		$.post("<?php echo base_url()?>zoom/edit_peserta_online",{id:id},function(data){
			$("#dt-edit").html(data);
			unblock("area_edit");
		});
	}

	function detail(id){
		loading("area_detail");
		$.post("<?php echo base_url()?>zoom/detail",{id:id},function(data){
			$("#dt-detail").html(data);
			unblock("area_detail");
		});
	}

	function delete_peserta_zoom(){
		var id = $("#getId").val();
		loading("area_delete");
		$.post("<?php echo base_url()?>zoom/delete_peserta_zoom",{id:id},function(data){
			notif("Data berhasil dihapus");
			unblock("area_delete");
			$("#mdl_delete").modal('toggle');
			reload_table();
		});
	}

	function getId(id){
		$("#getId").val(id);
	}

</script>

  <script type="text/javascript">
	 	function add(){
		loading("area_edit");
		$("#mdl_modal").modal("show");
		$.post("<?php echo base_url()?>zoom/add_peserta_online",function(data){
			$("#dataIsi").html(data);
			unblock("area_edit");
		});
	}
   var  dataTable = $('#table').DataTable({  
		"fixedHeader": true,
        "processing": true, //Feature control the processing indicator.
		"language": {
						"processing": '  <b >  Mohon Menunggu..</b>',
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
					"oLanguage": {
					  "sLengthMenu": "Display _MENU_ ",
					},
        "serverSide": true, //Feature control DataTables' server-side processing mode.
		 "responsive": false,
		 "searching": true,
		 "lengthMenu":
		 [[10, 20,30,40,50,100 ], 
		 [10,20,30,40,50,100]],
         dom: 'Blfrtip',
		buttons: [
		{
			  text: '  ',
                action: function ( e, dt, node, config ) {
                   hapus();
                },className: 'btn btn-danger btn-border  far fa-trash-alt size   btn-sm  dt-padding-right' ,
				 
        },
		{
			  text: ' Download ',
                action: function ( e, dt, node, config ) {
                   download();
                },className: 'btn btn-primary btn-border   size   btn-sm  dt-padding-right' ,
				 
        },{
			  text: ' Insert vicon ',
                action: function ( e, dt, node, config ) {
                   insertZoom();
                },className: 'btn btn-primary fas fa-video btn-sm  dt-padding-right' ,
				 
        },{
			  text: ' Broadcast  ',
                action: function ( e, dt, node, config ) {
                   broadcast();
                },className: 'btn btn-secondary fa fa-envelope     btn-sm  dt-padding-right' ,
				 
        },{
			  text: '   e-undangan',
                action: function ( e, dt, node, config ) {
                   eundangan();
                },className: 'btn btn-warning fa fa-envelope     btn-sm  dt-padding-right' ,
				 
        },{
			  text: '   e-sertifikat',
                action: function ( e, dt, node, config ) {
                   sertifikat();
                },className: 'btn btn-success fa fa-envelope     btn-sm  dt-padding-right' ,
				 
        },{
			  text: ' Import  ',
                action: function ( e, dt, node, config ) {
                   import_file_online();
                },className: 'btn btn-success btn-border fas fa-file-excel     btn-sm  dt-padding-right' ,
				 
        },{
			  text: ' Input  ',
                action: function ( e, dt, node, config ) {
                   add();
                },className: 'btn btn-primary btn-border fas fa-user-plus     btn-sm  dt-padding-right' ,
				 
        },/*{
			  text: ' Import excell',
                action: function ( e, dt, node, config ) {
                   import_file();
                },className: 'btn btn-success btn-border fas fa-file-excel     btn-sm  dt-padding-right' ,
				 
        }, {
			  text: ' data event',
                action: function ( e, dt, node, config ) {
                   zoom_event();
                },className: 'btn btn-warning btn-border fab fa-windows    btn-sm  dt-padding-right' ,
				 
        },
		/*{
			  text: '',
                action: function ( e, dt, node, config ) {
                   hapus();
                },className: 'size btn btn-danger btn-border fas fa-times-circle   btn-sm  dt-padding-right' ,
				 
        },
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
            "url": "<?php echo site_url('zoom/ajax_online')?>",
            "type": "POST",
			"data": function ( data ) {
						 
						  data.zoomin = $('#zoomin').val();
						  data.event = $('#event').val();
						  data.id_pekerjaan = $('#id_pekerjaan').val();
						  data.negara = $('#negara').val();
						  data.join = $('#join').val();
						    data.mulai= $('#start').val();
						  
		 },
		   beforeSend: function() {
               loading("loading");
            },
			complete: function() {
              unblock('loading');
            },
		 
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
          "targets": [ 0,1,2,3,4,5,6   ], //last column
          "orderable": false, //set not orderable
        },
        ],
	
      });
    
  
	
	//   $(document).on('change', '#cadangan,#gate,#waktu,#status,#nama_file,#blok,#lembaga,#pic,#no_surat,#cetak', function (event, messages) {			
	//		  dataTable.ajax.reload(null,false);  
   //     });
		
		 function reload_table()
    {
	  unblock("loading_area");		
	  $("#md_checkbox").prop("checked", false);
	  $(".pilihsemua").val("ya");
      dataTable.ajax.reload(null,false); //reload datatable ajax 
    }
	
	function download()
	{
			
			var	zoomin = $('#zoomin').val(); 
			var event = $('#event').val();
			var negara = $('#negara').val();
			var id_pekerjaan = $('#id_pekerjaan').val();
			var join = $('#join').val();
						  
		window.location.href="<?php echo base_url()?>zoom/download_online?zoomin="+zoomin+"&event="+event+"&negara="+negara+"&id_pekerjaan="+id_pekerjaan+"&join="+join;
	}
 
	function getDispo(id)
	{
		$("#mdl_modal").modal("show");
		      $("#dataIsi").html("Loading...");
		 	 $.post("<?php echo site_url("zoom/getDispozoom"); ?>",{id:id},function(data){
		  	   $("#dataIsi").html(data);  
		 	}); 
	}
	
	
function insertZoom()
	{	  
	var checkbox_value = "";
	var online = "online";
    $("[name='pilih[]']").each(function () {
        var ischecked = $(this).is(":checked");
        if (ischecked) {
            checkbox_value += $(this).val() + "|";
        }
    });
	if(!checkbox_value)
	{
		notif("silahkan centang data terlebih dahulu.");
		return false;
	}
	
	$("#dataIsi").html("<b>Processing...</b><hr>mohon tunggu, mungkin ini berlangsung lama...."); 
		 $("#mdl_modal").modal("show");
		 $.post("<?php echo base_url()?>zoom/insertZoom",{id:checkbox_value,type:online},function(data){
		   $("#dataIsi").html(data); 
		 });
	}

function hapus()
	{	  
	 
	var checkbox_value = ""; var i=0;
    $("[name='pilih[]']").each(function () {
        var ischecked = $(this).is(":checked");
        if (ischecked) {
            checkbox_value += $(this).val() + "|";
			i++;
        }
    });
	if(!checkbox_value)
	{
		notif("silahkan centang data terlebih dahulu.");
		return false;
	}
	if(i>20)
	{
		notif("maksimal 20 data dipilih.");
		return false;
	}
	
	
	
	
	
		 	swal({
						title: 'hapus data terpilih ?',
						text: i+ " data",
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
						 
							// $("#dataIsi").html("<b>Processing...</b><hr>mohon tunggu, mungkin ini berlangsung lama...."); 
							// $("#mdl_modal").modal("show");
							 $.post("<?php echo base_url()?>zoom/delete_peserta_zoom_all_online",{id:checkbox_value},function(data){
							   notif(i+" data berhasil dihapus");
							   reload_table();
							 }); 
						}  
					});
	}
	
	
	 
</script>	
			
		
<script>
     function eundangan()
     {
         	var checkbox_value = ""; var i=0;
				$("[name='pilih[]']").each(function () {
					var ischecked = $(this).is(":checked");
					if (ischecked) {
						checkbox_value += $(this).val() + "|";
						i++;
					}
				}); 
				var h = ceklis();  
				if(h!="true")
				{
					notif("Silahkan pilih data terlebih dahulu !");
					return false;
				}  
					if(i>100)
				{
					notif("Maksimal 100 data terpilih!");
					return false;
				}  
				
         loading();
             $("#mdl_undangan").modal("show");
            $("#masterDataUndangan").html("mohon tunggu...");
			 $.post("<?php echo site_url("zoom/eundangan"); ?>",{val:checkbox_value},function(data){
			     unblock();
		 	   $("#masterDataUndangan").html(data);  
			}); 
	}		
     
</script>	
<script>
     function sertifikat()
     {
         	var checkbox_value = ""; var i=0;
				$("[name='pilih[]']").each(function () {
					var ischecked = $(this).is(":checked");
					if (ischecked) {
						checkbox_value += $(this).val() + "|";
						i++;
					}
				}); 
				var h = ceklis();  
				if(h!="true")
				{
					notif("Silahkan pilih data terlebih dahulu !");
					return false;
				}  
					if(i>100)
				{
					notif("Maksimal 100 data terpilih!");
					return false;
				}  
				
         loading();
             $("#mdl_sertifikat").modal("show");
            $("#masterDataSertifikat").html("mohon tunggu...");
			 $.post("<?php echo site_url("zoom/sertifikat"); ?>",{val:checkbox_value},function(data){
			     unblock();
		 	   $("#masterDataSertifikat").html(data);  
			}); 
	}		
     
</script>	
 	
<script>
     function broadcast()
     {
         	var checkbox_value = ""; var i=0;
				$("[name='pilih[]']").each(function () {
					var ischecked = $(this).is(":checked");
					if (ischecked) {
						checkbox_value += $(this).val() + "|";
						i++;
					}
				}); 
				var h = ceklis();  
				if(h!="true")
				{
					notif("Silahkan pilih data terlebih dahulu !");
					return false;
				}  
					if(i>100)
				{
					notif("Maksimal 100 data terpilih!");
					return false;
				}  
				
         loading();
             $("#mdl_konfirm").modal("show");
            $("#masterData").html("mohon tunggu...");
			 $.post("<?php echo site_url("zoom/broadcast_online"); ?>",{val:checkbox_value},function(data){
			     unblock();
		 	   $("#masterData").html(data);  
			}); 
	}		
     
</script>	
 
<script>	
			function ceklis()
			{	 var i=0;
				 $("[name='pilih[]']").each(function () {
					var ischecked = $(this).is(":checked");
					if (ischecked) { 
						i++;
					};  
				}); 
				if(i==0)
					{
						return "false";
					}else{
						return "true";
					}
			}
 </script>	

  	
			
					
    <script type="text/javascript">
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
	
	function zoom_event()
	{
		$("#mdl_modal").modal("show");
		 $("#dataIsi").html("mohon tunggu...");
			 $.post("<?php echo site_url("zoom/data_event"); ?>",function(data){
			     unblock();
		 	   $("#dataIsi").html(data);  
			}); 
	}	
	function import_file_online()
	{
		$("#mdl_modal").modal("show");
		 $("#dataIsi").html("mohon tunggu...");
			 $.post("<?php echo site_url("zoom/import_file_online"); ?>",function(data){
			     unblock();
		 	   $("#dataIsi").html(data);  
			}); 
	}
	</script>
	
	
<!-- Modal -->
<div class="modal fade " id="mdl_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
 
   <div class="modal-dialog   modal-lg"   role="document" id="loading_area">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="modal-content" >
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
					 <div id="dataIsi"></div>
  
					<br>
                </div>
                 
                
            </div>
        </div>
    </div>
</div>	
	


		
	
<!-- Modal -->
<div class="modal fade " id="mdl_konfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
 
   <div class="modal-dialog   modal-lg" role="document" >
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
					Kirim notifikasi Pendaftar Online<hr>
					</div>
					<div id="masterData"></div>
				</div>
			</div>
		</div>
	</div>
 
		
<!-- Modal -->
<div class="modal fade " id="mdl_sertifikat" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
 
   <div class="modal-dialog   modal-lg" role="document" >
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" >
            <div class="modal-content" >
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
					Kirim e-sertifikat<hr>
					</div>
					<div id="masterDataSertifikat"></div>
				</div>
			</div>
		</div>
	</div>
 
			
<!-- Modal -->
<div class="modal fade " id="mdl_undangan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
 
   <div class="modal-dialog   modal-lg" role="document" >
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" >
            <div class="modal-content" >
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
					Kirim e-undangan<hr>
					</div>
					<div id="masterDataUndangan"></div>
				</div>
			</div>
		</div>
	</div>
 
		