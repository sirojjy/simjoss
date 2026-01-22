<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manajemen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $cek = $this->session->userdata('username');

        if ($cek != '' || $cek != null) {
        } else {
            redirect('Login');
        }
        //$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
        $this->load->model(array('M_ppjt', 'M_manajemen'));
    }

    // MONITORING KPI
    public function kpi()
    {
        $ses_data = array(
            'act_menu'   => 'kpi',
            'title'      => 'kpi',
            'breadcrumb' => 'kpi',
        );
        $this->session->set_userdata($ses_data);
        $data = array();
        $this->template->load('template/admin_template', 'kpi/v_kpi.php');
    }

    public function insert_kpi()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'satuan' => $this->input->post('satuan'),
            'polaritas' => $this->input->post('polaritas'),
            'bobot' => $this->input->post('bobot'),
            'batas_nilai' => $this->input->post('batas_nilai'),
            'tahun' => $this->input->post('tahun'),
            'periode' => $this->input->post('periode'),
            'rencana_q1' => $this->input->post('rencana_q1'),
            'rencana_q2' => $this->input->post('rencana_q2'),
            'rencana_q3' => $this->input->post('rencana_q3'),
            'rencana_1y' => $this->input->post('rencana_1y'),
            'realisasi_q1' => $this->input->post('realisasi_q1'),
            'realisasi_q2' => $this->input->post('realisasi_q2'),
            'realisasi_q3' => $this->input->post('realisasi_q3'),
            'realisasi_1y' => $this->input->post('realisasi_1y'),
            'keterangan' => $this->input->post('keterangan'),
            'created_at' => date('Y-m-d h:i:s'),
        ];

        $insert = $this->M_manajemen->insert_kpi($data);
        // var_dump($insert->status);
        if ($insert) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        } else {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
        }

        redirect('Manajemen/kpi');
    }

    public function update_kpi()
    {
        $id = $this->input->post('id');
        $data = [
            'nama' => $this->input->post('nama'),
            'satuan' => $this->input->post('satuan'),
            'polaritas' => $this->input->post('polaritas'),
            'bobot' => $this->input->post('bobot'),
            'batas_nilai' => $this->input->post('batas_nilai'),
            'tahun' => $this->input->post('tahun'),
            'periode' => $this->input->post('periode'),
            'rencana_q1' => $this->input->post('rencana_q1'),
            'rencana_q2' => $this->input->post('rencana_q2'),
            'rencana_q3' => $this->input->post('rencana_q3'),
            'rencana_1y' => $this->input->post('rencana_1y'),
            'realisasi_q1' => $this->input->post('realisasi_q1'),
            'realisasi_q2' => $this->input->post('realisasi_q2'),
            'realisasi_q3' => $this->input->post('realisasi_q3'),
            'realisasi_1y' => $this->input->post('realisasi_1y'),
            'keterangan' => $this->input->post('keterangan'),
        ];

        $update = $this->M_manajemen->update_kpi($id, $data);
        if ($update) {
            $this->session->set_flashdata('success', 'Data berhasil diupdate');
        } else {
            $this->session->set_flashdata('error', 'Data gagal diupdate');
        }

        redirect('Manajemen/kpi');
    }

    public function delete_kpi($id)
    {
        $data = $this->M_manajemen->delete_kpi($id);

        if ($data['success']) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Data gagal dihapus');
        }

        redirect('Manajemen/kpi');
    }

    function get_kpi()
    {
        $tahun = $this->input->get('tahun') ?? date('Y');
        $list = $this->M_manajemen->get_kpi($tahun);
        $data = [];
        $no = $_GET['start'];

        foreach ($list as $kpi) {
            if ($kpi->polaritas == 1) {
                $polaritas = "Maximize";
            } elseif ($kpi->polaritas == 2) {
                $polaritas = "Minimize";
            } else {
                $kpi->polaritas = "-";
            }

            $no++;
            $row = [];
            $row['id'] = $no;
            $row['nama'] = $kpi->nama;
            $row['satuan'] = $kpi->satuan;
            $row['polaritas'] = $polaritas;
            $row['bobot'] = $kpi->bobot;
            $row['batas_nilai'] = $kpi->batas_nilai;
            $row['periode'] = ucfirst($kpi->periode);
            $row['rencana_q1'] = $kpi->rencana_q1;
            $row['rencana_q2'] = $kpi->rencana_q2;
            $row['rencana_q3'] = $kpi->rencana_q3;
            $row['rencana_1y'] = $kpi->rencana_1y;
            $row['realisasi_q1'] = $kpi->realisasi_q1;
            $row['realisasi_q2'] = $kpi->realisasi_q2;
            $row['realisasi_q3'] = $kpi->realisasi_q3;
            $row['realisasi_1y'] = $kpi->realisasi_1y;
            $row['realisasi_1y'] = $kpi->realisasi_1y;
            $row['keterangan'] = $kpi->keterangan;
            $row['created_at'] = $kpi->created_at;
            $row['aksi'] = '
            <div class="btn-group" role="group">
                <a href="#" data-id="' . $kpi->id . '" data-nama="' . $kpi->nama . '" data-satuan="' . $kpi->satuan . '" data-polaritas="' . $kpi->polaritas . '" data-bobot="' . $kpi->bobot . '" data-batas_nilai="' . $kpi->batas_nilai . '" data-tahun="' . $kpi->tahun . '" data-periode="' . $kpi->periode . '" data-rencana_q1="' . $kpi->rencana_q1 . '" data-rencana_q2="' . $kpi->rencana_q2 . '" data-rencana_q3="' . $kpi->rencana_q3 . '" data-rencana_1y="' . $kpi->rencana_1y . '" data-realisasi_q1="' . $kpi->realisasi_q1 . '" data-realisasi_q2="' . $kpi->realisasi_q2 . '" data-realisasi_q3="' . $kpi->realisasi_q3 . '" data-realisasi_1y="' . $kpi->realisasi_1y . '" data-keterangan="' . htmlspecialchars($kpi->keterangan) . '" class="btn btn-sm btn-success mr-1 btn-edit"><i class="fa fa-edit"></i></a>
                <a href="' . site_url('Manajemen/delete_kpi/' . $kpi->id) . '" onclick="javasciprt: return confirm(\'Yakin menghapus data ?\')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
            </div>';
            $data[] = $row;
        }

        $output = [
            "draw" => intval($_GET['draw']),
            "recordsTotal" => $this->M_manajemen->_count_all('tb_monitoring_kpi'),
            "recordsFiltered" => $this->M_manajemen->_count_filtered(),
            "data" => $data,
        ];

        echo json_encode($output);
    }

    public function resiko()
    {
        $ses_data = array(
            'act_menu'   => 'resiko',
            'title'      => 'Manajemen Resiko',
            'breadcrumb' => 'resiko',
        );
        $this->session->set_userdata($ses_data);
        $tahun = date('Y');
        $indikator = $this->db->query("select * from tb_manajemen_resiko where extract(year from tanggal)='" . $tahun . "' order by triwulan desc")->result();
        if (!empty($indikator)) {
            $sub_indikator = $this->db->query("select * from tb_sub_manajemen_resiko where triwulan='" . $indikator[0]->triwulan . "' and extract(year from tanggal)='" . $tahun . "'")->result();
        }

        $data = [
            'tahun' => $tahun,
            'triwulan' => $indikator[0]->triwulan ?? '',
            'indikator' => $indikator ?? [],
            'sub_indikator' => $sub_indikator ?? [],
        ];

        $this->template->load('template/admin_template', 'manajemen/resiko/v_manajemen.php', $data);
    }

    function get_resiko()
    {
        $triwulan = $this->input->post('triwulan');
        $tahun = $this->input->post('tahun');

        $result = [];
        if (!empty($triwulan) && !empty($tahun)) {
            $indikator = $this->M_manajemen->get_manajemen_resiko($triwulan, $tahun);
            foreach ($indikator as $item) {
                $entry = [
                    'indikator' => $item,
                    'sub' => []
                ];

                if ((int) $item->indikator === 4) {
                    $sub_data = $this->M_manajemen->get_sub_manajemen_resiko($item->id_manajemen_resiko, $triwulan, $tahun);
                    $entry['sub'] = $sub_data;
                }

                $result[] = $entry;
            }
        }
        echo json_encode($result);
    }

    public function add_resiko()
    {
        $ses_data = array(
            'act_menu'   => 'resiko',
            'title'      => 'Manajemen Resiko',
            'breadcrumb' => 'resiko',
        );
        $this->session->set_userdata($ses_data);
        $data = [
            'action' => site_url('Manajemen/act_add_resiko'),
        ];

        $this->template->load('template/admin_template', 'manajemen/resiko/add_resiko.php', $data);
    }

    public function add_sub_resiko($id)
    {
        $ses_data = array(
            'act_menu'   => 'resiko',
            'title'      => 'Manajemen Resiko',
            'breadcrumb' => 'resiko',
        );
        $this->session->set_userdata($ses_data);
        $resiko = $this->M_manajemen->get_resiko_by_id($id);
        $data = [
            'id_manajemen_resiko' => $id,
            'triwulan' => $resiko[0]->triwulan,
            'resiko' => $resiko,
            'action' => site_url('Manajemen/act_add_sub_resiko'),
        ];

        $this->template->load('template/admin_template', 'manajemen/resiko/add_sub_resiko.php', $data);
    }

    public function add_manajemen()
    {
        $ses_data = array(
            'act_menu'   => 'resiko',
            'title'      => 'Manajemen Resiko',
            'breadcrumb' => 'resiko',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'action' => site_url('Manajemen/act_add_resiko'),
        );
        $this->template->load('template/admin_template', 'manajemen/add_manajemen.php', $data);
    }

    public function act_add_resiko()
    {
        $periode = $this->input->post('periode');
        $indikator = $this->input->post('indikator');
        $nama_indikator = $this->input->post('nama_indikator');
        $bobot = $this->input->post('bobot');
        $target = $this->input->post('target');
        $realisasi = $this->input->post('realisasi');
        $skala = $this->input->post('skala');
        $hasil_penilaian = $this->input->post('hasil_penilaian');
        $skor_penilaian = $this->input->post('skor_penilaian');
        $tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));

        if (strpos($target, '.') !== false) {
            $target = str_replace('.', '', $target);
        }
        if (strpos($realisasi, '.') !== false) {
            $realisasi = str_replace('.', '', $realisasi);
        }
        $data = [
            'triwulan' => $periode,
            'indikator' => $indikator,
            'nama_indikator' => $nama_indikator,
            'bobot' => $bobot,
            'target' => $target,
            'realisasi' => $realisasi,
            'skala' => $skala,
            'hasil_penilaian' => $hasil_penilaian,
            'skor_penilaian' => $skor_penilaian,
            'tanggal' => date('Y-m-d', strtotime($tanggal)),
            'created_at' => date('Y-m-d h:i:s')
        ];

        if ($this->db->insert('tb_manajemen_resiko', $data)) {
            echo $this->session->set_flashdata('success', 'Data berhasil disimpan');
        } else {
            echo $this->session->set_flashdata('error', 'Data gagal disimpan');
        }
        redirect('Manajemen/resiko');
    }

    public function act_add_sub_resiko()
    {
        $id_manajemen_resiko = $this->input->post('id_manajemen_resiko');
        $periode = $this->input->post('periode');
        $id_sub_indikator = $this->input->post('id_sub_indikator');
        $nama_sub_indikator = $this->input->post('nama_sub_indikator');
        $bobot = $this->input->post('bobot');
        $target = $this->input->post('target');
        $realisasi = $this->input->post('realisasi');
        $skala = $this->input->post('skala');
        $hasil_penilaian = $this->input->post('hasil_penilaian');
        $skor_penilaian = $this->input->post('skor_penilaian');
        $tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));

        $target = str_replace('.', '', $target);
        $realisasi = str_replace('.', '', $realisasi);

        $data = [
            'id_manajemen_resiko' => $id_manajemen_resiko,
            'triwulan' => $periode,
            'id_sub_indikator' => $id_sub_indikator,
            'nama_sub_indikator' => $nama_sub_indikator,
            'bobot' => $bobot,
            'target' => $target,
            'realisasi' => $realisasi,
            'skala' => $skala,
            'hasil_penilaian' => $hasil_penilaian,
            'skor_penilaian' => $skor_penilaian,
            'tanggal' => date('Y-m-d', strtotime($tanggal)),
            'created_at' => date('Y-m-d h:i:s')
        ];

        if ($this->db->insert('tb_sub_manajemen_resiko', $data)) {
            echo $this->session->set_flashdata('success', 'Data berhasil disimpan');
        } else {
            echo $this->session->set_flashdata('error', 'Data gagal disimpan');
        }

        redirect('Manajemen/resiko');
    }

    public function hapus_resiko($id)
    {
        $this->db->where('id_manajemen_resiko', $id);
        if ($this->db->delete('tb_manajemen_resiko')) {
            $this->session->set_flashdata('success', 'Data Berhasil Di Hapus');
        } else {
            $this->session->set_flashdata('error', 'Data Gagal Di Hapus');
        }
        redirect('Manajemen/resiko');
    }

    function hapus_sub_resiko($id)
    {
        $this->db->where('id_sub_manajemen_resiko', $id);
        if ($this->db->delete('tb_sub_manajemen_resiko')) {
            $this->session->set_flashdata('success', 'Data Berhasil Di Hapus');
        } else {
            $this->session->set_flashdata('error', 'Data Gagal Di Hapus');
        }
        redirect('Manajemen/resiko');
    }

    public function kepatuhan_operasional()
    {
        $ses_data = array(
            'act_menu'   => 'kepatuhan_operasional',
            'title'      => 'Compliance Obligation',
            'breadcrumb' => 'kepatuhan_operasional',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'row' => $this->M_manajemen->get_kepatuhan(1),
            'upload' => site_url('Manajemen/act_upload_dokumen'),
            'update_status' => site_url('Manajemen/act_update_status'),
        );
        $this->template->load('template/admin_template', 'manajemen/kepatuhan_operasional.php', $data);
    }

    public function kepatuhan_korporasi()
    {
        $ses_data = array(
            'act_menu'   => 'kepatuhan_korporasi',
            'title'      => 'Compliance Obligation',
            'breadcrumb' => 'kepatuhan_korporasi',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'row' => $this->M_manajemen->get_kepatuhan(2),
        );
        $this->template->load('template/admin_template', 'manajemen/kepatuhan_korporasi.php', $data);
    }

    public function kepatuhan_perizinan()
    {
        $ses_data = array(
            'act_menu'   => 'kepatuhan_perizinan',
            'title'      => 'Compliance Obligation',
            'breadcrumb' => 'kepatuhan_perizinan',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'row' => $this->M_manajemen->get_kepatuhan(3),
        );
        $this->template->load('template/admin_template', 'manajemen/kepatuhan_perizinan.php', $data);
    }

    public function kepatuhan_regulasi()
    {
        $ses_data = array(
            'act_menu'   => 'kepatuhan_regulasi',
            'title'      => 'Compliance Obligation',
            'breadcrumb' => 'kepatuhan_regulasi',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'row' => $this->M_manajemen->get_kepatuhan(4),
        );
        $this->template->load('template/admin_template', 'manajemen/kepatuhan_regulasi.php', $data);
    }

    public function add_kepatuhan($aspek)
    {
        $ses_data = array(
            'act_menu'   => 'add_kepatuhan',
            'title'      => 'Compliance Obligation',
            'breadcrumb' => 'add_kepatuhan',
        );
        $this->session->set_userdata($ses_data);

        if ($aspek == 'operasional') {
            $id_aspek = 1;
        } elseif ($aspek == 'korporasi') {
            $id_aspek = 2;
        } elseif ($aspek == 'perizinan') {
            $id_aspek = 3;
        } elseif ($aspek == 'regulasi') {
            $id_aspek = 4;
        }
        $data = array(
            'action' => site_url('Manajemen/act_add_kepatuhan'),
            'aspek' => $aspek,
            'id_aspek' => $id_aspek,
        );
        $this->template->load('template/admin_template', 'manajemen/add_kepatuhan.php', $data);
    }

    public function act_add_kepatuhan()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', '&', ']', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $id_aspek = $this->input->post('id_aspek');

        $data = array(
            'jenis_aspek' => $this->input->post('id_aspek'),
            'kewajiban' => $this->input->post('kewajiban'),
            'dasar_hukum'  => $this->input->post('dasar_hukum'),
            'otoritas_terkait'  => $this->input->post('otoritas_terkait'),
            'periode_pemenuhan'  => $this->input->post('periode_pemenuhan'),
            'masa_berlaku'  => $this->input->post('masa_berlaku'),
            'konsekuensi'  => $this->input->post('konsekuensi'),
            'tgl_berakhir'    => $this->input->post('tgl_pemenuhan_berakhir'),
            'unit_pj'  => $this->input->post('unit_penanggungjawab'),
            'catatan'  => $this->input->post('catatan'),
            'status'  => $this->input->post('status'),
            'file' => $eks_file,
            'create_date' => date('Y-m-d h:i:s'),
        );

        $uploadPath = 'file_uploads/kewajiban_kepatuhan/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = '*';
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('file')) {
            if ($this->db->insert('kewajiban_kepatuhan', $data)) {
                echo $this->session->set_flashdata('message_success', 'Data Berhasil Disimpan');
            } else {
                echo $this->session->set_flashdata('message_error', 'Data Gagal Disimpan');
            }
        } else {
            $data2 = array(
                'jenis_aspek' => $this->input->post('id_aspek'),
                'kewajiban' => $this->input->post('kewajiban'),
                'dasar_hukum'  => $this->input->post('dasar_hukum'),
                'otoritas_terkait'  => $this->input->post('otoritas_terkait'),
                'periode_pemenuhan'  => $this->input->post('periode_pemenuhan'),
                'masa_berlaku'  => $this->input->post('masa_berlaku'),
                'konsekuensi'  => $this->input->post('konsekuensi'),
                'tgl_berakhir'    => $this->input->post('tgl_pemenuhan_berakhir'),
                'unit_pj'  => $this->input->post('unit_penanggungjawab'),
                'catatan'  => $this->input->post('catatan'),
                'status'  => $this->input->post('status'),
                'create_date' => date('Y-m-d h:i:s'),
            );
            if ($this->db->insert('kewajiban_kepatuhan', $data2)) {
                echo $this->session->set_flashdata('message_success', 'Data Berhasil Disimpan');
            } else {
                echo $this->session->set_flashdata('message_error', 'Data Gagal Disimpan');
            }
        }

        if ($id_aspek == 1) {
            $menu = 'kepatuhan_operasional';
        } elseif ($id_aspek == 2) {
            $menu = 'kepatuhan_korporasi';
        } elseif ($id_aspek == 3) {
            $menu = 'kepatuhan_perizinan';
        } elseif ($id_aspek == 5) {
            $menu = 'kepatuhan_regulasi';
        }
        redirect('Manajemen/' . $menu);
    }

    public function edit_kepatuhan($aspek, $id)
    {
        $ses_data = array(
            'act_menu'   => 'edit_kepatuhan',
            'title'      => 'Compliance Obligation',
            'breadcrumb' => 'edit_kepatuhan',
        );
        $this->session->set_userdata($ses_data);

        if ($aspek == 'operasional') {
            $id_aspek = 1;
        } elseif ($aspek == 'korporasi') {
            $id_aspek = 2;
        } elseif ($aspek == 'perizinan') {
            $id_aspek = 3;
        } elseif ($aspek == 'regulasi') {
            $id_aspek = 4;
        }

        $data_kepatuhan = $this->M_manajemen->get_kepatuhan_byid($id);
        $data = array(
            'action' => site_url('Manajemen/act_edit_kepatuhan'),
            'aspek' => $aspek,
            'id_aspek' => $id_aspek,
            'id_kewajiban_kepatuhan' => $data_kepatuhan['id_kewajiban_kepatuhan'],
            'jenis_aspek' => $data_kepatuhan['jenis_aspek'],
            'kewajiban' => $data_kepatuhan['kewajiban'],
            'dasar_hukum' => $data_kepatuhan['dasar_hukum'],
            'otoritas_terkait' => $data_kepatuhan['otoritas_terkait'],
            'periode_pemenuhan' => $data_kepatuhan['periode_pemenuhan'],
            'masa_berlaku' => $data_kepatuhan['masa_berlaku'],
            'konsekuensi' => $data_kepatuhan['konsekuensi'],
            'tgl_berakhir' => $data_kepatuhan['tgl_berakhir'],
            'unit_pj' => $data_kepatuhan['unit_pj'],
            'catatan' => $data_kepatuhan['catatan'],
            'status' => $data_kepatuhan['status'],
            'file' => $data_kepatuhan['file'],
        );
        $this->template->load('template/admin_template', 'manajemen/edit_kepatuhan.php', $data);
    }


    public function act_edit_kepatuhan()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', '&', ']', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $id_aspek = $this->input->post('id_aspek');
        $id_kewajiban_kepatuhan = $this->input->post('id_kewajiban_kepatuhan');

        $data = array(
            'jenis_aspek' => $this->input->post('id_aspek'),
            'kewajiban' => $this->input->post('kewajiban'),
            'dasar_hukum'  => $this->input->post('dasar_hukum'),
            'otoritas_terkait'  => $this->input->post('otoritas_terkait'),
            'periode_pemenuhan'  => $this->input->post('periode_pemenuhan'),
            'masa_berlaku'  => $this->input->post('masa_berlaku'),
            'konsekuensi'  => $this->input->post('konsekuensi'),
            'tgl_berakhir'    => $this->input->post('tgl_pemenuhan_berakhir'),
            'unit_pj'  => $this->input->post('unit_penanggungjawab'),
            'catatan'  => $this->input->post('catatan'),
            'status'  => $this->input->post('status'),
        );

        $uploadPath = 'file_uploads/kewajiban_kepatuhan/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = '*';
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('file')) {
            $this->db->where('id_kewajiban_kepatuhan', $id_kewajiban_kepatuhan);
            if ($this->db->update('kewajiban_kepatuhan', $data)) {
                echo $this->session->set_flashdata('message_success', 'Data Berhasil Disimpan');
            } else {
                echo $this->session->set_flashdata('message_error', 'Data Gagal Disimpan');
            }
        } else {
            $data2 = array(
                'jenis_aspek' => $this->input->post('id_aspek'),
                'kewajiban' => $this->input->post('kewajiban'),
                'dasar_hukum'  => $this->input->post('dasar_hukum'),
                'otoritas_terkait'  => $this->input->post('otoritas_terkait'),
                'periode_pemenuhan'  => $this->input->post('periode_pemenuhan'),
                'masa_berlaku'  => $this->input->post('masa_berlaku'),
                'konsekuensi'  => $this->input->post('konsekuensi'),
                'tgl_berakhir'    => $this->input->post('tgl_pemenuhan_berakhir'),
                'unit_pj'  => $this->input->post('unit_penanggungjawab'),
                'catatan'  => $this->input->post('catatan'),
                'status'  => $this->input->post('status'),
            );
            $this->db->where('id_kewajiban_kepatuhan', $id_kewajiban_kepatuhan);
            if ($this->db->update('kewajiban_kepatuhan', $data)) {
                echo $this->session->set_flashdata('message_success', 'Data Berhasil Disimpan');
            } else {
                echo $this->session->set_flashdata('message_error', 'Data Gagal Disimpan');
            }
        }

        if ($id_aspek == 1) {
            $menu = 'kepatuhan_operasional';
        } elseif ($id_aspek == 2) {
            $menu = 'kepatuhan_korporasi';
        } elseif ($id_aspek == 3) {
            $menu = 'kepatuhan_perizinan';
        } elseif ($id_aspek == 5) {
            $menu = 'kepatuhan_regulasi';
        }
        redirect('Manajemen/' . $menu);
    }


    public function hapus_kepatuhan_op($id)
    {
        $this->db->where('id_kewajiban_kepatuhan', $id);
        if ($this->db->delete('kewajiban_kepatuhan')) {
            $this->session->set_flashdata('message_success', 'Data Berhasil Dihapus');
        } else {
            $this->session->set_flashdata('message_error', 'Data Gagal Dihapus');
        }
        redirect('Manajemen/kepatuhan_operasional');
    }

    public function hapus_kepatuhan_re($id)
    {
        $this->db->where('id_kewajiban_kepatuhan', $id);
        if ($this->db->delete('kewajiban_kepatuhan')) {
            $this->session->set_flashdata('message_success', 'Data Berhasil Dihapus');
        } else {
            $this->session->set_flashdata('message_error', 'Data Gagal Dihapus');
        }
        redirect('Manajemen/kepatuhan_regulasi');
    }

    public function hapus_kepatuhan_kor($id)
    {
        $this->db->where('id_kewajiban_kepatuhan', $id);
        if ($this->db->delete('kewajiban_kepatuhan')) {
            $this->session->set_flashdata('message_success', 'Data Berhasil Dihapus');
        } else {
            $this->session->set_flashdata('message_error', 'Data Gagal Dihapus');
        }
        redirect('Manajemen/kepatuhan_korporasi');
    }

    public function hapus_kepatuhan_iz($id)
    {
        $this->db->where('id_kewajiban_kepatuhan', $id);
        if ($this->db->delete('kewajiban_kepatuhan')) {
            $this->session->set_flashdata('message_success', 'Data Berhasil Dihapus');
        } else {
            $this->session->set_flashdata('message_error', 'Data Gagal Dihapus');
        }
        redirect('Manajemen/kepatuhan_perizinan');
    }


    public function act_upload_dokumen()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', '&', ']', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $id_aspek = $this->input->post('id_aspek');
        $id_kewajiban = $this->input->post('id_kewajiban_kepatuhan');

        $data = array(
            'file' => $eks_file,
        );

        $uploadPath = 'file_uploads/kewajiban_kepatuhan/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = '*';
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('file')) {
            $this->db->where('id_kewajiban_kepatuhan', $id_kewajiban);
            if ($this->db->update('kewajiban_kepatuhan', $data)) {
                echo $this->session->set_flashdata('message_success', 'Data Dokumen Berhasil diupload');
            } else {
                echo $this->session->set_flashdata('message_error', 'Data Dokumen Gagal diupload');
            }
        } else {

            echo $this->session->set_flashdata('message_error', 'Data Dokumen Gagal diupload');
        }

        if ($id_aspek == 1) {
            $menu = 'kepatuhan_operasional';
        } elseif ($id_aspek == 2) {
            $menu = 'kepatuhan_korporasi';
        } elseif ($id_aspek == 3) {
            $menu = 'kepatuhan_perizinan';
        } elseif ($id_aspek == 5) {
            $menu = 'kepatuhan_regulasi';
        }
        redirect('Manajemen/' . $menu);
    }

    public function act_update_status()
    {

        $id_aspek = $this->input->post('id_aspek_status');
        $id_kewajiban = $this->input->post('id_kewajiban_status');
        $status = $this->input->post('status');

        $data = array(
            'status' => $status,
        );

        $this->db->where('id_kewajiban_kepatuhan', $id_kewajiban);
        if ($this->db->update('kewajiban_kepatuhan', $data)) {
            echo $this->session->set_flashdata('message_success', 'Data Status Berhasil diupdate');
        } else {
            echo $this->session->set_flashdata('message_error', 'Data Status Gagal diupdate');
        }

        if ($id_aspek == 1) {
            $menu = 'kepatuhan_operasional';
        } elseif ($id_aspek == 2) {
            $menu = 'kepatuhan_korporasi';
        } elseif ($id_aspek == 3) {
            $menu = 'kepatuhan_perizinan';
        } elseif ($id_aspek == 5) {
            $menu = 'kepatuhan_regulasi';
        }
        redirect('Manajemen/' . $menu);
    }

    function getDataKewajiban()
    {
        $jenis_aspek = $this->input->get('id_jenis');

        $kewajiban = $this->db->query("select * from kewajiban_kepatuhan where jenis_aspek=" . $jenis_aspek)->result();

        $no = 1;
        $data = "";
        foreach ($kewajiban as $dk) {

            if ($dk->file == null) {
                $file = '/';
            } else {
                $link_file = base_url('file_uploads/kewajiban_kepatuhan/' . $dk->file);
                $file = '<a href="' . $link_file . '" target="_BLANK" class="label label-primary"><i class="fa fa-print"></i></a>';
            }

            if ($dk->status == 1) {
                $status = "<i class='fa fa-check' style='color : darkcyan'></i>";
            } else {
                $status = "<i class='fa fa-window-close' style='color : indianred'></i>";
            }

            $data .= "<tr>
                <td>" . $no++ . "</td>
                <td>$dk->kewajiban</td>
                <td>$dk->dasar_hukum</td>
                <td>$dk->otoritas_terkait</td>
                <td>$dk->konsekuensi</td>
                <td>$dk->tgl_berakhir</td>
                <td>$dk->unit_pj</td>
                <td style='text-align:center'>$status</td>
                <td style='text-align:center'>$file</td>
                
            </tr>";
        }

        echo $data;
    }
}
