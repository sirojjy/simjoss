<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="javascript:void(0);"><b>Data Kontrak</b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-align-justify"></i>
    </button>
</nav>
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12">
            <?php if ($this->session->flashdata('msg') == 'error'): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Data Gagal Disimpan!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
            <?php elseif ($this->session->flashdata('msg') == 'success'): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Berhasil Disimpan.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
            <?php else: ?>
            <?php endif; ?>
            <div class="card">
                <div class="card-body border-bottom d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 font-weight-bold">Monitoring Kontrak Konstruksi</h4>
                    <?php if ($this->session->userdata('level_user') == 1) { ?>
                        <a href="<?= site_url('Kontrak/add_kontrak_konstruksi') ?>"><button type="button" class="btn btn-default"><i class="fa fa-plus"></i>Tambah Data</button></a>
                    <?php } ?>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr style="text-align: center; background-color: #98D4FF">
                                    <th>No.</th>
                                    <th>Tahun</th>
                                    <th style="width: 350px;">Nama Kontrak</th>
                                    <th>Vendor</th>
                                    <th>Nilai Awal <br>(Rp.)</th>
                                    <th style="width: 90px;">Nilai Addendum (Rp.)</th>
                                    <th>Addendum</th>
                                    <?php if ($this->session->userdata('level_user') == 1) { ?>
                                        <th>Detail</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($row as $dt) {
                                    $jml_add = $this->db->query('select COALESCE(count(id_addendum),0) as jml from addendum_konstruksi where id_kontrak=' . $dt->id_kontrak_konstruksi)->row()->jml;
                                    $jml_pembayaran = $this->db->query('select COALESCE(count(id_pembayaran),0) as jml from pembayaran where id_kontrak_konstruksi=' . $dt->id_kontrak_konstruksi)->row()->jml;
                                    $jml_mc = $this->db->query('select COALESCE(count(id_mc),0) as jml from mc where id_kontrak=' . $dt->id_kontrak_konstruksi)->row()->jml;
                                    $jml_dokLain = $this->db->query('select COALESCE(count(id_dok),0) as jml from dokumen_lain where id_kontrak=' . $dt->id_kontrak_konstruksi)->row()->jml;
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $no++ ?>.</td>
                                        <td class="text-center"><?= date('Y', strtotime($dt->tanggal_mulai)); ?></td>
                                        <td><a href="<?= site_url('Kontrak/detail_kon_konstruksi/' . $dt->id_kontrak_konstruksi) ?>" target="_blank"><?= $dt->nama_kontrak ?></a></td>
                                        <td><?= $dt->pihak_kedua ?></td>
                                        <td class="text-center"><?= number_format($dt->nilai_kontrak, 2, ',', '.') ?></td>
                                        <td class="text-center"><?= number_format($dt->nilai_addendum, 2, ',', '.') ?></td>
                                        <td class="text-center"><a href="#" onclick='return view_addendum(<?= $dt->id_kontrak_konstruksi ?>)'><span class="badge badge-md badge-pill badge-warning"><?= $jml_add ?> Addendum</span></a>
                                        </td>
                                        <?php if ($this->session->userdata('level_user') == 1) { ?>
                                            <td class="text-center">
                                                <div class="dropdown">
                                                    <button class="btn btn-default btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-pencil"></i>&nbsp; View Detail</button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="<?= site_url('Kontrak/upload_dok_konstruksi/' . $dt->id_kontrak_konstruksi) ?>">Upload Dokumen Kontrak</a>
                                                        <a class="dropdown-item" href="<?= site_url('Kontrak/sertifikat_bulanan/' . $dt->id_kontrak_konstruksi) ?>">Sertifikat Bulanan &emsp; <span class="badge badge-pill badge-primary"><?= $jml_mc ?></span></a>
                                                        <a class="dropdown-item" href="<?= site_url('Kontrak/pembayaran/' . $dt->id_kontrak_konstruksi) ?>">Data Pembayaran &emsp; <span class="badge badge-pill badge-success"><?= $jml_pembayaran ?></span></a>
                                                        <a class="dropdown-item" href="<?= site_url('Kontrak/dok_lain/' . $dt->id_kontrak_konstruksi) ?>">Dokumen Lain &emsp; <span class="badge badge-pill badge-warning"><?= $jml_dokLain ?></span></a>
                                                        <a class="dropdown-item" href="<?= site_url('Kontrak/update_kontrak/' . $dt->id_kontrak_konstruksi) ?>">Edit</a>
                                                        <a class="dropdown-item" href="<?= site_url('Kontrak/hapus_konstruksi/' . $dt->id_kontrak_konstruksi) ?>" onClick="javasciprt: return confirm('Yakin menghapus data ?')">Hapus</a>
                                                    </div>
                                                </div> <br>
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

<div class="modal fade" id="addAddendumKonstruksi" tabindex="-1" role="dialog" aria-hidden="true">
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
            <form class="form-horizontal" action="<?= site_url('Kontrak/act_add_AddendumKonstruksi') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body" style="padding: 2.2rem">
                    <div class="row">
                        <input type="hidden" name="id_kontrak" class="form-control">
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
                                    <input type="file" name="dok_file" class="btn btn-secondary btn-block" title="Choose a file to upload">
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

<div class="modal fade" id="addTahapanAddendumKonstruksi" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 700px">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h6 class="modal-title">
                    <span class="fw-bold"><b>&emsp; Tahapan Addendum</b></span>
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" action="#" method="post" enctype="multipart/form-data">
                <div class="modal-body" style="padding: 2.2rem">

                    <div class="row">
                        <input type="hidden" name="id_kontrak" class="form-control">
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label for="tahapanAddendum">Tahapan Addendum</label>
                                <select class="form-control show-tick ms select2" required="" name="tahapanAddendum" id="tahapanAddendum" data-placeholder="Select">
                                    <option value="">-- Pilih --</option>
                                    <option value="1">Penyampaian Pekerjaan tambah/kurang paket 1.1</option>
                                    <option value="2">Permintaan Evaluasi Usulan Adendum VII</option>
                                    <option value="3">Hasil Evaluasi konsultan spv terkait Usulan Adendum</option>
                                    <option value="4">Undangan Rapat Evaluasi Proyek</option>
                                    <option value="5">Rapat Evaluasi Proyek Proyek</option>
                                    <option value="6">BA Evaluasi Proyek terkait Pengajuan Usulan Adendum</option>
                                    <option value="7">Pengajuan Permohonan ijin prinsip</option>
                                    <option value="8">Saran Teknis</option>
                                    <option value="9">Persetujuan Pengajuan ijin prinsip</option>
                                    <option value="10">Undangan Rapat Evaluasi PAPENKON</option>
                                    <option value="11">Rapat Evaluasi PAPENKON</option>
                                    <option value="12">Berita Acara Evaluasi PAPENKON</option>
                                    <option value="13">Permohonan Persetujuan/Penetapan Hasil Evaluasi</option>
                                    <option value="14">Persetujuan/Penetapan Hasil Evaluasi Adendum</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label for="nomor_dok">Nomor Dokumen</label>
                                <input type="text" id="nomor_dok" name=" nomor_dok" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label for="tanggal_dok">Tanggal Dokumen</label>
                                <input type="date" id="tanggal_dok" name="tanggal_dok" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label for="lokasi">Lokasi</label>
                                <input type="text" name="lokasi" id="lokasi" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label for="pic">PIC</label>
                                <input type="text" name="pic" id="pic" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>File Dokumen Addendum (.pdf)</label> &emsp;&emsp;
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

<div class="modal fade" id="detailAddendum" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 1000px">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h6 class="modal-title">
                    <span class="fw-bold"><b>&emsp; Detail Addendum </b></span>
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
                                    <th>No.</th>
                                    <th style="width: 130px">Addendum ke-</th>
                                    <th>Tanggal</th>
                                    <th>Nilai</th>
                                    <th>File Addendum</th>
                                </tr>
                            </thead>
                            <tbody id="detail_add">

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $('#addAddendumKonstruksi').on('show.bs.modal', function(e) {
            var id_kontrak = $(e.relatedTarget).data('id_kontrak');
            $(e.currentTarget).find('input[name="id_kontrak"]').val(id_kontrak);

        });

    });

    function view_addendum(idkontrak) {
        $.ajax({
            type: "GET",
            url: "<?= site_url('Kontrak/get_detail_addendum') ?>",
            data: "idkontrak=" + idkontrak,
            success: function(response) {
                var data = "";
                var i = 1;
                $.each(JSON.parse(response), function(index, item) {
                    var date = moment(item.tanggal_dok, "YYYY-mm-DD");
                    var result = date.format("DD-mm-YYYY");

                    var nilai = item.nilai;

                    let decimals = 2
                    let decpoint = ',' // Or Number(0.1).toLocaleString().substring(1, 2)
                    let thousand = '.' // Or Number(10000).toLocaleString().substring(2, 3)

                    let n = Math.abs(nilai).toFixed(decimals).split('.')
                    n[0] = n[0].split('').reverse().map((c, i, a) =>
                        i > 0 && i < a.length && i % 3 == 0 ? c + thousand : c
                    ).reverse().join('')
                    let final = (Math.sign(nilai) < 0 ? '-' : '') + n.join(decpoint)

                    var link = "<?= base_url() ?>";
                    var file = '<a href="' + link + "file_uploads/kontrak_konstruksi/" + item.dok_file + '" target="_BLANK" class="btn btn-sm  btn-primary"><i class="fa fa-print"></i></a>'

                    var limit = i++;

                    if (item.file_eksternal == null) {
                        var file_eks = '/';
                    } else {
                        var file_eks = '<a href="' + link + "file_uploads/kontrak_konstruksi/" + item.file_eksternal + '" target="_BLANK" class="btn btn-sm  btn-primary"><i class="fa fa-print"></i></a>';
                    }

                    if (item.justifikasi_eks == null) {
                        var just_eks = ' ';
                    } else {
                        var just_eks = item.justifikasi_eks;
                    }

                    data += "<tr><td style='color:black; text-align:center'>" + limit + "<td style='color:black;text-align:center'>" + item.add_ke + "<td style='color:black; text-align:center'>" + result + "<td style='color:black; text-align:center'>" + final + "<td style='color:black; text-align:center'>" + file + "</td></td></td></td></td></tr>";

                    $("#detail_add").html(data);
                    $("#detailAddendum").modal('show');
                });
            }
        });
    };
</script>