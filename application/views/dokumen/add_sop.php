
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-xl-11 mx-auto">
                        <h5 class="mb-10 text-uppercase"><b>Dokumen SOP</b></h5>
                        <hr/>
                        <div class="card border-top border-0 border-4 border-primary">
                            <div class="card-body">
                                <form class="form-horizontal" action="<?php echo $action ?>" enctype="multipart/form-data" data-parsley-validate="true" method="post">
                                <div class="border p-4 rounded">
                                    <div class="card-title d-flex align-items-center">
                                        <div><i class="bx bxs-file me-1 font-22 text-primary"></i>
                                        </div>
                                        <h5 class="mb-0 text-primary "> <b>Tambah Data SOP</b></h5>
                                    </div>
                                    <hr/>

                                    <div class="row mb-3">
                                        <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Nama Dokumen</label>
                                        <div class="col-sm-9">
                                            <textarea name="nama" rows="2" class="form-control"></textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Nomor Dokumen</label>
                                        <div class="col-sm-9">
                                            <input type="text" required="" name="nomor" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Nomor Revisi<br><small style="color: red">(*Kosongkan jika bukan dokumen revisi)</small></label>
                                        <div class="col-sm-9">
                                            <input type="text" name="nomor_revisi" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Tanggal</label>
                                        <div class="col-sm-9">
                                            <input type="date" required="" name="tanggal" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Divisi</label>
                                        <div class="col-sm-9">
                                            <select class="form-control show-tick ms select2" name="divisi">
                                                <option value="">-- Pilih Divisi --</option>
                                                <option value="Admin Proyek">Admin Proyek</option>
                                                <option value="Pengendalian Proyek">Pengendalian Proyek</option>
                                                <option value="Rekayasa Teknik & Desain">Rekayasa Teknik & Desain</option>
                                                <option value="Admintek & Lahan">Admintek & Lahan</option>
                                                <option value="Pengendalian Pengoprasian">Pengendalian Pengoprasian</option>
                                                <option value="Keuangan & Akuntansi">Keuangan & Akuntansi</option>
                                                <option value="SDM & Umum">SDM & Umum</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Keterangan<br><small style="color: red">(*Kosongkan jika tidak ada)</small></label>
                                        <div class="col-sm-9">
                                            <textarea name="keterangan" rows="3" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">PIC</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="pic" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Lokasi Hardcopy</label>
                                        <div class="col-sm-3">
                                            <select class="form-control show-tick ms select2" name="kantor">
                                                <option value="">-- Kantor --</option>
                                                <option value="Jakarta">Kantor Jakarta</option>
                                                <option value="Pusat">Kantor Pusat</option>
                                                <option value="Lahan">Kantor Lahan</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text"  name="rak" class="form-control" placeholder="Rak No.">
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text"  name="box" class="form-control" placeholder="Box No.">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Keterkaitan dengan ISO 9001?</label>
                                        <div class="col-sm-2" style="text-align: center;">
                                            <input class="form-check-input" type="radio" name="iso_9001" id="iso_9001" value="1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Ya
                                            </label>
                                        </div>
                                        <div class="col-sm-2" >
                                            <input class="form-check-input" type="radio" name="iso_9001" id="iso_9001" value="0">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Tidak
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Keterkaitan dengan ISO 14001?</label>
                                        <div class="col-sm-2" style="text-align: center;">
                                            <input class="form-check-input" type="radio" name="iso_14001" id="iso_14001" value="1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Ya
                                            </label>
                                        </div>
                                        <div class="col-sm-2" >
                                            <input class="form-check-input" type="radio" name="iso_14001" id="iso_14001" value="0">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Tidak
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Keterkaitan dengan ISO 45001?</label>
                                        <div class="col-sm-2" style="text-align: center;">
                                            <input class="form-check-input" type="radio" name="iso_45001" id="iso_45001" value="1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Ya
                                            </label>
                                        </div>
                                        <div class="col-sm-2" >
                                            <input class="form-check-input" type="radio" name="iso_45001" id="iso_45001" value="0">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Tidak
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Keterkaitan dengan ISO 37001?</label>
                                        <div class="col-sm-2" style="text-align: center;">
                                            <input class="form-check-input" type="radio" name="iso_37001" id="iso_37001" value="1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Ya
                                            </label>
                                        </div>
                                        <div class="col-sm-2" >
                                            <input class="form-check-input" type="radio" name="iso_37001" id="iso_37001" value="0">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Tidak
                                            </label>
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
                                            <a href="<?php echo site_url('Dokumen/sop') ?>"><button type="button" class="btn btn-danger px-4">Batal</button></a>
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



  