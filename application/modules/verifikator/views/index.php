 
<?php
$jml	=	"";
$tgl	=	date("Y-m-d");
$durasi	=	15;
//$end	=	$this->tanggal->kurangiTgl($tgl,$durasi);
$range				=	"";	
$data_jmlDistribusi	=	"";
$akanDistribusi		=	"";
$data_tanggal		=	"";
$defauld			=	"";
for($i=$durasi;$i>=0;$i--)
{	$tgli				=	$this->tanggal->minTgl($tgl,$i);
	$jml				=	$this->mdl->jmlSudahVerifikasi($tgli); 
	$tanggal			=	$this->tanggal->hariLengkap($tgli,"/");
	 
	$defauld.=" ['".$tanggal."', ".$jml."],";
 
 
}
  

?>


<div class="col-md-12 card">
<div id="grafik" ></div>
</div>



 
							<div class="col-12 col-sm-12">
							<div class="cards">
								<div class="card-body">
									<div class="d-flex justify-content-between">
										<div>
											<h5><b>Progres verifikasi</b></h5>
												 
										</div>
										 
									</div>
									<?php   $persenVerifikasi=$this->mdl->persenVerifikasi()?>
									<div class="progress progress-sm">
										<div class="progress-bar bg-danger w-<?php echo $persenVerifikasi;?>" role="progressbar" aria-valuenow="<?php echo $persenVerifikasi;?>" aria-valuemin="0" aria-valuemax="<?php echo $persenVerifikasi;?>"></div>
									</div>
									<div class="d-flex justify-content-between mt-2">
										<p class="text-muted mb-0"> Saat ini sudah mencapai <?php echo $persenVerifikasi?>%</p>
										<p class="text-muted mb-0">sisa <?php echo 100-$persenVerifikasi;?> %</p>
									</div>
								</div>
							</div>
				 
 






<script>
Highcharts.chart('grafik', {
    chart: {
        type: 'column'
    },
	
    title: {
        text: 'Grafik jumlah verifikasi 15 hari terakhir'
    },
    subtitle: {
        text: 'Data permohonan online'
    },
    xAxis: {
        type: 'category',
        labels: {
            rotation: -45,
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: ' '
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: 'Jumlah: <b>{point.y} </b>'
    },
    series: [{
        name: 'Population',
		color:'#1572E8',
        data: [
           <?php echo $defauld;?>
           
        ],
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            align: 'right',
            format: '{point.y}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});
</script>
