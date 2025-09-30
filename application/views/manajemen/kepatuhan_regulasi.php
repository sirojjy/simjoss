
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="javascript:void(0);"><b>&emsp; Compliance Obligation </b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-align-justify"></i>
    </button>

</nav>
<div class="container-fluid">            
    <div class="row clearfix">
        <div class="col-lg-12">
            <?php if($this->session->flashdata('message_error')):?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Data Gagal Disimpan!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>


            <?php elseif($this->session->flashdata('message_success')):?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Berhasil Disimpan.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
            <?php else:?>
            <?php endif;?>
            <div class="card">
                <div class="card-body border-bottom">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="card-title"><strong>Daftar Kewajiban Kepatuhan (Compliance Obligation List) <font color="red"> Aspek Regulasi Internal</font></strong></h4>
                        </div>

                    </div>
                    <br>    
                    <?php if($this->session->userdata('level_user')==1) { ?>
                        <p align="right"><a href="<?php echo site_url('Manajemen/add_kepatuhan/regulasi') ?>"><button type="button" class="btn btn-default"><i class="fa fa-plus"></i>&nbsp; Tambah Data</button></a></p>
                    <?php } ?>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-bordered table-striped table-hover js-basic-example dataTable" style="font-size: 9pt">
                            <thead>
                                <tr>
                                    <th scope="col" style="text-align: center; background-color: #1d6296; color: white; width: 13px"><b>No.</b></th>
                                    <th scope="col" style="text-align: center; background-color: #1d6296; color: white; "><b>Kewajiban/Izin <br> (Otorisasi)/Dokumen</b></th>
                                    <th scope="col" style="text-align: center; background-color: #1d6296; color: white"><b>Dasar Hukum</b></th>
                                    <th scope="col" style="text-align: center; background-color: #1d6296; color: white;"><b>Otoritas Terkait</b></th>
                                    <th scope="col" style="text-align: center; background-color: #1d6296; color: white; "><b>Konsekuensi<br> Ketidakpatuhan</b></th>
                                    <th scope="col" style="text-align: center; background-color: #1d6296; color: white; "><b>Tanggal Izin/<br>Pemenuhan Terakhir</b></th>
                                    <th scope="col" style="text-align: center; background-color: #1d6296; color: white; "><b>Unit Kerja <br>Penanggung Jawab</b></th>
                                    <th scope="col" style="text-align: center; background-color: #1d6296; color: white; "><b>Dokumen</b></th>
                                    <th scope="col" style="text-align: center; background-color: #1d6296; color: white; "><b>Aksi</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no=1;
                                    foreach ($row as $rw) { 
                                ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $rw->kewajiban ?></td>
                                        <td><?php echo $rw->dasar_hukum ?></td>
                                        <td><?php echo $rw->otoritas_terkait ?></td>
                                        <td><?php echo $rw->konsekuensi ?></td>
                                        <td><?php echo $rw->tgl_berakhir ?></td>
                                        <td><?php echo $rw->unit_pj ?></td>
                                        <td align="center">
                                            <?php if($rw->file!=null){?>
                                                <a href="<?php echo base_url("file_uploads/kewajiban_kepatuhan/".$rw->file)?>" target="_blank" class="btn btn-primary btn-sm" ><i class="fa fa-print"></i></a>
                                            <?php }else{ ?>
                                                /
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo site_url('Manajemen/edit_kepatuhan/regulasi/' . $rw->id_kewajiban_kepatuhan) ?>"   class="badge badge-success" title="Edit"><i class="fa fa-edit"></i></a>
                                            <a href="<?php echo site_url('Manajemen/hapus_kepatuhan_re/' . $rw->id_kewajiban_kepatuhan) ?>"  title="hapus" class="badge badge-danger btn-sm" onClick="javasciprt: return confirm('Yakin menghapus data ?')" ><i class="fa fa-trash"></i></a>
                                            
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

