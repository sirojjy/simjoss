<div class="card">
    <div class="">
        <div class="row">
            <div class="col-md-12 border-right p-r-0">
                <div class="card-body border-bottom">
                    <h4 class="card-title m-t-10"><b>3. Monitoring Progres Pekerjaan</b>&nbsp; <i class="mdi mdi-arrow-down-circle" style="color:red" onclick="view_alert()"></i></h4>
                    <div class="alert alert-danger" id="div-alert" style="display: none;" role="alert">
                        <b>PERMASALAHAN (Berdasarkan Target RKAP) :</b> <br>
                        <?php
                        $no = 1;
                        foreach ($isu3 as $dt) {
                        ?>
                            &emsp;-&emsp;<?php echo $dt->issue ?><br>
                        <?php } ?>
                    </div>
                </div>
                <div class="card-body">
                    <h5 style="color: black">Progres Gabungan</h5>
                    <div class="row">

                        <div class="col-md-3">
                            <a href="#" data-toggle="modal" data-target="#progres_konstruksi_tahap">
                                <div class="box bg-warning text-center">
                                    <h4 class="font-light text-white"><b>Progres Konstruksi</b></h4><br>
                                    <h3 class="text-white mb-3"><?php echo number_format($prog_fisik, 2, ',', '.') ?>%</h3>

                                    <!-- <h4 class="text-white">Rp. 2.345.899.000</h4> -->
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="#" data-toggle="modal" data-target="#progres_lahan_tahap">
                                <div class="box bg-info text-center">
                                    <h4 class="font-light text-white"><b>Progres Pembebasan Lahan</b></h4><br>
                                    <h3 class="text-white mb-3"><?php echo number_format($prog_lahan, 2, ',', '.') ?>%</h3>
                                    <!-- <h4 class="text-white">Rp. 1.645.769.000</h4> -->
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="#" data-toggle="modal" data-target="#progres_rta_tahap">
                                <div class="box bg-success text-center">
                                    <h4 class="font-light text-white"><b>Progres RTA</b></h4><br>
                                    <!-- <h3 class="text-white mb-3"><?php echo number_format($prog_rta, 2, ',', '.') ?>%</h3> -->
                                    <h3 class="text-white mb-3">86.2%</h3>
                                    <!-- <h4 class="text-white">Rp. 745.899.000</h4> -->
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="#" data-toggle="modal" data-target="#progres_nilai_tahap">
                                <div class="box bg-danger text-center">
                                    <h4 class="font-light text-white"><b>Nilai Progres Proyek</b></h4><br>
                                    <h4 class="text-white mb-4">Rp 8.345.735.656.202</h4>
                                    <!-- <h4 class="text-white">Rp. 745.899.000</h4> -->
                                </div>
                            </a>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div id="bar_progres" style="height: 500px;"></div>
                            <!-- <br><p align="center" style="color: red"><b>Total Kekurangan : 21 Dokumen</b></p> -->
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- <div id="bar_nilai" style="height: 400px;"></div> -->
                            <!-- <br><p align="center" style="color: red"><b>Total Kekurangan : 21 Dokumen</b></p> -->
                            <h5 style="color: black"> Nilai Progres Jalan Tol Solo - Yogya - NYIA Kulonprogo</h5><br>
                            <div class="row">
                                <?php foreach ($data_seksi as $ds) { ?>
                                    <div class="col-md-4">
                                        <div id="progres_nilaii<?php echo $ds->id_seksi ?>" style="height: 250px;"></div>
                                    </div>
                                <?php } ?>
                            </div>

                        </div>

                    </div>
                    <br>
                    <p class="text-info mt-3"><i> Last updated : TW I 2025/Maret 2025</i></p>
                </div>
            </div>
        </div>
    </div>
</div>