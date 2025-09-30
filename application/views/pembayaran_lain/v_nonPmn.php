
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="javascript:void(0);"><b>&emsp; Dokumen Pembayaran Non PMN</b></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-align-justify"></i>
                </button>
                
            </nav>
            <div class="container-fluid">            
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <?php if($this->session->flashdata('msg')=='error'):?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    Data Gagal Disimpan!
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                </div>


                                <?php elseif($this->session->flashdata('msg')=='success'):?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        Data Berhasil Disimpan.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                <?php else:?>
                        <?php endif;?>
                        <div class="card">
                            <div class="header">
                                <h4><strong>Data Pembayaran Non PMN</strong> </h4>
                                <?php if($this->session->userdata('level_user')==1) { ?>
                                    <p align="right"><a href="<?php echo site_url('Pembayaran/add_nonPMN') ?>"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Tambah Data</button></a></p>
                                <?php } ?>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            <tr style="text-align: center; background-color: #98D4FF">
                                                <th style="width: 10px;">No.</th>
                                                <th style="width: 70px">Tanggal</th>
                                                <th style="width: 70px">Jenis</th>
                                                <th style="width: 90px">No. BB</th>
                                                <th>Keterangan</th>
                                                <th>Nilai</th>
                                                
                                                <th>File</th>
                                                <th>PIC</th>
                                                <!-- <th>Lokasi Hardcopy</th> -->
                                                <?php if($this->session->userdata('level_user')==1) { ?>
                                                    <th style="width: 80px">Aksi</th>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no=1;
                                                foreach ($row as $dt) {
                                                    if($dt->jenis==1){
                                                        $jenis = 'Pembayaran';
                                                    }else if($dt->jenis==2){
                                                        $jenis = 'Pendapatan';
                                                    }

                                                    //  if($dt->bulan==1){
                                                    //     $bulan = 'Januari';
                                                    // }else if($dt->bulan==2){
                                                    //     $bulan = 'Februari';
                                                    // }else if($dt->bulan==3){
                                                    //     $bulan = 'Maret';
                                                    // }else if($dt->bulan==4){
                                                    //     $bulan = 'April';
                                                    // }else if($dt->bulan==5){
                                                    //     $bulan = 'Mei';
                                                    // }else if($dt->bulan==6){
                                                    //     $bulan = 'Juni';
                                                    // }else if($dt->bulan==7){
                                                    //     $bulan = 'Juli';
                                                    // }else if($dt->bulan==8){
                                                    //     $bulan = 'Agustus';
                                                    // }else if($dt->bulan==9){
                                                    //     $bulan = 'September';
                                                    // }else if($dt->bulan==10){
                                                    //     $bulan = 'Oktober';
                                                    // }else if($dt->bulan==11){
                                                    //     $bulan = 'November';
                                                    // }else if($dt->bulan==12){
                                                    //     $bulan = 'Desember';
                                                    // }
                                            ?>
                                            <tr>
                                                <td align="center"><?php echo $no++ ?>.</td>
                                                <td align="center"><?php echo date('d-m-Y', strtotime($dt->tanggal)) ?></td>
                                                <td align="center"><?php echo $jenis ?></td>
                                                <td align="center"><?php echo $dt->no_bukti ?></td>
                                                <td ><?php echo $dt->keterangan ?></td>
                                                <td align="center"><?php echo number_format($dt->nilai,2,',','.') ?></td>
                                                
                                                <td align="center"><a href="<?php echo base_url("file_uploads/non_pmn/".$dt->dok_file)?>" target="_blank" class="btn btn-primary btn-sm" ><i class="fa fa-print"></i></a></span></td>
                                                <td align="center"><?php echo $dt->pic ?></td>
                                                <!-- <td align="center"><?php echo $dt->kantor ?></td> -->
                                                <?php if($this->session->userdata('level_user')==1) { ?>
                                                <td align="center">
                                                    <a href="<?php echo site_url('Pembayaran/edit_nonPmn/' . $dt->id_nonpmn) ?>"  title="Edit" class="btn btn-success btn-sm" ><i class="fa fa-edit"></i></a>
                                                    <a href="<?php echo site_url('Pembayaran/hapus_nonPmn/' . $dt->id_nonpmn) ?>"  title="hapus" class="btn btn-danger btn-sm" onClick="javasciprt: return confirm('Yakin menghapus data ?')" >Hapus</a>
                                                </td>
                                                <?php } ?>
                                            </tr>
                                           <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
