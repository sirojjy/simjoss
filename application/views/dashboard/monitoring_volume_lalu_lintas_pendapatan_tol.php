<div class="card">
    <div class="row">
        <div class="col-md-12 border-right p-r-0">
            <div class="card-body border-bottom d-flex align-items-center">
                <h4 class="card-title font-weight-bold m-t-10 mr-2">4. Monitoring Laju Harian Rata-Rata dan Pendapatan Tol</h4>
                <span class="mdi mdi-alert-circle blink cursor-pointer <?= (!$isu4) ? 'd-none' : '' ?>" style="color:red;" onclick="view_alert(`<b>PERMASALAHAN :</b><br>
                        <?= (!$isu4 ? '' : $isu4->issue) ?>
                        <hr>
                        <b>REKOMENDASI :</b><br>
                        <?= (!$isu4 ? '' : $isu4->issue) ?>`)">
                </span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div id="line_volume" style="height: 450px;"></div>
                    </div>
                    <div class="col-md-6">
                        <div id="line_pendapatan" style="height: 450px;"></div>
                    </div>
                </div>
                <p class="text-info mt-3"><i>Last updated : <?= $lastUpdateDashboard3 ?> </i></p>
            </div>
        </div>
    </div>
</div>