<?php

class Model extends CI_Model  {
    
	var $tbl="admin";
 
 	function __construct()
    {
        parent::__construct();
    }
	function idu()
	{
		return $this->session->userdata("id");
	}
	
	function linkReady($r=null,$id_event)
	{
		if($r==1)
		{
			$this->db->where("LENGTH(join_url)>0");
		}else{
			$this->db->where("(LENGTH(join_url)<=0 or join_url is null)");
		}
		
		$this->db->where("id_event",$id_event);
		return $this->db->get("zoom_data")->num_rows();
	}
	function resset_zoom_peserta()
	{
		 
		$id=$this->input->post("id");
		$id_type=$this->input->post("id_type");
		 
		$this->db->set("id_event",null);
		$this->db->set("registrant_id",null);
		$this->db->where("id_type",$id_type);
		$this->db->where("id_event",$id);
		return $this->db->update("zoom_data");
	}
	function setLeng()
	{
 
		$id	 	=	$this->input->post("id"); 
		$leng	=	$this->input->post("val"); 
		$this->db->set("leng",$leng);
		$this->db->where("id",$id);
		return $this->db->update("zoom_event");
	}
	
	function setPage()
	{
 
		$id	 	=	$this->input->post("id"); 
		$leng	=	$this->input->post("val"); 
		$this->db->set("page",$leng);
		$this->db->where("id",$id);
		return $this->db->update("zoom_event");
	}
	
	function set()
	{
		$sts=$this->input->post("sts");
		$id=$this->input->post("id");
		if($sts==0){ $sts=1;}else{ $sts=0;}
		$this->db->set("sts",$sts);
		$this->db->where("id",$id);
		return $this->db->update($this->tbl);
	}
	 
	 function get_data()
	{
		 $this->_get_data();
		if($this->input->post("length")!=-1) 
		$this->db->limit($this->input->post("length"),$this->input->post("start"));
	 	return $this->db->get()->result();
		 
	}
	function _get_data()
	{
		// $level		=	$this->input->get_post("level");
		  $this->db->where("id_admin!=",$this->session->userdata("id"));
		  $this->db->where_in("level",array(3,12,13,16));
		  
		 
		if(isset($_POST['search']['value'])){
			$searchkey=$_POST['search']['value']; 
				$query=array(
				"owner"=>$searchkey 				 
				);
				$this->db->group_start()
                        ->or_like($query)
                ->group_end();
				
			}	
			
			
			$this->db->order_by("level","asc");
			$query=$this->db->from("admin");
		return $query;
			 
		
		 
	}
	
	public function count()
	{				
			$this->_get_data();
		return $this->db->get()->num_rows();
	}

	function get_data_room()
	{
		 $this->_get_data_room();
		if($this->input->post("length")!=-1) 
		$this->db->limit($this->input->post("length"),$this->input->post("start"));
	 	return $this->db->get()->result();
		 
	}
	function _get_data_room()
	{
		$akun	=	$this->input->post("akun");
		if($akun)
		{
			$this->db->where("id_akun",$akun);
		}
		 
		if(isset($_POST['search']['value'])){
			$searchkey=$_POST['search']['value']; 
				$query=array(
				"kode"=>$searchkey,				 
				"title"=>$searchkey 				 
				);
				$this->db->group_start()
                        ->or_like($query)
                ->group_end();
				
			}	
			
			
			$this->db->order_by("id","asc");
			$query=$this->db->from("zoom_event");
		return $query;
			 
		
		 
	}
	
	public function count_room()
	{				
			$this->_get_data_room();
		return $this->db->get()->num_rows();
	}


	function get_data_vicon()
	{
		 $this->_get_data_vicon();
		if($this->input->post("length")!=-1) 
		$this->db->limit($this->input->post("length"),$this->input->post("start"));
	 	return $this->db->get()->result();
		 
	}
	function _get_data_vicon()
	{
		  
		if(isset($_POST['search']['value'])){
			$searchkey=$_POST['search']['value']; 
				$query=array(
				"nama"=>$searchkey, 				 
				"key"=>$searchkey, 				 
				"secreet"=>$searchkey, 				 
				);
				$this->db->group_start()
                        ->or_like($query)
                ->group_end();
				
			}	
			
			
			$this->db->order_by("nama","asc");
			$query=$this->db->from("zoom_akun");
		return $query;
			 
		
		 
	}
	
