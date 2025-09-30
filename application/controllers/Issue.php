<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Issue extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $cek = $this->session->userdata('username');

        if ($cek != '' || $cek != null) {
        } else {
            redirect('Login');
        }

        $this->load->model(array('M_master'));
    }
    public function index()
    {
        $ses_data = array(
            'act_menu'   => 'issue',
            'title'      => 'Issue',
            'breadcrumb' => 'issue',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'row' => $this->M_master->get_issue(),
        );
        $this->template->load('template/admin_template', 'issue/v_issue.php', $data);
    }
    public function act_addIssue()
    {

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $data = array(
            'rekomendasi' => $this->input->post('rekomendasi'),
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'status' => $this->input->post('status'),
            'issue' => $this->input->post('issue'),
            'jenis_progres' => $this->input->post('jenis'),
            'indikasi' => $this->input->post('indikasi'),
            'create_date' => date('Y-m-d h:i:s'),
        );

        $data2 = array(
            'rekomendasi' => $this->input->post('rekomendasi'),
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'status' => $this->input->post('status'),
            'issue' => $this->input->post('issue'),
            'jenis_progres' => $this->input->post('jenis'),
            'indikasi' => $this->input->post('indikasi'),
            'create_date' => date('Y-m-d h:i:s'),
            'file' => $eks_file,
        );

        $uploadPath = 'file_uploads/issue/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = '*';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            if ($this->db->insert('issue', $data2)) {
                echo $this->session->set_flashdata('success', 'Data berhasil disimpan.');
            } else {
                echo $this->session->set_flashdata('error', 'Data gagal disimpan.');
            }
        } else {
            if ($this->db->insert('issue', $data)) {
                echo $this->session->set_flashdata('success', 'Data berhasil disimpan.');
            } else {
                echo $this->session->set_flashdata('error', 'Data gagal disimpan.');
            }
        }
        redirect('Issue');
    }

    public function edit_issue($id)
    {
        $this->load->model('M_issue', 'model_issue');

        $data = array(
            'issue' => $this->model_issue->edit_issue($id),
        );
        $this->template->load('template/admin_template', 'issue/edit_issue.php', $data);
    }

    public function update_issue()
    {
        $id = $this->input->post('id_issue');
        $tanggal = $this->input->post('tanggal');
        $status = $this->input->post('status');
        $issue = $this->input->post('issue');
        $rekomendasi = $this->input->post('rekomendasi');
        $jenis = $this->input->post('jenis');
        $indikasi = $this->input->post('indikasi');

        if ($_FILES['file']['name'] != '') {
            $filename = $_FILES['file']['name'];
            $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

            $string_replace = array('/', ';', '[', ']', '{', '}', '|', '^', '~', ' ', '.', '-');
            $nama = str_replace($string_replace, '_', $filename);
            $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

            $uploadPath = 'file_uploads/issue/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = '*';
            $config['max_size'] = 0;
            $config['file_name'] = $eks_file;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('file')) {
                $this->upload->data();
            }

            $data = array(
                'rekomendasi' => $rekomendasi,
                'tanggal' => date('Y-m-d', strtotime($tanggal)),
                'status' => $status,
                'issue' => $issue,
                'jenis_progres' => $jenis,
                'indikasi' => $indikasi,
                'file' => $eks_file,
            );
        } else {
            $data = array(
                'rekomendasi' => $rekomendasi,
                'tanggal' => date('Y-m-d', strtotime($tanggal)),
                'status' => $status,
                'issue' => $issue,
                'jenis_progres' => $jenis,
                'indikasi' => $indikasi,
            );
        }

        $this->db->where('id_issue', $id);
        if ($this->db->update('issue', $data)) {
            $this->session->set_flashdata('success', 'Data Berhasil Di Update');
        } else {
            $this->session->set_flashdata('error', 'Data Gagal Di Update');
        }
        redirect('Issue');
    }

    public function hapus_issue($id)
    {
        $this->db->where('id_issue', $id);
        if ($this->db->delete('issue')) {
            $this->session->set_flashdata('success', 'Data Berhasil Di Hapus');
        } else {
            $this->session->set_flashdata('error', 'Data Gagal Di Hapus');
        }
        redirect('Issue');
    }
}
