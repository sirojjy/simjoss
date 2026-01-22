<!-- Modal Isu -->
<div class="modal fade show" id="modalIsu" tabindex="-1" role="dialog" aria-labelledby="detailDttModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="min-width: 75%;">
        <div class="modal-content">
            <div class="modal-header text-white" style="background-color:rgb(21, 81, 128);">
                <h5 class="modal-title" id="detailDttModalLabel">Early Warning</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color:white;">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12" id="detail_isu">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Dashboard 7 Bisnis Plan -->
<div class="modal fade show" id="modalBisnisPlan" tabindex="-1" role="dialog" aria-labelledby="modalBisnisPlan" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="min-width: 75%;">
        <div class="modal-content">
            <div class="modal-header text-white" style="background-color:rgb(21, 81, 128);">
                <h5 class="modal-title" id="detailDttModalLabel">Detail Business Plan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color:white;">×</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- view file pdf -->
                <div class="row">
                    <div class="col-md-12">
                        <embed src="<?php echo base_url('assets/pdf/Data-Setoran-Modal-Dashboard-7.pdf') ?>" type="application/pdf" width="100%" height="600px" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Dashboard 7 Tahap 1 -->
<div class="modal fade show" id="modalPembiayaanTahap1" tabindex="-1" role="dialog" aria-labelledby="detailDttModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="min-width: 95%;">
        <div class="modal-content">
            <div class="modal-header text-white" style="background-color:rgb(21, 81, 128);">
                <h5 class="modal-title" id="detailDttModalLabel">Detail Pembiayaan Tahap 1</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color:white;">×</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- 55-57 -->
                <h6 class="font-weight-bold" style="color: rgb(21, 81, 128);">Tabel 1: Pembiayaan Tahap 1</h6>
                <div class="table-responsive mb-4">
                    <table class="table table-bordered table-striped table-sm">
                        <thead class="text-center text-white" style="background-color:#1d6296;">
                            <tr>
                                <th rowspan="3">No</th>
                                <th rowspan="3">Uraian</th>
                                <th rowspan="3">Total Project Cost</th>
                                <th rowspan="2" colspan="3">Akumulasi Pengeluaran + Pencairan 19 Dari awal s.d 30 Juni 2025</th>
                                <th rowspan="2">Sisa Anggaran</th>
                                <th colspan="7">Proyeksi Juni s.d Des 2025</th>
                            </tr>
                            <tr>
                                <th>Jun-25</th>
                                <th>Jul-25</th>
                                <th>Agu-25</th>
                                <th>Sep-25</th>
                                <th>Okt-25</th>
                                <th>Nov-25</th>
                                <th>Des-25</th>
                            </tr>
                            <tr>
                                <th>Jumlah Rp</th>
                                <th>Prestasi %</th>
                                <th>Bobot %</th>
                                <th>Jumlah Rp</th>
                                <th>Jumlah Rp</th>
                                <th>Jumlah Rp</th>
                                <th>Jumlah Rp</th>
                                <th>Jumlah Rp</th>
                                <th>Jumlah Rp</th>
                                <th>Jumlah Rp</th>
                                <th>Jumlah Rp</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Desain (FED)</td>
                                <td>199.198.000.000</td>
                                <td>64.440.909.612</td>
                                <td>32.35%</td>
                                <td>0.46%</td>
                                <td>134.757.090.388</td>
                                <td>-</td>
                                <td>4.086.101.200</td>
                                <td>4.834.813.136</td>
                                <td>5.984.582.700</td>
                                <td>-</td>
                                <td>7.943.242.714</td>
                                <td>31.367.800.500</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Konstruksi</td>
                                <td>10.392.510.000.000</td>
                                <td>7.048.941.727.164</td>
                                <td>67,83%</td>
                                <td>67,83%</td>
                                <td>3.343.568.272.836</td>
                                <td>172.395.568.297</td>
                                <td>121.255.796.623</td>
                                <td>155.733.927.803</td>
                                <td>189.176.049.262</td>
                                <td>292.921.248.330</td>
                                <td>238.086.988.365</td>
                                <td>238.086.988.365</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Clear Zone</td>
                                <td>-</td>
                                <td>-</td>
                                <td>0%</td>
                                <td>0%</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Peralatan Tol</td>
                                <td>28.907.000.000</td>
                                <td>15.840.466.975</td>
                                <td>54,80%</td>
                                <td>0,11%</td>
                                <td>13.066.533.025</td>
                                <td>-</td>
                                <td>-</td>
                                <td>15.840.466.975</td>
                                <td>-</td>
                                <td>18.310.276.837</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Supervisi</td>
                                <td>123.808.000.000</td>
                                <td>93.841.580.149</td>
                                <td>75,80%</td>
                                <td>0,66%</td>
                                <td>29.966.419.851</td>
                                <td>1.695.950.154</td>
                                <td>2.886.790.000</td>
                                <td>2.812.278.000</td>
                                <td>2.624.492.000</td>
                                <td>2.660.541.500</td>
                                <td>2.187.630.000</td>
                                <td>2.337.357.798</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Eskalasi</td>
                                <td>973.264.000.000</td>
                                <td>-</td>
                                <td>0%</td>
                                <td>0%</td>
                                <td>973.264.000.000</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>442.205.380.370</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>PPN</td>
                                <td>1.288.945.000.000</td>
                                <td>792.317.573.949</td>
                                <td>61,47%</td>
                                <td>5,61%</td>
                                <td>496.627.426.051</td>
                                <td>19.209.717.835</td>
                                <td>14.164.531.461</td>
                                <td>18.030.242.883</td>
                                <td>21.814.694.436</td>
                                <td>32.577.167.681</td>
                                <td>76.004.887.359</td>
                                <td>23.265.507.472</td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>Overhead</td>
                                <td>171.877.000.000</td>
                                <td>19.848.202.020</td>
                                <td>11,55%</td>
                                <td>0,14%</td>
                                <td>152.028.797.980</td>
                                <td>-</td>
                                <td>2.270.882.718</td>
                                <td>2.270.882.718</td>
                                <td>2.270.882.718</td>
                                <td>2.270.882.718</td>
                                <td>2.270.882.718</td>
                                <td>2.270.882.718</td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>Financial Cost</td>
                                <td>195.781.000.000</td>
                                <td>-</td>
                                <td>0%</td>
                                <td>0%</td>
                                <td>195.781.000.000</td>
                                <td>-</td>
                                <td>-</td>
                                <td>86.248.082.214</td>
                                <td>-</td>
                                <td>25.000.000.000</td>
                                <td>-</td>
                                <td>1.500.000.000</td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>IDC</td>
                                <td>758.875.000.000</td>
                                <td>545.054.946.183</td>
                                <td>71,82%</td>
                                <td>3,86%</td>
                                <td>213.820.053.817</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>110.314.887.919</td>
                                <td>-</td>
                                <td>-</td>
                                <td>103.505.165.899</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th class="text-center font-weight-bold">Total</th>
                                <th class="text-center font-weight-bold">14.133.165.000.000 </th>
                                <th class="text-center font-weight-bold">8.580.285.406.052 </th>
                                <th></th>
                                <th class="text-center font-weight-bold">60,71%</th>
                                <th class="text-center font-weight-bold">5.552.879.593.948</th>
                                <th class="text-center font-weight-bold">193.301.236.286</th>
                                <th class="text-center font-weight-bold">144.664.102.001</th>
                                <th class="text-center font-weight-bold">285.770.693.729</th>
                                <th class="text-center font-weight-bold">332.185.589.034</th>
                                <th class="text-center font-weight-bold">373.740.117.066</th>
                                <th class="text-center font-weight-bold">768.699.011.526</th>
                                <th class="text-center font-weight-bold">341.545.389.467</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="table-responsive mb-4">
                    <table class="table table-bordered table-striped table-sm">
                        <thead class="text-center text-white" style="background-color:#1d6296;">
                            <tr>
                                <th rowspan="3">No</th>
                                <th rowspan="3">Uraian</th>
                                <th rowspan="3">Total Project Cost</th>
                                <th rowspan="2" colspan="3">Akumulasi Pengeluaran + Pencairan 19 Dari awal s.d 30 Juni 2025</th>
                                <th rowspan="2">Sisa Anggaran</th>
                                <th colspan="7">Proyeksi Januari s.d Juni 2026</th>
                            </tr>
                            <tr>
                                <th>Jan-26</th>
                                <th>Feb-26</th>
                                <th>Mar-26</th>
                                <th>Apr-26</th>
                                <th>Mei-26</th>
                                <th>Jun-26</th>
                            </tr>
                            <tr>
                                <th>Jumlah Rp</th>
                                <th>Prestasi %</th>
                                <th>Bobot %</th>
                                <th>Jumlah Rp</th>
                                <th>Jumlah Rp</th>
                                <th>Jumlah Rp</th>
                                <th>Jumlah Rp</th>
                                <th>Jumlah Rp</th>
                                <th>Jumlah Rp</th>
                                <th>Jumlah Rp</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>942.250.000</td>
                                <td>942.250.000</td>
                                <td>942.250.000</td>
                                <td>942.250.000</td>
                                <td>942.250.000</td>
                                <td>942.250.000</td>
                                <td>942.250.000</td>
                                <td>942.250.000</td>
                                <td>942.250.000</td>
                                <td>942.250.000</td>
                                <td>942.250.000</td>
                                <td>942.250.000</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Konstruksi</td>
                                <td>10.392.510.000.000</td>
                                <td>7.048.941.727.164</td>
                                <td>67,83%</td>
                                <td>67,83%</td>
                                <td>3.343.568.272.836</td>
                                <td>271.711.500.542</td>
                                <td>257.926.166.842</td>
                                <td>281.416.451.515</td>
                                <td>147.170.103.523</td>
                                <td>142.851.597.944</td>
                                <td>50.993.629.716</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Clear Zone</td>
                                <td>-</td>
                                <td>-</td>
                                <td>0%</td>
                                <td>0%</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Peralatan Tol</td>
                                <td>28.907.000.000</td>
                                <td>15.840.466.975</td>
                                <td>54,80%</td>
                                <td>0,11%</td>
                                <td>13.066.533.025</td>
                                <td>18.310.276.837</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Supervisi</td>
                                <td>123.808.000.000</td>
                                <td>93.841.580.149</td>
                                <td>75,80%</td>
                                <td>0,66%</td>
                                <td>29.966.419.851</td>
                                <td>2.260.483.800</td>
                                <td>2.229.483.800</td>
                                <td>2.273.483.800</td>
                                <td>2.400.583.800</td>
                                <td>2.371.533.050</td>
                                <td>2.492.632.798</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Eskalasi</td>
                                <td>973.264.000.000</td>
                                <td>-</td>
                                <td>0%</td>
                                <td>0%</td>
                                <td>973.264.000.000</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>PPN</td>
                                <td>1.288.945.000.000</td>
                                <td>792.317.573.949</td>
                                <td>61,47%</td>
                                <td>5,61%</td>
                                <td>496.627.426.051</td>
                                <td>30.295.101.578</td>
                                <td>28.775.304.871</td>
                                <td>31.368.916.185</td>
                                <td>16.610.958.906</td>
                                <td>16.132.727.709</td>
                                <td>6.041.892.176</td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>Overhead</td>
                                <td>171.877.000.000</td>
                                <td>19.848.202.020</td>
                                <td>11,55%</td>
                                <td>0,14%</td>
                                <td>152.028.797.980</td>
                                <td>2.270.882.718</td>
                                <td>95.178.538.232</td>
                                <td>3.496.022.049</td>
                                <td>2.270.882.718</td>
                                <td>95.178.538.232</td>
                                <td>2.270.882.718</td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>Financial Cost</td>
                                <td>195.781.000.000</td>
                                <td>-</td>
                                <td>0%</td>
                                <td>0%</td>
                                <td>195.781.000.000</td>
                                <td>-</td>
                                <td>-</td>
                                <td>15.000.000.000</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>IDC</td>
                                <td>758.875.000.000</td>
                                <td>545.054.946.183</td>
                                <td>71,82%</td>
                                <td>3,86%</td>
                                <td>213.820.053.817</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th class="text-center font-weight-bold">Total</th>
                                <th class="text-center font-weight-bold">14.133.165.000.000 </th>
                                <th class="text-center font-weight-bold">8.580.285.406.052 </th>
                                <th></th>
                                <th class="text-center font-weight-bold">60,71%</th>
                                <th class="text-center font-weight-bold">5.552.879.593.948</th>
                                <th class="text-center font-weight-bold">325.790.495.474</th>
                                <th class="text-center font-weight-bold">385.051.743.744</th>
                                <th class="text-center font-weight-bold">334.497.123.549</th>
                                <th class="text-center font-weight-bold">169.394.778.946</th>
                                <th class="text-center font-weight-bold">257.476.646.935</th>
                                <th class="text-center font-weight-bold">62.741.287.407</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="table-responsive mb-4">
                    <table class="table table-bordered table-striped table-sm">
                        <thead class="text-center text-white" style="background-color:#1d6296;">
                            <tr>
                                <th rowspan="3">No</th>
                                <th rowspan="3">Uraian</th>
                                <th rowspan="3">Total Project Cost</th>
                                <th rowspan="2" colspan="3">Akumulasi Pengeluaran + Pencairan 19 Dari awal s.d 30 Juni 2025</th>
                                <th rowspan="2">Sisa Anggaran</th>
                                <th colspan="6">Proyeksi Januari s.d Juni 2026</th>
                                <th rowspan="2">Total Proyeksi</th>
                                <th rowspan="2">Sisa Anggaran</th>
                            </tr>
                            <tr>
                                <th>Jul-26</th>
                                <th>Agu-26</th>
                                <th>Sep-26</th>
                                <th>Okt-26</th>
                                <th>Nov-26</th>
                                <th>Des-26</th>
                            </tr>
                            <tr>
                                <th>Jumlah Rp</th>
                                <th>Prestasi %</th>
                                <th>Bobot %</th>
                                <th>Jumlah Rp</th>
                                <th>Jumlah Rp</th>
                                <th>Jumlah Rp</th>
                                <th>Jumlah Rp</th>
                                <th>Jumlah Rp</th>
                                <th>Jumlah Rp</th>
                                <th>Jumlah Rp</th>
                                <th>Jumlah Rp</th>
                                <th>Jumlah Rp</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>942.250.000</td>
                                <td>942.250.000</td>
                                <td>942.250.000</td>
                                <td>942.250.000</td>
                                <td>942.250.000</td>
                                <td>942.250.000</td>
                                <td>942.250.000</td>
                                <td>942.250.000</td>
                                <td>942.250.000</td>
                                <td>942.250.000</td>
                                <td>942.250.000</td>
                                <td>942.250.000</td>
                                <td>65.523.540.250</td>
                                <td>69.233.550.138</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Konstruksi</td>
                                <td>10.392.510.000.000</td>
                                <td>7.048.941.727.164</td>
                                <td>67,83%</td>
                                <td>67,83%</td>
                                <td>3.343.568.272.836</td>
                                <td>66.711.685.507</td>
                                <td>66.709.852.910</td>
                                <td>133.419.705.819</td>
                                <td>194.840.705.819</td>
                                <td>133.416.040.625</td>
                                <td>426.627.907.547</td>
                                <td>3.520.663.602.071</td>
                                <td>(177.095.329.235)</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Clear Zone</td>
                                <td>-</td>
                                <td>-</td>
                                <td>0%</td>
                                <td>0%</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Peralatan Tol</td>
                                <td>28.907.000.000</td>
                                <td>15.840.466.975</td>
                                <td>54,80%</td>
                                <td>0,11%</td>
                                <td>13.066.533.025</td>
                                <td>21.109.097.685</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>21.109.097.685</td>
                                <td>94.679.216.018</td>
                                <td>(81.612.682.993)</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Supervisi</td>
                                <td>123.808.000.000</td>
                                <td>93.841.580.149</td>
                                <td>75,80%</td>
                                <td>0,66%</td>
                                <td>29.966.419.851</td>
                                <td>1.662.024.285</td>
                                <td>906.667.309</td>
                                <td>321.657.691</td>
                                <td>321.657.691</td>
                                <td>70.000.000</td>
                                <td>70.000.000</td>
                                <td>34.585.247.475</td>
                                <td>(4.618.827.624)</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Eskalasi</td>
                                <td>973.264.000.000</td>
                                <td>-</td>
                                <td>0%</td>
                                <td>0%</td>
                                <td>973.264.000.000</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>442.205.380.370</td>
                                <td>531.058.619.630</td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>PPN</td>
                                <td>1.288.945.000.000</td>
                                <td>792.317.573.949</td>
                                <td>61,47%</td>
                                <td>5,61%</td>
                                <td>496.627.426.051</td>
                                <td>7.680.162.499</td>
                                <td>7.541.464.724</td>
                                <td>14.815.197.486</td>
                                <td>21.571.507.486</td>
                                <td>14.787.111.969</td>
                                <td>47.040.417.330</td>
                                <td>447.727.512.045</td>
                                <td>48.899.914.006</td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>Overhead</td>
                                <td>171.877.000.000</td>
                                <td>19.848.202.020</td>
                                <td>11,55%</td>
                                <td>0,14%</td>
                                <td>152.028.797.980</td>
                                <td>2.270.882.718</td>
                                <td>2.270.882.718</td>
                                <td>2.270.882.718</td>
                                <td>2.270.882.718</td>
                                <td>2.270.882.718</td>
                                <td>2.270.882.718</td>
                                <td>227.916.339.274</td>
                                <td>(75.887.541.294)</td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>Financial Cost</td>
                                <td>195.781.000.000</td>
                                <td>-</td>
                                <td>0%</td>
                                <td>0%</td>
                                <td>195.781.000.000</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>25.000.000.000</td>
                                <td>1.500.000.000</td>
                                <td>154.248.082.214</td>
                                <td>41.532.917.786</td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>IDC</td>
                                <td>758.875.000.000</td>
                                <td>545.054.946.183</td>
                                <td>71,82%</td>
                                <td>3,86%</td>
                                <td>213.820.053.817</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>213.820.053.817</td>
                                <td>-</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th class="text-center font-weight-bold">Total</th>
                                <th class="text-center font-weight-bold">14.133.165.000.000 </th>
                                <th class="text-center font-weight-bold">8.580.285.406.052 </th>
                                <th></th>
                                <th class="text-center font-weight-bold">60,71%</th>
                                <th class="text-center font-weight-bold">5.552.879.593.948</th>
                                <th class="text-center font-weight-bold">100.376.102.693</th>
                                <th class="text-center font-weight-bold">78.371.117.660</th>
                                <th class="text-center font-weight-bold">151.769.693.714</th>
                                <th class="text-center font-weight-bold">219.947.003.714</th>
                                <th class="text-center font-weight-bold">176.486.285.311</th>
                                <th class="text-center font-weight-bold">499.560.555.280</th>
                                <th class="text-center font-weight-bold">5.201.368.973.535</th>
                                <th class="text-center font-weight-bold">351.510.620.413</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <!-- Tabel 1 -->
                <h6 class="font-weight-bold d-none" style="color: rgb(21, 81, 128);">Tabel 1: Pembiayaan Tahap 1</h6>
                <div class="table-responsive mb-4 d-none">
                    <table class="table table-bordered table-striped table-sm">
                        <thead class="text-center text-white" style="background-color:#1d6296;">
                            <tr>
                                <th colspan="4">Rencana Pembiayaan Tahap 1</th>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <th>PPJT Add 2</th>
                                <th>Fasilitas Kredit</th>
                                <th>%</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">Desain</td>
                                <td class="text-center">Rp. 237.387.000.000 </td>
                                <td class="text-center">Rp. 199.198.000.000 </td>
                                <td class="text-center">83,91%</td>
                            </tr>
                            <tr>
                                <td class="text-center">Konstruksi</td>
                                <td class="text-center">Rp. 18.990.999.000.000 </td>
                                <td class="text-center">Rp. 10.392.510.000.000 </td>
                                <td class="text-center">54,72%</td>
                            </tr>
                            <tr>
                                <td class="text-center">Clear Zone</td>
                                <td class="text-center"> - </td>
                                <td class="text-center"> - </td>
                                <td class="text-center">0,00%</td>
                            </tr>
                            <tr>
                                <td class="text-center">Peralatan Tol</td>
                                <td class="text-center">Rp. 57.800.000.000 </td>
                                <td class="text-center">Rp. 28.907.000.000 </td>
                                <td class="text-center">50,01%</td>
                            </tr>
                            <tr>
                                <td class="text-center">Supervisi</td>
                                <td class="text-center">Rp. 261.617.000.000 </td>
                                <td class="text-center">Rp. 123.808.000.000 </td>
                                <td class="text-center">47,32%</td>
                            </tr>
                            <tr>
                                <td class="text-center">Eskalasi</td>
                                <td class="text-center">Rp. 1.940.183.000.000 </td>
                                <td class="text-center">Rp. 973.264.000.000 </td>
                                <td class="text-center">50,16%</td>
                            </tr>
                            <tr>
                                <td class="text-center">PPn</td>
                                <td class="text-center">Rp. 2.370.312.000.000 </td>
                                <td class="text-center">Rp. 1.288.945.000.000 </td>
                                <td class="text-center">54,38%</td>
                            </tr>
                            <tr>
                                <td class="text-center">Overhead</td>
                                <td class="text-center">Rp. 322.320.000.000 </td>
                                <td class="text-center">Rp. 171.877.000.000 </td>
                                <td class="text-center">53,32%</td>
                            </tr>
                            <tr>
                                <td class="text-center">Financial Cost</td>
                                <td class="text-center">Rp. 288.996.000.000 </td>
                                <td class="text-center">Rp. 195.781.000.000 </td>
                                <td class="text-center">67,75%</td>
                            </tr>
                            <tr>
                                <td class="text-center">IDC</td>
                                <td class="text-center">Rp. 3.016.993.000.000 </td>
                                <td class="text-center">Rp. 758.875.000.000 </td>
                                <td class="text-center">25,15%</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="text-center font-weight-bold">Total</th>
                                <th class="text-center font-weight-bold">Rp. 27.486.608.000.000 </th>
                                <th class="text-center font-weight-bold">Rp. 14.133.165.000.000 </th>
                                <th class="text-center font-weight-bold">51,42%</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <!-- Tabel 2 -->
                <h6 class="font-weight-bold d-none" style="color: rgb(21, 81, 128);">Tabel 2: Realisasi Pembiayaan Tahap 1</h6>
                <div class="table-responsive mb-4 d-none">
                    <table class="table table-bordered table-striped table-sm">
                        <thead class="text-center text-white" style="background-color:#1d6296;">
                            <tr>
                                <th colspan="16">Realisasi Pembiayaan Tahap 1 </th>
                            </tr>
                            <tr>
                                <th></th>
                                <th colspan="3">Tahap 1</th>
                                <th colspan="12">Realisasi </th>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <th>PPJT Add 2</th>
                                <th>Fasilitas Kredit</th>
                                <th>%</th>
                                <th>2020</th>
                                <th>%</th>
                                <th>2021</th>
                                <th>%</th>
                                <th>2022</th>
                                <th>%</th>
                                <th>2023</th>
                                <th>%</th>
                                <th>2024</th>
                                <th>%</th>
                                <th>Total</th>
                                <th>%</th>
                                <!-- <th>Sisa HPJT</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">Desain</td>
                                <td class="text-center"> 237.387.000.000 </td>
                                <td class="text-center"> 199.198.000.000 </td>
                                <td class="text-center">83,91%</td>
                                <td class="text-center"> 47.250.000 </td>
                                <td class="text-center">0,02%</td>
                                <td class="text-center"> 29.193.222.124 </td>
                                <td class="text-center">14,66%</td>
                                <td class="text-center"> 5.961.218.700 </td>
                                <td class="text-center">2,99%</td>
                                <td class="text-center"> 11.640.946.026 </td>
                                <td class="text-center">5,84%</td>
                                <td class="text-center"> 9.157.128.654 </td>
                                <td class="text-center">4,60%</td>
                                <td class="text-center"> 55.999.765.504 </td>
                                <td class="text-center">28,11%</td>
                                <!-- <td class="text-center"> 181.387.234.496 </td> -->
                            </tr>
                            <tr>
                                <td class="text-center">Konstruksi</td>
                                <td class="text-center"> 10.392.510.000.000 </td>
                                <td class="text-center"> 10.392.510.000.000 </td>
                                <td class="text-center">100,00%</td>
                                <td class="text-center"> - </td>
                                <td class="text-center">0,00%</td>
                                <td class="text-center"> 1.566.366.332.442 </td>
                                <td class="text-center">15,07%</td>
                                <td class="text-center"> 835.816.338.552 </td>
                                <td class="text-center">8,04%</td>
                                <td class="text-center"> 3.315.527.775.348 </td>
                                <td class="text-center">31,90%</td>
                                <td class="text-center"> 2.708.870.720.600 </td>
                                <td class="text-center">26,07%</td>
                                <td class="text-center"> 8.426.581.166.942 </td>
                                <td class="text-center">81,08%</td>
                                <!-- <td class="text-center"> 1.965.928.833.058 </td> -->
                            </tr>
                            <tr>
                                <td class="text-center">Clear Zone</td>
                                <td class="text-center"> - </td>
                                <td class="text-center"> - </td>
                                <td class="text-center">0,00%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <!-- <td class="text-center">- </td> -->
                            </tr>
                            <tr>
                                <td class="text-center">Peralatan Tol</td>
                                <td class="text-center"> 28.907.000.000 </td>
                                <td class="text-center"> 28.907.000.000 </td>
                                <td class="text-center">100,00%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <!-- <td class="text-center"> 28.907.000.000 </td> -->
                            </tr>
                            <tr>
                                <td class="text-center">Supervisi</td>
                                <td class="text-center"> 123.808.000.000 </td>
                                <td class="text-center"> 123.808.000.000 </td>
                                <td class="text-center">100,00%</td>
                                <td class="text-center"> 425.667.285 </td>
                                <td class="text-center">0,34%</td>
                                <td class="text-center"> 12.388.926.376 </td>
                                <td class="text-center">10,01%</td>
                                <td class="text-center"> 22.414.959.218 </td>
                                <td class="text-center">18,10%</td>
                                <td class="text-center"> 26.779.610.303 </td>
                                <td class="text-center">21,63%</td>
                                <td class="text-center"> 32.379.927.083 </td>
                                <td class="text-center">26,15%</td>
                                <td class="text-center"> 94.389.090.265 </td>
                                <td class="text-center">76,24%</td>
                                <!-- <td class="text-center"> 29.418.909.735 </td> -->
                            </tr>
                            <tr>
                                <td class="text-center">Eskalasi</td>
                                <td class="text-center"> 454.674.000.000 </td>
                                <td class="text-center"> 973.264.000.000 </td>
                                <td class="text-center">214,06%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <!-- <td class="text-center"> 454.674.000.000 </td> -->
                            </tr>
                            <tr>
                                <td class="text-center">PPn</td>
                                <td class="text-center"> 1.176.120.000.000 </td>
                                <td class="text-center"> 1.288.945.000.000 </td>
                                <td class="text-center">109,59%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <!-- <td class="text-center"> 1.176.120.000.000 </td> -->
                            </tr>
                            <tr>
                                <td class="text-center">Overhead</td>
                                <td class="text-center"> 168.559.000.000 </td>
                                <td class="text-center"> 171.877.000.000 </td>
                                <td class="text-center">101,97%</td>
                                <td class="text-center"> 2.035.641.186 </td>
                                <td class="text-center">1,18%</td>
                                <td class="text-center"> 15.009.875.196 </td>
                                <td class="text-center">8,73%</td>
                                <td class="text-center"> 17.747.628.593 </td>
                                <td class="text-center">10,33%</td>
                                <td class="text-center"> 17.633.668.005 </td>
                                <td class="text-center">10,26%</td>
                                <td class="text-center"> 19.127.896.078 </td>
                                <td class="text-center">11,13%</td>
                                <td class="text-center"> 71.554.709.058 </td>
                                <td class="text-center">41,63%</td>
                                <!-- <td class="text-center"> 97.004.290.942 </td> -->
                            </tr>
                            <tr>
                                <td class="text-center">Financial Cost</td>
                                <td class="text-center"> 156.961.000.000 </td>
                                <td class="text-center"> 195.781.000.000 </td>
                                <td class="text-center">124,73%</td>
                                <td class="text-center"> 2.988.940.280 </td>
                                <td class="text-center">1,53%</td>
                                <td class="text-center"> 7.063.348.420 </td>
                                <td class="text-center">3,61%</td>
                                <td class="text-center"> 7.972.172.579 </td>
                                <td class="text-center">4,07%</td>
                                <td class="text-center"> 16.316.218.821 </td>
                                <td class="text-center">8,33%</td>
                                <td class="text-center"> 9.370.161.833 </td>
                                <td class="text-center">4,79%</td>
                                <td class="text-center"> 43.710.841.933 </td>
                                <td class="text-center">22,33%</td>
                                <!-- <td class="text-center"> 113.250.158.067 </td> -->
                            </tr>
                            <tr>
                                <td class="text-center">IDC</td>
                                <td class="text-center"> 2.105.739.000.000 </td>
                                <td class="text-center"> 758.875.000.000 </td>
                                <td class="text-center">36,04%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center"> 457.264.524 </td>
                                <td class="text-center">0,06%</td>
                                <td class="text-center"> 100.545.558.842 </td>
                                <td class="text-center">13,25%</td>
                                <td class="text-center"> 291.845.719.425 </td>
                                <td class="text-center">38,46%%</td>
                                <td class="text-center"> 392.848.542.791 </td>
                                <td class="text-center">51,77%</td>
                                <!-- <td class="text-center"> 1.712.890.457.209 </td> -->
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="text-center font-weight-bold">Total</th>
                                <th class="text-center font-weight-bold"> 14.844.664.000.000 </th>
                                <th class="text-center font-weight-bold"> 14.133.165.000.000 </th>
                                <th class="text-center font-weight-bold">95,21%</th>
                                <th class="text-center font-weight-bold"> 5.497.498.751 </th>
                                <th class="text-center font-weight-bold"> 0,04%</th>
                                <th class="text-center font-weight-bold"> 1.630.021.704.558 </th>
                                <th class="text-center font-weight-bold"> 11,53%</th>
                                <th class="text-center font-weight-bold"> 890.369.582.167 </th>
                                <th class="text-center font-weight-bold"> 6,30%</th>
                                <th class="text-center font-weight-bold"> 3.488.443.777.345 </th>
                                <th class="text-center font-weight-bold"> 24,68%</th>
                                <th class="text-center font-weight-bold"> 3.070.751.553.673 </th>
                                <th class="text-center font-weight-bold"> 21,73%</th>
                                <th class="text-center font-weight-bold"> 9.085.084.116.494 </th>
                                <th class="text-center font-weight-bold"> 64,28%</th>
                                <!-- <th class="text-center font-weight-bold"> 5.759.580.883.506 </th> -->
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <!-- Stacked Bar -->
                <div id="bar_3d"></div>

                <!-- Tabel 3 -->
                <h6 class="font-weight-bold d-none" style="color: rgb(21, 81, 128);">Tabel 3: Total Realisasi Pembiayaan Tahap 1 s/d Tahun 2024 </h6>
                <div class="table-responsive mb-4 d-none">
                    <table class="table table-bordered table-striped table-sm">
                        <thead class="text-center text-white" style="background-color:#1d6296;">
                            <tr>
                                <th colspan="8">Total Realisasi Pembiayaan Tahap 1 s/d Tahun 2024 </th>
                            </tr>
                            <tr>
                                <th></th>
                                <th colspan="7">Tahap 1</th>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <th>PPJT Add 2</th>
                                <th>Fasilitas Kredit</th>
                                <th>%</th>
                                <th>Total</th>
                                <th>%</th>
                                <th>Sisa HPJT</th>
                                <th>%</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">Desain</td>
                                <td class="text-center"> 237.387.000.000 </td>
                                <td class="text-center"> 199.198.000.000 </td>
                                <td class="text-center">83,91%</td>
                                <td class="text-center"> 55.999.765.504 </td>
                                <td class="text-center">28,11%</td>
                                <td class="text-center"> 181.387.234.496 </td>
                                <td class="text-center">76,41%</td>
                            </tr>
                            <tr>
                                <td class="text-center">Konstruksi</td>
                                <td class="text-center"> 10.392.510.000.000 </td>
                                <td class="text-center"> 10.392.510.000.000 </td>
                                <td class="text-center">100,00%</td>
                                <td class="text-center"> 8.426.581.166.942 </td>
                                <td class="text-center">81,08%</td>
                                <td class="text-center"> 1.965.928.833.058 </td>
                                <td class="text-center">18,92%</td>
                            </tr>
                            <tr>
                                <td class="text-center">Clear Zone</td>
                                <td class="text-center"> - </td>
                                <td class="text-center"> </td>
                                <td class="text-center">0,00%</td>
                                <td class="text-center"> - </td>
                                <td class="text-center">0,00%</td>
                                <td class="text-center"> 0 </td>
                                <td class="text-center">0,00%</td>
                            </tr>
                            <tr>
                                <td class="text-center">Peralatan Tol </td>
                                <td class="text-center"> 28.907.000.000 </td>
                                <td class="text-center"> 28.907.000.000 </td>
                                <td class="text-center">100,00%</td>
                                <td class="text-center"> - </td>
                                <td class="text-center">0,00%</td>
                                <td class="text-center"> 28.907.000.000 </td>
                                <td class="text-center">100,00%</td>
                            </tr>
                            <tr>
                                <td class="text-center"> Supervisi</td>
                                <td class="text-center"> 123.808.000.000 </td>
                                <td class="text-center"> 123.808.000.000 </td>
                                <td class="text-center">100,00%</td>
                                <td class="text-center"> 94.389.090.265 </td>
                                <td class="text-center">76,24%</td>
                                <td class="text-center"> 29.418.909.735 </td>
                                <td class="text-center">23,76%</td>
                            </tr>
                            <tr>
                                <td class="text-center"> Eskalasi</td>
                                <td class="text-center"> 454.674.000.000 </td>
                                <td class="text-center"> 973.264.000.000 </td>
                                <td class="text-center">214,06%</td>
                                <td class="text-center"> - </td>
                                <td class="text-center">0,00%</td>
                                <td class="text-center"> 454.674.000.000 </td>
                                <td class="text-center">100,00%</td>
                            </tr>
                            <tr>
                                <td class="text-center"> PPn</td>
                                <td class="text-center"> 1.176.120.000.000 </td>
                                <td class="text-center"> 1.288.945.000.000 </td>
                                <td class="text-center">109,59%</td>
                                <td class="text-center"> - </td>
                                <td class="text-center">0,00%</td>
                                <td class="text-center"> 1.176.120.000.000 </td>
                                <td class="text-center">100,00%</td>
                            </tr>
                            <tr>
                                <td class="text-center"> Overhead</td>
                                <td class="text-center"> 168.559.000.000 </td>
                                <td class="text-center"> 171.877.000.000 </td>
                                <td class="text-center">101,97%</td>
                                <td class="text-center"> 71.554.709.058 </td>
                                <td class="text-center">41,63%</td>
                                <td class="text-center"> 97.004.290.942 </td>
                                <td class="text-center">57,55%</td>
                            </tr>
                            <tr>
                                <td class="text-center"> Financial Cost</td>
                                <td class="text-center"> 156.961.000.000 </td>
                                <td class="text-center"> 195.781.000.000 </td>
                                <td class="text-center">124,73%</td>
                                <td class="text-center"> 43.710.841.933 </td>
                                <td class="text-center">22,33%</td>
                                <td class="text-center"> 113.250.158.067 </td>
                                <td class="text-center">72,15%</td>
                            </tr>
                            <tr>
                                <td class="text-center"> IDC</td>
                                <td class="text-center"> 2.105.739.000.000 </td>
                                <td class="text-center"> 758.875.000.000 </td>
                                <td class="text-center">36,04%</td>
                                <td class="text-center"> 392.848.542.791 </td>
                                <td class="text-center">51,77%%</td>
                                <td class="text-center"> 1.712.890.457.209 </td>
                                <td class="text-center">81,34%%</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="text-center font-weight-bold">Total</th>
                                <th class="text-center font-weight-bold"> 14.844.664.000.000 </th>
                                <th class="text-center font-weight-bold"> 14.133.165.000.000 </th>
                                <th class="text-center font-weight-bold">95,21%</th>
                                <th class="text-center font-weight-bold"> 9.085.084.116.494 </th>
                                <th class="text-center font-weight-bold"> 64,28%</th>
                                <th class="text-center font-weight-bold"> 5.759.580.883.506 </th>
                                <th class="text-center font-weight-bold"> 38,80%</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <!-- Tabel 4 -->
                <h6 class="font-weight-bold d-none" style="color: rgb(21, 81, 128);">Tabel 4: Penarikan Tahap 1 </h6>
                <div class="table-responsive mb-4 d-none">
                    <table class="table table-bordered table-striped table-sm">
                        <thead class="text-center text-white" style="background-color:#1d6296;">
                            <tr>
                                <th colspan="29">Penarikan Tahap 1 </th>
                            </tr>
                            <tr>
                                <th></th>
                                <th colspan="4">Tahap 1</th>
                                <th colspan="5">Penarikan Tahun 2022 </th>
                                <th colspan="5">Penarikan Tahun 2023 </th>
                                <th colspan="5">Penarikan Tahun 2024 </th>
                                <th colspan="5">Penarikan S.D. Tahun 2024 </th>
                                <th colspan="4">Sisa Fasilitas Kredit </th>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <th>PPJT Add 2</th>
                                <th>Fasilitas Kredit</th>
                                <th>%</th>
                                <th>70%</th>
                                <th>Hutang</th>
                                <th>%</th>
                                <th>Ekuitas</th>
                                <th>Total</th>
                                <th>% Total</th>
                                <th>Hutang</th>
                                <th>%</th>
                                <th>Ekuitas</th>
                                <th>Total</th>
                                <th>% Total</th>
                                <th>Hutang</th>
                                <th>%</th>
                                <th>Ekuitas</th>
                                <th>Total</th>
                                <th>% Total</th>
                                <th>Hutang</th>
                                <th>%</th>
                                <th>Ekuitas</th>
                                <th>Total</th>
                                <th>% Total</th>
                                <th>Hutang</th>
                                <th>Ekuitas</th>
                                <th>Total</th>
                                <th>% Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">Desain</td>
                                <td class="text-center"> 237.387.000.000 </td>
                                <td class="text-center"> 199.198.000.000 </td>
                                <td class="text-center">83,91%</td>
                                <td class="text-center"> 139.438.600.000 </td>
                                <td class="text-center"> 13.777.011.812 </td>
                                <td class="text-center"> 9,88%</td>
                                <td class="text-center"> 5.904.433.634 </td>
                                <td class="text-center"> 19.681.445.446 </td>
                                <td class="text-center">9,88%</td>
                                <td class="text-center"> 11.840.961.458 </td>
                                <td class="text-center">8,49%</td>
                                <td class="text-center"> 5.074.697.768 </td>
                                <td class="text-center"> 16.915.659.226 </td>
                                <td class="text-center">8,49%</td>
                                <td class="text-center"> 4.312.366.307 </td>
                                <td class="text-center">3,09%</td>
                                <td class="text-center"> 1.848.156.989 </td>
                                <td class="text-center"> 6.160.523.296 </td>
                                <td class="text-center"> 3,09%</td>
                                <td class="text-center"> 29.930.339.577 </td>
                                <td class="text-center"> 21,46% </td>
                                <td class="text-center"> 12.827.288.390 </td>
                                <td class="text-center"> 42.757.627.967 </td>
                                <td class="text-center"> 21,46%</td>
                                <td class="text-center"> 109.508.260.423 </td>
                                <td class="text-center"> 46.932.111.610 </td>
                                <td class="text-center"> 156.440.372.033 </td>
                                <td class="text-center"> 78,54%</td>
                            </tr>
                            <tr>
                                <td class="text-center">Konstruksi</td>
                                <td class="text-center"> 10.392.510.000.000 </td>
                                <td class="text-center"> 10.392.510.000.000 </td>
                                <td class="text-center"> 100,00%</td>
                                <td class="text-center"> 7.274.757.000.000 </td>
                                <td class="text-center"> 765.184.892.500 </td>
                                <td class="text-center"> 10,52%</td>
                                <td class="text-center"> 327.936.382.500 </td>
                                <td class="text-center"> 1.093.121.275.000</td>
                                <td class="text-center">10,52%</td>
                                <td class="text-center"> 1.342.504.649.621 </td>
                                <td class="text-center"> 18,45% </td>
                                <td class="text-center"> 575.359.135.552 </td>
                                <td class="text-center"> 1.917.863.785.173</td>
                                <td class="text-center"> 18,45%</td>
                                <td class="text-center"> 2.264.454.667.295 </td>
                                <td class="text-center"> 31,13%</td>
                                <td class="text-center"> 970.480.571.698 </td>
                                <td class="text-center"> 3.234.935.238.993 </td>
                                <td class="text-center"> 31,13%</td>
                                <td class="text-center"> 4.372.144.209.416 </td>
                                <td class="text-center"> 60,10%</td>
                                <td class="text-center"> 1.873.776.089.750 </td>
                                <td class="text-center"> 6.245.920.299.166 </td>
                                <td class="text-center"> 60,10%</td>
                                <td class="text-center"> 2.902.612.790.584 </td>
                                <td class="text-center"> 1.243.976.910.250 </td>
                                <td class="text-center"> 4.146.589.700.834 </td>
                                <td class="text-center"> 39,90%</td>
                            </tr>
                            <tr>
                                <td class="text-center">Clear Zone</td>
                                <td class="text-center"> - </td>
                                <td class="text-center"> - </td>
                                <td class="text-center">0,00%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">- </td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                            </tr>
                            <tr>
                                <td class="text-center">Peralatan Tol</td>
                                <td class="text-center"> 28.907.000.000 </td>
                                <td class="text-center"> 28.907.000.000 </td>
                                <td class="text-center">100,00%</td>
                                <td class="text-center"> 20.234.900.000 </td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center"> 20.234.900.000 </td>
                                <td class="text-center"> 8.672.100.000 </td>
                                <td class="text-center"> 28.907.000.000 </td>
                                <td class="text-center">100,00%</td>
                            </tr>
                            <tr>
                                <td class="text-center">Supervisi</td>
                                <td class="text-center"> 123.808.000.000 </td>
                                <td class="text-center"> 123.808.000.000 </td>
                                <td class="text-center">100,00%</td>
                                <td class="text-center"> 86.665.600.000 </td>
                                <td class="text-center"> 6.112.318.800 </td>
                                <td class="text-center"> 7,05%</td>
                                <td class="text-center"> 2.619.565.200 </td>
                                <td class="text-center"> 8.731.884.000 </td>
                                <td class="text-center"> 7,05%</td>
                                <td class="text-center"> 22.876.795.725 </td>
                                <td class="text-center"> 26,40% </td>
                                <td class="text-center"> 9.804.341.025 </td>
                                <td class="text-center"> 32.681.136.750 </td>
                                <td class="text-center"> 26,40% </td>
                                <td class="text-center"> 25.188.530.945 </td>
                                <td class="text-center"> 29,06%</td>
                                <td class="text-center"> 10.795.084.691 </td>
                                <td class="text-center"> 35.983.615.636 </td>
                                <td class="text-center"> 29,06%</td>
                                <td class="text-center"> 54.177.645.470 </td>
                                <td class="text-center"> 62,51%</td>
                                <td class="text-center"> 23.218.990.916 </td>
                                <td class="text-center"> 77.396.636.386 </td>
                                <td class="text-center"> 62,51%</td>
                                <td class="text-center"> 32.487.954.530 </td>
                                <td class="text-center"> 13.923.409.084 </td>
                                <td class="text-center"> 46.411.363.614 </td>
                                <td class="text-center"> 37,49%</td>
                            </tr>
                            <tr>
                                <td class="text-center">Eskalasi</td>
                                <td class="text-center"> 454.674.000.000 </td>
                                <td class="text-center"> 973.264.000.000 </td>
                                <td class="text-center">214,06%</td>
                                <td class="text-center"> 681.284.800.000 </td>
                                <td class="text-center"> -</td>
                                <td class="text-center"> 0,0%</td>
                                <td class="text-center"> -</td>
                                <td class="text-center"> -</td>
                                <td class="text-center"> 0,0%</td>
                                <td class="text-center"> -</td>
                                <td class="text-center"> 0,0%</td>
                                <td class="text-center"> -</td>
                                <td class="text-center"> -</td>
                                <td class="text-center"> 0,0%</td>
                                <td class="text-center"> -</td>
                                <td class="text-center"> 0,0%</td>
                                <td class="text-center"> -</td>
                                <td class="text-center"> -</td>
                                <td class="text-center"> 0,0%</td>
                                <td class="text-center"> -</td>
                                <td class="text-center"> 0,0%</td>
                                <td class="text-center"> -</td>
                                <td class="text-center"> -</td>
                                <td class="text-center"> 0,0%</td>
                                <td class="text-center"> 681.284.800.000 </td>
                                <td class="text-center"> 291.979.200.000 </td>
                                <td class="text-center"> 973.264.000.000 </td>
                                <td class="text-center"> 100,00%</td>
                            </tr>
                            <tr>
                                <td class="text-center">PPn</td>
                                <td class="text-center"> 1.176.120.000.000 </td>
                                <td class="text-center"> 1.288.945.000.000 </td>
                                <td class="text-center">109,59%</td>
                                <td class="text-center"> 902.261.500.000 </td>
                                <td class="text-center"> 85.711.623.871 </td>
                                <td class="text-center">9,50%</td>
                                <td class="text-center"> 36.733.553.088 </td>
                                <td class="text-center"> 122.445.176.959 </td>
                                <td class="text-center">9,50%</td>
                                <td class="text-center"> 152.189.783.374 </td>
                                <td class="text-center">16,87%</td>
                                <td class="text-center"> 65.224.192.875 </td>
                                <td class="text-center"> 217.413.976.249 </td>
                                <td class="text-center">16,87%</td>
                                <td class="text-center"> 246.525.112.353 </td>
                                <td class="text-center">27,32%</td>
                                <td class="text-center"> 105.653.619.580 </td>
                                <td class="text-center"> 352.178.731.933 </td>
                                <td class="text-center"> 27,32%</td>
                                <td class="text-center"> 484.426.519.598 </td>
                                <td class="text-center"> 53,69%</td>
                                <td class="text-center"> 207.611.365.542 </td>
                                <td class="text-center"> 692.037.885.140 </td>
                                <td class="text-center"> 53,69%</td>
                                <td class="text-center"> 417.834.980.402 </td>
                                <td class="text-center"> 179.072.134.458 </td>
                                <td class="text-center"> 596.907.114.860 </td>
                                <td class="text-center"> 46,31%</td>
                            </tr>
                            <tr>
                                <td class="text-center">Overhead</td>
                                <td class="text-center"> 168.559.000.000 </td>
                                <td class="text-center"> 171.877.000.000 </td>
                                <td class="text-center">101,97%</td>
                                <td class="text-center"> 120.313.900.000 </td>
                                <td class="text-center"> 805.884.654 </td>
                                <td class="text-center"> 0,67%</td>
                                <td class="text-center"> 345.379.137 </td>
                                <td class="text-center"> 1.151.263.791 </td>
                                <td class="text-center"> 0,67%</td>
                                <td class="text-center"> 1.078.000.224 </td>
                                <td class="text-center"> 0,90%</td>
                                <td class="text-center"> 462.000.096 </td>
                                <td class="text-center"> 1.540.000.320 </td>
                                <td class="text-center"> 0,90%</td>
                                <td class="text-center"> -</td>
                                <td class="text-center"> 0,00%</td>
                                <td class="text-center"> -</td>
                                <td class="text-center"> -</td>
                                <td class="text-center"> 0,00%</td>
                                <td class="text-center"> 1.883.884.878 </td>
                                <td class="text-center"> 1,57%</td>
                                <td class="text-center"> 807.379.233 </td>
                                <td class="text-center"> 2.691.264.111 </td>
                                <td class="text-center"> 1,57% </td>
                                <td class="text-center"> 118.430.015.122 </td>
                                <td class="text-center"> 50.755.720.767 </td>
                                <td class="text-center"> 169.185.735.889 </td>
                                <td class="text-center"> 98,43%</td>
                            </tr>
                            <tr>
                                <td class="text-center">Financial Cost</td>
                                <td class="text-center"> 156.961.000.000 </td>
                                <td class="text-center"> 195.781.000.000 </td>
                                <td class="text-center">124,73%</td>
                                <td class="text-center"> 137.046.700.000 </td>
                                <td class="text-center"> -</td>
                                <td class="text-center"> 0,0%</td>
                                <td class="text-center"> -</td>
                                <td class="text-center"> -</td>
                                <td class="text-center"> 0,0%</td>
                                <td class="text-center"> -</td>
                                <td class="text-center"> 0,0%</td>
                                <td class="text-center"> -</td>
                                <td class="text-center"> -</td>
                                <td class="text-center"> 0,0%</td>
                                <td class="text-center"> -</td>
                                <td class="text-center"> 0,0%</td>
                                <td class="text-center"> -</td>
                                <td class="text-center"> -</td>
                                <td class="text-center"> 0,0%</td>
                                <td class="text-center"> -</td>
                                <td class="text-center"> 0,0%</td>
                                <td class="text-center"> -</td>
                                <td class="text-center"> -</td>
                                <td class="text-center"> 0,0%</td>
                                <td class="text-center"> 137.046.700.000 </td>
                                <td class="text-center"> 58.734.300.000 </td>
                                <td class="text-center"> 195.781.000.000 </td>
                                <td class="text-center"> 100,00%</td>
                            </tr>
                            <tr>
                                <td class="text-center">IDC</td>
                                <td class="text-center"> 2.105.739.000.000 </td>
                                <td class="text-center"> 758.875.000.000 </td>
                                <td class="text-center">36,04%</td>
                                <td class="text-center"> 531.212.500.000 </td>
                                <td class="text-center"> -</td>
                                <td class="text-center"> 0,0%</td>
                                <td class="text-center"> -</td>
                                <td class="text-center"> -</td>
                                <td class="text-center"> 0,0%</td>
                                <td class="text-center"> 62.381.757.342 </td>
                                <td class="text-center"> 11,74%</td>
                                <td class="text-center"> 26.735.038.861 </td>
                                <td class="text-center"> 89.116.796.203 </td>
                                <td class="text-center"> 11,74%</td>
                                <td class="text-center"> 183.776.953.517 </td>
                                <td class="text-center"> 34,60%</td>
                                <td class="text-center"> 78.761.551.507 </td>
                                <td class="text-center"> 262.538.505.024 </td>
                                <td class="text-center"> 34,60%</td>
                                <td class="text-center"> 246.158.710.859 </td>
                                <td class="text-center"> 46,34%</td>
                                <td class="text-center"> 105.496.590.368 </td>
                                <td class="text-center"> 351.655.301.227 </td>
                                <td class="text-center"> 46,34%</td>
                                <td class="text-center"> 285.053.789.141 </td>
                                <td class="text-center"> 122.165.909.632 </td>
                                <td class="text-center"> 407.219.698.773 </td>
                                <td class="text-center"> 53,66%</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="text-center font-weight-bold">Total</th>
                                <th class="text-center font-weight-bold"> 14.844.664.000.000 </th>
                                <th class="text-center font-weight-bold"> 14.133.165.000.000 </th>
                                <th class="text-center font-weight-bold">95,21%</th>
                                <th class="text-center font-weight-bold"> 9.893.215.500.000 </th>
                                <th class="text-center font-weight-bold"> 871.591.731.637 </th>
                                <th class="text-center font-weight-bold"> 8,81%</th>
                                <th class="text-center font-weight-bold"> 373.539.313.559 </th>
                                <th class="text-center font-weight-bold"> 1.245.131.045.196 </th>
                                <th class="text-center font-weight-bold"> 8,81%</th>
                                <th class="text-center font-weight-bold"> 1.592.871.947.744 </th>
                                <th class="text-center font-weight-bold"> 16,10%</th>
                                <th class="text-center font-weight-bold"> 682.659.406.176 </th>
                                <th class="text-center font-weight-bold"> 2.275.531.353.920 </th>
                                <th class="text-center font-weight-bold"> 16,10%</th>
                                <th class="text-center font-weight-bold"> 2.724.257.630.417 </th>
                                <th class="text-center font-weight-bold"> 27,54%</th>
                                <th class="text-center font-weight-bold"> 1.167.538.984.464 </th>
                                <th class="text-center font-weight-bold"> 3.891.796.614.881 </th>
                                <th class="text-center font-weight-bold"> 27,54%</th>
                                <th class="text-center font-weight-bold"> 5.188.721.309.798 </th>
                                <th class="text-center font-weight-bold"> 52,45%</th>
                                <th class="text-center font-weight-bold"> 2.223.737.704.199 </th>
                                <th class="text-center font-weight-bold"> 7.412.459.013.997 </th>
                                <th class="text-center font-weight-bold"> 52,45%</th>
                                <th class="text-center font-weight-bold"> 4.704.494.190.202 </th>
                                <th class="text-center font-weight-bold"> 2.016.211.795.801 </th>
                                <th class="text-center font-weight-bold"> 6.720.705.986.003 </th>
                                <th class="text-center font-weight-bold"> 47,55%</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <!-- Stacked Bar -->
                <div id="bar_3d_outstanding"></div>

                <!-- Tabel 5 -->
                <h6 class="font-weight-bold d-none" style="color: rgb(21, 81, 128);">Tabel 5: RKAP Pembiayaan Tahap 1 </h6>
                <div class="table-responsive mb-4 d-none">
                    <table class="table table-bordered table-striped table-sm">
                        <thead class="text-center text-white" style="background-color:#1d6296;">
                            <tr>
                                <th colspan="22">RKAP Pembiayaan Tahap 1 </th>
                            </tr>
                            <tr>
                                <th></th>
                                <th colspan="3">Tahap 1</th>
                                <th colspan="3">2020 </th>
                                <th colspan="3">2021 </th>
                                <th colspan="3">2022 </th>
                                <th colspan="3">2023 </th>
                                <th colspan="3">2024 </th>
                                <th colspan="3">S.D 2024 </th>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <th>PPJT Add 2</th>
                                <th>Fasilitas Kredit</th>
                                <th>%</th>
                                <th>Rencana</th>
                                <th>Realisasi</th>
                                <th>%</th>
                                <th>Rencana</th>
                                <th>Realisasi</th>
                                <th>%</th>
                                <th>Rencana</th>
                                <th>Realisasi</th>
                                <th>%</th>
                                <th>Rencana</th>
                                <th>Realisasi</th>
                                <th>%</th>
                                <th>Rencana</th>
                                <th>Realisasi</th>
                                <th>%</th>
                                <th>Total Rencana</th>
                                <th>Total Realisasi</th>
                                <th>%</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">Desain</td>
                                <td class="text-center"> 237.387.000.000 </td>
                                <td class="text-center"> 199.198.000.000 </td>
                                <td class="text-center">83,91%</td>
                                <td class="text-center"> - </td>
                                <td class="text-center"> 47.250.000 </td>
                                <td class="text-center">0,00%</td>
                                <td class="text-center"> - </td>
                                <td class="text-center"> 29.193.222.124 </td>
                                <td class="text-center">0,00%</td>
                                <td class="text-center"> 43.083.652.270 </td>
                                <td class="text-center"> 5.961.218.700 </td>
                                <td class="text-center">13,84%</td>
                                <td class="text-center"> 41.043.077.450 </td>
                                <td class="text-center"> 11.640.946.026 </td>
                                <td class="text-center">28,36%</td>
                                <td class="text-center"> 60.110.772.948 </td>
                                <td class="text-center"> 9.157.128.654 </td>
                                <td class="text-center">15,23%</td>
                                <td class="text-center"> 144.237.502.668 </td>
                                <td class="text-center"> 55.999.765.504 </td>
                                <td class="text-center">38,82%</td>
                            </tr>
                            <tr>
                                <td class="text-center">Konstruksi</td>
                                <td class="text-center"> 10.392.510.000.000 </td>
                                <td class="text-center"> 10.392.510.000.000 </td>
                                <td class="text-center"> 100,00%</td>
                                <td class="text-center"> - </td>
                                <td class="text-center"> - </td>
                                <td class="text-center">0,00%</td>
                                <td class="text-center"> 4.333.652.724.904 </td>
                                <td class="text-center"> 1.566.366.332.442 </td>
                                <td class="text-center">36,14%</td>
                                <td class="text-center"> 3.309.864.146.243 </td>
                                <td class="text-center"> 835.816.338.552 </td>
                                <td class="text-center">25,25%</td>
                                <td class="text-center"> 3.580.071.149.153 </td>
                                <td class="text-center"> 3.315.527.775.348 </td>
                                <td class="text-center">92,61%</td>
                                <td class="text-center"> 2.951.419.948.103 </td>
                                <td class="text-center"> 2.708.870.720.600 </td>
                                <td class="text-center">91,78%</td>
                                <td class="text-center"> 14.175.007.968.402 </td>
                                <td class="text-center"> 8.426.581.166.942 </td>
                                <td class="text-center">59,45%</td>
                            </tr>
                            <tr>
                                <td class="text-center">Clear Zone</td>
                                <td class="text-center"> - </td>
                                <td class="text-center"> - </td>
                                <td class="text-center">0,00%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                            </tr>
                            <tr>
                                <td class="text-center">Peralatan Tol</td>
                                <td class="text-center"> 28.907.000.000 </td>
                                <td class="text-center"> 28.907.000.000 </td>
                                <td class="text-center">100,00%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center"> 53.240.000.000 </td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center"> 53.240.000.000 </td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                            </tr>
                            <tr>
                                <td class="text-center">Supervisi</td>
                                <td class="text-center"> 123.808.000.000 </td>
                                <td class="text-center"> 123.808.000.000 </td>
                                <td class="text-center">100,00%</td>
                                <td class="text-center"> 22.588.293.750 </td>
                                <td class="text-center"> 425.667.285 </td>
                                <td class="text-center">1,88%</td>
                                <td class="text-center"> 56.889.224.464 </td>
                                <td class="text-center"> 12.388.926.376 </td>
                                <td class="text-center">21,78%</td>
                                <td class="text-center"> 26.641.738.591 </td>
                                <td class="text-center"> 22.414.959.218 </td>
                                <td class="text-center">84,13%</td>
                                <td class="text-center"> 38.045.595.223 </td>
                                <td class="text-center"> 26.779.610.303 </td>
                                <td class="text-center">70,39%</td>
                                <td class="text-center"> 39.880.054.159 </td>
                                <td class="text-center"> 32.379.927.083 </td>
                                <td class="text-center">81,19%</td>
                                <td class="text-center"> 184.044.906.187 </td>
                                <td class="text-center"> 94.389.090.265 </td>
                                <td class="text-center">51,29%</td>
                            </tr>
                            <tr>
                                <td class="text-center">Eskalasi</td>
                                <td class="text-center"> 454.674.000.000 </td>
                                <td class="text-center"> 973.264.000.000 </td>
                                <td class="text-center">214,06%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                            </tr>
                            <tr>
                                <td class="text-center">PPn</td>
                                <td class="text-center"> 1.176.120.000.000 </td>
                                <td class="text-center"> 1.288.945.000.000 </td>
                                <td class="text-center">109,59%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                                <td class="text-center">- </td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,0%</td>
                            </tr>
                            <tr>
                                <td class="text-center">Overhead</td>
                                <td class="text-center"> 168.559.000.000 </td>
                                <td class="text-center"> 171.877.000.000 </td>
                                <td class="text-center">101,97%</td>
                                <td class="text-center"> 4.582.776.060 </td>
                                <td class="text-center"> 2.035.641.186 </td>
                                <td class="text-center">44,42%</td>
                                <td class="text-center"> 15.366.254.917 </td>
                                <td class="text-center"> 15.009.875.196 </td>
                                <td class="text-center">97,68%</td>
                                <td class="text-center"> 17.438.595.504 </td>
                                <td class="text-center"> 17.747.628.593 </td>
                                <td class="text-center">101,77%</td>
                                <td class="text-center"> 16.793.798.624 </td>
                                <td class="text-center"> 17.633.668.005 </td>
                                <td class="text-center">105,00%</td>
                                <td class="text-center"> 20.841.687.990 </td>
                                <td class="text-center"> 19.127.896.078 </td>
                                <td class="text-center">91,78%</td>
                                <td class="text-center"> 75.023.113.095 </td>
                                <td class="text-center"> 71.554.709.058 </td>
                                <td class="text-center">95,38%</td>
                            </tr>
                            <tr>
                                <td class="text-center">Financial Cost</td>
                                <td class="text-center"> 156.961.000.000 </td>
                                <td class="text-center"> 195.781.000.000 </td>
                                <td class="text-center">124,73%</td>
                                <td class="text-center"> 30.653.470.000 </td>
                                <td class="text-center"> 2.988.940.280 </td>
                                <td class="text-center"> 9,75%</td>
                                <td class="text-center"> 48.888.500.000 </td>
                                <td class="text-center"> 7.063.348.420 </td>
                                <td class="text-center"> 14,45%</td>
                                <td class="text-center"> 175.851.162.000 </td>
                                <td class="text-center"> 7.972.172.579 </td>
                                <td class="text-center"> 4,53%</td>
                                <td class="text-center"> 216.170.227.061 </td>
                                <td class="text-center"> 16.316.218.821 </td>
                                <td class="text-center"> 7,55%</td>
                                <td class="text-center"> 101.257.215.845 </td>
                                <td class="text-center"> 9.370.161.833 </td>
                                <td class="text-center"> 9,25%</td>
                                <td class="text-center"> 572.820.574.906 </td>
                                <td class="text-center"> 43.710.841.933 </td>
                                <td class="text-center"> 7,63%</td>
                            </tr>
                            <tr>
                                <td class="text-center">IDC</td>
                                <td class="text-center"> 2.105.739.000.000 </td>
                                <td class="text-center"> 758.875.000.000 </td>
                                <td class="text-center">36,04%</td>
                                <td class="text-center"> -</td>
                                <td class="text-center"> -</td>
                                <td class="text-center"> 0,00%</td>
                                <td class="text-center"> -</td>
                                <td class="text-center"> -</td>
                                <td class="text-center"> 0,00%</td>
                                <td class="text-center"> 13.136.881.092 </td>
                                <td class="text-center"> 457.264.524 </td>
                                <td class="text-center"> 0,00%</td>
                                <td class="text-center"> 296.604.518.566 </td>
                                <td class="text-center"> 100.545.558.842 </td>
                                <td class="text-center"> 0,00%</td>
                                <td class="text-center"> 184.453.166.046 </td>
                                <td class="text-center"> 291.845.719.425 </td>
                                <td class="text-center"> 0,00%</td>
                                <td class="text-center"> 494.194.565.704 </td>
                                <td class="text-center"> 392.848.542.791 </td>
                                <td class="text-center"> 79,49%</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="text-center font-weight-bold">Total</th>
                                <th class="text-center font-weight-bold"> 14.844.664.000.000 </th>
                                <th class="text-center font-weight-bold"> 14.133.165.000.000 </th>
                                <th class="text-center font-weight-bold">95,21%</th>
                                <th class="text-center font-weight-bold"> 57.824.539.810 </th>
                                <th class="text-center font-weight-bold"> 5.497.498.751 </th>
                                <th class="text-center font-weight-bold"> 9,51%</th>
                                <th class="text-center font-weight-bold"> 4.454.796.704.285 </th>
                                <th class="text-center font-weight-bold"> 1.630.021.704.558 </th>
                                <th class="text-center font-weight-bold"> 36,59%</th>
                                <th class="text-center font-weight-bold"> 3.586.016.175.699 </th>
                                <th class="text-center font-weight-bold"> 890.369.582.167 </th>
                                <th class="text-center font-weight-bold"> 24,83%</th>
                                <th class="text-center font-weight-bold"> 4.188.728.366.077 </th>
                                <th class="text-center font-weight-bold"> 3.488.443.777.345 </th>
                                <th class="text-center font-weight-bold"> 83,28%</th>
                                <th class="text-center font-weight-bold"> 3.411.202.845.091 </th>
                                <th class="text-center font-weight-bold"> 3.070.751.553.673 </th>
                                <th class="text-center font-weight-bold"> 90,02%</th>
                                <th class="text-center font-weight-bold"> 15.698.568.630.963 </th>
                                <th class="text-center font-weight-bold"> 9.085.084.116.494 </th>
                                <th class="text-center font-weight-bold"> 57,87%</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Dashboard 7 Tahap 2 -->
