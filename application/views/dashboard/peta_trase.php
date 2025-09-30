<!-- Card Trase Jalan Tol -->
<div class="card">
    <div class="">
        <div class="row">
            <div class="col-md-12 border-right p-r-0">
                <div class="card-body border-bottom d-flex align-items-center">
                    <h4 class="card-title font-weight-bold m-t-10 mr-2">1. Trase Jalan Tol</h4>
                    <span class="mdi mdi-alert-circle blink cursor-pointer <?= (!$isu1) ? 'd-none' : '' ?>" style="color:red;" onclick="view_alert(`<b>PERMASALAHAN :</b><br>
                            <?= (!$isu1 ? '' : $isu1->issue) ?> <hr> <b>REKOMENDASI :</b><br> <?= (!$isu1 ? '' : $isu1->issue) ?>`)"></span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card ">
                                <div id="map" style="width: 100%; margin: 3px; height: 530px;"></div>
                            </div>
                        </div>
                    </div>
                    <h5 class="text-info" style="text-align: center;"><a href="<?= base_url('assets/Trase2.jpg') ?>" target="_blank"><u>View Detail Trase</u></a></h5>
                </div>
            </div>
        </div>
    </div>
</div>