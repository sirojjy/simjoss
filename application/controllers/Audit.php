<?php defined('BASEPATH') or exit('No direct script access allowed');

class Audit extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $cek = $this->session->userdata('username');

        if ($cek != '' || $cek != null) {
        } else {
            redirect('Login');
        }
        $this->load->model(array('M_audit'));
    }

    function getAudit()
    {
        $jenis_audit = $this->input->post('jenis_audit');
        $result = $this->M_audit->getAudit($jenis_audit);
        $data = [];
        $no = $_POST['start'];

        foreach ($result['data'] as $row) {
            $no++;

            if ($row->file) {
                $lokasi_file = base_url("file_uploads/audit/" . $row->file);
                $file = '<a href="' . $lokasi_file . '" target="_blank" class="btn btn-primary btn-sm" ><i class="fa fa-print"></i></a>';
            } else {
                $file = '-';
            }

            $aksi = '
            <div class="btn-group" role="group">
                <a href="' . site_url('Audit/edit_audit/' . $row->id_audit) . '" class="btn btn-success btn-sm mr-2"><i class="fa fa-edit"></i></a>
                <a href="' . site_url('Audit/hapus_audit_internal/' . $row->id_audit) . '" title="hapus" class="btn btn-danger btn-sm" onClick="javasciprt: return confirm(\'Yakin menghapus data ?\')"><i class="fa fa-trash"></i></a>
            </td>';

            if ($row->kategori == 1) {
                $kategori = "<span class='text-success'><b>Observasi</b></span>";
            } elseif ($row->kategori == 2) {
                $kategori = "<span class='text-orange'><b>Minor</b></span>";
            } elseif ($row->kategori == 3) {
                $kategori = "<span class='text-danger'><b>Mayor</b></span>";
            } else {
                $kategori = '-';
            }

            if ($row->iso == "9001") {
                $iso = "9001:2015";
            } elseif ($row->iso == "14001") {
                $iso = "14001:2015";
            } elseif ($row->iso == "45001") {
                $iso = "45001:2018";
            } elseif ($row->iso == "37001") {
                $iso = "37001:2016";
            } else {
                $iso = "-";
            }

            if ($row->status == 1) {
                $status = '<span class="badge badge-danger">Open</span>';
            } elseif ($row->status == 2) {
                $status = '<span class="badge badge-success">Close</span>';
            } else {
                $status = '-';
            }

            $data[] = [
                'id'                => $no,
                'uraian_temuan'     => $row->uraian_temuan,
                'tanggal'           => date('d-m-Y', strtotime($row->tanggal)),
                'kategori'          => $kategori,
                'iso'               => $iso,
                'klausul'           => $row->klausul,
                'tindak_lanjut'     => $row->tindak_lanjut,
                'status'            => $status,
                'file'              => $file,
                'aksi'              => $aksi
            ];
        }

        echo json_encode([
            "draw" => $_POST['draw'],
            "recordsTotal" => $result['count_all'],
            "recordsFiltered" => $result['count_filtered'],
            "data" => $data
        ]);
    }

    public function internal()
    {
        $ses_data = array(
            'act_menu'   => 'internal',
            'title'      => 'Audit Internal',
            'breadcrumb' => 'internal',
        );
        $this->session->set_userdata($ses_data);
        $this->template->load('template/admin_template', 'audit/v_audit_internal.php');
    }

    public function add_audit_internal()
    {
        $ses_data = array(
            'act_menu'   => 'internal',
            'title'      => 'Audit Internal',
            'breadcrumb' => 'internal',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'action' => site_url('Audit/act_add_internal'),
            'jenis_audit' => 1,
        );
        $this->template->load('template/admin_template', 'audit/add_audit_internal.php', $data);
    }

    public function act_add_internal()
    {
        $config = array();

        $jenis_audit = $this->input->post('jenis_audit');
        if ($jenis_audit == 1) {
            $menu = 'internal';
        } elseif ($jenis_audit == 2) {
            $menu = 'eksternal';
        }

        $data = [
            'tahun' => $this->input->post('tahun'),
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'jenis_audit' => $this->input->post('jenis_audit'),
            'uraian_temuan' => $this->input->post('uraian_temuan'),
            'kategori'  => $this->input->post('kategori'),
            'iso'  => $this->input->post('iso'),
            'klausul'  => $this->input->post('klausul'),
            'tindak_lanjut'  => $this->input->post('tindak_lanjut'),
            'status'  => $this->input->post('status'),
            'create_date' => date('Y-m-d h:i:s'),
            'tw' => $this->input->post('tw'),
        ];

        if ($_FILES['file']['name']) {
            $filename = $_FILES['file']['name'];
            $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

            $string_replace = array('/', ';', '[', '&', ']', '{', '}', '|', '^', '~', ' ', '.', '-');
            $nama = str_replace($string_replace, '_', $filename);
            $eks_file = $menu . '_' . $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;
            $data['file'] = $eks_file;

            $uploadPath = 'file_uploads/audit/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = '*';
            $config['file_name'] = $eks_file;
        }

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('file')) {
            if ($this->db->insert('audit', $data)) {
                echo $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            } else {
                echo $this->session->set_flashdata('error', 'Data Gagal Disimpan');
            }
        } else {
            if ($this->db->insert('audit', $data)) {
                echo $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            } else {
                echo $this->session->set_flashdata('error', 'Data Gagal Disimpan');
            }
        }

        redirect('Audit/' . $menu);
    }

    public function edit_audit($id)
    {
        $ses_data = array(
            'act_menu'   => 'eksternal',
            'title'      => 'Audit Internal',
            'breadcrumb' => 'eksternal',
        );
        $this->session->set_userdata($ses_data);

        $data_audit = $this->M_audit->get_audit_id($id);

        $data = array(
            'action' => site_url('Audit/act_edit_audit'),
            'jenis_audit' => $data_audit['jenis_audit'],
            'id_audit' => $data_audit['id_audit'],
            'uraian_temuan' => $data_audit['uraian_temuan'],
            'kategori' => $data_audit['kategori'],
            'iso' => $data_audit['iso'],
            'klausul' => $data_audit['klausul'],
            'tindak_lanjut' => $data_audit['tindak_lanjut'],
            'status' => $data_audit['status'],
            'tahun' => $data_audit['tahun'],
            'tanggal' => $data_audit['tanggal'],
            'tw' => $data_audit['tw'],
            'file' => $data_audit['file'],
        );
        $this->template->load('template/admin_template', 'audit/edit_audit.php', $data);
    }

    public function hapus_audit_internal($id)
    {
        $this->db->where('id_audit', $id);
        $this->db->delete('audit');

        redirect('Audit/internal');
    }

    public function eksternal()
    {
        $ses_data = array(
            'act_menu'   => 'eksternal',
            'title'      => 'Audit Internal',
            'breadcrumb' => 'eksternal',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'row' => $this->M_audit->get_audit(2),
        );
        $this->template->load('template/admin_template', 'audit/v_audit_eksternal.php', $data);
    }

    public function add_audit_eksternal()
    {
        $ses_data = array(
            'act_menu'   => 'eksternal',
            'title'      => 'Audit Internal',
            'breadcrumb' => 'eksternal',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'action' => site_url('Audit/act_add_internal'),
            'jenis_audit' => 2,
        );
        $this->template->load('template/admin_template', 'audit/add_audit_internal.php', $data);
    }

    public function act_edit_audit()
    {
        $config = array();

        $jenis_audit = $this->input->post('jenis_audit');
        $id_audit = $this->input->post('id_audit');

        if ($jenis_audit == 1) {
            $menu = 'internal';
        } elseif ($jenis_audit == 2) {
            $menu = 'eksternal';
        }

        $data = array(
            'tahun' => $this->input->post('tahun'),
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'jenis_audit' => $this->input->post('jenis_audit'),
            'uraian_temuan' => $this->input->post('uraian_temuan'),
            'kategori'  => $this->input->post('kategori'),
            'iso'  => $this->input->post('iso'),
            'klausul'  => $this->input->post('klausul'),
            'tindak_lanjut'  => $this->input->post('tindak_lanjut'),
            'status'  => $this->input->post('status'),
            'tw' => $this->input->post('tw'),
        );

        if ($_FILES['file']['name']) {
            $filename = $_FILES['file']['name'];
            $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

            $string_replace = array('/', ';', '[', '&', ']', '{', '}', '|', '^', '~', ' ', '.', '-');
            $nama = str_replace($string_replace, '_', $filename);
            $eks_file = $menu . '_' . $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;
            $data['file'] = $eks_file;

            $uploadPath = 'file_uploads/audit/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = '*';
            $config['file_name'] = $eks_file;
        }

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('file')) {
            $this->db->where('id_audit', $id_audit);
            if ($this->db->update('audit', $data)) {
                echo $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            } else {
                echo $this->session->set_flashdata('error', 'Data Gagal Disimpan');
            }
        } else {
            $this->db->where('id_audit', $id_audit);
            if ($this->db->update('audit', $data)) {
                echo $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            } else {
                echo $this->session->set_flashdata('error', 'Data Gagal Disimpan');
            }
        }

        redirect('Audit/' . $menu);
    }

    public function hapus_audit_eksternal($id)
    {
        $this->db->where('id_audit', $id);
        $this->db->delete('audit');

        redirect('Audit/eksternal');
    }
}
