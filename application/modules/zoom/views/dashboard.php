 
<div class="row col-md-12" style='margin-left:0px'>
<!--<div class="col-md-12"> <center>
 <a href="<?php echo base_url()?>monitoring_souvenir" class="btn btn-light btn-sm menuclick la flaticon-share-1"> Perbaharui data</a>
 </center>
 <br>
 </div>-->
<div class="col-12 col-sm-6 col-md-6 ">
							<div class="card card-dark bg-info-gradient">
								<div class="card-body  bubble-shadow">
									<div class="d-flex justify-content-between">
										<div class="btn btn-info btn-sm btn-block">
											<center><h5><b>   GIVEN</b></h5></center>
										 
										</div>
									 
									</div> 
									 
									<div class="d-flex justify-content-between mt-2" >
										<p class="text-muted mb-0 text-white"> <b><font color="white">Total data</font> </p>
										<p class="text-muted mb-0"><font color="white"> <?php echo $totalGiven	=	$this->mdl->totalData(1)?> </font> </p>
									</div>
									<div class="d-flex justify-content-between mt-2">
										<p class="text-muted mb-0"><font color="white">Sudah masuk VCon</font> </p>
										<p class="text-muted mb-0"> <font color="white"><?php echo $totalMasuk	=	$this->mdl->totalDataMasuk(1)?></font>  </p>
									</div><div class="d-flex justify-content-between mt-2">
										<p class="text-muted mb-0"><font color="white">Progress</font> </p>
										<p class="text-muted mb-0"><font color="white"> <?php echo $this->mdl->persen($totalGiven,$totalMasuk)?> %</b></font>  </p>
									</div>
								</div>
							</div>
 </div>
 
 
 
 <div class="col-12 col-sm-6 col-md-6">
								<div class="card card card-dark bg-info-gradient">
								<div class="card-body card-body bubble-shadow">
									<div class="d-flex justify-content-between">
										<div class="btn btn-info btn-sm btn-block">
											<center><h5><b>    REGISTRASI ONLINE</b></h5></center>
										 
										</div>
									 
									</div> 
									 
									<div class="d-flex justify-content-between mt-2">
										<p class="text-muted mb-0"><b><font color="white">Total data </font></p>
										<p class="text-muted mb-0"><font color="white"><?php echo $totalGiven	=	$this->mdl->totalData(2)?> </font> </p>
									</div>
									<div class="d-flex justify-content-between mt-2">
										<p class="text-muted mb-0"><font color="white">Sudah masuk VCon </font></p>
										<p class="text-muted mb-0"> <font color="white"><?php echo $totalMasuk	=	$this->mdl->totalDataMasuk(2)?>  </font></p>
									</div><div class="d-flex justify-content-between mt-2">
										<p class="text-muted mb-0"><font color="white">Progress </font></p>
										<p class="text-muted mb-0"><font color="white"> <?php echo $this->mdl->persen($totalGiven,$totalMasuk)?> % </font> </b></p>
									</div>
								</div>
							</div>
 </div> 
  		
	  
						
						 
						 
 </div>
 
 
 <div class="col-md-6 ">
							<div class="card ">
								<div class="card-body   ">
								  	<div class="col-black"><h4>Klasifikasi pendaftar online berdasarkan pekerjaan</h4></div>
									<table class="entry" width="100%">
									<tr class='bg-info'>
									<td width="10px">NO</td>
									<td>PEKERJAAN</td>
									<td>JUMLAH</td>
									</tr>
									<?php 
											$this->db->order_by("urut","asc");
									$dt	=	$this->db->get("tr_pekerjaan")->result();
									$no	=	1;
									foreach($dt as $val)
									{
										echo "
										<tr>
										<td>".$no++."</td>
										<td>".$val->nama."</td>
										<td>".$this->mdl->jmlPekerjaan($val->id)."</td>
										</tr>
										";
									}
									?>
									</table>
								</div>
							</div>
						</div>
 


<div class="col-md-6 ">
							<div class="card ">
								<div class="card-body   ">
								  	<div class="col-black"><h4>Persentase pendaftar online berdasarkan negara </h4></div> 
									<?php 
										$totalOnline		=	$this->mdl->totalOnline(); 
										$dalam				=	$this->mdl->jmlDalamNegeri();
										$luar				=	$this->mdl->jmlLuarNegeri();
										
										?>
									<div class="d-flex flex-wrap justify-content-around pb-2 pt-4" style="margin-top:-20px">
										<div class="px-2 pb-2 pb-md-0 text-center"> <h6 class="fw-bold mt-3 mb-0">DALAM NEGERI</h6><br>
											<div id="circles-1"><?php echo  $persen1 =	$this->mdl->persen($totalOnline,$dalam);?></div>
											
											<?php echo $dalam;	?> pendaftar
										</div>
										<div class="px-2 pb-2 pb-md-0 text-center"> <h6 class="fw-bold mt-3 mb-0">LUAR NEGERI</h6><br> 
											<div id="circles-2"><?php echo $persen2	=	$this->mdl->persen($totalOnline,$luar);?></div>
											<?php echo $luar;?> pendaftar
										</div>
										 
									</div>
									<br>
									<br>
								</div>
							</div>
 </div>

 


 <div class="col-md-12 ">
							<div class="card ">
								<div class="card-body   ">
								  	<div class="col-black"><h4>Klasifikasi pendaftar online berdasarkan negara</h4></div>
									<table id="table" class="tabel black table-striped table-bordered table-hover dataTable" width="100%">
									<thead class='bg-info'>
									<th  class='thead' width="10px">NO</th>
									<th class='thead'  >NEGARA</th>
									<th class='thead'  >JUMLAH</th>
									</thead> 
									</table>
								</div>
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
		
		  
        ],
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('zoom/ajax_dashboard')?>",
            "type": "POST",
			"data": function ( data ) {
						 
						  
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
          "targets": [ 0,1,2 ], //last column
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
	</script>					
						
						
						
						
						
						
						
						
						  
	
	<script>
	function detail(id)
	{
		$("#mdl_detail").modal("show");
		$("#dt-detail").html("mohon tunggu...");
		$.post("<?php echo base_url()?>mymdl/getDetail",{id:id},function(data){
			$("#dt-detail").html(data); 
		});
	}
	</script>
	
	
	
<div class="modal fade" id="mdl_detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" id="area_detail">
  	<div class="modal-header">
        <h5>Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body" id="dt-detail">
    </div>
    </div>
  </div>
</div>







 <script>
					    $(document).ready(function() {
		 
		Circles.create({
			id:'circles-1',
			radius:45,
			value:<?php echo $per_dispo=number_format($persen1);?>,
			maxValue:100,
			width:7,
			text: <?php echo $per_dispo;?>+"%",
			colors:['#f1f1f1', '#FF1493'],
			duration:700,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-2',
			radius:45,
			value:<?php echo $per_dispo=number_format($persen2);?>,
			maxValue:100,
			width:7,
			text: <?php echo $per_dispo;?>+"%",
			colors:['#f1f1f1', '#1572E8'],
			duration:900,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})
 
		  		});
	</script>