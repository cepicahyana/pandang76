<?php
$uri=$this->uri->segment(3);
$id=$this->session->userdata("id");
$con=$this->event->dataEventID($uri);
?>

<h2 style='color:white' class="sadow05">CHECKED IN <?php echo $s2=$this->event->jmlPeserta($con->id_event,"2"); ?> FROM  <?php echo $s2+$this->event->jmlPeserta($con->id_event,"1"); ?></h2>				


	

