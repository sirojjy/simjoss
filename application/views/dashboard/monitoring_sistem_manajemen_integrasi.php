<div class="card">
    <div class="row">
        <div class="col-md-12 border-right p-r-0">
            <div class="card-body border-bottom d-flex align-items-center">
                <h4 class="card-title font-weight-bold m-t-10 mr-2">11. Monitoring Sistem Manajemen Integrasi</h4>
                <span class="mdi mdi-alert-circle blink cursor-pointer <?= (!$isu11) ? 'd-none' : '' ?>" style="color:red;" onclick="view_alert(`<b>PERMASALAHAN :</b><br>
                    <?= (!$isu11 ? '' : $isu11->issue) ?>
                    <hr>
                    <b>REKOMENDASI :</b><br>
                    <?= (!$isu11 ? '' : $isu11->issue) ?>`)">
                </span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="comment-widgets scrollable">
                            <div class="d-flex flex-row comment-row m-t-0">
                                <div class="p-2"><img src="<?php echo base_url("file_uploads/galeri/9001.PNG") ?>" alt="user" width="50" class="rounded-circle"></div>
                                <div class="comment-text w-100">
                                    <h6 class="font-medium"><b>ISO 9001:2015 Sistem Manajemen Mutu</b></h6> <span class="badge badge-pill badge-info float-left">Aktif</span><br>
                                    <span class="m-b-5 d-block">No. Sertifikat : QAIC/ID/11127-A</span>
                                </div>
                            </div>
                            <div class="comment-footer" style="text-align:center;">
                                <button type="button" class="btn btn-success btn-sm" onclick='return view_detail_sop9001()'>SOP Terkait</button>
                                <a href="<?php echo base_url("file_uploads/sertifikat/sertifikat_jmj_9001_2024.pdf") ?>" target="_blank" class="btn btn-cyan btn-sm ">Lihat Sertifikat</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="comment-widgets scrollable">
                            <div class="d-flex flex-row comment-row m-t-0">
                                <div class="p-2"><img src="<?php echo base_url("file_uploads/galeri/14001.PNG") ?>" alt="user" width="50" class="rounded-circle"></div>
                                <div class="comment-text w-100">
                                    <h6 class="font-medium"><b>ISO 14001:2015 Sistem Manajemen Lingkungan</b></h6> <span class="badge badge-pill badge-info float-left">Aktif</span><br>
                                    <span class="m-b-5 d-block">No. Sertifikat : QAIC/ID/11127-B</span>
                                </div>
                            </div>
                            <div class="comment-footer" style="text-align:center;">
                                <span class="text-muted float-right"></span>
                                <button type="button" class="btn btn-success btn-sm" onclick='return view_detail_sop14001()'> SOP Terkait</button>
                                <a href="<?php echo base_url("file_uploads/sertifikat/sertifikat_jmj_14001_2024.pdf") ?>" target="_blank" class="btn btn-cyan btn-sm ">Lihat Sertifikat</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="comment-widgets scrollable">
                            <div class="d-flex flex-row comment-row m-t-0">
                                <div class="p-2"><img src="<?php echo base_url("file_uploads/galeri/45001.PNG") ?>" alt="user" width="50" class="rounded-circle"></div>
                                <div class="comment-text w-100">
                                    <h6 class="font-medium"><b>ISO 45001:2018 Sistem Manajemen K3</b></h6> <span class="badge badge-pill badge-info float-left">Aktif</span><br>
                                    <span class="m-b-5 d-block">No. Sertifikat : QAIC/ID/11127-C </span>
                                    <br>
                                </div>
                            </div>
                            <div class="comment-footer" style="text-align:center;">
                                <span class="text-muted float-right"></span>
                                <button type="button" class="btn btn-success btn-sm" onclick='return view_detail_sop45001()'>SOP Terkait</button>
                                <a href="<?php echo base_url("file_uploads/sertifikat/sertifikat_jmj_45001_2024.pdf") ?>" target="_blank" class="btn btn-cyan btn-sm ">Lihat Sertifikat</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="comment-widgets scrollable">
                            <div class="d-flex flex-row comment-row m-t-0">
                                <div class="p-2"><img src="<?php echo base_url("file_uploads/galeri/37001.PNG") ?>" alt="user" width="50" class="rounded-circle"></div>
                                <div class="comment-text w-100">
                                    <h6 class="font-medium"><b>ISO 37001:2016 Sistem Manajemen Anti Penyuapan</b></h6> <span class="badge badge-pill badge-info float-left">Aktif</span><br>
                                    <span class="m-b-5 d-block">No. Sertifikat : QAIC/ID/11127-E </span>
                                    <br>
                                </div>
                            </div>
                            <div class="comment-footer" style="text-align:center;">
                                <span class="text-muted float-right"></span>
                                <button type="button" class="btn btn-success btn-sm" onclick='return view_detail_sop37001()'>SOP Terkait</button>
                                <a href="<?php echo base_url("file_uploads/sertifikat/sertifikat_jmj_37001_2024.pdf") ?>" target="_blank" class="btn btn-cyan btn-sm ">Lihat Sertifikat</a>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="text-info mt-3"><i>Last updated : <?= $lastUpdateDashboard11 ?></i></p>
                <p class="text-center">
                    <a href="<?php echo site_url('Dokumen/sop'); ?>" target="_blank" class="btn btn-info"><u>View Summary SOP</u></a>
                </p>
            </div>
        </div>
    </div>
</div>