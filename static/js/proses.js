


$(document).on('submit', 'form#savesummer', function (event, messages) {
	 event.preventDefault()
       var form   = $(this);
       var urlnya = $(this).attr("url");
	   var isi    = $('.summernote').code();
	   var formData = new FormData(this);
       formData.append('isi', isi);
	  loading();
        $.ajax({
            type: "POST",
            url: urlnya,
            
			data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
			contentType: false,       // The content type used when sending data to the server.
			cache: false,             // To unable request pages to be cached
			processData:false,    
			success: function (response, status, xhr) {
                var ct = xhr.getResponseHeader("content-type") || "";
                if (ct == "application/json") {
                    
                    $("#errorvalidation").show();
                    $("#messagevalidation").html(response.message);
                    $('html, body').animate({
                        scrollTop: $("#headerawal").offset().top
                    }, 1000);
					$('#errorvalidation').show('slow').delay(3000).hide('slow');
                } else {
					
                   alertify.success("Data Berhasil Di Simpan");
				   $("#showform").html("");
				   dataTable.ajax.reload(null,false);
					
				   
				    
				   
                }
				
				Metronic.unblockUI();
            }
        });

        return false;
    });		
	
	
	$(document).on('submit', 'form#savesummernotrespond', function (event, messages) {
	 event.preventDefault()
       var form   = $(this);
       var urlnya = $(this).attr("url");
	   var isi    = $('.summernote').code();
	   var formData = new FormData(this);
       formData.append('isi', isi);
	  loading();
        $.ajax({
            type: "POST",
            url: urlnya,
            
			data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
			contentType: false,       // The content type used when sending data to the server.
			cache: false,             // To unable request pages to be cached
			processData:false,    
			success: function (response, status, xhr) {
                var ct = xhr.getResponseHeader("content-type") || "";
                if (ct == "application/json") {
                    
                    $("#errorvalidation").show();
                    $("#messagevalidation").html(response.message);
                    $('html, body').animate({
                        scrollTop: $("#headerawal").offset().top
                    }, 1000);
					$('#errorvalidation').show('slow').delay(3000).hide('slow');
                } else {
					
                   alertify.success("Data Berhasil Di Simpan");
				  
					
				   
				    
				   
                }
				
				Metronic.unblockUI();
            }
        });

        return false;
    });		

$(document).on('submit', 'form#simpangambar', function (event, messages) {
	 event.preventDefault()
       var form   = $(this);
       var urlnya = $(this).attr("url");
	
	   var formData = new FormData(this);
   
	  loading();
        $.ajax({
            type: "POST",
            url: urlnya,
            
			data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
			contentType: false,       // The content type used when sending data to the server.
			cache: false,             // To unable request pages to be cached
			processData:false,    
			success: function (response, status, xhr) {
                var ct = xhr.getResponseHeader("content-type") || "";
                if (ct == "application/json") {
                    
                    $("#errorvalidation").show();
                    $("#messagevalidation").html(response.message);
                    $('html, body').animate({
                        scrollTop: $("#headerawal").offset().top
                    }, 1000);
					$('#errorvalidation').show('slow').delay(3000).hide('slow');
                } else {
					
                   alertify.success("Data Berhasil Di Simpan");
				   $("#showform").html("");
				   dataTable.ajax.reload(null,false);
					
				   
				    
				   
                }
				
				Metronic.unblockUI();
            }
        });

        return false;
    });		
		
	
