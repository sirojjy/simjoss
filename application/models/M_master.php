<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_master extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	// public function count_all($value)
	// {
	// 	$this->$value();

	// 	return $this->db->count_all_results();
	// 	// echo $this->db->count_all_results();
	// }

	

	public function get_datatables($value, $id, $nama = null)
    {

        $this->$value($id, $nama);
        if ($this->session->userdata('status_user') == 2 || $this->session->userdata('status_user') == 1) {
            if ($id != 0) {
                // $this->db->where(array('r.id_ruas' => $id));
            } else {
                //$this->db->where(array('r.id_ruas' => 0));
            }
        }
        if ($_GET['length'] != -1) {
            $this->db->limit($_GET['length'], $_GET['start']);
            $query = $this->db->get();
        }
        return $query->result();
    }

    public function count_filtered($value, $id)
    {
        $this->$value($id);
        $query = $this->db->get();
        return $query->num_rows();
    }
	public function count_all($value)
	{
		/*$this->db->from($this->table);*/
		// $this->get_realokasi();
		$this->$value();
		return $this->db->count_all_results();
	}

	 public function m_aksi($username,$password){ 
        
        $d = $this->db->query("SELECT * from users  where username = '".$username."' and password = '".$password."'");
        // print_r($d); exit();
        if(count($d->result())>0){
            $data = $d->result();
            return $data;
        }else{
            $this->session->set_flashdata('message', 'Username atau Password yang anda masukkan salah.');
            header('location:'.base_url().'login');
        }
    
    }

	public function get_user()
	{
		$query = $this->db->query("select * from users");
		return $query->result();
	}
    public function get_utang_pph()
    {
        $query = $this->db->query("select * from pembayaran_lain where jenis=1 order by tanggal DESC");
        return $query->result();
    }
    public function get_utang_pph_by_id($id){ 
        $sql = $this->db->query('select * from pembayaran_lain where id_pembayaran_lain = ' . $id);
        return $sql->row();
    }
    public function get_angsuran()
    {
        $query = $this->db->query("select * from pembayaran_lain where jenis=2 order by tanggal DESC");
        return $query->result();
    }
    public function get_issue()
    {
        $query = $this->db->query("select * from issue order by tanggal DESC");
        return $query->result();
    }
    public function get_nonPmn()
    {
        $query = $this->db->query("select * from non_pmn order by tanggal DESC, id_nonpmn DESC");
        return $query->result();
    }
    public function get_nonPmn_byId($id){ 
        $sql = $this->db->query('select * from non_pmn where id_nonpmn = ' . $id);
        return $sql->row();
    }

    public function get_ppjtSearch($tahun)
    {
        $query = $this->db->query("select * from ppjt where extract (year from tanggal_dok)=".$tahun." order by tanggal_dok DESC");
        return $query->result();
    }

     public function get_aktaSearch($tahun,$keterangan)
    {
        $query = $this->db->query("select * from dokumen where jenis='akta' and  extract (year from tanggal)=".$tahun."and keterangan like '%".$keterangan."%' order by tanggal DESC");
        return $query->result();
    }

    public function get_legalSearch($tahun,$keterangan)
    {
        $query = $this->db->query("select * from dokumen where jenis='legal' and  extract (year from tanggal)=".$tahun."and keterangan like '%".$keterangan."%' order by tanggal DESC");
        return $query->result();
    }

    public function get_risalahSearch($tahun,$keterangan)
    {
        $query = $this->db->query("select * from dokumen where jenis='risalah' and  extract (year from tanggal)=".$tahun."and keterangan like '%".$keterangan."%' order by tanggal DESC");
        return $query->result();
    }
    public function get_mouSearch($tahun,$keterangan)
    {
        $query = $this->db->query("select * from dokumen where jenis='mou' and  extract (year from tanggal)=".$tahun." and keterangan like '%".$keterangan."%' order by tanggal DESC");
        return $query->result();
    }
    public function get_nonpmnSearch($tahun,$keterangan)
    {
        $query = $this->db->query("select * from non_pmn where extract (year from tanggal)=".$tahun." and keterangan like '%".$keterangan."%' order by tanggal DESC");
        return $query->result();
    }
}
