<style>
.border-line{
	border-bottom:#9E9E9E solid 1px;
}.menus{
	background-image:url('<?php echo base_url()?>plug/img/bg.jpg');
 
}
</style><?php $con=new konfig(); $dp=$con->dataProfile($this->session->userdata("id")); ?> 
   <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image  ">
                <!--    <img src="<?php echo base_url();?>file_upload/dp/ " width="48" height="48" alt="User" /> -->
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo  isset($dp->owner)?($dp->owner):"";?></div>
                    <div class="email"><?php echo isset($dp->email)?($dp->email):"";?></div>
                   
				   <script>
				   $( document ).ready(function() {
					   function setCookie(cname,cvalue) {
						document.cookie = cname + "=" + cvalue + ";";
					}

					function getCookie(cname) {
						var name = cname + "=";
						var decodedCookie = decodeURIComponent(document.cookie);
						var ca = decodedCookie.split(';');
						for(var i = 0; i < ca.length; i++) {
							var c = ca[i];
							while (c.charAt(0) == ' ') {
								c = c.substring(1);
							}
							if (c.indexOf(name) == 0) {
								return c.substring(name.length, c.length);
							}
						}
						return "";
					}

					   var set=getCookie("sound");
					   if(set=="on")
					   {	
						$("#sound_effect").val("on");
						$("#set_sound").prop( "checked", true );
					   }else{
						$("#sound_effect").val("off");   
						$("#set_sound").prop( "checked", false );
					   }
					   set_theme();
					   function set_theme()
					   {
							var set_theme=getCookie("thema");
						   if(set_theme)
						   {	 
							  $("body").removeAttr('class');
							  $("body").attr('class', '');
							  $("body").addClass("theme-"+set_theme);
							  
							  setTimeout(function(){ tombol_icon(set_theme) },50);
							  
							 setTimeout(function(){
							 $("thead").removeAttr('class');
							 $("thead").attr('class', '');
							 $("thead").addClass("sadow bg-"+set_theme);  
							  }, 100);
							   
						   }else{
						   };
					   }
					   function tombol_icon(set_theme)
					   {	 
						      $("table button i").removeAttr('class');
							  $("table button i").attr('class', '');
							  $("table button i").addClass("material-icons col-"+set_theme);
					   };
					   
					   
					   $(document).on("keypress","#tabel_filter input,.dataTables_length select",function()
					   {
						    var set_theme=getCookie("thema");
						  	setTimeout(function(){ tombol_icon(set_theme); }, 150);
						  
					   });
					   
					   $(document).on("change","select",function()
					   {
						    var set_theme=getCookie("thema");
						  	setTimeout(function(){ tombol_icon(set_theme); }, 150);
						  
					   });

					   $(document).on("click","#tabel_paginate",function()
					   {	 
						    var set_theme=getCookie("thema");
						  	setTimeout(function(){ tombol_icon(set_theme); }, 150);
						  
					   });
					   
						$(".clickthem").click(function(event, messages){
							event.preventDefault();
							var skin=$(this).attr("thema");
							document.cookie ="thema="+skin;
							 set_theme();
						});
						$(".menuclick").click(function(){
							setTimeout(function(){ set_theme(); }, 150);
						});
					   
				   });
				   </script>
					  <!--<div align="center" style="margin-top:-10px" class="pull-right col-white font-bold"> Click Effect
                                <div class="switch"  >
                                    <label>OFF<input id="set_sound" type="checkbox" onclick="set_effect()" ><span class="lever switch-col-orange"></span>ON</label>
                                </div>
                        </div>-->
					  <input type="hidden" id="sound_effect" >
                    
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
              <div class="menu">
                <ul class="list">
                    <li class="header">
					MENU  
					
					</li>
						
					
<!------------------------------------------------------------------------->
 
	<li class='pil1 sound active border-line'>
	<a  class="menuclick" href="<?php echo base_url()?>resume" >
	<i class="material-icons">dashboard</i>
	<span>DASHBOARD</span>
	<!--<span class="label label-primary label-circle pull-right">23</span>-->
	</a>
	</li>
	 
	 
	
	<li class='pil2 sound  border-line'>
	<a   href="<?php echo base_url();?>check/in" target="_blank" >
	<i class="material-icons">done_all</i>
	<span> CEK UPACARA BENDER</span>
	<!--<span class="label label-primary label-circle pull-right">23</span>-->
	</a>
	</li>
	
	<li class='pil2 sound  border-line'>
	<a   href="<?php echo base_url();?>check/suci" target="_blank" >
	<i class="material-icons">done_all</i>
	<span> CEK RENUNGAN SUCI </span>
	<!--<span class="label label-primary label-circle pull-right">23</span>-->
	</a>
	</li>
	
	<li class='pil2 sound  border-line'>
	<a   href="<?php echo base_url();?>check/acara" target="_blank" >
	<i class="material-icons">done_all</i>
	<span> CEK ACARA LAINNYA </span>
	<!--<span class="label label-primary label-circle pull-right">23</span>-->
	</a>
	</li>
	
	 
 
<li class="active"></li>
<!------------------------------------------------------------------------->
   </ul>
				
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
		 
               <div class="btn-group" role="group" aria-label="First group">
                                        <button type="button" class="clickthem btn bg-red waves-effect" thema="red" >&nbsp; </button>
                                        <button type="button" class="clickthem btn bg-pink waves-effect" thema="pink"> &nbsp;</button>
                                        <button type="button" class="clickthem btn bg-purple waves-effect" thema="purple">&nbsp;</button>
                                <button type="button" class="clickthem btn bg-deep-orange waves-effect" thema="deep-orange">&nbsp;</button>
                                    
                                        <button type="button" class="clickthem btn bg-indigo waves-effect" thema="indigo">&nbsp;</button>
                                        <button type="button" class="clickthem btn bg-blue waves-effect" thema="blue">&nbsp;</button>
                            
                                        <button type="button" class="clickthem btn bg-teal waves-effect" thema="teal">&nbsp;</button>
                                        <button type="button" class="clickthem btn bg-green waves-effect" thema="green">&nbsp;</button>
                                        <button type="button" class="clickthem btn bg-brown waves-effect" thema="brown">&nbsp;</button>
                                    
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
	
	