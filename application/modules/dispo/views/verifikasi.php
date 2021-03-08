 <?php 
$post_acara	=	$this->input->post("acara");
$post_kab	=	$this->input->post("kab");
$post_prov	=	$this->input->post("prov");
$post_suci	=	$this->input->post("suci");
?>

<script>
getVerifikasi()
function getVerifikasi()
		 {	
			var post_acara="<?php echo $post_acara;?>";
			var post_kab="<?php echo $post_kab;?>";
			var post_prov="<?php echo $post_prov;?>";
			var post_suci="<?php echo $post_suci;?>";
		 
		 var id="<?php echo $this->input->post("id");?>";
			$("#getVerifikasi").html("Mohon menunggu...."); 	 
			  $.post("<?php echo site_url("dispo/getVerifikasi"); ?>",{id:id,acara:post_acara,kab:post_kab,prov:post_prov,suci:post_suci},function(data){ 
		 	    $("#getVerifikasi").html(data); 	 		 	
			});   
		 }
</script>	  
		
		 
<div id="getVerifikasi"></div>		 
		