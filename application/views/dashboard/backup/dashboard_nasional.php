<?php
// Array nama bulan Bahasa Indonesia
$bulan = [
    'January' => 'Januari',
    'February' => 'Februari',
    'March' => 'Maret',
    'April' => 'April',
    'May' => 'Mei',
    'June' => 'Juni',
    'July' => 'Juli',
    'August' => 'Agustus',
    'September' => 'September',
    'October' => 'Oktober',
    'November' => 'November',
    'December' => 'Desember'
];

// Ambil informasi waktu sekarang
$bulanInggris = date('F');         // Misalnya: "May"
$tahun = date('Y');                // Misalnya: "2025"
$bulanAngka = (int)date('n');      // Misalnya: 5
$bulanIndo = $bulan[$bulanInggris];

// Tentukan Triwulan
if ($bulanAngka >= 1 && $bulanAngka <= 3) {
    $triwulan = 'TW I';
} elseif ($bulanAngka >= 4 && $bulanAngka <= 6) {
    $triwulan = 'TW II';
} elseif ($bulanAngka >= 7 && $bulanAngka <= 9) {
    $triwulan = 'TW III';
} else {
    $triwulan = 'TW IV';
}

// Format-format yang akan ditampilkan
// $format_tw = "$triwulan $tahun / $bulanIndo $tahun";
$format_tw = "April $tahun";
$format_bulan_tahun = "April $tahun";
$format_bulan_saja = "April $tahun";
$update_bulan_juni = "Juni $tahun";
$update_bulan_juli = "Juli $tahun";
?>

<!DOCTYPE html>
<html>

<head>
    <!-- CSS Lokal -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/new-style.css'); ?>">
    <!-- jQuery -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <!-- Leaflet CSS & JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>

    <!-- Opsional: Leaflet Search (disabled) -->
    <!-- 
        <link href="<?php echo base_url('assets/gis/leaflet-search.css'); ?>" rel="stylesheet">
        <script src="<?php echo base_url('assets/gis/leaflet-search.js'); ?>"></script> 
        -->

    <!-- RBush & Labelgun untuk pengindeksan spasial dan manajemen label -->
    <script src="https://unpkg.com/rbush@2.0.2/rbush.min.js"></script>
    <script src="https://unpkg.com/labelgun@6.1.0/lib/labelgun.min.js"></script>

</head>

