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
									<div class="card-title">data penerimaan souvenir </div> 
					</div>
				
				<div class='row card-body' style='padding-top:10px;padding-bottom:20px'>	 
					 
					<div class='col-md-4'>
					<select class='form-control' id='fdistri' onchange="reload_table()">
					<option value="">--- Filter pengambilan --- </option>
					<option value="1"> Sudah diambil</option>
					<option value="2"> Belum diambil Hari ini</option> 
					<option value="3"> Belum diambil lewat 1 Hari</option> 
					<option value="4"> Belum diambil lewat 2 Hari </option> 
					<option value="5"> Belum diambil lewat 3 Hari </option>
					<option value="6"> Belum diambil lewat 4 hari lebih </option>
					</select>
					</div>
					
				 	
					 
					<div class='col-md-3'>
					<?php 
					$db	=	$this->db->get("tr_pengiriman")->result();
					$val[""]	=	"--- Filter jenis pengiriman ---";
					foreach($db as $db)
					{
						$val[$db->id] = strtoupper($db->nama);
					}
					echo form_dropdown("fpengiriman",$val,"","class='form-control' id='fpengiriman' onchange='reload_table()' ");
					?>
				  
					</div>
					
					  	<div class='col-md-3'>
					<select class='form-control' id='notif' onchange="reload_table()">
					<option value="">--- Filter Notifkasi --- </option>
					<option value="1"> Belum  proses pejadwalan</option> 
					<option value="2"> Kirim notifikasi</option>
					<option value="3"> Tidak dijadwalkan </option>
					
					</select>
					</div>	
			 	
				  
				</div>	
					<div class="table-responsive">
					 <table id='table' width="100%" class="tabel black table-striped table-bordered table-hover dataTable">
					  <thead  >	 
					 			<th class='thead' style='max-width:15px' >
									<input id="md_checkbox" value="ya" class="pilihsemua filled-in chk-col-red" type="checkbox"></th>
									<th   class='thead' axis="string" width='15px'>No</th> 
									<th    class='thead'  >Nama  </th> 
								 
									<th    class='thead'>Undangan</th> 
									<th    class='thead'>Souvenir</th> 
								 
								 
									<th    class='thead ' ><center>Jadwal distribusi</center></th> 
								 
							 
									<th    class='thead ' ><center>Pengambilan</center></th> 
									<th    class='thead ' >Action</th> 
								 </thead>
					</table>
					 </div> 
					 
					 
					 
					 
                </div>
                </div>
            
			
			
			
<div class="modal fade" id="mdl_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" id="area_edit">
	<form method="POST" url="<?php echo base_url() ?>permohonan/update_peserta_persus" id="edit" action="javascript:submitForm('edit')">
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
        <h5>Detail PERSUS</h5>
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
	        <h5>Apa anda yakin ?</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	    </div>

	    <div class="modal-footer" style="margin:auto;">

	    	<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak !</button>
	        <button type="submit" class="btn btn-danger" onclick="delete_peserta_persus()">Yakin, Hapus</button>
	    </div>
    </div>
  </div>
</div>			
			
<input type="hidden" id="getId" />				


