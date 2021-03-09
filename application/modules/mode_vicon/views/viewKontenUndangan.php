<button class='pull-right'   style="visibility:hidden;magin-right:20px">  &nbsp;&nbsp;</button><br>
<div class="rows">




<ul class="nav nav-pills nav-secondary" id="pills-tab" role="tablist" style="margin-left:20px">
										<li class="nav-item">
											<a class="nav-link active" id="pills-home-tab2" data-toggle="pill" href="#pills-home2" role="tab" aria-controls="pills-home2" aria-selected="true">Bahasa Indonesia</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="pills-profile-tab2" data-toggle="pill" href="#pills-profile2" role="tab" aria-controls="pills-profile2" aria-selected="false">Bahasa Inggris</a>
										</li>
										 
	 	</ul>
		
 <div class="tab-content mt-2 mb-3" id="pills-tabContent">
										<div class="tab-pane fade show active" id="pills-home2" role="tabpanel" aria-labelledby="pills-home-tab2">
											<div id="viewKontenIndonesia" class="row col-md-12">
											
											
											<div class="col-md-4">

	<?php
	error_reporting(0);
	 $link=$this->m_reff->tm_pengaturan(72);
	 $link=realpath($this->m_reff->tm_pengaturan(37)."/sertifikat/".$link);
	?>
	 <br>
	 <br>
	 <br>
	 <a class="card-img-top btn-border rounded btn btn-success"  target='_blank'
		href="<?php echo base_url();?>welcome/getAttachment/<?php echo $this->m_reff->encrypt($link);?>" width="200px"> Download undangan </a>
		
	</div>

	<div class="col-md-8">
	<button class='pull-right btn btn-sm' onclick="editKontenUndID()" style="magin-right:20px"> Edit</button><br>
		<div class='col-md-12'> 
		<b class='text-success'>Konten Whatsapp:</b> <br>
		<?php echo $this->mdl->kontenGivenWa($this->m_reff->tm_pengaturan(73))?> 
		</div>
		<div class="row col-md-12"><hr></div>
		<hr>
		<div class='col-md-12' >  <b class='text-primary'>Subject email :</b></span><br>
		 <?php echo $this->mdl->kontenGiven($this->m_reff->tm_pengaturan(74))?>
		<br>
		<br>
		<b class='text-primary'>Konten Email:</b> <br>
		<?php echo $this->mdl->kontenGiven($this->m_reff->tm_pengaturan(75))?> 
		<br>
		<br><hr>
		</div> 
	</div> 
											
											
											</div>
										 </div>
										<div class="tab-pane fade" id="pills-profile2" role="tabpanel" aria-labelledby="pills-profile-tab2">
											 <div id="viewKontenInggris" class="row col-md-12">
											
											
	 <div class="col-md-4">

	<?php
	 $link=$this->m_reff->tm_pengaturan(76);
	 $link=realpath($this->m_reff->tm_pengaturan(37)."/sertifikat/".$link);
	?>
	 <br>
	 <br>
	 <br>
	 <a class="card-img-top rounded btn-border btn btn-warning"  target='_blank'
		href="<?php echo base_url();?>welcome/getAttachment/<?php echo $this->m_reff->encrypt($link);?>" width="200px"> Download undangan </a>
		
	</div>

	<div class="col-md-8">
		<button class='pull-right btn btn-sm' onclick="editKontenUndEN()" style="magin-right:20px"> Edit</button><br>
		<div class='col-md-12'> 
		<b class='text-success'>Konten Whatsapp:</b> <br>
		<?php echo $this->mdl->kontenGivenWa($this->m_reff->tm_pengaturan(77))?> 
		</div>
		<div class="row col-md-12"><hr></div>
		<hr>
		<div class='col-md-12' >  <b class='text-primary'>Subject email :</b></span><br>
		 <?php echo $this->mdl->kontenGiven($this->m_reff->tm_pengaturan(78))?>
		<br>
		<br>
		<b class='text-primary'>Konten Email:</b> <br>
		<?php echo $this->mdl->kontenGiven($this->m_reff->tm_pengaturan(79))?> 
		<br>
		<br><hr>
		</div> 
	</div> 
											
											
											</div>
										</div>
 </div>








 </div><center><button id='kirimBtn' class='btn btn-primary' onclick="confirmUnd()">Kirim</button></center>