	public function count_vicon()
	{				
			$this->_get_data_vicon();
		return $this->db->get()->num_rows();
	}
	function insert($level)
	{	
	$nip =$this->input->post("f[nip]");
	$user=$this->input->post("f[username]");
	$pass=$this->input->post("password");
	 $cek=$this->db->get_where("admin",array("nip"=>$nip))->num_rows();
	 if(!$cek){
		$post=$this->input->post("f");
		if(!$post){ 
					$var["gagal"]=true;
					$var["info"]="variable not found";
					return $var;
				
				}
		$post=$this->security->xss_clean($post);
		$pass=$this->input->post("password");
		$this->db->set("level",$level);
		$this->db->set("password",md5($pass));
	 
	 	return $this->db->insert($this->tbl,$post);
	 }else{
		$var["gagal"]=true;
		$var["info"]="NIP sudah terdaftar";
	 return $var;
	 }
	}
	function update()
	{	 
	$nip=$this->input->post("f[nip]");
	$user=$this->input->post("f[username]");
	$pass=$this->input->post("password");
	 $cek=$this->db->get_where("admin",array("nip"=>$nip,"id_admin!="=>$this->input->post("id")))->num_rows();
	 if(!$cek){
		$post=$this->input->post("f");
		if(!$post){ 
					$var["gagal"]=true;
					$var["info"]="variable not found";
					return $var;
				
				}
		$post=$this->security->xss_clean($post);
		$pass=$this->input->post("password");
		if($pass){
		$this->db->set("password",md5($pass));
		}
		$this->db->where("id_admin",$this->input->post("id"));
	 	return $this->db->update($this->tbl,$post);
	 }else{
		$var["gagal"]=true;
		$var["info"]="NIP sudah terdaftar";
	 return $var;
	 }
	}
	function hapus($id)
	{
		 
		$this->db->where("id_admin",$id);
		return $this->db->delete("admin");
	}
	
	 
	 function insert_room()
	{	 
	 $kode	=	$this->input->post("f[kode]");
	 $cek	=	$this->db->get_where("zoom_event",array("kode"=>$kode))->num_rows();
	 if(!$cek){
		$post=$this->input->post("f"); 
		$post=$this->security->xss_clean($post); 
	 	return $this->db->insert("zoom_event",$post);
	 }else{
		$var["gagal"]=true;
		$var["info"]="kode sudah terdaftar";
	 return $var;
	 }
	}
	 function insert_vicon()
	{	 
	 $key=$this->input->post("f[key]");
	 $cek=$this->db->get_where("zoom_akun",array("key"=>$key))->num_rows();
	 if(!$cek){
		$post=$this->input->post("f"); 
		$post=$this->security->xss_clean($post); 
	 	return $this->db->insert("zoom_akun",$post);
	 }else{
		$var["gagal"]=true;
		$var["info"]="key sudah terdaftar";
	 return $var;
	 }
	}
	function update_vicon()
	{	 
	$key=$this->input->post("f[key]");  
	 $cek=$this->db->get_where("zoom_akun",array("key"=>$key,"id!="=>$this->input->post("id")))->num_rows();
	 if(!$cek){
		$post=$this->input->post("f");
		if(!$post){ 
					$var["gagal"]=true;
					$var["info"]="variable not found";
					return $var;
				
				}
		$post=$this->security->xss_clean($post); 
		$this->db->where("id",$this->input->post("id"));
	 	return $this->db->update("zoom_akun",$post);
	 }else{
		$var["gagal"]=true;
		$var["info"]="key sudah terdaftar";
	 return $var;
	 }
	}
	function update_room()
	{	 
	$kode=$this->input->post("f[kode]");  
	 $cek=$this->db->get_where("zoom_event",array("kode"=>$kode,"id!="=>$this->input->post("id")))->num_rows();
	 if(!$cek){
		$post=$this->input->post("f");
		if(!$post){ 
					$var["gagal"]=true;
					$var["info"]="variable not found";
					return $var;
				
				}
		$post=$this->security->xss_clean($post); 
		$this->db->where("id",$this->input->post("id"));
	 	return $this->db->update("zoom_event",$post);
	 }else{
		$var["gagal"]=true;
		$var["info"]="kode sudah terdaftar";
	 return $var;
	 }
	}
	function hapus_vicon($id)
	{
		 
		$this->db->where("id",$id);
		return $this->db->delete("zoom_akun");
	}
	
	 	function hapus_room($id)
	{
		 
		$this->db->where("id",$id);
		return $this->db->delete("zoom_event");
	}
	
	function get_link()
	{
		$this->load->library("zoom_api");
		
		$this->db->where("id",$id_event=$this->input->get_post("id"));
		$event			=	$this->db->get("zoom_event")->row();
		$meetingID		=	isset($event->kode)?($event->kode):"";
		$page_size		=	isset($event->leng)?($event->leng):"";
		$page_number	=	isset($event->page)?($event->page):"";
				 
			 $post="page_size=".$page_size."&status=approved&page_number=".$page_number;
				
		 $data	= $this->zoom_api->getParticipants($post,$meetingID); 
		 $echo=json_encode($data);
		 $echo=json_decode($echo,TRUE);
		 $no=0;
		 if(!isset($echo["registrants"])){
			echo "network error"; return false;
		 }
		 $dt=$echo["registrants"]; 
		  
		 foreach($dt as $val)
		 {
			  $link		     = $dt[$no]["join_url"];
			  $registrant_id = $dt[$no]["id"];
			  $gen			 = $this->setLink($link,$registrant_id,$id_event);
			  if($gen)
			  {
				   $no++;
			  }
			
		 }
		 echo "Ah mantap!! ";
		 	 
	}
	
	function setLink($link,$registrant_id,$id_event)
	{
		$this->db->set("join_url",$link);
		$this->db->where("registrant_id",$registrant_id);
		$this->db->where("id_event",$id_event);
		return $this->db->update("zoom_data");
	}
	 
	 
	 
}