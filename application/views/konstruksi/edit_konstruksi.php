<div class="modal fade" id="edit_konstruksi" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h6 class="modal-title">
                    <span class="fw-bold"><b>&emsp; Edit Data Progres Konstruksi </b></span>
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" action="<?= $action_edit ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="modal-body" style="padding: 2.2rem">
                    <input type="hidden" name="id_progres_kons_edit">
                    <div class="row mb-3">
                        <label for="tgl_edit" class="col-sm-3 col-form-label">Tanggal</label>
                        <div class="col-sm-6">
                            <input type="date" id="tgl_edit" required="" name="tgl" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="seksi_edit" class="col-sm-3 col-form-label">Seksi</label>
                        <div class="col-sm-6">
                            <select class="form-control mb-6" name="seksi" id="seksi_edit" aria-label="Default select example">
                                <option selected>--- Pilih ---</option>
                                <?php
                                foreach ($seksi as $se) {
                                ?>
                                    <option value="<?= $se->id_seksi ?>"><?= $se->seksi ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="rencana_edit" class="col-sm-3 col-form-label">Rencana</label>
                        <div class="col-sm-6">
                            <input type="text" id="rencana_edit" required="" name="rencana" class="form-control">
                        </div>
                        <label class="col-sm-3 col-form-label"><b>%</b></label>
                    </div>
                    <div class="row mb-3">
                        <label for="realisasi_edit" class="col-sm-3 col-form-label">Realisasi</label>
                        <div class="col-sm-6">
                            <input type="text" id="realisasi_edit" required="" name="realisasi" class="form-control">
                        </div>
                        <label class="col-sm-3 col-form-label"><b>%</b></label>
                    </div>
                    <div class="row mb-3">
                        <label for="file_edit" class="col-sm-3 col-form-label">File Pendukung</label>
                        <div class="col-sm-6">
                            <input type="file" id="file_edit" name="file" accept=".pdf" class="form-control">
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