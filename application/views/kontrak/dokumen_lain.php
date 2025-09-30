
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="javascript:void(0);"><b>&emsp; <?php echo $nama_kontrak ?></b></a>
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
                            <div class="card-body border-bottom">
                                <h5 class="card-title"><strong>Dokumen Lainnya</strong> </h5>
                                <p align="right"><a href="<?php echo site_url('Kontrak/add_dokLain/'.$id_kontrak) ?>"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Tambah Data</button></a></p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="table2" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            <tr style="text-align: center; background-color: #98D4FF">
                                                <th style="width: 10px">No.</th>
                                                <th style="width: 130px;">Jenis Dokumen</th>
                                                <th>Nama Dokumen</th>
                                                <th style="width: 65px;">Tanggal</th>
                                                <th style="width: 70px;">Lokasi Hardcopy</th>
                                                <th style="width: 70px;">File</th>
                                                <th style="width: 70px">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no=1;
                                                foreach ($row as $dt) {

        
                                            
                                            ?>
                                             <tr align="center">
                                                <td><?php echo $no++ ?>.</td>
                                                <td><?php echo $dt->jenis_dok ?></td>
                                                <td style="text-align: left"><?php echo $dt->keterangan ?></td>
                                                
                                                <td align="left"><?php echo date('d-m-Y',strtotime($dt->tanggal_dok)); ?></td>
                                                <td>
                                                    <?php echo $dt->kantor ?>/<?php echo $dt->no_rak ?>/<?php echo $dt->no_box ?>
                                                </td>
                                                <td>
                                                   <a href="<?php echo base_url("file_uploads/dokumenLain_konstruksi/".$dt->dok_file)?>" target="_blank" class="btn btn-primary btn-sm" ><i class="fa fa-print"></i></a>
                                                </td>
                                                <td>
                                                    
                                                    <!-- <a href="<?php echo site_url('Kontrak/update_dokLain/' . $dt->id_dok.'/'.$dt->id_kontrak) ?>"  title="edit" class="btn btn-success btn-sm" >Edit</a> -->
                                                    <a href="<?php echo site_url('Kontrak/hapus_dokLain/' . $dt->id_dok.'/'.$dt->id_kontrak) ?>"  title="hapus" class="btn btn-danger btn-sm" onClick="javasciprt: return confirm('Yakin menghapus data ?')" ><i class="fa fa-trash"></i></a>
                                                </td>
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

<div class="modal fade" id="addDokMc" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 700px">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h6 class="modal-title">
                    <span class="fw-bold"><b>&emsp; Tambah Dokumen Pendukung Sertifikat Bulanan </b></span>
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" action="<?php echo site_url('Kontrak/act_addDokMc') ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="modal-body" style="padding: 2.2rem">
                
                    <div class="row">
                        <input type="hidden" name="id_kontrak" class="form-control">
                        <input type="hidden" name="id_mc" class="form-control">
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Jenis Dokumen</label>
                                <select class="form-control show-tick ms select2" required="" name="id_dok_master" data-placeholder="Select">
                                    <option value="">-- Pilih --</option>
                                    <?php 
                                        $sql = $this->db->query('select * from dok_master where jenis_dok=4 order by id_dok_master ASC')->result();
                                        foreach ($sql as $dt) {
                                    ?>
                                    
                                    <option value="<?php echo $dt->id_dok_master ?>"><?php echo $dt->nama_dok ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Nama Dokumen</label>
                                <input type="text" name="keterangan" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Jumlah Halaman</label>
                                <input type="number" name="halaman" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Kantor</label>
                                <select class="form-control show-tick ms select2" required=""  name="kantor" data-placeholder="Select">
                                    <option value="">-- Pilih --</option>
                                    <option value="Jakarta">Jakarta</option>
                                    <option value="Tongas">Tongas</option>
                                    <option value="Leces">Leces</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>PIC</label>
                                <input type="text" name="pic" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>No. Rak</label>
                                <input type="text" name="no_rak" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>No. Baris</label>
                                <input type="text" name="no_box" class="form-control">
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>File Dokumen (.pdf)</label> &emsp;&emsp;
                                <div class="browse-wrap">
                                    <input type="file" name="file" required="" class="btn btn-secondary btn-block" title="Choose a file to upload">
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
<div class="modal fade" id="detailDok" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 700px">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h6 class="modal-title">
                    <span class="fw-bold"><b>&emsp; Dokumen Administrasi Proyek </b></span>
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body" style="padding: 2.9rem">
                
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr style="text-align: center; background-color: #98D4FF">
                                        <th style="width: 10px">No.</th>
                                        <!-- <th >Nama dok</th> -->
                                        <th>Nama Dokumen</th>
                                        <!-- <th>Nilai</th> -->
                                        <th>File</th>
                                        <th>Jml Halaman</th>
                                        <th>Lokasi</th>
                                    </tr>
                                </thead>
                                <tbody id="detail_dok">
                                    
                                </tbody>
                            </table>
                        </div>
                        
                    </div>

                </div>
                <div class="modal-footer no-bd">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
        </div>
    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        
        $('#addDokMc').on('show.bs.modal', function(e) { 
                var id_kontrak = $(e.relatedTarget).data('id_kontrak');
                var id_mc = $(e.relatedTarget).data('id_mc');
                $(e.currentTarget).find('input[name="id_kontrak"]').val(id_kontrak);
                $(e.currentTarget).find('input[name="id_mc"]').val(id_mc);
        });

    });
    function view_addendum($idmc){
          var link = "<?= base_url()?>";
          var idmc = $idmc;
            $.ajax({
                type : "GET",
                url  : "<?php echo site_url('Kontrak/get_detaildokMc')?>",
                data : "idmc="+idmc,
                success:function(response){
                var data ="";
                var i=1;
                $.each(JSON.parse(response), function( index, item ) {
                    
                    var link = "<?= base_url()?>";
                    var file = '<a href="'+link+"file_uploads/mc/"+item.dok_file+'" target="_BLANK" class="btn btn-sm  btn-primary"><i class="fa fa-print"></i></a>'
                    var limit = i++;
                   

                    data+="<tr><td style='color:black; text-align:center'>"+limit+"<td style='color:black;'>"+item.keterangan+"<td style='color:black; text-align:center'>"+ file +"<td style='color:black; text-align:center'>"+ item.jml_halaman +"<td style='color:black; text-align:center'>"+ item.kantor + item.no_rak +"</td></td></td></td></td></tr>";     
                        
                    $("#detail_dok").html(data); 

                    console.log(data);

               });
                        
                    }
            });
            
         $("#detailDok").modal('show');
    };
</script>
