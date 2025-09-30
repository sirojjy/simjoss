
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
                    <?php echo $this->session->flashdata('message_error') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>


            <?php elseif($this->session->flashdata('message_success')):?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo $this->session->flashdata('message_success') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
            <?php else:?>
            <?php endif;?>
            <div class="card">
                <div class="card-body border-bottom">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="card-title"><strong>Daftar Kewajiban Kepatuhan (Compliance Obligation List) <font color="red"> Aspek Operasional</font></strong></h4>
                        </div>

                    </div>
                    <br>    
                    <?php if($this->session->userdata('level_user')==1) { ?>
                        <p align="right"><a href="<?php echo site_url('Manajemen/add_kepatuhan/operasional') ?>"><button type="button" class="btn btn-default"><i class="fa fa-plus"></i>&nbsp; Tambah Data</button></a></p>
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
                                    <th scope="col" style="text-align: center; background-color: #1d6296; color: white; "><b>Status</b></th>
                                    <th scope="col" style="text-align: center; background-color: #1d6296; color: white; "><b>Dokumen</b></th>
                                    <th scope="col" style="text-align: center; background-color: #1d6296; color: white; "><b>Aksi</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no=1;
                                    foreach ($row as $rw) { 
                                        if($rw->status==1){
                                            $status= "<i class='fa fa-check' style='color : darkcyan'></i>";
                                        }else{
                                            $status= "<a href='#' data-toggle='modal' data-target='#update_status' data-id='".$rw->id_kewajiban_kepatuhan."' data-jenis_aspek='".$rw->jenis_aspek."'><i class='fa fa-window-close' style='color : indianred'></i></a>";
                                        }
                                ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $rw->kewajiban ?></td>
                                        <td><?php echo $rw->dasar_hukum ?></td>
                                        <td><?php echo $rw->otoritas_terkait ?></td>
                                        <td><?php echo $rw->konsekuensi ?></td>
                                        <td><?php echo $rw->tgl_berakhir ?></td>
                                        <td><?php echo $rw->unit_pj ?></td>
                                        <td align="center"><?php echo $status ?></td>
                                        <td align="center">
                                            <?php if($rw->file!=null){?>
                                                <a href="<?php echo base_url("file_uploads/kewajiban_kepatuhan/".$rw->file)?>" target="_blank" class="btn btn-primary btn-sm" ><i class="fa fa-print"></i></a>
                                                
                                            <?php }else{ ?>
                                                <a href="#" target="_blank" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#upload_dok" data-id_kewajiban_kepatuhan="<?php echo $rw->id_kewajiban_kepatuhan ?>" data-jenis_aspek="<?php echo $rw->jenis_aspek ?>"><i class="fa fa-upload"></i></a>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo site_url('Manajemen/edit_kepatuhan/operasional/' . $rw->id_kewajiban_kepatuhan) ?>"   class="badge badge-success" title="Edit"><i class="fa fa-edit"></i></a>
                                            <a href="<?php echo site_url('Manajemen/hapus_kepatuhan_op/' . $rw->id_kewajiban_kepatuhan) ?>"  title="hapus" class="badge badge-danger btn-sm" onClick="javasciprt: return confirm('Yakin menghapus data ?')" ><i class="fa fa-trash"></i></a>
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

<?php 
    $this->load->view('manajemen/upload_dokumen');
    $this->load->view('manajemen/update_status');
?>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#upload_dok').on('show.bs.modal', function(e) {
            
            var id = $(e.relatedTarget).data('id_kewajiban_kepatuhan');
            var jenis_aspek = $(e.relatedTarget).data('jenis_aspek');

            $(e.currentTarget).find('input[name="id_kewajiban_kepatuhan"]').val(id);
            $(e.currentTarget).find('input[name="id_aspek"]').val(jenis_aspek);

        });

        $('#update_status').on('show.bs.modal', function(e) {
            // alert("ssss");
            var id = $(e.relatedTarget).data('id');
            var jenis_aspek = $(e.relatedTarget).data('jenis_aspek');

            $(e.currentTarget).find('input[name="id_kewajiban_status"]').val(id);
            $(e.currentTarget).find('input[name="id_aspek_status"]').val(jenis_aspek);

        });
    });
</script>