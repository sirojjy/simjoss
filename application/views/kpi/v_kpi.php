<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand font-weight-bold" href="javascript:void(0);">Monitoring KPI <?= date('Y') ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-align-justify"></i>
    </button>
</nav>
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col">
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $this->session->flashdata('error') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
            <?php elseif ($this->session->flashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo $this->session->flashdata('success') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
            <?php else: ?>
            <?php endif; ?>
            <div class="card">
                <div class="card-body border-bottom">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title font-weight-bold mb-0">Data KPI</h4>
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#modalAdd" class="btn btn-default">
                            <i class="fa fa-plus mr-2"></i> Tambah Data
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover dataTable w-100" id="dt_kpi">
                        <thead>
                            <tr style="background-color: #98D4FF">
                                <th class="text-center font-weight-bold align-middle" rowspan="3">No</th>
                                <th class="text-center font-weight-bold align-middle" rowspan="3">Ukuran Kinerja Utama (KPI)</th>
                                <th class="text-center font-weight-bold align-middle" rowspan="3">Satuan</th>
                                <th class="text-center font-weight-bold align-middle" rowspan="3">Polaritas</th>
                                <th class="text-center font-weight-bold align-middle" rowspan="3">Bobot</th>
                                <th class="text-center font-weight-bold align-middle" rowspan="3">Batasan Nilai</th>
                                <th class="text-center font-weight-bold align-middle" rowspan="3">Periode Pengukuran</th>
                                <th class="text-center font-weight-bold" colspan=" 8">Skor</th>
                                <th class="text-center font-weight-bold align-middle" rowspan="3">Keterangan</th>
                                <th class="text-center font-weight-bold align-middle" rowspan="3">Aksi</th>
                            </tr>
                            <tr style="background-color: #98D4FF">
                                <th class="text-center font-weight-bold" colspan="4">Rencana</th>
                                <th class="text-center font-weight-bold" colspan="4">Realisasi</th>
                            </tr>
                            <tr style="background-color: #98D4FF">
                                <th class="text-center font-weight-bold">S.D.1Q</th>
                                <th class="text-center font-weight-bold">S.D.2Q</th>
                                <th class="text-center font-weight-bold">S.D.3Q</th>
                                <th class="text-center font-weight-bold">S.D.1Y</th>
                                <th class="text-center font-weight-bold">S.D.1Q</th>
                                <th class="text-center font-weight-bold">S.D.2Q</th>
                                <th class="text-center font-weight-bold">S.D.3Q</th>
                                <th class="text-center font-weight-bold">S.D.1Y</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th class="font-weight-bold bg-cream" colspan="4">Total Bobot</th>
                                <th class="font-weight-bold bg-cream" id="total_bobot"></th>
                                <th class="font-weight-bold bg-cream" colspan="2"></th>
                                <th class="font-weight-bold bg-slate" id="total_rencana_q1"></th>
                                <th class="font-weight-bold bg-slate" id="total_rencana_q2"></th>
                                <th class="font-weight-bold bg-slate" id="total_rencana_q3"></th>
                                <th class="font-weight-bold bg-slate" id="total_rencana_1y"></th>
                                <th class="font-weight-bold bg-slate" id="total_realisasi_q1"></th>
                                <th class="font-weight-bold bg-slate" id="total_realisasi_q2"></th>
                                <th class="font-weight-bold bg-slate" id="total_realisasi_q3"></th>
                                <th class="font-weight-bold bg-slate" id="total_realisasi_1y"></th>
                                <th class="font-weight-bold bg-lightslate" colspan="2"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body border-bottom">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title font-weight-bold mb-0">Data Pendukung KPI</h4>
                    </div>
                </div>
                <div class="card-body text-center">
                    <a href="<?= base_url('assets/pendukung_kpi.png') ?>" target="_blank" class="btn btn-default">Lihat Data</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 700px">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h6 class="modal-title">
                    <span class="fw-bold">Tambah Data</span>
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" action="<?php echo site_url('Manajemen/insert_kpi') ?>" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label for="nama">Ukuran Kinerja Utama (KPI)</label>
                                <input type="text" name="nama" id="nama" class="form-control" required>
                            </div>
                            <div class="form-group form-group-default">
                                <label for="satuan">Satuan</label>
                                <input type="text" name="satuan" id="satuan" class="form-control" required>
                            </div>
                            <div class="form-group form-group-default">
                                <label for="polaritas">Polaritas</label>
                                <select name="polaritas" id="polaritas" required class="form-control">
                                    <option value="" selected disabled>-- Pilih --</option>
                                    <option value="1">Maximize</option>
                                    <option value="2">Minimize</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group form-group-default">
                                        <label for="bobot">Bobot</label>
                                        <input type="number" min="0" name="bobot" id="bobot" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group form-group-default">
                                        <label for="batas_nilai">Batas Nilai</label>
                                        <input type="number" min="0" name="batas_nilai" id="batas_nilai" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group form-group-default">
                                        <label for="tahun">Tahun</label>
                                        <select name="tahun" id="tahun" required class="form-control">
                                            <option value="" selected disabled>-- Pilih --</option>
                                            <?php for ($tahun = date('Y'); $tahun >= 2020; $tahun--) { ?>
                                                <option value="<?php echo $tahun; ?>"><?php echo $tahun; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-default">
                                <label for="periode">Periode Pengukuran</label>
                                <select name="periode" id="periode" required class="form-control">
                                    <option value="" selected disabled>-- Pilih --</option>
                                    <option value="triwulan">Triwulan</option>
                                    <option value="semester">Semester</option>
                                    <option value="tahun">Tahun</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group form-group-default">
                                        <label for="rencana_q1">Rencana 1Q</label>
                                        <input type="number" min="0" name="rencana_q1" id="rencana_q1" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group form-group-default">
                                        <label for="rencana_q2">Rencana 2Q</label>
                                        <input type="number" min="0" name="rencana_q2" id="rencana_q2" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group form-group-default">
                                        <label for="rencana_q3">Rencana 3Q</label>
                                        <input type="number" min="0" name="rencana_q3" id="rencana_q3" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group form-group-default">
                                        <label for="rencana_1y">Rencana 1Y</label>
                                        <input type="number" min="0" name="rencana_1y" id="rencana_1y" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group form-group-default">
                                        <label for="realisasi_q1">Realisasi 1Q</label>
                                        <input type="number" min="0" name="realisasi_q1" id="realisasi_q1" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group form-group-default">
                                        <label for="realisasi_q2">Realisasi 2Q</label>
                                        <input type="number" min="0" name="realisasi_q2" id="realisasi_q2" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group form-group-default">
                                        <label for="realisasi_q3">Realisasi 3Q</label>
                                        <input type="number" min="0" name="realisasi_q3" id="realisasi_q3" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group form-group-default">
                                        <label for="realisasi_1y">Realisasi 1Y</label>
                                        <input type="number" min="0" name="realisasi_1y" id="realisasi_1y" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-default">
                                <label for="keterangan">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" rows="4" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer no-bd">
                    <button type="submit" id="addRowButton" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 700px">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h6 class="modal-title">
                    <span class="fw-bold">Edit Data</span>
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" action="<?php echo site_url('manajemen/update_kpi') ?>" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" name="id">
                            <div class="form-group form-group-default">
                                <label for="edit_nama">Ukuran Kinerja Utama (KPI)</label>
                                <input type="text" name="nama" id="edit_nama" class="form-control" required>
                            </div>
                            <div class="form-group form-group-default">
                                <label for="edit_satuan">Satuan</label>
                                <input type="text" name="satuan" id="edit_satuan" class="form-control" required>
                            </div>
                            <div class="form-group form-group-default">
                                <label for="edit_polaritas">Polaritas</label>
                                <select name="polaritas" id="edit_polaritas" required class="form-control">
                                    <option value="" selected disabled>-- Pilih --</option>
                                    <option value="1">Maximize</option>
                                    <option value="2">Minimize</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group form-group-default">
                                        <label for="edit_bobot">Bobot</label>
                                        <input type="number" min="0" name="bobot" id="edit_bobot" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group form-group-default">
                                        <label for="edit_batas_nilai">Batas Nilai</label>
                                        <input type="number" min="0" name="batas_nilai" id="edit_batas_nilai" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group form-group-default">
                                        <label for="edit_tahun">Tahun</label>
                                        <select name="tahun" id="edit_tahun" required class="form-control">
                                            <option value="" selected disabled>-- Pilih --</option>
                                            <?php for ($tahun = date('Y'); $tahun >= 2020; $tahun--) { ?>
                                                <option value="<?php echo $tahun; ?>"><?php echo $tahun; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-default">
                                <label for="edit_periode">Periode Pengukuran</label>
                                <select name="periode" id="edit_periode" required class="form-control">
                                    <option value="" selected disabled>-- Pilih --</option>
                                    <option value="triwulan">Triwulan</option>
                                    <option value="semester">Semester</option>
                                    <option value="tahun">Tahun</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group form-group-default">
                                        <label for="edit_rencana_q1">Rencana 1Q</label>
                                        <input type="number" min="0" name="rencana_q1" id="edit_rencana_q1" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group form-group-default">
                                        <label for="edit_rencana_q2">Rencana 2Q</label>
                                        <input type="number" min="0" name="rencana_q2" id="edit_rencana_q2" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group form-group-default">
                                        <label for="edit_rencana_q3">Rencana 3Q</label>
                                        <input type="number" min="0" name="rencana_q3" id="edit_rencana_q3" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group form-group-default">
                                        <label for="edit_rencana_1y">Rencana 1Y</label>
                                        <input type="number" min="0" name="rencana_1y" id="edit_rencana_1y" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group form-group-default">
                                        <label for="edit_realisasi_q1">Realisasi 1Q</label>
                                        <input type="number" min="0" name="realisasi_q1" id="edit_realisasi_q1" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group form-group-default">
                                        <label for="edit_realisasi_q2">Realisasi 2Q</label>
                                        <input type="number" min="0" name="realisasi_q2" id="edit_realisasi_q2" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group form-group-default">
                                        <label for="edit_realisasi_q3">Realisasi 3Q</label>
                                        <input type="number" min="0" name="realisasi_q3" id="edit_realisasi_q3" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group form-group-default">
                                        <label for="edit_realisasi_1y">Realisasi 1Y</label>
                                        <input type="number" min="0" name="realisasi_1y" id="edit_realisasi_1y" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-default">
                                <label for="edit_keterangan">Keterangan</label>
                                <textarea name="keterangan" id="edit_keterangan" rows="4" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer no-bd">
                    <button type="submit" id="addRowButton" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/js/chart/dashboard12.js') ?>"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        let urlKpi = "<?= base_url('Manajemen/get_kpi') ?>";
        getDataKPI({
            url: urlKpi,
            processing: true,
            serverSide: true,
            searching: true,
            ordering: true,
            info: true,
            paging: true,
            lengthMenu: [
                [15, 25, 50, 100, -1],
                [15, 25, 50, 100, "All"]
            ],
            columnDefs: [{
                    targets: 0,
                    width: "1%",
                    className: "dt-nowrap"
                }, {
                    targets: -1,
                    width: "2%",
                    className: "dt-nowrap"
                }, {
                    "orderable": false,
                    "targets": [-2, -1, 7, 8, 9, 10, 11, 12, 13, 14]
                },
                {
                    "targets": [-1, 0, 2, 3, 4, 5, 7, 8, 9, 10, 11, 12, 13, 14],
                    "className": "text-center"
                }
            ],
            columns: [{
                    "data": "id"
                },
                {
                    "data": "nama"
                },
                {
                    "data": "satuan",
                },
                {
                    "data": "polaritas"
                },
                {
                    "data": "bobot"
                },
                {
                    "data": "batas_nilai"
                },
                {
                    "data": "periode"
                },
                {
                    "data": "rencana_q1"
                },
                {
                    "data": "rencana_q2"
                },
                {
                    "data": "rencana_q3"
                },
                {
                    "data": "rencana_1y"
                },
                {
                    "data": "realisasi_q1"
                },
                {
                    "data": "realisasi_q2"
                },
                {
                    "data": "realisasi_q3"
                },
                {
                    "data": "realisasi_1y"
                },
                {
                    "data": "keterangan"
                },
                {
                    "data": "aksi"
                }
            ],
        });
    });

    $(document).on('click', '.btn-edit', function() {
        let modalEdit = $('#modalEdit');
        let id = $(this).data('id');
        let nama = $(this).data('nama');
        let satuan = $(this).data('satuan');
        let polaritas = $(this).data('polaritas');
        let bobot = $(this).data('bobot');
        let batas_nilai = $(this).data('batas_nilai');
        let tahun = $(this).data('tahun');
        let periode = $(this).data('periode');
        let rencana_q1 = $(this).data('rencana_q1');
        let rencana_q2 = $(this).data('rencana_q2');
        let rencana_q3 = $(this).data('rencana_q3');
        let rencana_1y = $(this).data('rencana_1y');
        let realisasi_q1 = $(this).data('realisasi_q1');
        let realisasi_q2 = $(this).data('realisasi_q2');
        let realisasi_q3 = $(this).data('realisasi_q3');
        let realisasi_1y = $(this).data('realisasi_1y');
        let keterangan = $(this).data('keterangan');

        modalEdit.find('input[name="id"]').val(id);
        modalEdit.find('input[name="nama"]').val(nama);
        modalEdit.find('input[name="satuan"]').val(satuan);
        modalEdit.find('select[name="polaritas"]').val(polaritas).trigger('change');
        modalEdit.find('input[name="bobot"]').val(bobot);
        modalEdit.find('input[name="batas_nilai"]').val(batas_nilai);
        modalEdit.find('select[name="tahun"]').val(tahun).trigger('change');
        modalEdit.find('select[name="periode"]').val(periode).trigger('change');
        modalEdit.find('input[name="rencana_q1"]').val(rencana_q1);
        modalEdit.find('input[name="rencana_q2"]').val(rencana_q2);
        modalEdit.find('input[name="rencana_q3"]').val(rencana_q3);
        modalEdit.find('input[name="rencana_1y"]').val(rencana_1y);
        modalEdit.find('input[name="realisasi_q1"]').val(realisasi_q1);
        modalEdit.find('input[name="realisasi_q2"]').val(realisasi_q2);
        modalEdit.find('input[name="realisasi_q3"]').val(realisasi_q3);
        modalEdit.find('input[name="realisasi_1y"]').val(realisasi_1y);
        modalEdit.find('textarea[name="keterangan"]').val(keterangan);

        modalEdit.modal('show');
    });
</script>