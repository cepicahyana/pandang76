
<?php
$kode	=	$this->input->get_post("kode");
$this->db->where("nik",$kode);
$this->db->or_where("email",$kode);
$this->db->or_where("hp",$kode);
$this->db->order_by("blok1,blok2","ASC");
$val	=	$this->db->get("data_peserta")->row();
$pagiblok=$soreblok	=	"";
$hps	=	isset($val->hps)?($val->hps):"";//hapus/dis

if(!isset($val->nik))
{
	echo "<br><br><h2 class='alert alert-danger bg-warning'> Data tidak ditemukan. </h2>";
	return false;
}elseif($hps==1)
{
	echo "<br><br><h2 class='alert alert-danger bg-warning'> Data telah didiskulifikasi. </h2>";
	return false;
}
 elseif($val->sts_acc==0)
{
	echo "<br><br><h2 class='alert alert-danger bg-warning'> Permohonan ini sedang diproses. </h2>";
	return false;
}elseif($val->sts_acc==1)
{
	echo "<br><br><h2 class='alert alert-danger bg-warning'> Permohonan ini masih sebagai konsep. </h2>";
	return false;
}elseif($val->sts_acc==3)
{
	echo "<br><br><h2 class='alert alert-danger bg-warning'> Permohonan ini telah ditolak. </h2>";
	return false;
}elseif(!$val->jadwal_distribusi)
{
	echo "<br><br><h2 class='alert alert-danger bg-warning'> Permohonan ini belum dijadwalkan kedalam pendistribusian. </h2>";
	return false;
}

 $durasi	=	$this->tanggal->selisih(date('Y-m-d'),$val->jadwal_distribusi);
if($durasi>0)
{
	echo "<br><br><h2 class='alert alert-danger bg-warning'> Permohonan ini tidak dapat diambil hari ini.<br> Jadwal pengambilan : ".$this->tanggal->hariLengkap($val->jadwal_distribusi,"/")." </h2>";
	return false;
}elseif($durasi<0)
{
		echo " <h2 class='alert alert-danger bg-warning'> Permohonan ini sudah lewat ".str_replace("-","",$durasi)." hari dari masa pengambilan.</h2>";
}

	 

