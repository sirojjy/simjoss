<div class="modal fade" id="add_rta" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h6 class="modal-title">
                    <span class="fw-bold"><b>&emsp; Tambah Data Progres RTA </b></span>
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" action="<?= $action_add ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="modal-body" style="padding: 2.2rem">
                    <div class="row mb-3">
                        <label for="tgl_add" class="col-sm-3 col-form-label">Tanggal</label>
                        <div class="col-sm-6">
                            <input type="date" required="" id="tgl_add" name="tgl" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="seksi_add" class="col-sm-3 col-form-label">Seksi</label>
                        <div class="col-sm-6">
                            <select class="form-control mb-6" name="seksi" id="seksi_add">
                                <option selected disabled value="">--- Pilih ---</option>
                                <?php
                                foreach ($seksi as $se) {
                                ?>
                                    <option value="<?= $se->id_seksi ?>"><?= $se->seksi ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="rencana_add" class="col-sm-3 col-form-label">Rencana</label>
                        <div class="col-sm-6">
                            <input type="text" required="" id="rencana_add" name="rencana" class="form-control">
                        </div>
                        <label class="col-sm-3 col-form-label"><b>%</b></label>
                    </div>
                    <div class="row mb-3">
                        <label for="realisasi_add" class="col-sm-3 col-form-label">Realisasi</label>
                        <div class="col-sm-6">
                            <input type="text" required="" id="realisasi_add" name="realisasi" class="form-control">
                        </div>
                        <label class="col-sm-3 col-form-label"><b>%</b></label>
                    </div>
                    <div class="row mb-3">
                        <label for="file_add" class="col-sm-3 col-form-label">File Pendukung</label>
                        <div class="col-sm-6">
                            <input type="file" id="file_add" name="file" accept=".pdf" class="form-control">
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