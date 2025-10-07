<div class="card">
    <div class="row">
        <div class="col-md-12 border-right p-r-0">
            <div class="card-body border-bottom d-flex align-items-center">
                <h4 class="card-title font-weight-bold m-t-10 mr-2">12. Monitoring KPI</h4>
                <span class="mdi mdi-alert-circle blink cursor-pointer <?= (!$isu12) ? 'd-none' : '' ?>" style="color:red;" onclick="view_alert(`<b>PERMASALAHAN :</b><br>
                    <?= (!$isu12 ? '' : $isu12->issue) ?>
                    <hr>
                    <b>REKOMENDASI :</b><br>
                    <?= (!$isu12 ? '' : $isu12->issue) ?>`)">
                </span>
            </div>
            <div class="card-body">
                <table class="table-bordered table-striped table mb-0 w-100" id="dt_kpi">
                    <thead>
                        <tr style="background-color: #98D4FF">
                            <th class="text-center font-weight-bold align-middle" rowspan="3">No</th>
                            <th class="text-center font-weight-bold align-middle" rowspan="3">Ukuran Kinerja Utama (KPI)</th>
                            <th class="text-center font-weight-bold align-middle" rowspan="3">Satuan</th>
                            <th class="text-center font-weight-bold align-middle" rowspan="3">Polaritas</th>
                            <th class="text-center font-weight-bold align-middle" rowspan="3">Bobot</th>
                            <th class="text-center font-weight-bold align-middle" rowspan="3">Batasan<br>Nilai</th>
                            <th class="text-center font-weight-bold align-middle" rowspan="3">Periode<br>Pengukuran</th>
                            <th class="text-center font-weight-bold" colspan=" 8">Skor</th>
                            <th class="text-center font-weight-bold align-middle" rowspan="3">Keterangan</th>
                        </tr>
                        <tr class="text-center" style="background-color: #98D4FF">
                            <th class="text-center font-weight-bold" colspan="4">Rencana</th>
                            <th class="text-center font-weight-bold" colspan="4">Realisasi</th>
                        </tr>
                        <tr class="text-center" style="background-color: #98D4FF">
                            <th class="text-center font-weight-bold">S.D.1Q</th>
                            <th class="text-center font-weight-bold">S.D.2Q</th>
                            <th class="text-center font-weight-bold">S.D.3Q</th>
                            <th class="text-center font-weight-bold">S.D.1Y</th>
                            <th class="text-center font-weight-bold">S.D.1Q</th>
                            <th class="text-center font-weight-bold">S.D.2Q</th>
                            <th class="text-center font-weight-bold">S.D.3Q</th>
                            <th class="text-center font-weight-bold">S.D.1Y</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th class="font-weight-bold bg-cream" colspan="4">Total Bobot</th>
                            <th class="font-weight-bold bg-cream" id="total_bobot"></th>
                            <th class="font-weight-bold bg-cream" colspan="2"></th>
                            <th class="font-weight-bold bg-slate" id="total_rencana_q1"></th>
                            <th class="font-weight-bold bg-slate" id="total_rencana_q2"></th>
                            <th class="font-weight-bold bg-slate" id="total_rencana_q3"></th>
                            <th class="font-weight-bold bg-slate" id="total_rencana_1y"></th>
                            <th class="font-weight-bold bg-slate" id="total_realisasi_q1"></th>
                            <th class="font-weight-bold bg-slate" id="total_realisasi_q2"></th>
                            <th class="font-weight-bold bg-slate" id="total_realisasi_q3"></th>
                            <th class="font-weight-bold bg-slate" id="total_realisasi_1y"></th>
                            <th class="font-weight-bold bg-lightslate"></th>
                        </tr>
                    </tfoot>
                </table>
                <p class="text-info"><i>Last updated : <?= $last_update ?></i></p>
            </div>
        </div>
    </div>
</div>