$(document).on('submit', 'form#sendall', function (event, messages) {
	 event.preventDefault()
       var form   = $(this);
       var urlnya = $("#urlnya").val();
	  loading();
        $.ajax({
            type: "POST",
            url: urlnya,
            data: form.serialize(),
			success: function (response, status, xhr) {
                var ct = xhr.getResponseHeader("content-type") || "";
                if (ct == "application/json") {
                    
                    $("#errorvalidation").show();
                    $("#messagevalidation").html(response.message);
                    $('html, body').animate({
                        scrollTop: $("#headerawal").offset().top
                    }, 1000);
					
					 $("input[name='csrf_ppdb_kemenag']").val($.cookie('csrf_kemenag_ppdb'));
                } else {
					
                   alertify.success("Data Berhasil Di Kirim");
			
                   document.getElementById("sendall").reset();
				  
				   
                }
				
				jQuery.unblockUI({ });
            }
        });

        return false;
    }); 
	
 $(document).on("click","#tambahdata",function(event){
	 event.preventDefault()
	    loading();
	 var urlnya = $(this).attr("urlnya");
	 $.post(urlnya,{csrf_ppdb_kemenag:$.cookie('csrf_kemenag_ppdb')},function(data){
		 
		 $("#showform").html(data).show();
		  $('html, body').animate({
                        scrollTop: $("#showform").offset().top
                    }, 1000);
		 	jQuery.unblockUI({ });
	 })
	 
 })
 
 $(document).on("click",".ubah",function(event){
	 event.preventDefault()
	 var urlnya = $(this).attr("urlnya");
	 var id = $(this).attr("datanya");
	 

	 loading();
	 $.post(urlnya,{id:id,csrf_ppdb_kemenag:$.cookie('csrf_kemenag_ppdb')},function(data){
		 
		 $("#showform").html(data).show();
		 
		   $('html, body').animate({
                        scrollTop: $("#showform").offset().top
                    }, 1000);
			jQuery.unblockUI({ });
	 })
	 
 })
 
 
 
 $(document).on("change",".onchange",function(event){
	 event.preventDefault()
	 var url    = $(this).attr("url");
	 var target = $(this).attr("target");
	 
  if(url !="" && $(this).val() !=""){
	 loading();
	 $("input[name='csrf_ppdb_kemenag']").val($.cookie('csrf_kemenag_ppdb'));
	 $.post(url,{id:$(this).val(),csrf_ppdb_kemenag:$.cookie('csrf_kemenag_ppdb')},function(data){
		 
		 $("."+target).html(data).show();
		$("input[name='csrf_ppdb_kemenag']").val($.cookie('csrf_kemenag_ppdb'));
		 
		   
			jQuery.unblockUI({ });
			
			
	 })
  }
  
  
 })
  
 $(document).on("click","#cancel",function(){
	 
	
		 
		 $("#showform").html("");
		 
	
	 
 })
 
  $(document).on("click","#cancell",function(){
	 
	
		 var url = $(this).attr("urlnya");
		 
		 location.href=url;
		 $("#showform").hide();
		 
	
	 
 })
 
 $(document).on('submit', 'form#formshow', function (event, messages) {
	 event.preventDefault()
       var form   = $(this);
       var urlnya = $("#urlnya").val();
	  loading();
        $.ajax({
            type: "POST",
            url: urlnya,
            data: form.serialize(),
			success: function (response, status, xhr) {
                var ct = xhr.getResponseHeader("content-type") || "";
                if (ct == "application/json") {
                    
                    $("#errorvalidation").show();
                    $("#messagevalidation").html(response.message);
                    $('html, body').animate({
                        scrollTop: $("#headerawal").offset().top
                    }, 1000);
					$('#errorvalidation').show('slow').delay(3000).hide('slow');
                } else {
                   alertify.success("Data Berhasil Di Simpan");
				    $("#showform").html("");
					
				    $("#loaddata").html(response).show();
                 
				  
				   
                }
				
				jQuery.unblockUI({ });
            }
        });

        return false;
    });
	
	
	
	 $(document).on('submit', 'form#simpanSambutan', function (event, messages) {
	 event.preventDefault()
       var form   = $(this);
       var urlnya = $(this).attr("url");
	  loading();
        $.ajax({
            type: "POST",
            url: urlnya,
            data: form.serialize(),
			success: function (response, status, xhr) {
                var ct = xhr.getResponseHeader("content-type") || "";
                if (ct == "application/json") {
                    
                    $("#errorvalidation").show();
                    $("#messagevalidation").html(response.message);
                    $('html, body').animate({
                        scrollTop: $("#headerawal").offset().top
                    }, 1000);
					$('#errorvalidation').show('slow').delay(3000).hide('slow');
					
					$("input[name='csrf_ppdb_kemenag']").val($.cookie('csrf_kemenag_ppdb'));
                } else {
                    alertify.success("Data Berhasil Di Simpan");
				    $("#showform").html("");
					
				  loadSambutan();
                 
                }
				
				jQuery.unblockUI({ });
            }
        });

        return false;
    });
	
	
	
	
	 $(document).on('submit', 'form#simpan', function (event, messages) {
	 event.preventDefault()
       var form   = $(this);
       var urlnya = $(this).attr("url");
	  loading();
        $.ajax({
            type: "POST",
            url: urlnya,
            data: form.serialize(),
			success: function (response, status, xhr) {
                var ct = xhr.getResponseHeader("content-type") || "";
                if (ct == "application/json") {
                    
                    $("#errorvalidation").show();
                    $("#messagevalidation").html(response.message);
                    $('html, body').animate({
                        scrollTop: $("#headerawal").offset().top
                    }, 1000);
					$('#errorvalidation').show('slow').delay(3000).hide('slow');
					
					$("input[name='csrf_ppdb_kemenag']").val($.cookie('csrf_kemenag_ppdb'));
                } else {
                    alertify.success("Data Berhasil Di Simpan");
				    $("#showform").html("");
					
				    dataTable.ajax.reload(null,false);
                 
				  
				   
                }
				
				jQuery.unblockUI({ });
            }
        });

        return false;
    });
	
	
	
	
	
	 $(document).on('submit', 'form#simpannorespon', function (event, messages) {
	
       var form   = $(this);
       var urlnya = $(this).attr("url");
	  loading();
        $.ajax({
            type: "POST",
            url: urlnya,
            data: form.serialize(),
			success: function (response, status, xhr) {
                var ct = xhr.getResponseHeader("content-type") || "";
                if (ct == "application/json") {
                    
                    
                    $('html, body').animate({
                        scrollTop: $("#headerawal").offset().top
                    }, 1000);
					$('html, body').animate({
											scrollTop: $("#headerawal").offset().top
										}, 1000);
										toastr.error(response.message, "Gagal  , perhatikan !  ", {
										"timeOut": "0",
										"extendedTImeout": "0",
										"closeButton": true,
										  "debug": false,
										  "positionClass": "toast-bottom-right",
										  "onclick": null,
										  "showDuration": "10000",
										  "hideDuration": "10000",
										  "timeOut": "50000",
										  "extendedTimeOut": "10000",
										  "showEasing": "swing",
										  "hideEasing": "linear",
										  "showMethod": "fadeIn",
										  "hideMethod": "fadeOut"
									});
					
					$("input[name='csrf_ppdb_kemenag']").val($.cookie('csrf_kemenag_ppdb'));
                } else {
                    alertify.success("Data Berhasil Di Simpan");
				    $("input[name='csrf_ppdb_kemenag']").val($.cookie('csrf_kemenag_ppdb'));
                 
				  
				   
                }
				
				jQuery.unblockUI({ });
            }
        });

        return false;
    });
	
	

	
	 $(document).on('submit', 'form#simpanfoto', function (event, messages) {
	 event.preventDefault()
       var form   = $(this);
       var urlnya = $(this).attr("url");
	  loading();
        $.ajax({
            type: "POST",
            url: urlnya,
            
			data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
			contentType: false,       // The content type used when sending data to the server.
			cache: false,             // To unable request pages to be cached
			processData:false,    
			success: function (response, status, xhr) {
                var ct = xhr.getResponseHeader("content-type") || "";
                if (ct == "application/json") {
                    
                    $("#errorvalidation").show();
                    $("#messagevalidation").html(response.message);
                    $('html, body').animate({
                        scrollTop: $("#headerawal").offset().top
                    }, 1000);
					$('#errorvalidation').show('slow').delay(3000).hide('slow');
                } else {
					
                   alertify.success("Data Berhasil Di Simpan");
				   $("#showform").html("");
					
				     dataTable.ajax.reload(null,false);
				    
				   
                }
				
				Metronic.unblockUI();
            }
        });

        return false;
    });
	
	
	$(document).on('submit', 'form#formshowintegrasi', function (event, messages) {
	 event.preventDefault()
	               $("#errorvalidation").show();
                    $("#messagevalidation").html("Proses integrasi sedang berlangsung, harap tunggu .... ");
                    $('html, body').animate({
                        scrollTop: $("#headerawal").offset().top
                    }, 1000);
       var form   = $(this);
       var urlnya = $("#urlnya").val();
	  loading();
        $.ajax({
            type: "POST",
            url: urlnya,
            data: form.serialize(),
			success: function (response, status, xhr) {
                var ct = xhr.getResponseHeader("content-type") || "";
                if (ct == "application/json") {
                    
                    $("#errorvalidation").show();
                    $("#messagevalidation").html(response.message);
                    $('html, body').animate({
                        scrollTop: $("#headerawal").offset().top
                    }, 1000);
                } else {
                   
				    $("#errorvalidation").hide();
					alertify.alert("Aplikasi berhasil di instal");
					
					location.href=site_url+"app";
					
					
				   
                }
				
				jQuery.unblockUI({ });
            }
        });

        return false;
    });
	
	
	 $(document).on('submit', 'form#generateresi', function (event, messages) {
	 event.preventDefault()
       var form   = $(this);
       var urlnya = $("#urlnya").val();
	   var selected = new Array();
	  loading();
	   $("input:checkbox[name=kolom]:checked").each(function() {
       selected.push($(this).val());
		});
        $.ajax({
            type: "POST",
            url: urlnya+"?kolom="+selected+"",
            data: form.serialize(),
			success: function (response, status, xhr) {
                var ct = xhr.getResponseHeader("content-type") || "";
                if (ct == "application/json") {
                    
                  
                } else {
                  
					
				    $("#kodepreview").val(response);
				    $("#loadwidget").html(response);
                 
				  
				   
                }
				
				jQuery.unblockUI({ });
            }
        });

        return false;
    });
	
	$(document).on('submit', 'form#formshownorespon', function (event, messages) {
	 event.preventDefault()
       var form   = $(this);
       var urlnya = $("#urlnya").val();
	   loading();
        $.ajax({
            type: "POST",
            url: urlnya,
            data: form.serialize(),
			success: function (response, status, xhr) {
                var ct = xhr.getResponseHeader("content-type") || "";
                if (ct == "application/json") {
                     $("#errorvalidation").show();
                    $("#messagevalidation").html(response.message);
                    $('html, body').animate({
                        scrollTop: $("#headerawal").offset().top
                    }, 1000);
                  
                } else {
                   alertify.success("Data Berhasil Di Simpan");
				  // $("#showform").html("");
                 
				   document.getElementById("formshownorespon").reset();
				   
                }
				
				jQuery.unblockUI({ });
            }
        });

        return false;
    });
	
 
 $(document).on("click",".hapus",function(){
	 var id     = $(this).attr("datanya");
	 var urlnya = $(this).attr("urlnya");
	
	alertify.confirm("Apakah anda yakin akan menghapus data ini ?",function(){
		 loading();
	 $.post(urlnya,{id:id,csrf_ppdb_kemenag:$.cookie('csrf_kemenag_ppdb')},function(data){
		 
		 dataTable.ajax.reload(null,false);
		 
			jQuery.unblockUI({ });
	 })
	 })
	
	 
 })
 
  $(document).on("click",".hapusdatatable",function(){
	 var id     = $(this).attr("datanya");
	 var urlnya = $(this).attr("urlnya");
	
	alertify.confirm("Apakah anda yakin akan menghapus data ini ?",function(){
		 loading();
	 $.post(urlnya,{id:id},function(data){
		 
		 
		   alertify.alert("Data Berhasil Di Hapus, Silahkan  Refresh table");
			jQuery.unblockUI({ });
	 })
	 })
	
	 
 })
 
  $(document).on("click",".hapusgambar",function(){
	 var id     = $(this).attr("datanya");
	 var urlnya = $(this).attr("urlnya");
	 var gambar = $(this).attr("gambar");
	
	alertify.confirm("Apakah anda yakin akan menghapus data ini ?",function(){
		loading();
	 $.post(urlnya,{id:id,gambar:gambar},function(data){
		 
		  dataTable.ajax.reload(null,false);
		 jQuery.unblockUI({ });
	 })
	 })
	
	 
 })
 
 $(document).on('submit', 'form#formcari', function (event, messages) {
	 event.preventDefault()
       var form   = $(this);
	   loading();
       var urlnya = $("#urlcari").val();
        $.ajax({
            type: "POST",
            url: urlnya,
            data: form.serialize(),
			success: function (response, status, xhr) {
             
					
				    $("#loaddata").html(response).show();
					
					var tambahprivelege = $("#tambahprivelege").val();
					var ubahprivelege = $("#ubahprivelege").val();
					var hapusprivelege = $("#hapusprivelege").val();
					  
					  if(tambahprivelege==1){ $("#tambahdata").hide(); $("#mastersimpan").hide(); }
					  if(ubahprivelege==1){ $(".ubah").hide(); $(".masterubah").hide() }
					  if(hapusprivelege==1){ $(".hapus").hide(); $(".masterhapus").hide() }
                 
				   jQuery.unblockUI({ });
				
            }
        });

        return false;
    });
	
	
 
 $(document).on('submit', 'form#formcaripopup', function (event, messages) {
	 event.preventDefault()
       var form   = $(this);
       var urlnya = $("#urlcari").val();
	 // loading();
        $.ajax({
            type: "POST",
            url: urlnya,
            data: form.serialize(),
			success: function (response, status, xhr) {
             
					
				    $("#loaddatapopup").html(response).show();
           //
		   jQuery.unblockUI({ });
				  
				
            }
        });

        return false;
    });
 
  
 $(document).on('submit', 'form#formcaripopup2', function (event, messages) {
	 event.preventDefault()
       var form   = $(this);
       var urlnya = $("#urlcari").val();
	  // loading();
        $.ajax({
            type: "POST",
            url: urlnya,
            data: form.serialize(),
			success: function (response, status, xhr) {
             
					
				    $("#loaddatapopup2").html(response).show();
           //   jQuery.unblockUI({ });
				  
				
            }
        });

        return false;
    });
 
 $(document).on("click","#checkAll",function () {    
     var urlnya = $(this).attr("urlnya");
     $('input:checkbox').prop('checked', this.checked);
   	 var jenjang = $("#jenjang").val();
     if(jenjang==""){ alertify.alert("Anda Belum Memilih Jenjang yang akan di verifikasi"); return false; }
	 if($(this).is(':checked')){
      alertify.confirm("Apakah anda yakin akan verifikasi semua  data siswa?",function(){
		  
		   loading();
      $.post(urlnya,{jenjang:jenjang},function(){
		  
		alertify.success("Seluruh Siswa Berhasil Di Verifikasi");
		  jQuery.unblockUI({ });
	  })
	  })
     
      }
	 

	 
 });
 
 
  
 $(document).on("click","#checkAllpenggajian",function () {    
      
	   var valnya =  $(this).text();
	     if(valnya=="uncheck all"){
			 
			 $('input:checkbox').attr('checked',false);
             $(this).text('Pilih Semua');
			 
		 }else{
			$('input:checkbox').attr('checked',true);
            $(this).text('uncheck all'); 
			 
		 }
	 
        
          
   

	 
 });
 
 
  $(document).on("click",".verifikasi",function () {    
    var urlnya  = $(this).attr("urlnya");
    var id      = $(this).attr("datanya");
	
     if($(this).is(':checked')){
      loading();
      $.post(urlnya,{id:id,value:2},function(){
		  
		alertify.success("Siswa Berhasil Di Verifikasi");
		  jQuery.unblockUI({ });
	  })
     
      }else{
     
       loading();
       $.post(urlnya,{id:id,value:1},function(){
		  
		  alertify.success("Verifikasi Siswa Berhasil di Batalkan");
		   jQuery.unblockUI({ });
	  });
   	
	   }

	 
 });
 
 
 
 $(document).on('submit', 'form#formshowreload', function (event, messages) {
       var form   = $(this);
       var urlnya = $("#urlnya").val();
       var reload = $("#reload").val();
	  //   loading();
        $.ajax({
            type: "POST",
            url: urlnya,
            data: form.serialize(),
			success: function (response, status, xhr) {
                var ct = xhr.getResponseHeader("content-type") || "";
                if (ct == "application/json") {
                    
                    $("#errorvalidation").show();
                    $("#messagevalidation").html(response.message);
                    $('html, body').animate({
                        scrollTop: $("#headerawal").offset().top
                    }, 1000);
                } else {
                   alertify.success("Data Berhasil Di Ubah");
				    $("#showform").hide();
					location.href=reload;
				    $("#loaddata").html(response).show();
                    
				  
				   
                }
				//  jQuery.unblockUI({ });
            }
        });

        return false;
    });
	
 
 
 $(document).on("change","#jenjangchange",function(){
	 var url = $(this).attr("urlchange");
	 var id  = $(this).val();
	 if(id !=10){
		 
		 $(".kelaschange").attr("required","required");
		 
	 }else{
		 
		  $(".kelaschange").removeAttr("required","required");
		 
	 }
	 $("#ruang").html("").show();
	 loading();
	 $.post(url,{id:id},function(data){
		 
		 $("#kelas").html(data).show();
		  jQuery.unblockUI({ });
		 
	 })
	 
	 
	 
	 
 })
 
  $(document).on("change",".kelaschange",function(){
	 var url = $(this).attr("urlchange");
	 var id  = $(this).val();
	loading();
	 $.post(url,{id:id},function(data){
		 
		 $("#ruang").html(data).show();
		 jQuery.unblockUI({ });
	 })
	 
	 
	 
	 
 })
 
 
 
  $(document).on("change",".changekelasgrid",function(){
	 var url = $(this).attr("urlchange");
	 var no = $(this).attr("attrid");
	 var id  = $(this).val();
	loading();
	 $.post(url,{id:id},function(data){
		 
		 $("#tmruang_id"+no).html(data).show();
		 jQuery.unblockUI({ });
	 })
	 
	 
	 
	 
 })
 
 
 //Tagihan
  $(document).on("click",".tambahtagihan",function(){
	 
	 var urlnya  = $(this).attr("urlnya");
	 var id      = $(this).attr("dataid");
	 var jenjang = $(this).attr("jenjang");
	 var kelas   = $(this).attr("kelas");
	 
	   $('html, body').animate({
                        scrollTop: $("#showform").offset().top
                    }, 1000);
					
					loading();
	 $.post(urlnya,{id:id,jenjang:jenjang,kelas:kelas},function(data){
		 
		 $("#showform").html(data).slideDown();
		  jQuery.unblockUI({ });
	 })
	 
 })
 
 $(document).on("change","#tagihanchange",function(){
	var id = $(this).val();
	var urlnya  = $(this).attr("urlnya");
	loading();
	$.post(urlnya,{id:id},function(data){
		 
		 $("#jumlahchange").val(data);
		  jQuery.unblockUI({ });
	 })
})



	 $(document).on("click","#appenddata",function(){
		var jumlah 			= parseInt($("#jumlah").val()) +1;
		var tagihanchange   = $("#tagihanchange").val();
		var nama       		= $("#tagihanchange option:selected").text();
		var jumlahchangeasli= $("#jumlahchange").val();
		var jumlahchange    = $("#jumlahchange").val();
		var potongan_change = $("#potongan_change").val();
		var s_potongan 		= "";
		  if(potongan_change==1){
			  
			 var potongan  = $("#potongan").val();
			  
			  potonganbagi = (potongan * jumlahchange ) / 100;
			  jumlahchange =jumlahchange - potonganbagi;
			  
			  s_potongan   = "%"; 
			  
		  }else if(potongan_change==2){
			    var potongan 		= $("#potongan").val();
				
					
			   s_potongan   = "Rupiah"; 
				
			   jumlahchange =jumlahchange - potongan;
			  
		  }
		
		
		
		if(tagihanchange==""){
			
			alertify.alert("Anda Harus Memilih Tagihan");
			return false;
		}
		var html = "<tr id='row"+jumlah+"'>";
			html +="<td>"+jumlah+"</td>";
			html +="<td><input type='hidden' name='tmkeuangan_id"+jumlah+"' value='"+tagihanchange+"'>"+nama+"</td>";
			html +="<td><input type='hidden' readonly name='tagihanasli"+jumlah+"' id='tagihanasli"+jumlah+"' class='form-control' value='"+jumlahchange+"'>"+jumlahchangeasli+"</td>";
			html +="<td><input type='hidden' readonly name='potongan"+jumlah+"' id='potongan"+jumlah+"' class='form-control' value='"+potongan+"'><input type='hidden'  name='tipe_potongan"+jumlah+"' id='tipe_potongan"+jumlah+"' class='form-control' value='"+s_potongan+"'>"+potongan+" "+s_potongan+"</td>";
			html +="<td><input type='number' min='1' name='dikalikan"+jumlah+"' jumlah='"+jumlah+"' class='kalikan form-control' value='1'></td>";
			html +="<td><input type='text' readonly  name='tagihan"+jumlah+"' id='subtotal"+jumlah+"' class='form-control' value='"+jumlahchange+"'></td>";
		
			html +="<td><button type='button' class='btn btn-warning batalappend' id='batalappend' row='"+jumlah+"' >Batal </button> </td>";
			html +="</tr>";
		$("#jumlah").val(jumlah);
		$("#loadappend").append(html);
	})
	
