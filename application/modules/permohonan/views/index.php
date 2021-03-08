 
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  id="area_formSubmit">
				
                    <div class="card">
					<div class="card-header" >
									<div class="card-title">Permohonan Online </div> 
					</div>
				
				<div class='row card-body' style='padding-top:10px;padding-bottom:20px'>	 
				<!--	<div class='col-md-4'  >
					<select class='form-control' id='facara' onchange="reload_table()">
					<option value="">--- Filter acara --- </option>
					<option value="1"> Pagi (Penaikan bendera)</option>
					<option value="2"> Sore (Penurunan bendera)</option>
					<option value="3"> Pagi & Sore  </option>
					</select>
					</div>-->
					
					<div class='col-md-4'>
					<select class='form-control' id='fdispo' onchange="reload_table()">
					<option value="">--- Filter verifikasi --- </option>
					<option value="1"> Sudah verifikasi</option>
					<option value="2"> Belum verifikasi</option> 
					</select>
					</div>	
					
					<div class='col-md-3'>
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
					<div class='col-md-4'>
					<select class='form-control' id='fjadwal' onchange="reload_table()">
					<option value="">--- Filter jadwal distribusi --- </option>
					<option value="1"> Belum dijadwalkan</option> 
					<option value="2"> Sudah dijadwalkan</option>
					
					</select>
					</div>	
					 <button onclick="modal_filter()" class='  btn btn-sm btn-primary fa fa-filter'> Filter &nbsp;&nbsp;&nbsp;</button> 
					 
				  
				</div>	
					
					 <table id='table' width="100%" class="tabel black table-striped table-bordered table-hover dataTable">
					  <thead  >	 
					 			<th class='thead' style='max-width:15px' >
									<input id="md_checkbox" value="ya" class="pilihsemua filled-in chk-col-red" type="checkbox"></th>	 
									<th   class='thead' axis="string" width='15px'>No</th> 
									<th    class='thead'>Nama Pemohon</th> 
									<th    class='thead'>Upacara</th> 
									<th    class='thead'>R.Suci</th> 
									<th    class='thead ' ><center>Verifikasi</center></th>  
									<th    class='thead ' ><center>Jadwal Distribusi</center></th> 
									<th    class='thead ' ><center>Pengambilan</center></th> 
									<th    class='thead ' >Action</th> 
								 </thead>
					</table>
					 
					 
					 
					 
					 
                </div>
                </div>
            

<div class="modal fade" id="mdl_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" id="area_edit">
	<form method="POST" url="<?php echo base_url() ?>permohonan/update_peserta_online" id="edit" action="javascript:submitForm('edit')">
      	<div class="modal-header">
	        <h5>Edit Peserta Online</h5>
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
        <h5>Detail Peserta Online</h5>
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
	        <button type="submit" class="btn btn-danger" onclick="delete_peserta_online()">Yakin, Didiskulifikasi</button>
	    </div>
    </div>
  </div>
</div>			
			
<input type="hidden" id="getId" />		

	
<!-- Modal -->
<div class="modal fade " id="mdl_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
 
   <div class="modal-dialog   modal-lg" role="document" >
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
					FILTER  <hr>
						<div class="form-group">
												<label for="exampleFormControlSelect1">Filter jenis Acara</label>
													<div class="select2-input">
														 
														<?php
														  
															$db[""]="Tampilkan semua data";  
															$db["1"]="Hanya yang mengikuti renungan suci";
														 
														echo form_dropdown("facara",$db,null,"id='facara' class='form-control'  ");
														?>
													</div>
											</div>
					
					
							<div class="form-group">
												<label for="exampleFormControlSelect1">Filter Status Data</label>
													<div class="select2-input">
														 
														<?php
														   $db=array();
															$db[""]="Tampilkan semua data"; 
															$db["1"]="Yang telah didiskulifikasi"; 
															$db["2"]="Permohonan Diterima";
															$db["3"]="Permohonan ditolak";
														 
														echo form_dropdown("fdis",$db,"2","id='fdis' class='form-control'  ");
														?>
													</div>
											</div>
											
											
										
										    <div class="form-group">
												<label for="exampleFormControlSelect1">Filter Provinsi</label>
													<div class="select2-input">
														 
														<?php
														 $db=array();
														$this->db->order_by("nama","asc");
														$data=$this->db->get("wil_provinsi")->result();
														$db[""]="---- filter provinsi ----";
														foreach($data as $data)
														{
															$db[$data->id_prov]=$data->nama;
														}
														echo form_dropdown("fprov",$db,"","id='fprov' class='select2 form-control' onchange='onGroup(this.value)' ");
														?>
													</div>
											</div>


				<div class="form-group">
												<label for="exampleFormControlSelect1">Filter Kabupaten</label>
												<div id="form_kab">
												<select class="form-control" id="fkab">
													 <option value=''>---- filter kabupaten ----</option> 
												</select></div>
				 </div>
				 
				 
												<div class="form-group">
												<label for="exampleFormControlSelect1">Filter Blok</label>
													<div class="select2-input"> 
														<?php 
														$db=array();
														$this->db->order_by("id","asc");
														$data=$this->db->get("tr_blok")->result();
														$db[""]="---- filter blok ----";
														foreach($data as $data)
														{
															if($data->jenis==1)
															{	$jenis=" - Pagi";
															}else{
																$jenis=" - Sore";
															}
															$db[$data->id]=$data->nama.$jenis;
														}
														echo form_dropdown("fblok",$db,"","id='fblok' class='form-control'   ");
														?>
													</div>
												</div>
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
				 
						<br>		
					 	
