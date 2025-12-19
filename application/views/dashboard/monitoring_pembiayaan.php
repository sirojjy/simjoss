<div class="card">
    <div class="row">
        <div class="col-md-12 border-right p-r-0">
            <div class="card-body border-bottom d-flex align-items-center">
                <h4 class="card-title font-weight-bold m-t-10 mr-2">7. Monitoring Pembiayaan Tahap I</h4>
                <span class="mdi mdi-alert-circle blink cursor-pointer <?= (!$isu7) ? 'd-none' : '' ?>" style="color:red;" onclick="view_alert(`<b>PERMASALAHAN :</b><br>
                    <?= (!$isu7 ? '' : $isu7->issue) ?>
                    <hr>
                    <b>REKOMENDASI :</b><br>
                    <?= (!$isu7 ? '' : $isu7->issue) ?>`)">
                </span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card cursor-pointer">
                            <div class="box bg-success" onclick="modalPembiayaanTahap('#modalPembiayaanTahap1')">
                                <h4 class="font-light text-white text-center"><b>Pembiayaan Tahap 1</b></h4><br>
                                <h4 class="text-white text-center">Lihat Detail </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card cursor-pointer">
                            <div class="box bg-warning" onclick="modalPembiayaanTahap('#modalPembiayaanTahap2')">
                                <h4 class="font-light text-white text-center"><b>Pembiayaan Tahap 2</b></h4><br>
                                <h4 class="text-white text-center">Lihat Detail </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card cursor-pointer">
                            <div class="box bg-danger" onclick="modalPembiayaanTahap('#modalPembiayaanTahap3')">
                                <h4 class="font-light text-white text-center"><b>Pembiayaan Tahap 3</b></h4><br>
                                <h4 class="text-white text-center">Lihat Detail </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 border-right p-r-0 d-none">
                        <div class="card">
                            <div class="col-md-12 border-right p-r-0">
                                <div class="card">
                                    <div class="card-body border-bottom">
                                        <div style="cursor: pointer;">
                                            <h4 class="text-danger text-center">Hutang Tahap 1 (Debt)</h4>
                                            <h5 class="text-danger mt-3 mb-3 text-center">Rp 9.893.216.000.000</h5>
                                            <h4 class="text-danger text-center">(70%)</h4>
                                        </div>
                                        <hr>
                                        <div style="cursor: pointer;">
                                            <h4 class="text-success text-center">Ekuitas Tahap 1 (Equity)</h4>
                                            <h5 class="text-success mt-3 mb-3 text-center">Rp 2.860.537.000.000</h5>
                                            <h4 class="text-success text-center">(30%)</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 border-right p-r-0 d-none">
                        <div class="card">
                            <div class="col-md-12 border-right p-r-0">
                                <div class="card-body border-bottom">
                                    <h4 class="card-title m-t-10"><b>Total Nilai Investasi Tahap 1</b></h4>
                                    <div id="pie_alokasi" style="height: 350px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="text-info"><i>Last updated : <?= $lastUpdateDashboard7 ?></i></p>
            </div>
        </div>
    </div>
</div>