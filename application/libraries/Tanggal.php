<?php
class tanggal
{
	function ind($id,$di)
	{
	$pecah=explode("-",$id);
	return $pecah[2].$di.$pecah[1].$di.$pecah[0];
	}
	function indTempo($id,$di)
	{
	$pecah=explode("-",$id);
	return $pecah[2].$di.($pecah[1]+1).$di.$pecah[0];
	}
	function eng_($id,$di)
	{
	$pecah=explode("/",$id);
	return $pecah[2].$di.$pecah[1].$di.$pecah[0];
	}function eng_jam($id,$di)
	{
	$tgl=substr($id,0,10);
	$jam=substr($id,12,10);
	$pecah=explode("/",$tgl);
	return $pecah[2].$di.$pecah[1].$di.$pecah[0]." ".$jam;
	}
	function eng($id,$di)
	{
	$pecah=explode("-",$id);
	return $pecah[2].$di.$pecah[1].$di.$pecah[0];
	}
	function ind_bulan($id,$di=null)
	{
		if($di==null)
		{
			$di=" ";
		}
		$pecah=explode("-",$id);
		if(count($pecah)<3)
		{
		return false;
		}
		return $pecah[2].$di.$this->bulan($pecah[1]).$di.$pecah[0];
	}
	function eng3($id=null,$di=null)
	{	 
		if(!$id or !$di)
		{
			return false;
		}
	$pecah=explode("-",substr($id,0,10));
	return $pecah[2].$di.$pecah[1].$di.$pecah[0]." ".substr($id,11,5)." WIB";
	}
	 function hariLengkap3($tanggal)
	{
	$tgl=isset($tanggal)?($tanggal):"";
	if($tgl){ $tanggal;	}else { return 0; };
	 	$day = date('D', strtotime($tanggal));
		$dayList = array(
    	'Sun' => 'Minggu',
    	'Mon' => 'Senin',
    	'Tue' => 'Selasa',
    	'Wed' => 'Rabu',
    	'Thu' => 'Kamis',
    	'Fri' => 'Jumat',
    	'Sat' => 'Sabtu'
		);
		return $dayList[$day].", ".$this->ind_bulan($tanggal);
	}	
	 function selisih($awal,$akhir){ //Y-m-d
       $tglAwal = strtotime($awal);
       $tglAkhir = strtotime($akhir);
       $jeda = $tglAkhir - $tglAwal;
       return ($jeda/(60*60*24));
     }
	function nameHari($tanggal) //ymd
	{
	 	$day = date('D', strtotime($tanggal));
		$dayList = array(
    	'Sun' => 'Sunday',
    	'Mon' => 'Monday',
    	'Tue' => 'Teusday',
    	'Wed' => 'Wednesday',
    	'Thu' => 'Thursday',
    	'Fri' => 'Friday',
    	'Sat' => 'Saturday'
		);
		return $dayList[$day];
	}function namaHari($tanggal) //ymd
	{
	 	$day = date('D', strtotime($tanggal));
		$dayList = array(
    	'Sun' => 'Minggu',
    	'Mon' => 'Senin',
    	'Tue' => 'Selasa',
    	'Wed' => 'Rabu',
    	'Thu' => 'Kamis',
    	'Fri' => 'Jumat',
    	'Sat' => 'Sabtu'
		);
		return $dayList[$day];
	}
	function hariLengkap_($tanggal,$seperator)
	{
	$tgl=isset($tanggal)?($tanggal):"";
	if($tgl){ $tanggal;	}else { return 0; };
	 	$day = date('D', strtotime($tanggal));
		$dayList = array(
    	'Sun' => 'Minggu',
    	'Mon' => 'Senin',
    	'Tue' => 'Selasa',
    	'Wed' => 'Rabu',
    	'Thu' => 'Kamis',
    	'Fri' => 'Jumat',
    	'Sat' => 'Sabtu'
		);
		return $dayList[$day].", ".$tgl;
	}
	function hariLengkap($tanggal,$seperator)
	{
	$tgl=isset($tanggal)?($tanggal):"";
	if($tgl){ $tanggal;	}else { return 0; };
	 	$day = date('D', strtotime($tanggal));
		$dayList = array(
    	'Sun' => 'Minggu',
    	'Mon' => 'Senin',
    	'Tue' => 'Selasa',
    	'Wed' => 'Rabu',
    	'Thu' => 'Kamis',
    	'Fri' => 'Jumat',
    	'Sat' => 'Sabtu'
		);
		return $dayList[$day].", ".$this->ind($tanggal,$seperator);
	}	
	
