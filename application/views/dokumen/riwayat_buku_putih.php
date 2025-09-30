<div class="container-fluid">
    <?php if ($this->session->flashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('error') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
        </div>
    <?php elseif ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('success') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>
        </div>
    <?php endif; ?>
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body border-bottom">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title mb-0 text-bold">Riwayat Buku Putih</h4>
                        <a href="#" data-toggle="modal" data-target="#uploadFile" class="btn btn-default"><i class="fa fa-plus mr-2"></i>Upload File</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dt_riwayat-buku-putih" class="datatable-enable table table-bordered table-striped table-hover js-basic-example dataTable w-100">
                            <thead>
                                <tr style="background-color: #98D4FF;">
                                    <th class="text-center font-weight-bold align-middle">No.</th>
                                    <th class="text-center font-weight-bold align-middle">Dokumen Yang Di Tambahkan</th>
                                    <th class="text-center font-weight-bold align-middle">Tahapan</th>
                                    <th class="text-center font-weight-bold align-middle">Tanggal Dokumen</th>
                                    <th class="text-center font-weight-bold align-middle">No. Dokumen</th>
                                    <th class="text-center font-weight-bold align-middle">Pihak</th>
                                    <th class="text-center font-weight-bold align-middle">File</th>
                                    <th class="text-center font-weight-bold align-middle">Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="uploadFile" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 700px">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h6 class="modal-title">
                    <span class="fw-bold"><b>Upload File </b></span>
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" action="<?php echo site_url('Dokumen/import_file_excel') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>File <small class="text-danger">*(xlsx, xls)</small></label>
                                <div class="browse-wrap">
                                    <input type="file" name="fileexcel" class="btn btn-secondary btn-block" title="Choose a file to upload" accept=".xlsx, .xls" required>
                                </div>
                            </div>
                            <!-- button download template -->
                            <a href="<?php echo site_url('Dokumen/export_file_excel') ?>" class="btn btn-success"><i class="fa fa-download"></i> Template</a>
                            <button type="button" class="btn btn-warning" id="buttonCatatan"><i class="fa fa-exclamation-triangle"></i> Catatan</button>
                        </div>
                        <div id="catatan" class="d-none p-4">
                            <h3 class="text-danger">
                                Penting!
                            </h3>
                            <div>
                                <p>
                                    Format kolom <strong>tanggal</strong> adalah <strong>Bulan/Hari/Tahun (mm/dd/yyyy)</strong>
                                </p>
                            </div>
                            <div>
                                <p class="mb-0">
                                    Nilai pada kolom <strong>Tahapan</strong> wajib berisi nomor <strong>id</strong> 1-5:
                                </p>
                                <ol>
                                    <li>Pra Perencanaan KPBU</li>
                                    <li>Perencanaan KPBU</li>
                                    <li>Penyiapan KPBU</li>
                                    <li>Pelaksanaan PPJT<span class="text-danger">*</span></li>
                                    <li>Operasional</li>
                                </ol>
                            </div>
                            <div>
                                <p class="mb-0">
                                    <span class="text-danger">*</span>Khusus jika kolom <strong>Tahapan</strong> berisi <strong>id <span class="text-success">4</span></strong>, maka nilai Kolom <strong>Sub Tahapan</strong> wajib berisi <strong>id</strong> 1-5:
                                </p>
                                <ol>
                                    <li>Penyusunan Desain</li>
                                    <li>Pembebasan Lahan</li>
                                    <li>Pelaksanaan Pembangunan</li>
                                    <li>Perolehan Pembiayaan Tambahan</li>
                                    <li>Perubahan Anggaran Dasar</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer no-bd">
                    <button type="submit" id="addRowButton" class="btn btn-primary">Upload</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="updateFile" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 700px">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h6 class="modal-title">
                    <span class="fw-bold"><b>Update File</b></span>
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" action="<?php echo site_url('Dokumen/update_file_kronologis') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <input type="hidden" name="id_kronologis" id="id_kronologis">
                                <label>File</label><small class="text-danger">*(pdf)</small>
                                <div class="browse-wrap">
                                    <input type="file" name="file" class="btn btn-secondary btn-block" title="Choose a file to upload" accept=".pdf" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer no-bd">
                    <button type="submit" id="addRowButton" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="showFile" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 700px">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h6 class="modal-title">
                    <span class="fw-bold"><b>Update File</b></span>
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" action="<?php echo site_url('Dokumen/update_file_kronologis') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <input type="hidden" name="id_kronologis" id="id_kronologis_show">
                                <label>File</label><small class="text-danger">*(pdf)</small>
                                <div class="browse-wrap">
                                    <input type="file" name="file" class="btn btn-secondary btn-block" title="Choose a file to upload" accept=".pdf" required>
                                </div>
                            </div>
                            <div class="form-group form-group-default">
                                <a href="" target="_blank" class="btn btn-primary" id="showFileButton"><i class="fa fa-print"></i> Lihat</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer no-bd">
                    <button type="submit" id="addRowButton" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="<?= base_url('assets/js/kronologis/riwayat_buku_putih.js') ?>"></script>
<script>
    $(document).ready(function() {
        getRiwayatBukuPutih({
            id: "#dt_riwayat-buku-putih",
            url: "<?php echo site_url('Dokumen/getRiwayatBukuPutih'); ?>"
        });
    });
</script>