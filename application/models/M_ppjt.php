<?php
if (!defined('BASEPATH'))

    exit('No direct script access allowed');


class M_ppjt extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_datatables($value=null)
    {

        $this->$value();
        
        if ($_GET['length'] != -1) {
            $this->db->limit($_GET['length'], $_GET['start']);
            $query = $this->db->get();
        }
        return $query->result();
    }

    public function count_all()
    {
        return $this->db->count_all_results();
    }

    public function count_filtered($value, $id)
    {
        $this->$value($id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function get_all($all) {
    
        $query = $this->db->query("select * from users");
        return $query->result();
    }

    


    public function get_ppjt(){
        $sql = $this->db->query('select * from ppjt order by tanggal_dok ASC');
        return $sql->result();
    }
    public function get_ppjt_by_id($id){
  
        $sql = $this->db->query('select * from ppjt where id_ppjt = ' . $id);
        return $sql->row();
    }

}

