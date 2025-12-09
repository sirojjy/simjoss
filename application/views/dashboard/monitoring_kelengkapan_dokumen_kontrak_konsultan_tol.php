<div class="card">
    <div class="row">
        <div class="col-md-12 border-right p-r-0">
            <div class="card-body border-bottom d-flex align-items-center">
                <h4 class="card-title font-weight-bold m-t-10 mr-2">14. Monitoring Kelengkapan Dokumen Kontrak Konsultan Tol</h4>
                <span class="mdi mdi-alert-circle blink cursor-pointer <?= (!$isu14) ? 'd-none' : '' ?>" style="color:red;" onclick="view_alert(`<b>PERMASALAHAN :</b><br>
                    <?= (!$isu14 ? '' : $isu14->issue) ?>
                    <hr>
                    <b>REKOMENDASI :</b><br>
                    <?= (!$isu14 ? '' : $isu14->issue) ?>`)">
                </span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div id="pie_kontrakKonsultan" style="height: 450px;"></div>
                        <br>
                        <p class="text-center text-danger"><b>Total Kekurangan : <?= $sum_konsultan ?> Dokumen</b></p>
                    </div>
                    <div class="col-md-6">
                        <div id="pie_bayarKonsultan" style="height: 450px;"></div>
                        <br>
                        <p class="text-center text-danger"><b>Total Kekurangan : <?= $sum_krg_pembayaranKonsultan ?> Dokumen</b></p>
                    </div>
                </div>
            </div>
            <p class="text-info ml-4"><i>Last updated : <?= $update_bulan_november ?></i></p>
        </div>
    </div>
</div>