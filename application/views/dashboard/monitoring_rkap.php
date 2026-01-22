<div class="card">
    <div class="row">
        <div class="col-md-12 border-right p-r-0">
            <div class="card-body border-bottom d-flex align-items-center">
                <h4 class="card-title font-weight-bold m-t-10 mr-2">5. Monitoring RKAP</h4>
                <span class="mdi mdi-alert-circle blink cursor-pointer <?= (!$isu5) ? 'd-none' : '' ?>" style="color:red;" onclick="view_alert(`<b>PERMASALAHAN :</b><br>
                        <?= (!$isu5 ? '' : $isu5->issue) ?>
                        <hr>
                        <b>REKOMENDASI :</b><br>
                        <?= (!$isu5 ? '' : $isu5->issue) ?>`)">
                </span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div id="bar_opex" style="height: 500px;"></div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="alert alert-primary">
                                    <p class="text-center mb-0 text-primary font-16 font-weight-bold">
                                        Total Rencana : Rp. <?= number_format($tot_opex->rencana, 0, ',', '.') ?>
                                    </p>
                                    <p class="text-center mb-0 text-primary font-16 font-weight-bold">
                                        Total Realisasi : Rp. <?= number_format($tot_opex->realisasi, 0, ',', '.') ?>
                                    </p>
                                    <p class="text-center mb-0 text-danger font-16 font-weight-bold">
                                        Total Deviasi : Rp. <?= number_format($tot_opex->rencana - $tot_opex->realisasi, 0, ',', '.') ?>
                                        <span>(<?= number_format(($tot_opex->rencana - $tot_opex->realisasi) / $tot_opex->realisasi * 100, 2, ',', '.') ?>%)</span>
                                        <i class="fa fa-exclamation-triangle <?= ($tot_opex->rencana - $tot_opex->realisasi >= 5) ? '' : 'd-none' ?>"></i>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="bar_capex" style="height: 500px;"></div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="alert alert-primary">
                                    <p class="text-center mb-0 text-primary font-16 font-weight-bold">
                                        Total Rencana : Rp. <?= number_format($tot_capex->rencana, 0, ',', '.') ?>
                                    </p>
                                    <p class="text-center mb-0 text-primary font-16 font-weight-bold">
                                        Total Realisasi : Rp. <?= number_format($tot_capex->realisasi, 0, ',', '.') ?>
                                    </p>
                                    <p class="text-center mb-0 text-danger font-16 font-weight-bold">
                                        Total Deviasi : Rp. <?= number_format($tot_capex->rencana - $tot_capex->realisasi, 0, ',', '.') ?>
                                        <span>(<?= number_format(($tot_capex->rencana - $tot_capex->realisasi) / $tot_capex->realisasi * 100, 2, ',', '.') ?>%)</span>
                                        <i class="fa fa-exclamation-triangle <?= ($tot_capex->rencana - $tot_capex->realisasi >= 5) ? '' : 'd-none' ?>"></i>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="col-10">
                        <div class="alert alert-secondary">
                            <p class="text-center mb-0 font-16 font-weight-bold">
                                Total Rencana Opex + Capex: Rp. <?= number_format($tot_opex->rencana + $tot_capex->rencana, 0, ',', '.') ?>
                            </p>
                            <p class="text-center mb-0 font-16 font-weight-bold">
                                Total Realisasi Opex + Capex : Rp. <?= number_format($tot_opex->realisasi + $tot_capex->realisasi, 0, ',', '.') ?>
                            </p>
                        </div>
                    </div>
                </div>
                <p class="text-info mt-3"><i>Last updated : <?= $lastUpdateDashboard5 ?></i></p>
            </div>
        </div>
    </div>
</div>