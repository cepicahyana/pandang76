<?php $con=new konfig(); $dp=$con->dataProfile($this->session->userdata("id")); ?> 
<h1>Manajemen User Group<small>kelola hak akses data pengguna</small>
<a href="javascript:add()" class="btn btn-primary pull-right">
<i class="fa fa-plus-circle fa-lg"></i> Add User Group
</a>
</h1>

<div class="row">
<?php
$n=1;
foreach($dataUser as $data)
{
if($n==1){
$warna="blue-bg";
}elseif($n==2){
$warna="red-bg";
}elseif($n==3){
$warna="emerald-bg";
}elseif($n==4){
$warna="purple-bg";
}elseif($n==5){
$warna="yellow-bg";
}else{
$warna="gray-bg";
}
$n++;
?>
<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
<div class="main-box clearfix profile-box-contact">
<div class="main-box-body clearfix">
<div class="profile-box-header <?php echo $warna; ?> clearfix">
<img src="<?php echo base_url();?>file_upload/dp/<?php  echo $dp->poto; ?>" alt="" class="profile-img img-responsive"/>
<h2><?php echo strtoupper($data->nama); ?></h2>
<div class="job-position">

</div>
<ul class="contact-details">
<li>
<i class="fa fa-link"></i> <?php echo $data->direct; ?>
</li>
<li>
<i class="fa fa-info"></i> <?php echo $data->ket; ?>
</li>

</ul>
</div>
<div class="profile-box-footer clearfix">

<a href="<?php echo base_url()."super/menu/".$data->id_level;?>">
<span class="">Menu</span>
</a>

<a href="javascript:edit(<?php echo $data->id_level;?>)">
<span class="">Edit</span>
</a>

<a onclick="tanya(<?php echo $data->id_level; ?>)" href="#">
<span class="">Hapus</span>
</a>







</div>
</div>
</div>
</div>

<?php } ?>



</div>




<script>
var save_method="";
function add()
{
$("#add").modal("show");
$(".modal-title").html("Add user Group");
save_method="add";
   $('#form')[0].reset(); // reset form on modals
}
function tanya(id)
{
	var tanya=confirm("Hapus ?");
	if(tanya==false)
	{ return false; }else{ window.location.href="<?php echo base_url();?>super/hapus_UG/"+id; }
}

function save()
{
      var url;
      if(save_method == 'add') 
      {
         url="<?php echo base_url();?>super/addUserGroup/";
      }
      else
      {
        url="<?php echo base_url();?>super/editUserGroup/";
      }

       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#add').modal('hide');
              window.location.href="<?php echo base_url();?>super/manajemen";
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
}


 function edit(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo base_url();?>super/getUG/"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
           
            $('[name="id_level"]').val(id);
            $('[name="nama"]').val(data.nama);
            $('[name="link"]').val(data.direct);
            $('[name="ket"]').val(data.ket);
          
            $('#add').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit User Group'); // Set title to Bootstrap modal title
            
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Try Again!');
        }
    });
    }

</script>











<!-- Bootstrap modal -->
  <div class="modal fade" id="add" role="dialog" >
		<div class="modal-dialog">
               <div class="md-content">
				<div class="modal-header">
				<button data-dismiss="modal" class="md-close close">&times;</button>
				<h4 class="modal-title"></h4>
				</div>
				<div class="modal-body">
				
				
	<form class="form-horizontal" id="form" action="javascript:save()">			
					<div class="form-group">
		<label for="inputNama" class="black col-lg-2 control-label">Nama level</label>
		 <div class="col-lg-9">
			<input required type="hidden" class="form-control"  name="id_level">
			<input required type="text" class="form-control"  name="nama" id="inputNama" placeholder="">
		 </div>
	</div>

	<div class="form-group">
		<label for="inputTelp" class="black col-lg-2 control-label">Link Direct</label>
		 <div class="col-lg-9">
			<input  type="text" class="form-control"  name="link" id="inputTelp" placeholder="">
		 </div>
	</div>

	

	<div class="form-group">
		<label for="inputuser" class="black col-lg-2 control-label">Keterangan</label>
		 <div class="col-lg-9">
			<input required type="text" class="form-control"  name="ket" id="inputuser" placeholder="">
		 </div>
	</div>

	
	<div class="form-group">
	 <div class="col-lg-11">
	<button class="btn btn-success pull-right"><i class='fa fa-save'></i> simpan</button>
	</div>
	</div>
	
	</form>		
				
				</div>
				</div>
				</div>
         </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->
