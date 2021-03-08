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
                               <table id='table' class="entry black " style="font-size:12px;width:100%">
								 <tr>
								 <td>No</td>
								 <td>Blok</td>
								 <td>Warna</td>
								 <td>Desain gelang</td>
								 </tr>
								 
								<?php 
								$no=1;
								 
								$db=$this->db->get("tr_blok")->result();
								foreach($db as $val){
									$id=$val->id;
									if($val->jenis==1)
									{
										$jenis="Penaikan (Pagi)";
									}else{
										$jenis="Penurunan (Sore)";
									}
								?>								
                            	<tr>
								<td><?php echo $no++;?></td>
								<td><?php echo $val->nama;?> <?php echo $jenis;?></td>
								<td style='background-color:<?php echo $val->color;?>'><input id="val_<?php echo $id;?>" name="val_<?php echo $id?>" type="text" value="<?php echo $val->color?>" class='form-control' onchange="save_(`<?php echo $id?>`)"></td>
							 
								<td>
									 <form action="javascript:simpanfile(<?php echo $id;?>)" id="uploadfilexl<?php echo $id;?>">
								<div  class='row'>	
                                 <div class="col-md-8">
								 <img width='200px' height="40px" src="<?php echo base_url();?>file_upload/gelang/<?php echo $val->link_gelang?>">
									 <input class='form-control' accept=".jpg" type="file" name="userfile<?php echo $id;?>" required id="userfile<?php echo $id;?>"> 
										 
								 </div> 
                                    <div class="col-md-4">
                                    <button onclick="simpanfile(<?php echo $id;?>)" style='margin-top:7px' type="submit"  class="waves-effect btn-sm btn btn-primary" >Upload</button>
                                    </div>
                               </div>
								</form><br>
								<b><span class="hasil"> </span></b>
								
								</td>
								</tr>
								<?php $id++; } ?>
							 
								 
							</table>
							<hr>
							<h3>GELANG RANGKAIAN ACARA </h3>
							<table id='table' class="entry black " style="font-size:12px;width:100%">
								 <tr>
								 <td>No</td>
								 <td>Acara</td>
								 <td>Desain</td>
								 <td>Upload</td>
								 </tr>
								 
								<?php 
								$no=1;
								 $this->db->where("id not IN (1,2,3)");
								$db=$this->db->get("tr_kategory")->result();
								foreach($db as $val){
									$id=$val->id;
									
								?>								
                            	<tr>
								<td><?php echo $no++;?></td>
								<td><?php echo $val->nama;?> </td>
								<td> <img width='200px' height="40px" src="<?php echo base_url();?>file_upload/gelang/<?php echo $val->link_gelang?>"></td>
							 
								<td>
									 <form action="javascript:simpanfileAcara(<?php echo $id;?>)" id="uploadfilexl<?php echo $id;?>">
								<div  class='row'>	
                                 <div class="col-md-8">
								 
									 <input class='form-control' accept=".jpg" type="file" name="userfile<?php echo $id;?>" required id="userfile<?php echo $id;?>"> 
										 
								 </div> 
                                    <div class="col-md-4">
                                    <button onclick="simpanfileAcara(<?php echo $id;?>)" style='margin-top:7px' type="submit"  class="waves-effect btn-sm btn btn-primary" >Upload</button>
                                    </div>
                               </div>
								</form><br>
								<b><span class="hasil"> </span></b>
								
								</td>
								</tr>
								<?php $id++; } ?>
							 
								 
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
  
 function save_(idpengaturan)
	 {	 
	 var idkonten=$("[name='val_"+idpengaturan+"']").val();
		 $.ajax({
		 url:"<?php echo base_url()?>konfigurasi/saveblok_",
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


 <script type="text/javascript">
function simpanfile(id){
	var load='<img src="<?php echo base_url();?>plug/img/load.gif" />';
    var userfile=$('#userfile'+id).val();
     loading();
    $('#uploadfilexl'+id).ajaxForm({
     url:'<?php echo base_url();?>konfigurasi/gosinGelang',
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
 