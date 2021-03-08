<div class="row col-md-12" style='margin-left:0px'>
    <!--<div class="col-md-12"> <center>
 <a href="<?php echo base_url() ?>monitoring_souvenir" class="btn btn-light btn-sm menuclick la flaticon-share-1"> Perbaharui data</a>
 </center>
 <br>
 </div>-->
    <div class="col-12 col-sm-6 col-md-4">
        <div class="card  bg-gradient">
            <div class="card-body  bubble-shadow">
                <div class="d-flex justify-content-between">
                    <div class="btn btn-secondary btn-sm btn-block  bubble-shadow" style='opacity:0.8'>
                        <center>
                            <h5><b> V V I P</b></h5>
                        </center>

                    </div>

                </div>

                <div class="d-flex justify-content-between mt-2">
                    <p class="text-muted mb-0">Total persediaan </p>
                    <p class="text-muted mb-0"><?php echo $total11 = $this->svnr->getJumlahPersediaan(1) ?></p>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <p class="text-muted mb-0">Total permohonan</p>
                    <p class="text-muted mb-0"><?php echo $input11 = $this->svnr->getJmlPemohon(1) ?></p>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <p class="text-muted mb-0">Telah distribusi</p>
                    <p class="text-muted mb-0"><?php echo $dis11 = $this->svnr->getJmlPemohonDistribusi(1) ?></p>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <p class="text-muted mb-0">Sisa stok</p>
                    <p class="text-muted mb-0"><?php echo ($total11 - $input11) ?></p>
                </div>
            </div>
        </div>
    </div>



    <div class="col-12 col-sm-6 col-md-4">
        <div class="card ">
            <div class="card-body  bubble-shadow">
                <div class="d-flex justify-content-between">
                    <div class="btn btn-success btn-sm btn-block  bubble-shadow" style='opacity:0.8'>
                        <center>
                            <h5><b> V I P</b></h5>
                        </center>

                    </div>

                </div>

                <div class="d-flex justify-content-between mt-2">
                    <p class="text-muted mb-0">Total persediaan </p>
                    <p class="text-muted mb-0"><?php echo $total12 = $this->svnr->getJumlahPersediaan(2) ?></p>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <p class="text-muted mb-0">Total permohonan</p>
                    <p class="text-muted mb-0"><?php echo $input12 = $this->svnr->getJmlPemohon(2) ?></p>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <p class="text-muted mb-0">Telah distribusi</p>
                    <p class="text-muted mb-0"><?php echo $dis12 = $this->svnr->getJmlPemohonDistribusi(2) ?></p>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <p class="text-muted mb-0">Sisa stok</p>
                    <p class="text-muted mb-0"><?php echo ($total11 - $input12) ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4">
        <div class="card">
            <div class="card-body  bubble-shadow">
                <div class="d-flex justify-content-between">
                    <div class="btn btn-info btn-sm btn-block  bubble-shadow" style='opacity:0.8'>
                        <center>
                            <h5><b> UMUM</b></h5>
                        </center>

                    </div>

                </div>

                <div class="d-flex justify-content-between mt-2">
                    <p class="text-muted mb-0">Total persediaan </p>
                    <p class="text-muted mb-0"><?php echo $total13 = $this->svnr->getJumlahPersediaan(3) ?></p>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <p class="text-muted mb-0">Total permohonan</p>
                    <p class="text-muted mb-0"><?php echo $input13 = $this->svnr->getJmlPemohon(3) ?></p>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <p class="text-muted mb-0">Telah distribusi</p>
                    <p class="text-muted mb-0"><?php echo $dis13 = $this->svnr->getJmlPemohonDistribusi(3) ?></p>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <p class="text-muted mb-0">Sisa stok</p>
                    <p class="text-muted mb-0"><?php echo ($total13 - $input13) ?></p>
                </div>
            </div>
        </div>
    </div>






</div>

