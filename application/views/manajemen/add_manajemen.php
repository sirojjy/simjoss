<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-xl-11 mx-auto">
            <h5 class="mb-10 text-uppercase"><b>Manajemen Resiko</b></h5>
            <hr />
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body">
                    <form class="form-horizontal" id="upload_form" action="<?php echo $action ?>" enctype="multipart/form-data" data-parsley-validate="true" method="post">
                        <div class="border p-4 rounded">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-file me-1 font-22 text-primary"></i>
                                </div>
                                <h5 class="mb-0 text-primary "> <b>Tambah Data Manajemen Resiko</b></h5>
                            </div>
                            <hr />

                            <div class="row mb-3">
                                <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Periode Triwulan</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick ms select2" required="" name="periode" data-placeholder="Select">
                                        <option value="">-- Pilih --</option>
                                        <option value="1">TW I</option>
                                        <option value="2">TW II</option>
                                        <option value="3">TW III</option>
                                        <option value="4">TW IV</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Indikator</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick ms select2" required="" name="indikator" id="indikator" data-placeholder="Select">
                                        <option value="">-- Pilih --</option>
                                        <option value="1">Pencapaian Nilai Eksposur Risiko dibandingkan dengan target Risiko Residual</option>
                                        <option value="2">Pencapaian output pelaksanaan perlakuan Risiko dibandingkan dengan target total output pelaksanaan risiko</option>
                                        <option value="3">Realisasi biaya pelaksanaan perlakuan Risiko dibandingkan dengan anggaran</option>
                                        <option value="4">Ketepatan penilaian Risiko</option>
                                    </select>
                                </div>
                            </div>


                            <div class="row mb-3" id="hidden_div">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Sub Indikator</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick ms select2" name="sub_indikator" id="sub_indikator" data-placeholder="Select">
                                        <option value="">-- Pilih --</option>
                                        <option value="1">Ketepatan penilaian Risiko</option>
                                        <option value="2">Ketepatan kuantifikasi Risiko</option>
                                        <option value="3">Ketepatan rencana perlakuan Risiko</option>
                                        <option value="4">Ketepatan prioritas Risiko</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Bobot</label>
                                <div class="col-sm-9">
                                    <input type="text" required="" name="bobot" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Target</label>
                                <div class="col-sm-9">
                                    <input type="text" required="" name="target" id="target" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Realisasi</label>
                                <div class="col-sm-9">
                                    <input type="text" required="" name="realisasi" id="realisasi" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Skala</label>
                                <div class="col-sm-9">
                                    <input type="text" required="" name="skala" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Hasil Penilaian</label>
                                <div class="col-sm-9">
                                    <input type="text" required="" name="hasil_penilaian" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Tanggal Penilaian</label>
                                <div class="col-sm-9">
                                    <input type="date" required="" name="tanggal" class="form-control">
                                </div>
                            </div>

                            <!-- <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">File Dokumen (.pdf)</label>
                                        <div class="col-sm-9">
                                            <div class="browse-wrap">
                                                <input type="file" name="file" id="fileku" class="btn btn-secondary btn-block" title="Choose a file to upload">
                                            </div>
                                        </div>
                                    </div> -->


                            <br>
                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary px-4">Simpan</button> &nbsp;
                                    <a href="<?php echo site_url('Manajemen/resiko') ?>"><button type="button" class="btn btn-danger px-4">Batal</button></a>
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

<script type="text/javascript">
    $('#hidden_div').hide();
    $('#indikator').change(function() {
        if ($('#indikator').val() == '4') {
            $('#hidden_div').show();
        } else {
            $('#hidden_div').hide();
        }
    });

    function showMetode(element) {
        if (element.value == '4') {
            document.getElementById('hidden_div').style.display = "block";
        } else {
            document.getElementById('hidden_div').style.display = "none";
        }
    }
</script>