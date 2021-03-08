 

	 
	<div class="row">

	
 

 
	<div id="jadwal_distribusi"></div>
	
  </div>
<script> 
Highcharts.chart('jadwal_distribusi', {
    chart: {
        type: 'column'
    },
    title: {
        text: ''
    },
    xAxis: {
        categories: ['01/08/2020', '02/08/2020', '03/08/2020', '04/08/2020', '05/08/2020', '06/08/2020', '07/08/2020', '08/08/2020', '09/08/2020', '10/08/2020']
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Total Undangan'
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
     credits: {
        enabled: false
    },
    legend: {
        align: 'center',
       
        verticalAlign: 'bottom',
        y: 25,
        floating: true,
         
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
        }
    },
    series: [{
        name: 'Belum',
        data: [5, 6, 7, 7, 5,7, 5, 6, 9, 5]
    }, {
        name: 'Sudah',
        data: [5, 3, 4, 7, 2,5, 3, 4, 7, 2]
    } ]
});
</script>