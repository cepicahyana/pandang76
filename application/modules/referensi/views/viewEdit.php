 <?php $database=$this->db->get_where("tr_pekerjaan",array("id"=>$this->input->post("id")))->row();  
 
		 
 ?>		
<input type="hidden" name="id" value="<?php echo $database->id;?>"> 
							 
 
							<div class="row clearfix">
                                    <div class="col-lg-3 col-md-3  form-control-label">
                                        <label for="email_address_2" class="col-black"  style='margin-top:15px'> URUTAN  </label>
                                    </div>
                                    <div class="col-lg-8 col-md-8  ">
                                        <div class="form-group">
                                            <div class="form-line"  >
											<input   required class=" form-control" name="f[urut]" value="<?php echo $database->urut;?>" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div> 
									
						  <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3  form-control-label">
                                        <label for="email_address_2" class="col-black"  style='margin-top:15px'>Nama pekerjaan (Indonesia) </label>
                                    </div>
                                    <div class="col-lg-8 col-md-8  ">
                                        <div class="form-group">
                                            <div class="form-line"  >
											<input   required class=" form-control" name="f[nama]" value="<?php echo $database->nama;?>" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>  
									  <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3  form-control-label">
                                        <label for="email_address_2" class="col-black"  style='margin-top:15px'>Nama pekerjaan (English) </label>
                                    </div>
                                    <div class="col-lg-8 col-md-8  ">
                                        <div class="form-group">
                                            <div class="form-line"  >
											<input   required class=" form-control" name="f[english]" value="<?php echo $database->english;?>" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>  
									
								 
							   