<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="javascript:void(0);"><b>Edit Early Warning System </b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-align-justify"></i>
    </button>
</nav>
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body border-bottom d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0 font-weight-bold">Edit Data Early Warning System Dashboard</h4>
                </div>
                <form action="<?= site_url('Issue/update_issue') ?>" method="post" enctype="multipart/form-data">
                    <div class="card-body border-bottom">
                        <div class="row">
                            <input type="hidden" name="id_issue" value="<?= $issue->id_issue ?>" class="form-control">

                            <div class="col-12 col-md-4">
                                <div class="form-group form-group-default">
                                    <label>Jenis Isu</label>
                                    <select class="form-control show-tick ms select2" required name="jenis" data-placeholder="Select">
                                        <option value="" selected disabled>-- Pilih --</option>
                                        <option value="1" <?= $issue->jenis_progres == 1 ? "selected" : ''; ?>>Dashboard 1</option>
                                        <option value="2" <?= $issue->jenis_progres == 2 ? "selected" : ''; ?>>Dashboard 2</option>
                                        <option value="3" <?= $issue->jenis_progres == 3 ? "selected" : ''; ?>>Dashboard 3</option>
                                        <option value="4" <?= $issue->jenis_progres == 4 ? "selected" : ''; ?>>Dashboard 4</option>
                                        <option value="5" <?= $issue->jenis_progres == 5 ? "selected" : ''; ?>>Dashboard 5</option>
                                        <option value="6" <?= $issue->jenis_progres == 6 ? "selected" : ''; ?>>Dashboard 6</option>
                                        <option value="7" <?= $issue->jenis_progres == 7 ? "selected" : ''; ?>>Dashboard 7</option>
                                        <option value="8" <?= $issue->jenis_progres == 8 ? "selected" : ''; ?>>Dashboard 8</option>
                                        <option value="9" <?= $issue->jenis_progres == 9 ? "selected" : ''; ?>>Dashboard 9</option>
                                        <option value="10" <?= $issue->jenis_progres == 10 ? "selected" : ''; ?>>Dashboard 10</option>
                                        <option value="11" <?= $issue->jenis_progres == 11 ? "selected" : ''; ?>>Dashboard 11</option>
                                        <option value="12" <?= $issue->jenis_progres == 12 ? "selected" : ''; ?>>Dashboard 12</option>
                                        <option value="13" <?= $issue->jenis_progres == 13 ? "selected" : ''; ?>>Dashboard 13</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group form-group-default">
                                    <label>Tanggal</label>
                                    <input type="date" name="tanggal" value="<?= $issue->tanggal ?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group form-group-default">
                                    <label>Status</label>
                                    <select class="form-control show-tick ms select2" required="" name="status" data-placeholder="Select">
                                        <option value="" selected disabled>-- Pilih --</option>
                                        <option value="1" <?= $issue->status == "1" ? "selected" : ''; ?>>Open</option>
                                        <option value="2" <?= $issue->status == "2" ? "selected" : ''; ?>>Close</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>Issue</label>
                                    <textarea class="form-control textarea-editor" rows="3" name="issue"><?= $issue->issue ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>Rekomendasi</label>
                                    <textarea class="form-control textarea-editor" rows="3" name="rekomendasi"><?= $issue->rekomendasi ?></textarea>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group form-group-default">
                                    <label>Indikasi</label>
                                    <select class="form-control show-tick ms select2" required="" name="indikasi" data-placeholder="Select">
                                        <option value="">-- Pilih --</option>
                                        <option value="Polaritas Naik" <?= $issue->indikasi == "Polaritas Naik" ? "selected" : ''; ?>>Polaritas Naik terhadap target</option>
                                        <option value="Polaritas Turun" <?= $issue->indikasi == "Polaritas Turun" ? "selected" : ''; ?>>Polaritas Turun terhadap target</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group form-group-default">
                                    <label>File Pendukung</label> <small style="color: red"> (*Kosongkan jika tidak ada)</small>
                                    <div class="browse-wrap">
                                        <input type="file" name="file" class="btn btn-secondary btn-block" accept="application/pdf" title="Choose a file to upload">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body border-bottom d-flex justify-content-end align-items-center">
                        <button type="submit" class="btn btn-success mr-2">Update</button>
                        <a href="<?= base_url('issue') ?>" class="btn btn-default">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>