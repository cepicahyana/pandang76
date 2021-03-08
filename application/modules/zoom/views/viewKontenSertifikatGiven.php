<button class='pull-right'   style="visibility:hidden;magin-right:20px">  &nbsp;&nbsp;</button><br>
<div class="row">


 
 <div class="tab-content mt-2 mb-3" id="pills-tabContent">
										<div class="tab-pane fade show active" id="pills-home2" role="tabpanel" aria-labelledby="pills-home-tab2">
											<div id="viewKontenIndonesia" class="row col-md-12">
											
											
											<div class="col-md-4">

	<?php
	error_reporting(0);
	 $link=$this->m_reff->tm_pengaturan(88);
	 $link=realpath($this->m_reff->tm_pengaturan(37)."/sertifikat/".$link);
	?>
	 
	<img class="card-img-top rounded"  src="<?php echo $this->konversi->img($link);?>" width="200px">
	</div>

	<div class="col-md-8">
	<button class='pull-right btn btn-sm' onclick="editKontenSertiID()" style="magin-right:20px"> Edit</button><br>
		<div class='col-md-12'> 
		<b class='text-success'>Konten Whatsapp:</b> <br>
		<?php echo $this->mdl->kontenGiven($this->m_reff->tm_pengaturan(85))?> 
		</div>
		<div class="row col-md-12"><hr></div>
		<hr>
		<div class='col-md-12' >  <b class='text-primary'>Subject email :</b></span><br>
		 <?php echo $this->mdl->kontenGiven($this->m_reff->tm_pengaturan(86))?>
		<br>
		<br>
		<b class='text-primary'>Konten Email:</b> <br>
		<?php echo $this->mdl->kontenGiven($this->m_reff->tm_pengaturan(87))?> 
		<br>
		<br><hr>
		</div> 
	</div> 
											
											
											</div>
										 </div>
									 
 </div>








 </div><center><button class='btn btn-primary' onclick="confirm()">Kirim</button></center>