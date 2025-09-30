<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand font-weight-bold" href="javascript:void(0);">Audit Internal</a>
</nav>
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12">
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('error') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
            <?php elseif ($this->session->flashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('success') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
            <?php endif; ?>
            <div class="card">
                <div class="card-body border-bottom d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0 font-weight-bold"><strong>Data Audit Internal</strong> </h4>
                    <?php if ($this->session->userdata('level_user') == 1) { ?>
                        <a href="<?= site_url('Audit/add_audit_internal') ?>" class="btn btn-default"><i class="fa fa-plus"></i>&nbsp; Tambah Data</a>
                    <?php } ?>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dt_audit-internal" class="table table-bordered table-striped table-hover js-basic-example dataTable w-100">
                            <thead>
                                <tr class="text-center bg-info text-white">
                                    <th class="font-weight-bold">No.</th>
                                    <th class="font-weight-bold">Uraian Temuan</th>
                                    <th class="font-weight-bold">Tanggal</th>
                                    <th class="font-weight-bold">Kategori</th>
                                    <th class="font-weight-bold">ISO</th>
                                    <th class="font-weight-bold">Klausul</th>
                                    <th class="font-weight-bold">Tindak Lanjut</th>
                                    <th class="font-weight-bold">Status</th>
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

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="<?= base_url('assets/js/audit/audit.js') ?>"></script>

<script type="text/javascript">
    $(document).ready(function() {
        getAudit({
            id: "#dt_audit-internal",
            url: "<?= base_url('Audit/getAudit'); ?>",
            jenis_audit: 1,
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
                    data: "uraian_temuan",
                },
                {
                    data: "tanggal",
                    className: "text-center",
                },
                {
                    data: "kategori",
                },
                {
                    data: "iso",
                    className: "text-center",
                },
                {
                    data: "klausul",
                    className: "text-center",
                },
                {
                    data: "tindak_lanjut",
                },
                {
                    data: "status",
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