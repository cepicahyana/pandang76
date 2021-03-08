<?php

class Model extends CI_Model  {
    
	var $tbl="data_peserta_rakor";
	var $id="1";
	function __construct()
    {
        parent::__construct();
    }
    function getTglAmbil($nik)
    {
        $return=$this->m_reff->goField("data_peserta","diterima_tgl","where nik='".$nik."'");
        if($return){
        return $this->tanggal->ind($return,"/");
        }return false;
    } function getTglAmbilPersus($kode)
    {
        $return=$this->m_reff->goField("data_persus","diterima_tgl","where kode='".$kode."'");
        if($return){
        return $this->tanggal->ind($return,"/");
        }return false;
    }
    function getPenerima($nik)
    {
        return $this->m_reff->goField("data_peserta","diterima_oleh","where nik='".$nik."'");
        
    }
	 function getPenerimaPersus($kode)
    {
        return $this->m_reff->goField("data_persus","diterima_oleh","where kode='".$kode."'");
        
    }
	
     function setPenerima()
	 {	 $idu=$this->session->userdata("id");
		 $nik        =   $this->input->get_post("nik");
		 $diterima_oleh   =   $this->input->get_post("penerima");
		 $diterima_tgl   =   $this->input->get_post("tgl");
		  if(isset($_FILES["webcam"]['tmp_name']))
			{  
				$file=$this->upload_file("webcam","webcam",$idu,$nik);
				if($file["validasi"]!=false)
				{
					
					$this->db->set("diterima_poto",$file["name"]);
					
				}
			 
			} 
			
		 $this->db->where("nik",$nik);
		 $this->db->set("diterima_oleh",$diterima_oleh);
		 $this->db->set("diterima_tgl",$this->tanggal->eng_($diterima_tgl,"-"));
		return  $this->db->update("data_peserta");
	 }
     function setPenerimaPersus()
	 {	 $idu=$this->session->userdata("id");
		 $kode_persus        =   $this->input->get_post("kode_persus");
		 $diterima_oleh   =   $this->input->get_post("penerima");
		 $diterima_tgl   =   $this->input->get_post("tgl");
		  if(isset($_FILES["webcam"]['tmp_name']))
			{  
				$file=$this->upload_file("webcam","webcam",$idu,$kode_persus);
				if($file["validasi"]!=false)
				{
					
					$this->db->set("diterima_poto",$file["name"]);
					
				}
			 
			} 
			
		 $this->db->where("kode_persus",$kode_persus);
		 $this->db->set("diterima_oleh",$diterima_oleh);
		 $this->db->set("diterima_tgl",$this->tanggal->eng_jam($diterima_tgl,"-"));
		   $this->db->update("data_peserta"); 
		   
		   
		$this->db->set("sts_qrcode",1);
		$this->db->set("diterima_poto",$file["name"]);
		$this->db->where("kode",$kode_persus);
		 $this->db->set("diterima_oleh",$diterima_oleh);
		 $this->db->set("diterima_tgl",$this->tanggal->eng_jam($diterima_tgl,"-"));
		return  $this->db->update("data_persus");
	 } 
	 
	  
	 function setPenerimaLainnya()
	 {	 $idu=$this->session->userdata("id");
		 $kode_persus        =   $this->input->get_post("kode_persus");
		 $diterima_oleh  	 =   $this->input->get_post("penerima");
		 $diterima_tgl   	=   $this->input->get_post("tgl");
		  if(isset($_FILES["webcam"]['tmp_name']))
			{  
				$file=$this->upload_file("webcam","webcam",$idu,$kode_persus);
				if($file["validasi"]!=false)
				{
					
					$this->db->set("diterima_poto",$file["name"]);
					
				}
			 
			} 
			
		 $this->db->where("kode_rangkaian",$kode_persus);
		 $this->db->set("diterima_oleh",$diterima_oleh);
		 $this->db->set("diterima_tgl",$this->tanggal->eng_jam($diterima_tgl,"-"));
		   $this->db->update("data_peserta_rangkaian"); 
		   
		   $this->db->set("sts_qrcode",1);
		$this->db->set("diterima_poto",$file["name"]);
		$this->db->where("kode",$kode_persus);
		 $this->db->set("diterima_oleh",$diterima_oleh);
		 $this->db->set("diterima_tgl",$this->tanggal->eng_jam($diterima_tgl,"-"));
		return  $this->db->update("data_rangkaian_acara");
	 }
	 
	 
	 
