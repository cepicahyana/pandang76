<?php
$this->db->order_by("jml","desc");
//$this->db->where("jml>=",1);
$data_provinsi	=	$this->db->get("v_prov")->result();
?>
<style>
#mapping_wilayah {
    background: url(<?php  echo base_url()?>plug/img/bgcart.png) no-repeat;
	background-size:cover;
	border-radius:30px;
}
</style>
<figure class="highcharts-figure">
    <div id="mapping_wilayah"></div>
	
	<div class="card">
		<table class='entry' width="100%">
		      <tr>
                    <th width="100px">NO</th>
                    <th> PROVINSI</th>
                    <th width="20%"> JML PEMOHON</th>
                </tr>
		<?php
		$no=1;
		foreach($data_provinsi as $val)
		{
		?>
		<tr>
		    <td>No. <?php echo $no++;?></td>
		    <td><a href="javascript:(0);" data-toggle="modal" data-target="#mdl_kota" onclick="getKota(`<?php echo $val->id_prov?>`, `<?php echo $val->nama?>`)">Provinsi <?php echo $val->nama;?></a> </td>
		    <td> <?php echo $val->jml;?> </td>
		</tr>
		<?php } ?>
		</table>
		<br>
	</div>
	
    <p class="highcharts-description" style=' width:100%'>
       Data berdasarakan data permohonan yang telah melalui tahap verifikasi dan belum diverifikasi,
	   untuk pemohon yang ditolak tidak disertakan dalam rekapitulasi ini.
    </p>
</figure>

<div class="modal fade" id="mdl_kota" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" id="areaKota">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><strong>List Kota / Kab di Provinsi <span id='detProv'></span></strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="dt-kota">
        
      </div>
    </div>
  </div>
</div>

<script>
    function getKota(id, nama){
        $("#detProv").html(nama);
        $("#dt-kota").html("");
        loading('areaKota');
        $.post("<?php echo site_url("dashboard/getKota"); ?>",{id:id}, function(data){
			$("#dt-kota").html(data);
			unblock('areaKota');
		});
    }
</script>

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
        text: 'Pengelompokan Permohonan Perwilayah'
    },
    subtitle: {
        text: 'Data berdasarkan kode nomor NIK'
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