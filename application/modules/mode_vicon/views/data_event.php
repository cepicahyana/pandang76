<b>DATA EVENT</b><hr>

<div class="row">
	<div class="col-md-12 col-sm-12">
		<label>  Akun  *</label>
	<?php
				$this->db->order_by("nama","asc");
		$db	=	$this->db->get("zoom_akun")->result();	
		foreach($db as $val)
		{
			$key[$val->id]=$val->nama;
		}	
	 	echo form_dropdown("id_akun",$key,"","class='form-control' ");
	 ?>
	</div>
	<div class="col-md-12 col-sm-12">
		<label>  Kode  *</label>
		<input type="text" name="code" class="form-control" required=""  >
	</div>
	<div class="col-md-12 col-sm-12">
		<label>  Title*</label>
		<input type="text" name="title" class="form-control"  required="" >
	</div>
	<div class="col-md-12 col-sm-12"><br><center>
	 <button class='btn btn-sm btn-primary' onclick="saveEvent()">SIMPAN</button>
	 </center>
	 </div>
</div>
 <hr>
<div id="zoomDataAjax">
</div>

<script type="text/javascript"> 
function saveEvent()
{
	var code	=	$("[name='code']").val();
	var title	=	$("[name='title']").val();
	var id_akun	=	$("[name='id_akun']").val();
	if(!code || !title)
	{
		notif("code / title tidak boleh kosong ");
		return false;
	}
	 loading("zoomDataAjax");
	 
	 $.ajax({
		 url:"<?php echo site_url("zoom/insert_event"); ?>",
		 data: {code:code,title:title,id_akun:id_akun},
		 method:"POST",
		 dataType:"JSON",
		 beforeSend: function() {
             unblock("zoomDataAjax");
            },
		 success: function(data){
			  unblock("zoomDataAjax");
			 if(data.gagal==true)
			 {
				 notif(data.info);
				 return false;
			 } 
			  event_load();
		 	  $("#zoomDataAjax").html(data);   
		 } 
	 }); 
}
event_load();
function event_load(){
				 loading("zoomDataAjax");
			 $.post("<?php echo site_url("zoom/zoomDataAjax"); ?>",function(data){
			     unblock("zoomDataAjax");
		 	     $("#zoomDataAjax").html(data);  
			}); 
}
</script>


<script>
function hapus_event(kode,title)
{
					swal({
						title: 'hapus ?',
						text: title,
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
						 $.post("<?php echo site_url("zoom/delete_event"); ?>",{kode:kode,title:title},function(data){
							 unblock("zoomDataAjax");
							 event_load();							 
						}); 
						}  
					});
}				
</script>