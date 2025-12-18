<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-xl-12 mx-auto">
            <h5 class="mb-10 text-uppercase"><b>Dokumen Kontrak </b></h5>
            <label><b>Pekerjaan : <?php echo $nama_kontrak ?></b></label>
            <hr />
            <?php if ($this->session->flashdata('msg') == 'error'): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Data Gagal Diupload!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
            <?php elseif ($this->session->flashdata('msg') == 'success'): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Berhasil Diupload.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
            <?php else: ?>
            <?php endif; ?>
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body">
                    <div class="border p-4 rounded">
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
                                        <th style="width: 170px;">No. Dokumen</th>

                                        <th style="width: 110px;">Tanggal Dokumen</th>
                                        <th>Lokasi Hardcopy</th>
                                        <th>PIC</th>
                                        <th>File</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $dok_kontrak = $this->db->query("select * from dok_master where id_dok_master in(52,53,3,72,73,1,74) order by id_dok_master ASC")->result();

                                    foreach ($dok_kontrak as $dt) {
                                        $detail_dok = $this->db->query('select * from detail_dok_konsultan where id_kontrak_konsultan=' . $id_kontrak . ' and id_dok_master=' . $dt->id_dok_master)->row_array();

                                        if (empty($detail_dok['nomor_dok'])) {
                                            $nomor_dok = '-';
                                            $tanggal = '-';
                                            $pic = '-';
                                            $lokasi = '-';
                                        } else {
                                            $dok = base_url("file_uploads/kontrak_konsultan/" . $detail_dok['dok_file']);
                                            $nomor_dok = $detail_dok['nomor_dok'];
                                            $tanggal = date('d-m-Y', strtotime($detail_dok['tanggal_dok']));
                                            $pic = $detail_dok['pic'];
                                            $lokasi = $detail_dok['kantor'] . ' -  ' . $detail_dok['no_rak'] . ' ' . $detail_dok['no_box'];
                                        }

                                    ?>
                                        <tr>
                                            <td align="center"><?php echo $no++ ?>.</td>
                                            <td><b><?php echo $dt->nama_dok ?></b></td>
                                            <td> <?php echo $nomor_dok ?></td>
                                            <td align="center"><?php echo $tanggal ?></td>
                                            <td align="center"><?php echo $lokasi ?></td>
                                            <td align="center"><?php echo $pic ?></td>
                                            <td align="center">
                                                <?php if (empty($detail_dok['nomor_dok'])) { ?>
                                                    <button type="button" class="btn btn-danger btn-sm">Belum diupload</button>
                                                <?php } else { ?>
                                                    <a href="<?php echo $dok ?>" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-print"></i></a>
                                                <?php } ?>
                                            </td>
                                            <td align="center">
                                                <?php if (empty($detail_dok['nomor_dok'])) { ?>
                                                    <a href="#" data-toggle="modal" data-target="#addRowModal" data-id_kontrak="<?php echo $id_kontrak ?>" data-id_dok_master="<?php echo $dt->id_dok_master ?>" data-nama_dok="<?php echo $dt->nama_dok ?>"> <button class="btn btn-warning btn-sm"><i class="fa fa-upload"></i> Upload</button></a>
                                                <?php } else { ?>
                                                    <a href="#" data-toggle="modal" data-target="#updateDok" data-id_kontrak="<?php echo $id_kontrak ?>" data-id_detail_dok="<?php echo $detail_dok['id_detail_dok'] ?>" data-id_dok_master="<?php echo $dt->id_dok_master ?>" data-nama_dok="<?php echo $dt->nama_dok ?>" data-nomor_dok="<?php echo $detail_dok['nomor_dok'] ?>" data-kantor="<?php echo $detail_dok['kantor'] ?>" data-pic="<?php echo $detail_dok['pic'] ?>" data-no_rak="<?php echo $detail_dok['no_rak'] ?>" data-no_box="<?php echo $detail_dok['no_box'] ?>" data-file="<?php echo $detail_dok['dok_file'] ?>" data-tanggal_dok="<?php echo date('d-m-Y', strtotime($detail_dok['tanggal_dok'])) ?>"> <button class="btn btn-success btn-sm"><i class="fa fa-upload"></i> Update</button></a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>

                            </table>
                        </div>


                        <br>
                        <div class="card-title d-flex align-items-center">
                            <div><i class="bx bxs-file me-1 font-22 text-primary"></i>
                            </div>
                            <h5 class="mb-0 text-primary"> <b>Dokumen Dasar Pekerjaan</b></h5>
                        </div>
                        <hr />
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover ">
                                <thead>
                                    <tr style="text-align: center; background-color: #98D4FF">
                                        <th style="width: 10px;">No.</th>
                                        <th style="width: 300px;">Nama File</th>
                                        <th style="width: 170px;">No. Dokumen</th>

                                        <th style="width: 110px;">Tanggal Dokumen</th>
                                        <th>Lokasi Hardcopy</th>
                                        <th>PIC</th>
                                        <th>File</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $dok_kontrak = $this->db->query("select *from dok_master where id_dok_master in(10,11,12,13,14,15,75) order by id_dok_master ASC")->result();

                                    foreach ($dok_kontrak as $dt) {
                                        $detail_dok = $this->db->query('select * from detail_dok_konsultan where id_kontrak_konsultan=' . $id_kontrak . ' and id_dok_master=' . $dt->id_dok_master)->row_array();

                                        if (empty($detail_dok['nomor_dok'])) {
                                            $nomor_dok = '-';
                                            $tanggal = '-';
                                            $pic = '-';
                                            $lokasi = '-';
                                        } else {
                                            $dok = base_url("file_uploads/kontrak_konsultan/" . $detail_dok['dok_file']);
                                            $nomor_dok = $detail_dok['nomor_dok'];
                                            $tanggal = date('d-m-Y', strtotime($detail_dok['tanggal_dok']));
                                            $pic = $detail_dok['pic'];
                                            $lokasi = $detail_dok['kantor'] . ' - ' . $detail_dok['no_rak'] . ' ' . $detail_dok['no_box'];
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
                                                <?php if (empty($detail_dok['nomor_dok'])) { ?>
                                                    <button type="button" class="btn btn-danger btn-sm">Belum diupload</button>
                                                <?php } else { ?>
                                                    <a href="<?php echo $dok ?>" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-print"></i></a>
                                                <?php } ?>
                                            </td>
                                            <td align="center">
                                                <?php if (empty($detail_dok['nomor_dok'])) { ?>
                                                    <a href="#" data-toggle="modal" data-target="#addRowModal" data-id_kontrak="<?php echo $id_kontrak ?>" data-id_dok_master="<?php echo $dt->id_dok_master ?>" data-nama_dok="<?php echo $dt->nama_dok ?>"> <button class="btn btn-warning btn-sm"><i class="fa fa-upload"></i> Upload</button></a>
                                                <?php } else { ?>
                                                    <a href="#" data-toggle="modal" data-target="#updateDok" data-id_kontrak="<?php echo $id_kontrak ?>" data-id_detail_dok="<?php echo $detail_dok['id_detail_dok'] ?>" data-id_dok_master="<?php echo $dt->id_dok_master ?>" data-nama_dok="<?php echo $dt->nama_dok ?>" data-nomor_dok="<?php echo $detail_dok['nomor_dok'] ?>" data-kantor="<?php echo $detail_dok['kantor'] ?>" data-pic="<?php echo $detail_dok['pic'] ?>" data-no_rak="<?php echo $detail_dok['no_rak'] ?>" data-no_box="<?php echo $detail_dok['no_box'] ?>" data-file="<?php echo $detail_dok['dok_file'] ?>" data-tanggal_dok="<?php echo date('d-m-Y', strtotime($detail_dok['tanggal_dok'])) ?>"> <button class="btn btn-success btn-sm"><i class="fa fa-upload"></i> Update</button></a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>

                            </table>
                        </div>

                        <br>

                        <div class="card-title d-flex ">
                            <!-- <div><i class="bx bxs-file me-1 font-22 text-primary"></i>
                                        </div> -->
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-9">
                                        <h5 class="mb-0 text-primary"> <b>Dokumen Lainnya</b></h5>
                                    </div>
                                    <div class="col-md-3">
                                        <p align="right"><a href="#" data-toggle="modal" data-target="#addDokumenLain" data-id_kontrak="<?php echo $id_kontrak ?>"> <button class="btn btn-dark "><i class="fa fa-upload"></i> &nbsp; Dokumen Lainnya</button></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr style="text-align: center; background-color: #98D4FF">
                                        <th style="width: 10px;">No.</th>
                                        <th style="width: 300px;">Nama File</th>
                                        <th style="width: 230px;">No. Dokumen</th>

                                        <th style="width: 90px;">Tanggal Dokumen</th>
                                        <th>Lokasi Hardcopy</th>
                                        <th>PIC</th>
                                        <th>File</th>
                                        <th style="width: 110px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $dok_lain = $this->db->query('select * from detail_dok_konsultan where id_kontrak_konsultan=' . $id_kontrak . ' and id_dok_master=100 order by tanggal_dok DESC')->result();

                                    foreach ($dok_lain as $dt) {


                                        if ($dt->nomor_dok == null) {
                                            $nomor_dok = '-';
                                            $tanggal = '-';
                                            $pic = '-';
                                            $lokasi = '-';
                                        } else {
                                            $dok = base_url("file_uploads/kontrak_konsultan/" . $dt->dok_file);
                                            $nomor_dok = $dt->nomor_dok;
                                            $tanggal = date('d-m-Y', strtotime($dt->tanggal_dok));
                                            $pic = empty($detail_dok['pic']) ? '-' : $detail_dok['pic'];
                                            $lokasi = $dt->kantor . ' ' . $dt->no_rak . ' ' . $dt->no_box;
                                        }
                                    ?>
                                        <tr>
                                            <td align="center"><?php echo $no++ ?>.</td>
                                            <td><b><?php echo $dt->keterangan ?></b></td>
                                            <td> <?php echo $nomor_dok ?></td>
                                            <td align="center"><?php echo $tanggal ?></td>
                                            <td><?php echo $lokasi ?></td>
                                            <td align="center"><?php echo $dt->pic ?></td>
                                            <td align="center">

                                                <a href="<?php echo $dok ?>" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-print"></i></a>

                                            </td>
                                            <td align="center">
                                                <a href="#" data-toggle="modal" data-target="#updateDokLain" data-id_kontrak="<?php echo $id_kontrak ?>" data-id_detail_dok="<?php echo $dt->id_detail_dok ?>" data-nama_dok="<?php echo $dt->keterangan ?>" data-nomor_dok="<?php echo $dt->nomor_dok ?>" data-kantor="<?php echo $dt->kantor ?>" data-pic="<?php echo $dt->pic ?>" data-no_rak="<?php echo $dt->no_rak ?>" data-no_box="<?php echo $dt->no_box ?>" data-file="<?php echo $dt->dok_file ?>" data-tanggal_dok="<?php echo date('d-m-Y', strtotime($dt->tanggal_dok)) ?>"> <button class="btn btn-success btn-sm"><i class="fa fa-upload"></i> Update</button></a>&nbsp;

                                                <a href="<?php echo site_url('Kontrak_konsultan/hapus_dokLain/' . $id_kontrak . '/' . $dt->id_detail_dok) ?>" title="hapus" class="btn btn-danger btn-sm" onClick="javasciprt: return confirm('Yakin menghapus data ?')"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>

                            </table>
                        </div>


                        <br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="addDokumenLain" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 700px">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h6 class="modal-title">
                    <span class="fw-bold"><b>&emsp; Upload Dokumen Lainnya</b></span>
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" action="<?php echo site_url('Kontrak_konsultan/act_Upload_dokLain') ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="modal-body" style="padding: 2.2rem">

                    <div class="row">
                        <input type="hidden" name="id_kontrakLain" class="form-control">
                        <div class="col-md-12">
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
                                <label>PIC</label>
                                <!-- <input type="text" name="pic" class="form-control"> -->
                                <select class="form-control show-tick ms select2" name="pic">
                                    <option value="">-- Pilih --</option>
                                    <option value="Teknik">Teknik</option>
                                    <option value="Lahan">Lahan</option>
                                    <option value="Proyek">Proyek</option>
                                    <option value="SDM dan Umum">SDM dan Umum</option>
                                    <option value="Legal">Legal</option>
                                    <option value="Keuangan">Keuangan</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Kantor</label>
                                <select class="form-control show-tick ms select2" name="kantor">
                                    <option value="">-- Pilih --</option>
                                    <option value="Jakarta">Kantor Jakarta</option>
                                    <option value="Pusat">Kantor Pusat</option>
                                    <option value="Lahan">Kantor Lahan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Nomor Rak</label>
                                <input type="text" name="no_rak" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Nomor Box</label>
                                <input type="text" name="no_box" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>File Dokumen (.pdf)</label> &emsp;&emsp;
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
<div class="modal fade" id="updateDokLain" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 700px">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h6 class="modal-title">
                    <span class="fw-bold"><b>&emsp; Update Dokumen Lainnya</b></span>
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" action="<?php echo site_url('Kontrak_konsultan/act_Update_dokLain') ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="modal-body" style="padding: 2.2rem">

                    <div class="row">
                        <input type="hidden" name="id_detail_dokLain" class="form-control">
                        <input type="hidden" name="id_kontrak_l" class="form-control">
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Nama Dokumen</label>
                                <input type="text" name="nama_dok_l" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Nomor Dokumen</label>
                                <input type="text" name="nomor_dok_l" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Tanggal Dokumen</label>
                                <input type="text" name="tanggal_dok_l" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>PIC</label>
                                <!-- <input type="text" name="pic_l" class="form-control"> -->
                                <select class="form-control show-tick ms select2" name="pic_l">
                                    <option value="">-- Pilih --</option>
                                    <option value="Teknik">Teknik</option>
                                    <option value="Lahan">Lahan</option>
                                    <option value="Proyek">Proyek</option>
                                    <option value="SDM dan Umum">SDM dan Umum</option>
                                    <option value="Legal">Legal</option>
                                    <option value="Keuangan">Keuangan</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Kantor</label>
                                <select class="form-control show-tick ms select2" name="kantor_l">
                                    <option value="">-- Pilih --</option>
                                    <option value="Jakarta">Kantor Jakarta</option>
                                    <option value="Pusat">Kantor Pusat</option>
                                    <option value="Lahan">Kantor Lahan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Nomor Rak</label>
                                <input type="text" name="no_rak_l" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Nomor Baris</label>
                                <input type="text" name="no_box_l" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Current File</label> &emsp;&emsp;
                                <div class="browse-wrap" id="detail_file_l">

                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>File Dokumen (.pdf)</label> &emsp;&emsp;
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
<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 700px">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h6 class="modal-title">
                    <span class="fw-bold"><b>&emsp; Upload Dokumen </b></span>(<label id="xnama_dok"></label>)
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" action="<?php echo site_url('Kontrak_konsultan/act_Upload_dokKonsultan') ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="modal-body" style="padding: 2.2rem">

                    <div class="row">

                        <input type="hidden" name="id_dok_master" class="form-control">
                        <input type="hidden" name="id_kontrak" class="form-control">
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Nomor Dokumen</label>
                                <input type="text" name="nomor_dok" class="form-control" required="">
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
                                <label>PIC</label>
                                <!-- <input type="text" name="pic" class="form-control"> -->
                                <select class="form-control show-tick ms select2" name="pic">
                                    <option value="">-- Pilih --</option>
                                    <option value="Teknik">Teknik</option>
                                    <option value="Lahan">Lahan</option>
                                    <option value="Proyek">Proyek</option>
                                    <option value="SDM dan Umum">SDM dan Umum</option>
                                    <option value="Legal">Legal</option>
                                    <option value="Keuangan">Keuangan</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Kantor</label>
                                <select class="form-control show-tick ms select2" name="kantor">
                                    <option value="">-- Pilih --</option>
                                    <option value="Jakarta">Kantor Jakarta</option>
                                    <option value="Pusat">Kantor Pusat</option>
                                    <option value="Lahan">Kantor Lahan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Nomor Rak</label>
                                <input type="text" name="no_rak" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Nomor Box</label>
                                <input type="text" name="no_box" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>File Dokumen (.pdf)</label> &emsp;&emsp;
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

<div class="modal fade" id="updateDok" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 700px">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h6 class="modal-title">
                    <span class="fw-bold"><b>&emsp; Update Dokumen </b></span>(<label id="xnama_dok_update"></label>)
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" action="<?php echo site_url('Kontrak_konsultan/act_Update_dokKonsultan') ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="modal-body" style="padding: 2.2rem">

                    <div class="row">

                        <input type="hidden" name="id_dok_master_update" class="form-control">
                        <input type="hidden" name="id_kontrak_update" class="form-control">
                        <input type="hidden" name="id_detail_dok" class="form-control">
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Nomor Dokumen</label>
                                <input type="text" name="nomor_dok_update" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Tanggal Dokumen</label>
                                <input type="text" name="tanggal_dok_update" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>PIC</label>
                                <!-- <input type="text" name="pic_update" class="form-control"> -->
                                <select class="form-control show-tick ms select2" name="pic_update">
                                    <option value="">-- Pilih --</option>
                                    <option value="Teknik">Teknik</option>
                                    <option value="Lahan">Lahan</option>
                                    <option value="Proyek">Proyek</option>
                                    <option value="SDM dan Umum">SDM dan Umum</option>
                                    <option value="Legal">Legal</option>
                                    <option value="Keuangan">Keuangan</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Kantor</label>
                                <select class="form-control show-tick ms select2" id="kantor" name="kantor">
                                    <option value="">-- Pilih --</option>
                                    <option value="Jakarta">Kantor Jakarta</option>
                                    <option value="Pusat">Kantor Pusat</option>
                                    <option value="Lahan">Kantor Lahan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Nomor Rak</label>
                                <input type="text" name="no_rak_update" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Nomor Box</label>
                                <input type="text" name="no_box_update" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Current File</label> &emsp;&emsp;
                                <div class="browse-wrap" id="detail_file">

                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>File Dokumen (.pdf)</label> &emsp;&emsp;
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $('#addRowModal').on('show.bs.modal', function(e) {
            var nama_dok = $(e.relatedTarget).data('nama_dok');
            var id_dok_master = $(e.relatedTarget).data('id_dok_master');
            var id_kontrak = $(e.relatedTarget).data('id_kontrak');

            $(e.currentTarget).find('input[name="id_kontrak"]').val(id_kontrak);
            $(e.currentTarget).find('input[name="id_dok_master"]').val(id_dok_master);
            $(".modal-header #xnama_dok").text(nama_dok);


        });

        $('#addDokumenLain').on('show.bs.modal', function(e) {
            var id_kontrak = $(e.relatedTarget).data('id_kontrak');
            $(e.currentTarget).find('input[name="id_kontrakLain"]').val(id_kontrak);
        });

        $('#updateDok').on('show.bs.modal', function(e) {
            var nama_dok = $(e.relatedTarget).data('nama_dok');
            var id_dok_master = $(e.relatedTarget).data('id_dok_master');
            var id_kontrak = $(e.relatedTarget).data('id_kontrak');
            var id_detail_dok = $(e.relatedTarget).data('id_detail_dok');

            var no_dok = $(e.relatedTarget).data('nomor_dok');
            var tgl_dok = $(e.relatedTarget).data('tanggal_dok');
            var kantor = $(e.relatedTarget).data('kantor');
            var pic = $(e.relatedTarget).data('pic');
            var no_rak = $(e.relatedTarget).data('no_rak');
            var no_box = $(e.relatedTarget).data('no_box');

            var file = $(e.relatedTarget).data('file');
            var link = "<?= base_url() ?>";
            var evidence = '<a href="' + link + "file_uploads/kontrak_konsultan/" + file + '" target="_blank" class="btn btn-success btn-sm btn-block"><i class="ti ti-printer"></i> Preview Dokumen</a>';

            $(e.currentTarget).find('input[name="id_kontrak_update"]').val(id_kontrak);
            $(e.currentTarget).find('input[name="id_dok_master_update"]').val(id_dok_master);
            $(e.currentTarget).find('input[name="id_detail_dok"]').val(id_detail_dok);
            $(e.currentTarget).find('input[name="nomor_dok_update"]').val(no_dok);
            $(e.currentTarget).find('input[name="tanggal_dok_update"]').val(tgl_dok);
            $(e.currentTarget).find('#pic_update').val(pic);
            $(e.currentTarget).find('input[name="no_rak_update"]').val(no_rak);
            $(e.currentTarget).find('input[name="no_box_update"]').val(no_box);
            $(e.currentTarget).find('#kantor').val(kantor);

            $("#detail_file").html(evidence);
            $(".modal-header #xnama_dok_update").text(nama_dok);
        });
        $('#updateDokLain').on('show.bs.modal', function(e) {
            var nama_dok = $(e.relatedTarget).data('nama_dok');
            var id_detail_dok = $(e.relatedTarget).data('id_detail_dok');
            var id_kontrak = $(e.relatedTarget).data('id_kontrak');

            var no_dok = $(e.relatedTarget).data('nomor_dok');
            var tgl_dok = $(e.relatedTarget).data('tanggal_dok');
            var kantor = $(e.relatedTarget).data('kantor');
            var pic = $(e.relatedTarget).data('pic');
            var no_rak = $(e.relatedTarget).data('no_rak');
            var no_box = $(e.relatedTarget).data('no_box');

            var file = $(e.relatedTarget).data('file');
            var link = "<?= base_url() ?>";
            var evidence = '<a href="' + link + "file_uploads/kontrak_konsultan/" + file + '" target="_blank" class="btn btn-success btn-sm btn-block"><i class="ti ti-printer"></i> Preview Dokumen</a>';

            $(e.currentTarget).find('input[name="id_kontrak_l"]').val(id_kontrak);
            // $(e.currentTarget).find('input[name="id_dok_master_update"]').val(id_dok_master);
            $(e.currentTarget).find('input[name="id_detail_dokLain"]').val(id_detail_dok);
            $(e.currentTarget).find('input[name="nama_dok_l"]').val(nama_dok);
            $(e.currentTarget).find('input[name="nomor_dok_l"]').val(no_dok);
            $(e.currentTarget).find('input[name="tanggal_dok_l"]').val(tgl_dok);
            $(e.currentTarget).find('#pic_l').val(pic);
            $(e.currentTarget).find('input[name="no_rak_l"]').val(no_rak);
            $(e.currentTarget).find('input[name="no_box_l"]').val(no_box);
            $(e.currentTarget).find('#kantor_l').val(kantor);

            $("#detail_file_l").html(evidence);
            $(".modal-header #xnama_dok_update").text(nama_dok);
        });
    });
</script>