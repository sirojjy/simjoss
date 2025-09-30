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
                                <h5 class="mb-0 text-primary "> <b>Tambah Dokumen</b></h5>
                            </div>
                            <hr />
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Tahapan</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick ms select2" name="tahapan" required onchange="cari_nilai(this.value)" id="select-tahapan">
                                        <option value="" selected disabled>-- Pilih --</option>
                                        <option value="1">Pra Perencanaan KPBU</option>
                                        <option value="2">Perencanaan KPBU</option>
                                        <option value="3">Penyiapan KPBU</option>
                                        <option value="4">Pelaksanaan PPJT</option>
                                        <option value="5">Operasional</option>
                                        <!-- <option value="6">Pembentukan BUJT</option> -->
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3" id="div-sub_tahapan" style="display: none;">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Sub Tahapan</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick ms select2" name="sub_tahapan" required>
                                        <option value="" selected disabled>-- Pilih --</option>
                                        <option value="1">Perencanaan Teknik</option>
                                        <option value="2">Pengadaan Tanah</option>
                                        <option value="3">Konstruksi</option>
                                        <option value="4">Pendanaan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Nama Dokumen</label>
                                <div class="col-sm-9">
                                    <textarea name="jenis_dokumen" rows="2" class="form-control" required></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Nomor Dokumen</label>
                                <div class="col-sm-9">
                                    <input type="text" required="" name="nomor_dokumen" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Tanggal</label>
                                <div class="col-sm-9">
                                    <input type="date" required="" name="tanggal" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Para Pihak</label>
                                <div class="col-sm-9">
                                    <input type="text" required="" name="pihak" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Jumlah Halaman</label>
                                <div class="col-sm-9">
                                    <input type="number" name="jumlah_halaman" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">File Dokumen (.pdf)</label>
                                <div class="col-sm-9">
                                    <div class="browse-wrap">
                                        <input type="file" name="file" class="btn btn-secondary btn-block" accept="application/pdf" title="Choose a file to upload">
                                    </div>
                                </div>
                            </div>

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



<script>
    function cari_nilai(value) {
        if (value != null) {
            if (value == 3) {
                $("#div-sub_tahapan").show();
                $("#div-sub_tahapan_ppjt").hide();
            } else if (value == 4) {
                $("#div-sub_tahapan").hide();
                $("#div-sub_tahapan_ppjt").show();
            } else {
                $("#div-sub_tahapan").hide();
                $("#div-sub_tahapan_ppjt").hide();
            }
        } else {

        }
    }
</script>