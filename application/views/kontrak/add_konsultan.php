
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-xl-11 mx-auto">
                        <h5 class="mb-10 text-uppercase"><b>Kontrak Konsultan Tol</b></h5>
                        <hr/>
                        <div class="card border-top border-0 border-4 border-primary">
                            <div class="card-body">
                                <form class="form-horizontal" action="<?php echo $action ?>" enctype="multipart/form-data" data-parsley-validate="true" method="post">
                                <div class="border p-4 rounded">
                                    <div class="card-title d-flex align-items-center">
                                        <div><i class="bx bxs-file me-1 font-22 text-primary"></i>
                                        </div>
                                        <h5 class="mb-0 text-primary "> <b>Tambah Data Kontrak Konsultan Tol</b></h5>
                                    </div>
                                    <hr/>

                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Nama Kontrak</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" required="" name="nama_kontrak" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Jenis Konsultan</label>
                                        <div class="col-sm-9">
                                            <select class="form-control show-tick ms select2" required="" name="konsultan" data-placeholder="Select">
                                                <option value="">-- Pilih --</option>
                                                <option value="PMI">PMI</option>
                                                <option value="Supervisi">Supervisi/Pengawas</option>
                                                <!-- <option value="Pengawas">Pengawas</option> -->
                                                <option value="Design">Design</option>
                                                <option value="Lainnya">Lainnya</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Seksi</label>
                                        <div class="col-sm-9">
                                            <select class="form-control show-tick ms select2" required="" name="seksi" data-placeholder="Select">
                                                <option value="">-- Pilih --</option>
                                                <option value="1">Seksi 1-3</option>
                                                <option value="2" >Seksi 1-4</option>
                                                <option value="4">Seksi 4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Nomor Kontrak</label>
                                        <div class="col-sm-9">
                                            <input type="text" required="" name="nomor_kontrak" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Tanggal Kontrak</label>
                                        <div class="col-sm-9">
                                            <input type="date" required="" name="tanggal_awal" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Tanggal Berakhir</label>
                                        <div class="col-sm-9">
                                            <input type="date" required="" name="tanggal_akhir" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Pihak Pertama</label>
                                        <div class="col-sm-9">
                                            <input type="text" required="" name="pihak1" class="form-control" value="PT Jasamarga Jogja Solo">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Pihak Kedua</label>
                                        <div class="col-sm-9">
                                            <input type="text" required="" name="pihak2" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Lingkup Pekerjaan</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="lingkup" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Nilai Kontrak (Rp.)</label>
                                        <div class="col-sm-9">
                                            <input type="text" required="" name="nilai" id="rupiah" class="form-control">
                                        </div>
                                    </div>
    
                                    
                                    <br>
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">
                                            <button type="submit" class="btn btn-primary px-4">Simpan</button> &nbsp;
                                            <a href="<?php echo site_url('Kontrak/konsultan') ?>"><button type="button" class="btn btn-danger px-4">Batal</button></a>
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



  