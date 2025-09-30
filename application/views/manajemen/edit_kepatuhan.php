
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-xl-11 mx-auto">
            <h5 class="mb-10 text-uppercase"><b>Kewajiban Kepatuhan</b></h5>
            <hr/>
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body">
                    <form class="form-horizontal" id="upload_form" action="<?php echo $action ?>" enctype="multipart/form-data" data-parsley-validate="true" method="post">
                        <div class="border p-4 rounded">

                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-file me-1 font-22 text-primary"></i>
                                </div>
                                <h5 class="mb-0 text-primary "> <b>Edit Data Kewajiban Kepatuhan Aspek <?php echo $aspek ?> </b></h5>
                            </div>
                            <hr/>

                            <div class="row mb-3">
                                <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Kewajiban/Izin (Otorisasi)/Dokumen</label>
                                <div class="col-sm-9">
                                    <input type="text" required="" name="kewajiban" class="form-control" value="<?php echo $kewajiban ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Dasar Hukum</label>
                                <div class="col-sm-9">
                                    <input type="text" required="" name="dasar_hukum" class="form-control" value="<?php echo $dasar_hukum ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Otoritas Terkait/Yang Memberikan Otorisasi</label>
                                <div class="col-sm-9">
                                    <input type="text" required="" name="otoritas_terkait" class="form-control" value="<?php echo $otoritas_terkait ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Periode Pemenuhan</label>
                                <div class="col-sm-9">
                                    <textarea required="" name="periode_pemenuhan" class="form-control"><?php echo $periode_pemenuhan ?></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Masa Berlaku</label>
                                <div class="col-sm-9">
                                    <input type="text" required="" name="masa_berlaku" class="form-control" value="<?php echo $masa_berlaku ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Konsekuensi Ketidakpatuhan</label>
                                <div class="col-sm-9">
                                    <textarea required="" name="konsekuensi" class="form-control"><?php echo $konsekuensi ?></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Tanggal Izin/Pemenuhan Terakhir</label>
                                <div class="col-sm-9">
                                    <textarea required="" name="tgl_pemenuhan_berakhir" class="form-control"><?php echo $tgl_berakhir ?></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Unit Kerja Penanggung Jawab</label>
                                <div class="col-sm-9">
                                    <input type="text" required="" name="unit_penanggungjawab" class="form-control" value="<?php echo $unit_pj ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Catatan</label>
                                <div class="col-sm-9">
                                    <textarea name="catatan" class="form-control"><?php echo $catatan ?></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <select required="" name="status" class="form-control">
                                        <option>--- Pilih Status ---</option>
                                        <?php 
                                            if($status==0){
                                                $no = "selected";
                                                $yes = "";
                                            }else{
                                                $no = "";
                                                $yes = "selected";
                                            }
                                        ?>
                                        <option <?php echo $no ?> value="0">Tidak Ada</option>
                                        <option <?php echo $yes ?> value="1">Ada</option>
                                    </select>
                                </div>
                            </div>
                            

                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">File Dokumen (.pdf)</label>
                                <div class="col-sm-9">
                                    <div class="browse-wrap">
                                        <input type="file" name="file" id="fileku" class="btn btn-secondary btn-block" title="Choose a file to upload">
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="id_aspek" value="<?php echo $id_aspek ?>">
                            <input type="hidden" required="" name="id_kewajiban_kepatuhan" class="form-control" value="<?php echo $id_kewajiban_kepatuhan ?>">
                            <br>
                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary px-4">Simpan</button> &nbsp;
                                    <!-- <a href="<?php echo site_url('Manajemen/resiko') ?>"><button type="button" class="btn btn-danger px-4">Batal</button></a> -->
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


