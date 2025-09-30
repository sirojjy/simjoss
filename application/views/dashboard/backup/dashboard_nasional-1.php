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
$format_tw = "TW I $tahun";
$format_bulan_tahun = "Maret $tahun";
$format_bulan_saja = "Maret";
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
                        <div class="card-body border-bottom">
                            <h4 class="card-title m-t-10"><b>1. Trase Jalan Tol</b></h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card ">
                                        <div id="map" style="width: 100%; margin: 3px; height: 530px;"></div>
                                    </div>
                                </div>
                            </div>
                            <h5 class="text-info" style="text-align: center;"><a href="https://drive.google.com/file/d/1TeJOHom0_rcDdEc_78_lPMWOQS76AkIr/view" target="_blank"><u>View Detail Trase</u></a></h5>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Kronologis Pendirian PT Jasamarga Jogja Solo -->
        <div class="card">
            <div class="row">
                <div class="col-md-12 border-right p-r-0">
                    <div class="card-body border-bottom">
                        <h4 class="card-title m-t-10"><b>2. Kronologis Pendirian PT Jasamarga Jogja Solo</b></h4>
                    </div>
                    <div class="card-body">
                        <br><br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="hori-timeline" dir="ltr">
                                    <ul class="list-inline events">
                                        <li class="list-inline-item event-list">
                                            <div class="px-4">
                                                <h5 class="font-size-16 text-primary">
                                                    <b>
                                                        <font style="font-size: 25px">1. </font><br>Pra Perencanaan KPBU
                                                    </b>
                                                </h5>
                                                <p class="text-info"> 26 Juni 2016 - <br>16 Maret 2018<br><br></p>
                                                <div>
                                                    <button class="btn btn-primary btn-sm btn-step" data-step="1">View Detail</button>
                                                </div>
                                            </div>

                                        </li>
                                        <li class="list-inline-item event-list">
                                            <div class="px-4">
                                                <h5 class="font-size-16 " style="color:#fca311">
                                                    <b>
                                                        <font style="font-size: 25px; ">2.</font><br> Perencanaan KPBU
                                                    </b>
                                                </h5>
                                                <p class="text-info"> 4 Mei 2018 - <br>18 Oktober 2018<br><br> </p>
                                                <div>
                                                    <button class="btn btn-warning btn-sm btn-step" data-step="2">View Detail</button>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="list-inline-item event-list">
                                            <div class="px-4">
                                                <h5 class="font-size-16 text-danger">
                                                    <b>
                                                        <font style="font-size: 25px">3.</font><br>Pembentukan BUJT
                                                    </b>
                                                </h5>
                                                <p class="text-info">
                                                    6 September 2019 - <br>20 Agustus 2024<br><br>
                                                </p>
                                                <div>
                                                    <button class="btn btn-danger btn-sm btn-step" data-step="3">View Detail</button>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="list-inline-item event-list ">
                                            <div class="px-4">
                                                <h5 class="font-size-16 text-success">
                                                    <b>
                                                        <font style="font-size: 25px">4.</font><Br>Pelaksanaan PPJT
                                                    </b>
                                                </h5>
                                                <p class="text-info"> 23 Agustus 2019 - <br> 15 November 2024<br><br> </p>
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
                                                <p class="text-primary"> &emsp; - <br> <br> <br> </p>
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
                        <p class="text-info"><i>Last updated : <?= $format_bulan_tahun ?></i></p>
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
                                                    <p class="h7 mt-1 mb-1 text-primary" style="font-size: 15px"><b><?php echo $no++ ?>.</b></p>
                                                    <p class="h7 mt-2 mb-1" style="font-size: 11px"><b><?php echo date('d-m-Y', strtotime($dt->tanggal)); ?></b></p>

                                                    <p class="h6 text-primary mb-0 mb-lg-0" style="font-size: 13px"><a href="<?php echo base_url("file_uploads/dokumen/kronologis/$dt->file") ?>" target="_blank"><?php echo $dt->jenis_dok ?></a></p>
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
                                                    $sql = $this->db->query("select * from kronologis where id_tahapan=1 and tanggal='2018-03-16'  order by tanggal ASC")->result();
                                                    $no = 1;
                                                    foreach ($sql as $dt) { ?>
                                                        <a href="<?php echo base_url("file_uploads/dokumen/kronologis/$dt->file") ?>" target="_blank"><?php echo $no++ ?>. <?php echo $dt->jenis_dok ?></a><br><br>

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
                                        $sql = $this->db->query("select * from kronologis where id_kronologis in(17,18)  order by tanggal ASC")->result();
                                        $no = 1;
                                        foreach ($sql as $dt) { ?>

                                            <div class="timeline-step">
                                                <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="Perencanaan KPBU" style="">
                                                    <div class="inner-circle2"></div>
                                                    <p class="h7 mt-1 text-warning" style="font-size: 14px;"><b><?php echo $no++ ?>.</b></p>
                                                    <p class="h7 mt-1 mb-1" style="font-size: 11px"><b><?php echo date('d-m-Y', strtotime($dt->tanggal)); ?></b></p>
                                                    <p class="h6 mb-0 mb-lg-0" style="font-size: 13px; color:#6f1d1b"><a href="<?php echo base_url("file_uploads/dokumen/kronologis/$dt->file") ?>" target="_blank"><?php echo $dt->jenis_dok ?></a></p>
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
                                                    $sql = $this->db->query("select * from kronologis where id_tahapan=2 and tanggal='2018-08-24'  order by tanggal ASC")->result();
                                                    $no = 1;
                                                    foreach ($sql as $dt) { ?>
                                                        <a href="<?php echo base_url("file_uploads/dokumen/kronologis/$dt->file") ?>" target="_blank"><?php echo $no++ ?>. <?php echo $dt->jenis_dok ?></a><br><br>

                                                    <?php } ?>

                                            </div>
                                        </div>

                                        <?php
                                        $sql = $this->db->query("select * from kronologis where id_kronologis in(22,23,32)  order by tanggal ASC")->result();
                                        $no = 4;
                                        foreach ($sql as $dt) { ?>

                                            <div class="timeline-step">
                                                <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="Perencanaan KPBU" style="">
                                                    <div class="inner-circle2"></div>
                                                    <p class="h7 mt-1 text-warning" style="font-size: 14px;"><b><?php echo $no++ ?>.</b></p>
                                                    <p class="h7 mt-3 mb-1" style="font-size: 11px"><b><?php echo date('d-m-Y', strtotime($dt->tanggal)); ?></b></p>
                                                    <p class="h6 mb-0 mb-lg-0" style="font-size: 13px; color:#6f1d1b"><a href="<?php echo base_url("file_uploads/dokumen/kronologis/$dt->file") ?>" target="_blank"><?php echo $dt->jenis_dok ?></a></p>
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
                                                    <p class="h6 mb-0 mb-lg-0" style="font-size: 13px; color:#6f1d1b"><a href="<?php echo base_url("file_uploads/dokumen/kronologis/$dt->file") ?>" target="_blank"><?php echo $dt->jenis_dok ?></a></p>
                                                </div>
                                            </div>

                                        <?php } ?>

                                    </div>
                                </div>
                                <!-- <hr>
                                    <div class="card ">
                                        <h5>II. Perencanaan Basic Design</h5>
                                        
                                    </div>
                                    <hr>
                                    <div class="card ">
                                        <h5>III. Pengadaan Tanah</h5>
                                        
                                    </div> -->
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
                                                    <p class="h6 mb-0 mb-lg-0" style="font-size: 13px; color:#6f1d1b"><a href="<?php echo base_url("file_uploads/dokumen/kronologis/$dt->file") ?>" target="_blank"><?php echo $dt->jenis_dok ?></a></p>
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
                                                    <p class="h6 mb-0 mb-lg-0" style="font-size: 13px; color:#6f1d1b"><a href="<?php echo base_url("file_uploads/dokumen/kronologis/$dt->file") ?>" target="_blank"><?php echo $dt->jenis_dok ?></a></p>
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
                                                    <p class="h6 mb-0 mb-lg-0" style="font-size: 13px; color:#6f1d1b"><a href="<?php echo base_url("file_uploads/dokumen/kronologis/$dt->file") ?>" target="_blank"><?php echo $dt->jenis_dok ?></a></p>
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
                                                    <p class="h6 mb-0 mb-lg-0" style="font-size: 13px; color:#6f1d1b"><a href="<?php echo base_url("file_uploads/dokumen/kronologis/$dt->file") ?>" target="_blank"><?php echo $dt->jenis_dok ?></a></p>
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
                                                    <p class="h6 mb-0 mb-lg-0" style="font-size: 13px; color:#6f1d1b"><a href="<?php echo base_url("file_uploads/dokumen/kronologis/$dt->file") ?>" target="_blank"><?php echo $dt->jenis_dok ?></a></p>
                                                </div>
                                            </div>

                                        <?php } ?>

                                    </div>
                                </div>
                                <hr>
                                <!-- <div class="card ">
                                        <h5>II. Fungsional/Operasional</h5>
                                        <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                                            <?php $no = 1;
                                            foreach ($row42 as $dt) { ?>
                                                <div class="timeline-step">
                                                    <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="Pelaksanaan PPJT" style="">
                                                        <div class="inner-circle4"></div>
                                                        <p class="h7 mt-1 text-success" style="font-size: 14px;"><b><?php echo $no++ ?>.</b></p>
                                                        <p class="h7 mt-1 mb-1" style="font-size: 11px"><b><?php echo date('d-m-Y', strtotime($dt->tanggal)); ?></b></p>
                                                        <p class="h6 mb-0 mb-lg-0" style="font-size: 13px; color:#6f1d1b"><a href="<?php echo base_url("file_uploads/dokumen/kronologis/$dt->file") ?>" target="_blank" ><?php echo $dt->jenis_dok ?></a></p>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div> -->
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
                                    <!-- <h5>I. Pelaksanaan Pembangunan</h5> -->
                                    <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">

                                        <?php $no = 1;
                                        foreach ($row5 as $dt) { ?>

                                            <div class="timeline-step">
                                                <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="Pelaksanaan PPJT" style="">
                                                    <div class="inner-circle5"></div>
                                                    <p class="h7 mt-1 text-info" style="font-size: 14px;"><b><?php echo $no++ ?>.</b></p>
                                                    <p class="h7 mt-1 mb-1" style="font-size: 11px"><b><?php echo date('d-m-Y', strtotime($dt->tanggal)); ?></b></p>
                                                    <p class="h6 mb-0 mb-lg-0" style="font-size: 13px; color:#6f1d1b"><a href="<?php echo base_url("file_uploads/dokumen/kronologis/$dt->file") ?>" target="_blank"><?php echo $dt->jenis_dok ?></a></p>
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
                        <p class="text-info mt-3"><i> Last updated : <?= $format_tw ?></i></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Monitoring Volume Lalu Lintas dan Pendapatan Tol -->
        <div class="card">
            <div class="row">
                <div class="col-md-12 border-right p-r-0">
                    <div class="card-body border-bottom">
                        <h4 class="card-title m-t-10"><b>4. Monitoring Volume Lalu Lintas dan Pendapatan Tol</b></h4>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div id="line_volume" style="height: 450px;"></div>
                                <!-- <br><p align="center" style="color: red"><b>Total Kekurangan : 21 Dokumen</b></p> -->
                            </div>
                            <div class="col-md-6">
                                <div id="line_pendapatan" style="height: 450px;"></div>
                                <!-- <br><p align="center" style="color: red"><b>Total Kekurangan : 21 Dokumen</b></p> -->
                            </div>

                        </div>
                        <p class="text-info mt-3"><i>Last updated : <?= $format_tw ?> </i></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Monitoring RKAP -->
        <div class="card">
            <div class="row">
                <div class="col-md-12 border-right p-r-0">
                    <div class="card-body border-bottom">
                        <h4 class="card-title m-t-10"><b>5. Monitoring RKAP</b></h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div id="bar_opex" style="height: 500px;"></div>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="alert alert-primary">
                                            <p align="center" style="font-size: 14px"><b>
                                                    <font color="blue">Total Rencana : Rp. <?php echo number_format($tot_opex_rencana, 0, ',', '.') ?></font>
                                                </b>
                                                <br><b>
                                                    <font color="blue">Total Realisasi : Rp. <?php echo number_format($tot_opex_realisasi, 0, ',', '.') ?></font>
                                                </b>
                                                <br><b>
                                                    <font color="red">Total Deviasi : Rp. <?php echo number_format($tot_opex_rencana - $tot_opex_realisasi, 0, ',', '.') ?></font>
                                                </b>
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
                                            <p align="center" style="font-size: 14px"><b>
                                                    <font color="blue">Total Rencana : Rp. <?php echo number_format($tot_capex_rencana, 0, ',', '.') ?></font>
                                                </b>
                                                <br><b>
                                                    <font color="blue">Total Realisasi : Rp. <?php echo number_format($tot_capex_realisasi, 0, ',', '.') ?></font>
                                                </b>
                                                <br><b>
                                                    <font color="red">Total Deviasi : Rp. <?php echo number_format($tot_capex_rencana - $tot_capex_realisasi, 0, ',', '.') ?></font>
                                                </b>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="text-info mt-3"><i>Last updated : <?= $format_tw ?></i></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Monitoring Kelayakan Investasi -->
        <div class="card">
            <div class="row">
                <div class="col-md-12 border-right p-r-0">
                    <div class="card-body border-bottom">
                        <h4 class="card-title m-t-10"><b>6. Monitoring Kelayakan Investasi</b></h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">
                                <table class="table-striped table mb-0">
                                    <tbody>
                                        <tr style="background-color: #219ebc; color: white">
                                            <td><b>Kelayakan Invetasi</b></td>
                                            <td align="center"><b>PPJT 2020</b></td>
                                            <td align="center"><b>Add-2 PPJT</b></td>
                                            <td align="center"><b>BP OE</b></td>
                                        </tr>
                                        <tr>
                                            <td><b>IRR on Project </b></td>
                                            <td align="center"><span class="badge badge-lg badge-pill badge-success " style="font-size: 12px"><b>12.03%</b></span></td>
                                            <td align="center"><span class="badge badge-lg badge-pill badge-primary " style="font-size: 12px">12.03%</span></td>
                                            <td align="center"><span class="badge badge-lg badge-pill badge-info " style="font-size: 12px">11.42%</span></td>
                                        </tr>
                                        <tr>
                                            <td><b>IRR on Equity </b></td>
                                            <td align="center"><span class="badge badge-lg badge-pill badge-success " style="font-size: 12px"><b>14.14%</b></span></td>
                                            <td align="center"><span class="badge badge-lg badge-pill badge-primary " style="font-size: 12px">14.09%</span></td>
                                            <td align="center"><span class="badge badge-lg badge-pill badge-info " style="font-size: 12px">14.12%</span></td>
                                        </tr>
                                        <tr>
                                            <td><b>Net Present Value/NPV (Rp Juta) </b></td>
                                            <td align="center"><b>2.260.135</b></td>
                                            <td align="center"><b>2.225.445</b></td>
                                            <td align="center"><b>326.059</b></td>
                                        </tr>
                                        <tr>
                                            <td><b>Payback Period (PBP) </b></td>
                                            <td align="center"><span class="badge badge-lg badge-pill badge-success " style="font-size: 12px">12 Tahun</span></td>
                                            <td align="center"><span class="badge badge-lg badge-pill badge-primary " style="font-size: 12px">13 Tahun</span></td>
                                            <td align="center"><span class="badge badge-lg badge-pill badge-info " style="font-size: 12px">13 Tahun</span></td>
                                        </tr>
                                        <tr>
                                            <td><b>WACC </b></td>
                                            <td align="center"><span class="badge badge-lg badge-pill badge-success " style="font-size: 12px">11.26%</span></td>
                                            <td align="center"><span class="badge badge-lg badge-pill badge-primary " style="font-size: 12px">11.26%</span></td>
                                            <td align="center"><span class="badge badge-lg badge-pill badge-info " style="font-size: 12px">11.26%</span></td>
                                        </tr>
                                        <tr>
                                            <td><b>Nilai Investasi </b></td>
                                            <td align="center"><b>26.636.815</b></td>
                                            <td align="center"><b>27.486.608</b></td>
                                            <td align="center"><b>26.890.749</b></td>
                                        </tr>
                                        <tr>
                                            <td><b>Tarif Tol </b></td>
                                            <td align="center"><b>Rp 1.848</b></td>
                                            <td align="center"><b>Rp. 1.896</b></td>
                                            <td align="center"><b>Rp. 1.896</b></td>
                                        </tr>
                                        <tr>
                                            <td><b>Total CDS (Rp Juta) </b></td>
                                            <td align="center"><b>3.820.839 </b></td>
                                            <td align="center"><b>1.730.000 </b></td>
                                            <td align="center"><b>3.055.000</b></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-5">
                                <br><br><br>
                                <table class="table-striped table mb-0">
                                    <tbody>
                                        <tr style="background-color: #598392; color: white">
                                            <td><b>Parameter</b></td>
                                            <td align="center"><b>PPJT 2020</b></td>
                                            <td align="center"><b>Add-2 PPJT</b></td>
                                            <td align="center"><b>BP OE</b></td>
                                        </tr>

                                        <tr>
                                            <td><b>Penyesuaian Tarif</b></td>
                                            <td align="center"><span class="badge badge-lg badge-pill badge-success " style="font-size: 12px">8.00%</span></td>
                                            <td align="center"><span class="badge badge-lg badge-pill badge-primary " style="font-size: 12px">8.00%</span></td>
                                            <td align="center"><span class="badge badge-lg badge-pill badge-info " style="font-size: 12px">8.00%</span></td>
                                        </tr>
                                        <tr>
                                            <td><b>% Inflasi </b></td>
                                            <td align="center"><span class="badge badge-lg badge-pill badge-success " style="font-size: 12px">4.00%</span></td>
                                            <td align="center"><span class="badge badge-lg badge-pill badge-primary " style="font-size: 12px">4.00%</span></td>
                                            <td align="center"><span class="badge badge-lg badge-pill badge-info " style="font-size: 12px">4.00%</span></td>
                                        </tr>
                                        <!-- <tr>
                                                <td><b>% Eskalasi </b></td>
                                                <td align="center"><span class="badge badge-lg badge-pill badge-success " style="font-size: 12px">4.00%</span></td>
                                                <td align="center"><span class="badge badge-lg badge-pill badge-primary " style="font-size: 12px">2.29%, 4%, dst</span></td>
                                                <td align="center"><span class="badge badge-lg badge-pill badge-info " style="font-size: 12px">2.29%, 4%, dst</span></td>
                                            </tr> -->
                                        <tr>
                                            <td><b>% Rate Bunga Pokok</b></td>
                                            <td align="center"><span class="badge badge-lg badge-pill badge-success " style="font-size: 12px">11.00%</span></td>
                                            <td align="center"><span class="badge badge-lg badge-pill badge-primary " style="font-size: 12px">11.00%</span></td>
                                            <td align="center"><span class="badge badge-lg badge-pill badge-info " style="font-size: 12px">8.00%</span></td>
                                        </tr>
                                        <tr>
                                            <td><b>Masa Konsesi</b></td>
                                            <td align="center"><span class="badge badge-lg badge-pill badge-success " style="font-size: 12px">40 tahun</span></td>
                                            <td align="center"><span class="badge badge-lg badge-pill badge-primary " style="font-size: 12px">40 tahun</span></td>
                                            <td align="center"><span class="badge badge-lg badge-pill badge-info " style="font-size: 12px">40 tahun</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>
                        <p class="text-info"><i>Last updated : <?= $format_tw ?></i></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Monitoring Pembiayaan Tahap I -->
        <div class="card">
            <div class="row">
                <div class="col-md-12 border-right p-r-0">
                    <div class="card-body border-bottom">
                        <h4 class="card-title m-t-10"><b>7. Monitoring Pembiayaan Tahap I</b></h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5 border-right p-r-0">
                                <div class="card">
                                    <div class="col-md-12 border-right p-r-0">
                                        <!-- Card -->
                                        <div class="card">
                                            <div class="card-body border-bottom">

                                                <!-- Bagian 1: Total Nilai Investasi -->
                                                <div style="cursor: pointer;" onclick="view_biayatahap1()">
                                                    <h4 class="text-info text-center">Total Nilai Investasi Tahap 1</h4>
                                                    <h4 class="text-info mt-3 mb-3 text-center">Rp 14.133.165.000.000</h4>
                                                </div>
                                                <hr>

                                                <!-- Bagian 2: Hutang -->
                                                <div style="cursor: pointer;" onclick="view_realisasihutang()">
                                                    <h4 class="text-danger text-center">Hutang Tahap 1 (Debt)</h4>
                                                    <h5 class="text-danger mt-3 mb-3 text-center">Rp 9.893.216.000.000</h5>
                                                    <h4 class="text-danger text-center">(70%)</h4>
                                                </div>
                                                <hr>

                                                <!-- Bagian 3: Ekuitas -->
                                                <div style="cursor: pointer;" onclick="view_ekuitastahap1()">
                                                    <h4 class="text-success text-center">Ekuitas Tahap 1 (Equity)</h4>
                                                    <h5 class="text-success mt-3 mb-3 text-center">Rp 2.860.537.000.000</h5>
                                                    <h4 class="text-success text-center">(30%)</h4>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 border-right p-r-0">
                                <div class="card">
                                    <div class="col-md-12 border-right p-r-0">
                                        <div class="card-body border-bottom">
                                            <h4 class="card-title m-t-10"><b>Total Nilai Investasi Tahap 1</b></h4>
                                            <div id="pie_alokasi" style="height: 350px;"></div>
                                            <!-- <br><p align="center" style="color: blue"><b>Total : Rp. 4.871.074.000.000</b></p> -->
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
                    <div class="card-body border-bottom">
                        <h4 class="card-title m-t-10"><b>8. Monitoring Pembebasan Lahan</b></h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card card-hover">
                                    <a href="#">
                                        <div class="box bg-info">
                                            <h4 class="font-light text-white text-center"><b>Jumlah Pinjaman DTT</b></h4><br>
                                            <h4 class="text-white text-center m-t-10">Rp. 147.383.167.561 </h4>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card card-hover">
                                    <a href="#">
                                        <div class="box bg-success">
                                            <h4 class="font-light text-white text-center"><b>Realisasi Pembayaran UGR</b></h4><br>
                                            <h4 class="text-white text-center">Rp. 147.383.167.561 </h4></br>
                                            <h4 class="text-white text-center">(100%)</h4>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card card-hover">
                                    <a href="#">
                                        <div class="box bg-primary">
                                            <h5 class="font-light text-white text-center"><b>Telah dikembalikan LMAN</b></h5><br>
                                            <h4 class="text-white text-center">Rp. 61.546.215.531 </h4></br>
                                            <h4 class="text-white text-center">(41.75%)</h4>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card card-hover">
                                    <a href="#">
                                        <div class="box bg-danger">
                                            <h5 class="font-light text-white text-center"><b>Outstanding Total</b></h5><br>
                                            <h4 class="text-white text-center">Rp. 85.836.952.030 </h4></br> </h4><br>
                                            <h4 class="text-white text-center">(58.25%)</h4>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <p align="center"><button class="btn btn-info btn-sm" data-toggle="modal" data-target="#detail_dtt">View Detail</button></p>

                        <p class="text-info"><i>Last updated : <?= $format_bulan_tahun ?></i></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Manajemen Resiko -->
        <div class="card">
            <div class="row">
                <div class="col-md-12 border-right p-r-0">
                    <div class="card-body border-bottom">
                        <h4 class="card-title m-t-10"><b>9. Manajemen Resiko</b></h4>
                    </div>
                    <div class="card-body">
                        <table class="table-striped table mb-0">
                            <tbody>
                                <tr style="background-color: #a41623; color: white">
                                    <td align="center"><b>No.</b></td>
                                    <td align="center"><b>Indikator</b></td>
                                    <td align="center"><b>Bobot</b></td>
                                    <td align="center"><b>Target</b></td>
                                    <td align="center"><b>Realisasi</b></td>
                                    <td align="center"><b>Skala</b></td>
                                    <td align="center"><b>Hasil Penilaian</b></td>
                                    <td align="center"><b>Skor Penilaian</b></td>
                                    <!-- <td align="center"><b>Outstanding Total</b></td> -->
                                </tr>
                                <tr>
                                    <td align="right"><b>1. </b></td>
                                    <td><b>Pencapaian Nilai Eksposur Risiko dibandingkan dengan target Risiko Residual </b></td>
                                    <td align="center"> <span class="badge badge-lg badge-pill badge-success " style="font-size: 13px">30%</span></td>
                                    <td align="right"> 5.63 </td>
                                    <td align="right"> 1.88 </td>
                                    <td align="center"> 3</td>
                                    <td align="center"> 90</td>
                                    <td align="center"><b>27</b></td>
                                </tr>
                                <tr>
                                    <td align="right"><b>2. </b></td>
                                    <td><b>Pencapaian output pelaksanaan perlakuan Risiko dibandingkan dengan target total output pelaksanaan risiko</b></td>
                                    <td align="center"> <span class="badge badge-lg badge-pill badge-success " style="font-size: 13px">20%</span></td>
                                    <td align="right"> 100 </td>
                                    <td align="right"> 100 </td>
                                    <td align="center"> 5</td>
                                    <td align="center"> 100</td>
                                    <td align="center"><b>20</b></td>
                                </tr>
                                <tr>
                                    <td align="right"><b>3.</b> </td>
                                    <td><b>Realisasi biaya pelaksanaan perlakuan Risiko dibandingkan dengan anggaran </b></td>
                                    <td align="center"> <span class="badge badge-lg badge-pill badge-success " style="font-size: 13px">20%</span></td>
                                    <td align="right"> 9.200.000.000 </td>
                                    <td align="right"> 930.000.000 </td>
                                    <td align="center"> 2</td>
                                    <td align="center"> 80</td>
                                    <td align="center"><b>16</b></td>
                                </tr>
                                <tr>
                                    <td align="right"><b>4. </b></td>
                                    <td><b>Ketepatan penilaian Risiko yang meliputi : identifikasi risiko, kuantifikasi risiko, rencana perlakuan risiko, dan prioritisasi risiko </b></td>
                                    <td align="center"> <span class="badge badge-lg badge-pill badge-success " style="font-size: 13px">30%</span></td>
                                    <td align="right"> </td>
                                    <td align="right"> </td>
                                    <td align="center"> </td>
                                    <td align="center"> 90</td>
                                    <td align="center"><b>27</b></td>
                                </tr>
                                <tr>
                                    <td align="right"> </td>
                                    <td><b>4.1.&emsp; Ketepatan penilaian Risiko </b></td>
                                    <td align="center"> 25%</td>
                                    <td align="right"> </td>
                                    <td align="right"> Tidak ada </td>
                                    <td align="center"> 2 </td>
                                    <td align="center"> 90</td>
                                    <td align="center"><b>22.5</b></td>
                                </tr>
                                <tr>
                                    <td align="right"> </td>
                                    <td><b>4.2.&emsp; Ketepatan kuantifikasi Risiko </b></td>
                                    <td align="center"> 25%</td>
                                    <td align="right"> </td>
                                    <td align="right"> </td>
                                    <td align="center"> 2 </td>
                                    <td align="center"> 90</td>
                                    <td align="center"><b>22.5</b></td>
                                </tr>
                                <tr>
                                    <td align="right"> </td>
                                    <td><b>4.3.&emsp; Ketepatan rencana perlakuan Risiko </b></td>
                                    <td align="center"> 25%</td>
                                    <td align="right"> 5.63 </td>
                                    <td align="right"> 1.88 </td>
                                    <td align="center"> 2 </td>
                                    <td align="center"> 90</td>
                                    <td align="center"><b>22.5</b></td>
                                </tr>
                                <tr>
                                    <td align="right"> </td>
                                    <td><b>4.4.&emsp; Ketepatan prioritas Risiko </b></td>
                                    <td align="center"> 25%</td>
                                    <td align="right"> </td>
                                    <td align="right"> Tidak ada </td>
                                    <td align="center"> 2 </td>
                                    <td align="center"> 90</td>
                                    <td align="center"><b>22.5</b></td>
                                </tr>
                                <tr>
                                    <td align="center" colspan="7"> <b>Total Nilai</b></td>
                                    <td align="center"><b>90</b></td>
                                </tr>
                                <tr>
                                    <td align="center" colspan="7"> <b>KUALITAS PENERAPAN MANAJEMEN RESIKO</b></td>
                                    <td align="center"><b><span class="badge badge-lg badge-pill badge-success " style="font-size: 16px; font-weight: bold"><i>Satisfactory</i></span></b></td>
                                </tr>
                            </tbody>
                        </table>
                        &emsp;<p class="text-info"><i>Last updated : <?= $format_tw ?></i></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Kewajiban Kepatuhan JMJ -->
        <div class="card">
            <div class="row">
                <div class="col-md-12 border-right p-r-0">
                    <div class="card-body border-bottom">
                        <h4 class="card-title m-t-10"><b>10. Kewajiban Kepatuhan JMJ</b> &nbsp; <i class="mdi mdi-arrow-down-circle" style="color:red" onclick="view_alert10()"></i></h4>
                        <div class="alert alert-danger" id="div-alert10" style="display: none;" role="alert">
                            <b>PERMASALAHAN :</b> <br>
                            <?php
                            $no = 1;
                            foreach ($isu10 as $dt) {
                            ?>
                                <?php echo preg_replace("/\r\n|\r|\n/", '<br/>', $dt->issue) ?><br>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- <h5 style="color: black">Progres Gabungan</h5> -->
                        <div class="row">

                            <div class="col-md-6">
                                <br><br>
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
                        <br>
                        <!-- <div class="row">   
                                <div class="col-md-7">
                                    <div id="bar_progres" style="height: 450px;"></div>
                                </div>
                                <div class="col-md-5">
                                    <div id="bar_nilai" style="height: 450px;"></div>
                                </div>
                                
                            </div> -->
                        <!-- <p class="text-info mt-3"><i> Last updated : Desember 2024/TW IV 2024</i></p> -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Monitoring Sistem Manajemen Integrasi -->
        <div class="card">
            <div class="row">
                <div class="col-md-12 border-right p-r-0">
                    <div class="card-body border-bottom">
                        <h4 class="card-title m-t-10"><b>11. Monitoring Sistem Manajemen Integrasi</b></h4>
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
                        <p class="text-info mt-3"><i>Last updated : <?= $format_bulan_tahun ?></i></p>
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
                    <div class="card-body border-bottom">
                        <h4 class="card-title m-t-10"><b>12. Monitoring KPI</b> &nbsp; <i class="mdi mdi-arrow-down-circle" style="color:red" onclick="view_alert12()"></i></h4>
                        <div class="alert alert-danger" id="div-alert12" style="display: none;" role="alert">
                            <b>PERMASALAHAN :</b> <br>
                            <?php
                            $no = 1;
                            foreach ($isu12 as $dt) {
                            ?>
                                <?php echo preg_replace("/\r\n|\r|\n/", '<br/>', $dt->issue) ?><br>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table-striped table mb-0">
                            <tbody>
                                <tr style="background-color: #0077b6; color: white">
                                    <td align="center"><b>No.</b></td>
                                    <td align="center"><b>Ukuran Kinerja Utama (KPI)</b></td>
                                    <td align="center"><b>Satuan</b></td>
                                    <!-- <td align="center"><b>Target</b></td> -->
                                    <td align="center"><b>Polaritas</b></td>
                                    <td align="center"><b>Bobot</b></td>
                                    <td align="center"><b>Batasan <br>Nilai</b></td>
                                    <td align="center"><b>Periode <br>Pengukuran</b></td>
                                    <td align="center"><b>Skor Rencana <br>S.D. 1Q</b></td>
                                    <td align="center"><b>Skor Realisasi <br>S.D. 1Q</b></td>
                                    <!-- <td align="center"><b>Outstanding Total</b></td> -->
                                </tr>
                                <tr>
                                    <td align="center"><b>1. </b></td>
                                    <td><b>Pendapatan Tol </b></td>
                                    <td align="center"> Rp</td>
                                    <td align="center"> Maximize </td>
                                    <td align="center"> 7</td>
                                    <td align="center"> 110%</td>
                                    <td align="center"> Triwulan</td>
                                    <td align="center"> 7</td>
                                    <td align="center"><b>4</b></td>
                                </tr>
                                <tr>
                                    <td align="center"><b>2. </b></td>
                                    <td><b>Akurasi Proyeksi Volume Lalu Lintas </b></td>
                                    <td align="center"> %</td>
                                    <td align="center"> Maximize </td>
                                    <td align="center"> 7</td>
                                    <td align="center"> 110%</td>
                                    <td align="center"> Triwulan</td>
                                    <td align="center"> 7</td>
                                    <td align="center"><b>5</b></td>
                                </tr>
                                <tr>
                                    <td align="center"><b>3. </b></td>
                                    <td><b>EBITDA Margin </b></td>
                                    <td align="center"> %</td>
                                    <td align="center"> Maximize </td>
                                    <td align="center"> 7</td>
                                    <td align="center"> 110%</td>
                                    <td align="center"> Triwulan</td>
                                    <td align="center"> 7</td>
                                    <td align="center"><b>6</b></td>
                                </tr>
                                <tr>
                                    <td align="center"><b>4. </b></td>
                                    <td><b>Laba (Rugi) Tahun berjalan </b></td>
                                    <td align="center"> Rp</td>
                                    <td align="center"> Maximize </td>
                                    <td align="center"> 7</td>
                                    <td align="center"> 110%</td>
                                    <td align="center"> Triwulan</td>
                                    <td align="center"> 7</td>
                                    <td align="center"><b>2</b></td>
                                </tr>
                                <tr>
                                    <td align="center"><b>5. </b></td>
                                    <td><b>Biaya Operasi Jalan Tol per km </b></td>
                                    <td align="center"> Rp/km</td>
                                    <td align="center">
                                        <font color="orange">Minimize</font>
                                    </td>
                                    <td align="center"> 7</td>
                                    <td align="center"> 110%</td>
                                    <td align="center"> Triwulan</td>
                                    <td align="center"> 7</td>
                                    <td align="center"><b>8</b></td>
                                </tr>
                                <tr>
                                    <td align="center"><b>6. </b></td>
                                    <td><b>Pencapaian Tingkat Standar Pelayanan Minimal (SPM) </b></td>
                                    <td align="center"> %</td>
                                    <td align="center"> Maximize </td>
                                    <td align="center"> 7</td>
                                    <td align="center"> 110%</td>
                                    <td align="center"> Semesteran</td>
                                    <td align="center"> </td>
                                    <td align="center"><b> </b></td>
                                </tr>
                                <tr>
                                    <td align="center"><b>7. </b></td>
                                    <td><b>Indeks Kepuasan Pengguna Jalan Tol </b></td>
                                    <td align="center"> Indeks</td>
                                    <td align="center"> Maximize </td>
                                    <td align="center"> 7</td>
                                    <td align="center"> 110%</td>
                                    <td align="center"> Tahunan</td>
                                    <td align="center"> </td>
                                    <td align="center"><b> </b></td>
                                </tr>
                                <tr>
                                    <td align="center"><b>8. </b></td>
                                    <td><b>Efektivitas Pengendalian Settlement Pendapatan Tol </b></td>
                                    <td align="center"> Rp Miliar</td>
                                    <td align="center">
                                        <font color="orange">Minimize</font>
                                    </td>
                                    <td align="center"> 7</td>
                                    <td align="center"> 110%</td>
                                    <td align="center"> Triwulan</td>
                                    <td align="center"> 7</td>
                                    <td align="center"><b>7</b></td>
                                </tr>
                                <tr>
                                    <td align="center"><b>9. </b></td>
                                    <td><b>Efisiensi Penyerapan Capex Operasional dan Pembangunan Jalan Tol </b></td>
                                    <td align="center"> %</td>
                                    <td align="center">
                                        <font color="orange">Minimize</font>
                                    </td>
                                    <td align="center"> 8</td>
                                    <td align="center"> 110%</td>
                                    <td align="center"> Triwulan</td>
                                    <td align="center"> 8</td>
                                    <td align="center"><b>9</b></td>
                                </tr>
                                <tr>
                                    <td align="center"><b>10. </b></td>
                                    <td><b>Progres Pembangunan Jalan Tol </b></td>
                                    <td align="center"> %</td>
                                    <td align="center"> Maximize </td>
                                    <td align="center"> 8</td>
                                    <td align="center"> 110%</td>
                                    <td align="center"> Tahunan</td>
                                    <td align="center"> 8</td>
                                    <td align="center"><b>8</b></td>
                                </tr>
                                <tr>
                                    <td align="center"><b>11. </b></td>
                                    <td><b>Pengendalian Cost of Fund </b></td>
                                    <td align="center"> %</td>
                                    <td align="center">
                                        <font color="orange">Minimize</font>
                                    </td>
                                    <td align="center"> 7</td>
                                    <td align="center"> 110%</td>
                                    <td align="center"> Semesteran</td>
                                    <td align="center"> </td>
                                    <td align="center"><b></b></td>
                                </tr>
                                <tr>
                                    <td align="center"><b>12. </b></td>
                                    <td><b>Implementasi Dashboard Proyek dalam Monitoring Penyusunan Buku Putih </b></td>
                                    <td align="center"> %</td>
                                    <td align="center"> Maximize </td>
                                    <td align="center"> 7</td>
                                    <td align="center"> 110%</td>
                                    <td align="center"> Tahunan</td>
                                    <td align="center"> </td>
                                    <td align="center"><b></b></td>
                                </tr>
                                <tr>
                                    <td align="center"><b>13. </b></td>
                                    <td><b>Penyelesaian Tindak Lanjut Audit dari Pihak Internal & Eksternal (bila ada)</b></td>
                                    <td align="center"> Jumlah</td>
                                    <td align="center"> Maximize </td>
                                    <td align="center"> 7</td>
                                    <td align="center"> 110%</td>
                                    <td align="center"> Tahunan</td>
                                    <td align="center"> </td>
                                    <td align="center"><b></b></td>
                                </tr>
                                <tr>
                                    <td align="center"><b>14. </b></td>
                                    <td><b>Proses Amandemen PPJT (bila ada) </b></td>
                                    <td align="center"> %</td>
                                    <td align="center"> Maximize </td>
                                    <td align="center"> 7</td>
                                    <td align="center"> 110%</td>
                                    <td align="center"> Tahunan</td>
                                    <td align="center"> </td>
                                    <td align="center"><b></b></td>
                                </tr>

                                <tr>
                                    <td align="center" colspan="4"> <b>Total</b></td>
                                    <td align="center"><b>100</b></td>
                                    <td align="center"><b> </b></td>
                                    <td align="center"><b> </b></td>
                                    <td align="center"><b>58</b></td>
                                    <td align="center"><b>49</b></td>
                                </tr>
                                <!-- <tr>
                                            <td align="center" colspan="7"> <b>KUALITAS PENERAPAN MANAJEMEN RESIKO</b></td>
                                            <td align="center"><b><span class="badge badge-lg badge-pill badge-success " style="font-size: 16px; font-weight: bold"><i>Satisfactory</i></span></b></td>
                                        </tr> -->
                            </tbody>
                        </table>
                        &emsp;<p class="text-info"><i>Last updated : <?= $format_tw ?></i></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Monitoring Kontrak -->
        <div class="card">
            <div class="row">
                <div class="col-md-12 border-right p-r-0">
                    <div class="card-body border-bottom">
                        <h4 class="card-title m-t-10"><b>13. Monitoring Kontrak</b></h4>
                    </div>
                    <div class="card-body">
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
                        <div class="card-body border-bottom">
                            <h4 class="card-title m-t-10"><b>14. Monitoring Kelengkapan Dokumen Kontrak Konstruksi Tol</b></h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div id="pie_kontrakKonsTol" style="height: 450px;"></div>
                                    <br>
                                    <p align="center" style="color: red"><b>Total Kekurangan : <?php echo $sum_konstruksi ?> Dokumen</b></p>
                                </div>
                                <div class="col-md-4">
                                    <div id="pie_proyekKonsTol" style="height: 450px;"></div>
                                    <br>
                                    <p align="center" style="color: red"><b>Total Kekurangan : <?php echo $sum_proyek_konstruksi ?> Dokumen</b></p>
                                </div>
                                <div class="col-md-4">
                                    <div id="pie_bayarKonsTol" style="height: 450px;"></div>
                                    <br>
                                    <p align="center" style="color: red"><b>Total Kekurangan : <?php echo $sum_krg_pembayaranKonstruksi ?> Dokumen</b></p>
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
                        <div class="card-body border-bottom">
                            <h4 class="card-title m-t-10"><b>15. Monitoring Kelengkapan Dokumen Kontrak Konsultan Tol</b></h4>
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


    <!-- Detail Data Monitoring DTT s/d Maret 2025 -->

    <div class="modal fade show" id="detail_dtt" tabindex="-1" role="dialog" aria-labelledby="detailDttModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" style="min-width: 95%;">
            <div class="modal-content">
                <div class="modal-header text-white" style="background-color:rgb(21, 81, 128);">
                    <h5 class="modal-title" id="detailDttModalLabel">Detail Data Monitoring DTT s/d Maret 2025</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color:white;">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Tabel 1 -->
                    <h6 class="font-weight-bold" style="color: rgb(21, 81, 128);">Tabel 1: Status Verifikasi dan Pembayaran</h6>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-sm">
                            <thead class="text-center text-white" style="background-color:#1d6296;">
                                <tr>
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
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td rowspan="2">PT Jasamarga Jogja Solo</td>
                                    <td class="text-center">Bank BRI</td>
                                    <td class="text-center">68,731,832,523</td>
                                    <td class="text-center">2023</td>
                                    <td class="text-center">68,731,832,523</td>
                                    <td class="text-center">60,169,045,418</td>
                                    <td class="text-center">-</td>
                                    <td class="text-center">8,562,787,105</td>
                                    <td class="text-center">61,546,215,531</td>
                                    <td class="text-center">(1,294,209,381)</td>
                                    <td class="text-center">85,836,952,030</td>
                                    <td class="text-center">Bank BRI</td>
                                    <td class="text-center">48,235,049,987</td>
                                </tr>
                                <tr>
                                    <td class="text-center">Maybank</td>
                                    <td class="text-center">78,651,335,038</td>
                                    <td class="text-center">2024</td>
                                    <td class="text-center">78,651,335,038</td>
                                    <td class="text-center">82,960,732</td>
                                    <td class="text-center">-</td>
                                    <td class="text-center">78,568,374,306</td>
                                    <td colspan="3" class="text-center">-</td>
                                    <td class="text-center">Maybank</td>
                                    <td class="text-center">31,506,100,531</td>
                                </tr>
                                <tr class="font-weight-bold bg-light">
                                    <td colspan="2" class="text-center" style="color:blue">Total</td>
                                    <td class="text-center" style="color:blue">147,383,167,561</td>
                                    <td class="text-center" style="color:blue">-</td>
                                    <td class="text-center" style="color:blue">147,383,167,561</td>
                                    <td class="text-center" style="color:blue">60,252,006,150</td>
                                    <td class="text-center" style="color:blue">-</td>
                                    <td class="text-center" style="color:blue">87,131,161,411</td>
                                    <td class="text-center" style="color:blue">61,546,215,531</td>
                                    <td class="text-center" style="color:blue">(1,294,209,381)</td>
                                    <td class="text-center" style="color:blue">85,836,952,030</td>
                                    <td class="text-center" style="color:blue">Total</td>
                                    <td class="text-center" style="color:blue">79,741,150,518</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Tabel 2 -->
                    <h6 class="mt-4 font-weight-bold" style="color: rgb(21, 81, 128);">Tabel 2: Bunga, Selisih CoF, dan Rekonsiliasi</h6>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-sm">
                            <thead class="text-center text-white" style="background-color:#1d6296;">
                                <tr>
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
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
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
                                </tr>
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
                                <td><b>Realisasi Ekuitas s/d Maret 2025</b> </td>
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
                                <td><b>Sisa Ekuitas s/d Nov 2024</b></td>
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
                    <!--  <a href="<?php echo site_url('Perizinan/add_perizinan') ?>" class="pull-right"><button type="button" class="btn btn-primary btn-mini"> Download</button></a> -->
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th style="text-align: center; background-color: #faa307; color: white; "><b>Tahap Pekerjaan</b></th>
                                <th style="text-align: center; background-color: #faa307; color: white; "><b>Progres</b></th>
                                <!-- <th style="text-align: center; background-color: #faa307; color: white; "><b>Persentase</b></th> -->

                            </tr>
                            <tr style="color: blue">
                                <td><b>Tahap 1 </b> </td>
                                <td align="center"><b>71.26%</b></td>
                            </tr>
                            <tr>
                                <td>&emsp;&emsp; - Paket 1.1</td>
                                <td align="center">98.86% </td>
                            </tr>
                            <tr>
                                <td>&emsp;&emsp; - Paket 1.2</td>
                                <td align="center">78.51% </td>
                            </tr>
                            <tr>
                                <td>&emsp;&emsp; - Paket 2.1A</td>
                                <td align="center"> 2.08%</td>
                            </tr>
                            <tr>
                                <td>&emsp;&emsp; - Paket 2.2B</td>
                                <td align="center">44.64% </td>
                            </tr>
                            <tr style="color: blue">
                                <td><b>Tahap 2 </b> </td>
                                <td align="center"><b>0%</b></td>
                            </tr>
                            <tr>
                                <td>&emsp;&emsp; - Paket 3.1</td>
                                <td align="center">0% </td>
                            </tr>
                            <tr>
                                <td>&emsp;&emsp; - Paket 3.2</td>
                                <td align="center"> 0%</td>
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
                                <td align="center"><b>0%</b></td>
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

    <!-- Modal Detail Progres Lahan per Tahap -->
    <div class="modal fade none-border" id="progres_lahan_tahap">
        <div class="modal-dialog modal-lg" style="min-width: 800px">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><strong>Detail Progres Lahan per Tahap</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <!--  <a href="<?php echo site_url('Perizinan/add_perizinan') ?>" class="pull-right"><button type="button" class="btn btn-primary btn-mini"> Download</button></a> -->
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
                    <!--  <a href="<?php echo site_url('Perizinan/add_perizinan') ?>" class="pull-right"><button type="button" class="btn btn-primary btn-mini"> Download</button></a> -->
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th style="text-align: center; background-color: #da542e; color: white; "><b>Tahap Pekerjaan</b></th>
                                <th style="text-align: center; background-color: #da542e; color: white; "><b>Kontrak + PPN</b></th>
                                <th style="text-align: center; background-color: #da542e; color: white; "><b>Akrual Progres Konstruksi</b></th>
                                <!-- <th style="text-align: center; background-color: #da542e; color: white; "><b>%</b></th> -->
                                <th style="text-align: center; background-color: #da542e; color: white; "><b>Deviasi</b></th>
                                <!-- <th style="text-align: center; background-color: #da542e; color: white; "><b>%</b></th> -->

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
                            <!-- <tr>
                                    <td><b>Realisasi Setoran Modal s/d Nov 2024</b> </td>
                                    <td align="right"><b> Rp 2.860.537.000.000 </b></td>
                                    <td align="center"><b>67%</b></td>
                                </tr> -->
                            <!-- <tr>
                                    <td>&emsp;&emsp; -JSMR</td>
                                    <td align="right"> Rp 1.510.909.000.000 </td>
                                    <td align="center">52.82%</td>
                                </tr>
                                <tr>
                                    <td>&emsp;&emsp; -ADHI</td>
                                    <td align="right"> Rp 1.349.628.000.000 </td>
                                    <td align="center">47.18%</td>
                                </tr>
                                <tr style="color: blue">
                                    <td><b>Sisa Setoran Modal s/d Nov 2024</b></td>
                                    <td align="right"><b>Rp 1.379.412.500.000 </b></td>
                                    <td align="center"><b>33%</b></td>
                                </tr> -->
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
                    <!--  <a href="<?php echo site_url('Perizinan/add_perizinan') ?>" class="pull-right"><button type="button" class="btn btn-primary btn-mini"> Download</button></a> -->
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th style="text-align: center; background-color: #1d6296; color: white; "><b>No</b></th>
                                <th style="text-align: center; background-color: #1d6296; color: white; "><b>TW</b></th>
                                <th style="text-align: center; background-color: #1d6296; color: white; "><b>Keterangan</b></th>
                                <th style="text-align: center; background-color: #1d6296; color: white; "><b>Rencana (Rp.)</b></th>
                                <th style="text-align: center; background-color: #1d6296; color: white; "><b>Realisasi (Rp.)</b></th>
                                <th style="text-align: center; background-color: #1d6296; color: white; "><b>Deviasi (Rp.)</b></th>
                            </tr>
                        </thead>
                        <tbody id="detail_capex">
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

    <!-- Modal Detail Penyerapan Opex 2025 -->
    <div class="modal fade none-border" id="view_detailOpex">
        <div class="modal-dialog modal-lg" style="min-width: 800px">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><strong>Detail Penyerapan Opex TW I 2025</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <!--  <a href="<?php echo site_url('Perizinan/add_perizinan') ?>" class="pull-right"><button type="button" class="btn btn-primary btn-mini"> Download</button></a> -->
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th style="text-align: center; background-color: #1d6296; color: white; "><b>No</b></th>
                                <th style="text-align: center; background-color: #1d6296; color: white; "><b>TW</b></th>
                                <th style="text-align: center; background-color: #1d6296; color: white; "><b>Keterangan</b></th>
                                <th style="text-align: center; background-color: #1d6296; color: white; "><b>Rencana (Rp.)</b></th>
                                <th style="text-align: center; background-color: #1d6296; color: white; "><b>Realisasi (Rp.)</b></th>
                                <th style="text-align: center; background-color: #1d6296; color: white; "><b>Deviasi (Rp.)</b></th>
                            </tr>
                        </thead>
                        <tbody id="detail_opex">
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
                                <th style="text-align: center; vertical-align: middle; background-color: #1d6296; color: white; " rowspan="2"><b>No</b></th>
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
    <script src="<?php echo base_url('assets/dist/js/map-custom.js'); ?>"></script>

    <!-- Modul untuk dashboard -->
    <script src="<?php echo base_url('assets/dist/js/dashboard.js'); ?>"></script>

    <!-- Modul untuk highchart -->
    <script src="<?php echo base_url('assets/dist/js/highchart.js'); ?>"></script>

    <!-- Modul untuk view_detail_opex -->
    <script>
        function view_detail_opex(id) {
            function formatRupiah(angka) {
                angka = parseFloat(angka) || 0;
                return angka.toLocaleString('id-ID', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                });
            }
            $.ajax({
                type: "GET",
                url: "<?php echo site_url('Dashboard/get_detail_opex') ?>",
                data: {
                    id_tw: id
                },
                success: function(response) {
                    let data = "";
                    let totalRencana = 0;
                    let totalRealisasi = 0;
                    let totalDeviasi = 0;
                    const twList = ['', 'I', 'II', 'III', 'IV'];

                    $.each(JSON.parse(response), function(index, item) {
                        const limit = index + 1;
                        const tw = twList[item.tw] || '-';
                        const rencana = parseFloat(item.rencana) || 0;
                        const realisasi = parseFloat(item.realisasi) || 0;
                        const deviasi = rencana - realisasi;

                        totalRencana += rencana;
                        totalRealisasi += realisasi;
                        totalDeviasi += deviasi;

                        const warnaDeviasi = deviasi < 0 ? 'red' : 'green';

                        data += `
                                <tr>
                                    <td style="color:black; text-align:center;">${limit}</td>
                                    <td style="color:black; text-align:center;">${tw}</td>
                                    <td style="color:black;">${item.keterangan}</td>
                                    <td style="color:black; text-align:right;">${formatRupiah(rencana)}</td>
                                    <td style="color:black; text-align:right;">${formatRupiah(realisasi)}</td>
                                    <td style="color:${warnaDeviasi}; text-align:right;"><b>${formatRupiah(deviasi)}</b></td>
                                </tr>
                            `;
                    });

                    // Tambah baris total
                    data += `
                            <tr style="font-weight:bold; background-color:#f2f2f2;">
                                <td colspan="3" style="text-align:center; color:blue;">TOTAL</td>
                                <td style="color:blue; text-align:right;">${formatRupiah(totalRencana)}</td>
                                <td style="color:blue; text-align:right;">${formatRupiah(totalRealisasi)}</td>
                                <td style="color:blue; text-align:right;">${formatRupiah(totalDeviasi)}</td>
                            </tr>
                        `;

                    $("#detail_opex").html(data);
                }
            });

            $("#view_detailOpex").modal('show');
        }
    </script>

    <!-- Modul untuk view_detail_capex -->
    <script>
        function view_detail_capex(id) {
            function formatRupiah(angka) {
                angka = parseFloat(angka) || 0;
                return angka.toLocaleString('id-ID', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                });
            }

            $.ajax({
                type: "GET",
                url: "<?php echo site_url('Dashboard/get_detail_capex') ?>",
                data: {
                    id_tw: id
                },
                success: function(response) {
                    let data = "";
                    let totalRencana = 0;
                    let totalRealisasi = 0;
                    let totalDeviasi = 0;

                    const twList = ['', 'I', 'II', 'III', 'IV'];

                    $.each(JSON.parse(response), function(index, item) {
                        const limit = index + 1;
                        const tw = twList[item.tw] || '-';
                        const rencana = parseFloat(item.rencana) || 0;
                        const realisasi = parseFloat(item.realisasi) || 0;
                        const deviasi = rencana - realisasi;

                        totalRencana += rencana;
                        totalRealisasi += realisasi;
                        totalDeviasi += deviasi;

                        const warnaDeviasi = deviasi < 0 ? 'red' : 'green';

                        data += `
                                <tr>
                                    <td style="color:black; text-align:center;">${limit}</td>
                                    <td style="color:black; text-align:center;">${tw}</td>
                                    <td style="color:black;">${item.keterangan}</td>
                                    <td style="color:black; text-align:right;">${formatRupiah(rencana)}</td>
                                    <td style="color:black; text-align:right;">${formatRupiah(realisasi)}</td>
                                    <td style="color:${warnaDeviasi}; text-align:right;"><b>${formatRupiah(deviasi)}</b></td>
                                </tr>
                            `;
                    });

                    // Tambah baris total
                    data += `
                            <tr style="font-weight:bold; background-color:#f2f2f2;">
                                <td colspan="3" style="text-align:center; color:blue;">TOTAL</td>
                                <td style="color:blue; text-align:right;">${formatRupiah(totalRencana)}</td>
                                <td style="color:blue; text-align:right;">${formatRupiah(totalRealisasi)}</td>
                                <td style="color:blue; text-align:right;">${formatRupiah(totalDeviasi)}</td>
                            </tr>
                        `;

                    $("#detail_capex").html(data);
                }
            });

            $("#view_detailCapex").modal('show');
        }
    </script>


    <!-- Modul untuk view_debtEquity -->
    <script>
        function view_debtEquity(id) {
            if (id == 1) {
                $("#view_debt").modal('show');
            } else if (id == 2) {
                $("#view_equity").modal('show');
            }
        }
    </script>

    <!-- Modul untuk Rencana Realisas Tahap 1 -->
    <script>
        function view_biayatahap1() {
            console.log("Klik sukses, buka modal");
            $("#detail_biayatahap1").modal('show');
        }
    </script>

    <!-- Modul untuk Realisasi Rencana Hutang Tahap 1 -->
    <script>
        function view_realisasihutang() {
            console.log("Klik sukses, buka modal");
            $("#detail_realisasihutang").modal('show');
        }
    </script>

    <!-- Modul untuk Ekuitas Tahap 1 -->
    <script>
        function view_ekuitastahap1() {
            console.log("Klik sukses, buka modal");
            $("#detail_ekuitastahap1").modal('show');
        }
    </script>

    <!-- Modul untuk view_alert -->
    <script>
        function view_alert() {
            $("#div-alert").show();
        }
    </script>

    <!-- Modul untuk view_alert10 -->
    <script>
        function view_alert10() {
            $("#div-alert10").show();
        }
    </script>

    <!-- Modul untuk view_alert12 -->
    <script>
        function view_alert12() {
            $("#div-alert12").show();
        }
    </script>

    <!-- Modul untuk view_detail_sop9001 -->
    <script>
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
    </script>

    <!-- Modul untuk view_detail_sop14001 -->
    <script>
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
    </script>

    <!-- Modul untuk view_detail_sop45001 -->
    <script>
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
    </script>

    <!-- Modul untuk view_detail_sop37001 -->
    <script>
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
    </script>

    <!-- Modul untuk view_detaill -->
    <script>
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
    </script>

    <!-- Modul untuk view_kurang_dok_konstruksi -->
    <script>
        // Fungsi untuk menampilkan data kurang dokumen konstruksi
        function view_kurang_dok_konstruksi($id_dok) {
            $.ajax({
                type: "GET",
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
    </script>

    <!-- Modul untuk modal rencana investasi realisasi dan hutang tahap 1 -->
    <script>
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
    </script>

    <!-- Modul untuk view_dokProyek_konstruksi -->
    <script>
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
    </script>

    <!-- Modul untuk view_kurang_pembayaranKonstruksi -->
    <script>
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
    </script>

    <!-- Modul untuk view_kurang_pembayaranKonsultan -->
    <script>
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
    </script>

    <!-- Modul untuk view_kurang_dok_konsultan -->
    <script>
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
    </script>


    <script>
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
    </script>


    <script>
        Highcharts.chart('bar_progres', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Progres Jalan Tol Solo - Yogya - NYIA Kulonprogo',
                align: 'left'
            },

            xAxis: {
                // categories: ['Paket 1.1<br>Kartasura-Klaten<br><b>22.3 km</b>', 'Paket 1.2<br>Klaten-Purwomartani<br><b>20.08 km</b>','Paket 2.1A<br>Purwomartani-Maguwoharjo<br><b>3.725 km</b>','Paket 2.1B<br>Maguwoharjo-Monjali<br><b>5.7 km</b>','Paket 2.2A<br>Monjali-Trihanggo<br><b>2.8 km</b>','Paket 2.2B<br>Trihanggo-JC Sleman<br><b>3.24 km</b>','Paket 2.2C<br>JC Sleman-Gamping<br><b>7.96 km</b>','Paket 3.1<br>Gamping-Wates<br><b>17.45 km</b>','Paket 3.2<br>Wates-Purworejo<br><b>13.32 km</b>','Paket 3.3<br>Sentolo - Wates<br><b>7.995 km</b>','Paket 3.4<br>Wates - Kulonprogo<br><b>13.32 km</b>'],
                categories: ['Paket 1.1<br>Kartasura-Klaten<br><b>22.3 km</b>', 'Paket 1.2<br>Klaten-Purwomartani<br><b>20.08 km</b>', 'Paket 2.1A<br>Purwomartani-Maguwoharjo<br><b>3.725 km</b>', 'Paket 2.1B<br>Maguwoharjo-Monjali<br><b>5.7 km</b>', 'Paket 2.2A<br>Monjali-Trihanggo<br><b>2.8 km</b>', 'Paket 2.2B<br>Trihanggo-JC Sleman<br><b>3.24 km</b>', 'Paket 3.1<br>Junction Sleman-Gamping<br><b>7.417 km</b>', 'Paket 3.2<br>Gamping-Sentolo<br><b>10 km</b>', 'Paket 3.3<br>Sentolo-Wates<br><b>7.995 km</b>', 'Paket 3.4<br>Wates-Kulonprogo<br><b>10.331 km</b>', 'Paket 3.5<br>Kulonprogo - Purworejo<br><b>3.135 km</b>'],
                crosshair: true,
                accessibility: {
                    description: 'Countries'
                }
            },
            yAxis: {
                min: 0,
                max: 100,
                title: {
                    text: 'Progres (%)'
                }
            },
            tooltip: {
                valueSuffix: ' %',
                shared: true,
            },
            exporting: {
                enabled: false
            },
            plotOptions: {
                column: {
                    pointPadding: 0.1,
                    groupPadding: 0.3,
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.2f}%',
                        style: {
                            fontSize: '12px',
                            color: 'black'
                        }
                    },
                }
            },
            series: [{
                    name: 'Konstruksi',
                    data: [<?php echo $prog_fisik1 ?>, <?php echo $prog_fisik2 ?>, <?php echo $prog_fisik21a ?>, <?php echo $prog_fisik21b ?>, <?php echo $prog_fisik22a ?>, <?php echo $prog_fisik22b ?>, <?php echo $prog_fisik31 ?>, <?php echo $prog_fisik32 ?>, <?php echo $prog_fisik33 ?>, <?php echo $prog_fisik34 ?>, <?php echo $prog_fisik35 ?>],
                    color: '#FFb848'
                }, {
                    name: 'Pembebasan Lahan (UGK)',
                    data: [<?php echo $prog_lahan11 ?>, <?php echo $prog_lahan12 ?>, <?php echo $prog_lahan21a ?>, <?php echo $prog_lahan21b ?>, 0, <?php echo $prog_lahan22b ?>, <?php echo $prog_lahan31 ?>, <?php echo $prog_lahan32 ?>, <?php echo $prog_lahan33 ?>, <?php echo $prog_lahan34 ?>, <?php echo $prog_lahan35 ?>],
                    color: '#0077b6'
                }, {
                    name: 'RTA',
                    data: [<?php echo $prog_rta1 ?>, <?php echo $prog_rta2 ?>, <?php echo $prog_rta21a ?>, <?php echo $prog_rta21b ?>, <?php echo $prog_rta22a ?>, <?php echo $prog_rta22b ?>, <?php echo $prog_rta31 ?>, <?php echo $prog_rta32 ?>, <?php echo $prog_rta33 ?>, <?php echo $prog_rta34 ?>, <?php echo $prog_rta35 ?>],
                    color: '#28b779'
                },


            ]
        });

        Highcharts.chart('bar_opex', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Total Opex '
            },
            subtitle: {
                text: '2025'
            },
            xAxis: {
                categories: ['TW I', 'S.d TW II', 'S.d TW III', 'S.d TW IV'],
                title: {
                    text: null
                },
                gridLineWidth: 1,
                lineWidth: 0
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Nilai (Rp.)',
                    align: 'high'
                },
                labels: {
                    formatter: function() {
                        if (this.value > 100000000) return Highcharts.numberFormat(this.value / 1000000000, 1) + "M"; //  only switch if > 1000
                        return Highcharts.numberFormat(this.value, 0);
                    }
                },
                gridLineWidth: 0
            },
            tooltip: {
                valueSuffix: ' ',
                shared: true,
            },
            plotOptions: {
                bar: {
                    borderRadius: '50%',
                    dataLabels: {
                        enabled: true
                    },
                    groupPadding: 0.1,
                    point: {
                        events: {
                            click: function(e) {

                                var ids = this.z;
                                return view_detail_opex(ids);
                                // $('#progres_konstruksi_tahap').modal('show');


                            }
                        }
                    },
                }
            },
            legend: {
                enabled: true
            },
            credits: {
                enabled: false
            },
            series: [
                // {
                //     name: 'Rencana',
                //     data: [<?php echo $opex_rencana1 ?>, <?php echo $opex_rencana2 ?>, <?php echo $opex_rencana3 ?>, <?php echo $opex_rencana4 ?>],
                //     color : '#ffca3a'
                // }, {
                //     name: 'Realisasi',
                //     data: [<?php echo $opex_realisasi1 ?>, <?php echo $opex_realisasi2 ?>, <?php echo $opex_realisasi3 ?>, <?php echo $opex_realisasi4 ?>],
                //     color : '#1982c4'
                // },
                {
                    name: 'Rencana',
                    // data: [<?php echo $capex_rencana1 ?>, <?php echo $capex_rencana2 ?>, <?php echo $capex_rencana3 ?>, <?php echo $capex_rencana4 ?>],
                    data: [{
                            y: <?php echo $opex_rencana1; ?>,
                            z: 1,
                        },
                        {
                            y: <?php echo $opex_rencana2; ?>,
                            z: 2,
                        },
                        {
                            y: <?php echo $opex_rencana3; ?>,
                            z: 3,
                        },
                        {
                            y: <?php echo $opex_rencana4; ?>,
                            z: 4,
                        }
                    ],
                    color: '#ffca3a'
                },
                {
                    name: 'Realisasi',
                    // data: [<?php echo $capex_rencana1 ?>, <?php echo $capex_rencana2 ?>, <?php echo $capex_rencana3 ?>, <?php echo $capex_rencana4 ?>],
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

        Highcharts.chart('bar_capex', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Total Capex'
            },
            subtitle: {
                text: '2025'
            },
            xAxis: {
                categories: ['TW I', 'S.d TW II', 'S.d TW III', 'S.d TW IV'],

                gridLineWidth: 1,
                lineWidth: 0,
                labels: {
                    events: {
                        click: function(e) {

                            // var ids = this.z;
                            // return view_pra_audit(ids);
                            $('#progres_konstruksi_tahap').modal('show');


                        }
                    },

                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Nilai (Rp.)',
                    align: 'high'
                },
                // labels: {
                //     overflow: 'justify'
                // },
                labels: {
                    formatter: function() {
                        if (this.value > 100000000) return Highcharts.numberFormat(this.value / 1000000000, 1) + "M"; //  only switch if > 1000
                        return Highcharts.numberFormat(this.value, 0);
                    }
                },
                gridLineWidth: 0
            },
            tooltip: {
                // valueSuffix: ' T',
                shared: true,
                // split: true,
            },
            plotOptions: {
                bar: {
                    borderRadius: '50%',
                    dataLabels: {
                        enabled: true
                    },
                    groupPadding: 0.1,
                    point: {
                        events: {
                            click: function(e) {

                                var ids = this.z;
                                return view_detail_capex(ids);
                                // $('#progres_konstruksi_tahap').modal('show');


                            }
                        }
                    },
                }
            },
            legend: {
                enabled: true
            },
            credits: {
                enabled: false
            },
            series: [{
                    name: 'Rencana',
                    // data: [<?php echo $capex_rencana1 ?>, <?php echo $capex_rencana2 ?>, <?php echo $capex_rencana3 ?>, <?php echo $capex_rencana4 ?>],
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
                    // data: [<?php echo $capex_rencana1 ?>, <?php echo $capex_rencana2 ?>, <?php echo $capex_rencana3 ?>, <?php echo $capex_rencana4 ?>],
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
                // {
                //     name: 'Realisasi',
                //     data: [<?php echo $capex_realisasi1 ?>, <?php echo $capex_realisasi2 ?>, <?php echo $capex_realisasi3 ?>, <?php echo $capex_realisasi4 ?>],
                //     color : '#1982c4'
                // },
                //  {
                //     name: 'Deviasi',
                //     data: [1884452614, 4334660482, 17787390611, 9835122396]
                // }
            ]
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
            title: {
                text: 'Compliance Obligation'
            },
            subtitle: {
                text: '2024'
            },
            xAxis: {
                categories: ['Operation', 'Korporasi', 'Perizinan', 'Regulasi'],
                title: {
                    text: null
                },
                gridLineWidth: 1,
                lineWidth: 0
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Tingkat Kepatuhan (%)',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                },
                gridLineWidth: 0
            },
            tooltip: {
                valueSuffix: ' ',
                shared: true,
            },
            plotOptions: {
                bar: {
                    borderRadius: '50%',
                    dataLabels: {
                        enabled: true
                    },
                    groupPadding: 0.1
                }
            },
            legend: {
                enabled: true
            },
            credits: {
                enabled: false
            },
            series: [{
                    name: 'Total Kepatuhan',
                    data: [<?php echo $operasional_tot ?>, <?php echo $korporasi_tot ?>, <?php echo $perizinan_tot ?>, <?php echo $regulasi_tot ?>]
                }, {
                    name: 'Terpenuhi',
                    data: [<?php echo $operasional_ada ?>, <?php echo $korporasi_ada ?>, <?php echo $perizinan_ada ?>, <?php echo $regulasi_ada ?>]
                },
                {
                    name: 'Belum Terpenuhi',
                    data: [<?php echo $operasional_tdk ?>, <?php echo $korporasi_tdk ?>, <?php echo $perizinan_tdk ?>, <?php echo $regulasi_tdk ?>]
                }
            ]
        });


        <?php if ($this->session->userdata('level_user') == 1) { ?>

            Highcharts.chart('pie_kontrakKonsTol', {
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
                                    return view_kurang_dok_konstruksi(ids);
                                    // $('#view_kurang_konsultan').modal('show');


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
                            y: <?php echo $krg_penawaran_ksi ?>,
                            sliced: true,
                            selected: true,
                            z: 1,
                        }, {
                            name: 'SPMK',
                            y: <?php echo $krg_spmk_ksi ?>,
                            z: 10,
                        }, {
                            name: 'HPS',
                            y: <?php echo $krg_hps_ksi ?>,
                            z: 74,
                        }, {
                            name: 'Kontrak',
                            y: <?php echo $krg_kontrak_ksi ?>,
                            z: 11,
                        }, {
                            name: 'Permohonan IP',
                            y: <?php echo $krg_permohononanPrinsip_ksi ?>,
                            z: 52,
                        }, {
                            name: 'KUK',
                            y: <?php echo $krg_kuk_ksi ?>,
                            z: 12,
                        }, {
                            name: 'Persetujuan IP',
                            y: <?php echo $krg_persetujuanPrinsip_ksi ?>,
                            z: 53,
                        }, {
                            name: 'KAK',
                            y: <?php echo $krg_kak_ksi ?>,
                            z: 13,
                        }, {
                            name: 'Penunjukan <br>Pemenang',
                            y: <?php echo $krg_penunjukanPemenang_ksi ?>,
                            z: 3,
                        }, {
                            name: 'KKK',
                            y: <?php echo $krg_kkk_ksi ?>,
                            z: 75,
                        }, {
                            name: 'Jaminan Pelaksanaan',
                            y: <?php echo $krg_jaminanPelaksanaan_ksi ?>,
                            z: 73,
                        }, {
                            name: 'Daftar Kuantitasc& <br>Harga',
                            y: <?php echo $krg_harga_ksi ?>,
                            z: 14,
                        }, {
                            name: 'Jaminan Penawaran',
                            y: <?php echo $krg_jaminanPenawaran_ksi ?>,
                            z: 72,
                        },

                        {
                            name: 'IKP',
                            y: <?php echo $krg_ikp_ksi ?>,
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
                                    // $('#view_kurang_konsultan').modal('show');


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
                            name: 'Perhitungan MC',
                            y: <?php echo $bapp ?>,
                            sliced: true,
                            selected: true,
                            z: 71,
                        },
                        // {
                        //     name: 'BAST',
                        //     y: <?php echo $bast ?>,
                        //     z: 70,
                        // }, 
                        {
                            name: 'Backup Quantity',
                            y: <?php echo $b_quantity ?>,
                            z: 42,
                        }, {
                            name: 'Backup Quality',
                            y: <?php echo $b_quality ?>,
                            z: 43,
                        }, {
                            name: 'Laporan',
                            y: <?php echo $laporan ?>,
                            z: 44,
                        }, {
                            name: 'Copy Kontrak',
                            y: <?php echo $c_kontrak ?>,
                            z: 67,
                        }, {
                            name: 'Copy SPMK',
                            y: <?php echo $c_spmk ?>,
                            z: 66,
                        }, {
                            name: 'Copy SK PKP',
                            y: <?php echo $c_sk ?>,
                            z: 64,
                        }, {
                            name: 'NPWP Perusahaan',
                            y: <?php echo $c_npwp ?>,
                            z: 63,
                        }, {
                            name: 'Copy SBU',
                            y: <?php echo $c_sbu ?>,
                            z: 62,
                        }, {
                            name: 'Izin Usaha ',
                            y: <?php echo $izin_usaha ?>,
                            z: 60,
                        },
                        // {
                        //     name: 'Dokumentasi',
                        //     y: <?php echo $dokumentasi ?>,
                        //     z: 59,
                        // },
                        {
                            name: 'Tanda Daftar <br>Perusahaan',
                            y: <?php echo $tanda_daftar ?>,
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
                                    // $('#view_kurang_konsultan').modal('show');


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
                            y: <?php echo $bap_ksi ?>,
                            sliced: true,
                            selected: true,
                            z: 31,
                        }, {
                            name: 'Srt Permohonan Pembayaran',
                            y: <?php echo $spp_ksi ?>,
                            z: 32,
                        }, {
                            name: 'Kwitansi',
                            y: <?php echo $kwitansi_ksi ?>,
                            z: 33,
                        }, {
                            name: 'Faktur Pajak (PPN)',
                            y: <?php echo $faktur_ksi ?>,
                            z: 34,
                        },
                        // {
                        //     name: 'Perhitungan Pajak',
                        //     y: <?php echo $p_pajak ?>,
                        //     z: 79,
                        // },
                        // {
                        //     name: 'Disposisi Direksi',
                        //     y: <?php echo $d_direksi ?>,
                        //     z: 78,
                        // },
                        // {
                        //     name: 'Ijin Penggunaan Anggaran',
                        //     y: <?php echo $i_anggaran ?>,
                        //     z: 77,
                        // },
                        {
                            name: 'Nota Dinas',
                            y: <?php echo $nota ?>,
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
                                    // $('#view_kurang_konsultan').modal('show');


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
                            y: <?php echo $krg_penawaran_kst ?>,
                            sliced: true,
                            selected: true,
                            z: 1,
                        }, {
                            name: 'HPS',
                            y: <?php echo $krg_hps_kst ?>,
                            z: 74,
                        }, {
                            name: 'Permohonan Ijin Prinsip',
                            y: <?php echo $krg_permohononanPrinsip_kst ?>,
                            z: 52,
                        }, {
                            name: 'Persetujuan Ijin Prinsip',
                            y: <?php echo $krg_persetujuanPrinsip_kst ?>,
                            z: 53,
                        }, {
                            name: 'Penunjukan Pemenang',
                            y: <?php echo $krg_suratPenunjukan_kst ?>,
                            z: 3,
                        }, {
                            name: 'Jaminan Pelaksanaan',
                            y: <?php echo $krg_jaminanPelaksanaan_kst ?>,
                            z: 73,
                        }, {
                            name: 'Jaminan Penawaran',
                            y: <?php echo $krg_jaminanPenawaran_kst ?>,
                            z: 72,
                        }, {
                            name: 'SPMK',
                            y: <?php echo $krg_spmk_kst ?>,
                            z: 10,
                        }, {
                            name: 'Kontrak',
                            y: <?php echo $krg_kontrak_kst ?>,
                            z: 11,
                        }, {
                            name: 'KUK',
                            y: <?php echo $krg_ketUmum_kst ?>,
                            z: 12,
                        }, {
                            name: 'KAK',
                            y: <?php echo $krg_kak_kst ?>,
                            z: 13,
                        }, {
                            name: 'KKK',
                            y: <?php echo $krg_kkk_kst ?>,
                            z: 75,
                        }, {
                            name: 'Daftar Kuantitasa & Harga',
                            y: <?php echo $krg_kuantitas_kst ?>,
                            z: 14,
                        }, {
                            name: 'IKP',
                            y: <?php echo $krg_instruksi_kst ?>,
                            z: 15,
                        },




                    ]
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
                                    // $('#view_kurang_konsultan').modal('show');


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
                            y: <?php echo $bap_kst ?>,
                            sliced: true,
                            selected: true,
                            z: 31,
                        }, {
                            name: 'BAPP',
                            y: <?php echo $bapp_kst ?>,
                            z: 80,
                        }, {
                            name: 'BAST',
                            y: <?php echo $bast_kst ?>,
                            z: 81,
                        },
                        // {
                        //     name: 'Disposisi Direksi',
                        //     y: <?php echo $disposisi_kst ?>,
                        //     z: 78,
                        // },
                        {
                            name: 'Faktur Pajak (PPN)',
                            y: <?php echo $faktur_kst ?>,
                            z: 34,
                        },
                        // {
                        //     name: 'Ijin Penggunaan Anggaran',
                        //     y: <?php echo $ijin_kst ?>,
                        //     z: 77,
                        // },
                        {
                            name: 'Invoice',
                            y: <?php echo $invoice_kst ?>,
                            z: 82,
                        }, {
                            name: 'Kwintansi',
                            y: <?php echo $kwitansi_kst ?>,
                            z: 33,
                        }, {
                            name: 'Nota Dinas',
                            y: <?php echo $nota_kst ?>,
                            z: 76,
                        },
                        // {
                        //     name: 'Perhitungan Pajak',
                        //     y: <?php echo $perhitunganPjk_kst ?>,
                        //     z: 79,
                        // },
                        {
                            name: 'Surat Permohonan Pembayaran',
                            y: <?php echo $spp_kst ?>,
                            z: 32,
                        },

                    ]
                }]
            });


        <?php } ?>
    </script>

    <?php
    foreach ($data_seksi as $ds) {
        $prog_nilai = $this->db->query("select * from progres_nilai where seksi=" . $ds->id_seksi . " order by tgl_progres desc limit 1")->row_array();
        if (isset($prog_nilai['akrual_progres'])) {
            $realisasi_nilaii = number_format($prog_nilai['akrual_progres'] / 1000000000000, 2);
        } else {
            $realisasi_nilaii = 20;
        }

        if (isset($prog_nilai['deviasi_rupiah_akrual'])) {
            $deviasi_nilaii = number_format($prog_nilai['deviasi_rupiah_akrual'] / 1000000000000, 2);
        } else {
            $deviasi_nilaii = 20;
        }

        if (isset($prog_nilai['kontrak_ppn'])) {
            $kontrak_ppn = $prog_nilai['kontrak_ppn'];
        } else {
            $kontrak_ppn = 20;
        }

        // $persen_nilaii = ($prog_nilai['akrual_progres'] / $prog_nilai['kontrak_ppn']) * 100;
        $persen_nilaii = ($realisasi_nilaii / $kontrak_ppn) * 100;
        $persenNilai = number_format($persen_nilaii, 2);



    ?>

        <script>
            Highcharts.chart('progres_nilaii' + <?php echo $ds->id_seksi ?>, {
                chart: {
                    type: 'pie',
                    custom: {},
                    events: {
                        render() {
                            const chart = this,
                                series = chart.series[0];
                            let customLabel = chart.options.chart.custom.label;

                            if (!customLabel) {
                                customLabel = chart.options.chart.custom.label =
                                    chart.renderer.label(

                                        '<strong><?php echo $persenNilai ?>%</strong>'
                                    )
                                    .css({
                                        color: '#000',
                                        textAnchor: 'middle'
                                    })
                                    .add();
                            }

                            const x = series.center[0] + chart.plotLeft,
                                y = series.center[1] + chart.plotTop -
                                (customLabel.attr('height') / 2);

                            customLabel.attr({
                                x,
                                y
                            });
                            // Set font size based on chart diameter
                            customLabel.css({
                                fontSize: `${series.center[2] / 12}px`
                            });
                        }
                    }
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                title: {
                    text: '<?php echo $ds->seksi ?>'
                },

                tooltip: {
                    pointFormat: '{series.name}: <b>{point.y} T</b>'
                },
                legend: {
                    enabled: false
                },
                exporting: {
                    enabled: false
                },
                credits: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        borderRadius: 8,
                        dataLabels: [{
                            enabled: true,
                            distance: 20,
                            format: '{point.name}'
                        }, {
                            enabled: true,
                            distance: -15,
                            format: '{point.y:.3f} T',
                            style: {
                                fontSize: '0.7em'
                            }
                        }],
                        showInLegend: true
                    }
                },
                series: [{
                    name: 'Nilai',
                    colorByPoint: true,
                    innerSize: '65%',
                    data: [{
                        name: 'Realisasi',
                        y: <?php echo $realisasi_nilaii ?>,
                        color: '#118ab2'
                    }, {
                        name: 'Deviasi',
                        y: <?php echo $deviasi_nilaii ?>,
                        color: '#faa307'
                    }, ]
                }]
            });
        </script>
    <?php  } ?>
</body>

</html>