<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    private $_USERS = 'users';
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
            'act_menu'   => 'user',
            'title'      => 'User',
            'breadcrumb' => 'user',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            // 'row' => $this->M_master->get_user(),
        );
        $this->template->load('template/admin_template', 'user/v_user.php', $data);
    }
    public function add_user()
    {
        $ses_data = array(
            'act_menu'   => 'user',
            'title'      => 'user',
            'breadcrumb' => 'user',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'action' => site_url('User/act_addUser'),
        );
        $this->template->load('template/admin_template', 'user/add_user.php', $data);
    }

    public function act_addUser()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => hash('sha512', md5($this->input->post('password', TRUE) . $this->config->item('key_login'))),
            'email' => $this->input->post('email'),
            'level_user' => $this->input->post('level'),

        );
        if ($this->db->insert('users', $data)) {
            $json = array(
                'code' => '0000',
                'message' => 'Add User berhasil',
                'csrf' => $this->security->get_csrf_hash()
            );
            echo $this->session->set_flashdata('msg', 'success');
        } else {
            $json = array(
                'code' => '0001',
                'message' => 'Add User gagal',
                'csrf' => $this->security->get_csrf_hash()
            );
            echo $this->session->set_flashdata('msg', 'error');
        }

        redirect('User');
    }

    public function hapus_user($id)
    {
        $this->db->where('id_users', $id);
        if ($this->db->delete('users')) {
            $this->session->set_flashdata('message_success', 'Data Berhasil Di Hapus');
        } else {
            $this->session->set_flashdata('message_error', 'Data Gagal Di Hapus');
        }
        redirect('User');
    }

    public function getUsers()
    {
        $this->load->model('Datatables_model', 'dt');

        $this->dt->set_config([
            'table'             => $this->_USERS,
            'select'            => 'id_users, nama, username, email, level_user',
            'column_order'      => ['id_users', 'nama', 'username', 'email', 'level_user'],
            'column_search'     => ['nama', 'username', 'email'],
            'numeric_columns'   => ['id_users'],
            'order'             => ['id_users' => 'asc'],
        ]);

        $result = [
            'data' => $this->dt->_get_datatables(),
            'count_filtered' => $this->dt->_count_filtered(),
            'count_all' => $this->dt->_count_all()
        ];

        $data = [];
        $no = $_POST['start'];
        foreach ($result['data'] as $row) {
            $no++;

            if ($row->level_user == 1) {
                $level_user = '<span class="badge badge-md badge-pill badge-info">Superadmin</span>';
            } elseif ($row->level_user == 2) {
                $level_user = '<span class="badge badge-md badge-pill badge-info">Admin</span>';
            } elseif ($row->level_user == 0) {
                $level_user = '<span class="badge badge-md badge-pill badge-info">User</span>';
            } else {
                $level_user = '-';
            }

            $aksi = '<td class="d-flex">
                <a href="#" class="btn btn-success btn-sm d-none" data-toggle="modal"><i class="fa fa-edit"></i></a>
                <a href="' . base_url('user/hapus_user/' . $row->id_users) . '" title="hapus" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Yakin menghapus data ?\')"><i class="fa fa-trash"></i></a>
            </td>';

            $data[] = [
                'id'                => $no,
                'nama'              => $row->nama,
                'username'          => $row->username,
                'email'             => $row->email,
                'level'             => $level_user,
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
}
