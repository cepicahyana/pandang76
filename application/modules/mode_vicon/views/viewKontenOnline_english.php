<button class='pull-right btn btn-sm' onclick="editKonten_english()"> Edit</button><br>
<div class="row">

<div class='col-md-12'> 
<b class='text-success'>Konten Whatsapp:</b> <br>
<?php echo $this->mdl->kontenGivenWa($this->m_reff->tm_pengaturan(60))?> 
</div>
<div class="row col-md-12"><hr></div>
<hr>
<div class='col-md-12' >  <b class='text-primary'>Subject email :</b></span><br>
 <?php echo $this->mdl->kontenGiven($this->m_reff->tm_pengaturan(58))?>
<br>
<br>
<b class='text-primary'>Konten Email:</b> <br>
<?php echo $this->mdl->kontenGiven($this->m_reff->tm_pengaturan(59))?> 
<br>
<br><hr>
</div>  </div><center><button class='btn btn-primary' onclick="confirm()">Kirim</button></center>