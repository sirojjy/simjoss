<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand font-weight-bold" href="javascript:void(0);">USERS</a>
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
                <div class="card-body border_bottom d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0 font-weight-bold"><strong>Data User</strong> </h4>
                    <a href="<?php echo site_url('User/add_user') ?>"><button type="button" class="btn btn-default"><i class="fa fa-plus"></i>&nbsp; Tambah Data</button></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dt_users" class="table table-bordered table-striped table-hover js-basic-example dataTable w-100">
                            <thead>
                                <tr class="text-center bg-info text-white">
                                    <th class="align-middle font-weight-bold">No.</th>
                                    <th class="align-middle font-weight-bold">Nama</th>
                                    <th class="align-middle font-weight-bold">Email</th>
                                    <th class="align-middle font-weight-bold">Username</th>
                                    <th class="align-middle font-weight-bold">Password</th>
                                    <th class="align-middle font-weight-bold">Level</th>
                                    <th class="align-middle font-weight-bold">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($row as $dt) {

                                    if ($dt->level_user == 0) {
                                        $level = 'Users';
                                    } else if ($dt->level_user == 1) {
                                        $level = 'Super Admin ';
                                    } else {
                                        $level = 'Users ';
                                    }
                                ?>
                                    <tr align="center">
                                        <td align="center"><?php echo $no++ ?>.</td>
                                        <td><?php echo $dt->nama ?></td>
                                        <td><?php echo $dt->email ?></td>
                                        <td align="center"><?php echo $dt->username ?></td>
                                        <td align="center">**********</td>
                                        <td align="center"><span class="badge badge-md badge-pill badge-info"><?php echo $level ?></span></td>
                                        <td align="center">
                                            <a href="#" title="hapus" class="btn btn-success btn-sm">Edit</a>
                                            <a href="<?php echo site_url('User/hapus_user/' . $dt->id_users) ?>" title="hapus" class="btn btn-danger btn-sm" onClick="javasciprt: return confirm('Yakin menghapus data ?')">Hapus</a>
                                        </td>
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

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="<?= base_url('assets/js/datatables.js') ?>"></script>

<script type="text/javascript">
    $(document).ready(function() {
        getDatatables({
            id: "#dt_users",
            url: "<?= base_url('User/getUsers'); ?>",
            columnDefs: [{
                    targets: 0,
                    width: "1%",
                    className: "dt-nowrap",
                },
                {
                    orderable: false,
                    targets: [-1, -2],
                },
            ],
            columns: [{
                    data: "id",
                    className: "text-center",
                },
                {
                    data: "jenis_dokumen",
                    className: "text-center",
                },
                {
                    data: "no_akta",
                    className: "text-center",
                },
                {
                    data: "tanggal_akta",
                    className: "text-center",
                },
                {
                    data: "perihal",
                    className: "text-center",
                },
                {
                    data: "keterangan",
                    className: "text-center",
                },
                {
                    data: "file",
                    className: "text-center",
                },
                {
                    data: "aksi",
                    className: "text-center",
                },
            ]
        });
    });
</script>