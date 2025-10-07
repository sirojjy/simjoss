<div class="card">
    <div class="row">
        <div class="col-md-12 border-right p-r-0">
            <div class="card-body border-bottom d-flex align-items-center">
                <h4 class="card-title font-weight-bold m-t-10 mr-2">13. Monitoring Kelengkapan Dokumen Kontrak Konstruksi Tol</h4>
                <span class="mdi mdi-alert-circle blink cursor-pointer <?= (!$isu13) ? 'd-none' : '' ?>" style="color:red;" onclick="view_alert(`<b>PERMASALAHAN :</b><br>
                    <?= (!$isu13 ? '' : $isu13->issue) ?>
                    <hr>
                    <b>REKOMENDASI :</b><br>
                    <?= (!$isu13 ? '' : $isu13->issue) ?>`)">
                </span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div id="pie_kontrakKonsTol" style="height: 450px;"></div>
                        <br>
                        <p class="text-center text-danger font-weight-bold">Total Kekurangan : <?= $sum_konstruksi ?> Dokumen</p>
                    </div>
                    <div class="col-md-4">
                        <div id="pie_proyekKonsTol" style="height: 450px;"></div>
                        <br>
                        <p class="text-center text-danger font-weight-bold">Total Kekurangan : <?= $sum_proyek_konstruksi ?> Dokumen</p>
                    </div>
                    <div class="col-md-4">
                        <div id="pie_bayarKonsTol" style="height: 450px;"></div>
                        <br>
                        <p class="text-center text-danger font-weight-bold">Total Kekurangan : <?= $sum_krg_pembayaranKonstruksi ?> Dokumen</p>
                    </div>
                </div>
            </div>
            <p class="text-info ml-4"><i>Last updated : <?= $last_update ?></i></p>
        </div>
    </div>
</div>