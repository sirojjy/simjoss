            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="javascript:void(0);"><b>&emsp; Summary Keuangan</b></a>
                
                 <div class="collapse navbar-collapse" >
                    <ul class="navbar-nav mr-auto">                        
                        
                    </ul>
                    <form class="form-inline " action="<?php echo site_url('Summary/search') ?>" method="post">
                        <select class="form-control  select2" required="" name="bulan" data-placeholder="Select">
                            <option>-- Bulan --</option>
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">Agustus</option> 
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                        <button type="submit" class="btn btn-success ml-2">Filter</button>
                    </form>
                </div>
            </nav>
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-xl-12 mx-auto">
                        <div class="card border-top border-0 border-4 border-primary">
                            <div class="card-body">
                                <h4 class="card-title"><strong><?php echo $bulan ?></strong> </h4>
                            </div>
                            <div class="card-body">
                               <div class="table-responsive">
                                    <table id="table2" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            <tr style="text-align: center; background-color: #98D4FF">
                                                <!-- <th style="width: 20px;">No.</th> -->
                                                <th style="width: 160px;">Jenis Pembayaran</th>
                                                <th>Keterangan</th>
                                                <th style="width: 100px;">Tanggal</th>
                                                
                                                <th style="width: 150px;">Nilai</th>
                                                <!-- <th style="width: 50px;">File</th> -->
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no=1;
                                                foreach ($row as $dt) {
                                                if($dt->id_kontrak_konsultan!=null){
                                                    $jenis = 'Kontrak Konsultan';
                                                    $count = $this->db->query('select COALESCE(count(id_detail_dok),0) as sum from detail_dok_konsultan where id_dok_master in(29,31,32,33,34,35,36) and id_pembayaran='.$dt->id_pembayaran)->row()->sum;
                                                }else if($dt->id_kontrak_konstruksi!=null){
                                                    $jenis = 'Kontrak Konstruksi';
                                                    $count = $this->db->query('select COALESCE(count(id_detail_dok),0) as sum from detail_dok_konstruksi where id_dok_master in(30,31,32,33,34,35,36) and id_pembayaran='.$dt->id_pembayaran)->row()->sum;
                                                }else{
                                                    $jenis = '';
                                                }
                                            ?>
                                            <tr>
                                                <!-- <td align="center"><?php echo $no++ ?>.</td> -->
                                                <td><b><?php echo $jenis ?></b></td>
                                                <td><?php echo $dt->keterangan ?></td>
                                                <!-- <td align="center"><?php echo $dt->termin ?></td> -->
                                                <td align="center"><?php echo date('d-m-Y',strtotime($dt->tanggal)); ?></td>
                                                <td align="center"><?php echo number_format($dt->nilai,2,',','.') ?></td>
                                                <!-- <td align="center"><a href="#" onclick='return view_addendum(<?php echo $dt->id_pembayaran ?>)' class="btn btn-sm btn-primary"><i class="fa fa-folder-open-o"></i> <?php echo $count ?></a></td> -->
                                                
                                            </tr>
                                           <?php } ?>
                                           <?php
                                                $no=1;
                                                foreach ($row2 as $dt) {
                                                if($dt->jenis==1){
                                                    $jenis = 'Utang PPh';
                                                    $folder = 'utang_pph';
                                                }else if($dt->jenis==2){
                                                    $jenis = 'Kewajiban Angsuran';
                                                    $folder = 'pembayaran_angsuran';
                                                }
                                            ?>
                                            <tr>
                                                <!-- <td align="center"><?php echo $no++ ?>.</td> -->
                                                <td><b><?php echo $jenis ?></b></td>
                                                <td><?php echo $dt->keterangan ?></td>
                                                <!-- <td align="center"><?php echo $dt->termin ?></td> -->
                                                <td align="center"><?php echo date('d-m-Y',strtotime($dt->tanggal)); ?></td>
                                                <td align="center"><?php echo number_format($dt->nilai,2,',','.') ?></td>
                                                <!-- <td align="center"><a href="<?php echo base_url("file_uploads/$folder/".$dt->dok_file)?>" target="_blank" class="btn btn-primary btn-sm" ><i class="fa fa-print"></i></a></span></td> -->
                                            </tr>
                                           <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-xl-12 mx-auto">
                        
                        
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

  