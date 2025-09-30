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
                    <h4 class="card-title mb-0 font-weight-bold"><strong>Data Progres Kredit Investasi</strong> </h4>
                    <?php if ($this->session->userdata('level_user') == 1) { ?>
                        <a href="<?php echo site_url('Keuangan/add_ki') ?>" class="btn btn-default"><i class="fa fa-plus"></i>&nbsp; Tambah Data</a>
                    <?php } ?>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dt_kredit-investasi" class="table table-bordered table-striped table-hover js-basic-example dataTable w-100">
                            <thead>
                                <tr class="text-center bg-info text-white">
                                    <th rowspan="2" class="align-middle font-weight-bold">No.</th>
                                    <th rowspan="2" class="align-middle font-weight-bold">Tanggal</th>
                                    <th colspan="3" class="align-middle font-weight-bold">KI Pokok</th>
                                    <th colspan="3" class="align-middle font-weight-bold">KI IDC </th>
                                    <th rowspan="2" class="align-middle font-weight-bold">File</th>
                                    <?php if ($this->session->userdata('level_user') == 1) { ?>
                                        <th rowspan="2" class="align-middle font-weight-bold">Aksi</th>
                                    <?php } ?>
                                </tr>
                                <tr class="text-center bg-info text-white">
                                    <th class="text-nowrap font-weight-bold">Plafon</th>
                                    <th class="text-nowrap font-weight-bold">Penarikan </th>
                                    <th class="text-nowrap font-weight-bold">Sisa</th>
                                    <th class="text-nowrap font-weight-bold">Plafon</th>
                                    <th class="text-nowrap font-weight-bold">Penarikan </b></th>
                                    <th class="text-nowrap font-weight-bold">Sisa</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h6 class="modal-title">
                    <span class="fw-bold"><b>&emsp; Tambah Data Progres DTT </b></span>
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" action="<?php echo site_url('Keuangan/act_add_dtt') ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="modal-body" style="padding: 2.2rem">
                    <input type="hidden" name="id_progres_lahan_edit">
                    <div class="row mb-3">
                        <label for="inputEmailAddress2" class="col-sm-4 col-form-label">Tanggal</label>
                        <div class="col-sm-8">
                            <input type="date" required="" name="tgl" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputPhoneNo2" class="col-sm-4 col-form-label">Total DTT (Rp.)</label>
                        <div class="col-sm-8">
                            <input type="number" required="" name="total" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPhoneNo2" class="col-sm-4 col-form-label">Total Realisasi DTT (Rp.)</label>
                        <div class="col-sm-8">
                            <input type="number" required="" name="realisasi" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPhoneNo2" class="col-sm-4 col-form-label">Total Pengembalian LMAN (Rp.)</label>
                        <div class="col-sm-8">
                            <input type="number" required="" name="pengembalian" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Keterangan</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" name="keterangan" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputChoosePassword2" class="col-sm-4 col-form-label">File Pendukung</label>
                        <div class="col-sm-8">
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

<div class="modal fade" id="editKreditInvestasi" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h6 class="modal-title">
                    <span class="fw-bold"><b>&emsp; Edit Data Pengembalian LMAN </b></span>
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" action="<?= $action_edit ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="modal-body" style="padding: 2.2rem">
                    <input type="hidden" name="id_pengembalian_lman">
                    <div class="row mb-3">
                        <label for="inputPhoneNo2" class="col-sm-4 col-form-label">Tanggal</label>
                        <div class="col-sm-3">
                            <input type="date" required="" name="tanggal" id="tanggal" class="form-control">
                        </div>
                        <label class="col-sm-2 col-form-label" style="text-align:right;">Periode</label>
                        <div class="col-sm-3">
                            <input type="text" required="" name="periode" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputPhoneNo2" class="col-sm-4 col-form-label">Jenis</label>
                        <div class="col-sm-8">
                            <select class="form-control show-tick ms select2" name="jenis" id="jenis">
                                <option value="">-- Jenis Pengadaan --</option>
                                <option value="1">Sindikasi Bank</option>
                                <option value="2">SPP dari PPK</option>
                            </select>

                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPhoneNo2" class="col-sm-4 col-form-label">Rekonsiliasi DTT per [saat ini]</label>
                        <div class="col-sm-8">
                            <input type="text" required="" name="rekon_dtt" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPhoneNo2" class="col-sm-4 col-form-label">Rekonsiliasi CoF per [saat ini]</label>
                        <div class="col-sm-8">
                            <input type="text" required="" name="rekon_cof" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPhoneNo2" class="col-sm-4 col-form-label">Pengembalian DTT per [saat ini]</label>
                        <div class="col-sm-8">
                            <input type="text" required="" name="pengembalian_dtt" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPhoneNo2" class="col-sm-4 col-form-label">Pengembalian CoF per [saat ini]</label>
                        <div class="col-sm-8">
                            <input type="text" required="" name="pengembalian_cof" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPhoneNo2" class="col-sm-4 col-form-label">Penerimaan Pengembalian DTT per [saat ini]</label>
                        <div class="col-sm-8">
                            <input type="text" required="" name="penerimaan_kembali_dtt" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPhoneNo2" class="col-sm-4 col-form-label">Penerimaan Pengembalian CoF per [saat ini]</label>
                        <div class="col-sm-8">
                            <input type="text" required="" name="penerimaan_kembali_cof" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPhoneNo2" class="col-sm-4 col-form-label">File Dokumen (.pdf)</label>
                        <div class="col-sm-8">
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
            id: "#dt_kredit-investasi",
            url: "<?= base_url('Keuangan/getKreditInvestasi'); ?>",
            columnDefs: [{
                    targets: 0,
                    width: "1%",
                    className: "dt-nowrap",
                },
                {
                    orderable: false,
                    targets: [-1, -2, 2, 4, 5, 7],
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
                    data: "plafon_pokok",
                    className: "text-center",
                },
                {
                    data: "pokok_penarikan",
                    className: "text-center",
                },
                {
                    data: "sisa_pokok",
                    className: "text-center font-weight-bold",
                },
                {
                    data: "plafon_idc",
                    className: "text-center",
                },
                {
                    data: "idc_penarikan",
                    className: "text-center",
                },
                {
                    data: "sisa_idc",
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