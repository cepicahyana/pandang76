  function submitFormKikd(id)
{		
		var form = $("#"+id);
		var link = $(form).attr("url");
	  
		$(form).ajaxForm({
		 url:link,
		 data: $(form).serialize(),
		 method:"POST",
		 dataType:"JSON",
		 beforeSend: function() {
               loading("area_"+id);
            },
		 success: function(data)
				{ 	   unblock("area_"+id); 	
					if(data["duplikat"]==true)
					{
						notif_error("<span class='col-white'><b>Gagal!</b><br>No KIKD pada mapel tersebut sudah diinput.</span>");
					 
					}else if(data["nokd3"]==false)
					{
						notif_error("<span class='col-white'><b>Gagal!</b><br>Penulisan nomor KD harus berawalan 3.<br>contoh: 3.1</span>");
					}else if(data["nokd4"]==false)
					{
						notif_error("<span class='col-white'><b>Gagal!</b><br>Penulisan nomor KI harus berawalan 4.<br>contoh: 4.1</span>");
					}else{
					  $("[name='f[kd3_no]']").val("");
					  $("[name='f[kd4_no]']").val("");
					  $("[name='f[kd3_desc]']").val("");
					  $("[name='f[kd4_desc]']").val("");
					//  $("#mdl_"+id).modal("hide"); 
					  reload_table();
					  berhasil_disimpan();
					
					   
					 		carikan();
					//  $("#mdl_"+id).modal("hide");
					}
					 			
				}
		});     
};  
 function updateFormKikd(id)
{		
		var form = $("#"+id);
		var link = $(form).attr("url");
	 
		$(form).ajaxForm({
		 url:link,
		 data: $(form).serialize(),
		 method:"POST",
		 dataType:"JSON",
		 beforeSend: function() {
               loading("area_"+id);
            },
		 success: function(data)
				{ 	   unblock("area_"+id); 	
					if(data["duplikat"]==true)
					{
						notif_error("<span class='col-white'><b>Gagal!</b><br>No KIKD pada mapel tersebut sudah diinput.</span>");
					 
					}else{
					  $("#"+id)[0].reset();
					  $("#mdl_"+id).modal("hide"); 
					  reload_table();
					  berhasil_disimpan();
					 		
					  $("#mdl_"+id).modal("hide");
					}
					 			
				}
		});     
};  
function submitFormMaterix(id)
{		
		var form = $("#"+id);
		var link = $(form).attr("url");
	 
		$(form).ajaxForm({
		 url:link,
		 data: $(form).serialize(),
		 method:"POST",
		 dataType:"JSON",
		 beforeSend: function() {
               loading("area_"+id);
            },
		 success: function(data)
				{ 	   unblock("area_"+id); 	
					if(data["hp"]==false)
					{	  
							notif("<b>Gagal  !!</b><br>- Kolom HP ada yang belum diisi.");
					}else if(data["nip_duplicate"]==true)
					{	  
							notif("<b>Gagal  !!</b><br>- NIP sudah terdaftar pada database.");
					}else if(data["nis_duplicate"]==true)
					{	  
							notif("<b>Gagal  !!</b><br>- NISN sudah terdaftar pada database.");
					}else if(data["nip"]==false)
					{	  
							notif("<b>Gagal  !!</b><br>- Kolom NIP ada yang belum diisi.");
					}else if(data["nis"]==false)
					{	  
							notif("<b>Gagal  !!</b><br>- Kolom NISN ada yang belum diisi.");
					}else if(data["id_kelas"]==false)
					{	  
							notif("<b>Gagal  !!</b><br>- Kolom ID KELAS salah pengisian.");
					}else if(data["id_tahun_masuk"]==false)
					{	  
							notif("<b>Gagal  !!</b><br>- Kolom ID TAHUN MASUK salah pengisian.");
					}else if(data["size"]==false)
					{	  
							notif("<b>Gagal  !!</b><br>- Upload File Maksimal "+data["maxsize"]+"MB.");
					}else if(data["file"]==false)
					{	  
							notif("<b>Gagal  !!</b><br>- File yang diizinkan adalah "+data["type_file"]+".");
					}else if(data["token"]==false)
					{
						notif_error("<span class='col-white'><b>Gagal!</b>  Silahkan coba lagi.</span>");
						$("#mdl_"+id).modal("hide");
					}else if(data["import_data"]==true)
					{
						$("#"+id)[0].reset();
						  $("#mdl_"+id).modal("hide"); 
						  reload_table();
						notif_success("<span class='sadow white'><div class='demo-google-material-icon'> <i class='material-icons'>done_all</i> <span class='icon-name'>Berhasil disimpan</span><br> - Ditambahkan "+data['data_insert']+" data<br> - Diperbaharui "+data['data_edit']+" data</div></span>");
					 		
						$("#mdl_"+id).modal("hide");
					}else{
					  $("#"+id)[0].reset();
					  $("#mdl_"+id).modal("hide"); 
					  reload_table();
					  berhasil_disimpan();
					 		
					  $("#mdl_"+id).modal("hide");
					}
					 			
				}
		});     
};
  