<div class="modal fade show" id="modalPembiayaanTahap2" tabindex="-1" role="dialog" aria-labelledby="detailDttModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="min-width: 95%;">
        <div class="modal-content">
            <div class="modal-header text-white" style="background-color:rgb(21, 81, 128);">
                <h5 class="modal-title" id="detailDttModalLabel">Rencana Pembiayaan Tahap 2 </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color:white;">×</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Tabel 1 -->
                <h6 class="font-weight-bold" style="color: rgb(21, 81, 128);">Tabel 1: Rencana Pembiayaan Tahap 2 </h6>
                <div class="table-responsive mb-4">
                    <table class="table table-bordered table-striped table-sm">
                        <thead class="text-center text-white" style="background-color:#1d6296;">
                            <tr>
                                <th colspan="4">Rencana Pembiayaan Tahap 2 </th>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <th>PPJT Add 2</th>
                                <th>Fasilitas Kredit</th>
                                <th>%</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">Desain</td>
                                <td class="text-center">- </td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,00%</td>
                            </tr>
                            <tr>
                                <td class="text-center">Konstruksi</td>
                                <td class="text-center"> 5.321.465.000.000 </td>
                                <td class="text-center"> - </td>
                                <td class="text-center">0,00%</td>
                            </tr>
                            <tr>
                                <td class="text-center">Clear Zone</td>
                                <td class="text-center"> - </td>
                                <td class="text-center"> - </td>
                                <td class="text-center">0,00%</td>
                            </tr>
                            <tr>
                                <td class="text-center">Peralatan Tol</td>
                                <td class="text-center"> 19.089.000.000 </td>
                                <td class="text-center"> - </td>
                                <td class="text-center">0,00%</td>
                            </tr>
                            <tr>
                                <td class="text-center">Supervisi</td>
                                <td class="text-center"> 66.709.000.000 </td>
                                <td class="text-center"> - </td>
                                <td class="text-center">0,00%</td>
                            </tr>
                            <tr>
                                <td class="text-center">Eskalasi</td>
                                <td class="text-center"> 812.441.000.000 </td>
                                <td class="text-center"> - </td>
                                <td class="text-center">0,00%</td>
                            </tr>
                            <tr>
                                <td class="text-center">PPn</td>
                                <td class="text-center"> 710.473.000.000 </td>
                                <td class="text-center"> - </td>
                                <td class="text-center">0,00%</td>
                            </tr>
                            <tr>
                                <td class="text-center">Overhead</td>
                                <td class="text-center"> 93.296.000.000 </td>
                                <td class="text-center"> - </td>
                                <td class="text-center">0,00%</td>
                            </tr>
                            <tr>
                                <td class="text-center">Financial Cost</td>
                                <td class="text-center"> 79.896.000.000 </td>
                                <td class="text-center"> - </td>
                                <td class="text-center">0,00%</td>
                            </tr>
                            <tr>
                                <td class="text-center">IDC</td>
                                <td class="text-center"> 570.166.000.000 </td>
                                <td class="text-center"> - </td>
                                <td class="text-center">0,00%</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="text-center font-weight-bold">Total</th>
                                <th class="text-center font-weight-bold"> 7.673.535.000.000 </th>
                                <th class="text-center font-weight-bold"> - </th>
                                <th class="text-center font-weight-bold">0,00%</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Dashboard 7 Tahap 3 -->
