<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand font-weight-bold" href="javascript:void(0);">Data Kontrak</a>
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
                <div class="card-body border-bottom d-flex justify-content-between align-items-center">
                    <h4 class="card-title font-weight-bold mb-0">Monitoring Kontrak Konsultan Tol</h4>
                    <?php if ($this->session->userdata('level_user') == 1) { ?>
                        <a href="<?php echo site_url('Kontrak_konsultan/add_kontrak') ?>"><button type="button" class="btn btn-default"><i class="fa fa-plus mr-1"></i> Tambah Data</button></a>
                    <?php } ?>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table2" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr style="text-align: center; background-color: #98D4FF">
                                    <th>No.</th>
                                    <th>Seksi</th>
                                    <th>Tahun</th>
                                    <th style="width: 350px;">Nama Kontrak</th>
                                    <th>Jenis Konsultan</th>
                                    <th>Vendor</th>
                                    <th>Nilai Awal <br> (Rp.)</th>
                                    <th>Nilai Addendum (Rp.)</th>
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
                                    $jml_add = $this->db->query('select COALESCE(count(id_addendum),0) as jml from addendum_konsultan where id_kontrak=' . $dt->id_kontrak_konsultan)->row()->jml;
                                    $jml_pembayaran = $this->db->query('select COALESCE(count(id_pembayaran),0) as jml from pembayaran where id_kontrak_konsultan=' . $dt->id_kontrak_konsultan)->row()->jml;
                                    $jml_lap = $this->db->query('select COALESCE(count(id_laporan),0) as jml from laporan_konsultan where id_kontrak_konsultan=' . $dt->id_kontrak_konsultan)->row()->jml;
                                    if ($jml_add == 0) {
                                        $nilai_add = '-';
                                    } else {
                                        $nilai_add = number_format($dt->nilai_add, 2, ',', '.');
                                    }
                                    if ($dt->seksi == 1) {
                                        $seksi = ' 1,2, 3';
                                    } else if ($dt->seksi == 2) {
                                        $seksi = ' 1,2,3,4';
                                    } else if ($dt->seksi == 4) {
                                        $seksi = ' 4';
                                    } else {
                                        $seksi = $dt->seksi;
                                    }
                                ?>
                                    <tr>
                                        <td align="center"><?php echo $no++ ?>.</td>
                                        <td align="center"><?php echo $seksi ?></td>
                                        <td align="center"><?php echo date('Y', strtotime($dt->tanggal_mulai)); ?>
                                        <td><a href="<?php echo site_url('Kontrak_konsultan/detail/' . $dt->id_kontrak_konsultan) ?>" target="_blank"><?php echo $dt->nama_kontrak ?></a></td>
                                        <td align="center"><?php echo $dt->jenis_konsultan ?></td>
                                        <td><?php echo $dt->pihak_kedua ?></td>
                                        <td align="center"><?php echo number_format($dt->nilai_kontrak, 2, ',', '.') ?></td>
                                        <td align="center"><?php echo $nilai_add ?></td>
                                        <!-- <td align="center"><?php echo date('d-m-Y', strtotime($dt->tanggal_akhir)); ?></td> -->
                                        <td align="center"><a href="#" onclick='return view_addendum(<?php echo $dt->id_kontrak_konsultan ?>)'><span class="badge badge-md badge-pill badge-warning"><?php echo $jml_add ?> Addendum</span></a><br>
                                        </td>
                                        <!-- <td align="center"><a href="#"><span class="badge badge-md badge-pill badge-success">Pembayaran</span></a></td> -->
                                        <?php if ($this->session->userdata('level_user') == 1) { ?>
                                            <td align="center">
                                                <div class="dropdown">
                                                    <button class="btn btn-default btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-pencil"></i>&nbsp; View Detail</button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                                        <a class="dropdown-item" href="<?php echo site_url('Kontrak_konsultan/upload_dok/' . $dt->id_kontrak_konsultan) ?>">View/Upload Dokumen</a>
                                                        <!-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#addAddendumKonsultan" data-id_kontrak="<?php echo $dt->id_kontrak_konsultan ?>">Tambah Addendum</a> -->
                                                        <a class="dropdown-item" href="<?php echo site_url('Kontrak_konsultan/laporan/' . $dt->id_kontrak_konsultan) ?>">Laporan Pekerjaan &emsp;<span class="badge badge-pill badge-primary"><?php echo $jml_lap ?></span></a>
                                                        <a class="dropdown-item" href="<?php echo site_url('Kontrak_konsultan/pembayaran/' . $dt->id_kontrak_konsultan) ?>">Data Pembayaran &emsp; <span class="badge badge-pill badge-success"><?php echo $jml_pembayaran ?></span></a>
                                                        <a class="dropdown-item" href="<?php echo site_url('Kontrak_konsultan/update_kontrak/' . $dt->id_kontrak_konsultan) ?>">Edit</a>
                                                        <a class="dropdown-item" href="<?php echo site_url('Kontrak_konsultan/hapus_kontrak/' . $dt->id_kontrak_konsultan) ?>" onClick="javasciprt: return confirm('Yakin menghapus data ?')">Hapus</a>
                                                    </div>
                                                </div> <br>
                                                <!-- <a href="<?php echo site_url('Kontrak/upload_dok') ?>" ><button type="button" class="btn btn-primary btn-sm">Upload Dokumen</button></a> -->
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

<!-- <div class="modal fade" id="addAddendumKonsultan" tabindex="-1" role="dialog" aria-hidden="true">
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
            <form class="form-horizontal" action="<?php echo site_url('Kontrak_konsultan/act_add_Addendum/1') ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
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
                                <label>Keterangan</label><small style="color: red"> (*Kosongkan jika tidak ada)</small>
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
                                    <input type="file" name="file" class="btn btn-secondary btn-block" title="Choose a file to upload">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>File Dokumen Justifikasi Eksternal (.pdf)</label> &emsp;&emsp;
                                <div class="browse-wrap">
                                    <input type="file" name="file_eks" class="btn btn-secondary btn-block" title="Choose a file to upload">
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
</div> -->
<div class="modal fade" id="detailAddendum" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 900px">
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
                                    <th>File</th>
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

        $('#addAddendumKonsultan').on('show.bs.modal', function(e) {
            var id_kontrak = $(e.relatedTarget).data('id_kontrak');

            $(e.currentTarget).find('input[name="id_kontrak"]').val(id_kontrak);


        });

    });

    function view_addendum($idkontrak) {
        // var id = '';
        var idkontrak = $idkontrak;

        $.ajax({
            type: "GET",
            url: "<?php echo site_url('Kontrak_konsultan/get_detail_addendum') ?>",
            data: "idkontrak=" + idkontrak,
            success: function(response) {
                var data = "";
                var i = 1;
                $.each(JSON.parse(response), function(index, item) {
                    var date = moment(item.tanggal_dok, "YYYY-mm-DD");
                    var result = date.format("DD-mm-YYYY");

                    var nilai = item.nilai;
                    var reverse = nilai.toString().split('').reverse().join(''),
                        ribuan = reverse.match(/\d{1,3}/g);
                    ribuan = ribuan.join('.').split('').reverse().join('');
                    var link = "<?= base_url() ?>";
                    var file = '<a href="' + link + "file_uploads/kontrak_konsultan/" + item.dok_file + '" target="_BLANK" class="btn btn-sm  btn-primary"><i class="fa fa-print"></i></a>'
                    var limit = i++;


                    data += "<tr><td style='color:black; text-align:center'>" + limit + "<td style='color:black;text-align:center'>" + item.add_ke + "<td style='color:black; text-align:center'>" + result + "<td style='color:black; text-align:center'>" + ribuan + "<td style='color:black; text-align:center'>" + file + "</td></td></td></td></td></tr>";

                    $("#detail_add").html(data);

                    console.log(data);

                });

            }
        });
        $("#detailAddendum").modal('show');
    };
</script>