if(!$val){ return false;}
$lis="";$no=1;$nik="";$undangan_pagi=$undangan_sore=0;$urut=1;
 
	
	$qr1="";
	$qr2="";$blok_pagi=$blok_sore="";
	if($val->blok1)
	{	$color	=	$this->m_reff->getColor($val->blok1);
		$blok="<span class='label  font-14' style='background-color:".$color."'>PAGI&nbsp; : ".$val->blok1."</span>";
		if($val->blok1)
		{	 $blok_pagi=$val->blok1;
			 
		}else{
			 
		}
		$undangan_pagi++;
	}else{
		$color	=	$this->m_reff->getColor($val->blok2);
		$blok="<span class='label  font-14' style='background-color:".$color."'>SORE : ".$val->blok2."</span>";
		if($val->blok2)
		{	 $blok_sore=$val->blok2;
		 
		}else{
			 
		}
			$undangan_sore++;
	}
	
	if($val->jenis_acara==1)
	{	$perolehan	=	1;
		 $getBlok	=	$this->db->get_where("tr_blok",array("id"=>$val->blok1))->row();
		 $idBlok	=	isset($getBlok->id)?($getBlok->id):"";
		 $pagiblok	=	 $namaBlok	=	isset($getBlok->nama)?($getBlok->nama):"";
		 $link		=	isset($getBlok->link_gelang)?($getBlok->link_gelang):"";
		$qr1="<input class='form-control' value='".$this->mdl->getQr($val->id,1)."' type='text' size='30' style='border:grey solid 1px' id='kod1".$urut."' onchange='setKode(1,".$val->id.",this.value,1,".$urut.",".$idBlok.")'>";
		 
		 $lis="<b>Blok ".$namaBlok."  (Penaikan) </b><hr>
		 <img src='".base_url()."file_upload/gelang/".$link."' width='100%'><br><hr>
		 ".$qr1;
		
	}elseif($val->jenis_acara==2)
	{	 $perolehan	=	1;
		 $getBlok	=	$this->db->get_where("tr_blok",array("id"=>$val->blok2))->row();
		 $idBlok	=	isset($getBlok->id)?($getBlok->id):"";
		  $soreblok	=	$namaBlok	=	isset($getBlok->nama)?($getBlok->nama):"";
		 $link		=	isset($getBlok->link_gelang)?($getBlok->link_gelang):"";
		 
		$qr1="<input  class='form-control' value='".$this->mdl->getQr($val->id,2)."' type='text' size='30' style='border:grey solid 1px' id='kod1".$urut."' onchange='setKode(1,".$val->id.",this.value,1,".$urut.",".$idBlok.")'>";
				

		$lis="<b>Blok ".$namaBlok." (Penurunan)</b><hr>
		 <img src='".base_url()."file_upload/gelang/".$link."' width='100%'><br><hr>
		 ".$qr1;
	}elseif($val->jenis_acara==3){
		 $perolehan	=	2;
		 $getBlok	=	$this->db->get_where("tr_blok",array("id"=>$val->blok1))->row();
		 $idBlok	=	isset($getBlok->id)?($getBlok->id):"";
		 $pagiblok	=	$namaBlok	=	isset($getBlok->nama)?($getBlok->nama):"";
		 $link		=	isset($getBlok->link_gelang)?($getBlok->link_gelang):"";		
		 $urut      =   1;
		$qr1="<input  class='form-control' value='".$this->mdl->getQr($val->id,1)."'type='text' size='30' style='border:grey solid 1px'  id='kod1".$urut."'  onchange='setKode(1,".$val->id.",this.value,2,".$urut.",".$idBlok.")'>";
		 
		  
		 $lis="<b>Blok ".$namaBlok." (Penaikan)</b><br>
		 <img src='".base_url()."file_upload/gelang/".$link."' width='100%'><br><hr>
		 ".$qr1;
		 
		 $getBlok	=	$this->db->get_where("tr_blok",array("id"=>$val->blok2))->row();
		 $idBlok	=	isset($getBlok->id)?($getBlok->id):"";
		 $soreblok	=	$namaBlok	=	isset($getBlok->nama)?($getBlok->nama):"";
		 $link		=	isset($getBlok->link_gelang)?($getBlok->link_gelang):"";	
		 $urut      =   2;
		$qr2="<input  class='form-control' value='".$this->mdl->getQr($val->id,2)."' type='text' size='30' style='border:grey solid 1px'  id='kod1".$urut."'  onchange='setKode(2,".$val->id.",this.value,2,".$urut.",".$idBlok.")'>";
				 
		 $lis.="<hr><b>Blok  ".$namaBlok."  (Penurunan)</b> <br>
		 <img src='".base_url()."file_upload/gelang/".$link."' width='100%'><br><hr>
		 ".$qr2;
		 
	}else{
	echo "<script>$('#kod13').focus();</script>";
	}
	 $undsuci=0;
 
	if($val->r_suci==1 and $val->sts_suci==1)
	{
		 $undsuci	=	1;
		 $link		=	$this->m_reff->goField("tr_kategory","link_gelang","where id='4' ");
		 $urut      =   3;
		$qr3="<input  class='form-control' value='".$this->mdl->getQr($val->id,3)."' type='text' size='30' style='border:grey solid 1px'  id='kod1".$urut."'  onchange='setKode(3,".$val->id.",this.value,2,".$urut.",44)'>";
		 $lis.="<hr><b>Undangan Renungan Suci</b> <br>
		  <img src='".base_url()."file_upload/gelang/".$link."' width='100%'><br><hr>
		 ".$qr3;	
	}elseif($val->r_suci==1 and $val->sts_suci==2)
	{
		   $lis.="<hr><b>Undangan Renungan Suci : Ditolak</b> ";
		 
	}
	 
	$nama_pj	=	$val->nama;
	$nik		=	$val->nik;
	$hp			=	$val->hp;
	$email		=	$val->email;
	$alamat		=	$this->m_reff->goField("wil_provinsi","nama","where id_prov='".substr($nik,0,2)."' ")." - ".$this->m_reff->goField("wil_kabupaten","nama","where id_kab='".substr($nik,0,4)."' ");
 
 


