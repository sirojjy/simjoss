<div class="card">
    <div class="row">
        <div class="col-md-12 border-right p-r-0">
            <div class="card-body border-bottom d-flex align-items-center">
                <h4 class="card-title font-weight-bold m-t-10 mr-2">8. Monitoring Dana Talangan Tanah & Pembayaran</h4>
                <span class="mdi mdi-alert-circle blink cursor-pointer <?= (!$isu8) ? 'd-none' : '' ?>" style="color:red;" onclick="view_alert(`<b>PERMASALAHAN :</b><br>
                    <?= (!$isu8 ? '' : $isu8->issue) ?>
                    <hr>
                    <b>REKOMENDASI :</b><br>
                    <?= (!$isu8 ? '' : $isu8->issue) ?>`)">
                </span>
            </div>
            <div class="card-body">
                <div class="card">
                    <h5>Alokasi Pendanaan Pengadaaan Tanah <span class="badge badge-lg badge-pill badge-secondary font-weight-bold">Tahun 2025</span></h5>
                    <div class="card-body bg-light">
                        <h4 class="text-center">Total Alokasi Dana</h4>
                        <h2 class="mb-0 text-center text-info">Rp. <?= number_format($alokasi_kumulatif, 2, ',', '.') ?></h2>
                        <div class="mt-2">
                            <div id="alokasi_pengadaan_tanah"></div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <h5>Dana Talangan Tanah</h5>
                    <div class="card-body bg-light">
                        <h4 class="text-center">Fasilitas Kredit Dana Talangan Tanah</h4>
                        <h2 class="mb-0 text-center text-info">Rp. <?= number_format($fasilitas_dtt, 2, ',', '.') ?></h2>
                        <div class="mt-2">
                            <div id="dana_talanangan_tanah"></div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <h5>Realisasi Dana Talangan Tanah</h5>
                    <div class="card-body bg-light">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <table class="table table-bordered">
                                    <thead class="bg-theme text-white font-weight-bold">
                                        <th colspan="2" class="font-weight-bold">
                                            APJT : PT Jasamarga Jogja Solo
                                        </th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="font-weight-bold">Pembayaran Tanah Ke Warga</td>
                                            <td class="text-right"> 150,562,181,272</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Telah Dikembalikan oleh Pemerintah</td>
                                            <td class="text-right"> 87,106,921,529 </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="font-weight-bold">
                                                <a href="javascript:void(0)" onclick="toggleDashboard8('.realisasi_dtt_left')" class="text-dark">Outstanding <i class="fa fa-caret-down"></i></a>
                                            </td>
                                        </tr>
                                        <tr class="realisasi_dtt_left">
                                            <td class="font-weight-bold indent">Sisa DTT Eligible</td>
                                            <td class="text-right">82,490,747,870 </td>
                                        </tr>
                                        <tr class="realisasi_dtt_left">
                                            <td class="font-weight-bold indent">DTT Ineligible</td>
                                            <td class="text-right">-</td>
                                        </tr>
                                        <tr class="realisasi_dtt_left">
                                            <td class="font-weight-bold indent">Belum Verifikasi</td>
                                            <td class="text-right"> 68,071,433,402</td>
                                        </tr>
                                        <tr class="realisasi_dtt_left">
                                            <td class="font-weight-bold indent">Total</td>
                                            <td class="text-right"> 63,455,259,743</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12 col-md-6">
                                <table class="table table-bordered">
                                    <thead class="bg-theme text-white font-weight-bold">
                                        <th colspan="2" class="font-weight-bold">
                                            APJT : PT Jasamarga Jogja Solo
                                        </th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="font-weight-bold">Bunga Pinjaman</td>
                                            <td class="text-right"> 11,752,672,241 </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="font-weight-bold">
                                                <a href="javascript:void(0)" onclick="toggleDashboard8('.realisasi_dtt_right')" class="text-dark">Outstanding <i class="fa fa-caret-down"></i></a>
                                            </td>
                                        </tr>
                                        <tr class="realisasi_dtt_right">
                                            <td class="font-weight-bold indent">Total</td>
                                            <td class="text-right">7,070,606,828</td>
                                        </tr>
                                        <tr class="realisasi_dtt_right">
                                            <td class="font-weight-bold indent">Telah Direkonsiliasi</td>
                                            <td class="text-right">1,182,011,927 </td>
                                        </tr>
                                        <tr class="realisasi_dtt_right">
                                            <td class="font-weight-bold indent">Telah Dikembalikan</td>
                                            <td class="text-right">752,141,034 </td>
                                        </tr>
                                        <tr class="realisasi_dtt_right">
                                            <td class="font-weight-bold indent">Sisa Terhadap Hasil Rekon</td>
                                            <td class="text-right">429,870,893 </td>
                                        </tr>
                                        <tr class="realisasi_dtt_right">
                                            <td class="font-weight-bold indent">Sisa Terhadap Total</td>
                                            <td class="text-right">6,318,465,794</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Beban BUJT</td>
                                            <td class="text-right">4,682,065,413</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <h5>Pembayaran Langsung</h5>
                    <div class="card-body bg-light">
                        <h4 class="text-center">Kebutuhan / Rencana Alokasi Pembayaran Langsung 2025</h4>
                        <h2 class="mb-0 text-center text-info">Rp. <?= number_format($pembayaran_langsung, 2, ',', '.') ?></h2>
                        <div class="mt-2">
                            <div id="chart_pembayaran_langsung"></div>
                        </div>
                    </div>
                </div>
                <p class="text-info"><i>Last updated : <?= $lastUpdateDashboard8 ?></i></p>
            </div>
        </div>
    </div>
</div>