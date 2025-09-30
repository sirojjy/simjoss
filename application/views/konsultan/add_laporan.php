
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-xl-11 mx-auto">
                        <h5 class="mb-10 "><b>Laporan Pekerjaan</b></h5>
                        <hr/>
                        <div class="card border-top border-0 border-4 border-primary">
                            <div class="card-body">
                                <form class="form-horizontal" action="<?php echo $action ?>" enctype="multipart/form-data" data-parsley-validate="true" method="post">
                                <div class="border p-4 rounded">
                                    <div class="card-title d-flex align-items-center">
                                        <div><i class="bx bxs-file me-1 font-22 text-primary"></i>
                                        </div>
                                        <h5 class="mb-0 text-primary "> <b>Tambah Data Laporan</b></h5>
                                    </div>
                                    <hr/>

                                    <input type="hidden" required="" value="<?php echo $id_kontrak ?>" name="id_kontrak" class="form-control">
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Jenis Laporan</label>
                                        <div class="col-sm-9">
                                            <select class="form-control show-tick ms select2" id="jenis_lap" name="jenis_lap" data-parsley-required="true" onchange="status_change(this.value)">
                                                <option value="">--- Pilih ---</option>
                                                <option value="Pendahuluan">Pendahuluan</option>
                                                <!-- <option value="Mingguan">Mingguan</option> -->
                                                <option value="Bulanan">Bulanan</option>
                                                <option value="Triwulan">Triwulan</option>
                                                <!-- <option value="Semesteran">Semesteran</option> -->
                                                <option value="Akhir">Akhir</option>
                                                <!-- <option value="BA PHO">BA PHO</option> -->
                                                <!-- <option value="FHO">FHO</option> -->
                                                <!-- <option value="As Built Drawing">As Built Drawing</option> -->
                                                <!-- <option value="Laporan Justifikasi Teknik">Laporan Justifikasi Teknik</option> -->
                                                <option value="Laporan Khusus">Laporan Khusus</option>
                                                <!-- <option value="Gambar RTA">Gambar RTA</option> -->
                                                <option value="Lainnya">Lainnya</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3" style="display: none;" id="div-bulan">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Bulan</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="bulan" name="bulan" data-parsley-required="true">
                                                <option value="">--- Pilih ---</option>
                                                <option value="Januari">Januari</option>
                                                <option value="Februari">Februari</option>
                                                <option value="Maret">Maret</option>
                                                <option value="April">April</option>
                                                <option value="Mei">Mei</option>
                                                <option value="Juni">Juni</option>
                                                <option value="Juli">Juli</option>
                                                <option value="Agustus">Agustus</option>
                                                <option value="September">September</option>
                                                <option value="Oktober">Oktober</option>
                                                <option value="November">November</option>
                                                <option value="Desember">Desember</option>

                                              </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Tanggal Laporan</label>
                                        <div class="col-sm-9">
                                            <input type="date" required="" name="tanggal" class="form-control">
                                        </div>
                                    </div>
                                   
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Keterangan</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="keterangan" rows="3"></textarea>
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
                                            <input type="text"  name="box" class="form-control" placeholder="Box No.">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">File Laporan (.pdf)</label>
                                        <div class="col-sm-9">
                                            <div class="browse-wrap">
                                                <input type="file" name="file" id="fileku" class="btn btn-secondary btn-block" title="Choose a file to upload">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">
                                            <progress id="progressBar" value="0" max="100" style="width:100%;"></progress>
                                            <h5 id="status"></h5>
                                            <p id="total"></p>
                                        </div>
                                    </div>
                                    <br>
                                    
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">
                                            <button type="submit" value="Upload File" onclick="uploadFile()" class="btn btn-primary px-4">Simpan</button> &nbsp;
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {




    });
    function status_change(value){
        //alert(value);
        if(value=='Bulanan' ){
          $("#div-bulan").show();
        }else {
          $("#div-bulan").hide();
        }
      }
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



  