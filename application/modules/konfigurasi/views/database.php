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
								<td>1</td>
								<td>Nama Database</td>
								<td>
								
								 <input type="text" id="val_34" name="val_34" onchange='save_(`34`,`val_34`)' 
								 class="form-control" value="<?php echo $this->m_reff->tm_pengaturan(34);?>"/>
								
								</td>
								</tr>
								
								
									<tr>
								<td>2</td>
								<td>Download Full Table Database</td>
								<td>
								<form action="<?php echo base_url();?>konfigurasi/backupdb" method="post">
							<div  class='row'>	
                               <!--  <div class="col-md-8">   <select required="" data-actions-box="true" multiple name="tabel[]" class="form-control select" data-live-search="true" data-selected-text-format="count">
						                                     
									  <?php
                                        $nama="Tables_in_".$this->m_reff->tm_pengaturan(34);
										 $tabel=$this->db->query("show tables")->result();
                                           foreach ($tabel as $baris) {  ?>
                                            <option value="<?php echo $baris->$nama; ?>"><?php echo $baris->$nama; ?></option>
                                        <?php } ?>
                                    </select></div>-->
									 
                                    <div class="col-md-12">
                                    <button style='margin-top:5px' type="submit"  class="waves-effect btn-sm  btn btn-primary" >Download database</button>
                                    </div>
                               </div>
                                </form>
								</td>
								</tr>
								
								<tr>
								<td>3</td>
								<td>Resset Database</td>
								<td> 
								<?php //	if(date('m')=="01" or date('m')=="02" or date('m')=="03" or date('m')=="04" or date('m')=="05"  ){ echo '
								  	if(1==1  ){ echo '
									<div  class="row"> 
										<div class="col-md-12">
											<button style="margin-top:5px" type="submit" onclick="resset()" class="waves-effect btn-sm  btn btn-ligjt" >resset</button>
										</div>
									</div>';
								  }else{ echo 'tombol resset muncul ketika bulan januar<span ondblclick="resset()">i</span> - mei '; } ?>
								</td>
								</tr>
								
								
								 <tr>
								<td>4</td>
								<td>Restore Database</td>
								<td>
							 <?php echo form_open_multipart('konfigurasi/restore');?>
							<div  class='row'>	
                               <div class="col-md-8">
								 
									 <input class="form-control" accept=".sql" type="file" name="datafile" required id="datafile"/> 
										 
								 </div> 
                                    <div class="col-md-4">
                                    <button  style='margin-top:7px' type="submit"  class="waves-effect btn-sm btn btn-primary" >Upload</button>
                                    </div>
                                    
                               </div>
                                </form>
								</td>
								</tr>
								 
								
                            	<tr>
								<td>5</td>
								<td>Upload status kehadiran acara pengibaran bendera & renungan suci</td>
								<td>
									 <form action="javascript:simpanfile()" id="uploadfilexl">
								<div  class='row'>	
                                 <div class="col-md-8">
								 
									 <input class="form-control" accept=".json" type="file" name="userfile" required id="userfile"/> 
										 
								 </div> 
                                    <div class="col-md-4">
                                    <button onclick="simpanfile()" style='margin-top:7px' type="submit"  class="waves-effect btn-sm btn btn-primary" >Upload</button>
                                    </div>
                               </div>
								</form><br>
								<b><span class="hasil"> </span></b>
								
								</td>
								</tr>
								
								 <tr>
								<td>6</td>
								<td>Upload status kehadiran rangkaian acara lainnya</td>
								<td>
									 <form action="javascript:simpanfile2()" id="uploadfilex2">
								<div  class='row'>	
                                 <div class="col-md-8">
								 
									 <input class="form-control" accept=".json" type="file" name="userfile2" required id="userfile2"/> 
										 
								 </div> 
                                    <div class="col-md-4">
                                    <button onclick="simpanfile2()" style='margin-top:7px' type="submit"  class="waves-effect btn-sm btn btn-primary" >Upload</button>
                                    </div>
                               </div>
								</form><br>
								<b><span class="hasil2"> </span></b>
								
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
				
 
  
 <?php
   $notif=$this->session->flashdata("msg");
 if($notif){
	 echo "<script>alert('".$notif."')</script>";
 }
 ?>
	
 

	<script>
													$('.select').select2({
														theme: "bootstrap"
													});
													</script>
									
 
   
<script>
  
 function save_(idpengaturan,idkonten)
	 {	 
	 var idkonten=$("[name='"+idkonten+"']").val();
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


 <script type="text/javascript">
function simpanfile(){
	var load='<img src="<?php echo base_url();?>plug/img/load.gif" />';
    var userfile=$('#userfile').val();
     loading();
    $('#uploadfilexl').ajaxForm({
     url:'<?php echo base_url();?>konfigurasi/gosin',
     type: 'post',
     data:{"userfile":userfile},
     
     
     beforeSubmit: function() {
      $('.hasil').html(load+' Silahkan tunggu mungkin ini berlangsung lama ... ');
     },
     complete: function(xhr) {
        $('.hasil').html('<span class="col-green">Selesai!</span>');
		$("#userfile").val();
     }, 
     success: function(resp) {
        $('.hasil').html(resp);
		notif("success!!");
		  unblock();
     },
    });     
};
</script>    	

 <script type="text/javascript">
function simpanfile2(){
	var load='<img src="<?php echo base_url();?>plug/img/load.gif" />';
    var userfile=$('#userfile2').val();
    loading();
    $('#uploadfilex2').ajaxForm({
     url:'<?php echo base_url();?>konfigurasi/gosin2',
     type: 'post',
     data:{"userfile":userfile},
     
     
     beforeSubmit: function() {
      $('.hasil2').html(load+' Silahkan tunggu mungkin ini berlangsung lama ... ');
     },
     complete: function(xhr) {
        $('.hasil2').html('<span class="col-green">Selesai!</span>');
		$("#userfile2").val();
     }, 
     success: function(resp) {
        $('.hasil2').html(resp);
		notif("success!!");
		  unblock();
		 
     },
    });     
};
</script>    	

<script>
function resset()
{
	  	swal({
						title: 'Kosongkang database ?',
						text: "",
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
							ressetDatabase();
							
						}  
					});
				
}

 function ressetDatabase()
	 {	 
	 loading();
		 $.ajax({
		 url:"<?php echo base_url()?>konfigurasi/ressetDatabase",
		 data: "token=token",
		 method:"POST",
		 success: function(data)
            {	 unblock();
				 notif("Database berhasil diresset.");
            }
		});
	 }
</script>