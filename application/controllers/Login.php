<?php
defined('BASEPATH') or exit('No direct script access allowed');

date_default_timezone_set('Asia/Jakarta');
class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model(array('M_master'));
    }

    public function index()
    {
        $this->load->view('login');
    }


    public function act()
    {
        $username  = $this->input->post('username');
        $password  = hash('sha512', md5($this->input->post('password', TRUE) . $this->config->item('key_login')));
        // print_r($password); exit();
        $cek = $this->M_master->m_aksi($username, $password);

        // print_r($cek); exit();
        $ses_data = array(
            'username' => $cek[0]->username,
            'level_user' => $cek[0]->level_user,
            // 'status_user' => $cek[0]->status_user,
            // 'id_ruas' => $cek[0]->id_ruas,
            'nama' => $cek[0]->nama,
            'id_users' => $cek[0]->id_users,
        );
        $this->session->set_userdata($ses_data);
        // $this->db->where('id_user',$cek[0]->id_user);
        // $this->db->update('users',array('last_login' => date('Y-m-d h:i:s')));
            if (getenv('HTTP_CLIENT_IP'))
                $ipaddress = getenv('HTTP_CLIENT_IP');
            else if(getenv('HTTP_X_FORWARDED_FOR'))
                $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
            else if(getenv('HTTP_X_FORWARDED'))
                $ipaddress = getenv('HTTP_X_FORWARDED');
            else if(getenv('HTTP_FORWARDED_FOR'))
                $ipaddress = getenv('HTTP_FORWARDED_FOR');
            else if(getenv('HTTP_FORWARDED'))
               $ipaddress = getenv('HTTP_FORWARDED');
            else if(getenv('REMOTE_ADDR'))
                $ipaddress = getenv('REMOTE_ADDR');
            else
                $ipaddress = 'IP tidak dikenali';

            if(strpos($_SERVER['HTTP_USER_AGENT'], 'Netscape'))
                $browser = 'Netscape';
            else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox'))
                $browser = 'Firefox';
            else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome'))
                $browser = 'Chrome';
            else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Opera'))
                $browser = 'Opera';
            else if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE'))
                $browser = 'Internet Explorer';
            else
                $browser = 'Other';

        if ($cek != FALSE) {
            $date = date('Y-m-d');
            
            $data_history = array(
                'id_user' => $cek[0]->id_users,
                'date' => date('Y-m-d h:i:s'),
                'ip_add' => $ipaddress,
                'browser' => $browser,
                'os' => $_SERVER['HTTP_USER_AGENT'],                                  
            );
            $this->db->insert('history',$data_history);
            redirect('Dashboard');
            
        } else {

            // echo $this->session->set_flashdata('msg', '<div class="alert alert-danger">
            //                     <strong>Warning!</strong> Username atau Password Salah
            //                 </div>');
            // redirect('login', $data);
            redirect('Login');
        }
    }

    function logout()
    {
        error_reporting(0);
        //$this->session->unset_userdata();
        $this->session->sess_destroy();
        redirect('Login');
    }

    function get_client_ip() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
           $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'IP tidak dikenali';
        return $ipaddress;
    }

    function get_client_browser() {
        $browser = '';
        if(strpos($_SERVER['HTTP_USER_AGENT'], 'Netscape'))
            $browser = 'Netscape';
        else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox'))
            $browser = 'Firefox';
        else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome'))
            $browser = 'Chrome';
        else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Opera'))
            $browser = 'Opera';
        else if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE'))
            $browser = 'Internet Explorer';
        else
            $browser = 'Other';
        return $browser;
    }
}
