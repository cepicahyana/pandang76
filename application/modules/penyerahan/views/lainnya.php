 
 
  
<div id="data" class='row col-md-12'></div>
			
		 
<script>	
$('#kode').select2({
	 theme: "bootstrap"
 });
		  		  
$("[name='kode']").focus();

function kode(kode,dispo,jper)
{
	if(dispo!=1)
	{	$("#data").html("");
		notif("Permohonan belum diverifikasi!"); return false;
		
	}
		loading();
		if(jper==4){
			var url="<?php echo base_url();?>penyerahan/getDataSuci"; 
		}else{
			var url="<?php echo base_url();?>penyerahan/getDataLainnya"; 
		}
			
			$.post(url,{ kode:kode},function(data){
				$("#data").html(data);
				unblock(); 
					  $("#kod11").focus();
					  window.scrollTo(0, 0);
			  });
}
</script>	 













 
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  id="area_formSubmit">
				
                    <div class="card">
					<div class="card-header" >
									<div class="card-title">Permohonan acara lainnya</div> 
					</div>
				
				<div class='row card-body' style='padding-top:10px;padding-bottom:20px'>	 
					 
					
					<div class='col-md-3'>
					<select class='form-control' id='fdispo' onchange="reload_table()">
					<option value="" >Tampilkan semua data </option>
					<option value="1" selected> Sudah disposisi</option>
					<option value="3"> Draft</option>
					<option value="2"> Belum disposisi</option> 
					</select>
					</div>	
					
					<div class='col-md-3'>
					<select class='form-control' id='fnotif' onchange="reload_table()">
					<option value="">--- Filter notifkasi --- </option>
					<option value="1"> Sudah kirim nottifikasi</option>
					<option value="2"> Belum kirim nottifikasi</option> 
					</select>
					</div>
					
					<div class='col-md-3'>
					 
					<?php 
												$dt=array();	
												$dt[null]="--- Filter Jenis Permohonan ---";
												$this->db->where("id not in(1,2,3)");
												$data=$this->db->get("tr_kategory")->result();
												foreach($data as $val)
												{
													$dt[$val->id]=$val->nama;
												}
												echo form_dropdown("fjenis",$dt,"","id='fjenis' class='form-control' required onchange='reload_table()' ");
												?>
					</div>
					<div class='col-md-3'>
					<select class='form-control' id='fqr' onchange="reload_table()">
					<option value="">--- Filter Penyiapan Undangan --- </option>
					<option value="1"> Sudah siap</option>
					<option value="2"> Belum siap</option> 
					</select>
					</div>
					
					  
				  
				</div>	
					
					 <table id='table' width="100%" class="tabel black table-striped table-bordered table-hover dataTable">
					  <thead  >	 
					 		<th class='thead' style='max-width:15px' >
									<input id="md_checkbox" value="ya" class="pilihsemua filled-in chk-col-red" type="checkbox"></th>	 
									<th   class='thead' axis="string" width='15px'>No</th> 
									<th    class='thead' width='125px'>Nama Pemohon</th> 
									<th    class='thead'>Instansi</th> 
									<th    class='thead'> Undangan</th>  
									<th    class='thead ' ><center>Verifikasi</center></th> 
									<th    class='thead ' ><center>Penyipaan Undangan</center></th> 
									<th    class='thead ' ><center>Penerima</center></th> 
									<th    class='thead ' ><center>Jenis</center></th> 
									<th    class='thead'>Notif</th> 
								 </thead>
					</table>
					 
					 
					 
					 
					 
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
        <h5>Detail  </h5>
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
		$.post("<?php echo base_url()?>permohonan/edit_peserta_lainnya",{id:id},function(data){
			$("#dt-edit").html(data);
			unblock("area_edit");
		});
	}

	function detail_peserta_persus(id){
		loading("area_detail");
		$.post("<?php echo base_url()?>permohonan/detail_peserta_lainnya",{id:id},function(data){
			$("#dt-detail").html(data);
			unblock("area_detail");
		});
	}

	function delete_peserta_persus(){
		var id = $("#getId").val();
		loading("area_delete");
		$.post("<?php echo base_url()?>permohonan/delete_peserta_persuss",{id:id},function(data){
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
           // 'copy', 'csv', 'excel', 'pdf', 'print'
			  {
			  text: '<span class="feather icon-download"></span> Refresh',
                action: function ( e, dt, node, config ) {
                   reload_table();
                },className: 'btn btn-primary btn-sm  btn-table dt-padding-right fa fas fa-undo'
                }, 
				{
				text: ' Kirim Notifikasi Pengambilan',
                action: function ( e, dt, node, config ) {
                   broadcast();
                },className: 'btn  btn-danger far fa-paper-plane btn-sm   dt-padding-right'
				},
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
            "url": "<?php echo site_url('penyerahan/ajax_lainnnya/')?>",
            "type": "POST",
			"data": function ( data ) {
						 
						  data.dispo = $('#fdispo').val();
						  data.fnotif = $('#fnotif').val();
						  data.jenis_permohonan = $('#fjenis').val();
						  data.fqr = $('#fqr').val();
						  
						 
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
          "targets": [ 0,1,2,3,4,5,6,7,8,9    ], //last column
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
	   $("#data").html("");  
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
	
	
<script> 
function broadcast(){
	var checkbox_value = ""; var jml=0;
    $("[name='pilih[]']").each(function () {
        var ischecked = $(this).is(":checked");
        if (ischecked) {
            checkbox_value += $(this).val() + ",";
			 jml++;
        }
    });
	if(!checkbox_value)
	{
		notif("Mohon pilih data terlebih dahulu.");
		return false;
	}
	
	
					swal({
						title: 'Kirim Notifikasi Penyerahan ?',
						text: jml+" terpilih",
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
							jadwalkan(checkbox_value);
							
						}  
					});
				}
				
	function jadwalkan(id)
	{	 
		 loading();
		 $.post("<?php echo site_url("penyerahan/setStsPenyiapanLainnya"); ?>",{id:id},function(data){
			 $("#mdl_modal").modal("hide");
		  reload_table();
		  unblock();
		 window.swal({
                      title: "Terkirim!",
                      showConfirmButton: false,
                      timer: 1000
                    });
		 });
	}				
</script>
<!-- Modal -->
<div class="modal fade " id="mdl_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
 
   <div class="modal-dialog   modal-lg"  style="min-width:65%" role="document" >
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
	


	
		