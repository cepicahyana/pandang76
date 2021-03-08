 
<div class="row col-md-12" style='margin-left:0px'>

<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header ">
                            <h2>
                               Pengukuhan paskibra
                            </h2>
                             
                        </div>
                        <div class="body">
                            <table width="100%" class='entry'>
							<tr>
							<td>Total Peserta</td>
							<td><?php echo $this->event->getJmlPemohon(6)?></td>
							</tr> <tr>
							<td>Total Hadir</td>
							<td><?php echo $this->event->getJmlPemohonHadir(6)?></td>
							</tr> <tr>
							<td>Presentase Kehadiran</td>
							<td><?php echo $p=$this->event->getJmlPemohonHadirPersen(6)?>%</td>
							</tr> 
							</table>
                        </div>
                    </div>
                </div>




<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header ">
                            <h2>
                               Ramah tamah
                            </h2>
                             
                        </div>
                        <div class="body">
                            <table width="100%" class='entry'>
							<tr>
							<td>Total Peserta</td>
							<td><?php echo $this->event->getJmlPemohon(8)?></td>
							</tr> <tr>
							<td>Total Hadir</td>
							<td><?php echo $this->event->getJmlPemohonHadir(8)?></td>
							</tr> <tr>
							<td>Presentase Kehadiran</td>
							<td><?php echo $p=$this->event->getJmlPemohonHadirPersen(8)?>%</td>
							</tr> 
							</table>
                        </div>
                    </div>
                </div>




<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header ">
                            <h2>
                            Penyerahan tanda kehormatan 
                            </h2>
                             
                        </div>
                        <div class="body">
                            <table width="100%" class='entry'>
							<tr>
							<td>Total Peserta</td>
							<td><?php echo $this->event->getJmlPemohon(5)?></td>
							</tr> <tr>
							<td>Total Hadir</td>
							<td><?php echo $this->event->getJmlPemohonHadir(5)?></td>
							</tr> <tr>
							<td>Presentase Kehadiran</td>
							<td><?php echo $p=$this->event->getJmlPemohonHadirPersen(5)?>%</td>
							</tr> 
							</table>
                        </div>
                    </div>
                </div>


