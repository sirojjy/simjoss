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
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <title>JMRB</title>
    <!-- Custom CSS -->
    <link href="<?php echo base_url(''); ?>assets/assets/libs/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(''); ?>assets/assets/extra-libs/calendar/calendar.css" rel="stylesheet" />
    <link href="<?php echo base_url(''); ?>assets/assets/libs/flot/css/float-chart.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url(''); ?>assets/dist/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(''); ?>assets/assets/extra-libs/multicheck/multicheck.css">
    <link href="<?php echo base_url(''); ?>assets/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="<?php echo base_url(''); ?>assets/dist/css/style.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(''); ?>assets/assets/libs/select2/dist/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(''); ?>assets/assets/libs/jquery-minicolors/jquery.minicolors.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(''); ?>assets/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(''); ?>assets/assets/libs/quill/dist/quill.snow.css">

     <link href="<?php echo base_url(''); ?>assets/assets/libs/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(''); ?>assets/assets/extra-libs/calendar/calendar.css" rel="stylesheet" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
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
                    <a class="navbar-brand" href="index.html">
                       
                        <span class="logo-text" align="text-center">
                             <!-- dark Logo text -->
                             <img src="<?php echo base_url(''); ?>/assets/assets/images/download.PNG" width="240" class="light-logo" />
                            
                        </span>
                        <!-- Logo icon -->
                        <!-- <b class="logo-icon"> -->
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!-- <img src="../../assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->
                            
                        <!-- </b> -->
                        <!--End Logo icon -->
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
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                        <!-- ============================================================== -->
                        <!-- create new -->
                        <!-- ============================================================== -->
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             <span class="d-none d-md-block">Create New <i class="fa fa-angle-down"></i></span>
                             <span class="d-block d-md-none"><i class="fa fa-plus"></i></span>   
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li> -->
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                      <!--   <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="ti-close"></i></a>
                            </form>
                        </li> -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        
                        <li class="nav-item dropdown">
                            <font style="color: white">Admin</font>
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url(''); ?>/assets/assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
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
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        <li  class="sidebar-item "> <a href="<?php echo site_url('Dashboard'); ?>" class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu"> <b>DASHBOARD</b></span></a></li>
                        <!-- <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="charts.html" aria-expanded="false"><i class="mdi mdi-chart-bar"></i><span class="hide-menu">Charts</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="widgets.html" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Widgets</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="tables.html" aria-expanded="false"><i class="mdi mdi-border-inside"></i><span class="hide-menu">Tables</span></a></li> -->
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu"> <b>LEAD</b> </span></a>
                            <ul aria-expanded="false" class="collapse  first-level in">
                                <li class="sidebar-item"><a href="<?php echo site_url('Pemasaran/list_cor'); ?>" class="sidebar-link">&emsp;<i class="mdi mdi-note-outline"></i><span class="hide-menu"> Customer Prospective </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo site_url('Pemasaran/calon_klien'); ?>" class="sidebar-link">&emsp;<i class="mdi mdi-note-plus"></i><span class="hide-menu"> Customer Survey </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu"> <b>APPLICATION</b> </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="form-basic.html" class="sidebar-link">&emsp;<i class="mdi mdi-calendar"></i><span class="hide-menu"> Request </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo site_url('Pra_audit/kontrak'); ?>" class="sidebar-link">&emsp;<i class="mdi mdi-file-document"></i><span class="hide-menu"> Documentation </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo site_url('Pra_audit/invoice'); ?>" class="sidebar-link">&emsp;<i class="mdi mdi-package"></i><span class="hide-menu"> Collect Application Fee </span></a></li>
                                <li class="sidebar-item"><a href="form-wizard.html" class="sidebar-link">&emsp;<i class="mdi mdi-file-import"></i><span class="hide-menu"> Conduct Inspection </span></a></li>
                                <li class="sidebar-item"><a href="form-basic.html" class="sidebar-link">&emsp;<i class="mdi mdi-note-outline"></i><span class="hide-menu"> Prospect Enganged </span></a></li>
                                <!-- <li class="sidebar-item"><a href="form-wizard.html" class="sidebar-link">&emsp;<i class="mdi mdi-file-lock"></i><span class="hide-menu"> Form Aturan Logo </span></a></li> -->
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-pencil"></i><span class="hide-menu"> <b>LEASE SIGN</b> </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="icon-material.html" class="sidebar-link">&emsp;<i class="mdi mdi-file-check"></i><span class="hide-menu"> Prepare Documentation </span></a></li>
                                <li class="sidebar-item"><a href="icon-fontawesome.html" class="sidebar-link">&emsp;<i class="mdi mdi-file"></i><span class="hide-menu"> Get Lease Sign </span></a></li>
                                <li class="sidebar-item"><a href="icon-material.html" class="sidebar-link">&emsp;<i class="mdi mdi-file-check"></i><span class="hide-menu"> Security Deposit </span></a></li>
                                <li class="sidebar-item"><a href="icon-fontawesome.html" class="sidebar-link">&emsp;<i class="mdi mdi-file-presentation-box"></i><span class="hide-menu"> Collect Payment </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-relative-scale"></i><span class="hide-menu"> <b>FIT OUT/CONSTRUCTION</b> </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="icon-material.html" class="sidebar-link">&emsp;<i class="mdi mdi-file-presentation-box"></i><span class="hide-menu"> Initiation </span></a></li>
                                <li class="sidebar-item"><a href="icon-fontawesome.html" class="sidebar-link">&emsp;<i class="mdi mdi-file-presentation-box"></i><span class="hide-menu"> Design and Drawing</span></a></li>
                                <li class="sidebar-item"><a href="icon-fontawesome.html" class="sidebar-link">&emsp;<i class="mdi mdi-file-presentation-box"></i><span class="hide-menu"> Tender Approval</span></a></li>
                                <li class="sidebar-item"><a href="icon-fontawesome.html" class="sidebar-link">&emsp;<i class="mdi mdi-file-presentation-box"></i><span class="hide-menu"> Construction</span></a></li>
                                <li class="sidebar-item"><a href="icon-fontawesome.html" class="sidebar-link">&emsp;<i class="mdi mdi-file-presentation-box"></i><span class="hide-menu"> Design and Drawing</span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-relative-scale"></i><span class="hide-menu"> <b>TENANT OPERATION</b> </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="icon-material.html" class="sidebar-link">&emsp;<i class="mdi mdi-file-presentation-box"></i><span class="hide-menu"> Material Icons </span></a></li>
                                <li class="sidebar-item"><a href="icon-fontawesome.html" class="sidebar-link">&emsp;<i class="mdi mdi-file-presentation-box"></i><span class="hide-menu"> Font Awesome Icons </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-relative-scale"></i><span class="hide-menu"> <b>LEASE END</b> </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="icon-material.html" class="sidebar-link">&emsp;<i class="mdi mdi-file-presentation-box"></i><span class="hide-menu"> Material Icons </span></a></li>
                                <li class="sidebar-item"><a href="icon-fontawesome.html" class="sidebar-link">&emsp;<i class="mdi mdi-file-presentation-box"></i><span class="hide-menu"> Font Awesome Icons </span></a></li>
                            </ul>
                        </li>
                        <!-- <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="grid.html" aria-expanded="false"><i class="mdi mdi-face"></i><span class="hide-menu">Klien</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="grid.html" aria-expanded="false"><i class="mdi mdi-face"></i><span class="hide-menu">Auditor</span></a></li> -->
                       <!--  <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="pages-elements.html" aria-expanded="false"><i class="mdi mdi-pencil"></i><span class="hide-menu">Elements</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-move-resize-variant"></i><span class="hide-menu">Addons </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="index2.html" class="sidebar-link"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu"> Dashboard-2 </span></a></li>
                                <li class="sidebar-item"><a href="pages-gallery.html" class="sidebar-link"><i class="mdi mdi-multiplication-box"></i><span class="hide-menu"> Gallery </span></a></li>
                                <li class="sidebar-item"><a href="pages-calendar.html" class="sidebar-link"><i class="mdi mdi-calendar-check"></i><span class="hide-menu"> Calendar </span></a></li>
                                <li class="sidebar-item"><a href="pages-invoice.html" class="sidebar-link"><i class="mdi mdi-bulletin-board"></i><span class="hide-menu"> Invoice </span></a></li>
                                <li class="sidebar-item"><a href="pages-chat.html" class="sidebar-link"><i class="mdi mdi-message-outline"></i><span class="hide-menu"> Chat Option </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-key"></i><span class="hide-menu">Authentication </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="authentication-login.html" class="sidebar-link"><i class="mdi mdi-all-inclusive"></i><span class="hide-menu"> Login </span></a></li>
                                <li class="sidebar-item"><a href="authentication-register.html" class="sidebar-link"><i class="mdi mdi-all-inclusive"></i><span class="hide-menu"> Register </span></a></li>
                            </ul>
                        </li> -->
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-key"></i><span class="hide-menu"> <b>REPORT</b> </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo site_url('Master/iso'); ?>" class="sidebar-link"> &emsp;<i class="mdi mdi-drawing-box"></i><span class="hide-menu"> Floor Plan Display </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo site_url('Master/scope'); ?>" class="sidebar-link"> &emsp;<i class="mdi mdi-border-inside"></i><span class="hide-menu"> Future Contract </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo site_url('Master/klien'); ?>" class="sidebar-link"> &emsp;<i class="mdi mdi-account-check"></i><span class="hide-menu"> Zoning Analysis </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo site_url('Master/users'); ?>" class="sidebar-link"> &emsp;<i class="mdi mdi-face"></i><span class="hide-menu"> Service Charge </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo site_url('Master/klien'); ?>" class="sidebar-link"> &emsp;<i class="mdi mdi-account-check"></i><span class="hide-menu"> Meter Utility </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo site_url('Master/users'); ?>" class="sidebar-link"> &emsp;<i class="mdi mdi-face"></i><span class="hide-menu"> Deposit </span></a></li>
                                
                            </ul>
                        </li>
                        <li  class="sidebar-item "> <a href="<?php echo site_url('Pemasaran/profil'); ?>" class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu"> <b>REST AREA PROFIL</b></span></a></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
             
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
         
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <?php echo $contents; ?>


            <footer class="footer text-center">
                All Rights Reserved, Designed and Developed by <a href="https://qai.co.id">NGS Tech</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url(''); ?>assets/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url(''); ?>assets/dist/js/jquery.ui.touch-punch-improved.js"></script>
    <script src="<?php echo base_url(''); ?>assets/dist/js/jquery-ui.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url(''); ?>assets/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo base_url(''); ?>assets/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(''); ?>assets/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?php echo base_url(''); ?>assets/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url(''); ?>assets/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url(''); ?>assets/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url(''); ?>assets/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="../../dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="<?php echo base_url(''); ?>assets/assets/libs/flot/excanvas.js"></script>
    <script src="<?php echo base_url(''); ?>assets/assets/libs/flot/jquery.flot.js"></script>
    <script src="<?php echo base_url(''); ?>assets/assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url(''); ?>assets/assets/libs/flot/jquery.flot.time.js"></script>
    <script src="<?php echo base_url(''); ?>assets/assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="<?php echo base_url(''); ?>assets/assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="<?php echo base_url(''); ?>assets/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="<?php echo base_url(''); ?>assets/dist/js/pages/chart/chart-page-init.js"></script>

    <script src="<?php echo base_url(''); ?>assets/assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="<?php echo base_url(''); ?>assets/assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="<?php echo base_url(''); ?>assets/assets/extra-libs/DataTables/datatables.min.js"></script>

    <script src="<?php echo base_url(''); ?>assets/assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="<?php echo base_url(''); ?>assets/assets/libs/select2/dist/js/select2.min.js"></script>

    <script src="<?php echo base_url(''); ?>assets/assets/libs/jquery-asColor/dist/jquery-asColor.min.js"></script>
    <script src="<?php echo base_url(''); ?>assets/assets/libs/jquery-asGradient/dist/jquery-asGradient.js"></script>
    <!-- <script src="<?php echo base_url(''); ?>assets/assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js"></script> -->
    <script src="<?php echo base_url(''); ?>assets/assets/libs/jquery-minicolors/jquery.minicolors.min.js"></script>

    <script src="<?php echo base_url(''); ?>assets/assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="<?php echo base_url(''); ?>assets/assets/libs/select2/dist/js/select2.min.js"></script>

    <script src="<?php echo base_url(''); ?>assets/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url(''); ?>assets/assets/libs/quill/dist/quill.min.js"></script>

    <script src="<?php echo base_url(''); ?>assets/assets/libs/moment/min/moment.min.js"></script>
     <script src="<?php echo base_url(''); ?>assets/assets/libs/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="<?php echo base_url(''); ?>assets/dist/js/pages/calendar/cal-init.js"></script>
