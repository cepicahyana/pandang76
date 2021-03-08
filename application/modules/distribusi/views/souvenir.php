
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"  id="area_formSubmit">
				
                    <div class="card">
					<div class="card-header" >
									<div class="card-title">Penjadawalan pendistribusian  </div> 
					</div>
				
				<div class='row card-body' style='padding-top:10px;padding-bottom:20px'>	 
					 	 
			 
				  
				</div>	
					<div class="table-responsive">
					 <table id='table' width="100%" class="tabel black table-striped table-bordered table-hover dataTable">
					  <thead  >	 
					 		<th class='thead' style='max-width:15px' >
									<input id="md_checkbox" value="ya" class="pilihsemua filled-in chk-col-red" type="checkbox"></th>	 
									<th   class='thead' axis="string" width='15px'>NO</th> 
									<th    class='thead'>NAMA</th> 
									<th    class='thead'>KONTAK</th> 
									<th    class='thead'>UNDANGAN</th> 
									<th    class='thead'>VVIP</th> 
									<th    class='thead ' ><center>VIP</center></th>  
									<th    class='thead ' ><center>UMUM</center></th>  
								 </thead>
					</table>
					 </div>
					  
                </div>
                </div>
            
			
			 
		
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
		[[10,15,20,30], 
		 [10,15,20,30]],
         dom: 'Blfrtip',
		buttons: [
		{
			  text: ' Atur Tanggal Distribusi (kirim notifikasi & cetak label)',
                action: function ( e, dt, node, config ) {
                   broadcast();
                },className: 'btn  btn-danger fa fa-calendar-alt btn-sm   dt-padding-right'
        },
           
        ],
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('distribusi/ajax_souvenir')?>",
            "type": "POST",
			"data": function ( data ) {
						
						 
						  data.jenis_acara = $('#facara').val();
						  data.dispo = $('#fdispo').val();
						  data.distri = $('#fdistri').val();
						  data.prov = $('#fprov').val();
						  data.kab = $('#fkab').val();
						   
						 
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
          "targets": [ 0,1,2,3,4,5   ], //last column
          "orderable": false, //set not orderable
        },
        ],
	
      });
    
   
		
		 function reload_table()
    {
      dataTable.ajax.reload(null,false); //reload datatable ajax 
    }
	 
	function broadcast()
	{	  
	var checkbox_value = "";
    $("[name='pilih[]']").each(function () {
        var ischecked = $(this).is(":checked");
        if (ischecked) {
            checkbox_value += $(this).val() + ",";
        }
    });
	if(!checkbox_value)
	{
		notif("Mohon pilih data yang akan didistribusikan");
		return false;
	}
	
	$("#isiModal").html("Loading..."); 
		 $("#mdl_modal").modal("show");
		 $.post("<?php echo site_url("distribusi/isiModalDistribusiSouvenir"); ?>",{id:checkbox_value},function(data){
		   $("#isiModal").html(data); 
		 });
	}

</script>	
			
		 
	
	
<!-- Modal -->
<div class="modal fade " id="mdl_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
 
   <div class="modal-dialog   modal-lg" role="document" >
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="modal-content">
                <div class="modal-body">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button><b>Tentukan jadwal distirbusi</b>
					<hr>
					<div  id="isiModal"></div>
                </div> 
            </div>
        </div>
    </div>
</div>	
	

				
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
              url: '<?php echo base_url()?>distribusi/dataProvinsi',
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
			 $.post("<?php echo site_url("distribusi/form_kab"); ?>",{val:val},function(data){
		 	   $("#form_kab").html(data);  
			   	reload_table();
			}); 
			
	}		
		 
	function reload_table_filter()
	{
		$("#mdl_modal").modal("hide");
		reload_table();
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