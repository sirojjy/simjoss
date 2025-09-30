
<div class="modal fade show" id="update_status" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 40%">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h6 class="modal-title">
                    <span class="fw-bold"><b>Update Status Kepatuhan</b></span>
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="upload_form" action="<?php echo $update_status ?>" enctype="multipart/form-data" data-parsley-validate="true" method="post">
                    <div class="row mb-3">
                        <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                            <select required="" name="status" class="form-control">
                                <option>--- Pilih Status ---</option>
                                <option value="0">Tidak Ada</option>
                                <option value="1">Ada</option>
                            </select>
                        </div>
                    </div>

                    <input type="hidden" name="id_kewajiban_status" id="id_kewajiban_status">
                    <input type="hidden" name="id_aspek_status" id="id_aspek_status">
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