$(document).on("click",".batalappend",function(){
	
	var id = $(this).attr("row");
	var data_url = $(this).attr("data-url");
	var idnya = $(this).attr("data-id");
	  $.post(data_url,{id:idnya},function(){
		  
		  $("#row"+id).remove();
	  })
	  
	
	
})

$(document).on("click",".batalpelajaran",function(){
	
	var id = $(this).attr("row");
	
		  
		  $("#row"+id).remove();
	
	  
	
	
})



 $(document).on("click","#tambahbeasiswa",function(){
		var jumlah 			= parseInt($("#jumlah_beasiswa").val()) +1;
		var jenisbeasiswa   = $("#jenisbeasiswa").val();
		var nama       		= $("#jenisbeasiswa option:selected").text();
		var penyelenggara   = $("#penyelenggara").val();
		var tahun_mulai_beasiswa    = $("#tahun_mulai_beasiswa").val();
		var tahun_selesai_beasiswa = $("#tahun_selesai_beasiswa").val();
		
		
		
		if(jenisbeasiswa==""){
			
			alertify.alert("Anda Harus Memilih Beasiswa");
			return false;
		}
		var html = "<tr id='row"+jumlah+"'>";
			html +="<td>"+jumlah+"</td>";
			html +="<td><input type='hidden' name='jenisbeasiswa"+jumlah+"' value='"+nama+"'>"+nama+"</td>";
			html +="<td><input type='text'  name='penyelenggara"+jumlah+"' id='penyelenggara"+jumlah+"' class='form-control' value='"+penyelenggara+"'></td>";
			html +="<td><input type='text' name='tahun_mulai_beasiswa"+jumlah+"' id='tahun_mulai_beasiswa"+jumlah+"' class='form-control' value='"+tahun_mulai_beasiswa+"'></td>";
			html +="<td><input type='text' name='tahun_selesai_beasiswa"+jumlah+"' id='tahun_selesai_beasiswa"+jumlah+"' class='form-control' value='"+tahun_selesai_beasiswa+"'></td>";
			
			html +="<td><button type='button' class='btn btn-warning batalbeasiswa' id='batalbeasiswa' row='"+jumlah+"' >Batal </button> </td>";
			html +="</tr>";
		$("#jumlah_beasiswa").val(jumlah);
		$("#body_beasiswa").append(html);
	})
	
