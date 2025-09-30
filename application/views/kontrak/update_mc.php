<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-xl-11 mx-auto">
            <h5 class="mb-10 text-uppercase"><b>Sertifikat Bulanan (MC)</b></h5>
            <hr />
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body">
                    <form class="form-horizontal" action="<?= $action ?>" enctype="multipart/form-data" data-parsley-validate="true" method="post">
                        <div class="border p-4 rounded">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-file me-1 font-22 text-primary"></i>
                                </div>
                                <h5 class="mb-0 text-primary "> <b>Edit Data Sertifikat Bulanan</b></h5>
                            </div>
                            <hr />
                            <input type="hidden" required="" name="id_mc" value="<?= $id_mc ?>" class="form-control">
                            <input type="hidden" required="" name="id_kontrak" value="<?php echo $id_kontrak ?>" class="form-control">
                            <div class="row mb-3">
                                <label for="mcno" class="col-sm-3 col-form-label">Sertifikat Nomor </label>
                                <div class="col-sm-9">
                                    <input type="number" required="" id="mcno" name="mc_no" value="<?= $nomor_mc ?>" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="bulan" class="col-sm-3 col-form-label">Bulan </label>
                                <div class="col-sm-4">
                                    <select class="form-control" id="bulan" name="bulan" required="" data-parsley-required="true">
                                        <option value="" disabled>--- Bulan ---</option>
                                        <option <?= ($bulan == 'Januari') ? 'selected' : ''; ?> value="Januari">Januari</option>
                                        <option <?= ($bulan == 'Februari') ? 'selected' : ''; ?> value="Februari">Februari</option>
                                        <option <?= ($bulan == 'Maret') ? 'selected' : ''; ?> value="Maret">Maret</option>
                                        <option <?= ($bulan == 'April') ? 'selected' : ''; ?> value="April">April</option>
                                        <option <?= ($bulan == 'Mei') ? 'selected' : ''; ?> value="Mei">Mei</option>
                                        <option <?= ($bulan == 'Juni') ? 'selected' : ''; ?> value="Juni">Juni</option>
                                        <option <?= ($bulan == 'Juli') ? 'selected' : ''; ?> value="Juli">Juli</option>
                                        <option <?= ($bulan == 'Agustus') ? 'selected' : ''; ?> value="Agustus">Agustus</option>
                                        <option <?= ($bulan == 'September') ? 'selected' : ''; ?> value="September">September</option>
                                        <option <?= ($bulan == 'Oktober') ? 'selected' : ''; ?> value="Oktober">Oktober</option>
                                        <option <?= ($bulan == 'November') ? 'selected' : ''; ?> value="November">November</option>
                                        <option <?= ($bulan == 'Desember') ? 'selected' : ''; ?> value="Desember">Desember</option>
                                    </select>
                                </div>
                                <div class="col-sm-5">
                                    <select class="form-control" id="tahun" name="tahun" required="" data-parsley-required="true">
                                        <option value="" disabled>--- Tahun ---</option>
                                        <?php
                                        $year = date('Y');
                                        for ($i = $year; $i >= 2016; $i--) {
                                            if ($tahun == $i) {
                                                echo '<option selected value="' . $i . '">' . $i . '</option>';
                                            } else {
                                                echo '<option value="' . $i . '">' . $i . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tanggal" class="col-sm-3 col-form-label">Tanggal Dokumen</label>
                                <div class="col-sm-9">
                                    <input type="date" required="" id="tanggal" value="<?= $tanggal ?>" name="tanggal" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3"><?= $keterangan ?></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="lokasi" class="col-sm-3 col-form-label">Lokasi Hardcopy</label>
                                <div class="col-sm-3">
                                    <select class="form-control show-tick ms select2" id="lokasi" name="lokasi">
                                        <option value="" disabled>-- Kantor --</option>
                                        <option <?= ($kantor == 'Jakarta') ? 'selected' : ''; ?> value="Jakarta">Jakarta</option>
                                        <option <?= ($kantor == 'Tongas') ? 'selected' : ''; ?> value="Tongas">Tongas</option>
                                        <option <?= ($kantor == 'Leces') ? 'selected' : ''; ?> value="Leces">Leces</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" name="rak" value="<?= $no_rak ?>" class="form-control" placeholder="Rak No.">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" name="box" value="<?= $no_box ?>" class="form-control" placeholder="Baris No.">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Current File</label>
                                <div class="col-sm-9">
                                    <div class="browse-wrap">
                                        <a href="<?= base_url("file_uploads/mc/$file") ?>" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-print"></i>Preview</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="file" class="col-sm-3 col-form-label">File MC (.pdf)<br><small style="color: red">(*Kosongkan jika tidak ingin update file)</small></label>
                                <div class="col-sm-9">
                                    <div class="browse-wrap">
                                        <input type="file" name="file" id="file" accept="application/pdf" class="btn btn-secondary btn-block" title="Choose a file to upload">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary px-4">Simpan</button>
                                    <a href="<?= site_url('Kontrak/sertifikat_bulanan/' . $id_kontrak) ?>"><button type="button" class="btn btn-danger px-4">Batal</button></a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>