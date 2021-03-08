 <?php $database=$this->db->get_where("admin",array("id_admin"=>$this->input->post("id")))->row();  
 
		 
 ?>		
<input type="hidden" name="id" value="<?php echo $database->id_admin;?>"> 
							 
 
								
						 
									
								 
								  <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3  form-control-label">
                                        <label for="email_address_2" class="col-black">Nama </label>
                                    </div>
                                    <div class="col-lg-8 col-md-8  ">
                                        <div class="form-group">
                                            <div class="form-line"  >
											<input   required class=" form-control" name="f[owner]" value="<?php echo $database->owner;?>" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-3 col-md-3  form-control-label">
                                        <label for="email_address_2" class="col-black">Telp </label>
                                    </div>
                                    <div class="col-lg-8 col-md-8  ">
                                        <div class="form-group">
                                            <div class="form-line"  >
											<input   required class=" form-control" name="f[telp]"  value="<?php echo $database->telp;?>" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
							 

							 <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3  form-control-label">
                                        <label for="email_address_2" class="col-black">Username </label>
                                    </div>
                                    <div class="col-lg-8 col-md-8  ">
                                        <div class="form-group">
                                            <div class="form-line"  >
											<input   required class=" form-control" name="f[username]" value="<?php echo $database->username;?>"  type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>

							  <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3  form-control-label">
                                        <label for="email_address_2" class="col-black">Password baru </label>
                                    </div>
                                    <div class="col-lg-8 col-md-8  ">
                                        <div class="form-group">
                                            <div class="form-line"  >
											<input     class=" form-control" name="password"  value="" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
