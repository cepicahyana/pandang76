<script src="<?php echo base_url();?>plug/js/angular.js"></script>
	<script src="<?php echo base_url();?>plug/texteditor/ckeditor/ckeditor.js"></script>
	<script src="<?php echo base_url();?>plug/texteditor/ckeditor/adapters/jquery.js"></script>
	<script src="<?php echo base_url();?>plug/texteditor/ckeditor/jquery.ckeditor.config.js"></script>

<script src="http://maps.google.com/maps/api/js?sensor=false&amp;libraries=places&key=AIzaSyA8V020aIxzsnq7PlhFS0a0z50wgIgW7rM" type="text/javascript"></script>
 
 <script type="text/javascript">
    function initialize() {
        var input = document.getElementById('searchTextField');
        var autocomplete = new google.maps.places.Autocomplete(input);
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var place = autocomplete.getPlace();
      //      document.getElementById('city').value = place.name;
            document.getElementById('lat').value = place.geometry.location.lat();
            document.getElementById('long').value = place.geometry.location.lng();
            //alert("This function is working!");
            //alert(place.name);
           // alert(place.address_components[0].long_name);

        });
    }
    google.maps.event.addDomListener(window, 'load', initialize); 
</script>



<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>plug/boostrap/css/compiled/wizard.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/invoice.css">



<!-- Include Required Prerequisites -->
	  

<div ng-app="">
<div class="col-lg-12 col-md-12 col-sm-12 main-box" >
<span>
<header class="main-box-header clearfix">
<h2 class='sadow05 black' id="headinvo">Create New Event</h2>
</header>
</span>
<div class="main-box-body clearfix">
<div id="myWizard" class="wizard">

<div class="wizard-inner">

<ul class="steps" >
<li data-target="#step1" class="active"><span class="badge badge-primary">1</span>Step 1<span class="chevron"></span></li>
<li data-target="#step2"><span class="badge">2</span>Step 2<span class="chevron"></span></li>
<li data-target="#step3"><span class="badge">3</span>Step 3<span class="chevron"></span></li>
<li data-target="#step4"><span class="badge">4</span>Step 4<span class="chevron"></span></li>
</ul>
<div class="actions">
<button type="button" class="btn btn-default btn-mini btn-prev"> <i class="icon-arrow-left"></i>Prev</button>
<button type="button" class="btn btn-success btn-mini btn-next" data-last="Finish">Next<i class="icon-arrow-right"></i></button>
</div>

</div>

<div class="step-content">
<!----------------->
<div class="step-pane active" id="step1">
<br/>
<h4 >This is step 1</h4>
<form id="form" action="javascript:save()" >

<input type="hidden" id="lat" name="lat" />
<input type="hidden" id="long" name="long" />  
<span class="form-horizontal" style='font-size:17px'>
<div class="form-group">
	<label for="namaEven" class="black col-lg-3 control-label">Nama event</label>
	 <div class="col-lg-7">
		<input  ng-model="namaEvent" required type="text" class="form-control"  name="namaEven" id="namaEven" />
	 </div>
</div>

<div class="form-group">
	<label for="namaEvent" class="black col-lg-3 control-label">Jenis Formulir</label>
	 <div class="col-lg-7" data-toggle="tooltip" data-placement="top" title="jenis formulir yang akan digunakan saat registrasi">
		<?php
		$dbase="";
		foreach($dataForm as $op)
		{
		$dbase[$op->id_form]=$op->nama_form;
		}
		$array=$dbase;
		echo form_dropdown("jenisForm",$array,"",'class="form-control"');
		?>
	 </div>
</div>


<div class="form-group" >
	<label for="searchTextField" class="black col-lg-3 control-label">Lokasi</label>
	 <div class="col-lg-7">
		
		<input type="text" name="lokasi" class="form-control"  id="searchTextField" type="text" size="50" autocomplete="on" runat="server" />  
	 </div>
</div>






<input name="status" type='hidden' value="private"/>


<div class="form-group">
<label for="datesingle" class="black col-lg-3 control-label">Mulia</label>
<div class="input-group col-lg-7" data-toggle="tooltip" data-placement="top" title="tanggal event dimulai">
<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
<input required type="text" name="start" class="form-control" id="datesingle" >
</div>
</div>


