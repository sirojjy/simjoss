
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-xl-11 mx-auto">
            <h5 class="mb-10 text-uppercase"><b>Monitoring RKAP</b></h5>
            <hr/>
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body">
                    <form class="form-horizontal" id="upload_form" action="<?php echo $action ?>" enctype="multipart/form-data" data-parsley-validate="true" method="post">
                        <div class="border p-4 rounded">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-file me-1 font-22 text-primary"></i>
                                </div>
                                <h5 class="mb-0 text-primary "> <b>Edit Data Monitoring RKAP </b></h5>
                            </div>
                            <hr/>

                            <div class="row mb-3">
                                <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Jenis (Opex/Capex)</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick ms select2" name="jenis">
                                        <option value="">-- Pilih Jenis --</option>
                                        <option <?php if ($jenis == 'Opex') { echo 'selected'; }?> value="Opex">Opex</option>
                                        <option <?php if ($jenis == 'Capex') { echo 'selected'; }?> value="Capex">Capex</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Keterangan</label>
                                <div class="col-sm-9">
                                    <input type="text" required="" name="keterangan" class="form-control" value="<?php echo $keterangan ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmailAddress2" class="col-sm-3 col-form-label">TW</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick ms select2" name="tw">
                                        <option value="">-- Pilih TW --</option>
                                        <option <?php if ($tw == '1') { echo 'selected'; }?> value="1">I</option>
                                        <option <?php if ($tw == '2') { echo 'selected'; }?> value="2">II</option>
                                        <option <?php if ($tw == '3') { echo 'selected'; }?> value="3">III</option>
                                        <option <?php if ($tw == '4') { echo 'selected'; }?> value="4">IV</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Tahun</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick ms select2" name="tahun">
                                        <option value="">-- Pilih Tahun --</option>
                                        <option <?php if ($tahun == '2024') { echo 'selected'; }?> value="2024">2024</option>
                                        <option <?php if ($tahun == '2025') { echo 'selected'; }?> value="2025">2025</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Rencana</label>
                                <div class="col-sm-9">
                                    <input type="number" required="" name="rencana" class="form-control" value="<?php echo $rencana ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Realisasi</label>
                                <div class="col-sm-9">
                                    <input type="number" required="" name="realisasi" class="form-control" value="<?php echo $realisasi ?>">
                                </div>
                            </div>
                            <input type="hidden" name="id_monitoring_rkap" value="<?php echo $id_monitoring_rkap ?>">
                            <br>
                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary px-4">Simpan</button> &nbsp;
                                    <a href="<?php echo site_url('Monitoring/rkap') ?>"><button type="button" class="btn btn-danger px-4">Batal</button></a>
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