?>
 
 

               
				  <div class="row col-md-12">
				  <div class="col-md-6 card">
				   <div>
                            <a style='margin-top:5px' class="btn btn-block bg-white col-black waves-effect" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false"
                               aria-controls="collapseExample">
                          <i class="fa fa-address-card"></i>    Data Pemohon
                            </a>
							 
                            <div class="collapse" id="collapseExample">
                               
                               <table class="entry  " style='width:100%'>
					<tr class='bg-blue-grey'><td colspan="2">Data Profile</tr>
					<tr><td>Nama </td> <td><?php echo $nama_pj;?></td></tr>
					<td>  NIK</td>  <td><?php echo  $nik;?></td></tr>
					<td>  Hp</td> <td><?php echo $hp;?></td></tr>
					<td>Email</td> <td><?php echo $email;?></td></tr> 
					</table> 
                              
                            </div>
                        </div>
				   
				   
				   
				   
				   
				   
				   
				   <center> <div id="camera"> Capture</div>	</center>
				  <div id="webcam">
                  <center>
                     <center>
                      <button type="button" onclick="preview()" class="col-blue-grey btn bg-white btn-block"><b class="text-primary">[ <span class="fas fa-camera"></span> ]</b></button>
                  </center>
                  </center>  
                </div>
                <div id="simpan" style="display:none">
                    <input type=button value="Remove" onClick="batal()" class='btn text-danger btn-block'>
                   
                </div>
            
                <div id="hasil"></div>
				<?php
				$diterima_oleh=$this->mdl->getPenerima($nik);
				if($diterima_oleh){
					$nama_penerima=$diterima_oleh;
				}else{
					$nama_penerima=$nama_pj;
				}?>
				<b>	Nama Penerima :</b>
					<input type="text" name='penerima' class='form-control' value="<?php echo $nama_penerima;?>"  >
					<br>
				<b>	Tanggal Diterima :</b>
					<input type="text" class='form-control' id='tgl' value="<?php echo $this->mdl->getTglAmbil($nik)?>"  name="tgl" >
					 <hr>
					    <button type=button   onclick='simpan(`<?php echo  $nik;?>`)' class='btn btn-primary btn-block'> 
					    <i class="fa fa-print"></i> 
					     Simpan & cetak tanda terima</button>
					    <br><hr>
				  </div>
				  
				  
                    <div class="col-md-6  "   >
                     
					  
					<?php echo $lis;?>
					 
					
					</div>
					</div>
 
				 
<script>	

function tanggal(nik)
{   	
    var val=$("#tgl").val();
    var url="<?php echo base_url();?>penyerahan/setTanggalTerima";
    $.post(url,{nik:nik,val:val},function(data){
				
    });
}
function setKode(ke,id,kode,berlaku,urut,idblok)
{			 loading();
			var awalan=kode.substring(0,2); 
			if(awalan!=idblok){	
					   notif(" Maaf!! kode tidak cocok silahkan pilih gelang yang sesuai. ");
					   $("#kod1"+urut).val("");
					    unblock();
					   return false;
			}
			var url="<?php echo base_url();?>penyerahan/setKode";
			 
			$.post(url,{ke:ke,id:id,kode:kode,idblok:idblok},function(data){
				  if(data=="false")
				  {
					  notif("Kode qrcode sudah pernah digunakan");
					   $("#kod1"+urut).val("");
				  }else if(data=="wrong")
				  {
					  notif("Maaf!! kode tidak cocok silahkan pilih gelang yang sesuai. ");
					   $("#kod1"+urut).val("");
				  }else{
					  var next=Number(urut)+1;
					  var awal=Number(urut);
					 if(ke==1)
					 {
						 
							  $("#kod1"+next).focus();
						//	  $("#kod2"+awal).val(""); 
					 }
					 if(ke==2)
					 {
						 
							  $("#kod1"+next).focus();
						//	  $("#kod2"+awal).val(""); 
					 }
					 
					 /*else{
						   
					   $("#kod1"+next).focus();
					   $("#kod1"+next).val("");
					    
					 }		*/				 
				  
				  }
				   unblock();
			  });
}
</script>			


<script>

			$('#tgl').daterangepicker({
    "singleDatePicker": true,
    "showDropdowns": true,
    "drops": "up",
	"timePicker": true,
    "timePicker24Hour": true,
	 "autoApply": true,
    "locale": { 
        "format": "DD/MM/YYYY hh:mm",
        "separator": " - ",
        "applyLabel": "Apply",
        "cancelLabel": "Cancel",
        "fromLabel": "From",
        "toLabel": "To",
        "customRangeLabel": "Custom",
        "weekLabel": "W",
        "daysOfWeek": [
            "Min",
            "Sen",
            "Sel",
            "Rab",
            "Kam",
            "Jum",
            "Sab"
        ],
        "monthNames": [
            "Januari",
            "Februari",
            "Maret",
            "April",
            "Mei",
            "Juni",
            "Juli",
            "Augustus",
            "September",
            "Oktober",
            "November",
            "Desember"
        ],
        "firstDay": 1
    },
     "startDate": "<?php echo date('d/m/Y H:i'); ?>",
}, function(start, end, label) { 
 // console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
 $('.bukti').text(start.format('DD/MM/YYYY hh:mm')+ " WIB");
});

 
</script>

	 <script src="<?php echo base_url()?>/static/js/webcam.min.js"></script>
