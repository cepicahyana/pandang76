<?php $con=new konfig(); $uri=$this->uri->segment(3);?> 


<div class="col-lg-6 col-md-6 col-sm-6 main-box" >

<div class="clearfix col-lg-12 col-md-12 col-sm-12" style='border-right:#7FC8BA dotted 0px'>

<header class="main-box-header clearfix">
<h2><b>MENU <?php echo $this->m_konfig->getNamaUG($uri);?></b></h2>
<a href="#" onclick="addMenu('<?php echo $uri;?>')" class="fa fa-plus pull-right"> Add Menu</a>
</header>

<div id="nestable">
<!------------------------------------------------------------------------->
<?php
	  $this->db->order_by("id_menu","ASC");
	  $this->db->where("hak_akses",$uri);
$menu=$this->db->get_where("main_menu",array("level"=>1));
foreach($menu->result() as $level1)
{

if($level1->id_main==0){?>
	<div class="dd-item dd-item-list" >
	<div class="dd-handle-list"><i class="<?php echo $level1->icon;?>"></i></div>
	<div class="dd-handle">
	<?php echo "[".$level1->id_menu."] ".$level1->nama;?>
	<div class="nested-links">
	<a href="#" onclick="edit(<?php echo $level1->id_menu;?>,'admin')" class="nested-link"><i class="fa fa-pencil"></i></a>
	<a href="#" onclick="hapus(<?php echo $level1->id_menu;?>)" class="nested-link"><i class="fa fa-trash"></i></a>
	</div>
	</div>
	</div>
		
<?php }else{ ?>
<div class="dd-item dd-item-list" >
	<div class="dd-handle-list"><i class="<?php echo $level1->icon;?>"></i></div>
	<div class="dd-handle">
	<?php echo $level1->nama;?>
	<div class="nested-links">
	<a href="#" onclick="edit(<?php echo $level1->id_menu;?>,'admin')" class="nested-link"><i class="fa fa-pencil"></i></a>
	<a href="#" onclick="hapus(<?php echo $level1->id_menu;?>)" class="nested-link"><i class="fa fa-trash"></i></a>
	</div>
	</div>
	</div>
		<?php
		$this->db->order_by("id_menu","ASC");
		$this->db->where("hak_akses",$uri);
		$menu2=$this->db->get_where("main_menu",array("level"=>2,"id_main"=>$level1->id_menu));
		foreach($menu2->result() as $level2)
		{?>
	
		
	<div class="dd-item dd-item-list"  style='max-width:95%;margin-left:30px'>
	<div class="dd-handle-list"><i class="<?php echo $level2->icon;?>"></i></div>
	<div class="dd-handle">
	<?php echo $level2->nama;?>
	<div class="nested-links">
	<a href="#" onclick="edit(<?php echo $level2->id_menu;?>,'admin')" class="nested-link"><i class="fa fa-pencil"></i></a>
	<a href="#" onclick="hapus(<?php echo $level2->id_menu;?>)" class="nested-link"><i class="fa fa-trash"></i></a>
	</div>
	</div>
	</div>
			
		<?php } ?>	
			
		
<?php } ?>
	
<?php }; ?>


<!------------------------------------------------------------->
</div>


</div>







<!-- Bootstrap modal -->
  <div class="modal fade" id="modaleditorder" role="dialog" >
		<div class="modal-dialog">
               <div class="md-content">
				<div class="modal-header">
				<button data-dismiss="modal" class="md-close close">&times;</button>
				<h4 class="modal-title">Modal title</h4>
				</div>
				<div class="modal-body">
				<form action="javascript:simpan()" id="form" class="form-horizontal">
				<input  type="hidden" name="type" id="type"  value="">
				<input  type="hidden" name="Hak" id="Hak"  value="">
				<input  type="hidden" name="menuIdLama" id="menuIdLama"  value="">
				<div class="form-group">
				<label for="idmenu" class="col-lg-2 control-label">ID Menu</label>
				<span id="info"></span>
				 <div class="col-lg-2">
					<input  type="text" onchange="cekID()" class="form-control"  name="idmenu" id="idmenu" value="<?php echo $con->maxMenu(); ?>">
					
				 </div>
				</div>
				
				<div class="form-group">
				<label for="Nama" class="col-lg-2 control-label">Nama</label>
				 <div class="col-lg-10">
					<input  type="text" class="form-control"  name="Nama" id="Nama">
				 </div>
				</div>
				
				<div class="form-group">
				<label for="Level" class="col-lg-2 control-label">Level</label>
				 <div class="col-lg-10">
					
					<div class="radio checkbox-inline">
					<input type="radio" name="Level" onclick="radio('1','0')" checked value="1" id="checkbox-inl-1"/>
					<label for="checkbox-inl-1">
					1
					</label>
					</div>
					<div class="radio checkbox-inline">
					<input type="radio" name="Level"  onclick="radio('2','0')" value="2"  id="checkbox-inl-2"/>
					<label for="checkbox-inl-2">
					2
					</label>
					</div>
					
		
				 </div>
				</div>	
				
				<div class="form-group menuInduk">
				<label for="Induk" class="col-lg-2 control-label">Menu Induk</label>
				 <div class="col-lg-10">
				 <span id="dataInduk">
				 <?php
					$d[0]="";	$array=$d;
					echo form_dropdown("Induk",$array,"","class='form-control'");
				 ?>
				 </span>				 
				 </div>
				</div>
				
				<div class="form-group">
				<label for="Icon" class="col-lg-2 control-label"><a target="new" href="<?php echo base_url();?>plug/boostrap/icons-awesome.html">Icon</a></label>
				 <div class="col-lg-10">
					<input  type="text" class="form-control"  name="Icon" id="Icon">
				 </div>
				</div>
				
				
				
				<div class="form-group">
				<label for="Link" class="col-lg-2 control-label">Link Url</label>
				 <div class="col-lg-10">
					<input  type="text" class="form-control"  name="Link" id="Link" placeholder="<?php echo base_url();?>">
				 </div>
				</div>
								
				</div>
				<div class="modal-footer">
				<button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Close</button>
				<span id="msg" style='padding-right:20px;margin-top:20px;'></span>
				<button type="submit" class="btn btn-primary pull-right" >Simpan</button>
				</form>
				</div>
				</div>
         </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->
  
