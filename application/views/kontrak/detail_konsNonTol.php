<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand font-weight-bold" href="javascript:void(0);">Detail Kontrak Konstruksi non Tol</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-align-justify"></i>
    </button>
</nav>
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12">
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('error'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
            <?php elseif ($this->session->flashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('success'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
            <?php else: ?>
            <?php endif; ?>
            <div class="card">
                <div class="card-body border-bottom">
                    <h5 class="card-title mb-0 font-weight-bold"><?php echo $nama_kontrak ?></h5>
                </div>
                <div class="card-body">
                    <div class="row-wrapper">
                        <div class="row cols-xs-space cols-sm-space cols-md-space">
                            <div class="col-lg-12">
                                <ul class="nav nav-pills nav-fill mb-3" id="tabs_2" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#tabs_2_1" role="tab" aria-controls="home" aria-selected="true">
                                            <span class="nav-link-icon d-block"><i class="fa fa-list fa-2x"></i></span>
                                            <span class="d-none d-sm-block mt-1">Data Kontrak</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#tabs_2_4" role="tab" aria-controls="contact" aria-selected="false">
                                            <span class="nav-link-icon d-block"><i class="fa fa-book fa-2x"></i></span>
                                            <span class="d-none d-sm-block mt-1">Data Addendum</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#tabs_2_2" role="tab" aria-controls="profile" aria-selected="false">
                                            <span class="nav-link-icon d-block"><i class="fa fa-copy fa-2x"></i></span>
                                            <span class="d-none d-sm-block mt-1">Administrasi Kontrak</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#tabs_laporan" role="tab" aria-controls="contact" aria-selected="false">
                                            <span class="nav-link-icon d-block"><i class="fa fa-cogs fa-2x"></i></span>
                                            <span class="d-none d-sm-block mt-1">Administrasi Proyek</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#tabs_2_3" role="tab" aria-controls="contact" aria-selected="false">
                                            <span class="nav-link-icon d-block"><i class="fa fa-credit-card fa-2x"></i></span>
                                            <span class="d-none d-sm-block mt-1">Penagihan Pembayaran</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="tabs_2_1" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="border p-4 rounded">
                                            <div class="card-title d-flex align-items-center">
                                                <h5 class="mb-0 text-primary font-weight-bold">Data Kontrak</h5>
                                            </div>
                                            <hr />
                                            <?php
                                            $data = $this->db->query("select *from kontrak_konstruksi_nontol where id_kontrak_nontol=" . $id_kontrak)->row_array();
                                            ?>
                                            <div class="row mb-3">
                                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Nama Kontrak</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" required="" name="nama_kontrak" rows="3"><?php echo $data['nama_kontrak'] ?></textarea>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Seksi</label>
                                                <div class="col-sm-9">
                                                    <?php if ($data['seksi'] == 1) {
                                                        $seksi = ' 1,2, 3';
                                                    } else if ($data['seksi'] == 2) {
                                                        $seksi = ' 1,2,3,4';
                                                    } else if ($data['seksi'] == 4) {
                                                        $seksi = ' 4';
                                                    } else {
                                                        $seksi = $data['seksi'];
                                                    }
                                                    ?>
                                                    <input type="text" required="" value="<?php echo $seksi ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Nomor Kontrak</label>
                                                <div class="col-sm-9">
                                                    <input type="text" value="<?php echo $data['nomor_kontrak'] ?>" required="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Tanggal Kontrak</label>
                                                <div class="col-sm-9">
                                                    <input type="text" required="" value="<?php echo date('d-m-Y', strtotime($data['tanggal_mulai'])); ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Tanggal Berakhir</label>
                                                <div class="col-sm-9">
                                                    <input type="text" required="" value="<?php echo date('d-m-Y', strtotime($data['tanggal_akhir'])); ?>" name="tanggal_akhir" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Pihak Pertama</label>
                                                <div class="col-sm-9">
                                                    <input type="text" required="" name="pihak1" class="form-control" value="<?php echo $data['pihak_pertama'] ?>">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Pihak Kedua</label>
                                                <div class="col-sm-9">
                                                    <input type="text" required="" value="<?php echo $data['pihak_kedua'] ?>" name="pihak2" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Lingkup Pekerjaan</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" name="lingkup" rows="3"><?php echo $data['lingkup'] ?></textarea>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Nilai Kontrak Awal (Rp.)</label>
                                                <div class="col-sm-9">
                                                    <input type="text" required="" value="<?php echo number_format($data['nilai_kontrak'], 2, ',', '.') ?>" name="nilai" id="rupiah" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="border p-4 rounded mt-2">
                                            <div class="card-title d-flex align-items-center">
                                                <h6 class="mb-0 text-primary"> <b>Dokumen Dasar Kontrak</b></h6>
                                            </div>
                                            <hr />

                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-hover ">
                                                    <thead>
                                                        <tr style="text-align: center; background-color: #98D4FF">
                                                            <th style="width: 10px;">No.</th>
                                                            <th style="width: 300px;">Nama File</th>
                                                            <th style="width: 200px;">No. Dokumen</th>

                                                            <th style="width: 120px;">Tanggal Dokumen</th>
                                                            <th>Lokasi Hardcopy</th>
                                                            <th>PIC</th>
                                                            <th>File</th>
                                                            <!-- <th>Aksi</th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        $dok_kontrak = $this->db->query("select *from dok_master where id_dok_master in(52,53,3,72,73,1,74) order by id_dok_master ASC")->result();

                                                        foreach ($dok_kontrak as $dt) {
                                                            $detail_dok = $this->db->query('select * from detail_dok_nontol where id_kontrak_nontol=' . $id_kontrak . ' and id_dok_master=' . $dt->id_dok_master)->row_array();
                                                            $dok = base_url("file_uploads/konstruksi_nonTol/" . $detail_dok['dok_file']);

                                                            if ($detail_dok['nomor_dok'] == null) {
                                                                $nomor_dok = '-';
                                                                $tanggal = '-';
                                                                $pic = '-';
                                                                $lokasi = '-';
                                                            } else {
                                                                $nomor_dok = $detail_dok['nomor_dok'];
                                                                $tanggal = date('d-m-Y', strtotime($detail_dok['tanggal_dok']));
                                                                $pic = $detail_dok['pic'];
                                                                $lokasi = $detail_dok['kantor'] . ' ' . $detail_dok['no_rak'] . ' ' . $detail_dok['no_box'];
                                                            }

                                                        ?>
                                                            <tr>
                                                                <td align="center"><?php echo $no++ ?>.</td>
                                                                <td><b><?php echo $dt->nama_dok ?></b></td>
                                                                <td> <?php echo $nomor_dok ?></td>
                                                                <td align="center"><?php echo $tanggal ?></td>
                                                                <td><?php echo $lokasi ?></td>
                                                                <td align="center"><?php echo $pic ?></td>
                                                                <td align="center">
                                                                    <?php if ($detail_dok['nomor_dok'] == null) { ?>
                                                                        <!-- <button type="button" class="btn btn-danger btn-sm">Belum diupload</button> -->
                                                                        -
                                                                    <?php } else { ?>
                                                                        <a href="<?php echo $dok ?>" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-print"></i></a>
                                                                    <?php } ?>
                                                                </td>

                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>

                                        <div class="border p-4 rounded mt-2">
                                            <div class="card-title d-flex align-items-center">
                                                <div><i class="bx bxs-file me-1 font-22 text-primary"></i>
                                                </div>
                                                <h6 class="mb-0 text-primary"> <b>Dokumen Dasar Pekerjaan</b></h6>
                                            </div>
                                            <hr />
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-hover ">
                                                    <thead>
                                                        <tr style="text-align: center; background-color: #98D4FF">
                                                            <th style="width: 10px;">No.</th>
                                                            <th style="width: 300px;">Nama File</th>
                                                            <th style="width: 200px;">No. Dokumen</th>

                                                            <th style="width: 120px;">Tanggal Dokumen</th>
                                                            <th>Lokasi Hardcopy</th>
                                                            <th>PIC</th>
                                                            <th>File</th>
                                                            <!-- <th>Aksi</th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        $dok_kontrak = $this->db->query("select *from dok_master where id_dok_master in(10,11,12,13,14,15,75) order by id_dok_master ASC")->result();

                                                        foreach ($dok_kontrak as $dt) {
                                                            $detail_dok = $this->db->query('select * from detail_dok_nontol where id_kontrak_nontol=' . $id_kontrak . ' and id_dok_master=' . $dt->id_dok_master)->row_array();
                                                            $dok = base_url("file_uploads/konstruksi_nonTol/" . $detail_dok['dok_file']);

                                                            if ($detail_dok['nomor_dok'] == null) {
                                                                $nomor_dok = '-';
                                                                $tanggal = '-';
                                                                $pic = '-';
                                                                $lokasi = '-';
                                                            } else {
                                                                $nomor_dok = $detail_dok['nomor_dok'];
                                                                $tanggal = date('d-m-Y', strtotime($detail_dok['tanggal_dok']));
                                                                $pic = $detail_dok['pic'];
                                                                $lokasi = $detail_dok['kantor'] . ' ' . $detail_dok['no_rak'] . ' ' . $detail_dok['no_box'];
                                                            }
                                                        ?>
                                                            <tr>
                                                                <td align="center"><?php echo $no++ ?>.</td>
                                                                <td><b><?php echo $dt->nama_dok ?></b></td>
                                                                <td> <?php echo $nomor_dok ?></td>
                                                                <td align="center"><?php echo $tanggal ?></td>
                                                                <td><?php echo $lokasi ?></td>
                                                                <td align="center"><?php echo $pic ?></td>
                                                                <td align="center">
                                                                    <?php if ($detail_dok['nomor_dok'] == null) { ?>
                                                                        <!-- <button type="button" class="btn btn-danger btn-sm">Belum diupload</button> -->
                                                                        -
                                                                    <?php } else { ?>
                                                                        <a href="<?php echo $dok ?>" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-print"></i></a>
                                                                    <?php } ?>
                                                                </td>

                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                        <div class="border p-4 rounded mt-2">
                                            <div class="card-title d-flex align-items-center">
                                                <div><i class="bx bxs-file me-1 font-22 text-primary"></i>
                                                </div>
                                                <h6 class="mb-0 text-primary"> <b>Dokumen Lainnya</b></h6>
                                            </div>
                                            <hr />
                                            <div class="table-responsive">
                                                <table id="table2" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                    <thead>
                                                        <tr style="text-align: center; background-color: #98D4FF">
                                                            <th style="width: 10px;">No.</th>
                                                            <th style="width: 300px;">Nama File</th>
                                                            <th style="width: 200px;">No. Dokumen</th>

                                                            <th style="width: 120px;">Tanggal Dokumen</th>
                                                            <th>Lokasi Hardcopy</th>
                                                            <th>PIC</th>
                                                            <th>File</th>
                                                            <!-- <th>Aksi</th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        $dok_lain = $this->db->query('select * from detail_dok_nontol where id_kontrak_nontol=' . $id_kontrak . ' and id_dok_master=100 order by tanggal_dok DESC')->result();

                                                        foreach ($dok_lain as $dt) {

                                                            $dok = base_url("file_uploads/konstruksi_nonTol/" . $dt->dok_file);

                                                            if ($dt->nomor_dok == null) {
                                                                $nomor_dok = '-';
                                                                $tanggal = '-';
                                                                $pic = '-';
                                                                $lokasi = '-';
                                                            } else {
                                                                $nomor_dok = $dt->nomor_dok;
                                                                $tanggal = date('d-m-Y', strtotime($dt->tanggal_dok));
                                                                $pic = $detail_dok['pic'];
                                                                $lokasi = $dt->kantor . ' ' . $dt->no_rak . ' ' . $dt->no_box;
                                                            }
                                                        ?>
                                                            <tr>
                                                                <td align="center"><?php echo $no++ ?>.</td>
                                                                <td><b><?php echo $dt->keterangan ?></b></td>
                                                                <td> <?php echo $nomor_dok ?></td>
                                                                <td align="center"><?php echo $tanggal ?></td>
                                                                <td><?php echo $lokasi ?></td>
                                                                <td align="center"><?php echo $pic ?></td>
                                                                <td align="center">
                                                                    <a href="<?php echo $dok ?>" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-print"></i></a>
                                                                </td>

                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>

                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tabs_2_4" role="tabpanel" aria-labelledby="contact-tab">
                                        <div class="border p-4 rounded">
                                            <div class="card-title d-flex align-items-center">
                                                <div><i class="bx bxs-file me-1 font-22 text-primary"></i>
                                                </div>
                                                <h5 class="mb-0 text-primary "> <b> Data Addendum Kontrak</b></h5>
                                            </div>
                                            <hr />

                                            <div class="table-responsive">
                                                <table id="zero_config" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                    <thead>
                                                        <tr style="text-align: center; background-color: #98D4FF">
                                                            <th style="width: 10px">No.</th>
                                                            <th style="width: 30px;">Addendum ke</th>
                                                            <th>No. Dokumen</th>
                                                            <th style="width: 70px;">Tanggal</th>
                                                            <th style="width: 50px;">Nilai (Rp.)</th>
                                                            <th style="width: 200px;">Lingkup Addendum</th>
                                                            <th style="width: 40px;">File</th>
                                                            <th style="width: 200px;">Justifikasi Eksternal</th>
                                                            <th style="width: 40px;">File Justifikasi</th>
                                                            <?php if ($this->session->userdata('level_user') == 1) { ?>
                                                                <th style="width: 40px;">Aksi</th>
                                                            <?php } ?>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        $data_add = $this->db->query("select *from addendum_konsnontol where id_kontrak=" . $id_kontrak . " order by add_ke ASC")->result();
                                                        foreach ($data_add as $ad) {
                                                            if ($ad->file_eksternal == null) {
                                                                $file_eks = '/';
                                                            } else {
                                                                $link = base_url("file_uploads/kontrak_konstruksi/" . $ad->file_eksternal);
                                                                $file_eks = '<a href="' . $link . '" target="_BLANK" class="btn btn-sm  btn-primary"><i class="fa fa-print"></i></a>';
                                                            }
                                                        ?>
                                                            <tr align="center">
                                                                <td><?php echo $no++ ?>.</td>
                                                                <td><?php echo $ad->add_ke ?></td>
                                                                <td align="left"><?php echo $ad->nomor_dok ?></td>
                                                                <td><?php echo date('d-m-Y', strtotime($ad->tanggal_dok)); ?></td>
                                                                <td><?php echo number_format($ad->nilai, 2, ',', '.') ?></td>
                                                                <td align="left"><?php echo $ad->keterangan ?></td>
                                                                <td><a target="_blank" href="<?php echo base_url("file_uploads/konstruksi_nonTol/" . $ad->dok_file) ?>"><button class="btn btn-sm btn-primary"><i class="fa fa-print"></i> </button></a></td>
                                                                <td align="left"><?php echo $ad->justifikasi_eks ?></td>
                                                                <td><?php echo $file_eks ?></td>
                                                                <?php if ($this->session->userdata('level_user') == 1) { ?>
                                                                    <td>
                                                                        <a class="btn btn-success btn-sm" href="#" data-toggle="modal" data-target="#editAddendum" data-id_addendum="<?php echo $ad->id_addendum ?>" data-id_kontrak="<?php echo $ad->id_kontrak ?>" data-nomor_dok="<?php echo $ad->nomor_dok ?>" data-add_ke="<?php echo $ad->add_ke ?>" data-tanggal_dok="<?php echo $ad->tanggal_dok ?>" data-nilai="<?php echo $ad->nilai ?>" data-keterangan="<?php echo $ad->keterangan ?>" data-dok_file="<?php echo $ad->dok_file ?>"><i class="fa fa-edit"></i></a>

                                                                        <a class="btn btn-danger btn-sm" href="<?php echo site_url('Kontrak_konsultan/hapus_addendum/' . $ad->id_addendum . '/' . $ad->id_kontrak) ?>" onClick="javasciprt: return confirm('Yakin menghapus data ?')"><i class="fa fa-trash"></i></a>
                                                                    </td>
                                                                <?php } ?>
                                                            </tr>
                                                        <?php } ?>

                                                    </tbody>
                                                </table>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tabs_laporan" role="tabpanel" aria-labelledby="contact-tab">
                                        <div class="border p-4 rounded">
                                            <div class="card-title d-flex align-items-center">
                                                <div><i class="bx bxs-file me-1 font-22 text-primary"></i>
                                                </div>
                                                <h5 class="mb-0 text-primary "> <b> Administrasi Proyek</b></h5>
                                            </div>
                                            <hr />
                                            <div class="table-responsive">
                                                <table id="table3" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                    <thead>
                                                        <tr style="text-align: center; background-color: #98D4FF">
                                                            <th style="width: 10px">No.</th>
                                                            <th style="width: 100px;">Jenis Laporan</th>
                                                            <th style="width: 70px;">Tanggal Laporan</th>
                                                            <th>Keterangan</th>
                                                            <th>Lokasi Hardcopy</th>
                                                            <th style="width: 50px;">File </th>
                                                            <!-- <th style="width: 90px;">Aksi</th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        foreach ($laporan as $dt) {
                                                            if ($dt->jenis_lap == 'Bulanan') {
                                                                $jenis = $dt->jenis_lap . ' (' . $dt->bulan . ')';
                                                            } else {
                                                                $jenis = $dt->jenis_lap;
                                                            }
                                                        ?>
                                                            <tr align="center">
                                                                <td><?php echo $no++ ?>.</td>
                                                                <td align="left"><?php echo $jenis ?></td>
                                                                <td><?php echo date('d-m-Y', strtotime($dt->tanggal_lap)); ?></td>
                                                                <td align="left"><?php echo $dt->keterangan ?></td>
                                                                <td><?php echo $dt->kantor ?></td>
                                                                <td><a href="<?php echo base_url("file_uploads/laporan_konsultan/" . $dt->dok_file) ?>" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-print"></i></a></span></td>
                                                            </tr>
                                                        <?php } ?>

                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tabs_2_3" role="tabpanel" aria-labelledby="contact-tab">
                                        <div class="border p-4 rounded">
                                            <!-- <div class="col-lg-12 col-md-6 col-sm-12">
                                                            <div class="card widget_2 big_icon traffic">
                                                                <div class="body">
                                                                    <?php if ($nilai_terbayar == 0) {
                                                                        $persen = 0;
                                                                    } else {
                                                                        $persen = ($nilai_terbayar / $data['nilai_kontrak']) * 100;
                                                                    } ?>
                                                                    <h6>Terbayar <b>Rp. <?php echo number_format($nilai_terbayar, 2, ',', '.') ?></b> dari Nilai Kontrak <b>Rp. <?php echo number_format($data['nilai_kontrak'], 2, ',', '.') ?></b></h6>
                                                                    
                                                                    <div class="progress-wrapper mt-1 mb-1">
                                                                        <div class="progress bg-secondary">
                                                                            <div class="progress-bar bg-green" role="progressbar" style="width: <?php echo round($persen, 2) ?>%;" aria-valuenow="<?php echo round($persen, 2) ?>" aria-valuemin="0" aria-valuemax="100"><?php echo round($persen, 2) ?>%</div>
                                                                        </div>
                                                                    </div>
                                                               
                                                                </div>
                                                            </div>
                                                        </div> -->
                                            <div class="card-title d-flex align-items-center">
                                                <div><i class="bx bxs-file me-1 font-22 text-primary"></i>
                                                </div>
                                                <h5 class="mb-0 text-primary "> <b> Penagihan Pembayaran</b></h5>
                                            </div>
                                            <hr />


                                            <div class="table-responsive">
                                                <table id="table4" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                    <thead>
                                                        <tr style="text-align: center; background-color: #98D4FF">
                                                            <th style="width: 10px">No.</th>
                                                            <th style="width: 100px;">Termin ke</th>
                                                            <th>Tanggal Pembayaran</th>
                                                            <th>Nilai (Rp.)</th>
                                                            <th>Status</th>
                                                            <th>Kelengkapan Dokumen</th>
                                                            <th style="width: 120px;">View Dokumen</th>
                                                            <!-- <th>Aksi</th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        foreach ($row as $dt) {

                                                            $count = $this->db->query('select COALESCE(count(id_detail_dok),0) as sum from detail_dok_nontol where id_dok_master in(29,31,32,33,34,35,36) and id_pembayaran=' . $dt->id_pembayaran)->row()->sum;
                                                            if ($count < 7) {
                                                                $ket = '<span class="badge badge-md badge-pill badge-warning"><i class="fa fa-warning"></i> Dokumen Belum Lengkap</span>';
                                                            } else {
                                                                $ket = '<span class="badge badge-md badge-pill badge-primary"><i class="fa fa-check"></i> Dokumen Lengkap</span>';
                                                            }


                                                        ?>
                                                            <tr align="center">
                                                                <td><?php echo $no++ ?>.</td>
                                                                <td><?php echo $dt->termin ?></td>
                                                                <td><?php echo date('d-m-Y', strtotime($dt->tanggal)); ?></td>
                                                                <td><?php echo number_format($dt->nilai, 2, ',', '.') ?></td>
                                                                <td><span class="badge badge-md badge-pill badge-success"><i class="fa fa-check"></i> Terbayar</span></td>
                                                                <td><?php echo $ket ?></td>
                                                                <td><a href="#" onclick='return view_addendum(<?php echo $dt->id_pembayaran ?>)' class="btn btn-sm btn-primary"><i class="fa fa-folder-open-o"></i> <?php echo $count ?></a></td>

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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editAddendum" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 700px">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h6 class="modal-title">
                    <span class="fw-bold"><b>&emsp; Edit Data Addendum</b></span>
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" action="<?php echo site_url('Kontrak/act_update_AddendumNonTol') ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="modal-body" style="padding: 2.2rem">

                    <div class="row">
                        <input type="hidden" name="id_kontrak" class="form-control">
                        <input type="hidden" name="id_addendum" class="form-control">
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Addendum Ke-</label>
                                <select class="form-control show-tick ms select2" required="" id="add_ke" name="add_ke" data-placeholder="Select">
                                    <option value="">-- Pilih --</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Nomor Dokumen</label>
                                <input type="text" name="nomor_dok" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Tanggal Dokumen</label>
                                <input type="date" name="tanggal_dok" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Nilai Addendum (Rp.)</label>
                                <input type="text" name="nilai" id="rupiah" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Justifikasi Teknis</label>
                                <textarea class="form-control" rows="3" id="keterangan" name="keterangan"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Current File</label> &emsp;&emsp;
                                <div class="browse-wrap" id="detail_file">

                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Update File (.pdf)</label><small style="color: red"> (*Kosongkan jika tidak ingin update file)</small>
                                <div class="browse-wrap">
                                    <input type="file" name="file" class="btn btn-secondary btn-block" title="Choose a file to upload">
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="modal-footer no-bd">
                    <button type="submit" id="addRowButton" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="dokPembayaran" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 700px">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h6 class="modal-title">
                    <span class="fw-bold"><b>&emsp; Dokumen Pembayaran </b></span>
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding: 2.9rem">

                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover " id="tview-dok">
                            <thead>
                                <tr style="text-align: center; background-color: #98D4FF">
                                    <th>No.</th>
                                    <th style="width: 350px;">Nama Dokumen</th>
                                    <th>File</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td align="center">1.</td>
                                    <td>Laporan Progres</td>
                                    <td align="center" id="tmc"></td>
                                </tr>
                                <tr>
                                    <td align="center">2.</td>
                                    <td>Berita Acara Pembayaran (BAP)</td>
                                    <td align="center" id="tbap"></td>
                                </tr>
                                <tr>
                                    <td align="center">3.</td>
                                    <td>Surat Permohonan Pembayaran</td>
                                    <td align="center" id="tspp"></td>
                                </tr>
                                <tr>
                                    <td align="center">4.</td>
                                    <td>Kuitansi</td>
                                    <td align="center" id="tkwi"></td>
                                </tr>
                                <tr>
                                    <td align="center">5.</td>
                                    <td>Faktur Pajak (PPN)</td>
                                    <td align="center" id="tppn"></td>
                                </tr>
                                <tr>
                                    <td align="center">6.</td>
                                    <td>Slip Pembayaran</td>
                                    <td align="center" id="tslip"></td>
                                </tr>
                                <tr>
                                    <td align="center">7.</td>
                                    <td>Internal Memo</td>
                                    <td align="center" id="tmemo"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
            <div class="modal-footer no-bd">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#editAddendum').on('show.bs.modal', function(e) {
            var id_kontrak = $(e.relatedTarget).data('id_kontrak');
            var id_addendum = $(e.relatedTarget).data('id_addendum');
            var add_ke = $(e.relatedTarget).data('add_ke');
            var file = $(e.relatedTarget).data('dok_file');
            var tanggal = $(e.relatedTarget).data('tanggal_dok');
            var nomor_dok = $(e.relatedTarget).data('nomor_dok');
            var nilai = $(e.relatedTarget).data('nilai');
            var reverse = nilai.toString().split('').reverse().join(''),
                ribuan = reverse.match(/\d{1,3}/g);
            ribuan = ribuan.join('.').split('').reverse().join('');
            var keterangan = $(e.relatedTarget).data('keterangan');

            var link = "<?= base_url() ?>";
            var evidence = '<a href="' + link + "file_uploads/kontrak_konsultan/" + file + '" target="_blank" class="btn btn-sm btn-success"><i class="ti ti-printer"></i> Preview</a>';

            $(e.currentTarget).find('input[name="id_kontrak"]').val(id_kontrak);
            $(e.currentTarget).find('input[name="id_addendum"]').val(id_addendum);
            $(e.currentTarget).find('#add_ke').val(add_ke);
            $(e.currentTarget).find('input[name="tanggal_dok"]').val(tanggal);
            $(e.currentTarget).find('input[name="nomor_dok"]').val(nomor_dok);
            $(e.currentTarget).find('input[name="nilai"]').val(ribuan);
            $(e.currentTarget).find('#keterangan').val(keterangan);

            $("#detail_file").html(evidence);
        });

    });

    function view_addendum($idpembayaran) {
        var link = "<?= base_url() ?>";
        var idpembayaran = $idpembayaran;

        $.ajax({
            type: "GET",
            url: "<?php echo site_url('Kontrak/get_detail_dokPembayaranNonTol') ?>",
            data: "idpembayaran=" + idpembayaran,
            success: function(response) {
                var data = "";
                var i = 1;
                var mc = "";
                var bap = "";
                var spp = "";
                var kwi = "";
                var ppn = "";
                var slip = "";
                var memo = "";
                $.each(JSON.parse(response), function(index, item) {

                    if (item.id_dok_master == 29) {
                        if (item.dok_file != null) {
                            mc = '<a href="' + link + "file_uploads/kontrak_konsultan/dokumen_pembayaran/" + item.dok_file + '" target="_BLANK" class="btn btn-sm  btn-primary"><i class="fa fa-print"></i> View</a>';
                        } else {
                            mc = '';
                        }

                    } else if (item.id_dok_master == 31) {
                        if (item.dok_file != null) {
                            bap = '<a href="' + link + "file_uploads/kontrak_konsultan/dokumen_pembayaran/" + item.dok_file + '" target="_BLANK" class="btn btn-sm  btn-primary"><i class="fa fa-print"></i> View</a>';
                        } else {
                            bap = '';
                        }

                    } else if (item.id_dok_master == 32) {
                        if (item.dok_file != null) {
                            spp = '<a href="' + link + "file_uploads/kontrak_konsultan/dokumen_pembayaran/" + item.dok_file + '" target="_BLANK" class="btn btn-sm  btn-primary"><i class="fa fa-print"></i> View</a>';
                        } else {
                            spp = '';
                        }

                    } else if (item.id_dok_master == 33) {
                        if (item.dok_file != null) {
                            kwi = '<a href="' + link + "file_uploads/kontrak_konsultan/dokumen_pembayaran/" + item.dok_file + '" target="_BLANK" class="btn btn-sm  btn-primary"><i class="fa fa-print"></i> View</a>';
                        } else {
                            kwi = '';
                        }

                    } else if (item.id_dok_master == 34) {
                        if (item.dok_file != null) {
                            ppn = '<a href="' + link + "file_uploads/kontrak_konsultan/dokumen_pembayaran/" + item.dok_file + '" target="_BLANK" class="btn btn-sm  btn-primary"><i class="fa fa-print"></i> View</a>';
                        } else {
                            ppn = '';
                        }

                    } else if (item.id_dok_master == 35) {
                        if (item.dok_file != null) {
                            slip = '<a href="' + link + "file_uploads/kontrak_konstruksi/dokumen_pembayaran/" + item.dok_file + '" target="_BLANK" class="btn btn-sm  btn-primary"><i class="fa fa-print"></i> View</a>';
                        } else {
                            slip = '';
                        }

                    } else if (item.id_dok_master == 36) {
                        if (item.dok_file != null) {
                            memo = '<a href="' + link + "file_uploads/kontrak_konstruksi/dokumen_pembayaran/" + item.dok_file + '" target="_BLANK" class="btn btn-sm  btn-primary"><i class="fa fa-print"></i> View</a>';
                        } else {
                            memo = '';
                        }

                    }

                });

                $("#tview-dok").show();
                $("#tmc").html(mc);
                $("#tbap").html(bap);
                $("#tspp").html(spp);
                $("#tkwi").html(kwi);
                $("#tppn").html(ppn);
                $("#tslip").html(slip);
                $("#tmemo").html(memo);
            }
        });
        $("#dokPembayaran").modal('show');
    };
</script>