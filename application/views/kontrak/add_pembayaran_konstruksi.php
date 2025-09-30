
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-xl-11 mx-auto">
                        <h5 class="mb-10 "><b>Dokumen Pembayaran</b></h5>
                        <hr/>
                        <div class="card border-top border-0 border-4 border-primary">
                            <div class="card-body">
                                <form class="form-horizontal" action="<?php echo $action ?>" enctype="multipart/form-data" data-parsley-validate="true" method="post">
                                <div class="border p-4 rounded">
                                    <div class="card-title d-flex align-items-center">
                                        <div><i class="bx bxs-file me-1 font-22 text-primary"></i>
                                        </div>
                                        <h5 class="mb-0 text-primary "> <b>Tambah Data Pembayaran</b></h5>
                                    </div>
                                    <hr/>

                                    <input type="hidden" required="" value="<?php echo $id_kontrak ?>" name="id_kontrak" class="form-control">
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Sumber Dana</label>
                                        <div class="col-sm-9">
                                            <select class="form-control show-tick ms select2" required="" name="pmn" data-placeholder="Select">
                                                <option value="">-- Pilih --</option>
                                                <option value="1">PMN</option>
                                                <option value="2">Non PMN</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Termin ke-</label>
                                        <div class="col-sm-9">
                                            <input type="text" required="" name="termin" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Tanggal </label>
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
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Nilai (Rp.)</label>
                                        <div class="col-sm-9">
                                            <input type="text" required="" name="nilai" id="rupiah" class="form-control">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="card-title d-flex align-items-center">
                                        <div><i class="bx bxs-file me-1 font-22 text-primary"></i>
                                        </div>
                                        <h5 class="mb-0 text-primary "> <b>Checklist Dokumen </b></h5>
                                    </div>
                                    <hr/>
                                    <div class="row mb-3">
                                        <div class="col-sm-3 text-center">
                                            <b>Nama Dokumen</b>
                                            
                                        </div>
                                        <div class="col-sm-2 text-center">
                                            <b>Nomor Dokumen</b>
                                        </div>
                                       <!--  <div class="col-sm-2 text-center">
                                            <b>Tanggal Dokumen</b>
                                        </div> -->
                                        <div class="col-sm-5 text-center">      
                                            <b>File</b>
                                        </div>
                                    </div>
                                    <hr/>
                                    <?php
                                            $no=1;
                                            $dok_kontrak = $this->db->query("select *from dok_master where id_dok_master in(76,31,32,33,34) order by id_dok_master ASC")->result();

                                            foreach ($dok_kontrak as $dt) {
                                                    
                                
                                    ?>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <b><?php echo $no++ ?>. <?php echo $dt->nama_dok ?></b>
                                            <input type="hidden" name="id_dok_master[]" value="<?php echo $dt->id_dok_master ?>">
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" name="nomor_dok[]" >
                                        </div>
                                        <!-- <div class="col-sm-2">
                                            <input type="date" class="form-control" name="tanggal_dok[]">
                                        </div> -->
                                        <div class="col-sm-5 text-center">      
                                            <div class="browse-wrap">
                                                <input type="file" name="file_evidence[]" class="btn btn-secondary btn-block" title="Choose a file to upload">
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    
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
</script>



  