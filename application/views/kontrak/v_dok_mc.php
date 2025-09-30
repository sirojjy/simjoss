
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="javascript:void(0);"><b>&emsp; Dokumen MC</b></a>
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
                                <h5 class="card-title"><strong>Sertifikat Bulanan (MC)</strong> </h5>
                                <!-- <p align="right"><a href="<?php echo site_url('Kontrak/add_mc/'.$id_kontrak) ?>"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Tambah Data</button></a></p> -->
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="table2" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            <tr style="text-align: center; background-color: #98D4FF">
                                                <th style="width: 10px">No.</th>
                                                <th style="width: 130px;">Sertifikat No.</th>
                                                <!-- <th>Periode</th> -->
                                                <th>Nama Dokumen</th>
                                                <th>Jumlah Halaman</th>
                                                <th>Lokasi Hardcopy</th>
                                                <th style="width: 50px;">File</th>
                                                <th style="width: 100px">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no=1;
                                                foreach ($row as $dt) {

                                                $count = $this->db->query('select COALESCE(count(id_detail_dok),0) as sum from detail_dok_konstruksi where id_mc is not null and id_mc='.$dt->id_mc)->row()->sum;
                                                if($dt->no_rak==null){
                                                    $rak ='';
                                                }else{
                                                    $rak = 'Rak '. $dt->no_rak;
                                                }
                                                if($dt->no_box==null){
                                                    $baris ='';
                                                }else{
                                                    $baris = 'Baris '. $dt->no_box;
                                                }
        
                                            
                                            ?>
                                             <tr align="center">
                                                <td><?php echo $no++ ?>.</td>
                                                <td>MC <?php echo $dt->nomor_mc ?></td>
                                                <!-- <td><?php echo $dt->bulan ?> <?php echo $dt->tahun ?></td> -->
                                                <!-- <td><?php echo date('d-m-Y',strtotime($dt->tanggal)); ?></td> -->
                                                
                                                <td align="left"><?php echo $dt->keterangan ?></td>
                                                <td><?php echo number_format($dt->jml_halaman,0,",",".");  ?></td>
                                                <td><?php echo $dt->kantor ?> - <?php echo $rak ?> <?php echo $baris ?></td>
                                                <td>
                                                    <?php if($dt->dok_file!=null){ ?>
                                                    <a href="<?php echo base_url("file_uploads/mc/".$dt->dok_file)?>" target="_blank" class="btn btn-primary btn-sm" ><i class="fa fa-print"></i></a></span>
                                                    <?php } else { ?>
                                                        -
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success btn-sm" href="#" data-toggle="modal" data-target="#editDokMc" data-id_detail_dok="<?php echo $dt->id_detail_dok ?>" data-id_mc="<?php echo $dt->id_mc ?>" data-keterangan="<?php echo $dt->keterangan ?>" data-jml_halaman="<?php echo $dt->jml_halaman ?>" data-pic="<?php echo $dt->pic ?>" data-kantor="<?php echo $dt->kantor ?>" data-no_rak="<?php echo $dt->no_rak ?>" data-no_box="<?php echo $dt->no_box ?>" data-dok_file="<?php echo $dt->dok_file ?>"><i class="fa fa-edit"></i> Edit</a>

                                                    <!-- <a href="<?php echo site_url('Kontrak/hapus_dok_mc/' . $dt->id_detail_dok)?>"  title="hapus" class="btn btn-danger btn-sm" onClick="javasciprt: return confirm('Yakin menghapus data ?')" ><i class="fa fa-trash"></i></a> -->
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
<div class="modal fade" id="editDokMc" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 700px">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h6 class="modal-title">
                    <span class="fw-bold"><b>&emsp; Edit Data Dokumen</b></span>
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" action="<?php echo site_url('Kontrak/act_update_DokMc') ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="modal-body" style="padding: 2.2rem">
                
                    <div class="row">
                        <input type="hidden" name="id_detail_dok" class="form-control">
                        <input type="hidden" name="id_mc" class="form-control">
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Nama Dokumen</label>
                                <input type="text" name="keterangan" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Jumlah Halaman</label>
                                <input type="text" name="jml_halaman" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Kantor</label>
                                <select class="form-control show-tick ms select2" required="" id="kantor" name="kantor" data-placeholder="Select">
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
                                <label>Current File</label> &emsp;&emsp;
                                <div class="browse-wrap" id="detail_file">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Update File (.pdf)</label><small style="color: red"> (*Kosongkan jika tidak ingin update file)</small>
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
        
        $('#editDokMc').on('show.bs.modal', function(e) { 
            var id_detail_dok = $(e.relatedTarget).data('id_detail_dok');
            var id_mc = $(e.relatedTarget).data('id_mc');
            var file = $(e.relatedTarget).data('dok_file');
            var jml_halaman = $(e.relatedTarget).data('jml_halaman');
            var keterangan = $(e.relatedTarget).data('keterangan');
            var pic = $(e.relatedTarget).data('pic');
            var kantor = $(e.relatedTarget).data('kantor');
            var no_rak = $(e.relatedTarget).data('no_rak');
            var no_box = $(e.relatedTarget).data('no_box');

            var link = "<?= base_url()?>";
            var evidence ='<a href="'+link+"file_uploads/mc/"+file+'" target="_blank" class="btn btn-sm btn-success"><i class="ti ti-printer"></i> Preview File</a>';

            $(e.currentTarget).find('input[name="id_detail_dok"]').val(id_detail_dok);
             $(e.currentTarget).find('input[name="id_mc"]').val(id_mc);
            $(e.currentTarget).find('input[name="jml_halaman"]').val(jml_halaman);
            $(e.currentTarget).find('input[name="keterangan"]').val(keterangan);
            $(e.currentTarget).find('input[name="pic"]').val(pic);
            $(e.currentTarget).find('#kantor').val(kantor);
            $(e.currentTarget).find('input[name="no_rak"]').val(no_rak);
            $(e.currentTarget).find('input[name="no_box"]').val(no_box);

            $("#detail_file").html(evidence); 
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
                   

                    data+="<tr><td style='color:black; text-align:center'>"+limit+"<td style='color:black;'>"+item.keterangan+"<td style='color:black; text-align:center'>"+ file +"<td style='color:black; text-align:center'>"+ item.jml_halaman +"</td></td></td></td></tr>";     
                        
                    $("#detail_dok").html(data); 

                    console.log(data);

               });
                        
                    }
            });
            
         $("#detailDok").modal('show');
    };
</script>
