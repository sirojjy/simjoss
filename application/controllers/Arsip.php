<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Arsip extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $cek = $this->session->userdata('username');

        if ($cek != '' || $cek != null) {
        } else {
            redirect('Login');
        }
    }
    public function index()
    {
        $this->load->config('api_key');
        $api_key = $this->config->item('api_key_arsip');
        $data = array(
            'api_key' => $api_key
        );
        $ses_data = array(
            'act_menu'   => 'arsip',
            'title'      => 'arsip',
            'breadcrumb' => 'arsip',
        );
        $this->session->set_userdata($ses_data);
        $this->template->load('template/admin_template', 'arsip/v_arsip.php', $data);
    }
}
