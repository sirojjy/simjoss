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
                    <h4 class="card-title mb-0 font-weight-bold"><strong>Data Pengembalian LMAN</strong> </h4>
                    <?php if ($this->session->userdata('level_user') == 1) { ?>
                        <a href="<?php echo site_url('Progres/add_pengembalian_lman') ?>" class="btn btn-default"><i class="fa fa-plus"></i>&nbsp; Tambah Data</a>
                    <?php } ?>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dt_pengembalian_lman" class="table table-bordered table-striped table-hover js-basic-example dataTable w-100">
                            <thead>
                                <tr class="text-center bg-info text-white">
                                    <th class="align-middle font-weight-bold">No.</th>
                                    <th class="align-middle font-weight-bold">Tanggal</th>
                                    <th class="align-middle font-weight-bold">Periode</th>
                                    <th class="align-middle font-weight-bold">Rekonsiliasi DTT </th>
                                    <th class="align-middle font-weight-bold">Rekonsiliasi CoF </th>
                                    <th class="align-middle font-weight-bold">Pengembalian DTT</th>
                                    <th class="align-middle font-weight-bold">Pengembalian CoF</th>
                                    <th class="align-middle font-weight-bold">Penerimaan Pengembalian DTT</th>
                                    <th class="align-middle font-weight-bold">Penerimaan Pengembalian CoF</th>
                                    <th class="align-middle font-weight-bold">File</th>
                                    <?php if ($this->session->userdata('level_user') == 1) { ?>
                                        <th class="align-middle font-weight-bold">Detail</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $rows = $this->db->query("select * from pengembalian_lman order by tanggal desc")->result();
                                foreach ($rows as $dt) {
                                    if ($dt->jenis == 1) {
                                        $jenis = 'Sindikasi Bank';
                                    } else {
                                        $jenis = 'SPP dari PPK';
                                    }

                                    if ($dt->dok_file == null) {
                                        $file = '-';
                                    } else {
                                        $lokasi = base_url("file_uploads/keuangan/" . $dt->dok_file);
                                        $file = '<a href="' . $lokasi . '" target="_blank" class="btn btn-primary btn-sm" ><i class="fa fa-print"></i></a></span>';
                                    }
                                ?>
                                    <tr>
                                        <td align="center"><?php echo $no++ ?>.</td>
                                        <td><?php echo date('d-m-Y', strtotime($dt->tanggal)); ?></td>
                                        <td align="center"><?php echo $dt->periode ?></td>
                                        <td align="center"><?php echo number_format($dt->rekon_dtt, 0, ',', '.') ?></td>
                                        <td align="center"><?php echo number_format($dt->rekon_cof, 0, ',', '.') ?></td>
                                        <td align="center"><?php echo number_format($dt->pengembalian_dtt, 0, ',', '.') ?></td>
                                        <td align="center"><?php echo number_format($dt->pengembalian_cof, 0, ',', '.') ?></td>
                                        <td align="center"><?php echo number_format($dt->penerimaan_kembali_dtt, 0, ',', '.') ?></td>
                                        <td align="center"><?php echo number_format($dt->penerimaan_kembali_cof, 0, ',', '.') ?></td>
                                        <td align="center"><b><?php echo $file ?></b></td>
                                        <?php if ($this->session->userdata('level_user') == 1) { ?>
                                            <td align="center">
                                                <a href="#" class="btn btn-success btn-sm2" data-toggle="modal" data-target="#editDtt" data-id_pengembalian_lman="<?php echo $dt->id_pengembalian_lman ?>" data-tanggal="<?php echo $dt->tanggal ?>" data-periode="<?php echo $dt->periode ?>" data-rekon_dtt="<?php echo $dt->rekon_dtt ?>" data-rekon_cof="<?php echo $dt->rekon_cof ?>" data-pengembalian_dtt="<?php echo $dt->pengembalian_dtt ?>" data-pengembalian_cof="<?php echo $dt->pengembalian_cof ?>" data-penerimaan_kembali_dtt="<?php echo $dt->penerimaan_kembali_dtt ?>" data-penerimaan_kembali_cof="<?php echo $dt->penerimaan_kembali_cof ?>" data-jenis="<?php echo $dt->jenis ?>"><i class="fa fa-edit"></i></a>

                                                <a href="<?php echo site_url('Progres/hapus_pengembalian_lman/' . $dt->id_pengembalian_lman) ?>" title="hapus" class="btn btn-danger btn-sm2" onClick="javasciprt: return confirm('Yakin menghapus data ?')">Hapus</a>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editPengembalianLman" tabindex="-1" role="dialog" aria-hidden="true">
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
            <form class="form-horizontal" action="<?php echo $action_edit ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="modal-body" style="padding: 2.2rem">
                    <input type="hidden" name="id_pengembalian_lman">
                    <!-- <div class="border p-4 rounded"> -->

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
                                <option value="">-- Sumber Pendanaan --</option>
                                <option value="1">Sindikasi Bank</option>
                                <option value="2">Pemerintah</option>
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
            id: "#dt_pengembalian_lman",
            url: "<?= base_url('Progres/getPenyerapanLMAN'); ?>",
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
                    data: "rekon_dtt",
                    className: "text-center",
                },
                {
                    data: "rekon_cof",
                    className: "text-center",
                },
                {
                    data: "pengembalian_dtt",
                    className: "text-center",
                },
                {
                    data: "pengembalian_cof",
                    className: "text-center",
                },
                {
                    data: "penerimaan_kembali_dtt",
                    className: "text-center",
                },
                {
                    data: "penerimaan_kembali_cof",
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