<div class="modal fade show" id="modalPembiayaanTahap3" tabindex="-1" role="dialog" aria-labelledby="detailDttModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="min-width: 95%;">
        <div class="modal-content">
            <div class="modal-header text-white" style="background-color:rgb(21, 81, 128);">
                <h5 class="modal-title" id="detailDttModalLabel">Rencana Pembiayaan Tahap 3 </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color:white;">×</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Tabel 1 -->
                <h6 class="font-weight-bold" style="color: rgb(21, 81, 128);">Tabel 1: Rencana Pembiayaan Tahap 3 </h6>
                <div class="table-responsive mb-4">
                    <table class="table table-bordered table-striped table-sm">
                        <thead class="text-center text-white" style="background-color:#1d6296;">
                            <tr>
                                <th colspan="4">Rencana Pembiayaan Tahap 3 </th>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <th>PPJT Add 2</th>
                                <th>Fasilitas Kredit</th>
                                <th>%</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">Desain</td>
                                <td class="text-center">- </td>
                                <td class="text-center">- </td>
                                <td class="text-center">0,00%</td>
                            </tr>
                            <tr>
                                <td class="text-center">Konstruksi</td>
                                <td class="text-center"> 3.277.024.000.000 </td>
                                <td class="text-center"> - </td>
                                <td class="text-center">0,00%</td>
                            </tr>
                            <tr>
                                <td class="text-center">Clear Zone</td>
                                <td class="text-center"> - </td>
                                <td class="text-center"> - </td>
                                <td class="text-center">0,00%</td>
                            </tr>
                            <tr>
                                <td class="text-center">Peralatan Tol</td>
                                <td class="text-center"> 9.805.000.000 </td>
                                <td class="text-center"> - </td>
                                <td class="text-center">0,00%</td>
                            </tr>
                            <tr>
                                <td class="text-center">Supervisi</td>
                                <td class="text-center"> 71.100.000.000 </td>
                                <td class="text-center"> - </td>
                                <td class="text-center">0,00%</td>
                            </tr>
                            <tr>
                                <td class="text-center">Eskalasi</td>
                                <td class="text-center"> 673.068.000.000 </td>
                                <td class="text-center"> - </td>
                                <td class="text-center">0,00%</td>
                            </tr>
                            <tr>
                                <td class="text-center">PPn</td>
                                <td class="text-center"> 483.720.000.000 </td>
                                <td class="text-center"> - </td>
                                <td class="text-center">0,00%</td>
                            </tr>
                            <tr>
                                <td class="text-center">Overhead</td>
                                <td class="text-center"> 60.465.000.000 </td>
                                <td class="text-center"> - </td>
                                <td class="text-center">0,00%</td>
                            </tr>
                            <tr>
                                <td class="text-center">Financial Cost</td>
                                <td class="text-center"> 52.139.000.000 </td>
                                <td class="text-center"> - </td>
                                <td class="text-center">0,00%</td>
                            </tr>
                            <tr>
                                <td class="text-center">IDC</td>
                                <td class="text-center"> 341.088.000.000 </td>
                                <td class="text-center"> - </td>
                                <td class="text-center">0,00%</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="text-center font-weight-bold">Total</th>
                                <th class="text-center font-weight-bold"> 4.968.410.000.000 </th>
                                <th class="text-center font-weight-bold"> - </th>
                                <th class="text-center font-weight-bold">0,00%</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Dashboard 8 -->
