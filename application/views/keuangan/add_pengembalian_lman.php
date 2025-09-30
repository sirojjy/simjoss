
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-xl-11 mx-auto">
            <h5 class="mb-10 text-uppercase"><b>Pengembalian LMAN</b></h5>
            <hr/>
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body">
                    <form class="form-horizontal" action="<?php echo $action_add ?>" enctype="multipart/form-data" data-parsley-validate="true" method="post">
                        <div class="border p-4 rounded">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-file me-1 font-22 text-primary"></i>
                                </div>
                                <h5 class="mb-0 text-primary "> <b>Tambah Data Pengembalian LMAN</b></h5>
                            </div>
                            <hr/>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-4 col-form-label">Tanggal</label>
                                <div class="col-sm-8">
                                    <input type="date" required="" name="tanggal" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-4 col-form-label">Periode</label>
                                <div class="col-sm-8">
                                    <input type="text" required="" name="periode" class="form-control" placeholder="Tahun">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-4 col-form-label">Jenis</label>
                                <div class="col-sm-8">
                                    <select class="form-control show-tick ms select2" name="jenis">
                                        <option value="">-- Jenis Pengadaan --</option>
                                        <option value="1">Sindikasi Bank</option>
                                        <option value="2">SPP dari PPK</option>
                                    </select>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-4 col-form-label">Rekonsiliasi DTT per [saat ini]</label>
                                <div class="col-sm-8">
                                    <input type="text" required="" name="rekon_dtt" class="form-control" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-4 col-form-label">Rekonsiliasi CoF per [saat ini]</label>
                                <div class="col-sm-8">
                                    <input type="text" required="" name="rekon_cof" class="form-control" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-4 col-form-label">Pengembalian DTT per [saat ini]</label>
                                <div class="col-sm-8">
                                    <input type="text" required="" name="pengembalian_dtt" class="form-control" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-4 col-form-label">Pengembalian CoF per [saat ini]</label>
                                <div class="col-sm-8">
                                    <input type="text" required="" name="pengembalian_cof" class="form-control" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-4 col-form-label">Penerimaan Pengembalian DTT per [saat ini]</label>
                                <div class="col-sm-8">
                                    <input type="text" required="" name="penerimaan_kembali_dtt" class="form-control" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-4 col-form-label">Penerimaan Pengembalian CoF per [saat ini]</label>
                                <div class="col-sm-8">
                                    <input type="text" required="" name="penerimaan_kembali_cof" class="form-control" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-4 col-form-label">File Dokumen (.pdf)</label>
                                <div class="col-sm-8">
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
                                    <a href="<?php echo site_url('Progres/pengembalian_lman') ?>"><button type="button" class="btn btn-danger px-4">Batal</button></a>
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