<script language="Javascript">
        // konfigursi webcam
        Webcam.set({
            width: 200,
            height: 150,
            image_format: 'jpg',
            jpeg_quality: 100
        });
        Webcam.attach( '#camera' );

        function preview() {
            // untuk preview gambar sebelum di upload
			count=1;
            Webcam.freeze();
            // ganti display webcam menjadi none dan simpan menjadi terlihat
            document.getElementById('webcam').style.display = 'none';
            document.getElementById('simpan').style.display = '';
        }
        var count=0;
        function batal() {
            // batal preview
            Webcam.unfreeze();
            count=0;
            // ganti display webcam dan simpan seperti semula
            document.getElementById('webcam').style.display = '';
            document.getElementById('simpan').style.display = 'none';
        }
        
        function simpan(nik) {
			 var val = $("[name='penerima']").val(); 
			 var tgl = $("[name='tgl']").val(); 
			 if(!val || !tgl)
			 {
				 notif("Mohon isi nama penerima dan tanggal diterima.");
				 return false;
			 }
				$(".diambil_oleh1").html(val);
				$(".diambil_oleh2").html(val);
            // ambil foto
			var idt=$("[name='id_tamu']").val();
            Webcam.snap( function(data_uri) {
                
                // upload foto
                Webcam.upload( data_uri, '<?php echo base_url()?>penyerahan/setPenerima/?nik='+nik+'&penerima='+val+'&tgl='+tgl, function(code, text) {} );
				
                Webcam.unfreeze();
				cetak_bukti();
                document.getElementById('webcam').style.display = '';
                document.getElementById('simpan').style.display = 'none';
            } );
        }
	 $("#bukti").hide();	
	function cetak_bukti()
	{
		$("#bukti").show();
		 var divName	   	  	 = "bukti";
		 var printContents 	  	 = document.getElementById(divName).innerHTML;
		 var originalContents 	 = document.body.innerHTML; 
		 document.body.innerHTML = printContents; 
		 window.print(); 
		 document.body.innerHTML = originalContents;
		$("[name='kode']").val("");
		$("[name='kode']").focus();
		 $("#data").html("");
	}
	 
    </script>
	
	<div id="bukti">
	<table border="1" width="100%" >
	<tr>
	<td colspan="2"><center>TANDA TERIMA</center></td>
	</tr>
	<tr>
	<td style="padding:10px">
	<span style='float:right' class='bukti'>   <?php echo $this->tanggal->hariLengkap(date("Y-m-d"),"/")." ".date("H:i:s");?> WIB</span> 
	Nama Pemohon : <?php echo $nama_pj;?><br>
	Nik  : <?php echo $nik;?><br>
	Alamat : <?php echo strtolower($alamat);?><br>
	<hr>
	Diterima oleh : <span class='diambil_oleh1'><?php echo $nama_pj;?></span><br>
	Perolehan : <?php echo $perolehan+$undsuci;?> Undangan<br>
	<?php
	if($val->jenis_acara==1)
	{
		echo '- Undangan upacara penaikan bendera (pagi) : Blok '.$pagiblok.'  <br>';
	}elseif($val->jenis_acara==2)
	{
		echo '- Undangan upacara penurunan bendera (sore) : Blok '.$soreblok.'  <br>';
	}elseif($val->jenis_acara==3){
		echo '- Undangan upacara penaikan bendera (pagi) : Blok '.$pagiblok.'  <br>';
		echo '- Undangan upacara penurunan bendera (sore) : Blok '.$soreblok.'  <br>';
	}
	if($val->r_suci==1 and $val->sts_suci==1)
	{
		echo '- Undangan acara renungan suci : 1 <br>';
	}
	?>
	
	 
	
	<div style='float:right'>ttd Penerima<bR>
	<br>
	<br>
	<br>
	 <br>
	<u>&nbsp;<span class='diambil_oleh2'><?php echo $nama_pj;?></span>&nbsp;</u>
	</div>
	</td>
	</tr>
	</table> 
	</div>
	
	
	