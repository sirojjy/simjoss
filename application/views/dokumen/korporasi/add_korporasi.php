<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand font-weight-bold" href="javascript:void(0);"><?= $title ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-align-justify"></i>
    </button>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-12 mx-auto">
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body border-bottom d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0 font-weight-bold"><?= $title ?></h4>
                </div>
                <form action="<?php echo $action ?>" enctype="multipart/form-data" data-parsley-validate="true" method="post">
                    <div class="card-body border-bottom">
                        <div class="row mb-3">
                            <label for="perihal" class="col-sm-3 col-form-label">Perihal</label>
                            <div class="col-sm-9">
                                <textarea name="perihal" rows="2" id="perihal" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="no_akta" class="col-sm-3 col-form-label">Nomor</label>
                            <div class="col-sm-9">
                                <input type="text" required="" id="no_akta" name="no_akta" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="jenis_dokumen" class="col-sm-3 col-form-label">Jenis Dokumen</label>
                            <div class="col-sm-9">
                                <input type="text" required="" id="jenis_dokumen" name="jenis_dokumen" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tanggal_akta" class="col-sm-3 col-form-label">Tanggal</label>
                            <div class="col-sm-9">
                                <input type="date" required="" id="tanggal_akta" name="tanggal_akta" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="keterangan" class="col-sm-3 col-form-label">Keterangan<br><small style="color: red">(*Kosongkan jika tidak ada)</small></label>
                            <div class="col-sm-9">
                                <textarea name="keterangan" id="keterangan" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="file" class="col-sm-3 col-form-label">File Dokumen (.pdf)</label>
                            <div class="col-sm-9">
                                <div class="browse-wrap">
                                    <input type="file" id="file" required name="file" class="btn btn-secondary btn-block" accept="application/pdf" title="Choose a file to upload">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary px-4">Simpan</button> &nbsp;
                        <a href="<?php echo site_url('Dokumen/korporasi') ?>"><button type="button" class="btn btn-danger px-4">Batal</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>