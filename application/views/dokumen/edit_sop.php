<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-xl-11 mx-auto">
            <h5 class="mb-10 text-uppercase"><b>Dokumen SOP</b></h5>
            <hr />
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body">
                    <form class="form-horizontal" action="<?php echo $action ?>" enctype="multipart/form-data" data-parsley-validate="true" method="post">
                        <div class="border p-4 rounded">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-file me-1 font-22 text-primary"></i>
                                </div>
                                <h5 class="mb-0 text-primary "> <b>Edit Data SOP</b></h5>
                            </div>
                            <hr />
                            <input type="hidden" value="<?php echo $id_dokumen ?>" name="id_dokumen" class="form-control">
                            <div class="row mb-3">
                                <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Nama Dokumen</label>
                                <div class="col-sm-9">
                                    <textarea name="nama" rows="2" class="form-control"><?php echo $nama ?></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Nomor Dokumen</label>
                                <div class="col-sm-9">
                                    <input type="text" required="" value="<?php echo $nomor ?>" name="nomor" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Nomor Revisi<br><small style="color: red">(*Kosongkan jika bukan dokumen revisi)</small></label>
                                <div class="col-sm-9">
                                    <input type="text" name="nomor_revisi" value="<?php echo $nomor_revisi ?>" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Tanggal </label>
                                <div class="col-sm-9">
                                    <input type="date" required="" value="<?php echo $tanggal ?>" name="tanggal" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Divisi</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick ms select2" name="divisi">
                                        <?php
                                        if ($divisi == 'Admin Proyek') {
                                            $adm_proyek = 'selected';
                                            $peng_proyek = '';
                                            $rtd = '';
                                            $al = '';
                                            $pp = '';
                                            $ka = '';
                                            $su = '';
                                        } elseif ($divisi == 'Pengendalian Proyek') {
                                            $adm_proyek = '';
                                            $peng_proyek = 'selected';
                                            $rtd = '';
                                            $al = '';
                                            $pp = '';
                                            $ka = '';
                                            $su = '';
                                        } elseif ($divisi == 'Rekayasa Teknik & Desain') {
                                            $adm_proyek = '';
                                            $peng_proyek = '';
                                            $rtd = 'selected';
                                            $al = '';
                                            $pp = '';
                                            $ka = '';
                                            $su = '';
                                        } elseif ($divisi == 'Admintek & Lahan') {
                                            $adm_proyek = '';
                                            $peng_proyek = '';
                                            $rtd = '';
                                            $al = 'selected';
                                            $pp = '';
                                            $ka = '';
                                            $su = '';
                                        } elseif ($divisi == 'Pengendalian Pengoprasian') {
                                            $adm_proyek = '';
                                            $peng_proyek = '';
                                            $rtd = '';
                                            $al = '';
                                            $pp = 'selected';
                                            $ka = '';
                                            $su = '';
                                        } elseif ($divisi == 'Keuangan & Akuntansi') {
                                            $adm_proyek = '';
                                            $peng_proyek = '';
                                            $rtd = '';
                                            $al = '';
                                            $pp = '';
                                            $ka = 'selected';
                                            $su = '';
                                        } else {
                                            $adm_proyek = '';
                                            $peng_proyek = '';
                                            $rtd = '';
                                            $al = '';
                                            $pp = '';
                                            $ka = '';
                                            $su = 'selected';
                                        }
                                        ?>
                                        <option value="">-- Pilih Divisi --</option>
                                        <option value="Admin Proyek" <?php echo $adm_proyek ?>>Admin Proyek</option>
                                        <option value="Pengendalian Proyek" <?php echo $peng_proyek ?>>Pengendalian Proyek</option>
                                        <option value="Rekayasa Teknik & Desain" <?php echo $rtd ?>>Rekayasa Teknik & Desain</option>
                                        <option value="Admintek & Lahan" <?php echo $al ?>>Admintek & Lahan</option>
                                        <option value="Pengendalian Pengoprasian" <?php echo $pp ?>>Pengendalian Pengoprasian</option>
                                        <option value="Keuangan & Akuntansi" <?php echo $ka ?>>Keuangan & Akuntansi</option>
                                        <option value="SDM & Umum" <?php echo $su ?>>SDM & Umum</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Keterangan<br><small style="color: red">(*Kosongkan jika tidak ada)</small></label>
                                <div class="col-sm-9">
                                    <textarea name="keterangan" rows="3" class="form-control"><?php echo $keterangan ?></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">PIC</label>
                                <div class="col-sm-9">
                                    <input type="text" name="pic" value="<?php echo $pic ?>" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Lokasi Hardcopy</label>
                                <div class="col-sm-3">
                                    <select class="form-control show-tick ms select2" name="kantor">
                                        <option value="">-- Kantor --</option>
                                        <option <?php if ($kantor == 'Jakarta') {
                                                    echo 'selected';
                                                } ?> value="Jakarta">Kantor Jakarta</option>
                                        <option <?php if ($kantor == 'Pusat') {
                                                    echo 'selected';
                                                } ?> value="Pusat">Kantor Pusat</option>
                                        <option <?php if ($kantor == 'Lahan') {
                                                    echo 'selected';
                                                } ?> value="Lahan">Kantor Lahan</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" value="<?php echo $no_rak ?>" name="rak" class="form-control" placeholder="Rak No.">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" value="<?php echo $no_box ?>" name="box" class="form-control" placeholder="Box No.">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Keterkaitan dengan ISO 9001?</label>
                                <div class="col-sm-2" style="text-align: center;">
                                    <input class="form-check-input" type="radio" name="iso_9001" id="iso_9001" value="1" <?php if ($iso_9001 == '1') {
                                                                                                                                echo 'checked';
                                                                                                                            } ?>>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Ya
                                    </label>
                                </div>
                                <div class="col-sm-2">
                                    <input class="form-check-input" type="radio" name="iso_9001" id="iso_9001" value="0" <?php if ($iso_9001 == '0') {
                                                                                                                                echo 'checked';
                                                                                                                            } ?>>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Tidak
                                    </label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Keterkaitan dengan ISO 14001?</label>
                                <div class="col-sm-2" style="text-align: center;">
                                    <input class="form-check-input" type="radio" name="iso_14001" id="iso_14001" value="1" <?php if ($iso_14001 == '1') {
                                                                                                                                echo 'checked';
                                                                                                                            } ?>>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Ya
                                    </label>
                                </div>
                                <div class="col-sm-2">
                                    <input class="form-check-input" type="radio" name="iso_14001" id="iso_14001" value="0" <?php if ($iso_14001 == '0') {
                                                                                                                                echo 'checked';
                                                                                                                            } ?>>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Tidak
                                    </label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Keterkaitan dengan ISO 45001?</label>
                                <div class="col-sm-2" style="text-align: center;">
                                    <input class="form-check-input" type="radio" name="iso_45001" id="iso_45001" value="1" <?php if ($iso_45001 == '1') {
                                                                                                                                echo 'checked';
                                                                                                                            } ?>>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Ya
                                    </label>
                                </div>
                                <div class="col-sm-2">
                                    <input class="form-check-input" type="radio" name="iso_45001" id="iso_45001" value="0" <?php if ($iso_45001 == '0') {
                                                                                                                                echo 'checked';
                                                                                                                            } ?>>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Tidak
                                    </label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Keterkaitan dengan ISO 37001?</label>
                                <div class="col-sm-2" style="text-align: center;">
                                    <input class="form-check-input" type="radio" name="iso_37001" id="iso_37001" value="1" <?php if ($iso_37001 == '1') {
                                                                                                                                echo 'checked';
                                                                                                                            } ?>>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Ya
                                    </label>
                                </div>
                                <div class="col-sm-2">
                                    <input class="form-check-input" type="radio" name="iso_37001" id="iso_37001" value="0" <?php if ($iso_37001 == '0') {
                                                                                                                                echo 'checked';
                                                                                                                            } ?>>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Tidak
                                    </label>
                                </div>
                            </div>
                            <div class="row mb-3 <?= ($file == null) ?  'd-none' : '' ?>">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Currect File</label>
                                <div class="col-sm-9">
                                    <div class="browse-wrap">
                                        <a href="<?php echo base_url("file_uploads/dokumen/sop/$file") ?>" target="_blank" class="btn btn-success btn-sm ">&emsp;<i class="fa fa-print"></i>&nbsp; Preview &emsp;</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">File Dokumen (.pdf)<br><small style="color: red">(*Kosongkan jika tidak ingin update file)</small></label>
                                <div class="col-sm-9">
                                    <div class="browse-wrap">
                                        <input type="file" name="file" id="fileku" class="btn btn-secondary btn-block" accept="application/pdf" title="Choose a file to upload">
                                    </div>
                                </div>
                            </div>

                            <br>
                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary px-4">Simpan</button> &nbsp;
                                    <a href="<?php echo site_url('Dokumen/sop') ?>"><button type="button" class="btn btn-danger px-4">Batal</button></a>
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