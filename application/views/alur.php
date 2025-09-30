<style type="text/css">
    .well-link {
        text-decoration: none;
    }
    .panel-shadow {
        box-shadow: 0 8px 10px 1px rgba(0, 0, 0, .14), 0 3px 14px 2px rgba(0, 0, 0, .12), 0 5px 5px -3px rgba(0, 0, 0, .2);
    }

    table { 
        width: 100%; 
        border-collapse: collapse; 
        margin:50px auto;
        }

    @media 
    only screen and (max-width: 760px),
    (min-device-width: 768px) and (max-device-width: 1024px)  {

        table { 
            width: 100%; 
        }

        /* Force table to not be like tables anymore */
        table, thead, tbody, th, td, tr { 
            display: block; 
        }
        
        /* Hide table headers (but not display: none;, for accessibility) */
        thead tr { 
            position: absolute;
            top: -9999px;
            left: -9999px;
        }
        
        tr { border: 1px solid #ccc; }
        
        td { 
            /* Behave  like a "row" */
            border: none;
            border-bottom: 1px solid #eee; 
            position: relative;
            padding-left: 50%; 
        }

        td:before { 
            /* Now like a table header */
            position: absolute;
            /* Top/left values mimic padding */
            top: 6px;
            left: 6px;
            width: 45%; 
            padding-right: 10px; 
            white-space: nowrap;
            /* Label the data */
            content: attr(data-column);

            color: #000;
            font-weight: bold;
        }

}
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body border-bottom">
                    <div class="col-md-12">
                        <h5 class="card-title m-t-10"><b>Alur Proses <?php echo $judul ?></b>&emsp;&nbsp;  <a href="#status" title="Update" class="btn btn-info btn-sm" data-toggle="modal"  ><i class='mdi mdi-upload' ></i> Update Alur</a></h5>
                    </div>
                </div>
                <div class="card-body">
                    
                    <div class="row">
                       
                        <div class="col-md-12">
                        	<!-- <br><h4>&emsp;<b>Alur Proses <?php echo $judul ?></b></h4><br> -->
                            <p align="center"><img align="center" src="<?php echo base_url('assets/assets/images/'.$gambar) ?>" style=" height: 450px; width: 550px"></p>
                        </div>
                       
                      <!--   <div class="col-md-6">
                            <br>
                            <h4><b>List Prosedur</b> <?php echo anchor(site_url('Prosedur/add_prosedur/'.$kategori), '<button class="btn btn-info btn-sm"><i class="fa fa-plus"></i>Tambah</button>', 'class=""');?></h4>
                            <?php foreach ($dataProsedur as $key ) {
                                
                            ?>
                                <table>
                                    <tbody>
                                        <tr style="background: #0ec6fd" align="center">
                                            <th colspan="4"><b style="color: black"><?php echo $key->no_prosedur ?> || <?php echo date('d-m-Y',strtotime($key->tanggal))  ?></b></th>
                                        </tr>
                                        <tr style="background: #fdf59a" align="center">
                                            <th colspan="4"><b><a target="_BLANK" href="<?php echo base_url('file_upload/'.$key->file) ?>" style="color: black"><?php echo $key->nama_prosedur ?></a></b></th>
                                        </tr>
                                        <tr style="background: #f7a158" align="center">
                                            <th colspan="4"><b style="color: black"><?php echo $key->unit_kerja ?></b></th>
                                        </tr>
                                        <tr style="background: #e47f29" align="center">
                                            <th colspan="4"><b style="color: black"><?php echo $key->kpi_terkait ?></b></th>
                                        </tr>
                                  </tbody>
                                </table>
                            <?php } ?>
                            
                             
                        </div> -->
                    </div>

                </div>
            </div>
        </div>
    </div>
     <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body border-bottom">
                    <div class="col-md-12">

                        <h5 class="card-title m-t-10"><b>List Prosedur <?php echo $judul ?></b> &emsp;  <?php echo anchor(site_url('Prosedur/add_prosedur/'.$kategori), '<button class="btn btn-info btn-sm"><i class="fa fa-plus"></i> Tambah Data</button>', 'class=""');?></h5>  
                    </div>
                </div>
                <div class="card-body">
                     <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                           <thead>
                                <tr style="background-color: #3b5b96; color: white; vertical-align: middle;">
                                    <th style="text-align: center; width: 5px;"><b>No.</b></th>
                                    <th style="text-align: center;width: 70px"><b>No. Prosedur</b></th>
                                    <th style="text-align: center; width: 280px;"><b>Nama Prosedur</b></th>
                                    <th style="text-align: center;width: 65px"><b>Tanggal</b></th>
                                    <th style="text-align: center; width: 90px"><b>Unit Kerja</b></th>
                                    <th style="text-align: center; width: 65px"><b>File</b></th>
                                    <th style="text-align: center; width: 90px"><b>Aksi</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php $no=1; foreach ($dataProsedur as $key) { 
                                
                                    ?>

                                    <tr>
                                        <td align="center"><?php echo $no++ ?>.</td>
                                        <td align="center"><?php echo $key->no_prosedur ?></td>
                                        <td><?php echo $key->nama_prosedur ?></td>
                                        <td align="center"><?php echo date('d-m-Y',strtotime($key->tanggal))?></td>
                                        <td><?php echo $key->unit_kerja ?></td>
                                        <td align="center"><a href="<?php echo base_url('file_upload/prosedur/'.$key->file);?>" class="btn btn-success btn-sm " target="_BLANK"><i class='mdi mdi-cloud-download' ></i></a></td>
                                        <td align="center">
                                            <a href="<?php echo site_url('Prosedur/update_peraturan/' . $key->id_prosedur) ?>" title="Edit" class="btn btn-info btn-xs"  >Edit</a> 
                                            <a href="<?php echo site_url('Prosedur/delete/' . $key->id_prosedur) ?>"  title="hapus" class="btn btn-danger btn-xs" onClick="javasciprt: return confirm('Yakin menghapus data ?')" >Hapus</a>
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

<div class="modal fade" id="status" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><strong>Update Alur Proses</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">                   
                    <form class="form-horizontal" action="<?php echo site_url('Welcome/act_update_issue') ?>" enctype="multipart/form-data" data-parsley-validate="true" method="post">    
                        <div class="card-body"> 
                        <div class="form-group row">
                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Pilih file &emsp;</label>
                                <div class="col-sm-9">
                                    <input type="file" name="file">
                                </div>
                                
                                
                            </div>     
                       
                        <div class="form-group row">
                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">&emsp;&emsp;</label>
                                <div class="col-sm-9">
                                     &nbsp;<button type="submit" class="btn btn-info btn-sm">Simpan</button>
                                </div>
                        </div>
                         </div>
                        <input type="hidden" name="id_asil" id="id_asil" >
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>