<div class="col-md-6 ">
    <div class="card ">
        <div class="card-body   ">
            <div class="col-black">
                <h4>Persentase permohonan</h4>
            </div>

            <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">

                <div class="px-2 pb-2 pb-md-0 text-center">
                    <div id="circles-1"><?php echo $persen1 = $this->svnr->persenPermohonan($total11, $input11); ?></div>
                    <h6 class="fw-bold mt-3 mb-0">VVIP</h6>

                </div>
                <div class="px-2 pb-2 pb-md-0 text-center">
                    <div id="circles-2"><?php echo $persen2 = $this->svnr->persenPermohonan($total12, $input12); ?></div>
                    <h6 class="fw-bold mt-3 mb-0">VIP</h6>
                </div>


                <div class="px-2 pb-2 pb-md-0 text-center">
                    <div id="circles-3"><?php echo $persen3 = $this->svnr->persenPermohonan($total13, $input13); ?></div>
                    <h6 class="fw-bold mt-3 mb-0">UMUM</h6>

                </div>

            </div>
        </div>
    </div>
</div>


<div class="col-md-6 ">
    <div class="card ">
        <div class="card-body   ">
            <div class="col-black">
                <h4>Persentase pendistribusian </h4>
            </div>

            <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                <div class="px-2 pb-2 pb-md-0 text-center">
                    <div id="circles-4"><?php echo  $persen4 = $this->svnr->persenPermohonan($input11, $dis11); ?></div>
                    <h6 class="fw-bold mt-3 mb-0">VVIP</h6>

                </div>
                <div class="px-2 pb-2 pb-md-0 text-center">
                    <div id="circles-5"><?php echo $persen5 = $this->svnr->persenPermohonan($input12, $dis12); ?></div>
                    <h6 class="fw-bold mt-3 mb-0">VIP</h6>
                </div>


                <div class="px-2 pb-2 pb-md-0 text-center">
                    <div id="circles-6"><?php echo $persen6 = $this->svnr->persenPermohonan($input13, $dis13); ?></div>
                    <h6 class="fw-bold mt-3 mb-0">UMUM</h6>

                </div>
            </div>
        </div>
    </div>
</div>












<script>
    $(document).ready(function() {

        Circles.create({
            id: 'circles-1',
            radius: 45,
            value: <?php echo $per_dispo = number_format($persen1); ?>,
            maxValue: 100,
            width: 7,
            text: <?php echo $per_dispo; ?> + "%",
            colors: ['#f1f1f1', '#8A2BE2'],
            duration: 700,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })

        Circles.create({
            id: 'circles-2',
            radius: 45,
            value: <?php echo $per_dispo = number_format($persen2); ?>,
            maxValue: 100,
            width: 7,
            text: <?php echo $per_dispo; ?> + "%",
            colors: ['#f1f1f1', '#1572E8'],
            duration: 900,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })
        Circles.create({
            id: 'circles-3',
            radius: 45,
            value: <?php echo $per_dispo = number_format($persen3); ?>,
            maxValue: 100,
            width: 7,
            text: <?php echo $per_dispo; ?> + "%",
            colors: ['#f1f1f1', '#32CD32'],
            duration: 900,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })

        Circles.create({
            id: 'circles-4',
            radius: 45,
            value: <?php echo $per_dispo = number_format($persen4); ?>,
            maxValue: 100,
            width: 7,
            text: <?php echo $per_dispo; ?> + "%",
            colors: ['#f1f1f1', '#8A2BE2'],
            duration: 900,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })

        Circles.create({
            id: 'circles-5',
            radius: 45,
            value: <?php echo $per_dispo = number_format($persen5); ?>,
            maxValue: 100,
            width: 7,
            text: <?php echo $per_dispo; ?> + "%",
            colors: ['#f1f1f1', '#32CD32'],
            duration: 900,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })

        Circles.create({
            id: 'circles-6',
            radius: 45,
            value: <?php echo $per_dispo = number_format($persen6); ?>,
            maxValue: 100,
            width: 7,
            text: <?php echo $per_dispo; ?> + "%",
            colors: ['#f1f1f1', '#1572E8'],
            duration: 900,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })



    });
</script>

<script>
    function detail(id) {
        $("#svnr_detail").modal("show");
        $("#dt-detail").html("mohon tunggu...");
        $.post("<?php echo base_url() ?>mysvnr/getDetail", {
            id: id
        }, function(data) {
            $("#dt-detail").html(data);
        });
    }
</script>



<div class="modal fade" id="svnr_detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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