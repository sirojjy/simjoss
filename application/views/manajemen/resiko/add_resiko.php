<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-12 mx-auto">
            <h5 class="mb-10 text-uppercase font-weight-bold">Manajemen Resiko</h5>
            <hr />
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body">
                    <form class="form-horizontal" id="upload_form" action="<?= $action ?>" enctype="multipart/form-data" data-parsley-validate="true" method="post">
                        <div class="border p-4 rounded">
                            <div class="card-title d-flex align-items-center">
                                <h5 class="mb-0 text-primary font-weight-bold">Tambah Data Manajemen Resiko</h5>
                            </div>
                            <hr />

                            <div class="row mb-3">
                                <label for="periode" class="col-sm-3 col-form-label">Periode Triwulan</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick ms select2" required id="periode" name="periode" data-placeholder="Select">
                                        <option value="" selected disabled>-- Pilih --</option>
                                        <option value="1">TW I</option>
                                        <option value="2">TW II</option>
                                        <option value="3">TW III</option>
                                        <option value="4">TW IV</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="indikator" class="col-sm-3 col-form-label">Indikator</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick ms select2" required id="indikator" name="indikator" id="indikator" data-placeholder="Select">
                                        <option value="" selected disabled>-- Pilih --</option>
                                        <option value="1">Pencapaian Nilai Eksposur Risiko dibandingkan Dengan Target Risiko Residual</option>
                                        <option value="2">Pencapaian Output Pelaksanaan Perlakuan Risiko Dibandingkan Dengan Target Total Output Pelaksanaan Risiko</option>
                                        <option value="3">Realisasi Biaya Pelaksanaan Perlakuan Risiko Dibandingkan Dengan Anggaran</option>
                                        <option value="4">Ketepatan Penilaian Risiko Yang Meliputi Identifikasi Risiko, Kuantifikasi Risiko, Rencana Perlakuan Risiko, Dan Prioritisasi Risiko</option>
                                    </select>
                                    <input type="hidden" name="nama_indikator">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="bobot" class="col-sm-3 col-form-label">Bobot</label>
                                <div class="col-sm-9">
                                    <input type="text" required id="bobot" name="bobot" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="targe" class="col-sm-3 col-form-label">Target</label>
                                <div class="col-sm-9">
                                    <input type="text" required="" name="target" id="target" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="target" class="col-sm-3 col-form-label">Realisasi</label>
                                <div class="col-sm-9">
                                    <input type="text" required id="target" name="realisasi" id="realisasi" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="skala" class="col-sm-3 col-form-label">Skala</label>
                                <div class="col-sm-9">
                                    <input type="text" required id="skala" name="skala" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="hasil_penilaian" class="col-sm-3 col-form-label">Hasil Penilaian</label>
                                <div class="col-sm-9">
                                    <input type="text" required id="hasil_penilaian" name="hasil_penilaian" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="skor_penilaian" class="col-sm-3 col-form-label">Skor Penilaian</label>
                                <div class="col-sm-9">
                                    <input type="text" required id="skor_penilaian" name="skor_penilaian" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tanggal" class="col-sm-3 col-form-label">Tanggal Penilaian</label>
                                <div class="col-sm-9">
                                    <input type="date" required id="tanggal" name="tanggal" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary px-4">Simpan</button> &nbsp;
                                    <a href="<?= site_url('Manajemen/resiko') ?>"><button type="button" class="btn btn-danger px-4">Batal</button></a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type="text/javascript">
    $('#indikator').change(function() {
        var text = $(this).find('option:selected').text();
        $('input[name="nama_indikator"]').val(text);
    });

    $('#sub_indikator').change(function() {
        var text = $(this).find('option:selected').text();
        $('input[name="nama_sub_indikator"]').val(text);
    });
</script>