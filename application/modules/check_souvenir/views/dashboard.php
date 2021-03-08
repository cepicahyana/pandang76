<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box-2 bg-teal hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">print</i>
                        </div>
                        <div class="content">
                            <div class="text">SUDAH CETAK</div>
                            <div class="number"><?php echo number_format($this->db->query("select * from data_peserta where cetak='udah'  ")->num_rows(),0,",",".")?></div>
                        </div>
                    </div>
  </div>
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box-2 bg-teal hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">print</i>
                        </div>
                        <div class="content">
                            <div class="text">BELUM CETAK</div>
                            <div class="number"><?php echo number_format($this->db->query("select * from data_peserta where  cetak='belum' ")->num_rows(),0,",",".")?></div>
                        </div>
                    </div>
  </div>
  <!-------------------------------->
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-2 bg-teal hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">email</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL PAGI</div>
                            <div class="number"><?php 
							  $jml1=$this->db->query("select * from data_peserta where  jenis='1' and ip not like '%bebas%' and ip is not null and ip!=''   ")->num_rows();
							$jml2=$this->db->query("select * from data_peserta where  jenis='1' and ip2 not like '%bebas%'  and ip2 is not null and ip2!='' ")->num_rows();
							echo number_format($jml1+$jml2,0,",",".")?></div>
                        </div>
                    </div>
  </div>
			
			
 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-2 bg-green hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">done</i>
                        </div>
                        <div class="content">
                            <div class="text">TAMU HADIR</div>
							<?php
							$thp1=$this->db->query("select * from data_peserta where   jenis='1' and status='2'  and ip not like '%bebas%' and ip not like '%bebas%' and ip is not null and ip!='' ")->num_rows();
							$thp2=$this->db->query("select * from data_peserta where   jenis='1' and status2='2'  and ip2 not like '%bebas%'   and ip2 is not null and ip2!=''")->num_rows();
							$thp=($thp1+$thp2);
							?>
                            <div class="number"><?php echo number_format($thp,0,",",".")?></div>
                        </div>
                    </div>
  </div>

  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-2  bg-light-green hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">info</i>
                        </div>
                        <div class="content">
                            <div class="text">  TIDAK HADIR</div>
							
						<?php
							$thp1=$this->db->query("select * from data_peserta where   jenis='1' and status='1'  and ip not like '%bebas%'  and ip is not null and ip!=''")->num_rows();
							$thp2=$this->db->query("select * from data_peserta where   jenis='1' and status2='1'  and ip2 not like '%bebas%'  and ip2 is not null and ip2!=''")->num_rows();
							$tthp=($thp1+$thp2);
							?>	
                            <div class="number"><?php echo number_format($tthp,0,",",".")?></div>
                        </div>
                    </div>
  </div>
  
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-2  bg-red hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">pan_tool</i>
                        </div>
                        <div class="content">
                            <div class="text">  DICEKAL</div>
							<?php
							$tthpc1=$this->db->query("select * from data_peserta where  jenis='1' and status='0'  and ip not like '%bebas%'  and ip is not null and ip!=''")->num_rows();
							$tthpc2=$this->db->query("select * from data_peserta where  jenis='1' and status2='0'  and ip2 not like '%bebas%'  and ip2 is not null and ip2!=''")->num_rows();
							$tthpc=$tthpc1+$tthpc2;
							?>
                            <div class="number"><?php echo number_format($tthpc,0,",",".")?></div>
                        </div>
                    </div>
  </div>

  
  <!---------------------------------->
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-2 bg-deep-orange hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">email</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL SORE</div>
                            <div class="number"><?php echo number_format($this->db->query("select * from data_peserta where jenis='2'   and ip not like '%bebas%'")->num_rows(),0,",",".")?></div>
                        </div>
                    </div>
  </div>
			
			
 <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-2 bg-orange hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">done</i>
                        </div>
                        <div class="content">
                            <div class="text">TAMU HADIR  </div>
                            <div class="number"><?php echo number_format($ths=$this->db->query("select * from data_peserta where  jenis='2' and status='2'  and ip not like '%bebas%'")->num_rows(),0,",",".")?></div>
                        </div>
                    </div>
  </div>

  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-2  bg-amber hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">info</i>
                        </div>
                        <div class="content">
                            <div class="text">  TIDAK HADIR</div>
                            <div class="number"><?php echo number_format($tths=$this->db->query("select * from data_peserta where     jenis='2' and status='1'  and ip not like '%bebas%' ")->num_rows(),0,",",".")?></div>
                        </div>
                    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-2  bg-red hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">pan_tool</i>
                        </div>
                        <div class="content">
                            <div class="text">  DICEKAL</div>
                            <div class="number"><?php echo number_format($tths=$this->db->query("select * from data_peserta where  jenis='2' and status='0'  and ip not like '%bebas%' ")->num_rows(),0,",",".")?></div>
                        </div>
                    </div>
  </div>
  
  
  
  
  </div>
 
	<div class="row">				
	<div class="col-md-6">
		<div id="pagi" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
	</div>				
	
	<div class="col-md-6">
	<div id="sore" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
	</div>	
	</div>
	 <div class="col-md-12 clearfix">&nbsp;</div>
	 
	 
	 
	<div class="row">

	
	
	 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        
                        <div class="body"><center><b>DATA BLOK PAGI</b></center>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped table-bordered dashboard-task-infos" width="100%">
                                    <thead>
                                        <tr class="bg-teal">
                                            <th>NO</th>
                                            <th>NAMA BLOK</th>
                                            <th>DIALOKASIKAN</th>
                                            <th>TERISI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php 
									$datablokpagi=$this->db->query("SELECT DISTINCT(blok) as blok from data_peserta where  
									jenis='1'  and ip not like '%bebas%' order by blok asc ")->result();
									$no=1;
									foreach($datablokpagi as $val)
									{
									?>
                                      <tr>
									  <td><?php echo $no++;?></td>
									  <td> <?php echo $val->blok;?></td>
									  <td><?php echo $this->event->jmlBlokTotal(1,$val->blok);?></td>
									  <td><?php echo $this->event->jmlBlok(1,$val->blok);?></td>
									   
									  </tr>  
									<?php } ?>  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </div>
                        </div>


						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        
                        <div class="body"><center><b>DATA BLOK SORE</b></center>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped table-bordered dashboard-task-infos" width="100%">
                                    <thead >
                                        <tr class="bg-pink">
                                            <th>NO</th>
                                            <th>NAMA BLOK</th>
                                            <th>DIALOKASIKAN</th>
                                            <th>TERISI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php 
									$databloksore=$this->db->query("SELECT DISTINCT(blok) as blok from data_peserta where   jenis='2' and ip not like '%bebas%' order by blok asc")->result();
									$no=1;
									foreach($databloksore as $val)
									{
									?>
                                      <tr>
									  <td><?php echo $no++;?></td>
									  <td> <?php echo $val->blok;?></td>
									  <td><?php echo $this->event->jmlBlokTotal(2,$val->blok);?></td>
									  <td><?php echo $this->event->jmlBlok(2,$val->blok);?></td>
									   
									  </tr>  
									<?php } ?>  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </div>
                        </div>
	
	
	
  </div>
	
	
	<div class="col-md-6">
	<div id="blok_pagi" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
	</div>

	<div class="col-md-6">
	<div id="blok_sore" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
	</div>				
			

<?php

$bo="";
foreach($datablokpagi as $val)
{
	$bo.="{
                name: '".$val->blok."',
                y: ".$this->event->jmlBlok(1,$val->blok).", 
                 
            },";
}
$blok_pagi=$bo;


