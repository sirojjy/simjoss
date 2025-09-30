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
                                            $data = $this->db->query("select *from kontrak_konstruksi where id_kontrak_konstruksi=" . $id_kontrak)->row_array();
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


                                            <!-- <div class="row mb-3">
                                                            <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Tanggal Berakhir</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" required="" value="<?php echo date('d-m-Y', strtotime($data['tanggal_akhir'])); ?>" name="tanggal_akhir" class="form-control">
                                                            </div>
                                                        </div> -->
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
                                                    <input type="text" required="" value="<?php echo number_format($data['nilai_add'], 2, ',', '.') ?>" name="nilai" id="rupiah" class="form-control">
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
                                                <table class="table table-bordered table-striped table-hover ">
                                                    <thead>
                                                        <tr style="text-align: center; background-color: #98D4FF">
                                                            <th style="width: 10px;">No.</th>
                                                            <th style="width: 300px;">Nama File</th>
                                                            <th style="width: 220px;">No. Dokumen</th>

                                                            <th style="width: 130px;">Tanggal Dokumen</th>
                                                            <th>Lokasi Hardcopy</th>
                                                            <th>PIC</th>
                                                            <th>File</th>
                                                            <!-- <th>Aksi</th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        // $dok_kontrak = $this->db->query("select *from dok_master join kelengkapan_dok_konstruksi on kelengkapan_dok_konstruksi.id_dok_master=dok_master.id_dok_master where jenis_dok=1 and id_kontrak=".$id_kontrak." order by dok_master.id_dok_master ASC")->result();
                                                        $dok_kontrak = $this->db->query("select * from dok_master where id_dok_master in(52,53,3,72,73,1,74) order by id_dok_master ASC")->result();
                                                        foreach ($dok_kontrak as $dt) {
                                                            $detail_dok = $this->db->query('select * from detail_dok_konstruksi where id_kontrak_konstruksi=' . $id_kontrak . ' and id_dok_master=' . $dt->id_dok_master)->row_array();
                                                            if (!isset($detail_dok['nomor_dok'])) {
                                                                $nomor_dok = '-';
                                                                $tanggal = '-';
                                                                $pic = '-';
                                                                $lokasi = '-';
                                                            } else {
                                                                $nomor_dok = $detail_dok['nomor_dok'];
                                                                $tanggal = date('d-m-Y', strtotime($detail_dok['tanggal_dok']));
                                                                $pic = ' ';
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
                                                                    <?php if (!isset($detail_dok['nomor_dok'])) { ?>
                                                                        <button type="button" class="btn btn-danger btn-sm">Belum diupload</button>
                                                                    <?php } else { ?>
                                                                        <?php if (!isset($detail_dok['dok_file'])) { ?>
                                                                            <button type="button" class="btn btn-danger btn-sm">Belum diupload</button>
                                                                        <?php } else { ?>
                                                                            <a href="<?php base_url("file_uploads/kontrak_konstruksi/") . $detail_dok['dok_file'] ?>" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-print"></i></a>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                </td>

                                                            </tr>
                                                        <?php } ?>
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
                                                <table class="table table-bordered table-striped table-hover ">
                                                    <thead>
                                                        <tr style="text-align: center; background-color: #98D4FF">
                                                            <th style="width: 10px;">No.</th>
                                                            <th style="width: 300px;">Nama File</th>
                                                            <th style="width: 220px;">No. Dokumen</th>

                                                            <th style="width: 130px;">Tanggal Dokumen</th>
                                                            <th>Lokasi Hardcopy</th>
                                                            <th>PIC</th>
                                                            <th>File</th>
                                                            <!-- <th>Aksi</th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        // $dok_kontrak = $this->db->query("select *from dok_master join kelengkapan_dok_konstruksi on kelengkapan_dok_konstruksi.id_dok_master=dok_master.id_dok_master where jenis_dok=2 and id_kontrak=".$id_kontrak." order by dok_master.id_dok_master ASC")->result();
                                                        $dok_kontrak = $this->db->query("select *from dok_master where id_dok_master in(10,11,12,13,14,15,75) order by id_dok_master ASC")->result();
                                                        foreach ($dok_kontrak as $dt) {
                                                            $detail_dok = $this->db->query('select * from detail_dok_konstruksi where id_kontrak_konstruksi=' . $id_kontrak . ' and id_dok_master=' . $dt->id_dok_master)->row_array();
                                                            if (!isset($detail_dok['nomor_dok'])) {
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
                                                                    <?php if (!isset($detail_dok['nomor_dok'])) { ?>
                                                                        <button type="button" class="btn btn-danger btn-sm">Belum diupload</button>
                                                                    <?php } else { ?>
                                                                        <?php if (!isset($detail_dok['dok_file'])) { ?>
                                                                            <button type="button" class="btn btn-danger btn-sm">Belum diupload</button>
                                                                        <?php } else { ?>
                                                                            <a href="<?php base_url("file_uploads/kontrak_konstruksi/" . $detail_dok['dok_file']) ?>" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-print"></i></a>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                </td>

                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>

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
                                                <table id="table4" class="table table-bordered table-striped table-hover">
                                                    <thead>
                                                        <tr style="text-align: center; background-color: #98D4FF">
                                                            <th style="width: 10px;">No.</th>
                                                            <th style="width: 300px;">Nama File</th>
                                                            <th style="width: 230px;">No. Dokumen</th>

                                                            <th style="width: 110px;">Tanggal Dokumen</th>
                                                            <th>Lokasi Hardcopy</th>
                                                            <th>PIC</th>
                                                            <th>File</th>
                                                            <!-- <th>Aksi</th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        $dok_lain = $this->db->query('select * from detail_dok_konstruksi where id_kontrak_konstruksi = ? and id_dok_master = 100 order by tanggal_dok DESC', array($id_kontrak))->result();

                                                        foreach ($dok_lain as $dt) {

                                                            $dok = base_url("file_uploads/kontrak_konstruksi/" . $dt->dok_file);

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
                                                <table id="zero_config" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                    <thead>
                                                        <tr style="text-align: center; background-color: #98D4FF">
                                                            <th style="width: 10px">No.</th>
                                                            <th style="width: 30px;">Add- ke</th>
                                                            <th style="width: 200px;">No. Dokumen</th>
                                                            <th style="width: 90px;">Tanggal</th>
                                                            <th style="width: 50px;">Nilai (Rp.)</th>
                                                            <th style="width: 200px;">Lingkup Addendum</th>
                                                            <th style="width: 40px;">Justifikasi</th>
                                                            <th style="width: 40px;">File</th>

                                                            <?php if ($this->session->userdata('level_user') == 1) { ?>
                                                                <th style="width: 80px;">Aksi</th>
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
                                                <h5 class="mb-0 text-primary"><b> Dokumen Usulan Pengadaan Addendum </b></h5>
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
                                                                <a href="#" data-toggle="modal" class="mr-2" data-target="#tahapanAddUsulan" data-id_kontrak="<?= $dt->id_kontrak_konstruksi ?>">
                                                                    <button type="button" class="btn btn-default">
                                                                        <i class="fa fa-plus"></i>&nbsp; Dokumen Usulan
                                                                    </button>
                                                                </a>
                                                            <?php endforeach; ?>
                                                            <?php foreach ($data_kontrak_konstruksi as $dt): ?>
                                                                <a href="#" data-toggle="modal" class="mr-2" data-target="#tahapanAddPengadaan" data-id_kontrak="<?= $dt->id_kontrak_konstruksi ?>">
                                                                    <button type="button" class="btn btn-default">
                                                                        <i class="fa fa-plus"></i>&nbsp; Dokumen Pengadaan
                                                                    </button>
                                                                </a>
                                                            <?php endforeach; ?>
                                                            <?php foreach ($data_kontrak_konstruksi as $dt): ?>
                                                                <a href="#" data-toggle="modal" class="mr-2" data-target="#tahapanAddendumKonstruksi" data-id_kontrak="<?= $dt->id_kontrak_konstruksi ?>">
                                                                    <button type="button" class="btn btn-default">
                                                                        <i class="fa fa-plus"></i>&nbsp; Dokumen Lainnya
                                                                    </button>
                                                                </a>
                                                            <?php endforeach; ?>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <hr />
                                            <div class="table-responsive">
                                                <table id="tableDokumenUsulan" class="table table-bordered table-striped table-hover js-basic-example dataTable">
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

                                        <div class="border p-4 mt-2 rounded">
                                            <div class="card-title d-flex justify-content-between align-items-center">
                                                <h5 class="mb-0 text-primary"><b> Dokumen Pengadaan Addendum </b></h5>
                                                <div class="d-flex align-items-center">
                                                    <?php if ($addendum_available != null) { ?>
                                                        <?php if ($this->session->userdata('level_user') == 1) { ?>
                                                            <?php foreach ($data_kontrak_konstruksi as $dt): ?>
                                                                <a href="#" data-toggle="modal" data-target="#tahapanAddPengadaan" data-id_kontrak="<?= $dt->id_kontrak_konstruksi ?>">
                                                                    <button type="button" class="btn btn-default">
                                                                        <i class="fa fa-plus"></i>&nbsp; Tambah Dokumen
                                                                    </button>
                                                                </a>
                                                            <?php endforeach; ?>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <hr />
                                            <div class="table-responsive">
                                                <table id="tableDokumenPengadaan" class="table table-bordered table-striped table-hover js-basic-example dataTable">
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

                                        <div class="border p-4 mt-2 rounded">
                                            <div class="card-title d-flex justify-content-between align-items-center">
                                                <h5 class="mb-0 text-primary"><b> Dokumen Lainnya</b></h5>
                                                <div class="d-flex align-items-center">
                                                    <?php if ($addendum_available != null) { ?>
                                                        <?php if ($this->session->userdata('level_user') == 1) { ?>
                                                            <?php foreach ($data_kontrak_konstruksi as $dt): ?>
                                                                <a href="#" data-toggle="modal" data-target="#tahapanAddendumKonstruksi" data-id_kontrak="<?= $dt->id_kontrak_konstruksi ?>">
                                                                    <button type="button" class="btn btn-default">
                                                                        <i class="fa fa-plus"></i>&nbsp; Tambah Dokumen Lainnya
                                                                    </button>
                                                                </a>
                                                            <?php endforeach; ?>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <hr />
                                            <div class="table-responsive">
                                                <table id="tableDokumenLainnya" class="table table-bordered table-striped table-hover js-basic-example dataTable">
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
                                                            $persen = ($nilai_terbayar / $data['nilai_add']) * 100;
                                                        } ?>
                                                        <h6>Terbayar <b>Rp. <?= number_format($nilai_terbayar, 2, ',', '.') ?></b> dari Nilai Kontrak <b>Rp. <?= number_format($data['nilai_add'], 2, ',', '.') ?></b></h6>
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
                                <label>Lingkup Addenmdum</label><small style="color: red"> (*Kosongkan jika tidak ada)</small>
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

<div class="modal fade" id="tahapanAddUsulan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 700px">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h6 class="modal-title">
                    <span class="fw-bold"><b>&emsp; Tambah Dokumen Usulan Pengadaan Addendum</b></span>
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form class="form-horizontal" action="<?= site_url('Kontrak/act_add_TahapanUsulanAddendum') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body" style="padding: 2.2rem">
                    <div class="row">
                        <input type="hidden" name="id_kontrak" value="<?= isset($id_kontrak) ? $id_kontrak : '' ?>" class="form-control">
                        <input type="hidden" name="tahapan_add" value="" class="form-control tahapan_add">
                        <input type="hidden" name="nama_dokumen" value="" class="form-control nama_dok_usulan">
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Nama Dokumen Addendum</label>
                                <select class="form-control select2" required name="id_jenis_dokumen" data-placeholder="Pilih Tahapan" id="id_jenis_dokumen">
                                    <option value="">-- Pilih --</option>
                                    <option value="1">Surat Usulan Addendum</option>
                                    <option value="2">Hasil Evaluasi Usulan Addendum</option>
                                    <option value="3">Undangan Rapat Evaluasi Usulan Addendum</option>
                                    <option value="4">Berita Acara Rapat Evaluasi Usulan Addendum</option>
                                    <option value="5">Permohonan Ijin Prinsip</option>
                                    <option value="6">Persetujuan Ijin Prinsip</option>
                                    <option value="7">Permohonan Evaluasi kepada PAPENKON</option>
                                    <option value="8">Permohonan Rancangan Dokumen Pengadaan Addendum</option>
                                    <option value="9">Persetujuan Rancangan Dokumen Pengadaan Addendum</option>
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
                                <label>Lokasi File</label>
                                <select name="lokasi_file" class="form-control select2" required>
                                    <option selected disabled>-- Pilih --</option>
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
                                    <option selected disabled>-- Pilih --</option>
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

<div class="modal fade" id="tahapanAddPengadaan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 700px">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h6 class="modal-title">
                    <span class="fw-bold"><b>&emsp; Tambah Dokumen Pengadaan Addendum</b></span>
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form class="form-horizontal" action="<?= site_url('Kontrak/act_add_TahapanPengadaanAddendum') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body" style="padding: 2.2rem">
                    <div class="row">
                        <input type="hidden" name="id_kontrak" value="<?= isset($id_kontrak) ? $id_kontrak : '' ?>" class="form-control">
                        <input type="hidden" name="tahapan_add" value="" class="form-control tahapan_add">
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Nama Dokumen Addendum</label>
                                <select class="form-control select2" required name="nama_dok" data-placeholder="Pilih Tahapan">
                                    <option value="">-- Pilih --</option>
                                    <option value="Rancangan Addendum">Rancangan Addendum</option>
                                    <option value="KAK ">KAK</option>
                                    <option value="KUK ">KUK</option>
                                    <option value="KKK ">KKK</option>
                                    <option value="Perkiraan Biaya ">Perkiraan Biaya</option>
                                    <option value="Spesifikasi Teknis ">Spesifikasi Teknis</option>
                                    <option value="IKP ">IKP</option>
                                    <option value="Dokumen Kualifikasi ">Dokumen Kualifikasi</option>
                                    <option value="SPMK ">SPMK</option>
                                    <option value="Kontrak Addendum ">Kontrak Addendum</option>
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
                                <label>Lokasi File</label>
                                <select name="lokasi_file" class="form-control select2" required>
                                    <option selected disabled>-- Pilih --</option>
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
                                    <option selected disabled>-- Pilih --</option>
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

<div class="modal fade" id="tahapanAddendumKonstruksi" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 700px">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h6 class="modal-title">
                    <span class="fw-bold"><b>&emsp; Tahapan Dokumen Lainnya </b></span>
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form class="form-horizontal" action="<?= site_url('Kontrak/act_add_TahapanAddendumKonstruksi') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body" style="padding: 2.2rem">
                    <div class="row">
                        <input type="hidden" name="id_kontrak" value="<?= isset($id_kontrak) ? $id_kontrak : '' ?>" class="form-control">
                        <input type="hidden" name="tahapan_add" value="" class="form-control tahapan_add">

                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Nama Dokumen</label>
                                <input type="text" name="nama_dok" class="form-control">
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
                                <label>Lokasi File</label>
                                <select name="lokasi_file" class="form-control select2" required>
                                    <option selected disabled>-- Pilih --</option>
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
                                    <option selected disabled>-- Pilih --</option>
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

<div class="modal fade" id="editTahapanAddendum" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 700px">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h6 class="modal-title">
                    <span class="fw-bold"><b>&emsp; Edit Data Tahapan Addendum</b></span>
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" action="<?php echo site_url('Kontrak/act_update_TahapanAddendumKonstruksi') ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="modal-body" style="padding: 2.2rem">

                    <div class="row">
                        <input type="hidden" name="id_kontrak" class="form-control">
                        <input type="hidden" name="id_tahapan_addendum_konstruksi" class="form-control">
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Tahapan Addendum</label>
                                <select class="form-control select2" required name="tahapan_add" data-placeholder="Pilih Tahapan">
                                    <option value="">-- Pilih --</option>
                                    <option value="Rapat Evaluasi Papenkon">Rapat Evaluasi Papenkon</option>
                                    <option value="Berita Acara Evaluasi Papenkon">Berita Acara Evaluasi Papenkon</option>
                                    <option value="Rekomendasi Papenkon">Rekomendasi Papenkon</option>
                                    <option value="Persetujuan Addendum KPA">Persetujuan Addendum KPA</option>
                                    <option value="Berita Acara Addendum">Berita Acara Addendum</option>
                                    <option value="Dokumen Addendum Kontrak">Dokumen Addendum Kontrak</option>
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
                                <div class="browse-wrap" id="detail_file_tahapan">

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
                                <label>Lingkup Addendum</label>
                                <textarea class="form-control" rows="3" id="keterangan" name="keterangan"></textarea>
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
<script>
    let nama_dok_usulan = $('.nama_dok_usulan');
    let id_jenis_dokumen = $('#id_jenis_dokumen');
    let tableDokumenUsulan;
    let tableDokumenPengadaan;
    let tableDokumenLainnya;

    function getDokumenLainnya(id, idKontrakKonstruksi, tableId) {
        $.ajax({
            url: "<?= base_url('kontrak/getDokumenLainnya'); ?>",
            method: "POST",
            data: {
                id: id,
                idKontrakKonstruksi: idKontrakKonstruksi
            },
            success: function(data) {
                if ($.fn.DataTable.isDataTable(tableId)) {
                    tableDokumenLainnya.destroy();
                }
                $(tableId).find('tbody').html(data);
                tableDokumenLainnya = $(tableId).DataTable({
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

    function getDokumenPengadaan(id, idKontrakKonstruksi, tableId) {
        $.ajax({
            url: "<?= base_url('kontrak/getDokumenPengadaan'); ?>",
            method: "POST",
            data: {
                id: id,
                idKontrakKonstruksi: idKontrakKonstruksi
            },
            success: function(data) {
                if ($.fn.DataTable.isDataTable(tableId)) {
                    tableDokumenPengadaan.destroy();
                }
                $(tableId).find('tbody').html(data);
                tableDokumenPengadaan = $(tableId).DataTable({
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

    function getDokumenUsulan(id, idKontrakKonstruksi, tableId) {
        $.ajax({
            url: "<?= base_url('kontrak/getDokumenUsulan'); ?>",
            method: "POST",
            data: {
                id: id,
                idKontrakKonstruksi: idKontrakKonstruksi
            },
            success: function(data) {
                if ($.fn.DataTable.isDataTable(tableId)) {
                    tableDokumenUsulan.destroy();
                }
                $(tableId).find('tbody').html(data);
                tableDokumenUsulan = $(tableId).DataTable({
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

    id_jenis_dokumen.change(function() {
        nama_dok_usulan.val($(this).find(':selected').text());
    });

    $(document).ready(function() {
        let tahapan_add = $('.tahapan_add');
        let idKontrakKonstruksi = '<?php echo $id_kontrak ?>';
        let id = $('#selectAddendum').val();
        let idTableDokumenLainnya = '#tableDokumenLainnya';
        let idTableDokumenUsulan = '#tableDokumenUsulan';
        let idTableDokumenPengadaan = '#tableDokumenPengadaan';
        getDokumenUsulan(id, idKontrakKonstruksi, idTableDokumenUsulan);
        // getDokumenPengadaan(id, idKontrakKonstruksi, idTableDokumenPengadaan);
        // getDokumenLainnya(id, idKontrakKonstruksi, idTableDokumenLainnya);
        // tahapan_add.val(id);

        $('#selectAddendum').on('change', function() {
            tahapan_add.val($(this).val());
            let selectedId = $(this).val();
            getDokumenUsulan(selectedId, idKontrakKonstruksi, idTableDokumenUsulan);
            // getDokumenPengadaan(selectedId, idKontrakKonstruksi, idTableDokumenPengadaan);
            // getDokumenLainnya(selectedId, idKontrakKonstruksi, idTableDokumenLainnya);
        });

        let hash = window.location.hash;
        if (hash) {
            $('#tabs_2 a[href="' + hash + '"]').tab('show');
        }

        // Update URL hash saat tab diklik
        $('#tabs_2 a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
            history.replaceState(null, null, e.target.hash);
        });
    });
</script>
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
            var keterangan_justifikasi = $(e.relatedTarget).data('keterangan_justifikasi');

            var link = "<?= base_url() ?>";
            var evidence = '<a href="' + link + "file_uploads/kontrak_konstruksi/" + file + '" target="_blank" class="btn btn-sm btn-success"><i class="ti ti-printer"></i> Preview</a>';

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

    });

    $(document).ready(function() {
        $('#editTahapanAddendum').on('show.bs.modal', function(e) {
            var id_kontrak = $(e.relatedTarget).data('id_kontrak');
            var id_tahapan_addendum_konstruksi = $(e.relatedTarget).data('id_tahapan_addendum_konstruksi');
            var tahapan_add = $(e.relatedTarget).data('tahapan_add');
            var file = $(e.relatedTarget).data('dok_file');
            var tanggal = $(e.relatedTarget).data('tanggal_dok');
            var nomor_dok = $(e.relatedTarget).data('nomor_dok');
            var nilai = $(e.relatedTarget).data('nilai');
            var reverse = nilai.toString().split('').reverse().join(''),
                ribuan = reverse.match(/\d{1,3}/g);
            ribuan = ribuan.join('.').split('').reverse().join('');
            var keterangan = $(e.relatedTarget).data('keterangan');

            var link = "<?= base_url() ?>";
            var evidence = '<a href="' + link + "file_uploads/kontrak_konstruksi/" + file + '" target="_blank" class="btn btn-sm btn-success"><i class="ti ti-printer"></i> Preview</a>';

            $(e.currentTarget).find('input[name="id_kontrak"]').val(id_kontrak);
            $(e.currentTarget).find('input[name="id_tahapan_addendum_konstruksi"]').val(id_tahapan_addendum_konstruksi);
            $(e.currentTarget).find('#tahapan_add').val(tahapan_add);
            $(e.currentTarget).find('input[name="tanggal_dok"]').val(tanggal);
            $(e.currentTarget).find('input[name="nomor_dok"]').val(nomor_dok);
            $(e.currentTarget).find('input[name="nilai"]').val(ribuan);
            $(e.currentTarget).find('#keterangan').val(keterangan);

            $("#detail_file_tahapan").html(evidence);
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