<div class="modal fade show" id="modalDanaTalanganTanah" tabindex="-1" role="dialog" aria-labelledby="detailDttModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-white bg-theme">
                <h5 class="modal-title" id="detailDttModalLabel">Dana Talangan Tanah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color:white;">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-sm">
                        <thead class="text-white bg-theme">
                            <tr>
                                <th colspan="2">Dana Talangan Tanah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Nilai Outstanding Pokok</td>
                                <td class="text-right"> 63,455,259,743 </td>
                            </tr>
                            <tr>
                                <td>Bunga</td>
                                <td class="text-right"> 11,752,672,241 </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Dashboard 3 Tahap 1 -->
<div class="modal fade show" id="modalPieChartTahap1" tabindex="-1" role="dialog" aria-labelledby="modalPieChartTahap1Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="min-width: 95%;">
        <div class="modal-content">
            <div class="modal-header text-white" style="background-color:rgb(21, 81, 128);">
                <h5 class="modal-title" id="modalPieChartTahap1Label">Tahap 1 </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color:white;">×</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Tabel 1 -->
                <h6 class="font-weight-bold" style="color: rgb(21, 81, 128);">Tahap 1 </h6>
                <div class="table-responsive mb-4">
                    <table class="table table-bordered table-striped table-sm">
                        <thead class="text-center text-white" style="background-color:#1d6296;">
                            <tr>
                                <th rowspan="2">Paket</th>
                                <th>Kontrak + PPn</th>
                                <th colspan="2">Telah Terbayar </th>
                                <th colspan="2">Belum Terbayar </th>
                            </tr>
                            <tr>
                                <th>(Rp)</th>
                                <th>(Rp)</th>
                                <th>(%)</th>
                                <th>(Rp)</th>
                                <th>(%)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="">Paket 1.1</td>
                                <td class="text-center">Rp 4.545.204.250.440</td>
                                <td class="text-center">Rp 4.285.790.420.610</td>
                                <td class="text-center">94,29%</td>
                                <td class="text-center">Rp 259.413.829.830</td>
                                <td class="text-center">5,71%</td>
                            </tr>
                            <tr>
                                <td class="">Paket 1.2A Adhi Karya</td>
                                <td class="text-center">Rp 3.439.846.077.300</td>
                                <td class="text-center">Rp2.164.108.046.575</td>
                                <td class="text-center">62,91%</td>
                                <td class="text-center">Rp1.275.738.030.725</td>
                                <td class="text-center">37,09%</td>
                            </tr>
                            <tr>
                                <td class="">Paket 1.2B DMT</td>
                                <td class="text-center">Rp582.717.052.980</td>
                                <td class="text-center">Rp539.828.396.457</td>
                                <td class="text-center">92,64%</td>
                                <td class="text-center">Rp42.888.656.523</td>
                                <td class="text-center">7,36%</td>
                            </tr>
                            <tr>
                                <td class="">Paket 2.1A DMT</td>
                                <td class="text-center">Rp1.667.446.553.000</td>
                                <td class="text-center">Rp12.599.574.480</td>
                                <td class="text-center">0,76%</td>
                                <td class="text-center">Rp1.654.846.978.520</td>
                                <td class="text-center">99,24%</td>
                            </tr>
                            <tr>
                                <td class="">Paket 2.2B Adhi Karya</td>
                                <td class="text-center">Rp1.476.885.506.000</td>
                                <td class="text-center">Rp695.692.073.760</td>
                                <td class="text-center">47,11%</td>
                                <td class="text-center">Rp781.193.432.240</td>
                                <td class="text-center">52,89%</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="text-center font-weight-bold">Grand Total</th>
                                <th class="text-center font-weight-bold">Rp 11.712.099.439.720</th>
                                <th class="text-center font-weight-bold">Rp 7.698.018.511.881</th>
                                <th class="text-center font-weight-bold"> 65,73%</th>
                                <th class="text-center font-weight-bold">Rp 4.014.080.927.839</th>
                                <th class="text-center font-weight-bold"> 34,27%</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Detail Data Monitoring DTT s/d Maret 2025 -->