<body>

    <div class="container-fluid">

        <!-- ===================================================
            =================== KUMPULAN CARD ======================
            =====================================================-->

        <!-- Card Trase Jalan Tol -->
        <div class="card">
            <div class="">
                <div class="row">
                    <div class="col-md-12 border-right p-r-0">
                        <div class="card-body border-bottom d-flex align-items-center">
                            <h4 class="card-title font-weight-bold m-t-10 mr-2">1. Trase Jalan Tol</h4>
                            <span class="mdi mdi-alert-circle blink cursor-pointer <?= (!$isu1) ? 'd-none' : '' ?>" style="color:red;" onclick="view_alert(`<b>PERMASALAHAN :</b><br>
                            <?= (!$isu1 ? '' : $isu1->issue) ?> <hr> <b>REKOMENDASI :</b><br> <?= (!$isu1 ? '' : $isu1->issue) ?>`)"></span>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card ">
                                        <div id="map" style="width: 100%; margin: 3px; height: 530px;"></div>
                                    </div>
                                </div>
                            </div>
                            <h5 class="text-info" style="text-align: center;"><a href="<?= base_url('assets/Trase2.jpg') ?>" target="_blank"><u>View Detail Trase</u></a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Kronologis Pendirian PT Jasamarga Jogja Solo -->
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
                        <p class="text-info"><i>Last updated : <?= $update_bulan_juni ?></i></p>
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

        <!-- Card Monitoring Progres Pekerjaan -->
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
                        <p class="text-info mt-3"><i> Last updated : <?= $update_bulan_juli ?></i></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Monitoring Volume Lalu Lintas dan Pendapatan Tol -->
        <div class="card">
            <div class="row">
                <div class="col-md-12 border-right p-r-0">
                    <div class="card-body border-bottom d-flex align-items-center">
                        <h4 class="card-title font-weight-bold m-t-10 mr-2">4. Monitoring Volume Lalu Lintas dan Pendapatan Tol</h4><span class="mdi mdi-alert-circle blink cursor-pointer <?= (!$isu4) ? 'd-none' : '' ?>" style="color:red;" onclick="view_alert(`<b>PERMASALAHAN :</b><br>
                            <?= (!$isu4 ? '' : $isu4->issue) ?>
                            <hr>
                            <b>REKOMENDASI :</b><br>
                            <?= (!$isu4 ? '' : $isu4->issue) ?>`)"></span>
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
                        <p class="text-info mt-3"><i>Last updated : <?= $update_bulan_juli ?> </i></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Monitoring RKAP -->
        <div class="card">
            <div class="row">
                <div class="col-md-12 border-right p-r-0">
                    <div class="card-body border-bottom d-flex align-items-center">
                        <h4 class="card-title font-weight-bold m-t-10 mr-2">5. Monitoring RKAP</h4>
                        <span class="mdi mdi-alert-circle blink cursor-pointer <?= (!$isu5) ? 'd-none' : '' ?>" style="color:red;" onclick="view_alert(`<b>PERMASALAHAN :</b><br>
                            <?= (!$isu5 ? '' : $isu5->issue) ?>
                            <hr>
                            <b>REKOMENDASI :</b><br>
                            <?= (!$isu5 ? '' : $isu5->issue) ?>`)">
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div id="bar_opex" style="height: 500px;"></div>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="alert alert-primary">
                                            <p class="text-center mb-0 text-primary font-16 font-weight-bold">
                                                Total Rencana : Rp. <?= number_format($tot_opex_rencana, 0, ',', '.') ?>
                                            </p>
                                            <p class="text-center mb-0 text-primary font-16 font-weight-bold">
                                                Total Realisasi : Rp. <?= number_format($tot_opex_realisasi, 0, ',', '.') ?>
                                            </p>
                                            <p class="text-center mb-0 text-danger font-16 font-weight-bold">
                                                Total Deviasi : Rp. <?= number_format($tot_opex_rencana - $tot_opex_realisasi, 0, ',', '.') ?>
                                                <span>(<?= number_format(($tot_opex_rencana - $tot_opex_realisasi) / $tot_opex_realisasi * 100, 2, ',', '.') ?>%)</span>
                                                <i class="fa fa-exclamation-triangle <?= ($tot_opex_rencana - $tot_opex_realisasi >= 5) ? '' : 'd-none' ?>"></i>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div id="bar_capex" style="height: 500px;"></div>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="alert alert-primary">
                                            <p class="text-center mb-0 text-primary font-16 font-weight-bold">
                                                Total Rencana : Rp. <?= number_format($tot_capex_rencana, 0, ',', '.') ?>
                                            </p>
                                            <p class="text-center mb-0 text-primary font-16 font-weight-bold">
                                                Total Realisasi : Rp. <?= number_format($tot_capex_realisasi, 0, ',', '.') ?>
                                            </p>
                                            <p class="text-center mb-0 text-danger font-16 font-weight-bold">
                                                Total Deviasi : Rp. <?= number_format($tot_capex_rencana - $tot_capex_realisasi, 0, ',', '.') ?>
                                                <span>(<?= number_format(($tot_capex_rencana - $tot_capex_realisasi) / $tot_capex_realisasi * 100, 2, ',', '.') ?>%)</span>
                                                <i class="fa fa-exclamation-triangle <?= ($tot_capex_rencana - $tot_capex_realisasi >= 5) ? '' : 'd-none' ?>"></i>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="col-10">
                                <div class="alert alert-secondary">
                                    <p class="text-center mb-0 font-16 font-weight-bold">
                                        Total Rencana Opex + Capex: Rp. <?= number_format($tot_opex_rencana + $tot_capex_rencana, 0, ',', '.') ?>
                                    </p>
                                    <p class="text-center mb-0 font-16 font-weight-bold">
                                        Total Realisasi Opex + Capex : Rp. <?= number_format($tot_opex_realisasi + $tot_capex_realisasi, 0, ',', '.') ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <p class="text-info mt-3"><i>Last updated : <?= $update_bulan_juli ?></i></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Monitoring Kelayakan Investasi -->
        <div class="card">
            <div class="row">
                <div class="col-md-12 border-right p-r-0">
                    <div class="card-body border-bottom d-flex align-items-center">
                        <h4 class="card-title font-weight-bold m-t-10 mr-2">6. Monitoring Kelayakan Investasi</h4><span class="mdi mdi-alert-circle blink cursor-pointer <?= (!$isu6) ? 'd-none' : '' ?>" style="color:red;" onclick="view_alert(`<b>PERMASALAHAN :</b><br>
                            <?= (!$isu6 ? '' : $isu6->issue) ?>
                            <hr>
                            <b>REKOMENDASI :</b><br>
                            <?= (!$isu6 ? '' : $isu6->issue) ?>`)"></span>
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
                                            <td class="text-center"><span class="badge badge-lg badge-pill badge-info " style="font-size: 12px">11.42%</span></td>
                                        </tr>
                                        <tr>
                                            <td class="font-wight-bold">IRR on Equity </td>
                                            <td class="text-center"><span class="badge badge-lg badge-pill badge-success " style="font-size: 12px">14.14%</span></td>
                                            <td class="text-center"><span class="badge badge-lg badge-pill badge-primary " style="font-size: 12px">14.09%</span></td>
                                            <td class="text-center"><span class="badge badge-lg badge-pill badge-info " style="font-size: 12px">14.12%</span></td>
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
                                            <td class="text-center"><span class="badge badge-lg badge-pill badge-info " style="font-size: 12px">8.00%</span></td>
                                        </tr>
                                        <tr>
                                            <td><b>% Inflasi </b></td>
                                            <td class="text-center"><span class="badge badge-lg badge-pill badge-success " style="font-size: 12px">4.00%</span></td>
                                            <td class="text-center"><span class="badge badge-lg badge-pill badge-primary " style="font-size: 12px">4.00%</span></td>
                                            <td class="text-center"><span class="badge badge-lg badge-pill badge-info " style="font-size: 12px">4.00%</span></td>
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
                        <p class="text-info"><i>Last updated : <?= $update_bulan_juli ?></i></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Monitoring Pembiayaan Tahap I -->
        <div class="card">
            <div class="row">
                <div class="col-md-12 border-right p-r-0">
                    <div class="card-body border-bottom d-flex align-items-center">
                        <h4 class="card-title font-weight-bold m-t-10 mr-2">7. Monitoring Pembiayaan Tahap I</h4>
                        <span class="mdi mdi-alert-circle blink cursor-pointer <?= (!$isu7) ? 'd-none' : '' ?>" style="color:red;" onclick="view_alert(`<b>PERMASALAHAN :</b><br>
                            <?= (!$isu7 ? '' : $isu7->issue) ?>
                            <hr>
                            <b>REKOMENDASI :</b><br>
                            <?= (!$isu7 ? '' : $isu7->issue) ?>`)">
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="card cursor-pointer">
                                    <div class="box bg-success" onclick="modalPembiayaanTahap1()">
                                        <h4 class="font-light text-white text-center"><b>Pembiayaan Tahap 1</b></h4><br>
                                        <h4 class="text-white text-center">Lihat Detail </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="card cursor-pointer">
                                    <div class="box bg-warning" onclick="modalPembiayaanTahap2()">
                                        <h4 class="font-light text-white text-center"><b>Pembiayaan Tahap 2</b></h4><br>
                                        <h4 class="text-white text-center">Lihat Detail </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="card cursor-pointer">
                                    <div class="box bg-danger" onclick="modalPembiayaanTahap3()">
                                        <h4 class="font-light text-white text-center"><b>Pembiayaan Tahap 3</b></h4><br>
                                        <h4 class="text-white text-center">Lihat Detail </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 border-right p-r-0 d-none">
                                <div class="card">
                                    <div class="col-md-12 border-right p-r-0">
                                        <!-- Card -->
                                        <div class="card">
                                            <div class="card-body border-bottom">
                                                <!-- Bagian 2: Hutang -->
                                                <div style="cursor: pointer;">
                                                    <!-- <div style="cursor: pointer;" onclick="view_realisasihutang()"> -->
                                                    <h4 class="text-danger text-center">Hutang Tahap 1 (Debt)</h4>
                                                    <h5 class="text-danger mt-3 mb-3 text-center">Rp 9.893.216.000.000</h5>
                                                    <h4 class="text-danger text-center">(70%)</h4>
                                                </div>
                                                <hr>

                                                <!-- Bagian 3: Ekuitas -->
                                                <div style="cursor: pointer;">
                                                    <!-- <div style="cursor: pointer;" onclick="view_ekuitastahap1()"> -->
                                                    <h4 class="text-success text-center">Ekuitas Tahap 1 (Equity)</h4>
                                                    <h5 class="text-success mt-3 mb-3 text-center">Rp 2.860.537.000.000</h5>
                                                    <h4 class="text-success text-center">(30%)</h4>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 border-right p-r-0 d-none">
                                <div class="card">
                                    <div class="col-md-12 border-right p-r-0">
                                        <div class="card-body border-bottom">
                                            <h4 class="card-title m-t-10"><b>Total Nilai Investasi Tahap 1</b></h4>
                                            <div id="pie_alokasi" style="height: 350px;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="text-info"><i>Last updated : <?= $format_tw ?></i></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Monitoring Pembebasan Lahan -->
        <div class="card">
            <div class="row">
                <div class="col-md-12 border-right p-r-0">
                    <div class="card-body border-bottom d-flex align-items-center">
                        <h4 class="card-title font-weight-bold m-t-10 mr-2">8. Monitoring Dana Talangan Tanah & Pembayaran</h4>
                        <span class="mdi mdi-alert-circle blink cursor-pointer <?= (!$isu8) ? 'd-none' : '' ?>" style="color:red;" onclick="view_alert(`<b>PERMASALAHAN :</b><br>
                            <?= (!$isu8 ? '' : $isu8->issue) ?>
                            <hr>
                            <b>REKOMENDASI :</b><br>
                            <?= (!$isu8 ? '' : $isu8->issue) ?>`)">
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="card">
                            <h5>Alokasi Pendanaan Pengadaaan Tanah <span class="badge badge-lg badge-pill badge-secondary font-weight-bold">Tahun 2025</span></h5>
                            <div class="card-body bg-light">
                                <h4 class="text-center">Total Alokasi Dana</h4>
                                <h2 class="mb-0 text-center text-info">Rp. <?= number_format($alokasi_kumulatif, 2, ',', '.') ?></h2>
                                <div class="mt-2">
                                    <div id="alokasi_pengadaan_tanah"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <h5>Dana Talangan Tanah</h5>
                            <div class="card-body bg-light">
                                <h4 class="text-center">Fasilitas Kredit Dana Talangan Tanah</h4>
                                <h2 class="mb-0 text-center text-info">Rp. <?= number_format($fasilitas_dtt, 2, ',', '.') ?></h2>
                                <div class="mt-2">
                                    <div id="dana_talanangan_tanah"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <h5>Realisasi Dana Talangan Tanah</h5>
                            <div class="card-body bg-light">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <table class="table table-bordered">
                                            <thead class="bg-theme text-white font-weight-bold">
                                                <th colspan="2" class="font-weight-bold">
                                                    APJT : PT Jasamarga Jogja Solo
                                                </th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="font-weight-bold">Pembayaran Tanah Ke Warga</td>
                                                    <td class="text-right"> 150,562,181,272</td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Telah Dikembalikan oleh Pemerintah</td>
                                                    <td class="text-right"> 87,106,921,529 </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" class="font-weight-bold">
                                                        <a href="javascript:void(0)" onclick="toggleDashboard8('.realisasi_dtt_left')" class="text-dark">Outstanding <i class="fa fa-caret-down"></i></a>
                                                    </td>
                                                </tr>
                                                <tr class="realisasi_dtt_left">
                                                    <td class="font-weight-bold indent">Sisa DTT Eligible</td>
                                                    <td class="text-right">82,490,747,870 </td>
                                                </tr>
                                                <tr class="realisasi_dtt_left">
                                                    <td class="font-weight-bold indent">DTT Ineligible</td>
                                                    <td class="text-right">-</td>
                                                </tr>
                                                <tr class="realisasi_dtt_left">
                                                    <td class="font-weight-bold indent">Belum Verifikasi</td>
                                                    <td class="text-right"> 68,071,433,402</td>
                                                </tr>
                                                <tr class="realisasi_dtt_left">
                                                    <td class="font-weight-bold indent">Total</td>
                                                    <td class="text-right"> 63,455,259,743</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <table class="table table-bordered">
                                            <thead class="bg-theme text-white font-weight-bold">
                                                <th colspan="2" class="font-weight-bold">
                                                    APJT : PT Jasamarga Jogja Solo
                                                </th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="font-weight-bold">Bunga Pinjaman</td>
                                                    <td class="text-right"> 11,752,672,241 </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" class="font-weight-bold">
                                                        <a href="javascript:void(0)" onclick="toggleDashboard8('.realisasi_dtt_right')" class="text-dark">Outstanding <i class="fa fa-caret-down"></i></a>
                                                    </td>
                                                </tr>
                                                <tr class="realisasi_dtt_right">
                                                    <td class="font-weight-bold indent">Total</td>
                                                    <td class="text-right">7,070,606,828</td>
                                                </tr>
                                                <tr class="realisasi_dtt_right">
                                                    <td class="font-weight-bold indent">Telah Direkonsiliasi</td>
                                                    <td class="text-right">1,182,011,927 </td>
                                                </tr>
                                                <tr class="realisasi_dtt_right">
                                                    <td class="font-weight-bold indent">Telah Dikembalikan</td>
                                                    <td class="text-right">752,141,034 </td>
                                                </tr>
                                                <tr class="realisasi_dtt_right">
                                                    <td class="font-weight-bold indent">Sisa Terhadap Hasil Rekon</td>
                                                    <td class="text-right">429,870,893 </td>
                                                </tr>
                                                <tr class="realisasi_dtt_right">
                                                    <td class="font-weight-bold indent">Sisa Terhadap Total</td>
                                                    <td class="text-right">6,318,465,794</td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Beban BUJT</td>
                                                    <td class="text-right">4,682,065,413</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <h5>Pembayaran Langsung</h5>
                            <div class="card-body bg-light">
                                <h4 class="text-center">Kebutuhan / Rencana Alokasi Pembayaran Langsung 2025</h4>
                                <h2 class="mb-0 text-center text-info">Rp. <?= number_format($pembayaran_langsung, 2, ',', '.') ?></h2>
                                <div class="mt-2">
                                    <div id="chart_pembayaran_langsung"></div>
                                </div>
                            </div>
                        </div>
                        <p class="text-info"><i>Last updated : <?= $update_bulan_juli ?></i></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Manajemen Resiko -->
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

        <!-- Card Kewajiban Kepatuhan JMJ -->
        <div class="card">
            <div class="row">
                <div class="col-md-12 border-right p-r-0">
                    <div class="card-body border-bottom d-flex align-items-center">
                        <h4 class="card-title font-weight-bold m-t-10 mr-2">10. Kewajiban Kepatuhan JMJ</h4><span class="mdi mdi-alert-circle blink cursor-pointer <?= (!$isu10) ? 'd-none' : '' ?>" style="color:red;" onclick="view_alert(`<b>PERMASALAHAN :</b><br>
                            <?= (!$isu10 ? '' : $isu10->issue) ?>
                            <hr>
                            <b>REKOMENDASI :</b><br>
                            <?= (!$isu10 ? '' : $isu10->issue) ?>`)"></span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- <a href="#" > -->
                                        <div class="box bg-info text-center" data-toggle="modal" data-target="#table_kepatuhan" data-judul="OPERASIONAL" data-id="1" data-url="<?= site_url('Manajemen/getDataKewajiban'); ?>">
                                            <h4 class="font-light text-white"><b>Operasional</b></h4><br>
                                            <h3 class="text-white mb-3"><?php echo round(($operasional_ada / $operasional_tot * 100), 2) ?>%</h3>
                                            <span class="badge badge-lg badge-pill badge-success " style="font-size: 12px; background-color: #e2fdff; color: black">Total : <?php echo $operasional_tot ?></span>&emsp; <span class="badge badge-lg badge-pill badge-success " style="font-size: 12px; background-color: #caffbf; color: black">Ada : <?php echo $operasional_ada ?></span>&emsp; <span class="badge badge-lg badge-pill badge-success " style="font-size: 12px; background-color: #f4f1bb; color: black">Tidak Ada : <?php echo $operasional_tdk ?></span>
                                            <!-- <h4 class="text-white">Rp. 2.345.899.000</h4> -->
                                        </div>
                                        <!-- </a> -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="box bg-success text-center" data-toggle="modal" data-target="#table_kepatuhan" data-judul="KORPORASI" data-id="2" data-url="<?= site_url('Manajemen/getDataKewajiban'); ?>">
                                            <h4 class="font-light text-white"><b>Korporasi</b></h4><br>
                                            <h3 class="text-white mb-3"><?php echo round(($korporasi_ada / $korporasi_tot * 100), 2) ?>%</h3>
                                            <span class="badge badge-lg badge-pill badge-success " style="font-size: 12px; background-color: #e2fdff; color: black">Total : <?php echo $korporasi_tot ?></span>&emsp; <span class="badge badge-lg badge-pill badge-success " style="font-size: 12px; background-color: #caffbf; color: black">Ada : <?php echo $korporasi_ada ?></span>&emsp; <span class="badge badge-lg badge-pill badge-success " style="font-size: 12px; background-color: #f4f1bb; color: black">Tidak Ada : <?php echo $korporasi_tdk ?></span>
                                            <!-- <h4 class="text-white">Rp. 2.345.899.000</h4> -->
                                        </div>
                                    </div>
                                </div>
                                <br><br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="box bg-warning text-center" data-toggle="modal" data-target="#table_kepatuhan" data-judul="PERIZINAN" data-id="3" data-url="<?= site_url('Manajemen/getDataKewajiban'); ?>">
                                            <h4 class="font-light text-white"><b>Perizinan</b></h4><br>
                                            <h3 class="text-white mb-3"><?php echo round(($perizinan_ada / $perizinan_tot * 100), 2) ?>%</h3>
                                            <span class="badge badge-lg badge-pill badge-success " style="font-size: 12px; background-color: #e2fdff; color: black">Total : <?php echo $perizinan_tot ?></span>&emsp; <span class="badge badge-lg badge-pill badge-success " style="font-size: 12px; background-color: #caffbf; color: black">Ada : <?php echo $perizinan_ada ?></span>&emsp; <span class="badge badge-lg badge-pill badge-success " style="font-size: 12px; background-color: #f4f1bb; color: black">Tidak Ada : <?php echo $perizinan_tdk ?></span>
                                            <!-- <h4 class="text-white">Rp. 2.345.899.000</h4> -->
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="box bg-danger text-center" data-toggle="modal" data-target="#table_kepatuhan" data-judul="REGULASI INTERNAL" data-id="4" data-url="<?= site_url('Manajemen/getDataKewajiban'); ?>">
                                            <h4 class="font-light text-white"><b>Regulasi Internal</b></h4><br>
                                            <h3 class="text-white mb-3"><?php echo round(($regulasi_ada / $regulasi_tot * 100), 2) ?>%</h3>
                                            <span class="badge badge-lg badge-pill badge-success " style="font-size: 12px; background-color: #e2fdff; color: black">Total : <?php echo $regulasi_tot ?></span>&emsp; <span class="badge badge-lg badge-pill badge-success " style="font-size: 12px; background-color: #caffbf; color: black">Ada : <?php echo $regulasi_ada ?></span>&emsp; <span class="badge badge-lg badge-pill badge-success " style="font-size: 12px; background-color: #f4f1bb; color: black">Tidak Ada : <?php echo $regulasi_tdk ?></span>
                                            <!-- <h4 class="text-white">Rp. 2.345.899.000</h4> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div id="bar_kepatuhan" style="height: 450px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Monitoring Sistem Manajemen Integrasi -->
        <div class="card">
            <div class="row">
                <div class="col-md-12 border-right p-r-0">
                    <div class="card-body border-bottom d-flex align-items-center">
                        <h4 class="card-title font-weight-bold m-t-10 mr-2">11. Monitoring Sistem Manajemen Integrasi</h4><span class="mdi mdi-alert-circle blink cursor-pointer <?= (!$isu11) ? 'd-none' : '' ?>" style="color:red;" onclick="view_alert(`<b>PERMASALAHAN :</b><br>
                            <?= (!$isu11 ? '' : $isu11->issue) ?>
                            <hr>
                            <b>REKOMENDASI :</b><br>
                            <?= (!$isu11 ? '' : $isu11->issue) ?>`)"></span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="comment-widgets scrollable">
                                    <div class="d-flex flex-row comment-row m-t-0">
                                        <div class="p-2"><img src="<?php echo base_url("file_uploads/galeri/9001.PNG") ?>" alt="user" width="50" class="rounded-circle"></div>
                                        <div class="comment-text w-100">
                                            <h6 class="font-medium"><b>ISO 9001:2015 Sistem Manajemen Mutu</b></h6> <span class="badge badge-pill badge-info float-left">Aktif</span><br>
                                            <span class="m-b-5 d-block">No. Sertifikat : QAIC/ID/11127-A</span>
                                            <!-- <span class="m-b-15 d-block">Scope :   Provision of Administration Service, Project Management and Traffic Management Toll Roads</span> -->
                                            <br>
                                        </div>
                                    </div>
                                    <div class="comment-footer" style="text-align:center;">
                                        <!-- <span class="text-muted">29 December 2025</span> <br> -->
                                        <!-- <button type="button" class="btn btn-success btn-sm" onclick='return view_detail_sop9001()'><?php echo $sop_9001 ?> SOP</button> -->
                                        <button type="button" class="btn btn-success btn-sm" onclick='return view_detail_sop9001()'>SOP Terkait</button>
                                        <a href="<?php echo base_url("file_uploads/sertifikat/sertifikat_jmj_9001_2024.pdf") ?>" target="_blank" class="btn btn-cyan btn-sm ">Lihat Sertifikat</a>
                                        <!-- <button type="button" class="btn btn-danger btn-sm">Delete</button> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="comment-widgets scrollable">
                                    <div class="d-flex flex-row comment-row m-t-0">
                                        <div class="p-2"><img src="<?php echo base_url("file_uploads/galeri/14001.PNG") ?>" alt="user" width="50" class="rounded-circle"></div>
                                        <div class="comment-text w-100">
                                            <h6 class="font-medium"><b>ISO 14001:2015 Sistem Manajemen Lingkungan</b></h6> <span class="badge badge-pill badge-info float-left">Aktif</span><br>
                                            <span class="m-b-5 d-block">No. Sertifikat : QAIC/ID/11127-B</span>
                                            <!-- <span class="m-b-15 d-block">Scope :  Provision of Administration Service, Project Management and Traffic Management Toll Roads</span> -->
                                        </div>
                                    </div>
                                    <div class="comment-footer" style="text-align:center;">
                                        <span class="text-muted float-right"></span>
                                        <!-- <button type="button" class="btn btn-success btn-sm"  onclick='return view_detail_sop14001()'><?php echo $sop_14001 ?> SOP</button> -->
                                        <button type="button" class="btn btn-success btn-sm" onclick='return view_detail_sop14001()'> SOP Terkait</button>
                                        <a href="<?php echo base_url("file_uploads/sertifikat/sertifikat_jmj_14001_2024.pdf") ?>" target="_blank" class="btn btn-cyan btn-sm ">Lihat Sertifikat</a>
                                        <!-- <button type="button" class="btn btn-success btn-sm">Publish</button>
                                            <button type="button" class="btn btn-danger btn-sm">Delete</button> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="comment-widgets scrollable">
                                    <div class="d-flex flex-row comment-row m-t-0">
                                        <div class="p-2"><img src="<?php echo base_url("file_uploads/galeri/45001.PNG") ?>" alt="user" width="50" class="rounded-circle"></div>
                                        <div class="comment-text w-100">
                                            <h6 class="font-medium"><b>ISO 45001:2018 Sistem Manajemen K3</b></h6> <span class="badge badge-pill badge-info float-left">Aktif</span><br>
                                            <span class="m-b-5 d-block">No. Sertifikat : QAIC/ID/11127-C </span>
                                            <!-- <span class="m-b-15 d-block">Scope : Provision of Administration Service, Project Management and Traffic Management Toll Roads </span> -->
                                            <br>
                                        </div>
                                    </div>
                                    <div class="comment-footer" style="text-align:center;">
                                        <span class="text-muted float-right"></span>
                                        <!-- <button type="button" class="btn btn-success btn-sm"  onclick='return view_detail_sop45001()'><?php echo $sop_45001 ?> SOP</button> -->
                                        <button type="button" class="btn btn-success btn-sm" onclick='return view_detail_sop45001()'>SOP Terkait</button>
                                        <a href="<?php echo base_url("file_uploads/sertifikat/sertifikat_jmj_45001_2024.pdf") ?>" target="_blank" class="btn btn-cyan btn-sm ">Lihat Sertifikat</a>
                                        <!-- <button type="button" class="btn btn-success btn-sm">Publish</button>
                                            <button type="button" class="btn btn-danger btn-sm">Delete</button> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="comment-widgets scrollable">
                                    <div class="d-flex flex-row comment-row m-t-0">
                                        <div class="p-2"><img src="<?php echo base_url("file_uploads/galeri/37001.PNG") ?>" alt="user" width="50" class="rounded-circle"></div>
                                        <div class="comment-text w-100">
                                            <h6 class="font-medium"><b>ISO 37001:2016 Sistem Manajemen Anti Penyuapan</b></h6> <span class="badge badge-pill badge-info float-left">Aktif</span><br>
                                            <span class="m-b-5 d-block">No. Sertifikat : QAIC/ID/11127-E </span>
                                            <!-- <span class="m-b-15 d-block">Scope :  Provision of Administration Service, Project Management and Traffic Management Toll Roads </span> -->
                                            <br>
                                        </div>
                                    </div>
                                    <div class="comment-footer" style="text-align:center;">
                                        <span class="text-muted float-right"></span>
                                        <!-- <button type="button" class="btn btn-success btn-sm"  onclick='return view_detail_sop37001()' ><?php echo $sop_37001 ?> SOP</button> -->
                                        <button type="button" class="btn btn-success btn-sm" onclick='return view_detail_sop37001()'>SOP Terkait</button>
                                        <a href="<?php echo base_url("file_uploads/sertifikat/sertifikat_jmj_37001_2024.pdf") ?>" target="_blank" class="btn btn-cyan btn-sm ">Lihat Sertifikat</a>
                                        <!-- <button type="button" class="btn btn-success btn-sm">Publish</button>
                                            <button type="button" class="btn btn-danger btn-sm">Delete</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="text-info mt-3"><i>Last updated : <?= $update_bulan_juni ?></i></p>
                        <!-- <h5 class="text-info" style="text-align: center"> -->
                        <p align="center">
                            <a href="<?php echo site_url('Dokumen/sop'); ?>" target="_blank" class="btn btn-info"><u>View Summary SOP</u></a>
                        </p>
                        <!-- </h5> -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Monitoring KPI -->
        <div class="card">
            <div class="row">
                <div class="col-md-12 border-right p-r-0">
                    <div class="card-body border-bottom d-flex align-items-center">
                        <h4 class="card-title font-weight-bold m-t-10 mr-2">12. Monitoring KPI</h4><span class="mdi mdi-alert-circle blink cursor-pointer <?= (!$isu12) ? 'd-none' : '' ?>" style="color:red;" onclick="view_alert(`<b>PERMASALAHAN :</b><br>
                            <?= (!$isu12 ? '' : $isu12->issue) ?>
                            <hr>
                            <b>REKOMENDASI :</b><br>
                            <?= (!$isu12 ? '' : $isu12->issue) ?>`)"></span>
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
                        <p class="text-info"><i>Last updated : <?= $update_bulan_juli ?></i></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Monitoring Kontrak -->
        <div class="card d-none">
            <div class="row">
                <div class="col-md-12 border-right p-r-0">
                    <div class="card-body border-bottom d-flex align-items-center">
                        <h4 class="card-title m-t-10"><b>13. Monitoring Kontrak</b></h4>
                    </div>
                    <div class="card-body d-none">
                        <!-- Column -->
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card card-hover">
                                <div class="card-body border-bottom" style="background-color: #219ebc; ">
                                    <h4 class="card-title m-t-10 text-white">Klasifikasi Jenis Kontrak</h4>
                                </div>
                                <div class="card-body m-t-10 mb-1">
                                    <table class="table-striped table mb-0">
                                        <tbody>
                                            <tr style="background-color: #ade8f4">
                                                <td align="center"><b>Nama Paket</b></td>
                                                <td class="align-center"><b>Jumlah Kontrak</td>
                                                <td align="center"><b>Total Nilai Kontrak</b></td>
                                                <td align="center"><b>Sudah Terbayar</b></td>
                                                <td align="center"><b>Sisa Kontrak</b></td>
                                            </tr>
                                            <tr>
                                                <td><b>Paket 1.1</b></td>
                                                <td class="align-right"></td>
                                                <td align="right"></b></td>
                                                <td align="right"></b></td>
                                                <td align="right"></b></td>
                                            </tr>
                                            <tr>
                                                <td><b>&emsp; -Adhi Karya</b></td>
                                                <td class="align-right"><span class="badge badge-lg badge-pill badge-warning ">1 Kontrak + 9 Addendum</span></td>
                                                <td align="right"><b>Rp. 4,378,674,174,000</b></td>
                                                <td align="right" class="text-success"><b>Rp. 4,246,685,294,880</b></td>
                                                <td align="right" class="text-danger"><b>Rp. 278,843,832,814</b></td>
                                            </tr>
                                            <tr>
                                                <td><b>Paket 1.2</b></td>
                                                <td class="align-right"></td>
                                                <td align="right"></td>
                                                <td align="right"></b></td>
                                                <td align="right"></b></td>
                                            </tr>
                                            <tr>
                                                <td><b>&emsp; -Adhi Karya</b></td>
                                                <td class="align-right"><span class="badge badge-lg badge-pill badge-primary ">1 Kontrak + 6 Addendum</span></td>
                                                <td align="right"><b>Rp. 3,499,917,012,000</b></td>
                                                <td align="right" class="text-success"><b>Rp. 1,788,430,899,774</b></td>
                                                <td align="right" class="text-danger"><b>Rp. 814,928,218,775</b></td>
                                            </tr>
                                            <tr>
                                                <td><b>&emsp; -DMT</b></td>
                                                <td class="align-right"><span class="badge badge-lg badge-pill badge-success ">1 Kontrak + 6 Addendum</span></td>
                                                <td align="right"><b>Rp 3,886,235,558,000</b></td>
                                                <td align="right" class="text-success"><b>Rp. 513,347,866,321</b></td>
                                                <td align="right" class="text-danger"><b>Rp. 41,567,173,412</b></td>
                                            </tr>
                                            <tr>
                                                <td><b>Paket 2.1</b></td>
                                                <td class="align-right"></td>
                                                <td align="right"></b></td>
                                                <td align="right"></b></td>
                                                <td align="right"></b></td>
                                            </tr>
                                            <tr>
                                                <td><b>&emsp; -DMT</b></td>
                                                <td class="align-right"><span class="badge badge-lg badge-pill badge-info ">1 Kontrak + 1 Addendum</span></td>
                                                <td align="right"><b>Rp4,100,742,000,000</b></td>
                                                <td align="right" class="text-success"><b>Rp. 1,632,697,413,830</b></td>
                                                <td align="right" class="text-danger"><b>Rp. 34,749,586,169</b></td>
                                            </tr>
                                            <tr>
                                                <td><b>Paket 2.2</b></td>
                                                <td class="align-right"></td>
                                                <td align="right"></b></td>
                                                <td align="right"></b></td>
                                                <td align="right"></b></td>
                                            </tr>
                                            <tr>
                                                <td><b>&emsp; -Adhi Karya</b></td>
                                                <td class="align-right"><span class="badge badge-lg badge-pill badge-warning ">1 Kontrak + 4 Addendum</span></td>
                                                <td align="right"><b>Rp 4,235,562,829,000</b></td>
                                                <td align="right" class="text-success"><b>Rp. 437,366,913,060</b></td>
                                                <td align="right" class="text-danger"><b>Rp. 221,960,560,327</b></td>
                                            </tr>
                                            <!-- <tr>
                                                    <td><b>Kontrak Lainnya</b></td>
                                                    <td class="align-right"><span class="badge badge-lg badge-pill badge-info "><?php echo $jml_kontrak_lainnya ?> Kontrak</span></td>
                                                    <td align="right"><b>Rp. <?php echo number_format($nilai_kontrak_lainnya, 2, ',', '.') ?></b></td>
                                                </tr>   -->
                                        </tbody>
                                    </table>
                                    <br>
                                    <h5 class="text-info" style="text-align: center"><a href="<?php echo base_url('file_uploads/monitoring_kontrak_paket.pdf') ?>" target="_blank"><u>View Detail</u></a></h5>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                    </div>
                </div>
            </div>
        </div>

        <?php if ($this->session->userdata('level_user') == 1) { ?>

            <!-- Card Monitoring Kelengkapan Dokumen Kontrak Konstruksi Tol -->
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
                                    <p class="text-center text-danger"><b>Total Kekurangan : <?= $sum_konstruksi ?> Dokumen</b></p>
                                </div>
                                <div class="col-md-4">
                                    <div id="pie_proyekKonsTol" style="height: 450px;"></div>
                                    <br>
                                    <p class="text-center text-danger"><b>Total Kekurangan : <?= $sum_proyek_konstruksi ?> Dokumen</b></p>
                                </div>
                                <div class="col-md-4">
                                    <div id="pie_bayarKonsTol" style="height: 450px;"></div>
                                    <br>
                                    <p class="text-center text-danger"><b>Total Kekurangan : <?= $sum_krg_pembayaranKonstruksi ?> Dokumen</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Monitoring Kelengkapan Dokumen Kontrak Konsultan Tol -->
            <div class="card">
                <div class="row">
                    <div class="col-md-12 border-right p-r-0">
                        <div class="card-body border-bottom d-flex align-items-center">
                            <h4 class="card-title font-weight-bold m-t-10 mr-2">14. Monitoring Kelengkapan Dokumen Kontrak Konsultan Tol</h4><span class="mdi mdi-alert-circle blink cursor-pointer <?= (!$isu14) ? 'd-none' : '' ?>" style="color:red;" onclick="view_alert(`<b>PERMASALAHAN :</b><br>
                            <?= (!$isu14 ? '' : $isu14->issue) ?>
                            <hr>
                            <b>REKOMENDASI :</b><br>
                            <?= (!$isu14 ? '' : $isu14->issue) ?>`)"></span>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div id="pie_kontrakKonsultan" style="height: 450px;"></div>
                                    <br>
                                    <p align="center" style="color: red"><b>Total Kekurangan : <?php echo $sum_konsultan ?> Dokumen</b></p>
                                </div>
                                <div class="col-md-6">
                                    <div id="pie_bayarKonsultan" style="height: 450px;"></div>
                                    <br>
                                    <p align="center" style="color: red"><b>Total Kekurangan : <?php echo $sum_krg_pembayaranKonsultan ?> Dokumen</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>

    </div>

    <!-- ===================================================
        =================== KUMPULAN MODAL =====================
        =====================================================-->
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
                    <!-- Tabel 1 -->
                    <h6 class="font-weight-bold" style="color: rgb(21, 81, 128);">Tabel 1: Pembiayaan Tahap 1</h6>
                    <div class="table-responsive mb-4">
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
                    <h6 class="font-weight-bold" style="color: rgb(21, 81, 128);">Tabel 2: Realisasi Pembiayaan Tahap 1</h6>
                    <div class="table-responsive mb-4">
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
                    <h6 class="font-weight-bold" style="color: rgb(21, 81, 128);">Tabel 3: Total Realisasi Pembiayaan Tahap 1 s/d Tahun 2024 </h6>
                    <div class="table-responsive mb-4">
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
                    <h6 class="font-weight-bold" style="color: rgb(21, 81, 128);">Tabel 4: Penarikan Tahap 1 </h6>
                    <div class="table-responsive mb-4">
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
                    <h6 class="font-weight-bold" style="color: rgb(21, 81, 128);">Tabel 5: RKAP Pembiayaan Tahap 1 </h6>
                    <div class="table-responsive mb-4">
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
                    <h4 class="modal-title"><strong>Detail Penyerapan Capex TW I 2025</strong></h4>
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
                    <h4 class="modal-title"><strong>Detail Penyerapan Opex TW I 2025</strong></h4>
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
    <!-- ===================================================
        =================== KODE JAVASCRIPT ====================
        =====================================================-->

    <!-- Library utama Highcharts -->
    <script src="https://code.highcharts.com/highcharts.js"></script>

    <!-- Modul untuk eksport grafik -->
    <script src="https://code.highcharts.com/modules/exporting.js"></script>

    <!-- Modul untuk eksport data -->
    <script src="https://code.highcharts.com/modules/export-data.js"></script>

    <!-- Modul aksesibilitas -->
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <!-- Modul tambahan grafik (bubble, polar, dll) -->
    <script src="https://code.highcharts.com/highcharts-more.js"></script>

    <!-- Modul untuk grafik 3D -->
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>

    <!-- Modul untuk map custom -->
    <script src="<?= base_url('assets/dist/js/map-custom.js'); ?>"></script>

    <!-- Modul untuk dashboard -->
    <script src="<?= base_url('assets/dist/js/dashboard.js'); ?>"></script>
    <script src="<?= base_url('assets/js/chart/dashboard3.js'); ?>"></script>
    <script src="<?= base_url('assets/js/chart/dashboard4.js'); ?>"></script>
    <script src="<?= base_url('assets/js/chart/dashboard5.js'); ?>"></script>
    <script src="<?= base_url('assets/js/chart/dashboard6.js'); ?>"></script>
    <script src="<?= base_url('assets/js/chart/dashboard7.js'); ?>"></script>
    <script src="<?= base_url('assets/js/chart/dashboard8.js'); ?>"></script>
    <script src="<?= base_url('assets/js/chart/dashboard9.js'); ?>"></script>
    <script src="<?= base_url('assets/js/chart/dashboard12.js') ?>"></script>
    <script src="<?= base_url('assets/js/chart/dashboard14.js') ?>"></script>

    <script>
        function hitungRataRata(arrayAngka) {
            if (!Array.isArray(arrayAngka) || arrayAngka.length === 0) {
                return '0.00';
            }

            const total = arrayAngka.reduce((acc, val) => acc + val, 0);
            const rataRata = total / arrayAngka.length;

            return rataRata.toFixed(2);
        }

        $(document).ready(function() {
            // Dashboard 3
            $.ajax({
                type: "GET",
                url: "<?php echo site_url('Dashboard/get_tahap1') ?>",
                dataType: "json",
                success: function(response) {
                    barChartProgres({
                        id: 'bar_progres_tahap1',
                        title: "Tahap 1",
                        categories: [
                            "Paket 1.1<br>Kartasura-Klaten<br><b>22.3 km</b>",
                            "Paket 1.2<br>Klaten-Purwomartani<br><b>20.08 km</b>",
                            "Paket 2.1A<br>Purwomartani-Maguwoharjo<br><b>3.725 km</b>",
                            "Paket 2.2B<br>Trihanggo-JC Sleman<br><b>3.24 km</b>"
                        ],
                        series: [{
                            originalName: 'Konstruksi',
                            name: 'Konstruksi',
                            data: response.tahap1_progres_konstruksi,
                            color: '#FFb848'
                        }, {
                            originalName: 'Pembebasan Lahan (UGK)',
                            name: 'Pembebasan Lahan (UGK)',
                            data: response.tahap1_progres_lahan,
                            color: '#0077b6'
                        }, {
                            originalName: 'RTA',
                            name: 'RTA',
                            data: response.tahap1_progres_rta,
                            color: '#28b779'
                        }],
                    });
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });

            $.ajax({
                type: "GET",
                url: "<?php echo site_url('Dashboard/get_tahap2') ?>",
                dataType: "json",
                success: function(response) {
                    barChartProgres({
                        id: 'bar_progres_tahap2',
                        title: "Tahap 2",
                        categories: [
                            "Paket 3.1<br>Junction Sleman-Gamping<br><b>7.417 km</b>",
                            "Paket 3.2<br>Gamping-Sentolo<br><b>10 km</b>",
                            "Paket 3.3<br>Sentolo-Wates<br><b>7.995 km</b>",
                            "Paket 3.4<br>Wates-Kulonprogo<br><b>10.331 km</b>",
                            "Paket 3.5<br>Kulonprogo - Purworejo<br><b>3.135 km</b>",
                        ],
                        series: [{
                            originalName: 'Konstruksi',
                            name: 'Konstruksi',
                            data: response.tahap2_progres_konstruksi,
                            color: '#FFb848'
                        }, {
                            originalName: 'Pembebasan Lahan (UGK)',
                            name: 'Pembebasan Lahan (UGK)',
                            data: response.tahap2_progres_lahan,
                            color: '#0077b6'
                        }, {
                            originalName: 'RTA',
                            name: 'RTA',
                            data: response.tahap2_progres_rta,
                            color: '#28b779'
                        }],
                    });
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });

            $.ajax({
                type: "GET",
                url: "<?php echo site_url('Dashboard/get_tahap3') ?>",
                dataType: "json",
                success: function(response) {
                    barChartProgres({
                        id: 'bar_progres_tahap3',
                        title: "Tahap 3",
                        categories: [
                            "Paket 2.1B<br>Maguwoharjo-Monjali<br><b>5.7 km</b>",
                            "Paket 2.2A<br>Monjali-Trihanggo<br><b>2.8 km</b>",
                        ],
                        series: [{
                            originalName: 'Konstruksi',
                            name: 'Konstruksi',
                            data: response.tahap3_progres_konstruksi,
                            color: '#FFb848'
                        }, {
                            originalName: 'Pembebasan Lahan (UGK)',
                            name: 'Pembebasan Lahan (UGK)',
                            data: response.tahap3_progres_lahan,
                            color: '#0077b6'
                        }, {
                            originalName: 'RTA',
                            name: 'RTA',
                            data: response.tahap3_progres_rta,
                            color: '#28b779'
                        }],
                    });
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });

            // Dashboard 4
            lineChartDashboard4({
                id: 'line_volume',
                title: "Perbandingan Volume Lalu Lintas",
                subtitle: "",
                yAxisTitle: "Jumlah Volume",
                categories: <?= json_encode($pv_chart_data['pv_labels']) ?>,
                series: <?= json_encode($pv_chart_data['pv_datasets']) ?>
            });

            lineChartDashboard4({
                id: 'line_pendapatan',
                title: 'Perbandingan Pendapatan Tol',
                subtitle: 'dalam jutaan rupiah',
                yAxisTitle: "Jumlah Pendapatan",
                categories: <?= json_encode($pp_chart_data['pp_labels']) ?>,
                series: <?= json_encode($pp_chart_data['pp_datasets']) ?>
            });

            // Dashboard 5 
            barDashboard5({
                id: 'bar_opex',
                title: 'Total Opex',
                subtitle: '2025',
                xCategories: ['TW I', 'TW II', 'TW III', 'TW IV'],
                events: {
                    click: function(e) {
                        var ids = this.z;
                        return view_detail_opex(ids);
                    }
                },
                series: [{
                        name: 'Rencana',
                        data: [{
                                y: <?= $opex_rencana1; ?>,
                                z: 1,
                            },
                            {
                                y: <?= $opex_rencana2; ?>,
                                z: 2,
                            },
                            {
                                y: <?= $opex_rencana3; ?>,
                                z: 3,
                            },
                            {
                                y: <?= $opex_rencana4; ?>,
                                z: 4,
                            }
                        ],
                        color: '#ffca3a'
                    },
                    {
                        name: 'Realisasi',
                        data: [{
                                y: <?php echo $opex_realisasi1; ?>,
                                z: 1,
                            },
                            {
                                y: <?php echo $opex_realisasi2; ?>,
                                z: 2,
                            },
                            {
                                y: <?php echo $opex_realisasi3; ?>,
                                z: 3,
                            },
                            {
                                y: <?php echo $opex_realisasi4; ?>,
                                z: 4,
                            }
                        ],
                        color: '#1982c4'
                    },
                ]
            });
            barDashboard5({
                id: 'bar_capex',
                title: 'Total Capex',
                subtitle: '2025',
                xCategories: ['TW I', 'TW II', 'TW III', 'TW IV'],
                events: {
                    click: function(e) {
                        var ids = this.z;
                        return view_detail_capex(ids);
                    }
                },
                series: [{
                        name: 'Rencana',
                        data: [{
                                y: <?php echo $capex_rencana1; ?>,
                                z: 1,
                            },
                            {
                                y: <?php echo $capex_rencana2; ?>,
                                z: 2,
                            },
                            {
                                y: <?php echo $capex_rencana3; ?>,
                                z: 3,
                            },
                            {
                                y: <?php echo $capex_rencana4; ?>,
                                z: 4,
                            }
                        ],
                        color: '#ffca3a'
                    },
                    {
                        name: 'Realisasi',
                        data: [{
                                y: <?php echo $capex_realisasi1; ?>,
                                z: 1,
                            },
                            {
                                y: <?php echo $capex_realisasi2; ?>,
                                z: 2,
                            },
                            {
                                y: <?php echo $capex_realisasi3; ?>,
                                z: 3,
                            },
                            {
                                y: <?php echo $capex_realisasi4; ?>,
                                z: 4,
                            }
                        ],
                        color: '#1982c4'
                    },
                ]
            });

            // Dashboard 8
            $.ajax({
                url: "<?= base_url('Progres/getAlokasiDTT'); ?>",
                type: 'GET',
                dataType: 'JSON',
                success: function(response) {
                    pieDashboard8({
                        id: 'alokasi_pengadaan_tanah',
                        title: 'Alokasi Pengembalian DTT & Pembayaran Langsung',
                        series: [{
                            name: 'Alokasi',
                            data: response.series
                        }]
                    });
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });

            $.ajax({
                url: "<?= base_url('Progres/getFasilitasDTT'); ?>",
                type: 'GET',
                dataType: 'JSON',
                success: function(response) {
                    pieDashboard8({
                        id: 'dana_talanangan_tanah',
                        title: 'Alokasi Pengembalian DTT & Pembayaran Langsung',
                        point: {
                            events: {
                                click: function() {
                                    getData("#modalDanaTalanganTanah");
                                },
                            },
                        },
                        series: [{
                            name: 'Fasilitas',
                            data: response.series
                        }]
                    });
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });

            chartDashboard8({
                id: "chart_pembayaran_langsung",
            });

            // Dashbaord 9 
            getDataResiko("<?= base_url('Dashboard/get_manajemen_resiko') ?>", "<?= base_url('Manajemen') ?>");

            // Dashboard 12 Monitoring KPI
            getDataKPI({
                url: "<?= base_url('Manajemen/get_kpi?tahun=') . date('Y') ?>",
                processing: true,
                serverSide: true,
                searching: false,
                ordering: false,
                info: false,
                paging: false,
                columnDefs: [{
                        targets: 0,
                        width: "1%",
                        className: "dt-nowrap",
                    },
                    {
                        targets: [0, 2, 3, 4, 5, 7, 8, 9, 10, 11, 12, 13, 14],
                        className: "text-center",
                    },
                ],
                columns: [{
                        data: "id",
                    },
                    {
                        data: "nama",
                    },
                    {
                        data: "satuan",
                    },
                    {
                        data: "polaritas",
                    },
                    {
                        data: "bobot",
                    },
                    {
                        data: "batas_nilai",
                    },
                    {
                        data: "periode",
                    },
                    {
                        data: "rencana_q1",
                    },
                    {
                        data: "rencana_q2",
                    },
                    {
                        data: "rencana_q3",
                    },
                    {
                        data: "rencana_1y",
                    },
                    {
                        data: "realisasi_q1",
                    },
                    {
                        data: "realisasi_q2",
                    },
                    {
                        data: "realisasi_q3",
                    },
                    {
                        data: "realisasi_1y",
                    },
                    {
                        data: "keterangan",
                    },
                ],
            });
        });

        // Modal modalPembiayaanTahap1
        function modalPembiayaanTahap1() {
            $('#modalPembiayaanTahap1').modal('show');
        }

        function modalPembiayaanTahap2() {
            $('#modalPembiayaanTahap2').modal('show');
        }

        function modalPembiayaanTahap3() {
            $('#modalPembiayaanTahap3').modal('show');
        }

        // Action Grafik Opex Capex
        function view_detail_opex(id) {
            showGrafik({
                url: "<?php echo site_url('Dashboard/get_detail_opex') ?>",
                id: id,
                idDetail: "#detail_opex",
                idModal: "#view_detailOpex"
            });
        }

        function view_detail_capex(id) {
            showGrafik({
                url: "<?php echo site_url('Dashboard/get_detail_capex') ?>",
                id: id,
                idDetail: "#detail_capex",
                idModal: "#view_detailCapex"
            });
        }

        // Modul untuk view_debtEquity
        function view_debtEquity(id) {
            if (id == 1) {
                $("#view_debt").modal('show');
            } else if (id == 2) {
                $("#view_equity").modal('show');
            }
        }

        // Modul untuk Rencana Realisas Tahap 1
        function view_biayatahap1() {
            console.log("Klik sukses, buka modal");
            $("#detail_biayatahap1").modal('show');
        }

        // Modul untuk Realisasi Rencana Hutang Tahap 1
        function view_realisasihutang() {
            console.log("Klik sukses, buka modal");
            $("#detail_realisasihutang").modal('show');
        }

        // Modul untuk Ekuitas Tahap 1
        function view_ekuitastahap1() {
            console.log("Klik sukses, buka modal");
            $("#detail_ekuitastahap1").modal('show');
        }

        // Modul untuk view_alert
        function view_alert(params) {
            let modalIsu = $("#modalIsu");
            let detail_isu = $('#detail_isu');

            detail_isu.html(params);
            modalIsu.modal('show');
        }

        // Modul untuk view_detail_sop9001
        function view_detail_sop9001() {
            $.ajax({
                type: "GET",
                url: "<?php echo site_url('Dashboard/view_detail_sop9001') ?>",
                success: function(response) {
                    let data = "";
                    const link = "<?= base_url() ?>";

                    // Parse JSON dan buat tabel
                    JSON.parse(response).forEach((item, index) => {
                        const date = moment(item.tanggal, "YYYY-MM-DD").format("DD-MM-YYYY");
                        const fileLink = `<a href="${link}file_uploads/dokumen/sop/${item.dok_file}" target="_BLANK" class="btn btn-sm btn-info"><i class="fa fa-print"></i></a>`;

                        data += `
                                <tr>
                                    <td>${index + 1}</td>
                                    <td>${item.divisi}</td>
                                    <td>${item.nama}</td>
                                    <td style="text-align:center">${date}</td>
                                    <td style="text-align:center">${item.nomor}</td>
                                    <td style="text-align:center">${fileLink}</td>
                                </tr>
                            `;
                    });

                    // Update tabel dengan data yang telah dibuat
                    $("#detail_sop9001").html(data);
                    $("#sop_9001").modal('show');
                }
            });
        }

        // <!-- Modul untuk view_detail_sop14001 -->
        function view_detail_sop14001() {
            $.ajax({
                type: "GET",
                url: "<?php echo site_url('Dashboard/view_detail_sop14001') ?>",
                success: function(response) {
                    var data = "";
                    $.each(JSON.parse(response), function(index, item) {
                        var date = moment(item.tanggal, "YYYY-MM-DD").format("DD-MM-YYYY");
                        var file = `<a href="<?= base_url() ?>file_uploads/dokumen/sop/${item.dok_file}" target="_BLANK" class="btn btn-sm btn-info"><i class="fa fa-print"></i></a>`;

                        data += `<tr>
                                        <td>${index + 1}</td>
                                        <td>${item.divisi}</td>
                                        <td>${item.nama}</td>
                                        <td style="text-align:center">${date}</td>
                                        <td style="text-align:center">${item.nomor}</td>
                                        <td style="text-align:center">${file}</td>
                                    </tr>`;
                    });
                    $("#detail_sop14001").html(data);
                }
            });
            $("#sop_14001").modal('show');
        }

        // Modul untuk view_detail_sop45001
        function view_detail_sop45001() {
            $.ajax({
                type: "GET",
                url: "<?php echo site_url('Dashboard/view_detail_sop45001') ?>",
                success: function(response) {
                    var data = "";
                    $.each(JSON.parse(response), function(index, item) {
                        var date = moment(item.tanggal, "YYYY-MM-DD").format("DD-MM-YYYY");
                        var file = `<a href="<?= base_url() ?>file_uploads/dokumen/sop/${item.dok_file}" target="_BLANK" class="btn btn-sm btn-info"><i class="fa fa-print"></i></a>`;

                        data += `<tr>
                                        <td>${index + 1}</td>
                                        <td>${item.divisi}</td>
                                        <td>${item.nama}</td>
                                        <td style="text-align:center">${date}</td>
                                        <td style="text-align:center">${item.nomor}</td>
                                        <td style="text-align:center">${file}</td>
                                    </tr>`;
                    });
                    $("#detail_sop45001").html(data);
                }
            });
            $("#sop_45001").modal('show');
        }

        // Modul untuk view_detail_sop37001
        function view_detail_sop37001() {
            $.ajax({
                type: "GET",
                url: "<?php echo site_url('Dashboard/view_detail_sop37001') ?>",
                success: function(response) {
                    var data = "";
                    $.each(JSON.parse(response), function(index, item) {
                        var date = moment(item.tanggal, "YYYY-MM-DD").format("DD-MM-YYYY");
                        var file = `<a href="<?= base_url() ?>file_uploads/dokumen/sop/${item.dok_file}" target="_BLANK" class="btn btn-sm btn-info"><i class="fa fa-print"></i></a>`;

                        data += `<tr>
                                        <td>${index + 1}</td>
                                        <td>${item.divisi}</td>
                                        <td>${item.nama}</td>
                                        <td style="text-align:center">${date}</td>
                                        <td style="text-align:center">${item.nomor}</td>
                                        <td style="text-align:center">${file}</td>
                                    </tr>`;
                    });
                    $("#detail_sop37001").html(data);
                }
            });
            $("#sop_37001").modal('show');
        }

        // Modul untuk view_detaill
        function view_detaill(id_kpi) {
            $.ajax({
                type: "GET",
                url: "<?php echo site_url('Welcome/get_detail_gauge') ?>",
                data: {
                    id_kpi: id_kpi
                },
                success: function(response) {
                    var data = "";
                    $.each(JSON.parse(response), function(index, item) {
                        var prog = item.persentase ? Number(item.persentase).toFixed(2) : 0;
                        var stat = '';

                        if (prog == 0) {
                            stat = `<button type="button" class="btn btn-danger btn-sm">${prog}%</button>`;
                        } else if (prog >= 100) {
                            stat = `<button type="button" class="btn btn-info btn-sm">100%</button>`;
                        } else {
                            stat = `<button type="button" class="btn btn-warning btn-sm">${prog}%</button>`;
                        }

                        data += `<tr>
                                        <td style="color:black">${index + 1}</td>
                                        <td style="color:black">${item.program}</td>
                                        <td style="color:black; text-align:center">${item.nama_manager}</td>
                                        <td style="color:black; text-align:center">${stat}</td>
                                    </tr>`;
                    });
                    $("#detail_kegiatan").html(data);
                }
            });

            $("#view_auditor").modal('show');
        }

        // Modul untuk view_kurang_dok_konstruksi
        // Fungsi untuk menampilkan data kurang dokumen konstruksi
        function view_kurang_dok_konstruksi($id_dok) {
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('Dashboard/get_kurang_dok_konstruksi') ?>",
                data: {
                    id_dok: $id_dok
                },
                success: function(response) {
                    var data = "";
                    var jsonResponse = JSON.parse(response);

                    // Looping untuk setiap item
                    jsonResponse.forEach(function(item, index) {
                        // Format nilai kontrak menjadi Rupiah
                        var rupiah = item.nilai_kontrak.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');

                        // Membuat baris tabel
                        data += "<tr><td>" + (index + 1) + "</td><td>" + item.nama_kontrak + "</td><td>" + item.nomor_kontrak + "</td><td>" + rupiah + "</td></tr>";
                    });

                    // Menampilkan data di tabel
                    $("#kurang_dok").html(data);
                }
            });

            // Menampilkan modal
            $("#view_dok_pra").modal('show');
        }

        // Modul untuk modal rencana investasi realisasi dan hutang tahap 1
        const categories = [
            'Desain', 'Konstruksi', 'Paket 1.1', 'Paket 1.2A', 'Paket 1.2B', 'Paker 2.1A',
            'Paket 2.2A', 'Clear Zone', 'Peralatan Tol', 'Supervisi', 'Eskalasi',
            'PPn', 'Overhead', 'Financial Cost', 'IDC'
        ];

        const chartOptions = {
            chart: {
                type: 'bar'
            },
            xAxis: {
                categories: categories,
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Nilai (Rp)',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            tooltip: {
                valuePrefix: 'Rp',
                shared: true
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true,
                        formatter: function() {
                            return this.y !== 0 ? 'Rp' + Highcharts.numberFormat(this.y, 0, ',', '.') : '';
                        }
                    }
                }
            },
            credits: {
                enabled: false
            }
        };

        const dataSeries = {
            biayatahap1: [{
                    name: 'Rencana Porsi Biaya Investasi Tahap 1',
                    color: '#FFA500',
                    data: [
                        0, 1175679588000, 4204828000000, 4222197609851.20, 0,
                        1709491342956.98, 1068286437578.76, 0, 32086770000, 137426880000,
                        1080322470000, 0, 171877000000, 195781000000, 758875000000
                    ]
                },
                {
                    name: 'Realisasi Sindikasi',
                    color: '#3399FF',
                    data: [
                        0, 5375905127389, 3042480115249, 1514110000632, 345540721490,
                        0, 473774290018, 0, 12308042839, 82937682645,
                        0, 0, 1768001446, 0, 310324514344
                    ]
                },
                {
                    name: 'Realisasi Ekuitas TW 1 2025 (PMN)',
                    color: '#00AA55',
                    data: [
                        0, 1091024257691, 742017448408, 9129555000, 272119694247,
                        0, 67757560036, 0, 0, 6415702335,
                        0, 0, 0, 0, 0
                    ]
                },
                {
                    name: 'Realisasi Ekuitas TW 1 2025 (Non PMN)',
                    color: '#d62e56',
                    data: [
                        0, 1151734254375, 541066732376, 152435504018, 336200914325,
                        0, 122031103655, 0, 5274875503, 12810928712,
                        0, 0, 757714905, 0, 0
                    ]
                }
            ],
            realisasihutang: [{
                name: 'Realisasi Hutang (April 2025)',
                color: '#da542e',
                data: [
                    0, 5375905127389, 3042480115249, 1514110000632, 345540721490,
                    0, 473774290018, 0, 12308042839, 82937682645,
                    0, 0, 1768001446, 0, 310324514344
                ]
            }],
            ekuitastahap1: [{
                    name: 'Realisasi Ekuitas TW 1 2025 (PMN)',
                    color: '#00AA55',
                    data: [
                        0, 1091024257691, 742017448408, 9129555000, 272119694247,
                        0, 67757560036, 0, 0, 6415702335,
                        0, 0, 0, 0, 0
                    ]
                },
                {
                    name: 'Realisasi Ekuitas TW 1 2025 (Non PMN)',
                    color: '#d62e56',
                    data: [
                        0, 1151734254375, 541066732376, 152435504018, 336200914325,
                        0, 122031103655, 0, 5274875503, 12810928712,
                        0, 0, 757714905, 0, 0
                    ]
                }
            ]
        };

        function renderBarChart(containerId, title, seriesData) {
            Highcharts.chart(containerId, {
                ...chartOptions,
                title: {
                    text: title
                },
                series: seriesData
            });
        }

        // Pemanggilan fungsi
        renderBarChart('biayatahap1', 'Rencana Porsi Biaya Investasi Tahap 1', dataSeries.biayatahap1);
        renderBarChart('realisasihutang', 'Rencana Realisasi Hutang Tahap 1', dataSeries.realisasihutang);
        renderBarChart('ekuitastahap1', 'Rencana Realisasi Ekuitas Tahap 1', dataSeries.ekuitastahap1);

        // Modul untuk view_dokProyek_konstruksi
        // Fungsi untuk menampilkan data dokumen proyek konstruksi berdasarkan ID dokumen
        function view_dokProyek_konstruksi($id_dok) {
            $.ajax({
                type: "GET", // Menggunakan metode GET
                url: "<?php echo site_url('Dashboard/get_kurang_dokProyek') ?>", // URL tujuan
                data: {
                    id_dok: $id_dok
                }, // Mengirimkan ID dokumen sebagai parameter
                success: function(response) {
                    var data = "";
                    var jsonResponse = JSON.parse(response);

                    // Looping setiap item dalam respons JSON
                    jsonResponse.forEach(function(item, index) {
                        // Membuat baris tabel untuk setiap data yang diterima
                        data += "<tr>" +
                            "<td style='color:black;text-align:center'>" + (index + 1) + "</td>" + // Nomor urut
                            "<td style='color:black;text-align:center'>" + item.nomor_mc + "</td>" + // Nomor MC
                            "<td style='color:black;text-align:center'>" + item.bulan + " " + item.tahun + "</td>" + // Bulan dan tahun
                            "<td style='color:black'>" + item.keterangan + "</td>" + // Keterangan
                            "</tr>";
                    });

                    // Menampilkan data ke dalam elemen dengan ID 'kurang_dokProyek'
                    $("#kurang_dokProyek").html(data);
                }
            });

            // Menampilkan modal dengan ID 'view_dok_proyek'
            $("#view_dok_proyek").modal('show');
        }

        // Modul untuk view_kurang_pembayaranKonstruksi
        // Fungsi untuk menampilkan data kurang pembayaran konstruksi berdasarkan ID dokumen
        function view_kurang_pembayaranKonstruksi($id_dok) {
            $.ajax({
                type: "GET", // Metode request GET
                url: "<?php echo site_url('Dashboard/get_kurang_dokPembayaranKonstruksi') ?>", // URL tujuan
                data: {
                    id_dok: $id_dok
                }, // Mengirimkan ID dokumen sebagai parameter
                success: function(response) {
                    var data = "";
                    var jsonResponse = JSON.parse(response);

                    // Looping setiap item dalam respons JSON
                    jsonResponse.forEach(function(item, index) {
                        // Format nilai pembayaran menjadi Rupiah
                        var rupiah = item.nilai.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');

                        // Membuat baris tabel untuk setiap data yang diterima
                        data += "<tr>" +
                            "<td style='color:black;text-align:center'>" + (index + 1) + "</td>" + // Nomor urut
                            "<td style='color:black'>" + item.keterangan + "</td>" + // Keterangan
                            "<td style='color:black;text-align:center'>" + item.termin + "</td>" + // Termin
                            "<td style='color:black;text-align:center'>" + rupiah + "</td>" + // Nilai pembayaran (Rupiah)
                            "</tr>";
                    });

                    // Menampilkan data ke dalam elemen dengan ID 'pembayaranKonstruksi'
                    $("#pembayaranKonstruksi").html(data);
                }
            });

            // Menampilkan modal dengan ID 'view_dok_pembayaranKonstruksi'
            $("#view_dok_pembayaranKonstruksi").modal('show');
        }

        // Modul untuk view_kurang_pembayaranKonsultan
        // Fungsi untuk menampilkan data kurang pembayaran konsultan berdasarkan ID dokumen
        function view_kurang_pembayaranKonsultan($id_dok) {
            $.ajax({
                type: "GET", // Metode request GET
                url: "<?php echo site_url('Dashboard/get_kurang_dokPembayaranKonsultan') ?>", // URL tujuan
                data: {
                    id_dok: $id_dok
                }, // Mengirimkan ID dokumen sebagai parameter
                success: function(response) {
                    var data = "";
                    var jsonResponse = JSON.parse(response);

                    // Looping setiap item dalam respons JSON
                    jsonResponse.forEach(function(item, index) {
                        // Format nilai pembayaran menjadi Rupiah
                        var rupiah = item.nilai.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');

                        // Membuat baris tabel untuk setiap data yang diterima
                        data += "<tr>" +
                            "<td style='color:black;text-align:center'>" + (index + 1) + "</td>" + // Nomor urut
                            "<td style='color:black'>" + item.keterangan + "</td>" + // Keterangan
                            "<td style='color:black;text-align:center'>" + item.termin + "</td>" + // Termin
                            "<td style='color:black;text-align:center'>" + rupiah + "</td>" + // Nilai pembayaran (Rupiah)
                            "</tr>";
                    });

                    // Menampilkan data ke dalam elemen dengan ID 'pembayaranKonstruksi'
                    $("#pembayaranKonstruksi").html(data);
                }
            });

            // Menampilkan modal dengan ID 'view_dok_pembayaranKonstruksi'
            $("#view_dok_pembayaranKonstruksi").modal('show');
        }

        // Modul untuk view_kurang_dok_konsultan
        // Fungsi untuk menampilkan data kurang dokumen konsultan berdasarkan ID dokumen
        function view_kurang_dok_konsultan($id_dok) {
            $.ajax({
                type: "GET", // Menggunakan metode GET
                url: "<?php echo site_url('Dashboard/get_kurang_dok_konsultan') ?>", // URL tujuan
                data: {
                    id_dok: $id_dok
                }, // Mengirimkan ID dokumen sebagai parameter
                success: function(response) {
                    var data = "";
                    var jsonResponse = JSON.parse(response);

                    // Looping setiap item dalam respons JSON
                    jsonResponse.forEach(function(item, index) {
                        // Format nilai kontrak menjadi Rupiah
                        var rupiah = item.nilai_kontrak.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');

                        // Menambahkan baris baru ke dalam tabel dengan data yang diterima
                        data += "<tr>" +
                            "<td style='color:black'>" + (index + 1) + "</td>" + // Nomor urut
                            "<td style='color:black'>" + item.nama_kontrak + "</td>" + // Nama kontrak
                            "<td style='color:black;text-align:center'>" + item.nomor_kontrak + "</td>" + // Nomor kontrak
                            "<td style='color:black;text-align:center'>" + rupiah + "</td>" + // Nilai kontrak dalam Rupiah
                            "</tr>";
                    });

                    // Menampilkan data ke dalam elemen dengan ID 'kurang_dok'
                    $("#kurang_dok").html(data);
                }
            });

            // Menampilkan modal dengan ID 'view_dok_pra'
            $("#view_dok_pra").modal('show');
        }

        Highcharts.chart('biayatahap1', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Perbandingan Rencana & Realisasi Biaya'
            },
            xAxis: {
                categories: [
                    'Desain', 'Konstruksi', 'Paket 1.1', 'Paket 1.2A', 'Paket 1.2B', 'Paker 2.1A',
                    'Paket 2.2A', 'Clear Zone', 'Peralatan Tol', 'Supervisi', 'Eskalasi',
                    'PPn', 'Overhead', 'Financial Cost', 'IDC'
                ],
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Nilai (Rp)',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            tooltip: {
                valuePrefix: 'Rp',
                shared: true
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true,
                        formatter: function() {
                            return this.y !== 0 ? 'Rp' + Highcharts.numberFormat(this.y, 0, ',', '.') : '';
                        }
                    }
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Rencana Biaya Investasi Tahap I',
                color: '#FFA500', // Oranye
                data: [
                    0, 11756795880000, 4204828000000, 4222197609851.20, 0, 1709491342956.98,
                    1068286437578.76, 0, 32086770000, 137426880000, 1080322470000,
                    0, 171877000000, 195781000000, 758875000000
                ]
            }, {
                name: 'Realisasi Sindikasi',
                color: '#3399FF', // Biru
                data: [
                    0, 5375905127389, 3042480115249, 1514110000632, 345540721490, 0,
                    473774290018, 0, 12308042839, 82937682645, 0,
                    0, 1768001446, 0, 0
                ]
            }, {
                name: 'Realisasi Ekuitas TW 1 2025 (PMN)',
                color: '#00AA55', // Hijau
                data: [
                    0, 1091024257691, 742017448408, 9129555000, 272119694247, 0,
                    67757560036, 0, 0, 6415702335, 0,
                    0, 0, 0, 0
                ]
            }]
        });

        const cars = [{
            model: '-Seksi 1.1: Kartasura-Klaten',
            current: 0,
            color: '#FFb848',
            deals: [{
                rentedTo: '22.30',
                from: "2021-01-01",
                to: "2024-04-30",
            }]
        }, {
            model: '-Seksi 1.2: Klaten-Purwomartani',
            current: 0,
            deals: [{
                rentedTo: '20.08',
                from: "2021-01-01",
                to: "2024-07-30",
            }, {
                rentedTo: "",
                from: "2024-10-01",
                to: "2027-12-30",
            }]
        }];

        // Parse car data into series.
        const series = cars.map(function(car, i) {
            const data = car.deals.map(function(deal) {
                return {
                    id: 'deal-' + i,
                    rentedTo: deal.rentedTo,
                    start: deal.from,
                    end: deal.to,
                    y: i,
                    name: deal.rentedTo
                };
            });
            return {
                name: car.model,
                data: data,
                current: car.deals[car.current]
            };
        });

        Highcharts.chart('pie_alokasi', {
            chart: {
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 35
                }
            },
            title: {
                text: ' ',
                align: 'left'
            },

            plotOptions: {
                pie: {
                    innerSize: 100,
                    depth: 35,
                    dataLabels: {
                        enabled: true,
                        // format : '<b>{point.y}</b>',
                        format: '<b>{point.percentage:.1f}%</b>',
                        distance: -50,
                        formatter: function() {
                            return IDRFormatter(this.value, 'Rp.')
                        }
                    },
                    point: {
                        events: {
                            click: function(e) {
                                var ids = this.z;
                                return view_debtEquity(ids);
                                // $('#view_aset').modal('show');


                            }
                        }
                    },
                    showInLegend: true,
                    colors: [
                        '#ef476f',
                        '#06d6a0',
                        '#f57622',

                    ],
                },

            },
            legend: {
                enabled: true,
            },
            series: [{
                name: 'Nilai',
                data: [{
                        name: 'Debt',
                        y: 70,
                        sliced: true,
                        selected: true,
                        z: 1,
                    }, {
                        name: 'Equity',
                        y: 30,
                        z: 2,
                    }

                ]
            }]
        });


        Highcharts.chart('bar_kepatuhan', {
            chart: {
                type: 'bar'
            },
            exporting: {
                enabled: false
            },
            title: {
                text: 'Compliance Obligation'
            },
            subtitle: {
                text: '2025'
            },
            xAxis: {
                categories: ['Operation', 'Korporasi', 'Perizinan', 'Regulasi'],
            },
            yAxis: {
                min: 0,
                max: 100,
                title: {
                    enabled: false
                },
                labels: {
                    overflow: 'justify',
                    format: "{value}%",
                },
            },
            tooltip: {
                format: "{series.name}: <b>{point.y:.2f}%</b>",
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true,
                        inside: true,
                        format: '{point.y:,.2f}%',
                        style: {
                            textOutline: 'none'
                        }
                    },
                },
            },
            legend: {
                enabled: false
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Total Kepatuhan',
                data: [{
                    y: <?= ($operasional_ada / $operasional_tot) * 100 ?>,
                    color: '#2255a4'
                }, {
                    y: <?= ($korporasi_ada / $korporasi_tot) * 100 ?>,
                    color: '#28b779'
                }, {
                    y: <?= ($perizinan_ada / $perizinan_tot) * 100 ?>,
                    color: '#ffb747'
                }, {
                    y: <?= ($regulasi_ada / $regulasi_tot) * 100 ?>,
                    color: '#da542e'
                }],
            }, ]
        });


        <?php if ($this->session->userdata('level_user') == 1) { ?>
            PieDashboard14({
                id: 'pie_kontrakKonsTol',
                title: 'Administrasi Kontrak',
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.y}</b>',
                            distance: -40,
                        },
                        showInLegend: true,
                        point: {
                            events: {
                                click: function(e) {
                                    var ids = this.z;
                                    return view_kurang_dok_konstruksi(ids);
                                }
                            }
                        },
                        colors: [
                            '#004e98',
                            '#277da1',
                            '#577590',
                            '#4d908e',
                            '#43aa8b',
                            '#90be6d',
                            '#f9c74f',
                            '#f9844a',
                            '#f8961e',
                            '#f3722c',
                            '#f94144',
                            '#ff4d6d',
                            '#ff758f',
                            '#ffb3c1',
                            '#eaac8b'
                        ],
                    }
                },
                series: [{
                    name: 'Jumlah Kekurangan',
                    colorByPoint: true,
                    data: [{
                            name: 'Surat Penawaran',
                            y: <?= $krg_penawaran_ksi ?>,
                            sliced: true,
                            selected: true,
                            z: 1,
                        }, {
                            name: 'SPMK',
                            y: <?= $krg_spmk_ksi ?>,
                            z: 10,
                        }, {
                            name: 'HPS',
                            y: <?= $krg_hps_ksi ?>,
                            z: 74,
                        }, {
                            name: 'Kontrak',
                            y: <?= $krg_kontrak_ksi ?>,
                            z: 11,
                        }, {
                            name: 'Permohonan IP',
                            y: <?= $krg_permohononanPrinsip_ksi ?>,
                            z: 52,
                        }, {
                            name: 'KUK',
                            y: <?= $krg_kuk_ksi ?>,
                            z: 12,
                        }, {
                            name: 'Persetujuan IP',
                            y: <?= $krg_persetujuanPrinsip_ksi ?>,
                            z: 53,
                        }, {
                            name: 'KAK',
                            y: <?= $krg_kak_ksi ?>,
                            z: 13,
                        }, {
                            name: 'Penunjukan <br>Pemenang',
                            y: <?= $krg_penunjukanPemenang_ksi ?>,
                            z: 3,
                        }, {
                            name: 'KKK',
                            y: <?= $krg_kkk_ksi ?>,
                            z: 75,
                        }, {
                            name: 'Jaminan Pelaksanaan',
                            y: <?= $krg_jaminanPelaksanaan_ksi ?>,
                            z: 73,
                        }, {
                            name: 'Daftar Kuantitasc& <br>Harga',
                            y: <?= $krg_harga_ksi ?>,
                            z: 14,
                        }, {
                            name: 'Jaminan Penawaran',
                            y: <?= $krg_jaminanPenawaran_ksi ?>,
                            z: 72,
                        },
                        {
                            name: 'IKP',
                            y: <?= $krg_ikp_ksi ?>,
                            z: 15,
                        },
                    ]
                }]
            });

            Highcharts.chart('pie_proyekKonsTol', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Administrasi Proyek'
                },
                credits: {
                    enabled: false
                },
                exporting: {
                    enabled: false
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.y:.0f}</b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.y}</b>',
                            distance: -40,
                        },
                        showInLegend: true,
                        point: {
                            events: {
                                click: function(e) {

                                    var ids = this.z;
                                    return view_dokProyek_konstruksi(ids);
                                }
                            }
                        },
                        colors: [
                            '#1AA1CC',
                            '#2571EB',
                            '#FF7723',
                            '#9b72cf',
                            '#1CD345',
                            '#FF2626',
                            '#1accbd',
                            '#dd3261',
                            '#fc539f',
                            '#a7c706',
                            '#e66a7c',
                            '#81b29a',
                            '#fcbf49',
                            '#eaac8b'
                        ],
                    },
                },
                legend: {
                    enabled: true,
                    labelFormat: '{name} ({y:.0f})',
                },
                series: [{
                    name: 'Jumlah Kekurangan',
                    colorByPoint: true,
                    data: [{
                            name: 'Perhitungan MC',
                            y: <?= $bapp ?>,
                            // sliced: true,
                            // selected: true,
                            z: 71,
                        },
                        {
                            name: 'Backup Quantity',
                            y: <?= $b_quantity ?>,
                            z: 42,
                        }, {
                            name: 'Backup Quality',
                            y: <?= $b_quality ?>,
                            z: 43,
                        }, {
                            name: 'Laporan',
                            y: <?= $laporan ?>,
                            z: 44,
                        }, {
                            name: 'Copy Kontrak',
                            y: <?= $c_kontrak ?>,
                            z: 67,
                        }, {
                            name: 'Copy SPMK',
                            y: <?= $c_spmk ?>,
                            z: 66,
                        }, {
                            name: 'Copy SK PKP',
                            y: <?= $c_sk ?>,
                            z: 64,
                        }, {
                            name: 'NPWP Perusahaan',
                            y: <?= $c_npwp ?>,
                            z: 63,
                        }, {
                            name: 'Copy SBU',
                            y: <?= $c_sbu ?>,
                            z: 62,
                        }, {
                            name: 'Izin Usaha ',
                            y: <?= $izin_usaha ?>,
                            z: 60,
                        },
                        {
                            name: 'Tanda Daftar <br>Perusahaan',
                            y: <?= $tanda_daftar ?>,
                            z: 61,
                        },

                    ]
                }]
            });

            Highcharts.chart('pie_bayarKonsTol', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Administrasi Pembayaran'
                },
                credits: {
                    enabled: false
                },
                exporting: {
                    enabled: false
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.y:.0f}</b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.y}</b>',
                            distance: -40,
                        },
                        showInLegend: true,
                        point: {
                            events: {
                                click: function(e) {
                                    var ids = this.z;
                                    return view_kurang_pembayaranKonstruksi(ids);
                                }
                            }
                        },
                        colors: [
                            '#1e6091',
                            '#1a759f',
                            '#168aad',
                            '#34a0a4',
                            '#52b69a',
                            '#76c893',
                            '#99d98c',
                            '#b5e48c',
                            '#fc539f',
                            '#a7c706',
                            '#e66a7c'
                        ],
                    }
                },
                legend: {
                    enabled: true,
                    labelFormat: '{name} ({y:.0f})',
                },
                series: [{
                    name: 'Jumlah Kekurangan',
                    colorByPoint: true,
                    data: [{
                            name: 'BA Pembayaran (BAP)',
                            y: <?= $bap_ksi ?>,
                            sliced: true,
                            selected: true,
                            z: 31,
                        }, {
                            name: 'Srt Permohonan Pembayaran',
                            y: <?= $spp_ksi ?>,
                            z: 32,
                        }, {
                            name: 'Kwitansi',
                            y: <?= $kwitansi_ksi ?>,
                            z: 33,
                        }, {
                            name: 'Faktur Pajak (PPN)',
                            y: <?= $faktur_ksi ?>,
                            z: 34,
                        },
                        // {
                        //     name: 'Perhitungan Pajak',
                        //     y: <?= $p_pajak ?>,
                        //     z: 79,
                        // },
                        // {
                        //     name: 'Disposisi Direksi',
                        //     y: <?= $d_direksi ?>,
                        //     z: 78,
                        // },
                        // {
                        //     name: 'Ijin Penggunaan Anggaran',
                        //     y: <?= $i_anggaran ?>,
                        //     z: 77,
                        // },
                        {
                            name: 'Nota Dinas',
                            y: <?= $nota ?>,
                            z: 76,
                        },

                    ]
                }]
            });

            Highcharts.chart('pie_kontrakKonsultan', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Administrasi Kontrak'
                },
                credits: {
                    enabled: false
                },
                exporting: {
                    enabled: false
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.y:.0f}</b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.y}</b>',
                            distance: -40,
                        },
                        showInLegend: true,
                        point: {
                            events: {
                                click: function(e) {

                                    var ids = this.z;
                                    return view_kurang_dok_konsultan(ids);
                                }
                            }
                        },
                        colors: [
                            '#004e98',
                            '#277da1',
                            '#577590',
                            '#4d908e',
                            '#43aa8b',
                            '#90be6d',
                            '#f9c74f',
                            '#f9844a',
                            '#f8961e',
                            '#f3722c',
                            '#f94144',
                            '#ff4d6d',
                            '#ff758f',
                            '#ffb3c1',
                            '#eaac8b'
                        ],
                    }
                },
                legend: {
                    enabled: true,
                    labelFormat: '{name} ({y:.0f})',
                },
                series: [{
                    name: 'Jumlah Kekurangan',
                    colorByPoint: true,
                    data: [{
                        name: 'Surat Penawaran',
                        y: <?= $krg_penawaran_kst ?>,
                        sliced: true,
                        selected: true,
                        z: 1,
                    }, {
                        name: 'HPS',
                        y: <?= $krg_hps_kst ?>,
                        z: 74,
                    }, {
                        name: 'Permohonan Ijin Prinsip',
                        y: <?= $krg_permohononanPrinsip_kst ?>,
                        z: 52,
                    }, {
                        name: 'Persetujuan Ijin Prinsip',
                        y: <?= $krg_persetujuanPrinsip_kst ?>,
                        z: 53,
                    }, {
                        name: 'Penunjukan Pemenang',
                        y: <?= $krg_suratPenunjukan_kst ?>,
                        z: 3,
                    }, {
                        name: 'Jaminan Pelaksanaan',
                        y: <?= $krg_jaminanPelaksanaan_kst ?>,
                        z: 73,
                    }, {
                        name: 'Jaminan Penawaran',
                        y: <?= $krg_jaminanPenawaran_kst ?>,
                        z: 72,
                    }, {
                        name: 'SPMK',
                        y: <?= $krg_spmk_kst ?>,
                        z: 10,
                    }, {
                        name: 'Kontrak',
                        y: <?= $krg_kontrak_kst ?>,
                        z: 11,
                    }, {
                        name: 'KUK',
                        y: <?= $krg_ketUmum_kst ?>,
                        z: 12,
                    }, {
                        name: 'KAK',
                        y: <?= $krg_kak_kst ?>,
                        z: 13,
                    }, {
                        name: 'KKK',
                        y: <?= $krg_kkk_kst ?>,
                        z: 75,
                    }, {
                        name: 'Daftar Kuantitasa & Harga',
                        y: <?= $krg_kuantitas_kst ?>,
                        z: 14,
                    }, {
                        name: 'IKP',
                        y: <?= $krg_instruksi_kst ?>,
                        z: 15,
                    }, ]
                }]
            });

            Highcharts.chart('pie_bayarKonsultan', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Administrasi Pembayaran'
                },
                credits: {
                    enabled: false
                },
                exporting: {
                    enabled: false
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.y:.0f}</b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.y}</b>',
                            distance: -40,
                        },
                        showInLegend: true,
                        point: {
                            events: {
                                click: function(e) {
                                    var ids = this.z;
                                    return view_kurang_pembayaranKonsultan(ids);
                                }
                            }
                        },
                        colors: [
                            '#1AA1CC',
                            '#2571EB',
                            '#FF7723',
                            '#ECCD2C',
                            '#1CD345',
                            '#FF2626',
                            '#1accbd',
                            '#dd3261',
                            '#fc539f',
                            '#a7c706',
                            '#e66a7c'
                        ],
                    }
                },
                legend: {
                    enabled: true,
                    labelFormat: '{name} ({y:.0f})',
                },
                series: [{
                    name: 'Jumlah Kekurangan',
                    colorByPoint: true,
                    data: [{
                            name: 'Berita Acara Pembayaran (BAP)',
                            y: <?= $bap_kst ?>,
                            sliced: true,
                            selected: true,
                            z: 31,
                        }, {
                            name: 'BAPP',
                            y: <?= $bapp_kst ?>,
                            z: 80,
                        }, {
                            name: 'BAST',
                            y: <?= $bast_kst ?>,
                            z: 81,
                        },
                        // {
                        //     name: 'Disposisi Direksi',
                        //     y: <?= $disposisi_kst ?>,
                        //     z: 78,
                        // },
                        {
                            name: 'Faktur Pajak (PPN)',
                            y: <?= $faktur_kst ?>,
                            z: 34,
                        },
                        // {
                        //     name: 'Ijin Penggunaan Anggaran',
                        //     y: <?= $ijin_kst ?>,
                        //     z: 77,
                        // },
                        {
                            name: 'Invoice',
                            y: <?= $invoice_kst ?>,
                            z: 82,
                        }, {
                            name: 'Kwintansi',
                            y: <?= $kwitansi_kst ?>,
                            z: 33,
                        }, {
                            name: 'Nota Dinas',
                            y: <?= $nota_kst ?>,
                            z: 76,
                        },
                        // {
                        //     name: 'Perhitungan Pajak',
                        //     y: <?= $perhitunganPjk_kst ?>,
                        //     z: 79,
                        // },
                        {
                            name: 'Surat Permohonan Pembayaran',
                            y: <?= $spp_kst ?>,
                            z: 32,
                        },

                    ]
                }]
            });

        <?php } ?>
    </script>
</body>

</html>