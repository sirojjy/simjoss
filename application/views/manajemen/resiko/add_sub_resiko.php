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
                                <h5 class="mb-0 text-primary font-weight-bold">Tambah Data Sub Manajemen Resiko</h5>
                            </div>
                            <hr />
                            <input type="hidden" name="id_manajemen_resiko" value="<?= $id_manajemen_resiko ?>">
                            <div class="row mb-3">
                                <label for="id_indikator" class="col-sm-3 col-form-label">Indikator Resiko</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick ms select2" required id="id_indikator" name="id_indikator" data-placeholder="Select">
                                        <!-- <option value="" selected disabled>-- Pilih --</option> -->
                                        <?php foreach ($resiko as $key => $value) : ?>
                                            <option data-id="<?= $value->id_manajemen_resiko ?>" value="<?= $value->id_manajemen_resiko ?>"><?= $value->nama_indikator ?> - Tahun <?= date('Y', strtotime($value->tanggal)) ?> - Triwulan : <?= $value->triwulan ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="periode" class="col-sm-3 col-form-label">Periode Triwulan</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick ms select2" required id="periode" name="periode" data-placeholder="Select">
                                        <option value="" selected disabled>-- Pilih --</option>
                                        <option value="1" <?= ($triwulan == 1) ? 'selected' : ''; ?>>TW I</option>
                                        <option value="2" <?= ($triwulan == 2) ? 'selected' : ''; ?>>TW II</option>
                                        <option value="3" <?= ($triwulan == 3) ? 'selected' : ''; ?>>TW III</option>
                                        <option value="4" <?= ($triwulan == 4) ? 'selected' : ''; ?>>TW IV</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3" id="element_sub_indikator">
                                <label for="id_sub_indikator" class="col-sm-3 col-form-label">Sub Indikator</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick ms select2" id="id_sub_indikator" name="id_sub_indikator" id="sub_indikator" data-placeholder="Select">
                                        <option value="">-- Pilih --</option>
                                        <option value="1">Ketepatan Penilaian Risiko</option>
                                        <option value="2">Ketepatan Kuantifikasi Risiko</option>
                                        <option value="3">Ketepatan Rencana Perlakuan Risiko</option>
                                        <option value="4">Ketepatan Prioritas Risiko</option>
                                    </select>
                                    <input type="hidden" name="nama_sub_indikator">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="bobot" class="col-sm-3 col-form-label">Bobot</label>
                                <div class="col-sm-9">
                                    <input type="text" required id="bobot" name="bobot" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="target" class="col-sm-3 col-form-label">Target</label>
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

        if ($(this).val() == 4) {
            $('#element_sub_indikator').removeClass('d-none');
        } else {
            $('#element_sub_indikator').addClass('d-none');
        }
    });

    $('#id_sub_indikator').change(function() {
        var text = $(this).find('option:selected').text();
        $('input[name="nama_sub_indikator"]').val(text);
    });
</script>