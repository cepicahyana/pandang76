
<?php
$idadmin=$this->session->userdata("id");
$id=$this->input->post("ID");
$date="";//$this->session->userdata("date");
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
    			<style>td{ padding-left:10px;}</style>
				<center>
    			<table border='1' style='text-align:left;width:500px;padding:5px'>";
    			for($i=0;$i<($jmlKolom-1);$i++)
    			{
    			
    			if(count(explode("_@-ahref-@_",$isidata[$i]))>1){
    				$isiUpload=str_replace("_@-ahref-@_","",$isidata[$i]);
    				
    				     $file=base_url()."file_upload/form/".$idadmin."_".$u."/".$isiUpload;
    				
    			$isi.="<tr style='text-align:left'><td> ".$df[$i]."</td><td> <img style='max-width:100px' src='".$file."' alt='.$isiUpload.'></td></tr>";
    		//	$isi="<a target='_blank' href='".base_url()."file_upload/form/".$dataDB->id_admin."_".$dataDB->id_event."/".$isiUpload."'>click to view</a>";
    			
    			}else
    			{
    			    $fo=isset($df[$i])?($df[$i]):"";
    			$isi.="<tr style='text-align:left'><td> ".$fo."</td><td> ".$isidata[$i]." </td></tr>";
    			}
    			
			    }
				echo "</table>";
			}
			
			
			
			
	if($data->status=="0")
	{
			echo "<span class='sadow'><img width='100px' src='".base_url()."plug/img/warning.png'> <br>BELUM TERVERIFIKASI</span>";
	}else
	{
		if($cek->num_rows()>0)
		{
			if($id!="12345689")
			{
		$this->event->updateStatusClassPeserta($id,$class=$this->uri->segment(4));
			}
			echo "<div class='span8'><img width='100px' src='".base_url()."plug/img/cek.png'><br> <span class='sadow'>WELCOME</span> 
			<br><br><font size='5px'> ".$isi."</font> <br>
		<center><hr style='width:30%'>
			  ".$data->ket."
			</div>";
		}else
		{
		echo "<span class='sadow'><img width='100px' src='".base_url()."plug/img/warning.png'> <br>BELUM REGISTRASI</span>";
		}
			
		
	}
}else
{
echo "<span class='sadow'><img width='100px' src='".base_url()."plug/img/warning.png'> <br><br>".$id." <br> <br> TIDAK TERDAFTAR</span>";
}