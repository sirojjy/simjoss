<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Monitoring extends CI_Controller
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

    public function rkap()
    {
        $ses_data = array(
            'act_menu'   => 'rkap',
            'title'      => 'Monitoring RKAP',
            'breadcrumb' => 'rkap',
        );
        $this->session->set_userdata($ses_data);

        $data = [
            'title' => 'Monitoring RKAP',
            'menu' => 'rkap',
        ];
        $this->template->load('template/admin_template', 'monitoring/v_rkap.php', $data);
    }

    function getRKAP()
    {
        $this->load->model('M_manajemen');
        $jenis = $_POST['jenis'];
        $result = $this->M_manajemen->get_opex($jenis);

        $data = [];
        $no = $_POST['start'];
        foreach ($result['data'] as $row) {
            $no++;

            switch ($row->tw) {
                case '1':
                    $tw = 'TW I';
                    break;
                case '2':
                    $tw = 'TW II';
                    break;
                case '3':
                    $tw = 'TW III';
                    break;
                case '4':
                    $tw = 'TW IV';
                    break;
                default:
                    $tw = 'TW I';
                    break;
            }

            $rencana = number_format($row->rencana, 2, ',', '.');
            $realisasi = number_format($row->realisasi, 2, ',', '.');
            $deviasi = number_format($row->deviasi, 2, ',', '.');


            $aksi = '<td>
                <a href="' . site_url("Monitoring/edit_rkap/" . $row->id_monitoring_rkap) . '" title="hapus" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                <a href="' . site_url("Monitoring/hapus_rkap/" . $row->id_monitoring_rkap) . '" title="hapus" class="btn btn-danger btn-sm" onClick="javasciprt: return confirm("Yakin menghapus data ?")"><i class="fa fa-trash"></i></a>
            </td>';

            $data[] = [
                'id'          => $no,
                'keterangan'  => $row->keterangan,
                'tw'          => $tw ?? '-',
                'tahun'       => $row->tahun,
                'rencana'     => "Rp. " . $rencana,
                'realisasi'   => "Rp. " . $realisasi,
                'deviasi'     => "Rp. " . $deviasi,
                'aksi'        => $aksi
            ];
        }

        echo json_encode([
            "draw" => $_POST['draw'],
            "recordsTotal" => $result['count_all'],
            "recordsFiltered" => $result['count_filtered'],
            "data" => $data
        ]);
    }

    public function add_rkap()
    {
        $ses_data = array(
            'act_menu'   => 'rkap',
            'title'      => 'Monitoring RKAP',
            'breadcrumb' => 'rkap',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'action' => site_url('Monitoring/act_add_rkap'),
        );
        $this->template->load('template/admin_template', 'monitoring/add_rkap.php', $data);
    }


    public function act_add_rkap()
    {

        $rencana = $this->input->post('rencana');
        $ren = str_replace('.', '', $rencana);

        $realisasi = $this->input->post('realisasi');
        $rea = str_replace('.', '', $realisasi);

        $deviasi = $rea - $ren;

        $dataa = array(
            'jenis' => $this->input->post('jenis'),
            'keterangan' => $this->input->post('keterangan'),
            'tw' => $this->input->post('tw'),
            'tahun' => $this->input->post('tahun'),
            'rencana' => $this->input->post('rencana'),
            'realisasi' => $this->input->post('realisasi'),
            'deviasi' => $deviasi,
            'create_date' => date('Y-m-d h:i:s'),
        );


        if ($this->db->insert('monitoring_rkap', $dataa)) {

            $this->session->set_flashdata('message_success', 'Data RKAP Berhasil Ditambah');
        } else {
            $this->session->set_flashdata('message_error', 'Data RKAP Gagal Ditambah');
        }

        redirect('Monitoring/rkap');
    }

    public function hapus_rkap($id)
    {
        $this->db->where('id_monitoring_rkap', $id);
        if ($this->db->delete('monitoring_rkap')) {
            $this->session->set_flashdata('message_success', 'Data Berhasil Di Hapus');
        } else {
            $this->session->set_flashdata('message_error', 'Data Gagal Di Hapus');
        }
        redirect('Monitoring/rkap');
    }


    public function edit_rkap($id)
    {
        $ses_data = array(
            'act_menu'   => 'rkap',
            'title'      => 'Monitoring RKAP',
            'breadcrumb' => 'rkap',
        );
        $this->session->set_userdata($ses_data);
        $rkap = $this->M_manajemen->get_data_rkap($id);

        $data = array(
            'id_monitoring_rkap' => $rkap['id_monitoring_rkap'],
            'jenis' => $rkap['jenis'],
            'keterangan' => $rkap['keterangan'],
            'tw' => $rkap['tw'],
            'tahun' => $rkap['tahun'],
            'rencana' => $rkap['rencana'],
            'realisasi' => $rkap['realisasi'],
            'action' => site_url('Monitoring/act_edit_rkap'),
        );
        $this->template->load('template/admin_template', 'monitoring/edit_rkap.php', $data);
    }


    public function act_edit_rkap()
    {

        $id = $this->input->post('id_monitoring_rkap');
        $rencana = $this->input->post('rencana');
        $ren = str_replace('.', '', $rencana);

        $realisasi = $this->input->post('realisasi');
        $rea = str_replace('.', '', $realisasi);

        $deviasi = $rea - $ren;

        $dataa = array(
            'jenis' => $this->input->post('jenis'),
            'keterangan' => $this->input->post('keterangan'),
            'tw' => $this->input->post('tw'),
            'tahun' => $this->input->post('tahun'),
            'rencana' => $this->input->post('rencana'),
            'realisasi' => $this->input->post('realisasi'),
            'deviasi' => $deviasi,
        );

        $this->db->where('id_monitoring_rkap', $id);
        if ($this->db->update('monitoring_rkap', $dataa)) {

            $this->session->set_flashdata('message_success', 'Data RKAP Berhasil Diupdate');
        } else {
            $this->session->set_flashdata('message_error', 'Data RKAP Gagal Diupdate');
        }

        redirect('Monitoring/rkap');
    }

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
