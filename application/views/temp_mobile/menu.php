
   <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar hide">
            <!-- User Info -->
            <div  >
		 <br>
<br>
<br>
<br>
               
                
                <div class="info-container">
                     
                  
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
							     classLS();
						   }else{
						   };
						    classLS();
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
					   function classLS()
						{	
							<?php if($mobile){ ?>
							 $("body").addClass("ls-closed");
							 $("body").removeClass("overlay-open");
							<?php } ?>
						}
				   });
				   </script>
					<!--  <div align="center" style="margin-top:-35px" class="pull-right col-white font-bold"> Suara Effect
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
					MENU NAVIGASI
					
					</li>
						
					
<!------------------------------------------------------------------------->
 
	  
<li class="active"></li>
<!------------------>
 
 
<!------------------------------------------------------------------------->
   </ul>
				
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <br>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
       