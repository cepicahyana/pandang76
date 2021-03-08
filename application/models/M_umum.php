<?php

class M_umum extends CI_Model  {
    
		
	function __construct()
    {
        parent::__construct();
		
    }
	function update_souvenir()
	{	$dir	=	$this->m_reff->tm_pengaturan(37)."/webcamp";
		$data	=	array(
		"diterima_oleh"=>$this->input->post("diterima_oleh"),
		"diterima_tgl"=>date('Y-m-d H:i:s'),
		"pengiriman"=>$this->input->post("pengiriman"), 
		);
		$kode	=	$this->input->post("kode");
		$this->db->where("kode",$kode);
		
			if(isset($_FILES["webcam"]['tmp_name']))
			{  
				
				$file=$this->upload_file("webcam",$dir);
				if($file["validasi"]!=false)
				{
					
					$this->db->set("diterima_poto",$file["name"]);
					
				} 
			} 
		 
		$this->db->update("data_persus",$data); 
	}
	
	
		 function upload_file($form,$dok)
	{		
		$var=array();
		$var["size"]=""; 
		$var["file"]="";
		$var["validasi"]=false; 
	
			$nama=date("YmdHis")."_".$this->m_reff->acak(4);
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
			
		 $maxsize = 30000000;
		 if($size>=$maxsize)
		 {
			$var["size"]=$size; 
		 }elseif($extention!="JPG" AND $extention!="PNG"){
			$var["file"]=$extention;
		 }else{
		 	$var["validasi"]=true;
			if (!empty($lokasi_file)) {
			//move_uploaded_file($lokasi_file,$target_path);
			 $this->compress($lokasi_file, $target_path, 20);
				if($id)
				{
					$namapotoid=$this->m_reff->goField($tabel,"diterima_poto","where nik='".$id."'");
					$file_namapotoid=$dok."/".$namapotoid."";
					if(file_exists($file_namapotoid) and $namapotoid)
					{
						unlink($file_namapotoid);
					}
				}
			
			 }
			$var["name"]=$nama;
		 }
		 
		// $this->cek_rotation();
		 return $var;
	}
		