function submitFormMateri(id)
{		
		var form = $("#"+id);
		var idadd = $(form).attr("idadd");
		var link = $(form).attr("url");
	 
		$(form).ajaxForm({
		 url:link,
		 data: $(form).serialize(),
		 method:"POST",
		 dataType:"JSON",
		 beforeSend: function() {
               loading("area_"+id);
            },
		 success: function(data)
				{ 	   unblock("area_"+id); 	
					
					if(data["size"]==false)
					{	  
							notif("<b>Gagal  !!</b><br>- Upload File Maksimal "+data["maxsize"]+"MB.");
					}else if(data["file"]==false)
					{	  
							notif("<b>Gagal  !!</b><br>- File yang diizinkan adalah "+data["type_file"]+".");
					}else{
					
					  $("#"+id)[0].reset();
					 
					  dataMateri(data["idadd"]);
					  berhasil_disimpan();
					   $("[name='link']").prop("required",true);
					   $("[name='upload']").prop("required",false);
					}
				 
						
				}
		});     
};

 function importFormKikd(id)
{		
		var form = $("#"+id);
		var idmapel = $("[name='id_mapel_ajar']").val();
		var file = $("[name='file']").val();
		var link = $(form).attr("url");
		 
	 if(idmapel=="" || idmapel==null)
	 {
		 notif("<b>Silahkan pilih Mapel/Kelas terlebih dahulu !");
		 
	}else if(file=="" || file==null)
	 {
		  notif("<b>Silahkan pilih file yang akan diimport !");
	 }
	
		$(form).ajaxForm({
		 url:link+"?idmapel="+idmapel,
		 data: $(form).serialize(),
		 method:"POST",
		 dataType:"JSON",
		 beforeSend: function() {
             loading("area_"+id);
            },
		 success: function(data)
				{ 	  unblock("area_"+id); 	
				   reload_table();
					if(data["file"]==false)
					{	  
							notif("<b>Gagal  !!</b><br>- File yang diizinkan adalah "+data["type_file"]+".");
							 $("#"+id)[0].reset();
					}else if(data["validasi"]==false)
					{	  
							notif("<b>Gagal !! Silahkan periksa file dan tahapan penginputan.</b>");
					}else if(data["duplikat"]==false)
					{	  
							notif("<b>Gagal !! Terdapat data yang sudah pernah diinput.</b>");
					}else if(data["format_kd3"]==false)
					{	  
							notif("<b>Gagal !! Terdapat Format Penulisan No.KD yang kosong atau salah.</b>");
					}else if(data["format_kd4"]==false)
					{	  
							notif("<b>Gagal !! Terdapat Format Penulisan No.KI yang kosong atau salah.</b>");
					}else
					{	  
							notif("<b>Berhasil ditambahkan : "+data["data_insert"]+"");
							 $("#"+id)[0].reset();
					}
						 
				}
		});   

 	
};

  