
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-xl-11 mx-auto">
                        <h5 class="mb-10 text-uppercase"><b>Dokumen Lama</b></h5>
                        <hr/>
                        <div class="card border-top border-0 border-4 border-primary">
                            <div class="card-body">
                                <form class="form-horizontal" action="<?php echo $action ?>" enctype="multipart/form-data" data-parsley-validate="true" method="post">
                                <div class="border p-4 rounded">
                                    <div class="card-title d-flex align-items-center">
                                        <div><i class="bx bxs-file me-1 font-22 text-primary"></i>
                                        </div>
                                        <h5 class="mb-0 text-primary "> <b>Edit Data Dokumen Lama</b></h5>
                                    </div>
                                    <hr/>
                                    <input type="hidden"  value="<?php echo $id_dokumen ?>" name="id_dokumen" class="form-control">
                                    <div class="row mb-3">
                                        <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Nama Dokumen</label>
                                        <div class="col-sm-9">
                                            <textarea name="nama" rows="2" class="form-control"><?php echo $nama ?></textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Nomor</label>
                                        <div class="col-sm-9">
                                            <input type="text" required="" value="<?php echo $nomor ?>" name="nomor" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Tanggal</label>
                                        <div class="col-sm-9">
                                            <input type="date" required="" value="<?php echo $tanggal ?>" name="tanggal" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Keterangan<br><small style="color: red">(*Kosongkan jika tidak ada)</small></label>
                                        <div class="col-sm-9">
                                            <textarea name="keterangan" rows="3" class="form-control"><?php echo $keterangan ?></textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">PIC</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="pic" value="<?php echo $pic ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Lokasi Hardcopy</label>
                                        <div class="col-sm-3">
                                            <select class="form-control show-tick ms select2" name="kantor">
                                               <option value="">-- Kantor --</option>
                                                <option <?php if ($kantor == 'Jakarta') { echo 'selected'; }?> value="Jakarta">Kantor Jakarta</option>
                                                <option <?php if ($kantor == 'Pusat') { echo 'selected'; }?> value="Pusat">Kantor Pusat</option>
                                                <option <?php if ($kantor == 'Lahan') { echo 'selected'; }?> value="Lahan">Kantor Lahan</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" value="<?php echo $no_rak ?>"  name="rak" class="form-control" placeholder="Rak No.">
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" value="<?php echo $no_box ?>" name="box" class="form-control" placeholder="Box No.">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Currect File</label>
                                        <div class="col-sm-9">
                                            <div class="browse-wrap">
                                                <a href="<?php echo base_url("file_uploads/dokumen/dok_lama/$file")?>" target="_blank" class="btn btn-success btn-sm " >&emsp;<i class="fa fa-print"></i>&nbsp; Preview &emsp;</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">File Dokumen (.pdf)<br><small style="color: red">(*Kosongkan jika tidak ingin update file)</small></label>
                                        <div class="col-sm-9">
                                            <div class="browse-wrap">
                                                <input type="file" name="file" id="fileku" class="btn btn-secondary btn-block" accept="application/pdf" title="Choose a file to upload">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <br>
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">
                                            <button type="submit" class="btn btn-primary px-4">Simpan</button> &nbsp;
                                            <a href="<?php echo site_url('Dokumen/lama') ?>"><button type="button" class="btn btn-danger px-4">Batal</button></a>
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



  