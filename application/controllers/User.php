<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
            'act_menu'   => 'user',
            'title'      => 'User',
            'breadcrumb' => 'user',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'row' => $this->M_master->get_user(),
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
}
