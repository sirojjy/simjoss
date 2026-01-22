<div class="modal fade show" id="upload_dok" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 40%">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h6 class="modal-title">
                    <span class="fw-bold"><b>Upload Dokumen Terkait</b></span>
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="upload_form" action="<?= $upload ?>" enctype="multipart/form-data" data-parsley-validate="true" method="post">
                    <div class="row mb-3">
                        <label for="inputPhoneNo2" class="col-sm-4 col-form-label">File Dokumen (.pdf)</label>
                        <div class="col-sm-8">
                            <div class="browse-wrap">
                                <input type="file" name="file" id="fileku" class="btn btn-secondary btn-block" title="Choose a file to upload">
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="id_kewajiban_kepatuhan" id="id_kewajiban_kepatuhan">
                    <input type="hidden" name="id_aspek" id="id_aspek">
                    <br>
                    <div class="row">
                        <label class="col-sm-4 col-form-label"></label>
                        <div class="col-sm-8">
                            <button type="submit" class="btn btn-primary px-4">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>