<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('') ?>assets/assets/images/favicon1.ico">
    <title>SIMJOS - JMJ</title>
    <!-- Custom CSS -->
    <link href="<?= base_url('') ?>assets/assets/libs/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" />
    <link href="<?= base_url('') ?>assets/assets/extra-libs/calendar/calendar.css" rel="stylesheet" />
    <link href="<?= base_url('') ?>assets/dist/css/style.min.css" rel="stylesheet">
    <link href="<?= base_url('') ?>assets/dist/css/new-style.css" rel="stylesheet">
    <link href="<?= base_url(''); ?>assets/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="<?= base_url(''); ?>assets/assets/libs/flot/css/float-chart.css" rel="stylesheet">
    <!-- Leaflet CSS & JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <link rel="stylesheet" type="text/css" href="<?= base_url(''); ?>assets/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.9.55/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.9.55/css/materialdesignicons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.9.55/css/materialdesignicons.css.map" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.9.55/css/materialdesignicons.min.css.map" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.9.55/fonts/materialdesignicons-webfont.eot" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.9.55/fonts/materialdesignicons-webfont.ttf" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.9.55/fonts/materialdesignicons-webfont.woff" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.9.55/fonts/materialdesignicons-webfont.woff2" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>

    <!-- jQuery -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="<?= base_url('Dashboard') ?>">
                        <!-- Logo icon -->
                        <b class="logo-icon p-l-10">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="<?php echo base_url('assets/assets/images/Simjos2.png') ?>" style="width:200px;height:50px;" alt="homepage" class="light-logo" />
                        </b>

                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"></a></li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata('nama'); ?></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url('') ?>assets/assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo site_url("Login/logout") ?>"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                <div class="dropdown-divider"></div>
                                <div class="p-l-30 p-10"><a href="javascript:void(0)" class="btn btn-sm btn-success btn-rounded">View Profile</a></div>
                            </div>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->

        <?php
        $dbs = "";
        $ast = "";
        $keu = "";


        if ($this->session->userdata('act_menu') == "dashboard") {
            $dbs = 'selected';
        } else if ($this->session->userdata('act_menu') == "aset") {
            $ast = 'selected';
        }

        ?>
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        <font color="#fff">&emsp; Main</font>
                        <li class="sidebar-item <?= $dbs; ?>"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo site_url('Dashboard') ?>" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                        <li class="sidebar-item "> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-book"></i><span class="hide-menu"> Buku Putih </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo site_url('Dokumen/dokumen_buku_putih'); ?>" class="sidebar-link"> <i class="mdi mdi-chevron-right"></i><span class="hide-menu"> Dokumen Buku Putih </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo site_url('Dokumen/riwayat_buku_putih'); ?>" class="sidebar-link"><i class="mdi mdi-chevron-right"></i><span class="hide-menu"> Riwayat Buku Putih </span></a></li>
                            </ul>
                        </li>

                        <li class="sidebar-item "> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-file-chart-outline"></i><span class="hide-menu"> Administrasi Aset </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo site_url('Kontrak/konstruksi'); ?>" class="sidebar-link"> <i class="mdi mdi-chevron-right"></i><span class="hide-menu"> Konstruksi Tol </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo site_url('Kontrak_konsultan'); ?>" class="sidebar-link"><i class="mdi mdi-chevron-right"></i><span class="hide-menu"> Konsultan Tol </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo site_url('Kontrak/nonTol'); ?>" class="sidebar-link"> <i class="mdi mdi-chevron-right"></i><span class="hide-menu"> Konstruksi non Tol </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo site_url('Kontrak_konsultan/nonTol'); ?>" class="sidebar-link"> <i class="mdi mdi-chevron-right"></i><span class="hide-menu"> Konsultan non Tol </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo site_url('Kontrak_konsultan/peralatanTol'); ?>" class="sidebar-link"> <i class="mdi mdi-chevron-right"></i><span class="hide-menu"> Kontrak Operasional </span></a></li>
                            </ul>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo site_url('Arsip') ?>" aria-expanded="false"><i class="mdi mdi-magnify"></i><span class="hide-menu">Pencarian Arsip</span></a></li>

                        <li class="sidebar-item "> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-chart-line"></i><span class="hide-menu">Monitoring Operasi</span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo site_url('Monitoring_operasi/volume'); ?>" class="sidebar-link"> <i class="mdi mdi-chevron-right"></i><span class="hide-menu">Perbandingan Volume</span></a></li>
                                <li class="sidebar-item"><a href="<?php echo site_url('Monitoring_operasi/pendapatan'); ?>" class="sidebar-link"><i class="mdi mdi-chevron-right"></i><span class="hide-menu">Perbandingan Pendapatan</span></a></li>
                            </ul>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-bulletin-board"></i><span class="hide-menu"> Progres Pekerjaan </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo site_url('Progres/progres_lahan'); ?>" class="sidebar-link"><i class="mdi mdi-chevron-right"></i><span class="hide-menu"> Progres Lahan </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo site_url('Progres/progres_fisik'); ?>" class="sidebar-link"><i class="mdi mdi-chevron-right"></i><span class="hide-menu"> Progres Fisik </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo site_url('Progres/rta'); ?>" class="sidebar-link"><i class="mdi mdi-chevron-right"></i><span class="hide-menu"> Progres RTA </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo site_url('Progres/progres_nilai'); ?>" class="sidebar-link"><i class="mdi mdi-chevron-right"></i><span class="hide-menu"> Progres Nilai </span></a></li>
                            </ul>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-credit-card"></i><span class="hide-menu"> Summary Keuangan </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo site_url('Keuangan/kredit_investasi'); ?>" class="sidebar-link"><i class="mdi mdi-chevron-right"></i><span class="hide-menu"> Kredit Investasi </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo site_url('Keuangan/ekuiti'); ?>" class="sidebar-link"><i class="mdi mdi-chevron-right"></i><span class="hide-menu"> Dana Ekuiti </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo site_url('Progres/alokasi_dtt'); ?>" class="sidebar-link"><i class="mdi mdi-chevron-right"></i><span class="hide-menu"> Alokasi Dana Tanah </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo site_url('Progres/penyerapan_dtt'); ?>" class="sidebar-link"><i class="mdi mdi-chevron-right"></i><span class="hide-menu"> Penyerapan Dana Tanah </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo site_url('Progres/pengembalian_lman'); ?>" class="sidebar-link"><i class="mdi mdi-chevron-right"></i><span class="hide-menu"> Pengembalian LMAN </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo site_url('Progres/fasilitas_dtt'); ?>" class="sidebar-link"><i class="mdi mdi-chevron-right"></i><span class="hide-menu"> Fasilitas DTT </span></a></li>
                            </ul>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo site_url('Issue') ?>" aria-expanded="false"><i class="mdi mdi-alert-circle"></i><span class="hide-menu">Early Warning System</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo site_url('Manajemen/resiko') ?>" aria-expanded="false"><i class="mdi mdi-shield-alert-outline"></i><span class="hide-menu">Manajemen Resiko</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-shield-check"></i><span class="hide-menu"> Compliance Obligation </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo site_url('Manajemen/kepatuhan_operasional'); ?>" class="sidebar-link"><i class="mdi mdi-chevron-right"></i><span class="hide-menu"> Operasional </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo site_url('Manajemen/kepatuhan_korporasi'); ?>" class="sidebar-link"><i class="mdi mdi-chevron-right"></i><span class="hide-menu"> Korporasi </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo site_url('Manajemen/kepatuhan_perizinan'); ?>" class="sidebar-link"><i class="mdi mdi-chevron-right"></i><span class="hide-menu"> Perizinan </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo site_url('Manajemen/kepatuhan_regulasi'); ?>" class="sidebar-link"><i class="mdi mdi-chevron-right"></i><span class="hide-menu"> Regulasi Internal </span></a></li>
                            </ul>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo site_url('Manajemen/kpi') ?>" aria-expanded="false"><i class="mdi mdi-trophy"></i><span class="hide-menu">Monitoring KPI</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo site_url('Monitoring/rkap'); ?>" aria-expanded="false"><i class="mdi mdi-cash-multiple"></i><span class="hide-menu">Monitoring RKAP</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-certificate"></i><span class="hide-menu">Manajemen Penerapan ISO </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo site_url('Audit/internal'); ?>" class="sidebar-link"><i class="mdi mdi-chevron-right"></i><span class="hide-menu"> Audit Internal </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo site_url('Audit/eksternal'); ?>" class="sidebar-link"><i class="mdi mdi-chevron-right"></i><span class="hide-menu"> Audit Eksternal </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo site_url('Dokumen/sop'); ?>" class="sidebar-link"><i class="mdi mdi-chevron-right"></i><span class="hide-menu"> SOP </span></a></li>
                            </ul>
                        </li>
                        <br>
                        <font color="#fff">&emsp; Dokumen</font>
                        <li class="sidebar-item d-none"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo site_url('Dokumen/kronologis') ?>" aria-expanded="false"><i class="mdi mdi-history"></i><span class="hide-menu">Kronologis</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-archive"></i><span class="hide-menu"> Dokumen Perusahaan </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo site_url('Dokumen/company_profile'); ?>" class="sidebar-link"><i class="mdi mdi-chevron-right"></i><span class="hide-menu"> Company Profile </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo site_url('Dokumen/korporasi'); ?>" class="sidebar-link"><i class="mdi mdi-chevron-right"></i><span class="hide-menu"> Dokumen Korporasi </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo site_url('Dokumen/pembiayaan'); ?>" class="sidebar-link"><i class="mdi mdi-chevron-right"></i><span class="hide-menu"> Dokumen Pembiayaan </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo site_url('Dokumen/dok_lain'); ?>" class="sidebar-link"><i class="mdi mdi-chevron-right"></i><span class="hide-menu"> Dokumen Lainnya </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a target="_Blank" class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('file_uploads/Manual_Simjos.pdf') ?>" aria-expanded="false"><i class="mdi mdi-help-circle-outline"></i><span class="hide-menu">Panduan Penggunaan</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo site_url('User') ?>" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">User</span></a></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <div class="page-wrapper">
            <?= $contents; ?>
            <footer class="footer text-center">
                Copyright 2024, Designed and Developed by <a href="https://www.jsmm.co.id/">Jasamarga Jogja Solo</a>.
            </footer>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?= base_url(''); ?>assets/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url(''); ?>assets/dist/js/jquery.ui.touch-punch-improved.js"></script>
    <script src="<?= base_url(''); ?>assets/dist/js/jquery-ui.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url(''); ?>assets/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?= base_url(''); ?>assets/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url(''); ?>assets/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?= base_url(''); ?>assets/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="<?= base_url(''); ?>assets/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?= base_url(''); ?>assets/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?= base_url(''); ?>assets/dist/js/custom.min.js"></script>
    <script src="<?= base_url(''); ?>assets/assets/libs/flot/excanvas.js"></script>
    <script src="<?= base_url(''); ?>assets/assets/libs/flot/jquery.flot.js"></script>
    <script src="<?= base_url(''); ?>assets/assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="<?= base_url(''); ?>assets/assets/libs/flot/jquery.flot.time.js"></script>
    <script src="<?= base_url(''); ?>assets/assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="<?= base_url(''); ?>assets/assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="<?= base_url(''); ?>assets/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="<?= base_url(''); ?>assets/dist/js/pages/chart/chart-page-init.js"></script>
    <script src="<?= base_url(''); ?>assets/assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="<?= base_url(''); ?>assets/assets/libs/select2/dist/js/select2.min.js"></script>

    <script src="<?= base_url(''); ?>assets/assets/libs/jquery-asColor/dist/jquery-asColor.min.js"></script>
    <script src="<?= base_url(''); ?>assets/assets/libs/jquery-asGradient/dist/jquery-asGradient.js"></script>
    <!-- <script src="<?= base_url(''); ?>assets/assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js"></script> -->
    <script src="<?= base_url(''); ?>assets/assets/libs/jquery-minicolors/jquery.minicolors.min.js"></script>

    <script src="<?= base_url(''); ?>assets/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

    <script src="<?= base_url(''); ?>assets/assets/libs/moment/min/moment.min.js"></script>
    <script src="<?= base_url(''); ?>assets/assets/libs/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="<?= base_url(''); ?>assets/dist/js/pages/calendar/cal-init.js"></script>

    <script src="<?= base_url(''); ?>assets/assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="<?= base_url(''); ?>assets/assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="<?= base_url(''); ?>assets/assets/extra-libs/DataTables/datatables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.textarea-editor').each(function() {
                generateCKEditor($(this));
            });
        });

        function generateCKEditor(selector) {
            ClassicEditor.create(selector[0])
                .catch(error => {
                    console.error(error);
                });
        }

        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
        $('#table2').DataTable();
        $('#table3').DataTable();
        $('#table4').DataTable();
        $('#dt_dataAddendumKontrak').DataTable({
            "columnDefs": [{
                "orderable": false,
                "targets": [1, 5, 6, 7, 8]
            }],
        });

        jQuery('.mydatepicker').datepicker();
        jQuery('#datepicker-autoclose').datepicker({
            autoclose: true,
            todayHighlight: true,
            format: 'd-m-yyyy'
        });

        $('#zero_config_no_sorting').DataTable({
            "ordering": false,
            "columnDefs": [{
                "width": "20px",
                "targets": [0]
            }]
        });
    </script>
</body>

</html>