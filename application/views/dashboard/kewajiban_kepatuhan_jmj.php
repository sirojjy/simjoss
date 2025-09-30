<div class="card">
    <div class="row">
        <div class="col-md-12 border-right p-r-0">
            <div class="card-body border-bottom d-flex align-items-center">
                <h4 class="card-title font-weight-bold m-t-10 mr-2">10. Kewajiban Kepatuhan JMJ</h4>
                <span class="mdi mdi-alert-circle blink cursor-pointer <?= (!$isu10) ? 'd-none' : '' ?>" style="color:red;" onclick="view_alert(`<b>PERMASALAHAN :</b><br>
                    <?= (!$isu10 ? '' : $isu10->issue) ?>
                    <hr>
                    <b>REKOMENDASI :</b><br>
                    <?= (!$isu10 ? '' : $isu10->issue) ?>`)">
                </span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="box bg-info text-center" data-toggle="modal" data-target="#table_kepatuhan" data-judul="OPERASIONAL" data-id="1" data-url="<?= site_url('Manajemen/getDataKewajiban'); ?>">
                                    <h4 class="font-light text-white"><b>Operasional</b></h4><br>
                                    <h3 class="text-white mb-3"><?= round(($operasional_ada / $operasional_tot * 100), 2) ?>%</h3>
                                    <span class="badge badge-lg badge-pill badge-success " style="font-size: 12px; background-color: #e2fdff; color: black">Total : <?= $operasional_tot ?></span>&emsp; <span class="badge badge-lg badge-pill badge-success " style="font-size: 12px; background-color: #caffbf; color: black">Ada : <?= $operasional_ada ?></span>&emsp; <span class="badge badge-lg badge-pill badge-success " style="font-size: 12px; background-color: #f4f1bb; color: black">Tidak Ada : <?= $operasional_tdk ?></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="box bg-success text-center" data-toggle="modal" data-target="#table_kepatuhan" data-judul="KORPORASI" data-id="2" data-url="<?= site_url('Manajemen/getDataKewajiban'); ?>">
                                    <h4 class="font-light text-white"><b>Korporasi</b></h4><br>
                                    <h3 class="text-white mb-3"><?= round(($korporasi_ada / $korporasi_tot * 100), 2) ?>%</h3>
                                    <span class="badge badge-lg badge-pill badge-success " style="font-size: 12px; background-color: #e2fdff; color: black">Total : <?= $korporasi_tot ?></span>&emsp; <span class="badge badge-lg badge-pill badge-success " style="font-size: 12px; background-color: #caffbf; color: black">Ada : <?= $korporasi_ada ?></span>&emsp; <span class="badge badge-lg badge-pill badge-success " style="font-size: 12px; background-color: #f4f1bb; color: black">Tidak Ada : <?= $korporasi_tdk ?></span>
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="box bg-warning text-center" data-toggle="modal" data-target="#table_kepatuhan" data-judul="PERIZINAN" data-id="3" data-url="<?= site_url('Manajemen/getDataKewajiban'); ?>">
                                    <h4 class="font-light text-white"><b>Perizinan</b></h4><br>
                                    <h3 class="text-white mb-3"><?= round(($perizinan_ada / $perizinan_tot * 100), 2) ?>%</h3>
                                    <span class="badge badge-lg badge-pill badge-success " style="font-size: 12px; background-color: #e2fdff; color: black">Total : <?= $perizinan_tot ?></span>&emsp; <span class="badge badge-lg badge-pill badge-success " style="font-size: 12px; background-color: #caffbf; color: black">Ada : <?= $perizinan_ada ?></span>&emsp; <span class="badge badge-lg badge-pill badge-success " style="font-size: 12px; background-color: #f4f1bb; color: black">Tidak Ada : <?= $perizinan_tdk ?></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="box bg-danger text-center" data-toggle="modal" data-target="#table_kepatuhan" data-judul="REGULASI INTERNAL" data-id="4" data-url="<?= site_url('Manajemen/getDataKewajiban'); ?>">
                                    <h4 class="font-light text-white"><b>Regulasi Internal</b></h4><br>
                                    <h3 class="text-white mb-3"><?= round(($regulasi_ada / $regulasi_tot * 100), 2) ?>%</h3>
                                    <span class="badge badge-lg badge-pill badge-success " style="font-size: 12px; background-color: #e2fdff; color: black">Total : <?= $regulasi_tot ?></span>&emsp; <span class="badge badge-lg badge-pill badge-success " style="font-size: 12px; background-color: #caffbf; color: black">Ada : <?= $regulasi_ada ?></span>&emsp; <span class="badge badge-lg badge-pill badge-success " style="font-size: 12px; background-color: #f4f1bb; color: black">Tidak Ada : <?= $regulasi_tdk ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="bar_kepatuhan" style="height: 450px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>