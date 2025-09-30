
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-xl-12 mx-auto">
                        <h5 class="mb-10 "><b>Dokumen Pembayaran</b></h5>
                        <hr/>
                        <div class="card border-top border-0 border-4 border-primary">
                            <div class="card-body">
                                <form class="form-horizontal" action="<?php echo $action ?>" enctype="multipart/form-data" data-parsley-validate="true" method="post">
                                <div class="border p-4 rounded">
                                    <div class="card-title d-flex align-items-center">
                                        <div><i class="bx bxs-file me-1 font-22 text-primary"></i>
                                        </div>
                                        <h5 class="mb-0 text-primary "> <b>Update Data Pembayaran</b></h5>
                                    </div>
                                    <hr/>

                                    <input type="hidden" required="" value="<?php echo $id_pembayaran ?>" name="id_pembayaran" class="form-control">
                                    <input type="hidden" required="" value="<?php echo $id_kontrak ?>" name="id_kontrak" class="form-control">
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Termin ke-</label>
                                        <div class="col-sm-9">
                                            <input type="text" required="" value="<?php echo $termin ?>" name="termin" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Tanggal </label>
                                        <div class="col-sm-9">
                                            <input type="date" required="" value="<?php echo $tanggal ?>" name="tanggal" class="form-control">
                                        </div>
                                    </div>
                                   
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Keterangan</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="keterangan" rows="3"><?php echo $keterangan ?></textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Nilai (Rp.)</label>
                                        <div class="col-sm-9">
                                            <input type="text" required="" value="<?php echo number_format($nilai,0,',','.') ?>" name="nilai" id="rupiah" class="form-control">
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">
                                            <button type="submit" class="btn btn-primary px-4">Simpan</button> &nbsp;
                                            <a href="<?php echo site_url('Kontrak_konsultan') ?>"><button type="button" class="btn btn-danger px-4">Batal</button></a>
                                        </div>
                                    </div>
                                 </form>
                                    <br>
                                    <div class="card-title d-flex align-items-center">
                                        <div><i class="bx bxs-file me-1 font-22 text-primary"></i>
                                        </div>
                                        <h5 class="mb-0 text-primary "> <b>Checklist Dokumen </b></h5>
                                    </div>
                                    <hr/>
                                    <div class="row mb-3">
                                        <div class="col-sm-4 text-center">
                                            <b>Nama Dokumen</b>
                                            
                                        </div>
                                        <div class="col-sm-3 text-center">
                                            <b>Nomor Dokumen</b>
                                        </div>
                                        <!-- <div class="col-sm-2 text-center">
                                            <b>Tanggal Dokumen</b>
                                        </div> -->
                                        <div class="col-sm-2 text-center">      
                                            <b>File</b>
                                        </div>
                                        <div class="col-sm-3 text-center">      
                                            <b>Update File</b>
                                        </div>
                                    </div>
                                    <hr/>
                                    <?php
                                            $no=1;
                                            

                                            foreach ($jenis as $bg) {

                                              if($bg[0]->dok_file==null){
                                                    $nomor_dok = '-';
                                                    $tanggal = '-';
                                                       
                                                }else{
                                                    $nomor_dok = $bg[0]->nomor_dok;
                                                    $tanggal = date('d-m-Y',strtotime($bg[0]->tanggal_dok));
                                                       
                                                }  
                                
                                    ?>
                                    <div class="row mb-3">
                                        <div class="col-sm-4">
                                            <b><?php echo $no++ ?>. <?php echo $bg[0]->nama_dok; ?></b>
                                            <input type="hidden" name="id_dok_master[]" value="<?php echo $bg[0]->id_dok_master; ?>">
                                            <input type="hidden" name="id_detail_dok[]" value="<?php echo $bg[0]->id_detail_dok; ?>">
                                        </div>
                                        <div class="col-sm-3 text-center">
                                            <?php echo $nomor_dok ?>
                                        </div>
                                        <!-- <div class="col-sm-2 text-center">
                                            <?php echo $tanggal ?>
                                        </div> -->
                                        <div class="col-sm-2 text-center">      
                                            <?php if ($bg[0]->dok_file==null) { ?> 
                                                <button type="button" class="btn btn-danger btn-sm">Belum diupload</button>
                                            <?php } else { ?>
                                                <a href="<?php echo base_url("file_uploads/kontrak_konsultan/dokumen_pembayaran/".$bg[0]->dok_file)?>" target="_BLANK" class="btn btn-sm  btn-primary"><i class="fa fa-print"></i></a>
                                            <?php } ?>
                                        </div>
                                        <div class="col-sm-3 text-center">      
                                            <!-- <div class="browse-wrap">
                                                <input type="file" name="file_evidence[]" class="btn btn-secondary btn-block" title="Choose a file to upload">
                                            </div> -->
                                            <?php if ($bg[0]->dok_file==null) { ?> 
                                                <a href="#" data-toggle="modal" data-target="#addRowModal" data-id_kontrak="<?php echo $id_kontrak ?>" data-id_pembayaran="<?php echo $id_pembayaran;  ?>" data-id_dok_master="<?php echo $bg[0]->id_dok_master;  ?>" data-nama_dok="<?php echo $bg[0]->nama_dok ?>"> <button class="btn btn-warning btn-sm"><i class="fa fa-upload"></i> Upload</button></a>
                                            <?php } else { ?>
                                                <a href="#" data-toggle="modal" data-target="#updateDok" data-id_kontrak="<?php echo $id_kontrak ?>" data-id_detail_dok="<?php echo $bg[0]->id_detail_dok ?>" data-id_pembayaran="<?php echo $id_pembayaran;  ?>" data-id_dok_master="<?php echo $bg[0]->id_dok_master ?>" data-nama_dok="<?php echo $bg[0]->nama_dok ?>" data-nomor_dok="<?php echo $bg[0]->nomor_dok ?>" data-file="<?php echo $bg[0]->dok_file ?>" data-tanggal_dok="<?php echo $bg[0]->tanggal_dok ?>"> <button class="btn btn-primary btn-sm"><i class="fa fa-upload"></i> Update</button></a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    
                                    
                                    <br><br>
                                </div>
                           
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
            <form class="form-horizontal" action="<?php echo site_url('Kontrak_konsultan/act_UploadPembayaran_edit') ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="modal-body" style="padding: 2.2rem">
                
                    <div class="row">
                        
                        <input type="hidden" name="id_dok_master" class="form-control">
                        <input type="hidden" name="id_kontrak" class="form-control">
                        <input type="hidden" name="id_pembayaran" class="form-control">
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
            <form class="form-horizontal" action="<?php echo site_url('Kontrak_konsultan/act_dokPembayaran_edit') ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="modal-body" style="padding: 2.2rem">
                
                    <div class="row">
                        
                        <input type="hidden" name="id_dok_master_update" class="form-control">
                        <input type="hidden" name="id_kontrak_update" class="form-control">
                        <input type="hidden" name="id_detail_dok" class="form-control">
                        <input type="hidden" name="id_pembayaran_update" class="form-control">
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
            var id_pembayaran = $(e.relatedTarget).data('id_pembayaran');

            $(e.currentTarget).find('input[name="id_pembayaran"]').val(id_pembayaran);
            $(e.currentTarget).find('input[name="id_kontrak"]').val(id_kontrak);
            $(e.currentTarget).find('input[name="id_dok_master"]').val(id_dok_master);
            $(".modal-header #xnama_dok").text(nama_dok);

               
        });

        $('#updateDok').on('show.bs.modal', function(e) { 
                var nama_dok = $(e.relatedTarget).data('nama_dok');
                var id_dok_master = $(e.relatedTarget).data('id_dok_master');
                var id_kontrak = $(e.relatedTarget).data('id_kontrak');
                var id_detail_dok = $(e.relatedTarget).data('id_detail_dok');
                var id_pembayaran = $(e.relatedTarget).data('id_pembayaran');

                var no_dok = $(e.relatedTarget).data('nomor_dok');
                var tgl_dok = $(e.relatedTarget).data('tanggal_dok');

                var file = $(e.relatedTarget).data('file');
                var link = "<?= base_url()?>";
                var evidence ='<a href="'+link+"file_uploads/kontrak_konsultan/dokumen_pembayaran/"+file+'" target="_blank" class="btn btn-success btn-sm btn-block"><i class="ti ti-printer"></i> Preview Dokumen</a>';

                $(e.currentTarget).find('input[name="id_kontrak_update"]').val(id_kontrak);
                $(e.currentTarget).find('input[name="id_dok_master_update"]').val(id_dok_master);
                $(e.currentTarget).find('input[name="id_detail_dok"]').val(id_detail_dok);
                $(e.currentTarget).find('input[name="nomor_dok_update"]').val(no_dok);
                $(e.currentTarget).find('input[name="tanggal_dok_update"]').val(tgl_dok);
                $(e.currentTarget).find('input[name="id_pembayaran_update"]').val(id_pembayaran);

                $("#detail_file").html(evidence); 
                $(".modal-header #xnama_dok_update").text(nama_dok);          
        });


    });
</script>



  