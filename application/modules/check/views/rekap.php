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
	background-image:url("<?php echo base_url()?>plug/img/meja.jpg");
	background-size:cover;
		background-attachment: fixed;
	}
	.card{
	background-color:white;
 
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
		
		 <span style="float:right;color:white;margin-top:10px" class="hide"><img src="<?php echo base_url();?>plug/img/food.png" width="50px"> <b class="sadow">MAKAN</b></span>
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
                    <li class="header sadow2"> 
                    <li class="active">
			            
                                    
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
             

           
          
		  
            <div class="block-header">
                <h2 style="color:white">REKAPITULASI</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">KEHADIRAN</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20">1.205</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">MAKAN</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">257</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">SOUVENIR</div>
                            <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20">243</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text">PHOTOBOTH</div>
                            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20">1225</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
            <!-- CPU Usage -->
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2>CPU USAGE (%)</h2>
                                </div>
                                <div class="col-xs-12 col-sm-6 align-right">
                                    <div class="switch panel-switch-btn">
                                        <span class="m-r-10 font-12">REAL TIME</span>
                                        <label>OFF<input id="realtime" checked="" type="checkbox"><span class="lever switch-col-cyan"></span>ON</label>
                                    </div>
                                </div>
                            </div>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a class=" waves-effect waves-block" href="javascript:void(0);">Action</a></li>
                                        <li><a class=" waves-effect waves-block" href="javascript:void(0);">Another action</a></li>
                                        <li><a class=" waves-effect waves-block" href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div style="padding: 0px; position: relative;" id="real_time_chart" class="dashboard-flot-chart"><canvas height="275" width="949" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 949px; height: 275px;" class="flot-base"></canvas><div style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);" class="flot-text"><div style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;" class="flot-x-axis flot-x1-axis xAxis x1Axis"><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 86px; top: 258px; left: 22px; text-align: center;">0</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 86px; top: 258px; left: 110px; text-align: center;">10</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 86px; top: 258px; left: 202px; text-align: center;">20</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 86px; top: 258px; left: 293px; text-align: center;">30</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 86px; top: 258px; left: 385px; text-align: center;">40</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 86px; top: 258px; left: 476px; text-align: center;">50</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 86px; top: 258px; left: 567px; text-align: center;">60</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 86px; top: 258px; left: 659px; text-align: center;">70</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 86px; top: 258px; left: 750px; text-align: center;">80</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 86px; top: 258px; left: 842px; text-align: center;">90</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 86px; top: 258px; left: 930px; text-align: center;">100</div></div><div style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;" class="flot-y-axis flot-y1-axis yAxis y1Axis"><div class="flot-tick-label tickLabel" style="position: absolute; top: 245px; left: 14px; text-align: right;">0</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 196px; left: 8px; text-align: right;">20</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 147px; left: 8px; text-align: right;">40</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 98px; left: 8px; text-align: right;">60</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 49px; left: 8px; text-align: right;">80</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 0px; left: 1px; text-align: right;">100</div></div></div><canvas height="275" width="949" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 949px; height: 275px;" class="flot-overlay"></canvas></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# CPU Usage -->
            <div class="row clearfix">
                <!-- Visitors -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="body bg-pink">
                            <div class="sparkline" data-type="line" data-spot-radius="4" data-highlight-spot-color="rgb(233, 30, 99)" data-highlight-line-color="#fff" data-min-spot-color="rgb(255,255,255)" data-max-spot-color="rgb(255,255,255)" data-spot-color="rgb(255,255,255)" data-offset="90" data-width="100%" data-height="92px" data-line-width="2" data-line-color="rgba(255,255,255,0.7)" data-fill-color="rgba(0, 188, 212, 0)"><canvas height="92" width="270" style="display: inline-block; width: 270px; height: 92px; vertical-align: top;"></canvas></div>
                            <ul class="dashboard-stat-list">
                                <li>
                                    TODAY
                                    <span class="pull-right"><b>1 200</b> <small>USERS</small></span>
                                </li>
                                <li>
                                    YESTERDAY
                                    <span class="pull-right"><b>3 872</b> <small>USERS</small></span>
                                </li>
                                <li>
                                    LAST WEEK
                                    <span class="pull-right"><b>26 582</b> <small>USERS</small></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #END# Visitors -->
                <!-- Latest Social Trends -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="body bg-cyan">
                            <div class="m-b--35 font-bold">LATEST SOCIAL TRENDS</div>
                            <ul class="dashboard-stat-list">
                                <li>
                                    #socialtrends
                                    <span class="pull-right">
                                        <i class="material-icons">trending_up</i>
                                    </span>
                                </li>
                                <li>
                                    #materialdesign
                                    <span class="pull-right">
                                        <i class="material-icons">trending_up</i>
                                    </span>
                                </li>
                                <li>#adminbsb</li>
                                <li>#freeadmintemplate</li>
                                <li>#bootstraptemplate</li>
                                <li>
                                    #freehtmltemplate
                                    <span class="pull-right">
                                        <i class="material-icons">trending_up</i>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #END# Latest Social Trends -->
                <!-- Answered Tickets -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="body bg-teal">
                            <div class="font-bold m-b--35">ANSWERED TICKETS</div>
                            <ul class="dashboard-stat-list">
                                <li>
                                    TODAY
                                    <span class="pull-right"><b>12</b> <small>TICKETS</small></span>
                                </li>
                                <li>
                                    YESTERDAY
                                    <span class="pull-right"><b>15</b> <small>TICKETS</small></span>
                                </li>
                                <li>
                                    LAST WEEK
                                    <span class="pull-right"><b>90</b> <small>TICKETS</small></span>
                                </li>
                                <li>
                                    LAST MONTH
                                    <span class="pull-right"><b>342</b> <small>TICKETS</small></span>
                                </li>
                                <li>
                                    LAST YEAR
                                    <span class="pull-right"><b>4 225</b> <small>TICKETS</small></span>
                                </li>
                                <li>
                                    ALL
                                    <span class="pull-right"><b>8 752</b> <small>TICKETS</small></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #END# Answered Tickets -->
            </div>

            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card">
                        <div class="header">
                            <h2>TASK INFOS</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a class=" waves-effect waves-block" href="javascript:void(0);">Action</a></li>
                                        <li><a class=" waves-effect waves-block" href="javascript:void(0);">Another action</a></li>
                                        <li><a class=" waves-effect waves-block" href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Task</th>
                                            <th>Status</th>
                                            <th>Manager</th>
                                            <th>Progress</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Task A</td>
                                            <td><span class="label bg-green">Doing</span></td>
                                            <td>John Doe</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="width: 62%"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Task B</td>
                                            <td><span class="label bg-blue">To Do</span></td>
                                            <td>John Doe</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-blue" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Task C</td>
                                            <td><span class="label bg-light-blue">On Hold</span></td>
                                            <td>John Doe</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-light-blue" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Task D</td>
                                            <td><span class="label bg-orange">Wait Approvel</span></td>
                                            <td>John Doe</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Task E</td>
                                            <td>
                                                <span class="label bg-red">Suspended</span>
                                            </td>
                                            <td>John Doe</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-red" role="progressbar" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100" style="width: 87%"></div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
                <!-- Browser Usage -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="header">
                            <h2>BROWSER USAGE</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a class=" waves-effect waves-block" href="javascript:void(0);">Action</a></li>
                                        <li><a class=" waves-effect waves-block" href="javascript:void(0);">Another action</a></li>
                                        <li><a class=" waves-effect waves-block" href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div id="donut_chart" class="dashboard-donut-chart"><svg style="overflow: hidden; position: relative; left: -0.333374px; top: -0.199951px;" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" width="270" version="1.1" height="265"><desc>Created with Raphaël 2.2.0</desc><defs></defs><path opacity="1" stroke-width="2" d="M135,214.16666666666669A81.66666666666667,81.66666666666667,0,0,0,197.36598314293147,79.77497187236375" stroke="#e91e63" fill="none" style="opacity: 1;"></path><path stroke-width="3" d="M135,217.16666666666669A84.66666666666667,84.66666666666667,0,0,0,199.65697844205954,77.83813410440976L228.5489747143972,53.41245780854564A122.5,122.5,0,0,1,135,255Z" stroke="#ffffff" fill="#e91e63" style=""></path><path opacity="0" stroke-width="2" d="M197.36598314293147,79.77497187236375A81.66666666666667,81.66666666666667,0,0,0,66.93689880580898,87.36842900724861" stroke="#00bcd4" fill="none" style="opacity: 0;"></path><path stroke-width="3" d="M199.65697844205954,77.83813410440976A84.66666666666667,84.66666666666667,0,0,0,64.4366216190836,85.71053456261693L37.07247685325579,67.56580091859239A117.5,117.5,0,0,1,224.73064921585035,56.64052075513561Z" stroke="#ffffff" fill="#00bcd4" style=""></path><path opacity="0" stroke-width="2" d="M66.93689880580898,87.36842900724861A81.66666666666667,81.66666666666667,0,0,0,65.44216513257355,175.29196248129173" stroke="#ff9800" fill="none" style="opacity: 0;"></path><path stroke-width="3" d="M64.4366216190836,85.71053456261693A84.66666666666667,84.66666666666667,0,0,0,62.8869793619334,176.86391212346163L34.92189064992726,194.06802765165443A117.5,117.5,0,0,1,37.07247685325579,67.56580091859239Z" stroke="#ffffff" fill="#ff9800" style=""></path><path opacity="0" stroke-width="2" d="M65.44216513257355,175.29196248129173A81.66666666666667,81.66666666666667,0,0,0,115.52090387726372,211.80957860615354" stroke="#009688" fill="none" style="opacity: 0;"></path><path stroke-width="3" d="M62.8869793619334,176.86391212346163A84.66666666666667,84.66666666666667,0,0,0,114.80534524418361,214.72299169780814L106.97395353769576,246.60867942313925A117.5,117.5,0,0,1,34.92189064992726,194.06802765165443Z" stroke="#ffffff" fill="#009688" style=""></path><path opacity="0" stroke-width="2" d="M115.52090387726372,211.80957860615354A81.66666666666667,81.66666666666667,0,0,0,134.9743436604178,214.16666263657822" stroke="#607d8b" fill="none" style="opacity: 0;"></path><path stroke-width="3" d="M114.80534524418361,214.72299169780814A84.66666666666667,84.66666666666667,0,0,0,134.97340118263722,217.1666624885342L134.96308628692765,249.99999420160748A117.5,117.5,0,0,1,106.97395353769576,246.60867942313925Z" stroke="#ffffff" fill="#607d8b" style=""></path><text stroke-width="0.4557823129251701" transform="matrix(2.194,0,0,2.194,-161.791,-157.0149)" font-weight="800" fill="#000000" stroke="none" font-size="15px" font-family="&quot;Arial&quot;" text-anchor="middle" y="122.5" x="135" style="text-anchor: middle; font-family: &quot;Arial&quot;; font-size: 15px; font-weight: 800;"><tspan dy="5">Chrome</tspan></text><text stroke-width="0.5877551020408163" transform="matrix(1.7014,0,0,1.7014,-95.0382,-94.3368)" fill="#000000" stroke="none" font-size="14px" font-family="&quot;Arial&quot;" text-anchor="middle" y="142.5" x="135" style="text-anchor: middle; font-family: &quot;Arial&quot;; font-size: 14px;"><tspan dy="5">37%</tspan></text></svg></div>
                        </div>
                    </div>
                </div>
                <!-- #END# Browser Usage -->
            </div>
        
          
            
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
	
       var  url = "<?php echo base_url();?>myevent/izinkanMakan/<?php echo $this->uri->segment(3);?>";
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
      var  url = "<?php echo base_url();?>myevent/CheckMakan/<?php echo $this->uri->segment(3);?>";
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



  