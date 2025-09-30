
<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="javascript:void(0);"><b>&emsp; BIM </b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-align-justify"></i>
    </button>

</nav> -->
<div class="container-fluid">            
    <div class="row clearfix">
        <div class="col-lg-12">
            <?php if($this->session->flashdata('message_error')):?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $this->session->flashdata('message_error')?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>


            <?php elseif($this->session->flashdata('message_success')):?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo $this->session->flashdata('message_success')?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
            <?php else:?>
            <?php endif;?>
            <div class="card">
                <div class="card-body border-bottom">
                    <!-- <h4 class="card-title"><strong>Data BIM</strong> </h4> -->
                    <!-- <?php if($this->session->userdata('level_user')==1) { ?>
                        <p align="right">
                            <a href="<?php echo site_url('Progres/add_progresLahan') ?>"><button type="button" class="btn btn-default"><i class="fa fa-plus"></i>&nbsp; Tambah Data</button></a>
                        </p>
                    <?php } ?> -->
                </div>
                <div class="card-body">
                    <p align="center">
                        <img src="<?php echo base_url('file_uploads/maintenance2.jpg') ?>" style="width:65%;height:70%;" />
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
