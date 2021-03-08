 
<?php
$id		=	"23,45";//$this->input->get_post("id");
$jml	=	"";
$tgl	=	date("Y-m-d");
$target	=	$this->m_reff->tm_pengaturan(1);
$durasi	=	7;
$end	=	$this->tanggal->tambahTgl($tgl,$durasi);
$range				=	"";	
$data_jmlDistribusi	=	"";
$akanDistribusi		=	"";
$data_tanggal		=	"";
$defauld			=	"";
for($i=-7;$i<$durasi;$i++)
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

<div class="card col-md-12">
 
  
<div id="progress_distribusi"></div>
 <br>
<div id="data_detail"></div>
</div>


<script>
Highcharts.getOptions().colors.splice(0, 0, 'transparent');
 Highcharts.chart('progress_distribusi', {
    chart: {
        type: 'column',
		 
    },
	 
    title: {
        text: 'Grafik distribusi undangan perhari'
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
                        confirm(this.category);
                    }
                }
            }
        }
    },
	
    series: [<?php echo $tambahan; ?><?php echo $defauld; ?> ]
});
</script>

<script>
setTimeout(function(){ confirm('<?php echo $this->tanggal->hariLengkap($tgl,"/");?>'); }, 1000);

function confirm(tgl)
{ 		loading("data_detail");
		$.post("<?php echo site_url("distributor/getDetail"); ?>",{tgl:tgl},function(data){
			 $("#data_detail").html(data);
		  unblock("data_detail");
		 });
}
</script> 