<div class="modal fade show" id="detail_dtt" tabindex="-1" role="dialog" aria-labelledby="detailDttModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="min-width: 95%;">
        <div class="modal-content">
            <div class="modal-header text-white" style="background-color:rgb(21, 81, 128);">
                <h5 class="modal-title" id="detailDttModalLabel">Detail Monitoring Dana Pengadaan Tanah s/d April 2025</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color:white;">×</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Tabel 1 -->
                <h6 class="font-weight-bold" style="color: rgb(21, 81, 128);">Tabel 1: Dana Talangan Tanah</h6>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-sm">
                        <thead class="text-center text-white" style="background-color:#1d6296;">
                            <tr>
                                <th rowspan="2">No</th>
                                <th rowspan="2">Kelompok Usaha PT Jasa Marga (Persero) TBK.</th>
                                <th rowspan="2">Pembayaran Tanah ke Warga (Rp)</th>
                                <th rowspan="2">Lolos Verifikasi BPKP/BPJT (Rp)</th>
                                <th rowspan="2">Telah Dikembalikan oleh Pemerintah (Rp)</th>
                                <th colspan="4">Outstanding(Rp)</th>
                            </tr>
                            <tr>
                                <th>Sisa DTT Eligible</th>
                                <th>DTT Ineligible</th>
                                <th>Belum Verifikasi</th>
                                <th>Total</th>
                            </tr>
                            <!-- <tr>
                                    <th rowspan="2">BUJT</th>
                                    <th rowspan="2">Sumber Dana</th>
                                    <th rowspan="2">Jumlah Pinjaman DTT (Rp)</th>
                                    <th rowspan="2">Tahun</th>
                                    <th rowspan="2">Realisasi Pembayaran UGR (Rp)</th>
                                    <th rowspan="2">Lolos Verifikasi BPKP/BPJT (Rp)</th>
                                    <th rowspan="2">Tidak Lolos Verifikasi (Rp)</th>
                                    <th rowspan="2">Belum Verifikasi (Rp)</th>
                                    <th colspan="3">Outstanding</th>
                                    <th colspan="2">Pengembalian BUJT ke Bank/PS</th>
                                </tr>
                                <tr>
                                    <th>Lolos Verifikasi (Rp)</th>
                                    <th>Total (Rp)</th>
                                    <th>Selisih (Rp)</th>
                                    <th>Sumber Dana</th>
                                    <th>Nilai (Rp)</th>
                                </tr> -->
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td>Jasamarga Ngawi Kertosono Kediri (JNK)</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td>Jasamarga Japek Selatan (JJS)</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-center">3</td>
                                <td>Jasamarga Probolinggo Banyuwangi (JPB)</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-center">4</td>
                                <td>Jasamarga Jogja Solo</td>
                                <td class="text-right">147.398.626.725</td>
                                <td class="text-right">93.921.334.419</td>
                                <td class="text-right">82.490.747.870</td>
                                <td class="text-right">10.800.596.549</td>
                                <td class="text-right">-</td>
                                <td class="text-right">54.101.282.306</td>
                                <td class="text-right">64.901.878.855</td>
                            </tr>
                            <tr>
                                <td class="text-center">5</td>
                                <td>Jasamarga Jogja Bawen</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-center">6</td>
                                <td>Jasamarga Gedebage Cilacap</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-center">7</td>
                                <td>Jasamarga Akses Patimban**</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-center"></td>
                                <td class="text-center">Persentase</td>
                                <td class="text-center"></td>
                                <td class="text-center">63%</td>
                                <td class="text-center">88%</td>
                                <td class="text-center">12%</td>
                                <td class="text-center"></td>
                                <td class="text-center">37%</td>
                                <td class="text-center"></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-center font-weight-bold">Total</td>
                                <td class="text-right">147.398.626.725</td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Tabel 2 -->
                <h6 class="mt-4 font-weight-bold" style="color: rgb(21, 81, 128);">Tabel 2: Pembayaran Langsung</h6>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-sm">
                        <thead class="text-center text-white" style="background-color:#1d6296;">
                            <tr>
                                <th rowspan="2" class="text-center">No</th>
                                <th rowspan="2" class="text-center">Kelompok Usaha PT Jasamarga (Persero) Tbk.</th>
                                <th colspan="4">Alokasi Pembayaran Langsung (PL)(Rp)</th>
                            </tr>
                            <tr>
                                <th>Kebutuhan/Rencana Alokasi PL TA 2025</th>
                                <th>Realisasi s.d akhir Des 2024</th>
                                <th>Realisasi Jan s.d Apr 2025</th>
                                <th>Realisasi Tahun 2025</th>
                            </tr>
                            <!-- <tr>
                                    <th rowspan="2">BUJT</th>
                                    <th rowspan="2">Sumber Dana</th>
                                    <th rowspan="2">Jumlah Pinjaman DTT (Rp)</th>
                                    <th rowspan="2">Realisasi Pembayaran UGR (Rp)</th>
                                    <th colspan="4">Hutang Bunga DTT</th>
                                    <th colspan="2">Pengembalian Bunga ke Bank/PS</th>
                                    <th colspan="2">Selisih CoF</th>
                                    <th colspan="2">Selisih CoF (telah masuk BA Rekon)</th>
                                    <th colspan="2">Sisa Selisih CoF</th>
                                </tr>
                                <tr>
                                    <th>Bunga Pinjaman</th>
                                    <th>CoF LMAN</th>
                                    <th>Telah Direkonsiliasi</th>
                                    <th>Telah Dikembalikan</th>
                                    <th>Sumber Dana</th>
                                    <th>Nilai (Rp)</th>
                                    <th>Sumber Dana</th>
                                    <th>Nilai (Rp)</th>
                                    <th>Sumber Dana</th>
                                    <th>Nilai (Rp)</th>
                                    <th>Sumber Dana</th>
                                    <th>Nilai (Rp)</th>
                                </tr> -->
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td>Jasamarga Ngawi Kertosono Kediri (JNK)</td>
                                <td class="text-right">-</td>
                                <td class="text-right">-</td>
                                <td class="text-right">-</td>
                                <td class="text-right">-</td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td>Jasamarga Japek Selatan (JJS)</td>
                                <td class="text-right">-</td>
                                <td class="text-right">-</td>
                                <td class="text-right">-</td>
                                <td class="text-right">-</td>
                            </tr>
                            <tr>
                                <td class="text-center">3</td>
                                <td>Jasamarga Probolinggo Banyuwangi (JPB)</td>
                                <td class="text-right">-</td>
                                <td class="text-right">-</td>
                                <td class="text-right">-</td>
                                <td class="text-right">-</td>
                            </tr>
                            <tr>
                                <td class="text-center">4</td>
                                <td>Jasamarga Jogja Solo</td>
                                <td class="text-right">1.670.490.920.288</td>
                                <td class="text-right">10.572.759.334.160</td>
                                <td class="text-right">821.046.474.006</td>
                                <td class="text-right">821.046.474.006</td>
                            </tr>
                            <tr>
                                <td class="text-center">5</td>
                                <td>Jasamarga Jogja Bawen</td>
                                <td class="text-right">-</td>
                                <td class="text-right">-</td>
                                <td class="text-right">-</td>
                                <td class="text-right">-</td>
                            </tr>
                            <tr>
                                <td class="text-center">6</td>
                                <td>Jasamarga Gedebage Cilacap</td>
                                <td class="text-right">-</td>
                                <td class="text-right">-</td>
                                <td class="text-right">-</td>
                                <td class="text-right">-</td>
                            </tr>
                            <tr>
                                <td class="text-center">7</td>
                                <td>Jasamarga Akses Patimban**</td>
                                <td class="text-right">-</td>
                                <td class="text-right">-</td>
                                <td class="text-right">-</td>
                                <td class="text-right">-</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-center font-weight-bold">Total</td>
                                <td class="text-right">1.670.490.920.288</td>
                                <td class="text-right">10.572.759.334.160</td>
                                <td class="text-right">821.046.474.006</td>
                                <td class="text-right">821.046.474.006</td>
                            </tr>
                            <!-- <tr>
                                    <td class="text-center">PT Jasamarga Jogja Solo</td>
                                    <td class="text-center">Maybank & BRI</td>
                                    <td class="text-center">147,383,167,561</td>
                                    <td class="text-center">147,383,167,561</td>
                                    <td class="text-center">5,997,834,321</td>
                                    <td class="text-center">5,890,815,115</td>
                                    <td class="text-center">1,182,011,927</td>
                                    <td class="text-center">752,141,034</td>
                                    <td class="text-center">Bank</td>
                                    <td class="text-center">131,623,411</td>
                                    <td class="text-center">Pemegang Saham</td>
                                    <td class="text-center">107,019,206</td>
                                    <td class="text-center">Pemegang Saham</td>
                                    <td class="text-center">82,960,732</td>
                                    <td class="text-center">Pemegang Saham</td>
                                    <td class="text-center">24,058,474</td>
                                </tr>
                                <tr class="font-weight-bold bg-light">
                                    <td colspan="2" class="text-center" style="color:blue">Total</td>
                                    <td class="text-center" style="color:blue">147,383,167,561</td>
                                    <td class="text-center" style="color:blue">147,383,167,561</td>
                                    <td class="text-center" style="color:blue">5,997,834,321</td>
                                    <td class="text-center" style="color:blue">5,890,815,115</td>
                                    <td class="text-center" style="color:blue">1,182,011,927</td>
                                    <td class="text-center" style="color:blue">752,141,034</td>
                                    <td class="text-center" style="color:blue">Total</td>
                                    <td class="text-center" style="color:blue">131,623,411</td>
                                    <td class="text-center" style="color:blue">Total</td>
                                    <td class="text-center" style="color:blue">107,019,206</td>
                                    <td class="text-center" style="color:blue">Total</td>
                                    <td class="text-center" style="color:blue">82,960,732</td>
                                    <td class="text-center" style="color:blue">Total</td>
                                    <td class="text-center" style="color:blue">24,058,474</td>
                                </tr> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tabel Daftar Kewajiban Kepatuhan (Compliance Obligation List) PT Jasamarga Jogja Solo -->
