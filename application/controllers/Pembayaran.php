<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

	function __construct(){
		parent::__construct();
		// $cek = $this->session->userdata('status');

  //       if ($cek != '' || $cek != null) { } else {
  //           redirect('C_login');
  //       }
		 //$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
		$this->load->model(array('M_master'));
	}
	public function index()
	{
		$ses_data = array(
            'act_menu'   => 'dashboard',
            'title'      => 'Dashboard',
            'breadcrumb' => 'dashboard',
        );
        $this->session->set_userdata($ses_data);
		$this->template->load('template/admin_template', 'dashboard_nasional.php');
	}


    public function utang_pph()
    {
        $ses_data = array(
            'act_menu'   => 'utang_pph',
            'title'      => 'Utang PPh',
            'breadcrumb' => 'utang_pph',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'row' => $this->M_master->get_utang_pph(),
        );
        $this->template->load('template/admin_template', 'pembayaran_lain/v_utang_pph.php',$data);
    }

    public function add_utangPph()
    {
        $ses_data = array(
            'act_menu'   => 'utang_pph',
            'title'      => 'Utang PPh',
            'breadcrumb' => 'utang_pph',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'action' => site_url('Pembayaran/act_addUtangPph'),
        );
        $this->template->load('template/admin_template', 'pembayaran_lain/add_utang_pph.php',$data);
    }

    public function act_addUtangPph(){
        $config = array();  

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', '&', ']', '{', '}', '|', '^', '~' , ' ','.','-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama.'_'.date('d-m-Y_h-i-s').'.'.$ekstensi_file;

        $data = array(
            'jenis' => 1,   
            'tanggal' => date('Y-m-d',strtotime($this->input->post('tanggal'))),
            'nilai' => str_replace('.', '', $this->input->post('nilai')), 
            'keterangan' => $this->input->post('keterangan'),                         
            'dok_file' => $eks_file,                      
            'create_date' => date('Y-m-d h:i:s'),  
            'kantor' => $this->input->post('kantor'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'), 
            'pic' => $this->input->post('pic'),
            'bulan' => $this->input->post('bulan'),             
        );

        $uploadPath = 'file_uploads/utang_pph/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] ='pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if($this->upload->do_upload('file')){
            $this->upload->data();
            $this->db->insert('pembayaran_lain',$data);
            echo $this->session->set_flashdata('msg','success'); 

        }else{
            echo $this->session->set_flashdata('msg','error');
        }

        // $error = array('error' => $this->upload->display_errors());
        // print_r($error); exit();

        redirect('Pembayaran/utang_pph');
    }

    public function hapus_utangPph($id){
        $this->db->where('id_pembayaran_lain',$id);
        if ($this->db->delete('pembayaran_lain')){
            $this->session->set_flashdata('message_success','Data Berhasil Di Hapus');
        }
        else{
            $this->session->set_flashdata('message_error','Data Gagal Di Hapus');
        }
        redirect('Pembayaran/utang_pph');
    }

    public function edit_utangPph($id)
    {
        $ses_data = array(
            'act_menu'   => 'utang_pph',
            'title'      => 'utang_pph',
            'breadcrumb' => 'utang_pph',
        );
        $this->session->set_userdata($ses_data);
        $row2 = $this->M_master->get_utang_pph_by_id($id);
        if ($row2) {
            $data = array(
                'action' => site_url('Pembayaran/act_update_utangPph'),
                'id_pembayaran_lain' => $row2->id_pembayaran_lain,
                'tanggal' => $row2->tanggal,
                'keterangan' => $row2->keterangan,
                'nilai' => $row2->nilai,
                'file' => $row2->dok_file,
                
                'jenis' => $row2->jenis,
                'kantor' => $row2->kantor,
                'pic' => $row2->pic,
                'no_rak' => $row2->no_rak,
                'no_box' => $row2->no_box,
                'bulan' => $row2->bulan,
            );
        }
        $this->template->load('template/admin_template', 'pembayaran_lain/edit_utang_pph.php',$data);
    }

    function act_update_utangPph(){
        $config = array(); 
        $id_pembayaran = $this->input->post('id_pembayaran'); 

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~' , ' ','.','-');
        $nama = str_replace($string_replace, '_', $filename);
         $eks_file = $nama.'_'.date('d-m-Y_h-i-s').'.'.$ekstensi_file;

        $data = array(
            'tanggal' => date('Y-m-d',strtotime($this->input->post('tanggal'))),
            'nilai' => str_replace('.', '', $this->input->post('nilai')), 
            'keterangan' => $this->input->post('keterangan'),                         
            'dok_file' => $eks_file,                       
            'kantor' => $this->input->post('kantor'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'), 
            'pic' => $this->input->post('pic'),
            'bulan' => $this->input->post('bulan'),                                   
        );

        $data2 = array(                
            'tanggal' => date('Y-m-d',strtotime($this->input->post('tanggal'))),
            'nilai' => str_replace('.', '', $this->input->post('nilai')), 
            'keterangan' => $this->input->post('keterangan'),                                             
            'kantor' => $this->input->post('kantor'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'), 
            'pic' => $this->input->post('pic'),
            'bulan' => $this->input->post('bulan'),                          
        );

        $uploadPath = 'file_uploads/utang_pph/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] ='pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if($this->upload->do_upload('file')){
            $this->upload->data();
            $this->db->where('id_pembayaran_lain', $id_pembayaran);
            if($this->db->update('pembayaran_lain',$data)){
                 echo $this->session->set_flashdata('msg','success'); 
             }else{
                 echo $this->session->set_flashdata('msg','error'); 
             }
        }else{
            $this->db->where('id_pembayaran_lain', $id_pembayaran);
            if($this->db->update('pembayaran_lain',$data2)){
                 echo $this->session->set_flashdata('msg','success'); 
             }else{
                 echo $this->session->set_flashdata('msg','error'); 
             }
        }
 

        redirect('Pembayaran/utang_pph');
    }

    public function angsuran()
    {
        $ses_data = array(
            'act_menu'   => 'angsuran',
            'title'      => 'Kewajiban Angsuran',
            'breadcrumb' => 'angsuran',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'row' => $this->M_master->get_angsuran(),
        );
        $this->template->load('template/admin_template', 'pembayaran_lain/v_angsuran.php',$data);
    }

    public function add_angsuran()
    {
        $ses_data = array(
            'act_menu'   => 'angsuran',
            'title'      => 'Kewajiban Angsuran',
            'breadcrumb' => 'angsuran',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'action' => site_url('Pembayaran/act_addAngsuran'),
        );
        $this->template->load('template/admin_template', 'pembayaran_lain/add_angsuran.php',$data);
    }

    public function act_addAngsuran(){
        $config = array();  

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', '&', ']', '{', '}', '|', '^', '~' , ' ','.','-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama.'_'.date('d-m-Y_h-i-s').'.'.$ekstensi_file;

        $data = array(
            'jenis' => 2,   
            'tanggal' => date('Y-m-d',strtotime($this->input->post('tanggal'))),
            'nilai' => str_replace('.', '', $this->input->post('nilai')), 
            'keterangan' => $this->input->post('keterangan'),                         
            'dok_file' => $eks_file,                      
            'create_date' => date('Y-m-d h:i:s'),  
            'kantor' => $this->input->post('kantor'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'), 
            'pic' => $this->input->post('pic'),  
            'bulan' => date('m',strtotime($this->input->post('tanggal'))),          
        );

        $uploadPath = 'file_uploads/pembayaran_angsuran/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] ='pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if($this->upload->do_upload('file')){
            $this->upload->data();
            $this->db->insert('pembayaran_lain',$data);
            echo $this->session->set_flashdata('msg','success'); 

        }else{
            echo $this->session->set_flashdata('msg','error');
        }

        // $error = array('error' => $this->upload->display_errors());
        // print_r($error); exit();

        redirect('Pembayaran/angsuran');
    }

    public function hapus_angsuran($id){
        $this->db->where('id_pembayaran_lain',$id);
        if ($this->db->delete('pembayaran_lain')){
            $this->session->set_flashdata('message_success','Data Berhasil Di Hapus');
        }
        else{
            $this->session->set_flashdata('message_error','Data Gagal Di Hapus');
        }
        redirect('Pembayaran/angsuran');
    }

     public function edit_angsuran($id)
    {
        $ses_data = array(
            'act_menu'   => 'angsuran',
            'title'      => 'angsuran',
            'breadcrumb' => 'angsuran',
        );
        $this->session->set_userdata($ses_data);
        $row2 = $this->M_master->get_utang_pph_by_id($id);
        if ($row2) {
            $data = array(
                'action' => site_url('Pembayaran/act_update_angsuran'),
                'id_pembayaran_lain' => $row2->id_pembayaran_lain,
                'tanggal' => $row2->tanggal,
                'keterangan' => $row2->keterangan,
                'nilai' => $row2->nilai,
                'file' => $row2->dok_file,
                
                'jenis' => $row2->jenis,
                'kantor' => $row2->kantor,
                'pic' => $row2->pic,
                'no_rak' => $row2->no_rak,
                'no_box' => $row2->no_box,
                'bulan' => $row2->bulan,
            );
        }
        $this->template->load('template/admin_template', 'pembayaran_lain/edit_angsuran.php',$data);
    }

    function act_update_angsuran(){
        $config = array(); 
        $id_pembayaran = $this->input->post('id_pembayaran'); 

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~' , ' ','.','-');
        $nama = str_replace($string_replace, '_', $filename);
         $eks_file = $nama.'_'.date('d-m-Y_h-i-s').'.'.$ekstensi_file;

        $data = array(
            'tanggal' => date('Y-m-d',strtotime($this->input->post('tanggal'))),
            'nilai' => str_replace('.', '', $this->input->post('nilai')), 
            'keterangan' => $this->input->post('keterangan'),                         
            'dok_file' => $eks_file,                       
            'kantor' => $this->input->post('kantor'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'), 
            'pic' => $this->input->post('pic'),
            'bulan' => date('m',strtotime($this->input->post('tanggal'))),                                   
        );

        $data2 = array(                
            'tanggal' => date('Y-m-d',strtotime($this->input->post('tanggal'))),
            'nilai' => str_replace('.', '', $this->input->post('nilai')), 
            'keterangan' => $this->input->post('keterangan'),                                             
            'kantor' => $this->input->post('kantor'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'), 
            'pic' => $this->input->post('pic'),
            'bulan' => date('m',strtotime($this->input->post('tanggal'))),                          
        );

        $uploadPath = 'file_uploads/pembayaran_angsuran/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] ='pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if($this->upload->do_upload('file')){
            $this->upload->data();
            $this->db->where('id_pembayaran_lain', $id_pembayaran);
            if($this->db->update('pembayaran_lain',$data)){
                 echo $this->session->set_flashdata('msg','success'); 
             }else{
                 echo $this->session->set_flashdata('msg','error'); 
             }
        }else{
            $this->db->where('id_pembayaran_lain', $id_pembayaran);
            if($this->db->update('pembayaran_lain',$data2)){
                 echo $this->session->set_flashdata('msg','success'); 
             }else{
                 echo $this->session->set_flashdata('msg','error'); 
             }
        }
 

        redirect('Pembayaran/angsuran');
    }

    public function non_pmn()
    {
        $ses_data = array(
            'act_menu'   => 'non_pmn',
            'title'      => 'Non PMN',
            'breadcrumb' => 'non_pmn',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'row' => $this->M_master->get_nonPmn(),
        );
        $this->template->load('template/admin_template', 'pembayaran_lain/v_nonPmn.php',$data);
    }

    public function add_nonPMN()
    {
        $ses_data = array(
            'act_menu'   => 'non_pmn',
            'title'      => 'Non PMN',
            'breadcrumb' => 'non_pmn',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'action' => site_url('Pembayaran/act_addNonPmn'),
        );
        $this->template->load('template/admin_template', 'pembayaran_lain/add_nonPmn.php',$data);
    }

    public function act_addNonPmn(){
        $config = array();  

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', '&', ']', '{', '}', '|', '^', '~' , ' ','.','-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama.'_'.date('d-m-Y_h-i-s').'.'.$ekstensi_file;

        $data = array(
            'jenis' => $this->input->post('jenis'), 
            'no_bukti' => $this->input->post('no_bukti'),  
            'tanggal' => date('Y-m-d',strtotime($this->input->post('tanggal'))),
            'nilai' => str_replace('.', '', $this->input->post('nilai')), 
            'keterangan' => $this->input->post('keterangan'),                         
            'dok_file' => $eks_file,                      
            'create_date' => date('Y-m-d h:i:s'),  
            'kantor' => $this->input->post('kantor'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'), 
            'pic' => $this->input->post('pic'),         
        );

        $uploadPath = 'file_uploads/non_pmn/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] ='pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if($this->upload->do_upload('file')){
            $this->upload->data();
            $this->db->insert('non_pmn',$data);
            echo $this->session->set_flashdata('msg','success'); 

        }else{
            echo $this->session->set_flashdata('msg','error');
        }

        // $error = array('error' => $this->upload->display_errors());
        // print_r($error); exit();

        redirect('Pembayaran/non_pmn');
    }

    public function hapus_nonPmn($id){
        $this->db->where('id_nonpmn',$id);
        if ($this->db->delete('non_pmn')){
            $this->session->set_flashdata('message_success','Data Berhasil Di Hapus');
        }
        else{
            $this->session->set_flashdata('message_error','Data Gagal Di Hapus');
        }
        redirect('Pembayaran/non_pmn');
    }

     public function edit_nonPmn($id)
    {
        $ses_data = array(
            'act_menu'   => 'non_pmn',
            'title'      => 'Non PMN',
            'breadcrumb' => 'non_pmn',
        );
        $this->session->set_userdata($ses_data);
        $row2 = $this->M_master->get_nonPmn_byId($id);
        if ($row2) {
            $data = array(
                'action' => site_url('Pembayaran/act_update_nonPmn'),
                'id_nonpmn' => $row2->id_nonpmn,
                'no_bukti' => $row2->no_bukti,
                'tanggal' => $row2->tanggal,
                'keterangan' => $row2->keterangan,
                'nilai' => $row2->nilai,
                'file' => $row2->dok_file,
                'kantor' => $row2->kantor,
                'pic' => $row2->pic,
                'no_rak' => $row2->no_rak,
                'no_box' => $row2->no_box,
                'jenis' => $row2->jenis,
            );
        }
        $this->template->load('template/admin_template', 'pembayaran_lain/edit_nonPmn.php',$data);
    }
    function act_update_nonPmn(){
        $config = array(); 
        $id_nonpmn = $this->input->post('id_nonpmn'); 

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~' , ' ','.','-');
        $nama = str_replace($string_replace, '_', $filename);
         $eks_file = $nama.'_'.date('d-m-Y_h-i-s').'.'.$ekstensi_file;

        $data = array(
            'no_bukti' => $this->input->post('no_bukti'),
            'tanggal' => date('Y-m-d',strtotime($this->input->post('tanggal'))),
            'nilai' => str_replace('.', '', $this->input->post('nilai')), 
            'keterangan' => $this->input->post('keterangan'),                         
            'dok_file' => $eks_file,                       
            'kantor' => $this->input->post('kantor'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'), 
            'pic' => $this->input->post('pic'), 
            'jenis' => $this->input->post('jenis'),                                  
        );

        $data2 = array(   
            'no_bukti' => $this->input->post('no_bukti'),             
            'tanggal' => date('Y-m-d',strtotime($this->input->post('tanggal'))),
            'nilai' => str_replace('.', '', $this->input->post('nilai')), 
            'keterangan' => $this->input->post('keterangan'),                                             
            'kantor' => $this->input->post('kantor'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'), 
            'pic' => $this->input->post('pic'),   
            'jenis' => $this->input->post('jenis'),                       
        );

        $uploadPath = 'file_uploads/non_pmn/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] ='pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if($this->upload->do_upload('file')){
            $this->upload->data();
            $this->db->where('id_nonpmn', $id_nonpmn);
            if($this->db->update('non_pmn',$data)){
                 echo $this->session->set_flashdata('msg','success'); 
             }else{
                 echo $this->session->set_flashdata('msg','error'); 
             }
        }else{
            $this->db->where('id_nonpmn', $id_nonpmn);
            if($this->db->update('non_pmn',$data2)){
                 echo $this->session->set_flashdata('msg','success'); 
             }else{
                 echo $this->session->set_flashdata('msg','error'); 
             }
        }
 

        redirect('Pembayaran/non_pmn');
    }



	
}
