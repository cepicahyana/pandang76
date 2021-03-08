<?php
  $acara         =   $this->session->userdata("acara"); 
  if($acara)
  {
      if($acara==1)
	  {
		  echo "<script>$('.navbar-brand').html('UPACARA BENDERA');</script>";
	  }elseif($acara==2)
	  {
		  echo "<script>$('.navbar-brand').html('RENUNGAN SUCI');</script>";
	  }elseif($acara==3)
	  {
		  echo "<script>$('.navbar-brand').html('RANGKATAN ACARA HUT-RI');</script>";
	  }
   ?>
  
    <br><br><br>
    <center>
        
   
    <a style="height:70px" href="scan" class='btn btn-lg bg-blue-grey'><br>[ [ SCAN UNDANGAN ] ]</a>
     </center>
    
   <?php
      
      
  }else{ 
?>
 
<center>
    
 
 <h3>PILIH ACARA</h3> 
<br> 
<a href="<?php echo base_url()?>welcome/setAcara/1" class='btn btn-lg btn-block bg-pink waves-effect' style='height:80px'><br>UPACARA BENDERA</a><br><br>
<a href="<?php echo base_url()?>welcome/setAcara/2" class='btn btn-lg btn-block bg-green waves-effect' style='height:80px'><br>RENUNGAN SUCI</a><br><br>
<a href="<?php echo base_url()?>welcome/setAcara/3" class='btn btn-lg btn-block bg-blue waves-effect' style='height:80px'><br>RANGKAIAN ACARA LAINNYA</a>
</center>
<br>
 
<?php } ?>



<div class="btn-group" role="group" style="bottom:0;position:absolute;width:100%;margin-left:-14.5px">
                                  <a href="<?php echo base_url()?>welcome/inputUlang" type="button" style="width:50%" class="btn btn-lg bg-blue waves-effect"><i class="material-icons">keyboard</i> PILIH ACARA</a>
                                     
                                    <a href='tutupapp' type="button"  style="width:50%" class="btn btn-lg bg-blue-grey waves-effect"><i class="material-icons">power_settings_new</i> KELUAR</a>
                                 
                                </div>
								
	
								
								<script>
						yes();
						no();
function yes(){
						var sound=$('#set_sound2').is(":checked");
						 
						if(sound==true)
						{
							var audio = new Audio("../file_upload/sound/selamat_datang.mp3");
						}else{
							var audio = new Audio("../file_upload/sound/bel.mp3");
						}
		audio.oncanplaythrough = function() { }
		audio.onended = function ( ) { }
		  audio.play(); 
};

function no(){
		 
			var sound=$('#set_sound2').is(":checked");
						if(sound==true)
						{
							var audio = new Audio("../file_upload/sound/maaf.mp3");
						}else{
							var audio = new Audio("../file_upload/sound/beef.mp3");
						}
		audio.oncanplaythrough = function() { }
		audio.onended = function ( ) { }
		  audio.play(); 
};


function cekal(){
		 
			var sound=$('#set_sound2').is(":checked");
						if(sound==true)
						{
							var audio = new Audio("../file_upload/sound/alarm.mp3");
						}else{
							var audio = new Audio("../file_upload/sound/alarm.mp3");
						}
		audio.oncanplaythrough = function() { }
		audio.onended = function ( ) { }
		  audio.play(); 
};



						
						</script>

 