$bo="";
foreach($databloksore as $val)
{
	$bo.="{
                name: '".$val->blok."',
                y: ".$this->event->jmlBlok(2,$val->blok).", 
                 
            },";
}
$blok_sore=$bo;
?>
		<script type="text/javascript">
 
    // Build the chart
    Highcharts.chart('pagi', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'ACARA PAGI'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Persentase',
            colorByPoint: true,
            data: [ {
                name: 'Hadir',
                y: <?php echo $thp;?> 
                 
            }, {
                name: 'Tidak Hadir',
                y: <?php echo $tthp;?> 
            } ]
        }]
    });
 





 

    // Build the chart
    Highcharts.chart('sore', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'ACARA SORE'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Persentase',
            colorByPoint: true,
            data: [ {
                name: 'Hadir',
                y: <?php echo $ths;?> 
                 
            }, {
                name: 'Tidak Hadir',
                y: <?php echo $tths;?> 
            } ]
        }]
    });
 

    // Build the chart
    Highcharts.chart('blok_pagi', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'KEHADIRAN ACARA PAGI'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Persentase',
            colorByPoint: true,
            data: [  <?php echo $blok_pagi;?>   ]
        }]
    });
 
    // Build the chart
    Highcharts.chart('blok_sore', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'KEHADIRAN ACARA SORE'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Persentase',
            colorByPoint: true,
            data: [  <?php echo $blok_sore;?>   ]
        }]
    });
 
		</script>