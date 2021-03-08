 <style>
 ul{
     margin-left:-15px;
 }
     ul li{ 
         padding-bottom:7px;
         font-size:12px;
     }
 </style>

<?php
 
        $data=$val;
        $tgl         =   $data->jadwal_distribusi;
        $nik         =   $data->nik;
		$this->m_reff->qr($nik);
        $nama        =   $data->nama;
        $hp          =   $data->hp;
        $email       =   $data->email;
        $instansi     =   $data->instansi;
        $tgl_ambil   =   $this->tanggal->hariLengkap($tgl,"/");
        $this->m_reff->qr($nik);
        
        $blok_pagi  =   $data->blok1;
        $blok_sore  =   $data->blok2;
        $suci		=   $data->sts_suci;
		$blok_pagi_="";
		$blok_sore_="";
		$und_suci	   ="";
		
		if($blok_pagi)
		{
			$blok_pagi_=' - Acara Penaikan Bendera : Blok '.$this->m_reff->goField("tr_blok","nama","where id='".$blok_pagi."'").' <br> ';
		}
		if($blok_sore)
		{
			$blok_sore_=' - Acara Penurunan Bendera : Blok '.$this->m_reff->goField("tr_blok","nama","where id='".$blok_sore."'").'  <br>';
		}
		if($data->sts_suci==1 and $data->r_suci==1)
		{
			$und_suci=' - Acara Renungan Suci  <br>';
		}
		?>
		
<page backcolor="#EEE">
    <table style="width:215px" cellpadding=0 cellspacing=0>
    <tr>
    <td colspan="2" style="background-color:#EEE; table-layout:fixed;width:415px" align="center">
    <img  style="width:415px" src="<?php echo realpath("plug/img/header.jpg");?>"   alt="E-receipt"  class="CToWUd a6T" tabindex="0"> 
 <br> 
 <div align='center'>
     <span  style="font-size:12"><b> BUKTI PENGAMBILAN UNDANGAN  HUT RI-<?php echo $this->m_reff->tm_pengaturan(31)?></b></span>
     </div>
   
      </td>
    </tr>
    <tr>
    <td align="left" valign="top" style="background-color:#EEE;table-layout:fixed;width:199px;padding:10px"> 
    <div style="margin-left:20px">
     <span style="font-size:11px; line-height:16px">Nama Pemohon :</span><br>
      <span style="font-size:13px;line-height:16px;font-weight:bold;color:black"><?php echo $nama; ?></span> <br>
      
      <span style="font-size:11px; line-height:16px">NIK / Nomor Identitas :</span><br>
      <span style="font-size:13px;line-height:16px;font-weight:bold;color:black"><?php echo $nik; ?></span> <br>
      <span style="font-size:11px; line-height:16px">Email :</span><br>
      <span style="font-size:13px;line-height:16px;font-weight:bold;color:black"><?php echo $email; ?></span> <br>
      <span style="font-size:11px; line-height:16px">Hp :</span><br>
      <span style="font-size:13px;line-height:16px;font-weight:bold;color:black"><?php echo $hp; ?></span> <br>
     <br>
        <b style="font-size:12px;font-weight:bold;color:teal;"> PEROLEHAN UNDANGAN</b><br>
      <?php
      echo $blok_pagi_.$blok_sore_.$und_suci;
    ?>
      
     
     </div>
    </td> <td style="background-color:#EEE"  > 
    
                 <br>
                 <br>
                 <br>
                 <img src="<?php echo realpath($this->m_reff->tm_pengaturan(37)."/qr/".$nik.".png");?>" style="width:80px;margin-top:-100px" ><br>
                 
    </td>
    </tr>
    <tr>
    <td colspan="2"  style="background-color:#EEE;padding:10px"> 
   <b style="font-size:12px;font-weight:bold;color:teal;margin-left:10px"> INFORMASI PENGAMBILAN UNDANGAN</b><br> 
     <ul>
         <li>Undangan dapat diambil pada :<br>hari <?php echo $tgl_ambil;?> pukul 08.30 - 16.00 WIB </li> 
         <li> Alamat :   Kantor Sekretariat Negara<br>
              Jl. Veteran No.17-18, RT.2/RW.3, Gambir, Kecamatan Gambir, Kota Jakarta Pusat.</li>
      <li>Membawa KTP Asli atau tanda pengenal lain yang didaftarkan.</li>
       <li>Menunjukan bukti pengambilan yang dikirim pada email,sms dan whatsapp.</li>
       <li>Jika Undangan tidak diambil  lebih dari 3 hari  dari tanggal pengambilan maka otomatis dibatalkan.</li>
     </ul>
        
    </td>
    </tr>
    </table>
    </page>
    