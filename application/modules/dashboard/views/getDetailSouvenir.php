<?php
$tgl	=	$this->input->post("tgl");
$start	=	$this->tanggal->range_1($tgl);
$end 	=	$this->tanggal->range_2($tgl);
			
$jml	=	"";
$target	=	$this->m_reff->tm_pengaturan(1);
$durasi	=	$this->tanggal->selisih($start,$end);
$end	=	$this->tanggal->tambahTgl($tgl,$durasi);
$range				=	"";	
$data_jmlDistribusi	=	"";
$akanDistribusi		=	"";
$data_tanggal		=	"";
$defauld			=	"";
for($i=0;$i<=$durasi;$i++)
{	$tgli				=	$this->tanggal->tambahTgl($start,$i);
	$jml				=	$this->mdls->jmlDijadwalkan($tgli); 
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
 


   
<div id="progress_distribusi"></div>
 <br>














<hr>
 
<br>
<div class="row" id="getUndangan">
 
</div>
<br>




<script>
Highcharts.getOptions().colors.splice(0, 0, 'transparent');
 Highcharts.chart('progress_distribusi', {
    chart: {
        type: 'column',
		 
    },
	 
    title: {
        text: 'Jumlah distribusi souvenir per-pemohon (yang diambil ditempat)'
    }, subtitle: {
        text: 'Silahkan klik pada batang diagram untuk menampilkan detail undangan'
    },
    xAxis: {
        categories: [<?php echo $data_tanggal?>]
    },
    yAxis: {
        min: 0,
        title: {
            text: ' '
        },
        stackLabels: {
            enabled: true,
            style: {
                fontWeight: 'bold',
                color: ( // theme
                    Highcharts.defaultOptions.title.style &&
                    Highcharts.defaultOptions.title.style.color
                ) || 'gray'
            }
        }
    },
    legend: {
        align: 'center',
       
        verticalAlign: 'bottom',
       
        shadow: false
    },
    tooltip: {
        headerFormat: '<b>{point.x}</b><br/>',
        pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
    },
    plotOptions: {
        column: {
            stacking: 'normal',
            dataLabels: {
                enabled: true
            }
        },
		 
		 series: {
            cursor: 'pointer',
            point: {
                events: {
                    click: function () {
                        getDetail(this.category);
                    }
                }
            }
        }
    },
	
    series: [<?php echo $tambahan; ?><?php echo $defauld; ?> ]
});
</script>



<script>
function getDetail(tgl)
{
	loading("getUndangan");
		$.post("<?php echo site_url("dashboard/getUndanganSouvenir"); ?>",{tgl:tgl},function(data){
			 $("#getUndangan").html(data);
		  unblock("getUndangan");
		  window.scrollTo(0,document.body.scrollHeight);
		 });
}
</script>