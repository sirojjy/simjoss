<style type="text/css">

        .hori-timeline .events {
            border-top: 5px solid green;
            border-radius: 10px;
        }

        .hori-timeline .events 
        .event-list {
            display: block;
            position: relative;
            text-align: center;
            margin-right: 0;
        }

         .inner-circle {
            border-radius: 1.5rem;
            height: 1rem;
            width: 1rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background-color: #3b82f6
        }

        .hori-timeline .events 
        .event-list:before {
            content: "";
            position: absolute;
            height: 36px;
            border-right: 2px dashed #2ddf36;
            top: 0;

        }

        .hori-timeline .events .event-list 
        .event-date {
            position: absolute;
            top: 38px;
            left: 0;
            right: 0;
            width: 75px;
            margin: 0 auto;
            border-radius: 4px;
            padding: 2px 4px;
        }


        @media (min-width: 1140px) {
            .hori-timeline .events 
            .event-list {
                display: inline-block;
                width: 19%;
                padding-top: 45px;
            }

            .hori-timeline .events 
            .event-list .event-date {
                top: -12px;
            }
        }

        .card {
            border: none;
            margin-bottom: 14px;
            box-shadow: 0 0 13px 0 rgba(236, 236, 241, 0.44);
        }

        .effect7
        {
            position:relative;
            box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
        }
        .effect7:before, .effect7:after
        {
            content:"";
            position:absolute;
            z-index:-1;
            box-shadow:0 0 20px rgba(0,0,0,0.8);
            top:0;
            bottom:0;
            left:10px;
            right:10px;
            border-radius:100px / 10px;
        }
        .effect7:after
        {
            right:10px;
            left:auto;
            transform:skew(8deg) rotate(3deg);
        }

         .circle {
        border-radius: 50%;
        width: 24px;
        height: 24px;
        padding: 10px;
        background: #fff;
        border: 3px solid #000;
        color: #000;
        text-align: center;
        font: 32px Arial, sans-serif;
      }
 .timeline-steps {
    display: flex;
    justify-content: center;
    flex-wrap: wrap
}

.timeline-steps .timeline-step {
    align-items: center;
    display: flex;
    flex-direction: column;
    position: relative;
    margin: 1rem
}

@media (min-width:768px) {
    .timeline-steps .timeline-step:not(:last-child):after {
        content: "";
        display: block;
        border-top: .25rem dotted #3b82f6;
        width: 3.46rem;
        position: absolute;
        left: 6rem;
        top: .3125rem
    }
    .timeline-steps .timeline-step:not(:first-child):before {
        content: "";
        display: block;
        border-top: .25rem dotted #3b82f6;
        width: 3.8125rem;
        position: absolute;
        right: 6rem;
        top: .3125rem
    }
}

.timeline-steps .timeline-content {
    width: 8.2rem;
    text-align: center
}

.timeline-steps .timeline-content .inner-circle {
    border-radius: 1.5rem;
    height: 1rem;
    width: 1rem;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background-color: #3b82f6
}

.timeline-steps .timeline-content .inner-circle:before {
    content: "";
    background-color: #3b82f6;
    display: inline-block;
    height: 2rem;
    width: 2rem;
    min-width: 2rem;
    border-radius: 6.25rem;
    opacity: .5
}
.timeline-steps .timeline-content .inner-circle2 {
    border-radius: 1.5rem;
    height: 1rem;
    width: 1rem;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background-color: #fb8500
}

.timeline-steps .timeline-content .inner-circle2:before {
    content: "";
    background-color: #fb8500;
    display: inline-block;
    height: 2rem;
    width: 2rem;
    min-width: 2rem;
    border-radius: 6.25rem;
    opacity: .5
}
.timeline-steps .timeline-content .inner-circle3 {
    border-radius: 1.5rem;
    height: 1rem;
    width: 1rem;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background-color: #e63946
}

.timeline-steps .timeline-content .inner-circle3:before {
    content: "";
    background-color: #e63946;
    display: inline-block;
    height: 2rem;
    width: 2rem;
    min-width: 2rem;
    border-radius: 6.25rem;
    opacity: .5
}
.timeline-steps .timeline-content .inner-circle4 {
    border-radius: 1.5rem;
    height: 1rem;
    width: 1rem;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background-color: #20bf55
}

.timeline-steps .timeline-content .inner-circle4:before {
    content: "";
    background-color: #20bf55;
    display: inline-block;
    height: 2rem;
    width: 2rem;
    min-width: 2rem;
    border-radius: 6.25rem;
    opacity: .5
}

.timeline-steps .timeline-content .inner-circle5 {
    border-radius: 1.5rem;
    height: 1rem;
    width: 1rem;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background-color: #03b1fc
}

.timeline-steps .timeline-content .inner-circle5:before {
    content: "";
    background-color: #03b1fc;
    display: inline-block;
    height: 2rem;
    width: 2rem;
    min-width: 2rem;
    border-radius: 6.25rem;
    opacity: .5
}

.comment-widgets .comment-row {
    border-bottom: 1px solid transparent;
    padding: 1px;
    padding-right: 14px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    margin: 0px 0;
}

</style> 

<style type="text/css">
        .leafleat-tooltip.no-background{
            background: transparent;
            border: 0;
            color: #fff;
        }
        .styleLabelBidang{
          /*background: rgba(255, 255, 255, 0);*/
          background: white;
          border: 0;
          border-radius: 0px;
          box-shadow: 0 0px 0px;
          font-size: 7pt;
          color: black;
          text-shadow: 2px 2px 5px white;
          /* font-weight: bold;*/
        }
        .styleLabelPermanent{
          background: rgba(255, 255, 255, 0);
          border: 0;
          border-radius: 0px;
          box-shadow: 0 0px 0px;
          font-size: 9pt;
          font-color: #fa003f;
          text-shadow: 2px 2px 5px white;
          /* font-weight: bold;*/
        }

        .hiddenRow {
            padding: 0 !important;
        }
        .legend {
        padding: 6px 8px;
        font: 14px Arial, Helvetica, sans-serif;
        background: white;
        background: rgba(255, 255, 255, 0.8);
        /*box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);*/
        /*border-radius: 5px;*/
        line-height: 24px;
        color: #555;
        }
        .legend h4 {
        text-align: center;
        font-size: 16px;
        margin: 2px 12px 8px;
        color: #777;
        }

        .legend span {
        position: relative;
        bottom: 3px;
        }

        .legend i {
        width: 18px;
        height: 18px;
        float: left;
        margin: 0 8px 0 0;
        opacity: 0.7;
        }

        .legend i.icon {
        background-size: 18px;
        background-color: rgba(255, 255, 255, 1);
        }

        .checked {
          color: orange;
        }
    </style>
<head>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <!-- <link href="<?php echo base_url('assets/gis/leaflet-search.css'); ?>" rel="stylesheet">
    <script src="<?php echo base_url('assets/gis/leaflet-search.js'); ?>"></script> -->
    <script src="https://unpkg.com/rbush@2.0.2/rbush.min.js"></script>
    <script src="https://unpkg.com/labelgun@6.1.0/lib/labelgun.min.js"></script>
</head>
<!-- <div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h3 class="page-title">Dashboard</h3>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div> -->

<div class="container-fluid">
    <!-- <hr style="color: blue"> -->
    <!-- <div class="card">
        <div class="">
            <div class="row">
                <div class="col-md-12 border-right p-r-0">
                    <div class="card-body border-bottom">
                        <h4 class="card-title m-t-10"><b>Trase Jalan Tol</b></h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                             <div class="col-md-12">
                                <div class="card ">
                                    <img src="<?php echo base_url(''); ?>/file_uploads/traseOkt.jpg" style="width: 100%; padding-right: 40px; padding-left: 40px" >
                                </div>
                            </div>  
                             
                        </div>
                        <br>

                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <div class="card">
        <div class="">
            <div class="row">
                <div class="col-md-12 border-right p-r-0">
                    <div class="card-body border-bottom" >
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
                        <h5 class="text-info" style="text-align: center"><a href="https://drive.google.com/file/d/1TeJOHom0_rcDdEc_78_lPMWOQS76AkIr/view" target="_blank"><u>View Detail Trase</u></a></h5>
                        <br>

                    </div>
                </div>
            </div>
        </div>
    </div>
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
                                            <b><font style="font-size: 25px">1. </font><br>Pra Perencanaan KPBU</b>
                                        </h5>

                                        <p class="text-info">
                                            26 Juni 2016 - <br>16 Maret 2018<br><br>
                                        </p>
                                        <div>
                                            <button 
                                               class="btn btn-primary btn-sm" onclick="view_pra_perencanaan(1)">
                                               View Detail
                                            </button>
                                        </div>
                                    </div>

                                </li>
                                <li class="list-inline-item event-list">
                                    <div class="px-4">

                                        <h5 class="font-size-16 " style="color:#fca311">
                                            <b><font style="font-size: 25px; " >2.</font><br> Perencanaan KPBU</b>

                                        </h5>
                                        <p class="text-info">
                                            4 Mei 2018 - <br>18 Oktober 2018<br><br>
                                        </p>
                                        <div>
                                            <button 
                                               class="btn btn-warning btn-sm" onclick="view_pra_perencanaan(2)">
                                               View Detail
                                            </button>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-inline-item event-list">
                                    <div class="px-4">

                                        <h5 class="font-size-16 text-danger">
                                            <b><font style="font-size: 25px">3.</font><br>Pembentukan BUJT</b>
                                        </h5>
                                        <p class="text-info">
                                            6 September 2019 - <br>20 Agustus 2024<br><br>
                                        </p>
                                        <div>
                                            <button 
                                               class="btn btn-danger btn-sm" onclick="view_pra_perencanaan(3)">
                                               View Detail
                                            </button>
                                        </div>
                                    </div>
                                </li>
                                
                                <li class="list-inline-item event-list ">
                                    <div class="px-4">

                                        <h5 class="font-size-16 text-success">
                                            <b><font style="font-size: 25px">4.</font><Br>Pelaksanaan PPJT</b>
                                        </h5>
                                        <p class="text-info">
                                            23 Agustus 2019 - <br> 15 November 2024<br><br>
                                        </p>
                                        <div>
                                            <button 
                                               class="btn btn-success btn-sm" onclick="view_pra_perencanaan(4)">
                                               View Detail
                                            </button>
                                        </div>
                                    </div>
                                </li>

                                <li class="list-inline-item event-list">
                                    <div class="px-4">

                                        <h5 class="font-size-16 text-info">
                                            <b><font style="font-size: 25px">5.</font><br>Tahap Operasional</b>
                                        </h5>

                                        <p class="text-primary">
                                        &emsp; - <br> <br> <br> 
                                        </p>
                                        <div>
                                            <button 
                                               class="btn btn-info btn-sm" onclick="view_pra_perencanaan(5)">
                                               View Detail
                                            </button>
                                        </div>
                                    </div>

                                </li>
                                
                            </ul>
                        </div>
                            </div>
                            
                        </div>
                        <br>
                        <p class="text-info"><i>Last updated : April 2025</i></p>
                    </div>
                </div>
        
    </div>
