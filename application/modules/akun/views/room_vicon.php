 
 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

    <div class="card">
        <div class="card-header">
            <div class="card-title">Room vicon
			 
        			<button class="btn btn-primary btn-sm float-right" onclick="add()"><i class="fas fa-plus"></i> Tambah Data</button>
        		</div> 
        </div>

        <div class="row card-body" style='padding-top:10px;padding-bottom:20px'>
	<div class='col-md-4'>
				 
					<?php
									$this->db->order_by("nama","asc");
					$db			=	$this->db->get("zoom_akun")->result();
					$akun[null]	=	" --- filter akun vicon ---";
					foreach($db as $val)
					{
						 
						$akun[$val->id]	= $val->nama;
					}
					echo form_dropdown("akun",$akun,"","class='form-control' id='akun'  onchange='reload_table()' ");
					?>
					</select>
					</div>
			<div class="col-md-12 table-responsive"  >&nbsp;</div>		
        	<div class="col-md-12 table-responsive" id="area_lod">
        		
        		<table id='table' width="100%" class="tabel black table-striped table-bordered table-hover dataTable">
				  	<thead>
				  		<tr>
				  				<th class='thead'  width='15px'>&nbsp;NO</th>
									<th class='thead' >AKUN VICON</th> 
									<th class='thead' >KODE (IDMEETING)</th> 
									<th class='thead' >NAMA EVENT (MEETING)</th>  
									<th class='thead' >STATUS</th>  
									<th class='thead' width="150px">EDIT | HAPUS</th>
									<th class='thead' width="150px">Resset</th>
				  		</tr>	 
					</thead>
				</table>
        	</div>
        </div>

    </div>
</div>	
							
 
       
                <!-- #END# Task Info -->
				
 
  <script type="text/javascript">
  	 function hapus(id,akun){
		  
swal({
						title: 'Hapus ?',
						text: akun,
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
							swal("akun "+akun+" telah dihapus", {
								icon: "success",
								buttons : {
									confirm : {
										className: 'btn btn-success'
									}
								}
							});
							
							   $.post("<?php echo site_url("akun/hapus_room"); ?>",{id:id},function(){
							   reload_table();
							  });
							
						}  
					});
					
	 
		 
		    
	  };
	
	  
      var save_method; //for save method string
    var table;
  var  dataTable = $('#table').DataTable({ 
		"paging": true,
        "processing": false, //Feature control the processing indicator.
		"language": {
					 "sSearch": "Pencarian",
					 "processing": ' <span class="sr-only dataTables_processing">Loading...</span> <br><b style="color:black;background:white">Proses menampilkan data<br> Mohon Menunggu..</b>',
						  "oPaginate": {
							"sFirst": "Hal Pertama",
							"sLast": "Hal Terakhir",
							 "sNext": "Selanjutnya",
							 "sPrevious": "Sebelumnya"
							 },
						"sInfo": "Total :  _TOTAL_ , Halaman (_START_ - _END_)",
						 "sInfoEmpty": "Tidak ada data yang di tampilkan",
						   "sZeroRecords": "Data tidak tersedia",
						  "lengthMenu": "Tampil _MENU_ Baris",  
				    },
					 
					 
        "serverSide": true, //Feature control DataTables' server-side processing mode.
		 "responsive": true,
		 "searching": true,
		 "lengthMenu":
		 [[10 ,20,30,50], 
		 [10 ,20,30,50], ], 
	  dom: 'Blfrtip',
		buttons: [
           // 'copy', 'csv', 'excel', 'pdf', 'print'
			 
			 
					 
					 
        ],
        
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('akun/getDataRoom');?>",
            "type": "POST",
			"data": function ( data ) {
			   data.akun =$("[name='akun']").val();
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
          "targets": [ 0,-1,-2,-3 ], //last column
          "orderable": false, //set not orderable
        },
        ],
	
      });
	function reload_table()
	{
		 dataTable.ajax.reload(null,false);	
	};
	 
	</script>
	
	
	
	
	
<script>
 


