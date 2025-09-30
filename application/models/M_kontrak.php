<?php
if (!defined('BASEPATH'))

    exit('No direct script access allowed');


class M_kontrak extends CI_Model
{

    private $_KONSTRUKSI = 'tb_kontrak_konstruksi';
    private $_KONSULTAN = 'tb_kontrak_konsultan';
    private $_ADDENDUM_KONSTRUKSI = "addendum_konstruksi";
    private $_USERS = "users";
    private $_DOKUMEN_MASTER = "dok_master";
    private $_DETAIL_DOK_KONSTRUKSI = "detail_dok_konstruksi";


    public function __construct()
    {
        parent::__construct();
    }

    public function get_datatables($value = null)
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

    public function get_all()
    {
        $query = $this->db->query("SELECT * FROM " . $this->_USERS);
        return $query->result();
    }

    public function get_kontrakKonsultan()
    {
        $sql = $this->db->query('SELECT * FROM ' . $this->_KONSULTAN . ' WHERE jenis=1 ORDER BY seksi ASC, tanggal_mulai DESC');
        return $sql->result();
    }
    public function get_kontrakKonsultanNonTol()
    {
        $sql = $this->db->query('SELECT * FROM ' . $this->_KONSULTAN . ' WHERE jenis=2 ORDER BY seksi ASC, tanggal_mulai DESC');
        return $sql->result();
    }
    public function get_kontrakPeralatanTol()
    {
        $sql = $this->db->query('SELECT * FROM ' . $this->_KONSULTAN . ' WHERE jenis=3 ORDER BY seksi ASC, tanggal_mulai DESC');
        return $sql->result();
    }

    public function getNamaKontrak($id_kontrak)
    {
        $nama = $this->db->query('SELECT nama_kontrak FROM ' . $this->_KONSULTAN . ' WHERE id_kontrak_konsultan=' . $id_kontrak);
        return $nama->row();
    }

    public function get_kontrakKonstruksi()
    {
        $this->db->select('*');
        $this->db->from($this->_KONSTRUKSI);
        $this->db->order_by('tanggal_mulai', 'DESC');
        $sql = $this->db->get();
        return $sql->result();
    }
    public function get_kontrakLainnya()
    {
        $sql = $this->db->query('select * from kontrak_lainnya order by tanggal_mulai DESC');
        return $sql->result();
    }
    public function get_mc($id)
    {
        $sql = $this->db->query('select * from mc where id_kontrak =' . $id . ' order by tanggal ASC');
        return $sql->result();
    }

    public function get_dokumenLain($id)
    {
        $sql = $this->db->query('select * from dokumen_lain where id_kontrak =' . $id . ' order by tanggal_dok ASC');
        return $sql->result();
    }
    // public function get_dokumenLain($id_kontrak){
    //     $sql = $this->db->query('select * from dokumen_lainn');
    //     return $sql->result();
    // }

    public function get_dok_mc($id)
    {
        $sql = $this->db->query('select detail_dok_konstruksi.*, mc.nomor_mc from detail_dok_konstruksi join mc on mc.id_mc=detail_dok_konstruksi.id_mc where detail_dok_konstruksi.id_mc =' . $id . ' order by id_detail_dok ASC');
        return $sql->result();
    }
    public function get_mc_by_id($id)
    {
        $sql = $this->db->query('select * from mc where id_mc =' . $id);
        return $sql->row();
    }
    public function get_konstruksiNonTol()
    {
        $sql = $this->db->query('select * from kontrak_konstruksi_nontol order by seksi ASC, tanggal_mulai DESC');
        return $sql->result();
    }
    public function get_kontrakLain_byId($id)
    {
        $sql = $this->db->query('select * from kontrak_lainnya where id_kontrak=' . $id);
        return $sql->row();
    }
    public function get_konstruksiNonTol_byId($id)
    {

        $sql = $this->db->query('select * from kontrak_konstruksi_nontol where id_kontrak_nontol = ' . $id);
        return $sql->row();
    }

