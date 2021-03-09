			 
				
					<div class="row" >
					<div class="form-group col-md-12" >
												<label for="exampleFormControlSelect1">Silahkan pilih event meeting</label>
												
													<div class="select2-input">
														 
					 <?php
					// $this->db->order_by("title","asc");
					$db			=	$this->db->query("SELECT a.id,a.id_akun,nama,kode,title,sts_aktivasi FROM zoom_event a LEFT JOIN zoom_akun b ON a.id_akun=b.id where sts_aktivasi=1 and nama is not null ORDER BY nama ASC,title ASC")->result();
					$dataevent[null]	=	" --- pilih event ---";
					//$dataevent["database"]	=	" sesuai database ";
					foreach($db as $val)
					{
						$jml	=	$this->db->query("select * from zoom_data where id_event='".$val->id."'  and registrant_id is not null")->num_rows();
						$dataevent[$val->id]	=	 $val->nama." - ".$val->title."  - (jml:".$jml.")";
					}
					echo form_dropdown("event_data",$dataevent,"","class='form-controls select2' id='event_data'  ");
					?>
													</div>
													Data yang akan ditambahkan : <?php echo $jml=count($this->m_reff->clearhasray($id=$this->input->post("id")))?>
											</div>
											</div>


			 
						<br>		
					 	
<center><button class='dt-button btn btn-primary fas fa-video b  dt-padding-right' onclick="simpan_zoom()"> Tambahkan</button></center>

<div class="col-md-12" id="hasil"></div>


 <script> $('.select2').select2({  dropdownParent: $("#mdl_modal"),theme: "bootstrap" }); </script>

 <?php
 $type	= $this->input->post("type");
 if($type)
 {
	 $link	= site_url("zoom/goInsertZoom");
 }else{
	 $link	= site_url("zoom/goInsertZoomGiven");
 }
 ?>

		<script> 
		
function simpan_zoom()
{		
var title	= "<?php echo $jml; ?>";
		var event =	$("#event_data").val();
		if(!event){ notif("silahkan tentukan event meeting"); $("#event").focus(); return false; }
		 
		 	swal({
						title: 'tambahkan data terpilih ?',
						text: title+ " data",
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
							var id	="<?php echo $id;?>";
							loading("loading_area");
							var type = "given";
							$("#hasil").html("");
						 $.post("<?php echo $link ?>",{event:event,id:id},function(data){
							$("#hasil").html("<hr>"+data);
							reload_table();	
							unblock("loading_area");							
						}); 
						}  
					});
		 
}; 	</script>


								
					 
