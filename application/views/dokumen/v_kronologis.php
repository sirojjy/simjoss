<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="javascript:void(0);"><b>&emsp; Dokumen Kronologis JMJ</b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-align-justify"></i>
    </button>
</nav>
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12">
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Data Gagal Disimpan!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
            <?php elseif ($this->session->flashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Berhasil Disimpan.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
            <?php else: ?>
            <?php endif; ?>
            <div class="card">
                <div class="card-body border-bottom d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0 font-weight-bold">Data Dokumen Kronologis JMJ</h4>
                    <?php if ($this->session->userdata('level_user') == 1) { ?>
                        <a href="<?php echo site_url('Dokumen/add_kronologis') ?>"><button type="button" class="btn btn-default"><i class="fa fa-plus"></i>&nbsp; Tambah Data</button></a>
                    <?php } ?>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr style="text-align: center; background-color: #98D4FF">
                                    <th style="width: 20px;">No.</th>
                                    <th>Tahapan</th>
                                    <th>Sub Tahapan</th>
                                    <th>Nama Dokumen</th>
                                    <th style="width: 100px;">No. Dokumen</th>
                                    <th style="width: 100px;">Tanggal</th>
                                    <th style="width: 60px;">File</th>
                                    <th style="width: 100px;">Pihak</th>
                                    <?php if ($this->session->userdata('level_user') == 1) { ?>
                                        <th style="width: 100px;">Aksi</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($row as $dt) {
                                    if ($dt->id_tahapan == 1) {
                                        $tahapan = 'Pra Perencanaan KPBU';
                                    } elseif ($dt->id_tahapan == 2) {
                                        $tahapan = 'Perencanaan KPBU';
                                    } elseif ($dt->id_tahapan == 3) {
                                        $tahapan = 'Penyiapan KPBU';
                                    } elseif ($dt->id_tahapan == 4) {
                                        $tahapan = 'Pelaksanaan PPJT';
                                    } elseif ($dt->id_tahapan == 5) {
                                        $tahapan = 'Operasional';
                                    } elseif ($dt->id_tahapan == 6) {
                                        $tahapan = 'Pembentukan BUJT';
                                    } else {
                                        $tahapan = ' ';
                                    }

                                    if ($dt->sub_tahapan == 1) {
                                        $sub_tahapan = 'Pengadaan BUJT';
                                    } elseif ($dt->sub_tahapan == 2) {
                                        $sub_tahapan = 'Penyusunan Desain';
                                    } elseif ($dt->sub_tahapan == 3) {
                                        $sub_tahapan = 'Pembebasan Lahan';
                                    } elseif ($dt->sub_tahapan == 4) {
                                        $sub_tahapan = 'Pelaksanaan Pembangunan';
                                    } elseif ($dt->sub_tahapan == 5) {
                                        $sub_tahapan = 'Fungsional/Operasional';
                                    } elseif ($dt->sub_tahapan == 6) {
                                        $sub_tahapan = 'Perencanaan Basic Design';
                                    } elseif ($dt->sub_tahapan == 8) {
                                        $sub_tahapan = 'Pekerjaan Konstruksi';
                                    } else {
                                        $sub_tahapan = ' ';
                                    }

                                    if ($dt->file != null) {
                                        $lokasi_file = base_url("file_uploads/dokumen/kronologis/" . $dt->file);
                                        $file = '<a href="' . $lokasi_file . '" target="_blank" class="btn btn-primary btn-sm" ><i class="fa fa-print"></i></a>';
                                    } else {
                                        $file = "-";
                                    }
                                ?>
                                    <tr>
                                        <td align="center"><?php echo $no++ ?>.</td>
                                        <td><?php echo $tahapan ?></td>
                                        <td><?php echo $sub_tahapan ?></td>
                                        <td><?php echo $dt->jenis_dokumen ?></td>
                                        <td align="center"><?php echo $dt->nomor_dokumen ?></td>
                                        <td align="center"><?php echo date('d-m-Y', strtotime($dt->tanggal)); ?></td>
                                        <td align="center"><?php echo $file ?></td>
                                        <td><?php echo $dt->pihak ?></td>
                                        <?php if ($this->session->userdata('level_user') == 1) { ?>
                                            <td align="center">
                                                <a href="<?php echo site_url('Dokumen/edit_kronologis/' . $dt->id_kronologis) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                                <a href="<?php echo site_url('Dokumen/hapus_kronologis/' . $dt->id_kronologis) ?>" class="btn btn-danger btn-sm" onClick="javasciprt: return confirm('Yakin menghapus data ?')"><i class="fa fa-trash"></i></a>
                                            </td>
                                        <?php } ?>
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