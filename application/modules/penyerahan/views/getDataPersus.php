<?php
$kode		=	$this->input->get_post("kode");
$this->db->where("kode_persus",$kode);
$this->db->order_by("jenis_acara,blok1,blok2","ASC");
$data		=	$this->db->get("data_peserta")->result();
$sts_qrcode	=	$this->m_reff->goField("data_persus","sts_qrcode","where kode='".$kode."'");
if($sts_qrcode==1)
{
	$checked1="checked";
	$checked2="";
}else{
	$checked2="checked";
	$checked1="";
}
$lis="";$no=1;$instansi="";$undangan_pagi=$undangan_sore=0;$urut=1;$jmlpagi=$jmlsore=0;
foreach($data as $val)
{
	
	$qr1="";
	$qr2="";$blok_pagi=$blok_sore="";
	if($val->blok1)
	{	$namblok	=	$this->m_reff->goField("tr_blok","nama","where id='".$val->blok1."'");
		$color	=	$this->m_reff->getColor($val->blok1);
		$blok="<span class='btn btn-xs font-14' style='background-color:".$color.";color:white'><b style='font-size:15px'>	".$namblok."</b> PAGI&nbsp;</span>";
		if($val->blok1)
		{	 $blok_pagi=$val->blok1;
			 
		}else{
			 
		}
		$undangan_pagi++;
	}else{
		$namblok	=	$this->m_reff->goField("tr_blok","nama","where id='".$val->blok2."'");
		$color	=	$this->m_reff->getColor($val->blok2);
		$blok="<span class='btn btn-xs  font-14' style='background-color:".$color.";color:white'>	<b style='font-size:15px'>".$namblok."</b>	SORE </span>";
		if($val->blok2)
		{	 $blok_sore=$val->blok2;
		 
		}else{
			 
		}
			$undangan_sore++;
	}
	
	if($val->jenis_acara==1)
	{	$jmlpagi++;
		$qr1="<input value='".$val->barcode1."' type='text' size='30' style='border:grey solid 1px' id='kod1".$urut."' onchange='setKode(1,".$val->id.",this.value,1,".$urut.",".$val->blok1.")'>" ;
		$qr2="";
		
		$urut++;
	}else{
		 $jmlsore++;
		$qr1="";
		$qr2="<input value='".$val->barcode2."' type='text' size='30' style='border:grey solid 1px'  id='kod1".$urut."'  onchange='setKode(2,".$val->id.",this.value,1,".$urut.",".$val->blok2.")'>" ;
		 $urut++;
	}
	
	$lis.="<tr>
	<td  style='border-bottom:black solid 1px'>".$no++."</td>
	<td  style='border-bottom:black solid 1px;min-width:100px'>".$blok."</td>
	<td style='border-bottom:black solid 1px'>".$qr1."</td>
	<td style='border-bottom:black solid 1px'>".$qr2."</td>
	</tr>";
	$nama_pj	=	$val->nama;
	$instansi	 =	$val->instansi;
	$hp			=	$val->hp;
	$email		=	$val->email;
}
 
 

