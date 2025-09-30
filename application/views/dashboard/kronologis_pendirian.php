<div class="card">
    <div class="row">
        <div class="col-md-12 border-right p-r-0">
            <div class="card-body border-bottom d-flex align-items-center">
                <h4 class="card-title font-weight-bold m-t-10 mr-2">2. Kronologis Pendirian PT Jasamarga Jogja Solo</h4>
                <span class="mdi mdi-alert-circle blink cursor-pointer <?= (!$isu2) ? 'd-none' : '' ?>" style="color:red;" onclick="view_alert(`<b>PERMASALAHAN :</b><br>
                    <?= (!$isu2 ? '' : $isu2->issue) ?> <hr> <b>REKOMENDASI :</b><br> <?= (!$isu2 ? '' : $isu2->issue) ?>`)"></span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="hori-timeline" dir="ltr">
                            <ul class="list-inline events">
                                <li class="list-inline-item event-list">
                                    <div class="px-4">
                                        <h5 class="font-size-16 text-primary font-weight-bold">
                                            <span style="font-size: 25px;">1.</span><br>Pra Perencanaan KPBU
                                        </h5>
                                        <p class="text-info"> 26 Juni 2016 - <br>16 Maret 2018<br></p>
                                        <div>
                                            <button class="btn btn-primary btn-sm btn-step" data-step="1">View Detail</button>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-inline-item event-list">
                                    <div class="px-4">
                                        <h5 class="font-size-16 text-primary font-weight-bold">
                                            <span style="font-size: 25px;">2.</span><br>Perencanaan KPBU
                                        </h5>
                                        <p class="text-info"> 4 Mei 2018 - <br>18 Oktober 2018<br></p>
                                        <div>
                                            <button class="btn btn-warning btn-sm btn-step" data-step="2">View Detail</button>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-inline-item event-list">
                                    <div class="px-4">
                                        <h5 class="font-size-16 text-primary font-weight-bold">
                                            <span style="font-size: 25px;">3.</span><br>Pembentukan BUJT
                                        </h5>
                                        <p class="text-info">
                                            6 September 2019 - <br>20 Agustus 2024<br>
                                        </p>
                                        <div>
                                            <button class="btn btn-danger btn-sm btn-step" data-step="3">View Detail</button>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-inline-item event-list ">
                                    <div class="px-4">
                                        <h5 class="font-size-16 text-primary font-weight-bold">
                                            <span style="font-size: 25px;">4.</span><br>Pelaksanaan PPJT
                                        </h5>
                                        <p class="text-info"> 23 Agustus 2019 - <br> 15 November 2024<br> </p>
                                        <div>
                                            <button class="btn btn-success btn-sm btn-step" data-step="4">View Detail</button>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-inline-item event-list">
                                    <div class="px-4">
                                        <h5 class="font-size-16 text-info">
                                            <b>
                                                <font style="font-size: 25px">5.</font><br>Tahap Operasional
                                            </b>
                                        </h5>
                                        <p class="text-primary"> &emsp; - <br><br> </p>
                                        <div>
                                            <button class="btn btn-info btn-sm btn-step" data-step="5">View Detail</button>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <br>
                <p class="text-info"><i>Last updated : <?= $update_bulan_juli ?></i></p>
            </div>
        </div>
    </div>
</div>

<!-- Card Modal Pra Perencanaan KPBU -->
<div class="card" id="div-pra_perencanaan" style="display: none;">
    <div class="row">
        <div class="col-md-12 border-right p-r-0">
            <div class="card-body border-bottom">
                <h4 class="card-title m-t-10 text-primary"><b>Tahap I (Pra Perencanaan KPBU)</b></h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                                <?php $no = 1;
                                foreach ($row as $dt) { ?>
                                    <div class="timeline-step">
                                        <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="Pra Perencanaan KPBU">
                                            <div class="inner-circle"></div>
                                            <p class="h7 mt-1 mb-1 text-primary" style="font-size: 15px"><b><?= $no++ ?>.</b></p>
                                            <p class="h7 mt-2 mb-1" style="font-size: 11px"><b><?= date('d-m-Y', strtotime($dt->tanggal)); ?></b></p>
                                            <p class="h6 text-primary mb-0 mb-lg-0" style="font-size: 13px">
                                                <?php if ($dt->file != "") { ?>
                                                    <a href="<?= base_url("file_uploads/dokumen/kronologis/$dt->file") ?>" target="_blank"><?= $dt->jenis_dokumen ?></a>
                                                <?php } else { ?>
                                                    <span><?= $dt->jenis_dokumen ?></span>
                                                <?php } ?>
                                            </p>
                                        </div>
                                    </div>

                                <?php } ?>

                                <div class="timeline-step">
                                    <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="Persiapan">
                                        <div class="inner-circle"></div>
                                        <p class="h7 mt-1 mb-1 text-primary" style="font-size: 15px"><b>7.</b></p>
                                        <p class="h7 mt-3 mb-1" style="font-size: 11px"><b>16-03-2018</b></p>
                                        <p class="h6 text-primary mb-0 mb-lg-0" style="font-size: 13px; text-align:left">

                                            <?php
                                            $sql = $this->db->query("select * from tb_kronologis where id_tahapan=1 and tanggal='2018-03-16'  order by tanggal ASC")->result();
                                            $no = 1;
                                            foreach ($sql as $dt) { ?>
                                                <?php if ($dt->file != "") { ?>
                                                    <a href="<?= base_url("file_uploads/dokumen/kronologis/$dt->file") ?>" target="_blank"><?= $no++ ?>. <?= $dt->jenis_dokumen ?></a><br><br>
                                                <?php } else { ?>
                                                    <span><?= $dt->jenis_dokumen ?></span><br><br>
                                                <?php } ?>
                                            <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>

<!-- Card Modal Perencanaan KPBU -->
<div class="card" id="div-perencanaan" style="display: none;">
    <div class="row">
        <div class="col-md-12 border-right p-r-0">
            <div class="card-body border-bottom">
                <h4 class="card-title m-t-10" style="color:#fca311"><b>Tahap II (Perencanaan KPBU)</b></h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                                <?php
                                $sql = $this->db->query("select * from tb_kronologis where id_kronologis in(17,18)  order by tanggal ASC")->result();
                                $no = 1;
                                foreach ($sql as $dt) { ?>
                                    <div class="timeline-step">
                                        <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="Perencanaan KPBU" style="">
                                            <div class="inner-circle2"></div>
                                            <p class="h7 mt-1 text-warning" style="font-size: 14px;"><b><?= $no++ ?>.</b></p>
                                            <p class="h7 mt-1 mb-1" style="font-size: 11px"><b><?php echo date('d-m-Y', strtotime($dt->tanggal)); ?></b></p>
                                            <p class="h6 mb-0 mb-lg-0" style="font-size: 13px; color:#6f1d1b">
                                                <?php if ($dt->file != "") { ?>
                                                    <a href="<?= base_url("file_uploads/dokumen/kronologis/$dt->file") ?>" target="_blank"><?= $dt->jenis_dokumen ?></a>
                                                <?php } else { ?>
                                                    <span><?= $dt->jenis_dokumen ?></span>
                                                <?php } ?>
                                            </p>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="timeline-step">
                                    <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="Persiapan">
                                        <div class="inner-circle2"></div>
                                        <p class="h7 mt-1 text-warning" style="font-size: 14px;"><b>3.</b></p>
                                        <p class="h7 mt-1 mb-1" style="font-size: 11px"><b>24-08-2018</b></p>
                                        <p class="h6 text-primary mb-0 mb-lg-0" style="font-size: 13px; text-align:left">
                                            <?php
                                            $sql = $this->db->query("select * from tb_kronologis where id_tahapan=2 and tanggal='2018-08-24'  order by tanggal ASC")->result();
                                            $no = 1;
                                            foreach ($sql as $dt) { ?>
                                                <?php if ($dt->file != "") { ?>
                                                    <a href="<?= base_url("file_uploads/dokumen/kronologis/$dt->file") ?>" target="_blank"><?= $no++ ?>. <?= $dt->jenis_dokumen ?></a><br><br>
                                                <?php } else { ?>
                                                    <span><?= $dt->jenis_dokumen ?></span>
                                                <?php } ?>
                                            <?php } ?>
                                    </div>
                                </div>
                                <?php
                                $sql = $this->db->query("select * from tb_kronologis where id_kronologis in(22,23,32)  order by tanggal ASC")->result();
                                $no = 4;
                                foreach ($sql as $dt) { ?>
                                    <div class="timeline-step">
                                        <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="Perencanaan KPBU" style="">
                                            <div class="inner-circle2"></div>
                                            <p class="h7 mt-1 text-warning" style="font-size: 14px;"><b><?= $no++ ?>.</b></p>
                                            <p class="h7 mt-3 mb-1" style="font-size: 11px"><b><?= date('d-m-Y', strtotime($dt->tanggal)); ?></b></p>
                                            <p class="h6 mb-0 mb-lg-0" style="font-size: 13px; color:#6f1d1b">
                                                <?php if ($dt->file != "") { ?>
                                                    <a href="<?= base_url("file_uploads/dokumen/kronologis/$dt->file") ?>" target="_blank"><?= $dt->jenis_dokumen ?></a>
                                                <?php } else { ?>
                                                    <span><?= $dt->jenis_dokumen ?></span>
                                                <?php } ?>
                                            </p>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>

<!-- Card Modal Pembentukan BUJT -->
<div class="card" id="div-penyiapan" style="display: none;">
    <div class="row">
        <div class="col-md-12 border-right p-r-0">
            <div class="card-body border-bottom">
                <h4 class="card-title m-t-10 text-danger"><b>Tahap III (Pembentukan BUJT)</b></h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">
                            <h5>I. Pengadaan BUJT</h5>
                            <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">

                                <?php $no = 1;
                                foreach ($row31 as $dt) { ?>

                                    <div class="timeline-step">
                                        <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="Penyiapan KPBU" style="">
                                            <div class="inner-circle3"></div>
                                            <p class="h7 mt-1 text-danger" style="font-size: 14px;"><b><?php echo $no++ ?>.</b></p>
                                            <p class="h7 mt-1 mb-1" style="font-size: 11px"><b><?php echo date('d-m-Y', strtotime($dt->tanggal)); ?></b></p>
                                            <p class="h6 mb-0 mb-lg-0" style="font-size: 13px; color:#6f1d1b">
                                                <?php if ($dt->file != "") { ?>
                                                    <a href="<?= base_url("file_uploads/dokumen/kronologis/$dt->file") ?>" target="_blank"><?= $dt->jenis_dokumen ?></a>
                                                <?php } else { ?>
                                                    <span><?= $dt->jenis_dokumen ?></span>
                                                <?php } ?>
                                            </p>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>

<!-- Card Modal Pelaksanaan PPJT -->
<div class="card" id="div-pelaksanaan" style="display: none;">
    <div class="row">
        <div class="col-md-12 border-right p-r-0">
            <div class="card-body border-bottom">
                <h4 class="card-title m-t-10 text-success"><b>Tahap IV (Pelaksanaan PPJT)</b></h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">
                            <h5>I. Penyusunan Desain</h5>
                            <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">

                                <?php $no = 1;
                                foreach ($row41 as $dt) { ?>

                                    <div class="timeline-step">
                                        <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="Penyiapan KPBU" style="">
                                            <div class="inner-circle4"></div>
                                            <p class="h7 mt-1 text-success" style="font-size: 14px;"><b><?php echo $no++ ?>.</b></p>
                                            <p class="h7 mt-1 mb-1" style="font-size: 11px"><b><?php echo date('d-m-Y', strtotime($dt->tanggal)); ?></b></p>
                                            <p class="h6 mb-0 mb-lg-0" style="font-size: 13px; color:#6f1d1b">
                                                <?php if ($dt->file != "") { ?>
                                                    <a href="<?= base_url("file_uploads/dokumen/kronologis/$dt->file") ?>" target="_blank"><?= $dt->jenis_dokumen ?></a>
                                                <?php } else { ?>
                                                    <span><?= $dt->jenis_dokumen ?></span>
                                                <?php } ?>
                                            </p>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="card ">
                            <h5>II. Pembebasan Lahan</h5>
                            <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">

                                <?php $no = 1;
                                foreach ($row42 as $dt) { ?>

                                    <div class="timeline-step">
                                        <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="Penyiapan KPBU" style="">
                                            <div class="inner-circle4"></div>
                                            <p class="h7 mt-1 text-success" style="font-size: 14px;"><b><?php echo $no++ ?>.</b></p>
                                            <p class="h7 mt-1 mb-1" style="font-size: 11px"><b><?php echo date('d-m-Y', strtotime($dt->tanggal)); ?></b></p>
                                            <p class="h6 mb-0 mb-lg-0" style="font-size: 13px; color:#6f1d1b">
                                                <?php if ($dt->file != "") { ?>
                                                    <a href="<?= base_url("file_uploads/dokumen/kronologis/$dt->file") ?>" target="_blank"><?= $dt->jenis_dokumen ?></a>
                                                <?php } else { ?>
                                                    <span><?= $dt->jenis_dokumen ?></span>
                                                <?php } ?>
                                            </p>
                                        </div>
                                    </div>

                                <?php } ?>

                            </div>
                        </div>
                        <div class="card ">
                            <h5>III. Pelaksanaan Pembangunan</h5>
                            <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">

                                <?php $no = 1;
                                foreach ($row43 as $dt) { ?>

                                    <div class="timeline-step">
                                        <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="Pelaksanaan PPJT" style="">
                                            <div class="inner-circle4"></div>
                                            <p class="h7 mt-1 text-success" style="font-size: 14px;"><b><?php echo $no++ ?>.</b></p>
                                            <p class="h7 mt-1 mb-1" style="font-size: 11px"><b><?php echo date('d-m-Y', strtotime($dt->tanggal)); ?></b></p>
                                            <p class="h6 mb-0 mb-lg-0" style="font-size: 13px; color:#6f1d1b">
                                                <?php if ($dt->file != "") { ?>
                                                    <a href="<?= base_url("file_uploads/dokumen/kronologis/$dt->file") ?>" target="_blank"><?= $dt->jenis_dokumen ?></a>
                                                <?php } else { ?>
                                                    <span><?= $dt->jenis_dokumen ?></span>
                                                <?php } ?>
                                            </p>
                                        </div>
                                    </div>

                                <?php } ?>

                            </div>
                        </div>

                        <div class="card ">
                            <h5>IV. Perolehan Pembiayaan Tambahan</h5>
                            <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">

                                <?php $no = 1;
                                foreach ($row44 as $dt) { ?>

                                    <div class="timeline-step">
                                        <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="Pelaksanaan PPJT" style="">
                                            <div class="inner-circle4"></div>
                                            <p class="h7 mt-1 text-success" style="font-size: 14px;"><b><?php echo $no++ ?>.</b></p>
                                            <p class="h7 mt-1 mb-1" style="font-size: 11px"><b><?php echo date('d-m-Y', strtotime($dt->tanggal)); ?></b></p>
                                            <p class="h6 mb-0 mb-lg-0" style="font-size: 13px; color:#6f1d1b">
                                                <?php if ($dt->file != "") { ?>
                                                    <a href="<?= base_url("file_uploads/dokumen/kronologis/$dt->file") ?>" target="_blank"><?= $dt->jenis_dokumen ?></a>
                                                <?php } else { ?>
                                                    <span><?= $dt->jenis_dokumen ?></span>
                                                <?php } ?>
                                            </p>
                                        </div>
                                    </div>

                                <?php } ?>

                            </div>
                        </div>

                        <div class="card ">
                            <h5>V. Perubahan Anggaran Dasar</h5>
                            <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">

                                <?php $no = 1;
                                foreach ($row45 as $dt) { ?>

                                    <div class="timeline-step">
                                        <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="Pelaksanaan PPJT" style="">
                                            <div class="inner-circle4"></div>
                                            <p class="h7 mt-1 text-success" style="font-size: 14px;"><b><?php echo $no++ ?>.</b></p>
                                            <p class="h7 mt-1 mb-1" style="font-size: 11px"><b><?php echo date('d-m-Y', strtotime($dt->tanggal)); ?></b></p>
                                            <p class="h6 mb-0 mb-lg-0" style="font-size: 13px; color:#6f1d1b">
                                                <?php if ($dt->file != "") { ?>
                                                    <a href="<?= base_url("file_uploads/dokumen/kronologis/$dt->file") ?>" target="_blank"><?= $dt->jenis_dokumen ?></a>
                                                <?php } else { ?>
                                                    <span><?= $dt->jenis_dokumen ?></span>
                                                <?php } ?>
                                            </p>
                                        </div>
                                    </div>

                                <?php } ?>

                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>

<!-- Card Modal Tahap Operasional -->
<div class="card" id="div-pengembalian" style="display: none;">
    <div class="row">
        <div class="col-md-12 border-right p-r-0">
            <div class="card-body border-bottom">
                <h4 class="card-title m-t-10 text-info"><b>Tahap V (Operasional)</b></h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                                <?php $no = 1;
                                foreach ($row5 as $dt) { ?>
                                    <div class="timeline-step">
                                        <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="Pelaksanaan PPJT" style="">
                                            <div class="inner-circle5"></div>
                                            <p class="h7 mt-1 text-info" style="font-size: 14px;"><b><?= $no++ ?>.</b></p>
                                            <p class="h7 mt-1 mb-1" style="font-size: 11px"><b><?= date('d-m-Y', strtotime($dt->tanggal)); ?></b></p>
                                            <p class="h6 mb-0 mb-lg-0" style="font-size: 13px; color:#6f1d1b">
                                                <?php if ($dt->file != "") { ?>
                                                    <a href="<?= base_url("file_uploads/dokumen/kronologis/$dt->file") ?>" target="_blank"><?= $dt->jenis_dokumen ?></a>
                                                <?php } else { ?>
                                                    <span><?= $dt->jenis_dokumen ?></span>
                                                <?php } ?>
                                            </p>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>