</div>
    <div class="card" id="div-pra_perencanaan" style="display: none;">
        <div class="">
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
                                        <?php $no=1; foreach ($row as $dt) { ?>
                                            <div class="timeline-step">
                                                <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="Pra Perencanaan KPBU">
                                                    <div class="inner-circle"></div>
                                                    <p class="h7 mt-1 mb-1 text-primary" style="font-size: 15px"><b><?php echo $no++ ?>.</b></p>
                                                    <p class="h7 mt-2 mb-1" style="font-size: 11px"><b><?php echo date('d-m-Y',strtotime($dt->tanggal)); ?></b></p>
                                                    
                                                    <p class="h6 text-primary mb-0 mb-lg-0" style="font-size: 13px"><a href="<?php echo base_url("file_uploads/dokumen/kronologis/$dt->file")?>" target="_blank" ><?php echo $dt->jenis_dok ?></a></p>
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
                                                            $no=1;
                                                            foreach ($sql as $dt) { ?>
                                                            <a href="<?php echo base_url("file_uploads/dokumen/kronologis/$dt->file")?>" target="_blank" ><?php echo $no++?>. <?php echo $dt->jenis_dok ?></a><br><br>

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
    </div>
    <div class="card" id="div-perencanaan" style="display: none;">
        <div class="">
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
                                            $no=1;
                                            foreach ($sql as $dt) { ?>
                                            <div class="timeline-step">
                                                <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="Perencanaan KPBU" style="">
                                                    <div class="inner-circle2"></div>
                                                    <p class="h7 mt-1 text-warning" style="font-size: 14px;"><b><?php echo $no++ ?>.</b></p>
                                                    <p class="h7 mt-1 mb-1" style="font-size: 11px"><b><?php echo date('d-m-Y',strtotime($dt->tanggal)); ?></b></p>
                                                    <p class="h6 mb-0 mb-lg-0" style="font-size: 13px; color:#6f1d1b"><a href="<?php echo base_url("file_uploads/dokumen/kronologis/$dt->file")?>" target="_blank" ><?php echo $dt->jenis_dok ?></a></p>
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
                                                            $no=1;
                                                            foreach ($sql as $dt) { ?>
                                                            <a href="<?php echo base_url("file_uploads/dokumen/kronologis/$dt->file")?>" target="_blank" ><?php echo $no++?>. <?php echo $dt->jenis_dok ?></a><br><br>

                                                        <?php } ?>
                                                        
                                                </div>
                                        </div>
                                        <?php  
                                            $sql = $this->db->query("select * from kronologis where id_kronologis in(22,23,32)  order by tanggal ASC")->result();
                                            $no=4;
                                            foreach ($sql as $dt) { ?>
                                            <div class="timeline-step">
                                                <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="Perencanaan KPBU" style="">
                                                    <div class="inner-circle2"></div>
                                                    <p class="h7 mt-1 text-warning" style="font-size: 14px;"><b><?php echo $no++ ?>.</b></p>
                                                    <p class="h7 mt-3 mb-1" style="font-size: 11px"><b><?php echo date('d-m-Y',strtotime($dt->tanggal)); ?></b></p>
                                                    <p class="h6 mb-0 mb-lg-0" style="font-size: 13px; color:#6f1d1b"><a href="<?php echo base_url("file_uploads/dokumen/kronologis/$dt->file")?>" target="_blank" ><?php echo $dt->jenis_dok ?></a></p>
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
    </div>
    <div class="card" id="div-penyiapan" style="display: none;">
        <div class="">
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
                                        <?php $no=1; foreach ($row31 as $dt) { ?>
                                            <div class="timeline-step">
                                                <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="Penyiapan KPBU" style="">
                                                    <div class="inner-circle3"></div>
                                                    <p class="h7 mt-1 text-danger" style="font-size: 14px;"><b><?php echo $no++ ?>.</b></p>
                                                    <p class="h7 mt-1 mb-1" style="font-size: 11px"><b><?php echo date('d-m-Y',strtotime($dt->tanggal)); ?></b></p>
                                                    <p class="h6 mb-0 mb-lg-0" style="font-size: 13px; color:#6f1d1b"><a href="<?php echo base_url("file_uploads/dokumen/kronologis/$dt->file")?>" target="_blank" ><?php echo $dt->jenis_dok ?></a></p>
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
    </div>
    <div class="card" id="div-pelaksanaan" style="display: none;">
        <div class="">
            <div class="row">
                <div class="col-md-12 border-right p-r-0">
                    <div class="card-body border-bottom">
                        <h4 class="card-title m-t-10 text-success"><b>Tahap V (Pelaksanaan PPJT)</b></h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                             <div class="col-md-12">
                                <div class="card ">
                                    <h5>I. Penyusunan Desain</h5>
                                    <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                                        <?php $no=1; foreach ($row41 as $dt) { ?>
                                            <div class="timeline-step">
                                                <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="Penyiapan KPBU" style="">
                                                    <div class="inner-circle4"></div>
                                                    <p class="h7 mt-1 text-success" style="font-size: 14px;"><b><?php echo $no++ ?>.</b></p>
                                                    <p class="h7 mt-1 mb-1" style="font-size: 11px"><b><?php echo date('d-m-Y',strtotime($dt->tanggal)); ?></b></p>
                                                    <p class="h6 mb-0 mb-lg-0" style="font-size: 13px; color:#6f1d1b"><a href="<?php echo base_url("file_uploads/dokumen/kronologis/$dt->file")?>" target="_blank" ><?php echo $dt->jenis_dok ?></a></p>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        
                                        
                                    </div>
                                </div>
                                <div class="card ">
                                    <h5>II. Pembebasan Lahan</h5>
                                    <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                                        <?php $no=1; foreach ($row42 as $dt) { ?>
                                            <div class="timeline-step">
                                                <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="Penyiapan KPBU" style="">
                                                    <div class="inner-circle4"></div>
                                                    <p class="h7 mt-1 text-success" style="font-size: 14px;"><b><?php echo $no++ ?>.</b></p>
                                                    <p class="h7 mt-1 mb-1" style="font-size: 11px"><b><?php echo date('d-m-Y',strtotime($dt->tanggal)); ?></b></p>
                                                    <p class="h6 mb-0 mb-lg-0" style="font-size: 13px; color:#6f1d1b"><a href="<?php echo base_url("file_uploads/dokumen/kronologis/$dt->file")?>" target="_blank" ><?php echo $dt->jenis_dok ?></a></p>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        
                                        
                                    </div>
                                </div>
                                <div class="card ">
                                    <h5>III. Pelaksanaan Pembangunan</h5>
                                    <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                                        <?php $no=1; foreach ($row43 as $dt) { ?>
                                            <div class="timeline-step">
                                                <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="Pelaksanaan PPJT" style="">
                                                    <div class="inner-circle4"></div>
                                                    <p class="h7 mt-1 text-success" style="font-size: 14px;"><b><?php echo $no++ ?>.</b></p>
                                                    <p class="h7 mt-1 mb-1" style="font-size: 11px"><b><?php echo date('d-m-Y',strtotime($dt->tanggal)); ?></b></p>
                                                    <p class="h6 mb-0 mb-lg-0" style="font-size: 13px; color:#6f1d1b"><a href="<?php echo base_url("file_uploads/dokumen/kronologis/$dt->file")?>" target="_blank" ><?php echo $dt->jenis_dok ?></a></p>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        
                                        
                                    </div>
                                </div>

                                <div class="card ">
                                    <h5>IV. Perolehan Pembiayaan Tambahan</h5>
                                    <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                                        <?php $no=1; foreach ($row44 as $dt) { ?>
                                            <div class="timeline-step">
                                                <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="Pelaksanaan PPJT" style="">
                                                    <div class="inner-circle4"></div>
                                                    <p class="h7 mt-1 text-success" style="font-size: 14px;"><b><?php echo $no++ ?>.</b></p>
                                                    <p class="h7 mt-1 mb-1" style="font-size: 11px"><b><?php echo date('d-m-Y',strtotime($dt->tanggal)); ?></b></p>
                                                    <p class="h6 mb-0 mb-lg-0" style="font-size: 13px; color:#6f1d1b"><a href="<?php echo base_url("file_uploads/dokumen/kronologis/$dt->file")?>" target="_blank" ><?php echo $dt->jenis_dok ?></a></p>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        
                                        
                                    </div>
                                </div>

                                 <div class="card ">
                                    <h5>V. Perubahan Anggaran Dasar</h5>
                                    <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                                        <?php $no=1; foreach ($row45 as $dt) { ?>
                                            <div class="timeline-step">
                                                <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="Pelaksanaan PPJT" style="">
                                                    <div class="inner-circle4"></div>
                                                    <p class="h7 mt-1 text-success" style="font-size: 14px;"><b><?php echo $no++ ?>.</b></p>
                                                    <p class="h7 mt-1 mb-1" style="font-size: 11px"><b><?php echo date('d-m-Y',strtotime($dt->tanggal)); ?></b></p>
                                                    <p class="h6 mb-0 mb-lg-0" style="font-size: 13px; color:#6f1d1b"><a href="<?php echo base_url("file_uploads/dokumen/kronologis/$dt->file")?>" target="_blank" ><?php echo $dt->jenis_dok ?></a></p>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        
                                        
                                    </div>
                                </div>
                                <hr>
                                <!-- <div class="card ">
                                    <h5>II. Fungsional/Operasional</h5>
                                    <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                                        <?php $no=1; foreach ($row42 as $dt) { ?>
                                            <div class="timeline-step">
                                                <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="Pelaksanaan PPJT" style="">
                                                    <div class="inner-circle4"></div>
                                                    <p class="h7 mt-1 text-success" style="font-size: 14px;"><b><?php echo $no++ ?>.</b></p>
                                                    <p class="h7 mt-1 mb-1" style="font-size: 11px"><b><?php echo date('d-m-Y',strtotime($dt->tanggal)); ?></b></p>
                                                    <p class="h6 mb-0 mb-lg-0" style="font-size: 13px; color:#6f1d1b"><a href="<?php echo base_url("file_uploads/dokumen/kronologis/$dt->file")?>" target="_blank" ><?php echo $dt->jenis_dok ?></a></p>
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
    </div>
    <div class="card" id="div-pengembalian" style="display: none;">
        <div class="">
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
                                        <?php $no=1; foreach ($row5 as $dt) { ?>
                                            <div class="timeline-step">
                                                <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="Pelaksanaan PPJT" style="">
                                                    <div class="inner-circle5"></div>
                                                    <p class="h7 mt-1 text-info" style="font-size: 14px;"><b><?php echo $no++ ?>.</b></p>
                                                    <p class="h7 mt-1 mb-1" style="font-size: 11px"><b><?php echo date('d-m-Y',strtotime($dt->tanggal)); ?></b></p>
                                                    <p class="h6 mb-0 mb-lg-0" style="font-size: 13px; color:#6f1d1b"><a href="<?php echo base_url("file_uploads/dokumen/kronologis/$dt->file")?>" target="_blank" ><?php echo $dt->jenis_dok ?></a></p>
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
    </div>
    <div class="card">
        <div class="">
            <div class="row">
                <div class="col-md-12 border-right p-r-0">
                    <div class="card-body border-bottom">
                        <h4 class="card-title m-t-10"><b>3. Monitoring Progres Pekerjaan</b>&nbsp;  <i class="mdi mdi-arrow-down-circle" style="color:red" onclick="view_alert()"></i></h4>
                        <div class="alert alert-danger" id="div-alert" style="display: none;" role="alert">
                          <b>PERMASALAHAN (Berdasarkan Target RKAP) :</b> <br>
                            <?php
                                                $no=1;
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
                                <div class="box bg-warning text-center" >
                                            <h4 class="font-light text-white"><b>Progres Konstruksi</b></h4><br>
                                            <h3 class="text-white mb-3" ><?php echo number_format($prog_fisik,2,',','.')?>%</h3>
                                            
                                            <!-- <h4 class="text-white">Rp. 2.345.899.000</h4> -->
                                </div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="#" data-toggle="modal" data-target="#progres_lahan_tahap">
                                <div class="box bg-info text-center" >
                                            <h4 class="font-light text-white"><b>Progres Pembebasan Lahan</b></h4><br>
                                            <h3 class="text-white mb-3"><?php echo number_format($prog_lahan,2,',','.')?>%</h3>
                                            <!-- <h4 class="text-white">Rp. 1.645.769.000</h4> -->
                                </div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="#" data-toggle="modal" data-target="#progres_rta_tahap">
                                <div class="box bg-success text-center" >
                                            <h4 class="font-light text-white"><b>Progres RTA</b></h4><br>
                                            <!-- <h3 class="text-white mb-3"><?php echo number_format($prog_rta,2,',','.')?>%</h3> -->
                                            <h3 class="text-white mb-3">86.2%</h3>
                                            <!-- <h4 class="text-white">Rp. 745.899.000</h4> -->
                                </div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="#" data-toggle="modal" data-target="#progres_nilai_tahap">
                                <div class="box bg-danger text-center" >
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
                                    <?php foreach($data_seksi as $ds){ ?>
                                        <div class="col-md-4">
                                            <div id="progres_nilaii<?php echo $ds->id_seksi ?>" style="height: 250px;"></div>
                                        </div>
                                    <?php } ?>
                                </div>
                                
                            </div>
                            
                        </div>
                        <br><p class="text-info mt-3"><i> Last updated : TW I 2025/Maret 2025</i></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="card">
        <div class="">
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
                        <p class="text-info mt-3"><i>Last updated : TW I 2025/Maret 2025 </i></p>
                    </div>
                </div>
            </div>
        </div>
    </div>                               
    <div class="card">
        <div class="">
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
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-8">
                                    <div class="alert alert-primary">
                                        <p align="center" style="font-size: 14px"><b><font color="blue">Total Rencana : Rp. <?php echo number_format($tot_opex_rencana,0,',','.') ?></font></b>
                                        <br><b><font color="blue">Total Realisasi : Rp. <?php echo number_format($tot_opex_realisasi,0,',','.') ?></font></b>
                                        <br><b><font color="red">Total Deviasi : Rp. <?php echo number_format($tot_opex_rencana-$tot_opex_realisasi,0,',','.') ?></font></b></p>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div id="bar_capex" style="height: 500px;"></div>
                                <div class="row">
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-8">
                                    <div class="alert alert-primary">
                                        <p align="center" style="font-size: 14px"><b><font color="blue">Total Rencana : Rp. <?php echo number_format($tot_capex_rencana,0,',','.') ?></font></b>
                                        <br><b><font color="blue">Total Realisasi : Rp. <?php echo number_format($tot_capex_realisasi,0,',','.') ?></font></b>
                                        <br><b><font color="red">Total Deviasi : Rp. <?php echo number_format($tot_capex_rencana-$tot_capex_realisasi,0,',','.') ?></font></b></p>
                                    </div>
                                </div>
                                </div>
                                
                            </div>
                        </div>
                        <p class="text-info mt-3"><i>Last updated : TW I 2025/Maret 2025</i></p>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <div class="card">
        <div class="">
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
                        <br><p class="text-info"><i>Last updated : TW I 2025/Maret 2025</i></p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card">
        <div class="">
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
                                        <div class="card-body border-bottom">
                                            <h4 class="text-info" style="text-align: center">Total Nilai Investasi Tahap 1</h4>
                                            <h4 class="text-info mt-3 mb-3" style="text-align: center"> Rp 14.133.165.000.000 </h4>
                                            <br><hr>
                                            <h4 class="text-danger" style="text-align: center">Hutang Tahap 1 (Debt)</h4>
                                            <h5 class="text-danger mt-3 mb-3" style="text-align: center">  Rp 9.893.215.500.000  </h5>
                                            <h4 class="text-danger" style="text-align: center">(70%)</h4><br>
                                            <hr>
                                            <h4 class="text-success" style="text-align: center">Ekuitas Tahap 1 (Equity)</h4>
                                            <h5 class="text-success mt-3 mb-3" style="text-align: center">  Rp 4.239.949.500.000  </h5>
                                            <h4 class="text-success" style="text-align: center">(30%)</h4>
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
                        <p class="text-info"><i>Last updated : TW I 2025/Maret 2025</i></p>

                    </div>
                </div>
            </div>
        </div>
    </div>

   <!--  <div class="card">
        <div class="">
            <div class="row">
                <div class="col-md-12 border-right p-r-0">
                    <div class="card-body border-bottom">
                        <h4 class="card-title m-t-10"><b>6. Monitoring Setoran Modal</b></h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                             <div class="col-md-4">
                                <div class="card" style="border-color: blue">
                                   
                                        <div class="box effect7">
                                            <h4  ><b>Modal PMN</b></h4><br>
                                            <h5 ><b>Total Setoran Modal : Rp.  1.318.428.000.000                                             </b> </h5>
                                            <h6 class="m-t-15" >Total Setoran Terpakai Rp.  1.214.505.722.173                                             </h6>
                                            <div class="progress m-t-15" style="height: 25px;">
                                                <div role="progressbar" style="width: 92%; background-color: #008ae2 !important; height: 25px;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" class="progress-bar">92.11%</div>                                  
                                            </div>
                                            <br>
                                        </div>
                                   
                                </div><br>
                            </div>  
                            <div class="col-md-4">
                                <div class="card" style="border-color: #2a9d8f">
                                    
                                        <div class="box effect7" style="border-color: blue">
                                            <h4 class=""><b>Modal Non PMN</b></h4><br>
                                            <h5 ><b>Total Setoran Modal : Rp.  1.542.109.000.000                                            </b></h5>
                                            <h6 class="m-t-15">Total Setoran Terpakai Rp.  1.160.096.906.162                                            </h6>
                                            <div class="progress  m-t-15" style="height: 25px;">
                                                        <div role="progressbar" style="width: 75%; background-color: #06d6a0 !important; height: 25px;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" class="progress-bar">75.22%</div>                                  
                                                    </div>
                                                    <br>
                                        </div>
                                    
                                </div><br>
                            </div>  
                            <div class="col-md-4">
                                <div class="card " style="border-color: #2a9d8f">
                                    
                                        <div class="box effect7">
                                            <h4 class=""><b>Total (PMN + Non PMN)</b></h4><br>
                                            <h5 ><b>Total Setoran Modal : Rp.  2.860.537.000.000                                             </b></h5>
                                            <h6 class="m-t-15">Total Setoran Terpakai Rp.  2.374.602.628.335                                            </h6>
                                            <div class="progress  m-t-15" style="height: 25px;">
                                                        <div role="progressbar" style="width: 83%;  background-color: #e63946 !important; height: 25px;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" class="progress-bar">83.01%</div>                                  
                                                    </div>
                                                    <br>
                                        </div>
                                    
                                </div><br>
                            </div> 
                        </div>
                        <p class="text-info"><i>Last updated : 15 November 2024</i></p>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
        

    <div class="card">
        <div class="">
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
                                            <h4 class="text-white text-center m-t-10">Rp.    147.383.167.561                                             </h4><br><br>
                                           
                                        </div>
                                    </a>
                                </div>
                            </div>  
                            <div class="col-md-3">
                                <div class="card card-hover">
                                    <a href="#">
                                        <div class="box bg-success">
                                            <h4 class="font-light text-white text-center"><b>Realisasi Pembayaran UGR</b></h4><br>
                                            <h4 class="text-white text-center">Rp.  147.383.167.561  </h4><br>
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
                                            <h4 class="text-white text-center">Rp. 61.546.215.531 </h4><br>
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
                                            <h4 class="text-white text-center">Rp.    85.836.952.030                                            </h4><br>
                                            <h4 class="text-white text-center">(58.25%)</h4>
                                            
                                        </div>
                                    </a>
                                </div>
                            </div> 
                        </div>
                        <p align="center"><button class="btn btn-info btn-sm" onclick="view_detail_dtt()">View Detail</button></p>
                        
                        <p class="text-info"><i>Last updated : Maret 2025</i></p>
                    </div>

                </div>
            </div>
        </div>
    </div>

     <div class="card" id="div-danaTalangan" style="display: none;">
        <div class="">
            <div class="row">
                <div class="col-md-12 border-right p-r-0">
                    <div class="card-body border-bottom">
                        <h4 class="card-title m-t-10"><b>Detail Monitoring Dana Talangan Tanah (DTT)</b></h4>
                    </div>
                    <div class="card-body">
                        
                        <table class="table-striped table mb-0">
                                <tbody>
                                    <tr style="background-color: #598392; color: white">
                                        <td><b>Sumber Dana</b></td>
                                        <td align="center"><b>Nilai</b></td>
                                        <td align="center"><b>Tahun</b></td>
                                        <td align="center"><b>Realisasi<br> UGR</b></td>
                                        <td align="center"><b>Lolos Verifikasi<br> BPKP</b></td>
                                        <td align="center"><b>Telah Dikembalikan<br> LMAN</b></td>
                                        <td align="center"><b>Outstanding Lolos<br> Verifikasi</b></td>
                                        <td align="center"><b>Outstanding Total</b></td>
                                    </tr>
                                    <tr>
                                        <td><b>Bank BRI </b></td>
                                        <td align="center"> 68.731.832.523 </td>
                                        <td align="center"><span class="badge badge-lg badge-pill badge-info " style="font-size: 14px">2023</span></td>
                                        <td align="right"> 68.731.832.523 </td>
                                        <td align="right">  60.169.045.418 </td>
                                        <td align="right" rowspan="2" style="vertical-align : middle;">   61.546.215.531 </td>
                                        <td align="right" rowspan="2" style="vertical-align : middle;">   -1.294.209.381 </td>
                                        <td align="right" rowspan="2" style="vertical-align : middle;">     85.836.952.030 </td>
                                    </tr>
                                    <tr>
                                        <td><b>Maybank</b></td>
                                        <td align="center">    78.651.335.038    </td>
                                        <td align="center"><span class="badge badge-lg badge-pill badge-info " style="font-size: 14px">2024</span></td>
                                        <td align="right">  78.651.335.038 </td>
                                        <td align="right">  82.960.732 </td>
                                        <!-- <td align="right">  60.169.045.418 </td> -->
                                    </tr>
                                    <tr>
                                        <td><b>TOTAL</b></td>
                                        <td align="center">  <b>  147.383.167.561  </b></td>
                                        <td align="center"></td>
                                        <td align="right">   <b>147.383.167.561 </b> </td>
                                        <td align="right">   <b> 60.252.006.150  </b> </td>
                                        <td align="right">  <b> 61.546.215.531 </b> </td>
                                        <td align="right">  <b> -1.294.209.381 </b> </td>
                                        <td align="right">  <b>  85.836.952.030  </b> </td>
                                    </tr>
                                   
                                </tbody>
                            </table>
                        <br>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 border-right p-r-0">
                    <div class="card-body border-bottom">
                        <h4 class="card-title m-t-10"><b>Detail Monitoring Pembayaran Langsung (PL)</b></h4>
                    </div>
                    <div class="card-body">
                        
                        <table class="table-striped table mb-0">
                                <tbody>
                                    <tr style="background-color: #e76f51; color: white">
                                        <td><b>Tahun</b></td>
                                        <td align="center"><b>Alokasi Dana Tanah</b></td>
                                        <td align="center"><b>Realisasi</b></td>
                                        <td align="center"><b>Carry Over</b></td>
                                        <td align="center"><b>File</b></td>
                                    </tr>
                                    <tr>
                                        <td><b>2020 </b></td>
                                        <td align="right"> Rp 1,300,000,000,000</td>
                                        <td align="right">  Rp 244,838,598,764 </td>
                                        <td align="right">  Rp 1,055,161,401,236 </td>
                                        <td align="center">
                                            <!-- <a href="<?php echo base_url("file_uploads/dokumen_pl/")?>" target="_blank" class="btn btn-info btn-sm" ><i class="fa fa-print"></i></a> -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>2021 </b></td>
                                        <td align="right"> Rp 2,555,161,401,236</td>
                                        <td align="right"> Rp 2,155,251,838,386</td>
                                        <td align="right"> Rp 399,909,562,850</td>
                                        <td align="center"><a href="<?php echo base_url("file_uploads/dokumen_pl/PL_2021")?>" target="_blank" class="btn btn-info btn-sm" ><i class="fa fa-print"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td><b>2022 </b></td>
                                        <td align="right"> Rp 5,459,120,766,875</td>
                                        <td align="right"> Rp 2,982,010,362,637</td>
                                        <td align="right"> Rp 2,477,110,404,231</td>
                                        <td align="center"><a href="<?php echo base_url("file_uploads/dokumen_pl/PL_2022")?>" target="_blank" class="btn btn-info btn-sm" ><i class="fa fa-print"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td><b>2023 </b></td>
                                        <td align="right">Rp 7,661,149,454,668 </td>
                                        <td align="right">Rp 3,373,085,857,582 </td>
                                        <td align="right">Rp 4,288,063,597,079 </td>
                                        <td align="center"><a href="<?php echo base_url("file_uploads/dokumen_pl/PL_2023")?>" target="_blank" class="btn btn-info btn-sm" ><i class="fa fa-print"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td><b>2024 </b></td>
                                        <td align="right">Rp 3,188,063,597,086 </td>
                                        <td align="right">Rp 1,817,572,676,791 </td>
                                        <td align="right">Rp 1,370,490,920,288 </td>
                                        <td align="center"><a href="<?php echo base_url("file_uploads/dokumen_pl/PL_2024")?>" target="_blank" class="btn btn-info btn-sm" ><i class="fa fa-print"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td><b>2025 </b></td>
                                        <td align="right">Rp 1,270,490,920,295 </td>
                                        <td align="right">Rp 3,524,426,474 </td>
                                        <td align="right">Rp 1,266,966,493,814 </td>
                                        <td align="center"><a href="<?php echo base_url("file_uploads/dokumen_pl/PL_2025")?>" target="_blank" class="btn btn-info btn-sm" ><i class="fa fa-print"></i></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        <br>

                    </div>
                    <p style="text-align: center"><a href="<?php echo base_url('file_uploads/pl_detail.pdf') ?>" class="btn btn-info" target="_blank"><u>View Detail</u></a></p>
                </div>

            </div>
        </div>
    </div>

    <div class="card" >
        <div class="">
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
                                        <td><b>Pencapaian Nilai Eksposur Risiko dibandingkan dengan target Risiko Residual   </b></td>
                                        <td align="center"> <span class="badge badge-lg badge-pill badge-success " style="font-size: 13px">30%</span></td>                    
                                        <td align="right"> 5.63 </td>
                                        <td align="right"> 1.88 </td>
                                        <td align="center" >   3</td>
                                        <td align="center">   90</td>
                                        <td align="center"><b>27</b></td>
                                    </tr>
                                    <tr>
                                        <td align="right"><b>2. </b></td>
                                        <td><b>Pencapaian output pelaksanaan perlakuan Risiko dibandingkan dengan target total output pelaksanaan risiko</b></td>
                                        <td align="center"> <span class="badge badge-lg badge-pill badge-success " style="font-size: 13px">20%</span></td>                    
                                        <td align="right"> 100 </td>
                                        <td align="right"> 100 </td>
                                        <td align="center" >   5</td>
                                        <td align="center">   100</td>
                                        <td align="center"><b>20</b></td>
                                    </tr>
                                    <tr>
                                        <td align="right"><b>3.</b> </td>
                                        <td><b>Realisasi biaya pelaksanaan perlakuan Risiko dibandingkan dengan anggaran </b></td>
                                        <td align="center"> <span class="badge badge-lg badge-pill badge-success " style="font-size: 13px">20%</span></td>                    
                                        <td align="right">   9.200.000.000  </td>
                                        <td align="right">  930.000.000 </td>
                                        <td align="center" >   2</td>
                                        <td align="center">   80</td>
                                        <td align="center"><b>16</b></td>
                                    </tr>
                                    <tr>
                                        <td align="right"><b>4. </b></td>
                                        <td><b>Ketepatan penilaian Risiko yang meliputi : identifikasi risiko, kuantifikasi risiko, rencana perlakuan risiko, dan prioritisasi risiko  </b></td>
                                        <td align="center"> <span class="badge badge-lg badge-pill badge-success " style="font-size: 13px">30%</span></td>                    
                                        <td align="right">  </td>
                                        <td align="right">  </td>
                                        <td align="center" >   </td>
                                        <td align="center">   90</td>
                                        <td align="center"><b>27</b></td>
                                    </tr>
                                    <tr>
                                        <td align="right"> </td>
                                        <td><b>4.1.&emsp; Ketepatan penilaian Risiko </b></td>
                                        <td align="center"> 25%</td>                    
                                        <td align="right">  </td>
                                        <td align="right"> Tidak ada </td>
                                        <td align="center" >  2 </td>
                                        <td align="center">   90</td>
                                        <td align="center"><b>22.5</b></td>
                                    </tr>
                                    <tr>
                                        <td align="right"> </td>
                                        <td><b>4.2.&emsp; Ketepatan kuantifikasi Risiko </b></td>
                                        <td align="center"> 25%</td>                    
                                        <td align="right">  </td>
                                        <td align="right">  </td>
                                        <td align="center" >  2 </td>
                                        <td align="center">   90</td>
                                        <td align="center"><b>22.5</b></td>
                                    </tr>
                                    <tr>
                                        <td align="right"> </td>
                                        <td><b>4.3.&emsp; Ketepatan rencana perlakuan Risiko </b></td>
                                        <td align="center"> 25%</td>                    
                                        <td align="right"> 5.63 </td>
                                        <td align="right"> 1.88 </td>
                                        <td align="center" >  2 </td>
                                        <td align="center">   90</td>
                                        <td align="center"><b>22.5</b></td>
                                    </tr>
                                    <tr>
                                        <td align="right"> </td>
                                        <td><b>4.4.&emsp; Ketepatan prioritas Risiko </b></td>
                                        <td align="center"> 25%</td>                    
                                        <td align="right">  </td>
                                        <td align="right"> Tidak ada </td>
                                        <td align="center" >  2 </td>
                                        <td align="center">   90</td>
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
                            &emsp;<p class="text-info"><i>Last updated : TW I 2025/Maret 2025</i></p>
                        

                    </div>

                </div>

            </div>

        </div>

    </div>

    

    <div class="card">
        <div class="">
            <div class="row">
                <div class="col-md-12 border-right p-r-0">
                    <div class="card-body border-bottom">
                        <h4 class="card-title m-t-10"><b>10. Kewajiban Kepatuhan JMJ</b> &nbsp;  <i class="mdi mdi-arrow-down-circle" style="color:red" onclick="view_alert10()"></i></h4>
                        <div class="alert alert-danger" id="div-alert10" style="display: none;" role="alert">
                          <b>PERMASALAHAN  :</b> <br>
                            <?php
                                                $no=1;
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

                                            <div class="box bg-info text-center" data-toggle="modal" data-target="#table_kepatuhan" data-judul="OPERASIONAL" data-id="1">
                                                <h4 class="font-light text-white"><b>Operasional</b></h4><br>
                                                <h3 class="text-white mb-3" ><?php echo round(($operasional_ada/$operasional_tot*100),2) ?>%</h3>
                                                <span class="badge badge-lg badge-pill badge-success " style="font-size: 12px; background-color: #e2fdff; color: black">Total : <?php echo $operasional_tot ?></span>&emsp; <span class="badge badge-lg badge-pill badge-success " style="font-size: 12px; background-color: #caffbf; color: black">Ada : <?php echo $operasional_ada ?></span>&emsp; <span class="badge badge-lg badge-pill badge-success " style="font-size: 12px; background-color: #f4f1bb; color: black">Tidak Ada : <?php echo $operasional_tdk ?></span>
                                                <!-- <h4 class="text-white">Rp. 2.345.899.000</h4> -->
                                            </div>
                                        <!-- </a> -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="box bg-success text-center" data-toggle="modal" data-target="#table_kepatuhan" data-judul="KORPORASI" data-id="2">
                                            <h4 class="font-light text-white"><b>Korporasi</b></h4><br>
                                            <h3 class="text-white mb-3" ><?php echo round(($korporasi_ada/$korporasi_tot*100),2) ?>%</h3>
                                            <span class="badge badge-lg badge-pill badge-success " style="font-size: 12px; background-color: #e2fdff; color: black">Total : <?php echo $korporasi_tot?></span>&emsp; <span class="badge badge-lg badge-pill badge-success " style="font-size: 12px; background-color: #caffbf; color: black">Ada : <?php echo $korporasi_ada ?></span>&emsp; <span class="badge badge-lg badge-pill badge-success " style="font-size: 12px; background-color: #f4f1bb; color: black">Tidak Ada : <?php echo $korporasi_tdk ?></span>
                                            <!-- <h4 class="text-white">Rp. 2.345.899.000</h4> -->
                                        </div>
                                    </div>
                                </div>
                                <br><br>
                                <div class="row"> 
                                    <div class="col-md-6">
                                        <div class="box bg-warning text-center" data-toggle="modal" data-target="#table_kepatuhan" data-judul="PERIZINAN" data-id="3">
                                            <h4 class="font-light text-white"><b>Perizinan</b></h4><br>
                                            <h3 class="text-white mb-3" ><?php echo round(($perizinan_ada/$perizinan_tot*100),2) ?>%</h3>
                                            <span class="badge badge-lg badge-pill badge-success " style="font-size: 12px; background-color: #e2fdff; color: black">Total : <?php echo $perizinan_tot?></span>&emsp; <span class="badge badge-lg badge-pill badge-success " style="font-size: 12px; background-color: #caffbf; color: black">Ada : <?php echo $perizinan_ada?></span>&emsp; <span class="badge badge-lg badge-pill badge-success " style="font-size: 12px; background-color: #f4f1bb; color: black">Tidak Ada : <?php echo $perizinan_tdk?></span>
                                            <!-- <h4 class="text-white">Rp. 2.345.899.000</h4> -->
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="box bg-danger text-center" data-toggle="modal" data-target="#table_kepatuhan" data-judul="REGULASI INTERNAL" data-id="4">
                                            <h4 class="font-light text-white"><b>Regulasi Internal</b></h4><br>
                                            <h3 class="text-white mb-3" ><?php echo round(($regulasi_ada/$regulasi_tot*100),2) ?>%</h3>
                                            <span class="badge badge-lg badge-pill badge-success " style="font-size: 12px; background-color: #e2fdff; color: black">Total : <?php echo $regulasi_tot?></span>&emsp; <span class="badge badge-lg badge-pill badge-success " style="font-size: 12px; background-color: #caffbf; color: black">Ada : <?php echo $regulasi_ada ?></span>&emsp; <span class="badge badge-lg badge-pill badge-success " style="font-size: 12px; background-color: #f4f1bb; color: black">Tidak Ada : <?php echo $regulasi_tdk?></span>
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
    </div>

    <div class="card">
        <div class="">
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
                                        <div class="p-2"><img src="<?php echo base_url("file_uploads/galeri/9001.PNG")?>" alt="user" width="50" class="rounded-circle"></div>
                                        <div class="comment-text w-100">
                                            <h6 class="font-medium"><b>ISO 9001:2015 Sistem Manajemen Mutu</b></h6> <span class="badge badge-pill badge-info float-left">Aktif</span><br>
                                            <span class="m-b-5 d-block">No. Sertifikat :  QAIC/ID/11127-A</span>
                                            <!-- <span class="m-b-15 d-block">Scope :   Provision of Administration Service, Project Management and Traffic Management Toll Roads</span> -->
                                            <br>

                                        </div>

                                    </div>
                                    <div class="comment-footer" style="text-align:center;">

                                        <!-- <span class="text-muted">29 December 2025</span> <br> -->
                                        <!-- <button type="button" class="btn btn-success btn-sm" onclick='return view_detail_sop9001()'><?php echo $sop_9001?> SOP</button> -->
                                        <button type="button" class="btn btn-success btn-sm" onclick='return view_detail_sop9001()'>SOP Terkait</button>
                                        <a href="<?php echo base_url("file_uploads/sertifikat/sertifikat_jmj_9001_2024.pdf")?>" target="_blank" class="btn btn-cyan btn-sm " >Lihat Sertifikat</a>

                                        <!-- <button type="button" class="btn btn-danger btn-sm">Delete</button> -->


                                    </div>
                                    
                                    
                                </div>
                            </div>
                            <div class="col-md-3">
                                    <div class="comment-widgets scrollable">
                                    
                                    <div class="d-flex flex-row comment-row m-t-0">
                                        <div class="p-2"><img src="<?php echo base_url("file_uploads/galeri/14001.PNG")?>" alt="user" width="50" class="rounded-circle"></div>
                                        <div class="comment-text w-100">
                                            <h6 class="font-medium"><b>ISO 14001:2015 Sistem Manajemen Lingkungan</b></h6> <span class="badge badge-pill badge-info float-left">Aktif</span><br>
                                            <span class="m-b-5 d-block">No. Sertifikat :  QAIC/ID/11127-B</span>
                                            <!-- <span class="m-b-15 d-block">Scope :  Provision of Administration Service, Project Management and Traffic Management Toll Roads</span> -->
                                            <br>
                                            
                                        </div>

                                    </div>

                                    <div class="comment-footer" style="text-align:center;">

                                                <span class="text-muted float-right"></span> 
                                                <!-- <button type="button" class="btn btn-success btn-sm"  onclick='return view_detail_sop14001()'><?php echo $sop_14001?> SOP</button> -->
                                                <button type="button" class="btn btn-success btn-sm"  onclick='return view_detail_sop14001()'> SOP Terkait</button>
                                                <a href="<?php echo base_url("file_uploads/sertifikat/sertifikat_jmj_14001_2024.pdf")?>" target="_blank" class="btn btn-cyan btn-sm " >Lihat Sertifikat</a>
                                                <!-- <button type="button" class="btn btn-success btn-sm">Publish</button>
                                                <button type="button" class="btn btn-danger btn-sm">Delete</button> -->


                                            </div>
                                    
                                </div>
                            </div>
                            <div class="col-md-3">
                                    <div class="comment-widgets scrollable">
                                    
                                    <div class="d-flex flex-row comment-row m-t-0">
                                        <div class="p-2"><img src="<?php echo base_url("file_uploads/galeri/45001.PNG")?>" alt="user" width="50" class="rounded-circle"></div>
                                        <div class="comment-text w-100">
                                            <h6 class="font-medium"><b>ISO 45001:2018 Sistem Manajemen K3</b></h6> <span class="badge badge-pill badge-info float-left">Aktif</span><br>
                                            <span class="m-b-5 d-block">No. Sertifikat : QAIC/ID/11127-C </span>
                                            <!-- <span class="m-b-15 d-block">Scope : Provision of Administration Service, Project Management and Traffic Management Toll Roads </span> -->
                                            <br>
                                            
                                        </div>
                                    </div>
                                    <div class="comment-footer" style="text-align:center;">

                                                <span class="text-muted float-right"></span> 
                                                <!-- <button type="button" class="btn btn-success btn-sm"  onclick='return view_detail_sop45001()'><?php echo $sop_45001?> SOP</button> -->
                                                <button type="button" class="btn btn-success btn-sm"  onclick='return view_detail_sop45001()'>SOP Terkait</button>
                                                <a href="<?php echo base_url("file_uploads/sertifikat/sertifikat_jmj_45001_2024.pdf")?>" target="_blank" class="btn btn-cyan btn-sm " >Lihat Sertifikat</a>
                                                <!-- <button type="button" class="btn btn-success btn-sm">Publish</button>
                                                <button type="button" class="btn btn-danger btn-sm">Delete</button> -->


                                            </div>
                                    
                                    
                                </div>
                            </div>
                            <div class="col-md-3">
                            <div class="comment-widgets scrollable">
                                    
                                    <div class="d-flex flex-row comment-row m-t-0">
                                        <div class="p-2"><img src="<?php echo base_url("file_uploads/galeri/37001.PNG")?>" alt="user" width="50" class="rounded-circle"></div>
                                        <div class="comment-text w-100">
                                            <h6 class="font-medium"><b>ISO 37001:2016 Sistem Manajemen Anti Penyuapan</b></h6> <span class="badge badge-pill badge-info float-left">Aktif</span><br>
                                            <span class="m-b-5 d-block">No. Sertifikat : QAIC/ID/11127-E </span>
                                            <!-- <span class="m-b-15 d-block">Scope :  Provision of Administration Service, Project Management and Traffic Management Toll Roads </span> -->
                                            <br>
                                            
                                        </div>
                                    </div>

                                    <div class="comment-footer" style="text-align:center;">

                                                <span class="text-muted float-right"></span> 
                                                <!-- <button type="button" class="btn btn-success btn-sm"  onclick='return view_detail_sop37001()' ><?php echo $sop_37001?> SOP</button> -->
                                                <button type="button" class="btn btn-success btn-sm"  onclick='return view_detail_sop37001()' >SOP Terkait</button>
                                                <a href="<?php echo base_url("file_uploads/sertifikat/sertifikat_jmj_37001_2024.pdf")?>" target="_blank" class="btn btn-cyan btn-sm " >Lihat Sertifikat</a>
                                                <!-- <button type="button" class="btn btn-success btn-sm">Publish</button>
                                                <button type="button" class="btn btn-danger btn-sm">Delete</button> -->


                                            </div>
                                    
                                </div>
                            </div>
                            
                        </div>
                        <p class="text-info mt-3"><i>Last updated : Februari 2025</i></p>
                        <!-- <h5 class="text-info" style="text-align: center"> -->
                            <p align="center">
                                <a href="<?php echo site_url('Dokumen/sop'); ?>" target="_blank" class="btn btn-info" ><u>View Summary SOP</u></a>
                            </p>
                        <!-- </h5> -->
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="card" >
        <div class="">
            <div class="row">
                <div class="col-md-12 border-right p-r-0">
                    <div class="card-body border-bottom">
                        <h4 class="card-title m-t-10"><b>12. Monitoring KPI</b> &nbsp;  <i class="mdi mdi-arrow-down-circle" style="color:red" onclick="view_alert12()"></i></h4>
                        <div class="alert alert-danger" id="div-alert12" style="display: none;" role="alert">
                          <b>PERMASALAHAN :</b> <br>
                            <?php
                                                $no=1;
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
                                        <td align="center" >   7</td>
                                        <td align="center" >   110%</td>
                                        <td align="center">   Triwulan</td>
                                        <td align="center" >   7</td>
                                        <td align="center"><b>4</b></td>
                                    </tr>
                                    <tr>
                                        <td align="center"><b>2. </b></td>
                                        <td><b>Akurasi Proyeksi Volume Lalu Lintas </b></td>
                                        <td align="center"> %</td>                    
                                        <td align="center"> Maximize </td>
                                        <td align="center" >   7</td>
                                        <td align="center" >   110%</td>
                                        <td align="center">   Triwulan</td>
                                        <td align="center" >   7</td>
                                        <td align="center"><b>5</b></td>
                                    </tr>
                                    <tr>
                                        <td align="center"><b>3. </b></td>
                                        <td><b>EBITDA Margin </b></td>
                                        <td align="center"> %</td>                    
                                        <td align="center"> Maximize </td>
                                        <td align="center" >   7</td>
                                        <td align="center" >   110%</td>
                                        <td align="center">   Triwulan</td>
                                        <td align="center" >   7</td>
                                        <td align="center"><b>6</b></td>
                                    </tr>
                                    <tr>
                                        <td align="center"><b>4. </b></td>
                                        <td><b>Laba (Rugi) Tahun berjalan </b></td>
                                        <td align="center"> Rp</td>                    
                                        <td align="center"> Maximize </td>
                                        <td align="center" >   7</td>
                                        <td align="center" >   110%</td>
                                        <td align="center">   Triwulan</td>
                                        <td align="center" >   7</td>
                                        <td align="center"><b>2</b></td>
                                    </tr>
                                    <tr>
                                        <td align="center"><b>5. </b></td>
                                        <td><b>Biaya Operasi Jalan Tol per km </b></td>
                                        <td align="center"> Rp/km</td>                    
                                        <td align="center"> <font color="orange">Minimize</font> </td>
                                        <td align="center" >   7</td>
                                        <td align="center" >   110%</td>
                                        <td align="center">   Triwulan</td>
                                        <td align="center" >   7</td>
                                        <td align="center"><b>8</b></td>
                                    </tr>
                                    <tr>
                                        <td align="center"><b>6. </b></td>
                                        <td><b>Pencapaian Tingkat Standar Pelayanan Minimal (SPM) </b></td>
                                        <td align="center"> %</td>                    
                                        <td align="center"> Maximize </td>
                                        <td align="center" >   7</td>
                                        <td align="center" >   110%</td>
                                        <td align="center">   Semesteran</td>
                                        <td align="center" >   </td>
                                        <td align="center"><b> </b></td>
                                    </tr>
                                    <tr>
                                        <td align="center"><b>7. </b></td>
                                        <td><b>Indeks Kepuasan Pengguna Jalan Tol </b></td>
                                        <td align="center"> Indeks</td>                    
                                        <td align="center"> Maximize </td>
                                        <td align="center" >   7</td>
                                        <td align="center" >   110%</td>
                                        <td align="center">   Tahunan</td>
                                        <td align="center" >   </td>
                                        <td align="center"><b> </b></td>
                                    </tr>
                                    <tr>
                                        <td align="center"><b>8. </b></td>
                                        <td><b>Efektivitas Pengendalian Settlement Pendapatan Tol </b></td>
                                        <td align="center"> Rp Miliar</td>                    
                                        <td align="center"> <font color="orange">Minimize</font> </td>
                                        <td align="center" >   7</td>
                                        <td align="center" >   110%</td>
                                        <td align="center">   Triwulan</td>
                                        <td align="center" >   7</td>
                                        <td align="center"><b>7</b></td>
                                    </tr>
                                    <tr>
                                        <td align="center"><b>9. </b></td>
                                        <td><b>Efisiensi Penyerapan Capex Operasional dan Pembangunan Jalan Tol </b></td>
                                        <td align="center"> %</td>                    
                                        <td align="center"> <font color="orange">Minimize</font> </td>
                                        <td align="center" >   8</td>
                                        <td align="center" >   110%</td>
                                        <td align="center">   Triwulan</td>
                                        <td align="center" >   8</td>
                                        <td align="center"><b>9</b></td>
                                    </tr>
                                    <tr>
                                        <td align="center"><b>10. </b></td>
                                        <td><b>Progres Pembangunan Jalan Tol </b></td>
                                        <td align="center"> %</td>                    
                                        <td align="center"> Maximize </td>
                                        <td align="center" >   8</td>
                                        <td align="center" >   110%</td>
                                        <td align="center">   Tahunan</td>
                                        <td align="center" >   8</td>
                                        <td align="center"><b>8</b></td>
                                    </tr>
                                    <tr>
                                        <td align="center"><b>11. </b></td>
                                        <td><b>Pengendalian Cost of Fund </b></td>
                                        <td align="center"> %</td>                    
                                        <td align="center"> <font color="orange">Minimize</font>  </td>
                                        <td align="center" >   7</td>
                                        <td align="center" >   110%</td>
                                        <td align="center">   Semesteran</td>
                                        <td align="center" >   </td>
                                        <td align="center"><b></b></td>
                                    </tr>
                                    <tr>
                                        <td align="center"><b>12. </b></td>
                                        <td><b>Implementasi Dashboard Proyek dalam Monitoring Penyusunan Buku Putih </b></td>
                                        <td align="center"> %</td>                    
                                        <td align="center"> Maximize </td>
                                        <td align="center" >   7</td>
                                        <td align="center" >   110%</td>
                                        <td align="center">   Tahunan</td>
                                        <td align="center" >   </td>
                                        <td align="center"><b></b></td>
                                    </tr>
                                    <tr>
                                        <td align="center"><b>13. </b></td>
                                        <td><b>Penyelesaian Tindak Lanjut Audit dari Pihak Internal & Eksternal (bila ada)</b></td>
                                        <td align="center"> Jumlah</td>                    
                                        <td align="center"> Maximize </td>
                                        <td align="center" >   7</td>
                                        <td align="center" >   110%</td>
                                        <td align="center">   Tahunan</td>
                                        <td align="center" >   </td>
                                        <td align="center"><b></b></td>
                                    </tr>
                                    <tr>
                                        <td align="center"><b>14. </b></td>
                                        <td><b>Proses Amandemen PPJT (bila ada) </b></td>
                                        <td align="center"> %</td>                    
                                        <td align="center"> Maximize </td>
                                        <td align="center" >   7</td>
                                        <td align="center" >   110%</td>
                                        <td align="center">   Tahunan</td>
                                        <td align="center" >  </td>
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
                            &emsp;<p class="text-info"><i>Last updated : Maret 2025/TW I 2025</i></p>
                        

                    </div>

                </div>

            </div>

        </div>

    </div>

<!--     <div class="card">
        <div class="">
            <div class="row">
                <div class="col-md-12 border-right p-r-0">
                    <div class="card-body border-bottom">
                        <h4 class="card-title m-t-10"><b>Kelayakan Investasi</b></h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                              <div class="col-md-4 border-right p-r-0">
                                    <div class="card">
                                         <div class="col-md-12 border-right p-r-0">
                                            <div class="card-body border-bottom">
                                                <h5 class="card-title m-t-10"><b>Internal Rate of Return (IRR)</b></h5>
                                                <div id="bar_irr" style="height: 150px;"></div>
                                            </div>
                                         </div>
                                    </div>
                                </div>

                                <div class="col-md-4 border-right p-r-0">
                                    <div class="card">
                                         <div class="col-md-12 border-right p-r-0">
                                            <div class="card-body border-bottom">
                                                <h5 class="card-title m-t-10"><b>Payback Period (PBP)</b></h5>
                                                <div id="bar_pbp" style="height: 150px;"></div>
                                            </div>
                                         </div>
                                    </div>
                                </div>

                                <div class="col-md-4 border-right p-r-0">
                                    <div class="card">
                                         <div class="col-md-12 border-right p-r-0">
                                            <div class="card-body border-bottom">
                                                <h5 class="card-title m-t-10"><b>Net Present Value (NPV)</b></h5>
                                                <div id="bar_npv" style="height: 150px;"></div>
                                            </div>
                                         </div>
                                    </div>
                                </div>
                        </div>
                        

                    </div>
                </div>
            </div>
        </div>
    </div> -->
   <!--  <h4 class="card-title m-t-10"><b>6. Monitoring Dana Talangan</b></h4><br>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">                                           
            <div class="card card-hover" >
                        <div class="card-body border-bottom" style="background-color: #219ebc; ">
                            <h4 class="card-title m-t-10 text-white">Alokasi Dana Tanah</h4>
                        </div>
                        <div class="card-body m-t-10 mb-1" >
                            <table class="table-striped table mb-0">
                                <tbody>
                                    <tr>
                                        <td><b>Alokasi Dana Kumulatif</b></td>
                                        <td align="right"><b>Rp. 12.343.250.254.448</b></td>
                                    </tr>
                                    <tr>
                                        <td><b>Alokasi Dana Tanah Periodik</b></td>
                                        <td align="right"><b>Rp. 3.553.918.030.379</b></td>
                                    </tr>
                                    <tr>
                                        <td><b>Alokasi Pembayaran Langsung (PL)</b></td>
                                        <td align="right"><b>Rp. 3.188.063.597.086</b></td>
                                    </tr>
                                    <tr>
                                        <td><b>Alokasi Dana Talangan Tanah (DTT)</b></td>
                                        <td align="right"><b>Rp. 365.854.433.293</b></td>
                                    </tr> 
                                    <tr>
                                        <td><b>Persetujuan DTT Menteri Keuangan</b></td>
                                        <td align="right"><b>-</b></td>
                                    </tr> 
                                    <br>
                        
                                </tbody>
                            </table>
                            <br>
                        </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">                                           
            <div class="card card-hover" >
                        <div class="card-body border-bottom" style="background-color: #e76f51; ">
                            <h4 class="card-title m-t-10 text-white">Penyerapan Dana Tanah</h4>
                        </div>
                        <div class="card-body m-t-10 mb-1" >
                            <table class="table-striped table mb-0">
                                <tbody>
                                    <tr>
                                        <td><b>Data Realisasi Internal Periodik (PL)</b></td>
                                        <td align="right"><b>-</b></td>
                                    </tr>
                                    <tr>
                                        <td><b>Data Realisasi Internal Periodik (DTT)</b></td>
                                        <td align="right"><b>-</b></td>
                                    </tr>
                                    <tr>
                                        <td><b>Realisasi Dana Tanah s.d Periode Sebelumnya</b></td>
                                        <td align="right"><b>Rp. 8.789.332.224.069</b></td>
                                    </tr>
                                    <tr>
                                        <td><b>Realisasi PL s.d Periode Sebelumnya</b></td>
                                        <td align="right"><b>Rp. 4.473.085.857.852</b></td>
                                    </tr> 
                                    <tr>
                                        <td><b>Realisasi DTT s.d Periode Sebelumnya</b></td>
                                        <td align="right"><b>Rp. 34.145.566.707</b></td>
                                    </tr> 
                                    <tr>
                                        <td><b>Carry Over Periodik (PL)</b></td>
                                        <td align="right"><b>Rp. 92.408.107.946</b></td>
                                    </tr> 
                                </tbody>
                            </table>
                        </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">                                           
            <div class="card card-hover" >
                        <div class="card-body border-bottom" style="background-color: #f6bd60; ">
                            <h4 class="card-title m-t-10 text-white">Pengembalian LMAN</h4>
                        </div>
                        <div class="card-body m-t-10 mb-1" >
                            <table class="table-striped table mb-0">
                                <tbody>
                                    <tr>
                                        <td><b>Data Realisasi Internal Periodik (PL)</b></td>
                                        <td align="right"><b>Rp. -</b></td>
                                    </tr>
                                    <tr>
                                        <td><b>Data Realisasi Internal Periodik (DTT)</b></td>
                                        <td align="right"><b>Rp. -</b></td>
                                    </tr>
                                    <tr>
                                        <td><b>Realisasi Dana Tanah s.d Periode Sebelumnya</b></td>
                                        <td align="right"><b>Rp. -</b></td>
                                    </tr>
                                    <tr>
                                        <td><b>Realisasi PL s.d Periode Sebelumnya</b></td>
                                        <td align="right"><b>Rp. -</b></td>
                                    </tr> 
                                    <tr>
                                        <td><b>Realisasi DTT s.d Periode Sebelumnya</b></td>
                                        <td align="right"><b>Rp. -</b></td>
                                    </tr> 
                                    <tr>
                                        <td><b>Carry Over Periodik (PL)</b></td>
                                        <td align="right"><b>Rp. -</b></td>
                                    </tr> 
                                </tbody>
                            </table>
                        </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">                                           
            <div class="card card-hover" >
                        <div class="card-body border-bottom" style="background-color: #84a59d; ">
                            <h4 class="card-title m-t-10 text-white">Fasilitas DTT</h4>
                        </div>
                        <div class="card-body m-t-10 mb-1" >
                            <table class="table-striped table mb-0">
                                <tbody>
                                    <tr>
                                        <td><b>Plafon Kredit DTT</b></td>
                                        <td align="right"><b>Rp. 81.600.000.000</b></td>
                                    </tr>
                                    <tr>
                                        <td><b>Penarikan Kredit s.d Saat Ini</b></td>
                                        <td align="right"><b>Rp. 40.779.266.878</b></td>
                                    </tr>
                                    <tr>
                                        <td><b>Pengembalian Hutan DTT per Saat Ini</b></td>
                                        <td align="right"><b>Rp. 10.561.568.992</b></td>
                                    </tr>
                                    <tr>
                                        <td><b>Sisa Plafon per Saat Ini</b></td>
                                        <td align="right"><b>Rp. 51.382.302.114</b></td>
                                    </tr> 
                                    
                                </tbody>
                            </table>
                            <br><br><br><br>
                        </div>
            </div>
        </div>
    </div> -->
 <h4 class="card-title m-t-20"><b>&emsp;13. Monitoring Kontrak</b></h4><br>   
<div class="row">
        <!-- Column -->
        <!-- <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-hover">
                <a href="#">
                    <div class="box " style="background-color: #219ebc">
                        <h4 class="font-light text-white"><b>Total Kontrak</b></h4><br>
                        <h3 class="text-white text-center"><?php echo $jml_kontrak_peralatanTol+$jml_kontrak_konstruksi+$jml_kontrak_nonTol+$jml_kontrak_konsultanTol+$jml_kontrak_konsultanNonTol ?> Kontrak</h3><hr>
                         <p class="text-white text-center">Total Nilai : Rp. <?php echo number_format($sum_nilai,2,',','.') ?></p>
                    </div>
                </a>
            </div>
            <div class="card card-hover">
                <a href="#">
                    <div class="box bg-danger ">
                        <h4 class="font-light text-white"><b>Total Isu/Permasalahan</b></h4><br>
                        <h3 class="text-white text-center">0 Isu</h3><hr>
                         <p class="text-white text-center">0 Open, 0 Close</p>
                    </div>
                </a>
            </div>
        </div> -->

        <!-- Column -->
        <div class="col-lg-12 col-md-12 col-sm-12">                                           
            <div class="card card-hover" >
                        <div class="card-body border-bottom" style="background-color: #219ebc; ">
                            <h4 class="card-title m-t-10 text-white">Klasifikasi Jenis Kontrak</h4>
                        </div>
                        <div class="card-body m-t-10 mb-1" >
                            <table class="table-striped table mb-0">
                                <tbody>
                                    <tr style="background-color: #ade8f4">
                                        <td align="center"><b>Nama Paket</b></td>
                                        <td class="align-center"><b>Jumlah Kontrak</td>
                                            <td align="center"><b>Total Nilai Kontrak</b></td>
                                        <td align="center"><b>Sudah Terbayar</b></td>
                                        <td align="center"><b>Belum Terbayar</b></td>
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
                                        <td align="right"><b>Rp. <?php echo number_format($nilai_kontrak_lainnya,2,',','.') ?></b></td>
                                    </tr>   -->                          
                                </tbody>
                            </table>
                            <br><h5 class="text-info" style="text-align: center"><a href="<?php echo base_url('file_uploads/monitoring_kontrak_paket.pdf') ?>" target="_blank"><u>View Detail</u></a></h5>
                        </div>
            </div>
        </div>
        <!-- Column -->
        <!-- <div class="col-lg-3 col-md-43 col-sm-12">
            <div class="card card-hover">
                <div class="card-body">
                                        <div class="img-post">
                                            <p align="center"><img class="d-block img-fluid text-center" src="<?php echo base_url(''); ?>/file_uploads/image/lib.jpg" style="height: 190px;"></p>
                                        </div>
                                       
                                        <h5 style="text-align: center">Total Dokumen Terupload</h5><hr>
                                        <h3 style="text-align: center; color: blue"><b><?php echo number_format($total_dok,0,',','.') ?></b></h3>
                                        <h5 style="text-align: center; color: blue">Dokumen</h5>
                </div>
            </div>
        </div> -->
    </div>

<?php if($this->session->userdata('level_user')==1) { ?>
    
    <div class="card">
        <div class="">
            <div class="row">
                <div class="col-md-12 border-right p-r-0">
                    <div class="card-body border-bottom">
                        <h4 class="card-title m-t-10"><b>14. Monitoring Kelengkapan Dokumen Kontrak Konstruksi Tol</b></h4>
                    </div>
                    <div class="card-body">
                       
                        <div class="row"> 
                            <div class="col-md-4">
                                <div id="pie_kontrakKonsTol" style="height: 450px;"></div>
                                <br><p align="center" style="color: red"><b>Total Kekurangan : <?php echo $sum_konstruksi?> Dokumen</b></p>
                            </div>
                            <div class="col-md-4">
                                <div id="pie_proyekKonsTol" style="height: 450px;"></div>
                                <br><p align="center" style="color: red"><b>Total Kekurangan : <?php echo $sum_proyek_konstruksi ?> Dokumen</b></p>
                            </div>
                            <div class="col-md-4">
                                <div id="pie_bayarKonsTol" style="height: 450px;"></div>
                                <br><p align="center" style="color: red"><b>Total Kekurangan : <?php echo $sum_krg_pembayaranKonstruksi ?> Dokumen</b></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="">
            <div class="row">
                <div class="col-md-12 border-right p-r-0">
                    <div class="card-body border-bottom">
                        <h4 class="card-title m-t-10"><b>15. Monitoring Kelengkapan Dokumen Kontrak Konsultan Tol</b></h4>
                    </div>
                    <div class="card-body">
                       
                        <div class="row"> 
                            <div class="col-md-6">
                                <div id="pie_kontrakKonsultan" style="height: 450px;"></div>
                                <br><p align="center" style="color: red"><b>Total Kekurangan : <?php echo $sum_konsultan ?> Dokumen</b></p>
                            </div>
                            <div class="col-md-6">
                                <div id="pie_bayarKonsultan" style="height: 450px;"></div>
                                <br><p align="center" style="color: red"><b>Total Kekurangan : <?php echo $sum_krg_pembayaranKonsultan ?> Dokumen</b></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php } ?>

<?php if($this->session->userdata('level_user')==1) { ?>
    


<?php } ?>


<!-- 
<div class="modal" id="kepatuhan">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>DAFTAR KEWAJIBAN KEPATUHAN (COMPLIANCE OBLIGATION LIST) PT JASAMARGA JOGJA SOLO</strong></h4>
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
</div> -->


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

<div class="modal fade none-border" id="view_debt">
    <div class="modal-dialog modal-lg" style="min-width: 800px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Fasilitas Kredit s/d November  2024</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <!--  <a href="<?php echo site_url('Perizinan/add_perizinan') ?>" class="pull-right"><button type="button" class="btn btn-primary btn-mini"> Download</button></a> -->
                <table class="table table-hover table-bordered" >
                    <thead>
                        <tr>
                            <th style="text-align: center; background-color: #1d6296; color: white; "><b>Keterangan</b></th>
                            <th style="text-align: center; background-color: #1d6296; color: white; "><b>Nilai</b></th>
                            <th style="text-align: center; background-color: #1d6296; color: white; "><b>Persentase</b></th>
                            
                        </tr>
                        <tr>
                            <td><b>Plafond </b>  </td>
                            <td align="right"><b>   Rp 9.893.216.000.000  </b></td>
                            <td align="center"></td>
                        </tr>
                        <tr>
                            <td><b>KI Pokok</b> </td>
                            <td align="right"><b>  Rp 9.362.003.000.000</b></td>
                            <td align="center"><b>100%</b></td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; Realisasi Penarikan </td>
                            <td align="right">  Rp 4.597.949.701.831  </td>
                            <td align="center">49%</td>
                        </tr>
                        <tr style="color: blue">
                            <td>&emsp;&emsp; Sisa/Deviasi</td>
                            <td align="right">  Rp 4.764.053.298.169 </td>
                            <td align="center">51%</td>
                        </tr>
                        <tr>
                            <td><b>KI IDC</b> </td>
                            <td align="right"><b>   Rp 531.213.000.000 </b></td>
                            <td align="center"><b>100%</b></td>
                        </tr>
                        <tr>
                            <td>&emsp;&emsp; Realisasi Penarikan </td>
                            <td align="right">   Rp 189.745.751.628  </td>
                            <td align="center">36%</td>
                        </tr>
                        <tr style="color: blue">
                            <td>&emsp;&emsp; Sisa/Deviasi</td>
                            <td align="right">   Rp 341.467.248.372  </td>
                            <td align="center">64%</td>
                        </tr>
 
                    </thead>

                    <tbody >
                    </tbody>
                </table>
            </div>
           
        </div>
    </div>
</div>
<div class="modal fade none-border" id="view_equity">
    <div class="modal-dialog modal-lg" style="min-width: 800px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Detail Setoran Modal s/d Nov 2024</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <!--  <a href="<?php echo site_url('Perizinan/add_perizinan') ?>" class="pull-right"><button type="button" class="btn btn-primary btn-mini"> Download</button></a> -->
                <table class="table table-hover table-bordered" >
                    <thead>
                        <tr>
                            <th style="text-align: center; background-color: #1d6296; color: white; "><b>Keterangan</b></th>
                            <th style="text-align: center; background-color: #1d6296; color: white; "><b>Nilai</b></th>
                            <th style="text-align: center; background-color: #1d6296; color: white; "><b>Persentase</b></th>
                            
                        </tr>
                        <tr>
                            <td><b>Total Setoran Modal Tahap 1 </b> </td>
                            <td align="right"><b>  Rp 4.239.949.500.000  </b></td>
                            <td align="center"><b>100%</b></td>
                        </tr>
                        <tr>
                            <td><b>Realisasi Setoran Modal s/d Nov 2024</b> </td>
                            <td align="right"><b> Rp 2.860.537.000.000 </b></td>
                            <td align="center"><b>67%</b></td>
                        </tr>
                        <tr>
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
                        </tr>
                    </thead>

                    <tbody >
                    </tbody>
                </table>
            </div>
           
        </div>
    </div>
</div>
<div class="modal fade none-border" id="view_nilai1">
    <div class="modal-dialog modal-lg" style="min-width: 800px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Nilai Progres Proyek Paket 1.1</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <!--  <a href="<?php echo site_url('Perizinan/add_perizinan') ?>" class="pull-right"><button type="button" class="btn btn-primary btn-mini"> Download</button></a> -->
                <table class="table table-hover table-bordered" >
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
                            <td>Akrual Progres Konstruksi   </td>
                            <td align="right"><b> Rp 4.493.384.438.362 </b></td>
                            <td align="center"><b>98.86%</b></td>
                        </tr>
                        <tr >
                            <td>Deviasi Rupiah (Kontrak - Akrual Progres Konstruksi) </td>
                            <td align="right"> Rp 51.820.984.238 </td>
                            <td align="center">1.14%</td>
                        </tr>
                        <tr>
                            <td>Telah dibayarakan   </td>
                            <td align="right"><b> Rp 4.246.685.294.880 </b></td>
                            <td align="center"><b>93.43%</b></td>
                        </tr>
                        <tr >
                            <td>Deviasi Rupiah (Kontrak - Telah Dibayarkan) </td>
                            <td align="right"> Rp 246.699.143.482 </td>
                            <td align="center"> </td>
                        </tr>
                    </thead>

                    <tbody >
                    </tbody>
                </table>
                <p class="text-info"><i>Cut off : Desember 2024</i></p>
            </div>
           
        </div>
    </div>
</div>
<div class="modal fade none-border" id="view_nilai2">
    <div class="modal-dialog modal-lg" style="min-width: 800px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Nilai Progres Proyek Paket 1.2</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <!--  <a href="<?php echo site_url('Perizinan/add_perizinan') ?>" class="pull-right"><button type="button" class="btn btn-primary btn-mini"> Download</button></a> -->
                <table class="table table-hover table-bordered" >
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
                            <td><b>Akrual Progres Konstruksi   </b></td>
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
                        <tr >
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
                            <td><b>Telah dibayarkan  </b> </td>
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
                        <tr >
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

                    <tbody >
                    </tbody>
                </table>
            </div>
           
        </div>
    </div>
</div>
<div class="modal fade none-border" id="view_nilai3">
    <div class="modal-dialog modal-lg" style="min-width: 800px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Nilai Progres Proyek Paket 2.1A</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <!--  <a href="<?php echo site_url('Perizinan/add_perizinan') ?>" class="pull-right"><button type="button" class="btn btn-primary btn-mini"> Download</button></a> -->
                <table class="table table-hover table-bordered" >
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
                            <td>Akrual Progres Konstruksi   </td>
                            <td align="right"><b> Rp 34.749.586.169</b></td>
                            <td align="center"><b>2.08%</b></td>
                        </tr>
                        <tr style="color: red">
                            <td>Deviasi Rupiah (Kontrak - Akrual Progres Konstruksi) </td>
                            <td align="right"> Rp 1.632.697.413.831 </td>
                            <td align="center">97.92%</td>
                        </tr>
                        <tr>
                            <td>Telah dibayarakan   </td>
                            <td align="right"><b> - </b></td>
                            <td align="center"><b>-</b></td>
                        </tr>
                        <tr >
                            <td>Deviasi Rupiah (Kontrak - Telah Dibayarkan) </td>
                            <td align="right"> Rp 34.749.586.169 </td>
                            <td align="center"> </td>
                        </tr>
                    </thead>

                    <tbody >
                    </tbody>
                </table>
            </div>
           
        </div>
    </div>
</div>
<div class="modal fade none-border" id="view_nilai4">
    <div class="modal-dialog modal-lg" style="min-width: 800px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Detail Nilai Progres Proyek</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <!--  <a href="<?php echo site_url('Perizinan/add_perizinan') ?>" class="pull-right"><button type="button" class="btn btn-primary btn-mini"> Download</button></a> -->
                <table class="table table-hover table-bordered" >
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
                            <td>Akrual Progres Konstruksi   </td>
                            <td align="right"><b> Rp 659.327.473.387</b></td>
                            <td align="center"><b>44.64%</b></td>
                        </tr>
                        <tr >
                            <td>Deviasi Rupiah (Kontrak - Akrual Progres Konstruksi) </td>
                            <td align="right"> Rp 817.558.032.613 </td>
                            <td align="center">55.36%</td>
                        </tr>
                        <tr>
                            <td>Telah dibayarakan   </td>
                            <td align="right"><b> Rp437.366.913.060 </b></td>
                            <td align="center"><b>29.61%</b></td>
                        </tr>
                        <tr >
                            <td>Deviasi Rupiah (Kontrak - Telah Dibayarkan) </td>
                            <td align="right"> Rp 221.960.560.327 </td>
                            <td align="center"> </td>
                        </tr>
                    </thead>

                    <tbody >
                    </tbody>
                </table>
            </div>
           
        </div>
    </div>
</div>
<div class="modal fade none-border" id="progres_konstruksi_tahap">
    <div class="modal-dialog modal-lg" style="min-width: 800px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Detail Progres Konstruksi per Tahap</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <!--  <a href="<?php echo site_url('Perizinan/add_perizinan') ?>" class="pull-right"><button type="button" class="btn btn-primary btn-mini"> Download</button></a> -->
                <table class="table table-hover table-bordered" >
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

                    <tbody >
                    </tbody>
                </table>
            </div>
           
        </div>
    </div>
</div>
<div class="modal fade none-border" id="progres_lahan_tahap">
    <div class="modal-dialog modal-lg" style="min-width: 800px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Detail Progres Lahan per Tahap</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <!--  <a href="<?php echo site_url('Perizinan/add_perizinan') ?>" class="pull-right"><button type="button" class="btn btn-primary btn-mini"> Download</button></a> -->
                <table class="table table-hover table-bordered" >
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
                            <td align="center"><b>7.62%	</b></td>
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
                            <td align="center"><b>5.59%	</b></td>
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

                    <tbody >
                    </tbody>
                </table>
            </div>
           
        </div>
    </div>
</div>
<div class="modal fade none-border" id="progres_rta_tahap">
    <div class="modal-dialog modal-lg" style="min-width: 800px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Detail Progres RTA per Tahap</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <!--  <a href="<?php echo site_url('Perizinan/add_perizinan') ?>" class="pull-right"><button type="button" class="btn btn-primary btn-mini"> Download</button></a> -->
                <table class="table table-hover table-bordered" >
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
                            <td align="center"><b>70.30%	</b></td>
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
                            <td align="center"><b>33.53%	</b></td>
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

                    <tbody >
                    </tbody>
                </table>
            </div>
           
        </div>
    </div>
</div>
<div class="modal fade none-border" id="progres_nilai_tahap">
    <div class="modal-dialog modal-lg" style="min-width: 800px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Detail Progres Nilai Proyek per Tahap</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <!--  <a href="<?php echo site_url('Perizinan/add_perizinan') ?>" class="pull-right"><button type="button" class="btn btn-primary btn-mini"> Download</button></a> -->
                <table class="table table-hover table-bordered" >
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
                            <td align="center"><b>0	</b></td>
                            <td align="center"><b>0	</b></td>
                            <td align="center"><b>0	</b></td>
                        </tr>
                        <tr>
                            <td><b>Tahap 3 </b> </td>
                            <td align="center"><b>0	</b></td>
                            <td align="center"><b>0	</b></td>
                            <td align="center"><b>0	</b></td>
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

                    <tbody >
                    </tbody>
                </table>
            </div>
           
        </div>
    </div>
</div>

<div class="modal fade none-border" id="view_detailCapex">
    <div class="modal-dialog modal-lg" style="min-width: 800px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Detail Penyerapan Capex 2024</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <!--  <a href="<?php echo site_url('Perizinan/add_perizinan') ?>" class="pull-right"><button type="button" class="btn btn-primary btn-mini"> Download</button></a> -->
                <table class="table table-hover table-bordered" >
                    <thead>
                        <tr>
                            <th style="text-align: center; background-color: #1d6296; color: white; "><b>No</b></th>
                            <th style="text-align: center; background-color: #1d6296; color: white; "><b>TW</b></th>
                            <th style="text-align: center; background-color: #1d6296; color: white; "><b>Keterangan</b></th>
                            <th style="text-align: center; background-color: #1d6296; color: white; "><b>Rencana (Rp.)</b></th>
                            <th style="text-align: center; background-color: #1d6296; color: white; "><b>Realisasi (Rp.)</b></th>
                            
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
<div class="modal fade none-border" id="view_detailOpex">
    <div class="modal-dialog modal-lg" style="min-width: 800px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Detail Penyerapan Opex 2024</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <!--  <a href="<?php echo site_url('Perizinan/add_perizinan') ?>" class="pull-right"><button type="button" class="btn btn-primary btn-mini"> Download</button></a> -->
                <table class="table table-hover table-bordered" >
                    <thead>
                        <tr>
                            <th style="text-align: center; background-color: #1d6296; color: white; "><b>No</b></th>
                            <th style="text-align: center; background-color: #1d6296; color: white; "><b>TW</b></th>
                            <th style="text-align: center; background-color: #1d6296; color: white; "><b>Keterangan</b></th>
                            <th style="text-align: center; background-color: #1d6296; color: white; "><b>Rencana (Rp.)</b></th>
                            <th style="text-align: center; background-color: #1d6296; color: white; "><b>Realisasi (Rp.)</b></th>
                            
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

<div class="modal fade none-border" id="summary_sop">
    <div class="modal-dialog modal-lg" style="min-width: 1200px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Summary SOP</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <!--  <a href="<?php echo site_url('Perizinan/add_perizinan') ?>" class="pull-right"><button type="button" class="btn btn-primary btn-mini"> Download</button></a> -->
                <table class="table table-hover table-bordered" >
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
                            <th style="text-align: center; background-color: #1d6296; color: white; " ><b>TW IV</b></th>
                            <th style="text-align: center; background-color: #1d6296; color: white; " ><b>TW III</b></th>
                            <th style="text-align: center; background-color: #1d6296; color: white; " ><b>TW II</b></th>
                            <th style="text-align: center; background-color: #1d6296; color: white; " ><b>TW I</b></th>
                        </tr>

                    </thead>

                    <tbody >
                        <tr>
                            <td align="center">1</td>
                            <td >Keuangan</td>
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
                            <td >SDM</td>
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
                            <td >Humas</td>
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
                            <td >Proyek</td>
                            <td align="center">30</td>
                            <td align="center">30</td>
                            <td align="center">31</td>
                            <td align="center">31</td>
                            <td align="center">32</td>
                            <td align="center"> </td>
                            <td>- Prosedur Review Design (Move ke Teknik, TW 1)
                            <br> - Prosedur Mekanisme Pendokumentasian dan Pengarsipan (Move ke SDM, TW 3-4) </td>
                        </tr>
                        <tr>
                            <td align="center">5</td>
                            <td >Lahan</td>
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
                            <td >Akuntansi</td>
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
                            <td >Teknik</td>
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
                            <td >K3L</td>
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
                                - Prosedur Pengelolaan Kualitas Lingkungan  (Air, Udara dan Tanah)<br>
                                - Prosedur Pengelolaan Pihak Ketiga<br>
                                - Prosedur Monitoring Program K3L<br>
                                - Prosedur Laporan K3L Kepada Regulator</td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td align="center">9</td>
                            <td >MR</td>
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
                            <td >SMAP</td>
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

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#table_kepatuhan').on('show.bs.modal', function(e) {
            
            var judul = $(e.relatedTarget).data('judul');
            var id = $(e.relatedTarget).data('id');

            $("#aspekk").html('(ASPEK ' + judul + ')');

            $.ajax({
                
                url: "<?= site_url('Manajemen/getDataKewajiban');?>",
                type: "GET",
                data:  {
                    id_jenis : id,
                },
                
                success: function(response) {

                    $("#kewajiban_kepatuhan").html(response);
                    
                }


               
            });
        });
    });

    function view_pra_perencanaan(value){
        if(value!=null){
            if(value==1){
                $("#div-pra_perencanaan").show();
                $("#div-perencanaan").hide();
                $("#div-penyiapan").hide();
                $("#div-pelaksanaan").hide();
                $("#div-pengembalian").hide();
            }else if(value==2){
                $("#div-pra_perencanaan").hide();
                $("#div-perencanaan").show();
                $("#div-penyiapan").hide();
                $("#div-pelaksanaan").hide();
                $("#div-pengembalian").hide();
            }else if(value==3){
                $("#div-pra_perencanaan").hide();
                $("#div-perencanaan").hide();
                $("#div-penyiapan").show();
                $("#div-pelaksanaan").hide();
                $("#div-pengembalian").hide();
            }else if(value==4){
                $("#div-pra_perencanaan").hide();
                $("#div-perencanaan").hide();
                $("#div-penyiapan").hide();
                $("#div-pelaksanaan").show();
                $("#div-pengembalian").hide();
            }else if(value==5){
                $("#div-pra_perencanaan").hide();
                $("#div-perencanaan").hide();
                $("#div-penyiapan").hide();
                $("#div-pelaksanaan").hide();
                $("#div-pengembalian").show();
            }
            else {
                $("#div-pra_perencanaan").hide();
                $("#div-perencanaan").hide();
                $("#div-penyiapan").hide();
                $("#div-pelaksanaan").hide();
                $("#div-pengembalian").hide();
            }
        }else{

        }
    }

    function view_nilai($id_dok){
         var value = $id_dok;
         if(value!=null){
            if(value==1){
                $("#view_nilai1").modal('show');
            }else if(value==2){
                $("#view_nilai2").modal('show');
            }else if(value==3){
                $("#view_nilai3").modal('show');
            }else if(value==4){
                $("#view_nilai4").modal('show');
            }else {

            }
        }else{

        }
           
    };

    function view_detail_capex($id){
         var id = '';
         var idus = $id;
          // var tanggal = document.getElementById("tanggal_keg").value;
            $.ajax({
                type : "GET",
                url  : "<?php echo site_url('Dashboard/get_detail_capex')?>",
                data : "id_tw="+idus, 
                // data : {
                //     id_user : idus,
                //     tanggal: tanggal,
                // },
                success:function(response){
                var data ="";
                var i=1;
                $.each(JSON.parse(response), function( index, item ) {
                    // var date = moment(item.tanggal_jadwal,"YYYY-mm-DD");
                    // var result = date.format("DD-mm-YYYY");
                    var limit = i++;
                    // var tgl = result;

                    // if(item.status==null){
                    //     var stat = '';
                    // }else if (item.status=='Selesai'){
                    //     var stat = '<button type="button" class="btn btn-info btn-sm"><i class="fa fa-check"></i> '+item.status+'</button>';
                    // }else{
                    //     var stat = '<button type="button" class="btn btn-success btn-sm"><i class="fa fa-clock"></i> '+item.status+'</button>';
                    // }

                    var bilangan = item.rencana;
    
                    var number_string = bilangan.toString(),
                        sisa    = number_string.length % 3,
                        rupiah  = number_string.substr(0, sisa),
                        ribuan  = number_string.substr(sisa).match(/\d{3}/g);
                            
                    if (ribuan) {
                        separator = sisa ? '.' : '';
                        rupiah += separator + ribuan.join('.');
                    }

                    var bilangan2 = item.realisasi;
    
                    var number_string2 = bilangan2.toString(),
                        sisa2    = number_string2.length % 3,
                        rupiah2  = number_string2.substr(0, sisa),
                        ribuan2  = number_string2.substr(sisa).match(/\d{3}/g);
                            
                    if (ribuan2) {
                        separator2 = sisa2 ? '.' : '';
                        rupiah2 += separator2 + ribuan2.join('.');
                    }

                    if(item.tw==1){
                        var tw='I';
                    }else if(item.tw==2){
                        var tw='II';
                    }else if(item.tw==3){
                        var tw='III';
                    }else if(item.tw==4){
                        var tw='IV';
                    }

                    data+="<tr><td style='color:black; text-align:center'>"+limit+"<td style='color:black; text-align:center'>"+tw+"<td style='color:black;'>"+item.keterangan+"<td style='color:black; text-align:right'>"+rupiah+"<td style='color:black; text-align:right'>"+rupiah2 +"</td></td></td></td</td></tr>";     
                        
                    $("#detail_capex").html(data); 

               });
                        
                    }
            });

            // console.log(tanggal);
         $("#view_detailCapex").modal('show');
    };

    function view_detail_opex($id){
         var id = '';
         var idus = $id;
          // var tanggal = document.getElementById("tanggal_keg").value;
            $.ajax({
                type : "GET",
                url  : "<?php echo site_url('Dashboard/get_detail_opex')?>",
                data : "id_tw="+idus, 
                // data : {
                //     id_user : idus,
                //     tanggal: tanggal,
                // },
                success:function(response){
                var data ="";
                var i=1;
                $.each(JSON.parse(response), function( index, item ) {
                    // var date = moment(item.tanggal_jadwal,"YYYY-mm-DD");
                    // var result = date.format("DD-mm-YYYY");
                    var limit = i++;
                    // var tgl = result;

                    // if(item.status==null){
                    //     var stat = '';
                    // }else if (item.status=='Selesai'){
                    //     var stat = '<button type="button" class="btn btn-info btn-sm"><i class="fa fa-check"></i> '+item.status+'</button>';
                    // }else{
                    //     var stat = '<button type="button" class="btn btn-success btn-sm"><i class="fa fa-clock"></i> '+item.status+'</button>';
                    // }

                    var bilangan = item.rencana;
    
                    var number_string = bilangan.toString(),
                        sisa    = number_string.length % 3,
                        rupiah  = number_string.substr(0, sisa),
                        ribuan  = number_string.substr(sisa).match(/\d{3}/g);
                            
                    if (ribuan) {
                        separator = sisa ? '.' : '';
                        rupiah += separator + ribuan.join('.');
                    }

                    var bilangan2 = item.realisasi;
    
                    var number_string2 = bilangan2.toString(),
                        sisa2    = number_string2.length % 3,
                        rupiah2  = number_string2.substr(0, sisa),
                        ribuan2  = number_string2.substr(sisa).match(/\d{3}/g);
                            
                    if (ribuan2) {
                        separator2 = sisa2 ? '.' : '';
                        rupiah2 += separator2 + ribuan2.join('.');
                    }

                    if(item.tw==1){
                        var tw='I';
                    }else if(item.tw==2){
                        var tw='II';
                    }else if(item.tw==3){
                        var tw='III';
                    }else if(item.tw==4){
                        var tw='IV';
                    }

                    data+="<tr><td style='color:black; text-align:center'>"+limit+"<td style='color:black; text-align:center'>"+tw+"<td style='color:black;'>"+item.keterangan+"<td style='color:black; text-align:right'>"+rupiah+"<td style='color:black; text-align:right'>"+rupiah2 +"</td></td></td></td</td></tr>";     
                        
                    $("#detail_opex").html(data); 

               });
                        
                    }
            });

            // console.log(tanggal);
         $("#view_detailOpex").modal('show');
    };

    function view_debtEquity($id){
         var value = $id;
         if(value!=null){
            if(value==1){
                $("#view_debt").modal('show');
            }else if(value==2){
                $("#view_equity").modal('show');
            }else {

            }
        }else{

        }
           
    };

     function view_detail_dtt(){
        $("#div-danaTalangan").show();
     }

     function view_alert(){
        $("#div-alert").show();
     }
     function view_alert10(){
        $("#div-alert10").show();
     }
     function view_alert12(){
        $("#div-alert12").show();
     }

      function view_detail_sop9001(){
         // var id = '';
          // var idiso = $id;

            $.ajax({
                type : "GET",
                url  : "<?php echo site_url('Dashboard/view_detail_sop9001')?>",
                // data : "id_iso="+idbul,
                success:function(response){
                var data ="";
                var i=1;
                $.each(JSON.parse(response), function( index, item ) {
                    var date = moment(item.tanggal,"YYYY-mm-DD");
                    var result = date.format("DD-mm-YYYY");
                    var limit = i++;
                    var link = "<?= base_url()?>";
                    var file = '<a href="'+link+"file_uploads/dokumen/sop/"+item.dok_file+'" target="_BLANK" class="btn btn-sm  btn-info"><i class="fa fa-print"></i></a>'

                    data+="<tr><td>"+limit+"<td>"+item.divisi+"<td>"+item.nama+"<td style='text-align:center'>"+result +"<td style='text-align:center'>"+item.nomor+"<td style='text-align:center'>"+file+"</td></td></td></td></td></tr>";     
                        
                    $("#detail_sop9001").html(data); 

               });
                        
                    }
            });
         $("#sop_9001").modal('show');
    };

      function view_detail_sop14001(){
         // var id = '';
          // var idiso = $id;

            $.ajax({
                type : "GET",
                url  : "<?php echo site_url('Dashboard/view_detail_sop14001')?>",
                // data : "id_iso="+idbul,
                success:function(response){
                var data ="";
                var i=1;
                $.each(JSON.parse(response), function( index, item ) {
                    var date = moment(item.tanggal,"YYYY-mm-DD");
                    var result = date.format("DD-mm-YYYY");
                    var limit = i++;
                    var link = "<?= base_url()?>";
                    var file = '<a href="'+link+"file_uploads/dokumen/sop/"+item.dok_file+'" target="_BLANK" class="btn btn-sm  btn-info"><i class="fa fa-print"></i></a>'

                    data+="<tr><td>"+limit+"<td>"+item.divisi+"<td>"+item.nama+"<td style='text-align:center'>"+result +"<td style='text-align:center'>"+item.nomor+"<td style='text-align:center'>"+file+"</td></td></td></td></td></tr>";     
                        
                    $("#detail_sop14001").html(data); 

               });
                        
                    }
            });
         $("#sop_14001").modal('show');
    };

      function view_detail_sop45001(){
         // var id = '';
          // var idiso = $id;

            $.ajax({
                type : "GET",
                url  : "<?php echo site_url('Dashboard/view_detail_sop45001')?>",
                // data : "id_iso="+idbul,
                success:function(response){
                var data ="";
                var i=1;
                $.each(JSON.parse(response), function( index, item ) {
                    var date = moment(item.tanggal,"YYYY-mm-DD");
                    var result = date.format("DD-mm-YYYY");
                    var limit = i++;
                    var link = "<?= base_url()?>";
                    var file = '<a href="'+link+"file_uploads/dokumen/sop/"+item.dok_file+'" target="_BLANK" class="btn btn-sm  btn-info"><i class="fa fa-print"></i></a>'

                    data+="<tr><td>"+limit+"<td>"+item.divisi+"<td>"+item.nama+"<td style='text-align:center'>"+result +"<td style='text-align:center'>"+item.nomor+"<td style='text-align:center'>"+file+"</td></td></td></td></td></tr>";     
                        
                    $("#detail_sop45001").html(data); 

               });
                        
                    }
            });
         $("#sop_45001").modal('show');
    };

      function view_detail_sop37001(){
         // var id = '';
          // var idiso = $id;

            $.ajax({
                type : "GET",
                url  : "<?php echo site_url('Dashboard/view_detail_sop37001')?>",
                // data : "id_iso="+idbul,
                success:function(response){
                var data ="";
                var i=1;
                $.each(JSON.parse(response), function( index, item ) {
                    var date = moment(item.tanggal,"YYYY-mm-DD");
                    var result = date.format("DD-mm-YYYY");
                    var limit = i++;
                    var link = "<?= base_url()?>";
                    var file = '<a href="'+link+"file_uploads/dokumen/sop/"+item.dok_file+'" target="_BLANK" class="btn btn-sm  btn-info"><i class="fa fa-print"></i></a>'

                    data+="<tr><td>"+limit+"<td>"+item.divisi+"<td>"+item.nama+"<td style='text-align:center'>"+result +"<td style='text-align:center'>"+item.nomor+"<td style='text-align:center'>"+file+"</td></td></td></td></td></tr>";     
                        
                    $("#detail_sop37001").html(data); 

               });
                        
                    }
            });
         $("#sop_37001").modal('show');
    };

     function view_detaill($id_kpi){
         // var id = '';
         var idus = $id_kpi;
          // var tanggal = document.getElementById("tanggal_keg").value;
            $.ajax({
                type : "GET",
                url  : "<?php echo site_url('Welcome/get_detail_gauge')?>",
                data : "id_kpi="+idus, 
                // data : {
                //     id_user : idus,
                //     tanggal: tanggal,
                // },
                success:function(response){
                var data ="";
                var i=1;
                $.each(JSON.parse(response), function( index, item ) {
                    
                    var limit = i++;
                    
                     var per = item.persentase;
                    var prog = Number(per).toFixed(2);

                    if(item.persentase==0 || item.persentase==null){
                        var stat = '<button type="button" class="btn btn-danger btn-sm">'+prog+'%</button>';
                    }else if (item.persentase>=100){
                        var stat = '<button type="button" class="btn btn-info btn-sm"> 100%</button>';
                    }else{
                        var stat = '<button type="button" class="btn btn-warning btn-sm"> '+prog+'%</button>';
                    }

                    data+="<tr><td style='color:black'>"+limit+"<td style='color:black;'>"+item.program+"<td style='color:black; text-align:center'>"+item.nama_manager+"<td style='color:black; text-align:center'>"+ stat +"</td></td</td></tr>";     
                        
                    $("#detail_kegiatan").html(data); 

               });
                        
                    }
            });

            // console.log(tanggal);
         $("#view_auditor").modal('show');
    };

    function view_kurang_dok_konstruksi($id_dok){
         var id = '';
         var id_dok = $id_dok;

            $.ajax({
                type : "GET",
                url  : "<?php echo site_url('Dashboard/get_kurang_dok_konstruksi')?>",
                data : "id_dok="+id_dok, 
                success:function(response){
                var data ="";
                var i=1;
                $.each(JSON.parse(response), function( index, item ) {

                    var limit = i++;
                    var bilangan = item.nilai_kontrak;
    
                    var number_string = bilangan.toString(),
                        sisa    = number_string.length % 3,
                        rupiah  = number_string.substr(0, sisa),
                        ribuan  = number_string.substr(sisa).match(/\d{3}/g);
                            
                    if (ribuan) {
                        separator = sisa ? '.' : '';
                        rupiah += separator + ribuan.join('.');
                    }

                    data+="<tr><td style='color:black'>"+limit+"<td style='color:black;'>"+item.nama_kontrak+"<td style='color:black; text-align:center'>"+item.nomor_kontrak+"<td style='color:black; text-align:center'>"+rupiah +"</td></td</td></tr>";     
                        
                    $("#kurang_dok").html(data); 

               });
                        
            }
            });

         $("#view_dok_pra").modal('show');
    };

    function view_dokProyek_konstruksi($id_dok){
         var id = '';
         var id_dok = $id_dok;

            $.ajax({
                type : "GET",
                url  : "<?php echo site_url('Dashboard/get_kurang_dokProyek')?>",
                data : "id_dok="+id_dok, 
                success:function(response){
                var data ="";
                var i=1;
                $.each(JSON.parse(response), function( index, item ) {

                    var limit = i++;

                    data+="<tr><td style='color:black;text-align:center '>"+limit+"<td style='color:black;text-align:center'>"+item.nomor_mc+"<td style='color:black; text-align:center'>"+item.bulan+" "+item.tahun+"<td style='color:black;'>"+item.keterangan +"</td></td</td></tr>";     
                        
                    $("#kurang_dokProyek").html(data); 

               });
                        
            }
            });

         $("#view_dok_proyek").modal('show');
    };

    function view_kurang_pembayaranKonstruksi($id_dok){
         var id = '';
         var id_dok = $id_dok;

            $.ajax({
                type : "GET",
                url  : "<?php echo site_url('Dashboard/get_kurang_dokPembayaranKonstruksi')?>",
                data : "id_dok="+id_dok, 
                success:function(response){
                var data ="";
                var i=1;
                $.each(JSON.parse(response), function( index, item ) {

                    var limit = i++;
                    var bilangan = item.nilai;
    
                    var number_string = bilangan.toString(),
                        sisa    = number_string.length % 3,
                        rupiah  = number_string.substr(0, sisa),
                        ribuan  = number_string.substr(sisa).match(/\d{3}/g);
                            
                    if (ribuan) {
                        separator = sisa ? '.' : '';
                        rupiah += separator + ribuan.join('.');
                    }

                    data+="<tr><td style='color:black;text-align:center '>"+limit+"<td style='color:black;'>"+item.keterangan+"<td style='color:black; text-align:center'>"+item.termin+"<td style='color:black;text-align:center'>"+rupiah +"</td></td</td></tr>";     
                        
                    $("#pembayaranKonstruksi").html(data); 

               });                        
            }
            });

         $("#view_dok_pembayaranKonstruksi").modal('show');
    };

    function view_kurang_pembayaranKonsultan($id_dok){
         var id = '';
         var id_dok = $id_dok;

            $.ajax({
                type : "GET",
                url  : "<?php echo site_url('Dashboard/get_kurang_dokPembayaranKonsultan')?>",
                data : "id_dok="+id_dok, 
                success:function(response){
                var data ="";
                var i=1;
                $.each(JSON.parse(response), function( index, item ) {

                    var limit = i++;
                    var bilangan = item.nilai;
    
                    var number_string = bilangan.toString(),
                        sisa    = number_string.length % 3,
                        rupiah  = number_string.substr(0, sisa),
                        ribuan  = number_string.substr(sisa).match(/\d{3}/g);
                            
                    if (ribuan) {
                        separator = sisa ? '.' : '';
                        rupiah += separator + ribuan.join('.');
                    }

                    data+="<tr><td style='color:black;text-align:center '>"+limit+"<td style='color:black;'>"+item.keterangan+"<td style='color:black; text-align:center'>"+item.termin+"<td style='color:black;text-align:center'>"+rupiah +"</td></td</td></tr>";     
                        
                    $("#pembayaranKonstruksi").html(data); 

               });                        
            }
            });

         $("#view_dok_pembayaranKonstruksi").modal('show');
    };

    function view_kurang_dok_konsultan($id_dok){
         var id = '';
         var id_dok = $id_dok;

            $.ajax({
                type : "GET",
                url  : "<?php echo site_url('Dashboard/get_kurang_dok_konsultan')?>",
                data : "id_dok="+id_dok, 
                success:function(response){
                var data ="";
                var i=1;
                $.each(JSON.parse(response), function( index, item ) {

                    var limit = i++;
                    var bilangan = item.nilai_kontrak;
    
                    var number_string = bilangan.toString(),
                        sisa    = number_string.length % 3,
                        rupiah  = number_string.substr(0, sisa),
                        ribuan  = number_string.substr(sisa).match(/\d{3}/g);
                            
                    if (ribuan) {
                        separator = sisa ? '.' : '';
                        rupiah += separator + ribuan.join('.');
                    }

                    data+="<tr><td style='color:black'>"+limit+"<td style='color:black;'>"+item.nama_kontrak+"<td style='color:black; text-align:center'>"+item.nomor_kontrak+"<td style='color:black; text-align:center'>"+rupiah +"</td></td</td></tr>";     
                        
                    $("#kurang_dok").html(data); 

               });
                        
            }
            });

         $("#view_dok_pra").modal('show');
    };

    Highcharts.chart('line_volume', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Perbandingan Volume Lalu Lintas',
            align: 'left'
        },
        xAxis: {
            categories: [
                'Jan','Feb', 'Mar', 'Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'
            ]
        },
        yAxis: {
            title: {
                text: 'Volume'
            },
            max : 25000
        },
        exporting: {
         enabled: false
        },
        credits: {
            enabled: false
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: true
            }
        },
        tooltip: {
            // valueSuffix: ' T',
            shared: true,
            // split: true,
        },
        legend: {
            enabled:false
        },
        series: [
        // {
        //     name: 'PPJT',
        //     data: [27426, 27426, 27426, 27426 ],
        //     color :'red'
        // }, 
        {
            name: 'RKAP',
            data: [20861, 20861, 20861, 20754,20754,20754,20754,20754,20754,20754,20754,20754],
            color: 'red'
            // zoneAxis: 'x',
            // zones: [{
            //     value: 1.00001,
            //     color: 'red'
            // }, {
            //     value: 2.00001,
            //     color: 'red'
            // },  {
            //     color: '#ffc8dd'
            // }]
        }, {
            name: 'Realisasi',
            data: [16187, 12087, 12934, 16687,13982,11880,13403,12599,13748,13335,14402,17491],
            //color: '#3a86ff'
            zoneAxis: 'x',
            zones: [{
                value: 1.00001,
                color: '#3a86ff'
            }, {
                value: 2.00001,
                color: '#3a86ff'
            },  {
                color: '#a8dadc'
            }]
        }]
    });


    Highcharts.chart('line_pendapatan', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Perbandingan Pendapatan Tol',
            align: 'left'
        },
        subtitle: {
            text: 'Dalam jutaan Rupiah',
            align: 'left'
        },
        xAxis: {
            categories: [
                'Jan','Feb', 'Mar', 'Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'
            ]
        },
        yAxis: {
            title: {
                text: ''
            }
        },
        exporting: {
         enabled: false
        },
        credits: {
            enabled: false
        },
        tooltip: {
            // valueSuffix: ' T',
            shared: true,
            // split: true,
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: true
            }
        },
        legend: {
            enabled:false
        },
        series: [
        // {
        //     name: 'PPJT',
        //     data: [36854112901, 36854112901, 36854112901, 36854112901 ],
        //     color :'red'
        // }, 
        {
            name: 'RKAP',
            data: [28967, 28033, 28967, 38645,39934,38645,39934,39934,38645,39934,38645,39934],
            color: 'red'
            // zoneAxis: 'x',
            // zones: [{
            //     value: 1.00001,
            //     color: 'red'
            // }, {
            //     value: 2.00001,
            //     color: 'red'
            // },  {
            //     color: '#ffc8dd'
            // }]
        }, {
            name: 'Realisasi',
            data: [21177, 14723, 15281, 21722,19761,16248,18942,17806,18803,18847 ,19697,24720],
            //color: '#3a86ff'
            zoneAxis: 'x',
            zones: [{
                value: 1.00001,
                color: '#3a86ff'
            }, {
                value: 2.00001,
                color: '#3a86ff'
            },  {
                color: '#a8dadc'
            }]
        }]
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
                  if ( this.value > 100000000 ) return Highcharts.numberFormat( this.value/1000000000, 1) + "M";  //  only switch if > 1000
                  return Highcharts.numberFormat(this.value,0);
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
                        click: function (e) {

                            var ids = this.z;
                            return view_detail_opex(ids);
                            // $('#progres_konstruksi_tahap').modal('show');

                            
                        }
                    }
                },
            }
        },
        legend: {
            enabled:true
        },
        credits: {
            enabled: false
        },
        series: [
        // {
        //     name: 'Rencana',
        //     data: [<?php echo $opex_rencana1?>, <?php echo $opex_rencana2?>, <?php echo $opex_rencana3?>, <?php echo $opex_rencana4?>],
        //     color : '#ffca3a'
        // }, {
        //     name: 'Realisasi',
        //     data: [<?php echo $opex_realisasi1?>, <?php echo $opex_realisasi2?>, <?php echo $opex_realisasi3?>, <?php echo $opex_realisasi4?>],
        //     color : '#1982c4'
        // },
        {
            name: 'Rencana',
            // data: [<?php echo $capex_rencana1?>, <?php echo $capex_rencana2?>, <?php echo $capex_rencana3?>, <?php echo $capex_rencana4?>],
            data : [
                {
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
            color : '#ffca3a'
        }, 
        {
            name: 'Realisasi',
            // data: [<?php echo $capex_rencana1?>, <?php echo $capex_rencana2?>, <?php echo $capex_rencana3?>, <?php echo $capex_rencana4?>],
            data : [
                {
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
            color : '#1982c4'
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
                        click: function (e) {

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
                  if ( this.value > 100000000 ) return Highcharts.numberFormat( this.value/1000000000, 1) + "M";  //  only switch if > 1000
                  return Highcharts.numberFormat(this.value,0);
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
                        click: function (e) {

                            var ids = this.z;
                            return view_detail_capex(ids);
                            // $('#progres_konstruksi_tahap').modal('show');

                            
                        }
                    }
                },
            }
        },
        legend: {
            enabled:true
        },
        credits: {
            enabled: false
        },
        series: [
        {
            name: 'Rencana',
            // data: [<?php echo $capex_rencana1?>, <?php echo $capex_rencana2?>, <?php echo $capex_rencana3?>, <?php echo $capex_rencana4?>],
            data : [
                {
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
            color : '#ffca3a'
        }, 
        {
            name: 'Realisasi',
            // data: [<?php echo $capex_rencana1?>, <?php echo $capex_rencana2?>, <?php echo $capex_rencana3?>, <?php echo $capex_rencana4?>],
            data : [
                {
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
            color : '#1982c4'
        },
        // {
        //     name: 'Realisasi',
        //     data: [<?php echo $capex_realisasi1?>, <?php echo $capex_realisasi2?>, <?php echo $capex_realisasi3?>, <?php echo $capex_realisasi4?>],
        //     color : '#1982c4'
        // },
        //  {
        //     name: 'Deviasi',
        //     data: [1884452614, 4334660482, 17787390611, 9835122396]
        // }
        ]
    });
    <?php  
        foreach($data_seksi as $ds){ 
            $prog_nilai = $this->db->query("select * from progres_nilai where seksi=".$ds->id_seksi." order by tgl_progres desc limit 1")->row_array();
            if($prog_nilai['akrual_progres']!=null){
                $realisasi_nilaii = number_format($prog_nilai['akrual_progres'] / 1000000000000 , 2);
            }else{
                $realisasi_nilaii= 0;
            }

            if($prog_nilai['deviasi_rupiah_akrual']!=null){
                $deviasi_nilaii = number_format($prog_nilai['deviasi_rupiah_akrual'] / 1000000000000 , 2);
            }else{
                $deviasi_nilaii= 0;
            }

            if($prog_nilai['kontrak_ppn']!=null){
                $kontrak_ppn = $prog_nilai['kontrak_ppn'];
            }else{
                $kontrak_ppn= 0;
            }
            
            $persen_nilaii = ($prog_nilai['akrual_progres']/$prog_nilai['kontrak_ppn'])*100;
            $persenNilai = number_format($persen_nilaii,2);
            

            
    ?>

        Highcharts.chart('progres_nilaii'+<?php echo $ds->id_seksi ?>, {
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
                    color : '#118ab2'
                }, {
                    name: 'Deviasi',
                    y: <?php echo $deviasi_nilaii ?>,
                    color : '#faa307'
                }, ]
            }]
        });

    <?php } ?>

    // Highcharts.chart('progres_nilai1', {
    //     chart: {
    //         type: 'pie',
    //         custom: {},
    //         events: {
    //             render() {
    //                 const chart = this,
    //                     series = chart.series[0];
    //                 let customLabel = chart.options.chart.custom.label;

    //                 if (!customLabel) {
    //                     customLabel = chart.options.chart.custom.label =
    //                         chart.renderer.label(
                                
    //                             '<strong>98.86%</strong>'
    //                         )
    //                             .css({
    //                                 color: '#000',
    //                                 textAnchor: 'middle'
    //                             })
    //                             .add();
    //                 }

    //                 const x = series.center[0] + chart.plotLeft,
    //                     y = series.center[1] + chart.plotTop -
    //                     (customLabel.attr('height') / 2);

    //                 customLabel.attr({
    //                     x,
    //                     y
    //                 });
    //                 // Set font size based on chart diameter
    //                 customLabel.css({
    //                     fontSize: `${series.center[2] / 12}px`
    //                 });
    //             }
    //         }
    //     },
    //     accessibility: {
    //         point: {
    //             valueSuffix: '%'
    //         }
    //     },
    //     title: {
    //         text: 'Paket 1.1'
    //     },

    //     tooltip: {
    //         pointFormat: '{series.name}: <b>{point.y} T</b>'
    //     },
    //     legend: {
    //         enabled: false
    //     },
    //     exporting: {
    //         enabled: false
    //     },
    //     credits: {
    //             enabled: false
    //         },
    //     plotOptions: {
    //         series: {
    //             allowPointSelect: true,
    //             cursor: 'pointer',
    //             borderRadius: 8,
    //             dataLabels: [{
    //                 enabled: true,
    //                 distance: 20,
    //                 format: '{point.name}'
    //             }, {
    //                 enabled: true,
    //                 distance: -15,
    //                 format: '{point.y:.3f} T',
    //                 style: {
    //                     fontSize: '0.7em'
    //                 }
    //             }],
    //             showInLegend: true
    //         }
    //     },
    //     series: [{
    //         name: 'Nilai',
    //         colorByPoint: true,
    //         innerSize: '65%',
    //         data: [{
    //             name: 'Realisasi',
    //             y: 4.49,
    //             color : '#118ab2'
    //         }, {
    //             name: 'Deviasi',
    //             y: 0.051,
    //             color : '#faa307'
    //         }, ]
    //     }]
    // });

    // Highcharts.chart('progres_nilai12', {
    //     chart: {
    //         type: 'pie',
    //         custom: {},
    //         events: {
    //             render() {
    //                 const chart = this,
    //                     series = chart.series[0];
    //                 let customLabel = chart.options.chart.custom.label;

    //                 if (!customLabel) {
    //                     customLabel = chart.options.chart.custom.label =
    //                         chart.renderer.label(
                                
    //                             '<strong>78.51%</strong>'
    //                         )
    //                             .css({
    //                                 color: '#000',
    //                                 textAnchor: 'middle'
    //                             })
    //                             .add();
    //                 }

    //                 const x = series.center[0] + chart.plotLeft,
    //                     y = series.center[1] + chart.plotTop -
    //                     (customLabel.attr('height') / 2);

    //                 customLabel.attr({
    //                     x,
    //                     y
    //                 });
    //                 // Set font size based on chart diameter
    //                 customLabel.css({
    //                     fontSize: `${series.center[2] / 12}px`
    //                 });
    //             }
    //         }
    //     },
    //     accessibility: {
    //         point: {
    //             valueSuffix: '%'
    //         }
    //     },
    //     title: {
    //         text: 'Paket 1.2'
    //     },

    //     tooltip: {
    //         pointFormat: '{series.name}: <b>{point.y} T</b>'
    //     },
    //     legend: {
    //         enabled: false
    //     },
    //     exporting: {
    //         enabled: false
    //     },
    //     credits: {
    //             enabled: false
    //         },
    //     plotOptions: {
    //         series: {
    //             allowPointSelect: true,
    //             cursor: 'pointer',
    //             borderRadius: 8,
    //             dataLabels: [{
    //                 enabled: true,
    //                 distance: 20,
    //                 format: '{point.name}'
    //             }, {
    //                 enabled: true,
    //                 distance: -15,
    //                 format: '{point.y:.3f} T',
    //                 style: {
    //                     fontSize: '0.7em'
    //                 }
    //             }],
    //             showInLegend: true
    //         }
    //     },
    //     series: [{
    //         name: 'Nilai',
    //         colorByPoint: true,
    //         innerSize: '65%',
    //         data: [{
    //             name: 'Realisasi',
    //             y: 3.158,
    //             color : '#118ab2'
    //         }, {
    //             name: 'Deviasi',
    //             y: 0.864,
    //             color : '#faa307'
    //         }, ]
    //     }]
    // });

    // Highcharts.chart('progres_nilai21a', {
    //     chart: {
    //         type: 'pie',
    //         custom: {},
    //         events: {
    //             render() {
    //                 const chart = this,
    //                     series = chart.series[0];
    //                 let customLabel = chart.options.chart.custom.label;

    //                 if (!customLabel) {
    //                     customLabel = chart.options.chart.custom.label =
    //                         chart.renderer.label(
                                
    //                             '<strong>2.08%</strong>'
    //                         )
    //                             .css({
    //                                 color: '#000',
    //                                 textAnchor: 'middle'
    //                             })
    //                             .add();
    //                 }

    //                 const x = series.center[0] + chart.plotLeft,
    //                     y = series.center[1] + chart.plotTop -
    //                     (customLabel.attr('height') / 2);

    //                 customLabel.attr({
    //                     x,
    //                     y
    //                 });
    //                 // Set font size based on chart diameter
    //                 customLabel.css({
    //                     fontSize: `${series.center[2] / 12}px`
    //                 });
    //             }
    //         }
    //     },
    //     accessibility: {
    //         point: {
    //             valueSuffix: '%'
    //         }
    //     },
    //     title: {
    //         text: 'Paket 2.1A'
    //     },

    //     tooltip: {
    //         pointFormat: '{series.name}: <b>{point.y} T</b>'
    //     },
    //     legend: {
    //         enabled: false
    //     },
    //     exporting: {
    //         enabled: false
    //     },
    //     credits: {
    //             enabled: false
    //         },
    //     plotOptions: {
    //         series: {
    //             allowPointSelect: true,
    //             cursor: 'pointer',
    //             borderRadius: 8,
    //             dataLabels: [{
    //                 enabled: true,
    //                 distance: 20,
    //                 format: '{point.name}'
    //             }, {
    //                 enabled: true,
    //                 distance: -15,
    //                 format: '{point.y:.3f} T',
    //                 style: {
    //                     fontSize: '0.7em'
    //                 }
    //             }],
    //             showInLegend: true
    //         }
    //     },
    //     series: [{
    //         name: 'Nilai',
    //         colorByPoint: true,
    //         innerSize: '65%',
    //         data: [{
    //             name: 'Realisasi',
    //             y: 0.034,
    //             color : '#118ab2'
    //         }, {
    //             name: 'Deviasi',
    //             y: 1.632,
    //             color : '#faa307'
    //         }, ]
    //     }]
    // });

    // Highcharts.chart('progres_nilai21b', {
    //     chart: {
    //         type: 'pie',
    //         custom: {},
    //         events: {
    //             render() {
    //                 const chart = this,
    //                     series = chart.series[0];
    //                 let customLabel = chart.options.chart.custom.label;

    //                 if (!customLabel) {
    //                     customLabel = chart.options.chart.custom.label =
    //                         chart.renderer.label(
                                
    //                             '<strong>0.0%</strong>'
    //                         )
    //                             .css({
    //                                 color: '#000',
    //                                 textAnchor: 'middle'
    //                             })
    //                             .add();
    //                 }

    //                 const x = series.center[0] + chart.plotLeft,
    //                     y = series.center[1] + chart.plotTop -
    //                     (customLabel.attr('height') / 2);

    //                 customLabel.attr({
    //                     x,
    //                     y
    //                 });
    //                 // Set font size based on chart diameter
    //                 customLabel.css({
    //                     fontSize: `${series.center[2] / 12}px`
    //                 });
    //             }
    //         }
    //     },
    //     accessibility: {
    //         point: {
    //             valueSuffix: '%'
    //         }
    //     },
    //     title: {
    //         text: 'Paket 2.1B'
    //     },

    //     tooltip: {
    //         pointFormat: '{series.name}: <b>{point.y} T</b>'
    //     },
    //     legend: {
    //         enabled: false
    //     },
    //     exporting: {
    //         enabled: false
    //     },
    //     credits: {
    //             enabled: false
    //         },
    //     plotOptions: {
    //         series: {
    //             allowPointSelect: true,
    //             cursor: 'pointer',
    //             borderRadius: 8,
    //             dataLabels: [{
    //                 enabled: true,
    //                 distance: 20,
    //                 format: '{point.name}'
    //             }, {
    //                 enabled: true,
    //                 distance: -15,
    //                 format: '{point.y:.3f} T',
    //                 style: {
    //                     fontSize: '0.7em'
    //                 }
    //             }],
    //             showInLegend: true
    //         }
    //     },
    //     series: [{
    //         name: 'Nilai',
    //         colorByPoint: true,
    //         innerSize: '65%',
    //         data: [{
    //             name: 'Realisasi',
    //             y: 0,
    //             color : '#118ab2'
    //         }, {
    //             name: 'Deviasi',
    //             y: 0,
    //             color : '#faa307'
    //         }, ]
    //     }]
    // });

    // Highcharts.chart('progres_nilai22a', {
    //     chart: {
    //         type: 'pie',
    //         custom: {},
    //         events: {
    //             render() {
    //                 const chart = this,
    //                     series = chart.series[0];
    //                 let customLabel = chart.options.chart.custom.label;

    //                 if (!customLabel) {
    //                     customLabel = chart.options.chart.custom.label =
    //                         chart.renderer.label(
                                
    //                             '<strong>0.0%</strong>'
    //                         )
    //                             .css({
    //                                 color: '#000',
    //                                 textAnchor: 'middle'
    //                             })
    //                             .add();
    //                 }

    //                 const x = series.center[0] + chart.plotLeft,
    //                     y = series.center[1] + chart.plotTop -
    //                     (customLabel.attr('height') / 2);

    //                 customLabel.attr({
    //                     x,
    //                     y
    //                 });
    //                 // Set font size based on chart diameter
    //                 customLabel.css({
    //                     fontSize: `${series.center[2] / 12}px`
    //                 });
    //             }
    //         }
    //     },
    //     accessibility: {
    //         point: {
    //             valueSuffix: '%'
    //         }
    //     },
    //     title: {
    //         text: 'Paket 2.2A'
    //     },

    //     tooltip: {
    //         pointFormat: '{series.name}: <b>{point.y} T</b>'
    //     },
    //     legend: {
    //         enabled: false
    //     },
    //     exporting: {
    //         enabled: false
    //     },
    //     credits: {
    //             enabled: false
    //         },
    //     plotOptions: {
    //         series: {
    //             allowPointSelect: true,
    //             cursor: 'pointer',
    //             borderRadius: 8,
    //             dataLabels: [{
    //                 enabled: true,
    //                 distance: 20,
    //                 format: '{point.name}'
    //             }, {
    //                 enabled: true,
    //                 distance: -15,
    //                 format: '{point.y:.3f} T',
    //                 style: {
    //                     fontSize: '0.7em'
    //                 }
    //             }],
    //             showInLegend: true
    //         }
    //     },
    //     series: [{
    //         name: 'Nilai',
    //         colorByPoint: true,
    //         innerSize: '65%',
    //         data: [{
    //             name: 'Realisasi',
    //             y: 0,
    //             color : '#118ab2'
    //         }, {
    //             name: 'Deviasi',
    //             y: 0,
    //             color : '#faa307'
    //         }, ]
    //     }]
    // });

    // Highcharts.chart('progres_nilai22b', {
    //     chart: {
    //         type: 'pie',
    //         custom: {},
    //         events: {
    //             render() {
    //                 const chart = this,
    //                     series = chart.series[0];
    //                 let customLabel = chart.options.chart.custom.label;

    //                 if (!customLabel) {
    //                     customLabel = chart.options.chart.custom.label =
    //                         chart.renderer.label(
                                
    //                             '<strong>44.64%</strong>'
    //                         )
    //                             .css({
    //                                 color: '#000',
    //                                 textAnchor: 'middle'
    //                             })
    //                             .add();
    //                 }

    //                 const x = series.center[0] + chart.plotLeft,
    //                     y = series.center[1] + chart.plotTop -
    //                     (customLabel.attr('height') / 2);

    //                 customLabel.attr({
    //                     x,
    //                     y
    //                 });
    //                 // Set font size based on chart diameter
    //                 customLabel.css({
    //                     fontSize: `${series.center[2] / 12}px`
    //                 });
    //             }
    //         }
    //     },
    //     accessibility: {
    //         point: {
    //             valueSuffix: '%'
    //         }
    //     },
    //     title: {
    //         text: 'Paket 2.2B'
    //     },

    //     tooltip: {
    //         pointFormat: '{series.name}: <b>{point.y} T</b>'
    //     },
    //     legend: {
    //         enabled: false
    //     },
    //     exporting: {
    //         enabled: false
    //     },
    //     credits: {
    //             enabled: false
    //         },
    //     plotOptions: {
    //         series: {
    //             allowPointSelect: true,
    //             cursor: 'pointer',
    //             borderRadius: 8,
    //             dataLabels: [{
    //                 enabled: true,
    //                 distance: 20,
    //                 format: '{point.name}'
    //             }, {
    //                 enabled: true,
    //                 distance: -15,
    //                 format: '{point.y:.3f} T',
    //                 style: {
    //                     fontSize: '0.7em'
    //                 }
    //             }],
    //             showInLegend: true
    //         }
    //     },
    //     series: [{
    //         name: 'Nilai',
    //         colorByPoint: true,
    //         innerSize: '65%',
    //         data: [{
    //             name: 'Realisasi',
    //             y: 0.659,
    //             color : '#118ab2'
    //         }, {
    //             name: 'Deviasi',
    //             y: 0.817,
    //             color : '#faa307'
    //         }, ]
    //     }]
    // });

    // Highcharts.chart('progres_nilai22c', {
    //     chart: {
    //         type: 'pie',
    //         custom: {},
    //         events: {
    //             render() {
    //                 const chart = this,
    //                     series = chart.series[0];
    //                 let customLabel = chart.options.chart.custom.label;

    //                 if (!customLabel) {
    //                     customLabel = chart.options.chart.custom.label =
    //                         chart.renderer.label(
                                
    //                             '<strong>0.0%</strong>'
    //                         )
    //                             .css({
    //                                 color: '#000',
    //                                 textAnchor: 'middle'
    //                             })
    //                             .add();
    //                 }

    //                 const x = series.center[0] + chart.plotLeft,
    //                     y = series.center[1] + chart.plotTop -
    //                     (customLabel.attr('height') / 2);

    //                 customLabel.attr({
    //                     x,
    //                     y
    //                 });
    //                 // Set font size based on chart diameter
    //                 customLabel.css({
    //                     fontSize: `${series.center[2] / 12}px`
    //                 });
    //             }
    //         }
    //     },
    //     accessibility: {
    //         point: {
    //             valueSuffix: '%'
    //         }
    //     },
    //     title: {
    //         text: 'Paket 3.1'
    //     },

    //     tooltip: {
    //         pointFormat: '{series.name}: <b>{point.y} T</b>'
    //     },
    //     legend: {
    //         enabled: false
    //     },
    //     exporting: {
    //         enabled: false
    //     },
    //     credits: {
    //             enabled: false
    //         },
    //     plotOptions: {
    //         series: {
    //             allowPointSelect: true,
    //             cursor: 'pointer',
    //             borderRadius: 8,
    //             dataLabels: [{
    //                 enabled: true,
    //                 distance: 20,
    //                 format: '{point.name}'
    //             }, {
    //                 enabled: true,
    //                 distance: -15,
    //                 format: '{point.y:.3f} T',
    //                 style: {
    //                     fontSize: '0.7em'
    //                 }
    //             }],
    //             showInLegend: true
    //         }
    //     },
    //     series: [{
    //         name: 'Nilai',
    //         colorByPoint: true,
    //         innerSize: '65%',
    //         data: [{
    //             name: 'Realisasi',
    //             y: 0,
    //             color : '#118ab2'
    //         }, {
    //             name: 'Deviasi',
    //             y: 0,
    //             color : '#faa307'
    //         }, ]
    //     }]
    // });

    // Highcharts.chart('progres_nilai31', {
    //     chart: {
    //         type: 'pie',
    //         custom: {},
    //         events: {
    //             render() {
    //                 const chart = this,
    //                     series = chart.series[0];
    //                 let customLabel = chart.options.chart.custom.label;

    //                 if (!customLabel) {
    //                     customLabel = chart.options.chart.custom.label =
    //                         chart.renderer.label(
                                
    //                             '<strong>0.0%</strong>'
    //                         )
    //                             .css({
    //                                 color: '#000',
    //                                 textAnchor: 'middle'
    //                             })
    //                             .add();
    //                 }

    //                 const x = series.center[0] + chart.plotLeft,
    //                     y = series.center[1] + chart.plotTop -
    //                     (customLabel.attr('height') / 2);

    //                 customLabel.attr({
    //                     x,
    //                     y
    //                 });
    //                 // Set font size based on chart diameter
    //                 customLabel.css({
    //                     fontSize: `${series.center[2] / 12}px`
    //                 });
    //             }
    //         }
    //     },
    //     accessibility: {
    //         point: {
    //             valueSuffix: '%'
    //         }
    //     },
    //     title: {
    //         text: 'Paket 3.2'
    //     },

    //     tooltip: {
    //         pointFormat: '{series.name}: <b>{point.y} T</b>'
    //     },
    //     legend: {
    //         enabled: false
    //     },
    //     exporting: {
    //         enabled: false
    //     },
    //     credits: {
    //             enabled: false
    //         },
    //     plotOptions: {
    //         series: {
    //             allowPointSelect: true,
    //             cursor: 'pointer',
    //             borderRadius: 8,
    //             dataLabels: [{
    //                 enabled: true,
    //                 distance: 20,
    //                 format: '{point.name}'
    //             }, {
    //                 enabled: true,
    //                 distance: -15,
    //                 format: '{point.y:.3f} T',
    //                 style: {
    //                     fontSize: '0.7em'
    //                 }
    //             }],
    //             showInLegend: true
    //         }
    //     },
    //     series: [{
    //         name: 'Nilai',
    //         colorByPoint: true,
    //         innerSize: '65%',
    //         data: [{
    //             name: 'Realisasi',
    //             y: 0,
    //             color : '#118ab2'
    //         }, {
    //             name: 'Deviasi',
    //             y: 0,
    //             color : '#faa307'
    //         }, ]
    //     }]
    // });


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
            enabled:true
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


    Highcharts.theme = {
        colors: ['#de4e37', '#2384cf', '#05b071', '#0535b0', '#9cb005', '#b08805',   
                 '#b00582', '#FFF263', '#6AF9C4'],
        chart: {
            backgroundColor: {
                linearGradient: [0, 0, 500, 500],
                stops: [
                    [0, 'rgb(255, 255, 255)'],
                    [1, 'rgb(240, 240, 255)']
                ]
            },
        },
        credits: {
          enabled: false
        },
        title: {
            style: {
                color: '#000',
                font: 'bold 16px "Trebuchet MS", Verdana, sans-serif'
            }
        },
        subtitle: {
            style: {
                color: '#666666',
                font: 'bold 12px "Trebuchet MS", Verdana, sans-serif'
            }
        },
        legend: {
            itemStyle: {
                font: '9pt Trebuchet MS, Verdana, sans-serif',
                color: 'black'
            },
            itemHoverStyle:{
                color: 'gray'
            }   
        }
    };

    Highcharts.setOptions(Highcharts.theme);


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
            categories: ['Paket 1.1<br>Kartasura-Klaten<br><b>22.3 km</b>', 'Paket 1.2<br>Klaten-Purwomartani<br><b>20.08 km</b>','Paket 2.1A<br>Purwomartani-Maguwoharjo<br><b>3.725 km</b>','Paket 2.1B<br>Maguwoharjo-Monjali<br><b>5.7 km</b>','Paket 2.2A<br>Monjali-Trihanggo<br><b>2.8 km</b>','Paket 2.2B<br>Trihanggo-JC Sleman<br><b>3.24 km</b>','Paket 3.1<br>Junction Sleman-Gamping<br><b>7.417 km</b>','Paket 3.2<br>Gamping-Sentolo<br><b>10 km</b>','Paket 3.3<br>Sentolo-Wates<br><b>7.995 km</b>','Paket 3.4<br>Wates-Kulonprogo<br><b>10.331 km</b>','Paket 3.5<br>Kulonprogo - Purworejo<br><b>3.135 km</b>'],
            crosshair: true,
            accessibility: {
                description: 'Countries'
            }
        },
        yAxis: {
            min: 0,
            max:100,
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
                                fontSize:'12px',
                                color:'black'
                            }
                        },
            }
        },
        series: [
            {
                name: 'Konstruksi',
                data: [<?php echo $prog_fisik1?>, <?php echo $prog_fisik2 ?>,<?php echo $prog_fisik21a ?>,<?php echo $prog_fisik21b?>,<?php echo $prog_fisik22a?>,<?php echo $prog_fisik22b?>,<?php echo $prog_fisik31?>,<?php echo $prog_fisik32?>,<?php echo $prog_fisik33?>,<?php echo $prog_fisik34?>,<?php echo $prog_fisik35?>],
                color : '#FFb848'
            },{
                name: 'Pembebasan Lahan (UGK)',
                data: [<?php echo $prog_lahan11?>, <?php echo $prog_lahan12?>,<?php echo $prog_lahan21a?>,<?php echo $prog_lahan21b?>,0,<?php echo $prog_lahan22b?>,<?php echo $prog_lahan31?>,<?php echo $prog_lahan32?>,<?php echo $prog_lahan33?>,<?php echo $prog_lahan34?>,<?php echo $prog_lahan35?>],
                color:'#0077b6'
            },{
                name: 'RTA',
                data: [<?php echo $prog_rta1?>, <?php echo $prog_rta2?>,<?php echo $prog_rta21a?>,<?php echo $prog_rta21b?>,<?php echo $prog_rta22a?>,<?php echo $prog_rta22b?>,<?php echo $prog_rta31?>,<?php echo $prog_rta32?>,<?php echo $prog_rta33?>,<?php echo $prog_rta34?>,<?php echo $prog_rta35?> ],
                color:'#28b779'
            },
            
            
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
                    format : '<b>{point.percentage:.1f}%</b>',
                    distance: -50,
                    formatter: function() {
                            return IDRFormatter(this.value, 'Rp.')              
                        } 
                },
                point: {
                    events: {
                        click: function (e) {
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
            enabled : true,
        },
        series: [{
            name: 'Nilai',
            data: [{
                name: 'Debt',
                y: 70,
                sliced: true,
                selected: true,
                z : 1,
            }, {
                name: 'Equity',
                y: 30,
                z: 2,
            }
            
            ]
        }]
    });

  

    // Highcharts.chart('bar_irr', {
    //     chart: {
    //         type: 'bar'
    //     },
    //     title: {
    //         text: ' ',
    //         align: 'left'
    //     },

    //     xAxis: {
    //         categories: ['PPJT','Add-2 PPJT', 'BP OE'],
    //         title: {
    //             text: null
    //         },
    //         gridLineWidth: 1,
    //         lineWidth: 0
    //     },
    //     yAxis: {
    //         min: 0,
    //         title: {
    //             text: '%',
    //         },
    //         labels: {
    //             overflow: 'justify'
    //         },
    //         gridLineWidth: 0
    //     },
    //     tooltip: {
    //         valueSuffix: ' %'
    //     },
    //     plotOptions: {
    //         bar: {
    //             borderRadius: '50%',
    //             dataLabels: {
    //                 enabled: true
    //             },
    //             groupPadding: 0.1
    //         }
    //     },
    //     legend: {
    //         enabled : false
    //     },
    //     exporting: {
    //      enabled: false
    //     },
    //     credits: {
    //         enabled: false
    //     },
    //     series: [{
    //         name: 'Persentase',
    //         data: [12.03, 12.03, 12.71],
    //         color : '#ff595e'
    //     },]
    // });

    // Highcharts.chart('bar_pbp', {
    //     chart: {
    //         type: 'bar'
    //     },
    //     title: {
    //         text: ' ',
    //         align: 'left'
    //     },

    //     xAxis: {
    //         categories: ['PPJT','Add-2 PPJT', 'BP OE'],
    //         title: {
    //             text: null
    //         },
    //         gridLineWidth: 1,
    //         lineWidth: 0
    //     },
    //     yAxis: {
    //         min: 0,
    //         title: {
    //             text: 'Tahun',
    //         },
    //         labels: {
    //             overflow: 'justify'
    //         },
    //         gridLineWidth: 0
    //     },
    //     tooltip: {
    //         valueSuffix: ' tahun'
    //     },
    //     plotOptions: {
    //         bar: {
    //             borderRadius: '50%',
    //             dataLabels: {
    //                 enabled: true
    //             },
    //             groupPadding: 0.1
    //         }
    //     },
    //     legend: {
    //         enabled : false
    //     },
    //     exporting: {
    //      enabled: false
    //     },
    //     credits: {
    //         enabled: false
    //     },
    //     series: [{
    //         name: 'Tahun',
    //         data: [12, 13, 13],
    //         color : '#8ac926'
    //     },]
    // });

    // Highcharts.chart('bar_npv', {
    //     chart: {
    //         type: 'bar'
    //     },
    //     title: {
    //         text: ' ',
    //         align: 'left'
    //     },

    //     xAxis: {
    //         categories: ['PPJT','Add-2 PPJT', 'BP OE'],
    //         title: {
    //             text: null
    //         },
    //         gridLineWidth: 1,
    //         lineWidth: 0
    //     },
    //     yAxis: {
    //         min: 0,
    //         title: {
    //             text: 'Nilai',
    //         },
    //         labels: {
    //             overflow: 'justify'
    //         },
    //         gridLineWidth: 0
    //     },
    //     tooltip: {
    //         valueSuffix: ' '
    //     },
    //     plotOptions: {
    //         bar: {
    //             borderRadius: '50%',
    //             dataLabels: {
    //                 enabled: true
    //             },
    //             groupPadding: 0.1
    //         }
    //     },
    //     legend: {
    //         enabled : false
    //     },
    //     exporting: {
    //      enabled: false
    //     },
    //     credits: {
    //         enabled: false
    //     },
    //     series: [{
    //         name: 'Nilai',
    //         data: [2260135,2225445, 2314016],
    //         color : '#1982c4'
    //     },]
    // });


   <?php if($this->session->userdata('level_user')==1) { ?>

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
                    format : '<b>{point.y}</b>',
                    distance: -40,
                },
                showInLegend: true,
                point: {
                    events: {
                        click: function (e) {

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
                          '#90be6d' ,
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
            enabled : true,
            labelFormat: '{name} ({y:.0f})',
        },
        series: [{
            name: 'Jumlah Kekurangan',
            colorByPoint: true,
            data: [ {
                name: 'Surat Penawaran',
                y: <?php echo $krg_penawaran_ksi ?>,
                sliced: true,
                selected: true,
                z : 1,
            }, {
                name: 'SPMK',
                y: <?php echo $krg_spmk_ksi ?>,
                z: 10,
            }, {
                name: 'HPS',
                y: <?php echo $krg_hps_ksi ?>,
                z : 74,
            }, {
                name: 'Kontrak',
                y: <?php echo $krg_kontrak_ksi ?>,
                z: 11,
            },{
                name: 'Permohonan IP',
                y: <?php echo $krg_permohononanPrinsip_ksi ?>,
                z: 52,
            }, {
                name: 'KUK',
                y: <?php echo $krg_kuk_ksi ?>,
                z: 12,
            },{
                name: 'Persetujuan IP',
                y: <?php echo $krg_persetujuanPrinsip_ksi ?>,
                z: 53,
            },{
                name: 'KAK',
                y: <?php echo $krg_kak_ksi ?>,
                z: 13,
            }, {
                name: 'Penunjukan <br>Pemenang',
                y: <?php echo $krg_penunjukanPemenang_ksi ?>,
                z: 3,
            },{
                name: 'KKK',
                y: <?php echo $krg_kkk_ksi ?>,
                z: 75,
            },{
                name: 'Jaminan Pelaksanaan',
                y: <?php echo $krg_jaminanPelaksanaan_ksi ?>,
                z: 73,
            },{
                name: 'Daftar Kuantitasc& <br>Harga',
                y: <?php echo $krg_harga_ksi ?>,
                z: 14,
            },{
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
                    format : '<b>{point.y}</b>',
                    distance: -40,
                },
                showInLegend: true,
                point: {
                    events: {
                        click: function (e) {

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
                          '#1CD345' ,
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
            enabled : true,
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
                z : 71,
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
            },{
                name: 'Backup Quality',
                y: <?php echo $b_quality ?>,
                z: 43,
            },{
                name: 'Laporan',
                y: <?php echo $laporan ?>,
                z: 44,
            },{
                name: 'Copy Kontrak',
                y: <?php echo $c_kontrak ?>,
                z: 67,
            },{
                name: 'Copy SPMK',
                y: <?php echo $c_spmk ?>,
                z: 66,
            },{
                name: 'Copy SK PKP',
                y: <?php echo $c_sk ?>,
                z: 64,
            },{
                name: 'NPWP Perusahaan',
                y: <?php echo $c_npwp ?>,
                z: 63,
            },{
                name: 'Copy SBU',
                y: <?php echo $c_sbu ?>,
                z: 62,
            },{
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
                    format : '<b>{point.y}</b>',
                    distance: -40,
                },
                showInLegend: true,
                point: {
                    events: {
                        click: function (e) {

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
                          '#52b69a' ,
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
            enabled : true,
            labelFormat: '{name} ({y:.0f})',
        },
        series: [{
            name: 'Jumlah Kekurangan',
            colorByPoint: true,
            data: [ 
            {
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
            },{
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
                    format : '<b>{point.y}</b>',
                    distance: -40,
                },
                showInLegend: true,
                point: {
                    events: {
                        click: function (e) {

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
                          '#90be6d' ,
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
            enabled : true,
            labelFormat: '{name} ({y:.0f})',
        },
        series: [{
            name: 'Jumlah Kekurangan',
            colorByPoint: true,
            data: [ {
                name: 'Surat Penawaran',
                y: <?php echo $krg_penawaran_kst ?>,
                sliced: true,
                selected: true,
                z : 1,
            }, {
                name: 'HPS',
                y: <?php echo $krg_hps_kst ?>,
                z : 74,
            },{
                name: 'Permohonan Ijin Prinsip',
                y: <?php echo $krg_permohononanPrinsip_kst ?>,
                z: 52,
            },{
                name: 'Persetujuan Ijin Prinsip',
                y: <?php echo $krg_persetujuanPrinsip_kst ?>,
                z: 53,
            },{
                name: 'Penunjukan Pemenang',
                y: <?php echo $krg_suratPenunjukan_kst ?>,
                z: 3,
            },{
                name: 'Jaminan Pelaksanaan',
                y: <?php echo $krg_jaminanPelaksanaan_kst ?>,
                z: 73,
            },{
                name: 'Jaminan Penawaran',
                y: <?php echo $krg_jaminanPenawaran_kst ?>,
                z: 72,
            },{
                name: 'SPMK',
                y: <?php echo $krg_spmk_kst ?>,
                z: 10,
            }, {
                name: 'Kontrak',
                y: <?php echo $krg_kontrak_kst ?>,
                z: 11,
            },{
                name: 'KUK',
                y: <?php echo $krg_ketUmum_kst ?>,
                z: 12,
            },{
                name: 'KAK',
                y: <?php echo $krg_kak_kst ?>,
                z: 13,
            },{
                name: 'KKK',
                y: <?php echo $krg_kkk_kst ?>,
                z: 75,
            },{
                name: 'Daftar Kuantitasa & Harga',
                y: <?php echo $krg_kuantitas_kst ?>,
                z : 14,
            },{
                name: 'IKP',
                y: <?php echo $krg_instruksi_kst ?>,
                z : 15,
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
                    format : '<b>{point.y}</b>',
                    distance: -40,
                },
                showInLegend: true,
                point: {
                    events: {
                        click: function (e) {

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
                          '#1CD345' ,
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
            enabled : true,
            labelFormat: '{name} ({y:.0f})',
        },
        series: [{
            name: 'Jumlah Kekurangan',
            colorByPoint: true,
           data: [ {
                name: 'Berita Acara Pembayaran (BAP)',
                y: <?php echo $bap_kst ?>,
                sliced: true,
                selected: true,
                z : 31,
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
            },{
                name: 'Kwintansi',
                y: <?php echo $kwitansi_kst ?>,
                z: 33,
            },{
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

<script type="text/javascript">


   var peta1 = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        id: 'mapbox/streets-v11'
    });

    var peta2 = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
       subdomains:['mt0','mt1','mt2','mt3']
     });


    var peta3 = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors | <a href="https://www.google.com/maps">Google Maps</a>',
        subdomains:['mt0','mt1','mt2','mt3']
     });

    var peta4 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/dark-v10'
        });

 

    const map = L.map('map', {
        center: [-7.7088,110.3609],
        zoom: 11,
        layers: [peta2],
    });

    const baseLayers = {
        'Default': peta1,
        'Satelite': peta2,
        'Street': peta3,
        // 'Dark': peta4,
    };

    const layerControl = L.control.layers(baseLayers).addTo(map);


    function highlightFeature(e) {
        var layer = e.target;

        layer.setStyle({
            weight: 5,
            color: '#666',
            dashArray: '',
            fillOpacity: 0.7
        });

        layer.bringToFront();
    }
    function resetHighlight(e) {
        geoLayer.resetStyle(e.target);
    }
    function zoomToFeature(e) {
        map.fitBounds(e.target.getBounds());
    }

    // function onEachFeature(feature, layer) {
    //     layer.on({
    //         // mouseover: highlightFeature,
    //         // mouseout: resetHighlight,
    //         click: zoomToFeature
    //     });
    //     var content = layer.feature.properties.Propinsi.toString();
    //     layer.bindTooltip(content, {
    //       direction: 'center',
    //       permanent: false,
    //     //   className: 'styleLabelBidang'
    //     });

    // }

    function onEachFeature(feature, layer) {
        layer.on({
            // mouseover: highlightFeature,
            // mouseout: resetHighlight,
            click: zoomToFeature
        });
        var content = layer.feature.properties.STA_1.toString();
        layer.bindTooltip(content, {
          direction: 'center',
          permanent: false,
          className: 'styleLabelBidang'
        });

    }

     var LeafIcon = L.Icon.extend({
        options: {
            // shadowUrl: 'leaf-shadow.png',
            iconSize:     [40, 50],
            iconAnchor:   [20, 30],
            popupAnchor:  [-8, -30]
            
        }
    });

     var polosIcon = L.Icon.extend({
        options: {
            // shadowUrl: 'leaf-shadow.png',
            iconSize:     [15, 25],
            iconAnchor:   [10, 20],
            popupAnchor:  [-8, -30]
            
        }
    });

    var bandara = new LeafIcon({iconUrl: '<?= base_url('file_uploads/maps/bandara.png') ?>'}),
        redIcon = new polosIcon({iconUrl: '<?= base_url('file_uploads/maps/red.png') ?>'}),
        blueIcon = new polosIcon({iconUrl: '<?= base_url('file_uploads/maps/blue.png') ?>'}),
        pramIcon = new polosIcon({iconUrl: '<?= base_url('file_uploads/maps/prambanan.png') ?>'});

    // var marker = new L.marker([-7.67648,110.59157], { opacity: 0.01 });
    //             marker.bindLabel("Simpang Susun", {noHide: true, className: "styleLabelBidang", offset: [0, 0] });
    //             marker.addTo(map);


    L.marker([-7.895927,110.060492], {icon: bandara}).bindPopup("<center><h6><b>NYIA</b></h6></center>").addTo(map);
    L.marker([-7.7857558,110.4372211], {icon: bandara}).bindPopup("<center><h6>Bandar Udara <br>Adi Sucipto</h6></center>").addTo(map);
    L.marker([-7.515496122028939, 110.75711912862944], {icon: bandara}).bindPopup("<center><h6>Bandar Udara <br>Adi Soemarmo</h6></center>").addTo(map);
    // L.marker([-7.751903661120661, 110.49189655335714], {icon: pramIcon}).bindPopup("<center><h6>Prambanan</h6></center>").addTo(map);

    L.marker([-7.551785,110.707362], { opacity: 0.01 }).bindTooltip("SS Kartasura",{ permanent: true, className: "styleLabelPermanent", offset: [-5, 20] }).addTo(map);
    L.marker([-7.6386116,110.6631632], { opacity: 0.01 }).bindTooltip("SS Karanganom",{ permanent: false, className: "styleLabelPermanent", offset: [-35, 55] }).addTo(map);
    L.marker([-7.676208,110.591498], { opacity: 0.01 }).bindTooltip("SS Klaten",{ permanent: false, className: "styleLabelPermanent", offset: [-40, 40] }).addTo(map);
    L.marker([-7.791832,110.302509], { opacity: 0.01 }).bindTooltip("SS Gamping",{ permanent: false, className: "styleLabelPermanent", offset: [-10, 50] }).addTo(map);
    L.marker([-7.8119895,110.2162326], { opacity: 0.01 }).bindTooltip("SS Sentolo",{ permanent: false, className: "styleLabelPermanent", offset: [0, 40] }).addTo(map);
    L.marker([-7.845436,110.152476], { opacity: 0.01 }).bindTooltip("SS Wates",{ permanent: true, className: "styleLabelPermanent", offset: [5, 30] }).addTo(map);
    // L.marker([-7.67552,110.59109], {icon: redIcon}).bindTooltip("<center><p>Simpang Susun Klaten</p></center>",{ permanent: false }).addTo(map);


    $.getJSON("<?= base_url('file_uploads/maps/seksi1-1.geojson') ?>", function(data){

        const styleLine = {
            radius: 7,
            fillColor : "#ff006e",
            color : "#ff006e",
            weight: 14,
            opacity: 1,
            fillOpacity : 0.8,
            onEachFeature: onEachFeature
        }
                
        geoLayer = L.geoJson(data, {
            pointToLayer: function(feature,latlng){
                return L.Polyline(latlng, styleLine)
            },
            style: function(){
                return { color: '#1dd3b0' }
            },
            onEachFeature: function (feature, layer) {
                // layer.bindPopup('<center><h6><b>Detail</b></h6></center><hr>'+
                //                 '<center><img src="<?=base_url()?>assets/assets/images/foto_jalan.jpg" alt="map photo" height="120px"/></center>'+
                //                 // '<p>Seksi &emsp;&emsp;&emsp; : Seksi 1 </p>'+
                //                 '<p>Paket &emsp;&emsp;&emsp; : Paket 1.1 </p>'+
                //                 '<p>Panjang &emsp;&emsp; : 22.3 km </p>'+
                //                 '<p>Status &emsp;&emsp;&emsp;: Operasi</p>'
                // ,{minWidth : 200});
            }
        }).addTo(map);

    })

    $.getJSON("<?= base_url('file_uploads/maps/simpang_susun11.geojson') ?>", function(data){

        const styleLine = {
            radius: 5,
            fillColor : "#ff006e",
            color : "#ff006e",
            weight: 7,
            opacity: 1,
            fillOpacity : 0.8,
            onEachFeature: onEachFeature
        }
                
        geoLayer = L.geoJson(data, {
            pointToLayer: function(feature,latlng){
                return L.Polyline(latlng, styleLine)
            },
            style: function(){
                return { color: '#1dd3b0' }
            },
            
        }).addTo(map);

    })

    $.getJSON("<?= base_url('file_uploads/maps/seksi1-2.geojson') ?>", function(data){

        const styleLine = {
            radius: 5,
            fillColor : "#ff006e",
            color : "#ff006e",
            weight: 7,
            opacity: 1,
            fillOpacity : 0.8,
            onEachFeature: onEachFeature
        }
                
        geoLayer = L.geoJson(data, {
            pointToLayer: function(feature,latlng){
                return L.Polyline(latlng, styleLine)
            },
            style: function(){
                return { color: '#ff9500' }
            },
            onEachFeature: function (feature, layer) {
                layer.bindPopup('<center><h6><b>Detail</b></h6></center><hr>'+
                                // '<p>Seksi &emsp;&emsp;&emsp; : Seksi 1 </p>'+
                                '<p>Paket &emsp;&emsp;&emsp; : Paket 1.2 </p>'+
                                '<p>Panjang &emsp;&emsp; : 22.3 km </p>'+
                                '<p>Status &emsp;&emsp;&emsp;: Konstruksi</p>'
                );

            }
        }).addTo(map);

    })

     $.getJSON("<?= base_url('file_uploads/maps/simpang_susun12.geojson') ?>", function(data){

        const styleLine = {
            radius: 5,
            fillColor : "#ff006e",
            color : "#ff006e",
            weight: 7,
            opacity: 1,
            fillOpacity : 0.8,
            onEachFeature: onEachFeature
        }
                
        geoLayer = L.geoJson(data, {
            pointToLayer: function(feature,latlng){
                return L.Polyline(latlng, styleLine)
            },
            style: function(){
                return { color: '#ff9500' }
            },
            
        }).addTo(map);

    })

     $.getJSON("<?= base_url('file_uploads/maps/seksi13.geojson') ?>", function(data){

        const styleLine = {
            radius: 5,
            fillColor : "#ff006e",
            color : "#ff006e",
            weight: 7,
            opacity: 1,
            fillOpacity : 0.8,
            onEachFeature: onEachFeature
        }
                
        geoLayer = L.geoJson(data, {
            pointToLayer: function(feature,latlng){
                return L.Polyline(latlng, styleLine)
            },
            style: function(){
                return { color: '#ff3014' }
            },
            onEachFeature: function (feature, layer) {
                layer.bindPopup('<center><h6><b>Detail</b></h6></center><hr>'+
                                // '<p>Seksi &emsp;&emsp;&emsp; : Seksi 2 </p>'+
                                '<p>Panjang &emsp;&emsp; : 6.88 km </p>'+
                                '<p>Status &emsp;&emsp;&emsp;: Konstruksi</p>'
                );

            }
        }).addTo(map);

    })

    $.getJSON("<?= base_url('file_uploads/maps/seksi3.geojson') ?>", function(data){

        const styleLine = {
            radius: 5,
            fillColor : "#ff006e",
            color : "#ff006e",
            weight: 7,
            opacity: 1,
            fillOpacity : 0.8,
            onEachFeature: onEachFeature
        }
                
        geoLayer = L.geoJson(data, {
            pointToLayer: function(feature,latlng){
                return L.Polyline(latlng, styleLine)
            },
            style: function(){
                return { color: '#c77dff' }
            },
            onEachFeature: function (feature, layer) {
                layer.bindPopup('<center><h6><b>Detail</b></h6></center><hr>'+
                                // '<p>Seksi &emsp;&emsp;&emsp; : Seksi 3 </p>'+
                                '<p>Panjang &emsp;&emsp; : 38.57 km </p>'+
                                '<p>Status &emsp;&emsp;&emsp;: Persiapan</p>'
                );

             
            }

        }).addTo(map);

    })

    $.getJSON("<?= base_url('file_uploads/maps/junction.geojson') ?>", function(data){

        const styleLine = {
            radius: 5,
            fillColor : "#ff006e",
            color : "#ff006e",
            weight: 7,
            opacity: 1,
            fillOpacity : 0.8,
            onEachFeature: onEachFeature
        }
                
        geoLayer = L.geoJson(data, {
            pointToLayer: function(feature,latlng){
                return L.Polyline(latlng, styleLine)
            },
            style: function(){
                return { color: '#ff3014' }
            },
            onEachFeature: function (feature, layer) {
                layer.bindPopup('<center><h6><b>Detail</b></h6></center><hr>'+
                                // '<p>Seksi &emsp;&emsp;&emsp; : Seksi 3 </p>'+
                                '<p>Panjang &emsp;&emsp; : 38.57 km </p>'+
                                '<p>Status &emsp;&emsp;&emsp;: Persiapan</p>'
                );

             
            }

        }).addTo(map);

    })

    $.getJSON("<?= base_url('file_uploads/maps/simpang_susun3.geojson') ?>", function(data){

        const styleLine = {
            radius: 5,
            fillColor : "#ff006e",
            color : "#ff006e",
            weight: 7,
            opacity: 1,
            fillOpacity : 0.8,
            onEachFeature: onEachFeature
        }
                
        geoLayer = L.geoJson(data, {
            pointToLayer: function(feature,latlng){
                return L.Polyline(latlng, styleLine)
            },
            style: function(){
                return { color: '#c77dff' }
            },
            
        }).addTo(map);

    })

    $.getJSON("<?= base_url('file_uploads/maps/sta11_new.geojson') ?>", function(data){
        const geojsonMarkerOptions = {
            radius: 4,
            fillColor : "#1dd3b0",
            color : "#0000",
            weight: 3,
            opacity: 1,
            fillOpacity : 0.8,
            onEachFeature: onEachFeature
        }
                  
        geoLayer = L.geoJson(data, {
            pointToLayer: function(feature,latlng){
                return L.circleMarker(latlng, geojsonMarkerOptions)
            },
            onEachFeature: function (feature, layer) {
                // var content = layer.feature.properties.STA_1.toString();
                // layer.bindTooltip(content, {
                // direction: 'center',
                // permanent: false,
                // className: 'styleLabelBidang',
                // offset: [0,22]
                // });

                layer.bindPopup('<center><h6><b>Detail</b></h6></center><hr>'+
                                '<center><img src="<?=base_url()?>assets/assets/images/foto_jalan.jpg" alt="map photo" height="100px"/></center>'+
                                '<p>STA &emsp;&emsp;&emsp;&emsp;: <b>'+feature.properties.STA_1+'</b> </p>'+
                                // '<p>Seksi &emsp;&emsp;&emsp; : '+feature.properties.Seksi+' </p>'+
                                '<p>Status &emsp;&emsp;&emsp;: <b><font color="green">Operasi</font></b></p>'+
                                // '<p><hr><b>Kondisi Jalan</b><br> '+
                                // 'Kekesatan &emsp;&emsp;: &emsp;<font style="font-size: 19px"><i class="mdi mdi-check-circle" ></i></font></h2><br>'+
                                // 'Kerataan&emsp;&emsp;&emsp;: &emsp;<font style="font-size: 19px"><i class="mdi mdi-check-circle" ></i></font></h2><br>'+
                                // 'Lubang &nbsp;&emsp;&emsp;&emsp; : &emsp;<font style="font-size: 19px"><i class="mdi mdi-check-circle" ></i></font></h2><br>'+
                                // 'Rutting &nbsp; &emsp; &emsp;&emsp;: &emsp;<font style="font-size: 19px"><i class="mdi mdi-check-circle" ></i></font></h2><br>'+
                                // 'Retak &emsp;&emsp;&emsp;&emsp; : &emsp;<font style="font-size: 19px"><i class="mdi mdi-close-circle" ></i></font></h2><br>'+
                                '<br><center><a class="btn btn-info btn-sm" style="color:white" target="_blank" href="'+feature.properties.link+'"> Lihat Street View </a></center>'+
                                '</p>'
                ,{minWidth : 220});
            }
            // onEachFeature: onEachFeature
        }).addTo(map);

    })

    $.getJSON("<?= base_url('file_uploads/maps/sta12_new.geojson') ?>", function(data){
        const geojsonMarkerOptions = {
            radius: 4,
            fillColor : "#ff9500",
            color : "#0000",
            weight: 3,
            opacity: 1,
            fillOpacity : 0.8,
            onEachFeature: onEachFeature
        }
                  
        geoLayer = L.geoJson(data, {
            pointToLayer: function(feature,latlng){
                return L.circleMarker(latlng, geojsonMarkerOptions)
            },
            onEachFeature: function (feature, layer) {
                // var content = layer.feature.properties.STA_1.toString();
                // layer.bindTooltip(content, {
                // direction: 'center',
                // permanent: false,
                // className: 'styleLabelBidang',
                // offset: [0,22]
                // });

                layer.bindPopup('<center><h6><b>Detail</b></h6></center><hr>'+
                                '<p>STA &emsp;&emsp;&emsp;&emsp;: '+feature.properties.STA_1+' </p>'+
                                // '<p>Paket &emsp;&emsp;&emsp; : '+feature.properties.Seksi+' </p>'+
                                '<p>Status &emsp;&emsp;&emsp;: <b><font color="orange">Konstruksi</font></b>'+
                                '<br><center><a class="btn btn-info btn-sm" style="color:white" target="_blank" href="'+feature.properties.link+'"> Lihat Street View </a></center>'+
                                '</p>'
                ,{minWidth : 200});
            }
            // onEachFeature: onEachFeature
        }).addTo(map);

    })

    $.getJSON("<?= base_url('file_uploads/maps/sta2.geojson') ?>", function(data){
        const geojsonMarkerOptions = {
            radius: 4,
            fillColor : "#ff3014",
            color : "#0000",
            weight: 3,
            opacity: 1,
            fillOpacity : 0.8,
            onEachFeature: onEachFeature
        }
                  
        geoLayer = L.geoJson(data, {
            pointToLayer: function(feature,latlng){
                return L.circleMarker(latlng, geojsonMarkerOptions)
            },
            onEachFeature: function (feature, layer) {
                var content = layer.feature.properties.STA_1.toString();
                layer.bindTooltip(content, {
                direction: 'center',
                permanent: false,
                className: 'styleLabelBidang',
                offset: [0,22]
                });
            }
            // onEachFeature: onEachFeature
        }).addTo(map);

    })

    $.getJSON("<?= base_url('file_uploads/maps/sta3.geojson') ?>", function(data){
        const geojsonMarkerOptions = {
            radius: 4,
            fillColor : "#c77dff",
            color : "#0000",
            weight: 3,
            opacity: 1,
            fillOpacity : 0.8,
            onEachFeature: onEachFeature
        }
                  
        geoLayer = L.geoJson(data, {
            pointToLayer: function(feature,latlng){
                return L.circleMarker(latlng, geojsonMarkerOptions)
            },
            onEachFeature: function (feature, layer) {
                var content = layer.feature.properties.STA_1.toString();
                layer.bindTooltip(content, {
                direction: 'center',
                permanent: false,
                className: 'styleLabelBidang',
                offset: [0,22]
                });
            }
            // onEachFeature: onEachFeature
        }).addTo(map);

    })

    //  $.getJSON("<?= base_url('file_uploads/maps/simpang_susun1.geojson') ?>", function(data){

    //     const styleLine = {
    //         radius: 5,
    //         fillColor : "#ff006e",
    //         color : "#ff006e",
    //         weight: 7,
    //         opacity: 1,
    //         fillOpacity : 0.8,
    //         onEachFeature: onEachFeature
    //     }
                
    //     geoLayer = L.geoJson(data, {
    //         pointToLayer: function(feature,latlng){
    //             return L.Polyline(latlng, styleLine)
    //         },
    //         style: function(){
    //             return { color: '#ff9500' }
    //         }
    //     }).addTo(map);

    // })

     var legend = L.control({ position: "bottomleft" });

        legend.onAdd = function(map) {
        var div = L.DomUtil.create("div", "legend");
        div.innerHTML += "<h4><b>Legend</b></h4>";
        div.innerHTML += '<i style="background: #1dd3b0"></i><span>Paket 1.1 (Operasi)</span><br>';
        div.innerHTML += '<i style="background: #ff9500"></i><span>Paket 1.2</span><br>';
        div.innerHTML += '<i style="background: #ff3014"></i><span>Paket 2 (Elevated)</span><br>';
        div.innerHTML += '<i style="background: #c77dff"></i><span>Paket 3</span><br>';
        
        // div.innerHTML += '<i style="background: #FFFFFF"></i><span>Ice</span><br>';
        // div.innerHTML += '<i class="icon" style="background-image:`<?=base_url()?>assets/img/red.PNG`;"></i><span>Lubang</span><br>';
        
        

        return div;
        };

        legend.addTo(map);



        function IDRFormatter(angka, prefix) {
            var number_string = angka.toString().replace(/[^,\d]/g, ''),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
        }



    


    
</script>