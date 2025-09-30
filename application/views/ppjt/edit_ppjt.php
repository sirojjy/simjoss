
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-xl-11 mx-auto">
                        <h5 class="mb-10 text-uppercase"><b>PPJT dan Amandemen PPJT</b></h5>
                        <hr/>
                        <div class="card border-top border-0 border-4 border-primary">
                            <div class="card-body">
                                <form class="form-horizontal" id="upload_form" action="<?php echo $action ?>" enctype="multipart/form-data" data-parsley-validate="true" method="post">
                                <div class="border p-4 rounded">
                                    <div class="card-title d-flex align-items-center">
                                        <div><i class="bx bxs-file me-1 font-22 text-primary"></i>
                                        </div>
                                        <h5 class="mb-0 text-primary "> <b>Edit Data PPJT/Amandemen PPJT</b></h5>
                                    </div>
                                    <hr/>

                                    <div class="row mb-3">
                                        <input type="hidden" required="" value="<?php echo $id_ppjt?>" name="id_ppjt" class="form-control">
                                        <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Jenis</label>
                                        <div class="col-sm-9">
                                            <select class="form-control show-tick ms select2" required="" name="jenis" data-placeholder="Select">
                                                <option value="">-- Pilih --</option>
                                                <option <?php if ($jenis == 0) { echo 'selected'; }?> value="0">PPJT Awal</option>
                                                <option <?php if ($jenis == 1) { echo 'selected'; }?> value="1">Amandemen 1</option>
                                                <option <?php if ($jenis == 2) { echo 'selected'; }?> value="2">Amandemen 2</option>
                                                <option <?php if ($jenis == 3) { echo 'selected'; }?> value="3">Amandemen 3</option>
                                                <option <?php if ($jenis == 4) { echo 'selected'; }?> value="4">Amandemen 4</option>
                                                <option <?php if ($jenis == 5) { echo 'selected'; }?> value="5">Amandemen 5</option>
                                                <option <?php if ($jenis == 6) { echo 'selected'; }?> value="6">Amandemen 6</option>
                                                <option <?php if ($jenis == 7) { echo 'selected'; }?> value="7">Amandemen 7</option>
                                                <option <?php if ($jenis == 8) { echo 'selected'; }?> value="8">Amandemen 8</option>
                                                <option <?php if ($jenis == 9) { echo 'selected'; }?> value="9">Amandemen 9</option>
                                                <option <?php if ($jenis == 10) { echo 'selected'; }?> value="10">Amandemen 10</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Nomor Dokumen</label>
                                        <div class="col-sm-9">
                                            <input type="text" required="" value="<?php echo $nomor_dok?>" name="nomor_dok" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Tanggal Dokumen</label>
                                        <div class="col-sm-9">
                                            <input type="date" required="" name="tanggal_dok" value="<?php echo $tanggal_dok?>" class="form-control">
                                        </div>
                                    </div>
                            
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Nilai (Rp.)</label>
                                        <div class="col-sm-9">
                                            <input type="text" required="" name="nilai" id="rupiah" value="<?php echo number_format($nilai,0,',','.') ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Keterangan<br><small style="color: red">(*Kosongkan jika tidak ada)</small></label>
                                        <div class="col-sm-9">
                                            <textarea name="keterangan" rows="3" class="form-control"><?php echo $keterangan?></textarea>
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
                                                <option <?php if ($kantor == 'Kantor Pusat') { echo 'selected'; }?> value="Kantor Pusat">Kantor Pusat</option>
                                                <option <?php if ($kantor == 'Kantor Lahan') { echo 'selected'; }?> value="Kantor Lahan">Kantor Lahan</option>
                                                <option <?php if ($kantor == 'Kantor Proyek') { echo 'selected'; }?> value="Kantor Proyek">Kantor Proyek</option>
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
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Current File</label>
                                        <div class="col-sm-9">
                                            <div class="browse-wrap">
                                                <a href="<?php echo base_url("file_uploads/ppjt/$file")?>" target="_blank" class="btn btn-success btn-sm " >&emsp;<i class="fa fa-print"></i>&nbsp; Preview &emsp;</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">File Dokumen (.pdf)<br><small style="color: red">(*Kosongkan jika tidak ingin update file)</small></label>
                                        <div class="col-sm-9">
                                            <div class="browse-wrap">
                                                <input type="file" name="file" id="fileku" class="btn btn-secondary btn-block" title="Choose a file to upload">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <br>
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">
                                            <button type="submit"  class="btn btn-primary px-4">Simpan</button> &nbsp;
                                            <a href="<?php echo site_url('Ppjt') ?>"><button type="button" class="btn btn-danger px-4">Batal</button></a>
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

<script>

function uploadFile() {
    var file = document.getElementById("fileku").files[0];
    var formdata = new FormData();
    formdata.append("datafile", file);
    
    var ajax = new XMLHttpRequest();
    ajax.upload.addEventListener("progress", progressHandler, false);
    ajax.open("POST", "upload.php", true);
    ajax.send(formdata);
}

function progressHandler(event){
    // hitung prosentase
    var percent = (event.loaded / event.total) * 100;
    // menampilkan prosentase ke komponen id 'progressBar'
    document.getElementById("progressBar").value = Math.round(percent);
    // menampilkan prosentase ke komponen id 'status'
    document.getElementById("status").innerHTML = Math.round(percent)+"% telah terupload";
    // menampilkan file size yg tlh terupload dan totalnya ke komponen id 'total'
    document.getElementById("total").innerHTML = "Telah terupload "+event.loaded+" bytes dari "+event.total;
}

</script>

  