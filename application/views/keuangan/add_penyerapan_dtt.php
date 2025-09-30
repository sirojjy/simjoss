
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-xl-11 mx-auto">
            <h5 class="mb-10 text-uppercase"><b>Penyerapan Dana Tanah</b></h5>
            <hr/>
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body">
                    <form class="form-horizontal" action="<?php echo $action_add ?>" enctype="multipart/form-data" data-parsley-validate="true" method="post">
                        <div class="border p-4 rounded">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-file me-1 font-22 text-primary"></i>
                                </div>
                                <h5 class="mb-0 text-primary "> <b>Tambah Data Penyerapan Dana Tanah</b></h5>
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
                                <label for="inputPhoneNo2" class="col-sm-4 col-form-label">Realisasi Internal PL Periodik (PL)</label>
                                <div class="col-sm-8">
                                    <input type="text" required="" name="realisasi_internal_pl" class="form-control" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-4 col-form-label">Realisasi Internal PL Periodik (DTT)</label>
                                <div class="col-sm-8">
                                    <input type="text" required="" name="realisasi_internal_dtt" class="form-control" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-4 col-form-label">Realisasi DT s.d Periode Sebelumnya</label>
                                <div class="col-sm-8">
                                    <input type="text" required="" name="realisasi_tanah" class="form-control" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-4 col-form-label">Realisasi PL s.d Periode Sebelumnya</label>
                                <div class="col-sm-8">
                                    <input type="text" required="" name="realisasi_pl" class="form-control" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-4 col-form-label">Realisasi DTT s.d Periode Sebelumnya</label>
                                <div class="col-sm-8">
                                    <input type="text" required="" name="realisasi_dtt" class="form-control" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-4 col-form-label">Carry Over periodik (PL)</label>
                                <div class="col-sm-8">
                                    <input type="text" required="" name="carry_over" class="form-control" >
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



