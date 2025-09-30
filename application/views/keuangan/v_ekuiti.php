<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand font-weight-bold" href="javascript:void(0);">Keuangan</a>
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
                    <h4 class="card-title mb-0 font-weight-bold"><strong>Data Ekuiti</strong> </h4>
                    <?php if ($this->session->userdata('level_user') == 1) { ?>
                        <a href="<?php echo site_url('Keuangan/add_ekuiti') ?>" class="btn btn-default"><i class="fa fa-plus"></i>&nbsp; Tambah Data</a>
                    <?php } ?>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dt_ekuiti" class="table table-bordered table-striped table-hover js-basic-example dataTable w-100">
                            <thead>
                                <tr class="text-center bg-info text-white">
                                    <th class="align-middle font-weight-bold" rowspan="2">No.</th>
                                    <th class="align-middle font-weight-bold" rowspan="2">Tanggal</th>
                                    <th colspan="2" class="font-weight-bold">Total Setoral Modal</th>
                                    <th colspan="2" class="font-weight-bold">Total Setoran Sudah Terpakai </th>
                                    <th colspan="2" class="font-weight-bold">Total Setoran Belum Terpakai </th>
                                    <th rowspan="2" class="align-middle font-weight-bold">File</th>
                                    <?php if ($this->session->userdata('level_user') == 1) { ?>
                                        <th class="align-middle font-weight-bold" rowspan="2">Aksi</th>
                                    <?php } ?>
                                </tr>
                                <tr class="text-center bg-info text-white">
                                    <th class="text-center text-nowrap font-weight-bold">PMN</th>
                                    <th class="text-center text-nowrap font-weight-bold">Non PMN </th>
                                    <th class="text-center text-nowrap font-weight-bold">PMN</th>
                                    <th class="text-center text-nowrap font-weight-bold">Non PMN </b></th>
                                    <th class="text-center text-nowrap font-weight-bold">PMN</th>
                                    <th class="text-center text-nowrap font-weight-bold">Non PMN </b></th>
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
<script src="<?= base_url('assets/js/summary_keuangan/summary_keuangan.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        getSummaryKeuangan({
            id: "#dt_ekuiti",
            url: "<?= base_url('Keuangan/getEkuiti'); ?>",
            columnDefs: [{
                    targets: 0,
                    width: "1%",
                    className: "dt-nowrap",
                },
                {
                    orderable: false,
                    targets: [-1, -2, 2, 3, 6, 7],
                },
            ],
            columns: [{
                    data: "id",
                    className: "text-center",
                },
                {
                    data: "tanggal",
                    className: "text-center",
                },
                {
                    data: "total_pmn",
                    className: "text-center",
                },
                {
                    data: "total_non_pmn",
                    className: "text-center",
                },
                {
                    data: "terpakai_pmn",
                    className: "text-center",
                },
                {
                    data: "terpakai_non",
                    className: "text-center",
                },
                {
                    data: "sisa_pmn",
                    className: "text-center font-weight-bold",
                },
                {
                    data: "sisa_non_pmn",
                    className: "text-center font-weight-bold",
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