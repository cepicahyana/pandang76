<!DOCTYPE html>
<html>
<?php
$uri=$this->uri->segment(3);
$id=$this->session->userdata("id");
$con=$this->event->dataEventID($uri);
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Welcome To | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

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
	background-image:url("<?php echo base_url()?>plug/img/meja.jpg") ;
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

<body class="theme-red">
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
			<img src="<?php echo base_url()?>plug/img/istana.png" height="50px" class="pull-left">
                	 
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand sadow" href=""><b>DIRGAHAYU RI KE 73</b></a>
				
            </div>
		
		 <span style="float:right;color:white;margin-top:10px"><img src="<?php echo base_url();?>plug/img/sv.png" width="50px"> <b class="sadow">SOUVENIR</b></span>
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
                    <li class="header sadow2">SCAN BARCODE</li>
                    <li class="active">
					<?php
					if(!isset($con->title)){ echo "<center> <h4 style='color:red'>  Maaf! Event Tidak Ditemukan!	  </h4></center>";	}else{
					?>
					  <form action="javascript:save()" method="post" id="formRegistrasi" enctype="multipart/form-data">
                      <div class="form-group  col-md-10">
                                        <div class="form-line">
                                            <input class="form-control" name="ID" id="ID" placeholder=".............." type="text">
											<div id="inforeg1"></div>
                                        </div>
                      </div>
					  </form>
					<?php } ?>             
                                    
                    </li>
             
 
              
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    <a href="javascript:void(0);" ><img src="<?php echo base_url()?>plug/img/satria.png" width="50px"><span style="color:blue">SATRIA INTERNUSA PERKASA</span></a>.
                </div>
                 
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
                <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        <li data-theme="red" class="active">
                            <div class="red"></div>
                            <span>Red</span>
                        </li>
                        <li data-theme="pink">
                            <div class="pink"></div>
                            <span>Pink</span>
                        </li>
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>Purple</span>
                        </li>
                        <li data-theme="deep-purple">
                            <div class="deep-purple"></div>
                            <span>Deep Purple</span>
                        </li>
                        <li data-theme="indigo">
                            <div class="indigo"></div>
                            <span>Indigo</span>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                            <span>Blue</span>
                        </li>
                        <li data-theme="light-blue">
                            <div class="light-blue"></div>
                            <span>Light Blue</span>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>
                        <li data-theme="teal">
                            <div class="teal"></div>
                            <span>Teal</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>Green</span>
                        </li>
                        <li data-theme="light-green">
                            <div class="light-green"></div>
                            <span>Light Green</span>
                        </li>
                        <li data-theme="lime">
                            <div class="lime"></div>
                            <span>Lime</span>
                        </li>
                        <li data-theme="yellow">
                            <div class="yellow"></div>
                            <span>Yellow</span>
                        </li>
                        <li data-theme="amber">
                            <div class="amber"></div>
                            <span>Amber</span>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                            <span>Orange</span>
                        </li>
                        <li data-theme="deep-orange">
                            <div class="deep-orange"></div>
                            <span>Deep Orange</span>
                        </li>
                        <li data-theme="brown">
                            <div class="brown"></div>
                            <span>Brown</span>
                        </li>
                        <li data-theme="grey">
                            <div class="grey"></div>
                            <span>Grey</span>
                        </li>
                        <li data-theme="blue-grey">
                            <div class="blue-grey"></div>
                            <span>Blue Grey</span>
                        </li>
                        <li data-theme="black">
                            <div class="black"></div>
                            <span>Black</span>
                        </li>
                    </ul>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="settings">
                    <div class="demo-settings">
                        <p>GENERAL SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Report Panel Usage</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Email Redirect</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>SYSTEM SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Notifications</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Auto Updates</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>ACCOUNT SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Offline</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Location Permission</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>
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
									<img src="<?php echo base_url();?>plug/img/hut.jpg" width="100%">
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

	
	
	<script src="<?php echo base_url('plug/jqueryform/jquery.form.js');?>"></script>
<script>
function loader()
{
 return ' <div class="preloader"><div class="spinner-layer pl-deep-purple"><div class="circle-clipper left"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>';
}

function updated()
    {
      var  url = "<?php echo base_url();?>myevent/updatedCheckIn/<?php echo $this->uri->segment(3);?>";
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
function izinkan(id)
    {
	
       var  url = "<?php echo base_url();?>myevent/izinkanSv/<?php echo $this->uri->segment(3);?>";
       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
			data:"ID="+id,
             success: function(data)
            {
               //if success close modal and reload ajax table
			  setfocus();
			 $('#hasilCek').html("");						 
            }
        });
	
    }
	function tolak()
	{
		 $('#hasilCek').html("");					
	}
</script>


<script>
function save()
    {
	var ID=$("#ID").val();
        $('#hasilCek').html('<img width="200px" src="<?php echo base_url()?>plug/img/progres.gif" /> <b>System Checking ... </b>');
      var  url = "<?php echo base_url();?>myevent/CheckSv/<?php echo $this->uri->segment(3);?>";
       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
			data:"ID="+ID,
             success: function(data)
            {
               //if success close modal and reload ajax table
			  $('#formRegistrasi')[0].reset();
			  setfocus();
			 $('#hasilCek').html(data);			
			updated();			 
			 
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
</script>
 
</body>

</html>



  
  
  