<div class="form-group">
<label for="datesingle2" class="black col-lg-3 control-label">Selesai</label>
<div class="input-group col-lg-7" data-toggle="tooltip" data-placement="top" title="tanggal event selesai">
<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
<input required type="text" name="end" class="form-control" id="datesingle2" >
</div>
</div>

<script>
$('#datesingle2').daterangepicker({
			"singleDatePicker": true,
			locale: {
					format: 'DD/MM/YYYY'
				}
				});
</script>


</span>
</div>

<!-------------->


<div class="step-pane" id="step2">
<br/>
<h4>This is step 2</h4>
<span class="form-horizontal" style='font-size:17px'>
<!----------------->
<div class="form-group">
	<label for="quota" class="black col-lg-3 control-label">Quota</label>
	 <div class="col-lg-3">
		<input required type="text" class="form-control"  name="quota" id="quota" data-toggle="tooltip" data-placement="top" 
		title="tentukan jumlah quota peserta" />
	 </div>
</div>



<div class="form-group">
<label for="daterange" class="black col-lg-3 control-label">Batas Registrasi Peserta</label>
<div class="input-group col-lg-7" data-toggle="tooltip" data-placement="top" title="tentukan batas tanggal registrasi" >
<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
<input type="text" required class="form-control" name="tglreg" id="daterange" >
</div>
</div>



<div class="form-group">
	<label for="quota" class="black col-lg-3 control-label">Proses Penerimaan</label>
	 <div class="col-lg-7">
		<div class="radio" >
<input type="radio"  name="proses" id="optionsRadios1" value="1" checked="checked" >
<label for="optionsRadios1"  data-toggle="tooltip" data-placement="top" title="admin dapat meninjau data pendaftar terlebih dulu sebelum menyetujui">
Memerlukan persetujuan admin 
</label>
</div>
<div class="radio">
<input type="radio" name="proses" id="optionsRadios2" value="0">
<label for="optionsRadios2" data-toggle="tooltip" data-placement="top" title="semua pendaftar dapat mengikuti event tanpa persetujuan admin">
Semua pendaftar dapat mengikuti Event
</label>
</div>
	 </div>
</div>


<div class="form-group">
	<label for="quota" class="black col-lg-3 control-label">Sistem Tiket</label>
	 <div class="col-lg-7">
		<div class="radio" >
<input type="radio"  name="sistem_tiket" id="optionsRadios3" value="1" checked="checked" >
<label for="optionsRadios3"  data-toggle="tooltip" data-placement="top" title="tiket merupakan tanda bukti registrasi">
Peserta dapat mencetak tiket setelah mengisi form
</label>
</div>
<div class="radio">
<input type="radio" name="sistem_tiket" id="optionsRadios4" value="0">
<label for="optionsRadios4">
Tidak memerlukan tiket
</label>
</div>
	 </div>
</div>


  





</span>
<!-------------->


</div>


<!------------------------->




<div class="step-pane" id="step3">
<br/>
<h4>This is step 3 </h4>
<span class="form-horizontal" style='font-size:17px'>
<!----------------->


		<textarea style='display:none'  type="hidden" class="form-control" name="infoKontak" id="infoKontak"></textarea>
<center><b><span class='black'>Contoh Informasi Mengenai Event, Silahkan untuk di sesuaikan</span></b></center>
	 <div class="col-lg-12">
		<textarea id='infoEvent' name='infoEvent' class='texteditor'>
<center>
	<h1>
		PENDAFTARAN TES POTENSI AKADEMIK</h1>
	<h4>
		Institut Teknologi Bandung, Jalan Ganesha, West Java, Indonesia</h4>
	<table width="700px">
		<tbody>
			<tr>
				<td align="center">
					
							<img alt="" src="http://localhost/sibuta/plug/img/sample.jpg" style="width: 269px; height: 152px;" />
					</td>
			</tr>
			<tr>
				<td>
					<div align="center">
						<strong>Waktu pelaksanaan</strong><br />
						Minggu, 03/07/2016</div>
					<div align="center">
						<strong>Kontak Panitia</strong><br />
						Telp.022-553812 -&nbsp; panitia@gmail.com</div>
					<div style="text-align: justify;">
						<br />
						Bagi calon peserta S2 ITB yang belum mempunyai nilai TPA silahkan untuk segera mendaftrakan diri disini dengan mengisi FORM yang tersedia, setalah mendaftar mohon cetak bukti pendaftaran/TIKET dan pada saat pelaksanaan mohon untuk dibawa sebagai tanda bukti peserta TPA</div>
				</td>
			</tr>
		</tbody>
	</table>