<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header ">
                            <h2>
                           Renungan Suci
                            </h2>
                             
                        </div>
                        <div class="body">
                            <table width="100%" class='entry'>
							<tr>
							<td>Total Peserta</td>
							<td><?php echo $this->event->getJmlPemohonSuci()?></td>
							</tr> <tr>
							<td>Total Hadir</td>
							<td><?php echo $this->event->getJmlPemohonSuciHadir()?></td>
							</tr> <tr>
							<td>Presentase Kehadiran</td>
							<td><?php echo  $p=$this->event->getJmlPemohonSuciHadirPersen()?>%</td>
							</tr> 
							</table>
                        </div>
                    </div>
                </div>

 

  
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header ">
                            <h2>
                         Santap siang kenegaraan
                            </h2>
                             
                        </div>
                        <div class="body">
                            <table width="100%" class='entry'>
							<tr>
							<td>Total Peserta</td>
							<td><?php echo $this->event->getJmlPemohon(7)?></td>
							</tr> <tr>
							<td>Total Hadir</td>
							<td><?php echo $this->event->getJmlPemohonHadir(7)?></td>
							</tr> <tr>
							<td>Presentase Kehadiran</td>
							<td><?php echo $p=$this->event->getJmlPemohonHadirPersen(7)?>%</td>
							</tr> 
							</table>
                        </div>
                    </div>
                </div>





  
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header ">
                            <h2>
                         Upacara penaikan bendera
                            </h2>
                             
                        </div>
                        <div class="body">
                            <table width="100%" class='entry'>
							<tr>
							<td>Total Peserta</td>
							<td><?php echo $tpagi=$this->event->jmlPemohon(1);?></td>
							</tr> <tr>
							<td>Total Hadir</td>
							<td><?php echo $hpagi=$this->event->jmlPemohonPagiHadir();?></td>
							</tr> <tr>
							<td>Presentase Kehadiran</td>
							<td><?php echo $hpagi=$this->event->persentase($hpagi,$tpagi);?>%</td>
							</tr> 
							</table>
                        </div>
                    </div>
                </div>






  
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header ">
                            <h2>
                         Upacara penurunan bendera
                            </h2>
                             
                        </div>
                        <div class="body">
                            <table width="100%" class='entry'>
							<tr>
							<td>Total Peserta</td>
							<td><?php echo $tsore=$this->event->jmlPemohon(2);?></td>
							</tr> <tr>
							<td>Total Hadir</td>
							<td><?php echo $hsore=$this->event->jmlPemohonSoreHadir();?></td>
							</tr> <tr>
							<td>Presentase Kehadiran</td>
							<td><?php echo  $this->event->persentase($hsore,$tsore);?>%</td>
							</tr> 
							</table>
                        </div>
                    </div>
                </div>









  
			 		
   
					 
 		 	
						 
						 
 </div>
					
					 
						
						
						 

 
	
	
	 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        
                        <div class="body"><center><b>DATA BLOK PAGI</b></center>
                            <div class="table-responsive">
                                <table class="entry table table-bordered" width="100%">
                                    <thead>
                                        <tr class='bg-green' >
                                            <th>NO</th>
                                            <th>  BLOK</th>
                                            <th>TOTAL PESERTA</th>
                                            <th>HADIR</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php 
									$datablokpagi=$this->db->query("select * from tr_blok where jenis=1 order by nama asc ")->result();
									$no=1;
									foreach($datablokpagi as $val)
									{
									?>
                                      <tr>
									  <td><?php echo $no++;?></td>
									  <td> <?php echo $val->nama;?></td> 
									  <td><?php echo $this->event->jmlDispoByBlok(1,$val->id);?></td>
									  <td><?php echo $this->event->jmlHadirPagiByBlok($val->id);?></td>
									   
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
                                <table class="entry table table-bordered" width="100%">
                                    <thead >
                                        <tr class="bg-pink">
                                            <th>NO</th>
                                            <th>NAMA BLOK</th>
                                            <th>TOTAL PESERTA</th>
                                            <th>HADIR</th>
                                             
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php 
									$databloksore=$this->db->query("select * from tr_blok where jenis=2 order by nama asc ")->result();
									$no=1;
									foreach($databloksore as $val)
									{
									?>
                                      <tr>
									  <td><?php echo $no++;?></td>
									  <td> <?php echo $val->nama;?></td>
									  <td><?php echo $this->event->jmlDispoByBlok(2,$val->id);?></td> 
									  <td><?php echo $this->event->jmlHadirSoreByBlok($val->id);?></td>
									   
									  </tr>  
									<?php } ?>  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </div>
                        </div>
	
	
	
 


 






			
					  <script>
					/*    $(document).ready(function() {
		 
		Circles.create({
			id:'circles-2',
			radius:45,
			value:<?php echo $per_dispo=number_format($this->event->persentase($hsore,$tsore));?>,
			maxValue:100,
			width:7,
			text: <?php echo $per_dispo;?>+"%",
			colors:['#f1f1f1', '#1572E8'],
			duration:700,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-3',
			radius:45,
			value:<?php echo $per_distribusi=$this->event->persentase($hpagi,$tpagi);?>,
			maxValue:100,
			width:7,
			text: <?php echo $per_distribusi;?>+"%",
			colors:['#f1f1f1', '#1572E8'],
			duration:900,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		 

						});
						*/
	</script>
	
	<script>
	function detail(id)
	{
		$("#mdl_detail").modal("show");
		$("#dt-detail").html("mohon tunggu...");
		$.post("<?php echo base_url()?>myevent/getDetail",{id:id},function(data){
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