

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

    <div class="card">
        <div class="card-header">
            <div class="card-title">Alasan Penolakan
			 
        			<button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#mdl_formSubmit"><i class="fas fa-plus"></i> Tambah Data</button>
        		</div> 
        </div>

        <div class="row card-body" style='padding-top:10px;padding-bottom:20px'>

        	<div class="col-md-12">
        		
        		<table id='table' width="100%" class="tabel black table-striped table-bordered table-hover dataTable">
				  	<thead>
				  		<tr>
				  			<th class="thead" width="5%">No</th>
				  			<th class="thead">Deskripsi Alasan</th>
				  			<th class="thead" width="100px">Action</th>
				  		</tr>	 
					</thead>
				</table>
        	</div>
        </div>

    </div>
</div>		


<div class="modal fade " id="mdl_formSubmit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document" >
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="modal-content" id="area_formSubmit">
            	<div class="modal-header">
            		<h2>Tambah Data</h2>
            	</div>
            	<form method="POST" url="<?php echo base_url() ?>alasan_penolakan/insert" id="formSubmit" action="javascript:submitForm('formSubmit')">
	                <div class="modal-body" >
	                	<div class="row">
	                		<div class="col-md-12">
	                			<label>Deskripsi Alasan</label>
	                			<input type="text" class="form-control"  id="alasan" name="f[alasan]"/> 
	                		</div>
	                	</div>
	                </div>
	                <div class="modal-footer">
	                	<button class="btn btn-primary" onclick="submitForm('formSubmit')"><i class="fas fa-save"></i> SIMPAN</button>
	                </div>
                </form>
            </div>
        </div>
    </div>
</div>	

<div class="modal fade " id="mdl_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document" >
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="modal-content" id="area_edit">
            	<div class="modal-header">
            		<h2>Edit Data</h2>
            	</div>
            	<form method="POST" action="" url="<?php echo base_url() ?>alasan_penolakan/update" id="edit" action="javascript:submitForm('edit')">
	                <div class="modal-body" >
	                	<div class="row" id="dt-edit">
	                		
	                	</div>
	                </div>
	                <div class="modal-footer">
	                	<button class="btn btn-primary" onclick="submitForm('edit')"><i class="fas fa-save"></i> SIMPAN PERUBAHAN</button>
	                </div>
                </form>
            </div>
        </div>
    </div>
</div>	

<div class="modal" id="mdl_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog" role="document" >
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="modal-content" id="area_delete">
            	<div class="modal-header">
            		<h2>Apakah anda yakin ?</h2>
            	</div>
                <div class="modal-body text-center" id="detail_area">
                	<button class="btn btn-danger" onclick="hapus()"><i class="fas fa-trash"></i> HAPUS</button>
                	<button class="btn btn-default" data-dismiss="modal">BATAL</button>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="getId">	

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
		"order": [[ 1, "asc" ]],
		"lengthMenu":
		[[20, 40,60,80,100,200,300], 
		[20, 40,60,80,100,200,300,"All"]],
        dom: 'Blfrtip',
		buttons: [
        ],
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('alasan_penolakan/getData')?>",
            "type": "POST",
			"data": function ( data ) {
			//data.jenis_acara = $('#facara').val();
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
          "targets": [ 0, 2 ], //last column
          "orderable": false, //set not orderable
        },
        ],
	
    });

    function showDelete(id){
    	$("#mdl_delete").modal("toggle");
    	$("#getId").val(id);
    }

    function hapus(){
    	loading('area_delete');
    	var id = $("#getId").val();
		$.post("<?php echo site_url("alasan_penolakan/delete"); ?>",{id:id}, function(data){
			$("#mdl_delete").modal("toggle");
			reload_table();
			$("#getId").val("");

			notif("Data berhasil dihapus :)");

			unblock('area_delete');
		});
    }

    function update(){
    	loading('area_edit');
    	$.post("<?php echo site_url("alasan_penolakan/update"); ?>", function(data){
			notif("Data berhasil di edit :)");
			unblock('area_edit');
		});
    }

    function edit(id){
    	$("#mdl_edit").modal("toggle");
    	loading('area_edit');
    	$.post("<?php echo site_url("alasan_penolakan/edit"); ?>",{id:id}, function(data){
			$("#dt-edit").html(data);
			unblock('area_edit');
		});
    }

    function reload_table(){
    	dataTable.ajax.reload(null, false);
    }



</script>
	


	
		