 
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  id="area_formSubmit">
				
                    <div class="card">
					<div class="card-header" >
									<div class="card-title">Verifikasi permohonan online </div> 
					</div>
				
				<div class='row card-body' style='padding-top:10px;padding-bottom:20px'>	 
					<div class='col-md-3'  >
					<select class='form-control' id='facara' onchange="reload_table()">
					<option value="">--- Filter acara --- </option>
					<option value="1"> Pagi (Penaikan bendera)</option>
					<option value="2"> Sore (Penurunan bendera)</option>
					<option value="3"> Pagi & Sore  </option>
					</select>
					</div>
					
					<div class='col-md-3'  >
					<select class='form-control' id='fsuci' onchange="reload_table()">
					<option value="">--- Filter renungan suci --- </option>
					<option value="1"> Tampilkan pemohon renungan suci</option>
					<option value="2"> Tidak menampilkan renungan suci</option>
					 
					</select>
					</div>
					
				<div class='col-md-3'  >
												 
													<div class="select2-input">
														 
														<?php
														 
														$this->db->order_by("nama","asc");
														$data=$this->db->get("wil_provinsi")->result();
														$db[null]="---- filter provinsi ----";
														foreach($data as $data)
														{
															$db[$data->id_prov]=$data->nama;
														}
														echo form_dropdown("fprov",$db,"","id='fprov' class='form-control' onchange='onGroup(this.value)' ");
														?>
													</div>
													<script>
													$('#fprov').select2({
														theme: "bootstrap"
													});
													</script>
				 </div>	 
				 
				 <div class='col-md-3'  >
										<div id="form_kab">
												<select class="form-control" id="fkab">
													 <option value=''>---- filter kabupaten ----</option>
												</select>	 
												</div>
				 </div>	 
					
					 
					
					  
				  
				</div>	
					
					 <table id='table' width="100%" class="tabel black table-striped table-bordered table-hover dataTable">
					  <thead  >	 
					 		
									<th   class='thead' axis="string" width='15px'>No</th> 
									<th    class='thead'>Nama Pemohon</th> 
									<th    class='thead'>Acara</th> 
									<th    class='thead ' ><center>Kontak</center></th>  
									<th    class='thead ' ><center>Alamat</center></th>  
									<th    class='thead ' >Verifikasi</th> 
								 </thead>
					</table>
					 
					 
					 
					 
					 
                </div>
                </div>
            
			
			
			
			
			
			
			
			
			
			
			
			
		
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
		 [[20, 40,60,80,100,200,300,2000000000], 
		 [20, 40,60,80,100,200,300,"All"]],
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
            "url": "<?php echo site_url('dispo/ajax_peserta/'.$this->uri->segment(3).'')?>",
            "type": "POST",
			"data": function ( data ) {
						
						 
						  data.jenis_acara = $('#facara').val();
						  data.dispo = $('#fdispo').val();
						  data.distri = $('#fdistri').val();
						  data.prov = $('#fprov').val();
						  data.kab = $('#fkab').val();
						  data.suci = $('#fsuci').val();
						   
						 
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
          "targets": [ 0,1,2,3,4,5], //last column
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
		//	 $.post("<?php echo site_url("dispo/form_filter"); ?>",function(data){
		// 	   $("#form_filter").html(data); 
		//	   
		//	}); 
	}

</script>	
			
		 <script>
			function onGroup(val)
	{
		 
		     $("#form_kab").html("Loading...");
			 $.post("<?php echo site_url("dispo/form_kab"); ?>",{val:val},function(data){
				 reload_table();
		 	   $("#form_kab").html(data); 	 	
			});   
	}		
		 function verifikasi(id)
		 {	 
			$("#dataVerifikasi").html("Mohon menunggu...."); 	
				$("#mdl_modal").modal({backdrop: 'static', keyboard: false});
				var acara = $("#facara").val();
				var suci  = $("#fsuci").val();
				var prov  = $("#fprov").val();
				var kab   = $("#fkab").val();
			 
			  $.post("<?php echo site_url("dispo/verifikasi"); ?>",{id:id,acara:acara,suci:suci,prov:prov,kab:kab},function(data){ 
		 	    $("#dataVerifikasi").html(data); 	 		 	
			});   
		 }
		 function closeModal(id=null,sts=null)
		 {
			 
			 	$("#mdl_modal").modal("hide");
				if(!sts){
					reload_table();
				return false;
				
				}
				$.post("<?php echo site_url("dispo/closeVerifikasi"); ?>",{id:id,sts:sts},function(data){ 
		 	    $("#dataVerifikasi").html(data); 	
				reload_table();				
				});
		 }
		 
		 
			</script>
			
	
	
<!-- Modal -->
<div class="modal fade " id="mdl_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
 
   <div class="modal-dialog   modal-lg" role="document" style='min-width:80%' >
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="modal-content" >
                <div class="modal-body">
                  
					
					  
					 <div id="dataVerifikasi"></div>
					<br>
                </div>
                 
                
            </div>
        </div>
    </div>
</div>	
	


	
		