 
<div class="row col-md-12" style='margin-left:0px'>
 
 
<div class="col-md-4 cursor">
							<div class="card card-dark bg-info-gradient menuclick" href='<?php echo base_url()?>lead/hutri'>
								<div class="card-body skew-shadow">
								<span style='color:yellow;font-weight:bold'>UPACARA PENGIBARAN BENDERA</span>
									<h2 class="py-4 fw-bold mb-0"><small>Total Pemohon</small>&nbsp;&nbsp;&nbsp;<?php echo $this->umum->jmlPemohon()?></h2>
									<div class="row">
										<div class="col-8 pr-0">
											<h3 class="text-small  mb-1">Quota</h3>
											<div class="  text-uppercase fw-bold op-8"><?php echo number_format($this->umum->jmlTarget(),0,"",".")?></div>
										</div>
										<div class="col-4 pl-0 text-right">
											<h3 class="fw-bold mb-1"><?php echo number_format($this->umum->per_pemohon(),0,"",".");?>%</h3>
											<div class="text-small text-uppercase fw-bold op-11">Progress</div>
										</div>
									</div>
								</div>
							</div>
 </div> 
 
 
<div class="col-md-4 cursor">
							<div class="card card-dark bg-info-gradient" onclick="detail(4)">
								<div class="card-body skew-shadow">
								<span style='color:yellow;font-weight:bold'>	RENUNGAN SUCI</span>
									<h2 class="py-4 fw-bold mb-0"><small>Total Pemohon</small>&nbsp;&nbsp;&nbsp;<?php echo $this->event->getJmlPemohonSuci()?></h2>
									<div class="row">
										<div class="col-8 pr-0">
											<h3 class="text-small  mb-1">Quota</h3>
											<div class="  text-uppercase fw-bold op-8"><?php echo number_format($this->umum->jmlTarget(),0,"",".")?></div>
										</div>
										<div class="col-4 pl-0 text-right">
											<h3 class="fw-bold mb-1"><?php echo number_format($this->event->getJmlPemohonSuciPersen(),0,"",".");?>%</h3>
											<div class="text-small text-uppercase fw-bold op-11">Progress</div>
										</div>
									</div>
								</div>
							</div>
 </div>
  
 
<div class="col-md-4 cursor">
							<div class="card card-dark bg-info-gradient"  onclick="detail(6)">
								<div class="card-body skew-shadow">
									<span style='color:yellow;font-weight:bold'>PENGUKUHAN PASKIBRA</span>
									<h2 class="py-4 fw-bold mb-0"><small>Total Pemohon</small>&nbsp;&nbsp;&nbsp;<?php echo $this->event->getJmlPemohon(6)?></h2>
									<div class="row">
										<div class="col-8 pr-0">
											<h3 class="text-small  mb-1">Quota</h3>
											<div class="  text-uppercase fw-bold op-8"><?php echo number_format($this->event->target(6),0,"",".")?></div>
										</div>
										<div class="col-4 pl-0 text-right">
											<h3 class="fw-bold mb-1"><?php echo number_format($this->event->getJmlPemohonPersen(6),0,"",".");?>%</h3>
											<div class="text-small text-uppercase fw-bold op-11">Progress</div>
										</div>
									</div>
								</div>
							</div>
 </div>  
 
<div class="col-md-4 cursor">
							<div class="card card-dark bg-info-gradient "  onclick="detail(5)">
								<div class="card-body skew-shadow">
									<span style='color:yellow;font-weight:bold'>PENYERAHAN TANDA KEHORMATAN</span>
									<h2 class="py-4 fw-bold mb-0"><small>Total Pemohon</small>&nbsp;&nbsp;&nbsp;<?php echo $this->event->getJmlPemohon(5)?></h2>
									<div class="row">
										<div class="col-8 pr-0">
											<h3 class="text-small  mb-1">Quota</h3>
											<div class="  text-uppercase fw-bold op-8"><?php echo number_format($this->event->target(5),0,"",".")?></div>
										</div>
										<div class="col-4 pl-0 text-right">
											<h3 class="fw-bold mb-1"><?php echo number_format($this->event->getJmlPemohonPersen(5),0,"",".");?>%</h3>
											<div class="text-small text-uppercase fw-bold op-11">Progress</div>
										</div>
									</div>
								</div>
							</div>
 </div>
 
