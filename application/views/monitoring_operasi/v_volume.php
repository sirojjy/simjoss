<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12">
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
            <?php endif; ?>
            <div class="card">
                <div class="card-body border-bottom d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 font-bold">Data Perbandingan Volume Lalu Lintas</h4>
                    <?php if ($this->session->userdata('level_user') == 1) { ?>
                        <div class="d-flex">
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#modalAdd" class="btn btn-default">
                                <i class="fa fa-plus mr-2"></i> Tambah Data
                            </a>
                        </div>
                    <?php } ?>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dt_volume" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr class="text-center" style="background-color: #98D4FF">
                                    <th>No.</th>
                                    <th>Jenis</th>
                                    <th>Tanggal</th>
                                    <th>Volume</th>
                                    <th>Created</th>
                                    <?php if ($this->session->userdata('level_user') == 1) { ?>
                                        <th>Aksi</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
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
            <form class="form-horizontal" action="<?php echo site_url('Monitoring_operasi/insert_volume') ?>" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label for="jenis">Jenis</label>
                                <select name="jenis" id="jenis" required class="form-control">
                                    <option value="" selected disabled>-- Pilih --</option>
                                    <option value="ppjt">PPJT</option>
                                    <option value="rkap">RKAP</option>
                                    <option value="prognosa">Prognosa</option>
                                    <option value="realisasi">Realisasi</option>
                                </select>
                            </div>
                            <div class="form-group form-group-default">
                                <label for="tanggal">Tanggal</label>
                                <input type="month" name="tanggal" id="tanggal" class="form-control" required>
                            </div>
                            <div class="form-group form-group-default">
                                <label for="nilai">Volume</label>
                                <input type="number" min="0" name="nilai" id="nilai" class="form-control" required>
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
            <form class="form-horizontal" action="<?php echo site_url('Monitoring_operasi/update_volume') ?>" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" name="id">
                            <div class="form-group form-group-default">
                                <label for="edit_jenis">Jenis</label>
                                <select name="jenis" id="edit_jenis" required class="form-control">
                                    <option value="" selected disabled>-- Pilih --</option>
                                    <option value="ppjt">PPJT</option>
                                    <option value="rkap">RKAP</option>
                                    <option value="prognosa">Prognosa</option>
                                    <option value="realisasi">Realisasi</option>
                                </select>
                            </div>
                            <div class="form-group form-group-default">
                                <label for="edit_tanggal">Tanggal</label>
                                <input type="month" name="tanggal" id="edit_tanggal" class="form-control" required>
                            </div>
                            <div class="form-group form-group-default">
                                <label for="edit_nilai">Volume</label>
                                <input type="number" min="0" name="nilai" id="edit_nilai" class="form-control" required>
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

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type="text/javascript">
    const lang = {
        "sProcessing": "Sedang memproses...",
        "sLengthMenu": "Tampilkan _MENU_ entri",
        "sZeroRecords": "Tidak ditemukan data yang sesuai",
        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
        "sInfoPostFix": "",
        "sSearch": "Cari:",
        "sUrl": "",
        "oPaginate": {
            "sFirst": "<<",
            "sPrevious": "<",
            "sNext": ">",
            "sLast": ">>"
        }
    };

    $(document).ready(function() {
        $('#dt_volume').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [4, 'desc'],
            "columnDefs": [{
                targets: 0,
                width: "1%",
                className: "dt-nowrap"
            }, {
                targets: -1,
                width: "2%",
                className: "dt-nowrap"
            }, {
                "orderable": false,
                "targets": [-1]
            }],
            "ajax": {
                "url": "<?= base_url('monitoring_operasi/get_volume') ?>",
                "type": "GET"
            },
            "columns": [{
                    "data": "id"
                },
                {
                    "data": "jenis"
                },
                {
                    "data": "tanggal"
                },
                {
                    "data": "nilai"
                },
                {
                    "data": "created_at",
                    "visible": false,
                    "searchable": false
                },
                {
                    "data": "aksi"
                }
            ],
            "language": lang
        });

        $(document).on('click', '.btn-edit', function() {
            let modalEdit = $('#modalEdit');
            let id = $(this).data('id');
            let jenis = $(this).data('jenis');
            let tanggal = $(this).data('tanggal');
            let nilai = $(this).data('nilai');
            let bulanTahun = tanggal.substring(0, 7);

            modalEdit.find('input[name="id"]').val(id);
            modalEdit.find('select[name="jenis"]').val(jenis).trigger('change');
            modalEdit.find('input[name="tanggal"]').val(bulanTahun);
            modalEdit.find('input[name="nilai"]').val(nilai);

            modalEdit.modal('show');
        });
    });
</script>