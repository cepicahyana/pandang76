  	<script>							 
									 
 function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
      $('.image img').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp").change(function() {
  readURL(this);
});
</script>



          
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                         
                        <div class="body">
                           <!----->
				 <div  >
                        <div >
                            <div class="card-body">
							
							
							
						 
                            <!--   <table id='table' class="entry black " style="font-size:12px;width:100%">
								 <tr>
								 <td>No</td>
								 <td>Title</td>
								 <td>Kontent</td>
								 </tr>
								 
								<?php 
								error_reporting(0);
								$no=1;
								$pat	=	$this->m_reff->goField("tm_website","value","where id='15'");
								$link	=	$this->m_reff->goField("tm_website","value","where id='16'");
								$this->db->order_by("id","asc");
								$this->db->limit(0);
								$this->db->where_not_in("id",array(15,16,14));
								//$this->db->where_not_in("id",array(15,16,14));
								$db=$this->db->get("tm_website")->result();
								foreach($db as $val){
									 $id=$val->id;
								?>								
                            	<tr>
								<td><?php echo $no++;?></td>
								<td><?php echo $val->nama;?> </td>
								
								<td>
									 <form action="javascript:simpanfile(<?php echo $id;?>)" id="uploadfilexl<?php echo $id;?>">
								<div  class='row'>	
                                 <div class="col-md-9 row">
								 
								 <div class="col-md-6">
								 
								 <?php
								 if($id!=14){
									 
									  $src=$link."/".$val->value;
									$src=isset($src)?($src):"xxx";
									if($val->value){
										$src=$link."/".$val->value;
											 $remove=true;
									}else{
										$src=base_url()."plug/img/remove.png";
											 $remove=false;
									}
									 $src=$this->konversi->img($src);
									 ?>
								 <img height="70px" src="<?php echo $src; ?>" id="img<?php echo $id;?>">
								 <?php }else{?>
								 <video width="220" height="240" controls>
								  <source src="<?php echo $link;?>/<?php echo $val->value?>" type="video/mp4"> 
								Your browser does not support the video tag.
								</video>
								 <?php } ?>
								 </div>
								 
								 <div class="col-md-6">
								  <input class='form-control' accept=".jpg,.png,.mp4" type="file" name="userfile<?php echo $id;?>" required id="userfile<?php echo $id;?>"> 
								 </div>
								  
								 </div> 
                                    <div class="col-md-3">
                                    <button onclick="simpanfile(<?php echo $id;?>)" style='margin-top:7px' type="submit"  class="waves-effect btn-sm btn btn-primary" >Upload</button>
									<?php
									if($remove==true){?>
                                    <button type="button" onclick="hapus(<?php echo $id;?>)" style='margin-top:7px' type="submit"  class="waves-effect btn-sm btn btn-danger" >hapus</button>
                                    <?php } ?></div>
                               </div>
								</form><br>
								<b><span class="hasil"> </span></b>
								
								</td>
								</tr>
								<?php   } ?>
							 
								 
							</table>-->
							 
						 
							


							
							 <table id='table' class="tabel black table-bordered  table-hover dataTable" style="width:100%">
								<thead  class='sadow bg-blue'>			
									<th class='thead' axis="string" width='15px'>&nbsp;NO</th>
								
									<th class='thead' >Konfigurasi </th>
									<th class='thead' >Value </th>
									 
								</thead>
								<?php   $no=1;?>
								 	<tr>
								<td><?php echo $no++;?></td>
								<td>Halaman registrasi</td>
								<td>
								 <?php
								 $datareg["open"]="Open";
								 $datareg["close"]="Close";
								 echo form_dropdown("val_44",$datareg,$this->m_reff->tm_pengaturan(44),"id='val_44' name='val_44' class='form-control' onchange='save_pengaturan(`44`,`val_44`)'");
								 ?>
								 
								</td>
								</tr>
								
								
								
								<tr  id="area_formSubmit"> 
								<td><?php echo $no++;?></td>
								<td>Info penutupan</td>
								<td>
							<form class="form-horizontal" id="formSubmit" action="javascript:submitFormNoResset('formSubmit')"
							method="post" url="<?php echo base_url()?>konfigurasi/save_">
								<input type="hidden" value="62" name="idpengaturan"> 
 
								<textarea class='form-control' type="text" id="val_62" name="idkonten"  ><?php echo $this->m_reff->goField("tm_pengaturan","val","where id='62' ");?></textarea>
							<button onclick='submitFormNoResset("formSubmit")' class="btn btn-block btn-primary">SIMPAN</button>
								</form>
							</td>
								</tr>
								 <script>
								//  CKEDITOR.replace('val_62'); 
								//  CKEDITOR.config.height = 150;
								</script>
							 
								<tr>
								<td><?php echo $no++;?></td>
								<td>Path upload</td>
								<td>
								 
								<input class='form-control' type="text" id="val_15" name="val_15" onchange='save_(`15`,`val_15`)' value="<?php echo $this->m_reff->goField("tm_website","value","where id='15' ");?>">
							 
								</td>
								</tr>
								 
							 
								<tr>
								<td><?php echo $no++;?></td>
								<td>Link Akses</td>
								<td>
								 
								<input class='form-control' type="text" id="val_16" name="val_16" onchange='save_(`16`,`val_16`)' value="<?php echo $this->m_reff->goField("tm_website","value","where id='16' ");?>">
							 
								</td>
								</tr>
								
								 
								<tr>
								<td><?php echo $no++;?></td>
								<td>Link video</td>
								<td>
								 
								<input class='form-control' type="text" id="val_14" name="val_14" onchange='save_(`14`,`val_14`)' value="<?php echo $this->m_reff->goField("tm_website","value","where id='14' ");?>">
							 
								</td>
								</tr>
								
								
								
								<tr>
								<td><?php echo $no++;?></td>
								<td>Link background registrasi</td>
								<td>
								 
								<input class='form-control' type="text" id="val_3" name="val_3" onchange='save_(`3`,`val_3`)' value="<?php echo $this->m_reff->goField("tm_website","value","where id='3' ");?>">
							 
								</td>
								</tr>
								
								
								<tr>
								<td><?php echo $no++;?></td>
								<td>Slider registasi 1 </td>
								<td>
								 
								<input class='form-control' type="text" id="val_9" name="val_9" onchange='save_(`9`,`val_9`)' value="<?php echo $this->m_reff->goField("tm_website","value","where id='9' ");?>">
							 
								</td>
								</tr>
									
								<tr>
								<td><?php echo $no++;?></td>
								<td>Slider registasi 2 </td>
								<td>
								 
								<input class='form-control' type="text" id="val_10" name="val_10" onchange='save_(`10`,`val_10`)' value="<?php echo $this->m_reff->goField("tm_website","value","where id='10' ");?>">
							 
								</td>
								</tr>
									
								<tr>
								<td><?php echo $no++;?></td>
								<td>Slider registasi 3 </td>
								<td>
								 
								<input class='form-control' type="text" id="val_11" name="val_11" onchange='save_(`11`,`val_11`)' value="<?php echo $this->m_reff->goField("tm_website","value","where id='11' ");?>">
							 
								</td>
								</tr>
								
								 	
								
								<tr>
								<td><?php echo $no++;?></td>
								<td>Slider Home 1</td>
								<td>
								 
								<input class='form-control' type="text" id="val_4" name="val_4" onchange='save_(`4`,`val_4`)' value="<?php echo $this->m_reff->goField("tm_website","value","where id='4' ");?>">
							 
								</td>
								</tr>
								
								 
								<tr>
								<td><?php echo $no++;?></td>
								<td>Slider Home 2</td>
								<td>
								 
								<input class='form-control' type="text" id="val_5" name="val_5" onchange='save_(`5`,`val_5`)' value="<?php echo $this->m_reff->goField("tm_website","value","where id='5' ");?>">
							 
								</td>
								</tr>
								 
								<tr>
								<td><?php echo $no++;?></td>
								<td>Slider Home 3</td>
								<td>
								 
								<input class='form-control' type="text" id="val_6" name="val_6" onchange='save_(`6`,`val_6`)' value="<?php echo $this->m_reff->goField("tm_website","value","where id='6' ");?>">
							 
								</td>
								</tr>
								
								 
							  
							</table>
	</div>	
							
						</div>						
					</div>	
                           <!----->
                        </div>
                    </div>
                </div>
 
                <!-- #END# Task Info -->
				
 
  
	
 
 
			 <script>
 function hapus(id)
	{	 
	 
		  swal({
                title: "Hapus ?",
               text:"",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
				 
			    $.post("<?php echo base_url()?>konfigurasi/hapus_img",{id:id},function(data){
		 	    reload_table();
			});  
			 
                    swal("berhasil dihapus!", {
                        icon: "success",
                    });
					
					$("#img"+id).attr("src","<?php echo base_url()?>plug/img/remove.png");
					
                } else {
                    return false;
                }
            });
		 
		  
		 
	}
