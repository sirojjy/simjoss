<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand font-weight-bold" href="javascript:void(0);"><?= $title ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-align-justify"></i>
    </button>
</nav>
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-12 mx-auto">
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body border-bottom">
                    <h4 class="card-title mb-0"><?= $title ?></h4>
                </div>
                <form action="<?= $action ?>" enctype="multipart/form-data" data-parsley-validate="true" method="post">
                    <div class="card-body border-bottom">
                        <input type="hidden" value="<?= $data->id_dokumen ?>" name="id_dokumen" class="form-control">
                        <div class="row mb-3">
                            <label for="nama" class="col-sm-3 col-form-label">Nama Dokumen</label>
                            <div class="col-sm-9">
                                <textarea name="nama" rows="2" id="nama" class="form-control"><?= $data->nama ?></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nomor" class="col-sm-3 col-form-label">Nomor</label>
                            <div class="col-sm-9">
                                <input type="text" required="" id="nomor" value="<?= $data->nomor ?>" name="nomor" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tanggal" class="col-sm-3 col-form-label">Tanggal </label>
                            <div class="col-sm-9">
                                <input type="date" required="" id="tanggal" value="<?= $data->tanggal ?>" name="tanggal" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="keterangan" class="col-sm-3 col-form-label">Keterangan<br><small style="color: red">(*Kosongkan jika tidak ada)</small></label>
                            <div class="col-sm-9">
                                <textarea name="keterangan" rows="3" id="keterangan" class="form-control"><?= $data->keterangan ?></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="pic" class="col-sm-3 col-form-label">PIC</label>
                            <div class="col-sm-9">
                                <input type="text" name="pic" id="pic" value="<?= $data->pic ?>" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="kantor" class="col-sm-3 col-form-label">Lokasi Hardcopy</label>
                            <div class="col-sm-3">
                                <select class="form-control show-tick ms select2" id="kantor" name="kantor">
                                    <option value="">-- Kantor --</option>
                                    <option <?php if ($data->kantor == 'Jakarta') {
                                                echo 'selected';
                                            } ?> value="Jakarta">Kantor Jakarta</option>
                                    <option <?php if ($data->kantor == 'Pusat') {
                                                echo 'selected';
                                            } ?> value="Pusat">Kantor Pusat</option>
                                    <option <?php if ($data->kantor == 'Lahan') {
                                                echo 'selected';
                                            } ?> value="Lahan">Kantor Lahan</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" value="<?= $data->no_rak ?>" name="rak" class="form-control" placeholder="Rak No.">
                            </div>
                            <div class="col-sm-3">
                                <input type="text" value="<?= $data->no_box ?>" name="box" class="form-control" placeholder="Box No.">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Currect File</label>
                            <div class="col-sm-9">
                                <div class="browse-wrap">
                                    <a href="<?= base_url("file_uploads/dokumen/dok_lain/" . $data->dok_file) ?>" target="_blank" class="btn btn-success btn-sm "><i class="fa fa-print mr-2"></i>Preview</a>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="file" class="col-sm-3 col-form-label">File Dokumen (.pdf)<br><small style="color: red">(*Kosongkan jika tidak ingin update file)</small></label>
                            <div class="col-sm-9">
                                <div class="browse-wrap">
                                    <input type="file" name="file" id="file" class="btn btn-secondary btn-block" accept="application/pdf" title="Choose a file to upload">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary px-4">Simpan</button> &nbsp;
                        <a href="<?= site_url('Dokumen/dok_lain') ?>"><button type="button" class="btn btn-danger px-4">Batal</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>