<div class="card">
    <div class="row">
        <div class="col-md-12 border-right p-r-0">
            <div class="card-body border-bottom d-flex align-items-center">
                <h4 class="card-title font-weight-bold m-t-10 mr-2">9. Manajemen Resiko</h4>
                <span class="mdi mdi-alert-circle blink cursor-pointer <?= (!$isu9) ? 'd-none' : '' ?>" style="color:red;" onclick="view_alert(`<b>PERMASALAHAN :</b><br>
                    <?= (!$isu9 ? '' : $isu9->issue) ?>
                    <hr>
                    <b>REKOMENDASI :</b><br>
                    <?= (!$isu9 ? '' : $isu9->issue) ?>`)">
                </span>
            </div>
            <div class="card-body">
                <table id="dt_monitoring_resiko" class="table table-bordered table-striped table-hover ">
                    <thead>
                        <tr class="text-white" style="background-color: #a41623;">
                            <td class="text-center"><b>No.</b></td>
                            <td class="text-center"><b>Indikator</b></td>
                            <td class="text-center"><b>Bobot</b></td>
                            <td class="text-center"><b>Target</b></td>
                            <td class="text-center"><b>Realisasi</b></td>
                            <td class="text-center"><b>Skala</b></td>
                            <td class="text-center"><b>Hasil Penilaian</b></td>
                            <td class="text-center"><b>Skor Penilaian</b></td>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <p class="text-info"><i>Last updated : <?= $update_bulan_juli ?></i></p>
            </div>
        </div>
    </div>
</div>