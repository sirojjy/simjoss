<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand font-weight-bold" href="javascript:void(0);">Konstruksi</a>
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
                    <h4 class="card-title mb-0 font-weight-bold">Data Progres RTA</h4>
                    <?php if ($this->session->userdata('level_user') == 1) { ?>
                        <a href="#" data-toggle="modal" data-target="#add_rta"><button type="button" class="btn btn-default"><i class="fa fa-plus mr-2"></i>Tambah Data</button></a>
                    <?php } ?>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dt_rta" class="table table-bordered table-striped table-hover js-basic-example dataTable w-100">
                            <thead>
                                <tr class="text-center bg-theme text-white">
                                    <th class="font-weight-bold">No.</th>
                                    <th class="font-weight-bold">Tanggal</th>
                                    <th class="font-weight-bold">Seksi</th>
                                    <th class="font-weight-bold">Rencana</th>
                                    <th class="font-weight-bold">Realisasi</th>
                                    <th class="font-weight-bold">Deviasi</th>
                                    <th class="font-weight-bold">File RTA</th>
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

<?php $this->load->view('rta/add_rta.php') ?>
<?php $this->load->view('rta/edit_rta.php') ?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="<?= base_url('assets/js/progres_pekerjaan/progres_pekerjaan.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        getProgresPekerjaan({
            id: "#dt_rta",
            url: "<?= base_url('Progres/getProgresRTA'); ?>",
            columnDefs: [{
                    targets: 0,
                    width: "1%",
                    className: "dt-nowrap",
                },
                {
                    orderable: false,
                    targets: [-1, -2, -3],
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
                    data: "rencana",
                    className: "text-center",
                },
                {
                    data: "realisasi",
                    className: "text-center",
                },
                {
                    data: "deviasi",
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