<div class="modal fade show" id="table_kepatuhan" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 80%">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h6 class="modal-title">
                    <span class="fw-bold"><b>DAFTAR KEWAJIBAN KEPATUHAN (COMPLIANCE OBLIGATION LIST) PT JASAMARGA JOGJA SOLO <font color="blue" id="aspekk"> (ASPEK OPERASIONAL)</font></b></span>
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-hover table-bordered" width="50%" style="font-size:12px">
                    <thead>
                        <tr>
                            <th scope="col" style="text-align: center; background-color: #1d6296; color: white; width: 13px"><b>No.</b></th>
                            <th scope="col" style="text-align: center; background-color: #1d6296; color: white; "><b>Kewajiban/Izin <br> (Otorisasi)/Dokumen</b></th>
                            <th scope="col" style="text-align: center; background-color: #1d6296; color: white"><b>Dasar Hukum</b></th>
                            <th scope="col" style="text-align: center; background-color: #1d6296; color: white;"><b>Otoritas Terkait</b></th>
                            <th scope="col" style="text-align: center; background-color: #1d6296; color: white; "><b>Konsekuensi<br> Ketidakpatuhan</b></th>
                            <th scope="col" style="text-align: center; background-color: #1d6296; color: white; "><b>Tanggal Izin/<br>Pemenuhan Terakhir</b></th>
                            <th scope="col" style="text-align: center; background-color: #1d6296; color: white; "><b>Unit Kerja <br>Penanggung Jawab</b></th>
                            <th scope="col" style="text-align: center; background-color: #1d6296; color: white; "><b>Status</b></th>
                            <th scope="col" style="text-align: center; background-color: #1d6296; color: white; "><b>Dokumen</b></th>
                        </tr>
                    </thead>
                    <tbody id="kewajiban_kepatuhan">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm waves-effect" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal SOP Terkait ISO 9001:2015 -->
<div class="modal fade none-border" id="sop_9001">
    <div class="modal-dialog modal-lg" style="min-width: 1000px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>SOP Terkait ISO 9001:2015</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <table class="table table-hover table-bordered" width="50%">
                    <thead>
                        <tr>
                            <th scope="col" style="text-align: center; background-color: #1d6296; color: white; width: 13px"><b>No.</b></th>
                            <th scope="col" style="text-align: center; background-color: #1d6296; color: white; "><b>Divisi</b></th>
                            <th scope="col" style="text-align: center; background-color: #1d6296; color: white"><b>Nama SOP</b></th>
                            <th scope="col" style="text-align: center; background-color: #1d6296; color: white; width: 120px;"><b>Tanggal</b></th>
                            <th scope="col" style="text-align: center; background-color: #1d6296; color: white; width: 150px">Nomor</th>
                            <th scope="col" style="text-align: center; background-color: #1d6296; color: white; width: 100px;"><b>File</b></th>
                        </tr>
                    </thead>
                    <tbody id="detail_sop9001">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm waves-effect" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal SOP Terkait ISO 14001:2015 -->
<div class="modal fade none-border" id="sop_14001">
    <div class="modal-dialog modal-lg" style="min-width: 1000px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>SOP Terkait ISO 14001:2015</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <table class="table table-hover table-bordered" width="50%">
                    <thead>
                        <tr>
                            <th scope="col" style="text-align: center; background-color: #1d6296; color: white; width: 13px"><b>No.</b></th>
                            <th scope="col" style="text-align: center; background-color: #1d6296; color: white; "><b>Divisi</b></th>
                            <th scope="col" style="text-align: center; background-color: #1d6296; color: white"><b>Nama SOP</b></th>
                            <th scope="col" style="text-align: center; background-color: #1d6296; color: white; width: 120px;"><b>Tanggal</b></th>
                            <th scope="col" style="text-align: center; background-color: #1d6296; color: white; width: 150px">Nomor</th>
                            <th scope="col" style="text-align: center; background-color: #1d6296; color: white; width: 100px;"><b>File</b></th>
                        </tr>
                    </thead>

                    <tbody id="detail_sop14001">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm waves-effect" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal SOP Terkait ISO 45001:2018 -->
<div class="modal fade none-border" id="sop_45001">
    <div class="modal-dialog modal-lg" style="min-width: 1000px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>SOP Terkait ISO 45001:2018</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <table class="table table-hover table-bordered" width="50%">
                    <thead>
                        <tr>
                            <th scope="col" style="text-align: center; background-color: #1d6296; color: white; width: 13px"><b>No.</b></th>
                            <th scope="col" style="text-align: center; background-color: #1d6296; color: white; "><b>Divisi</b></th>
                            <th scope="col" style="text-align: center; background-color: #1d6296; color: white"><b>Nama SOP</b></th>
                            <th scope="col" style="text-align: center; background-color: #1d6296; color: white; width: 120px;"><b>Tanggal</b></th>
                            <th scope="col" style="text-align: center; background-color: #1d6296; color: white; width: 150px">Nomor</th>
                            <th scope="col" style="text-align: center; background-color: #1d6296; color: white; width: 100px;"><b>File</b></th>
                        </tr>
                    </thead>

                    <tbody id="detail_sop45001">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm waves-effect" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal SOP Terkait ISO 37001:2016 -->
<div class="modal fade none-border" id="sop_37001">
    <div class="modal-dialog modal-lg" style="min-width: 1000px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>SOP Terkait ISO 37001:2016</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <table class="table table-hover table-bordered" width="50%">
                    <thead>
                        <tr>
                            <th scope="col" style="text-align: center; background-color: #1d6296; color: white; width: 13px"><b>No.</b></th>
                            <th scope="col" style="text-align: center; background-color: #1d6296; color: white; "><b>Divisi</b></th>
                            <th scope="col" style="text-align: center; background-color: #1d6296; color: white"><b>Nama SOP</b></th>
                            <th scope="col" style="text-align: center; background-color: #1d6296; color: white; width: 120px;"><b>Tanggal</b></th>
                            <th scope="col" style="text-align: center; background-color: #1d6296; color: white; width: 150px">Nomor</th>
                            <th scope="col" style="text-align: center; background-color: #1d6296; color: white; width: 100px;"><b>File</b></th>
                        </tr>
                    </thead>

                    <tbody id="detail_sop37001">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm waves-effect" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Kekurangan Dokumen Pra -->
<div class="modal fade none-border" id="view_dok_pra">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Kekurangan Dokumen</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <table class="table table-hover table-bordered" width="50%">
                    <thead>
                        <tr>
                            <th scope="col" style="text-align: center; background-color: #1d6296; color: white; width: 13px"><b>No.</b></th>
                            <th scope="col" style="text-align: center; background-color: #1d6296; color: white; "><b>Nama Kontrak</b></th>
                            <th scope="col" style="text-align: center; background-color: #1d6296; color: white"><b>No. Kontrak</b></th>
                            <th scope="col" style="text-align: center; background-color: #1d6296; color: white; width: 160px;"><b>Nilai (Rp.)</b></th>
                            <!-- <th scope="col">Scope</th> -->
                            <!-- <th scope="col" style="text-align: center; background-color: #1d6296; color: white; width: 150px;"><b>Status</b></th> -->
                        </tr>
                    </thead>

                    <tbody id="kurang_dok">
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm waves-effect" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Kekurangan Dokumen Proyek -->
<div class="modal fade none-border" id="view_dok_proyek">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Kekurangan Dokumen Proyek</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <table class="table table-hover table-bordered" width="50%">
                    <thead>
                        <tr>
                            <th scope="col" style="text-align: center; background-color: #1d6296; color: white; width: 13px"><b>No.</b></th>
                            <th scope="col" style="text-align: center; background-color: #1d6296; color: white; width: 90px;"><b>No. Sertifikat</b></th>
                            <th scope="col" style="text-align: center; background-color: #1d6296; color: white"><b>Periode</b></th>
                            <th scope="col" style="text-align: center; background-color: #1d6296; color: white; "><b>Keterangan</b></th>
                            <!-- <th scope="col">Scope</th> -->
                            <!-- <th scope="col" style="text-align: center; background-color: #1d6296; color: white; width: 150px;"><b>Status</b></th> -->
                        </tr>
                    </thead>

                    <tbody id="kurang_dokProyek">
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm waves-effect" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Kekurangan Dokumen Pembayaran Konstruksi -->
<div class="modal fade none-border" id="view_dok_pembayaranKonstruksi">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Kekurangan Dokumen Pembayaran</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <table class="table table-hover table-bordered" width="50%">
                    <thead>
                        <tr>
                            <th scope="col" style="text-align: center; background-color: #1d6296; color: white; width: 13px"><b>No.</b></th>
                            <th scope="col" style="text-align: center; background-color: #1d6296; color: white; width: 350px;"><b>Nama Kontrak</b></th>
                            <th scope="col" style="text-align: center; background-color: #1d6296; color: white"><b>Termin</b></th>
                            <th scope="col" style="text-align: center; background-color: #1d6296; color: white; "><b>Nilai</b></th>
                            <!-- <th scope="col">Scope</th> -->
                            <!-- <th scope="col" style="text-align: center; background-color: #1d6296; color: white; width: 150px;"><b>Status</b></th> -->
                        </tr>
                    </thead>

                    <tbody id="pembayaranKonstruksi">
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm waves-effect" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Rencana Porsi Biaya Investasi Tahap 1 -->
<div class="modal fade none-border" id="detail_biayatahap1">
    <div class="modal-dialog modal-lg" style="min-width: 800px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Detail Rencana Porsi Biaya Investasi Tahap 1</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div id="biayatahap1" style="height: 700px;"></div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Rencana Realisasi Hutang Tahap 1 -->
