

												<div class="input-group mb-3">
													<div class="input-group-prepend">
														<span class="input-group-text"  >Tentukan range tanggal :</span>
													</div>
													<input type="text" onchange="renew(this.value)" class="form-control col-md-3 cursor" id="rtgl2" aria-describedby="basic-addon3">
												</div>



<center>

										<!--			<label class="selectgroup-item">
														<input name="value" value="JavaScript" class="selectgroup-input" type="checkbox" checked>
														<span class="selectgroup-button">  <?php echo $jml;?> data Terpilih</span>
													</label>--->
  </center><hr>

<div id="progress_distribusi"></div>



<div class="form-group row" id="process" style="display:none;">
        <div class="progress">
       <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="">
       </div>
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
		$.post("<?php echo site_url("distribusi/getDetailRange"); ?>",{tgl:tgl,id:id},function(data){
			 $("#progress_distribusi").html(data);
		  unblock( );
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

