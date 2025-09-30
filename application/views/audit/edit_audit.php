<?php 
    if($jenis_audit==1){
        $audit = "Internal";
    }else{
        $audit = "Eksternal";
    } 
?>
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-xl-11 mx-auto">
            <h5 class="mb-10 text-uppercase"><b>Audit <?php echo $audit ?></b></h5>
            <hr/>
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body">
                    <form class="form-horizontal" id="upload_form" action="<?php echo $action ?>" enctype="multipart/form-data" data-parsley-validate="true" method="post">
                        <div class="border p-4 rounded">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-file me-1 font-22 text-primary"></i>
                                </div>
                                <h5 class="mb-0 text-primary "> <b>Edit Data Audit <?php echo $audit ?></b></h5>
                            </div>
                            <hr/>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Tahun</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick ms select2" name="tahun">
                                        <option value="">-- Pilih Tahun --</option>
                                        <?php 
                                            $year = date('Y');
                                            for($x=2024;$x<=$year;$x++){ 
                                                if($tahun==$x){
                                                    $select = 'selected';
                                                }else{
                                                    $select='';
                                                }
                                        ?>
                                            <option <?php echo $select ?> value="<?php echo $x ?>"><?php echo $x ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                
                                <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Tanggal Audit</label>
                                <div class="col-sm-9">
                                    <input type="date" required="" name="tanggal" id="tanggal" class="form-control" value="<?php echo $tanggal ?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Triwulan (TW)</label>
                                <div class="col-sm-9">
                                    <input type="text" required="" name="tw" id="tw" class="form-control" value="<?php echo $tw ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                
                                <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Uraian Temuan</label>
                                <div class="col-sm-9">
                                    <textarea name="uraian_temuan" rows="3" class="form-control"><?php echo $uraian_temuan ?></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Kategori</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick ms select2" name="kategori">
                                        <option value="">-- Pilih Kategori --</option>
                                        <option <?php if ($kategori == 3) { echo 'selected'; }?> value="3">Mayor</option>
                                        <option <?php if ($kategori == 2) { echo 'selected'; }?> value="2">Minor</option>
                                        <option <?php if ($kategori == 1) { echo 'selected'; }?> value="1">Observasi</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">ISO</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick ms select2" name="iso">
                                        <option value="">-- Pilih ISO --</option>
                                        <option <?php if ($iso == '9001') { echo 'selected'; }?> value="9001">9001:2015</option>
                                        <option <?php if ($iso == '14001') { echo 'selected'; }?> value="14001">14001:2015</option>
                                        <option <?php if ($iso == '45001') { echo 'selected'; }?> value="45001">45001:2018</option>
                                        <option <?php if ($iso == '37001') { echo 'selected'; }?> value="37001">37001:2016</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Klausul</label>
                                <div class="col-sm-9">
                                    <input type="text" required="" name="klausul" id="klausul" class="form-control" value="<?php echo $klausul ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Tindak Lanjut</label>
                                <div class="col-sm-9">
                                    <textarea name="tindak_lanjut" rows="3" class="form-control"><?php echo $tindak_lanjut ?></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick ms select2" name="status">
                                        <option value="">-- Pilih Status --</option>
                                        <option <?php if ($status == 1) { echo 'selected'; }?> value="1">Open</option>
                                        <option <?php if ($status == 2) { echo 'selected'; }?> value="2">Close</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">File Dokumen (.pdf)</label>
                                <div class="col-sm-9">
                                    <div class="browse-wrap">
                                        <input type="file" name="file" id="file" class="btn btn-secondary btn-block" title="Choose a file to upload">
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="id_audit" value="<?php echo $id_audit ?>">
                            <input type="hidden" name="jenis_audit" value="<?php echo $jenis_audit ?>">

                            <br>
                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit"  class="btn btn-primary px-4">Simpan</button> &nbsp;
                                    <a href="<?php echo site_url('Audit/internal') ?>"><button type="button" class="btn btn-danger px-4">Batal</button></a>
                                </div>
                            </div>

                            <br><br>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script>

</script>

