<button class='pull-right btn btn-sm' onclick="editKonten()"> Edit</button><br>
<div class="row">

<div class='col-md-12'> 
<b class='text-success'>Konten Whatsapp:</b> <br>
<?php echo $this->mdl->kontenGivenWa($this->m_reff->tm_pengaturan(52))?> 
</div>
<div class="row col-md-12"><hr></div>
<hr>
<div class='col-md-12' >  <b class='text-primary'>Subject email :</b></span><br>
 <?php echo $this->mdl->kontenGiven($this->m_reff->tm_pengaturan(49))?>
<br>
<br>
<b class='text-primary'>Konten Email:</b> <br>
<?php echo $this->mdl->kontenGiven($this->m_reff->tm_pengaturan(48))?> 
<br>
<br><hr>
</div>  </div><center><button class='btn btn-primary' onclick="confirm()">Kirim</button></center>