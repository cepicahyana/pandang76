<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Konfigurasi extends MY_Controller {

	 
	var $tbl="admin";
	function __construct()
	{
		parent::__construct();	
		$this->m_konfig->validasi_session(array("user"));
		$this->load->model("model","mdl");
		date_default_timezone_set('Asia/Jakarta');
	}
	 
	function _template($data)
	{
	$this->load->view('temp_user/main',$data);	
	}
 
	public function index()
	{
		 	
		$ajax=$this->input->get_post("ajax");
		if($ajax=="yes")
		{
			echo	$this->load->view("index");
		}else{
			$data['konten']="index";
			$this->_template($data);
		}
		
	}public function check()
	{
		 	
		$ajax=$this->input->get_post("ajax");
		if($ajax=="yes")
		{
			echo	$this->load->view("check");
		}else{
			$data['konten']="check";
			$this->_template($data);
		}
		
	}public function database()
	{
		 	
		$ajax=$this->input->get_post("ajax");
		if($ajax=="yes")
		{
			echo	$this->load->view("database");
		}else{
			$data['konten']="database";
			$this->_template($data);
		}
		
	}public function frontend()
	{
		 	
		$ajax=$this->input->get_post("ajax");
		if($ajax=="yes")
		{
			echo	$this->load->view("frontend");
		}else{
			$data['konten']="frontend";
			$this->_template($data);
		}
		
	}public function gelang()
	{
		 	
		$ajax=$this->input->get_post("ajax");
		if($ajax=="yes")
		{
			echo	$this->load->view("gelang");
		}else{
			$data['konten']="gelang";
			$this->_template($data);
		}
		
	}
	public function email()
	{
		 	
		$ajax=$this->input->get_post("ajax");
		if($ajax=="yes")
		{
			echo	$this->load->view("email");
		}else{
			$data['konten']="email";
			$this->_template($data);
		}
		
	}
	 function saveweb_()
	{
	$idp=$this->security->xss_clean($this->input->post("idpengaturan"));
	$val=$this->security->xss_clean($this->input->post("idkonten"));
	$data=$this->mdl->saveweb_($idp,$val);
	echo json_encode($data);
	}function save_()
	{
	$idp=$this->security->xss_clean($this->input->post("idpengaturan"));
	$val=$this->security->xss_clean($this->input->post("idkonten"));
	$data=$this->mdl->save_($idp,$val);
	echo json_encode($data);
	}
	function saveblok_()
	{
	$idp=$this->security->xss_clean($this->input->post("idpengaturan"));
	$val=$this->security->xss_clean($this->input->post("idkonten"));
	$data=$this->mdl->saveblok_($idp,$val);
	echo json_encode($data);
	}
	function backupdb()
	{
		
	   $add=$this->m_reff->tm_pengaturan(36);
	   $db=$this->m_reff->tm_pengaturan(34);
	   $nama=$db."-"; 
	   $table=array("zoom_data","zoom_event","admin","data_persus","data_peserta","data_peserta_rangkaian","data_rangkaian_acara","main_konfig","main_level","main_log","main_menu","tm_alasan_penolakan","tm_pengaturan","tr_blok","tr_kategory","wil_kabupaten","wil_kecamatan","wil_provinsi");
	      
      $this->load->dbutil();
      $prefs = array(     
              'tables'      =>$table,
                    'format'      => 'zip',             
                    'filename'    => $nama.date("d-m-Y").'.sql'
                  );
      $backup =& $this->dbutil->backup($prefs,$add); 
      $db_name = $nama .  date("d-m-Y") .'.zip'; //NAMAFILENYA
      $save = 'file_upload/'.$db_name;
      $this->load->helper('file');
      write_file($save, $backup); 
      $this->load->helper('download');
      force_download($db_name, $backup);
	}
	function gosin()
	{
			echo	$this->mdl->gosin();
	}	
	
	
	function gosinWeb()
	{
			echo	$this->mdl->gosinWeb();
	}
	
	function gosinGelang()
	{
			echo	$this->mdl->gosinGelang();
	}
	
	function gosinGelangAcara()
	{
			echo	$this->mdl->gosinGelangAcara();
	}
	
	function gosin2()
	{
		
	echo	$this->mdl->gosin2();
	}
	
	function downloadData()
	{ 
		$namaFile = "data.json"; 
		header("Content-type: text/plain");
	 	header("Content-Disposition: attachment; filename=".$namaFile); 
		$query = "SELECT nik,cekin1,cekin2,cekin3 FROM data_peserta "; 
		$hasil = $this->db->query($query)->result();
		echo json_encode($hasil);
	}
	
	  public function restore()    
    {

        $this->load->helper('file');
       // $this->load->model('sismas_m');
        $config['upload_path']="./file_upload/";
        $config['allowed_types']="*";
        $this->load->library('upload',$config);
        $this->upload->initialize($config);

        if(!$this->upload->do_upload("datafile")){
         $error = array('error' => $this->upload->display_errors());
         echo "GAGAL UPLOAD";
         var_dump($error);
         exit();
        }

        $file = $this->upload->data();  //DIUPLOAD DULU KE DIREKTORI assets/database/
        $fotoupload=$file['file_name'];
                    
          $isi_file = file_get_contents('./file_upload/' . $fotoupload); //PANGGIL FILE YANG TERUPLOAD
          $string_query = rtrim( $isi_file, "\n;" );
          $array_query = explode(";", $string_query);   //JALANKAN QUERY MERESTORE KEDATABASE
              foreach($array_query as $query)
              {
                   $this->db->query($query);
              }

          $path_to_file = './file_upload/' . $fotoupload;
            if(unlink($path_to_file)) {   // HAPUS FILE YANG TERUPLOAD
			  $this->session->set_flashdata("msg","Database berhasil direstore");
                 redirect('/konfigurasi/database');
            }
            else {
                 echo 'errors occured';
            }
      
    }
	function ressetDatabase()
	{
		echo $this->mdl->ressetDatabase();
	}
	function setPengiriman()
	{
			echo $this->mdl->setPengiriman();
	}
	 function hapus_img()
	{		$id=$this->input->post("id");
			echo $this->mdl->hapus_img($id);
	}
	 
}