
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="javascript:void(0);"><b>&emsp; Legal</b></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-align-justify"></i>
                </button>
                
               <!--  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">                        
                        
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                    	<select class="form-control show-tick ms select2" data-placeholder="Select">
                            <option>-- Seksi --</option>
                            <option>Seksi 1</option>
                            <option>Seksi 2</option>
                            <option>Seksi 3</option>
                            <option>Seksi 4</option>
                        </select>
                    	<select class="form-control show-tick ms select2" data-placeholder="Select">
                            <option>-- Jenis --</option>
                            <option>Konstruksi</option>
                            <option>Operasi</option>
                            <option>Lainnya</option>
                        </select>
                        <select class="form-control show-tick ms select2" data-placeholder="Select">
                            <option>-- Bulan --</option>
                            <option>Januari</option>
                            <option>Februari</option>
                            <option>Maret</option>
                        </select>
                        <a href="#" class="btn btn-success ml-2">Filter</a>
                    </form>
                </div> -->
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
                            <div class="card-body border-bottom">
                                <h4 class="card-title"><strong>Data Dokumen Legal</strong> </h4>
                                <?php if($this->session->userdata('level_user')==1) { ?>
                                    <p align="right"><a href="<?php echo site_url('Dokumen/add_legal') ?>"><button type="button" class="btn btn-default"><i class="fa fa-plus"></i>&nbsp; Tambah Data</button></a></p>
                                <?php } ?>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            <tr style="text-align: center; background-color: #98D4FF">
                                                <th style="width: 20px;">No.</th>
                                                <th>Nama Dokumen</th>
                                                <th>No. Dokumen</th>
                                                <th style="width: 100px;">Tanggal</th>
                                                <th>File</th>
                                                <th style="width: 100px;">Lokasi Hardcopy</th>
                                                <?php if($this->session->userdata('level_user')==1) { ?>
                                                    <th style="width: 100px;">Aksi</th>
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
                                                <td><?php echo $dt->nama ?></td>
                                                <td align="center"><?php echo $dt->nomor ?></td>
                                                <td align="center"><?php echo date('d-m-Y',strtotime($dt->tanggal)); ?></td>
                                                <td align="center"><a href="<?php echo base_url("file_uploads/dokumen/legal/".$dt->dok_file)?>" target="_blank" class="btn btn-primary btn-sm" ><i class="fa fa-print"></i></a></span></td>
                                                <td align="center"><?php echo $dt->kantor ?></td>
                                                <?php if($this->session->userdata('level_user')==1) { ?>
                                                <td align="center">
                                                    <a href="<?php echo site_url('Dokumen/edit_legal/' . $dt->id_dokumen) ?>"  title="hapus" class="btn btn-success btn-sm" ><i class="fa fa-edit"></i></a>
                                                    <a href="<?php echo site_url('Dokumen/hapus_legal/' . $dt->id_dokumen) ?>"  title="hapus" class="btn btn-danger btn-sm" onClick="javasciprt: return confirm('Yakin menghapus data ?')" >Hapus</a>
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