</center>
</textarea>
	

</div>
</div>

<div class="step-pane" id="step4">
<br/>

<div class="main-box-body clearfix black">
<!----------------------------->
<?php $con=new konfig(); $dp=$con->dataProfile($this->session->userdata("id")); ?> 
<span>
 <div class="invoice-box" id="tinvo">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
					
                     
						<tr>
						<td>
					
						  <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-save"></i> SIMPAN </button>
						  </td>
						  </tr>
                    </table>
                </td>
            </tr>
            
           </form>
            
         
        </table>
    </div>
</span>
<!----------------------------->
</div>
</div>



</div>
</div>
</div>
</div>



<script src="<?php echo base_url();?>plug/boostrap/js/wizard.js"></script>
<script>
//loadinvoice();
$('#datesingle2').daterangepicker({
			"singleDatePicker": true,
			locale: {
					format: 'DD/MM/YYYY'
				}
				});

function save()
    {
       $('#headinvo').html("Data Event Sudah Tersimpan!");
	   $('.tinvo').html("<img src='<?php echo base_url();?>plug/img/load.gif'> <font color='#999999'>Please wait...</font>");
      var  url = "<?php echo base_url();?>myevent/save";
       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
             window.location.href="<?php echo base_url();?>/myevent";
           // loadinvoice(data);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
              alert('Mohon maaf kami sedang melakukan perbaikan\nTerimakasih atas pengertiannya.');
            }
        });
    }
function loadinvoice(datainfo)
{
//var dataAsal=data.split("::");
 var  url = "<?php echo base_url();?>myevent/loadinvoice/"+datainfo;
    $.ajax({
            url : url,
            success: function(data)
            {
               //if success close modal and reload ajax table
		        
			$(".form-control").prop("disabled", true);
			$("#optionsRadios1").prop("disabled", true);
			$("#optionsRadios2").prop("disabled", true);
			if(datainfo=="")
			{		warning(); }
			  $('#tinvo').html(data);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Mohon maaf kami sedang melakukan perbaikan\nTerimakasih atas pengertiannya.');
            }
        });
}	
	</script>
 <script type="text/javascript">
		$(function() {
			$("#daterange").daterangepicker({
				singleDatePicker: true,
				timePicker: true,
				timePicker24Hour: true,
				timePickerIncrement: 30,
				locale: {
					format: 'DD/MM/YYYY H:mm'
				}
			});
		});
		
				$('#datesingle').daterangepicker({
			"singleDatePicker": true,
			locale: {
					format: 'DD/MM/YYYY'
				}
				});
	 </script>
	  <script>
	  function kodevoucher()
	  {
	  var kode=$("#kodeVoucher").val();
	  if(kode=="" || kode==null) { kode=null;}
	   var  url = "<?php echo base_url();?>myevent/kodevoucher/"+kode;
		$.ajax({
            url : url,
            success: function(data)
            {
			data=data.split("::");
              $("#msgVoucher").html(data[0]);
			  if(data[1]=="free")
			  {
			  $(".sk").html("Event ini telah dibayar oleh voucher gratis!");
			  }else
			  {
			   $(".sk").html("Jika invoice melewati masa jatuh tempo maka event berstatus CANCEL");
			  }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Mohon maaf kami sedang melakukan perbaikan\nTerimakasih atas pengertiannya.');
            }
        });
	  }
	  </script>
<!-- Bootstrap modal -->
  <div class="modal fade" id="tampil" role="dialog" >
		<div class="modal-dialog" id="print">
               <div class="md-content">
				<div class="modal-header">
				<button data-dismiss="modal" class="md-close close">&times;</button>
				<h4 class="modal-title"><b>Formulir</b></h4>
				</div>
				<div class="modal-body"> 
				<div>
				<span id="dataload"></span>
				</div>
				</div>
		</div>
		</div>		
   </div><!-- /.modal-dialog -->
<!-- End Bootstrap modal -->




