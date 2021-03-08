<div class="row">
<div class="col-lg-12">
<div class="main-box clearfix ">

<header class="main-box-header clearfix">
<h2 class=" black">Control System</h2>

</header>
<div class="main-box-body clearfix">

<table id='table' style="width:100%" class="tabel black table-striped table-bordered table-hover dataTable">
		  	<thead>			
				<th class='thead' axis="string" width='15px'>No</th>
				<th class='thead' axis="date">Module</th>
				<th class='thead' axis="date">[C] Create</th>
				<th class='thead' axis="date">[R] Read</th>
				<th class='thead' axis="string">[U] Update</th>
				<th class='thead' axis="string">[D] Delete</th>
				<th>&nbsp;</th>
			</thead>
</table>




</div>
</div>
</div>
</div>
<!--<link href="http://localhost/ajax_crud_datatables/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->
  <link href="<?php echo base_url();?>/plug/datatables/css/dataTables.bootstrap.css" rel="stylesheet">
  <script src="<?php echo base_url()?>plug/datatables/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url()?>plug/datatables/js/dataTables.bootstrap.js"></script>			




  <script type="text/javascript">
      var save_method; //for save method string
    var table;
    $(document).ready(function() {
      table = $('#table').DataTable({ 
        
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('super/ajax_open_log')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
          "targets": [ 0,-1 ], //last column
          "orderable": false, //set not orderable
        },
        ],

      });
    });

    function reload_table()
    {
      table.ajax.reload(null,false); //reload datatable ajax 
    }


    function deleted(id)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data to database
          $.ajax({
            url:"<?php echo base_url();?>super/deleted_log/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               //if success reload ajax table
               reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
         
      }
    }
	
	
  </script>		
  
  

  
  <!-- Bootstrap modal -->
  <div class="modal fade" id="modaledit" role="dialog">
		<div class="modal-dialog">
               <div class="md-content">
				<div class="modal-header">
				<button data-dismiss="modal" class="md-close close">&times;</button>
				<h4 class="modal-title"><b>Add User Akun</b></h4>
				</div>
				<div class="modal-body">
	<form  action="javascript:simpan()" id="form" class="form-horizontal" method="post" enctype="multipart/form-data">
<input type="hidden" name="Hak" >

<div class="form-group">
	<label for="" class="col-lg-2 control-label">Level</label>
		<div class="col-lg-9 form-group-select2">
		<div id="pilih">
		</div>
		</div>
</div>

<div class="form-group">
	<label for="poto" class="black col-lg-2 control-label">Photo</label>
	 <div class="col-lg-9">
		<input type="file" class="form-control"  value='' name="gambar" id="gambar" >
	 </div>
</div>

<div class="form-group">
	<label for="inputNama" class="black col-lg-2 control-label">Nama</label>
	 <div class="col-lg-9">
		<input required type="text" class="form-control"  value='' name="owner" id="inputNama" placeholder="Nama ">
	 </div>
</div>

<div class="form-group">
	<label for="inputTelp" class="black col-lg-2 control-label">No.Telp</label>
	 <div class="col-lg-9">
		<input  type="text" class="form-control"  value='' name="telp" id="inputTelp" placeholder="Nomor Telpon">
	 </div>
</div>

<div class="form-group">
	<label for="inputEmail1" class="black col-lg-2 control-label">E-mail</label>
	 <div class="col-lg-9">
		<input  type="email" class="form-control"  value='' name="email" id="inputEmail1" placeholder="Email">
	 </div>
</div>

<div class="form-group">
	<label for="inputuser" class="black col-lg-2 control-label">Username</label>
	 <div class="col-lg-9">
		<input required type="text" class="form-control" value='' name="username" id="inputuser" placeholder="Username">
	 </div>
</div>

<div class="form-group">
	<label for="inputPassword1" class="black col-lg-2 control-label">Password baru</label>
	 <div class="col-lg-9">
		<input type="text" class="form-control"  name="password" id="inputPassword1" placeholder="Password baru (jika password akan diubah)">
	 </div>
</div>


 <div class="modal-footer">
            <button type="submit" id="btnSave" class="btn btn-primary pull-right" onclick="javascript:simpan()">Save</button>
			<span id="msg" style='padding-right:15px;margin-top:20px'></span>
            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
          </div>
       
</form>
				</div>
				</div>
						
				</div>
         </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->
		

<script src="<?php echo base_url('plug/jqueryform/jquery.form.js');?>"></script>
<script type="text/javascript">
var save_method="";
function add()
	{
	save_method="add";
	 $('#form')[0].reset(); // reset form on modals
	$("#gambar").attr("required", "true");
	$("#inputPassword1").attr("required", "true");
	 pilih("0");
	$("#msg").html("");
	$('#modaledit').modal('show'); 
	}
	
	
	
function simpan(){
var pass=$("#inputPassword1").val();
if(pass!=null && pass!=""){
$('#msg').html('<img src="<?php echo base_url();?>plug/img/load.gif"/> Loading...');
}
    var id=$('[name="Hak"]').val();
	if(save_method=="add"){
	var link='<?php echo base_url("super/add_dataUser"); ?>'; }
	  else{
	 var link='<?php echo base_url("super/update_profile"); ?>/'+id; }
	
	
    $('#form').ajaxForm({
	 url:link,
     data: $('#form').serialize(),
	 dataType: "JSON",
     success: function(data)
            {
			$("#inputPassword1").val("");
			if(data==true){
			 $('#msg').html('<font color="green"><i class="fa fa-check-circle fa-fw fa-lg"></i> Berhasil disimpan.</font>');
			  $('#modaledit').modal('hide');
               reload_table();
			}else{
			$("#inputuser").val("");
			 $('#msg').html('<font color="red"><i class="fa fa-warning fa-fw fa-lg"></i>Silahkan cari username/password lain!</font>');
			}
			

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
    });     
};
</script> 