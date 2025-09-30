
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
                                    Gagal!
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                </div>


                                <?php elseif($this->session->flashdata('msg')=='success'):?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        Sukses
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                            <?php else:?>
                            <?php endif;?>
                        <div class="card">
                            <div class="card-body border-bottom">
                                <h5 class="card-title"><strong>Laporan Pekerjaan </strong> </h5>
                                <p align="right"><a href="<?php echo site_url('Kontrak/add_laporan_konstruksiNonTol/'.$id_kontrak) ?>"><button type="button" class="btn btn-default"><i class="fa fa-plus"></i>&nbsp; Tambah Data</button></a></p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            <tr style="text-align: center; background-color: #98D4FF">
                                                <th style="width: 10px">No.</th>
                                                <th style="width: 140px;">Jenis Laporan</th>
                                                <th style="width: 90px;">Tanggal Laporan</th>
                                                <th>Keterangan</th>
                                                <th>Lokasi Hardcopy</th>
                                                <th style="width: 120px;">File </th>
                                                <th style="width: 90px;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no=1;
                                                foreach ($row as $dt) {
                                                    if($dt->jenis_lap=='Bulanan'){
                                                        $jenis = $dt->jenis_lap.' ('.$dt->bulan.')';
                                                    }else{
                                                        $jenis = $dt->jenis_lap;
                                                    }
                                                            
                                            
                                            ?>
                                             <tr align="center">
                                                <td><?php echo $no++ ?>.</td>
                                                <td align="left"><?php echo $jenis ?></td>
                                                <td><?php echo date('d-m-Y',strtotime($dt->tanggal_lap)); ?></td>
                                                <td align="left"><?php echo $dt->keterangan ?></td>
                                                <td><?php echo $dt->kantor ?></td>
                                                <td><a href="<?php echo base_url("file_uploads/laporan_konstruksi/".$dt->dok_file)?>" target="_blank" class="btn btn-primary btn-sm" ><i class="fa fa-print"></i></a></span></td>
                                                <td>
                                                    <a href="<?php echo site_url('Kontrak/update_laporanKonstruksi/' . $dt->id_laporan.'/'.$dt->id_kontrak_nontol) ?>"  title="edit" class="btn btn-success btn-sm" ><i class="fa fa-edit"></i></a>
                                                    <a href="<?php echo site_url('Kontrak/hapus_laporanKonstruksi/' . $dt->id_laporan.'/'.$dt->id_kontrak_nontol) ?>"  title="hapus" class="btn btn-danger btn-sm" onClick="javasciprt: return confirm('Yakin menghapus data ?')" >Hapus</a>
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

<div class="modal fade" id="dokPembayaran" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 700px">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h6 class="modal-title">
                    <span class="fw-bold"><b>&emsp; Dokumen Pembayaran </b></span>
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body" style="padding: 2.9rem">
                
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover " id="tview-dok">
                                <thead>
                                    <tr style="text-align: center; background-color: #98D4FF">
                                        <th>No.</th>
                                        <th style="width: 350px;">Nama Dokumen</th>
                                        <th>File</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td align="center">1.</td>
                                        <td>Laporan Progres</td>
                                        <td align="center" id="tmc"></td>
                                    </tr>
                                    <tr>
                                        <td align="center">2.</td>
                                        <td>Berita Acara Pembayaran (BAP)</td>
                                        <td align="center" id="tbap"></td>
                                    </tr>
                                    <tr>
                                        <td align="center">3.</td>
                                        <td>Surat Permohonan Pembayaran</td>
                                        <td align="center" id="tspp"></td>
                                    </tr>
                                    <tr>
                                        <td align="center">4.</td>
                                        <td>Kuitansi</td>
                                        <td align="center" id="tkwi"></td>
                                    </tr>
                                    <tr>
                                        <td align="center">5.</td>
                                        <td>Faktur Pajak (PPN)</td>
                                        <td align="center" id="tppn"></td>
                                    </tr>
                                    <tr>
                                        <td align="center">6.</td>
                                        <td>Slip Pembayaran</td>
                                        <td align="center" id="tslip"></td>
                                    </tr>
                                     <tr>
                                        <td align="center">7.</td>
                                        <td>Internal Memo</td>
                                        <td align="center" id="tmemo"></td>
                                    </tr>
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
    function view_addendum($idpembayaran){
          var link = "<?= base_url()?>";
          var idpembayaran = $idpembayaran;

            $.ajax({
                type : "GET",
                url  : "<?php echo site_url('Kontrak_konsultan/get_detail_dokPembayaran')?>",
                data : "idpembayaran="+idpembayaran,
                success:function(response){
                var data ="";
                var i=1;
                var mc ="";
                var bap="";
                var spp="";
                var kwi="";
                var ppn ="";
                var slip ="";
                var memo ="";
                $.each(JSON.parse(response), function( index, item ) {
                    
                    if(item.id_dok_master==29){
                        if(item.dok_file!=null){
                            mc = '<a href="'+link+"file_uploads/kontrak_konsultan/dokumen_pembayaran/"+item.dok_file+'" target="_BLANK" class="btn btn-sm  btn-primary"><i class="fa fa-print"></i> View</a>';        
                        }else{
                            mc = '';
                        }
                        
                    }else if(item.id_dok_master==31){
                        if(item.dok_file!=null){
                            bap = '<a href="'+link+"file_uploads/kontrak_konsultan/dokumen_pembayaran/"+item.dok_file+'" target="_BLANK" class="btn btn-sm  btn-primary"><i class="fa fa-print"></i> View</a>';        
                        }else{
                            bap = '';
                        }
                        
                    }else if(item.id_dok_master==32){
                        if(item.dok_file!=null){
                            spp = '<a href="'+link+"file_uploads/kontrak_konsultan/dokumen_pembayaran/"+item.dok_file+'" target="_BLANK" class="btn btn-sm  btn-primary"><i class="fa fa-print"></i> View</a>';        
                        }else{
                            spp = '';
                        }
                        
                    }else if(item.id_dok_master==33){
                        if(item.dok_file!=null){
                            kwi = '<a href="'+link+"file_uploads/kontrak_konsultan/dokumen_pembayaran/"+item.dok_file+'" target="_BLANK" class="btn btn-sm  btn-primary"><i class="fa fa-print"></i> View</a>';        
                        }else{
                            kwi = '';
                        }
                        
                    }else if(item.id_dok_master==34){
                        if(item.dok_file!=null){
                            ppn = '<a href="'+link+"file_uploads/kontrak_konsultan/dokumen_pembayaran/"+item.dok_file+'" target="_BLANK" class="btn btn-sm  btn-primary"><i class="fa fa-print"></i> View</a>';        
                        }else{
                            ppn = '';
                        }
                        
                    }else if(item.id_dok_master==35){
                        if(item.dok_file!=null){
                            slip = '<a href="'+link+"file_uploads/kontrak_konstruksi/dokumen_pembayaran/"+item.dok_file+'" target="_BLANK" class="btn btn-sm  btn-primary"><i class="fa fa-print"></i> View</a>';        
                        }else{
                            slip = '';
                        }
                        
                    }else if(item.id_dok_master==36){
                        if(item.dok_file!=null){
                            memo = '<a href="'+link+"file_uploads/kontrak_konstruksi/dokumen_pembayaran/"+item.dok_file+'" target="_BLANK" class="btn btn-sm  btn-primary"><i class="fa fa-print"></i> View</a>';        
                        }else{
                            memo = '';
                        }
                        
                    }

               });

                $("#tview-dok").show();
                $("#tmc").html(mc);
                $("#tbap").html(bap);
                $("#tspp").html(spp);
                $("#tkwi").html(kwi);
                $("#tppn").html(ppn);
                $("#tslip").html(slip);
                $("#tmemo").html(memo);
               }
            });
         $("#dokPembayaran").modal('show');
    };
</script>
