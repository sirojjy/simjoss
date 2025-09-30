<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="javascript:void(0);"><b>Early Warning System </b></a>
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
            <?php endif; ?>
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo $this->session->flashdata('success'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
            <?php endif; ?>
            <div class="card">
                <div class="card-body border-bottom d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0 font-weight-bold">Data Early Warning System Dashboard</h4>
                    <?php if ($this->session->userdata('level_user') == 1) { ?>
                        <a href="#" data-toggle="modal" data-target="#addData" class="btn btn-default"><i class="fa fa-plus"></i>&nbsp; Tambah Data</a>
                    <?php } ?>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr style="text-align: center; background-color: #98D4FF">
                                    <th>No.</th>
                                    <th>Tanggal</th>
                                    <th>Issue</th>
                                    <th>Rekomendasi</th>
                                    <th>Status</th>
                                    <th>File</th>
                                    <th>Jenis Dashboard</th>
                                    <?php if ($this->session->userdata('level_user') == 1) { ?>
                                        <th>Aksi</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($row as $dt) {

                                    if ($dt->status == 1) {
                                        $status = '<span class="badge badge-danger">Open</span>';
                                    } else {
                                        $status = '<span class="badge badge-success">Close</span>';
                                    }

                                ?>
                                    <tr>
                                        <td class="text-center"><?= $no++ ?>.</td>
                                        <td class="text-center text-nowrap"><?= date('d-m-Y', strtotime($dt->tanggal)); ?></td>
                                        <td><?= $dt->issue ?></td>
                                        <td><?= $dt->rekomendasi ?></td>
                                        <td class="text-center"><?= $status ?></td>
                                        <td class="text-center">
                                            <?php if ($dt->file != null || $dt->file != '') { ?>
                                                <a href="<?= base_url("file_uploads/issue/" . $dt->file) ?>" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-print"></i></a></span>
                                            <?php } else { ?>
                                                -
                                            <?php } ?>
                                        </td>
                                        <td class="text-center"><b>Dashboard <?= $dt->jenis_progres ?></b></td>
                                        <?php if ($this->session->userdata('level_user') == 1) { ?>
                                            <td class="d-flex justify-content-center">
                                                <a href="<?= site_url('Issue/edit_issue/' . $dt->id_issue) ?>" title="edit" class="btn btn-success btn-sm mr-2">Edit</a>
                                                <!-- <a href="#" onclick="edit_issue(<?= $dt->id_issue ?>)" title="edit" class="btn btn-success btn-sm mr-2">Edit</a> -->
                                                <a href="<?= site_url('Issue/hapus_issue/' . $dt->id_issue) ?>" title="hapus" class="btn btn-danger btn-sm" onClick="javasciprt: return confirm('Yakin menghapus data ?')">Hapus</a>
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

<div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 700px">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h6 class="modal-title">
                    <span class="fw-bold"><b>Tambah Issue </b></span>
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" action="<?= site_url('Issue/act_addIssue') ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="modal-body" style="padding: 2.2rem">

                    <div class="row">
                        <input type="hidden" name="id_isu" class="form-control">

                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Jenis Isu</label>
                                <select class="form-control show-tick ms select2" required name="jenis" data-placeholder="Select">
                                    <option value="">-- Pilih --</option>
                                    <option value="1">Dashboard 1</option>
                                    <option value="2">Dashboard 2</option>
                                    <option value="3">Dashboard 3</option>
                                    <option value="4">Dashboard 4</option>
                                    <option value="5">Dashboard 5</option>
                                    <option value="6">Dashboard 6</option>
                                    <option value="7">Dashboard 7</option>
                                    <option value="8">Dashboard 8</option>
                                    <option value="9">Dashboard 9</option>
                                    <option value="10">Dashboard 10</option>
                                    <option value="11">Dashboard 11</option>
                                    <option value="12">Dashboard 12</option>
                                    <option value="13">Dashboard 13</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Tanggal</label>
                                <input type="date" name="tanggal" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Status</label>
                                <select class="form-control show-tick ms select2" required name="status" data-placeholder="Select">
                                    <option value="">-- Pilih --</option>
                                    <option value="1">Open</option>
                                    <option value="2">Close</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Issue</label>
                                <textarea class="form-control textarea-editor" rows="3" name="issue"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Indikasi</label>
                                <select class="form-control show-tick ms select2" required name="indikasi" data-placeholder="Select">
                                    <option value="">-- Pilih --</option>
                                    <option value="Polaritas Naik">Polaritas Naik terhadap target</option>
                                    <option value="Polaritas Turun">Polaritas Turun terhadap target</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Rekomendasi</label>
                                <textarea class="form-control textarea-editor" rows="3" name="rekomendasi"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>File Pendukung</label> <small style="color: red"> (*Kosongkan jika tidak ada)</small>
                                <div class="browse-wrap">
                                    <input type="file" name="file" class="btn btn-secondary btn-block" title="Choose a file to upload">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer no-bd">
                    <button type="submit" id="addRowButton" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>