<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct();
		$cek = $this->session->userdata('username');

        if ($cek != '' || $cek != null) { } else {
            redirect('Login');
        }
		 //$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
		$this->load->model(array('M_master','M_ppjt'));
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
    public function kurvaS()
    {
        $ses_data = array(
            'act_menu'   => 'kurva',
            'title'      => 'Kurva S',
            'breadcrumb' => 'kurva',
        );
        $this->session->set_userdata($ses_data);
        $this->template->load('template/admin_template', 'kurva/v_kurva.php');
    }
    
    public function sop()
    {
        $ses_data = array(
            'act_menu'   => 'sop',
            'title'      => 'SOP',
            'breadcrumb' => 'sop',
        );
        $this->session->set_userdata($ses_data);
        $this->template->load('template/admin_template', 'sop.php');
    }

    public function search()
    {
        $ses_data = array(
            'act_menu'   => 'search',
            'title'      => 'search',
            'breadcrumb' => 'search',
        );
        $this->session->set_userdata($ses_data);
        $this->session->set_userdata($ses_data);
        $data = array(
            'row' => $this->M_ppjt->get_ppjt(),
            'jenis_dok' => 0,
        );
        $this->template->load('template/admin_template', 'search.php',$data);
    }
    public function act_search()
    {
        $ses_data = array(
            'act_menu'   => 'search',
            'title'      => 'search',
            'breadcrumb' => 'search',
        );
        $this->session->set_userdata($ses_data);

        $jenis_dok = $this->input->post('jenis');
        $tahun = $this->input->post('tahun');
        $keterangan = $this->input->post('keterangan');
        if($jenis_dok==0){
            $dataSearch = $this->M_master->get_ppjtSearch($tahun);
        }else if($jenis_dok==1){
            $dataSearch = $this->M_master->get_aktaSearch($tahun,$keterangan);
        }else if($jenis_dok==2){
            $dataSearch = $this->M_master->get_legalSearch($tahun,$keterangan);
        }else if($jenis_dok==3){
            $dataSearch = $this->M_master->get_risalahSearch($tahun,$keterangan);
        }else if($jenis_dok==4){
            $dataSearch = $this->M_master->get_mouSearch($tahun,$keterangan);
        }else if($jenis_dok==5){
            $dataSearch = $this->M_master->get_nonpmnSearch($tahun,$keterangan);
        }
        $data = array(
            'jenis_dok' => $jenis_dok,
            'row' => $dataSearch,
        );
        $this->template->load('template/admin_template', 'search.php',$data);
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
            'action' => site_url('Welcome/act_addUtangPph'),
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

        redirect('Welcome/utang_pph');
    }

    public function hapus_utangPph($id){
        $this->db->where('id_pembayaran_lain',$id);
        if ($this->db->delete('pembayaran_lain')){
            $this->session->set_flashdata('message_success','Data Berhasil Di Hapus');
        }
        else{
            $this->session->set_flashdata('message_error','Data Gagal Di Hapus');
        }
        redirect('Welcome/utang_pph');
    }

    public function bispro(){
        $ses_data = array(
            'act_menu' => 'bispro',
            'title' => 'bispro ',
            'breadcrumb' => 'bispro',
        );
        
        $data  = array(
            
        );

        $this->template->load('template/admin_template','bispro',$data);
    }

    public function alur($id){
        $ses_data = array(
            'act_menu' => 'bispro',
            'title' => 'bispro ',
            'breadcrumb' => 'bispro',
        );
        $gmb ="";
        $judul ="";
        if($id==3){
            $judul = "Pembebasan Lahan";
            $gmb = "alur_lahan.JPG";
        }else if($id==2){
            $judul = "Konstruksi";
            $gmb = "alur_kons.JPG";
        }else if($id==1){
            $judul = "Financial Closure";
            $gmb = "alur_finance.JPG";
        }
        else if($id==4){
            $judul = "SDM";
        }else if($id==5){
            $judul = "Pengelolaan Keuangan";
        }else if($id==6){
            $judul = "Legal";
        }else if($id==7){
            $judul = "Pemeliharaan Lingkungan Kerja";
        }else if($id==8){
            $judul = "Pengelolaan K3";
        }else if($id==9){
            $judul = "Corporate Secretary";
        }

        $dataProsedur = $this->db->query("select * from prosedur where kategori_prosedur=".$id)->result();
        $data  = array(
            'judul' => $judul,
            'gambar' => $gmb,
            'kategori' => $id,
            'dataProsedur' => $dataProsedur,
        );

        $this->template->load('template/admin_template','alur',$data);
    }

    public function struktur_organisasi(){
        $ses_data = array(
            'act_menu' => 'struktur_organisasi',
            'title' => 'struktur_organisasi ',
            'breadcrumb' => 'struktur_organisasi',
        );
        
        $data  = array(
            
        );

        $this->template->load('template/admin_template','struktur_organisasi',$data);
    }

    public function visi_misi(){
        $ses_data = array(
            'act_menu' => 'visi_misi',
            'title' => 'visi_misi ',
            'breadcrumb' => 'visi_misi',
        );
        
        $data  = array(
            
        );

        $this->template->load('template/admin_template','visi_misi',$data);
    }

     public function peraturan(){
        $ses_data = array(
            'act_menu' => 'peraturan',
            'title' => 'peraturan ',
            'breadcrumb' => 'peraturan',
        );
        
        $data  = array(
            // 'peraturan' => $this->M_master->get_peraturan(),
        );

        $this->template->load('template/admin_template','peraturan',$data);
    }

    public function add_peraturan() {
       
       $ses_data = array(
            'act_menu' => 'peraturan',
            'title'=> 'peraturan',
            'breadcumb'=>'peraturan'

        );
        
        $this->session->set_userdata($ses_data);
      
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('Welcome/act_peraturan'),
           
        );
        
       $this->template->load('template/admin_template','add_peraturan', $data);        
    }

    public function act_peraturan()
  {

        
        $no_dok     = $this->input->post('no_dok');
        $perihal        = $this->input->post('perihal');
        $tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));


        $config = array();  
        $ganti_str = "standar_teknis__peraturan_".date('d-m-Y_h-i-s').".pdf";

        $uploadPath = 'file_uploads/peraturan/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] ='pdf';
        $config['file_name'] = $ganti_str;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if($this->upload->do_upload('file')){
          $this->upload->data();
            $data = array(
              'nomor'     => $no_dok,
              'keterangan' => $perihal,
              'file'        => $ganti_str,
            
              'tanggal'       => $tanggal,
              'create_date' => date('Y-m-d h:i:s'),
            );
            $this->db->insert('peraturan',$data);
            echo $this->session->set_flashdata('msg','success'); 
            redirect('Welcome/peraturan');

        }else{
            echo $this->session->set_flashdata('msg','error');
            redirect('Welcome/peraturan');
        }



  }

	
}
