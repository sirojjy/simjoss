<div class="card">
    <div class="">
        <div class="row">
            <div class="col-md-12 border-right p-r-0">
                <div class="card-body border-bottom">
                    <h4 class="card-title m-t-10"><b>5. Monitoring RKAP</b></h4>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <div id="bar_opex" style="height: 500px;"></div>
                            <div class="row">
                                <div class="col-md-2">
                                </div>
                                <div class="col-md-8">
                                    <div class="alert alert-primary">
                                        <p align="center" style="font-size: 14px"><b>
                                                <font color="blue">Total Rencana : Rp. <?php echo number_format($tot_opex_rencana, 0, ',', '.') ?></font>
                                            </b>
                                            <br><b>
                                                <font color="blue">Total Realisasi : Rp. <?php echo number_format($tot_opex_realisasi, 0, ',', '.') ?></font>
                                            </b>
                                            <br><b>
                                                <font color="red">Total Deviasi : Rp. <?php echo number_format($tot_opex_rencana - $tot_opex_realisasi, 0, ',', '.') ?></font>
                                            </b>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div id="bar_capex" style="height: 500px;"></div>
                            <div class="row">
                                <div class="col-md-2">
                                </div>
                                <div class="col-md-8">
                                    <div class="alert alert-primary">
                                        <p align="center" style="font-size: 14px"><b>
                                                <font color="blue">Total Rencana : Rp. <?php echo number_format($tot_capex_rencana, 0, ',', '.') ?></font>
                                            </b>
                                            <br><b>
                                                <font color="blue">Total Realisasi : Rp. <?php echo number_format($tot_capex_realisasi, 0, ',', '.') ?></font>
                                            </b>
                                            <br><b>
                                                <font color="red">Total Deviasi : Rp. <?php echo number_format($tot_capex_rencana - $tot_capex_realisasi, 0, ',', '.') ?></font>
                                            </b>
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <p class="text-info mt-3"><i>Last updated : TW I 2025/Maret 2025</i></p>
                </div>
            </div>
        </div>
    </div>
</div>