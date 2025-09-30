
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="javascript:void(0);"><b>&emsp; Kewajiban Angsuran</b></a>
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
                                <h4><strong>Data Kewajiban Angsuran Paspro</strong> </h4>
                                <?php if($this->session->userdata('level_user')==1) { ?>
                                    <p align="right"><a href="<?php echo site_url('Pembayaran/add_angsuran') ?>"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Tambah Data</button></a></p>
                                <?php } ?>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            <tr style="text-align: center; background-color: #98D4FF">
                                                <th style="width: 20px;">No.</th>
                                                <th style="width: 90px">Tanggal</th>
                                                <th>Nilai</th>
                                                <th>Keterangan</th>
                                                <th>File</th>
                                                <th>PIC</th>
                                                <th>Lokasi Hardcopy</th>
                                                <?php if($this->session->userdata('level_user')==1) { ?>
                                                    <th style="width: 90px">Aksi</th>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no=1;
                                                foreach ($row as $dt) {
                                            ?>
                                            <tr>
                                                <td align="center"><?php echo $no++ ?>.</td>
                                                <td align="center"><?php echo date('d-m-Y',strtotime($dt->tanggal)); ?></td>
                                                <td align="center"><?php echo number_format($dt->nilai,2,',','.') ?></td>
                                                <td><?php echo $dt->keterangan ?></td>
                                                <td align="center"><a href="<?php echo base_url("file_uploads/pembayaran_angsuran/".$dt->dok_file)?>" target="_blank" class="btn btn-primary btn-sm" ><i class="fa fa-print"></i></a></span></td>
                                                <td align="center"><?php echo $dt->pic ?></td>
                                                <td align="center"><?php echo $dt->kantor ?></td>
                                                <?php if($this->session->userdata('level_user')==1) { ?>
                                                <td align="center">
                                                    <a href="<?php echo site_url('Pembayaran/edit_angsuran/' . $dt->id_pembayaran_lain) ?>"  title="Edit" class="btn btn-success btn-sm" ><i class="fa fa-edit"></i></a>
                                                    <a href="<?php echo site_url('Pembayaran/hapus_angsuran/' . $dt->id_pembayaran_lain) ?>"  title="hapus" class="btn btn-danger btn-sm" onClick="javasciprt: return confirm('Yakin menghapus data ?')" >Hapus</a>
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
