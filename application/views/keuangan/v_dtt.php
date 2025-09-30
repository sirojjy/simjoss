<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand font-weight-bold" href="javascript:void(0);">Keuangan</a>
</nav>
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
                    <h4 class="card-title mb-0 font-weight-bold"><strong>Data Progres Dana Talangan Tanah</strong> </h4>
                    <?php if ($this->session->userdata('level_user') == 1) { ?>
                        <a href="#" data-toggle="modal" data-target="#addData"><button type="button" class="btn btn-default"><i class="fa fa-plus"></i>&nbsp; Tambah Data</button></a>
                    <?php } ?>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dt_dtt" class="table table-bordered table-striped table-hover js-basic-example dataTable w-100">
                            <thead>
                                <tr class="text-center bg-info text-white">
                                    <th class="text-cemter">No.</th>
                                    <th class="text-cemter">Tanggal</th>
                                    <th class="text-cemter">Total DTT</th>
                                    <th class="text-cemter">Total Realisasi DTT</th>
                                    <th class="text-cemter">Persentase</th>
                                    <th class="text-cemter">Total Pengembalian LMAN</th>
                                    <th class="text-cemter">Persentase</th>
                                    <?php if ($this->session->userdata('level_user') == 1) { ?>
                                        <th class="text-cemter">Detail</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h6 class="modal-title">
                    <span class="fw-bold"><b>&emsp; Tambah Data Progres DTT </b></span>
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" action="<?php echo site_url('Keuangan/act_add_dtt') ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="modal-body" style="padding: 2.2rem">
                    <input type="hidden" name="id_progres_lahan_edit">
                    <div class="row mb-3">
                        <label for="inputEmailAddress2" class="col-sm-4 col-form-label">Tanggal</label>
                        <div class="col-sm-8">
                            <input type="date" required="" name="tgl" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputPhoneNo2" class="col-sm-4 col-form-label">Total DTT (Rp.)</label>
                        <div class="col-sm-8">
                            <input type="number" required="" name="total" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPhoneNo2" class="col-sm-4 col-form-label">Total Realisasi DTT (Rp.)</label>
                        <div class="col-sm-8">
                            <input type="number" required="" name="realisasi" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPhoneNo2" class="col-sm-4 col-form-label">Total Pengembalian LMAN (Rp.)</label>
                        <div class="col-sm-8">
                            <input type="number" required="" name="pengembalian" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Keterangan</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" name="keterangan" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputChoosePassword2" class="col-sm-4 col-form-label">File Pendukung</label>
                        <div class="col-sm-8">
                            <input type="file" name="file" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer no-bd">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="<?= base_url('assets/js/summary_keuangan/summary_keuangan.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#editLahan').on('show.bs.modal', function(e) {
            // alert("test");
            let id_progres_lahan = $(e.relatedTarget).data('id_progres_lahan');
            let rencana = $(e.relatedTarget).data('rencana');
            let realisasi = $(e.relatedTarget).data('realisasi');
            let kebutuhan_bidang = $(e.relatedTarget).data('kebutuhan_bidang');
            let tgl_progres = $(e.relatedTarget).data('tgl_progres');
            let seksi = $(e.relatedTarget).data('seksi');

            $(e.currentTarget).find('input[name="id_progres_lahan_edit"]').val(id_progres_lahan);
            $(e.currentTarget).find('input[name="rencana"]').val(rencana);
            $(e.currentTarget).find('input[name="realisasi"]').val(realisasi);
            $(e.currentTarget).find('input[name="kebutuhan_bidang"]').val(kebutuhan_bidang);
            $(e.currentTarget).find('input[name="tgl"]').val(tgl_progres);

            $(this).find("#seksi").val(seksi);

        });
    });
</script>