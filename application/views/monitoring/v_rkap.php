<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="javascript:void(0);"><b>&emsp; Monitoring RKAP</b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-align-justify"></i>
    </button>
</nav>
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12">
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('success') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
            <?php elseif ($this->session->flashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('success') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
            <?php else: ?>
            <?php endif; ?>
            <div class="card">
                <div class="card-body border-bottom d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">Data Monitoring RKAP</h4>
                    <?php if ($this->session->userdata('level_user') == 1) { ?>
                        <a href="<?php echo site_url('Monitoring/add_rkap') ?>"><button type="button" class="btn btn-default"><i class="fa fa-plus mr-2"></i>Tambah Data</button></a>
                    <?php } ?>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-9">
                            <h4 class="card-title"><strong>OPEX</strong></h4>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="dt_opex" class="table table-bordered table-striped table-hover js-basic-example dataTable w-100">
                            <thead>
                                <tr style="background-color: #1f16a4; color: white">
                                    <td class="text-center font-weight-bold">No.</td>
                                    <td class="text-center font-weight-bold">Keterangan</td>
                                    <td class="text-center font-weight-bold">TW</td>
                                    <td class="text-center font-weight-bold">Tahun</td>
                                    <td class="text-center font-weight-bold">Rencana</td>
                                    <td class="text-center font-weight-bold">Realisasi</td>
                                    <td class="text-center font-weight-bold">Deviasi</td>
                                    <td class="text-center font-weight-bold">Aksi</td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <br>
                    <hr>
                    <h4 class="card-title"><strong>CAPEX</strong></h4>
                    <div class="table-responsive">
                        <table id="dt_capex" class="table table-bordered table-striped table-hover js-basic-example dataTable w-100">
                            <thead>
                                <tr style="background-color: #1f16a4; color: white">
                                    <td class="text-center">No.</td>
                                    <td class="text-center">Keterangan</td>
                                    <td class="text-center">TW</td>
                                    <td class="text-center">Tahun</td>
                                    <td class="text-center">Rencana</td>
                                    <td class="text-center">Realisasi</td>
                                    <td class="text-center">Deviasi</td>
                                    <td class="text-center">Aksi</td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="<?= base_url('assets/js/monitoring_rkap/monitoring_rkap.js'); ?>"></script>
<script>
    $(document).ready(function() {
        getRKAP({
            id: "#dt_opex",
            url: "<?= base_url('Monitoring/getRKAP') ?>",
            jenis: "Opex"
        });

        getRKAP({
            id: "#dt_capex",
            url: "<?= base_url('Monitoring/getRKAP') ?>",
            jenis: "Capex"
        });
    });
</script>