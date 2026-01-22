<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-xl-11 mx-auto">
            <h5 class="mb-10 text-uppercase"><b>Alokasi Dana Tanah</b></h5>
            <hr />
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body">
                    <form class="form-horizontal" action="<?php echo $action_add ?>" enctype="multipart/form-data" data-parsley-validate="true" method="post">
                        <div class="border p-4 rounded">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-file me-1 font-22 text-primary"></i>
                                </div>
                                <h5 class="mb-0 text-primary "> <b>Tambah Data Alokasi Dana Tanah</b></h5>
                            </div>
                            <hr />
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Tanggal</label>
                                <div class="col-sm-9">
                                    <input type="date" required="" name="tanggal" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Periode</label>
                                <div class="col-sm-9">
                                    <input type="text" required="" name="periode" class="form-control" placeholder="Tahun">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Jenis</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick ms select2" name="jenis">
                                        <option value="" disabled>-- Sumber Pendanaan --</option>
                                        <option value="1">Sindikasi Bank</option>
                                        <option value="2">Pemerintah</option>
                                    </select>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Alokasi Dana Tanah Kumulatif</label>
                                <div class="col-sm-9">
                                    <input type="text" required="" name="dana_akumulatif" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Alokasi Dana Tanah Periodik</label>
                                <div class="col-sm-9">
                                    <input type="text" required="" name="dana_periodik" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Alokasi Pembayaran Langsung</label>
                                <div class="col-sm-9">
                                    <input type="text" required="" name="dana_pl" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Alokasi Dana Pengembalian Kepada BUJT</label>
                                <div class="col-sm-9">
                                    <input type="text" required="" name="dana_dtt" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3 d-none">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Persetujuan DTT Menteri Keuangan</label>
                                <div class="col-sm-9">
                                    <input type="text" name="persetujuan_dtt" class="form-control">
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

                            <br>
                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary px-4">Simpan</button> &nbsp;
                                    <a href="<?php echo site_url('Keuangan/alokasi_dtt') ?>"><button type="button" class="btn btn-danger px-4">Batal</button></a>
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