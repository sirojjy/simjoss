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
                    <div class="col-lg-6 col-12">
                        <div id="pemegangSaham"></div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title font-weight-bold m-t-10">Update Business Plan</h4>
                            <button type="button" class="btn btn-sm btn-info" onclick="modalPembiayaanTahap('#modalBisnisPlan')">
                                Detail
                            </button>
                        </div>
                        <!-- table -->
                        <table class="table table-bordered">
                            <thead class="bg-theme text-white font-weight-bold">
                                <th class="font-weight-bold">
                                    Biaya Investasi
                                </th>
                                <th class="font-weight-bold">
                                    BA BPJT Terupdate
                                </th>
                                <th class="font-weight-bold">
                                    OE
                                </th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="font-weight-bold">A. Biaya Proyek</td>
                                    <td class="text-right"></td>
                                    <td class="text-right"></td>
                                </tr>
                                <tr>
                                    <td class="">Biaya Konstruksi</td>
                                    <td class="text-right"> 18.990.999</td>
                                    <td class="text-right"> 19.446.439</td>
                                </tr>
                                <tr>
                                    <td class="">Peralatan Tol</td>
                                    <td class="text-right"> 57.800</td>
                                    <td class="text-right"> 139.413</td>
                                </tr>
                                <tr>
                                    <td class="">Design</td>
                                    <td class="text-right"> 237.387</td>
                                    <td class="text-right"> 129.964</td>
                                </tr>
                                <tr>
                                    <td class="">Supervisi + PMI</td>
                                    <td class="text-right"> 261.167</td>
                                    <td class="text-right"> 266.236</td>
                                </tr>
                                <tr>
                                    <td class="">Eskalasi</td>
                                    <td class="text-right"> 1.940.183</td>
                                    <td class="text-right"> 1.957.904</td>
                                </tr>
                                <tr>
                                    <td class="">Overhead</td>
                                    <td class="text-right"> 322.320</td>
                                    <td class="text-right"> 398.202</td>
                                </tr>
                                <tr>
                                    <td class="">PPN</td>
                                    <td class="text-right"> 2.370.312</td>
                                    <td class="text-right"> 2.520.264</td>
                                </tr>
                                <tr>
                                    <td class="">Biaya Proyek</td>
                                    <td class="text-right"> 2.370.312</td>
                                    <td class="text-right"> 2.520.264</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">B. Financial Fee</td>
                                    <td class="text-right"> 288.996</td>
                                    <td class="text-right"> 312.573</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">C. Bunga Masa Konstruksi</td>
                                    <td class="text-right"> 3.016.993</td>
                                    <td class="text-right"> 2.379.320</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Total Biaya Investasi</td>
                                    <td class="text-right"> 27.486.608</td>
                                    <td class="text-right"> 27.550.316</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
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