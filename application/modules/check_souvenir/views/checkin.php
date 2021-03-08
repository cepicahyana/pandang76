<!DOCTYPE html>
<html>
 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>PANDANG</title>
    <!-- Favicon-->
     <link rel="icon" href="<?php echo base_url()?>/plug/img/bendera.gif" type="image/x-icon">

  
    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url()?>new/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url()?>new/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url()?>new/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="<?php echo base_url()?>new/plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url()?>new/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url()?>new/css/themes/all-themes.css" rel="stylesheet" />
	<style>
	body{
	background-image:url("<?php echo base_url()?>plug/img/meja.png");
	background-size:cover;
		background-attachment: fixed;
	}
	.card{
	background-color:white;
	opacity: 0.8;
    filter: alpha(opacity=50); /* For IE8 and earlier */
	}
	.sadow{
text-shadow: 1px 1px 1px black;
}
.sadow2{
text-shadow: 1px 1px 1px white;
}
 
	</style>
</head>

<body class="theme-blue">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
		        	 
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand sadow" href=""><b>PANDANG ISTANA  </b></a>
				
            </div>
		
		<!-- <span style="float:right;color:white;margin-top:10px"><img src="<?php echo base_url();?>plug/img/cek.png" width="50px"> <b>CEK UNDANGAN</b></span>
      -->
	  <div id="watch"></div>
	  </div>
		
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar" style="opacity: 0.7;">
            <!-- User Info -->
            <div class="user-info" >
                
            </div>
            <!-- #User Info -->
            <!-- Menu -->
			
            <div class="menu">
                <ul class="list">
                    <li class="header sadow2">SCAN BARCODE SOUVENIR</li>
                    <li class="active">
					<?php
					//if(!isset($con->title)){ echo "<center> <h4 style='color:red'>  Maaf! Event Tidak Ditemukan!	  </h4></center>";	}else{
					?>
					  <form action="javascript:save()" method="post" id="formRegistrasi" enctype="multipart/form-data">
                      <div class="form-group  col-md-10">
                                        <div class="form-line">
                                            <input class="form-control" name="ID" id="ID" placeholder=".............." type="text">
											<div id="inforeg1"></div>
                                        </div>
                      </div>
					  </form>
					        
                           <center>
						    
						   </center>
                    </li>
             
 
              
                </ul>
				
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    <a href="javascript:void(0);" >
					<span style="color:blue"> </span></a>.
                </div>
                 
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
             

           
            <!-- CPU Usage -->
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="body">
                          
						 <div id="text">
								  
									<div style="margin-top:20px"  >
									<div id="hasilCek" >
									mode scan  : <?php 
									$mode	=	$this->m_reff->tm_pengaturan(43);
									if($mode==1)
									{
										echo "Cepat<br>";
									echo "Jenis pengiriman : ".$this->m_reff->goField("tr_pengiriman","nama","where default='1' ");	
									}else{
										echo "Normal";
									}
									?>
									</div>
									</div>
						</div>
						  
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# CPU Usage -->
          
            
 <!-- Widgets -->
 
            <!-- #END# Widgets -->
          
        </div>
    </section>

	
	 
<script>
function loader()
{
 return ' <div class="preloader"><div class="spinner-layer pl-deep-purple"><div class="circle-clipper left"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>';
}

function updated()
    {
      var  url = "<?php echo base_url();?>check/updatedCheckIn/<?php echo $this->uri->segment(3);?>";
       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
             success: function(data)
            {
           	 $('#updates').html(data);			 
            }
        });
    }
	
</script>

<script>

 
function save()
    {
	var ID=$("#ID").val();
        $('#hasilCek').html(loader());
      var  url = "<?php echo base_url();?>check_souvenir/CheckRegister/<?php echo $this->uri->segment(3);?>";
       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
			data:"ID="+ID,
			dataType:"JSON",
             success: function(data)
            {
				 
				if(data["hasil"]=="ok")
				{
					yes();
				}else if(data["hasil"]=="cekal")
				{
					cekal();
				}else if(data["hasil"]!="ok" ){
					no();
				}
               //if success close modal and reload ajax table
			  $('#formRegistrasi')[0].reset();
			  setfocus();
			 $('#hasilCek').html(data["isi"]);			
			// updated();			 
			
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
              alert('Mohon maaf kami sedang melakukan perbaikan\nTerimakasih atas pengertiannya.');
            }
        });
    }
		
</script>


     <!-- Jquery Core Js -->
    <script src="<?php echo base_url()?>new/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url()?>new/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo base_url()?>new/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url()?>new/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url()?>new/plugins/node-waves/waves.js"></script>

    <!-- Autosize Plugin Js -->
    <script src="<?php echo base_url()?>new/plugins/autosize/autosize.js"></script>

    <!-- Moment Plugin Js -->
    <script src="<?php echo base_url()?>new/plugins/momentjs/moment.js"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="<?php echo base_url()?>new/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url()?>new/js/admin.js"></script>
    <script src="<?php echo base_url()?>new/js/pages/forms/basic-form-elements.js"></script>

    <!-- Demo Js -->
    <script src="<?php echo base_url()?>new/js/demo.js"></script>

   
	
<script>
	$("#modalcek").hide();
	$(document).ready(function(){
	setfocus();
	$(".login").hide();
	   $(".registerbutton").click(function(){
		$("#modalcek").modal("show");
	}); 

	});
	
	function setfocus()
	{
	$("#ID").val("");
	 document.getElementById("ID").focus();
	}
	
	setInterval(function(){ document.getElementById("ID").focus(); }, 2000);

</script>
 
</body>
  <div align="center" style="bottom:0;position:fixed;right:0" class="pull-right col-white font-bold"> 
                                <div class="switch"  >
                                    <label>beef<input id="set_sound2" type="checkbox"   ><span class="lever switch-col-orange"></span>human &nbsp; &nbsp;&nbsp;</label>
                                </div>
								  <input type="hidden" id="sound_effect" >
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
					
</html>








<style>
#watch {
  color: white;
  position: fixed;
  z-index: 1;
  overflow: show;
  float:right;
  right: 0;
  font-weight:bold;
  margin-right:10px;
  font-size: 52px;
  -webkit-text-stroke: 3px rgb(210, 65, 36);
  text-shadow: 4px 4px 10px rgba(210, 65, 36, 0.4),
               4px 4px 20px rgba(210, 45, 26, 0.4),
               4px 4px 30px rgba(210, 25, 16, 0.4),
               4px 4px 40px rgba(210, 15, 06, 0.4);
}
</style>
 
  
 
 
<script type="text/javascript">
    $(document).ready(function(){
        function clock() {
          var now = new Date();
          var secs = ('0' + now.getSeconds()).slice(-2);
          var mins = ('0' + now.getMinutes()).slice(-2);
          var hr = now.getHours();
          var Time = hr + ":" + mins + ":" + secs;
          document.getElementById("watch").innerHTML = Time;
          requestAnimationFrame(clock);
        }

        requestAnimationFrame(clock);
    });
</script>