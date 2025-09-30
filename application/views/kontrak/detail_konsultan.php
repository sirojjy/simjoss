<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand font-weight-bold" href="javascript:void(0);">Detail Kontrak</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-align-justify"></i>
    </button>
</nav>
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12">
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('error') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
            <?php elseif ($this->session->flashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('success') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
            <?php else: ?>
            <?php endif; ?>
            <div class="card">
                <div class="card-body border-bottom">
                    <h5 class="card-title mb-0 font-weight-bold"><?= $nama_kontrak ?></h5>
                </div>
                <div class="card-body">
                    <div class="row-wrapper">
                        <div class="row cols-xs-space cols-sm-space cols-md-space">
                            <div class="col-lg-12">
                                <ul class="nav nav-pills nav-fill mb-3" id="tabs_2" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="data_kontrak-tab" data-toggle="tab" href="#data_kontrak" role="tab" aria-controls="data_kontrak" aria-selected="true">
                                            <span class="nav-link-icon d-block"><i class="fa fa-list fa-2x"></i></span>
                                            <span class="d-none d-sm-block mt-1">Data Kontrak</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="data_addendum-tab" data-toggle="tab" href="#data_addendum" role="tab" aria-controls="data_addendum" aria-selected="false">
                                            <span class="nav-link-icon d-block"><i class="fa fa-book fa-2x"></i></span>
                                            <span class="d-none d-sm-block mt-1">Data Addendum</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="administrasi_proyek-tab" data-toggle="tab" href="#administrasi_proyek" role="tab" aria-controls="administrasi_proyek" aria-selected="false">
                                            <span class="nav-link-icon d-block"><i class="fa fa-cogs fa-2x"></i></span>
                                            <span class="d-none d-sm-block mt-1">Administrasi Proyek</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="penagihan-tab" data-toggle="tab" href="#penagihan" role="tab" aria-controls="penagihan" aria-selected="false">
                                            <span class="nav-link-icon d-block"><i class="fa fa-credit-card fa-2x"></i></span>
                                            <span class="d-none d-sm-block mt-1">Penagihan Pembayaran</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="data_kontrak" role="tabpanel" aria-labelledby="data_kontrak-tab">
                                        <div class="border p-4 rounded">
                                            <div class="card-title d-flex align-items-center">
                                                <div><i class="bx bxs-file me-1 font-22 text-primary"></i>
                                                </div>
                                                <h5 class="mb-0 text-primary "> <b> Data Kontrak</b></h5>
                                            </div>
                                            <hr />
                                            <?php
                                            $data = $this->db->query("select *from tb_kontrak_konsultan where id_kontrak_konsultan=" . $id_kontrak)->row_array();
                                            ?>
                                            <div class="row mb-3">
                                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Nama Kontrak</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" required="" name="nama_kontrak" rows="3"><?php echo $data['nama_kontrak'] ?></textarea>
                                                </div>
                                            </div>
                                            <?php if ($data['jenis'] == 1) { ?>
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
                                            <?php } else { ?>
                                                <div class="row mb-3">
                                                    <label for="inputEnterYourName" class="col-sm-3 col-form-label">Lokasi Pekerjaan</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" required="" value="<?php echo $data['lokasi'] ?>" class="form-control">
                                                    </div>
                                                </div>
                                            <?php } ?>
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
                                            <br>

                                        </div>

                                        <div class="border p-4 rounded mt-2">
                                            <div class="card-title d-flex align-items-center">
                                                <div><i class="bx bxs-file me-1 font-22 text-primary"></i>
                                                </div>
                                                <h5 class="mb-0 text-primary"> <b>Dokumen Dasar Kontrak</b></h5>
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
                                                            $detail_dok = $this->db->query('select * from detail_dok_konsultan where id_kontrak_konsultan=' . $id_kontrak . ' and id_dok_master=' . $dt->id_dok_master)->row_array();
                                                            $dok = base_url("file_uploads/kontrak_konsultan/" . $detail_dok['dok_file']);

                                                            if ($detail_dok['nomor_dok'] == null) {
                                                                $nomor_dok = '-';
                                                                $tanggal = '-';
                                                                $pic = '-';
                                                                $lokasi = '-';
                                                            } else {
                                                                $nomor_dok = $detail_dok['nomor_dok'];
                                                                $tanggal = date('d-m-Y', strtotime($detail_dok['tanggal_dok']));
                                                                $pic = $detail_dok['pic'];
                                                                $lokasi = $detail_dok['kantor'] . ' ' . $detail_dok['no_rak'] . ' ' . $detail_dok['no_box'];;
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
                                                                        <button type="button" class="btn btn-danger btn-sm">Belum diupload</button>
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
                                                            $detail_dok = $this->db->query('select * from detail_dok_konsultan where id_kontrak_konsultan=' . $id_kontrak . ' and id_dok_master=' . $dt->id_dok_master)->row_array();
                                                            $dok = base_url("file_uploads/kontrak_konsultan/" . $detail_dok['dok_file']);

                                                            if ($detail_dok['nomor_dok'] == null) {
                                                                $nomor_dok = '-';
                                                                $tanggal = '-';
                                                                $pic = '-';
                                                                $lokasi = '-';
                                                            } else {
                                                                $nomor_dok = $detail_dok['nomor_dok'];
                                                                $tanggal = date('d-m-Y', strtotime($detail_dok['tanggal_dok']));
                                                                $pic = $detail_dok['pic'];
                                                                $lokasi = $detail_dok['kantor'] . ' ' . $detail_dok['no_rak'] . ' ' . $detail_dok['no_box'];;
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
                                                                        <button type="button" class="btn btn-danger btn-sm">Belum diupload</button>
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
                                                <table id="table3" class="table table-bordered table-striped table-hover js-basic-example dataTable">
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
                                                        $dok_lain = $this->db->query('select * from detail_dok_konsultan where id_kontrak_konsultan=' . $id_kontrak . ' and id_dok_master=100 order by tanggal_dok DESC')->result();

                                                        foreach ($dok_lain as $dt) {

                                                            $dok = base_url("file_uploads/kontrak_konsultan/" . $dt->dok_file);

                                                            if ($dt->nomor_dok == null) {
                                                                $nomor_dok = '-';
                                                                $tanggal = '-';
                                                                $pic = '-';
                                                                $lokasi = '-';
                                                            } else {
                                                                $nomor_dok = $dt->nomor_dok;
                                                                $tanggal = date('d-m-Y', strtotime($dt->tanggal_dok));
                                                                $pic = $dt->pic;
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

                                    <div class="tab-pane fade" id="data_addendum" role="tabpanel" aria-labelledby="data_addendum-tab">
                                        <div class="border p-4 rounded">
                                            <div class="card-title d-flex justify-content-between align-items-center">
                                                <h5 class="mb-0 text-primary font-weight-bold">Data Addendum Kontrak</h5>
                                                <a href="#" data-toggle="modal" data-target="#addAddendumKonsultan"><button type="button" class="btn btn-default"><i class="fa fa-plus mr-1"></i> Tambah Data</button></a>
                                            </div>
                                            <hr />

                                            <div class="table-responsive">
                                                <table id="table2" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                    <thead>
                                                        <tr style="text-align: center; background-color: #98D4FF">
                                                            <th style="width: 10px">No.</th>
                                                            <th style="width: 30px;">Addendum ke</th>
                                                            <th>No. Dokumen</th>
                                                            <th style="width: 70px;">Tanggal</th>
                                                            <th style="width: 50px;">Nilai (Rp.)</th>
                                                            <th style="width: 200px;">Lingkup Addendum</th>
                                                            <th style="width: 200px;">Justifikasi</th>
                                                            <th style="width: 40px;">File</th>
                                                            <!-- <th style="width: 40px;">File Justifikasi</th> -->
                                                            <?php if ($this->session->userdata('level_user') == 1) { ?>
                                                                <th style="width: 60px;">Aksi</th>
                                                            <?php } ?>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        $data_add = $this->db->query("select *from addendum_konsultan where id_kontrak=" . $id_kontrak . " order by add_ke ASC")->result();
                                                        foreach ($data_add as $ad) {
                                                            if ($ad->file_eksternal == null) {
                                                                $file_eks = '/';
                                                            } else {
                                                                $link = base_url("file_uploads/kontrak_konsultan/" . $ad->file_eksternal);
                                                                $file_eks = '<a href="' . $link . '" target="_BLANK" class="btn btn-sm  btn-primary"><i class="fa fa-print"></i></a>';
                                                            }
                                                        ?>
                                                            <tr class="text-center">
                                                                <td><?= $no++ ?>.</td>
                                                                <td><?= $ad->add_ke ?></td>
                                                                <td class="text-left"><?= $ad->nomor_dok ?></td>
                                                                <td><?= date('d-m-Y', strtotime($ad->tanggal_dok)); ?></td>
                                                                <td><?= number_format($ad->nilai, 2, ',', '.') ?></td>
                                                                <td class="text-left"><?= $ad->keterangan ?></td>
                                                                <td class="text-left"><?= ($ad->justifikasi_eks == null ? '-' : $ad->justifikasi_eks) ?></td>
                                                                <td><a target="_blank" href="<?= base_url("file_uploads/kontrak_konsultan/" . $ad->dok_file) ?>"><button class="btn btn-sm btn-primary"><i class="fa fa-print"></i> </button></a></td>
                                                                <?php if ($this->session->userdata('level_user') == 1) { ?>
                                                                    <td>
                                                                        <a class="btn btn-success btn-sm" href="#" data-toggle="modal" data-target="#editAddendum" data-id_addendum="<?= $ad->id_addendum ?>" data-id_kontrak="<?= $ad->id_kontrak ?>" data-nomor_dok="<?= $ad->nomor_dok ?>" data-add_ke="<?= $ad->add_ke ?>" data-tanggal_dok="<?= $ad->tanggal_dok ?>" data-nilai="<?= $ad->nilai ?>" data-keterangan="<?= $ad->keterangan ?>" data-justifikasi_eks="<?= $ad->justifikasi_eks ?>" data-dok_file="<?= $ad->dok_file ?>"><i class="fa fa-edit"></i></a>
                                                                        <a class="btn btn-danger btn-sm" href="<?= site_url('Kontrak_konsultan/hapus_addendum/' . $ad->id_addendum . '/' . $ad->id_kontrak) ?>" onClick="javasciprt: return confirm('Yakin menghapus data ?')"><i class="fa fa-trash"></i></a>
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
                                                            <?php foreach ($data_kontrak_konsultan as $dt): ?>
                                                                <a href="#" data-toggle="modal" class="mr-2" data-target="#addDokumenAddendum" data-id_kontrak="<?= $dt->id_kontrak_konsultan ?>">
                                                                    <button type="button" class="btn btn-default">
                                                                        <i class="fa fa-plus mr-2"></i>Dokumen Addendum
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

                                    <div class="tab-pane fade" id="administrasi_proyek" role="tabpanel" aria-labelledby="administrasi_proyek-tab">
                                        <div class="border p-4 rounded">
                                            <div class="card-title d-flex align-items-center">
                                                <div><i class="bx bxs-file me-1 font-22 text-primary"></i>
                                                </div>
                                                <h5 class="mb-0 text-primary "> <b> Administrasi Proyek</b></h5>
                                            </div>
                                            <hr />


                                            <div class="table-responsive">
                                                <table id="zero_config" class="table table-bordered table-striped table-hover js-basic-example dataTable">
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
                                                                <td><?= $no++ ?>.</td>
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

                                    <div class="tab-pane fade" id="penagihan" role="tabpanel" aria-labelledby="penagihan-tab">
                                        <div class="border p-4 rounded">
                                            <div class="col-lg-12 col-md-6 col-sm-12">
                                                <div class="card widget_2 big_icon traffic">
                                                    <div class="body">
                                                        <?php if ($nilai_terbayar == 0) {
                                                            $persen = 0;
                                                        } else {
                                                            $persen = ($nilai_terbayar / $data['nilai_add']) * 100;
                                                        } ?>
                                                        <h6>Terbayar <b>Rp. <?php echo number_format($nilai_terbayar, 2, ',', '.') ?></b> dari Nilai Kontrak <b>Rp. <?php echo number_format($data['nilai_add'], 2, ',', '.') ?></b></h6>

                                                        <div class="progress m-t-15" style="height: 25px;">
                                                            <div role="progressbar" style="width: <?php echo round($persen, 2) ?>%; background-color: #008ae2 !important; height: 30px;" aria-valuenow="<?php echo round($persen, 2) ?>" aria-valuemin="0" aria-valuemax="100" class="progress-bar"><?php echo round($persen, 2) ?>%</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
                                                            <th style="width: 50px;">Termin ke</th>
                                                            <th>Tanggal</th>
                                                            <th>Nilai (Rp.)</th>
                                                            <th>Keterangan</th>
                                                            <!-- <th>Kelengkapan Dokumen</th> -->
                                                            <th style="width: 120px;">View Dokumen</th>
                                                            <!-- <th>Aksi</th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        foreach ($row as $dt) {

                                                            $count = $this->db->query('select COALESCE(count(id_detail_dok),0) as sum from detail_dok_konsultan where id_dok_master in(76,31,32,33,34,80,81,82,37) and id_pembayaran=' . $dt->id_pembayaran)->row()->sum;
                                                            if ($count < 8) {
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
                                                                <td><?php echo $ket ?> <a href="#" onclick='return view_addendum(<?php echo $dt->id_pembayaran ?>)' class="btn btn-sm btn-primary"><i class="fa fa-folder-open-o"></i> <?php echo $count ?> File</a></td>

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

<!-- Modal Add Addendum Konsultan -->
<div class="modal fade" id="addAddendumKonsultan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 700px">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h6 class="modal-title">
                    <span class="fw-bold">Tambah Addendum Kontrak</span>
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" action="<?= site_url('Kontrak_konsultan/act_add_AddendumKonsultan') ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id_kontrak" value="<?= $id_kontrak ?>" class="form-control">
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Addendum Ke-</label>
                                <select class="form-control show-tick ms select2" required="" name="add_ke" data-placeholder="Select">
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
                                <label>Keterangan</label><small class="text-danger"> (*Kosongkan jika tidak ada)</small>
                                <textarea class="form-control" rows="2" name="keterangan"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Justifikasi Eksternal</label>
                                <textarea class="form-control" rows="2" name="justifikasi_eks"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>File Dokumen (.pdf)</label> &emsp;&emsp;
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
<!-- Modal Edit Addendum Konsultan -->
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
            <form class="form-horizontal" action="<?php echo site_url('Kontrak_konsultan/act_update_AddendumKonsultan') ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
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
                                <label>Keterangan</label>
                                <textarea class="form-control" rows="3" id="keterangan" name="keterangan"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Justifikasi</label>
                                <textarea class="form-control" rows="3" id="justifikasi_eks" name="justifikasi_eks"></textarea>
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
                                <label>Update File (.pdf)</label><small class="text-danger"> (*Kosongkan jika tidak ingin update file)</small>
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

            <form class="form-horizontal" action="<?= site_url('Kontrak_konsultan/act_add_TahapanAddendumKonsultan') ?>" method="post" enctype="multipart/form-data">
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
                                <input type="file" name="dok_file" class="btn btn-secondary btn-block" accept=".pdf" required>
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
            <form class="form-horizontal" action="<?= site_url('Kontrak_konsultan/act_update_dokumen_addendum') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body" style="padding: 2.2rem">
                    <div class="row">
                        <input type="hidden" name="id_tahapan_addendum_konsultan" class="form-control">
                        <input type="hidden" name="id_kontrak_konsultan" class="form-control">
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
                                    <option value="" disabled>-- Pilih --</option>
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
                                    <option value="" disabled>-- Pilih --</option>
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
                                <input type="file" name="dok_file" class="btn btn-secondary btn-block" accept=".pdf">
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
                                <tr>
                                    <td align="center">6.</td>
                                    <td>Berita Acara Pemeriksaan Pekerjaan</td>
                                    <td align="center" id="tbapp"></td>
                                </tr>
                                <tr>
                                    <td align="center">7.</td>
                                    <td>Berita Acara Serah Terima</td>
                                    <td align="center" id="tbast"></td>
                                </tr>
                                <tr>
                                    <td align="center">8.</td>
                                    <td>Perincian Perhitungan Tagihan</td>
                                    <td align="center" id="tinv"></td>
                                </tr>
                                <tr>
                                    <td align="center">9.</td>
                                    <td>Dokumen Lainnya</td>
                                    <td align="center" id="tdokl"></td>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script>
    let nama_dok_usulan = $('.nama_dok_usulan');
    let id_jenis_dokumen_usulan = $('#id_jenis_dokumen_usulan');
    let nama_dok_pengadaan = $('.nama_dok_pengadaan');
    let id_jenis_dokumen_pengadaan = $('#id_jenis_dokumen_pengadaan');
    let tableDokumenAddendum;

    function getDokumenAddendum(id, idKontrakKonsultan, tableId) {
        $.ajax({
            url: "<?= base_url('kontrak_konsultan/getDokumenAddendum'); ?>",
            method: "POST",
            data: {
                id: id,
                idKontrakKonsultan: idKontrakKonsultan
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

    id_jenis_dokumen_pengadaan.change(function() {
        nama_dok_pengadaan.val($(this).find(':selected').text());
    });

    $(document).ready(function() {
        let tahapan_add = $('.tahapan_add');
        let idKontrakKonsultan = '<?php echo $id_kontrak ?>';
        let id = $('#selectAddendum').val();
        let idTableDokumenAddendum = '#tableDokumenAddendum';
        getDokumenAddendum(id, idKontrakKonsultan, idTableDokumenAddendum);
        tahapan_add.val(id);

        $('#selectAddendum').on('change', function() {
            tahapan_add.val($(this).val());
            let selectedId = $(this).val();
            getDokumenAddendum(selectedId, idKontrakKonsultan, idTableDokumenAddendum);
        });

        let hash = window.location.hash;
        if (hash) {
            $('#tabs_2 a[href="' + hash + '"]').tab('show');
        }

        // Update URL hash saat tab diklik
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
            let justifikasi_eks = $(e.relatedTarget).data('justifikasi_eks');

            let link = "<?= base_url() ?>";
            let evidence = '<a href="' + link + "file_uploads/kontrak_konsultan/" + file + '" target="_blank" class="btn btn-sm btn-success"><i class="ti ti-printer"></i> Preview</a>';

            $(e.currentTarget).find('input[name="id_kontrak"]').val(id_kontrak);
            $(e.currentTarget).find('input[name="id_addendum"]').val(id_addendum);
            $(e.currentTarget).find('#add_ke').val(add_ke);
            $(e.currentTarget).find('input[name="tanggal_dok"]').val(tanggal);
            $(e.currentTarget).find('input[name="nomor_dok"]').val(nomor_dok);
            $(e.currentTarget).find('input[name="nilai"]').val(ribuan);
            $(e.currentTarget).find('#keterangan').val(keterangan);
            $(e.currentTarget).find('#justifikasi_eks').val(justifikasi_eks);

            $("#detail_file").html(evidence);
        });

        $('#editDokumenAddendum').on('show.bs.modal', function(e) {
            let id_tahapan_addendum_konsultan = $(e.relatedTarget).data('id_tahapan_addendum_konsultan');
            let id_kontrak_konsultan = $(e.relatedTarget).data('id_kontrak_konsultan');
            let nama_dok = $(e.relatedTarget).data('nama_dok');
            let nomor_dok = $(e.relatedTarget).data('nomor_dok');
            let tanggal_dok = $(e.relatedTarget).data('tanggal_dok');
            let lokasi_file = $(e.relatedTarget).data('lokasi_file');
            let pic = $(e.relatedTarget).data('pic');
            let dok_file = $(e.relatedTarget).data('dok_file');
            let link = "<?= base_url() ?>";
            let evidence = '<a href="' + link + "file_uploads/kontrak_konsultan/tahapan_kontrak_konsultan/" + dok_file + '" target="_blank" class="btn btn-sm btn-success"><i class="ti ti-printer"></i> Preview</a>';

            $(e.currentTarget).find('input[name="id_tahapan_addendum_konsultan"]').val(id_tahapan_addendum_konsultan);
            $(e.currentTarget).find('input[name="id_kontrak_konsultan"]').val(id_kontrak_konsultan);
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

    function view_addendum($idpembayaran) {
        var link = "<?= base_url() ?>";
        var idpembayaran = $idpembayaran;

        $.ajax({
            type: "GET",
            url: "<?php echo site_url('Kontrak_konsultan/get_detail_dokPembayaran') ?>",
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
                var bapp = "";
                var bast = "";
                var inv = "";
                var dokl = "";
                $.each(JSON.parse(response), function(index, item) {

                    if (item.id_dok_master == 79) {
                        if (item.dok_file != null) {
                            pp = '<a href="' + link + "file_uploads/kontrak_konsultan/dokumen_pembayaran/" + item.dok_file + '" target="_BLANK" class="btn btn-sm  btn-primary"><i class="fa fa-print"></i> View</a>';
                        } else {
                            pp = '';
                        }

                    } else if (item.id_dok_master == 78) {
                        if (item.dok_file != null) {
                            dd = '<a href="' + link + "file_uploads/kontrak_konsultan/dokumen_pembayaran/" + item.dok_file + '" target="_BLANK" class="btn btn-sm  btn-primary"><i class="fa fa-print"></i> View</a>';
                        } else {
                            dd = '';
                        }

                    } else if (item.id_dok_master == 77) {
                        if (item.dok_file != null) {
                            ipa = '<a href="' + link + "file_uploads/kontrak_konsultan/dokumen_pembayaran/" + item.dok_file + '" target="_BLANK" class="btn btn-sm  btn-primary"><i class="fa fa-print"></i> View</a>';
                        } else {
                            ipa = '';
                        }

                    } else if (item.id_dok_master == 76) {
                        if (item.dok_file != null) {
                            nd = '<a href="' + link + "file_uploads/kontrak_konsultan/dokumen_pembayaran/" + item.dok_file + '" target="_BLANK" class="btn btn-sm  btn-primary"><i class="fa fa-print"></i> View</a>';
                        } else {
                            nd = '';
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

                    } else if (item.id_dok_master == 80) {
                        if (item.dok_file != null) {
                            bapp = '<a href="' + link + "file_uploads/kontrak_konsultan/dokumen_pembayaran/" + item.dok_file + '" target="_BLANK" class="btn btn-sm  btn-primary"><i class="fa fa-print"></i> View</a>';
                        } else {
                            bapp = '';
                        }

                    } else if (item.id_dok_master == 81) {
                        if (item.dok_file != null) {
                            bast = '<a href="' + link + "file_uploads/kontrak_konsultan/dokumen_pembayaran/" + item.dok_file + '" target="_BLANK" class="btn btn-sm  btn-primary"><i class="fa fa-print"></i> View</a>';
                        } else {
                            bast = '';
                        }

                    } else if (item.id_dok_master == 37) {
                        if (item.dok_file != null) {
                            dokl = '<a href="' + link + "file_uploads/kontrak_konsultan/dokumen_pembayaran/" + item.dok_file + '" target="_BLANK" class="btn btn-sm  btn-primary"><i class="fa fa-print"></i> View</a>';
                        } else {
                            dokl = '';
                        }

                    } else if (item.id_dok_master == 82) {
                        if (item.dok_file != null) {
                            inv = '<a href="' + link + "file_uploads/kontrak_konsultan/dokumen_pembayaran/" + item.dok_file + '" target="_BLANK" class="btn btn-sm  btn-primary"><i class="fa fa-print"></i> View</a>';
                        } else {
                            inv = '';
                        }

                    }
                    // else if(item.id_dok_master==35){
                    //     if(item.dok_file!=null){
                    //         slip = '<a href="'+link+"file_uploads/kontrak_konsultan/dokumen_pembayaran/"+item.dok_file+'" target="_BLANK" class="btn btn-sm  btn-primary"><i class="fa fa-print"></i> View</a>';        
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
                $("#tbapp").html(bapp);
                $("#tbast").html(bast);
                $("#tdokl").html(dokl);
                $("#tinv").html(inv);
            }
        });
        $("#dokPembayaran").modal('show');
    };
</script>