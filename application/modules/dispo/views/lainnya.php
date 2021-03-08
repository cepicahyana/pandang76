 
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  id="area_formSubmit">
				
                    <div class="card">
					<div class="card-header" >
									<div class="card-title">Permohonan acara lainnya </div> 
					</div>
				
				<div class='row card-body' style='padding-top:10px;padding-bottom:20px'>	 
					 
					
					<div class='col-md-4'>
					<select class='form-control' id='fdispo' onchange="reload_table()">
					<option value="">--- Filter verifikasi --- </option>
				 
					<option value="3"> Draft</option>
					<option value="2"> Belum diperivikasi</option> 
					</select>
					</div>	
					
			 
					
					<div class='col-md-4'>
					 
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
					
					  
				  
				</div>	
					
					 <table id='table' width="100%" class="tabel black table-striped table-bordered table-hover dataTable">
					  <thead  >	 
					 		
									<th   class='thead' axis="string" width='15px'>No</th> 
									<th    class='thead'>Nama Pemohon</th> 
									<th    class='thead'>Instansi</th> 
									<th    class='thead ' ><center>Permohonan  Und.</center></th>  
									<th    class='thead ' ><center>Verifikasi</center></th>  
									<th    class='thead ' ><center>Jenis</center></th> 
									<th    class='thead ' >Action</th> 
								 </thead>
					</table>
					 
					 
					 
					 
					 
                </div>
                </div>
            
			
			
			
			
			
			
			
			
			
			
			
		
			
<div class="modal fade" id="mdl_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" id="area_edit">
	<form method="POST" url="<?php echo base_url() ?>permohonan/update_peserta_lainnya" id="edit" action="javascript:submitForm('edit')">
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
        <h5>Detail </h5>
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

	function delete_peserta_persuss(){
		var id = $("#getId").val();
		loading("area_delete");
		$.post("<?php echo base_url()?>permohonan/delete_peserta_persuss",{id:id},function(data){
			notif("Data berhasil dihapus");
			unblock("area_delete");
			$("#mdl_delete").modal('toggle');
			reload_table();
		});
	}
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
		 [[10,20,30,40,50,100], 
		 [10,20,30,40,50,100]],
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
            "url": "<?php echo site_url('dispo/ajax_lainnya/')?>",
            "type": "POST",
			"data": function ( data ) {
						 
						  data.dispo = $('#fdispo').val();
						  data.distri = $('#fdistri').val();
						  data.jenis_permohonan = $('#fjenis').val();
						  
						 
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
	
 
	function getDispo(id)
	{
		$("#mdl_modal").modal("show");
		      $("#dataIsi").html("Loading...");
		 	 $.post("<?php echo site_url("permohonan/getDispoLainnya"); ?>",{id:id},function(data){
		  	   $("#dataIsi").html(data);  
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
	


	
		