$(document).on("click",".batalbeasiswa",function(){
	
	var id = $(this).attr("row");
	
		  $("#row"+id).remove();
	
	  
	
	
})



 $(document).on("click","#tambahprestasi",function(){
		var jumlah 			= parseInt($("#jumlah_prestasi").val()) +1;
		var tahun           = $("#tahun").val();
		var lomba           = $("#lomba").val();
		var juara           = $("#juara").val();
		var tingkat           = $("#tingkat").val();
		var jenis            = $("#jenis").val();
		
		
		
		
		if(tahun==""){
			
			alertify.alert("Anda Harus Memilih Tahun");
			return false;
		}
		var html = "<tr id='row"+jumlah+"'>";
			html +="<td>"+jumlah+"</td>";
			html +="<td><input type='hidden' name='tahun"+jumlah+"' value='"+tahun+"'>"+tahun+"</td>";
			html +="<td><input type='text'  name='lomba"+jumlah+"' id='lomba"+jumlah+"' class='form-control' value='"+lomba+"'></td>";
			html +="<td><input type='text' name='juara"+jumlah+"' id='juara"+jumlah+"' class='form-control' value='"+juara+"'></td>";
			html +="<td><input type='text' name='tingkat"+jumlah+"' id='tingkat"+jumlah+"' class='form-control' value='"+tingkat+"'></td>";
			html +="<td><input type='text' name='jenis"+jumlah+"' id='jenis"+jumlah+"' class='form-control' value='"+jenis+"'></td>";
			
			html +="<td><button type='button' class='btn btn-warning batalbeasiswa' id='batalbeasiswa' row='"+jumlah+"' >Batal </button> </td>";
			html +="</tr>";
		$("#jumlah_prestasi").val(jumlah);
		$("#body_prestasi").append(html);
	})
	