	 function upload_file($form,$dok,$idu,$id=null,$tabel="data_peserta")
	{		
		$var=array();
		$var["size"]=""; 
		$var["file"]="";
		$var["validasi"]=false; 
	
		$nama=date("YmdHis")."_".$id."_";
		  $lokasi_file = $_FILES[$form]['tmp_name'];
		  $tipe_file   = $_FILES[$form]['type'];
		  $nama_file   = $_FILES[$form]['name'];
		   $size  	   = $_FILES[$form]['size'];
			$nama_file=str_replace(" ","_",$nama_file);
			// $jenis="jpg";
			$nama=str_replace("/","",$nama."_".$nama_file);
			 $target_path = "file_upload/".$dok."/".$nama;
			 
			  $ex=substr($nama_file,-3);
			$extention=str_replace(" ","_",strtoupper($ex));
			
		 $maxsize = 3000000;
		 if($size>=$maxsize)
		 {
			$var["size"]=$size; 
		 }elseif($extention!="JPG" AND $extention!="PNG"){
			$var["file"]=$extention;
		 }else{
		 	$var["validasi"]=true;
			if (!empty($lokasi_file)) {
			move_uploaded_file($lokasi_file,$target_path);
				if($id)
				{
					$namapotoid=$this->m_reff->goField($tabel,"diterima_poto","where nik='".$id."'");
					$file_namapotoid="file_upload/".$dok."/".$namapotoid."";
					if(file_exists($file_namapotoid) and $namapotoid)
					{
						unlink($file_namapotoid);
					}
				}
			
			 }
			$var["name"]=$nama;
		 }
		 return $var;
	}
  function setTanggalTerima()
 {
     $nik        =   $this->input->get_post("nik");
     $tgl        =   $this->input->get_post("val");
     $tgl        =   $this->tanggal->eng_($tgl,"-");
     $this->db->where("nik",$nik);
     $this->db->set("diterima_tgl",$tgl);
     return $this->db->update("data_peserta");
 }
	function getQr($id,$ke)
	{
		$this->db->where("id",$id);
		$data=$this->db->get("data_peserta")->row();
		if($ke==1)
		{
			return isset($data->barcode1)?($data->barcode1):"";
		}else{
			return isset($data->barcode2)?($data->barcode2):"";
		}
		
	}
	function getQrLainnya($id)
	{
		$this->db->where("id",$id);
		$data=$this->db->get("data_peserta_rangkaian")->row();
		return isset($data->qrcode)?($data->qrcode):"";
			
	}
	
	function tbl()
	{
		return $this->tbl;
	}
	function save_set()
	{
		$id_acara	=	$this->input->get_post("id_acara");
		$field		=	$this->input->get_post("field");
		$konten		=	$this->input->get_post("konten");
		$this->db->set($field,$konten);
		$this->db->where("id",$this->id);
		return $this->db->update("tr_jenis_undangan");
	}
	function noSurat()
	{			$val=$this->input->get_post("val");
				$this->db->set("no_surat",$val);
				$this->db->where("id",$this->id_acara());
		return  $this->db->update("tr_jenis_undangan");
	}function setDeputi()
	{			$val=$this->input->get_post("val");
				$this->db->set("pimpinan",$val);
				$this->db->where("id",$this->id_acara());
		return  $this->db->update("tr_jenis_undangan");
	}function isi_undangan()
	{			$val=$this->input->get_post("isi_undangan");
				$this->db->set("isi_undangan",$val);
				$this->db->where("id",$this->id_acara());
		return  $this->db->update("tr_jenis_undangan");
	}function lampiran2()
	{			$val=$this->input->get_post("lampiran2");
				$this->db->set("lampiran2",$val);
				$this->db->where("id",$this->id_acara());
		return  $this->db->update("tr_jenis_undangan");
	}
	function idu()
	{
		return $this->session->userdata("id");
	}
	function id_acara()
	{
		return $this->id;
	}
	
