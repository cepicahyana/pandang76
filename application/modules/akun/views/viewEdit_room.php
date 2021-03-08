 <?php $database=$this->db->get_where("zoom_event",array("id"=>$this->input->post("id")))->row();  
 
		 
 ?>		
<input type="hidden" name="id" value="<?php echo $database->id;?>"> 
		 						<div class="row clearfix">
                                    <div class="col-lg-3 col-md-3  form-control-label">
                                        <label for="email_address_2" class="col-black" style='margin-top:15px'>Akun vicon</label>
                                    </div>
                                    <div class="col-lg-8 col-md-8  ">
                                        <div class="form-group">
                                            <div class="form-line"  >
											<?php
											$db=$this->db->get("zoom_akun")->result();
											$data[""]="---- piih ----";
											foreach($db as $val)
											{
												$data[$val->id]=$val->nama;
											}
												
											echo form_dropdown("f[id_akun]",$data,$database->id_akun,"class='form-control' required");
											?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								 					 
  							 
							  <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3  form-control-label">
                                        <label for="email_address_2" class="col-black"  style='margin-top:15px'>Kode (IDMeeting) </label>
                                    </div>
                                    <div class="col-lg-8 col-md-8  ">
                                        <div class="form-group">
                                            <div class="form-line"  >
											<input   required class=" form-control" name="f[kode]" value="<?php echo $database->kode ?>" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>  

									
							 
								<div class="row clearfix">
                                    <div class="col-lg-3 col-md-3  form-control-label">
                                        <label for="email_address_2" class="col-black"  style='margin-top:15px'>Nama Event <br>(meeting room) </label>
                                    </div>
                                    <div class="col-lg-8 col-md-8  ">
                                        <div class="form-group">
                                            <div class="form-line"  >
											<input   required class=" form-control" name="f[title]"   value="<?php echo $database->title ?>"  type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div> 
								
								 
								
								<div class="row clearfix">
                                    <div class="col-lg-3 col-md-3  form-control-label">
                                        <label for="email_address_2" class="col-black" style='margin-top:15px'>Status Aktivasi</label>
                                    </div>
                                    <div class="col-lg-8 col-md-8  ">
                                        <div class="form-group">
                                            <div class="form-line"  >
											<?php
											$act["1"]="Aktif";
											$act["0"]="Non-aktif"; 
											echo form_dropdown("f[sts_aktivasi]",$act,$database->sts_aktivasi,"class='form-control' ");
											?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								 
  