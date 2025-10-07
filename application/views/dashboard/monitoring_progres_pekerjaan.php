<div class="card">
    <div class="row">
        <div class="col-md-12 border-right p-r-0">
            <div class="card-body border-bottom d-flex align-items-center">
                <h4 class="card-title font-weight-bold m-t-10 mr-2">3. Monitoring Progres Pekerjaan</h4>
                <span class="mdi mdi-alert-circle blink cursor-pointer <?= (!$isu3) ? 'd-none' : '' ?>" style="color:red;" onclick="view_alert(`<b>PERMASALAHAN :</b><br>
                            <?= $isu3->issue ?>
                            <hr>
                            <b>REKOMENDASI :</b><br>
                            <?= $isu3->rekomendasi ?>`)">
                </span>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="text-center text-dark">
                            <h3>Jadwal Pekerjaan Pembanguan Jalan Tol Ruas Solo - Yogyakarta - NYIA Kulon Progo</h3>
                            <h3>Tahap 1 RKAP 2025</h3>
                        </div>
                        <div class="">
                            <img src="<?php echo base_url('assets/jadwal-konstruksi.png') ?>" alt="Jadwal" class="card-img">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row mt-2">
                            <div class="col-12 col-md-6 col-lg-4">
                                <p class="font-weight-bold mb-1">Berdasarkan RKAP 2025</p>
                                <div class="d-flex align-items-center">
                                    <div style="width: 40px;height: 20px; background-color: #fe0000;" class="mr-2 mb-1"></div>
                                    <span>Tahap Pengadaan Lahan</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div style="width: 40px;height: 20px; background-color: #ffff00;" class="mr-2 mb-1"></div>
                                    <span>Tahap Konstruksi</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div style="width: 40px;height: 20px; background-color: #00af50;" class="mr-2 mb-1"></div>
                                    <span>Tahap Operasi</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <p class="font-weight-bold mb-1">Berdasarkan Prognosa</p>
                                <div class="d-flex align-items-center">
                                    <div style="width: 40px;height: 20px; background-color: #c55911;" class="mr-2 mb-1"></div>
                                    <span>Tahap Pengadaan Lahan</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div style="width: 40px;height: 20px; background-color: #ffc000;" class="mr-2 mb-1"></div>
                                    <span>Tahap Konstruksi</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div style="width: 40px;height: 20px; background-color: #0071c0;" class="mr-2 mb-1"></div>
                                    <span>Tahap Operasi</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div style="width: 40px;height: 20px; background-color: #718d5c;" class="mr-2 mb-1"></div>
                                    <span>Operasi dan Konstruksi</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <h5 class="d-none " style="color: black">Progres Gabungan</h5>
                <div class="d-none row">
                    <div class="col-md-4">
                        <a href="#" data-toggle="modal" data-target="#progres_konstruksi_tahap">
                            <div class="box bg-warning text-center">
                                <h4 class="font-light text-white"><b>Progres Konstruksi</b></h4><br>
                                <h3 class="text-white mb-3"><?php echo number_format($prog_fisik, 2, ',', '.') ?>%</h3>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="#" data-toggle="modal" data-target="#progres_lahan_tahap">
                            <div class="box bg-info text-center">
                                <h4 class="font-light text-white"><b>Progres Pembebasan Lahan</b></h4><br>
                                <h3 class="text-white mb-3"><?= number_format($prog_lahan, 2, ',', '.') ?>%</h3>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="#" data-toggle="modal" data-target="#progres_rta_tahap">
                            <div class="box bg-success text-center">
                                <h4 class="font-light text-white"><b>Progres RTA</b></h4><br>
                                <h3 class="text-white mb-3"><?= number_format($prog_rta, 2, ',', '.') ?>%</h3>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 d-none">
                        <a href="#" data-toggle="modal" data-target="#progres_nilai_tahap">
                            <div class="box bg-danger text-center">
                                <h4 class="font-light text-white"><b>Nilai Progres Proyek</b></h4><br>
                                <h4 class="text-white mb-4">Rp 8.345.735.656.202</h4>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-4">
                        <div id="bar_progres_tahap1" style="height: 500px;"></div>
                        <div class="alert alert-secondary">
                            <p class="text-center mb-0 font-16 font-weight-bold">
                                Kontrak + PPn : Rp. 11.712.099.439.720
                            </p>
                            <p class="text-center mb-0 font-16 font-weight-bold">
                                Telah Terbayar : Rp. 7.698.018.511.881
                            </p>
                            <p class="text-center mb-0 font-16 font-weight-bold">
                                Belum Terbayar : Rp. 4.014.080.927.839
                            </p>
                        </div>
                    </div>
                    <div class="col-4">
                        <div id="bar_progres_tahap2" style="height: 500px;"></div>
                        <div class="alert alert-secondary">
                            <p class="text-center mb-0 font-16 font-weight-bold">
                                Kontrak + PPn : Rp. 0
                            </p>
                            <p class="text-center mb-0 font-16 font-weight-bold">
                                Telah Terbayar : Rp. 0
                            </p>
                            <p class="text-center mb-0 font-16 font-weight-bold">
                                Belum Terbayar : Rp. 0
                            </p>
                        </div>
                    </div>
                    <div class="col-4">
                        <div id="bar_progres_tahap3" style="height: 500px;"></div>
                        <div class="alert alert-secondary">
                            <p class="text-center mb-0 font-16 font-weight-bold">
                                Kontrak + PPn : Rp. 0
                            </p>
                            <p class="text-center mb-0 font-16 font-weight-bold">
                                Telah Terbayar : Rp. 0
                            </p>
                            <p class="text-center mb-0 font-16 font-weight-bold">
                                Belum Terbayar : Rp. 0
                            </p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div id="donutTahap1"></div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div id="donutTahap2"></div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div id="donutTahap3"></div>
                    </div>
                </div>
                <br>
                <p class="text-info mt-3"><i> Last updated : <?= $last_update ?></i></p>
            </div>
        </div>
    </div>
</div>