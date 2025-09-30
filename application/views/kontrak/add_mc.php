<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-xl-11 mx-auto">
            <h5 class="mb-10 text-uppercase"><b>Sertifikat Bulanan (MC)</b></h5>
            <hr />
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body">
                    <form class="form-horizontal" action="<?php echo $action ?>" enctype="multipart/form-data" data-parsley-validate="true" method="post">
                        <div class="border p-4 rounded">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-file me-1 font-22 text-primary"></i>
                                </div>
                                <h5 class="mb-0 text-primary "> <b>Tambah Data Sertifikat Bulanan</b></h5>
                            </div>
                            <hr />
                            <input type="hidden" required="" name="id_kontrak" value="<?php echo $id_kontrak ?>" class="form-control">
                            <div class="row mb-3">
                                <label for="mcno" class="col-sm-3 col-form-label">Sertifikat Nomor </label>
                                <div class="col-sm-9">
                                    <input type="number" required="" id="mcno" name="mc_no" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="bulan" class="col-sm-3 col-form-label">Bulan </label>
                                <div class="col-sm-4">
                                    <select class="form-control" id="bulan" name="bulan" data-parsley-required="true">
                                        <option value="" selected disabled>--- Bulan ---</option>
                                        <option value="Januari">Januari</option>
                                        <option value="Februari">Februari</option>
                                        <option value="Maret">Maret</option>
                                        <option value="April">April</option>
                                        <option value="Mei">Mei</option>
                                        <option value="Juni">Juni</option>
                                        <option value="Juli">Juli</option>
                                        <option value="Agustus">Agustus</option>
                                        <option value="September">September</option>
                                        <option value="Oktober">Oktober</option>
                                        <option value="November">November</option>
                                        <option value="Desember">Desember</option>

                                    </select>
                                </div>
                                <div class="col-sm-5">
                                    <select class="form-control" id="tahun" name="tahun" data-parsley-required="true">
                                        <option value="" selected disabled>--- Tahun ---</option>
                                        <?php
                                        $year = date('Y');
                                        for ($i = $year; $i >= 2016; $i--) {
                                            echo '<option value="' . $i . '">' . $i . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tanggal" class="col-sm-3 col-form-label">Tanggal Dokumen</label>
                                <div class="col-sm-9">
                                    <input type="date" required="" id="tanggal" name="tanggal" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="lokasi" class="col-sm-3 col-form-label">Lokasi Hardcopy</label>
                                <div class="col-sm-3">
                                    <select class="form-control show-tick ms select2" id="lokasi" name="lokasi">
                                        <option value="" selected disabled>-- Kantor --</option>
                                        <option value="Jakarta">Jakarta</option>
                                        <option value="Tongas">Tongas</option>
                                        <option value="Leces">Leces</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" name="rak" class="form-control" placeholder="Rak No.">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" name="box" class="form-control" placeholder="Baris No.">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="file" class="col-sm-3 col-form-label">File Sertifikat Bulanan/MC Reguler(.pdf)</label>
                                <div class="col-sm-9">
                                    <div class="browse-wrap">
                                        <input type="file" name="file" id="file" accept="application/pdf" class="btn btn-secondary btn-block" title="Choose a file to upload">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary px-4">Simpan</button> &nbsp;
                                    <a href="<?php echo site_url('Kontrak/sertifikat_bulanan/' . $id_kontrak) ?>"><button type="button" class="btn btn-danger px-4">Batal</button></a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>