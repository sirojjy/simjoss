<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand font-weight-bold" href="javascript:void(0);">Nilai</a>
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
            <?php endif; ?>
            <div class="card">
                <div class="card-body border-bottom d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 font-weight-bold">Data Progres Nilai</h4>
                    <?php if ($this->session->userdata('level_user') == 1) { ?>
                        <div class="d-flex">
                            <a href="#" data-toggle="modal" data-target="#uploadFile" class="btn btn-default mr-2 d-none"><i class="fa fa-plus mr-2"></i>Upload File</a>
                            <a href="<?php echo site_url('Progres/add_progresNilai') ?>"><button type="button" class="btn btn-default"><i class="fa fa-plus mr-2"></i>Tambah Data</button></a>
                        </div>
                    <?php } ?>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dt_progres-nilai" class="table table-bordered table-striped table-hover js-basic-example dataTable w-100">
                            <thead>
                                <tr class="text-center bg-theme text-white">
                                    <th class="font-weight-bold">No.</th>
                                    <th class="font-weight-bold">Tanggal</th>
                                    <th class="font-weight-bold">Seksi</th>
                                    <th class="font-weight-bold">Kontrak+PPN</th>
                                    <th class="font-weight-bold">Akrual Progres Konstruksi </th>
                                    <th class="font-weight-bold">Deviasi Rupiah</th>
                                    <th class="font-weight-bold">Telah Terbayar</th>
                                    <th class="font-weight-bold">Belum Terbayar</th>
                                    <th class="font-weight-bold">File</th>
                                    <?php if ($this->session->userdata('level_user') == 1) { ?>
                                        <th class="font-weight-bold">Aksi</th>
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

<div class="modal fade" id="uploadFile" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 700px">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h6 class="modal-title">
                    <span class="fw-bold"><b>Upload File </b></span>
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" action="<?php echo site_url('Dokumen/import_file_excel') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>File <small class="text-danger">*(xlsx, xls)</small></label>
                                <div class="browse-wrap">
                                    <input type="file" name="fileexcel" class="btn btn-secondary btn-block" title="Choose a file to upload" accept=".xlsx, .xls" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer no-bd">
                    <button type="submit" id="addRowButton" class="btn btn-primary">Upload</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
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
                        <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Tanggal</label>
                        <div class="col-sm-9">
                            <input type="date" required="" name="tgl" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Seksi</label>
                        <div class="col-sm-6">
                            <select class="form-control mb-6" name="seksi" id="seksi" aria-label="Default select example">
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
                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Kebutuhan Bidang</label>
                        <div class="col-sm-6">
                            <input type="text" required="" name="kebutuhan_bidang" class="form-control">
                        </div>
                        <label class="col-sm-3 col-form-label"><b>bidang</b></label>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Rencana</label>
                        <div class="col-sm-6">
                            <input type="text" required="" name="rencana" class="form-control">
                        </div>
                        <label class="col-sm-3 col-form-label"><b>%</b></label>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Realisasi</label>
                        <div class="col-sm-6">
                            <input type="text" required="" name="realisasi" class="form-control">
                        </div>
                        <label class="col-sm-3 col-form-label"><b>%</b></label>
                    </div>
                    <div class="row mb-3">
                        <label for="inputChoosePassword2" class="col-sm-3 col-form-label">File</label>
                        <div class="col-sm-9">
                            <input type="file" name="file" class="form-control">
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

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="<?= base_url('assets/js/progres_pekerjaan/progres_pekerjaan.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        getProgresPekerjaan({
            id: "#dt_progres-nilai",
            url: "<?= base_url('Progres/getProgresNilai'); ?>",
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
                    data: "kontrak",
                    className: "text-center",
                },
                {
                    data: "akrual_progres",
                    className: "text-center",
                },
                {
                    data: "deviasi",
                    className: "text-center",
                },
                {
                    data: "terbayar",
                    className: "text-center",
                },
                {
                    data: "belum_terbayar",
                    className: "text-center",
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