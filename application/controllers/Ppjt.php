<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ppjt extends CI_Controller {
	function __construct(){
		parent::__construct();
		$cek = $this->session->userdata('username');

        if ($cek != '' || $cek != null) { } else {
            redirect('Login');
        }
		 //$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
		$this->load->model(array('M_ppjt'));
	}

	public function index()
	{
		$ses_data = array(
            'act_menu'   => 'ppjt',
            'title'      => 'PPJT',
            'breadcrumb' => 'ppjt',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'row' => $this->M_ppjt->get_ppjt(),
        );
		$this->template->load('template/admin_template', 'ppjt/v_ppjt.php',$data);
	}
	public function add_ppjt()
	{
		$ses_data = array(
            'act_menu'   => 'ppjt',
            'title'      => 'PPJT',
            'breadcrumb' => 'ppjt',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'action' => site_url('Ppjt/act_addPpjt'),
        );
		$this->template->load('template/admin_template', 'ppjt/add_ppjt.php',$data);
	}

	public function act_addPpjt(){
        $config = array();  

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', '&', ']', '{', '}', '|', '^', '~' , ' ','.','-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama.'_'.date('d-m-Y_h-i-s').'.'.$ekstensi_file;

        $data = array(
            'jenis' => $this->input->post('jenis'),
            'nomor_dok' => $this->input->post('nomor_dok'),    
            'tanggal_dok' => date('Y-m-d',strtotime($this->input->post('tanggal_dok'))),
            'nilai' => str_replace('.', '', $this->input->post('nilai')), 
            'keterangan' => $this->input->post('keterangan'),                         
            'dok_file' => $eks_file,                      
            'create_date' => date('Y-m-d h:i:s'),  
            'kantor' => $this->input->post('kantor'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'), 
            'pic' => $this->input->post('pic'),            
        );

        $uploadPath = 'file_uploads/ppjt/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] ='pdf';
        $config['max_size'] = 50000;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if($this->upload->do_upload('file')){
            $this->upload->data();
            $this->db->insert('ppjt',$data);
            echo $this->session->set_flashdata('msg','success'); 

        }else{
            echo $this->session->set_flashdata('msg','error');
        }

        // $error = array('error' => $this->upload->display_errors());
        // print_r($error); exit();

        redirect('Ppjt');
    }

    public function hapus_ppjt($id){
        $this->db->where('id_ppjt',$id);
        if ($this->db->delete('ppjt')){
            $this->session->set_flashdata('message_success','Data Berhasil Di Hapus');
        }
        else{
            $this->session->set_flashdata('message_error','Data Gagal Di Hapus');
        }
        redirect('Ppjt');
    }

    public function edit_ppjt($id)
    {
        $ses_data = array(
            'act_menu'   => 'ppjt',
            'title'      => 'PPJT',
            'breadcrumb' => 'ppjt',
        );
        $this->session->set_userdata($ses_data);
        $row2 = $this->M_ppjt->get_ppjt_by_id($id);
        if ($row2) {
            $data = array(
                'action' => site_url('Ppjt/act_update_ppjt'),
                'id_ppjt' => $row2->id_ppjt,
                'nomor_dok' => $row2->nomor_dok,
                'tanggal_dok' => $row2->tanggal_dok,
                'nilai' => $row2->nilai,
                'file' => $row2->dok_file,
                'keterangan' => $row2->keterangan,
                'jenis' => $row2->jenis,
                'kantor' => $row2->kantor,
                'pic' => $row2->pic,
                'no_rak' => $row2->no_rak,
                'no_box' => $row2->no_box,
            );
        }
        $this->template->load('template/admin_template', 'ppjt/edit_ppjt.php',$data);
    }

   function act_update_ppjt(){
        $config = array(); 
        $id_ppjt = $this->input->post('id_ppjt'); 

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~' , ' ','.','-');
        $nama = str_replace($string_replace, '_', $filename);
         $eks_file = $nama.'_'.date('d-m-Y_h-i-s').'.'.$ekstensi_file;

        $data = array(
            'jenis' => $this->input->post('jenis'),
            'nomor_dok' => $this->input->post('nomor_dok'),    
            'tanggal_dok' => date('Y-m-d',strtotime($this->input->post('tanggal_dok'))),
            'nilai' => str_replace('.', '', $this->input->post('nilai')), 
            'keterangan' => $this->input->post('keterangan'), 
            'kantor' => $this->input->post('kantor'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'), 
            'pic' => $this->input->post('pic'),                      
            'dok_file' => $eks_file,                                  
        );

        $data2 = array(                
            'jenis' => $this->input->post('jenis'),
            'nomor_dok' => $this->input->post('nomor_dok'),    
            'tanggal_dok' => date('Y-m-d',strtotime($this->input->post('tanggal_dok'))),
            'nilai' => str_replace('.', '', $this->input->post('nilai')), 
            'keterangan' => $this->input->post('keterangan'), 
            'kantor' => $this->input->post('kantor'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'), 
            'pic' => $this->input->post('pic'),                          
        );

        $uploadPath = 'file_uploads/ppjt/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] ='pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if($this->upload->do_upload('file')){
            $this->upload->data();
            $this->db->where('id_ppjt', $id_ppjt);
            if($this->db->update('ppjt',$data)){
                 echo $this->session->set_flashdata('msg','success'); 
             }else{
                 echo $this->session->set_flashdata('msg','error'); 
             }
        }else{
            // print_r($data2); exit();
            $this->db->where('id_ppjt', $id_ppjt);
            if($this->db->update('ppjt',$data2)){
                 echo $this->session->set_flashdata('msg','success'); 
             }else{
                 echo $this->session->set_flashdata('msg','error'); 
             }

        }
 

        redirect('Ppjt');
    }

	
}