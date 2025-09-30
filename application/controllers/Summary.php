<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Summary extends CI_Controller {

	function __construct(){
        parent::__construct();
        $cek = $this->session->userdata('username');

        if ($cek != '' || $cek != null) { } else {
            redirect('Login');
        }
         //$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
        $this->load->model(array('M_master','M_dashboard'));
    }

    public function index()
    {
        $ses_data = array(
            'act_menu'   => 'summary',
            'title'      => 'summary',
            'breadcrumb' => 'summary',
        );
        $this->session->set_userdata($ses_data);

        $data = array(
            'bulan' => 'Summary Penggunaan Dana',
            'row' => $this->M_dashboard->get_data_kontrak_all(),
            'row2' => $this->M_dashboard->get_data_lain_all(),
        );
        $this->template->load('template/admin_template', 'summary/v_summary.php',$data);
    }
    
	public function detail_pmn($id)
	{
		$ses_data = array(
            'act_menu'   => 'summary',
            'title'      => 'summary',
            'breadcrumb' => 'summary',
        );
        $this->session->set_userdata($ses_data);

            if($id==1){
                $bulan = 'Januari';
            }else if($id==2){
                $bulan = 'Februari';
            }else if($id==3){
                $bulan = 'Maret';
            }else if($id==4){
                $bulan = 'April';
            }else if($id==5){
                $bulan = 'Mei';
            }else if($id==6){
                $bulan = 'Juni';
            }else if($id==7){
                $bulan = 'Juli';
            }else if($id==8){
                $bulan = 'Agustus';
            }else if($id==9){
                $bulan = 'September';
            }else if($id==10){
                $bulan = 'Oktober';
            }else if($id==11){
                $bulan = 'November';
            }else if($id==12){
                $bulan = 'Desember';
            }

        $data = array(
            'bulan' => 'Detail Penggunaan Dana PMN Bulan '.$bulan.' 2022',
            'row' => $this->M_dashboard->get_data_kontrak($id),
            'row2' => $this->M_dashboard->get_data_lain($id),
        );
		$this->template->load('template/admin_template', 'summary/v_summary.php',$data);
	}

    public function search()
    {
        $ses_data = array(
            'act_menu'   => 'summary',
            'title'      => 'summary',
            'breadcrumb' => 'summary',
        );
        $this->session->set_userdata($ses_data);
        $id = $this->input->post('bulan');
            if($id==1){
                $bulan = 'Januari';
            }else if($id==2){
                $bulan = 'Februari';
            }else if($id==3){
                $bulan = 'Maret';
            }else if($id==4){
                $bulan = 'April';
            }else if($id==5){
                $bulan = 'Mei';
            }else if($id==6){
                $bulan = 'Juni';
            }else if($id==7){
                $bulan = 'Juli';
            }else if($id==8){
                $bulan = 'Agustus';
            }else if($id==9){
                $bulan = 'September';
            }else if($id==10){
                $bulan = 'Oktober';
            }else if($id==11){
                $bulan = 'November';
            }else if($id==12){
                $bulan = 'Desember';
            }

        $data = array(
            'bulan' => 'Detail Penggunaan Dana PMN Bulan '.$bulan.' 2022',
            'row' => $this->M_dashboard->get_data_kontrak($id),
            'row2' => $this->M_dashboard->get_data_lain($id),
        );
        $this->template->load('template/admin_template', 'summary/v_summary.php',$data);
    }

    
	
}
