 
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  id="area_formSubmit">
				
                    <div class="card">
					<div class="card-header" >
									<div class="card-title">Permohonan Khusus & Given </div> 
					</div>
				
				<div class='row card-body' style='padding-top:10px;padding-bottom:20px'>	 
					 
					
					<div class='col-md-4'>
					<select class='form-control' id='fdispo' onchange="reload_table()">
					<option value="">--- Filter disposisi --- </option>
					<option value="1"> Sudah disposisi</option>
					<option value="3"> Draft</option>
					<option value="2"> Belum disposisi</option> 
					</select>
					</div>	
					
					<div class='col-md-4'>
					<select class='form-control' id='fdistri' onchange="reload_table()">
					<option value="">--- Filter pengambilan --- </option>
					<option value="1"> Sudah diambil</option>
					<option value="2"> Belum diambil</option> 
					</select>
					</div>
					
					<div class='col-md-4'>
					<select class='form-control' id='fjenis' onchange="reload_table()">
					<option value="">--- Filter Jenis Permohonan --- </option>
					<option value="2"> Permohonan Khusus</option>
					<option value="3"> Given</option> 
					</select>
					</div>
					
					  
				  
				</div>	
					
					 <table id='table' width="100%" class="tabel black table-striped table-bordered table-hover dataTable">
					  <thead  >	 
					 		
									<th   class='thead' axis="string" width='15px'>No</th> 
									<th    class='thead'>Nama Pemohon</th> 
									<th    class='thead'>Acara Pagi</th> 
									<th    class='thead ' ><center>Acara Sore</center></th>  
									<th    class='thead ' ><center>Disposisi</center></th> 
									<th    class='thead ' ><center>Pengambilan</center></th> 
									<th    class='thead ' ><center>Jenis</center></th> 
									<th    class='thead ' >OPSION</th> 
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
            "url": "<?php echo site_url('permohonan/ajax_persus/')?>",
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
		 	 $.post("<?php echo site_url("permohonan/getDispoPersus"); ?>",{id:id},function(data){
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
	


	
		