</script>
   
<script>
  
 function save_pengaturan(idpengaturan)
	 {	 
	 var idkonten=$("[name='val_"+idpengaturan+"']").val();
		 $.ajax({
		 url:"<?php echo base_url()?>konfigurasi/save_",
		 data: "idpengaturan="+idpengaturan+"&idkonten="+idkonten,
		 method:"POST",
		 success: function(data)
            {	 
				 notif(" Tersimpan! ");
            }
		});
	 }
	function download_acara(id)
	{
		window.location.href="<?php echo base_url()?>konfigurasi/download_acara?id="+id;
	}
	
	
</script>


<script>
  
 function save_(idpengaturan)
	 {	 
	 var idkonten=$("[name='val_"+idpengaturan+"']").val();
		 $.ajax({
		 url:"<?php echo base_url()?>konfigurasi/saveweb_",
		 data: {idpengaturan:idpengaturan,idkonten:idkonten},
		 method:"POST",
		 success: function(data)
            {	 
				 notif(" Tersimpan! ");
            }
		});
	 }
	function download_acara(id)
	{
		window.location.href="<?php echo base_url()?>konfigurasi/download_acara?id="+id;
	}
	
	
</script>


 <script type="text/javascript">
function simpanfile(id){
	var load='<img src="<?php echo base_url();?>plug/img/load.gif" />';
    var userfile=$('#userfile'+id).val();
     loading();
    $('#uploadfilexl'+id).ajaxForm({
     url:'<?php echo base_url();?>konfigurasi/gosinWeb',
     type: 'post',
     data:{"userfile":userfile,"id":id},
     
     
     beforeSubmit: function() {
   //   $('.hasil').html(load+' Silahkan tunggu mungkin ini berlangsung lama ... ');
     },
     complete: function(xhr) {
    //    $('.hasil').html('<span class="col-green">Selesai!</span>');
		$("#userfile"+id).val();
     }, 
     success: function(resp) {
      //  $('.hasil').html(resp);
	  window.location.href="";
		notif("success!! <br>mohon tungu...");
		  unblock();
     },
    });     
};
</script>    	
 
 <script type="text/javascript">
function simpanfileAcara(id){
	var load='<img src="<?php echo base_url();?>plug/img/load.gif" />';
    var userfile=$('#userfile'+id).val();
     loading();
    $('#uploadfilexl'+id).ajaxForm({
     url:'<?php echo base_url();?>konfigurasi/gosinGelangAcara',
     type: 'post',
     data:{"userfile":userfile,"id":id},
     
     
     beforeSubmit: function() {
   //   $('.hasil').html(load+' Silahkan tunggu mungkin ini berlangsung lama ... ');
     },
     complete: function(xhr) {
    //    $('.hasil').html('<span class="col-green">Selesai!</span>');
		$("#userfile"+id).val();
     }, 
     success: function(resp) {
      //  $('.hasil').html(resp);
		notif("success!!");
		  unblock();
     },
    });     
};
</script>    	
 