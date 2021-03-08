<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('vendor/autoload.php');

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class M_reff extends ci_Model
{
	
	public function __construct() {
        parent::__construct();
     	}
		function mobile()
	{
						$useragent=$_SERVER['HTTP_USER_AGENT'];
                       if(preg_match('/(android|bb\d+|meego).+mobile|Android|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
						{ return true;}else{ return false; }
                   
	}
		function acak($jml=2)
		{
			$karakter = '123456789123456789123456789123456789123456789123456789123456789123456789123456789123456789123456789123456789';
			$shuffle  = substr(str_shuffle($karakter),0,$jml);
			return $shuffle;
		}
		
		 function tm_pengaturan($id)
	{
		$return=$this->db->get_where("tm_pengaturan",array("id"=>$id))->row();
		return isset($return->val)?($return->val):"";
	}
	  function qr($id)
	 {
		 if($id){
				$this->load->library('ciqrcode');
				$params['data'] = $id;
				$params['level'] = 'H';
				$params['size'] = 10;
			 ///$params['savename'] = FCPATH.'qr/'.$id.".png";
			 	$params['savename'] = $this->m_reff->tm_pengaturan(37)."/qr/".$id.".png"; 
		return	$this->ciqrcode->generate($params);
		 }
	 }	function clearkoma($data)
	{
    	if(substr($data,0,1)==",")
		{
			$data=substr($data,1);
		}
		
		if(substr($data,-1)==",")
		{
			$data=substr($data,0,-1);
		}
		
		
		$data=str_replace(",,",",",$data);
		return $data;
	}function clearkomaray($data)
	{
		 
		$data=$this->clearkoma($data);
		return explode(",",$data);
	}
	function clearhas($data)
	{
    	if(substr($data,0,1)=="|")
		{
			$data=substr($data,1);
		}
		
		if(substr($data,-1)=="|")
		{
			$data=substr($data,0,-1);
		}
		
		
		$data=str_replace("||","|",$data);
		return $data;
	}function clearhasray($data)
	{
		 
		$data=$this->clearhas($data);
		return explode("|",$data);
	}
     function getColor($blok)
	 {
		  $data=$this->db->query("SELECT * from tr_blok where  id='".$blok."' ")->row();
		return isset($data->color)?($data->color):"";
	 }
	function goField($tbl,$select,$where=null)
	{	
		$select=$this->security->xss_clean($select);
		if($where)
		{	
			//$where = addslashes($where);
			$where=$this->security->xss_clean($where);
			$where=str_replace("where","",$where);
			$where=str_replace("WHERE","",$where);
			 $where=str_replace("'''","'\''",$where);  
			$this->db->where($where);
		}
		$this->db->select($select); 
		$data=$this->db->get($tbl)->row(); 
		return isset($data->$select)?($data->$select):"";
		
		 
	}
	
	function goResult($tbl,$select,$where=null)
	{
	   return $data=$this->db->query("SELECT $select from $tbl $where ");  
	}
	 function jk($id)
	 {
	     if($id=="l")
	     {
	         return "Laki-laki";
	     }elseif($id=="p")
	     {
	         return "Perempuan";
	     }
	 }
	 
	function tgl_pergantian()
	{
		$data=$this->db->get_where("tr_tahun_ajaran",array("sts"=>1))->row();
		return isset($data->tgl_pindah)?($data->tgl_pindah):"";
	}		
	 
	function zipz($nama_file,$dir,$file)
	{
             $error=true;
            /* nama zipfile yang akan dibuat */
            $zipname = $nama_file.".zip";
            /* proses membuat zip file */
            $zip = new ZipArchive;
            $zip->open($zipname, ZipArchive::CREATE);
             
          //  foreach ($file as $value) {
            $zip->addFile($dir.$file,$file);
        //    }
             $zip->close();
            /* preses pembuatan zip file selesai disini */
             
            /* download file jika eksis*/
            if(file_exists($zipname)){
            header('Content-Type: application/zip');
            header('Content-disposition: attachment; 
            filename="'.$zipname.'"');
            header('Content-Length: ' . filesize($zipname));
            readfile($zipname);
            unlink($zipname);
             
            } else{
            $error = "Proses mengkompresi file gagal  ";
            } //end of if file_exist
            
            return $error;
            
    }
    
    function zip($zip_file,$dir,$data)
    {
            
            
            // Get real path for our folder
            $rootPath = realpath($dir);
            
            // Initialize archive object
            $zip = new ZipArchive();
            $zip->open($zip_file, ZipArchive::CREATE | ZipArchive::OVERWRITE);
            
            // Create recursive directory iterator
            /** @var SplFileInfo[] $files */
            $files = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($rootPath),
                RecursiveIteratorIterator::LEAVES_ONLY
            );
            
            foreach ($files as $name => $file)
            {
                // Skip directories (they would be added automatically)
                if (!$file->isDir())
                {
                    // Get real and relative path for current file
                    $filePath = $file->getRealPath();
                    $relativePath = substr($filePath, strlen($rootPath) + 1);
            
                    // Add current file to archive
                   $polder=substr($relativePath,0,6);
                   if (in_array($polder, $data)) {
                       $zip->addFile($filePath, $relativePath);
                    }  
                   
                   
                   
                }
            }
            
            // Zip archive will be created only after closing object
            $zip->close();
            
            
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename='.basename($zip_file));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($zip_file));
            readfile($zip_file);

            
    }
 
	function setToken()
	{
	$code=substr(str_shuffle("123aYbCdEfGhIj0K0opqrStUvwXyZ4567809"),0,25); $this->session->set_userdata("token",$code); 
	echo '<input type="hidden" name="token" value="'.$this->session->userdata("token").'">';
	}
	function cekToken()
	{
		$token_post=$this->input->post("token");
		$token_server=$this->session->userdata("token");
	
		if($token_post==$token_server)
		{
		return true;
		}else{
		return false;
		}
		
	}
	
	function hapus_file($nama_file)
	{
		$filename = $nama_file;

		if (file_exists($filename)) {
			unlink($nama_file);
		}  
		return true;
	}
	function upload_file($form,$dok,$idu,$type_file="JPG,PNG",$sizeFile="3000000")
	{		
	$var=array();
	$var["size"]=true; 
	$var["file"]=true;
	$var["validasi"]=false; 
	
		$nama=date("YmdHis")."_".$idu."_";
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
		//  $var["type"]=$type_file; 
		  $var["maxsize"]=substr($sizeFile,0,-6); 
		  
		 $pos = strpos(strtoupper($type_file), $extention);
		 if ($pos === false) {
			$file_extention=false;
		} else {
			$file_extention=true;
		}
		 
		 
		 $maxsize =$sizeFile;
		 if($size>=$maxsize)
		 {
			$var["size"]=false; 
		 }elseif($file_extention==false){
			$var["file"]=false; $var["type_file"]=$type_file;
		 }else{
		 	$var["validasi"]=true;
			if (!empty($lokasi_file)) {
			move_uploaded_file($lokasi_file,$target_path);
			 }
			$var["name"]=$nama;
		 }
		 return $var;
	}
	function upload_file_basepath($form,$dok,$idu,$type_file="JPG,PNG,MP4",$sizeFile="3000000")
	{		
	$var=array();
	$var["size"]=true; 
	$var["file"]=true;
	$var["validasi"]=false; 
	
		$nama=date("YmdHis")."_".$idu."_";
		  $lokasi_file = $_FILES[$form]['tmp_name'];
		  $tipe_file   = $_FILES[$form]['type'];
		  $nama_file   = $_FILES[$form]['name'];
		   $size  	   = $_FILES[$form]['size'];
			$nama_file=str_replace(" ","_",$nama_file);
			// $jenis="jpg";
			$nama=str_replace("/","",$nama."_".$nama_file);
			 $target_path = $dok."/".$nama;
			 

			  $ex=substr($nama_file,-3);
			$extention=str_replace(" ","_",strtoupper($ex));
		//  $var["type"]=$type_file; 
		  $var["maxsize"]=substr($sizeFile,0,-6); 
		  
		 $pos = strpos(strtoupper($type_file), $extention);
		 if ($pos === false) {
			$file_extention=false;
		} else {
			$file_extention=true;
		}
		 
		 
		 $maxsize =$sizeFile;
		 if($size>=$maxsize)
		 {
			$var["size"]=false; 
		 }elseif($file_extention==false){
			$var["file"]=false; $var["type_file"]=$type_file;
		 }else{
		 	$var["validasi"]=true;
			if (!empty($lokasi_file)) {
			move_uploaded_file($lokasi_file,$target_path);
			 }
			$var["name"]=$nama;
		 }
		 return $var;
	}
	
	
	
		public function kirimEmail($femail,$fsubject,$fmessage,$path=null,$namaFile=null,$delfile=null)
	{  	
		//	$var["sts"]="ok";
			//return $var;
		if($fsubject=="0" or $fsubject=="")
		{
			$var["sts"]="ok";
			return $var;
		}
	
		try {
	    	$connection = new AMQPStreamConnection(AMQP_HOST, AMQP_PORT, AMQP_USER, AMQP_PASSWORD);
		$channel = $connection->channel();

		$channel->queue_declare(AMQP_QUEUE_NAME, false, true, false, false);

		if($path){
            		$path=DOWNLOAD_URL . $this->m_reff->encrypt($path);
        	}

		$dataArray = array(
			'from' => $this->tm_pengaturan(2),
			'to' => $femail,
		 	'subject' => $fsubject,
			'file_url' => $path,
		        'file_name' => $namaFile . '.pdf',
		        'body' => $fmessage		        
		    );

		$data = json_encode($dataArray, JSON_UNESCAPED_SLASHES);

		$msg = new AMQPMessage(
		    $data,
		    array('delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT)
		);

		$channel->basic_publish($msg, '', AMQP_QUEUE_NAME);

		$channel->close();
		$connection->close();
		} catch (Exception $e) {
		   	$var["sts"]="Fail: " . $e->getMessage();
		  	return $var;		
		}
 		 
		$var["sts"]="ok";
		return $var;
	}
	
	
	/*
	function sendEmail($femail,$fsubject,$fmessage,$path=null,$namaFile=null,$delfile=null){
	    	$user=$this->tm_pengaturan(2);
		$pass=$this->tm_pengaturan(3);
		$from=$this->tm_pengaturan(4);
		$host=$this->tm_pengaturan(18);
		$port=$this->tm_pengaturan(19);
		$smptScure=$this->tm_pengaturan(20);
        $this->load->library('PHPMailer_load'); //Load Library PHPMailer
        $mail = $this->phpmailer_load->load(); // Mendefinisikan Variabel Mail
       
       
        $mail->setFrom($from, $fsubject); // Sumber email
        $mail->addAddress($femail,$fsubject); // Masukkan alamat email dari variabel $email
        $mail->Subject = $fsubject; // Subjek Email
        $mail->msgHtml($fmessage); // Isi email dengan format HTML
        $mail->isHTML(true);
     	if(file_exists($path)){
          $mail->addAttachment($path,$namaFile);
     	}  
        $mail->CharSet  = "UTF-8";
        $mail->Host 	= $host; // Host dari server SMTP
      //  $mail->isSMTP();  // Mengirim menggunakan protokol SMTP
        $mail->Port 	= $port;
        $mail->SMTPAuth = true; // Autentikasi SMTP
        $mail->Username = $user;
        $mail->Password = $pass;
        $mail->SMTPSecure = $smptScure;
         $mail->SMTPOptions      = array(
                                        ''.$smptScure.'' => array(
                                            'verify_peer' => false,
                                            'verify_peer_name' => false,
                                            'allow_self_signed' => true
                                        )
                                    );
       
        
        if (!$mail->send()) {
                    $var["sts"]="Mailer Error: " . $mail->ErrorInfo;
                  
                } else {
                   $var["sts"]="ok";
                    if($path && file_exists($path) && $delfile){
                        unlink($path);
                    }
                }  
                 
                  return $var;
    }
    */

     function kirimWa($phone,$msg,$dok=null)
     {
			if(!$msg){
				return false;
			}
			
            if($dok){
                $link  =  $this->tm_pengaturan(13);
                $data = [
                'phone' => $phone,
                'caption' => $msg,
                'document' =>$dok,
            ];
            }else{
                $link  =  $this->tm_pengaturan(6);
                $data = [
                'phone' => $phone,
                'message' => $msg,
                ];
            }
            
            $curl = curl_init();
            $token =  $this->tm_pengaturan(5);
          
            
            
            curl_setopt($curl, CURLOPT_HTTPHEADER,
                array(
                    "Authorization: $token",
                )
            );
            curl_setopt($curl, CURLOPT_URL, $link);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data)); 
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
            $result = curl_exec($curl);
            curl_close($curl); 
            return $result;
    
     }
     
      function kirimSms($phone,$msg)
     {
            
			
            $curl = curl_init();
            $token =  $this->tm_pengaturan(12);
            $link  =  $this->tm_pengaturan(11);
             $data = [
                'phone' => $phone,
                'message' => $msg,
                ];
            
            curl_setopt($curl, CURLOPT_HTTPHEADER,
                array(
                    "Authorization: $token",
                )
            );
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($curl, CURLOPT_URL, $link);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
            $result = curl_exec($curl);
            curl_close($curl); 
            return $result;
    
     }
	function opr($id) //nama operator
	{
		return $this->goField("admin","owner","where id_admin='".$id."' ");
	}
	function page403()
	{
		$this->load->view("403.html");
	}function page404()
	{
		$this->load->view("404.html");
	}function page405()
	{
		$this->load->view("405.html");
	}
	function dtPegawai()
	{
		$this->db->where("niplama",$this->session->userdata("nip"));
		return $this->db->get("pegawai")->row();
	}function dataProfileAdmin()
	{
		$this->db->where("id_admin",$this->session->userdata("id"));
		return $this->db->get("admin")->row();
	}
	
	function encrypt($string)
			{ 
				
				$string = $this->encryption->encrypt($string); 
				$string=str_replace("+",".",$string);
				$string=str_replace("=","-",$string);
				$string=str_replace("/","~",$string); 
				return $string;
			}
			
			
			  function decrypt($string)
			{
				$string=str_replace(".","+",$string);
				$string=str_replace("-","=",$string);
				$string=str_replace("~","/",$string); 
				$ret = $this->encryption->decrypt($string); 
				return $ret;
			}
	function namaNegara($id)
	{
					$this->db->where("id",$id);
		$data	=	$this->db->get("country")->row();
		return isset($data->country_name)?($data->country_name):"";
	}	
	function namaProvinsi($id)
	{
					$this->db->where("id_prov",$id);
		$data	=	$this->db->get("wil_provinsi")->row();
		return isset($data->nama)?($data->nama):"";
	}	
	
	function namaKota($id)
	{
					$this->db->where("id_kab",$id);
		$data	=	$this->db->get("wil_kabupaten")->row();
		return isset($data->nama)?($data->nama):"";
	}	
	function get_id_zoom_akun($meetingId)
	{
				 $this->db->where("kode",$meetingId);
		$return	 =	$this->db->get("zoom_event")->row();
		return isset($return->id_akun)?($return->id_akun):"";
	}
	function zoom_event($meetingId)
	{
				 $this->db->where("kode",$meetingId);
		return	 $this->db->get("zoom_event")->row();
	}
	function zoom_akun($id_akun)
	{
				 $this->db->where("id",$id_akun);
		return	 $this->db->get("zoom_akun")->row();
	}
	
	function esign($fath,$link)
	{
			$id_subscriber	=	$this->m_reff->tm_pengaturan(81);
			$passphrase		=	$this->m_reff->tm_pengaturan(82);
			$link_curl		=	$this->m_reff->tm_pengaturan(83);
			$text			=	$this->m_reff->tm_pengaturan(84);
			
			$curl = curl_init();
			$requestget = array(
						'id_subscriber' => $id_subscriber,
						'passphrase'=> $passphrase,
						'tampilan' => 'visible',
						'halaman' => 'pertama',
						'image' => false,
						'linkQR' => "https://verifikasitte.setneg.go.id",
						'xAxis' => -190.63,
						'width' => 360.78,
						'height' => 85.88, 
						'yAxis' => 5.71,           
						'text'  =>$text          
					);
			$url_data = http_build_query($requestget);

			$boundary = uniqid();
			$delimiter = '-------------'.$boundary;
			$filepath = $fath;///'C:\Users\User\Downloads\test tte\e-certificate-1.pdf';
			$files = array('file'=>file_get_contents($filepath));
			$fields = array();
			$data = '';
			$eol = "\r\n";

			$delimiter = '-------------' . $boundary;

			foreach ($fields as $name => $content) {
				$data .= "--" . $delimiter . $eol
					. 'Content-Disposition: form-data; name="' . $name . "\"".$eol.$eol
					. $content . $eol;
			}


			foreach ($files as $name => $content) {
				$data .= "--" . $delimiter . $eol
					. 'Content-Disposition: form-data; name="' . $name . '"; filename="' . $name . '"' . $eol
					. 'Content-Type: application/pdf'.$eol
					. 'Content-Transfer-Encoding: binary'.$eol
					;

				$data .= $eol;
				$data .= $content . $eol;
			}
			$data .= "--" . $delimiter . "--".$eol;

			curl_setopt_array($curl, array(
			  CURLOPT_URL => $link_curl . $url_data,
			  CURLOPT_RETURNTRANSFER => 1,
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POST => 1,
			  CURLOPT_POSTFIELDS => $data,
			  CURLOPT_SSL_VERIFYHOST => FALSE,
			  CURLOPT_SSL_VERIFYPEER => false,
			  CURLOPT_HTTPHEADER => array(
				"Content-Type: multipart/form-data; boundary=".$delimiter,
				"Content-Length: " . strlen($data),
				"Authorization: Basic dWppY29iYTp1amljb2Jh"
			  ),
			));

			$response = curl_exec($curl);

			$info = curl_getinfo($curl);
			curl_close($curl);


			if($info['http_code'] == '200'){
				$byteArray = unpack("N*",$response); 
				
				if(count($byteArray) > 0){
					$pdf_decoded = base64_decode ($response);
					$pdf = fopen ($filepath,"w");
					fwrite ($pdf,$response);
					fclose ($pdf);
					$result['status'] = 1;
					$result['message'] = "OK";
				}else{
					$result['status'] = 0;
					$result['message'] = "File TTE gagal terbentuk";
				}
				
			}else{
				$result['status'] = 0;
				$resdata = json_decode($response, true);    
			}


		return $result;
	}
}

?>