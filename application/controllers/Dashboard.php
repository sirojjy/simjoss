<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $cek = $this->session->userdata('username');

        if ($cek != '' || $cek != null) {
        } else {
            redirect('Login');
        }
        $this->load->model(array('M_dashboard', 'M_dokumen'));
        //$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
    }

    // Endpoint Dashboard 3
    function get_tahap1()
    {
        $id_seksi = [1, 2, 3, 7];

        // --- Tahap 1 Lahan ---
        $queryLahan = $this->db->query("
            SELECT p.id_seksi, p.realisasi
            FROM progres_lahan p
            JOIN (
                SELECT id_seksi, MAX(tgl_progres) AS latest
                FROM progres_lahan
                GROUP BY id_seksi
            ) sub ON p.id_seksi = sub.id_seksi AND p.tgl_progres = sub.latest
            WHERE p.id_seksi IN (" . implode(',', $id_seksi) . ")
            ORDER BY p.id_seksi
        ");

        $lahan = [];
        foreach ($queryLahan->result() as $row) {
            $lahan[] = (float) $row->realisasi;
        }

        // --- Tahap 1 Konstruksi ---
        $queryKonstruksi = $this->db->query("
            SELECT p.seksi, p.realisasi
            FROM progres_konstruksi p
            JOIN (
                SELECT seksi, MAX(tgl_progres) AS latest
                FROM progres_konstruksi
                GROUP BY seksi
            ) sub ON p.seksi = sub.seksi AND p.tgl_progres = sub.latest
            WHERE p.seksi IN (" . implode(',', $id_seksi) . ")
            ORDER BY p.seksi
        ");

        $konstruksi = [];
        foreach ($queryKonstruksi->result() as $row) {
            $konstruksi[] = (float) $row->realisasi;
        }

        // --- Tahap 1 RTA ---
        $queryRTA = $this->db->query("
            SELECT p.seksi, p.realisasi
            FROM progres_rta p
            JOIN (
                SELECT seksi, MAX(tgl_progres) AS latest
                FROM progres_rta
                GROUP BY seksi
            ) sub ON p.seksi = sub.seksi AND p.tgl_progres = sub.latest
            WHERE p.seksi IN (" . implode(',', $id_seksi) . ")
            ORDER BY p.seksi
        ");

        $rta = [];
        foreach ($queryRTA->result() as $row) {
            $rta[] = (float) $row->realisasi;
        }

        // --- Output JSON Gabungan ---
        echo json_encode([
            'tahap1_progres_lahan' => $lahan,
            'tahap1_progres_konstruksi' => $konstruksi,
            'tahap1_progres_rta' => $rta
        ]);
    }

    // Endpoint Dashboard 3
    function get_tahap2()
    {
        $id_seksi = [5, 9, 10, 11, 12];

        // --- Tahap 1 Lahan ---
        $queryLahan = $this->db->query("
            SELECT p.id_seksi, p.realisasi
            FROM progres_lahan p
            JOIN (
                SELECT id_seksi, MAX(tgl_progres) AS latest
                FROM progres_lahan
                GROUP BY id_seksi
            ) sub ON p.id_seksi = sub.id_seksi AND p.tgl_progres = sub.latest
            WHERE p.id_seksi IN (" . implode(',', $id_seksi) . ")
            ORDER BY p.id_seksi
        ");

        $lahan = [];
        foreach ($queryLahan->result() as $row) {
            $lahan[] = (float) $row->realisasi;
        }

        // --- Tahap 1 Konstruksi ---
        $queryKonstruksi = $this->db->query("
            SELECT p.seksi, p.realisasi
            FROM progres_konstruksi p
            JOIN (
                SELECT seksi, MAX(tgl_progres) AS latest
                FROM progres_konstruksi
                GROUP BY seksi
            ) sub ON p.seksi = sub.seksi AND p.tgl_progres = sub.latest
            WHERE p.seksi IN (" . implode(',', $id_seksi) . ")
            ORDER BY p.seksi
        ");

        $konstruksi = [];
        foreach ($queryKonstruksi->result() as $row) {
            $konstruksi[] = (float) $row->realisasi;
        }

        // --- Tahap 1 RTA ---
        $queryRTA = $this->db->query("
            SELECT p.seksi, p.realisasi
            FROM progres_rta p
            JOIN (
                SELECT seksi, MAX(tgl_progres) AS latest
                FROM progres_rta
                GROUP BY seksi
            ) sub ON p.seksi = sub.seksi AND p.tgl_progres = sub.latest
            WHERE p.seksi IN (" . implode(',', $id_seksi) . ")
            ORDER BY p.seksi
        ");

        $rta = [];
        foreach ($queryRTA->result() as $row) {
            $rta[] = (float) $row->realisasi;
        }

        // --- Output JSON Gabungan ---
        echo json_encode([
            'tahap2_progres_lahan' => $lahan,
            'tahap2_progres_konstruksi' => $konstruksi,
            'tahap2_progres_rta' => $rta
        ]);
    }

    // Endpoint Dashboard 3
    function get_tahap3()
    {
        $id_seksi = [4, 6];

        // --- Tahap 1 Lahan ---
        $queryLahan = $this->db->query("
            SELECT p.id_seksi, p.realisasi
            FROM progres_lahan p
            JOIN (
                SELECT id_seksi, MAX(tgl_progres) AS latest
                FROM progres_lahan
                GROUP BY id_seksi
            ) sub ON p.id_seksi = sub.id_seksi AND p.tgl_progres = sub.latest
            WHERE p.id_seksi IN (" . implode(',', $id_seksi) . ")
            ORDER BY p.id_seksi
        ");

        $lahan = [];
        foreach ($queryLahan->result() as $row) {
            $lahan[] = (float) $row->realisasi;
        }

        // --- Tahap 1 Konstruksi ---
        $queryKonstruksi = $this->db->query("
            SELECT p.seksi, p.realisasi
            FROM progres_konstruksi p
            JOIN (
                SELECT seksi, MAX(tgl_progres) AS latest
                FROM progres_konstruksi
                GROUP BY seksi
            ) sub ON p.seksi = sub.seksi AND p.tgl_progres = sub.latest
            WHERE p.seksi IN (" . implode(',', $id_seksi) . ")
            ORDER BY p.seksi
        ");

        $konstruksi = [];
        foreach ($queryKonstruksi->result() as $row) {
            $konstruksi[] = (float) $row->realisasi;
        }

        // --- Tahap 1 RTA ---
        $queryRTA = $this->db->query("
            SELECT p.seksi, p.realisasi
            FROM progres_rta p
            JOIN (
                SELECT seksi, MAX(tgl_progres) AS latest
                FROM progres_rta
                GROUP BY seksi
            ) sub ON p.seksi = sub.seksi AND p.tgl_progres = sub.latest
            WHERE p.seksi IN (" . implode(',', $id_seksi) . ")
            ORDER BY p.seksi
        ");

        $rta = [];
        foreach ($queryRTA->result() as $row) {
            $rta[] = (float) $row->realisasi;
        }

        // --- Output JSON Gabungan ---
        echo json_encode([
            'tahap3_progres_lahan' => $lahan,
            'tahap3_progres_konstruksi' => $konstruksi,
            'tahap3_progres_rta' => $rta
        ]);
    }

    // Endpoint Dahsboard 9
    function get_manajemen_resiko()
    {
        $this->load->model('M_manajemen');

        $result = [];
        $indikator = $this->M_manajemen->get_manajemen_resiko_dashboard();
        foreach ($indikator as $item) {
            $entry = [
                'indikator' => $item,
                'sub' => []
            ];

            if ((int) $item->indikator === 4) {
                $sub_data = $this->M_manajemen->get_sub_manajemen_resiko($item->id_manajemen_resiko);
                $entry['sub'] = $sub_data;
            }

            $result[] = $entry;
        }
        echo json_encode($result);
        // $data = $this->M_manajemen->get_manajemen_resiko_dashboard();
        // var_dump($result);
        // echo json_encode($data);
    }

    public function index()
    {
        // $ses_data = array(
        //     'act_menu'   => 'dashboard',
        //     'title'      => 'Dashboard',
        //     'breadcrumb' => 'dashboard',
        // );
        // $this->session->set_userdata($ses_data);
        // $perbandingan_pendapatan = $this->M_dashboard->get_perbandingan_pendapatan();

        $jml_kontrak_konsultanTol = $this->db->query("select COALESCE(count(id_kontrak_konsultan),0) as jml from tb_kontrak_konsultan where jenis=1")->row()->jml;
        $jml_kontrak_konsultanNonTol = $this->db->query("select COALESCE(count(id_kontrak_konsultan),0) as jml from tb_kontrak_konsultan where jenis=2")->row()->jml;
        $jml_kontrak_konstruksi = $this->db->query("select COALESCE(count(id_kontrak_konstruksi),0) as jml from tb_kontrak_konstruksi")->row()->jml;
        $jml_kontrak_nonTol = $this->db->query("select COALESCE(count(id_kontrak_nontol),0) as jml from kontrak_konstruksi_nontol")->row()->jml;
        $jml_kontrak_peralatanTol = $this->db->query("select COALESCE(count(id_kontrak_konsultan),0) as jml from tb_kontrak_konsultan where jenis=3")->row()->jml;
        $jml_kontrak_lainnya = $this->db->query("select COALESCE(count(id_kontrak),0) as jml from kontrak_lainnya")->row()->jml;

        $sum_kontrak = $jml_kontrak_peralatanTol + $jml_kontrak_konsultanNonTol + $jml_kontrak_konstruksi + $jml_kontrak_nonTol + $jml_kontrak_peralatanTol + $jml_kontrak_lainnya;

        $nilai_kontrak_konsultanTol = $this->db->query("select COALESCE(sum(nilai_add),0) as sum from tb_kontrak_konsultan where jenis=1")->row()->sum;
        $nilai_kontrak_konsultanNonTol = $this->db->query("select COALESCE(sum(nilai_add),0) as sum from tb_kontrak_konsultan where jenis=2")->row()->sum;
        $nilai_kontrak_konstruksi = $this->db->query("select COALESCE(sum(nilai_addendum),0) as sum from tb_kontrak_konstruksi")->row()->sum;
        $nilai_kontrak_nonTol = $this->db->query("select COALESCE(sum(nilai_kontrak),0) as sum from kontrak_konstruksi_nontol")->row()->sum;
        $nilai_kontrak_peralatan = $this->db->query("select COALESCE(sum(nilai_add),0) as sum from tb_kontrak_konsultan where jenis=3")->row()->sum;
        $nilai_kontrak_lainnya = $this->db->query("select COALESCE(sum(nilai_kontrak),0) as sum from kontrak_lainnya")->row()->sum;

        $sum_nilai = $nilai_kontrak_konsultanTol + $nilai_kontrak_konsultanNonTol + $nilai_kontrak_konstruksi + $nilai_kontrak_nonTol + $nilai_kontrak_peralatan + $nilai_kontrak_lainnya;

        $kontrak_pmn = $this->db->query("select COALESCE(sum(nilai),0) as sum from pembayaran where pmn=1")->row()->sum;
        $pembayaran_pmn = $this->db->query("select COALESCE(sum(nilai),0) as sum from pembayaran_lain")->row()->sum;
        $realisasi_pmn = $kontrak_pmn + $pembayaran_pmn;

        $kontrak_konstruksi_pmn = $this->db->query("select COALESCE(sum(nilai),0) as sum from pembayaran where pmn=1 and id_kontrak_konstruksi is not null")->row()->sum;
        $kontrak_konsultan_pmn = $this->db->query("select COALESCE(sum(nilai),0) as sum from pembayaran where pmn=1 and id_kontrak_konsultan is not null")->row()->sum;
        $utang_pmn = $this->db->query("select COALESCE(sum(nilai),0) as sum from pembayaran_lain where jenis=1")->row()->sum;
        $angsuran_pmn = $this->db->query("select COALESCE(sum(nilai),0) as sum from pembayaran_lain where jenis=2")->row()->sum;

        $non_pmn2020 = $this->db->query("select COALESCE(sum(nilai),0) as sum from non_pmn where extract (year from tanggal)='2020'")->row()->sum;
        $non_pmn2021 = $this->db->query("select COALESCE(sum(nilai),0) as sum from non_pmn where extract (year from tanggal)='2021'")->row()->sum;
        $non_pmn2022 = $this->db->query("select COALESCE(sum(nilai),0) as sum from non_pmn where extract (year from tanggal)='2022'")->row()->sum;


        $krg_pemenangLelang_kst = $this->M_dashboard->k_dok_kons(9);

        $krg_penawaran_kst = $this->M_dashboard->k_dok_kons(1);
        $krg_hps_kst = $this->M_dashboard->k_dok_kons(74);
        $krg_permohononanPrinsip_kst = $this->M_dashboard->k_dok_kons(52);
        $krg_persetujuanPrinsip_kst = $this->M_dashboard->k_dok_kons(53);
        $krg_suratPenunjukan_kst = $this->M_dashboard->k_dok_kons(3);
        $krg_jaminanPelaksanaan_kst = $this->M_dashboard->k_dok_kons(73);
        $krg_jaminanPenawaran_kst = $this->M_dashboard->k_dok_kons(72);
        $krg_spmk_kst = $this->M_dashboard->k_dok_kons(10);
        $krg_kontrak_kst = $this->M_dashboard->k_dok_kons(11);
        $krg_ketUmum_kst = $this->M_dashboard->k_dok_kons(12);
        $krg_kak_kst = $this->M_dashboard->k_dok_kons(13);
        $krg_kkk_kst = $this->M_dashboard->k_dok_kons(75);
        $krg_kuantitas_kst = $this->M_dashboard->k_dok_kons(14);
        $krg_instruksi_kst = $this->M_dashboard->k_dok_kons(15);

        $krg_evaluasi_kst = $this->M_dashboard->k_dok_kons(2);

        $krg_kewajaranHarga_kst = $this->M_dashboard->k_dok_kons(7);
        $krg_kesanggupan_kst = $this->M_dashboard->k_dok_kons(8);




        $sum_konsultan = $krg_penawaran_kst + $krg_hps_kst + $krg_permohononanPrinsip_kst + $krg_persetujuanPrinsip_kst + $krg_suratPenunjukan_kst + $krg_jaminanPelaksanaan_kst + $krg_jaminanPenawaran_kst + $krg_spmk_kst + $krg_kontrak_kst + $krg_ketUmum_kst + $krg_kak_kst + $krg_kkk_kst + $krg_kuantitas_kst + $krg_instruksi_kst;

        // Pembayaran konsultan

        $laporan_kst = $this->M_dashboard->k_dokPembayaran_konsultan(29);
        $slip_kst = $this->M_dashboard->k_dokPembayaran_konsultan(35);
        $memo_kst = $this->M_dashboard->k_dokPembayaran_konsultan(36);

        $bap_kst = $this->M_dashboard->k_dokPembayaran_konsultan(31);
        $bapp_kst = $this->M_dashboard->k_dokPembayaran_konsultan(80);
        $bast_kst = $this->M_dashboard->k_dokPembayaran_konsultan(81);
        $disposisi_kst = $this->M_dashboard->k_dokPembayaran_konsultan(78);
        $faktur_kst = $this->M_dashboard->k_dokPembayaran_konsultan(34);
        $ijin_kst = $this->M_dashboard->k_dokPembayaran_konsultan(77);
        $invoice_kst = $this->M_dashboard->k_dokPembayaran_konsultan(82);
        $kwitansi_kst = $this->M_dashboard->k_dokPembayaran_konsultan(33);
        $nota_kst = $this->M_dashboard->k_dokPembayaran_konsultan(76);
        $perhitunganPjk_kst = $this->M_dashboard->k_dokPembayaran_konsultan(79);
        $spp_kst = $this->M_dashboard->k_dokPembayaran_konsultan(32);

        $sum_krg_pembayaranKonsultan = $bap_kst + $bapp_kst + $bast_kst + $faktur_kst + $invoice_kst + $kwitansi_kst + $nota_kst + $spp_kst;


        $krg_penawaran_ksi = $this->M_dashboard->k_dok_konstruksi(1);
        $krg_hps_ksi = $this->M_dashboard->k_dok_konstruksi(74);
        $krg_permohononanPrinsip_ksi = $this->M_dashboard->k_dok_konstruksi(52);
        $krg_persetujuanPrinsip_ksi = $this->M_dashboard->k_dok_konstruksi(53);
        $krg_penunjukanPemenang_ksi = $this->M_dashboard->k_dok_konstruksi(3);
        $krg_jaminanPelaksanaan_ksi = $this->M_dashboard->k_dok_konstruksi(73);
        $krg_jaminanPenawaran_ksi = $this->M_dashboard->k_dok_konstruksi(72);

        $krg_aritmatik_ksi = $this->M_dashboard->k_dok_konstruksi(6);
        $krg_kewajaranHarga_ksi = $this->M_dashboard->k_dok_konstruksi(7);
        $krg_pemenangLelang_ksi = $this->M_dashboard->k_dok_konstruksi(9);
        $krg_evaluasiAkhir_ksi = $this->M_dashboard->k_dok_konstruksi(19);
        $krg_spmk_ksi = $this->M_dashboard->k_dok_konstruksi(10);
        $krg_kontrak_ksi = $this->M_dashboard->k_dok_konstruksi(11);
        $krg_kuk_ksi = $this->M_dashboard->k_dok_konstruksi(12);
        $krg_kak_ksi = $this->M_dashboard->k_dok_konstruksi(13);
        $krg_harga_ksi = $this->M_dashboard->k_dok_konstruksi(14);
        $krg_kkk_ksi = $this->M_dashboard->k_dok_konstruksi(75);
        $krg_ikp_ksi = $this->M_dashboard->k_dok_konstruksi(15);

        $sum_konstruksi = $krg_penawaran_ksi + $krg_hps_ksi + $krg_permohononanPrinsip_ksi + $krg_persetujuanPrinsip_ksi + $krg_penunjukanPemenang_ksi + $krg_jaminanPelaksanaan_ksi + $krg_jaminanPenawaran_ksi + $krg_spmk_ksi + $krg_kontrak_ksi + $krg_kuk_ksi + $krg_kak_ksi + $krg_harga_ksi + $krg_kkk_ksi + $krg_ikp_ksi;

        //pembayaran konstruksi

        $bap_ksi = $this->M_dashboard->k_dokPembayaran_konstruksi(31);
        $spp_ksi = $this->M_dashboard->k_dokPembayaran_konstruksi(32);
        $kwitansi_ksi = $this->M_dashboard->k_dokPembayaran_konstruksi(33);
        $faktur_ksi = $this->M_dashboard->k_dokPembayaran_konstruksi(34);
        $p_pajak = $this->M_dashboard->k_dokPembayaran_konstruksi(79);
        $d_direksi = $this->M_dashboard->k_dokPembayaran_konstruksi(78);
        $i_anggaran = $this->M_dashboard->k_dokPembayaran_konstruksi(77);
        $nota = $this->M_dashboard->k_dokPembayaran_konstruksi(76);


        // $laporan_ksi = $this->M_dashboard->k_dokPembayaran_konstruksi(29);
        // $slip_ksi = $this->M_dashboard->k_dokPembayaran_konstruksi(35);
        // $memo_ksi = $this->M_dashboard->k_dokPembayaran_konstruksi(36);

        $sum_krg_pembayaranKonstruksi = $bap_ksi + $spp_ksi + $kwitansi_ksi + $faktur_ksi + $nota;

        // Admin proyek konstruksi

        $bapp = $this->M_dashboard->k_dok_proyek_konstruksi(71);
        $bast = $this->M_dashboard->k_dok_proyek_konstruksi(70);
        $b_quantity = $this->M_dashboard->k_dok_proyek_konstruksi(42);
        $b_quality = $this->M_dashboard->k_dok_proyek_konstruksi(43);
        $laporan = $this->M_dashboard->k_dok_proyek_konstruksi(44);
        $c_kontrak = $this->M_dashboard->k_dok_proyek_konstruksi(67);
        $c_spmk = $this->M_dashboard->k_dok_proyek_konstruksi(66);
        $c_sk = $this->M_dashboard->k_dok_proyek_konstruksi(64);
        $c_npwp = $this->M_dashboard->k_dok_proyek_konstruksi(63);
        $c_sbu = $this->M_dashboard->k_dok_proyek_konstruksi(62);
        $tanda_daftar = $this->M_dashboard->k_dok_proyek_konstruksi(61);
        $izin_usaha = $this->M_dashboard->k_dok_proyek_konstruksi(60);
        $dokumentasi = $this->M_dashboard->k_dok_proyek_konstruksi(59);
        // $shop_draw = $this->M_dashboard->k_dok_proyek_konstruksi(49);

        $sum_proyek_konstruksi = $bapp + $b_quantity + $b_quality + $laporan + $c_kontrak + $c_spmk + $c_sk + $c_npwp + $c_sbu + $tanda_daftar + $izin_usaha;

        $krg_penawaran_knt = $this->M_dashboard->k_dok_konsNonTol(1);
        $krg_evaluasi_knt = $this->M_dashboard->k_dok_konsNonTol(2);
        $krg_suratPenunjukan_knt = $this->M_dashboard->k_dok_konsNonTol(3);
        $krg_spmk_knt = $this->M_dashboard->k_dok_konsNonTol(10);
        $krg_kontrak_knt = $this->M_dashboard->k_dok_konsNonTol(11);
        $krg_kak_knt = $this->M_dashboard->k_dok_konsNonTol(13);
        $krg_ketUmum_knt = $this->M_dashboard->k_dok_konsNonTol(12);

        $sum_konsultanNonTol = $krg_penawaran_knt + $krg_evaluasi_knt + $krg_suratPenunjukan_knt + $krg_spmk_knt + $krg_kontrak_knt + $krg_kak_knt + $krg_ketUmum_knt;


        $kontrak_mar = $this->M_dashboard->nilai_kontrak(3, 2022);
        $lain_mar = $this->M_dashboard->nilai_lain(3, 2022);
        $total_mar = $kontrak_mar + $lain_mar;

        $kontrak_apr = $this->M_dashboard->nilai_kontrak(4, 2022);
        $lain_apr = $this->M_dashboard->nilai_lain(4, 2022);
        $total_apr = $kontrak_apr + $lain_apr;

        $kontrak_mei = $this->M_dashboard->nilai_kontrak(5, 2022);
        $lain_mei = $this->M_dashboard->nilai_lain(5, 2022);
        $total_mei = $kontrak_mei + $lain_mei;

        $kontrak_jun = $this->M_dashboard->nilai_kontrak(6, 2022);
        $lain_jun = $this->M_dashboard->nilai_lain(6, 2022);
        $total_jun = $kontrak_jun + $lain_jun;

        $kontrak_jul = $this->M_dashboard->nilai_kontrak(7, 2022);
        $lain_jul = $this->M_dashboard->nilai_lain(7, 2022);
        $total_jul = $kontrak_jul + $lain_jul;

        $kontrak_agu = $this->M_dashboard->nilai_kontrak(8, 2022);
        $lain_agu = $this->M_dashboard->nilai_lain(8, 2022);
        $total_agu = $kontrak_agu + $lain_agu;

        $kontrak_sep = $this->M_dashboard->nilai_kontrak(9, 2022);
        $lain_sep = $this->M_dashboard->nilai_lain(9, 2022);
        $total_sep = $kontrak_sep + $lain_sep;

        $kontrak_okt = $this->M_dashboard->nilai_kontrak(10, 2022);
        $lain_okt = $this->M_dashboard->nilai_lain(10, 2022);
        $total_okt = $kontrak_okt + $lain_okt;

        $kontrak_nov = $this->M_dashboard->nilai_kontrak(11, 2022);
        $lain_nov = $this->M_dashboard->nilai_lain(11, 2022);
        $total_nov = $kontrak_nov + $lain_nov;

        $kontrak_des = $this->M_dashboard->nilai_kontrak(12, 2022);
        $lain_des = $this->M_dashboard->nilai_lain(12, 2022);
        $total_des = $kontrak_des + $lain_des;

        $kontrak_jan = $this->M_dashboard->nilai_kontrak(1, 2023);
        $lain_jan = $this->M_dashboard->nilai_lain(1, 2023);
        $total_jan = $kontrak_jan + $lain_jan;

        $kontrak_feb = $this->M_dashboard->nilai_kontrak(2, 2023);
        $lain_feb = $this->M_dashboard->nilai_lain(2, 2023);
        $total_feb = $kontrak_feb + $lain_feb;

        $kontrak_mar23 = $this->M_dashboard->nilai_kontrak(3, 2023);
        $lain_mar23 = $this->M_dashboard->nilai_lain(3, 2023);
        $total_mar23 = $kontrak_mar23 + $lain_mar23;

        $kontrak_apr23 = $this->M_dashboard->nilai_kontrak(4, 2023);
        $lain_apr23 = $this->M_dashboard->nilai_lain(4, 2023);
        $total_apr23 = $kontrak_apr23 + $lain_apr23;

        $kontrak_mei23 = $this->M_dashboard->nilai_kontrak(5, 2023);
        $lain_mei23 = $this->M_dashboard->nilai_lain(5, 2023);
        $total_mei23 = $kontrak_mei23 + $lain_mei23;

        $jml_dokKonstruksi = $this->M_dashboard->jml_dokKonstruksi();
        $jml_dokKonsultan = $this->M_dashboard->jml_dokKonsultan();
        $jml_dokNonTol = $this->M_dashboard->jml_dokNonTol();
        $jml_dokKontrakLain = $this->M_dashboard->jml_dokKontrakLain();
        $jml_addKonstruksi = $this->M_dashboard->jml_addKonstruksi();
        $jml_addKonsultan = $this->M_dashboard->jml_addKonsultan();
        $jml_addKonsNonTol = $this->M_dashboard->jml_addKonsNonTol();
        $jml_dokumen = $this->M_dashboard->jml_dokumen();
        $jml_lapKonstruksi = $this->M_dashboard->jml_lapKonstruksi();
        $jml_lapKonsultan = $this->M_dashboard->jml_lapKonsultan();
        $jml_mc = $this->M_dashboard->jml_mc();
        $jml_pembayaranLain = $this->M_dashboard->jml_pembayaranLain();
        $jml_nonPmn = $this->M_dashboard->jml_nonPmn();

        $total_dok = $jml_dokKonstruksi + $jml_dokKonsultan + $jml_dokNonTol + $jml_dokKontrakLain + $jml_addKonstruksi + $jml_addKonsultan + $jml_addKonsNonTol + $jml_dokumen + $jml_lapKonstruksi + $jml_lapKonsultan + $jml_mc + $jml_pembayaranLain + $jml_nonPmn;

        $prog_lahan = $this->db->query("select avg(realisasi) as sum from progres_lahan group by tgl_progres order by tgl_progres desc  limit 1")->row()->sum;
        $prog_fisik = $this->db->query("select avg(realisasi) as sum from progres_konstruksi group by tgl_progres order by tgl_progres desc  limit 1")->row()->sum;
        $prog_rta = $this->db->query("select avg(realisasi) as sum from progres_rta group by tgl_progres order by tgl_progres desc  limit 1")->row()->sum;

        $operasional_ada = $this->M_dashboard->jml_kepatuhanAda(1);
        $operasional_tdk = $this->M_dashboard->jml_kepatuhanTidak(1);
        $operasional_tot = $operasional_ada + $operasional_tdk;

        $korporasi_ada = $this->M_dashboard->jml_kepatuhanAda(2);
        $korporasi_tdk = $this->M_dashboard->jml_kepatuhanTidak(2);
        $korporasi_tot = $korporasi_ada + $korporasi_tdk;

        $perizinan_ada = $this->M_dashboard->jml_kepatuhanAda(3);
        $perizinan_tdk = $this->M_dashboard->jml_kepatuhanTidak(3);
        $perizinan_tot = $perizinan_ada + $perizinan_tdk;

        $regulasi_ada = $this->M_dashboard->jml_kepatuhanAda(4);
        $regulasi_tdk = $this->M_dashboard->jml_kepatuhanTidak(4);
        $regulasi_tot = $regulasi_ada + $regulasi_tdk;

        $opex_rencana1 = $this->M_dashboard->opex_rencana(1);
        $opex_realisasi1 = $this->M_dashboard->opex_realisasi(1);
        $opex_rencana2 = $this->M_dashboard->opex_rencana(2);
        $opex_realisasi2 = $this->M_dashboard->opex_realisasi(2);
        $opex_rencana3 = $this->M_dashboard->opex_rencana(3);
        $opex_realisasi3 = $this->M_dashboard->opex_realisasi(3);
        $opex_rencana4 = $this->M_dashboard->opex_rencana(4);
        $opex_realisasi4 = $this->M_dashboard->opex_realisasi(4);

        $capex_rencana1 = $this->M_dashboard->capex_rencana(1);
        $capex_realisasi1 = $this->M_dashboard->capex_realisasi(1);
        $capex_rencana2 = $this->M_dashboard->capex_rencana(2);
        $capex_realisasi2 = $this->M_dashboard->capex_realisasi(2);
        $capex_rencana3 = $this->M_dashboard->capex_rencana(3);
        $capex_realisasi3 = $this->M_dashboard->capex_realisasi(3);
        $capex_rencana4 = $this->M_dashboard->capex_rencana(4);
        $capex_realisasi4 = $this->M_dashboard->capex_realisasi(4);

        $tot_opex_rencana = $this->db->query("select COALESCE(sum(rencana),0) as sum from monitoring_rkap where jenis='Opex' and tahun='2025'")->row()->sum;
        $tot_opex_realisasi = $this->db->query("select COALESCE(sum(realisasi),0) as sum from monitoring_rkap where jenis='Opex' and tahun='2025'")->row()->sum;
        $tot_capex_rencana = $this->db->query("select COALESCE(sum(rencana),0) as sum from monitoring_rkap where jenis='Capex' and tahun='2025'")->row()->sum;
        $tot_capex_realisasi = $this->db->query("select COALESCE(sum(realisasi),0) as sum from monitoring_rkap where jenis='Capex' and tahun='2025'")->row()->sum;

        // $data_seksi = $this->db->query("select * from seksi order by seksi asc")->result();

        $sop_9001 = $this->db->query("select COALESCE(count(id_dokumen),0) as sum from dokumen where jenis='sop' and iso_9001=1")->row()->sum;
        $sop_14001 = $this->db->query("select COALESCE(count(id_dokumen),0) as sum from dokumen where jenis='sop' and iso_14001=1")->row()->sum;
        $sop_45001 = $this->db->query("select COALESCE(count(id_dokumen),0) as sum from dokumen where jenis='sop' and iso_45001=1")->row()->sum;
        $sop_37001 = $this->db->query("select COALESCE(count(id_dokumen),0) as sum from dokumen where jenis='sop' and iso_37001=1")->row()->sum;
        $alokasi_kumulatif =  $this->db->query("SELECT ad_kumulatif FROM dana_talangan ORDER BY tanggal DESC LIMIT 1")->row()->ad_kumulatif;
        $fasilitas_dtt = $this->db->query("SELECT plafon_kredit FROM fasilitas_dtt ORDER BY tanggal DESC LIMIT 1")->row()->plafon_kredit;
        $pembayaran_langsung = $this->db->query("SELECT realisasi_pl FROM penyerapan_dt ORDER BY tanggal DESC LIMIT 1")->row()->realisasi_pl;
        $perbandingan_volume = $this->M_dashboard->get_perbandingan_volume();
        $perbandingan_pendapatan = $this->M_dashboard->get_perbandingan_pendapatan();
        $pv_labels = [];
        $pv_ppjt = [];
        $pv_rkap = [];
        $pv_realisasi = [];
        $pv_prognosa = [];

        $pp_labels = [];
        $pp_ppjt = [];
        $pp_rkap = [];
        $pp_realisasi = [];
        $pp_prognosa = [];

        foreach ($perbandingan_volume as $pv) {
            $pv_labels[] = $pv->bulan;
            $pv_ppjt[] = $pv->ppjt !== null ? (float)$pv->ppjt : null;
            $pv_rkap[] = $pv->rkap !== null ? (float)$pv->rkap : null;
            $pv_realisasi[] = $pv->realisasi !== null ? (float)$pv->realisasi : null;
            $pv_prognosa[] = $pv->prognosa !== null ? (float)$pv->prognosa : null;
        }

        foreach ($perbandingan_pendapatan as $pp) {
            $pp_labels[] = $pp->bulan;
            $pp_ppjt[] = $pp->ppjt !== null ? (float)$pp->ppjt : null;
            $pp_rkap[] = $pp->rkap !== null ? (float)$pp->rkap : null;
            $pp_realisasi[] = $pp->realisasi !== null ? (float)$pp->realisasi : null;
            $pp_prognosa[] = $pp->prognosa !== null ? (float)$pp->prognosa : null;
        }

        $data = [
            'title' => 'Dashboard',
            'menu' => 'Dashboard',
            'submenu' => '',

            'alokasi_kumulatif' => $alokasi_kumulatif,
            'fasilitas_dtt' => $fasilitas_dtt,
            'pembayaran_langsung' => $pembayaran_langsung,

            'sop_9001' => $sop_9001,
            'sop_14001' => $sop_14001,
            'sop_45001' => $sop_45001,
            'sop_37001' => $sop_37001,

            'operasional_ada' => $operasional_ada,
            'operasional_tdk' => $operasional_tdk,
            'operasional_tot' => $operasional_tot,
            'korporasi_ada' => $korporasi_ada,
            'korporasi_tdk' => $korporasi_tdk,
            'korporasi_tot' => $korporasi_tot,
            'perizinan_ada' => $perizinan_ada,
            'perizinan_tdk' => $perizinan_tdk,
            'perizinan_tot' => $perizinan_tot,
            'regulasi_ada' => $regulasi_ada,
            'regulasi_tdk' => $regulasi_tdk,
            'regulasi_tot' => $regulasi_tot,

            'opex_rencana1' => $opex_rencana1,
            'opex_realisasi1' => $opex_realisasi1,
            'opex_rencana2' => $opex_rencana2,
            'opex_realisasi2' => $opex_realisasi2,
            'opex_rencana3' => $opex_rencana3,
            'opex_realisasi3' => $opex_realisasi3,
            'opex_rencana4' => $opex_rencana4,
            'opex_realisasi4' => $opex_realisasi4,

            'tot_opex_rencana' => $tot_opex_rencana,
            'tot_opex_realisasi' => $tot_opex_realisasi,

            'capex_rencana1' => $capex_rencana1,
            'capex_realisasi1' => $capex_realisasi1,
            'capex_rencana2' => $capex_rencana2,
            'capex_realisasi2' => $capex_realisasi2,
            'capex_rencana3' => $capex_rencana3,
            'capex_realisasi3' => $capex_realisasi3,
            'capex_rencana4' => $capex_rencana4,
            'capex_realisasi4' => $capex_realisasi4,

            'tot_capex_rencana' => $tot_capex_rencana,
            'tot_capex_realisasi' => $tot_capex_realisasi,

            'isu1' => $this->M_dashboard->get_issue(1),
            'isu2' => $this->M_dashboard->get_issue(2),
            'isu3' => $this->M_dashboard->get_issue(3),
            'isu4' => $this->M_dashboard->get_issue(4),
            'isu5' => $this->M_dashboard->get_issue(5),
            'isu6' => $this->M_dashboard->get_issue(6),
            'isu7' => $this->M_dashboard->get_issue(7),
            'isu8' => $this->M_dashboard->get_issue(8),
            'isu9' => $this->M_dashboard->get_issue(9),
            'isu10' => $this->M_dashboard->get_issue(10),
            'isu11' => $this->M_dashboard->get_issue(11),
            'isu12' => $this->M_dashboard->get_issue(12),
            'isu13' => $this->M_dashboard->get_issue(13),
            'isu14' => $this->M_dashboard->get_issue(14),

            'prog_lahan' => $prog_lahan,
            'prog_fisik' => $prog_fisik,
            'prog_rta' => $prog_rta,

            'total_dok' => $total_dok,

            'jml_kontrak_konsultanTol' => $jml_kontrak_konsultanTol,
            'jml_kontrak_konsultanNonTol' => $jml_kontrak_konsultanNonTol,
            'jml_kontrak_konstruksi' => $jml_kontrak_konstruksi,
            'jml_kontrak_nonTol' => $jml_kontrak_nonTol,
            'jml_kontrak_peralatanTol' => $jml_kontrak_peralatanTol,
            'jml_kontrak_lainnya' => $jml_kontrak_lainnya,

            'sum_kontrak' => $sum_kontrak,

            'nilai_kontrak_konsultanTol' => $nilai_kontrak_konsultanTol,
            'nilai_kontrak_konsultanNonTol' => $nilai_kontrak_konsultanNonTol,
            'nilai_kontrak_konstruksi' => $nilai_kontrak_konstruksi,
            'nilai_kontrak_nonTol' => $nilai_kontrak_nonTol,
            'nilai_kontrak_peralatan' => $nilai_kontrak_peralatan,
            'nilai_kontrak_lainnya' => $nilai_kontrak_lainnya,

            'sum_nilai' => $sum_nilai,

            'realisasi_pmn' => $realisasi_pmn,
            'kontrak_konstruksi_pmn' => $kontrak_konstruksi_pmn,
            'kontrak_konsultan_pmn' => $kontrak_konsultan_pmn,
            'utang_pmn' => $utang_pmn,
            'angsuran_pmn' => $angsuran_pmn,

            'krg_pemenangLelang_kst' => $krg_pemenangLelang_kst,
            'krg_penawaran_kst' => $krg_penawaran_kst,
            'krg_hps_kst' => $krg_hps_kst,
            'krg_permohononanPrinsip_kst' => $krg_permohononanPrinsip_kst,
            'krg_persetujuanPrinsip_kst' => $krg_persetujuanPrinsip_kst,
            'krg_jaminanPelaksanaan_kst' => $krg_jaminanPelaksanaan_kst,
            'krg_jaminanPenawaran_kst' => $krg_jaminanPenawaran_kst,
            'krg_spmk_kst' => $krg_spmk_kst,
            'krg_kontrak_kst' => $krg_kontrak_kst,
            'krg_ketUmum_kst' => $krg_ketUmum_kst,
            'krg_kak_kst' => $krg_kak_kst,
            'krg_kkk_kst' => $krg_kkk_kst,
            'krg_kuantitas_kst' => $krg_kuantitas_kst,
            'krg_instruksi_kst' => $krg_instruksi_kst,
            'krg_evaluasi_kst' => $krg_evaluasi_kst,
            'krg_suratPenunjukan_kst' => $krg_suratPenunjukan_kst,
            'krg_kewajaranHarga_kst' => $krg_kewajaranHarga_kst,
            'krg_kesanggupan_kst' => $krg_kesanggupan_kst,

            'laporan_kst' => $laporan_kst,
            'slip_kst' => $slip_kst,
            'memo_kst' => $memo_kst,

            'bap_kst' => $bap_kst,
            'bapp_kst' => $bapp_kst,
            'bast_kst' => $bast_kst,
            'disposisi_kst' => $disposisi_kst,
            'faktur_kst' => $faktur_kst,
            'ijin_kst' => $ijin_kst,
            'invoice_kst' => $invoice_kst,
            'kwitansi_kst' => $kwitansi_kst,
            'nota_kst' => $nota_kst,
            'perhitunganPjk_kst' => $perhitunganPjk_kst,
            'spp_kst' => $spp_kst,
            'sum_krg_pembayaranKonsultan' => $sum_krg_pembayaranKonsultan,

            'bap_ksi' => $bap_ksi,
            'spp_ksi' => $spp_ksi,
            'kwitansi_ksi' => $kwitansi_ksi,
            'faktur_ksi' => $faktur_ksi,
            'p_pajak' => $p_pajak,
            'd_direksi' => $d_direksi,
            'i_anggaran' => $i_anggaran,
            'nota' => $nota,

            'sum_krg_pembayaranKonstruksi' => $sum_krg_pembayaranKonstruksi,

            'krg_penawaran_ksi' => $krg_penawaran_ksi,
            'krg_hps_ksi' => $krg_hps_ksi,
            'krg_permohononanPrinsip_ksi' => $krg_permohononanPrinsip_ksi,
            'krg_persetujuanPrinsip_ksi' => $krg_persetujuanPrinsip_ksi,
            'krg_penunjukanPemenang_ksi' => $krg_penunjukanPemenang_ksi,
            'krg_jaminanPelaksanaan_ksi' => $krg_jaminanPelaksanaan_ksi,
            'krg_jaminanPenawaran_ksi' => $krg_jaminanPenawaran_ksi,


            'krg_aritmatik_ksi' => $krg_aritmatik_ksi,
            'krg_kewajaranHarga_ksi' => $krg_kewajaranHarga_ksi,
            'krg_pemenangLelang_ksi' => $krg_pemenangLelang_ksi,
            'krg_evaluasiAkhir_ksi' => $krg_evaluasiAkhir_ksi,
            'krg_spmk_ksi' => $krg_spmk_ksi,
            'krg_kontrak_ksi' => $krg_kontrak_ksi,
            'krg_kuk_ksi' => $krg_kuk_ksi,
            'krg_kak_ksi' => $krg_kak_ksi,
            'krg_harga_ksi' => $krg_harga_ksi,
            'krg_kkk_ksi' => $krg_kkk_ksi,
            'krg_ikp_ksi' => $krg_ikp_ksi,

            // admin proyek konstruksi
            'bapp' => $bapp,
            'bast' => $bast,
            'b_quantity' => $b_quantity,
            'b_quality' => $b_quality,
            'laporan' => $laporan,
            'c_kontrak' => $c_kontrak,
            'c_spmk' => $c_spmk,
            'c_sk' => $c_sk,
            'c_npwp' => $c_npwp,
            'c_sbu' => $c_sbu,
            'tanda_daftar' => $tanda_daftar,
            'izin_usaha' => $izin_usaha,
            'dokumentasi' => $dokumentasi,
            // 'shop_draw' => $shop_draw,
            'sum_proyek_konstruksi' => $sum_proyek_konstruksi,

            'krg_penawaran_knt' => $krg_penawaran_knt,
            'krg_evaluasi_knt' => $krg_evaluasi_knt,
            'krg_suratPenunjukan_knt' => $krg_suratPenunjukan_knt,
            'krg_spmk_knt' => $krg_spmk_knt,
            'krg_kak_knt' => $krg_kak_knt,
            'krg_ketUmum_knt' => $krg_ketUmum_knt,
            'krg_kontrak_knt' => $krg_kontrak_knt,

            'sum_konsultan' => $sum_konsultan,
            'sum_konstruksi' => $sum_konstruksi,
            'sum_konsultanNonTol' => $sum_konsultanNonTol,

            'total_mar' => $total_mar,
            'total_apr' => $total_apr,
            'total_mei' => $total_mei,
            'total_jun' => $total_jun,
            'total_jul' => $total_jul,
            'total_agu' => $total_agu,
            'total_sep' => $total_sep,
            'total_okt' => $total_okt,
            'total_nov' => $total_nov,
            'total_des' => $total_des,
            'total_jan' => $total_jan,
            'total_feb' => $total_feb,
            'total_mar23' => $total_mar23,
            'total_apr23' => $total_apr23,
            'total_mei23' => $total_mei23,

            'row' => $this->M_dokumen->get_kronologis1(),
            'row2' => $this->M_dokumen->get_kronologis2(),
            'row31' => $this->M_dokumen->get_kronologis31(),
            'row32' => $this->M_dokumen->get_kronologis32(),
            'row33' => $this->M_dokumen->get_kronologis33(),
            'row41' => $this->M_dokumen->get_kronologis41(),
            'row42' => $this->M_dokumen->get_kronologis42(),
            'row43' => $this->M_dokumen->get_kronologis43(),
            'row44' => $this->M_dokumen->get_kronologis44(),
            'row45' => $this->M_dokumen->get_kronologis45(),
            'row5' => $this->M_dokumen->get_kronologis5(),
        ];
        $data['pv_chart_data'] = [
            'pv_labels' => $pv_labels,
            'pv_datasets' => [
                [
                    'name' => 'PPJT',
                    'data' => $pv_ppjt,
                    'color' => "#f1bd1f",
                    'marker' => [
                        'enabled' => true,
                        'symbol' => "circle",
                    ],
                ],
                [
                    'name' => 'RKAP',
                    'data' => $pv_rkap,
                    'color' => "red",
                    'marker' => [
                        'enabled' => true,
                        'symbol' => "circle",
                    ],
                ],
                [
                    'name' => 'realisasi',
                    'data' => $pv_realisasi,
                    'color' => "#4a7ca8",
                    'marker' => [
                        'enabled' => true,
                        'symbol' => "circle",
                    ],
                ],
                [
                    'name' => 'prognosa',
                    'data' => $pv_prognosa,
                    'color' => "#a8dadc",
                    'dashStyle' => "ShortDash",
                    'connectNulls' => true,
                    'marker' => [
                        'enabled' => true,
                        'symbol' => "circle",
                    ],
                ],
            ]
        ];
        $data['pp_chart_data'] = [
            'pp_labels' => $pp_labels,
            'pp_datasets' => [
                [
                    'name' => 'PPJT',
                    'data' => $pp_ppjt,
                    'color' => "#f1bd1f",
                    'marker' => [
                        'enabled' => true,
                        'symbol' => "circle",
                    ],
                ],
                [
                    'name' => 'RKAP',
                    'data' => $pp_rkap,
                    'color' => "red",
                    'marker' => [
                        'enabled' => true,
                        'symbol' => "circle",
                    ],
                ],
                [
                    'name' => 'realisasi',
                    'data' => $pp_realisasi,
                    'color' => "#4a7ca8",
                    'marker' => [
                        'enabled' => true,
                        'symbol' => "circle",
                    ],
                ],
                [
                    'name' => 'prognosa',
                    'data' => $pp_prognosa,
                    'color' => "#a8dadc",
                    'dashStyle' => "ShortDash",
                    'connectNulls' => true,
                    'marker' => [
                        'enabled' => true,
                        'symbol' => "circle",
                    ],
                ],
            ]
        ];

        $this->template->load('template/admin_template', 'dashboard/dashboard.php', $data);
    }

    public function get_kurang_dok_konsultan()
    {
        $id_dok = $this->input->post('id_dok');

        $aset =  $this->db->query("select * from tb_kontrak_konsultan as kk where not exists (SELECT id_kontrak_konsultan from detail_dok_konsultan as dd where dd.id_kontrak_konsultan = kk.id_kontrak_konsultan and dd.id_dok_master=" . $id_dok . ") and jenis=1")->result();
        echo json_encode($aset);
    }

    public function get_kurang_dok_konsultanNonTol()
    {
        $id_dok = $this->input->get('id_dok');

        $aset =  $this->db->query("select * from tb_kontrak_konsultan as kk where not exists (SELECT id_kontrak_konsultan from detail_dok_konsultan as dd where dd.id_kontrak_konsultan = kk.id_kontrak_konsultan and dd.id_dok_master=" . $id_dok . ") and jenis=2")->result();
        echo json_encode($aset);
    }

    public function get_kurang_dok_konstruksi()
    {
        $id_dok = $this->input->post('id_dok');

        $aset = $this->db->query("select * from tb_kontrak_konstruksi as kk where not exists (SELECT id_kontrak_konstruksi from detail_dok_konstruksi as dd where dd.id_kontrak_konstruksi = kk.id_kontrak_konstruksi and dd.id_dok_master=" . $id_dok . ")")->result();
        echo json_encode($aset);
    }

    public function get_kurang_dokProyek()
    {
        $id_dok = $this->input->post('id_dok');

        $aset =  $this->db->query("select * from mc as kk where not exists (SELECT id_mc  from detail_dok_konstruksi  as dd where dd.id_mc = kk.id_mc and dd.id_dok_master=" . $id_dok . ") order by tanggal ASC")->result();
        echo json_encode($aset);
    }
    public function get_kurang_dokPembayaranKonsultan()
    {
        $id_dok = $this->input->post('id_dok');
        $aset =  $this->db->query("select * from pembayaran as kk where not exists (SELECT id_pembayaran  from detail_dok_konsultan  as dd where dd.id_pembayaran = kk.id_pembayaran and dd.id_dok_master=" . $id_dok . ") and id_kontrak_konsultan is not null order by id_kontrak_konsultan asc, cast(termin as int) ASC")->result();
        echo json_encode($aset);
    }

    public function get_kurang_dokPembayaranKonstruksi()
    {
        $id_dok = $this->input->post('id_dok');
        $aset =  $this->db->query("select * from pembayaran as kk where not exists (SELECT id_pembayaran  from detail_dok_konstruksi  as dd where dd.id_pembayaran = kk.id_pembayaran and dd.id_dok_master=" . $id_dok . ") and id_kontrak_konstruksi is not null order by tanggal ASC")->result();
        echo json_encode($aset);
    }

    public function get_detail_capex()
    {
        $tahun = date('Y');
        $id_tw = $this->input->get('id_tw');
        $aset =  $this->db->query("SELECT * FROM monitoring_rkap WHERE jenis='Capex' AND tahun='" . $tahun . "' AND tw=" . $id_tw . " ORDER BY realisasi DESC")->result();
        echo json_encode($aset);
    }

    public function get_detail_opex()
    {
        $tahun = date('Y');
        $id_tw = $this->input->get('id_tw');
        $aset =  $this->db->query("SELECT * FROM monitoring_rkap WHERE jenis='Opex' AND tahun='" . $tahun . "' AND tw=" . $id_tw . " ORDER BY realisasi DESC")->result();
        echo json_encode($aset);
    }

    public function view_detail_sop9001()
    {
        $aset =  $this->db->query("select * from dokumen where jenis='sop' and iso_9001=1 order by divisi ASC")->result();
        echo json_encode($aset);
    }
    public function view_detail_sop14001()
    {
        $aset =  $this->db->query("select * from dokumen where jenis='sop' and iso_14001=1 order by divisi ASC")->result();
        echo json_encode($aset);
    }
    public function view_detail_sop45001()
    {
        $aset =  $this->db->query("select * from dokumen where jenis='sop' and iso_45001=1 order by divisi ASC")->result();
        echo json_encode($aset);
    }
    public function view_detail_sop37001()
    {
        $aset =  $this->db->query("select * from dokumen where jenis='sop' and iso_37001=1 order by divisi ASC")->result();
        echo json_encode($aset);
    }
}