?>
 <br>
 
                <div class="row col-md-12">
				  <div class="col-md-5 card">
				  
                            <a style='margin-top:5px' class="btn btn-block bg-white col-black waves-effect" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false"
                               aria-controls="collapseExample">
                            <i class="fa fa-address-card"></i>    Data Pemohon
                            </a>
                            <div class="collapse" id="collapseExample">
                               
                               <table class="entry  " width="100%">
					<tr class='bg-blue-grey'><td colspan="2">Data Profile</tr>
					<tr><td>Nama </td> <td><?php echo $nama_pj;?></td></tr>
					<td>  Instansi</td>  <td><?php echo  $instansi;?></td></tr>
					<td>  Hp</td> <td><?php echo $hp;?></td></tr>
					<td>Email</td> <td><?php echo $email;?></td></tr> 
					</table> 
                              
                            </div>
                      
				   
				   
				   
				   
				   
				   
				   
				<center>    <div id="camera"> Capture</div>	</center>
				  <div id="webcam">
                  <center>
                      <button type=button   onClick="preview()" class='col-blue-grey btn bg-white btn-block'><b class='text-primary'>[ <span class='fas fa-camera'></span> ]</b></button>
                  </center>  
                </div>
                <div id="simpan" style="display:none">
                    <input type=button value="Remove" onClick="batal()" class='btn bg-teal btn-block'>
                 
                </div>
            
                <div id="hasil"></div>
					 
				<b>	Nama Penerima :</b><br>
					<input type="text"   name='penerima' class='form-control' value="<?php echo $this->mdl->getPenerimaPersus($kode)?>"  >
					
				<b>	Tanggal diterima:</b><br>
					<input type="text" class='form-control' name="tgl" id='tgl' value="<?php echo $this->mdl->getTglAmbilPersus($kode)?>"   >
					 <hr>
					    <button type=button   onclick='simpan(`<?php echo  $kode;?>`)' class='btn btn-primary btn-block'> 
					    <i class="fa fa-print"> </i> 
					    Simpan & cetak tanda terima</button>
					    <hr>
				  </div>
				  
				  
                    <div class="col-md-6">
                       
					<table class="entry2 " width="105%">
					<tr class='bg-blue-grey col-white'>
					<td>NO</td> 
					<td>BLOK</td> 
					<td >QRCODE PAGI</td>
					<td >QRCODE SORE</td>
				
					</tr>
					<?php echo $lis;?>
					</table>
					<hr>
					 
										<div class="row"  style='width:148%'>
											<div class="col-md-12" >
											<div class="col-md-12 alert alert-danger">
												<center><b>Apakah undangan telah siap untuk didistribusikan ?</b></center>
												<br>
												<label class="custom-control custom-checkbox">
													<input <?php echo $checked1; ?>  id="rsuci1" value="1" onclick="set_kesiapan(`<?php echo  $kode;?>`,1)" name="r_suci" class="custom-control-input" type="radio"><span class="custom-control-label"></span>
												<b class="text-primary">Sudah siap!</b>
												</label> 
												
												 <label class="custom-control custom-checkbox" style='float:right'>
													<input   <?php echo $checked2; ?> id="rsuci2" value="2" onclick="set_kesiapan(`<?php echo  $kode;?>`,2)" name="r_suci" class="custom-control-input" type="radio"><span class="custom-control-label"></span>
												<b class="text-danger">Belum disiap!</b>
												</label>
												 
											</div>	
											</div> 
										</div>
					</div>
					
					
	  </div>
				 
<script>	
 function set_kesiapan(kode,sts)
 {			var url="<?php echo base_url();?>penyerahan/setKesiapan";
			loading();
			$.post(url,{kode:kode,sts:sts},function(data){ 
			unblock();
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
			 loading();
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
						 if(berlaku==1)
						 {
							  $("#kod1"+next).focus();
							//   $("#kod1"+next).val("");
						 }else{
							  $("#kod2"+awal).focus();
							 //  $("#kod2"+awal).val("");
						 }
						 
						
					 }else{
						   
					   $("#kod1"+next).focus();
					   $("#kod1"+next).val("");
					    
					 }						 
				 
				  
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
            width: 300,
            height: 250,
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
        
         function simpan(kode_persus) {
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
                Webcam.upload( data_uri, '<?php echo base_url()?>penyerahan/setPenerimaPersus/?kode_persus='+kode_persus+'&penerima='+val+'&tgl='+tgl, function(code, text) {} );
				
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
		$("[name='kode']").val(null);
		$("[name='kode']").focus();
		 window.location.href="<?php echo base_url()?>penyerahan/persus";
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
	Pemohon : <?php echo $nama_pj;?><br> 
	Instansi : <?php echo $instansi;?><br> 
	Jenis Acara : Undangan Upacara<br> 
	 
	<hr>
	Diterima oleh : <span class='diambil_oleh1'><?php echo $nama_pj;?></span><br>
	Perolehan : <?php echo ($urut-1);?> Undangan<br>
	<?php
	if($jmlpagi)
	{
		echo 'Undangan upacara penaikan bendera (pagi) :   '.$jmlpagi.'  <br>';
	}
	if($jmlsore)
	{
		echo 'Undangan upacara penurunan bendera (sore) :   '.$jmlsore.'  <br>';
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
	
	
	