<center><button class='btn btn-primary' onclick="reload_table_filter()">Filter</button></center>
 			
			
			

<script type="text/javascript">
	function edit_peserta_online(id){
		loading("area_edit");
		$.post("<?php echo base_url()?>permohonan/edit_peserta_online",{id:id},function(data){
			$("#dt-edit").html(data);
			unblock("area_edit");
		});
	}

	function detail_peserta_online(id){
		loading("area_detail");
		$.post("<?php echo base_url()?>permohonan/detail_peserta_online",{id:id},function(data){
			$("#dt-detail").html(data);
			unblock("area_detail");
		});
	}

	function delete_peserta_online(){
		var id = $("#getId").val();
		loading("area_delete");
		$.post("<?php echo base_url()?>permohonan/delete_peserta_online",{id:id},function(data){
			notif("Data berhasil didiskulifikasi");
			unblock("area_delete");
			$("#mdl_delete").modal('toggle');
			reload_table();
		});
	}

	function getId(id){
		$("#getId").val(id);
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
					notif("Silahkan pilih data terlebih dahulu");
					return false;
				}  
		  swal({
                title: "Diskualifikasi ("+i+") data terpilih ?",
               text:"",
                
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) { 
			   var kode=$("[name='filter']").val();
			    $.post("<?php echo base_url()?>permohonan/hapus_cek",{kode:kode,id:checkbox_value},function(data){
		 	    reload_table();
			});   
                    swal("("+i+") data terpilih telah didiskulifikasi!", {
                        icon: "success",
                    });
                } else {
                    return false;
                }
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
		 [[10,20,30,40,50], 
		 [10,20,30,40,50]],
         dom: 'Blfrtip',
		buttons: [
          {
			  text: ' Diskualifikasi ',
                action: function ( e, dt, node, config ) {
                   hapus();
                },className: 'btn btn-danger btn-border btn-round btn-sm  dt-padding-right'
        }, {
			  text: ' Kirim ulang notifikasi',
                action: function ( e, dt, node, config ) {
                   broadcast();
                },className: 'btn btn-black btn-border btn-round btn-sm   dt-padding-right'
        },
        ],
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('permohonan/ajax_peserta')?>",
            "type": "POST",
			"data": function ( data ) {
						
						 
						  data.jenis_acara = $('#facara').val();
						  data.dispo = $('#fdispo').val();
						  data.distri = $('#fdistri').val();
						  data.prov = $('#fprov').val();
						  data.kab = $('#fkab').val();
						  data.fjadwal = $('#fjadwal').val();
						  data.fdis = $('#fdis').val();
						  data.facara = $('#facara').val();
						  data.fblok = $('#fblok').val();
						    
						 
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
	
 
	function modal_filter()
	{
		$("#mdl_modal").modal("show");
		//     $("#form_filter").html("Loading...");
		//	 $.post("<?php echo site_url("permohonan/form_filter"); ?>",function(data){
		// 	   $("#form_filter").html(data); 
		//	   
		//	}); 
	}

</script>	
			
		 
	


								
 <script type="text/javascript"> 
	 	$(document).ready(function() {
       $('#').select2({
		      closeOnSelect: false,
		   theme: "bootstrap",
           minimumInputLength: 0,
           allowClear: true,
		    dropdownParent: $('#mdl_modal'),
             placeholder: 'pilih dari group...',
           ajax: {
              dataType: 'json',
              url: '<?php echo base_url()?>permohonan/dataProvinsi',
              delay: 100,
              data: function(params) {
                return {
                  search: params.term
                }
              },
              processResults: function (data, page) {
              return {
                results: data
              };
            },
          }
      });
      
		});
		
	function onGroup(val)
	{
		 
		     $("#form_kab").html("Loading...");
			 $.post("<?php echo site_url("permohonan/form_kab"); ?>",{val:val},function(data){
		 	   $("#form_kab").html(data);  
			}); 
	}		
		 
	function reload_table_filter()
	{
		$("#mdl_modal").modal("hide");
		reload_table();
	}
 
</script>
				 
					 
					<br>
                </div>
                 
                
            </div>
        </div>
    </div>
</div>	
	




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
           // $("#mdl_konfirm").modal("show");
            $("#masterData").html("mohon tunggu...");
			 $.post("<?php echo site_url("permohonan/broadcast"); ?>",{val:checkbox_value},function(data){
			     unblock();
		 	   $("#masterData").html(data);  
			}); 
	}		
     
</script>	
		
		
	
<!-- Modal -->
<div class="modal fade " id="mdl_konfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
 
   <div class="modal-dialog   modal-lg" role="document" >
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
					Kirim ulang notifikasi pengambilan undangan<hr>
					</div>
					<div id="masterData"></div>
				</div>
			</div>
		</div>
	</div>
</div>	