<script type="text/javascript">
	function edit_peserta_persus(id){
		loading("area_edit");
		$.post("<?php echo base_url()?>permohonan/edit_peserta_souvenir",{id:id},function(data){
			$("#dt-edit").html(data);
			unblock("area_edit");
		});
	}

	function detail_peserta_persus(id){
		loading("area_detail");
		$.post("<?php echo base_url()?>monitoring_souvenir/detail",{id:id},function(data){
			$("#dt-detail").html(data);
			unblock("area_detail");
		});
	}

	function delete_peserta_persus(){
		var id = $("#getId").val();
		loading("area_delete");
		$.post("<?php echo base_url()?>permohonan/delete_peserta_persus",{id:id},function(data){
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
        "serverSide": true, //Feature control DataTables' server-side processing mode.
		 "responsive": false,
		 "searching": true,
		 "lengthMenu":
		 [[10, 20,30,40,50 ], 
		 [10,20,30,40,50]],
         dom: 'Blfrtip',
		buttons: [
		{
			  text: '  ',
                action: function ( e, dt, node, config ) {
                   hapus_cek();
                },className: 'btn btn-danger btn-border  far fa-trash-alt size   btn-sm  dt-padding-right' ,
				 
        },
		{
			  text: ' Download ',
                action: function ( e, dt, node, config ) {
                   download();
                },className: 'btn btn-info    btn-sm  dt-padding-right' ,
				 
        },{
			  text: ' Cetak ulang Label ',
                action: function ( e, dt, node, config ) {
                   hapus();
                },className: 'btn btn-primary fa fa-print    btn-sm  dt-padding-right' ,
				 
        },{
			  text: ' Kirim ulang notifikasi ',
                action: function ( e, dt, node, config ) {
                   broadcast();
                },className: 'btn btn-primary fa fa-envelope     btn-sm  dt-padding-right' ,
				 
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
            "url": "<?php echo site_url('permohonan/ajax_souvenir')?>",
            "type": "POST",
			"data": function ( data ) {
						 
						  data.notif = $('#notif').val();
						  data.distri = $('#fdistri').val(); 
						  data.fpengiriman = $('#fpengiriman').val();
						  
						 
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
      dataTable.ajax.reload(null,false); //reload datatable ajax 
    }
	
	function download()
	{
			var notif  = $('#notif').val();
			var	distri = $('#fdistri').val(); 
			var fpengiriman = $('#fpengiriman').val();
						  
		window.location.href="<?php echo base_url()?>permohonan/download_souvenir?notif="+notif+"&distri="+distri+"&fpengiriman="+fpengiriman;
	}
 
	function getDispo(id)
	{
		$("#mdl_modal").modal("show");
		      $("#dataIsi").html("Loading...");
		 	 $.post("<?php echo site_url("permohonan/getDispoPersus"); ?>",{id:id},function(data){
		  	   $("#dataIsi").html(data);  
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
						checkbox_value += $(this).val() + ",";
						i++;
					}
				}); 
				var h = ceklis();  
				if(h!="true")
				{
					notif("Silahkan pilih data terlebih dahulu<br>Maksimal 30 data terpilih!");
					return false;
				}  
					if(i>30)
				{
					notif("Maksimal 30 data terpilih!");
					return false;
				}  
				
         loading();
           //  $("#mdl_konfirm").modal("show");
            $("#masterData").html("mohon tunggu...");
			 $.post("<?php echo site_url("permohonan/broadcast_persus"); ?>",{val:checkbox_value},function(data){
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

 <script>
    function hapus()
    {
        		var h = ceklis();  
				if(h!="true")
				{
					notif("Silahkan pilih data tamu terlebih dahulu");
					return false;
				} 
				 var checkbox_value = "";
				$("[name='pilih[]']").each(function () {
					var ischecked = $(this).is(":checked");
					if (ischecked) {
						checkbox_value += $(this).val() + ",";
					}
				});
			//	 window.open('', 'blank', '').close();
   window.open("<?php echo base_url() ?>permohonan/cetak_label/?id="+checkbox_value,"blank");
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
	</script>
	
	
<!-- Modal -->
<div class="modal fade " id="mdl_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
 
   <div class="modal-dialog   modal-md"   role="document" >
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
					Kirim ulang notifikasi pengambilan souvenir<hr>
					</div>
					<div id="masterData"></div>
				</div>
			</div>
		</div>
	</div>
</div>	
		
		
		
		<script>
		
function hapus_cek()
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
							 $.post("<?php echo base_url()?>permohonan/delete_peserta_souvenir_cek",{id:checkbox_value},function(data){
							   notif(i+" data berhasil dihapus");
							   reload_table();
							 }); 
						}  
					});
	
	}
	
</script>	
	
	
	