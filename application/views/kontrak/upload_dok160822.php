
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-xl-12 mx-auto">
                        <h5 class="mb-10 text-uppercase"><b>Kontrak Konsultan </b></h5>
                        <label ><b>Pekerjaan : <?php echo $nama_kontrak ?></b></label>
                        <hr/>
                            <?php if($this->session->flashdata('msg')=='error'):?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    Data Gagal Diupload!
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                </div>
                            <?php elseif($this->session->flashdata('msg')=='success'):?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    Data Berhasil Diupload.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                </div>
                            <?php else:?>
                            <?php endif;?>
                        <div class="card border-top border-0 border-4 border-primary">
                            <div class="card-body">
                                <form class="form-horizontal" action="<?php echo site_url('Desain/act_persetujuan'); ?>" enctype="multipart/form-data" data-parsley-validate="true" method="post">
                                <div class="border p-4 rounded">
                                    <div class="card-title d-flex align-items-center">
                                        <div><i class="bx bxs-file me-1 font-22 text-primary"></i>
                                        </div>
                                        <h6 class="mb-0 text-primary"> <b>Dokumen Dasar Kontrak</b></h6>
                                    </div>
                                    <hr/>
                                     <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover ">
                                        <thead>
                                            <tr style="text-align: center; background-color: #98D4FF">
                                                <th style="width: 10px;">No.</th>
                                                <th style="width: 350px;">Nama File</th>
                                                <th>No. Dokumen</th>
                           
                                                <th style="width: 150px;">Tanggal Dokumen</th>
                                                <th>File</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php
                                            $no=1;
                                            $dok_kontrak = $this->db->query("select *from dok_master where id_dok_master in(1,2,3,7,8,9) order by id_dok_master ASC")->result();

                                            foreach ($dok_kontrak as $dt) {
                                                    $detail_dok = $this->db->query('select * from detail_dok_konsultan where id_kontrak_konsultan='.$id_kontrak.'and id_dok_master='.$dt->id_dok_master)->row_array();
                                                    $dok = base_url("file_uploads/kontrak_konsultan/".$detail_dok['dok_file']);

                                                    if($detail_dok['nomor_dok']==null){
                                                        $nomor_dok = '-';
                                                        $tanggal = '-';
                                                       
                                                    }else{
                                                        $nomor_dok = $detail_dok['nomor_dok'];
                                                        $tanggal = date('d-m-Y',strtotime($detail_dok['tanggal_dok']));
                                                       
                                                    }
                                
                                            ?> 
                                            <tr>
                                                <td align="center"><?php echo $no++ ?>.</td>
                                                <td><b><?php echo $dt->nama_dok ?></b></td>
                                                <td> <?php echo $nomor_dok ?></td>
                                                <td align="center"><?php echo $tanggal ?></td>
                                                <td align="center">
                                                    <?php if($detail_dok['nomor_dok']==null){ ?>
                                                        <button type="button" class="btn btn-danger btn-sm">Belum diupload</button>
                                                    <?php } else{ ?>
                                                        <a href="<?php echo $dok ?>" target="_blank" class="btn btn-primary btn-sm" ><i class="fa fa-print"></i></a>
                                                    <?php } ?>
                                                </td>
                                                <td align="center">
                                                   <?php if($detail_dok['nomor_dok']==null){ ?>
                                                        <a href="#" data-toggle="modal" data-target="#addRowModal" data-id_kontrak="<?php echo $id_kontrak ?>" data-id_dok_master="<?php echo $dt->id_dok_master ?>" data-nama_dok="<?php echo $dt->nama_dok ?>"> <button class="btn btn-warning btn-sm"><i class="fa fa-upload"></i> Upload</button></a>
                                                    <?php } else{ ?>
                                                        <a href="#" data-toggle="modal" data-target="#updateDok" data-id_kontrak="<?php echo $id_kontrak ?>" data-id_detail_dok="<?php echo $detail_dok['id_detail_dok'] ?>" data-id_dok_master="<?php echo $dt->id_dok_master ?>" data-nama_dok="<?php echo $dt->nama_dok ?>" data-nomor_dok="<?php echo $detail_dok['nomor_dok'] ?>" data-file="<?php echo $detail_dok['dok_file'] ?>" data-tanggal_dok="<?php echo date('d-m-Y',strtotime($detail_dok['tanggal_dok'])) ?>"> <button class="btn btn-primary btn-sm"><i class="fa fa-upload"></i> Update</button></a>
                                                    <?php } ?> 
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                 
                                    </table>
                                </div>
                                    <div class="row mb-3 text-center" style="background-color: #288cff; color: white">
                                        <div class="col-sm-4">
                                            <b>Nama File</b>
                                        </div>
                                        <div class="col-sm-3">
                                            <b>Nomor Dokumen</b>
                                        </div>
                                        <div class="col-sm-2">
                                            <b>Tanggal Dokumen</b>
                                        </div>
                                        <div class="col-sm-2">
                                            <b>File</b>
                                        </div>
                                        <div class="col-sm-1">
                                           <b>Aksi</b>
                                        </div>
                                    </div>
                                    <?php
                                            $no=1;
                                            $dok_kontrak = $this->db->query("select *from dok_master where id_dok_master in(1,2,3,7,8,9) order by id_dok_master ASC")->result();

                                            foreach ($dok_kontrak as $dt) {
                                                    $detail_dok = $this->db->query('select * from detail_dok_konsultan where id_kontrak_konsultan='.$id_kontrak.'and id_dok_master='.$dt->id_dok_master)->row_array();
                                                    $dok = base_url("file_uploads/kontrak_konsultan/".$detail_dok['dok_file']);

                                                    if($detail_dok['nomor_dok']==null){
                                                        $nomor_dok = '-';
                                                        $tanggal = '-';
                                                       
                                                    }else{
                                                        $nomor_dok = $detail_dok['nomor_dok'];
                                                        $tanggal = date('d-m-Y',strtotime($detail_dok['tanggal_dok']));
                                                       
                                                    }
                                
                                    ?>
                                    <div class="row mb-3">
                                        <div class="col-sm-4">
                                            <b><?php echo $no++ ?>. <?php echo $dt->nama_dok ?></b>
                                        </div>
                                        <div class="col-sm-3 text-center">
                                            <?php echo $nomor_dok ?>
                                        </div>
                                        <div class="col-sm-2 text-center">
                                            <?php echo $tanggal ?>
                                            
                                        </div>
                                        <div class="col-sm-2 text-center">
                                            <?php if($detail_dok['nomor_dok']==null){ ?>
                                                <button type="button" class="btn btn-danger btn-sm">Belum diupload</button>
                                            <?php } else{ ?>
                                                <a href="<?php echo $dok ?>" target="_blank" class="btn btn-primary btn-sm" ><i class="fa fa-print"></i></a>
                                            <?php } ?>
                                        </div>
                                        <div class="col-sm-1 text-center">
                                            <?php if($detail_dok['nomor_dok']==null){ ?>
                                                <a href="#" data-toggle="modal" data-target="#addRowModal" data-id_kontrak="<?php echo $id_kontrak ?>" data-id_dok_master="<?php echo $dt->id_dok_master ?>" data-nama_dok="<?php echo $dt->nama_dok ?>"> <button class="btn btn-warning btn-sm"><i class="fa fa-upload"></i> Upload</button></a>
                                            <?php } else{ ?>
                                                <a href="#" data-toggle="modal" data-target="#updateDok" data-id_kontrak="<?php echo $id_kontrak ?>" data-id_detail_dok="<?php echo $detail_dok['id_detail_dok'] ?>" data-id_dok_master="<?php echo $dt->id_dok_master ?>" data-nama_dok="<?php echo $dt->nama_dok ?>" data-nomor_dok="<?php echo $detail_dok['nomor_dok'] ?>" data-file="<?php echo $detail_dok['dok_file'] ?>" data-tanggal_dok="<?php echo date('d-m-Y',strtotime($detail_dok['tanggal_dok'])) ?>"> <button class="btn btn-primary btn-sm"><i class="fa fa-upload"></i> Update</button></a>
                                            <?php } ?>

                                        </div>
                                    </div>
                                    <?php } ?>

                                    <br>
                                    <div class="card-title d-flex align-items-center">
                                        <div><i class="bx bxs-file me-1 font-22 text-primary"></i>
                                        </div>
                                        <h6 class="mb-0 text-primary"> <b>Dokumen Dasar Pekerjaan</b></h6>
                                    </div>
                                    <hr/>
                                    <div class="row mb-3 text-center" style="background-color: #288cff; color: white">
                                        <div class="col-sm-4">
                                            <b>Nama File</b>
                                        </div>
                                        <div class="col-sm-3">
                                            <b>Nomor Dokumen</b>
                                        </div>
                                        <div class="col-sm-2">
                                            <b>Tanggal Dokumen</b>
                                        </div>
                                        <div class="col-sm-2">
                                            <b>File</b>
                                        </div>
                                        <div class="col-sm-1">
                                           <b>Aksi</b>
                                        </div>
                                    </div>
                                    <?php
                                            $no=1;
                                            $dok_kontrak = $this->db->query("select *from dok_master where id_dok_master in(10,11,12,13,14,15,100) order by id_dok_master ASC")->result();

                                            foreach ($dok_kontrak as $dt) {
                                                    $detail_dok = $this->db->query('select * from detail_dok_konsultan where id_kontrak_konsultan='.$id_kontrak.'and id_dok_master='.$dt->id_dok_master)->row_array();
                                                    $dok = base_url("file_uploads/kontrak_konsultan/".$detail_dok['dok_file']);

                                                    if($detail_dok['nomor_dok']==null){
                                                        $nomor_dok = '-';
                                                        $tanggal = '-';
                                                       
                                                    }else{
                                                        $nomor_dok = $detail_dok['nomor_dok'];
                                                        $tanggal = date('d-m-Y',strtotime($detail_dok['tanggal_dok']));
                                                       
                                                    }
                                
                                    ?>
                                    <div class="row mb-3">
                                        <div class="col-sm-4">
                                            <b><?php echo $no++ ?>. <?php echo $dt->nama_dok ?></b>
                                        </div>
                                        <div class="col-sm-3 text-center">
                                            <?php echo $nomor_dok ?>
                                        </div>
                                        <div class="col-sm-2 text-center">
                                            <?php echo $tanggal ?>
                                            
                                        </div>
                                        <div class="col-sm-2 text-center">
                                            <?php if($detail_dok['nomor_dok']==null){ ?>
                                                <button class="btn btn-danger btn-sm">Belum diupload</button>
                                            <?php } else{ ?>
                                                <a href="<?php echo $dok ?>" target="_blank" class="btn btn-primary btn-sm" ><i class="fa fa-print"></i></a>
                                            <?php } ?>
                                        </div>
                                        <div class="col-sm-1 text-center">
                                            <?php if($detail_dok['nomor_dok']==null){ ?>
                                                <a href="#" data-toggle="modal" data-target="#addRowModal" data-id_kontrak="<?php echo $id_kontrak ?>" data-id_dok_master="<?php echo $dt->id_dok_master ?>" data-nama_dok="<?php echo $dt->nama_dok ?>"> <button class="btn btn-warning btn-sm"><i class="fa fa-upload"></i> Upload</button></a>
                                            <?php } else{ ?>
                                                <a href="#" data-toggle="modal" data-target="#updateDok" data-id_kontrak="<?php echo $id_kontrak ?>" data-id_detail_dok="<?php echo $detail_dok['id_detail_dok'] ?>" data-id_dok_master="<?php echo $dt->id_dok_master ?>" data-nama_dok="<?php echo $dt->nama_dok ?>" data-nomor_dok="<?php echo $detail_dok['nomor_dok'] ?>" data-file="<?php echo $detail_dok['dok_file'] ?>" data-tanggal_dok="<?php echo date('d-m-Y',strtotime($detail_dok['tanggal_dok'])) ?>"> <button class="btn btn-primary btn-sm"><i class="fa fa-upload"></i> Update</button></a>
                                            <?php } ?>

                                        </div>
                                    </div>
                                    <?php } ?>
                                    
                                    
                                    
                                    <br><br>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 700px">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h6 class="modal-title">
                    <span class="fw-bold"><b>&emsp; Upload Dokumen </b></span>(<label id="xnama_dok"></label>)
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" action="<?php echo site_url('Kontrak_konsultan/act_Upload_dokKonsultan') ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="modal-body" style="padding: 2.2rem">
                
                    <div class="row">
                        
                        <input type="hidden" name="id_dok_master" class="form-control">
                        <input type="hidden" name="id_kontrak" class="form-control">
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Nomor Dokumen</label>
                                <input type="text" name="nomor_dok" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Tanggal Dokumen</label>
                                <input type="date" name="tanggal_dok" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>File Dokumen (.pdf)</label> &emsp;&emsp;
                                <div class="browse-wrap">
                                    <input type="file" name="file" class="btn btn-secondary btn-block" title="Choose a file to upload">
                                </div>
                            </div>
                        </div>   
                    </div>

                </div>
                <div class="modal-footer no-bd">
                    <button type="submit" id="addRowButton" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="updateDok" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 700px">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h6 class="modal-title">
                    <span class="fw-bold"><b>&emsp; Update Dokumen </b></span>(<label id="xnama_dok_update"></label>)
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" action="<?php echo site_url('Kontrak_konsultan/act_Update_dokKonsultan') ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="modal-body" style="padding: 2.2rem">
                
                    <div class="row">
                        
                        <input type="hidden" name="id_dok_master_update" class="form-control">
                        <input type="hidden" name="id_kontrak_update" class="form-control">
                        <input type="hidden" name="id_detail_dok" class="form-control">
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Nomor Dokumen</label>
                                <input type="text" name="nomor_dok_update" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Tanggal Dokumen</label>
                                <input type="text" name="tanggal_dok_update" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Current File</label> &emsp;&emsp;
                                <div class="browse-wrap" id="detail_file">
                                    
                                </div>
                            </div>
                        </div> 
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>File Dokumen (.pdf)</label> &emsp;&emsp;
                                <div class="browse-wrap">
                                    <input type="file" name="file" class="btn btn-secondary btn-block" title="Choose a file to upload">
                                </div>
                            </div>
                        </div>   
                    </div>

                </div>
                <div class="modal-footer no-bd">
                    <button type="submit" id="addRowButton" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        
        $('#addRowModal').on('show.bs.modal', function(e) { 
                var nama_dok = $(e.relatedTarget).data('nama_dok');
                var id_dok_master = $(e.relatedTarget).data('id_dok_master');
                var id_kontrak = $(e.relatedTarget).data('id_kontrak');

                $(e.currentTarget).find('input[name="id_kontrak"]').val(id_kontrak);
                $(e.currentTarget).find('input[name="id_dok_master"]').val(id_dok_master);
                $(".modal-header #xnama_dok").text(nama_dok);

               
        });

        $('#updateDok').on('show.bs.modal', function(e) { 
                var nama_dok = $(e.relatedTarget).data('nama_dok');
                var id_dok_master = $(e.relatedTarget).data('id_dok_master');
                var id_kontrak = $(e.relatedTarget).data('id_kontrak');
                var id_detail_dok = $(e.relatedTarget).data('id_detail_dok');

                var no_dok = $(e.relatedTarget).data('nomor_dok');
                var tgl_dok = $(e.relatedTarget).data('tanggal_dok');

                var file = $(e.relatedTarget).data('file');
                var link = "<?= base_url()?>";
                var evidence ='<a href="'+link+"file_uploads/kontrak_konsultan/"+file+'" target="_blank" class="btn btn-success btn-sm btn-block"><i class="ti ti-printer"></i> Preview Dokumen</a>';

                $(e.currentTarget).find('input[name="id_kontrak_update"]').val(id_kontrak);
                $(e.currentTarget).find('input[name="id_dok_master_update"]').val(id_dok_master);
                $(e.currentTarget).find('input[name="id_detail_dok"]').val(id_detail_dok);
                $(e.currentTarget).find('input[name="nomor_dok_update"]').val(no_dok);
                $(e.currentTarget).find('input[name="tanggal_dok_update"]').val(tgl_dok);

                $("#detail_file").html(evidence); 
                $(".modal-header #xnama_dok_update").text(nama_dok);          
        });
    });
</script>
  