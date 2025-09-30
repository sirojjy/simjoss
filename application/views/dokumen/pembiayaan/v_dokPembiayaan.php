<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand font-weight-bold" href="javascript:void(0);"><?= $title ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-align-justify"></i>
    </button>
</nav>
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12">
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('error'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
            <?php elseif ($this->session->flashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('success'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
            <?php else: ?>
            <?php endif; ?>
            <div class="card">
                <div class="card-body border-bottom d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0 font-weight-bold">Data <?= $title ?></h4>
                    <?php if ($this->session->userdata('level_user') == 1) { ?>
                        <a href="<?= site_url('Dokumen/add_pembiayaan') ?>"><button type="button" class="btn btn-default"><i class="fa fa-plus"></i>&nbsp; Tambah Data</button></a>
                    <?php } ?>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dt_pembiayaan" class="table table-bordered table-striped table-hover js-basic-example dataTable w-100">
                            <thead>
                                <tr class="text-center bg-info text-white">
                                    <th class="align-middle font-weight-bold">No.</th>
                                    <th class="align-middle font-weight-bold">Jenis Dokumen</th>
                                    <th class="align-middle font-weight-bold">Nomor</th>
                                    <th class="align-middle font-weight-bold">Tanggal</th>
                                    <th class="align-middle font-weight-bold">Perihal</th>
                                    <th class="align-middle font-weight-bold">File</th>
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
            id: "#dt_pembiayaan",
            url: "<?= base_url('Dokumen/getPembiayaan'); ?>",
            columnDefs: [{
                    targets: [0],
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
                    data: "jenis_dokumen",
                    className: "text-center",
                },
                {
                    data: "no_akta",
                    className: "text-center",
                },
                {
                    data: "tanggal_akta",
                    className: "text-center",
                },
                {
                    data: "perihal",
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