$(document).on("click",".batalbeasiswa",function(){
	
	var id = $(this).attr("row");
	
		  $("#row"+id).remove();
	
	  
	
	
})


$(document).on("input",".kalikan",function(){
	
	var jumlah      = $(this).attr("jumlah");
	var jumlahkali  = $(this).val();
	var tagihanasli = $("#tagihanasli"+jumlah).val();
	var subtotal 	= jumlahkali * tagihanasli; 
	$("#subtotal"+jumlah).val(subtotal);
	console.log(subtotal)
	
})

$(document).on("input",".dibayarbro",function(){
	
	
	var id      = $(this).attr("attribut");
	var val    = $(this).val();
	var hutang = $("#hutang"+id).val();
	if(isNaN(val)){
		alertify.alert("Inputan Tidak Boleh Mengandung koma, titik atau string huruf");
		$(this).val("");
		return false;
	}
	  if(hutang <= val){
		  
		  $("#status"+id).html("<span class='glyphicon glyphicon-ok-sign'></span>   Lunas");
		  
	  }else if(hutang!=val){
		  
		  $("#status"+id).html("<span class='glyphicon glyphicon-remove-sign'></span>  Belum Lunas");
	  }
	
})
 
 
 //generate
 
  $(document).on("click","#generatekode",function(){
	
	var urlnya  = $(this).attr("urlnya");
	loading();
	
	var jenjang = $("#jenjang").val();
	var jumlah 	= $("#jumlah").val();
	if(jenjang ==""){
		
		alertify.alert("Anda Harus Memilih Jenjang");
		  
		return false;
	}
	$.post(urlnya,{jenjang:jenjang,jumlah:jumlah},function(data){
		 
		 $("#loaddata").html(data);
		 jQuery.unblockUI({ });
	 })
})
 
 
 

	 $(document).on("click","#appenddatamapel",function(){
		var jumlah = parseInt($("#jumlah").val()) +1;
		var tmpelajaran_id = $("#tmpelajaran_id").val();
		var nama       = $("#tmpelajaran_id option:selected").text();
	
		if(tmpelajaran_id==""){
			
			alertify.alert("Anda Harus Memilih Pelajaran");
			return false;
		}
		var html = "<tr id='row"+jumlah+"'>";
			html +="<td>"+jumlah+"</td>";
			html +="<td><input type='hidden' name='tmpelajaran_id"+jumlah+"' value='"+tmpelajaran_id+"'>"+nama+"</td>";
			
			html +="<td><button type='button' class='btn btn-warning' id='batalappend' row='"+jumlah+"' >Batal </button> </td>";
			html +="</tr>";
		$("#jumlah").val(jumlah);
		$("#loadappend").append(html);
	})
	
	
	
	
	$(document).on("click","#appendjadwalpel",function(){
		var jumlah					  = parseInt($("#jumlah").val()) +1;
		var hari_id					  = $("#hari").val();
		var hari_nama 				  = $("#hari option:selected").text();
	     
		var jam_id     			      = $("#jam").val();
	
		var jam_nama     			  = $("#jam option:selected").text();
		
		var tmpelajaran_id 			  = $("#tmpelajaran_id").val();
	
		var tmpelajaran_id_nama       = $("#tmpelajaran_id option:selected").text();
		
		
		var guru_id 	 			  = $("#guru").val();
	
		var guru_nama			      = $("#guru option:selected").text();
		
		
		if(tmpelajaran_id==""){
			
			alertify.alert("Anda Harus Memilih Pelajaran");
			return false;
		}
		var html = "<tr id='row"+jumlah+"'>";
			html +="<td>"+jumlah+"</td>";
			html +="<td><input type='hidden' name='hari"+jumlah+"' value='"+hari_id+"'>"+hari_nama+"</td>";
			html +="<td><input type='hidden' name='tmjam_id"+jumlah+"' value='"+jam_id+"'>"+jam_nama+"</td>";
			html +="<td><input type='hidden' name='tmpelajaran_id"+jumlah+"' value='"+tmpelajaran_id+"'>"+tmpelajaran_id_nama+"</td>";
			html +="<td><input type='hidden' name='guru"+jumlah+"' value='"+guru_id+"'>"+guru_nama+"</td>";
			
			html +="<td><button type='button' class='btn btn-warning batalpelajaran' id='batalpelajaran' row='"+jumlah+"' >Batal </button> </td>";
			html +="</tr>";
		$("#jumlah").val(jumlah);
		$("#loadappend").append(html);
	})
	
		
	
 function loading() {
	
    return jQuery.blockUI({ css: { 
            border: '1px solid  #483D8B', 
            padding: '10px', 
			top: '60px',
			backgroundColor: '#000', 
            '-webkit-border-radius': '10px', 
            '-moz-border-radius': '10px', 
            opacity: .7, 
            color: '#fff' 
        } });              
}