<div class="modal fade none-border" id="detail_realisasihutang">
    <div class="modal-dialog modal-lg" style="min-width: 800px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Detail Rencana Realisasi Hutang 1</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div id="realisasihutang" style="height: 700px;"></div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Rencana Realisasi Hutang Tahap 1 -->
<div class="modal fade none-border" id="detail_ekuitastahap1">
    <div class="modal-dialog modal-lg" style="min-width: 800px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Detail Ekuitas Tahap Hutang 1</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div id="ekuitastahap1" style="height: 700px;"></div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Fasilitas Kredit s/d Maret 2025 -->
<div class="modal fade none-border" id="view_debt">
    <div class="modal-dialog modal-lg" style="min-width: 800px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Fasilitas Kredit s/d Maret 2025</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <!--  <a href="<?php echo site_url('Perizinan/add_perizinan') ?>" class="pull-right"><button type="button" class="btn btn-primary btn-mini"> Download</button></a> -->
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th style="text-align: center; background-color: #1d6296; color: white; "><b>Keterangan</b></th>
                            <th style="text-align: center; background-color: #1d6296; color: white; "><b>Nilai</b></th>
                            <th style="text-align: center; background-color: #1d6296; color: white; "><b>Persentase</b></th>
                        </tr>
                        <tr>
                            <td><b>Plafond </b> </td>
                            <td align="right"><b> Rp 9.893.216.000.000 </b></td>
                            <td align="center"><b>100%</b></td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; Realisasi Penarikan </td>
                            <td align="right"> Rp 5.638.090.660.872</td>
                            <td align="center">56,99%</td>
                        </tr>
                        <tr style="color: blue">
                            <td>&emsp;&emsp; Sisa/Deviasi</td>
                            <td align="right"><b> Rp 4.255.125.339.128</b></td>
                            <td align="center"><b>43.01%</b></td>
                        </tr>
                        <tr>
                            <td><b>KI Pokok</b> </td>
                            <td align="right"><b> Rp 9.362.003.000.000 </b></td>
                            <td align="center"><b>100%</b></td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; Realisasi Penarikan </td>
                            <td align="right"> Rp 5.327.766.146.528</td>
                            <td align="center">56,91%</td>
                        </tr>
                        <tr style="color: blue">
                            <td>&emsp;&emsp; Sisa/Deviasi</td>
                            <td align="right"> Rp 4.034.236.853.472 </td>
                            <td align="center">43,09%</td>
                        </tr>
                        <tr>
                            <td><b>KI IDC</b> </td>
                            <td align="right"><b> Rp 531.213.000.000</b></td>
                            <td align="center"><b>100%</b></td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; Realisasi Penarikan </td>
                            <td align="right"> Rp 310.324.514.344 </td>
                            <td align="center">58,42%</td>
                        </tr>
                        <tr style="color: blue">
                            <td>&emsp;&emsp; Sisa/Deviasi</td>
                            <td align="right"> Rp 220.888.485.656 </td>
                            <td align="center">41,58%</td>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail Ekuitas s/d Maret 2025 -->
<div class="modal fade none-border" id="view_equity">
    <div class="modal-dialog modal-lg" style="min-width: 800px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Detail Ekuitas s/d Maret 2025</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <!--  <a href="<?php echo site_url('Perizinan/add_perizinan') ?>" class="pull-right"><button type="button" class="btn btn-primary btn-mini"> Download</button></a> -->
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th rowspan="2" style="text-align: center; background-color: #1d6296; color: white; "><b>Keterangan</b></th>
                            <th colspan="2" style="text-align: center; background-color: #1d6296; color: white; "><b>Nilai</b></th>
                            <th rowspan="2" style="text-align: center; background-color: #1d6296; color: white; "><b>Persentase</b></th>
                        </tr>
                        <tr>
                            <td style="text-align: center; background-color: #1d6296; color: white; "><b>PMN</b></td>
                            <td style="text-align: center; background-color: #1d6296; color: white; "><b>Non PMN</b></td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; -ADHI</td>
                            <td align="right">Rp 1,318,428,000,000</td>
                            <td align="right"><b>Rp 31,200,000,000</b></td>
                            <td align="center">47,18%</td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp;- JSMR</td>
                            <td align="right">Rp 0</td>
                            <td align="right"><b>Rp 1,510,909,000,000</b></td>
                            <td align="center">52,82%</td>
                        </tr>
                        <tr style="color: blue">
                            <td><b>Subtotal Rencana Ekuitas</b> </td>
                            <td colspan="2" align="center"><b> Rp 2,860,537,000,000 </b></td>
                            <td align="center"><b>100%</b></td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; -JSMR</td>
                            <td align="right"> Rp 1,510,909,000,000 </td>
                            <td align="right"><b> Rp 0</b></td>
                            <td align="center">52.82%</td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; -ADHI</td>
                            <td align="right"> Rp 1,349,628,000,000 </td>
                            <td align="right"><b> Rp 0</b></td>
                            <td align="center">47.18%</td>
                        </tr>
                        <tr style="color: blue">
                            <td><b>Subtotal Realisasi Ekuitas</b> </td>
                            <td colspan="2" align="center"><b> Rp 2,547,604,107,619 </b></td>
                            <td align="center"><b>89,00%</b></td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; -JSMR</td>
                            <td align="right"> Rp 0</td>
                            <td align="right"><b> Rp 1,203,165,394,333</b></td>
                            <td align="center">47,20%</td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; -ADHI</td>
                            <td align="right"> Rp 1,313,238,713,286 </td>
                            <td align="right"><b> Rp 31,200,000,000</b></td>
                            <td align="center">52,80%</td>
                        </tr>
                        <tr style="color: blue">
                            <td><b>Sisa Ekuitas</b></td>
                            <td colspan="2" align="center"><b>Rp 312,932,892,381 </b></td>
                            <td align="center"><b>11%</b></td>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Nilai Progres Proyek Paket 1.1 -->
<div class="modal fade none-border" id="view_nilai1">
    <div class="modal-dialog modal-lg" style="min-width: 800px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Nilai Progres Proyek Paket 1.1</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <!--  <a href="<?php echo site_url('Perizinan/add_perizinan') ?>" class="pull-right"><button type="button" class="btn btn-primary btn-mini"> Download</button></a> -->
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th style="text-align: center; background-color: #1d6296; color: white; "><b>Keterangan</b></th>
                            <th style="text-align: center; background-color: #1d6296; color: white; "><b>Nilai</b></th>
                            <th style="text-align: center; background-color: #1d6296; color: white; "><b>Persentase</b></th>

                        </tr>
                        <tr>
                            <td>Kontrak + PPN </td>
                            <td align="right"><b> Rp 4.545.205.422.600 </b></td>
                            <td align="center"></td>
                        </tr>
                        <tr>
                            <td>Akrual Progres Konstruksi </td>
                            <td align="right"><b> Rp 4.493.384.438.362 </b></td>
                            <td align="center"><b>98.86%</b></td>
                        </tr>
                        <tr>
                            <td>Deviasi Rupiah (Kontrak - Akrual Progres Konstruksi) </td>
                            <td align="right"> Rp 51.820.984.238 </td>
                            <td align="center">1.14%</td>
                        </tr>
                        <tr>
                            <td>Telah dibayarakan </td>
                            <td align="right"><b> Rp 4.246.685.294.880 </b></td>
                            <td align="center"><b>93.43%</b></td>
                        </tr>
                        <tr>
                            <td>Deviasi Rupiah (Kontrak - Telah Dibayarkan) </td>
                            <td align="right"> Rp 246.699.143.482 </td>
                            <td align="center"> </td>
                        </tr>
                    </thead>

                    <tbody>
                    </tbody>
                </table>
                <p class="text-info"><i>Cut off : Desember 2024</i></p>
            </div>

        </div>
    </div>
</div>

<!-- Modal Nilai Progres Proyek Paket 1.2 -->
<div class="modal fade none-border" id="view_nilai2">
    <div class="modal-dialog modal-lg" style="min-width: 800px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Nilai Progres Proyek Paket 1.2</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <!--  <a href="<?php echo site_url('Perizinan/add_perizinan') ?>" class="pull-right"><button type="button" class="btn btn-primary btn-mini"> Download</button></a> -->
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th style="text-align: center; background-color: #1d6296; color: white; "><b>Keterangan</b></th>
                            <th style="text-align: center; background-color: #1d6296; color: white; "><b>Nilai</b></th>
                            <th style="text-align: center; background-color: #1d6296; color: white; "><b>Persentase</b></th>

                        </tr>
                        <tr>
                            <td><b>Kontrak + PPN </b></td>
                            <td align="right"><b> Rp 4.022.564.518.890</b></td>
                            <td align="center"></td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; - Paket 1.2 Adhi Karya </td>
                            <td align="right"> Rp 3.439.847.465.910</td>
                            <td align="center"></td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; - Paket 1.2 DMT </td>
                            <td align="right"> Rp 582.717.052.980</td>
                            <td align="center"></td>
                        </tr>
                        <tr>
                            <td><b>Akrual Progres Konstruksi </b></td>
                            <td align="right"><b> Rp 3.158.274.158.284</b></td>
                            <td align="center"><b>78.51%</b></td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; - Paket 1.2 Adhi Karya </td>
                            <td align="right"> Rp 2.603.359.118.550</td>
                            <td align="center">75.68%</td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; - Paket 1.2 DMT </td>
                            <td align="right"> Rp 554.915.039.734</td>
                            <td align="center">95.23%</td>
                        </tr>
                        <tr>
                            <td><b>Deviasi Rupiah (Kontrak - Akrual Progres Konstruksi) </b></td>
                            <td align="right"> <b>Rp 864.290.360.606 </b></td>
                            <td align="center"><b>21.49%</b></td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; - Paket 1.2 Adhi Karya </td>
                            <td align="right"> Rp 836.488.347.360</td>
                            <td align="center">24.32%</td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; - Paket 1.2 DMT </td>
                            <td align="right"> Rp 27.802.013.246</td>
                            <td align="center">4.77%</td>
                        </tr>
                        <tr>
                            <td><b>Telah dibayarkan </b> </td>
                            <td align="right"><b>Rp 2.275.298.235.960</b></td>
                            <td align="center"><b>56.56%</b></td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; - Paket 1.2 Adhi Karya </td>
                            <td align="right"> Rp 1.788.430.899.774</td>
                            <td align="center">51.99%</td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; - Paket 1.2 DMT </td>
                            <td align="right"> Rp 486.867.336.186</td>
                            <td align="center">83.55%</td>
                        </tr>
                        <tr>
                            <td><b>Deviasi Rupiah (Kontrak - Telah Dibayarkan) </td>
                            <td align="right"><b> Rp 882.975.922.322 </b></td>
                            <td align="center"> </td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; - Paket 1.2 Adhi Karya </td>
                            <td align="right">Rp 814.928.218.775</td>
                            <td align="center"></td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; - Paket 1.2 DMT </td>
                            <td align="right"> Rp 68.047.703.547</td>
                            <td align="center"></td>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Nilai Progres Proyek Paket 2.1A -->
<div class="modal fade none-border" id="view_nilai3">
    <div class="modal-dialog modal-lg" style="min-width: 800px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Nilai Progres Proyek Paket 2.1A</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <!--  <a href="<?php echo site_url('Perizinan/add_perizinan') ?>" class="pull-right"><button type="button" class="btn btn-primary btn-mini"> Download</button></a> -->
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th style="text-align: center; background-color: #1d6296; color: white; "><b>Keterangan</b></th>
                            <th style="text-align: center; background-color: #1d6296; color: white; "><b>Nilai</b></th>
                            <th style="text-align: center; background-color: #1d6296; color: white; "><b>Persentase</b></th>

                        </tr>
                        <tr>
                            <td>Kontrak + PPN </td>
                            <td align="right"><b> Rp 1.667.447.000.000</b></td>
                            <td align="center"></td>
                        </tr>
                        <tr>
                            <td>Akrual Progres Konstruksi </td>
                            <td align="right"><b> Rp 34.749.586.169</b></td>
                            <td align="center"><b>2.08%</b></td>
                        </tr>
                        <tr style="color: red">
                            <td>Deviasi Rupiah (Kontrak - Akrual Progres Konstruksi) </td>
                            <td align="right"> Rp 1.632.697.413.831 </td>
                            <td align="center">97.92%</td>
                        </tr>
                        <tr>
                            <td>Telah dibayarakan </td>
                            <td align="right"><b> - </b></td>
                            <td align="center"><b>-</b></td>
                        </tr>
                        <tr>
                            <td>Deviasi Rupiah (Kontrak - Telah Dibayarkan) </td>
                            <td align="right"> Rp 34.749.586.169 </td>
                            <td align="center"> </td>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail Nilai Progres Proyek -->
<div class="modal fade none-border" id="view_nilai4">
    <div class="modal-dialog modal-lg" style="min-width: 800px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Detail Nilai Progres Proyek</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <!--  <a href="<?php echo site_url('Perizinan/add_perizinan') ?>" class="pull-right"><button type="button" class="btn btn-primary btn-mini"> Download</button></a> -->
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th style="text-align: center; background-color: #1d6296; color: white; "><b>Keterangan</b></th>
                            <th style="text-align: center; background-color: #1d6296; color: white; "><b>Nilai</b></th>
                            <th style="text-align: center; background-color: #1d6296; color: white; "><b>Persentase</b></th>

                        </tr>
                        <tr>
                            <td>Kontrak + PPN </td>
                            <td align="right"><b> Rp 1.476.885.506.000</b></td>
                            <td align="center"></td>
                        </tr>
                        <tr>
                            <td>Akrual Progres Konstruksi </td>
                            <td align="right"><b> Rp 659.327.473.387</b></td>
                            <td align="center"><b>44.64%</b></td>
                        </tr>
                        <tr>
                            <td>Deviasi Rupiah (Kontrak - Akrual Progres Konstruksi) </td>
                            <td align="right"> Rp 817.558.032.613 </td>
                            <td align="center">55.36%</td>
                        </tr>
                        <tr>
                            <td>Telah dibayarakan </td>
                            <td align="right"><b> Rp437.366.913.060 </b></td>
                            <td align="center"><b>29.61%</b></td>
                        </tr>
                        <tr>
                            <td>Deviasi Rupiah (Kontrak - Telah Dibayarkan) </td>
                            <td align="right"> Rp 221.960.560.327 </td>
                            <td align="center"> </td>
                        </tr>
                    </thead>

                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail Progres Konstruksi per Tahap -->