	function hariLengkapJam($tanggal,$seperator)
	{
	$tgl=isset($tanggal)?($tanggal):"";
	$tgl=substr($tgl,0,10);
	$jam=substr($tanggal,11,5);
	if($tgl){ $tanggal;	}else { return 0; };
	 	$day = date('D', strtotime($tanggal));
		$dayList = array(
    	'Sun' => 'Minggu',
    	'Mon' => 'Senin',
    	'Tue' => 'Selasa',
    	'Wed' => 'Rabu',
    	'Thu' => 'Kamis',
    	'Fri' => 'Jumat',
    	'Sat' => 'Sabtu'
		);
		return $dayList[$day].", ".$this->ind($tgl,$seperator)." ".$jam;
	}	
	
	function hariLengkap2($tanggal,$seperator)
	{
	$tgl=isset($tanggal)?($tanggal):"";
	if($tgl){ $tanggal;	}else { return 0; };
	 	$day = date('D', strtotime($tanggal));
		$dayList = array(
    	'Sun' => 'Sunday',
    	'Mon' => 'Monday',
    	'Tue' => 'Teusday',
    	'Wed' => 'Wednesday',
    	'Thu' => 'Thursday',
    	'Fri' => 'Friday',
    	'Sat' => 'Saturday'
		);
		return $dayList[$day].", ".$this->ind($tanggal,$seperator);
	}
	
	function aturHari2($tgl1,$tgl2,$seperator,$pemisah) //yyyy/mm/dd
	{
	$hari1=$this->hariLengkap2($tgl1,$seperator);
	$hari2=$this->hariLengkap2($tgl2,$seperator);
	if($tgl1==$tgl2){
		return $hari1;
	}else{
		return $hari1." ".$pemisah." ".$hari2;
	}

	}
	
	function aturHari($tgl1,$tgl2,$seperator,$pemisah) //yyyy/mm/dd
	{
	$hari1=$this->hariLengkap($tgl1,$seperator);
	$hari2=$this->hariLengkap($tgl2,$seperator);
	if($tgl1==$tgl2){
		return $hari1;
	}else{
		return $hari1." ".$pemisah." ".$hari2;
	}

	}
	
	
	function jatuhTempo($tanggal,$seperator)
	{
	 	$day = date('D', strtotime($tanggal));
		$dayList = array(
    	'Sun' => 'Minggu',
    	'Mon' => 'Senin',
    	'Tue' => 'Selasa',
    	'Wed' => 'Rabu',
    	'Thu' => 'Kamis',
    	'Fri' => 'Jumat',
    	'Sat' => 'Sabtu'
		);
		return $dayList[$day].", ".$this->indTempo($tanggal,$seperator);
	}
	function bulan($bln)
	{
		if($bln==1){
		return "Januari";}
		elseif($bln==2){
		return "Februari";}
		elseif($bln==3){
		return "Maret";}
		elseif($bln==4){
		return "April";}
		elseif($bln==5){
		return "Mei";}
		elseif($bln==6){
		return "Juni";}
		elseif($bln==7){
		return "Juli";}
		elseif($bln==8){
		return "Agustus";}
		elseif($bln==9){
		return "September";}
		elseif($bln==10){
		return "Oktober";}
		elseif($bln==11){
		return "November";}
		elseif($bln==12){
		return "Desember";}
		
	}	
	function bulanThn($id) 
	{
	$data=explode("-",$id);
	$bln=$data[1];
	$thn=$data[0];
		if($bln==1){
		$dataBulan= "Januari";}
		elseif($bln==2){
		$dataBulan=  "Februari";}
		elseif($bln==3){
		$dataBulan=  "Maret";}
		elseif($bln==4){
		$dataBulan=  "April";}
		elseif($bln==5){
		$dataBulan=  "Mei";}
		elseif($bln==6){
		$dataBulan=  "Juni";}
		elseif($bln==7){
		$dataBulan=  "Juli";}
		elseif($bln==8){
		$dataBulan=  "Agustus";}
		elseif($bln==9){
		$dataBulan=  "September";}
		elseif($bln==10){
		$dataBulan=  "Oktober";}
		elseif($bln==11){
		$dataBulan=  "November";}
		elseif($bln==12){
		$dataBulan=  "Desember";}
		return $dataBulan."-".$thn;
		
	}
	function range_($tgl,$seperator)
	{
	//03/30/2016 - 03/31/2016
		$tglORI=explode(" - ",$tgl);
		$tgl1=$tglORI[0];//."-".$tglAwal[0]."-".$tglAwal[2];
		
		//$tglAkhir=explode("/",$tglORI[1]);
		$tgl2=$tglORI[1];//."-".$tglAkhir[0]."-".$tglAkhir[2];
	return $tgl1." ".$seperator." ".$tgl2;	
	}	
	
