<div class="row">
 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>SINKRONISASI DATA</h2>
                             
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover dashboard-task-infos">
                                   
                                    <tbody>
                                        <tr>
                                            <td>Data Kehadiran Upacara + Renungan suci</td>
                                            <td> <a href="<?php echo base_url()?>check/downloadData"  > &nbsp;&nbsp;&nbsp;&nbsp;Download</a></td>
                                             
                                        </tr>
										<tr>
                                            <td>Data Kehadiran Rangkaian Acara </td>
                                            <td> <a href="<?php echo base_url()?>check/downloadDataAcara"  > &nbsp;&nbsp;&nbsp;&nbsp;Download</a></td>
                                             
                                        </tr>
                                        <tr>
                                            <td>Upload Data</td>
                                          <td>
										  <form action="javascript:simpanfile()" id="uploadfilexl">
										  <div class="col-md-5"><input type="file" name="userfile" required id="userfile"></div>
										  <div class="col-md-2"><button onclick="simpanfile()" class="btn bg-teal btn-block"><i class="material-icons">sync</i> Go !!</button></div>
										  </form> </td>
                                            
                                        </tr> 
										<tr>
                                            <td>Restore database</td>
                                          <td>
										   <?php echo form_open_multipart('check/restore');?>
   <div class="col-md-8"> <input type="file" name="datafile" id="datafile" class="form-control"/></div>
   <div class="col-md-4"> <button type="submit" onclick="loading()" class="btn bg-teal">restore  </button> </td>
                                            
                                        </tr>
										<tr>
                                            <td colspan="2"><b><span class="hasil"></span></b></td>
                                         
                                            
                                        </tr>
										 
                                         
				</table>
			</div>
		  </div>
	 </div>
 </div>
</div>

 
  <script type="text/javascript">
function simpanfile(){
	var load='<img src="<?php echo base_url();?>plug/img/load.gif" />';
    var userfile=$('#userfile').val();
    
    $('#uploadfilexl').ajaxForm({
     url:'<?php echo base_url();?>check/gosin',
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
     },
    });     
};
</script>    	
