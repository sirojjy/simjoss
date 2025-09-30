<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand font-weight-bold" href="javascript:void(0);">SOP</a>
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
                    <h4 class="card-title mb-0 font-weight-bold"><strong>Dokumen Perusahan: SOP</strong> </h4>
                    <?php if ($this->session->userdata('level_user') == 1) { ?>
                        <a href="<?php echo site_url('Dokumen/add_sop') ?>" class="btn btn-default"><i class="fa fa-plus"></i>&nbsp; Tambah Data</a>
                    <?php } ?>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dt_sop" class="table table-bordered table-striped table-hover js-basic-example dataTable w-100">
                            <thead>
                                <tr class="text-center bg-info text-white">
                                    <th class="align-middle font-weight-bold">No.</th>
                                    <th class="align-middle font-weight-bold">Nama Dokumen</th>
                                    <th class="align-middle font-weight-bold">No. Dokumen</th>
                                    <th class="align-middle font-weight-bold">No. Revisi</th>
                                    <th class="align-middle font-weight-bold">Tanggal Pengesahan</th>
                                    <th class="align-middle font-weight-bold">File</th>
                                    <th class="align-middle font-weight-bold">Lokasi Hardcopy</th>
                                    <th class="align-middle font-weight-bold">Divisi</th>
                                    <th class="align-middle font-weight-bold">ISO</th>
                                    <?php if ($this->session->userdata('level_user') == 1) { ?>
                                        <th class="align-middle font-weight-bold">Aksi</th>
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

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="<?= base_url('assets/js/datatables.js') ?>"></script>

<script type="text/javascript">
    $(document).ready(function() {
        getDatatables({
            id: "#dt_sop",
            url: "<?= base_url('Dokumen/getSOP'); ?>",
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
                    data: "nama",
                },
                {
                    data: "nomor",
                    className: "text-center",
                },
                {
                    data: "nomor_revisi",
                    className: "text-center",
                },
                {
                    data: "tanggal",
                    className: "text-center",
                },
                {
                    data: "file",
                    className: "text-center",
                },
                {
                    data: "kantor",
                    className: "text-center",
                },
                {
                    data: "divisi",
                    className: "text-center",
                },
                {
                    data: "iso",
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