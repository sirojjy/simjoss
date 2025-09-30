<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-xl-11 mx-auto">
            <h5 class="mb-10 text-uppercase"><b>Kontrak Konstruksi</b></h5>
            <hr />
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body">
                    <form class="form-horizontal" action="<?php echo $action ?>" enctype="multipart/form-data" data-parsley-validate="true" method="post">
                        <div class="border p-4 rounded">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-file me-1 font-22 text-primary"></i>
                                </div>
                                <h5 class="mb-0 text-primary "> <b>Update Data Kontrak Konstruksi</b></h5>
                            </div>
                            <hr />
                            <input type="hidden" value="<?php echo $id_kontrak ?>" name="id_kontrak">
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Nama Kontrak</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" required="" name="nama_kontrak" rows="3"><?php echo $nama_kontrak ?></textarea>
                                </div>
                            </div>
                            <!-- <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Seksi</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick ms select2" required="" name="seksi" data-placeholder="Select">
                                        <option value="">-- Pilih --</option>
                                        <?php if ($seksi == '1'): ?>
                                            <option value="1" selected="">Seksi 1-3</option>
                                            <option value="4">Seksi 4</option>
                                        <?php elseif ($seksi == '4'): ?>
                                            <option value="1">Seksi 1-3</option>
                                            <option value="4" selected="">Seksi 4</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div> -->
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Seksi</label>
                                <div class="col-sm-9">
                                    <input type="text" required="" value="<?php echo $seksi ?>" name="seksi" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Nomor Kontrak</label>
                                <div class="col-sm-9">
                                    <input type="text" required="" value="<?php echo $nomor_kontrak ?>" name="nomor_kontrak" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Tanggal Kontrak</label>
                                <div class="col-sm-9">
                                    <input type="date" required="" value="<?php echo $tanggal_mulai ?>" name="tanggal_awal" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Tanggal Berakhir</label>
                                <div class="col-sm-9">
                                    <input type="date" required="" value="<?php echo $tanggal_akhir ?>" name="tanggal_akhir" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Pihak Pertama</label>
                                <div class="col-sm-9">
                                    <input type="text" required="" value="<?php echo $pihak_pertama ?>" name="pihak1" class="form-control" value="PT Trans Jawa Paspro Jalan Tol">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Pihak Kedua</label>
                                <div class="col-sm-9">
                                    <input type="text" required="" value="<?php echo $pihak_kedua ?>" name="pihak2" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Lingkup Pekerjaan</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="lingkup" rows="3"><?php echo $lingkup ?></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Nilai Kontrak (Rp.)</label>
                                <div class="col-sm-9">
                                    <input type="text" value="<?php echo number_format($nilai, 0, ',', '.') ?>" required="" name="nilai" id="rupiah" class="form-control">
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary px-4">Simpan</button> &nbsp;
                                    <a href="<?php echo site_url('Kontrak/konstruksi') ?>"><button type="button" class="btn btn-danger px-4">Batal</button></a>
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
    $(document).ready(function() {




    });
</script>