	function no_surat()
	{
		$r				=	$this->m_reff->goField("tr_jenis_undangan","no_surat","where id='".$this->id."'");
		$agendalast		=	$this->m_reff->goField("data_acara","no_surat","where id_acara='".$this->id_acara()."' order by tgl desc limit 1");
		$bulan		=	date("m"); $bulan	= sprintf("%02s", $bulan);
		$agendalast		=	str_replace("R-","",$agendalast);
		$agenda		=	explode("/",$agendalast);

		$noagenda	=	isset($agenda[0])?($agenda[0]):"";
		if($noagenda)
		{
		 
			$noagenda	= trim($noagenda+1);
		}else{
			$noagenda	=	"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		}
		
		
		$tahun	=	date("Y"); 
		$hasil	=	str_replace("{agenda}",$noagenda,$r);
		$hasil	=	str_replace("{bln}",$bulan,$hasil);
		return 	str_replace("{tahun}",$tahun,$hasil);
		
	}
	function _cekNik($nik)
	{
			   $this->db->where("nik",$nik);
		return $this->db->get("v_peserta")->num_rows();
	}function _cekHp($hp)
	{
			   $this->db->where("hp",$hp);
		return $this->db->get("v_peserta")->num_rows();
	}function _cekEmail($email)
	{
			   $this->db->where("email",$email);
		return $this->db->get("v_peserta")->num_rows();
	}
	function insert()
	{
		$nik	=	$this->input->get_post("f[nik]");
		$hp		=	$this->input->get_post("f[hp]");
		$email	=	$this->input->get_post("f[email]");
		$cek	=	$this->_cekNik($nik);
		$cekHP	=	$this->_cekHp($hp);
		$cekEmail	=	$this->_cekEmail($email);
		if($cekEmail)
		{
			$var["gagal"]=true;
			$var["info"]="Gagal!! Email sudah terdaftar";
			return $var;
		}if($cek)
		{
			$var["gagal"]=true;
			$var["info"]="Gagal!! NIK sudah terdaftar";
			return $var;
		}if($cekHP)
		{
			$var["gagal"]=true;
			$var["info"]="Gagal!! Nomor HP sudah terdaftar";
			return $var;
		}
		$jml_pagi		=	$this->input->post("jml_pagi"); 
		$pagi_single	=	$this->input->post("pagi_single"); 
		$pagi_double	=	$this->input->post("pagi_double"); 
		$jml_sore		=	$this->input->post("jml_sore"); 
		$sore_single	=	$this->input->post("sore_single"); 
		$sore_double	=	$this->input->post("sore_double"); 
		 
		if($jml_pagi)
		{
			$jml_pagi	=	$jml_pagi;
			$this->_insert_peserta($jml_pagi,1);
		}else{
			$this->_insert_peserta($pagi_double,1,2);
			$this->_insert_peserta($pagi_single,1,1);
		}	
		
		if($jml_sore)
		{
			$jml_sore	=	$jml_sore;
			$this->_insert_peserta($jml_sore,2);
		}else{ 
			$this->_insert_peserta($sore_double,2,2);
			$this->_insert_peserta($sore_single,2,1);
		}			
	  	 $var["validasi"]=true;
		 return $var;
		
	}
	private function _insert_peserta($loop,$jenis,$berlaku=null)
	{
		for($i=1;$i<=$loop;$i++)
		{
			 $this->db->set("jenis",$jenis); 
			 $this->db->set("berlaku",$berlaku); 
			 $this->db->set("_cid",$this->idu()); 
			 $this->db->set("_ctime",date('Y-m-d H:i:s'));  
			 $f		=	$this->input->post("f");
			   $this->db->insert("data_peserta",$f); 
		}
		return true;
	}
	
	 
	 
	 
	  
	
	 
	function show_file_xl()
	{
		$id= $this->input->get("id"); 
		$this->db->where("id",$id);
		$db=$this->db->get("file_peserta")->row();
		$kode_acara=isset($db->kode_acara)?($db->kode_acara):"";
		if(!$kode_acara){ echo "<i>Acara tidak ditemukan</i>"; return false;}

		$peserta=$db->peserta;
		$r_peserta=json_decode($peserta,true);
		 
		 
		$data=$this->db->query("select * from data_acara where kode='".$kode_acara."' ")->row(); 
		$no_surat=$data->no_surat;

		$title=$db->title;
		$r_title=json_decode($title,true);

 
 
        $objPHPExcel = new PHPExcel();
 
        $style = array(
            
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => '6CCECB')
            ),
            'borders' =>
            array('allborders' =>
                array('style' => PHPExcel_Style_Border::BORDER_THIN, 'color' => array('argb' => '00000000'),
                ),
            ),
        );
		
		 
			 
		 
	 
        $awal="A";$jml=0;
        foreach($r_title as $t)
		{		
			    $objPHPExcel->getActiveSheet(0)->setCellValue($awal.'1', strtoupper($t));
			    $objPHPExcel->getActiveSheet(0)->getColumnDimension($awal)->setAutoSize(true);
				$objPHPExcel->getActiveSheet(0)->getStyle( $awal.'1')->applyFromArray($style);
				 $jml++;$awal++;
		} 
  
      
	  
		$no=0; $awal="A"; $start=1;
		foreach($r_peserta as $key=>$val)
		{	$start++;
			$isi="";$no++;
		 
			$awal_isi="A";
			for($i=0;$i<$jml;$i++){ 
				$objPHPExcel->getActiveSheet(0)->setCellValue($awal_isi++.$start, $val[$i]);
			} 
		}
		  
        $objPHPExcel->getActiveSheet(0)->setTitle('TAMU UNDANGAN');
		
						
//<!-------------------------------------------------------------------------------  --->		
     
        $objPHPExcel->setActiveSheetIndex(0);