<div class="col-md-4 cursor">
							<div class="card card-dark bg-info-gradient "  onclick="detail(7)">
								<div class="card-body skew-shadow">
								<span style='color:yellow;font-weight:bold'>	SANTAP SIANG KENEGARAAN</span>
									<h2 class="py-4 fw-bold mb-0"><small>Total Pemohon</small>&nbsp;&nbsp;&nbsp;<?php echo $this->event->getJmlPemohon(7)?></h2>
									<div class="row">
										<div class="col-8 pr-0">
											<h3 class="text-small  mb-1">Quota</h3>
											<div class="  text-uppercase fw-bold op-8"><?php echo number_format($this->event->target(7),0,"",".")?></div>
										</div>
										<div class="col-4 pl-0 text-right">
											<h3 class="fw-bold mb-1"><?php echo number_format($this->event->getJmlPemohonPersen(7),0,"",".");?>%</h3>
											<div class="text-small text-uppercase fw-bold op-11">Progress</div>
										</div>
									</div>
								</div>
							</div>
 </div>
 
   
   
<div class="col-md-4 cursor">
							<div class="card card-dark bg-info-gradient "  onclick="detail(8)">
								<div class="card-body skew-shadow">
								<span style='color:yellow;font-weight:bold'>	RAMAH TAMAH</span>
									<h2 class="py-4 fw-bold mb-0"><small>Total Pemohon</small>&nbsp;&nbsp;&nbsp;<?php echo $this->event->getJmlPemohon(8)?></h2>
									<div class="row">
										<div class="col-8 pr-0">
											<h3 class="text-small  mb-1">Quota</h3>
											<div class="  text-uppercase fw-bold op-8"><?php echo number_format($this->event->target(8),0,"",".")?></div>
										</div>
										<div class="col-4 pl-0 text-right">
											<h3 class="fw-bold mb-1"><?php echo number_format($this->event->getJmlPemohonPersen(8),0,"",".");?>%</h3>
											<div class="text-small text-uppercase fw-bold op-11">Progress</div>
										</div>
									</div>
								</div>
							</div>
 </div>
 
   
   
					 
		 
	
	<script>
	function detail(id)
	{
		$("#mdl_detail").modal("show");
		$("#dt-detail").html("mohon tunggu...");
		$.post("<?php echo base_url()?>lead/getDetail",{id:id},function(data){
			$("#dt-detail").html(data); 
		});
	}
	</script>
	
	
	
<div class="modal fade" id="mdl_detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" id="area_detail">
  	<div class="modal-header">
        <h5>Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body" id="dt-detail">
    </div>
    </div>
  </div>
</div>



<div class="row"></div>
<div id="mapping_wilayah" class='col-md-12'></div>





	
<?php
 $this->db->order_by("nama");
$data_provinsi	=	$this->db->get("v_prov")->result();
$dt_provinsi	=	"";
$dt_kab			=	"";
$no=1;
foreach($data_provinsi as $dp)
{	$no++;
	 
	$dt_provinsi.=   "{
						id: '1.".$no."',
						parent: '0.0',
						name: '".$dp->nama."', 
						value : ".$dp->jml."
						},";
						
	$data_kabupaten	=	$this->db->get_where("v_kab",array("id_prov"=>$dp->id_prov))->result();	
			 $nomor=1;
			foreach($data_kabupaten as $kab){	
			$dt_kab.=	"{
						id: '2.".$nomor++."',
						parent: '1.".$no."',
						name: '".$kab->nama."',
						value : ".$kab->jml."
						},";
			}
						
}
?>

<script>
var data = [{
    id: '0.0',
    parent: '',
    name: 'Indonesia'
},
<?php echo $dt_provinsi;?>
  <?php echo $dt_kab;?>
 
  
 ];

// Splice in transparent for the center circle
Highcharts.getOptions().colors.splice(0, 0, 'transparent');


Highcharts.chart('mapping_wilayah', {

    chart: {
        height: '50%',
		  backgroundColor: 'transparent',
    },

    title: {
        text: 'Pengelompokan Permohonan   Perwilayah'
    },
    subtitle: {
        text: 'Upacara Bendera'
    },
    series: [{
        type: "sunburst",
        data: data,
        allowDrillToNode: true,
        cursor: 'pointer',
        dataLabels: {
            format: '{point.name}',
            filter: {
                property: 'innerArcLength',
                operator: '>',
                value: 16
            }
        },
        levels: [{
            level: 1,
            levelIsConstant: false,
            dataLabels: {
                filter: {
                    property: 'outerArcLength',
                    operator: '>',
                    value: 64
                }
            }
        }, {
            level: 2,
            colorByPoint: true
        },
        {
            level: 3,
            colorVariation: {
                key: 'brightness',
                to: -0.5,
				 colorByPoint: true
            }
        }, {
            level: 4,
            colorVariation: {
                key: 'brightness',
                to: 0.5
            }
        }]

    }],
    tooltip: {
        headerFormat: "",
        pointFormat: ' <b>{point.name}</b>  = <b>{point.value}</b>'
    }
});
</script>
	