    public function get_pembayaranKonsultan($id)
    {
        $sql = $this->db->query('select * from pembayaran where id_kontrak_konsultan=' . $id . ' order by tanggal DESC');
        return $sql->result();
    }
    public function get_lapKonsultan($id)
    {
        $sql = $this->db->query('select * from laporan_konsultan where id_kontrak_konsultan=' . $id . ' order by tanggal_lap DESC');
        return $sql->result();
    }
    public function get_lapKonstruksiNonTol($id)
    {
        $sql = $this->db->query('select * from laporan_konstruksi where id_kontrak_nontol=' . $id . ' order by tanggal_lap DESC');
        return $sql->result();
    }
    public function get_pembayaranKonsultan_byId($id)
    {
        $sql = $this->db->query('select * from pembayaran where id_pembayaran = ' . $id);
        return $sql->row();
    }
    public function get_lapKonsultan_byId($id)
    {
        $sql = $this->db->query('select * from laporan_konsultan where id_laporan = ' . $id);
        return $sql->row();
    }
    public function get_lapKonstruksi_byId($id)
    {
        $sql = $this->db->query('select * from laporan_konstruksi where id_laporan = ' . $id);
        return $sql->row();
    }
    public function get_dokPembayaranKonsultan($id)
    {
        $sql = $this->db->query("select dm.id_dok_master, dm.nama_dok, 
                (select dd.id_detail_dok from detail_dok_konsultan as dd where dd.id_dok_master = dm.id_dok_master and dd.id_pembayaran=" . $id . " order by dd.id_detail_dok desc limit 1),
                (select dd.dok_file from detail_dok_konsultan as dd where dd.id_dok_master = dm.id_dok_master and dd.id_pembayaran=" . $id . " order by dd.id_detail_dok desc limit 1),
                (select dd.nomor_dok from detail_dok_konsultan as dd where dd.id_dok_master = dm.id_dok_master and dd.id_pembayaran=" . $id . " order by dd.id_detail_dok desc limit 1),
                (select dd.tanggal_dok from detail_dok_konsultan as dd where dd.id_dok_master = dm.id_dok_master and dd.id_pembayaran=" . $id . " order by dd.id_detail_dok desc limit 1)
                 from dok_master as dm where dm.id_dok_master in (76,31,32,33,34,80,81,37,82)
                order by dm.aktif DESC, dm.nama_dok ASC");
        return $sql->result();
    }

    public function get_pembayaranKonstruksi($id)
    {
        $sql = $this->db->query('select * from pembayaran where id_kontrak_konstruksi=' . $id . ' order by tanggal DESC');
        return $sql->result();
    }
    public function get_pembayaranKonstruksi_byId($id)
    {
        $sql = $this->db->query('select * from pembayaran where id_pembayaran = ' . $id);
        return $sql->row();
    }
    public function get_dokPembayaranKonstruksi($id)
    {
        $sql = $this->db->query("select dm.id_dok_master, dm.nama_dok, 
                (select dd.id_detail_dok from detail_dok_konstruksi as dd where dd.id_dok_master = dm.id_dok_master and dd.id_pembayaran=" . $id . " order by dd.id_detail_dok desc limit 1),
                (select dd.dok_file from detail_dok_konstruksi as dd where dd.id_dok_master = dm.id_dok_master and dd.id_pembayaran=" . $id . " order by dd.id_detail_dok desc limit 1),
                (select dd.nomor_dok from detail_dok_konstruksi as dd where dd.id_dok_master = dm.id_dok_master and dd.id_pembayaran=" . $id . " order by dd.id_detail_dok desc limit 1),
                (select dd.tanggal_dok from detail_dok_konstruksi as dd where dd.id_dok_master = dm.id_dok_master and dd.id_pembayaran=" . $id . " order by dd.id_detail_dok desc limit 1)
                 from dok_master as dm where dm.id_dok_master in (76,31,32,33,34)
                order by dm.id_dok_master asc");
        return $sql->result();
    }
    public function get_kontrak_by_id($id)
    {
        $sql = $this->db->get_where($this->_KONSTRUKSI, ['id_kontrak_konstruksi' => $id]);
        return $sql->row();
    }

    public function update_kontrak($id_kontrak, $data)
    {
        $this->db->where('id_kontrak_konstruksi', $id_kontrak);
        return $this->db->update($this->_KONSTRUKSI, $data);
    }

    public function get_kontrakKonsultan_by_id($id)
    {

        $sql = $this->db->query('select * from ' . $this->_KONSULTAN . ' where id_kontrak_konsultan = ' . $id);
        return $sql->row();
    }
    public function get_pembayaranKonstruksiNonTol($id)
    {
        $sql = $this->db->query('select * from pembayaran where id_kontrak_konstruksinontol=' . $id . ' order by tanggal DESC');
        return $sql->result();
    }
    public function get_pembayaranKonstruksiNonTol_byId($id)
    {
        $sql = $this->db->query('select * from pembayaran where id_pembayaran = ' . $id);
        return $sql->row();
    }
    public function get_dokPembayaranKonstruksiNonTol($id)
    {
        $sql = $this->db->query("select dm.id_dok_master, dm.nama_dok, 
                (select dd.id_detail_dok from detail_dok_nontol as dd where dd.id_dok_master = dm.id_dok_master and dd.id_pembayaran=" . $id . " order by dd.id_detail_dok desc limit 1),
                (select dd.dok_file from detail_dok_nontol as dd where dd.id_dok_master = dm.id_dok_master and dd.id_pembayaran=" . $id . " order by dd.id_detail_dok desc limit 1),
                (select dd.nomor_dok from detail_dok_nontol as dd where dd.id_dok_master = dm.id_dok_master and dd.id_pembayaran=" . $id . " order by dd.id_detail_dok desc limit 1),
                (select dd.tanggal_dok from detail_dok_nontol as dd where dd.id_dok_master = dm.id_dok_master and dd.id_pembayaran=" . $id . " order by dd.id_detail_dok desc limit 1)
                 from dok_master as dm where dm.id_dok_master in (76,77,78,79,31,32,33,34)
                order by dm.id_dok_master asc");
        return $sql->result();
    }

    // Kontrak Konstruksi
    public function getDokumenTahapan($id, $idKontrakKonstruksi)
    {
        $sql = $this->db->query("select * from tahapan_addendum_konstruksi where tahapan_add='" . $id . "' and id_kontrak_konstruksi='" . $idKontrakKonstruksi . "' order by create_date desc");
        // $sql = $this->db->query(
        //     "SELECT	* FROM tahapan_addendum_konstruksi WHERE tahapan_add='" . $id . "' and id_kontrak_konstruksi='" . $idKontrakKonstruksi . "' AND jenis_dokumen IN ('usulan', 'pengadaan', 'lainnya') ORDER BY
        //     CASE
        //         WHEN jenis_dokumen = 'usulan' THEN 1
        //         WHEN jenis_dokumen = 'pengadaan' THEN 2
        //         WHEN jenis_dokumen = 'lainnya' THEN 3
        //         ELSE 4
        //     END, id_jenis_dokumen ASC"
        // );
        return $sql->result();
    }

    public function getDokumenTahapanById($idTahapan, $idKontrakKonstruksi)
    {
        $sql = $this->db->query("SELECT * FROM tahapan_addendum_konstruksi WHERE id_kontrak_konstruksi=" . $idTahapan . " AND id_kontrak_konstruksi='" . $idKontrakKonstruksi . "'");
        return $sql->result();
    }

    public function hapus_dokumen_konstruksi($id)
    {
        $this->db->where('id_tahapan_addendum_konstruksi', $id);
        $this->db->delete('tahapan_addendum_konstruksi');
    }

    public function check_tahapan_konstruksi($id, $idKontrakKonstruksi, $jenisDokumen, $idJenisDokumen)
    {
        $sql = $this->db->query("SELECT * FROM tahapan_addendum_konstruksi WHERE id_kontrak_konstruksi = " . $idKontrakKonstruksi . " AND tahapan_add = '" . $id . "' AND id_jenis_dokumen = '" . $idJenisDokumen . "' AND jenis_dokumen = '" . $jenisDokumen . "' LIMIT 1");
        return $sql->num_rows();
    }

    public function get_dokumen_konstruksi_by_id($id)
    {
        $this->db->select('*');
        $this->db->from($this->_ADDENDUM_KONSTRUKSI);
        $this->db->where('id_kontrak', $id);
        $this->db->order_by('add_ke', 'ASC');
        return $this->db->get()->result();
    }

    // Kontrak Konsultan
    public function getDokumenKonsultan($id, $idKontrakKonsultan)
    {
        $sql = $this->db->query("select * from tahapan_addendum_konsultan where tahapan_add='" . $id . "' and id_kontrak_konsultan='" . $idKontrakKonsultan . "' order by create_date desc");
        return $sql->result();
    }

    public function getDokumenDasarKontrak($id)
    {
        $sql = "SELECT dm.id_dok_master, dm.nama_dok, dm.jenis_dok, dm.aktif, ddk.id_detail_dok, ddk.id_kontrak_konstruksi, ddk.nomor_dok, ddk.tanggal_dok, ddk.dok_file, ddk.pic, ddk.kantor, ddk.no_rak, ddk.no_box 
        FROM " . $this->_DOKUMEN_MASTER . " AS dm 
        LEFT JOIN " . $this->_DETAIL_DOK_KONSTRUKSI . " AS ddk ON ddk.id_dok_master = dm.id_dok_master
        AND ddk.id_kontrak_konstruksi =" . $id . "
        WHERE dm.id_dok_master IN (52,53,3,72,73,1,74) 
        ORDER BY dm.id_dok_master ASC";

        $sql = $this->db->query($sql);
        return $sql->result();
    }

    public function getDokumenDasarPekerjaan($id)
    {
        $sql = "SELECT dm.id_dok_master, dm.nama_dok, ddk.nomor_dok, ddk.tanggal_dok, ddk.dok_file, ddk.kantor, ddk.no_rak, ddk.no_box, ddk.pic
        FROM " . $this->_DOKUMEN_MASTER . " AS dm 
        LEFT JOIN " . $this->_DETAIL_DOK_KONSTRUKSI . " AS ddk ON ddk.id_dok_master = dm.id_dok_master 
        AND ddk.id_kontrak_konstruksi = " . $id . "
        WHERE dm.id_dok_master IN (10,11,12,13,14,15,75)
        ORDER BY dm.id_dok_master ASC";

        $sql = $this->db->query($sql);
        return $sql->result();
    }

    public function getDokumenLain($id_kontrak_konstruksi)
    {
        $this->load->model('Datatables_model', 'dt');

        $this->dt->set_config([
            'table'         => $this->_DETAIL_DOK_KONSTRUKSI, // tanpa alias
            'select'        => '*',
            'column_order'  => ['id_dok_detail', 'keterangan', 'nomor_dok', 'tanggal_dok', 'kantor', 'pic', 'dok_file'],
            'column_search' => ['keterangan', 'nomor_dok', 'kantor', 'pic'],
            'order'         => ['tanggal_dok' => 'DESC'],  // urut default terbaru dulu
            'where'         => [
                'id_kontrak_konstruksi' => $id_kontrak_konstruksi,
                'id_dok_master'         => 100
            ]
        ]);

        return [
            'data' => $this->dt->_get_datatables(),
            'count_filtered' => $this->dt->_count_filtered(),
            'count_all' => $this->dt->_count_all()
        ];
    }
}