function add()
{
			$.post("<?php echo site_url("akun/viewAdd_room"); ?>",{},function(data){
			 $("#mdl_modal_artikel").modal();
			 $("#viewAdd").html(data);
		      }); 
	 
}
</script>
	 

	
 <div class="modal fade" id="mdl_modal_artikel" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" id="area_modal_artikel" role="document">
				
	<form  action="javascript:submitFormAkun('modal_artikel')" id="modal_artikel" url="<?php echo base_url()?>akun/insert_room"   method="post" enctype="multipart/form-data">
                    <div class="modal-content">  
                        <div class="modal-header">  <h5 class="modal-titles" id="defaultModalLabel"><b>Tambah</b></h5>
						<button type="button" class="close" aria-label="Close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
						</button>
                          
							 
                        </div>
                        <div class="modal-body">
                       	   <div id="viewAdd"></div>
 
                       <div class="modal-footer">
						<span id="msg" class='pull-left'></span>
                            <div class="btn-group" role="group" aria-label="Default button group">
                                      
                                  <!--      <button  title="tutup"  data-dismiss="modal" class="btn bg-teal  waves-effect"><i class="material-icons">cancel</i> </button>
                                   -->      <button  id="submit" class="btn btn-primary waves-effect" onclick="submitFormAkun('modal_artikel')" ><i class="fa fa-save"></i> SIMPAN</button>
                                    </div>
                             
                        </div>

				</div>
				</div>
					 
       		
				</div>
				</form>
         </div><!-- /.modal-dialog -->
       
   
<script>
 
	 function edit(id)
	 {	 
		 		  
			 $.post("<?php echo site_url("akun/viewEdit_room"); ?>",{id:id},function(data){
		 	   $("#editan").html(data);
			    $("#mdl_modal_edit").modal();
			}); 
	 }

	 function set(id,sts)
	 {	 
		 		  
			 $.post("<?php echo site_url("akun/set"); ?>",{id:id,sts:sts},function(data){
		 	   reload_table();
			     
			}); 
	 }
   
</script>




 <div class="modal fade" id="mdl_modal_edit" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" id="area_modal_edit" role="document">
				
	<form  action="javascript:submitFormAkun('modal_edit')" id="modal_edit" url="<?php echo base_url()?>akun/update_room"  method="post" enctype="multipart/form-data">
                    <div class="modal-content">  
                         <div class="modal-header">  <h5 class="modal-titles" id="defaultModalLabel"><b>Edit </b></h5>
						<button type="button" class="close" aria-label="Close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
						</button>
                          
							 
                        </div>
                        <div class="modal-body">
                       	  
					   	 <div id="editan"></div>
							 
 
                       <div class="modal-footer">
						<span id="msg" class='pull-left'></span>
                            <div class="btn-group" role="group" aria-label="Default button group">
                                      
                               <!--         <button  title="tutup"  data-dismiss="modal" class="btn bg-teal  waves-effect"><i class="material-icons">cancel</i> </button>
                                -->         <button  id="submit" class="btn btn-primary btn-sm waves-effect" onclick="submitFormAkun('modal_edit')" ><i class="fa fa-save"></i> SIMPAN</button>
                                    </div>
                             
                        </div>

				</div>
				</div>
					 
       		
				</div>
				</form>
   </div><!-- /.modal-dialog --> 

		 



 
	
 
<script>						
 function ressetPesertaZoom(id,akun,id_type){
		  if(id_type==1)
		  {
			  var vi="Given";
		  }else{
			  var vi="Online";
		  }
swal({
						title: 'Resset peserta vicon - '+vi+' ?',
						text: akun,
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
							swal("akun "+akun+" telah dihapus", {
								icon: "success",
								buttons : {
									confirm : {
										className: 'btn btn-success'
									}
								}
							});
							
							   $.post("<?php echo site_url("akun/resset_zoom_peserta"); ?>",{id:id,id_type:id_type},function(){
							   reload_table();
							  });
							
						}  
					});
					
	 
		 
		    
	  };
</script>						
						
			 