	function range($tgl,$seperator)
	{
	//03/30/2016 - 03/31/2016
		$tglORI=explode(" - ",$tgl);
		$tglAwal=explode("/",$tglORI[0]);
		$tgl1=$tglAwal[1]."-".$tglAwal[0]."-".$tglAwal[2];
		
		$tglAkhir=explode("/",$tglORI[1]);
		$tgl2=$tglAkhir[1]."-".$tglAkhir[0]."-".$tglAkhir[2];
	return $tgl1." ".$seperator." ".$tgl2;	
	}
	
	function minBulan($tgl,$min)
	{
	return date('Y-m-d', strtotime('$min month', strtotime($tgl)));
	}
	
	function range1($tgl)
	{
	//03/30/2016 - 03/31/2016
		$tglORI=explode(" - ",$tgl);
		$tglAwal=explode("/",$tglORI[0]);
		$tgl1=$tglAwal[2]."-".$tglAwal[0]."-".$tglAwal[1];
		return $tgl1;
	}
	
	function range2($tgl)
	{
	//03/30/2016 - 03/31/2016
		$tglORI=explode(" - ",$tgl);
		$tglAwal=explode("/",$tglORI[1]);
		$tgl2=$tglAwal[2]."-".$tglAwal[0]."-".$tglAwal[1];
		return $tgl2;
	}
	function range_1($tgl)
	{
	//03/30/2016 - 03/31/2016
		$tglORI=explode(" - ",$tgl);
		$tglAwal=explode("/",$tglORI[0]);
		$tgl1=$tglAwal[2]."-".$tglAwal[1]."-".$tglAwal[0];
		return $tgl1;
	}
	
	function range_2($tgl)
	{
	//03/30/2016 - 03/31/2016
		$tglORI=explode(" - ",$tgl);
		$tglAwal=explode("/",$tglORI[1]);
		$tgl2=$tglAwal[2]."-".$tglAwal[1]."-".$tglAwal[0];
		return $tgl2;
	}
	
	function tomorrow($tgl)
	{
	$tglORI=explode("/",$tgl);
	$tanggal=$tglORI[0];
	return	$tgl-1;//=$tglORI[0]."/".$tglORI[1]."/".$tglORI[2];
	}
	function tambahTgl($tgl,$day)
	{
	$todayDate = strtotime($tgl);// current date
	
	$now = strtotime(date("Y-m-d"));
	//Add one day to today
	$date = date('Y-m-d', strtotime('+'.$day.' day', $todayDate));
	return $date;
	}
	function minTgl($tgl,$day)
	{
	$todayDate = strtotime($tgl);// current date
	
	$now = strtotime(date("Y-m-d"));
	//Add one day to today
	$date = date('Y-m-d', strtotime('-'.$day.' day', $todayDate));
	return $date;
	}
	
}
?>
