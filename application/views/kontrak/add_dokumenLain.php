
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-xl-11 mx-auto">
                        <h5 class="mb-10 text-uppercase"><b>DOkumen Lain</b></h5>
                        <hr/>
                        <div class="card border-top border-0 border-4 border-primary">
                            <div class="card-body">
                                <form class="form-horizontal" action="<?php echo $action ?>" enctype="multipart/form-data" data-parsley-validate="true" method="post">
                                <div class="border p-4 rounded">
                                    <div class="card-title d-flex align-items-center">
                                        <div><i class="bx bxs-file me-1 font-22 text-primary"></i>
                                        </div>
                                        <h5 class="mb-0 text-primary "> <b>Tambah Data Dokumen Lain</b></h5>
                                    </div>
                                    <hr/>
                                    <input type="hidden" required="" name="id_kontrak" value="<?php echo $id_kontrak ?>" class="form-control">
                                    
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Jenis Dokumen </label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="bulan" name="jenis_dok" data-parsley-required="true" required="">
                                                <option value="">--- Pilih ---</option>
                                                <option value="Laporan Bulanan">Laporan Bulanan Kontraktor</option>
                                                <option value="Laporan K3LH">Laporan K3LH</option>
                                                <option value="Persiapan Pelaksanaan Konstruksi">Persiapan Pelaksanaan Konstruksi</option>
                                                <option value="Pra PCM">Pra PCM</option>
                                                <option value="PCM">PCM</option>
                                                <option value="Laporan Desain">Laporan Desain</option>
                                                <option value="Dokumen Approval">Dokumen Approval</option>
                                                <option value="Mobilisasi/Demobilisasi">Mobilisasi/Demobilisasi</option>
                                                <option value="Gambar Kerja">Gambar Kerja</option>
                                                <option value="FHO">FHO</option>
                                                <option value="PHO">PHO</option>
                                                <option value="Lainnya">Lainnya</option>

                                              </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Nama Dokumen</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="nama_dok" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Tanggal Dokumen</label>
                                        <div class="col-sm-9">
                                            <input type="date" required="" name="tanggal" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Lokasi Hardcopy</label>
                                        <div class="col-sm-3">
                                            <select class="form-control show-tick ms select2" name="lokasi">
                                                <option value="">-- Kantor --</option>
                                                <option value="Jakarta">Jakarta</option>
                                                <option value="Tongas">Tongas</option>
                                                <option value="Leces">Leces</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text"  name="rak" class="form-control" placeholder="Rak No.">
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text"  name="box" class="form-control" placeholder="Baris No.">
                                        </div>
                                    </div>
                                     <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">File (.pdf)</label>
                                        <div class="col-sm-9">
                                            <div class="browse-wrap">
                                                <input type="file" name="file"  class="btn btn-secondary btn-block" title="Choose a file to upload" >
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <br>
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">
                                            <button type="submit" class="btn btn-primary px-4">Simpan</button> &nbsp;
                                            <a href="<?php echo site_url('Kontrak/dok_lain/'.$id_kontrak) ?>"><button type="button" class="btn btn-danger px-4">Batal</button></a>
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



  