
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
                                        <h5 class="mb-0 text-primary "> <b>Update Data Laporan</b></h5>
                                    </div>
                                    <hr/>

                                    <input type="hidden" required="" value="<?php echo $id_kontrak ?>" name="id_kontrak" class="form-control">
                                    <input type="hidden" required="" value="<?php echo $id_laporan ?>" name="id_laporan" class="form-control">
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Jenis Laporan</label>
                                        <div class="col-sm-9">
                                            <select class="form-control show-tick ms select2" id="jenis_lap" name="jenis_lap" data-parsley-required="true" onchange="status_change(this.value)">
                                                <option value="">--- Pilih ---</option>
                                                <option <?php if ($jenis_lap == 'Pendahuluan') { echo 'selected'; }?> value="Pendahuluan">Pendahuluan</option>
                                                <option <?php if ($jenis_lap == 'Bulanan') { echo 'selected'; }?> value="Bulanan">Bulanan</option>
                                                <option <?php if ($jenis_lap == 'Triwulan') { echo 'selected'; }?> value="Triwulan">Triwulan</option>
                                                <!-- <option <?php if ($jenis_lap == 'Semesteran') { echo 'selected'; }?> value="Semesteran">Semesteran</option> -->
                                                <option <?php if ($jenis_lap == 'Akhir') { echo 'selected'; }?> value="Akhir">Akhir</option>
                                                <!-- <option <?php if ($jenis_lap == 'BA PHO') { echo 'selected'; }?> value="Akhir">BA PHO</option> -->
                                                <!-- <option <?php if ($jenis_lap == 'FHO') { echo 'selected'; }?> value="Akhir">FHO</option> -->
                                                <!-- <option <?php if ($jenis_lap == 'As Built Drawing') { echo 'selected'; }?> value="Akhir">As Built Drawing</option> -->
                                                <!-- <option <?php if ($jenis_lap == 'Laporan Justifikasi Teknik') { echo 'selected'; }?> value="Laporan Justifikasi Teknik">Laporan Justifikasi Teknik</option> -->
                                                <option <?php if ($jenis_lap == 'Laporan Khusus') { echo 'selected'; }?> value="Laporan Khusus">Laporan Khusus</option>
                                                <!-- <option <?php if ($jenis_lap == 'Gambar RTA') { echo 'selected'; }?> value="Gambar RTA">Gambar RTA</option> -->
                                                <option <?php if ($jenis_lap == 'Lainnya') { echo 'selected'; }?> value="Lainnya">Lainnya</option>
                                            </select>
                                        </div>
                                    </div>
                                    <?php if($jenis_lap=='Bulanan') { ?>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Bulan</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="bulan" name="bulan" data-parsley-required="true">
                                                <option value="">--- Pilih ---</option>
                                                <option <?php if ($bulan == 'Januari') { echo 'selected'; }?> value="Januari">Januari</option>
                                                <option <?php if ($bulan == 'Februari') { echo 'selected'; }?> value="Februari">Februari</option>
                                                <option <?php if ($bulan == 'Maret') { echo 'selected'; }?> value="Maret">Maret</option>
                                                <option <?php if ($bulan == 'April') { echo 'selected'; }?> value="April">April</option>
                                                <option <?php if ($bulan == 'Mei') { echo 'selected'; }?> value="Mei">Mei</option>
                                                <option <?php if ($bulan == 'Juni') { echo 'selected'; }?> value="Juni">Juni</option>
                                                <option <?php if ($bulan == 'Juli') { echo 'selected'; }?> value="Juli">Juli</option>
                                                <option <?php if ($bulan == 'Agustus') { echo 'selected'; }?> value="Agustus">Agustus</option>
                                                <option <?php if ($bulan == 'September') { echo 'selected'; }?> value="September">September</option>
                                                <option <?php if ($bulan == 'Oktober') { echo 'selected'; }?> value="Oktober">Oktober</option>
                                                <option <?php if ($bulan == 'November') { echo 'selected'; }?> value="November">November</option>
                                                <option <?php if ($bulan == 'Desember') { echo 'selected'; }?> value="Desember">Desember</option>

                                              </select>
                                        </div>
                                    </div>
                                    <?php } else { ?>
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
                                    <?php } ?>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Tanggal Laporan</label>
                                        <div class="col-sm-9">
                                            <input type="date" required="" value="<?php echo $tanggal_lap ?>" name="tanggal" class="form-control">
                                        </div>
                                    </div>
                                   
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Keterangan</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="keterangan" rows="3"><?php echo $keterangan ?></textarea>
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
                                            <select class="form-control show-tick ms select2" name="lokasi">
                                                <option value="">-- Kantor --</option>
                                                <option <?php if ($kantor == 'Jakarta') { echo 'selected'; }?> value="Jakarta">Jakarta</option>
                                                <option <?php if ($kantor == 'Tongas') { echo 'selected'; }?> value="Tongas">Tongas</option>
                                                <option <?php if ($kantor == 'Leces') { echo 'selected'; }?> value="Leces">Leces</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text"  name="rak" class="form-control" value="<?php echo $no_rak ?>" placeholder="Rak No.">
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text"  name="box" class="form-control" value="<?php echo $no_box ?>" placeholder="Box No.">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Current File</label>
                                        <div class="col-sm-9">
                                            <div class="browse-wrap">
                                                <a href="<?php echo base_url("file_uploads/laporan_konsultan/$dok_file")?>" target="_blank" class="btn btn-success btn-sm " >&emsp;<i class="fa fa-print"></i>&nbsp; Preview &emsp;</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Update File (.pdf)<br><small style="color: red">(*Kosongkan jika tidak ingin update file)</small></label>
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
</script>



  