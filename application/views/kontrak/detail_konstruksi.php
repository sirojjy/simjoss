<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="javascript:void(0);"><b>&emsp; Detail Kontrak</b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-align-justify"></i>
    </button>
</nav>
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12">
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $this->session->flashdata('error'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
            <?php elseif ($this->session->flashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo $this->session->flashdata('success'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
            <?php endif; ?>
            <div class="card">
                <div class="card-body border-bottom">
                    <h5 class="card-title"><strong><?php echo $nama_kontrak ?></strong> </h5>
                </div>

                <div class="card-body">
                    <div class="row-wrapper">
                        <div class="row cols-xs-space cols-sm-space cols-md-space">
                            <div class="col-lg-12">
                                <ul class="nav nav-pills nav-fill mb-3" id="tabs_2" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#data_kontrak" role="tab" aria-controls="home" aria-selected="true">
                                            <span class="nav-link-icon d-block"><i class="fa fa-list fa-2x"></i></span>
                                            <span class="d-none d-sm-block mt-1">Data Kontrak</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#data_addendum" role="tab" aria-controls="contact" aria-selected="false">
                                            <span class="nav-link-icon d-block"><i class="fa fa-book fa-2x"></i></span>
                                            <span class="d-none d-sm-block mt-1">Data Addendum</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="adminProyek-tab" data-toggle="tab" href="#admin_proyek" role="tab" aria-controls="profile" aria-selected="false">
                                            <span class="nav-link-icon d-block"><i class="fa fa-cogs fa-2x"></i></span>
                                            <span class="d-none d-sm-block mt-1">Administrasi Proyek</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#penagihan" role="tab" aria-controls="contact" aria-selected="false">
                                            <span class="nav-link-icon d-block"><i class="fa fa-credit-card fa-2x"></i></span>
                                            <span class="d-none d-sm-block mt-1">Penagihan Pembayaran</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="data_kontrak" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="border p-4 rounded">
                                            <div class="card-title d-flex align-items-center">
                                                <div><i class="bx bxs-file me-1 font-22 text-primary"></i>
                                                </div>
                                                <h5 class="mb-0 text-primary "> <b> Data Kontrak</b></h5>
                                            </div>
                                            <hr />
                                            <?php
                                            $data = $this->db->query("select *from tb_kontrak_konstruksi where id_kontrak_konstruksi=" . $id_kontrak)->row_array();
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
                                                    <input type="text" required="" value="<?php echo $data['seksi'] ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Nomor Kontrak</label>
                                                <div class="col-sm-9">
                                                    <input type="text" value="<?php echo $data['nomor_kontrak'] ?>" required="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Tanggal Kontrak Awal</label>
                                                <div class="col-sm-9">
                                                    <input type="text" required="" value="<?php echo date('d-m-Y', strtotime($data['tanggal_mulai'])); ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Addendum ke-1</label>
                                                <div class="col-sm-2">
                                                    <input type="text" required="" value="16-08-2021" class="form-control">
                                                </div>
                                                <div class="col-sm-1"></div>
                                                <label for="inputPhoneNo2" class="col-sm-2 col-form-label">Addendum ke-5</label>
                                                <div class="col-sm-2">
                                                    <input type="text" required="" value="03-10-2023" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Addendum ke-2</label>
                                                <div class="col-sm-2">
                                                    <input type="text" required="" value="17-11-2022" class="form-control">
                                                </div>
                                                <div class="col-sm-1"></div>
                                                <label for="inputPhoneNo2" class="col-sm-2 col-form-label">Addendum ke-6</label>
                                                <div class="col-sm-2">
                                                    <input type="text" required="" value="06-02-2024" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Addendum ke-3</label>
                                                <div class="col-sm-2">
                                                    <input type="text" required="" value="27-03-2023" class="form-control">
                                                </div>
                                                <div class="col-sm-1"></div>
                                                <label for="inputPhoneNo2" class="col-sm-2 col-form-label">Addendum ke-7</label>
                                                <div class="col-sm-2">
                                                    <input type="text" required="" value="07-06-2024" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Addendum ke-4</label>
                                                <div class="col-sm-2">
                                                    <input type="text" required="" value="09-06-2023" class="form-control">
                                                </div>
                                                <div class="col-sm-1"></div>
                                                <label for="inputPhoneNo2" class="col-sm-2 col-form-label">Addendum ke-8</label>
                                                <div class="col-sm-2">
                                                    <input type="text" required="" value="05-08-2024" class="form-control">
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
                                            <div class="row mb-3">
                                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Nilai Addendum Terakhir(Rp.)</label>
                                                <div class="col-sm-9">
                                                    <input type="text" required="" value="<?php echo number_format($data['nilai_addendum'], 2, ',', '.') ?>" name="nilai" id="rupiah" class="form-control">
                                                </div>
                                            </div>
                                            <br>
                                        </div>

                                        <div class="border p-4 mt-2 rounded">
                                            <div class="card-title d-flex align-items-center">
                                                <div><i class="bx bxs-file me-1 font-22 text-primary"></i>
                                                </div>
                                                <h6 class="mb-0 text-primary"> <b>Dokumen Dasar Kontrak</b></h6>
                                            </div>
                                            <hr />

                                            <div class="table-responsive">
                                                <table id="dt_dokumen_dasar_kontrak" class="table table-bordered table-striped table-hover">
                                                    <thead>
                                                        <tr style="text-align: center; background-color: #98D4FF">
                                                            <th style="width: 10px;">No.</th>
                                                            <th>Nama File</th>
                                                            <th>No. Dokumen</th>
                                                            <th>Tanggal Dokumen</th>
                                                            <th>Lokasi Hardcopy</th>
                                                            <th>PIC</th>
                                                            <th>File</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="border p-4 mt-2 rounded">
                                            <div class="card-title d-flex align-items-center">
                                                <div><i class="bx bxs-file me-1 font-22 text-primary"></i>
                                                </div>
                                                <h6 class="mb-0 text-primary"> <b>Dokumen Dasar Pekerjaan</b></h6>
                                            </div>
                                            <hr />
                                            <div class="table-responsive">
                                                <table id="dt_dokumen_dasar_pekerjaan" class="table table-bordered table-striped table-hover ">
                                                    <thead>
                                                        <tr style="text-align: center; background-color: #98D4FF">
                                                            <th style="width: 10px;">No.</th>
                                                            <th>Nama File</th>
                                                            <th>No. Dokumen</th>
                                                            <th>Tanggal Dokumen</th>
                                                            <th>Lokasi Hardcopy</th>
                                                            <th>PIC</th>
                                                            <th>File</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody></tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="border p-4 mt-2 rounded">
                                            <div class="card-title d-flex align-items-center">
                                                <div><i class="bx bxs-file me-1 font-22 text-primary"></i>
                                                </div>
                                                <h6 class="mb-0 text-primary"> <b>Dokumen Lainnya</b></h6>
                                            </div>
                                            <hr />
                                            <div class="table-responsive">
                                                <table id="dt_dokumen_lain" class="table table-bordered table-striped table-hover w-100">
                                                    <thead>
                                                        <tr style="text-align: center; background-color: #98D4FF">
                                                            <th style="width: 10px;">No.</th>
                                                            <th>Nama File</th>
                                                            <th>No. Dokumen</th>
                                                            <th>Tanggal Dokumen</th>
                                                            <th>Lokasi Hardcopy</th>
                                                            <th>PIC</th>
                                                            <th>File</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="data_addendum" role="tabpanel" aria-labelledby="contact-tab">
                                        <div class="border p-4 rounded">
                                            <div class="card-title mb-0 d-flex justify-content-between align-items-center">
                                                <h5 class="mb-0 text-primary "> <b> Data Addendum Kontrak</b></h5>

                                                <?php if ($this->session->userdata('level_user') == 1) { ?>
                                                    <?php foreach ($data_kontrak_konstruksi as $dt): ?>
                                                        <a href="#" data-toggle="modal" data-target="#dataAddendumKontrak" data-id_kontrak="<?php echo $dt->id_kontrak_konstruksi ?>">
                                                            <button type="button" class="btn btn-default">
                                                                <i class="fa fa-plus"></i>&nbsp; Tambah Data
                                                            </button>
                                                        </a>
                                                    <?php endforeach; ?>
                                                <?php } ?>
                                            </div>
                                            <hr />
                                            <div class="table-responsive">
                                                <table id="dt_dataAddendumKontrak" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                    <thead>
                                                        <tr style="text-align: center; background-color: #98D4FF">
                                                            <th>No.</th>
                                                            <th>Add- ke</th>
                                                            <th>No. Dokumen</th>
                                                            <th>Tanggal</th>
                                                            <th>Nilai (Rp.)</th>
                                                            <th style="min-width: 200px;">Lingkup Addendum</th>
                                                            <th style="min-width: 200px;">Justifikasi</th>
                                                            <th>File</th>
                                                            <?php if ($this->session->userdata('level_user') == 1) { ?>
                                                                <th style="min-width: 60px;">Aksi</th>
                                                            <?php } ?>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        $data_add = $this->db->query("select * from addendum_konstruksi where id_kontrak=" . $id_kontrak . " order by add_ke ASC")->result();
                                                        foreach ($data_add as $ad) {

                                                            $keterangan = preg_replace("/\r\n|\r|\n/", '<br/>', $ad->keterangan);
                                                            $keterangan_justifikasi = preg_replace("/\r\n|\r|\n/", '<br/>', $ad->keterangan_justifikasi);

                                                        ?>
                                                            <tr align="center">
                                                                <td><?= $no++ ?>.</td>
                                                                <td><?= $ad->add_ke ?></td>
                                                                <td align="left"><?= $ad->nomor_dok ?></td>
                                                                <td><?= date('d-m-Y', strtotime($ad->tanggal_dok)); ?></td>
                                                                <td><?= number_format($ad->nilai, 0, ',', '.') ?></td>
                                                                <td align="left"><?= $keterangan ?></td>
                                                                <td align="left"><?= $keterangan_justifikasi ?></td>
                                                                <td>
                                                                    <a target="_blank" href="<?= base_url("file_uploads/kontrak_konstruksi/" . $ad->dok_file) ?>">
                                                                        <button class="btn btn-sm btn-primary"><i class="fa fa-print"></i></button>
                                                                    </a>
                                                                </td>
                                                                <?php if ($this->session->userdata('level_user') == 1) { ?>
                                                                    <td>
                                                                        <a class="btn btn-success btn-sm" title="Edit" href="#" data-toggle="modal" data-target="#editAddendum" data-id_addendum="<?= $ad->id_addendum ?>" data-id_kontrak="<?= $ad->id_kontrak ?>" data-nomor_dok="<?= $ad->nomor_dok ?>" data-add_ke="<?= $ad->add_ke ?>" data-tanggal_dok="<?= $ad->tanggal_dok ?>" data-nilai="<?= $ad->nilai ?>" data-keterangan="<?= $ad->keterangan ?>" data-keterangan_justifikasi="<?= htmlspecialchars($ad->keterangan_justifikasi, ENT_QUOTES); ?>" data-dok_file="<?= $ad->dok_file ?>"><i class="fa fa-edit"></i></a>
                                                                        <a title="Hapus" class="btn btn-danger btn-sm" href="<?= site_url('Kontrak/hapus_addendum/' . $ad->id_addendum . '/' . $ad->id_kontrak) ?>" onClick="javasciprt: return confirm('Yakin menghapus data ?')"><i class="fa fa-trash"></i></a>
                                                                    </td>
                                                                <?php } ?>
                                                            </tr>
                                                        <?php } ?>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="border p-4 mt-2 rounded">
                                            <div class="card-title d-flex justify-content-between align-items-center">
                                                <h5 class="mb-0 text-primary"><b> Dokumen Addendum </b></h5>
                                                <div class="d-flex align-items-center">
                                                    <?php if ($addendum_available != null) { ?>
                                                        <span class="mr-2">Addendum:</span>
                                                        <?php
                                                        $selected_add_ke = isset($_GET['add_ke']) ? $_GET['add_ke'] : null;
                                                        ?>

                                                        <select class="form-control show-tick ms select2 mr-2" data-placeholder="Select" id="selectAddendum">
                                                            <?php foreach ($addendum_available as $add): ?>
                                                                <option value="<?= $add->add_ke ?>" <?= ($selected_add_ke == $add->add_ke) ? 'selected="selected"' : '' ?>>
                                                                    <?= $add->add_ke ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>

                                                        <?php if ($this->session->userdata('level_user') == 1) { ?>
                                                            <?php foreach ($data_kontrak_konstruksi as $dt): ?>
                                                                <a href="#" data-toggle="modal" class="mr-2" data-target="#addDokumenAddendum" data-id_kontrak="<?= $dt->id_kontrak_konstruksi ?>">
                                                                    <button type="button" class="btn btn-default">
                                                                        <i class="fa fa-plus"></i>&nbsp; Dokumen Addendum
                                                                    </button>
                                                                </a>
                                                            <?php endforeach; ?>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <hr />
                                            <div class="table-responsive">
                                                <table id="tableDokumenAddendum" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                    <thead>
                                                        <tr style="text-align: center; background-color: #98D4FF">
                                                            <th>No.</th>
                                                            <th>Nama File</th>
                                                            <th>No. Dokumen</th>
                                                            <th>Tanggal</th>
                                                            <th>Lokasi</th>
                                                            <th>PIC</th>
                                                            <th>File</th>
                                                            <?php if ($this->session->userdata('level_user') == 1) { ?>
                                                                <th>Aksi</th>
                                                            <?php } ?>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="body_addendum">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="admin_proyek" role="tabpanel" aria-labelledby="contact-tab">
                                        <div class="border p-4 rounded">
                                            <div class="card-title d-flex align-items-center">
                                                <div><i class="bx bxs-file me-1 font-22 text-primary"></i>
                                                </div>
                                                <h5 class="mb-0 text-primary "> <b> Data Administrasi Proyek</b></h5>
                                            </div>
                                            <hr />

                                            <div class="table-responsive">
                                                <table id="table2" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                    <thead>
                                                        <tr style="text-align: center; background-color: #98D4FF">
                                                            <th style="width: 10px">No.</th>
                                                            <th style="width: 80px;">Sertifikat No.</th>
                                                            <th>Periode</th>
                                                            <th style="width: 170px;">Keterangan</th>
                                                            <th style="width: 100px;">Lokasi Hardcopy</th>
                                                            <th style="width: 40px;">File MC</th>
                                                            <th style="width: 70px;">Dokumen Lain</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        foreach ($row_mc as $dt) {
                                                            $count = $this->db->query('select COALESCE(count(id_detail_dok),0) as sum from detail_dok_konstruksi where id_mc is not null and id_mc=' . $dt->id_mc)->row()->sum;
                                                        ?>
                                                            <tr align="center">
                                                                <td><?= $no++ ?>.</td>
                                                                <td>Sertifikat Bulanan <?= $dt->nomor_mc ?></td>
                                                                <td><?= $dt->bulan ?> <?= $dt->tahun ?></td>
                                                                <!-- <td><?= date('d-m-Y', strtotime($dt->tanggal)); ?></td> -->

                                                                <td align="left"><?= $dt->keterangan ?></td>
                                                                <td align="left"><?= $dt->kantor ?></td>
                                                                <td>
                                                                    <?php if ($dt->dok_file != null) { ?>
                                                                        <a href="<?= base_url("file_uploads/mc/" . $dt->dok_file) ?>" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-print"></i></a></span>
                                                                    <?php } else { ?>
                                                                        -
                                                                    <?php } ?>
                                                                </td>
                                                                <td>
                                                                    <a href="#" onclick='return view_dokMc(<?= $dt->id_mc ?>)' class="btn btn-sm btn-warning"><i class="fa fa-folder-open-o"></i> <?= $count ?> File</a>
                                                                </td>

                                                            </tr>
                                                        <?php } ?>

                                                    </tbody>
                                                </table>
                                            </div>


                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="penagihan" role="tabpanel" aria-labelledby="contact-tab">
                                        <div class="border p-4 rounded">
                                            <div class="col-lg-12 col-md-6 col-sm-12">
                                                <div class="card widget_2 big_icon traffic">
                                                    <div class="body">
                                                        <?php if ($nilai_terbayar == 0) {
                                                            $persen = 0;
                                                        } else {
                                                            $persen = ($nilai_terbayar / $data['nilai_addendum']) * 100;
                                                        } ?>
                                                        <h6>Terbayar <b>Rp. <?= number_format($nilai_terbayar, 2, ',', '.') ?></b> dari Nilai Kontrak <b>Rp. <?= number_format($data['nilai_addendum'], 2, ',', '.') ?></b></h6>
                                                        <div class="progress m-t-15" style="height: 25px;">
                                                            <div role="progressbar" style="width: <?= round($persen, 2) ?>%; background-color: #008ae2 !important; height: 30px;" aria-valuenow="<?= round($persen, 2) ?>" aria-valuemin="0" aria-valuemax="100" class="progress-bar"><?php echo round($persen, 2) ?>%</div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-title d-flex align-items-center">
                                                <div><i class="bx bxs-file me-1 font-22 text-primary"></i>
                                                </div>
                                                <h5 class="mb-0 text-primary "> <b>&emsp;Penagihan Pembayaran</b></h5>
                                            </div>
                                            <hr />


                                            <div class="table-responsive">
                                                <table id="table3" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                    <thead>
                                                        <tr style="text-align: center; background-color: #98D4FF">
                                                            <th style="width: 10px">No.</th>
                                                            <th style="width: 50px;">Termin ke</th>
                                                            <th>Tanggal Pembayaran</th>
                                                            <th>Nilai (Rp.)</th>
                                                            <th>Keterangan</th>
                                                            <!-- <th>Kelengkapan Dokumen</th> -->
                                                            <th style="width: 120px;">View Dokumen</th>
                                                            <!-- <th style="width: 80px">Aksi</th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        foreach ($row as $dt) {

                                                            $count = $this->db->query('select COALESCE(count(id_detail_dok),0) as sum from detail_dok_konstruksi where id_dok_master in(76,31,32,33,34) and id_pembayaran=' . $dt->id_pembayaran)->row()->sum;
                                                            if ($count < 5) {
                                                                $ket = '<span class="btn btn-sm  btn-warning"><i class="fa fa-warning"></i> Belum Lengkap</span>';
                                                            } else {
                                                                $ket = '<span class="btn btn-sm  btn-success"><i class="fa fa-check"></i> Lengkap</span>';
                                                            }


                                                        ?>
                                                            <tr align="center">
                                                                <td><?php echo $no++ ?>.</td>
                                                                <td><?php echo $dt->termin ?></td>
                                                                <td><?php echo date('d-m-Y', strtotime($dt->tanggal)); ?></td>
                                                                <td><?php echo number_format($dt->nilai, 2, ',', '.') ?></td>
                                                                <td align="left"><?php echo $dt->keterangan ?></td>
                                                                <!-- <td><?php echo $ket ?></td> -->
                                                                <td><?php echo $ket ?>&nbsp; <a href="#" onclick='return view_addendum(<?php echo $dt->id_pembayaran ?>)' class="btn btn-sm btn-primary"><i class="fa fa-folder-open-o"></i> <?php echo $count ?> File</a></td>

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
</div>
</div>

<!-- Modal Add Addendum Konstruksi -->
<div class="modal fade" id="dataAddendumKontrak" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 700px">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h6 class="modal-title">
                    <span class="fw-bold"><b>&emsp; Tambah Addendum Kontrak </b></span>
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" action="<?php echo site_url('Kontrak/act_add_AddendumKonstruksi') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body" style="padding: 2.2rem">

                    <div class="row">
                        <input type="hidden" name="id_kontrak" value="<?= isset($id_kontrak) ? $id_kontrak : '' ?>" class="form-control">
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Addendum Ke-</label>
                                <select class="form-control show-tick ms select2" required="" name="add_ke" data-placeholder="Select">
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
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
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
                                <label>Lingkup Addendum</label><small style="color: red"> (*Kosongkan jika tidak ada)</small>
                                <textarea class="form-control" rows="3" name="keterangan"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Justifikasi</label><small style="color: red"> (*Kosongkan jika tidak ada)</small>
                                <textarea class="form-control" rows="3" name="keterangan_justifikasi"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>File Dokumen Addendum (.pdf)</label> &emsp;&emsp;
                                <div class="browse-wrap">
                                    <input type="file" name="file" class="btn btn-secondary btn-block" accept=".pdf" title="Choose a file to upload">
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
<!-- Modal Edit Addendum Konstruksi -->
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
            <form class="form-horizontal" action="<?php echo site_url('Kontrak/act_update_AddendumKonstruksi') ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="modal-body" style="padding: 2.2rem">

                    <div class="row">
                        <input type="hidden" name="id_kontrak" class="form-control">
                        <input type="hidden" name="id_addendum" class="form-control">
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Addendum Ke-</label>
                                <select class="form-control show-tick ms select2" required="" id="add_ke" name="add_ke" data-placeholder="Select">
                                    <option value="" selected disabled>-- Pilih --</option>
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
                                <input type="text" name="nomor_dok" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Tanggal Dokumen</label>
                                <input type="date" name="tanggal_dok" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Nilai Addendum (Rp.)</label>
                                <input type="text" name="nilai" id="rupiah" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Lingkup Addendum</label>
                                <textarea class="form-control" rows="3" id="keterangan" name="keterangan" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Justifikasi</label>
                                <textarea class="form-control" rows="3" id="keterangan_justifikasi" name="keterangan_justifikasi"></textarea>
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
<!-- Modal Add Dokumen Addendum -->
<div class="modal fade" id="addDokumenAddendum" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 700px">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h6 class="modal-title">
                    <span class="fw-bold">Tambah Dokumen Addendum</span>
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form class="form-horizontal" action="<?= site_url('Kontrak/act_add_TahapanAddendumKonstruksi') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id_kontrak" value="<?= isset($id_kontrak) ? $id_kontrak : '' ?>" class="form-control">
                        <input type="hidden" name="tahapan_add" value="" class="form-control tahapan_add">

                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Nama Dokumen</label>
                                <input type="text" name="nama_dok" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Nomor Dokumen</label>
                                <input type="text" name="nomor_dok" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Tanggal Dokumen</label>
                                <input type="date" name="tanggal_dok" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Lokasi File</label>
                                <select name="lokasi_file" class="form-control select2" required>
                                    <option value="" selected disabled>-- Pilih --</option>
                                    <option value="1">Pusat</option>
                                    <option value="2">Banyudono</option>
                                    <option value="3">Klaten</option>
                                    <option value="4">Prambanan</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>PIC</label>
                                <select name="pic" class="form-control select2" required>
                                    <option value="" selected disabled>-- Pilih --</option>
                                    <option value="Teknik">Teknik</option>
                                    <option value="Lahan">Lahan</option>
                                    <option value="Proyek">Proyek</option>
                                    <option value="SDM dan Umum">SDM dan Umum</option>
                                    <option value="Legal">Legal</option>
                                    <option value="Keuangan">Keuangan</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>File Dokumen Addendum (.pdf)</label>
                                <input type="file" name="dok_file" class="btn-secondary form-control-file" accept=".pdf" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer no-bd">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Edit Dokumen Addendum -->
<div class="modal fade" id="editDokumenAddendum" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 700px">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h6 class="modal-title">
                    <span class="fw-bold"><b>&emsp; Edit Data Dokumen Addendum</b></span>
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" action="<?= site_url('Kontrak/act_update_dokumen_addendum') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body" style="padding: 2.2rem">
                    <div class="row">
                        <input type="hidden" name="id_tahapan_addendum_konstruksi" class="form-control">
                        <input type="hidden" name="id_kontrak_konstruksi" class="form-control">
                        <input type="hidden" name="tahapan_add" class="form-control tahapan_add">
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Nama Dokumen</label>
                                <input type="text" name="nama_dok" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Nomor Dokumen</label>
                                <input type="text" name="nomor_dok" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Tanggal Dokumen</label>
                                <input type="date" name="tanggal_dok" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Lokasi File</label>
                                <select name="lokasi_file" class="form-control select2" required>
                                    <option value="" selected disabled>-- Pilih --</option>
                                    <option value="1">Pusat</option>
                                    <option value="2">Banyudono</option>
                                    <option value="3">Klaten</option>
                                    <option value="4">Prambanan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>PIC</label>
                                <select name="pic" class="form-control select2" required>
                                    <option value="" selected disabled>-- Pilih --</option>
                                    <option value="Teknik">Teknik</option>
                                    <option value="Lahan">Lahan</option>
                                    <option value="Proyek">Proyek</option>
                                    <option value="SDM dan Umum">SDM dan Umum</option>
                                    <option value="Legal">Legal</option>
                                    <option value="Keuangan">Keuangan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Current File</label>
                                <div class="browse-wrap" id="detail_file_addendum">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>File Dokumen Addendum (.pdf)</label><small class="text-danger"> (*Kosongkan jika tidak ingin update file)</small>
                                <input type="file" name="dok_file" class="btn-secondary form-control-file" accept=".pdf">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer no-bd">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal View Dokumen Penagihan -->
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
                                <!-- <tr>
                                        <td align="center">1.</td>
                                        <td>Perhitungan Pajak</td>
                                        <td align="center" id="tpp"></td>
                                    </tr>
                                    <tr>
                                        <td align="center">2.</td>
                                        <td>Disposisi Direksi</td>
                                        <td align="center" id="tdd"></td>
                                    </tr>
                                    <tr>
                                        <td align="center">3.</td>
                                        <td>Ijin Penggunaan Anggaran</td>
                                        <td align="center" id="tipa"></td>
                                    </tr> -->
                                <tr>
                                    <td align="center">1.</td>
                                    <td>Nota Dinas</td>
                                    <td align="center" id="tnd"></td>
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
                                    <td>Kwitansi</td>
                                    <td align="center" id="tkwi"></td>
                                </tr>
                                <tr>
                                    <td align="center">5.</td>
                                    <td>Faktur Pajak (PPN)</td>
                                    <td align="center" id="tppn"></td>
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
<div class="modal fade" id="detailDok" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 700px">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h6 class="modal-title">
                    <span class="fw-bold"><b>&emsp; Dokumen Administrasi Proyek </b></span>
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding: 2.9rem">

                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr style="text-align: center; background-color: #98D4FF">
                                    <th style="width: 10px">No.</th>
                                    <th>Nama Dokumen</th>
                                    <!-- <th>Keterangan</th> -->
                                    <!-- <th>Nilai</th> -->
                                    <th>File</th>
                                    <th>PIC</th>
                                </tr>
                            </thead>
                            <tbody id="detail_dok">

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="<?= base_url('assets/js/kontrak/kontrak.js'); ?>"></script>
<script>
    let nama_dok_usulan = $('.nama_dok_usulan');
    let id_jenis_dokumen_usulan = $('#id_jenis_dokumen_usulan');
    let nama_dok_pengadaan = $('.nama_dok_pengadaan');
    let tableDokumenAddendum;
    const lang = {
        "sProcessing": "Sedang memproses...",
        "sLengthMenu": "Tampilkan _MENU_ entri",
        "sZeroRecords": "Tidak ditemukan data yang sesuai",
        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
        "sInfoPostFix": "",
        "sSearch": "Cari:",
        "sUrl": "",
        "oPaginate": {
            "sFirst": "<<",
            "sPrevious": "<",
            "sNext": ">",
            "sLast": ">>"
        }
    };

    function getDokumenAddendum(id, idKontrakKonstruksi, tableId) {
        $.ajax({
            url: "<?= base_url('kontrak/getDokumenAddendum'); ?>",
            method: "POST",
            data: {
                id: id,
                idKontrakKonstruksi: idKontrakKonstruksi
            },
            success: function(data) {
                if ($.fn.DataTable.isDataTable(tableId)) {
                    tableDokumenAddendum.destroy();
                }
                $(tableId).find('tbody').html(data);
                tableDokumenAddendum = $(tableId).DataTable({
                    columnDefs: [{
                        width: "10px",
                        targets: 0
                    }, ],
                    autoWidth: false
                });
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }

    id_jenis_dokumen_usulan.change(function() {
        nama_dok_usulan.val($(this).find(':selected').text());
    });

    $(document).ready(function() {

        getDokumenDasar({
            url: "<?= base_url('kontrak/getDokumenDasarKontrak'); ?>",
            base_url: '<?= base_url() ?>',
            id_kontrak: '<?= $id_kontrak ?>',
            id_table: '#dt_dokumen_dasar_kontrak',
        });
        getDokumenDasar({
            url: "<?= base_url('kontrak/getDokumenDasarPekerjaan'); ?>",
            base_url: '<?= base_url() ?>',
            id_kontrak: '<?= $id_kontrak ?>',
            id_table: '#dt_dokumen_dasar_pekerjaan',
        });
        $('#dt_dokumen_lain').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "columnDefs": [{
                targets: 0,
                width: "1%",
                className: "dt-nowrap"
            }, {
                "orderable": false,
                "targets": [-1]
            }],
            "ajax": {
                "url": "<?= base_url('kontrak/getDokumenLain') ?>",
                "type": "POST",
                "data": function(data) {
                    data.id_kontrak = '<?= $id_kontrak ?>';
                }
            },
            "columns": [{
                    "data": "id",
                    "className": "text-center"
                },
                {
                    "data": "keterangan",
                    "className": "font-weight-bold"
                },
                {
                    "data": "nomor_dok",
                    "className": "text-center"
                },
                {
                    "data": "tanggal_dok",
                    "className": "text-center"
                },
                {
                    "data": "kantor",
                    "className": "text-center"
                },
                {
                    "data": "pic",
                    "className": "text-center"
                },
                {
                    "data": "dok_file",
                    "className": "text-center"
                }
            ],
            "language": lang
        });

        let tahapan_add = $('.tahapan_add');
        let idKontrakKonstruksi = '<?php echo $id_kontrak ?>';
        let id = $('#selectAddendum').val();
        let idTableDokumenAddendum = '#tableDokumenAddendum';
        getDokumenAddendum(id, idKontrakKonstruksi, idTableDokumenAddendum);
        tahapan_add.val(id);

        $('#selectAddendum').on('change', function() {
            tahapan_add.val($(this).val());
            let selectedId = $(this).val();
            getDokumenAddendum(selectedId, idKontrakKonstruksi, idTableDokumenAddendum);
        });

        let hash = window.location.hash;
        if (hash) {
            $('#tabs_2 a[href="' + hash + '"]').tab('show');
        }

        $('#tabs_2 a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
            history.replaceState(null, null, e.target.hash);
        });

        $('#editAddendum').on('show.bs.modal', function(e) {
            let id_kontrak = $(e.relatedTarget).data('id_kontrak');
            let id_addendum = $(e.relatedTarget).data('id_addendum');
            let add_ke = $(e.relatedTarget).data('add_ke');
            let file = $(e.relatedTarget).data('dok_file');
            let tanggal = $(e.relatedTarget).data('tanggal_dok');
            let nomor_dok = $(e.relatedTarget).data('nomor_dok');
            let nilai = $(e.relatedTarget).data('nilai');
            let reverse = nilai.toString().split('').reverse().join(''),
                ribuan = reverse.match(/\d{1,3}/g);
            ribuan = ribuan.join('.').split('').reverse().join('');
            let keterangan = $(e.relatedTarget).data('keterangan');
            let keterangan_justifikasi = $(e.relatedTarget).data('keterangan_justifikasi');

            let link = "<?= base_url() ?>";
            let evidence = '<a href="' + link + "file_uploads/kontrak_konstruksi/" + file + '" target="_blank" class="btn btn-sm btn-success"><i class="ti ti-printer"></i> Preview</a>';

            $(e.currentTarget).find('input[name="id_kontrak"]').val(id_kontrak);
            $(e.currentTarget).find('input[name="id_addendum"]').val(id_addendum);
            $(e.currentTarget).find('#add_ke').val(add_ke);
            $(e.currentTarget).find('input[name="tanggal_dok"]').val(tanggal);
            $(e.currentTarget).find('input[name="nomor_dok"]').val(nomor_dok);
            $(e.currentTarget).find('input[name="nilai"]').val(ribuan);
            $(e.currentTarget).find('#keterangan').val(keterangan);
            $(e.currentTarget).find('#keterangan_justifikasi').val(keterangan_justifikasi);

            $("#detail_file").html(evidence);
        });

        $('#editDokumenAddendum').on('show.bs.modal', function(e) {
            let id_tahapan_addendum_konstruksi = $(e.relatedTarget).data('id_tahapan_addendum_konstruksi');
            let id_kontrak_konstruksi = $(e.relatedTarget).data('id_kontrak_konstruksi');
            let nama_dok = $(e.relatedTarget).data('nama_dok');
            let nomor_dok = $(e.relatedTarget).data('nomor_dok');
            let tanggal_dok = $(e.relatedTarget).data('tanggal_dok');
            let lokasi_file = $(e.relatedTarget).data('lokasi_file');
            let pic = $(e.relatedTarget).data('pic');
            let dok_file = $(e.relatedTarget).data('dok_file');
            let link = "<?= base_url() ?>";
            let evidence = '<a href="' + link + "file_uploads/kontrak_konstruksi/tahapan_kontrak_konstruksi/" + dok_file + '" target="_blank" class="btn btn-sm btn-success"><i class="ti ti-printer"></i> Preview</a>';

            $(e.currentTarget).find('input[name="id_tahapan_addendum_konstruksi"]').val(id_tahapan_addendum_konstruksi);
            $(e.currentTarget).find('input[name="id_kontrak_konstruksi"]').val(id_kontrak_konstruksi);
            $(e.currentTarget).find('input[name="nama_dok"]').val(nama_dok);
            $(e.currentTarget).find('input[name="nomor_dok"]').val(nomor_dok);
            $(e.currentTarget).find('input[name="tanggal_dok"]').val(tanggal_dok);
            // $(e.currentTarget).find('input[name="lokasi_file"]').val(lokasi_file);
            $(e.currentTarget).find('select[name="lokasi_file"]').val(lokasi_file).trigger('change');
            // $(e.currentTarget).find('input[name="pic"]').val(pic);
            $(e.currentTarget).find('select[name="pic"]').find('option').each(function() {
                if ($(this).text() === pic) {
                    $(this).prop('selected', true);
                }
            });
            $("#detail_file_addendum").html(evidence);
        });

    });

    function view_dokMc($idmc) {
        var link = "<?= base_url() ?>";
        var idmc = $idmc;
        $.ajax({
            type: "GET",
            url: "<?php echo site_url('Kontrak/get_detaildokMc') ?>",
            data: "idmc=" + idmc,
            success: function(response) {
                var data = "";
                var i = 1;
                $.each(JSON.parse(response), function(index, item) {

                    var link = "<?= base_url() ?>";
                    var file = '<a href="' + link + "file_uploads/mc/" + item.dok_file + '" target="_BLANK" class="btn btn-sm  btn-primary"><i class="fa fa-print"></i></a>'
                    var limit = i++;


                    data += "<tr><td style='color:black; text-align:center'>" + limit + "<td style='color:black;'>" + item.keterangan + "<td style='color:black; text-align:center'>" + file + "<td style='color:black; text-align:center'>" + item.pic + "</td></td></td></tr>";

                    $("#detail_dok").html(data);

                    console.log(data);

                });

            }
        });

        $("#detailDok").modal('show');
    };

    function view_addendum($idpembayaran) {
        var link = "<?= base_url() ?>";
        var idpembayaran = $idpembayaran;

        $.ajax({
            type: "GET",
            url: "<?php echo site_url('Kontrak/get_detail_dokPembayaran') ?>",
            data: "idpembayaran=" + idpembayaran,
            success: function(response) {
                var data = "";
                var i = 1;
                var pp = "";
                var bap = "";
                var spp = "";
                var kwi = "";
                var ppn = "";
                // var slip ="";

                var dd = "";
                var ipa = "";
                var nd = "";

                $.each(JSON.parse(response), function(index, item) {

                    if (item.id_dok_master == 79) {
                        if (item.dok_file != null) {
                            pp = '<a href="' + link + "file_uploads/kontrak_konstruksi/dokumen_pembayaran/" + item.dok_file + '" target="_BLANK" class="btn btn-sm  btn-primary"><i class="fa fa-print"></i> View</a>';
                        } else {
                            pp = '';
                        }

                    } else if (item.id_dok_master == 78) {
                        if (item.dok_file != null) {
                            dd = '<a href="' + link + "file_uploads/kontrak_konstruksi/dokumen_pembayaran/" + item.dok_file + '" target="_BLANK" class="btn btn-sm  btn-primary"><i class="fa fa-print"></i> View</a>';
                        } else {
                            dd = '';
                        }

                    } else if (item.id_dok_master == 77) {
                        if (item.dok_file != null) {
                            ipa = '<a href="' + link + "file_uploads/kontrak_konstruksi/dokumen_pembayaran/" + item.dok_file + '" target="_BLANK" class="btn btn-sm  btn-primary"><i class="fa fa-print"></i> View</a>';
                        } else {
                            ipa = '';
                        }

                    } else if (item.id_dok_master == 76) {
                        if (item.dok_file != null) {
                            nd = '<a href="' + link + "file_uploads/kontrak_konstruksi/dokumen_pembayaran/" + item.dok_file + '" target="_BLANK" class="btn btn-sm  btn-primary"><i class="fa fa-print"></i> View</a>';
                        } else {
                            nd = '';
                        }

                    } else if (item.id_dok_master == 31) {
                        if (item.dok_file != null) {
                            bap = '<a href="' + link + "file_uploads/kontrak_konstruksi/dokumen_pembayaran/" + item.dok_file + '" target="_BLANK" class="btn btn-sm  btn-primary"><i class="fa fa-print"></i> View</a>';
                        } else {
                            bap = '';
                        }

                    } else if (item.id_dok_master == 32) {
                        if (item.dok_file != null) {
                            spp = '<a href="' + link + "file_uploads/kontrak_konstruksi/dokumen_pembayaran/" + item.dok_file + '" target="_BLANK" class="btn btn-sm  btn-primary"><i class="fa fa-print"></i> View</a>';
                        } else {
                            spp = '';
                        }

                    } else if (item.id_dok_master == 33) {
                        if (item.dok_file != null) {
                            kwi = '<a href="' + link + "file_uploads/kontrak_konstruksi/dokumen_pembayaran/" + item.dok_file + '" target="_BLANK" class="btn btn-sm  btn-primary"><i class="fa fa-print"></i> View</a>';
                        } else {
                            kwi = '';
                        }

                    } else if (item.id_dok_master == 34) {
                        if (item.dok_file != null) {
                            ppn = '<a href="' + link + "file_uploads/kontrak_konstruksi/dokumen_pembayaran/" + item.dok_file + '" target="_BLANK" class="btn btn-sm  btn-primary"><i class="fa fa-print"></i> View</a>';
                        } else {
                            ppn = '';
                        }

                    }
                    // else if(item.id_dok_master==35){
                    //     if(item.dok_file!=null){
                    //         slip = '<a href="'+link+"file_uploads/kontrak_konstruksi/dokumen_pembayaran/"+item.dok_file+'" target="_BLANK" class="btn btn-sm  btn-primary"><i class="fa fa-print"></i> View</a>';        
                    //     }else{
                    //         slip = '';
                    //     }

                    // }

                });

                $("#tview-dok").show();
                $("#tpp").html(pp);
                $("#tdd").html(dd);
                $("#tipa").html(ipa);
                $("#tnd").html(nd);
                $("#tbap").html(bap);
                $("#tspp").html(spp);
                $("#tkwi").html(kwi);
                $("#tppn").html(ppn);
                // $("#tslip").html(slip);

            }
        });
        $("#dokPembayaran").modal('show');
    };
</script>