        header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$db->nama_file.'.xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
	}
	  	
	function import_peserta($file_form)
	{		
	 
		$this->load->library("PHPExcel");
		$insert=0;$gagal=0;$edit=0;$validasi_hp=true;$validasi=true;
		$file   = explode('.',$_FILES[$file_form]['name']);
		$length = count($file);
		if($file[$length -1] == 'xlsx' || $file[$length -1] == 'xls'){
         $tmp    = $_FILES[$file_form]['tmp_name']; 
	 
			    $load = PHPExcel_IOFactory::load($tmp);
                $sheets = $load->getActiveSheet()->toArray(null,true,true,true);
				$i=1;
		 	
				$jml_title=count(array_keys($sheets[1]));	 
				$title=json_encode($sheets[1],true);	
					 unset($sheets[1]);
				$peserta=json_encode($sheets,true);		 
					 
			 	foreach ($sheets as $sheet) 
				{ 
							$insert++; 
				}
				 
							$dataray=array(
								"id_acara"=>$this->mdl->id_acara(),
								"jml_peserta"=>$insert, 
								"title"=>$title,
								"peserta"=>$peserta,
								"_cid"=>$this->mdl->idu(),
								"_ctime"=>date("Y-m-d H:i:s")
								);
							$form	=	$this->input->get_post("f");	
							$this->db->set($form);	
						return 	$this->db->insert("file_peserta",$dataray);
							 
				$i++;
       } else{
			 $var["file"]=false;
			 $var["type_file"]="<br>&nbsp;&nbsp;File Excell";
		}
			  $var["import_data"]=true;
			  $var["data_insert"]=$insert;
			  $var["data_gagal"]=$gagal;
			  $var["data_edit"]=$edit; 
			  $var["validasi"]=$validasi;
		return $var;
	}
	
	function edit_import_peserta($file_form)
	{		
	 
		$this->load->library("PHPExcel");
		$insert=0;$gagal=0;$edit=0;$validasi_hp=true;$validasi=true;
		$file   = explode('.',$_FILES[$file_form]['name']);
		$length = count($file);
		if($file[$length -1] == 'xlsx' || $file[$length -1] == 'xls'){
         $tmp    = $_FILES[$file_form]['tmp_name']; 
	 
			    $load = PHPExcel_IOFactory::load($tmp);
                $sheets = $load->getActiveSheet()->toArray(null,true,true,true);
				$i=1;
		 	
				$jml_title=count(array_keys($sheets[1]));	 
				$title=json_encode($sheets[1],true);	
					 unset($sheets[1]);
				$peserta=json_encode($sheets,true);		 
					 
			 	foreach ($sheets as $sheet) 
				{ 
							$insert++; 
				}
				 
							$dataray=array( 
								"jml_peserta"=>$insert, 
								"title"=>$title,
								"peserta"=>$peserta,
								"_cid"=>$this->mdl->idu(),
								"_ctime"=>date("Y-m-d H:i:s")
								);
							$form	=	$this->input->get_post("f");	
							$this->db->set($form);	
							$this->db->where("id",$this->input->post("id"));
						return 	$this->db->update("file_peserta",$dataray);
							 
				$i++;
       } else{
			 $var["file"]=false;
			 $var["type_file"]="<br>&nbsp;&nbsp;File Excell";
		}
			  $var["import_data"]=true;
			  $var["data_insert"]=$insert;
			  $var["data_gagal"]=$gagal;
			  $var["data_edit"]=$edit; 
			  $var["validasi"]=$validasi;
		return $var;
	}
	
	function hapus_file()
	{
	    $id = $this->input->get_post("id");
		$id = $this->encrypt->decode($id,"key");
		$this->db->where("id",$id);
		$this->db->delete("file_peserta");
	}
	function hapus()
	{
	    $id 			= 	$this->input->get_post("id");
		//$id = $this->encrypt->decode($id,"key");
		
		$nama_file		=	$this->m_reff->goField("data_peserta","qr","where id='".$id."' ");
		$kode			=	$this->m_reff->goField("data_peserta","kode_acara","where id='".$id."' ");
		 
		$this->db->where("kode_acara",$id);
		$this->db->delete("file_peserta");
		$this->m_reff->hapus_file("qr/".$kode."/".$nama_file);
		$this->db->where("kode",$id);
		return $this->db->delete("data_acara");
	}
	function jml_acara()
	{
		$this->db->where("id_acara",$this->id);
		return $this->db->get("data_acara")->num_rows();
	}
	function getBlok($blok)
	{
	return $this->db->query("SELECT blok,COUNT(*) as jml FROM data_peserta WHERE blok IS NOT NULL AND kode_acara='".$kode."'  GROUP BY blok ORDER BY blok ASC ")->result();
	}
	
	function insert_tamu()
	{
		$kode_acara		=	$this->input->post("f[kode_acara]");
		$durasi			=	$this->m_reff->goField("data_acara","durasi","where kode='".$kode_acara."' ");
		$tgl			=	$this->m_reff->goField("data_acara","tgl","where kode='".$kode_acara."' ");
		$qr				=	$this->m_reff->getCodeTamu($kode_acara);
		$this->m_reff->qr($kode_acara,$qr);
		$form			=	$this->input->post("f");
		
		$cekin="";$no=1;
		for($i=0;$i<$durasi;$i++)
		{
			$tgl_pelaksanaan=$this->tanggal->tambahTgl($tgl,$i);
			$cekin[$tgl_pelaksanaan]=null;
		}
		$cekin	=	json_encode($cekin);
		$this->db->set($form);
		$this->db->set("cekin",$cekin);
		$this->db->set("sts_ikutserta",1);
		$this->db->set("qr",$qr);
		$this->db->set("_cid",$this->idu());
		return $this->db->insert("data_peserta");
	}function update_tamu()
	{ 
		$form			=	$this->input->post("f"); 
		$this->db->set($form); 
		$this->db->where("id",$this->input->post("id"));
		$this->db->set("_uid",$this->idu());
		return $this->db->update("data_peserta");
	}
	function jmlBlokPeserta($kode,$blok)
	{	 
		    
		$this->db->where("sts_ikutserta",1);
		$this->db->where("blok",$blok);
		$this->db->where("kode_acara",$kode);
		$this->db->select("SUM(berlaku) as jml");
		$return=$this->db->get("v_peserta")->row();
		$return=$return->jml;
		if(!$return)
		{
			return 0;
		}else{
			return $return;
		}
		
	}function jmlBlokUndangan($kode,$blok)
	{	 
		    
		$this->db->where("sts_ikutserta",1);
		$this->db->where("blok",$blok);
		$this->db->where("kode_acara",$kode);
		$this->db->select("SUM(berlaku) as jml");
		return $this->db->get("v_peserta")->num_rows();
		 
	}
	function jmlBlokTerisi($kode,$blok,$in)
	{
		$this->db->LIKE("cekin",$in);
		$this->db->where("sts_ikutserta",1);
		$this->db->where("blok",$blok);
		$this->db->where("kode_acara",$kode);
		$this->db->select("SUM(berlaku) as jml");
		$return=$this->db->get("v_peserta")->row();
		$return=$return->jml;
		if(!$return)
		{
			return 0;
		}else{
			return $return;
		}
	}
	function hapus_cek()
	{	
		$ray=$this->m_reff->clearkomaray($this->input->post("id"));
		$kode=$this->input->post("kode"); 
		$this->db->where_in("id",$ray);
		return $this->db->delete("data_peserta");
	}
	function export_xl()
	{
		$id= $this->input->get("id"); 
		$in=$this->m_reff->clearkomaray($id);
		$this->db->where_in("id",$in);
		$data=$this->db->get("data_peserta")->result();
		 
		  
		 
        $objPHPExcel = new PHPExcel();
 
        $style = array(
            
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => '6CCECB')
            ),
            'borders' =>
            array('allborders' =>
                array('style' => PHPExcel_Style_Border::BORDER_THIN, 'color' => array('argb' => '00000000'),
                ),
            ),
        );
		
		  
        		
			    $objPHPExcel->getActiveSheet(0)->setCellValue('A1',"NO");
			    $objPHPExcel->getActiveSheet(0)->setCellValue('B1',"NAMA");
			    $objPHPExcel->getActiveSheet(0)->setCellValue('C1',"JABATAN/LEMBAGA");
			    $objPHPExcel->getActiveSheet(0)->setCellValue('D1',"ALAMAT");
			    $objPHPExcel->getActiveSheet(0)->setCellValue('E1',"BLOK");
			    $objPHPExcel->getActiveSheet(0)->setCellValue('F1',"KEIKUTSERTAAN");
			    $objPHPExcel->getActiveSheet(0)->setCellValue('G1',"KEHADIRAN");
			    $objPHPExcel->getActiveSheet(0)->getColumnDimension("A")->setAutoSize(true);
			    $objPHPExcel->getActiveSheet(0)->getColumnDimension("B")->setAutoSize(true);
			    $objPHPExcel->getActiveSheet(0)->getColumnDimension("C")->setAutoSize(true);
			    $objPHPExcel->getActiveSheet(0)->getColumnDimension("D")->setAutoSize(true);
			    $objPHPExcel->getActiveSheet(0)->getColumnDimension("E")->setAutoSize(true);
			    $objPHPExcel->getActiveSheet(0)->getColumnDimension("F")->setAutoSize(true);
			    $objPHPExcel->getActiveSheet(0)->getColumnDimension("G")->setAutoSize(true);
				$objPHPExcel->getActiveSheet(0)->getStyle("A1:G1")->applyFromArray($style);
				 
      
	  
		$no=1;   $start=2;
		foreach($data as $val)
		{	$kode_acara=$val->kode_acara;
		
		if($val->sts_ikutserta==0)	{ $ikut="Belum konfirmasi"; }elseif($val->sts_ikutserta==1){ $ikut="Ya";}else{ $ikut="Tidak";}
		if($val->sts_kehadiran==0)	{ $hadir="Tidak hadir"; }elseif($val->sts_kehadiran==1){ $hadir="Hadir";}else{ $hadir="Diblok";}
		 	$objPHPExcel->getActiveSheet(0)->setCellValue("A".$start, $no++);
			$objPHPExcel->getActiveSheet(0)->setCellValue("B".$start, $val->nama);
			$objPHPExcel->getActiveSheet(0)->setCellValue("C".$start, $val->jabatan);
			$objPHPExcel->getActiveSheet(0)->setCellValue("D".$start, strip_tags($val->alamat));
			$objPHPExcel->getActiveSheet(0)->setCellValue("E".$start, $val->blok);
			$objPHPExcel->getActiveSheet(0)->setCellValue("F".$start, $ikut);
			$objPHPExcel->getActiveSheet(0)->setCellValue("G".$start, $hadir); 
			$start++;
		}
		  
        $objPHPExcel->getActiveSheet(0)->setTitle('TAMU UNDANGAN');
		
						
