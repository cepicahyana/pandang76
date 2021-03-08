
<div class="row ">
<div class="col-md-6">
												<div class="input-group mb-3">
													<div class="input-group-prepend">
														<span class="input-group-text"  >Tentukan   tanggal :</span>
													</div>
													<input type="text" onchange="renew(this.value)" class="form-control col-md-12 cursor" id="rtgl2" aria-describedby="basic-addon3">
												</div>
 </div>
 <div class="col-md-6">
												<div class="input-group mb-3  ">
													<div class="input-group-prepend">
														<span class="input-group-text"  >Kirim Notif / cetak label</span>
													</div>
													<select name="notif" class="form-control" onchange="opsi(this.value)"> 
													<option value=""> == pilih == </option>
													<option value="1"> Dijadwalkan (akan dikirim notif pengambilan)</option>
													<option value="2"> Cetak label </option>
													</select>
												 </div>
  </div>
  </div>



<center>

										<!--			<label class="selectgroup-item">
														<input name="value" value="JavaScript" class="selectgroup-input" type="checkbox" checked>
														<span class="selectgroup-button">  <?php echo $jml;?> data Terpilih</span>
													</label>--->
  </center><hr>


<script>
 $("#opsi_cetak").hide();	
function opsi(val)
{
	if(val==2)
	{
		 $("#progress_distribusi").hide();	 
		 $("#opsi_cetak").show();			  
	}else{
		 $("#progress_distribusi").show();	 
		 $("#opsi_cetak").hide();			 
	}
 }  
</script>


<div id="progress_distribusi"></div>

<center>
<div id="opsi_cetak">
	<span onclick="selesai()" class="btn btn-info"  target="_blank">Cetak label & pindahkan data dari penjadwalan</span>
	 
</div>

 
</center>

<div class="form-group row" id="process" style="display:none;">
        <div class="progressing">
      <!-- <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="">
       </div>-->
	   Mohon tunggu....
       </div>
</div>


<div id="report" class="alert alert-danger">Mohon tunggu...</div>



 <br>
<script>
function renew()
{
 var id="<?php echo $id=$this->input->post("id");?>";
		var tgl = $("#rtgl2").val();  
		loading( );
		$.post("<?php echo site_url("distribusi/getDetailRangeSouvenir"); ?>",{tgl:tgl,id:id},function(data){
			 $("#progress_distribusi").html(data);
		  unblock( );
		 });
		  
}

function selesai()
{
 var id="<?php echo $id=$this->input->post("id");?>"; 
					swal({
						title: 'Lanjutkan cetak label ?',
						text: "cetak label tidak akan mengirim notifkasi ke pemohon dan setelah cetak label data akan hilang dari menu penjadwalan.",
						type: 'warning',
						buttons:{
							cancel: {
								visible: true,
								text : 'batal',
								className: 'btn btn-danger'
							},        			
							confirm: {
								text : 'Ya',
								className : 'btn btn-success'
							}
						}
					}).then((willDelete) => {
						if (willDelete) {
							 
							window.open("<?php echo base_url()?>permohonan/cetak_label?opsi=true&id=<?php echo $id=$this->input->post("id");?>","_blank"); 
							   reload_table();
							 // $("#mdl_modal").modal("hide");
						}  
					});
				 
}
</script>

<script>
$('#rtgl2').daterangepicker({
    "showDropdowns": true,
    "autoApply": true,
	  "showDropdowns": true,
    "drops": "up",
	   minDate:new Date(),
	 ranges: { 
        '7 hari kedepan': [moment(),moment().add(7, 'days')  ],
        '14 hari kedepan': [moment(),moment().add(14, 'days') ],
        '21 hari kedepan': [moment(),moment().add(21, 'days') ],
    },
    "locale": {
        "format": "DD/MM/YYYY",
        "separator": " - ",
        "applyLabel": "Apply",
        "cancelLabel": "Cancel",
        "fromLabel": "From",
        "toLabel": "To",
        "customRangeLabel": "Custom",
        "weekLabel": "W",
        "daysOfWeek": [
            "Min",
            "Sen",
            "Sel",
            "Rab",
            "Kam",
            "Jum",
            "Sab"
        ],
        "monthNames": [
            "Januari",
            "Februari",
            "Maret",
            "April",
            "Mei",
            "Juni",
            "Juli",
            "Augustus",
            "September",
            "Oktober",
            "November",
            "Desember"
        ],
        "firstDay": 1
    },
    "startDate": "<?php echo  date('d/m/Y');?>",
    "endDate": "<?php echo $this->tanggal->ind($this->tanggal->tambahTgl(date('Y-m-d'),10),"/")?>"
}, function(start, end, label) {
	 
});

 
</script>

