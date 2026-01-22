<div class="card">
    <div class="row">
        <div class="col-md-12 border-right p-r-0">
            <div class="card-body border-bottom d-flex align-items-center">
                <h4 class="card-title font-weight-bold m-t-10 mr-2">6. Monitoring Kelayakan Investasi</h4>
                <span class="mdi mdi-alert-circle blink cursor-pointer <?= (!$isu6) ? 'd-none' : '' ?>" style="color:red;" onclick="view_alert(`<b>PERMASALAHAN :</b><br>
                    <?= (!$isu6 ? '' : $isu6->issue) ?>
                    <hr>
                    <b>REKOMENDASI :</b><br>
                    <?= (!$isu6 ? '' : $isu6->issue) ?>`)">
                </span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 mb-4">
                        <table class="table-bordered table-striped table mb-0">
                            <tbody>
                                <tr style="background-color: #219ebc; color: white">
                                    <td class="font-wight-bold">Kelayakan Invetasi</td>
                                    <td class="text-center font-weight-bold">PPJT 2020</td>
                                    <td class="text-center font-weight-bold">Add-2 PPJT</td>
                                    <td class="text-center font-weight-bold">BP OE</td>
                                </tr>
                                <tr>
                                    <td class="font-wight-bold">IRR on Project </td>
                                    <td class="text-center"><span class="badge badge-lg badge-pill badge-success " style="font-size: 12px">12.03%</span></td>
                                    <td class="text-center"><span class="badge badge-lg badge-pill badge-primary " style="font-size: 12px">12.03%</span></td>
                                    <td class="text-center"><span class="badge badge-lg badge-pill badge-info " style="font-size: 12px">10.72%</span></td>
                                </tr>
                                <tr>
                                    <td class="font-wight-bold">IRR on Equity </td>
                                    <td class="text-center"><span class="badge badge-lg badge-pill badge-success " style="font-size: 12px">14.14%</span></td>
                                    <td class="text-center"><span class="badge badge-lg badge-pill badge-primary " style="font-size: 12px">14.09%</span></td>
                                    <td class="text-center"><span class="badge badge-lg badge-pill badge-info " style="font-size: 12px">14.53%</span></td>
                                </tr>
                                <tr>
                                    <td class="font-wight-bold">Net Present Value/NPV (Rp Juta) </td>
                                    <td class="text-center font-weight-bold">2.260.135</td>
                                    <td class="text-center font-weight-bold">2.225.445</td>
                                    <td class="text-center font-weight-bold">326.059</td>
                                </tr>
                                <tr>
                                    <td class="font-wight-bold">Payback Period (PBP) </td>
                                    <td class="text-center"><span class="badge badge-lg badge-pill badge-success " style="font-size: 12px">12 Tahun</span></td>
                                    <td class="text-center"><span class="badge badge-lg badge-pill badge-primary " style="font-size: 12px">13 Tahun</span></td>
                                    <td class="text-center"><span class="badge badge-lg badge-pill badge-info " style="font-size: 12px">13 Tahun</span></td>
                                </tr>
                                <tr>
                                    <td class="font-wight-bold">WACC </td>
                                    <td class="text-center"><span class="badge badge-lg badge-pill badge-success " style="font-size: 12px">11.26%</span></td>
                                    <td class="text-center"><span class="badge badge-lg badge-pill badge-primary " style="font-size: 12px">11.26%</span></td>
                                    <td class="text-center"><span class="badge badge-lg badge-pill badge-info " style="font-size: 12px">11.26%</span></td>
                                </tr>
                                <tr>
                                    <td class="font-wight-bold">Nilai Investasi </td>
                                    <td class="text-center font-weight-bold">26.636.815</td>
                                    <td class="text-center font-weight-bold">27.486.608</td>
                                    <td class="text-center font-weight-bold">26.890.749</td>
                                </tr>
                                <tr>
                                    <td class="font-wight-bold">Tarif Tol </td>
                                    <td class="text-center font-weight-bold">Rp 1.848</td>
                                    <td class="text-center font-weight-bold">Rp. 1.896</td>
                                    <td class="text-center font-weight-bold">Rp. 1.896</td>
                                </tr>
                                <tr>
                                    <td class="font-wight-bold">Total CDS (Rp Juta) </td>
                                    <td class="text-center font-weight-bold">3.820.839 </td>
                                    <td class="text-center font-weight-bold">1.730.000 </td>
                                    <td class="text-center font-weight-bold">3.055.000</td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <a href="javascript:void(0)" onclick="toggleDashboard6('.atp-content')" class="text-dark">ATP <i class="fa fa-caret-down"></i></a>
                                    </td>
                                </tr>
                                <tr class="atp-content d-none">
                                    <td class="font-wight-bold">Segmen Kartasura - Purwomartani (42.37 km)</td>
                                    <td rowspan="3" class="text-center font-weight-bold align-middle">Rp3.575/km</td>
                                    <td rowspan="3" class="text-center font-weight-bold align-middle">Rp3.575/km</td>
                                    <td class="text-center font-weight-bold">Rp2.127,06/km</td>
                                </tr>
                                <tr class="atp-content d-none">
                                    <td class="font-wight-bold">Segmen Purwomartani - Junction Sleman (15.36 km)</td>
                                    <td class="text-center font-weight-bold">Rp2.186,08/km</td>
                                </tr>
                                <tr class="atp-content d-none">
                                    <td class="font-wight-bold">Segmen Junction Sleman - NYIA (38.74 km)</td>
                                    <td class="text-center font-weight-bold">Rp2.249,85/km</td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <a href="javascript:void(0)" onclick="toggleDashboard6('.wtp-content')" class="text-dark">WTP <i class="fa fa-caret-down"></i></a>
                                    </td>
                                </tr>
                                <tr class="wtp-content d-none">
                                    <td class="font-wight-bold">Segmen Kartasura - Purwomartani (42.37 km)</td>
                                    <td rowspan="3" class="text-center font-weight-bold align-middle">Rp1.199/km</td>
                                    <td rowspan="3" class="text-center font-weight-bold align-middle">Rp1.199/km</td>
                                    <td class="text-center font-weight-bold">Rp1983,98/km</td>
                                </tr>
                                <tr class="wtp-content d-none">
                                    <td class="font-wight-bold">Segmen Purwomartani - Junction Sleman (15.36 km)</td>
                                    <td class="text-center font-weight-bold">Rp1793,84/km</td>
                                </tr>
                                <tr class="wtp-content d-none">
                                    <td class="font-wight-bold">Segmen Junction Sleman - NYIA (38.74 km)</td>
                                    <td class="text-center font-weight-bold">Rp1,998.59/km</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-12">
                        <table class="table-bordered table-striped table mb-0">
                            <tbody>
                                <tr style="background-color: #219ebc; color: white">
                                    <td><b>Parameter</b></td>
                                    <td class="text-center"><b>PPJT 2020</b></td>
                                    <td class="text-center"><b>Add-2 PPJT</b></td>
                                    <td class="text-center"><b>BP OE</b></td>
                                </tr>
                                <tr>
                                    <td><b>Penyesuaian Tarif</b></td>
                                    <td class="text-center"><span class="badge badge-lg badge-pill badge-success " style="font-size: 12px">8.00%</span></td>
                                    <td class="text-center"><span class="badge badge-lg badge-pill badge-primary " style="font-size: 12px">8.00%</span></td>
                                    <td class="text-center"><span class="badge badge-lg badge-pill badge-info " style="font-size: 12px">6.00%</span></td>
                                </tr>
                                <tr>
                                    <td><b>% Inflasi </b></td>
                                    <td class="text-center"><span class="badge badge-lg badge-pill badge-success " style="font-size: 12px">4.00%</span></td>
                                    <td class="text-center"><span class="badge badge-lg badge-pill badge-primary " style="font-size: 12px">4.00%</span></td>
                                    <td class="text-center"><span class="badge badge-lg badge-pill badge-info " style="font-size: 12px">3.00%</span></td>
                                </tr>
                                <tr>
                                    <td><b>% Rate Bunga Pokok</b></td>
                                    <td class="text-center"><span class="badge badge-lg badge-pill badge-success " style="font-size: 12px">11.00%</span></td>
                                    <td class="text-center"><span class="badge badge-lg badge-pill badge-primary " style="font-size: 12px">11.00%</span></td>
                                    <td class="text-center"><span class="badge badge-lg badge-pill badge-info " style="font-size: 12px">8.00%</span></td>
                                </tr>
                                <tr>
                                    <td><b>Masa Konsesi</b></td>
                                    <td class="text-center"><span class="badge badge-lg badge-pill badge-success " style="font-size: 12px">40 tahun</span></td>
                                    <td class="text-center"><span class="badge badge-lg badge-pill badge-primary " style="font-size: 12px">40 tahun</span></td>
                                    <td class="text-center"><span class="badge badge-lg badge-pill badge-info " style="font-size: 12px">40 tahun</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <p class="text-info"><i>Last updated : <?= $lastUpdateDashboard6 ?></i></p>
            </div>
        </div>
    </div>
</div>