//<!-------------------------------------------------------------------------------  --->		
		$nama_file=$this->m_reff->goField("data_acara","perihal","where kode='".$kode_acara."' ");
        $objPHPExcel->setActiveSheetIndex(0);

        header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$nama_file.'.xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
	}
	
	/*--------------------------------------------------*/
	function get_persus()
	{	
	
		$this->_get_datatables_persus();
		if($this->input->post("length")!=-1) 
		$this->db->limit($this->input->post("length"),$this->input->post("start"));
	 	return $this->db->get()->result();
	 
	}
	private function _get_datatables_persus()
	{	$filter		=	"";
	
		$jenis_permohonan	=	$this->input->get_post("jenis_permohonan");
		$dispo				=	$this->input->get_post("dispo");
		$fnotif				=	$this->input->get_post("fnotif");
		$fqr				=	$this->input->get_post("fqr");
		
	 
		if($jenis_permohonan){
			 $this->db->where("jenis_permohonan",$jenis_permohonan); 
		}
		if($dispo){ 
			 $this->db->where("sts_dispo",$dispo); 
		}
		
		if($fnotif==1){ 
			 $this->db->where("notif IS NOT NULL"); 
		}elseif($fnotif==2){
			 $this->db->where("notif IS NULL"); 
		} 
		 
		if($fqr==1){ 
			 $this->db->where("sts_qrcode",1); 
		}elseif($fqr==2){ 
			 $this->db->where("sts_qrcode",2); 
		} 
		 
		
		 
	
			if(isset($_POST['search']['value'])){
			$searchkey=$_POST['search']['value'];
				  
				$query=array(
				"nama"=>$searchkey,
				"kode"=>$searchkey, 
				"hp"=>$searchkey,
				"email"=>$searchkey, 
				"ket"=>$searchkey,
				);
				$this->db->group_start()
                        ->or_like($query)
                ->group_end();
				 
				 
			}
		
		$waktu=$this->input->post("waktu");
	 	if($waktu){
			  $this->db->where("jenis",$waktu); 
		}
		$gate=$this->input->post("gate");
	 	if($gate){ 
			 $this->db->where("gate",$gate); 
		}
		  
		
		$status=$this->input->post("status");
		if($status!=null){
			$this->db->where("status",$status); 
		}
		
		$blok=$this->input->post("blok");
		if($blok){
			$this->db->where("blok",$blok); 
		}
		
		$this->db->order_by("id","asc");
			$query=$this->db->from("data_persus");
		return $query;
	
	}
	
	public function count_file_persus()
	{		
		
		 $this->_get_datatables_persus();
		return $this->db->get()->num_rows();
	}
	 
	 
	
	/*--------------------------------------------------*/
	function get_lainnya()
	{
		 
		$this->_get_datatables_lainnya();
		if($this->input->post("length")!=-1) 
		$this->db->limit($this->input->post("length"),$this->input->post("start"));
	 	return $this->db->get()->result();
		
	}
	private function _get_datatables_lainnya()
	{	$filter		=	"";
	
		$jenis_permohonan	=	$this->input->get_post("jenis_permohonan");
		$dispo				=	$this->input->get_post("dispo");
		$fnotif				=	$this->input->get_post("fnotif");
		$fqr				=	$this->input->get_post("fqr");
		 
		if($jenis_permohonan){
			  
			$this->db->where("jenis_permohonan",$jenis_permohonan);
		}
		if($dispo){ 
			$this->db->where("sts_dispo",$dispo);
		}
		
		if($fnotif==1){ 
			$this->db->where(" AND notif IS NOT NULL");
		}elseif($fnotif==2){
			$this->db->where(" AND notif IS NULL");
		} 
		 
		if($fqr==1){ 
			$this->db->where("sts_qrcode",1);
		}elseif($fqr==2){
				$this->db->where("sts_qrcode",2);
		} 
		 
		 
		if(isset($_POST['search']['value'])){
			$searchkey=$_POST['search']['value'];
				  
				$query=array(
				"nama"=>$searchkey,
				"kode"=>$searchkey, 
				"hp"=>$searchkey,
				"email"=>$searchkey, 
				"ket"=>$searchkey,
				);
				$this->db->group_start()
                        ->or_like($query)
                ->group_end();
				
			}
		
		$waktu=$this->input->post("waktu");
	 	if($waktu){ 
		    $this->db->where("jenis",$waktu);
		}
		$gate=$this->input->post("gate");
	 	if($gate){ 
			$this->db->where("gate",$gate);
		}
		 
		 
		$status=$this->input->post("status");
		if($status!=null){ 
			$this->db->where("status",$status);
		}
		
		$blok=$this->input->post("blok");
		if($blok){
			 $this->db->where("blok",$blok);
		}
		 
		 
		 
		 $this->db->order_by("id","asc");
			$query=$this->db->from("data_rangkaian_acara");
		return $query;
			 
	 
	
	}
	
	public function count_file_lainnya()
	{		
		
		$this->_get_datatables_lainnya();
		return $this->db->get()->num_rows();
	}
	 
	
	/*--------------------------------------------------*/
	
	 function getPagiReal($kode)
	{
		$this->db->where("kode_persus",$kode);
		$this->db->where("blok1 IS NOT NULL");
		return $this->db->get("data_peserta")->num_rows();
	}function getSoreReal($kode)
	{
		$this->db->where("kode_persus",$kode);
		$this->db->where("blok2 IS NOT NULL");
		return $this->db->get("data_peserta")->num_rows();
	}
	function getJmlReal($kode,$jper=null)
	{
		if($jper==4)
		{
		$this->db->where("kode_persus",$kode); 
		return $this->db->get("data_peserta")->num_rows();
		}else{
		$this->db->where("kode_rangkaian",$kode); 
		return $this->db->get("data_peserta_rangkaian")->num_rows();
		}
	}
	function setKesiapan()
	{
		$kode	=	$this->input->post("kode");
		$sts	=	$this->input->post("sts");
		$this->db->where("kode",$kode);
		$this->db->set("sts_qrcode",$sts);
		return $this->db->update("data_persus");
	}function setKesiapanLainnya()
	{
		$kode	=	$this->input->post("kode");
		$sts	=	$this->input->post("sts");
		$this->db->where("kode",$kode);
		$this->db->set("sts_qrcode",$sts);
		return $this->db->update("data_rangkaian_acara");
	}
	function setStsPenyiapan()
	{
		$id		=	$this->input->post("id");
		$sts	=	$this->input->post("sts");
		$data	=	$this->m_reff->clearkomaray($id);
		$this->db->where_in("id",$data);
		$dt		=	$this->db->get("data_persus")->result();
		$ok=0;$gagal=0;$dgagal="";
		foreach($dt as $val)
		{
			$this->kirimNotifPersus($val);
		}
		  
	}
	
	function kirimNotifPersus($val)
	{		$subject		=	"Informasi pengambilan undangan.";
			$nama			=	$val->nama;
			$instansi		=	$val->instansi;
			$email			=	$val->email;
			$kode			=	$val->kode;
			$phone			=	$val->hp;
			$this->m_reff->qr($kode);
			$kontenmail		=	"<center><b> INFORMASI PENGAMBILAN UNDANGAN<br> HUT RI ".$this->m_reff->tm_pengaturan(31)."</b> </center><br>
									Kepada Yth Bapak/Ibu/Saudara <b>".$nama."</b> permohonan undangan anda telah selesai diproses,
									silahkan untuk melakukan pengambilan pada hari & jam kerja.<br><br>
									<b>Data pemohon :</b>
									<table style='width:100%'>
									<tr>
									<td>Nama Pemohon</td><td> : ".$nama." </td>
									</tr>
									<tr>
									<td>Instansi</td><td>: ".$instansi."</td>
									</tr>
									<tr>
									<td>Jenis Permohonan</td><td>: Undangan Upacara</td>
									</tr>
									<tr>
									<td>Kode Pendaftaran</td><td>: ".$kode."</td>
									</tr>
									</table><br>
									<center>
									<img src='".$this->konversi->img(realpath($this->m_reff->tm_pengaturan(37)."/qr/".$kode.".png"))."' width='100px'>
									</center>
									";
			$isiEMail		=	 $this->m_umum->email_temp($kontenmail);
			$sts   			=    $this->m_reff->kirimEmail($email,$subject,$isiEMail);   
			$ok=0;$gagal=0;$dgagal="";
			if($sts["sts"]=="ok"){ 
			
				$isiWa 		=   $this->notifWaPersus($val);  
								$this->m_reff->kirimWa($phone,$isiWa); 
				
				$isiSms  	=   $this->notifSMSPersus($val);  
								$this->m_reff->kirimSms($phone,$isiSms);
				 
					$this->db->set("notif",date('Y-m-d H:i:s')); 
            		$this->db->where("id",$val->id);
                	$this->db->update("data_persus");
				$ok++;
			}else{
				$gagal++;
				$dgagal.=$email."<br>";
			}
		 $var["ok"]=$ok;
		 $var["gagal"]=$gagal;
		 $var["dgagal"]=$dgagal;
		return $var;
	}
	function notifWaPersus($val)
	{
		$nama		=	$val->nama;
		$instansi	=	$val->instansi;
		$kode		=	$val->kode;
		$jenis		=	"-";
		if($val->jenis_permohonan<=3)
		{
			$jenis	=	"Undangan Upacara";
		}else{
			$jenis	=	$this->m_reff->goField('tr_kategory','nama','where id='.$val->jenis_permohonan.'');
		}
		$isi=$this->m_reff->tm_pengaturan(32);
        $isi=str_replace('{jenis}',$jenis,$isi);
        $isi=str_replace('{nama}',$nama,$isi);
        $isi=str_replace('{instansi}',$instansi,$isi);
        $isi=str_replace('{kode}',$kode,$isi); 
        return $isi;
	}function notifSMSPersus($val)
	{
		$nama		=	$val->nama;
		$instansi	=	$val->instansi;
		$kode		=	$val->kode;
		$jenis		=	"-";
		if($val->jenis_permohonan<=3)
		{
			$jenis	=	"Undangan Upacara";
		}else{
			$jenis	=	$this->m_reff->goField('tr_kategory','nama','where id='.$val->jenis_permohonan.'');
		}
		$isi=$this->m_reff->tm_pengaturan(33);
		 $isi=str_replace('{jenis}',$jenis,$isi);
        $isi=str_replace('{nama}',$nama,$isi);
        $isi=str_replace('{instansi}',$instansi,$isi);
        $isi=str_replace('{kode}',$kode,$isi); 
        return $isi;
	}
	
	
	
	function setStsPenyiapanLainnya()
	{
		$id		=	$this->input->post("id");
		$sts	=	$this->input->post("sts");
		$data	=	$this->m_reff->clearkomaray($id);
		$this->db->where_in("id",$data);
		$dt		=	$this->db->get("data_rangkaian_acara")->result();
		$ok=0;$gagal=0;$dgagal="";
		foreach($dt as $val)
		{
			$this->kirimNotifLainnya($val);
		}
		  
	}
	function kirimNotifLainnya($val)
	{		$subject		=	"Informasi pengambilan undangan.";
			$nama			=	$val->nama;
			$instansi		=	$val->instansi;
			$email			=	$val->email;
			$kode			=	$val->kode;
			$phone			=	$val->hp;
			$this->m_reff->qr($kode);
			$kontenmail		=	"<center> INFORMASI PENGAMBILAN UNDANGAN<br> HUT RI ".$this->m_reff->tm_pengaturan(31)."</b> </center><br>
									Kepada Yth Bapak/Ibu/Saudara <b>".$nama."</b> permohonan undangan anda telah selesai diproses,
									silahkan untuk melakukan pengambilan pada hari & jam kerja.<br><br>
									<b>Detail pemohon :</b>
									<table style='width:100%'>
									<tr>
									<td>Nama Pemohon</td><td> : ".$nama." </td>
									</tr>
									<tr>
									<td>Instansi</td><td>: ".$instansi."</td>
									</tr>
									<tr>
									<td>Jenis Permohonan</td><td>: 
									".$this->m_reff->goField('tr_kategory','nama','where id='.$val->jenis_permohonan.'')."</td>
									</tr><tr>
									<td>Kode Pendaftaran</td><td>: ".$kode."</td>
									</tr>
									</table><br>
									<center>
									<img src='".$this->konversi->img(realpath($this->m_reff->tm_pengaturan(37)."/qr/".$kode.".png"))."' width='100px'>
									</center>
									";
			$isiEMail		=	 $this->m_umum->email_temp($kontenmail);
			$sts   			=    $this->m_reff->kirimEmail($email,$subject,$isiEMail);   
			$ok=0;$gagal=0;$dgagal="";
			if($sts["sts"]=="ok"){ 
			
				$isiWa 		=   $this->notifWaPersus($val);  
								$this->m_reff->kirimWa($phone,$isiWa); 
				
				$isiSms  	=   $this->notifSMSPersus($val);  
								$this->m_reff->kirimSms($phone,$isiSms);
				 
					$this->db->set("notif",date('Y-m-d H:i:s')); 
            		$this->db->where("id",$val->id);
                	$this->db->update("data_rangkaian_acara");
				$ok++;
			}else{
				$gagal++;
				$dgagal.=$email."<br>";
			}
		 $var["ok"]=$ok;
		 $var["gagal"]=$gagal;
		 $var["dgagal"]=$dgagal;
		return $var;
	}
	
}




