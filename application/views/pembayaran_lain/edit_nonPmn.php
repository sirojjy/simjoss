
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-xl-11 mx-auto">
                        <h5 class="mb-10 text-uppercase"><b>Pembayaran Non PMN</b></h5>
                        <hr/>
                        <div class="card border-top border-0 border-4 border-primary">
                            <div class="card-body">
                                <form class="form-horizontal" id="upload_form" action="<?php echo $action ?>" enctype="multipart/form-data" data-parsley-validate="true" method="post">
                                <div class="border p-4 rounded">
                                    <div class="card-title d-flex align-items-center">
                                        <div><i class="bx bxs-file me-1 font-22 text-primary"></i>
                                        </div>
                                        <h5 class="mb-0 text-primary "> <b>Edit Data Dokumen Pembayaran Non PMN</b></h5>
                                    </div>
                                    <hr/>
                                    <input type="hidden" required="" value="<?php echo $id_nonpmn?>" name="id_nonpmn" class="form-control">
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Jenis Transaksi</label>
                                        <div class="col-sm-9">
                                            <select class="form-control show-tick ms select2" name="jenis">
                                                <option value="">-- Pilih --</option>
                                                <option <?php if ($jenis == '1') { echo 'selected'; }?> value="1">Pembayaran</option>
                                                <option <?php if ($jenis == '2') { echo 'selected'; }?> value="2">Pendapatan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">No. Bukti Bank</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="no_bukti" value="<?php echo $no_bukti?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Tanggal </label>
                                        <div class="col-sm-9">
                                            <input type="date" required="" value="<?php echo $tanggal?>" name="tanggal" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Keterangan</label>
                                        <div class="col-sm-9">
                                            <textarea name="keterangan" rows="3" class="form-control"><?php echo $keterangan?></textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Nilai (Rp.)</label>
                                        <div class="col-sm-9">
                                            <input type="text" required="" value="<?php echo number_format($nilai,0,',','.') ?>" name="nilai" id="rupiah" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">PIC</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="pic" value="<?php echo $pic?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Lokasi Hardcopy</label>
                                        <div class="col-sm-3">
                                            <select class="form-control show-tick ms select2" name="kantor">
                                                <option value="">-- Kantor --</option>
                                                <option <?php if ($kantor == 'Jakarta') { echo 'selected'; }?> value="Jakarta">Jakarta</option>
                                                <option <?php if ($kantor == 'Tongas') { echo 'selected'; }?> value="Tongas">Tongas</option>
                                                <option <?php if ($kantor == 'Leces') { echo 'selected'; }?> value="Leces">Leces</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text"  name="rak" value="<?php echo $no_rak?>" class="form-control" placeholder="Rak No.">
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text"  name="box" value="<?php echo $no_box?>" class="form-control" placeholder="Box No.">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Currect File</label>
                                        <div class="col-sm-9">
                                            <div class="browse-wrap">
                                                <a href="<?php echo base_url("file_uploads/non_pmn/$file")?>" target="_blank" class="btn btn-success btn-sm " >&emsp;<i class="fa fa-print"></i>&nbsp; Preview &emsp;</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">File Dokumen (.pdf)<br><small style="color: red">(*Kosongkan jika tidak ingin update file)</small></label>
                                        <div class="col-sm-9">
                                            <div class="browse-wrap">
                                                <input type="file" accept="application/pdf" name="file" id="fileku" class="btn btn-secondary btn-block" title="Choose a file to upload">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <br>
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">
                                            <button type="submit" class="btn btn-primary px-4">Simpan</button> &nbsp;
                                            <a href="<?php echo site_url('Welcome/utang_pph') ?>"><button type="button" class="btn btn-danger px-4">Batal</button></a>
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>



  