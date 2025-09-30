
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-xl-10 mx-auto">
                        <h5 class="mb-10 text-uppercase"><b>Cari Dokumen</b></h5>
                        <hr/>
                        <div class="card border-top border-0 border-4 border-primary">
                            <div class="card-body">
                                <form class="form-horizontal" action="<?php echo site_url('Welcome/act_search'); ?>" id="upload_form" enctype="multipart/form-data" data-parsley-validate="true" method="post">
                                <div class="border p-4 rounded">
                                    <div class="card-title d-flex align-items-center">
                                        <div><i class="bx bxs-file me-1 font-22 text-primary"></i>
                                        </div>
                                        <h5 class="mb-0 text-primary "> <b>Cari</b></h5>
                                    </div>
                                    <hr/>

                                    <div class="row mb-3">
                                        <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Jenis Dokumen</label>
                                        <div class="col-sm-9">
                                            <select class="form-control show-tick ms select2" required="" name="jenis" data-placeholder="Select">
                                                <option value="">-- Pilih --</option>
                                                <option value="0">PPJT</option>
                                                <option value="1">Akta</option>
                                                <option value="2">Legal</option>
                                                <option value="3">Risalah</option>
                                                <option value="4">Dokumen Perjanjian/MoU</option>
                                                <option value="5">Dokumen Non PMN</option>
                                                <!-- <option value="4">Dokumen Kontrak</option>
                                                <option value="5">Laporan Pekerjaan</option>
                                                <option value="5">Monthly Report (MC)</option>
                                                <option value="6">Dokumen Pembayaran</option> -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Tahun</label>
                                        <div class="col-sm-9">
                                            <input type="number" required="" name="tahun" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Keterangan</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" rows="3" name="keterangan"></textarea> 
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">
                                            <button type="submit" value="Upload File" onclick="uploadFile()" class="btn btn-primary px-4"><i class="fa fa-search"></i> Cari</button> &nbsp;
                                            <a href="#"><button type="button" class="btn btn-danger px-4">Batal</button></a>
                                        </div>
                                    </div>
                                    
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-xl-12 mx-auto">
                        
                        <div class="card border-top border-0 border-4 border-primary">
                            <div class="card-body">
                               <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            <tr style="text-align: center; background-color: #98D4FF">
                                                <th style="width: 20px;">No.</th>
                                                <th>Nama Dokumen</th>
                                                <th>No. Dokumen</th>
                                                <th style="width: 70px">Tanggal</th>
                                                
                                                <th>File</th>
                                                <th style="width: 170px;">Lokasi Hardcopy</th>
                                                <!-- <th>PIC</th> -->
                                                <!-- <th>Aksi</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no=1;
                                                foreach ($row as $dt) {

                                                if($dt->jenis==0){
                                                    $ppjt = 'PPJT Awal';
                                                }else{
                                                    $ppjt = 'Amandemen '.$dt->jenis;
                                                }

                                                if($jenis_dok==0){
                                                    $nomor = $dt->nomor_dok;
                                                    $tanggal = $dt->tanggal_dok;
                                                    $judul = $ppjt;
                                                }else if($jenis_dok==5){
                                                    $nomor = $dt->no_bukti;
                                                    $tanggal = $dt->tanggal;
                                                    $judul = $dt->keterangan;
                                                }else{
                                                    $nomor = $dt->nomor;
                                                    $tanggal = $dt->tanggal;
                                                    $judul = $dt->nama;
                                                }
                                            ?>
                                            <tr>
                                                <td align="center"><?php echo $no++ ?>.</td>
                                                <td><?php echo $judul ?></td>
                                                <td align="center"><?php echo $nomor ?></td>
                                                <td align="center"><?php echo date('d-m-Y',strtotime($tanggal)); ?></td>
                                                <!-- <td align="center"><?php echo number_format($dt->nilai,2,',','.') ?></td> -->
                                                <td align="center"><a href="<?php echo base_url("file_uploads/ppjt/".$dt->dok_file)?>" target="_blank" class="btn btn-primary btn-sm" ><i class="fa fa-print"></i></a></span></td>
                                                <td align="center"><?php echo $dt->kantor ?></td>
                                            </tr>
                                           <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
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

  