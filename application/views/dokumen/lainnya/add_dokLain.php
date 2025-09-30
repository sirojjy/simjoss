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
                    <h4 class="card-title mb-0">Data <?= $title ?></h4>
                </div>
                <form action="<?php echo $action ?>" enctype="multipart/form-data" data-parsley-validate="true" method="post">
                    <div class="card-body border-bottom">
                        <div class="row mb-3">
                            <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Nama Dokumen</label>
                            <div class="col-sm-9">
                                <textarea name="nama" rows="2" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Nomor</label>
                            <div class="col-sm-9">
                                <input type="text" required="" name="nomor" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Tanggal</label>
                            <div class="col-sm-9">
                                <input type="date" required="" name="tanggal" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Keterangan</label>
                            <div class="col-sm-9">
                                <textarea name="keterangan" rows="3" class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPhoneNo2" class="col-sm-3 col-form-label">PIC</label>
                            <div class="col-sm-9">
                                <input type="text" name="pic" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Lokasi Hardcopy</label>
                            <div class="col-sm-3">
                                <select class="form-control show-tick ms select2" name="kantor" required>
                                    <option value="" selected disabled>-- Kantor --</option>
                                    <option value="Jakarta">Kantor Jakarta</option>
                                    <option value="Pusat">Kantor Pusat</option>
                                    <option value="Lahan">Kantor Lahan</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" name="rak" class="form-control" placeholder="Rak No." required>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" name="box" class="form-control" placeholder="Box No." required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPhoneNo2" class="col-sm-3 col-form-label">File Dokumen (.pdf)</label>
                            <div class="col-sm-9">
                                <div class="browse-wrap">
                                    <input type="file" name="file" required class="btn btn-secondary btn-block" accept="application/pdf" title="Choose a file to upload">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary px-4">Simpan</button> &nbsp;
                        <a href="<?php echo site_url('Dokumen/dok_lain') ?>"><button type="button" class="btn btn-danger px-4">Batal</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>