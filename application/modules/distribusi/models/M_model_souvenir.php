<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_model_souvenir extends ci_Model
{
	 
	public function __construct() {
        parent::__construct();
		 
		 
     	}
		
			
		function get_souvenir()
	{
		
		$this->_get_datatables_souvenir();
		if($this->input->post("length")!=-1) 
		$this->db->limit($this->input->post("length"),$this->input->post("start"));
	 	return $this->db->get()->result();
	}
	private function _get_datatables_souvenir()
	{	$filter		=	"";
	
	 
	 	 
		$this->db->where("diterima_oleh IS NULL"); 
		$this->db->where("jadwal_distribusi IS NULL");
	  	
		
		if(isset($_POST['search']['value'])){
			$searchkey=$_POST['search']['value'];
			
				$owner=array(
				"nama"=>$searchkey, 
				"hp"=>$searchkey,
				"email"=>$searchkey,
				"instansi"=>$searchkey,
				"ket"=>$searchkey,
				);
				$this->db->group_start()
                        ->or_like($owner)
                ->group_end();
				 
			}
		
		$waktu=$this->input->post("waktu");
	 	if($waktu){
			//$query.=" AND jenis='".$waktu."' ";
			$this->db->where("jenis",$waktu);
		}
		$gate=$this->input->post("gate");
	 	if($gate){
			//$query.=" AND gate='".$gate."' ";
			$this->db->where("gate",$gate);
		}
		$cetak=$this->input->post("cetak");
	 	if($cetak){
			/////$query.=" AND cetak='".$cetak."' ";
			$this->db->where("cetak",$cetak);
		} 
		$nama_file=$this->input->post("nama_file");
	 	if($nama_file){
			//$query.=" AND nama_file='".$nama_file."' ";
			$this->db->where("nama_file",$nama_file);
		} 
		
		$status=$this->input->post("status");
		if($status!=null){
			//$query.=" AND status='".$status."' ";
			$this->db->where("status",$status);
		}
		
		 
		
		$instansi=$this->input->post("instansi");
		if($instansi){
			//$query.=" AND instansi='".$instansi."' ";
				$this->db->where("instansi",$instansi);
		}
		 
		
	 
			$this->db->order_by("id","asc");
			$query=$this->db->from("data_persus");
		return $query;
	
	}
	
	public function count_file_souvenir()
	{		
		
		 $this->_get_datatables_souvenir();
		return $this->db->get()->num_rows();
	}
	 
	
	/*--------------------------------------------------*/	
		function get_peserta()
	{
		
		$this->_get_datatables_peserta();
		if($this->input->post("length")!=-1) 
		$this->db->limit($this->input->post("length"),$this->input->post("start"));
	 	return $this->db->get()->result();
	}
	private function _get_datatables_peserta()
	{	$filter		=	"";
	
		$jenis_acara	=	$this->input->get_post("jenis_acara");
		$dispo			=	$this->input->get_post("dispo");
		$distri			=	$this->input->get_post("distri");
		$prov			=	 $this->input->get_post("prov");
		$kab			=	$this->input->get_post("kab");
		
		if($jenis_acara){ 
			$this->db->where("(jenis_acara='".$jenis_acara."' or jenis_acara=3)");
		}
		if($dispo==1){ 
			$this->db->where("(blok1 IS NOT NULL or blok2 IS NOT NULL)");
		}elseif($dispo==2){
		 
			$this->db->where("(blok1 IS NULL and blok2 IS NULL)");
		}
		$this->db->where("diterima_oleh IS NULL");
		 
	
		if($prov){
		//	$filter.=" AND id_provinsi='".$prov."' ";
			$this->db->where("id_provinsi",$prov);
		}
		if($kab){
			//$filter.=" AND id_kota='".$kab."' ";
			$this->db->where("id_kota",$kab);
		}
		
		//$query="select * from data_persus where   id_kategory='1'  and (sts_acc=2 or sts_suci=1) and jadwal_distribusi is null and sts_verifikasi=2  ".$filter;
		$this->db->where("sts_verifikasi",2);
		$this->db->where("jadwal_distribusi IS NULL");
		$this->db->where("(sts_acc=2 or sts_suci=1)");
		$this->db->where("id_kategory",1);
		
		
		
		if(isset($_POST['search']['value'])){
			$searchkey=$_POST['search']['value'];
			
				$owner=array(
				"nama"=>$searchkey,
				"nik"=>$searchkey,
				"kk"=>$searchkey,
				"hp"=>$searchkey,
				"email"=>$searchkey,
				"instansi"=>$searchkey,
				"ket"=>$searchkey,
				);
				$this->db->group_start()
                        ->or_like($owner)
                ->group_end();
				 
			}
		
		$waktu=$this->input->post("waktu");
	 	if($waktu){
			//$query.=" AND jenis='".$waktu."' ";
			$this->db->where("jenis",$waktu);
		}
		$gate=$this->input->post("gate");
	 	if($gate){
			//$query.=" AND gate='".$gate."' ";
			$this->db->where("gate",$gate);
		}
		$cetak=$this->input->post("cetak");
	 	if($cetak){
			/////$query.=" AND cetak='".$cetak."' ";
			$this->db->where("cetak",$cetak);
		} 
		$nama_file=$this->input->post("nama_file");
	 	if($nama_file){
			//$query.=" AND nama_file='".$nama_file."' ";
			$this->db->where("nama_file",$nama_file);
		} 
		
		$status=$this->input->post("status");
		if($status!=null){
			//$query.=" AND status='".$status."' ";
			$this->db->where("status",$status);
		}
		
		$blok=$this->input->post("blok");
		if($blok){
			//////$query.=" AND blok='".$blok."' ";
			$this->db->where("blok",$blok);
		}
		
		$pic=$this->input->post("pic");
		if($pic){
			////$query.=" AND pic='".$pic."' ";
			$this->db->where("pic",$pic);
		}
		
		$instansi=$this->input->post("instansi");
		if($instansi){
			//$query.=" AND instansi='".$instansi."' ";
				$this->db->where("instansi",$instansi);
		}
		$cadangan=$this->input->post("cadangan");
		if($cadangan==1){
			//$query.=" AND kode_registrasi LIKE '%bebas%' ";
				$this->db->like("kode_registrasi",'bebas');
		}elseif($cadangan==2)
		{
			///$query.=" AND kode_registrasi NOT LIKE '%bebas%' ";
			$this->db->not_like("kode_registrasi",'bebas');
		} 
		
		
		
		/*$no_surat=$this->input->post("no_surat");
		if($no_surat){
			$danon="";
			foreach($no_surat as $non)
			{
				$danon.="'".$non."',";
			}
			$danon=substr($danon,0,-1);
			//$query.=" AND no_surat in(".$danon.")";
			$this->db->where_in("no_surat",);
		}*/
		
	 

	 
			//$query.="group by id asc" ;
			$this->db->order_by("id","asc");
			$query=$this->db->from("data_persus");
		return $query;
	
	}
	
	public function count_file_peserta($tabel)
	{		
		
		 $this->_get_datatables_peserta();
		return $this->db->get()->num_rows();
	}
	 
	
	/*--------------------------------------------------*/
	function get_persus()
	{
		
		$query=$this->_get_datatables_persus();
		if($this->input->post("length") != -1)
		$query.=" limit ".$this->input->post("start").",".$this->input->post("length");
		return $this->db->query($query)->result();
	}
	private function _get_datatables_persus()
	{	$filter		=	"";
	
		$jenis_permohonan	=	$this->input->get_post("jenis_permohonan");
		$dispo				=	$this->input->get_post("dispo");
		$distri				=	$this->input->get_post("distri");
		 
		if($jenis_permohonan){
			 
			$filter.=" AND jenis_permohonan='".$jenis_permohonan."'  ";
		}
		if($dispo){
			$filter.=" AND sts_dispo='".$dispo."' ";
		}
		
		if($distri==1){
			$filter.=" AND diterima_oleh IS NOT NULL ";
		}elseif($distri==2){
			$filter.=" AND diterima_oleh IS NULL ";
		} 
		 
		
		$query="select * from data_persus where 1=1  ".$filter;
	
		 if(isset($_POST['search']['value'])){
			$searchkey=$_POST['search']['value'];
				$query.=" AND (
				nama LIKE '%".$searchkey."%'  or
				nik LIKE '%".$searchkey."%'  or
				hp LIKE '%".$searchkey."%'  or
				email LIKE '%".$searchkey."%'  or
				instansi LIKE '%".$searchkey."%'  or 
				ket LIKE '%".$searchkey."%'  
				) ";
			}
		
		$waktu=$this->input->post("waktu");
	 	if($waktu){
			$query.=" AND jenis='".$waktu."' ";
		}
		$gate=$this->input->post("gate");
	 	if($gate){
			$query.=" AND gate='".$gate."' ";
		}
		$cetak=$this->input->post("cetak");
	 	if($cetak){
			$query.=" AND cetak='".$cetak."' ";
		} 
		$nama_file=$this->input->post("nama_file");
	 	if($nama_file){
			$query.=" AND nama_file='".$nama_file."' ";
		} 
		
		$status=$this->input->post("status");
		if($status!=null){
			$query.=" AND status='".$status."' ";
		}
		
		$blok=$this->input->post("blok");
		if($blok){
			$query.=" AND blok='".$blok."' ";
		}
		
		$pic=$this->input->post("pic");
		if($pic){
			$query.=" AND pic='".$pic."' ";
		}
		
		$instansi=$this->input->post("instansi");
		if($instansi){
			$query.=" AND instansi='".$instansi."' ";
		}
		$cadangan=$this->input->post("cadangan");
		if($cadangan==1){
			$query.=" AND kode_registrasi LIKE '%bebas%' ";
		}elseif($cadangan==2)
		{
			$query.=" AND kode_registrasi NOT LIKE '%bebas%' ";
		} 
		
		
		
		$no_surat=$this->input->post("no_surat");
		if($no_surat){
			$danon="";
			foreach($no_surat as $non)
			{
				$danon.="'".$non."',";
			}
			$danon=substr($danon,0,-1);
			$query.=" AND no_surat in(".$danon.")";
		}
		
		if(isset($_POST['search']['value'])){
			$searchkey=$_POST['search']['value'];
				$query.=" AND (
				nama LIKE '%".$searchkey."%'  or
				nik LIKE '%".$searchkey."%'  or
				hp LIKE '%".$searchkey."%'  or
				email LIKE '%".$searchkey."%'  or
				instansi LIKE '%".$searchkey."%'  or 
				ket LIKE '%".$searchkey."%'  
				) ";
			}

	 
			$query.="group by id asc" ;
		return $query;
	
	}
	
	public function count_file_persus($tabel)
	{		
		
		$q=$this->_get_datatables_persus();
		return $this->db->query($q)->num_rows();
	}
	 
	
	 
	function idu()
	{
		$this->session->userdata("id");
	}
	
	 
	function jmlDistribusi($tgl)
	{
	//	$this->db->where("diterima_oleh IS NOT NULL");
		$this->db->where("jadwal_distribusi",$tgl);
		return $this->db->get("data_persus")->num_rows();
	}
	function setDistribusi()
	{
		$id				=	$this->input->get_post("id");//id
		$tgl			=	$this->input->get_post("tgl");
		$tgl			=	explode(",",$tgl);
		$tgl			=	trim($tgl[1]);
		$tgl			=	$this->tanggal->eng_($tgl,"-");
		$id_pemohon		=	$this->m_reff->clearkomaray($id); 
		return $this->kirimEmail($tgl,$id_pemohon);
	}	
	
	function setDistribusiSouvenir()
	{
		$id				=	$this->input->get_post("id");//id
		$opsi			=	$this->input->get_post("opsi");
		$tgl			=	$this->input->get_post("tgl");
		$tgl			=	explode(",",$tgl);
		$tgl			=	trim($tgl[1]);
		$tgl			=	$this->tanggal->eng_($tgl,"-");
		$id_pemohon		=	$this->m_reff->clearkomaray($id); 
		return $this->kirimEmailSouvenir($tgl,$id_pemohon,$opsi);
	}
	
	function kirimEmail($tgl,$id_pemohon)
	{	 $var["ok"]=0;
		 $var["gagal"]=0;
		 $var["dgagal"]="";
		 $id     =   $this->input->get_post("id"); 
         $data   =   $this->m_reff->clearkomaray($id);
		 $ok=0;$gagal=0;$dgagal="";
        foreach($id_pemohon as $val)
        {    
                        $this->db->where("id",$val);
                        $this->db->where("(sts_acc=2 or sts_suci=1)");
						$this->db->where("jadwal_distribusi IS NULL");
                        $this->db->where("diterima_oleh IS NULL"); 
            $data    =  $this->db->get("data_persus")->row();
        if($data){   
            
            $to     =   $data->email; 
            $isi    =   $this->isiEMail($data,$tgl);
            $subject=   "Bukti Pengambilan Undangan"; 
            
            $phone  =   $data->hp;
            $path   =   $this->mdl->genUndangan($data,$tgl); 
            $isiWa  =   $this->isiWa($data,$tgl); 
                        
            $isiSms =   $this->isiSms($tgl);
                      
			$sts    =   $this->m_reff->kirimEmail($to,$subject,$isi,$path,"Bukti Pengambilan Undangan HUT RI-".$this->m_reff->tm_pengaturan(31).".pdf","delete");   
    		
			if($sts["sts"]=="ok"){
						$this->m_reff->kirimSms($phone,$isiSms);
						$this->m_reff->kirimWa($phone,$isiWa);
                    //    $this->m_reff->kirimWa($phone,"Bukti Pengambilan Undangan",base_url().$path); 
						
				$this->db->set("sts_notif",1); 
				$this->db->set("jadwal_distribusi",$tgl);
				$this->db->where("diterima_tgl",null);
				$this->db->where("email",$data->email);
				$this->db->where("id",$val);
			 	$this->db->update("data_persus");
				$ok++;
			}else{
				$gagal++;
				$dgagal.=$data->email."<br>";
			}
			
			
        }//end if	
			
        }
		 $var["ok"]=$ok;
		 $var["gagal"]=$gagal;
		 $var["dgagal"]=$dgagal;
		return $var;
	}
	
	
	function kirimEmailSouvenir($tgl,$id_pemohon,$opsi)
	{	 $var["ok"]=0;
		 $var["gagal"]=0;
		 $var["dgagal"]="";
		 $id     =   $this->input->get_post("id"); 
         $data   =   $this->m_reff->clearkomaray($id);
		 $ok=0;$gagal=0;$dgagal="";
        foreach($id_pemohon as $val)
        {    
                        $this->db->where("id",$val); 
						$this->db->where("jadwal_distribusi IS NULL");
                        $this->db->where("diterima_oleh IS NULL"); 
            $data    =  $this->db->get("data_persus")->row();
        if($data){   
            
		if($opsi!=2){	
											$to     =   $data->email; 
											$isi    =   $this->isiEMailSouvenir($data,$tgl);
											$subject=   "Bukti Pengambilan Souvenir"; 
											
											$phone  =   $data->hp;
											$path   =   null;//$this->mdl->genUndanganSouvenir($data,$tgl); 
											$isiWa  =   $this->isiWaSouvenir($data,$tgl); 
														
										   // $isiSms =   $this->isiSmsSouvenir($tgl);
													  
											$sts    =   $this->m_reff->kirimEmail($to,$subject,$isi,$path,"","");   
											
											if($sts["sts"]=="ok"){
													//	$this->m_reff->kirimSms($phone,$isiSms);
														$this->m_reff->kirimWa($phone,$isiWa);
													   /// $this->m_reff->kirimWa($phone,"Bukti Pengambilan souvenir",base_url().$path); 
														
												 
												$this->db->set("jadwal_distribusi",$tgl);
												$this->db->where("diterima_tgl",null);
												$this->db->where("jadwal_distribusi",null);
												$this->db->where("id",$val);
												$this->db->update("data_persus");
												$ok++;
											}else{
												$gagal++;
												$dgagal.=$data->email."<br>";
											}
		}else{ 
												$this->db->set("jadwal_distribusi",$tgl);
												$this->db->where("diterima_tgl",null);
												$this->db->where("jadwal_distribusi",null);
												$this->db->where("id",$val);
												$this->db->update("data_persus"); 
												$var["opsi"]=$opsi;
		
		}
			
        }//end if cek ketersediaan data	
			
        }
		 $var["ok"]=$ok;
		 $var["gagal"]=$gagal;
		 $var["dgagal"]=$dgagal;
		return $var;
	}
		function genUndangan($data,$tgl)
	{
		ob_start();
		$phone  =   $data->id;
		$nik 	=   $data->nik;
		//include('file.html');
	    $data_v["val"]=$data;
	    $data_v["tgl"]=$tgl; 
		$isi=$this->load->view('genUndangan',$data_v); 
		
		$isi = ob_get_clean();

		require_once('assets/html2pdf/html2pdf.class.php');
		try{
		 $html2pdf = new HTML2PDF('P',array("110","190"), 'en', true, '', array(0,0,0,0));
		 $html2pdf->writeHTML($isi, isset($_GET['vuehtml']));
	//  $html2pdf->AddFont('monotypecorsiva', 'bold', 'monotypecorsiva.php'); 
		 $html2pdf->Output($this->m_reff->tm_pengaturan(37).'/pdf/'.$phone.'.pdf', 'F');
		}
		catch(HTML2PDF_exception $e){
		 echo $e;
		 exit;
		}
	    
       return realpath($this->m_reff->tm_pengaturan(37)."/pdf/".$phone.".pdf");
	}
	 
	 
	 function isiEMail($data,$tgl)
    {
        
        $nik         =   $data->nik;
		$this->m_reff->qr($nik);
        $nama        =   $data->nama;
        $email       =   $data->email;
        $instansi     =   $data->instansi;
        $tgl_ambil   =   $this->tanggal->hariLengkap($tgl,"/");
        $this->m_reff->qr($nik);
        
        $blok_pagi  =   $data->blok1;
        $blok_sore  =   $data->blok2;
		$blok_pagi_="";
		$blok_sore_="";
		$suci_	   ="";
		
		if($blok_pagi)
		{
			$blok_pagi_='<span style="font-size:13px;line-height:16px; color:black"> Acara Penaikan Bendera : Blok '.$this->m_reff->goField("tr_blok","nama","where id='".$blok_pagi."'").'</span> <br> ';
		}
		if($blok_sore)
		{
			$blok_sore_='<span style="font-size:13px;line-height:16px; color:black"> Acara Penurunan Bendera : Blok '.$this->m_reff->goField("tr_blok","nama","where id='".$blok_sore."'").'</span> <br>';
		}
        if($data->sts_suci==1 and $data->r_suci==1)
		{
			$suci_=' Undangan Acara Renungan Suci ';
		}
    return    $isi='
    <table style="max-width:400px" cellpadding=0 cellspacing=0>
    <tr>
    <td colspan="2" style="background-color:#EEE;">
    <img  style="border-top-left-radius:15px;border-top-right-radius:15px" src="'.$this->m_reff->tm_pengaturan(35).'/plug/img/banner2.jpg" width="100%"   alt="E-receipt"  class="CToWUd a6T" tabindex="0"><div class="a6S" dir="ltr" style="opacity: 1; left: 745px; top: 101px;"><div id=":rt" class="T-I J-J5-Ji aQv T-I-ax7 L3 a5q" role="button" tabindex="0" aria-label="Download lampiran " data-tooltip-class="a1V" data-tooltip="Download"><div class="aSK J-J5-Ji aYr"></div></div></div>
     <center>
     <span style="font-size:16"><b> BUKTI PENGAMBILAN UNDANGAN<br> HUT RI-75</b></span>
     <hr width="90%">
     </center>
      </td>
    </tr>
    <tr>
    <td align="left" valign="top" style="background-color:#EEE;padding:10px"> 
     <span style="font-size:11px;color:#9e9e9e;line-height:16px">Nama Pemohon :</span><br>
      <span style="font-size:13px;line-height:16px;font-weight:bold;color:black">'.$nama.'</span> <br>
      
      <span style="font-size:11px;color:#9e9e9e;line-height:16px">NIK / nomor identitas :</span><br>
      <span style="font-size:13px;line-height:16px;font-weight:bold;color:black">'.$nik.'</span> <br>
      
   
     <br>
        <b style="font-size:12px;font-weight:bold;color:teal;"> PEROLEHAN UNDANGAN</b><br>
      
      '.$blok_pagi_.'
      '.$blok_sore_.'
      '.$suci_.'
    
      
     
     
    </td> <td style="background-color:#EEE"> 
                 
                  <img src="'.$this->konversi->img(realpath($this->m_reff->tm_pengaturan(37)."/qr/".$nik.".png")).'" width="80px"><br>
                
    </td>
    </tr>
    <tr>
    <td colspan="2"  style="background-color:#EEE;padding:10px"> 
   <div>  <b style="font-size:12px;font-weight:bold;color:teal;"> INFORMASI PENGAMBILAN UNDANGAN</b><br> 
     <span style="font-size:13px;color:black;line-height:16px"> - Undangan dapat diambil pada :<br>hari   '.$tgl_ambil.' pukul 08.30 - 16.00 WIB </span><br>
      <span style="font-size:13px;color:black;line-height:16px">Alamat  :   Kantor Sekretariat Negara <br>
      Jl. Veteran No.17-18, RT.2/RW.3, Gambir, Kecamatan Gambir, Kota Jakarta Pusat.
      </span><br>
    <span style="font-size:13px;color:black;line-height:16px"> - Membawa KTP Asli atau tanda pengenal yang didaftarkan. </span><br>
        <span style="font-size:13px;color:black;line-height:16px"> - Menunjukan email ini saat pengambilan. </span><br>
        <span style="font-size:13px;color:black;line-height:16px"> - Jika Undangan tidak diambil  lebih dari 3 hari dari tanggal pengambilan maka otomatis dibatalkan. </span><br>
        
        </div>
    </td>
    </tr>
    </table>
    
    
    ';
        
    }
    
     function isiEMailSouvenir($data,$tgl)
    {
        
        $kode         =   $data->kode;
		$this->m_reff->qr($kode);
        $nama        =   $data->nama;
        $email       =   $data->email;
        $hp		     =   $data->hp;
        $instansi    =   $data->instansi;
        $tgl_ambil   =   $this->tanggal->hariLengkap($tgl,"/");
         
        $pagi		  	=   $data->jml_pagi;
        $sore		  	=   $data->jml_sore;
		$vvip		  	=   $data->souvenir_1;
		$vip		  	=   $data->souvenir_2;
        $umum		  	=   $data->souvenir_3;
		$und			=	"";
		
		$isi_info		=	"";
		$template		=	$this->m_reff->tm_pengaturan(40);
		$template		=	str_replace("{tgl_ambil}",$tgl_ambil,$template);
		 
		if($pagi)
		{
			$und.='<span style="font-size:13px;line-height:16px; color:black"> '.$pagi.' Undangan Penaikan Bendera </span> <br> ';
		}
		if($sore)
		{
			$und.='<span style="font-size:13px;line-height:16px; color:black"> '.$sore.' Undangan Penurunan Bendera  </span> <br>';
		}
		if($vvip)
		{
			$und.='<span style="font-size:13px;line-height:16px; color:black">'.$vvip.'   Souvenir VVIP  </span> <br>';
		}if($vip)
		{
			$und.='<span style="font-size:13px;line-height:16px; color:black"> '.$vip.'   Souvenir VIP  </span> <br>';
		}if($umum)
		{
			$und.='<span style="font-size:13px;line-height:16px; color:black"> '.$umum.'   Souvenir UMUM  </span> <br>';
		}
        
    return    $isi='
    <table style="max-width:400px" cellpadding=0 cellspacing=0>
    <tr>
    <td colspan="2" style="background-color:#EEE;">
    <img  style="border-top-left-radius:15px;border-top-right-radius:15px" src="'.$this->m_reff->tm_pengaturan(35).'/plug/img/banner2.jpg" width="100%"   alt="E-receipt"  class="CToWUd a6T" tabindex="0"><div class="a6S" dir="ltr" style="opacity: 1; left: 745px; top: 101px;"><div id=":rt" class="T-I J-J5-Ji aQv T-I-ax7 L3 a5q" role="button" tabindex="0" aria-label="Download lampiran " data-tooltip-class="a1V" data-tooltip="Download"><div class="aSK J-J5-Ji aYr"></div></div></div>
     <center>
     <span style="font-size:16"><b> BUKTI PENGAMBILAN SOUVENIR<br> HUT RI-'.$this->m_reff->tm_pengaturan(31).'</b></span>
     <hr width="90%">
     </center>
      </td>
    </tr>
    <tr>
    <td align="left" valign="top" style="background-color:#EEE;padding:10px"> 
     <span style="font-size:11px;color:#9e9e9e;line-height:16px">Nama :</span><br>
      <span style="font-size:13px;line-height:16px;font-weight:bold;color:black">'.$nama.'</span> <br>
      
      <span style="font-size:11px;color:#9e9e9e;line-height:16px">Email :</span><br>
      <span style="font-size:13px;line-height:16px;font-weight:bold;color:black">'.$email.'</span> <br>
	  
      <span style="font-size:11px;color:#9e9e9e;line-height:16px">Hp :</span><br>
      <span style="font-size:13px;line-height:16px;font-weight:bold;color:black">'.$hp.'</span> <br>
	  
	  <span style="font-size:11px;color:#9e9e9e;line-height:16px">Kode Registrasi :</span><br>
      <span style="font-size:13px;line-height:16px;font-weight:bold;color:black">'.$kode.'</span> <br>
       
     <br>
        <b style="font-size:12px;font-weight:bold;color:teal;"> PEROLEHAN </b><br>
      
      '.$und.'
       
    </td> <td style="background-color:#EEE"> 
                 
                  <img src="'.$this->konversi->img(realpath($this->m_reff->tm_pengaturan(37)."/qr/".$kode.".png")).'" width="80px"><br>
                
    </td>
    </tr>
    <tr>
    <td colspan="2"  style="background-color:#EEE;padding:10px"> 
	
	<div>  
	<b style="font-size:12px;font-weight:bold;color:teal;"> INFORMASI PENGAMBILAN SOUVENIR</b><br> 
	<span style="font-size:13px;color:black;line-height:16px"> '.$template.' </span>
	</div> 
   
   </td>
    </tr>
    </table>
    
    
    ';
        
    }
    
    
     function isiWa($data,$tgl)
    {
        
        $nik         =   $data->nik;
		$this->m_reff->qr($nik);
        $nama        =   $data->nama;
        $email       =   $data->email;
        $instansi     =   $data->instansi;
        $tgl_ambil   =   $this->tanggal->hariLengkap($tgl,"/");
        $this->m_reff->qr($nik);
        
        $blok_pagi  =   $data->blok1;
        $blok_sore  =   $data->blok2;
		$blok_pagi_="";
		$blok_sore_="";
		$suci_	   ="";
		
		$acara_penaikan		=	"";
		$acara_penurunan	=	"";
		$acara_renungan		=	"";
		$pos1="";
		$pos2="";
		$pos3="";
		if($blok_pagi)
		{
			$blok_pagi_			=	' - Acara Penaikan Bendera : Blok '.$this->m_reff->goField("tr_blok","nama","where id='".$blok_pagi."'");
			$acara_penaikan		=	$blok_pagi_;
			$pos1				=	$acara_penaikan;
		}
		if($blok_sore)
		{
			$blok_sore_				=	' - Acara Penurunan Bendera : Blok '.$this->m_reff->goField("tr_blok","nama","where id='".$blok_sore."'");
			$acara_penurunan		=	$blok_sore_;
			$pos2					=	$acara_penurunan;
		}
		if($data->r_suci==1 and $data->sts_suci==1)
		{
			$suci_				=	' - Acara Renungan Suci ';
			$acara_renungan		=	$suci_;
			$pos3				=	$acara_renungan;
		}
		
		 if(!$pos1)
		 {	
			 if(!$pos2)
				{
					$pos1=$acara_renungan;
					$pos2="";
					$pos3="";
				}else{
						$pos1=$acara_penurunan;
						if($pos3)
						{
							$pos2=$acara_renungan;
							$pos3="";
						}else{
							$pos2="";
							$pos3="";
						}
				}
		 }else{
			$pos1=$acara_penaikan; 
			if(!$pos2)
			{
				$pos2=$acara_renungan;
				$pos3="";
			}else{
				$pos2=$acara_penurunan;
						if($pos3)
						{
							$pos3=$acara_renungan;
						}else{
							$pos3="";
						}
			}
		 }
		
		
		$perolehan_undangan=$blok_pagi_.$blok_sore_.$suci_;
 
		$icon2="📍";
		$icon1="🏛";
	 
        $isi=$this->m_reff->tm_pengaturan(7);
        $isi=str_replace('{nama}',$nama,$isi);
        $isi=str_replace('{nik}',$nik,$isi);
        $isi=str_replace('{acara_penaikan}',$pos1,$isi);
        $isi=str_replace('{acara_penurunan}',$pos2,$isi);
        $isi=str_replace('{acara_renungan}',$pos3,$isi);
        $isi=str_replace('{waktu_pengambilan}',$tgl_ambil,$isi); 
        $isi=str_replace('{icon2}',$icon2,$isi);
        $isi=str_replace('{icon1}',$icon1,$isi);
        return $isi;
    }
	
	
     function isiWaSouvenir($data,$tgl)
    {
        
        $kode        =   $data->kode;
		$this->m_reff->qr($kode);
        $nama        =   $data->nama;
        $email       =   $data->email;
        $hp      	 =   $data->hp;
        $instansi    =   $data->instansi;
        $tgl_ambil   =   $this->tanggal->hariLengkap($tgl,"/");
        $this->m_reff->qr($kode);
        
        $blok_pagi  =   $data->jml_pagi;
        $blok_sore  =   $data->jml_sore;
	 
		$vvip	   =	 $data->souvenir_1;
		$vip	   =	 $data->souvenir_2;
		$umum	   =	 $data->souvenir_3;
		
		
		$pos1="";
		$pos2="";
		$pos3="";
		$pos4="";
		$pos5="";
		$pos6="";
		$perolehan	=		"";
		if($blok_pagi)
		{
				$perolehan.=	' - Acara Penaikan Bendera : '.$blok_pagi."\n";
			 
		}
		if($blok_sore)
		{
			$perolehan.=	' - Acara Penurunan Bendera : '.$blok_sore."\n";
		 
		}
		if($vvip)
		{
			$perolehan.=	' - Souvenir VVIP : '.$vvip."\n";
		 
		}
		if($vip)
		{
			$perolehan.=	' - Souvenir VIP : '.$vip."\n"; 
		 
		}if($umum)
		{
			$perolehan.=	' - Souvenir UMUM : '.$umum."\n"; 
		 
		}
		 
		 
		 
		$icon2="📍";
		$icon1="🏛";
	 
        $isi=$this->m_reff->tm_pengaturan(41);
        $isi=str_replace('{perolehan}',$perolehan,$isi);
        $isi=str_replace('{nama}',$nama,$isi);
        $isi=str_replace('{email}',$email,$isi);
        $isi=str_replace('{hp}',$hp,$isi);
      //  $isi=str_replace('{acara_penaikan}',$pos1,$isi);
      //  $isi=str_replace('{acara_penurunan}',$pos2,$isi);
      //  $isi=str_replace('{vvip}',$pos3,$isi);
      //  $isi=str_replace('{vip}',$pos4,$isi);
      //  $isi=str_replace('{umum}',$pos5,$isi);
        $isi=str_replace('{kode}',$kode,$isi);
        $isi=str_replace('{waktu_pengambilan}',$tgl_ambil,$isi); 
        $isi=str_replace('{icon2}',$icon2,$isi);
        $isi=str_replace('{icon1}',$icon1,$isi);
        return $isi;
    }
	
	
	 function isiSms($tgl_ambil)
    {   $tgl_ambil  =   $this->tanggal->hariLengkap($tgl_ambil,"/");
        $isi=$this->m_reff->tm_pengaturan(9); 
        $isi=str_replace('{waktu_pengambilan}',$tgl_ambil,$isi);  
        return $isi;
    } 
	
	function isiSmsSouvenir($tgl_ambil)
    {   $tgl_ambil  =   $this->tanggal->hariLengkap($tgl_ambil,"/");
        $isi=$this->m_reff->tm_pengaturan(42); 
        $isi=str_replace('{waktu_pengambilan}',$tgl_ambil,$isi);  
        return $isi;
    }
	
}

?>