<script>
        //***********************************//
        // For select 2
        //***********************************//
        $(".select2").select2();

        /*colorpicker*/
        // $('.demo').each(function() {
        //
        // Dear reader, it's actually very easy to initialize MiniColors. For example:
        //
        //  $(selector).minicolors();
        //
        // The way I've done it below is just for the demo, so don't get confused
        // by it. Also, data- attributes aren't supported at this time...they're
        // only used for this demo.
        //
        // $(this).minicolors({
        //         control: $(this).attr('data-control') || 'hue',
        //         position: $(this).attr('data-position') || 'bottom left',

        //         change: function(value, opacity) {
        //             if (!value) return;
        //             if (opacity) value += ', ' + opacity;
        //             if (typeof console === 'object') {
        //                 console.log(value);
        //             }
        //         },
        //         theme: 'bootstrap'
        //     });

        // });
        /*datwpicker*/
        // jQuery('.mydatepicker').datepicker();
        // jQuery('#datepicker-autoclose').datepicker({
        //     autoclose: true,
        //     todayHighlight: true
        // });
        // var quill = new Quill('#editor', {
        //     theme: 'snow'
        // });

    </script>

    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();

        jQuery('.mydatepicker').datepicker();
        jQuery('#datepicker-autoclose').datepicker({
            autoclose: true,
            todayHighlight: true
        });
        var quill = new Quill('#editor', {
            theme: 'snow'
        });
    </script>

    <script type="text/javascript">
     $(".select2").select2();
     $(document).ready(function() {        

       
        

        $("#addRow").click(function() {
            var append = '<tr><td align="center" style="width: 30px; vertical-align: middle"><input type="checkbox" name="record"></td><td style="width: 300px"><input type="text" name="tahun[]" class="form-control" ></td><td style="width: 100px"><input type="text" name="tgl_registrasi[]" class="form-control" id="datepicker4"></td><td style="width: 200px"><input type="text" name="tgl_expiry[]" id="datepicker1"  class="form-control"></td><td style="width: 200px"><input type="text" name="tgl_reass[]" id="datepicker2"  class="form-control"></td></tr>"';
            $(".table-bangunan tbody").append(append);
        });

         $("#delete-row").click(function(){
             $("table tbody").find('input[name="record"]').each(function(){
                 if($(this).is(":checked")){
                     $(this).parents("tr").remove();
                 }
             });
         });

        jQuery('#datepicker1').datepicker({
            autoclose: true,
            todayHighlight: true
        });

        jQuery('#datepicker2').datepicker({
            autoclose: true,
            todayHighlight: true
        });
        jQuery('#datepicker4').datepicker({
            autoclose: true,
            todayHighlight: true
        });


       

     });
</script>

</body>

</html>