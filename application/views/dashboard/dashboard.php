<?php

use phpDocumentor\Reflection\DocBlock\Tags\Param;

$tahun = '2025';
$lastUpdateDashboard6 = "Desember $tahun";
$lastUpdateDashboard7 = "November $tahun";
$lastUpdateDashboard8 = "Desember $tahun";
?>

<div class="container-fluid">
    <div class="mb-2">
        <div class="d-flex align-items-center justify-content-end">
            <div class="inline-block">
                <p class="mb-0 mr-2">Filter:</p>
            </div>
            <select class="form-control show-tick ms select2 w-auto mr-2 d-none" name="bulan_filter" id="bulan_filter">
                <option value="" disabled selected>-- Bulan --</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
            <select class="form-control show-tick ms select2 w-auto" name="tahun_filter" id="tahun_filter">
                <option value="" disabled selected>-- Tahun --</option>
                <?php for ($i = date('Y'); $i >= 2020; $i--): ?>
                    <option value="<?= $i; ?>" <?= ($i == date('Y')) ? 'selected' : ''; ?>><?= $i; ?></option>
                <?php endfor; ?>
            </select>
        </div>
    </div>

    <!-- Dashboard 1 - Peta Trase -->
    <?php include 'peta_trase.php'; ?>

    <!-- Dashboard 2 - Kronologis Pendirian -->
    <?php include 'kronologis_pendirian.php'; ?>

    <!-- Dashboard 3 - Monitoring Progres Pekerjaan -->
    <?php include 'monitoring_progres_pekerjaan.php'; ?>

    <!-- Dashboard 4 - Monitoring Laju Harian Rata-Rata & Pendapatan Tol -->
    <?php include 'monitoring_volume_lalu_lintas_pendapatan_tol.php'; ?>

    <!-- Dashboard 5 - Monitoring RKAP -->
    <?php include 'monitoring_rkap.php'; ?>

    <!-- Dashboard 6 - Monitoring Kelayakan Investasi -->
    <?php include 'monitoring_kelayakan_investasi.php'; ?>

    <!-- Dashboard 7 - Monitoring Pembiayaan -->
    <?php include 'monitoring_pembiayaan.php'; ?>

    <!-- Dashboard 8 - Monitoring Dana Talangan Tanah dan Pembayaran -->
    <?php include 'monitoring_dana_talangan_tanah_pembayaran.php'; ?>

    <!-- Dashboard 9 - Manajemen Resiko -->
    <?php include 'manajemen_resiko.php'; ?>

    <!-- Dashboard 10 - Kewajiban Kepatuhan JMJ -->
    <?php include 'kewajiban_kepatuhan_jmj.php'; ?>

    <!-- Dashboard 11 - Monitoring Sistem Manajemen Integrasi -->
    <?php include 'monitoring_sistem_manajemen_integrasi.php'; ?>

    <!-- Dashboard 12 - Monitoring KPI -->
    <?php include 'monitoring_kpi.php'; ?>

    <?php if ($this->session->userdata('level_user') == 1) { ?>
        <!-- Dashboard 13 - Monitoring Kelengkapan Dokumen Kontrak Konstruksi Tol -->
        <?php include 'monitoring_kelengkapan_dokumen_kontrak_konstruksi_tol.php'; ?>

        <!-- Dashboard 14 - Monitoring Kelengkapan Dokumen Kontrak Konsultan Tol -->
        <?php include 'monitoring_kelengkapan_dokumen_kontrak_konsultan_tol.php'; ?>
    <?php } ?>
</div>

<?php include 'modal/modal.php'; ?>

<!-- Highcharts -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
    let urlBase = "<?= base_url(''); ?>";
</script>
<!-- Modul untuk map custom -->
<script src="<?= base_url('assets/dist/js/map-custom.js'); ?>"></script>

<!-- Modul untuk dashboard -->
<script src="<?= base_url('assets/dist/js/dashboard.js'); ?>"></script>
<script src="<?= base_url('assets/js/chart/dashboard3.js'); ?>"></script>
<script src="<?= base_url('assets/js/chart/dashboard4.js'); ?>"></script>
<script src="<?= base_url('assets/js/chart/dashboard5.js'); ?>"></script>
<script src="<?= base_url('assets/js/chart/dashboard6.js'); ?>"></script>
<script src="<?= base_url('assets/js/chart/dashboard7.js'); ?>"></script>
<script src="<?= base_url('assets/js/chart/dashboard8.js'); ?>"></script>
<script src="<?= base_url('assets/js/chart/dashboard9.js'); ?>"></script>
<script src="<?= base_url('assets/js/chart/dashboard10.js'); ?>"></script>
<script src="<?= base_url('assets/js/chart/dashboard12.js') ?>"></script>
<script src="<?= base_url('assets/js/chart/dashboard14.js') ?>"></script>

