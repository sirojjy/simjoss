<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h3 class="page-title" style="color: #272996">&nbsp;<b> Standar Teknis Peraturan Terkait </b></h3>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?php if($this->session->flashdata('msg')=='error'):?>
                        <div class="alert alert-danger fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <p align="center"><strong> Data Gagal Disimpan </strong></p>
                        </div>
                    <?php elseif($this->session->flashdata('msg')=='success'):?>
                            <div class="alert alert-success fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <p align="center"><strong> Data Berhasil Disimpan </strong></p>
                            </div>
            <?php else:?>
            <?php endif;?>
            <div class="card">
                <div class="card-body">
                    
                    <p align="right"><?php echo anchor(site_url('Welcome/add_peraturan'), '<button class="btn btn-info btn-sm"> Tambah Data</button>', 'class=""');?></p><br>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr style="background-color: #3b5b96; color: white; vertical-align: middle;">
                                    <th style="text-align: center; width: 10px;"><b>No.</b></th>
                                    <th style="text-align: center; width: 150px;"><b>No. Peraturan</b></th>
                                    <th style="text-align: center;"><b>Perihal</b></th>
                                    <!-- <th style="text-align: center;"><b>Nama Dokumen</b></th> -->
                                    <th style="text-align: center;width: 110px"><b>Tanggal</b></th>
                                    <!-- <th style="text-align: center; width: 80px"><b>Re-assesment Date</b></th> -->
                                    
                                    
                                    <th style="text-align: center; width: 100px"><b>File</b></th>
                                    <th style="width: 130px; text-align: center;"><b>Aksi</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>BPJT/SMM/Pt.2/01</td>
                                    <td>Tata Cara Pelaksanaan Evaluasi Perubahan Lingkup Konstruksi Jalan Tol yang Diusulkan oleh BUJT</td>
                                    <td align="center">15-09-2016</td>
                                    <td align="center"><a href="<?php echo base_url("file_upload/peraturan/sop-perubahan-lingkup-16")?>" target="_blank" class="btn btn-success btn-sm " ><i class="fa fa-print"></i></a></td>
                                    <td> </td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>BM.07.02-P/1271</td>
                                    <td>Penerapan Building Information Modelling (BIM) pada Penyelenggaraan Pengusahaan Jalan Tol</td>
                                    <td align="center">10-12-2020</td>
                                    <td align="center"><a href="<?php echo base_url("file_upload/peraturan/bim-1271")?>" target="_blank" class="btn btn-success btn-sm " ><i class="fa fa-print"></i></a></td>
                                    <td> </td>
                                </tr>
                               <!--  <?php 
                                            $no=1;
                                            foreach ($peraturan as $u) {
                                            if($u->kluster=='9000'){
                                                $kluster='ISO 9000';
                                            }else if($u->kluster=='14000'){
                                                $kluster='ISO 14000';
                                            }else if($u->kluster=='37000'){
                                                $kluster='ISO 37000';
                                            }else if($u->kluster=='45000'){
                                                $kluster='ISO 45000';
                                            }else{
                                                $kluster='Lainnya';
                                            }
                                                
                                        ?>
                                        <tr>
                                            <td align="center"><?php echo $no++ ?>.</td>
                                            <td><?php echo $kluster ?></td>
                                            <td><?php echo $u->sub_kluster ?></td>
                                            <td><?php echo $u->nama_dok ?></td>
                                            <td align="center"><?php echo $u->tahun ?></td>
                                            
                                            <td align="center"> <a href="<?php echo base_url("file_uploads/peraturan/".$u->file)?>" target="_blank" class="btn btn-info btn-sm " ><i class="fa fa-print"></i></a></td>
                                            <td style="text-align:center">
                                                    <a href="<?php echo site_url('Master/update_peraturan/' . $u->id_peraturan) ?>" title="Edit" class="btn btn-outline-success btn-sm"  ><i class="fa fa-edit"></i></a> &nbsp;
                                                    <a href="<?php echo site_url('Master/hapus_peraturan/' . $u->id_peraturan) ?>"  title="hapus" class="btn btn-outline-danger btn-sm" onClick="javasciprt: return confirm('Yakin menghapus data ?')" ><i class="fa fa-trash"></i></a>
                 
                                            </td>
                                        
                                        </tr>




                                        <?php } ?> -->
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>


    </div>
</div>