function FormatCurrency(objNum)
{
   var num = objNum.value
   var ent, dec;
   
   if (num != '' && num != objNum.oldvalue)
   {
     num = HapusTitik(num);
     if (isNaN(num))
     {
       objNum.value = (objNum.oldvalue)?objNum.oldvalue:'';
     } else {
       var ev = (navigator.appName.indexOf('Netscape') != -1)?Event:event;
       if (ev.keyCode == 190 || !isNaN(num.split('.')[1]))
       {
         alert(num.split('.')[1]);
         objNum.value = TambahTitik(num.split('.')[0])+'.'+num.split('.')[1];
       }
       else
       {
         objNum.value = TambahTitik(num.split('.')[0]);
       }
       objNum.oldvalue = objNum.value;
     }
   }
}
function HapusTitik(num)
{
   return (num.replace(/\./g, ''));
}

function TambahTitik(num)
{
   numArr=new String(num).split('').reverse();
   for (i=3;i<numArr.length;i+=3)
   {
     numArr[i]+='.';
   }
   return numArr.reverse().join('');
} 
        
function formatCurrency(num) {
   num = num.toString().replace(/\$|\./g,'');
   if(isNaN(num))
   num = "0";
   sign = (num == (num = Math.abs(num)));
   num = Math.floor(num*100+0.50000000001);
   cents = num0;
   num = Math.floor(num/100).toString();
   for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
   num = num.substring(0,num.length-(4*i+3))+'.'+
   num.substring(num.length-(4*i+3));
   return (((sign)?'':'-') + num);
}				
 