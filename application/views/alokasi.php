 

	 
	<div class="row">

	
	
	 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        
                        <div class="body"><center><b>DATA BLOK PAGI</b></center>
                            <div class="table-responsive">
                                <table class="entry" width="100%">
                                    <thead>
                                        <tr class="bg-teal">
                                            <th>NO</th>
                                            <th>NAMA BLOK</th>
                                            <th>DIALOKASIKAN</th>
                                            <th>TARGET</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php 
									$datablokpagi=$this->db->query("select * from tr_blok where jenis=1 order by nama asc ")->result();
									$no=1;$data_pagi="";
									foreach($datablokpagi as $val)
									{
									?>
                                      <tr>
									  <td><?php echo $no++;?></td>
									  <td> <?php echo $val->nama;?></td>
									  <td><?php echo $dt=$this->event->jmlBlokTotal(1,$val->nama);?></td>
									  <td><?php echo $val->target;?></td>
									   
									  </tr>  
									<?php 
										$data_pagi.="-".$dt.",";
										} ?>  
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
                                <table class="entry" width="100%">
                                    <thead >
                                        <tr class="bg-pink">
                                            <th>NO</th>
                                            <th>NAMA BLOK</th>
                                            <th>DIALOKASIKAN</th>
                                            <th>TARGET</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php 
									$databloksore=$this->db->query("select * from tr_blok where jenis=1 order by nama asc ")->result();
									$no=1;$data_sore="";
									foreach($databloksore as $val)
									{
									?>
                                      <tr>
									  <td><?php echo $no++;?></td>
									  <td> <?php echo $val->nama;?></td>
									  <td><?php echo $dt=$this->event->jmlBlokTotal(2,$val->nama);?></td>
									  <td><?php echo $val->target;?></td>
									   
									  </tr>  
									<?php 
									$data_sore.=$dt.",";
									} ?>  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </div>
                        </div>
	
	<div id="alokasi-container"></div>
	
  </div>
<script>
var categories = [
    "A","B","C","D","E","F","G","H","I","J","K" ,"M"
];

Highcharts.chart('alokasi-container', {
    chart: {
        type: 'bar'
    },
    title: {
        text: ' '
    },
    subtitle: {
        text: 'Grafik Alokasi Berdasarkan Jumlah Tamu'
    },
    accessibility: {
        point: {
            descriptionFormatter: function (point) {
                var index = point.index + 1,
                    category = point.category,
                    val = Math.abs(point.y),
                    series = point.series.name;

                return index + ', Age ' + category + ', ' + val + '%. ' + series + '.';
            }
        }
    },
    xAxis: [{
        categories: categories,
        reversed: false,
        labels: {
            step: 1
        },
        accessibility: {
            description: 'Age (male)'
        }
    }, { // mirror axis on right side
        opposite: true,
        reversed: false,
        categories: categories,
        linkedTo: 0,
        labels: {
            step: 1
        },
        accessibility: {
            description: 'Age (female)'
        }
    }],
    yAxis: {
        title: {
            text: null
        },
        labels: {
            formatter: function () {
                return Math.abs(this.value) + ' ';
            }
        },
        accessibility: {
            description: ' ',
            rangeDescription: 'Range: 0 to 5%'
        }
    },

    plotOptions: {
        series: {
            stacking: 'normal'
        }
    },

    tooltip: {
        formatter: function () {
           
            return '<b>   ' + this.point.category + ' : </b>' + this.point.y ;
        }
    },

    series: [{
        name: 'PAGI',
        data: [
            <?php echo $data_pagi;?>
        ]
    }, {
        name: 'SORE',
        data: [
           <?php echo $data_sore;;?>
        ]
    }]
});
</script>