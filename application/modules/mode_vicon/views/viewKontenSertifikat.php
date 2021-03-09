<button class='pull-right'   style="visibility:hidden;magin-right:20px">  &nbsp;&nbsp;</button><br>
<div class="row">




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
	 $link=$this->m_reff->tm_pengaturan(65);
	 $link=realpath($this->m_reff->tm_pengaturan(37)."/sertifikat/".$link);
	?>
	 
	<img class="card-img-top rounded"  src="<?php echo $this->konversi->img($link);?>" width="200px">
	</div>

	<div class="col-md-8">
	<button class='pull-right btn btn-sm' onclick="editKontenSertiID()" style="magin-right:20px"> Edit</button><br>
		<div class='col-md-12'> 
		<b class='text-success'>Konten Whatsapp:</b> <br>
		<?php echo $this->mdl->kontenGiven($this->m_reff->tm_pengaturan(64))?> 
		</div>
		<div class="row col-md-12"><hr></div>
		<hr>
		<div class='col-md-12' >  <b class='text-primary'>Subject email :</b></span><br>
		 <?php echo $this->mdl->kontenGiven($this->m_reff->tm_pengaturan(66))?>
		<br>
		<br>
		<b class='text-primary'>Konten Email:</b> <br>
		<?php echo $this->mdl->kontenGiven($this->m_reff->tm_pengaturan(63))?> 
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
	 $link=$this->m_reff->tm_pengaturan(70);
	 $link=realpath($this->m_reff->tm_pengaturan(37)."/sertifikat/".$link);
	?>
	 
	<img class="card-img-top rounded"  src="<?php echo $this->konversi->img($link);?>" width="200px">
	</div>

	<div class="col-md-8">
		<button class='pull-right btn btn-sm' onclick="editKontenSertiEN()" style="magin-right:20px"> Edit</button><br>
		<div class='col-md-12'> 
		<b class='text-success'>Konten Whatsapp:</b> <br>
		<?php echo $this->mdl->kontenGiven($this->m_reff->tm_pengaturan(69))?> 
		</div>
		<div class="row col-md-12"><hr></div>
		<hr>
		<div class='col-md-12' >  <b class='text-primary'>Subject email :</b></span><br>
		 <?php echo $this->mdl->kontenGiven($this->m_reff->tm_pengaturan(68))?>
		<br>
		<br>
		<b class='text-primary'>Konten Email:</b> <br>
		<?php echo $this->mdl->kontenGiven($this->m_reff->tm_pengaturan(67))?> 
		<br>
		<br><hr>
		</div> 
	</div> 
											
											
											</div>
										</div>
 </div>








 </div><center><button class='btn btn-primary' onclick="confirm()">Kirim</button></center>