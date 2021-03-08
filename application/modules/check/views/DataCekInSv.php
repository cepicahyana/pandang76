
<?php
$idadmin=$this->session->userdata("id");
$id=$this->input->post("ID");
$date=$this->session->userdata("date");
$this->db->where("id_admin",$idadmin);
$this->db->where("id_event",$u=$this->uri->segment(3));
$this->db->where("kode_registrasi",$id);
$cek=$this->db->get("data_peserta");
if($cek->num_rows())
{
	$idform=$this->db->query("SELECT id_form from data_event where id_event='".$u."' ")->row();		
			$data=$cek->row();
			$isidata=explode(" __v||v__ ",$data->data);
			$row = array();
			$isi="<b>DATA DETAIL REGISTER</b><br> ";
			$jmlKolom=count($isidata);
			for($i=0;$i<($jmlKolom-1);$i++)
			{
			
			if(count(explode("_@-ahref-@_",$isidata[$i]))>1){
				$isiUpload=str_replace("_@-ahref-@_","",$isidata[$i]);
			
			}else
			{
			$isi.=$isidata[$i]." | ";
			}
			
			}
			$isi=substr($isi,0,-2);

			$q="SELECT * FROM `data_peserta` WHERE `id_admin` = '$idadmin' AND `id_event` = '$u'";
		/*if($date){
		$q.=" AND substr(tgl,1,10) = '$date' ";
		}else
		{
		$date=date('Y-m-d');
		$q.=" AND substr(tgl,1,10) = '".$this->event->tglAwal($u)."' ";
		}*/
	$q.="AND `kode_registrasi` = '".$id."' ORDER BY `tgl` DESC";
	$cek=$this->db->query($q);
	$cekidot=$this->db->query($q)->row();
	$sts=isset($cekidot->status)?($cekidot->status):"";
	/*------------------------*/
	$titleform="";
            $dataform=$this->db->query("Select * from tm_formulir where id_data_form='".$idform->id_form."' order by id_formulir ASC ")->result();
            foreach($dataform as $df)
            {
                $titleform.=$df->nama_form."::";
            }
            $df=explode("::",$titleform);
			$data=$cek->row();
			$isidata=explode(" __v||v__ ",$data->data);
			$row = array();
			$isi="<b>DATA DETAIL REGISTER</b><br> ";
			$jmlKolom=count($isidata);
			if($jmlKolom)
			{
    				$isi="
    			 
				<center>
    			<table class='table' style='text-align:left;color:black;font-weight:bold'>";
    			for($i=0;$i<($jmlKolom-1);$i++)
    			{
    			
    			if(count(explode("_@-ahref-@_",$isidata[$i]))>1){
    				$isiUpload=str_replace("_@-ahref-@_","",$isidata[$i]);
    				
    				     $file=base_url()."file_upload/form/".$idadmin."_".$u."/".$isiUpload;
    				
    			$isi.="<tr style='text-align:left'><td colspan='3' align='center'>  <img class='img-responsive thumbnail' style='width:120px;border-radius:10px;opacity:1' src='".$file."' alt='.$isiUpload.'></td></tr>";
    		//	$isi="<a target='_blank' href='".base_url()."file_upload/form/".$dataDB->id_admin."_".$dataDB->id_event."/".$isiUpload."'>click to view</a>";
    			
    			}else
    			{
    			    $fo=isset($df[$i])?($df[$i]):"";
    			$isi.="<tr style='text-align:left'><td> ".$fo." </td><td>:</td><td> ".$isidata[$i]." </td></tr>";
    			}
    			
			    }
				$isi.="<tr style='text-align:left'><td> Jumlah Pengambilan </td><td>:</td><td> ".$data->j_souvenir." </td></tr>";
				echo "</table>";
			}
			

	if($data->status=="0")
	{
			echo "<span class='sadow'><img width='100px' src='".base_url()."plug/img/warning.png'> <br>BELUM TERVERIFIKASI</span>";
	}else
	{
	
	if($cek->num_rows()>0)
		{
			$dp=$cek->row();
			$isisv=explode(",",$dp->sv);
			if(count($isisv)>1)
			{
				echo "<center>
				<div class='span8'><span class='sadow'><h2 style='color:orange'>  
			   SUDAH PERNAH MELAKUKAN PENGAMBILAN</h2></span> 
				 
			<button class='sadow btn btn-danger waves-effect' onclick='tolak(`".base_url()."myevent/sv/".$u."`)'><b>TOLAK</b></button> 
			<button class='btn btn-primary waves-effect sadow' onclick='izinkan(`".$id."`)'><b>IZINKAN</b></button> 
				<font size='5px'> ".$isi."</font>  
			<center> 
				</div>";
			}else{
				$this->event->updateStatusSvPeserta($id);
				echo "<center>	<div class='sadow' style='color:green'><h1>  JUMLAH PENGAMBILAN : ".$data->j_souvenir."</h1> </div>
			 <font size='5px'> ".$isi."</font>";
			}
		
		}else
		{
		echo "<span class='sadow'><img width='100px' src='".base_url()."plug/img/warning.png'> <br>BELUM REGISTRASI</span>";
		}
			
	
	
	
			
		
	}
}else
{
echo "<div class='sadow'><h1><img width='100px' src='".base_url()."plug/img/warning.png'>  <font color='red'>".$id."</font>  TIDAK TERDAFTAR</h1></div>";
}