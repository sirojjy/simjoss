<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand font-weight-bold" href="javascript:void(0);">Lahan</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-align-justify"></i>
    </button>

</nav>
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12">
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $this->session->flashdata('error') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
            <?php elseif ($this->session->flashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo $this->session->flashdata('success') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
            <?php else: ?>
            <?php endif; ?>
            <div class="card">
                <div class="card-body border-bottom d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0 font-weight-bold">Data Progres Lahan</h4>
                    <?php if ($this->session->userdata('level_user') == 1) { ?>
                        <a href="<?php echo site_url('Progres/add_progresLahan') ?>"><button type="button" class="btn btn-default"><i class="fa fa-plus"></i>&nbsp; Tambah Data</button></a>
                    <?php } ?>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dt_progres_lahan" class="table table-bordered table-striped table-hover js-basic-example dataTable w-100">
                            <thead>
                                <tr class="text-white bg-theme">
                                    <th class="text-center font-weight-bold">No.</th>
                                    <th class="text-center font-weight-bold">Tanggal</th>
                                    <th class="text-center font-weight-bold">Seksi</th>
                                    <th class="text-center font-weight-bold">Kebutuhan Bidang</th>
                                    <th class="text-center font-weight-bold">Rencana</th>
                                    <th class="text-center font-weight-bold">Realisasi</th>
                                    <th class="text-center font-weight-bold">File</th>
                                    <?php if ($this->session->userdata('level_user') == 1) { ?>
                                        <th class="text-center font-weight-bold">Aksi</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editLahan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h6 class="modal-title">
                    <span class="fw-bold"><b>&emsp; Edit Data Penyiapan Lahan </b></span>
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" action="<?php echo $action_edit ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="modal-body" style="padding: 2.2rem">
                    <input type="hidden" name="id_progres_lahan_edit">
                    <div class="row mb-3">
                        <label for="tgl_edit" class="col-sm-3 col-form-label">Tanggal</label>
                        <div class="col-sm-9">
                            <input type="date" required="" name="tgl" id="tgl_edit" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="seksi_edit" class="col-sm-3 col-form-label">Seksi</label>
                        <div class="col-sm-6">
                            <select class="form-control mb-6" name="seksi" id="seksi_edit" aria-label="Default select example">
                                <option selected>--- Pilih ---</option>
                                <?php
                                foreach ($seksi as $se) {
                                ?>
                                    <option value="<?php echo $se->id_seksi ?>"><?php echo $se->seksi ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="kebutuhan_bidang_edit" class="col-sm-3 col-form-label">Kebutuhan Bidang</label>
                        <div class="col-sm-6">
                            <input type="text" required="" id="kebutuhan_bidang_edit" name="kebutuhan_bidang" class="form-control">
                        </div>
                        <label class="col-sm-3 col-form-label"><b>bidang</b></label>
                    </div>
                    <div class="row mb-3">
                        <label for="rencana_edit" class="col-sm-3 col-form-label">Rencana</label>
                        <div class="col-sm-6">
                            <input type="text" required="" id="rencana_edit" name="rencana" class="form-control">
                        </div>
                        <label class="col-sm-3 col-form-label"><b>%</b></label>
                    </div>
                    <div class="row mb-3">
                        <label for="realisasi_edit" class="col-sm-3 col-form-label">Realisasi</label>
                        <div class="col-sm-6">
                            <input type="text" required="" id="realisasi_edit" name="realisasi" class="form-control">
                        </div>
                        <label class="col-sm-3 col-form-label"><b>%</b></label>
                    </div>
                    <div class="row mb-3">
                        <label for="file_edit" class="col-sm-3 col-form-label">File</label>
                        <div class="col-sm-9">
                            <input type="file" id="file_edit" name="file" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer no-bd">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="viewIssue" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 70%;">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h6 class="modal-title">
                    <span class="fw-bold"><b>&emsp; Data Isu/Permasalahan Penyiapan Lahan </b></span>
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" action="#" method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="modal-body" style="padding: 2.2rem">
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr style="text-align: center; background-color: #98D4FF">
                                    <th style="width: 20px;">No.</th>
                                    <th>Issue</th>
                                    <th>Rekomendasi</th>
                                    <th style="width: 80px">Status</th>
                                    <th style="width: 80px">File</th>
                                    <?php if ($this->session->userdata('level_user') == 1) { ?>
                                        <th style="width: 80px">Aksi</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="modal-footer no-bd">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="<?= base_url('assets/js/progres_pekerjaan/progres_pekerjaan.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        getProgresPekerjaan({
            id: "#dt_progres_lahan",
            url: "<?= base_url('Progres/getProgresLahan'); ?>",
            columnDefs: [{
                    targets: 0,
                    width: "1%",
                    className: "dt-nowrap",
                },
                {
                    orderable: false,
                    targets: [-1, -2],
                },
            ],
            columns: [{
                    data: "id",
                    className: "text-center",
                },
                {
                    data: "tgl_progres",
                    className: "text-center",
                },
                {
                    data: "seksi_progres",
                    className: "font-weight-bold",
                },
                {
                    data: "kebutuhan_bidang",
                    className: "text-center",
                },
                {
                    data: "rencana",
                    className: "text-right",
                },
                {
                    data: "realisasi",
                    className: "text-right",
                },
                {
                    data: "file",
                    className: "text-center",
                },
                {
                    data: "aksi",
                    className: "text-center",
                },
            ]
        });
    });
</script>