<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand font-weight-bold" href="javascript:void(0);">Manajemen Resiko</a>
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
            <?php endif; ?>
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('success'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
            <?php endif; ?>
            <div class="card">
                <div class="card-body border-bottom">
                    <div class="row">
                        <div class="col-lg-6 d-flex align-items-center">
                            <h4 class="card-title mb-0"><strong>Data Manajemen Resiko</strong> Periode : TW <span id="head_triwulan"><?= $triwulan ?></span> - <span id="head_tahun"><?= $tahun ?></span></h4>
                        </div>
                        <div class="col-lg-6">
                            <div class="d-flex justify-content-end">
                                <div class="pr-2">
                                    <select class="form-control show-tick ms select2" required="" id="triwulan_cari" name="triwulan_cari" data-placeholder="Select">
                                        <option value="" selected disabled>-- Triwulan --</option>
                                        <option value="1" <?= ($triwulan == 1) ? 'selected' : '' ?>>TW I</option>
                                        <option value="2" <?= ($triwulan == 2) ? 'selected' : '' ?>>TW II</option>
                                        <option value="3" <?= ($triwulan == 3) ? 'selected' : '' ?>>TW III</option>
                                        <option value="4" <?= ($triwulan == 4) ? 'selected' : '' ?>>TW IV</option>
                                    </select>
                                </div>
                                <div class="pr-2">
                                    <select class="form-control show-tick ms select2" required="" id="tahun_cari" name="tahun_cari" data-placeholder="Select">
                                        <option value="" selected disabled>-- Tahun --</option>
                                        <?php for ($i = 2021; $i <= date('Y'); $i++) { ?>
                                            <option value="<?= $i ?>" <?= ($tahun == $i) ? 'selected' : '' ?>><?= $i ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="pr-2">
                                    <button type="button" id="btn_filter" class="btn btn-primary px-4">Filter</button>
                                </div>
                                <?php if ($this->session->userdata('level_user') == 1) { ?>
                                    <div class="pr-2">
                                        <a href="<?= site_url('Manajemen/add_resiko') ?>" class="btn btn-default"><i class="fa fa-plus"></i> Tambah Data</a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dt_monitoring_resiko" class="table table-bordered table-striped table-hover ">
                            <thead>
                                <tr class="text-white" style="background-color: #a41623;">
                                    <td class="text-center"><b>No.</b></td>
                                    <td class="text-center"><b>Indikator</b></td>
                                    <td class="text-center"><b>Bobot</b></td>
                                    <td class="text-center"><b>Target</b></td>
                                    <td class="text-center"><b>Realisasi</b></td>
                                    <td class="text-center"><b>Skala</b></td>
                                    <td class="text-center"><b>Hasil Penilaian</b></td>
                                    <td class="text-center"><b>Skor Penilaian</b></td>
                                    <td class="text-center"><b>Aksi</b></td>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type="text/javascript">
    // format setiap 3 digit diberi titik
    function formatAngka(angka) {
        return angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    function getDataResiko(triwulan, tahun) {
        const table = $('#dt_monitoring_resiko');
        table.find('tbody').empty();
        $.ajax({
            url: "<?= base_url('Manajemen/get_resiko') ?>",
            method: "POST",
            data: {
                triwulan: triwulan,
                tahun: tahun
            },
            success: function(data) {
                data = JSON.parse(data);

                const tbody = table.find('tbody');
                tbody.empty();

                if (data.length === 0) {
                    const emptyRow = document.createElement('tr');
                    emptyRow.innerHTML = `
                        <td colspan="9" class="text-center font-italic">Tidak ada data</td>
                    `;
                    tbody.append(emptyRow);
                    return;
                }

                const baseUrl = "<?= base_url('Manajemen') ?>";
                let totalSkala = 0;
                let totalSkor = 0;

                data.forEach((group, index) => {
                    const item = group.indikator;
                    const row = document.createElement('tr');

                    totalSkala += parseInt(item.skala);
                    totalSkor += parseInt(item.skor_penilaian) || 0;

                    const tambahSubButton = (item.indikator === "4") ?
                        `<a href="${baseUrl}/add_sub_resiko/${item.id_manajemen_resiko}" class="btn btn-primary btn-sm" title="Tambah Sub"><i class="fa fa-plus"></i></a>` : "";

                    row.innerHTML = `
                        <td class="text-center font-weight-bold">${index + 1}</td>
                        <td class="font-weight-bold">${item.nama_indikator}</td>
                        <td class="text-center font-weight-bold"><span class="badge badge-lg badge-pill badge-success" style="font-size: 16px;">${item.bobot}%</span></td>
                        <td class="text-center font-weight-bold">${formatAngka(item.target)}</td>
                        <td class="text-center font-weight-bold">${formatAngka(item.realisasi)}</td>
                        <td class="text-center font-weight-bold">${item.skala}</td>
                        <td class="text-center font-weight-bold">${item.hasil_penilaian}</td>
                        <td class="text-center font-weight-bold">${item.skor_penilaian || '-'}</td>
                        <td class="text-center">
                            <a href="${baseUrl}/hapus_resiko/${item.id_manajemen_resiko}" class="btn btn-danger btn-sm mb-1" onclick="return confirm('Yakin menghapus data?')"><i class="fa fa-trash"></i></a>
                            ${tambahSubButton}
                        </td>
                    `;

                    tbody.append(row);

                    group.sub.forEach((sub, i) => {
                        totalSkala += parseInt(sub.skala);
                        const subRow = document.createElement('tr');
                        subRow.innerHTML = `
                            <td></td>
                            <td class="font-weight-bold">4.${i + 1}. ${sub.nama_sub_indikator}</td>
                            <td class="text-center font-weight-bold"><span class="badge badge-lg badge-pill badge-success" style="font-size: 16px;">${sub.bobot}%</span></td>
                            <td class="text-center font-weight-bold">${formatAngka(sub.target)}</td>
                            <td class="text-center font-weight-bold">${formatAngka(sub.realisasi)}</td>
                            <td class="text-center font-weight-bold">${sub.skala}</td>
                            <td class="text-center font-weight-bold">${sub.hasil_penilaian}</td>
                            <td class="text-center font-weight-bold">${sub.skor_penilaian}</td>
                            <td class="text-center">
                                <a href="${baseUrl}/hapus_sub_resiko/${sub.id_sub_manajemen_resiko}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin menghapus data?')"><i class="fa fa-trash"></i></a>
                            </td>
                        `;
                        tbody.append(subRow);
                    });
                });

                const totalNilai = document.createElement('tr');
                totalNilai.innerHTML = `
                    <td colspan="5" class="text-center font-weight-bold">Total Nilai</td>
                    <td class="text-center font-weight-bold">${totalSkala}</td>
                    <td></td>
                    <td class="text-center font-weight-bold">${totalSkor}</td>
                    <td></td>
                `;

                let kualitasLabel = '';
                let badgeClass = 'badge-secondary';

                if (totalSkor > 90) {
                    kualitasLabel = 'Strong';
                    badgeClass = 'badge-success';
                } else if (totalSkor >= 85 && totalSkor <= 90) {
                    kualitasLabel = 'Satisfactory';
                    badgeClass = 'badge-success';
                } else if (totalSkor >= 80 && totalSkor <= 84) {
                    kualitasLabel = 'Fair';
                    badgeClass = 'badge-warning';
                } else if (totalSkor >= 75 && totalSkor <= 79) {
                    kualitasLabel = 'Marginal';
                    badgeClass = 'badge-danger';
                } else {
                    kualitasLabel = 'Unsatisfactory';
                    badgeClass = 'badge-danger';
                }

                const kualitas = document.createElement('tr');
                kualitas.innerHTML = `
                    <td colspan="7" class="text-center font-weight-bold">KUALITAS PENERAPAN MANAJEMEN RISIKO</td>
                    <td class="text-center font-weight-bold">
                        <span class="badge badge-lg badge-pill ${badgeClass}" style="font-size: 16px; font-weight: bold">
                            <i>${kualitasLabel}</i>
                        </span>
                    </td>
                    <td></td>
                `;

                tbody.append(totalNilai);
                tbody.append(kualitas);
            },
            error: function(data) {
                console.log(data);
            }
        });
    }
    let btn_filter = $("#btn_filter");

    btn_filter.click(function() {
        let triwulan = $("#triwulan_cari").val();
        let tahun = $("#tahun_cari").val();
        let head_tahun = $("#head_tahun");
        let head_triwulan = $("#head_triwulan");
        head_tahun.text(tahun);
        head_triwulan.text(triwulan);

        getDataResiko(triwulan, tahun);
    });

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

    $(document).ready(function() {
        let triwulan = $("#triwulan_cari").val();
        let tahun = $("#tahun_cari").val();
        getDataResiko(triwulan, tahun);

        // $('#dt_monitoring_resiko').DataTable({
        //     "processing": true,
        //     "serverSide": true,
        //     "order": [1, 'desc'],
        //     "columnDefs": [{
        //         targets: 0,
        //         width: "1%",
        //         className: "dt-nowrap"
        //     }, {
        //         targets: -1,
        //         width: "2%",
        //         className: "dt-nowrap"
        //     }, {
        //         "orderable": false,
        //         "targets": [-1]
        //     }],
        //     "ajax": {
        //         "url": "<?= base_url('manajemen /get_resiko') ?>",
        //         "type": "POST",
        //         "data": {
        //             triwulan: triwulan,
        //             tahun: tahun
        //         }
        //     },
        //     "columns": [{
        //             "data": "id"
        //         },
        //         {
        //             "data": "nama_indikator"
        //         },
        //         {
        //             "data": "bobot"
        //         },
        //         {
        //             "data": "target"
        //         },
        //         {
        //             "data": "target"
        //         },
        //         {
        //             "data": "realisasi"
        //         },
        //         {
        //             "data": "skala"
        //         },
        //         {
        //             "data": "hasil_penilaian"
        //         },
        //         {
        //             "data": "skor_penilaian"
        //         },
        //         {
        //             "data": "created_at",
        //             "visible": false,
        //             "searchable": false
        //         },
        //         {
        //             "data": "aksi"
        //         }
        //     ],
        //     "language": lang
        // });

        // $(document).on('click', '.btn-edit', function() {
        //     let modalEdit = $('#modalEdit');
        //     let id = $(this).data('id');
        //     let jenis = $(this).data('jenis');
        //     let tanggal = $(this).data('tanggal');
        //     let nilai = $(this).data('nilai');
        //     let bulanTahun = tanggal.substring(0, 7);

        //     modalEdit.find('input[name="id"]').val(id);
        //     modalEdit.find('select[name="jenis"]').val(jenis).trigger('change');
        //     modalEdit.find('input[name="tanggal"]').val(bulanTahun);
        //     modalEdit.find('input[name="nilai"]').val(nilai);

        //     modalEdit.modal('show');
        // });
    });
</script>