
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
                                <h5 class="card-title"><strong>Monitoring Pembayaran </strong> </h5>
                                <p align="right"><a href="<?php echo site_url('Kontrak_konsultan/add_pembayaran/'.$id_kontrak) ?>"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Tambah Data</button></a></p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            <tr style="text-align: center; background-color: #98D4FF">
                                                <th style="width: 10px">No.</th>
                                                <th style="width: 50px;">Termin ke</th>
                                                <th>Tanggal Pembayaran</th>
                                                <th>Nilai (Rp.)</th>
                                                <th>Keterangan</th>
                                                <th>Sumber Dana</th>
                                                <th style="width: 120px;">View Dokumen</th>
                                                <th style="width: 90px;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no=1;
                                                foreach ($row as $dt) {

                                                $count = $this->db->query('select COALESCE(count(id_detail_dok),0) as sum from detail_dok_konsultan where id_dok_master in(76,31,32,33,34,80,81,37,82) and id_pembayaran='.$dt->id_pembayaran)->row()->sum;
                                                if($count<8){
                                                    $ket = '<span class="btn btn-sm  btn-warning"><i class="fa fa-warning"></i> Belum Lengkap</span>';
                                                }else{
                                                    $ket = '<span class="btn btn-sm  btn-success"><i class="fa fa-check"></i> Lengkap</span>';
                                                }

                                                if($dt->pmn==1){
                                                    $sumber = 'PMN';
                                                }else{
                                                    $sumber = 'Non PMN';
                                                }
                                                            
                                            
                                            ?>
                                             <tr align="center">
                                                <td><?php echo $no++ ?>.</td>
                                                <td><?php echo $dt->termin ?></td>
                                                <td><?php echo date('d-m-Y',strtotime($dt->tanggal)); ?></td>
                                                <td><?php echo number_format($dt->nilai,2,',','.') ?></td>
                                                <td align="left"><?php echo $dt->keterangan ?></td>
                                                <td><?php echo $sumber ?></td>
                                                <td><?php echo $ket ?>&nbsp;<a href="#" onclick='return view_addendum(<?php echo $dt->id_pembayaran ?>)' class="btn btn-sm btn-primary"><i class="fa fa-folder-open-o"></i> <?php echo $count ?></a></td>
                                                <td>
                                                    <a href="<?php echo site_url('Kontrak_konsultan/update_pembayaran/' . $dt->id_pembayaran.'/'.$dt->id_kontrak_konsultan) ?>"  title="edit" class="btn btn-success btn-sm" >Edit</a>
                                                    <a href="<?php echo site_url('Kontrak_konsultan/hapus_pembayaran/' . $dt->id_pembayaran.'/'.$dt->id_kontrak_konsultan) ?>"  title="hapus" class="btn btn-danger btn-sm" onClick="javasciprt: return confirm('Yakin menghapus data ?')" ><i class="fa fa-trash"></i></a>
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
                                    <!-- <tr>
                                        <td align="center">1.</td>
                                        <td>Perhitungan Pajak</td>
                                        <td align="center" id="tpp"></td>
                                    </tr>
                                    <tr>
                                        <td align="center">2.</td>
                                        <td>Disposisi Direksi</td>
                                        <td align="center" id="tdd"></td>
                                    </tr>
                                    <tr>
                                        <td align="center">3.</td>
                                        <td>Ijin Penggunaan Anggaran</td>
                                        <td align="center" id="tipa"></td>
                                    </tr> -->
                                    <tr>
                                        <td align="center">1.</td>
                                        <td>Nota Dinas</td>
                                        <td align="center" id="tnd"></td>
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
                                        <td>Kwitansi</td>
                                        <td align="center" id="tkwi"></td>
                                    </tr>
                                    <tr>
                                        <td align="center">5.</td>
                                        <td>Faktur Pajak (PPN)</td>
                                        <td align="center" id="tppn"></td>
                                    </tr>
                                    <tr>
                                        <td align="center">6.</td>
                                        <td>Berita Acara Pemeriksaan Pekerjaan</td>
                                        <td align="center" id="tbapp"></td>
                                    </tr>
                                    <tr>
                                        <td align="center">7.</td>
                                        <td>Berita Acara Serah Terima</td>
                                        <td align="center" id="tbast"></td>
                                    </tr>
                                    <tr>
                                        <td align="center">8.</td>
                                        <td>Perincian Perhitungan Tagihan</td>
                                        <td align="center" id="tinv"></td>
                                    </tr>
                                    <tr>
                                        <td align="center">9.</td>
                                        <td>Dokumen Lainnya</td>
                                        <td align="center" id="tdokl"></td>
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
                var pp ="";
                var bap="";
                var spp="";
                var kwi="";
                var ppn ="";
                // var slip ="";
                
                var dd ="";
                var ipa ="";
                var nd="";
                var bapp="";
                var bast="";
                var inv ="";
                var dokl ="";

                $.each(JSON.parse(response), function( index, item ) {
                    
                    if(item.id_dok_master==79){
                        if(item.dok_file!=null){
                            pp = '<a href="'+link+"file_uploads/kontrak_konsultan/dokumen_pembayaran/"+item.dok_file+'" target="_BLANK" class="btn btn-sm  btn-primary"><i class="fa fa-print"></i> View</a>';        
                        }else{
                            pp = '';
                        }
                        
                    }else if(item.id_dok_master==78){
                        if(item.dok_file!=null){
                            dd = '<a href="'+link+"file_uploads/kontrak_konsultan/dokumen_pembayaran/"+item.dok_file+'" target="_BLANK" class="btn btn-sm  btn-primary"><i class="fa fa-print"></i> View</a>';        
                        }else{
                            dd = '';
                        }
                        
                    }else if(item.id_dok_master==77){
                        if(item.dok_file!=null){
                            ipa = '<a href="'+link+"file_uploads/kontrak_konsultan/dokumen_pembayaran/"+item.dok_file+'" target="_BLANK" class="btn btn-sm  btn-primary"><i class="fa fa-print"></i> View</a>';        
                        }else{
                            ipa = '';
                        }
                        
                    }else if(item.id_dok_master==76){
                        if(item.dok_file!=null){
                            nd = '<a href="'+link+"file_uploads/kontrak_konsultan/dokumen_pembayaran/"+item.dok_file+'" target="_BLANK" class="btn btn-sm  btn-primary"><i class="fa fa-print"></i> View</a>';        
                        }else{
                            nd = '';
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
                        
                    }
                    else if(item.id_dok_master==80){
                        if(item.dok_file!=null){
                            bapp = '<a href="'+link+"file_uploads/kontrak_konsultan/dokumen_pembayaran/"+item.dok_file+'" target="_BLANK" class="btn btn-sm  btn-primary"><i class="fa fa-print"></i> View</a>';        
                        }else{
                            bapp = '';
                        }
                        
                    }
                    else if(item.id_dok_master==81){
                        if(item.dok_file!=null){
                            bast = '<a href="'+link+"file_uploads/kontrak_konsultan/dokumen_pembayaran/"+item.dok_file+'" target="_BLANK" class="btn btn-sm  btn-primary"><i class="fa fa-print"></i> View</a>';        
                        }else{
                            bast = '';
                        }
                        
                    }
                    else if(item.id_dok_master==37){
                        if(item.dok_file!=null){
                            dokl = '<a href="'+link+"file_uploads/kontrak_konsultan/dokumen_pembayaran/"+item.dok_file+'" target="_BLANK" class="btn btn-sm  btn-primary"><i class="fa fa-print"></i> View</a>';        
                        }else{
                            dokl = '';
                        }
                        
                    }
                    else if(item.id_dok_master==82){
                        if(item.dok_file!=null){
                            inv = '<a href="'+link+"file_uploads/kontrak_konsultan/dokumen_pembayaran/"+item.dok_file+'" target="_BLANK" class="btn btn-sm  btn-primary"><i class="fa fa-print"></i> View</a>';        
                        }else{
                            inv = '';
                        }
                        
                    }
                    // else if(item.id_dok_master==35){
                    //     if(item.dok_file!=null){
                    //         slip = '<a href="'+link+"file_uploads/kontrak_konstruksi/dokumen_pembayaran/"+item.dok_file+'" target="_BLANK" class="btn btn-sm  btn-primary"><i class="fa fa-print"></i> View</a>';        
                    //     }else{
                    //         slip = '';
                    //     }
                        
                    // }

               });

                $("#tview-dok").show();
                $("#tpp").html(pp);
                $("#tdd").html(dd);
                $("#tipa").html(ipa);
                $("#tnd").html(nd);
                $("#tbap").html(bap);
                $("#tspp").html(spp);
                $("#tkwi").html(kwi);
                $("#tppn").html(ppn);
                $("#tbapp").html(bapp);
                $("#tbast").html(bast);
                $("#tdokl").html(dokl);
                $("#tinv").html(inv);
               }
            });
         $("#dokPembayaran").modal('show');
    };
</script>
