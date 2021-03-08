<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registrasi extends MY_Controller {

	

	function __construct()
	{
		parent::__construct();	
		$this->m_konfig->validasi_session(array("user","registrasi"));
		$this->load->model("model","mdl");
			$this->load->library('email');
		date_default_timezone_set('Asia/Jakarta');
	}
	function kirim_notif($nik)
	{
	    echo $this->mdl->kirim_notif($nik);
	}
	function _template($data)
	{
	$this->load->view('temp_user/main',$data);	
	}
	function save_set()
	{
		echo $this->mdl->save_set();
	}
	function noSurat()
	{
		echo $this->mdl->noSurat();
	}function setDeputi()
	{
		echo $this->mdl->setDeputi();
	}function isi_undangan()
	{
		echo $this->mdl->isi_undangan();
	}function lampiran2()
	{
		echo $this->mdl->lampiran2();
	}
	public function dsh()
	{
		$ajax=$this->input->get_post("ajax");
		if($ajax=="yes")
		{
			echo	$this->load->view("dsh");
		}else{
			$data['konten']="dsh";
			$this->_template($data);
		}
		
	} public function index()
	{	$this->persus();
		/*$ajax=$this->input->get_post("ajax");
		if($ajax=="yes")
		{
			echo	$this->load->view("br");
		}else{
			$data['konten']="br";
			$this->_template($data);
		}*/
		
	} public function persus_souvenir()
	{
		$model	=	$this->m_reff->tm_pengaturan(39);
		if($model==1){
			redirect("registrasi/persus");
		}
		
		$ajax=$this->input->get_post("ajax");
		if($ajax=="yes")
		{
			echo	$this->load->view("persus_souvenir");
		}else{
			$data['konten']="persus_souvenir";
			$this->_template($data);
		}
		
	} public function persus()
	{
		$model	=	$this->m_reff->tm_pengaturan(39);
		if($model==2){
			redirect("registrasi/persus_souvenir");
		}
		$ajax=$this->input->get_post("ajax");
		if($ajax=="yes")
		{
			echo	$this->load->view("persus");
		}else{
			$data['konten']="persus";
			$this->_template($data);
		}
		
	} public function import()
	{
		$model	=	$this->m_reff->tm_pengaturan(39);
		if($model==2){
			redirect("registrasi/import_souvenir");
		}
		
		$ajax=$this->input->get_post("ajax");
		if($ajax=="yes")
		{
			echo	$this->load->view("import");
		}else{
			$data['konten']="import";
			$this->_template($data);
		}
		
	}  public function import_souvenir()
	{
		$model	=	$this->m_reff->tm_pengaturan(39);
		if($model==1){
			redirect("registrasi/import");
		}
		
		$ajax=$this->input->get_post("ajax");
		if($ajax=="yes")
		{
			echo	$this->load->view("import_souvenir");
		}else{
			$data['konten']="import_souvenir";
			$this->_template($data);
		}
		
	} public function set()
	{
		$ajax=$this->input->get_post("ajax");
		if($ajax=="yes")
		{
			echo	$this->load->view("set");
		}else{
			$data['konten']="set";
			$this->_template($data);
		}
		
	} 
	public function grafik()
	{
		$ajax=$this->input->get_post("ajax");
		if($ajax=="yes")
		{
			echo	$this->load->view("grafik");
		}else{
			$data['konten']="grafik";
			$this->_template($data);
		}
		
	} public function br()
	{
		$ajax=$this->input->get_post("ajax");
		if($ajax=="yes")
		{
			echo	$this->load->view("br");
		}else{
			$data['konten']="br";
			$this->_template($data);
		}
		
	} 
	function getDataAcara()
	{	$query_data="";
		$s=$this->input->get_post("search");
		if($s)
		{	$query_data[]=["id"=>$s,"text"=>$s]; 
			$this->db->like("acara",$s); 
		}
		$query_data[]=["id"=>"peresmian/pembukaan","text"=>"Peresmian/Pembukaan"]; 
		$query_data[]=["id"=>"pelantikan","text"=>"Pelantikan"]; 
		$query_data[]=["id"=>"tamu negara","text"=>"Tamu negara"]; 
		$query_data[]=["id"=>"hari besar","text"=>"Hari besar"]; 
		$query_data[]=["id"=>"pengucapan sumpah","text"=>"Pengucapan sumpah"]; 
		$not=array("peresmian/pembukaan","pelantikan","tamu negara","hari besar","pengucapan sumpah");
			$this->db->order_by("nama","asc");
			$this->db->where_not_in("acara",$not);
			$this->db->where("id_acara",$this->mdl->id_acara());
			$this->db->select("distinct(acara) as nama");
			$query=$this->db->get("data_acara")->result();
			 
			foreach($query as $v)
			{
				$query_data[]=["id"=>$v->nama,"text"=>$v->nama];
			}
			 
	echo	  json_encode($query_data);
	}
	
	function getDataTempat()
	{	$query_data="";
		$s=$this->input->get_post("search");
		if($s)
		{	$query_data[]=["id"=>$s,"text"=>$s]; 
			$this->db->like("tempat",$s); 
		}
		
		
			$this->db->order_by("tempat","asc");
			$this->db->where("id_acara",$this->mdl->id_acara());
			$this->db->select("distinct(tempat) as nama");
			$query=$this->db->get("data_acara")->result();
			
			foreach($query as $v)
			{
				$query_data[]=["id"=>$v->nama,"text"=>$v->nama];
			}
		// 	header('Content-Type: application/json;charset=UTF-8');
		//	header('Access-Control-Allow-Origin: *'); 
	echo	  json_encode($query_data);
	}
	 
	
	function insert()
	{
		$data=$this->mdl->insert();
		echo json_encode($data);
	}
	function insert_persus()
	{
		$data=$this->mdl->insert_persus();
		echo json_encode($data);
	}	function insert_persus_souvenir()
	{
		$data=$this->mdl->insert_persus_souvenir();
		echo json_encode($data);
	}
	
	function update()
	{
		$data=$this->mdl->update();
		echo json_encode($data);
	}
	
	function tes()
	{
		$data="<center> Konfirmasi Pendaftaran </center>
Selamat permohonan {undangan} anda telah masuk dengan data sebagai berikut:<br>
<table>
    <tr>
        <td>Nama pemohon</td><td>: {nama}</td>
    </tr>
    <tr>
        <td>jenis kelamin</td><td>: {jk}</td>
    </tr>
     <tr>
        <td>NIK</td><td>: {nik}</td>
    </tr>
     <tr>
        <td>KK</td><td>: {kk}</td>
    </tr>
     <tr>
        <td>Email</td><td>: {email}</td>
    </tr>
     <tr>
        <td>Nomor Hp</td><td>: {hp}</td>
    </tr>
    <tr>
        <td>Permohonan Undangan</td><td>: {permohonan}</td>
    </tr>
    
</table>

Mohon tunggu informasi selanjutnya yang akan kami kirimkan melalui email dan whatsapp. terimakasih";
		echo $this->m_umum->email_temp($data);
	}
	
	public function acr()
	{
		$ajax=$this->input->get_post("ajax");
		if($ajax=="yes")
		{
			echo	$this->load->view("acr");
		}else{
			$data['konten']="acr";
			$this->_template($data);
		}
		
	} 
	
	///-----------------------mitra PENILIAAN--------------------------///
	function getData()
	{
		$list = $this->mdl->get_data();
		$data = array();
		$no	  = $_POST['start'];
		$no   =	$no+1;
		 
		foreach ($list as $dataDB) {
		////
		 $durasi	=	$dataDB->durasi;
		 if($durasi>1)
		 {
			$sampai	= "<i>sampai dengan</i><br>".	$this->tanggal->hariLengkap($this->tanggal->tambahTgl($dataDB->tgl,($durasi-1)),"/")."<br>";
		 }else{
			 $sampai	="";
		 }
	 
		 $tombol='<div class="demo-button-groups">
                                <div  >
								<button title="edit" type="button" onclick="edit(`'.$dataDB->id.'`,`'.$dataDB->perihal.'`)" class="btn bg-blue-grey   waves-light">
									<i class="material-icons">border_color</i>   </button>
									<button title="hapus" type="button" onclick="hapus(`'. $dataDB->kode .'`,`'.$dataDB->perihal.'`)" class="btn bg-blue-grey waves-light">
									<i class="material-icons"> delete_forever</i>   </button>		
						 	
  
                                </div> 
                            </div>
							 ';
			 		
			$ks=str_replace(" "," ",$dataDB->no_surat);
			$row = array();
			 $row[] = "<span class='size'>".$no++."</span>";	
			 $row[] = $tombol;
			 $row[] = "<b>No Surat : </b> ". $ks.br()."<b class='col-deep-orange'>Kode Acara : ".$dataDB->kode."</b>"; 
			 $row[] = "<B>Acara: </b>".br().$dataDB->acara.br()."<b>Agenda:</b><br> ".$dataDB->agenda; 
			 
			 $row[] =  $this->tanggal->hariLengkap($dataDB->tgl,"/"). "<br>".$sampai."<b>Pukul:</b><br> ".$dataDB->jam." s/d selesai.";
			 $row[] = $dataDB->tempat;
			  
			  
			$data[] = $row; 
			
			}
			 
		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $c=$this->mdl->count(),
						"recordsFiltered" =>$c,
						"data" => $data,
						);
		//output to json format
		echo json_encode($output);

	}
	
	
	///-----------------------mitra PENILIAAN--------------------------///
	function dataTamu()
	{
		$list = $this->mdl->_dataTamu();
		$data = array();
		$no	  = $_POST['start'];
		$no   =	$no+1;
		 $tgl		=	$this->m_reff->goField("data_acara","tgl","where kode='".$this->input->get_post("kode")."' ");
		 $durasi	=	$this->m_reff->goField("data_acara","durasi","where kode='".$this->input->get_post("kode")."' ");
		foreach ($list as $dataDB) {
		////
		 if($tgl>date('Y-m-d'))
		 {
			 $kata="Belum hadir";
		 }else{
			$kata="Tidak hadir";
		 }
		  
		  $sts_ikut=$dataDB->sts_ikutserta;
		  if($sts_ikut==0)
		  {
			 $sts_i="<i class='cursor col-blue'>Belum konfirmasi</i>";
		  }elseif($sts_ikut==1)
		  {
			   $sts_i="<span class='cursor badge  bg-green'>Ya</span>";
		  }else{
			   $sts_i="<span class='cursor badge  bg-grey'>Tidak</span>";
		  }
		  $sts_h=$dataDB->sts_kehadiran;
		/*  if($sts_h==0)
		  {
			  if($sts_ikut!=1)
			  {
				   $sts_h="<i class=''>-</i>";
			  }else{
				 $sts_h="<span class='cursor badge  bg-grey'>".$kata."</span>";
			  }
			
		  }elseif($sts_h==1)
		  {
			   $sts_h="<span class='cursor badge  bg-green'>Hadir</span>";
		  }else{
			  if($sts_ikut!=1)
			  {
				   $sts_h="<i class=''>-</i>";
			  }else{
				  $sts_h="<span class='badge  bg-red cursor'>Diblokir</span>";
			  }
			  
		  }*/
		 $sts_h		=	"";
		
		 $cekin		=	$dataDB->cekin;
		 $cekin_r	=	json_decode($cekin,true);
		 if($durasi>1){
			 $h=1;
					 foreach($cekin_r as $key=>$val)
					 {
						 if($val)
						 {
							 $sts_h.= "<span title='hadir' class='label bg-teal'> ✔ Hari ke :".$h."</span><br>";
						 }else{
							 $sts_h.= "<span  title='tidak hadir' class='label bg-grey'> ✖ Hari ke :".$h."</span><br>";
						 }
						
						 
						 $h++;
					 }
		 }else{
					  foreach($cekin_r as $val)
					 {
						 if($val){
							 $sts_h.="<span  title='tidak hadir' class='label bg-teal'> ✔ Hadir </span><br>";
						 }else{
						 $sts_h.="<span  title='tidak hadir' class='label bg-grey'>✖ Tidak Hari </span><br>";
						 }
					 }
		 }
		 
		 
		 
		 $tombol='<div class="demo-button-groups">
                                <div  >
								<button title="edit" type="button" onclick="edit(`'.$dataDB->id.'`,`'.$dataDB->nama.'`)" class="btn bg-blue-grey   waves-light">
									<i class="material-icons">border_color</i>   </button>
									<button title="hapus" type="button" onclick="hapus(`'.$this->encrypt->encode($dataDB->id,"key").'`,`'.$dataDB->nama.'`)" class="btn bg-pink waves-light">
									<i class="material-icons"> delete_forever</i>   </button>		
						 	
  
                                </div> 
                            </div>
							 ';
		 
		 
		 
	 	 
			$row = array();
		
			 $row[] = ' 
			 
			  <input type="checkbox" id="md_checkbox_'.$dataDB->id.'"   class="pilih filled-in chk-col-red" onclick="pilcek()"  name="hapus[]"  value="'.$dataDB->id.'" />
                                <label for="md_checkbox_'.$dataDB->id.'">&nbsp;</label> 
			 ';	
			 	$row[] = $no++;
			$row[] ="<a class='col-teals font-bold' href='javascript:edit(`".$dataDB->id."`,`".$dataDB->nama."`)'>". ucwords(strtolower($dataDB->nama))."</a>".br()."<i class='font-11'>".$dataDB->qr."</i>";
			$row[] = $dataDB->jabatan;
			$row[] = $this->m_reff->amankan($dataDB->alamat);
			$row[] = $dataDB->blok;
			///$row[] = $sts_i;
			$row[] = $sts_h;
			//$row[] = $tombol;
			 
			  
			$data[] = $row; 
			
			}
			 
		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $c=$this->mdl->count_tamu(),
						"recordsFiltered" =>$c,
						"data" => $data,
						);
		//output to json format
		echo json_encode($output);

	}
	
	
	function editAcara()
	{
		 
			echo	$this->load->view("edit_acara");
		 
	}
	
	function editTamu()
	{
		 
			echo	$this->load->view("edit_tamu");
		 
	}
	
	
	function add_tamu()
	{
		 
			echo	$this->load->view("form_add_tamu");
		 
	}function upload_peserta()
	{
		 
			echo	$this->load->view("upload_peserta");
		 
	}
	function tamu()
	{
		$ajax=$this->input->get_post("ajax");
		if($ajax=="yes")
		{
			echo	$this->load->view("tamu");
		}else{
			$data['konten']="tamu";
			$this->_template($data);
		}
		 
	}
	function get_data_peserta()
	{
		 
			echo	$this->load->view("get_data_peserta");
		 
	}
	function t()
	{
		$d='["Nama","Jabatan","pendamping "]';
			$r=json_decode($d,true);
			print_r($r);
	}
	
	function import_persus()
	{
		$var=array();
		$var["size"]=true; 
		$var["file"]=true;
		$var["validasi"]=false; 
		$var["token"]=true; 
		 
	 
		$input=$this->input->post("f");
		$data=$this->security->xss_clean($input);
		if(isset($_FILES["file"]['tmp_name']))
		{
				$echo=$this->mdl->import_persus("file");
				echo json_encode($echo);
			 
		}else{
				echo json_encode($var);
		}
		
	}
		function import_persus_souvenir()
	{
		$var=array();
		$var["size"]=true; 
		$var["file"]=true;
		$var["validasi"]=false; 
		$var["token"]=true; 
		 
	 
		$input=$this->input->post("f");
		$data=$this->security->xss_clean($input);
		if(isset($_FILES["file"]['tmp_name']))
		{
				$echo=$this->mdl->import_persus_souvenir("file");
				echo json_encode($echo);
			 
		}else{
				echo json_encode($var);
		}
		
	}
	
	function up_peserta()
	{
		$var=array();
		$var["size"]=true; 
		$var["file"]=true;
		$var["validasi"]=false; 
		$var["token"]=true; 
		 
	 
		$input=$this->input->post("f");
		$data=$this->security->xss_clean($input);
		if(isset($_FILES["file"]['tmp_name']))
		{
				$echo=$this->mdl->import_peserta("file");
				echo json_encode($echo);
			 
		}else{
				echo $var;
		}
		
	}
	
	
	function edit_peserta()
	{
		$var=array();
		$var["size"]=true; 
		$var["file"]=true;
		$var["validasi"]=false; 
		$var["token"]=true; 
		 
	 
		$input=$this->input->post("f");
		$data=$this->security->xss_clean($input);
		if(isset($_FILES["file"]['tmp_name']))
		{
				$echo=$this->mdl->edit_import_peserta("file");
				echo json_encode($echo);
			 
		}else{
				$dataray=array(  
								"_uid"=>$this->mdl->idu(),
								"_utime"=>date("Y-m-d H:i:s")
								);
							$form	=	$this->input->get_post("f");	
							$this->db->set($form);	
							$this->db->where("id",$this->input->post("id"));	
						$var=$this->db->update("file_peserta",$dataray);
						echo json_encode($var);
		}
		
	}
	
	
	  
	 
	
	function show_file_pdf()
	{ 
       $id= $this->input->get("id"); 
		$data['id']=$id; 
		ob_start();
		//include('file.html');
		$isi=$this->load->view('show_file_pdf',$data);
		$isi = ob_get_clean();

		require_once('static/html2pdf/html2pdf.class.php');
		try{
		 $html2pdf = new HTML2PDF('P',array("210","297"), 'en', true, '', array(15,10,10, 10));
		 $html2pdf->writeHTML($isi, isset($_GET['vuehtml']));
		 $html2pdf->Output('data-peserta.pdf');
		}
		catch(HTML2PDF_exception $e){
		 echo $e;
		 exit;
		}
	}
	
	function cetak_pengantar()
	{
		 
       $id= $this->input->get("id"); 
		$data['id']=$id; 
		ob_start();
		//include('file.html');
		$isi=$this->load->view('cetak_pengantar',$data);
		
		$isi = ob_get_clean();

		require_once('static/html2pdf/html2pdf.class.php');
		try{
		 $html2pdf = new HTML2PDF('P',array("210","297"), 'en', true, '', array(18,10,10, 10));
		 $html2pdf->writeHTML($isi, isset($_GET['vuehtml']));
		 $html2pdf->Output('undangan.pdf');
		}
		catch(HTML2PDF_exception $e){
		 echo $e;
		 exit;
		}
	}function cetak()
	{
		 
       $id= $this->input->get("id"); 
		$data['id']=$id; 
		ob_start();
		//include('file.html');
		$isi=$this->load->view('cetak',$data);
		
		$isi = ob_get_clean();

		require_once('static/html2pdf/html2pdf.class.php');
		try{
		 $html2pdf = new HTML2PDF('P',array("210","297"), 'en', true, '', array(18,10,10, 10));
		 $html2pdf->writeHTML($isi, isset($_GET['vuehtml']));
		 $html2pdf->Output('undangan.pdf');
		}
		catch(HTML2PDF_exception $e){
		 echo $e;
		 exit;
		}
	}
	function cetak_file()
	{
		 
       $id= $this->input->get("id"); 
		$data['id']=$id; 
		ob_start();
		//include('file.html');
		$isi=$this->load->view('cetak_file',$data);
		$isi = ob_get_clean();

		require_once('static/html2pdf/html2pdf.class.php');
		try{
		 $html2pdf = new HTML2PDF('P',array("210","297"), 'en', true, '', array(18,10,10, 10));
		 $html2pdf->writeHTML($isi, isset($_GET['vuehtml']));
		 $html2pdf->Output('data-peserta.pdf');
		}
		catch(HTML2PDF_exception $e){
		 echo $e;
		 exit;
		}
	}
	
	function show_file_xl()
	{
		 
       $this->mdl->show_file_xl();
	}
	
 function hapus_file()
	{
		 
       echo $this->mdl->hapus_file();
	}
	
  function hapus()
	{ 
       echo $this->mdl->hapus();
	}
	
  function getAgenda() {
        /////////////
	 
        $type = isset($_POST['type'])?($_POST['type']):"";
        if ($type == 'fetch') {
            $status = " AND last_cekout IS NULL ";

            $events = array();
            $fetch = $this->db->query("SELECT * FROM data_acara where id_acara='".$this->mdl->id_acara()."'   ")->result();
             foreach ($fetch as $fetch) {
                $e = array();
				 $e['id_acara'] = $fetch->id_acara; 
                $e['id'] = $fetch->id; 
                $e['title'] = ucwords(strtolower($fetch->agenda)); 
                $e['start'] = $fetch->tgl;
                $e['end'] =  $this->tanggal->tambahTgl($fetch->tgl,($fetch->durasi-1));
				if($fetch->tgl==date('Y-m-d')){
					 $e['backgroundColor'] =  "#4C0099";
				}elseif($fetch->tgl<date('Y-m-d'))
				{
					 $e['backgroundColor'] =  "#009999";
				}else{
					 $e['backgroundColor'] =  "#FF007F";
					 
				}
               

              //  $allday = ($fetch->allDay == "true") ? true : false;
                $e['allDay'] = "true";

                array_push($events, $e);
            }
            echo json_encode($events);
        }
	  }
	  
	  
	  
	  function getAgendaLain() {
        /////////////
	 
        $type = isset($_POST['type'])?($_POST['type']):"";
        if ($type == 'fetch') {
            $status = " AND last_cekout IS NULL ";

            $events = array();
            $fetch = $this->db->query("SELECT * FROM data_acara where id_acara!='".$this->mdl->id_acara()."'   ")->result();
             foreach ($fetch as $fetch) {
				 $c=$this->m_reff->goField("tr_jenis_undangan","alias","where id='".$fetch->id_acara."' ");
                $e = array();
                $e['id_acara'] = $fetch->id_acara; 
                $e['id'] = $fetch->id; 
                $e['title'] = $c."::".ucwords(strtolower($fetch->acara)); 
                $e['start'] = $fetch->tgl;
                  $e['end'] =  $this->tanggal->tambahTgl($fetch->tgl,($fetch->durasi-1));
					 $e['backgroundColor'] =  "white";
					 $e['textColor'] =  "red";
				  

              //  $allday = ($fetch->allDay == "true") ? true : false;
                $e['allDay'] = "true";

                array_push($events, $e);
            }
            echo json_encode($events);
        }
	  }
	function get_info()
	{
			echo	$this->load->view("get_info");
	}
	
	 function filter()
	{	$query_data="";
		$s=$this->input->get_post("search");
		if($s)
		{	 
			$this->db->like("acara",$s); 
			$this->db->or_like("perihal",$s); 
			$this->db->or_like("agenda",$s); 
		}
		 
			$this->db->order_by("tgl","des");
			$this->db->where("id_acara",$this->mdl->id_acara()); 
			$query=$this->db->get("data_acara")->result();
			
			foreach($query as $v)
			{
			$query_data[]=["id"=>$v->kode,"text"=>$v->agenda." - ".$this->tanggal->ind_bulan($v->tgl," ")];
			}
		 
		echo	  json_encode($query_data);
	} function blokjs($blok)
	{	$query_data="";
		$s=$this->input->get_post("search");
		if($s)
		{	 
			$query_data[]=["id"=>$s,"text"=>$s];
			$this->db->like("blok",$s); 
		 
		}
		 
			$this->db->order_by("blok","asc");
			$this->db->where("kode_acara",$blok); 
			$this->db->select("DISTINCT(blok) as blok"); 
			$query=$this->db->get("data_peserta")->result();
			
			foreach($query as $v)
			{
			$query_data[]=["id"=>$v->blok,"text"=>$v->blok];
			}
		 
		echo	  json_encode($query_data);
	}
	function getSetting()
	{
		$this->load->view("getSetting");
	}
	
	function insert_tamu()
	{
		echo $this->mdl->insert_tamu();
	}
	function update_tamu()
	{
		echo $this->mdl->update_tamu();
	}
	function loadDashboard()
	{
		$this->load->view("loadDashboard");
	}
	function hapus_cek()
	{
		echo $this->mdl->hapus_cek();
	}
	function export_xl()
	{
		echo $this->mdl->export_xl();
	}
	
	function cetak_label()
	{
		 
       $id= $this->input->get("id"); 
		$data['id']=$id; 
		ob_start();
		//include('file.html');
		$isi=$this->load->view('cetak_label',$data); 
		$isi = ob_get_clean();

		require_once('static/html2pdf/html2pdf.class.php');
		try{
		 $html2pdf = new HTML2PDF('P',array("210","297"), 'en', true, '', array(18,10,10, 10));
		 $html2pdf->writeHTML($isi, isset($_GET['vuehtml']));
		 $html2pdf->Output('undangan.pdf');
		}
		catch(HTML2PDF_exception $e){
		 echo $e;
		 exit;
		}
	}
	
	function cetak_undangan()
	{
		 
       $id= $this->input->get("id"); 
		$data['id']=$id; 
		ob_start();
		//include('file.html');
		$isi=$this->load->view('cetak_undangan',$data); 
		$isi = ob_get_clean();

		require_once('static/html2pdf/html2pdf.class.php');
		try{
		 $html2pdf = new HTML2PDF('L',array("120","180"), 'en', true, '', array(10,10,10, 10));
		 $html2pdf->writeHTML($isi, isset($_GET['vuehtml']));
		 $html2pdf->Output('undangan.pdf');
		}
		catch(HTML2PDF_exception $e){
		 echo $e;
		 exit;
		}
	}
		function loadDurasi()
	{	 
		$kode	 =	$this->input->get_post("kode");
		$durasi	 =	$this->m_reff->goField("data_acara","durasi","where kode='".$kode."' ");
		$tgl	 =	$this->m_reff->goField("data_acara","tgl","where kode='".$kode."' ");
		$h=1;
		if($durasi>1){
		for($i=0;$i<=$durasi;$i++)
		{
			$tgl_pelaksanaan=$this->tanggal->tambahTgl($tgl,$i);
			$ray[$tgl_pelaksanaan]=" Hari ke ".$h++."  » ".$this->tanggal->hariLengkap($tgl_pelaksanaan,"-");
		}
		echo "<div class='pull-right col-md-4'>";
		echo form_dropdown("durasi",$ray,"","class='cursor form-control' onchange='loadDashboard()'");
		echo "</div>";
		echo "<script>loadDashboard()</script>";
		}else{
			echo "<input type='hidden' name='durasi' value='".$tgl."' >";
		echo "<script>loadDashboard()</script>";
		}
	}
}