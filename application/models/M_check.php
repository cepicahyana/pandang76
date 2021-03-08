<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_check extends ci_Model
{
	var $idevent=13;
	public function __construct() {
        parent::__construct();
	 
		$this->session->unset_userdata("date");
     	}
		
	 
	
	function jmlKolom($id)
	{
	$ids=$this->session->userdata("id");
	$this->db->where("id_admin",$ids);
	$this->db->where("id_data_form",$id);
	return $this->db->get("tm_formulir")->num_rows();
	}
	function not($id)
	{
	$ids=$this->session->userdata("id");
	$data=array("status"=>"0");
	$this->db->where("id_admin",$ids);
	$this->db->where("id_peserta",$id);
	return $this->db->update("data_peserta",$data);
	}
	
	function acc($id,$event)
	{
		$dataEvent=$this->dataEvent($event);
	//	$ps1=$this->Get_dataPeserta($event,"1");
	//	$ps2=$this->Get_dataPeserta($event,"2");
	//	$pt=$ps1+$ps2;
		
	$dataEvent=$this->dataEventID($event);
	$ids=$this->session->userdata("id");
	$data=array("status"=>"1");
	$this->db->where("id_admin",$ids);
	$this->db->where("id_peserta",$id);
	//	if($dataEvent->quota<=$pt) { return 3; 	}//
	return $this->db->update("data_peserta",$data);
	}function not2($id)
	{
	$ids=$this->session->userdata("id");
	$data=array("status2"=>"0");
	$this->db->where("id_admin",$ids);
	$this->db->where("id_peserta",$id);
	return $this->db->update("data_peserta",$data);
	}
	
	function acc2($id,$event)
	{
		$dataEvent=$this->dataEvent($event);
	//	$ps1=$this->Get_dataPeserta($event,"1");
	//	$ps2=$this->Get_dataPeserta($event,"2");
	//	$pt=$ps1+$ps2;
		
	$dataEvent=$this->dataEventID($event);
	$ids=$this->session->userdata("id");
	$data=array("status2"=>"1");
	$this->db->where("id_admin",$ids);
	$this->db->where("id_peserta",$id);
	//	if($dataEvent->quota<=$pt) { return 3; 	}//
	return $this->db->update("data_peserta",$data);
	}
	function getDataForm($id)
	{
	$ids=$this->session->userdata("id");
	$this->db->order_by("id_formulir","asc");
	$this->db->where("id_admin",$ids);
	$this->db->where("id_data_form",$id);
	return $this->db->get("tm_formulir")->result();
	}
	function namaForm($id)
	{
	$ids=$this->session->userdata("id");
	$this->db->where("id_admin",$ids);
	$this->db->where("id_form",$id);
	$data=$this->db->get("data_form")->row();
	return isset($data->nama_form)?($data->nama_form):"<i>form dihapus</i>";
	}
	function jmlInvoice()
	{
	$ids=$this->session->userdata("id");
	$this->db->where("id_admin",$ids);
	$this->db->where("status","belum");
	return $this->db->get("data_invoice")->num_rows();
	}
	function jmlPeserta($id,$status)
	{
	$ids=$this->session->userdata("id");
	$this->db->where("id_admin",$ids);
	$this->db->where("id_event",$id);
	$this->db->where("status",$status);
	return $this->db->get("data_peserta")->num_rows();
	}
	
	
	private function _cekLInkEvent($acak)
	{
	$ids=$this->session->userdata("id");
	$this->db->where("id_admin",$ids);
	$this->db->where("link",$acak);
	return $this->db->get("data_event")->num_rows();
	}
	
	private function _link()
	{
	$acak=substr(str_shuffle("1234567890"),0,5);
	$cek=$this->_cekLInkEvent($acak);
	if($cek)
	{
	return $acak+12;	
	}else{
	return $acak;
	}
	
	}
	
	 
	 
	function updateStatusPeserta($id,$date=1,$ke)
	{
	
	if($date==null){ $date=1; }
	
	if($ke=="1"){
		$data=array( 
		"cekin1"=>date("d-m-Y H:i:s"),
		"gate"=>$this->session->userdata("gate"),
		); 
		$this->db->where("barcode".$ke,$id);
	}
	
	if($ke=="2"){
		$data=array( 
		"cekin2"=>date("d-m-Y H:i:s"),
		"gate"=>$this->session->userdata("gate"),
		); 
		$this->db->where("barcode".$ke,$id);
	} 
	return $this->db->update("data_peserta",$data);
	}
	
	function updateStatusPesertaSuci($id)
	{
	
	 
		$data=array( 
		"cekin3"=>date("d-m-Y H:i:s") 
		); 
		$this->db->where("barcode3",$id);
	 
	return $this->db->update("data_peserta",$data);
	}function updateStatusPesertaAcara($id)
	{
	
	 
		$data=array( 
		"cekin"=>date("d-m-Y H:i:s") 
		); 
		$this->db->where("barcode",$id);
	 
	return $this->db->update("data_peserta_rangkaian",$data);
	}
	private function _getDataPeserta2($id)
	{
	$this->db->where("kode_registrasi",$id);
	$this->db->where("id_admin",$this->session->userdata("id"));
	return $get=$this->db->get("data_peserta")->row();
	}
	
	function updateStatusPeserta2($id,$date)
	{
	
	$isi=$this->_getDataPeserta2($id);
			$data=array(
			"id_admin"=>$this->session->userdata("id"),
			"data"=>$isi->data,
			"id_event"=>$isi->id_event,
			"tgl"=>$date." ".date('H:i:s'),
			"ip"=>$isi->ip,
			"kode_registrasi"=>$isi->kode_registrasi,
			"status"=>"2",
			"cekin"=>$date." ".date("H:i:s"),
			);
	return $this->db->insert("data_peserta",$data);
	}
	
	
	function updateStatusClassPeserta($id,$class,$date=null)
	{
	 if($date==null){ $date=date("Y-m-d"); }
	$data=array(
	"ket"=>$class,
	"cekin"=>date("d-m-Y H:i:s"),
	);
	
	 	$date=$this->session->userdata("date");
		if($date){
		$this->db->where("jenis",$date);
		}
	$this->db->where("jenis",$date);
	$this->db->where("kode_registrasi",$id);
	$this->db->where("id_admin",$this->session->userdata("id"));
	return $this->db->update("data_peserta",$data);
	}
	
	function updateStatusPbPeserta($id)
	{
	$date=$this->session->userdata("date");
		if($date){
		$this->db->where("jenis",$date);
		}
	$this->db->where("kode_registrasi",$id);
	$this->db->where("id_admin",$this->session->userdata("id"));
	$getMakan=$this->db->get("data_peserta")->row();
	$makan=$getMakan->pb;
	
	$data=array(
	"pb"=>$makan.",".date("Y-m-d H:i:s"),
	);
	$date=$this->session->userdata("date");
		if($date){
		$this->db->where("jenis",$date);
		}
	$this->db->where("kode_registrasi",$id);
	$this->db->where("id_admin",$this->session->userdata("id"));
	return $this->db->update("data_peserta",$data);
	}
	
	function updateStatusSvPeserta($id)
	{
	$date=$this->session->userdata("date");
		if($date){
		$this->db->where("jenis",$date);
		}
	$this->db->where("kode_registrasi",$id);
	$this->db->where("id_admin",$this->session->userdata("id"));
	$getMakan=$this->db->get("data_peserta")->row();
	$makan=$getMakan->sv;
	
	$data=array(
	"sv"=>$makan.",".date("Y-m-d H:i:s"),
	);
	$date=$this->session->userdata("date");
		if($date){
		$this->db->where("jenis",$date);
		}
	$this->db->where("kode_registrasi",$id);
	$this->db->where("id_admin",$this->session->userdata("id"));
	return $this->db->update("data_peserta",$data);
	}
	
	function updateStatusMakanPeserta($id)
	{
		$date=date("Y-m-d");
	 
		$this->db->where("jenis",$date);
		$this->db->where("kode_registrasi",$id);
	$this->db->where("id_admin",$this->session->userdata("id"));
	$getMakan=$this->db->get("data_peserta")->row();
	$makan=$getMakan->makan;
	
	$data=array(
	"makan"=>$makan.",".date("Y-m-d H:i:s"),
	);
	 
	 
		
	$this->db->where("jenis",$date);	 
	$this->db->where("kode_registrasi",$id);
	$this->db->where("id_admin",$this->session->userdata("id"));
	return $this->db->update("data_peserta",$data);
	}
	
	
	 
 
	function saveRegister($id)
	{
	
	 $dat=$this->db->query("SELECT SUBSTR(startdate,1,10) as startdate,SUBSTR(enddate,1,10) as enddate FROM data_event where id_event='".$id."'")->row();
	 $selisih=$this->tanggal->selisih($dat->startdate,$dat->enddate);
  
			 
		
	$uri=$id;
		$dataEvent=$this->dataEvent($id);
		$ps1=$this->Get_dataPeserta($id,"1");
		$ps2=$this->Get_dataPeserta($id,"2");
		$pt=$ps1+$ps2;
		
	
		$tglSkrg=date('Y-m-d H:i:s');
		//if($dataEvent->batas_registrasi>$tglSkrg){ return 4; }
		$date=$this->session->userdata("date");
	//	if(!$date){
	//	$date=date('Y-m-d');
	//	}
		if($this->input->post("barcode"))
		{
			$kodeIPsip=$this->input->post("barcode");
		}else{
			$kodeIPsip=substr(str_shuffle("123456789019"),0,12);
		}
		 
			for($i=0;$i<=$selisih;$i++)
			{
				$tgl = mktime(0, 0, 0, SUBSTR($dat->enddate,5,2), SUBSTR($dat->enddate,8,2)-$i, SUBSTR($dat->enddate,0,4));
				$tglE=date("Y-m-d", $tgl);
				$tgl=date("Y-m-d", $tgl);
				
				
				$data=$this->_uploadPhotoIn($id,$kodeIPsip);
				if($dataEvent->acc=="1"){ $acc="0";}else{ $acc="1";};
				$data=explode("::",$data);
				$jundangan=$this->input->post("undangan[]");
				foreach($jundangan as $val)
				{
					$datainsert=array(
					"id_admin"=>$this->session->userdata("id"),
					"data"=>$data[0],
					"id_event"=>$dataEvent->id_event,
					"tgl"=>$tgl." ".date('H:i:s'),
					//"cekin"=>$tgl." ".date('H:i:s'),
					"ip"=>$kodeIPsip,
					"kode_registrasi"=>$kodeIPsip,
					"j_makan"=>$this->input->post("makan"),
					"j_souvenir"=>$this->input->post("souvenir"),
					"j_pb"=>$this->input->post("photoboth"),
					"blok"=>$this->input->post("blok"),
					"no_kursi"=>$this->input->post("no_kursi"),
					"lembaga"=>$this->input->post("Instansi/Lembaga"),
					"nama"=>$this->input->post("Nama"),
					"kontak"=>$this->input->post("Kontak"),
					"berlaku"=>$this->input->post("berlaku"),
					"foto"=>$data[1],
					"status"=>"1",
					"jenis"=>$val,
					);	
						
					$cekdulu=$this->db->query("select * from data_peserta where jenis='".$val."' and kode_registrasi='".$kodeIPsip."' and substr(tgl,1,10)='".$tgl."' ")->num_rows();
					if(!$cekdulu)
					{
					 	 $this->m_reff->qr($kodeIPsip);
						 $this->db->insert("data_peserta",$datainsert);	
					} 
				}
				
				 
			}	
		return true;
		}
		
		 

	


 
 
	private function _maxID()
	{
	$data=$this->db->query("select MAX(id_event) as max from data_event where id_admin='".$this->session->userdata("id")."' ")->row();
	return $data->max;
	}
	
	
	
	
	
	
	function dataForm()
	{
	$this->db->order_by("nama_form","ASC");
	$this->db->where("id_admin",$this->session->userdata("id"));
	return $this->db->get("data_form")->result();
	}
	
	function get_open()
	{
		
		$query=$this->_get_datatables_open();
		if($_POST['length'] != -1)
		$query.=" limit ".$_POST['start'].",".$_POST['length'];
		return $this->db->query($query)->result();
	}
	 
 
	private function Get_dataPeserta($id,$status)
	{
	$this->db->where("id_admin",$this->session->userdata("id"));
	$this->db->where("id_event",$id);
	$this->db->where("status",$status);
	return $this->db->get("data_peserta")->num_rows();
	}
 
  
	function get_barcode()
	{
		
		$query=$this->_get_datatables_barcode();
		if($_POST['length'] != -1)
		$query.=" limit ".$_POST['start'].",".$_POST['length'];
		return $this->db->query($query)->result();
	}
	 
	
	function tglAwal($idevent)
	{
	$db=$this->db->query("SELECT DISTINCT(SUBSTR(tgl,1,10)) AS tgl FROM data_peserta WHERE id_event='".$idevent."' LIMIT 1")->row();
	return isset($db->tgl)?($db->tgl):date('Y-m-d');
	}
	
	private function _GetDataPeserta($id)
	{
	$this->db->where("id_admin",$this->session->userdata("id"));
	$this->db->where("id_event",$id);
		$date=$this->session->userdata("dates");
		if($date){
		$this->db->where("jenis",$date);
		}
		 
	return $this->db->get("data_peserta")->result();
	}
	
	 
	  
	
	function jmlBlok($jenis,$blok)
	{
		return $this->db->query("SELECT * from data_peserta where jenis='".$jenis."' and blok='".$blok."' and status='2' and kode_registrasi not like '%bebas%'   ")->num_rows();
	}
	function jmlBlokTotal($jenis,$blok)
	{
		return $this->db->query("SELECT * from data_peserta where jenis='".$jenis."' and blok='".$blok."' and kode_registrasi not like '%bebas%'  ")->num_rows();
	}
}

?>