<div class="modal fade none-border" id="progres_konstruksi_tahap">
    <div class="modal-dialog modal-lg" style="min-width: 800px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Detail Progres Konstruksi per Tahap</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th style="text-align: center; background-color: #faa307; color: white; "><b>Tahap Pekerjaan</b></th>
                            <th style="text-align: center; background-color: #faa307; color: white; "><b>Progres</b></th>
                            <!-- <th style="text-align: center; background-color: #faa307; color: white; "><b>Persentase</b></th> -->
                        </tr>
                        <tr style="color: blue">
                            <td><b>Tahap 1 </b> </td>
                            <td class="text-center"><b>76.36%</b></td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; - Paket 1.1</td>
                            <td class="text-center">99.54% </td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; - Paket 1.2</td>
                            <td class="text-center">86.33%</td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; - Paket 2.1A</td>
                            <td class="text-center">8.77%</td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; - Paket 2.2B</td>
                            <td class="text-center">57.05% </td>
                        </tr>
                        <tr style="color: blue">
                            <td><b>Tahap 2 </b> </td>
                            <td class="text-center"><b>0%</b></td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; - Paket 3.1</td>
                            <td class="text-center">0% </td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; - Paket 3.2</td>
                            <td class="text-center"> 0%</td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; - Paket 3.3</td>
                            <td class="text-center"> 0%</td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; - Paket 3.4</td>
                            <td class="text-center"> 0%</td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; - Paket 3.5</td>
                            <td class="text-center"> 0%</td>
                        </tr>
                        <tr style="color: blue">
                            <td><b>Tahap 3 </b> </td>
                            <td class="text-center"><b>0%</b></td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; - Paket 2.1B</td>
                            <td class="text-center">0% </td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; - Paket 2.2A</td>
                            <td class="text-center">0% </td>
                        </tr>

                    </thead>

                    <tbody>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<!-- Modal Detail Progres Lahan per Tahap -->
<div class="modal fade none-border" id="progres_lahan_tahap">
    <div class="modal-dialog modal-lg" style="min-width: 800px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Detail Progres Lahan per Tahap</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th style="text-align: center; background-color: #1d6296; color: white; "><b>Tahap Pekerjaan</b></th>
                            <th style="text-align: center; background-color: #1d6296; color: white; "><b>Progres</b></th>
                            <!-- <th style="text-align: center; background-color: #1d6296; color: white; "><b>Persentase</b></th> -->
                        </tr>
                        <tr style="color: blue">
                            <td><b>Tahap 1 </b> </td>
                            <td align="center"><b>98.91%</b></td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; - Paket 1.1</td>
                            <td align="center">99.09% </td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; - Paket 1.2</td>
                            <td align="center">98.84% </td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; - Paket 2.1A</td>
                            <td align="center"> 96.00%</td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; - Paket 2.2B</td>
                            <td align="center">98.39% </td>
                        </tr>
                        <tr style="color: blue">
                            <td><b>Tahap 2 </b> </td>
                            <td align="center"><b>7.62% </b></td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; - Paket 3.1</td>
                            <td align="center">19.6% </td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; - Paket 3.2</td>
                            <td align="center">9.4% </td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; - Paket 3.3</td>
                            <td align="center"> 0%</td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; - Paket 3.4</td>
                            <td align="center"> 0%</td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; - Paket 3.5</td>
                            <td align="center"> 0%</td>
                        </tr>
                        <tr style="color: blue">
                            <td><b>Tahap 3 </b> </td>
                            <td align="center"><b>5.59% </b></td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; - Paket 2.1B</td>
                            <td align="center">0% </td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; - Paket 2.2A</td>
                            <td align="center">0% </td>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail Progres RTA per Tahap -->
<div class="modal fade none-border" id="progres_rta_tahap">
    <div class="modal-dialog modal-lg" style="min-width: 800px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Detail Progres RTA per Tahap</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <!--  <a href="<?php echo site_url('Perizinan/add_perizinan') ?>" class="pull-right"><button type="button" class="btn btn-primary btn-mini"> Download</button></a> -->
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th style="text-align: center; background-color: #28b779; color: white; "><b>Tahap Pekerjaan</b></th>
                            <th style="text-align: center; background-color: #28b779; color: white; "><b>Progres</b></th>
                            <!-- <th style="text-align: center; background-color: #28b779; color: white; "><b>Persentase</b></th> -->

                        </tr>
                        <tr style="color: green">
                            <td><b>Tahap 1 </b> </td>
                            <td align="center"><b>97.29%</b></td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; - Paket 1.1</td>
                            <td align="center">100.0% </td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; - Paket 1.2</td>
                            <td align="center">100.0% </td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; - Paket 2.1A</td>
                            <td align="center"> 68%</td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; - Paket 2.2B</td>
                            <td align="center">95% </td>
                        </tr>
                        <tr style="color: green">
                            <td><b>Tahap 2 </b> </td>
                            <td align="center"><b>70.30% </b></td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; - Paket 3.1</td>
                            <td align="center">34% </td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; - Paket 3.2</td>
                            <td align="center"> 92.6%</td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; - Paket 3.3</td>
                            <td align="center"> 93.6%</td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; - Paket 3.4</td>
                            <td align="center"> 60.4%</td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; - Paket 3.5</td>
                            <td align="center"> 60.4%</td>
                        </tr>
                        <tr style="color: green">
                            <td><b>Tahap 3 </b> </td>
                            <td align="center"><b>33.53% </b></td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; - Paket 2.1B</td>
                            <td align="center">34% </td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; - Paket 2.2A</td>
                            <td align="center">33.4% </td>
                        </tr>

                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail Progres Nilai Proyek per Tahap -->
<div class="modal fade none-border" id="progres_nilai_tahap">
    <div class="modal-dialog modal-lg" style="min-width: 800px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Detail Progres Nilai Proyek per Tahap</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th style="text-align: center; background-color: #da542e; color: white; "><b>Tahap Pekerjaan</b></th>
                            <th style="text-align: center; background-color: #da542e; color: white; "><b>Kontrak + PPN</b></th>
                            <th style="text-align: center; background-color: #da542e; color: white; "><b>Akrual Progres Konstruksi</b></th>
                            <th style="text-align: center; background-color: #da542e; color: white; "><b>Deviasi</b></th>
                        </tr>
                        <tr style="color: red">
                            <td><b>Tahap 1 </b> </td>
                            <td align="right"><b>Rp 11.712.102.447.490</b></td>
                            <td align="right"><b>Rp 8.345.735.656.202</b></td>
                            <td align="right"><b>Rp 4.230.657.151.894</b></td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; - Paket 1.1</td>
                            <td align="right">Rp 4.545.205.422.600 </td>
                            <td align="right">Rp 4.493.384.438.362 </td>
                            <td align="right">Rp 51.820.984.238 </td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; - Paket 1.2</td>
                            <td align="right"> Rp 4.022.564.518.890</td>
                            <td align="right">Rp 3.158.274.158.284 </td>
                            <td align="right">Rp 864.290.360.606 </td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; - Paket 2.1A</td>
                            <td align="right">Rp 1.667.447.000.000 </td>
                            <td align="right">Rp 34.749.586.169 </td>
                            <td align="right">Rp 1.632.697.413.831 </td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; - Paket 2.2B</td>
                            <td align="right"> Rp 1.476.885.506.000</td>
                            <td align="right"> Rp 659.327.473.387</td>
                            <td align="right"> Rp 817.558.032.613</td>
                        </tr>
                        <tr>
                            <td><b>Tahap 2 </b> </td>
                            <td align="center"><b>0 </b></td>
                            <td align="center"><b>0 </b></td>
                            <td align="center"><b>0 </b></td>
                        </tr>
                        <tr>
                            <td><b>Tahap 3 </b> </td>
                            <td align="center"><b>0 </b></td>
                            <td align="center"><b>0 </b></td>
                            <td align="center"><b>0 </b></td>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail Penyerapan Capex 2025 -->
<div class="modal fade none-border" id="view_detailCapex">
    <div class="modal-dialog modal-lg" style="min-width: 800px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Detail Penyerapan Capex <span id="tw-capex"></span> 2025</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr style="background-color: #1d6296">
                            <th class="text-center font-weight-bold text-white">No</th>
                            <th class="text-center font-weight-bold text-white">TW</th>
                            <th class="text-center font-weight-bold text-white">Keterangan</th>
                            <th class="text-center font-weight-bold text-white">Rencana (Rp.)</th>
                            <th class="text-center font-weight-bold text-white">Realisasi (Rp.)</th>
                            <th class="text-center font-weight-bold text-white">Deviasi (Rp.)</th>
                            <th class="text-center font-weight-bold text-white">%</th>
                        </tr>
                    </thead>
                    <tbody id="detail_capex">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail Penyerapan Opex 2025 -->
<div class="modal fade none-border" id="view_detailOpex">
    <div class="modal-dialog modal-lg" style="min-width: 800px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Detail Penyerapan Opex <span id="tw-opex"></span> 2025</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center text-white font-weight-bold" style="background-color: #1d6296;">No</th>
                            <th class="text-center text-white font-weight-bold" style="background-color: #1d6296;">TW</th>
                            <th class="text-center text-white font-weight-bold" style="background-color: #1d6296;">Keterangan</th>
                            <th class="text-center text-white font-weight-bold" style="background-color: #1d6296;">Rencana (Rp.)</th>
                            <th class="text-center text-white font-weight-bold" style="background-color: #1d6296;">Realisasi (Rp.)</th>
                            <th class="text-center text-white font-weight-bold" style="background-color: #1d6296;">Deviasi (Rp.)</th>
                            <th class="text-center text-white font-weight-bold" style="background-color: #1d6296;">%</th>
                        </tr>
                    </thead>
                    <tbody id="detail_opex">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Summary SOP -->
<div class="modal fade none-border" id="summary_sop">
    <div class="modal-dialog modal-lg" style="min-width: 1200px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Summary SOP</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <!--  <a href="<?php echo site_url('Perizinan/add_perizinan') ?>" class="pull-right"><button type="button" class="btn btn-primary btn-mini"> Download</button></a> -->
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th style="text-align: center; vertical-align: middle; background-color: #1d6296; color: white; " rowspan="2"><b>No</th>
                            <th style="text-align: center; vertical-align: middle; background-color: #1d6296; color: white; " rowspan="2"><b>Divisi</b></th>
                            <th style="text-align: center; background-color: #1d6296; color: white; " colspan="4"><b>2024</b></th>
                            <th style="text-align: center; vertical-align: middle; background-color: #1d6296; color: white; " rowspan="2"><b>2023</b></th>
                            <!-- <th style="text-align: center; background-color: #1d6296; color: white; "><b>2025</b></th> -->
                            <th style="text-align: center; vertical-align: middle; background-color: #1d6296; color: white; " rowspan="2"><b>Penambahan SOP</b></th>
                            <th style="text-align: center; vertical-align: middle; background-color: #1d6296; color: white; " rowspan="2"><b>Pengurangan SOP</b></th>
                        </tr>
                        <tr>
                            <th style="text-align: center; background-color: #1d6296; color: white; "><b>TW IV</b></th>
                            <th style="text-align: center; background-color: #1d6296; color: white; "><b>TW III</b></th>
                            <th style="text-align: center; background-color: #1d6296; color: white; "><b>TW II</b></th>
                            <th style="text-align: center; background-color: #1d6296; color: white; "><b>TW I</b></th>
                        </tr>

                    </thead>

                    <tbody>
                        <tr>
                            <td align="center">1</td>
                            <td>Keuangan</td>
                            <td align="center">7</td>
                            <td align="center">7</td>
                            <td align="center">7</td>
                            <td align="center">7</td>
                            <td align="center">7</td>
                            <td align="center"> </td>
                            <td align="center"> </td>
                        </tr>
                        <tr>
                            <td align="center">2</td>
                            <td>SDM</td>
                            <td align="center">15</td>
                            <td align="center">15</td>
                            <td align="center">15</td>
                            <td align="center">15</td>
                            <td align="center">13</td>
                            <td> - Prosedur Surat Masuk dan Keluar Direksi (TW 1) <br> -Prosedur Pengelolaan Aset (TW 2)</td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td align="center">3</td>
                            <td>Humas</td>
                            <td align="center">3</td>
                            <td align="center">3</td>
                            <td align="center">3</td>
                            <td align="center">3</td>
                            <td align="center">3</td>
                            <td align="center"> </td>
                            <td align="center"> </td>
                        </tr>
                        <tr>
                            <td align="center">4</td>
                            <td>Proyek</td>
                            <td align="center">30</td>
                            <td align="center">30</td>
                            <td align="center">31</td>
                            <td align="center">31</td>
                            <td align="center">32</td>
                            <td align="center"> </td>
                            <td>- Prosedur Review Design (Move ke Teknik, TW 1)
                                <br> - Prosedur Mekanisme Pendokumentasian dan Pengarsipan (Move ke SDM, TW 3-4)
                            </td>
                        </tr>
                        <tr>
                            <td align="center">5</td>
                            <td>Lahan</td>
                            <td align="center">3</td>
                            <td align="center">3</td>
                            <td align="center">3</td>
                            <td align="center">3</td>
                            <td align="center">1</td>
                            <td> - Prosedur Pengembalian DTT (TW 1)<br>- Prosedur Bangunan Pengganti (TW 1)</td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td align="center">6</td>
                            <td>Akuntansi</td>
                            <td align="center">2</td>
                            <td align="center">2</td>
                            <td align="center">2</td>
                            <td align="center">2</td>
                            <td align="center">2</td>
                            <td align="center"> </td>
                            <td align="center"> </td>
                        </tr>
                        <tr>
                            <td align="center">7</td>
                            <td>Teknik</td>
                            <td align="center">9</td>
                            <td align="center">9</td>
                            <td align="center">7</td>
                            <td align="center">7</td>
                            <td align="center">6</td>
                            <td>- Prosedur Review Design<br>
                                - Prosedur Monitoring Desain RTA</td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td align="center">8</td>
                            <td>K3L</td>
                            <td align="center">14</td>
                            <td align="center">14</td>
                            <td align="center">14</td>
                            <td align="center">14</td>
                            <td align="center">3</td>
                            <td>- Prosedur Pengendalian Izin Kerja<br>
                                - Prosedur Pengelolaan Sampah<br>
                                - Prosedur Pengendalian Kebersihan, Keamanan dan Keindahan<br>
                                - Prosedur Pengelolaan Limbah B3<br>
                                - Prosedur Pengendalian Banjri dan Drainase<br>
                                - Prosedur Pertolongan Pertama Pada Kecelakaan<br>
                                - Prosedur Pengelolaan Kualitas Lingkungan (Air, Udara dan Tanah)<br>
                                - Prosedur Pengelolaan Pihak Ketiga<br>
                                - Prosedur Monitoring Program K3L<br>
                                - Prosedur Laporan K3L Kepada Regulator</td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td align="center">9</td>
                            <td>MR</td>
                            <td align="center">2</td>
                            <td align="center">2</td>
                            <td align="center">2</td>
                            <td align="center">2</td>
                            <td align="center">1</td>
                            <td>- Prosedur Kaji Ulang Manajemen</td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td align="center">10</td>
                            <td>SMAP</td>
                            <td align="center">9</td>
                            <td align="center">7</td>
                            <td align="center">9</td>
                            <td align="center">9</td>
                            <td align="center">2</td>
                            <td>- Prosedur Uji Kelayakan<br>
                                - Prosedur Peningkatan Kepedulian<br>
                                - Prosedur Hadiah Kemurahan Hati, Sumbangan & Keuntungan Serupa<br>
                                - Prosedur Tinjauan Fungsi Kepatuhan<br>
                                - Prosedur Penanganan Gratifikasi<br>
                                - Prosedur Benturan Kepentingan<br>
                                - Prosedur Investigasi Penyuapan<br>
                                - Prosedur Pengendalian Pengaduan dan WBS </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td align="center" colspan="2"><b>Total</b></td>
                            <td align="center"><b>94</b></td>
                            <td align="center"><b></b></td>
                            <td align="center"><b></b></td>
                            <td></td>
                            <td><b>70</b> </td>
                        </tr>
                    </tbody>
                    <!-- <tr>
                                <td colspan="3" style="text-align: center;"><b>Total</b></td>
                                <td style="text-align: right"><b></b></td>
                                <td style="text-align: right"><b></b></td>
                            </tr> -->
                </table>
            </div>
        </div>
    </div>
</div>