<script>
    function hitungRataRata(arrayAngka) {
        if (!Array.isArray(arrayAngka) || arrayAngka.length === 0) {
            return '0.00';
        }

        const total = arrayAngka.reduce((acc, val) => acc + val, 0);
        const rataRata = total / arrayAngka.length;

        return rataRata.toFixed(2);
    }

    function DataKPI(tahun) {
        getDataKPI({
            url: "<?= base_url('Manajemen/get_kpi?tahun=') ?>" + tahun,
            processing: true,
            serverSide: true,
            searching: false,
            ordering: false,
            info: false,
            paging: false,
            columnDefs: [{
                    targets: 0,
                    width: "1%",
                    className: "dt-nowrap",
                },
                {
                    targets: [0, 2, 3, 4, 5, 7, 8, 9, 10, 11, 12, 13, 14],
                    className: "text-center",
                },
            ],
            columns: [{
                    data: "id",
                },
                {
                    data: "nama",
                },
                {
                    data: "satuan",
                },
                {
                    data: "polaritas",
                },
                {
                    data: "bobot",
                },
                {
                    data: "batas_nilai",
                },
                {
                    data: "periode",
                },
                {
                    data: "rencana_q1",
                },
                {
                    data: "rencana_q2",
                },
                {
                    data: "rencana_q3",
                },
                {
                    data: "rencana_1y",
                },
                {
                    data: "realisasi_q1",
                },
                {
                    data: "realisasi_q2",
                },
                {
                    data: "realisasi_q3",
                },
                {
                    data: "realisasi_1y",
                },
                {
                    data: "keterangan",
                },
            ],
        });
    }

    $(document).ready(function() {
        let tahun_filter = $("#tahun_filter");

        tahun_filter.change(function() {
            let tahun = $(this).val();
            console.log(tahun);
            DataKPI(tahun);
        });

        // Dashboard 3
        $.ajax({
            type: "GET",
            url: "<?php echo site_url('Dashboard/get_tahap1') ?>",
            dataType: "json",
            success: function(response) {
                barChartProgres({
                    id: 'bar_progres_tahap1',
                    title: "Tahap 1",
                    categories: [
                        "Paket 1.1<br>Kartasura-Klaten<br><b>22.3 km</b>",
                        "Paket 1.2<br>Klaten-Purwomartani<br><b>20.08 km</b>",
                        "Paket 2.1A<br>Purwomartani-Maguwoharjo<br><b>3.725 km</b>",
                        "Paket 2.2B<br>Trihanggo-JC Sleman<br><b>3.24 km</b>"
                    ],
                    series: [{
                        originalName: 'Konstruksi',
                        name: 'Konstruksi',
                        data: response.tahap1_progres_konstruksi,
                        color: '#FFb848'
                    }, {
                        originalName: 'Pembebasan Lahan (UGK)',
                        name: 'Pembebasan Lahan (UGK)',
                        data: response.tahap1_progres_lahan,
                        color: '#0077b6'
                    }, {
                        originalName: 'RTA',
                        name: 'RTA',
                        data: response.tahap1_progres_rta,
                        color: '#28b779'
                    }],
                });
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });

        $.ajax({
            type: "GET",
            url: "<?php echo site_url('Dashboard/get_tahap2') ?>",
            dataType: "json",
            success: function(response) {
                barChartProgres({
                    id: 'bar_progres_tahap2',
                    title: "Tahap 2",
                    categories: [
                        "Paket 3.1<br>Junction Sleman-Gamping<br><b>7.417 km</b>",
                        "Paket 3.1A<br>Gamping-Sentolo<br><b>10 km</b>",
                        "Paket 3.1B<br>Sentolo-Wates<br><b>7.995 km</b>",
                        "Paket 3.2A<br>Wates-Kulonprogo<br><b>10.331 km</b>",
                        "Paket 3.2B<br>Kulonprogo - Purworejo<br><b>3.135 km</b>",
                    ],
                    series: [{
                        originalName: 'Konstruksi',
                        name: 'Konstruksi',
                        data: response.tahap2_progres_konstruksi,
                        color: '#FFb848'
                    }, {
                        originalName: 'Pembebasan Lahan (UGK)',
                        name: 'Pembebasan Lahan (UGK)',
                        data: response.tahap2_progres_lahan,
                        color: '#0077b6'
                    }, {
                        originalName: 'RTA',
                        name: 'RTA',
                        data: response.tahap2_progres_rta,
                        color: '#28b779'
                    }],
                });
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });

        $.ajax({
            type: "GET",
            url: "<?php echo site_url('Dashboard/get_tahap3') ?>",
            dataType: "json",
            success: function(response) {
                barChartProgres({
                    id: 'bar_progres_tahap3',
                    title: "Tahap 3",
                    categories: [
                        "Paket 2.1B<br>Maguwoharjo-Monjali<br><b>5.7 km</b>",
                        "Paket 2.2A<br>Monjali-Trihanggo<br><b>2.8 km</b>",
                    ],
                    series: [{
                        originalName: 'Konstruksi',
                        name: 'Konstruksi',
                        data: response.tahap3_progres_konstruksi,
                        color: '#FFb848'
                    }, {
                        originalName: 'Pembebasan Lahan (UGK)',
                        name: 'Pembebasan Lahan (UGK)',
                        data: response.tahap3_progres_lahan,
                        color: '#0077b6'
                    }, {
                        originalName: 'RTA',
                        name: 'RTA',
                        data: response.tahap3_progres_rta,
                        color: '#28b779'
                    }],
                });
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });

        const tahunLHR = $("#tahun_lhr");
        const tahunPendapatan = $("#tahun_pendapatan");

        tahunLHR.change(function() {
            $.ajax({
                type: "GET",
                url: "<?php echo site_url('Dashboard/get_data_lhr') ?>",
                data: {
                    tahun: tahunLHR.val()
                },
                dataType: "json",
                success: function(res) {
                    const categories = res.map(item => item.bulan);

                    const ppjt = res.map(item => Number(item.ppjt));
                    const rkap = res.map(item => Number(item.rkap));
                    const realisasi = res.map(item => Number(item.realisasi));
                    const prognosa = res.map(item => Number(item.prognosa));
                    lineChartDashboard4({
                        id: 'line_volume_filter',
                        title: "Laju Harian Rata-Rata (LHR) Tahun " + tahunLHR.val(),
                        subtitle: "",
                        yAxisTitle: "Jumlah Volume",
                        categories: categories,
                        series: [{
                                name: 'PPJT',
                                data: ppjt
                            },
                            {
                                name: 'RKAP',
                                data: rkap
                            },
                            {
                                name: 'Realisasi',
                                data: realisasi
                            },
                            {
                                name: 'Prognosa',
                                data: prognosa
                            }
                        ]
                    });
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        });

        tahunPendapatan.change(function() {
            $.ajax({
                type: "GET",
                url: "<?php echo site_url('Dashboard/get_data_pendapatan') ?>",
                data: {
                    tahun: tahunPendapatan.val()
                },
                dataType: "json",
                success: function(res) {
                    const categories = res.map(item => item.bulan);

                    const ppjt = res.map(item => Number(item.ppjt));
                    const rkap = res.map(item => Number(item.rkap));
                    const realisasi = res.map(item => Number(item.realisasi));
                    const prognosa = res.map(item => Number(item.prognosa));
                    lineChartDashboard4({
                        id: 'line_pendapatan_filter',
                        title: 'Perbandingan Pendapatan Tol Tahun ' + tahunPendapatan.val(),
                        subtitle: 'dalam jutaan rupiah',
                        yAxisTitle: "Jumlah Pendapatan",
                        categories: categories,
                        series: [{
                                name: 'PPJT',
                                data: ppjt
                            },
                            {
                                name: 'RKAP',
                                data: rkap
                            },
                            {
                                name: 'Realisasi',
                                data: realisasi
                            },
                            {
                                name: 'Prognosa',
                                data: prognosa
                            }
                        ]
                    });
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        })

        // Dashboard 4
        $.ajax({
            type: "GET",
            url: "<?php echo site_url('Dashboard/get_data_lhr') ?>",
            data: {
                tahun: tahunLHR.val()
            },
            dataType: "json",
            success: function(res) {
                const categories = res.map(item => item.bulan);

                const ppjt = res.map(item => Number(item.ppjt));
                const rkap = res.map(item => Number(item.rkap));
                const realisasi = res.map(item => Number(item.realisasi));
                const prognosa = res.map(item => Number(item.prognosa));
                lineChartDashboard4({
                    id: 'line_volume_filter',
                    title: "Laju Harian Rata-Rata (LHR) Tahun " + tahunLHR.val(),
                    subtitle: "",
                    yAxisTitle: "Jumlah Volume",
                    categories: categories,
                    series: [{
                            name: 'PPJT',
                            data: ppjt
                        },
                        {
                            name: 'RKAP',
                            data: rkap
                        },
                        {
                            name: 'Realisasi',
                            data: realisasi
                        },
                        {
                            name: 'Prognosa',
                            data: prognosa
                        }
                    ]
                });
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });

        $.ajax({
            type: "GET",
            url: "<?php echo site_url('Dashboard/get_data_pendapatan') ?>",
            data: {
                tahun: tahunPendapatan.val()
            },
            dataType: "json",
            success: function(res) {
                const categories = res.map(item => item.bulan);

                const ppjt = res.map(item => Number(item.ppjt));
                const rkap = res.map(item => Number(item.rkap));
                const realisasi = res.map(item => Number(item.realisasi));
                const prognosa = res.map(item => Number(item.prognosa));
                lineChartDashboard4({
                    id: 'line_pendapatan_filter',
                    title: 'Perbandingan Pendapatan Tol Tahun ' + tahunPendapatan.val(),
                    subtitle: 'dalam jutaan rupiah',
                    yAxisTitle: "Jumlah Pendapatan",
                    categories: categories,
                    series: [{
                            name: 'PPJT',
                            data: ppjt
                        },
                        {
                            name: 'RKAP',
                            data: rkap
                        },
                        {
                            name: 'Realisasi',
                            data: realisasi
                        },
                        {
                            name: 'Prognosa',
                            data: prognosa
                        }
                    ]
                });
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });

        lineChartDashboard4({
            // tahun js
            id: 'line_volume',
            title: "Laju Harian Rata-Rata (LHR) Tahun " + new Date().getFullYear(),
            subtitle: "",
            yAxisTitle: "Jumlah Volume",
            categories: <?= json_encode($pv_chart_data['pv_labels']) ?>,
            series: <?= json_encode($pv_chart_data['pv_datasets']) ?>
        });

        lineChartDashboard4({
            id: 'line_pendapatan',
            title: 'Perbandingan Pendapatan Tol Tahun Tahun' + new Date().getFullYear(),
            subtitle: 'dalam jutaan rupiah',
            yAxisTitle: "Jumlah Pendapatan",
            categories: <?= json_encode($pp_chart_data['pp_labels']) ?>,
            series: <?= json_encode($pp_chart_data['pp_datasets']) ?>
        });

        // Dashboard 5 
        barDashboard5({
            id: 'bar_opex',
            title: 'Total Opex',
            subtitle: '2025',
            xCategories: ['TW I', 'TW II', 'TW III', 'TW IV'],
            events: {
                click: function(e) {
                    let ids = this.z;
                    let tw = this.point.category;
                    return view_detail_opex(ids, tw);
                }
            },
            series: [{
                    name: 'Rencana',
                    data: [{
                            y: <?= $opex_rencana1; ?>,
                            z: 1,
                        },
                        {
                            y: <?= $opex_rencana2; ?>,
                            z: 2,
                        },
                        {
                            y: <?= $opex_rencana3; ?>,
                            z: 3,
                        },
                        {
                            y: <?= $opex_rencana4; ?>,
                            z: 4,
                        }
                    ],
                    color: '#ffca3a'
                },
                {
                    name: 'Realisasi',
                    data: [{
                            y: <?php echo $opex_realisasi1; ?>,
                            z: 1,
                        },
                        {
                            y: <?php echo $opex_realisasi2; ?>,
                            z: 2,
                        },
                        {
                            y: <?php echo $opex_realisasi3; ?>,
                            z: 3,
                        },
                        {
                            y: <?php echo $opex_realisasi4; ?>,
                            z: 4,
                        }
                    ],
                    color: '#1982c4'
                },
            ]
        });
        barDashboard5({
            id: 'bar_capex',
            title: 'Total Capex',
            subtitle: '2025',
            xCategories: ['TW I', 'TW II', 'TW III', 'TW IV'],
            events: {
                click: function(e) {
                    let ids = this.z;
                    let tw = this.point.category;
                    return view_detail_capex(ids, tw);
                }
            },
            series: [{
                    name: 'Rencana',
                    data: [{
                            y: <?php echo $capex_rencana1; ?>,
                            z: 1,
                        },
                        {
                            y: <?php echo $capex_rencana2; ?>,
                            z: 2,
                        },
                        {
                            y: <?php echo $capex_rencana3; ?>,
                            z: 3,
                        },
                        {
                            y: <?php echo $capex_rencana4; ?>,
                            z: 4,
                        }
                    ],
                    color: '#ffca3a'
                },
                {
                    name: 'Realisasi',
                    data: [{
                            y: <?php echo $capex_realisasi1; ?>,
                            z: 1,
                        },
                        {
                            y: <?php echo $capex_realisasi2; ?>,
                            z: 2,
                        },
                        {
                            y: <?php echo $capex_realisasi3; ?>,
                            z: 3,
                        },
                        {
                            y: <?php echo $capex_realisasi4; ?>,
                            z: 4,
                        }
                    ],
                    color: '#1982c4'
                },
            ]
        });

        // Dashboard 8
        $.ajax({
            url: "<?= base_url('Progres/getAlokasiDTT'); ?>",
            type: 'GET',
            dataType: 'JSON',
            success: function(response) {
                pieDashboard8({
                    id: 'alokasi_pengadaan_tanah',
                    title: 'Alokasi Pengembalian DTT & Pembayaran Langsung',
                    series: [{
                        name: 'Alokasi',
                        data: response.series
                    }]
                });
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });

        $.ajax({
            url: "<?= base_url('Progres/getFasilitasDTT'); ?>",
            type: 'GET',
            dataType: 'JSON',
            success: function(response) {
                pieDashboard8({
                    id: 'dana_talanangan_tanah',
                    title: 'Alokasi Pengembalian DTT & Pembayaran Langsung',
                    point: {
                        events: {
                            click: function() {
                                getData("#modalDanaTalanganTanah");
                            },
                        },
                    },
                    series: [{
                        name: 'Fasilitas',
                        data: response.series
                    }]
                });
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });

        chartDashboard8({
            id: "chart_pembayaran_langsung",
        });

        // Dashbaord 9 
        getDataResiko("<?= base_url('Dashboard/get_manajemen_resiko') ?>", "<?= base_url('Manajemen') ?>");

        // Dashboard 10
        bar_kepatuhan({
            id: "bar_kepatuhan",
            series: [{
                name: 'Total Kepatuhan',
                data: [{
                    y: <?= ($operasional_ada / $operasional_tot) * 100 ?>,
                    color: '#2255a4'
                }, {
                    y: <?= ($korporasi_ada / $korporasi_tot) * 100 ?>,
                    color: '#28b779'
                }, {
                    y: <?= ($perizinan_ada / $perizinan_tot) * 100 ?>,
                    color: '#ffb747'
                }, {
                    y: <?= ($regulasi_ada / $regulasi_tot) * 100 ?>,
                    color: '#da542e'
                }],
            }, ]
        });

        // Dashboard 12 Monitoring KPI
        DataKPI("<?= date('Y') ?>");

        // Dashboard 13 & 14
        <?php if ($this->session->userdata('level_user') == 1) { ?>
            PieDashboard14({
                id: 'pie_kontrakKonsTol',
                title: 'Administrasi Kontrak',
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.y}</b>',
                            distance: -40,
                        },
                        showInLegend: true,
                        point: {
                            events: {
                                click: function(e) {
                                    var ids = this.z;
                                    return view_kurang_dok_konstruksi(ids);
                                }
                            }
                        },
                        colors: [
                            '#004e98',
                            '#277da1',
                            '#577590',
                            '#4d908e',
                            '#43aa8b',
                            '#90be6d',
                            '#f9c74f',
                            '#f9844a',
                            '#f8961e',
                            '#f3722c',
                            '#f94144',
                            '#ff4d6d',
                            '#ff758f',
                            '#ffb3c1',
                            '#eaac8b'
                        ],
                    }
                },
                series: [{
                    name: 'Jumlah Kekurangan',
                    colorByPoint: true,
                    data: [{
                            name: 'Surat Penawaran',
                            y: <?= $krg_penawaran_ksi ?>,
                            sliced: true,
                            selected: true,
                            z: 1,
                        }, {
                            name: 'SPMK',
                            y: <?= $krg_spmk_ksi ?>,
                            z: 10,
                        }, {
                            name: 'HPS',
                            y: <?= $krg_hps_ksi ?>,
                            z: 74,
                        }, {
                            name: 'Kontrak',
                            y: <?= $krg_kontrak_ksi ?>,
                            z: 11,
                        }, {
                            name: 'Permohonan IP',
                            y: <?= $krg_permohononanPrinsip_ksi ?>,
                            z: 52,
                        }, {
                            name: 'KUK',
                            y: <?= $krg_kuk_ksi ?>,
                            z: 12,
                        }, {
                            name: 'Persetujuan IP',
                            y: <?= $krg_persetujuanPrinsip_ksi ?>,
                            z: 53,
                        }, {
                            name: 'KAK',
                            y: <?= $krg_kak_ksi ?>,
                            z: 13,
                        }, {
                            name: 'Penunjukan <br>Pemenang',
                            y: <?= $krg_penunjukanPemenang_ksi ?>,
                            z: 3,
                        }, {
                            name: 'KKK',
                            y: <?= $krg_kkk_ksi ?>,
                            z: 75,
                        }, {
                            name: 'Jaminan Pelaksanaan',
                            y: <?= $krg_jaminanPelaksanaan_ksi ?>,
                            z: 73,
                        }, {
                            name: 'Daftar Kuantitasc& <br>Harga',
                            y: <?= $krg_harga_ksi ?>,
                            z: 14,
                        }, {
                            name: 'Jaminan Penawaran',
                            y: <?= $krg_jaminanPenawaran_ksi ?>,
                            z: 72,
                        },
                        {
                            name: 'IKP',
                            y: <?= $krg_ikp_ksi ?>,
                            z: 15,
                        },
                    ]
                }]
            });

            Highcharts.chart('pie_proyekKonsTol', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Administrasi Proyek'
                },
                credits: {
                    enabled: false
                },
                exporting: {
                    enabled: false
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.y:.0f}</b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.y}</b>',
                            distance: -40,
                        },
                        showInLegend: true,
                        point: {
                            events: {
                                click: function(e) {
                                    let ids = this.z;
                                    return view_dokProyek_konstruksi(ids);
                                }
                            }
                        },
                        colors: [
                            '#1AA1CC',
                            '#2571EB',
                            '#FF7723',
                            '#9b72cf',
                            '#1CD345',
                            '#FF2626',
                            '#1accbd',
                            '#dd3261',
                            '#fc539f',
                            '#a7c706',
                            '#e66a7c',
                            '#81b29a',
                            '#fcbf49',
                            '#eaac8b'
                        ],
                    },
                },
                legend: {
                    enabled: true,
                    labelFormat: '{name} ({y:.0f})',
                },
                series: [{
                    name: 'Jumlah Kekurangan',
                    colorByPoint: true,
                    data: [{
                            name: 'Perhitungan MC',
                            y: <?= $bapp ?>,
                            z: 71,
                        },
                        {
                            name: 'Backup Quantity',
                            y: <?= $b_quantity ?>,
                            z: 42,
                        }, {
                            name: 'Backup Quality',
                            y: <?= $b_quality ?>,
                            z: 43,
                        }, {
                            name: 'Laporan',
                            y: <?= $laporan ?>,
                            z: 44,
                        }, {
                            name: 'Copy Kontrak',
                            y: <?= $c_kontrak ?>,
                            z: 67,
                        }, {
                            name: 'Copy SPMK',
                            y: <?= $c_spmk ?>,
                            z: 66,
                        }, {
                            name: 'Copy SK PKP',
                            y: <?= $c_sk ?>,
                            z: 64,
                        }, {
                            name: 'NPWP Perusahaan',
                            y: <?= $c_npwp ?>,
                            z: 63,
                        }, {
                            name: 'Copy SBU',
                            y: <?= $c_sbu ?>,
                            z: 62,
                        }, {
                            name: 'Izin Usaha ',
                            y: <?= $izin_usaha ?>,
                            z: 60,
                        },
                        {
                            name: 'Tanda Daftar <br>Perusahaan',
                            y: <?= $tanda_daftar ?>,
                            z: 61,
                        },

                    ]
                }]
            });

            Highcharts.chart('pie_bayarKonsTol', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Administrasi Pembayaran'
                },
                credits: {
                    enabled: false
                },
                exporting: {
                    enabled: false
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.y:.0f}</b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.y}</b>',
                            distance: -40,
                        },
                        showInLegend: true,
                        point: {
                            events: {
                                click: function(e) {
                                    var ids = this.z;
                                    return view_kurang_pembayaranKonstruksi(ids);
                                }
                            }
                        },
                        colors: [
                            '#1e6091',
                            '#1a759f',
                            '#168aad',
                            '#34a0a4',
                            '#52b69a',
                            '#76c893',
                            '#99d98c',
                            '#b5e48c',
                            '#fc539f',
                            '#a7c706',
                            '#e66a7c'
                        ],
                    }
                },
                legend: {
                    enabled: true,
                    labelFormat: '{name} ({y:.0f})',
                },
                series: [{
                    name: 'Jumlah Kekurangan',
                    colorByPoint: true,
                    data: [{
                            name: 'BA Pembayaran (BAP)',
                            y: <?= $bap_ksi ?>,
                            sliced: true,
                            selected: true,
                            z: 31,
                        }, {
                            name: 'Srt Permohonan Pembayaran',
                            y: <?= $spp_ksi ?>,
                            z: 32,
                        }, {
                            name: 'Kwitansi',
                            y: <?= $kwitansi_ksi ?>,
                            z: 33,
                        }, {
                            name: 'Faktur Pajak (PPN)',
                            y: <?= $faktur_ksi ?>,
                            z: 34,
                        },
                        // {
                        //     name: 'Perhitungan Pajak',
                        //     y: <?= $p_pajak ?>,
                        //     z: 79,
                        // },
                        // {
                        //     name: 'Disposisi Direksi',
                        //     y: <?= $d_direksi ?>,
                        //     z: 78,
                        // },
                        // {
                        //     name: 'Ijin Penggunaan Anggaran',
                        //     y: <?= $i_anggaran ?>,
                        //     z: 77,
                        // },
                        {
                            name: 'Nota Dinas',
                            y: <?= $nota ?>,
                            z: 76,
                        },

                    ]
                }]
            });

            Highcharts.chart('pie_kontrakKonsultan', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Administrasi Kontrak'
                },
                credits: {
                    enabled: false
                },
                exporting: {
                    enabled: false
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.y:.0f}</b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.y}</b>',
                            distance: -40,
                        },
                        showInLegend: true,
                        point: {
                            events: {
                                click: function(e) {

                                    var ids = this.z;
                                    return view_kurang_dok_konsultan(ids);
                                }
                            }
                        },
                        colors: [
                            '#004e98',
                            '#277da1',
                            '#577590',
                            '#4d908e',
                            '#43aa8b',
                            '#90be6d',
                            '#f9c74f',
                            '#f9844a',
                            '#f8961e',
                            '#f3722c',
                            '#f94144',
                            '#ff4d6d',
                            '#ff758f',
                            '#ffb3c1',
                            '#eaac8b'
                        ],
                    }
                },
                legend: {
                    enabled: true,
                    labelFormat: '{name} ({y:.0f})',
                },
                series: [{
                    name: 'Jumlah Kekurangan',
                    colorByPoint: true,
                    data: [{
                        name: 'Surat Penawaran',
                        y: <?= $krg_penawaran_kst ?>,
                        sliced: true,
                        selected: true,
                        z: 1,
                    }, {
                        name: 'HPS',
                        y: <?= $krg_hps_kst ?>,
                        z: 74,
                    }, {
                        name: 'Permohonan Ijin Prinsip',
                        y: <?= $krg_permohononanPrinsip_kst ?>,
                        z: 52,
                    }, {
                        name: 'Persetujuan Ijin Prinsip',
                        y: <?= $krg_persetujuanPrinsip_kst ?>,
                        z: 53,
                    }, {
                        name: 'Penunjukan Pemenang',
                        y: <?= $krg_suratPenunjukan_kst ?>,
                        z: 3,
                    }, {
                        name: 'Jaminan Pelaksanaan',
                        y: <?= $krg_jaminanPelaksanaan_kst ?>,
                        z: 73,
                    }, {
                        name: 'Jaminan Penawaran',
                        y: <?= $krg_jaminanPenawaran_kst ?>,
                        z: 72,
                    }, {
                        name: 'SPMK',
                        y: <?= $krg_spmk_kst ?>,
                        z: 10,
                    }, {
                        name: 'Kontrak',
                        y: <?= $krg_kontrak_kst ?>,
                        z: 11,
                    }, {
                        name: 'KUK',
                        y: <?= $krg_ketUmum_kst ?>,
                        z: 12,
                    }, {
                        name: 'KAK',
                        y: <?= $krg_kak_kst ?>,
                        z: 13,
                    }, {
                        name: 'KKK',
                        y: <?= $krg_kkk_kst ?>,
                        z: 75,
                    }, {
                        name: 'Daftar Kuantitasa & Harga',
                        y: <?= $krg_kuantitas_kst ?>,
                        z: 14,
                    }, {
                        name: 'IKP',
                        y: <?= $krg_instruksi_kst ?>,
                        z: 15,
                    }, ]
                }]
            });

            Highcharts.chart('pie_bayarKonsultan', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Administrasi Pembayaran'
                },
                credits: {
                    enabled: false
                },
                exporting: {
                    enabled: false
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.y:.0f}</b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.y}</b>',
                            distance: -40,
                        },
                        showInLegend: true,
                        point: {
                            events: {
                                click: function(e) {
                                    var ids = this.z;
                                    return view_kurang_pembayaranKonsultan(ids);
                                }
                            }
                        },
                        colors: [
                            '#1AA1CC',
                            '#2571EB',
                            '#FF7723',
                            '#ECCD2C',
                            '#1CD345',
                            '#FF2626',
                            '#1accbd',
                            '#dd3261',
                            '#fc539f',
                            '#a7c706',
                            '#e66a7c'
                        ],
                    }
                },
                legend: {
                    enabled: true,
                    labelFormat: '{name} ({y:.0f})',
                },
                series: [{
                    name: 'Jumlah Kekurangan',
                    colorByPoint: true,
                    data: [{
                            name: 'Berita Acara Pembayaran (BAP)',
                            y: <?= $bap_kst ?>,
                            sliced: true,
                            selected: true,
                            z: 31,
                        }, {
                            name: 'BAPP',
                            y: <?= $bapp_kst ?>,
                            z: 80,
                        }, {
                            name: 'BAST',
                            y: <?= $bast_kst ?>,
                            z: 81,
                        },
                        {
                            name: 'Faktur Pajak (PPN)',
                            y: <?= $faktur_kst ?>,
                            z: 34,
                        },
                        {
                            name: 'Invoice',
                            y: <?= $invoice_kst ?>,
                            z: 82,
                        }, {
                            name: 'Kwintansi',
                            y: <?= $kwitansi_kst ?>,
                            z: 33,
                        }, {
                            name: 'Nota Dinas',
                            y: <?= $nota_kst ?>,
                            z: 76,
                        },
                        {
                            name: 'Surat Permohonan Pembayaran',
                            y: <?= $spp_kst ?>,
                            z: 32,
                        },

                    ]
                }]
            });

        <?php } ?>
    });

    // Modal EWS
    function view_alert(params) {
        let modalIsu = $("#modalIsu");
        let detail_isu = $('#detail_isu');

        detail_isu.html(params);
        modalIsu.modal('show');
    }

    // Action Grafik Opex Capex
    function view_detail_opex(id, tw) {
        $("#tw-opex").html(tw);
        showGrafik({
            url: "<?php echo site_url('Dashboard/get_detail_opex') ?>",
            id: id,
            idDetail: "#detail_opex",
            idModal: "#view_detailOpex"
        });
    }

    function view_detail_capex(id, tw) {
        $("#tw-capex").html(tw);
        showGrafik({
            url: "<?php echo site_url('Dashboard/get_detail_capex') ?>",
            id: id,
            idDetail: "#detail_capex",
            idModal: "#view_detailCapex"
        });
    }

    // Modul untuk view_detail_sop9001
    function view_detail_sop9001() {
        $.ajax({
            type: "GET",
            url: "<?= site_url('Dashboard/view_detail_sop9001') ?>",
            success: function(response) {
                let data = "";
                const link = "<?= base_url() ?>";

                // Parse JSON dan buat tabel
                JSON.parse(response).forEach((item, index) => {
                    const date = moment(item.tanggal, "YYYY-MM-DD").format("DD-MM-YYYY");
                    const fileLink = `<a href="${link}file_uploads/dokumen/sop/${item.dok_file}" target="_BLANK" class="btn btn-sm btn-info"><i class="fa fa-print"></i></a>`;

                    data += `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${item.divisi}</td>
                            <td>${item.nama}</td>
                            <td style="text-align:center">${date}</td>
                            <td style="text-align:center">${item.nomor}</td>
                            <td style="text-align:center">${fileLink}</td>
                        </tr>
                    `;
                });

                // Update tabel dengan data yang telah dibuat
                $("#detail_sop9001").html(data);
            }
        });
        $("#sop_9001").modal('show');
    }

    // Modul untuk view_detail_sop14001
    function view_detail_sop14001() {
        $.ajax({
            type: "GET",
            url: "<?= site_url('Dashboard/view_detail_sop14001') ?>",
            success: function(response) {
                var data = "";
                $.each(JSON.parse(response), function(index, item) {
                    var date = moment(item.tanggal, "YYYY-MM-DD").format("DD-MM-YYYY");
                    var file = `<a href="<?= base_url() ?>file_uploads/dokumen/sop/${item.dok_file}" target="_BLANK" class="btn btn-sm btn-info"><i class="fa fa-print"></i></a>`;

                    data += `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${item.divisi}</td>
                            <td>${item.nama}</td>
                            <td style="text-align:center">${date}</td>
                            <td style="text-align:center">${item.nomor}</td>
                            <td style="text-align:center">${file}</td>
                        </tr>
                    `;
                });
                $("#detail_sop14001").html(data);
            }
        });
        $("#sop_14001").modal('show');
    }

    // Modul untuk view_detail_sop45001
    function view_detail_sop45001() {
        $.ajax({
            type: "GET",
            url: "<?= site_url('Dashboard/view_detail_sop45001') ?>",
            success: function(response) {
                var data = "";
                $.each(JSON.parse(response), function(index, item) {
                    var date = moment(item.tanggal, "YYYY-MM-DD").format("DD-MM-YYYY");
                    var file = `<a href="<?= base_url() ?>file_uploads/dokumen/sop/${item.dok_file}" target="_BLANK" class="btn btn-sm btn-info"><i class="fa fa-print"></i></a>`;

                    data += `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${item.divisi}</td>
                            <td>${item.nama}</td>
                            <td style="text-align:center">${date}</td>
                            <td style="text-align:center">${item.nomor}</td>
                            <td style="text-align:center">${file}</td>
                        </tr>
                    `;
                });
                $("#detail_sop45001").html(data);
            }
        });
        $("#sop_45001").modal('show');
    }

    // Modul untuk view_detail_sop37001
    function view_detail_sop37001() {
        $.ajax({
            type: "GET",
            url: "<?= site_url('Dashboard/view_detail_sop37001') ?>",
            success: function(response) {
                var data = "";
                $.each(JSON.parse(response), function(index, item) {
                    var date = moment(item.tanggal, "YYYY-MM-DD").format("DD-MM-YYYY");
                    var file = `<a href="<?= base_url() ?>file_uploads/dokumen/sop/${item.dok_file}" target="_BLANK" class="btn btn-sm btn-info"><i class="fa fa-print"></i></a>`;

                    data += `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${item.divisi}</td>
                            <td>${item.nama}</td>
                            <td style="text-align:center">${date}</td>
                            <td style="text-align:center">${item.nomor}</td>
                            <td style="text-align:center">${file}</td>
                        </tr>
                    `;
                });
                $("#detail_sop37001").html(data);
            }
        });
        $("#sop_37001").modal('show');
    }

    // Modul untuk view_detail
    function view_detaill(id_kpi) {
        $.ajax({
            type: "GET",
            url: "<?= site_url('Welcome/get_detail_gauge') ?>",
            data: {
                id_kpi: id_kpi
            },
            success: function(response) {
                var data = "";
                $.each(JSON.parse(response), function(index, item) {
                    var prog = item.persentase ? Number(item.persentase).toFixed(2) : 0;
                    var stat = '';

                    if (prog == 0) {
                        stat = `<button type="button" class="btn btn-danger btn-sm">${prog}%</button>`;
                    } else if (prog >= 100) {
                        stat = `<button type="button" class="btn btn-info btn-sm">100%</button>`;
                    } else {
                        stat = `<button type="button" class="btn btn-warning btn-sm">${prog}%</button>`;
                    }

                    data += `
                        <tr>
                            <td style="color:black">${index + 1}</td>
                            <td style="color:black">${item.program}</td>
                            <td style="color:black; text-align:center">${item.nama_manager}</td>
                            <td style="color:black; text-align:center">${stat}</td>
                        </tr>
                    `;
                });
                $("#detail_kegiatan").html(data);
            }
        });

        $("#view_auditor").modal('show');
    }

    // function dashboard 13
    // Modal untuk view_kurang_dok_konstruksi
    // Fungsi untuk menampilkan data kurang dokumen konstruksi
    function view_kurang_dok_konstruksi(id_dok) {
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('Dashboard/get_kurang_dok_konstruksi') ?>",
            data: {
                id_dok: id_dok
            },
            success: function(response) {
                var data = "";
                var jsonResponse = JSON.parse(response);

                // Looping untuk setiap item
                jsonResponse.forEach(function(item, index) {
                    // Format nilai kontrak menjadi Rupiah
                    var rupiah = item.nilai_kontrak.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');

                    // Membuat baris tabel
                    data += "<tr><td>" + (index + 1) + "</td><td>" + item.nama_kontrak + "</td><td>" + item.nomor_kontrak + "</td><td>" + rupiah + "</td></tr>";
                });

                // Menampilkan data di tabel
                $("#kurang_dok").html(data);
            }
        });

        // Menampilkan modal
        $("#view_dok_pra").modal('show');
    }

    // Modal untuk view_dokProyek_konstruksi
    // Fungsi untuk menampilkan data dokumen proyek konstruksi berdasarkan ID dokumen
    function view_dokProyek_konstruksi(id_dok) {
        $.ajax({
            type: "POST", // Menggunakan metode GET
            url: "<?php echo site_url('Dashboard/get_kurang_dokProyek') ?>", // URL tujuan
            data: {
                id_dok: id_dok
            }, // Mengirimkan ID dokumen sebagai parameter
            success: function(response) {
                var data = "";
                var jsonResponse = JSON.parse(response);

                // Looping setiap item dalam respons JSON
                jsonResponse.forEach(function(item, index) {
                    // Membuat baris tabel untuk setiap data yang diterima
                    data += "<tr>" +
                        "<td style='color:black;text-align:center'>" + (index + 1) + "</td>" + // Nomor urut
                        "<td style='color:black;text-align:center'>" + item.nomor_mc + "</td>" + // Nomor MC
                        "<td style='color:black;text-align:center'>" + item.bulan + " " + item.tahun + "</td>" + // Bulan dan tahun
                        "<td style='color:black'>" + item.keterangan + "</td>" + // Keterangan
                        "</tr>";
                });

                // Menampilkan data ke dalam elemen dengan ID 'kurang_dokProyek'
                $("#kurang_dokProyek").html(data);
            }
        });

        // Menampilkan modal dengan ID 'view_dok_proyek'
        $("#view_dok_proyek").modal('show');
    }

    // Modal untuk view_kurang_pembayaranKonstruksi
    // Fungsi untuk menampilkan data kurang pembayaran konstruksi berdasarkan ID dokumen
    function view_kurang_pembayaranKonstruksi(id_dok) {
        $.ajax({
            type: "POST", // Metode request GET
            url: "<?php echo site_url('Dashboard/get_kurang_dokPembayaranKonstruksi') ?>", // URL tujuan
            data: {
                id_dok: id_dok
            }, // Mengirimkan ID dokumen sebagai parameter
            success: function(response) {
                var data = "";
                var jsonResponse = JSON.parse(response);

                // Looping setiap item dalam respons JSON
                jsonResponse.forEach(function(item, index) {
                    // Format nilai pembayaran menjadi Rupiah
                    var rupiah = item.nilai.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');

                    // Membuat baris tabel untuk setiap data yang diterima
                    data += "<tr>" +
                        "<td style='color:black;text-align:center'>" + (index + 1) + "</td>" + // Nomor urut
                        "<td style='color:black'>" + item.keterangan + "</td>" + // Keterangan
                        "<td style='color:black;text-align:center'>" + item.termin + "</td>" + // Termin
                        "<td style='color:black;text-align:center'>" + rupiah + "</td>" + // Nilai pembayaran (Rupiah)
                        "</tr>";
                });

                // Menampilkan data ke dalam elemen dengan ID 'pembayaranKonstruksi'
                $("#pembayaranKonstruksi").html(data);
            }
        });

        // Menampilkan modal dengan ID 'view_dok_pembayaranKonstruksi'
        $("#view_dok_pembayaranKonstruksi").modal('show');
    }

    // Dashoard 14
    // Modal untuk view_kurang_dok_konsultan
    // Fungsi untuk menampilkan data kurang dokumen konsultan berdasarkan ID dokumen
    function view_kurang_dok_konsultan(id_dok) {
        $.ajax({
            type: "POST", // Menggunakan metode GET
            url: "<?php echo site_url('Dashboard/get_kurang_dok_konsultan') ?>", // URL tujuan
            data: {
                id_dok: id_dok
            }, // Mengirimkan ID dokumen sebagai parameter
            success: function(response) {
                var data = "";
                var jsonResponse = JSON.parse(response);

                // Looping setiap item dalam respons JSON
                jsonResponse.forEach(function(item, index) {
                    // Format nilai kontrak menjadi Rupiah
                    var rupiah = item.nilai_kontrak.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');

                    // Menambahkan baris baru ke dalam tabel dengan data yang diterima
                    data += "<tr>" +
                        "<td style='color:black'>" + (index + 1) + "</td>" + // Nomor urut
                        "<td style='color:black'>" + item.nama_kontrak + "</td>" + // Nama kontrak
                        "<td style='color:black;text-align:center'>" + item.nomor_kontrak + "</td>" + // Nomor kontrak
                        "<td style='color:black;text-align:center'>" + rupiah + "</td>" + // Nilai kontrak dalam Rupiah
                        "</tr>";
                });

                // Menampilkan data ke dalam elemen dengan ID 'kurang_dok'
                $("#kurang_dok").html(data);
            }
        });

        // Menampilkan modal dengan ID 'view_dok_pra'
        $("#view_dok_pra").modal('show');
    }

    // Modal untuk view_kurang_pembayaranKonsultan
    // Fungsi untuk menampilkan data kurang pembayaran konsultan berdasarkan ID dokumen
    function view_kurang_pembayaranKonsultan(id_dok) {
        $.ajax({
            type: "POST", // Metode request GET
            url: "<?php echo site_url('Dashboard/get_kurang_dokPembayaranKonsultan') ?>", // URL tujuan
            data: {
                id_dok: id_dok
            }, // Mengirimkan ID dokumen sebagai parameter
            success: function(response) {
                var data = "";
                var jsonResponse = JSON.parse(response);

                // Looping setiap item dalam respons JSON
                jsonResponse.forEach(function(item, index) {
                    // Format nilai pembayaran menjadi Rupiah
                    var rupiah = item.nilai.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');

                    // Membuat baris tabel untuk setiap data yang diterima
                    data += "<tr>" +
                        "<td style='color:black;text-align:center'>" + (index + 1) + "</td>" + // Nomor urut
                        "<td style='color:black'>" + item.keterangan + "</td>" + // Keterangan
                        "<td style='color:black;text-align:center'>" + item.termin + "</td>" + // Termin
                        "<td style='color:black;text-align:center'>" + rupiah + "</td>" + // Nilai pembayaran (Rupiah)
                        "</tr>";
                });

                // Menampilkan data ke dalam elemen dengan ID 'pembayaranKonstruksi'
                $("#pembayaranKonstruksi").html(data);
            }
        });

        // Menampilkan modal dengan ID 'view_dok_pembayaranKonstruksi'
        $("#view_dok_pembayaranKonstruksi").modal('show');
    }
</script>