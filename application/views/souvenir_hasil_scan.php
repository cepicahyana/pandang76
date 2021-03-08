<!DOCTYPE html>
<html lang="en">
				<head>
					<meta charset="UTF-8">
					<meta http-equiv="X-UA-Compatible" content="IE=Edge">
					<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
					<title>pandangISTANA</title>
					<script src="<?php echo base_url()?>plug/js/jquery.js"></script>
					<script src="<?php echo base_url()?>plug/blokui.js"></script> 
					</head>
					<body  style="background:#FFF5EE">

<style>
td{
    border-bottom:green solid 1px;
    font-size:20px;
    padding-top:10px;
}
.button {
  background-color: #F5F5F5;
  color: black;
  border: 1px solid #555555;
}

.button:hover {
  background-color: #F5DEB3;
  color: black;
}

.tombol{
background: rgba(242,246,248,1);
background: -moz-linear-gradient(top, rgba(242,246,248,1) 0%, rgba(181,198,208,1) 43%, rgba(181,198,208,1) 53%, rgba(224,239,249,1) 100%);
background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(242,246,248,1)), color-stop(43%, rgba(181,198,208,1)), color-stop(53%, rgba(181,198,208,1)), color-stop(100%, rgba(224,239,249,1)));
background: -webkit-linear-gradient(top, rgba(242,246,248,1) 0%, rgba(181,198,208,1) 43%, rgba(181,198,208,1) 53%, rgba(224,239,249,1) 100%);
background: -o-linear-gradient(top, rgba(242,246,248,1) 0%, rgba(181,198,208,1) 43%, rgba(181,198,208,1) 53%, rgba(224,239,249,1) 100%);
background: -ms-linear-gradient(top, rgba(242,246,248,1) 0%, rgba(181,198,208,1) 43%, rgba(181,198,208,1) 53%, rgba(224,239,249,1) 100%);
background: linear-gradient(to bottom, rgba(242,246,248,1) 0%, rgba(181,198,208,1) 43%, rgba(181,198,208,1) 53%, rgba(224,239,249,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f2f6f8', endColorstr='#e0eff9', GradientType=0 );
}
</style>
<?php
date_default_timezone_set('Asia/Jakarta');
$id=trim($this->input->get_post("v")); 
$notfound=false;
$var["isi"]=array();
$var["hasil"]=array();

					$this->db->where("kode",$id);
$data			=	$this->db->get("data_persus")->row();
$mode_scan		=	$this->m_reff->tm_pengaturan(43);
if(!$data){
$notfound=true;

	?>	
<br>
<br>
<br>
<center>
<h1><?php echo $id ; ?> </h1>
<i><u>Tidak terdaftar</u></i>
</center>


<?php	}else{
$vvip			=	$data->souvenir_1;
$vip			=	$data->souvenir_2;
$umum			=	$data->souvenir_3;
$pagi			=	$data->jml_pagi;
$sore			=	$data->jml_sore;
	
$mode_scan		=	$this->m_reff->tm_pengaturan(43);
if($mode_scan==1)
{
	if($data->pengiriman)
	{
		$pengiriman=$data->pengiriman;	
	}else{
		$pengiriman=$this->m_reff->goField("tr_pengiriman","id","where default=1  ");
	}
	
	if($data->diterima_oleh)
	{
		$nama_penerima=$data->diterima_oleh;	
	}else{
		$nama_penerima=$data->nama;
	}
	
}else{

		if($data->pengiriman)
		{
			$pengiriman=$data->pengiriman;	
		}else{
			$pengiriman="";
		}
		
		if($data->diterima_oleh)
		{
			$nama_penerima=$data->diterima_oleh;	
		}else{
			$nama_penerima="";
		}
}

 

	?>
 <br>
<center>
<table width="100%" >


<tr>
<td align="center"><?php echo $data->nama;?></td>
</tr>

<tr>
<td align="center"><?php echo $data->instansi;?></td>
</tr>

<tr>
<td align="center">VVIP : <?php echo $vvip;?>   </td>
</tr>


<tr>
<td align="center">VIP : <?php echo $vip;?>   </td>
</tr>


<tr>
<td align="center"> UMUM : <?php echo $umum;?>  </td>
</tr>

<tr>
<td align="center"> Und.Pagi : <?php echo $pagi;?> | Und.Sore : <?php echo $sore;?>  </td>
</tr>



</table>
 <br>
 
</center>
<form action="<?php echo base_url()?>welcome/update_souvenir" method="post" enctype="multipart/form-data">
<input type="hidden" name="kode" value="<?php echo $id?>">
 Nama penerima : <br>
<input type="text" style="width:98%;border:black solid 1px;height:40px;font-size:23px;padding:5px" value="<?php echo $nama_penerima;?>" name="diterima_oleh" id="diterima_oleh">
<br>
<br>
Jenis Pengiriman : <br>
<?php 
					$db	=	$this->db->get("tr_pengiriman")->result();
					$val[""]	=	"--- pilih pengiriman ---";
					foreach($db as $db)
					{
						$val[$db->id] = strtoupper($db->nama);
					}
					echo form_dropdown("pengiriman",$val,$pengiriman,"class='form-control' id='pengiriman' style='height:45px;width:98%;font-size:16px' ");
					?>


<?php
if($mode_scan==2)
{?>
<center>
photo penerima  <br>
<label>
<?php 

$nama_file=isset($data->diterima_poto)?($data->diterima_poto):"XXX";
if(file_exists($this->m_reff->tm_pengaturan(37)."/webcamp/".$nama_file))
{
	$file	=	$this->konversi->img(realpath($this->m_reff->tm_pengaturan(37)."/webcamp/".$data->diterima_poto));
}else{
	$file	=	base_url()."plug/img/take.png";
}
?>
<img src="<?php echo $file;?>" id="blah" height="100px"> 
<input type="file"  id="imgInp"  style="visibility:hidden;width:98%; height:10px;padding:5px" value="<?php echo $data->diterima_oleh;?>" name="webcam" >
</label>
</center>
<?php }else{
	
	echo "<br><br><br>";
} ?>
 
 <center id="submit">
 <button class='tombol' style="height:60px;width:95%;color:black;font-size:20px;font-weight:bold" class="button" onclick="submit()"> SIMPAN </button>
 </center>
 
  </form>
<?php   } ?>

<?php
if($this->session->flashdata("msg"))
{

if($mode_scan==1)
{
    echo "<script>window.location.href='back';</script>";
}

?>
<center> <i style="color:green">Data berhasil tersimpan. </i> </center>
<?php } ?>
 <br> <br>
 
<div class="btn-group" role="group" style="bottom:95; width:100%;margin-left:0px">
  <?php  if($mode_scan==2 or $notfound)
{?>
    
  <center>
       <a href='back' type="button" style="width:100%;min-height:200px;" class="  btn-lg bg-teal waves-effect">
       <img width='100px'  src="<?php echo base_url()?>plug/img/scanicon.png">
       </a>
  </center> 
 <?php } ?>
 </div>	    
 <script>
 setTimeout(function(){ document.getElementById("diterima_oleh").focus(); }, 1000);
 </script>
 
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 
 
 <script> 
$(document).ready(function() { 
    $('.tombol').click(function() { 
        $.blockUI({
            message:"Processing...",  
            css: { 
            border: 'none', 
            padding: '15px', 
            backgroundColor: '#000', 
            '-webkit-border-radius': '10px', 
            '-moz-border-radius': '10px', 
            opacity: .5, 
            color: '#fff' 
        } }); 
 
         
    }); 
}); 



 function submit()
 {
	 $("#submit").html("<b>mohon tunggu.....</b>");
 }
 
        function readURL_1(input) {
        	if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
              $('#blah').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
          }
        }
		
        $("#imgInp").change(function() {
			 
          readURL_1(this);
        });
		

		 
    </script>	



</body></html>	