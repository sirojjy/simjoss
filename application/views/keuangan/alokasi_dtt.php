<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand font-weight-bold" href="javascript:void(0);">Keuangan</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-align-justify"></i>
    </button>
</nav>
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12">
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $this->session->flashdata('error'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
            <?php elseif ($this->session->flashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo $this->session->flashdata('success'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
            <?php else: ?>
            <?php endif; ?>
            <div class="card">
                <div class="card-body border-bottom d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0 font-weight-bold">Data Alokasi Dana Tanah</h4>
                    <?php if ($this->session->userdata('level_user') == 1) { ?>
                        <a href="<?php echo site_url('Progres/add_dtt') ?>" class="btn btn-default"><i class="fa fa-plus"></i> Tambah Data</a>
                    <?php } ?>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dt_alokasi-dtt" class="table table-bordered table-striped table-hover js-basic-example dataTable w-100">
                            <thead>
                                <tr class="text-center bg-info text-white">
                                    <th class="font-weight-bold">No.</th>
                                    <th class="font-weight-bold">Tanggal</th>
                                    <th class="font-weight-bold">Periode</th>
                                    <th class="font-weight-bold">Kumulatif </th>
                                    <th class="font-weight-bold">Periodik </th>
                                    <th class="font-weight-bold d-none">Pembayaran Langsung </th>
                                    <th class="font-weight-bold">Dana Talangan </th>
                                    <th class="font-weight-bold">Persetujuan DTT </th>
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

<div class="modal fade" id="editDtt" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h6 class="modal-title">
                    <span class="fw-bold"><b>&emsp; Edit Data Alokasi Dana Tanah </b></span>
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" action="<?php echo $action_edit ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="modal-body" style="padding: 2.2rem">
                    <input type="hidden" name="id_dtt">
                    <!-- <div class="border p-4 rounded"> -->

                    <div class="row mb-3">
                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Tanggal</label>
                        <div class="col-sm-3">
                            <input type="date" required="" name="tanggal" id="tanggal" class="form-control">
                        </div>
                        <label class="col-sm-2 col-form-label" style="text-align:right;">Periode</label>
                        <div class="col-sm-4">
                            <input type="text" required="" name="periode" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Jenis</label>
                        <div class="col-sm-9">
                            <select class="form-control show-tick ms select2" name="jenis" id="jenis">
                                <option value="" disabled>-- Sumber Pendanaan --</option>
                                <option value="1">Sindikasi Bank</option>
                                <option value="2">Pemerintah</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Alokasi Dana Tanah Kumulatif</label>
                        <div class="col-sm-9">
                            <input type="text" required="" name="dana_akumulatif" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Alokasi Dana Tanah Periodik</label>
                        <div class="col-sm-9">
                            <input type="text" required="" name="dana_periodik" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Alokasi Pembayaran Langsung</label>
                        <div class="col-sm-9">
                            <input type="text" required="" name="dana_pl" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Alokasi Dana Pengembalian Kepada BUJT</label>
                        <div class="col-sm-9">
                            <input type="text" required="" name="dana_dtt" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3 d-none">
                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Persetujuan DTT Menteri Keuangan</label>
                        <div class="col-sm-9">
                            <input type="text" name="persetujuan_dtt" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">File Dokumen (.pdf)</label>
                        <div class="col-sm-9">
                            <div class="browse-wrap">
                                <input type="file" name="file" class="btn btn-secondary btn-block" accept="application/pdf" title="Choose a file to upload">
                            </div>
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
<script src="<?= base_url('assets/js/summary_keuangan/summary_keuangan.js') ?>"></script>

<script type="text/javascript">
    $(document).ready(function() {
        getSummaryKeuangan({
            id: "#dt_alokasi-dtt",
            url: "<?= base_url('Progres/alokasiDTT'); ?>",
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
                    data: "tanggal",
                    className: "text-center",
                },
                {
                    data: "periode",
                    className: "text-center",
                },
                {
                    data: "kumulatif",
                    className: "text-center",
                },
                {
                    data: "periodik",
                    className: "text-center font-weight-bold",
                },
                {
                    data: "pembayaran_langsung",
                    className: "text-center",
                },
                {
                    data: "dana_talangan",
                    className: "text-center",
                },
                // {
                //     data: "persetujuan_dtt",
                //     className: "text-center font-weight-bold",
                // },
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