<script>
var savemode="";
function cekID()
{
$("#info").html("<img src='<?php echo base_url();?>plug/img/load.gif'/>");
var id=$("#idmenu").val();
	$.ajax({
		url:"<?php echo base_url();?>super/cekID/"+id,
		type: "POST",
		data:"",
		 success: function(data)
				{
				if(data==1)
				{
				$("#info").html("<b>Ditolak!<b>");
				}else
				{
				$("#info").html("<b>Bisa!</b>");
				}
				
				}
		});
}

function hapus(id)
{
	$.ajax({
		url:"<?php echo base_url();?>super/HapusMenu/"+id,
		type: "POST",
		data:"",
		 success: function(data)
				{
				window.location.href="<?php echo base_url();?>super/menu/<?php echo $uri; ?>";
				}
		});
}

function edit(id,type)
{
$("#info").html("");
$(".modal-title").html("<b>Edit menu "+id+"</b>");
savemode="update";
	$.ajax({
		url:"<?php echo base_url();?>super/editMenu/"+id,
		type: "GET",
        dataType: "JSON",
		success: function(data)
				{
				 $('[name="menuIdLama"]').val(data.id_menu);
				 $('[name="type"]').val(type);
				 $('[name="idmenu"]').val(data.id_menu);
				 $('[name="Nama"]').val(data.nama);
				 $('[name="Icon"]').val(data.icon);
				 $('[name="Hak"]').val(data.hak_akses);
					if(data.level==1)
					{	$(".menuInduk").hide(); $("#checkbox-inl-1").prop("checked",true);   }else
					{	 $(".menuInduk").show(); $("#checkbox-inl-2").prop("checked",true); radio("2",data.id_main); }
				 
				 $('[name="Link"]').val(data.link);
				
				$("#modaleditorder").modal("show");
				
				}
		});
}


function radio(id,val)
{
var type=$("#Hak").val();
	if(id!=1)
	{
	////
		$.ajax({
		url:"<?php echo base_url();?>super/menuLevel1/"+type+"/"+val,
		type: "POST",
		data:"",
		 success: function(data)
				{
				$("#dataInduk").html(data);
				$(".menuInduk").show();
				}
		});
	////
	}else{
	$(".menuInduk").hide();
	}

}

function addMenu(id)
{
savemode="add";
$('#form')[0].reset(); 
$(".menuInduk").hide();
$("#modaleditorder").modal("show");
$("#Hak").val(id);
$("#type").val(id);
$(".modal-title").html("<b>Add menu "+id+"</b>");
}

function pilih(id)
	{
	$.ajax({
		url:"<?php echo base_url();?>super/getDataUg/"+id,
		type: "POST",
		data:"",
		 success: function(data)
				{
				$('#pilih').html(data);
				}
		});
	}
</script>
  
<script>
function simpan()
{
	$('#msg').html("<img src='<?php echo base_url();?>plug/img/load.gif'> Please wait...");
	
	if(savemode=="update"){
		var vurl ="<?php echo base_url();?>super/updateMenu"; }
	else{
		var vurl ="<?php echo base_url();?>super/simpanMenu"; }
	$.ajax({	
	url:vurl,
	type: "POST",
    data: $('#form').serialize(),
	dataType: "JSON",
	 success: function(data)
            {
			 $('#msg').html('<font color="green"><i class="fa fa-check-circle fa-fw fa-lg"></i> Berhasil disimpan.</font>');
			 $("#modaleditorder").modal("hide");
			 window.location.href="<?php echo base_url();?>super/menu/<?php echo $uri;?> ";
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Try Again!');
            }
	});
}
</script>