	function compress($source, $destination, $quality) { 
		// Get image info 
		$imgInfo = getimagesize($source); 
		$mime = $imgInfo['mime']; 
		 
		// Create a new image from file 
		switch($mime){ 
			case 'image/jpeg': 
				$image = imagecreatefromjpeg($source); 
				break; 
			case 'image/png': 
				$image = imagecreatefrompng($source); 
				break; 
			case 'image/gif': 
				$image = imagecreatefromgif($source); 
				break; 
			default: 
				$image = imagecreatefromjpeg($source); 
		} 
		 
		// Save image 
		imagejpeg($image, $destination, $quality); 
		 
		// Return compressed image 
		return $destination; 
	} 
	
	
	function cek_rotation()
	{
		$filename = $_FILES['file']['name'];
		$filePath = $_FILES['file']['tmp_name'];
		$exif = exif_read_data($_FILES['file']['tmp_name']);
		if (!empty($exif['Orientation'])) {
			$imageResource = imagecreatefromjpeg($filePath); // provided that the image is jpeg. Use relevant function otherwise
			switch ($exif['Orientation']) {
				case 3:
				$image = imagerotate($imageResource, 180, 0);
				break;
				case 6:
				$image = imagerotate($imageResource, -90, 0);
				break;
				case 8:
				$image = imagerotate($imageResource, 90, 0);
				break;
				default:
				$image = $imageResource;
			} 
		}

		imagejpeg($image, $filename, 90);
	}
	
	
	
	
	
	
	function jmlSouvenir($kode,$blok)
	{
		
		$this->db->where("blok1",$blok);
		$this->db->where("kode_persus",$kode);
		return $this->db->get("data_peserta")->num_rows();
	}
	///////////////////Golongan validasi
	function jmlTarget()
	{	$this->db->select("sum(target) as sum");
		$return=$this->db->get("tr_blok")->row();
		return isset($return->sum)?($return->sum):"";
	}
	function jmlPemohon($jenis=null)
	{
		if($jenis)
		{ 
			
			$this->db->where("jenis_acara IN (".$jenis.",3)");
			$this->db->select("count(*) as jml");
		}else{
			$this->db->where("jenis_acara IN (1,2,3)");
			$this->db->select("sum(jml_undangan) as jml");
		}
		 
		$this->db->where("sts_acc!=3");
		$return=$this->db->get("v_peserta")->row();
		return isset($return->jml)?($return->jml):0;
	}
	function jmlDispo()
	{	
		//$this->db->where("sts_acc",2);
		$this->db->where("jenis_acara IN(1,2,3)");
		$this->db->where("(blok1 IS NOT NULL or blok2 IS NOT NULL)"); 
		$this->db->select("sum(jml_undangan) as jml");
			$this->db->where("hps IS NULL"); 
		$return=$this->db->get("v_peserta")->row();
		return isset($return->jml)?($return->jml):0;
	}
	function jmlDispoByBlok($jenis,$blok)
	{	
		if($jenis)
		{
			$this->db->where("(jenis_acara ='".$jenis."' or jenis_acara=3)");
			$this->db->select("count(*) as jml");
		}else{
			$this->db->select("sum(jml_undangan) as jml");
			$this->db->where("jenis_acara IN(1,2,3)");
		}
		
		if($jenis==1){
				$this->db->where("blok1",$blok); 
		}elseif($jenis==2){
				$this->db->where("blok2",$blok); 
		}elseif($jenis==3){ 
				$this->db->where("(blok1='".$blok."'  or blok2='".$blok."')"); 
		}
		//$this->db->where("sts_acc",2); 
		$this->db->where("hps IS NULL"); 
		$return=$this->db->get("v_peserta")->row();
		return isset($return->jml)?($return->jml):0;
	}
	function jmlDistribusi($jenis=null,$blok=null)
	{	
		if($jenis){
				
			$this->db->where("(jenis_acara ='".$jenis."' or jenis_acara=3)");
				$this->db->select("count(*) as jml");
		}else{
				$this->db->select("sum(jml_undangan) as jml");
				$this->db->where("jenis_acara IN(1,2,3)");
		}
		if($jenis==1){
				$this->db->where("blok1",$blok); 
		}elseif($jenis==2){
				$this->db->where("blok2",$blok); 
		}elseif($jenis==3){
				$this->db->where("(blok1='".$blok."'  or blok2='".$blok."')"); 
				
		}
			$this->db->where("hps IS NULL"); 
		$this->db->where("diterima_oleh IS NOT NULL"); 
		$return=$this->db->get("v_peserta")->row();
		return isset($return->jml)?($return->jml):0;
	}
	function per_dispo()
	{
		$pemohon=$this->jmlPemohon();
		if(!$pemohon){return 0;}
		$sudah=$this->jmlDispo();
		return (($sudah/$pemohon)*100);
	}
	function per_pemohon()
	{
		$target		=	$this->jmlTarget();
		if(!$target){return 0;}
		$jmlPemohon	=	$this->jmlPemohon();
		return (($jmlPemohon/$target)*100);
	}
	function per_distribusi()
	{	  $jmlDispo		=	$this->jmlDispo();
		if(!$jmlDispo){return 0;}
		$jmlDistribusi	=	$this->jmlDistribusi();
		return (($jmlDistribusi/$jmlDispo)*100);
	}
	function jmlQuota($jenis,$blok=null)
		{
			$this->db->where("jenis",$jenis);
			if($blok){
			$this->db->where("id",$blok);
			}
			$this->db->select("sum(target) as target");
			$s=$this->db->get("tr_blok")->row();
			return number_format($s->target,0,",",".");
			 
		}
	function getJmlBlok($kode_persus,$id_blok,$jenis)
	{
		$this->db->where("kode_persus",$kode_persus);
		if($jenis==1){
			$this->db->where("blok1",$id_blok);
		}else{
			$this->db->where("blok2",$id_blok);
		}
		return $this->db->get("data_peserta")->num_rows();
	}
	function realisasi($jenis_acara,$kode_persus)
	{
		if($jenis_acara){
				
			$this->db->where("(jenis_acara ='".$jenis_acara."' or jenis_acara=3)");
				$this->db->select("count(*) as jml");
		}else{
				$this->db->select("sum(jml_undangan) as jml");
		}
		$this->db->where("kode_persus",$kode_persus);
		$return=$this->db->get("v_peserta")->row();
		return isset($return->jml)?($return->jml):0;
	}
	function email_temp($konten){
		return	$tmp = '
				<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

				<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">

				<head>
				    <!--[if gte mso 9]><xml><o:OfficeDocumentSettings><o:AllowPNG/><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml><![endif]-->
				    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
				    <meta content="width=device-width" name="viewport" />
				    <!--[if !mso]><!-->
				    <meta content="IE=edge" http-equiv="X-UA-Compatible" />
				    <!--<![endif]-->
				    <title></title>
				    <!--[if !mso]><!-->
				    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css" />
				    <!--<![endif]-->
				    <style type="text/css">
				        body {
				            margin: 0;
				            padding: 0;
				        }
				        
				        table,
				        td,
				        tr {
				            vertical-align: top;
				            border-collapse: collapse;
				        }
				        
				        * {
				            line-height: inherit;
				        }
				        
				        a[x-apple-data-detectors=true] {
				            color: inherit !important;
				            text-decoration: none !important;
				        }
				    </style>
				    <style id="media-query" type="text/css">
				        @media (max-width: 520px) {
				            .block-grid,
				            .col {
				                min-width: 320px !important;
				                max-width: 100% !important;
				                display: block !important;
				            }
				            .block-grid {
				                width: 100% !important;
				            }
				            .col {
				                width: 100% !important;
				            }
				            .col>div {
				                margin: 0 auto;
				            }
				            img.fullwidth,
				            img.fullwidthOnMobile {
				                max-width: 100% !important;
				            }
				            .no-stack .col {
				                min-width: 0 !important;
				                display: table-cell !important;
				            }
				            .no-stack.two-up .col {
				                width: 50% !important;
				            }
				            .no-stack .col.num4 {
				                width: 33% !important;
				            }
				            .no-stack .col.num8 {
				                width: 66% !important;
				            }
				            .no-stack .col.num4 {
				                width: 33% !important;
				            }
				            .no-stack .col.num3 {
				                width: 25% !important;
				            }
				            .no-stack .col.num6 {
				                width: 50% !important;
				            }
				            .no-stack .col.num9 {
				                width: 75% !important;
				            }
				            .video-block {
				                max-width: none !important;
				            }
				            .mobile_hide {
				                min-height: 0px;
				                max-height: 0px;
				                max-width: 0px;
				                display: none;
				                overflow: hidden;
				                font-size: 0px;
				            }
				            .desktop_hide {
				                display: block !important;
				                max-height: none !important;
				            }
				        }
				    </style>
				</head>

				<body class="clean-body" style="margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color: #E6E6E6;">
				    <!--[if IE]><div class="ie-browser"><![endif]-->
				    <table bgcolor="#E6E6E6" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="table-layout: fixed; vertical-align: top; min-width: 320px; Margin: 0 auto; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #E6E6E6; width: 100%;" valign="top" width="100%">
				        <tbody>
				            <tr style="vertical-align: top;" valign="top">
				                <td style="word-break: break-word; vertical-align: top;" valign="top">
				                    <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color:#E6E6E6"><![endif]-->
				                    <div style="background-color:transparent;">
				                        <div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 500px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
				                            <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
				                                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
				                                <!--[if (mso)|(IE)]><td align="center" width="500" style="background-color:transparent;width:500px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;"><![endif]-->
				                                <div class="col num12" style="min-width: 320px; max-width: 500px; display: table-cell; vertical-align: top; width: 500px;">
				                                    <div style="width:100% !important;">
				                                        <!--[if (!mso)&(!IE)]><!-->
				                                        <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
				                                            <!--<![endif]-->
				                                            <table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
				                                                <tbody>
				                                                    <tr style="vertical-align: top;" valign="top">
				                                                        <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 20px; padding-right: 20px; padding-bottom: 20px; padding-left: 20px;" valign="top">
				                                                            <table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; width: 100%;" valign="top" width="100%">
				                                                                <tbody>
				                                                                    <tr style="vertical-align: top;" valign="top">
				                                                                        <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
				                                                                    </tr>
				                                                                </tbody>
				                                                            </table>
				                                                        </td>
				                                                    </tr>
				                                                </tbody>
				                                            </table>
				                                            <!--[if (!mso)&(!IE)]><!-->
				                                        </div>
				                                        <!--<![endif]-->
				                                    </div>
				                                </div>
				                                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
				                                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
				                            </div>
				                        </div>
				                    </div>
				                    <div style="background-color:transparent;">
				                        <div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 500px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
				                            <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
				                                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
				                                <!--[if (mso)|(IE)]><td align="center" width="500" style="background-color:transparent;width:500px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;"><![endif]-->
				                                <div class="col num12" style="min-width: 320px; max-width: 500px; display: table-cell; vertical-align: top; width: 500px;">
				                                    <div style="width:100% !important;">
				                                        <!--[if (!mso)&(!IE)]><!-->
				                                        <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
				                                            <!--<![endif]-->
				                                            <div align="center" class="img-container center fullwidth" style="padding-right: 0px;padding-left: 0px;">
				                                                <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="padding-right: 0px;padding-left: 0px;" align="center"><![endif]--><img align="center" alt="Image" border="0" class="center fullwidth" src="'.$this->konversi->img(realpath('plug/img/borderup.png')).'" style="text-decoration: none; -ms-interpolation-mode: bicubic; border: 0; height: auto; width: 100%; max-width: 500px; display: block;" title="Image" width="500" />
				                                                <!--[if mso]></td></tr></table><![endif]-->
				                                            </div>
				                                            <!--[if (!mso)&(!IE)]><!-->
				                                        </div>
				                                        <!--<![endif]-->
				                                    </div>
				                                </div>
				                                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
				                                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
				                            </div>
				                        </div>
				                    </div>
				                    <div style="background-color:transparent;">
				                        <div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 500px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #FFFFFF;">
				                            <div style="border-collapse: collapse;display: table;width: 100%;background-color:#FFFFFF;">
				                                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px"><tr class="layout-full-width" style="background-color:#FFFFFF"><![endif]-->
				                                <!--[if (mso)|(IE)]><td align="center" width="500" style="background-color:#FFFFFF;width:500px; border-top: 0px solid transparent; border-left: 1px solid #E2DFDF; border-bottom: 0px solid transparent; border-right: 1px solid #E2DFDF;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
				                                <div class="col num12" style="min-width: 320px; max-width: 500px; display: table-cell; vertical-align: top; width: 498px;">
				                                    <div style="width:100% !important;">
				                                        <!--[if (!mso)&(!IE)]><!-->
				                                        <div style="border-top:0px solid transparent; border-left:1px solid #E2DFDF; border-bottom:0px solid transparent; border-right:1px solid #E2DFDF; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
				                                            <!--<![endif]-->
				                                            <div align="center" class="img-container center" style="padding-right: 0px;padding-left: 0px;">
				                                                <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="padding-right: 0px;padding-left: 0px;" align="center"><![endif]-->
				                                                <img align="center" alt="Image" border="0" class="center" src="'.$this->konversi->img(realpath('plug/img/istana1.png')).'"  style="text-decoration: none; -ms-interpolation-mode: bicubic; border: 0; height: auto; width: 100%;
				 display: block;" title="Image" />
				                                                <!--[if mso]></td></tr></table><![endif]-->
				                                            </div>
				                                            <!--[if (!mso)&(!IE)]><!-->
				                                        </div>
				                                        <!--<![endif]-->
				                                    </div>
				                                </div>
				                                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
				                                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
				                            </div>
				                        </div>
				                    </div>
				                    <div style="background-color:transparent;">
				                        <div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 500px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #FFFFFF;">
				                            <div style="border-collapse: collapse;display: table;width: 100%;background-color:#FFFFFF;">
				                                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px"><tr class="layout-full-width" style="background-color:#FFFFFF"><![endif]-->
				                                <!--[if (mso)|(IE)]><td align="center" width="500" style="background-color:#FFFFFF;width:500px; border-top: 0px solid transparent; border-left: 1px solid #E2DFDF; border-bottom: 0px solid transparent; border-right: 1px solid #E2DFDF;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:5px;"><![endif]-->
				                                <div class="col num12" style="min-width: 320px; max-width: 500px; display: table-cell; vertical-align: top; width: 498px;">
				                                    <div style="width:100% !important;">
				                                        <!--[if (!mso)&(!IE)]><!-->
				                                        <div style="border-top:0px solid transparent; border-left:1px solid #E2DFDF; border-bottom:0px solid transparent; border-right:1px solid #E2DFDF; padding-top:0px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
				                                            <!--<![endif]-->
				                                            <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 15px; padding-left: 15px; padding-top: 15px; padding-bottom: 15px; font-family: Tahoma, Verdana, sans-serif"><![endif]-->

				                                            <!--[if mso]></td></tr></table><![endif]-->
				                                            <!--[if (!mso)&(!IE)]><!-->
				                                        </div>
				                                        <!--<![endif]-->
				                                    </div>
				                                </div>
				                                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
				                                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
				                            </div>
				                        </div>
				                    </div>

				                    <div style="background-color:transparent;">
				                        <div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 500px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #FFFFFF;">
				                            <div style="border-collapse: collapse;display: table;width: 100%;background-color:#FFFFFF;">
				                                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px"><tr class="layout-full-width" style="background-color:#FFFFFF"><![endif]-->
				                                <!--[if (mso)|(IE)]><td align="center" width="500" style="background-color:#FFFFFF;width:500px; border-top: 0px solid transparent; border-left: 1px solid #E2DFDF; border-bottom: 0px solid transparent; border-right: 1px solid #E2DFDF;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;"><![endif]-->
				                                <div class="col num12" style="min-width: 320px; max-width: 500px; display: table-cell; vertical-align: top; width: 498px;">
				                                    <div style="width:100% !important;">
				                                        <!--[if (!mso)&(!IE)]><!-->
				                                        <div style="border-top:0px solid transparent; border-left:1px solid #E2DFDF; border-bottom:0px solid transparent; border-right:1px solid #E2DFDF; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
				                                            <!--<![endif]-->
				                                            <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top: 0px; padding-bottom: 10px; font-family: Tahoma, Verdana, sans-serif"><![endif]-->
				                                            <div style="padding:20px;">
				                                                '.$konten.'
				                                            </div>
				                                            <!--[if mso]></td></tr></table><![endif]-->

				                </td>
				            </tr>
				        </tbody>
				    </table>
				    <!--[if (!mso)&(!IE)]><!-->
				    </div>
				    <!--<![endif]-->
				    </div>
				    </div>
				    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
				    <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
				    </div>
				    </div>
				    </div>
				    <div style="background-color:transparent;">
				        <div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 500px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #FFFFFF;">
				            <div style="border-collapse: collapse;display: table;width: 100%;background-color:#FFFFFF;">
				                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px"><tr class="layout-full-width" style="background-color:#FFFFFF"><![endif]-->
				                <!--[if (mso)|(IE)]><td align="center" width="500" style="background-color:#FFFFFF;width:500px; border-top: 0px solid transparent; border-left: 1px solid #E2DFDF; border-bottom: 0px solid transparent; border-right: 1px solid #E2DFDF;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
				                <div class="col num12" style="min-width: 320px; max-width: 500px; display: table-cell; vertical-align: top; width: 498px;">
				                    <div style="width:100% !important;">
				                        <!--[if (!mso)&(!IE)]><!-->
				                        <div style="border-top:0px solid transparent; border-left:1px solid #E2DFDF; border-bottom:0px solid transparent; border-right:1px solid #E2DFDF; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
				                            <!--<![endif]-->
				                            <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Tahoma, Verdana, sans-serif"><![endif]-->
				                            <div style="color:#67CCDE;font-family:Lato, Tahoma, Verdana, Segoe, sans-serif;line-height:1.5;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
				                                <div style="font-size: 12px; line-height: 1.5; color: #67CCDE; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif; mso-line-height-alt: 18px;">

				                                    <br>
				                                    <p style="font-size: 11px; line-height: 1.5; text-align: center; word-break: break-word; mso-line-height-alt: 17px; margin: 0;"><span style="font-size: 11px;"><span rel="noopener noreferrer" style="text-decoration: underline; color: #67CCDE;" target="_blank"><span style="font-size: 11px;">
				 Protokol Kepresidenan.</span></span>
				                                        </span>
				                                        <br/>
				                                    </p>
				                                </div>
				                            </div>
				                            <!--[if mso]></td></tr></table><![endif]-->
				                            <!--[if (!mso)&(!IE)]><!-->
				                        </div>
				                        <!--<![endif]-->
				                    </div>
				                </div>
				                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
				                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
				            </div>
				        </div>
				    </div>
				    <div style="background-color:transparent;">
				        <div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 500px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
				            <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
				                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
				                <!--[if (mso)|(IE)]><td align="center" width="500" style="background-color:transparent;width:500px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;"><![endif]-->
				                <div class="col num12" style="min-width: 320px; max-width: 500px; display: table-cell; vertical-align: top; width: 500px;">
				                    <div style="width:100% !important;">
				                        <!--[if (!mso)&(!IE)]><!-->
				                        <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
				                            <!--<![endif]-->
				                            <div align="center" class="img-container center fullwidth" style="padding-right: 0px;padding-left: 0px;">
				                                <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="padding-right: 0px;padding-left: 0px;" align="center"><![endif]--><img align="center" alt="Image" border="0" class="center fullwidth" src="'.$this->konversi->img(realpath('plug/img/borderdown.png')).'" style="text-decoration: none; -ms-interpolation-mode: bicubic; border: 0; height: auto; width: 100%; max-width: 500px; display: block;" title="Image" width="500" />
				                                <!--[if mso]></td></tr></table><![endif]-->
				                            </div>
				                            <!--[if (!mso)&(!IE)]><!-->
				                        </div>
				                        <!--<![endif]-->
				                    </div>
				                </div>
				                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
				                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
				            </div>
				        </div>
				    </div>
				    <div style="background-color:transparent;">
				        <div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 500px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
				            <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
				                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
				                <!--[if (mso)|(IE)]><td align="center" width="500" style="background-color:transparent;width:500px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
				                <div class="col num12" style="min-width: 320px; max-width: 500px; display: table-cell; vertical-align: top; width: 500px;">
				                    <div style="width:100% !important;">
				                        <!--[if (!mso)&(!IE)]><!-->
				                        <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
				                            <!--<![endif]-->
				                            <table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
				                                <tbody>
				                                    <tr style="vertical-align: top;" valign="top">
				                                        <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 25px; padding-right: 25px; padding-bottom: 25px; padding-left: 25px;" valign="top">
				                                            <table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; width: 100%;" valign="top" width="100%">
				                                                <tbody>
				                                                    <tr style="vertical-align: top;" valign="top">
				                                                        <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
				                                                    </tr>
				                                                </tbody>
				                                            </table>
				                                        </td>
				                                    </tr>
				                                </tbody>
				                            </table>
				                            <table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
				                                <tbody>
				                                    <tr style="vertical-align: top;" valign="top">
				                                        <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 15px; padding-right: 15px; padding-bottom: 15px; padding-left: 15px;" valign="top">
				                                            <table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; width: 100%;" valign="top" width="100%">
				                                                <tbody>
				                                                    <tr style="vertical-align: top;" valign="top">
				                                                        <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
				                                                    </tr>
				                                                </tbody>
				                                            </table>
				                                        </td>
				                                    </tr>
				                                </tbody>
				                            </table>
				                            <!--[if (!mso)&(!IE)]><!-->
				                        </div>
				                        <!--<![endif]-->
				                    </div>
				                </div>
				                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
				                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
				            </div>
				        </div>
				    </div>
				    <div style="background-color:transparent;">
				        <div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 500px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
				            <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
				                <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
				                <!--[if (mso)|(IE)]><td align="center" width="500" style="background-color:transparent;width:500px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;"><![endif]-->
				                <div class="col num12" style="min-width: 320px; max-width: 500px; display: table-cell; vertical-align: top; width: 500px;">
				                    <div style="width:100% !important;">
				                        <!--[if (!mso)&(!IE)]><!-->
				                        <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
				                            <!--<![endif]-->
				                            <table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
				                                <tbody>
				                                    <tr style="vertical-align: top;" valign="top">
				                                        <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
				                                            <table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; width: 100%;" valign="top" width="100%">
				                                                <tbody>
				                                                    <tr style="vertical-align: top;" valign="top">
				                                                        <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
				                                                    </tr>
				                                                </tbody>
				                                            </table>
				                                        </td>
				                                    </tr>
				                                </tbody>
				                            </table>
				                            <!--[if (!mso)&(!IE)]><!-->
				                        </div>
				                        <!--<![endif]-->
				                    </div>
				                </div>
				                <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
				                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
				            </div>
				        </div>
				    </div>
				    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
				    </td>
				    </tr>
				    </tbody>
				    </table>
				    <!--[if (IE)]></div><![endif]-->
				</body>

				</html>
			';
		}
}