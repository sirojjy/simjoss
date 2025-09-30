<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-xl-11 mx-auto">
            <h5 class="mb-10 text-uppercase"><b>Dokumen Kronologis</b></h5>
            <hr />
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body">
                    <form class="form-horizontal" action="<?php echo $action ?>" enctype="multipart/form-data" data-parsley-validate="true" method="post">
                        <div class="border p-4 rounded">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-file me-1 font-22 text-primary"></i>
                                </div>
                                <h5 class="mb-0 text-primary "> <b>Update Dokumen</b></h5>
                            </div>
                            <hr />
                            <input type="hidden" value="<?php echo $id_kronologis ?>" name="id_kronologis" class="form-control">
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Tahapan</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick ms select2" name="tahapan" required="">
                                        <option value="">-- Pilih --</option>
                                        <option <?php if ($id_tahapan == '1') {
                                                    echo 'selected';
                                                } ?> value="1">Pra Perencanaan KPBU</option>
                                        <option <?php if ($id_tahapan == '2') {
                                                    echo 'selected';
                                                } ?> value="2">Perencanaan KPBU</option>
                                        <option <?php if ($id_tahapan == '6') {
                                                    echo 'selected';
                                                } ?> value="6">Pembentukan BUJT</option>
                                        <option <?php if ($id_tahapan == '4') {
                                                    echo 'selected';
                                                } ?> value="4">Pelaksanaan PPJT</option>
                                        <option <?php if ($id_tahapan == '5') {
                                                    echo 'selected';
                                                } ?> value="5">Operasional</option>
                                    </select>
                                </div>
                            </div>
                            <?php if ($sub_tahapan != null) { ?>
                                <div class="row mb-3" id="div-sub_tahapan_ppjt">
                                    <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Sub Tahapan</label>
                                    <div class="col-sm-9">
                                        <select class="form-control show-tick ms select2" name="sub_tahapan">
                                            <option value="">-- Pilih --</option>
                                            <!-- <option <?php if ($sub_tahapan == '1') {
                                                                echo 'selected';
                                                            } ?> value="1">Pengadaan BUJT</option> -->
                                            <option <?php if ($sub_tahapan == '2') {
                                                        echo 'selected';
                                                    } ?> value="2">Penyusunan Desain</option>
                                            <option <?php if ($sub_tahapan == '3') {
                                                        echo 'selected';
                                                    } ?> value="3">Pembebasan Lahan</option>
                                            <option <?php if ($sub_tahapan == '4') {
                                                        echo 'selected';
                                                    } ?> value="4">Pelaksanaan Pembangunan</option>
                                            <!-- <option <?php if ($sub_tahapan == '5') {
                                                                echo 'selected';
                                                            } ?> value="5">Fungsional/Operasional</option> -->
                                            <!-- <option <?php if ($sub_tahapan == '6') {
                                                                echo 'selected';
                                                            } ?> value="6">Penyusunan Desain</option> -->
                                            <option <?php if ($sub_tahapan == '9') {
                                                        echo 'selected';
                                                    } ?> value="9">Perolehan Pembiayaan Tambahan</option>
                                            <option <?php if ($sub_tahapan == '10') {
                                                        echo 'selected';
                                                    } ?> value="10">Perubahan Anggaran Dasar</option>
                                        </select>
                                    </div>
                                </div>
                            <?php } else {
                            } ?>
                            <div class="row mb-3">
                                <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Nama Dokumen</label>
                                <div class="col-sm-9">
                                    <textarea name="jenis_dokumen" rows="2" class="form-control"><?php echo $jenis_dokumen ?></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Nomor Dokumen</label>
                                <div class="col-sm-9">
                                    <input type="text" required="" name="nomor_dokumen" value="<?php echo $nomor_dokumen ?>" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Tanggal</label>
                                <div class="col-sm-9">
                                    <input type="date" required="" name="tanggal" value="<?php echo $tanggal ?>" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Para Pihak</label>
                                <div class="col-sm-9">
                                    <input type="text" required="" name="pihak" value="<?php echo $pihak ?>" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Jumlah Halaman</label>
                                <div class="col-sm-9">
                                    <input type="number" name="jumlah_halaman" value="<?php echo $jumlah_halaman ?>" class="form-control">
                                </div>
                            </div>
                            <?php if ($file != null) { ?>
                                <div class="row mb-3">
                                    <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Currect File</label>
                                    <div class="col-sm-9">
                                        <div class="browse-wrap">

                                            <a href="<?php echo base_url("file_uploads/dokumen/kronologis/$file") ?>" target="_blank" class="btn btn-success btn-sm ">&emsp;<i class="fa fa-print"></i>&nbsp; Preview &emsp;</a>

                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">File Dokumen (.pdf) <br><small style="color: red">(*Kosongkan jika tidak ingin update file)</small></label>
                                <div class="col-sm-9">
                                    <div class="browse-wrap">
                                        <input type="file" name="file" class="btn btn-secondary btn-block" accept="application/pdf" title="Choose a file to upload">
                                    </div>
                                </div>
                            </div>


                            <br>
                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary px-4">Simpan</button> &nbsp;
                                    <a href="<?php echo site_url('Dokumen/kronologis') ?>"><button type="button" class="btn btn-danger px-4">Batal</button></a>
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