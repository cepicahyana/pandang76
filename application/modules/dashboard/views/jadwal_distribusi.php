

<?php
$id		=	"23,45";//$this->input->get_post("id");
$jml	=	"";
$tgl	=	date("Y-m-d");
$target	=	$this->m_reff->tm_pengaturan(1);
$durasi	=	20;
$end	=	$this->tanggal->tambahTgl($tgl,$durasi);
$range				=	"";	
$data_jmlDistribusi	=	"";
$akanDistribusi		=	"";
$data_tanggal		=	"";
$defauld			=	"";
for($i=-10;$i<$durasi;$i++)
{	$tgli				=	$this->tanggal->tambahTgl($tgl,$i);
	$jml				=	$this->mdl->jmlBelumDistribusi($tgli); 
	$tanggal			=	$this->tanggal->hariLengkap($tgli,"/");
	$jmlDistribusi		=	$this->mdl->jmlSudahDistribusi($tgli);
	$data_jmlDistribusi.=	$jmlDistribusi.",";
	$akanDistribusi.=		$jml.",";
	$data_tanggal.= "'".$tanggal."',";

	
}


$defauld=" {
	 color: 'black',
        name: 'Telah diserahkan',
        data: [".$data_jmlDistribusi."]
    },";
	
$tambahan=" {
	 color: '#1572E8',
        name: 'Belum diserahkan',
        data: [".$akanDistribusi."]
    },";

?>
 

												<div class="input-group mb-3">
													<div class="input-group-prepend">
														<span class="input-group-text"  >Tentukan range tanggal :</span>
													</div>
													<input type="text" onchange="confirm(this.value)" class="form-control col-md-3 cursor" id="rtgl" aria-describedby="basic-addon3">
												</div>


<div class="card col-md-12">

<div id="data_detail"></div>
</div>



<script>
//setTimeout(function(){ confirm('<?php echo $this->tanggal->hariLengkap($tgl,"/");?>'); }, 1000);

function confirm(val)
{ 		
	if(!val){ return false;}
		var tgl = $("#rtgl").val();  
		loading( );
		$.post("<?php echo site_url("dashboard/getDetail"); ?>",{tgl:tgl},function(data){
			 $("#data_detail").html(data);
		  unblock( );
		 });
		 //window.scrollTo(0,document.body.scrollHeight);
}
</script> 

<script>
$('#rtgl').daterangepicker({
    "showDropdowns": true,
    "autoApply": true,
	  "showDropdowns": true,
    "drops": "up",
	 ranges: {
        'Hari ini': [moment(), moment()],
        'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        '7 hari terakhir': [moment().subtract(6, 'days'), moment()],
        '30 hari terakhir': [moment().subtract(29, 'days'), moment()],
        'Bulan ini': [moment().startOf('month'), moment().endOf('month')],
        'Bulan Kemarin': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
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
    "startDate": "<?php echo $this->tanggal->ind($this->tanggal->minTgl(date('Y-m-d'),10),"/")?>",
    "endDate": "<?php echo $this->tanggal->ind($this->tanggal->tambahTgl(date('Y-m-d'),19),"/")?>"
}, function(start, end, label) {
	 
});
</script>
