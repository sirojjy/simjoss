<?php
if (!defined('BASEPATH'))

    exit('No direct script access allowed');


class M_manajemen extends CI_Model
{
    private $_KPI = 'tb_monitoring_kpi';
    private $_RESIKO = 'tb_manajemen_resiko';
    private $_SUB_RESIKO = 'tb_sub_manajemen_resiko';
    private $_MONITORING_RKAP = 'monitoring_rkap';

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

    public function get_all($all)
    {

        $query = $this->db->query("select * from users");
        return $query->result();
    }

    public function get_manajemen_resiko($triwulan, $tahun)
    {
        $sql = $this->db->query("select * from " . $this->_RESIKO . " where triwulan=" . $triwulan . " and EXTRACT('Year' FROM tanggal)=" . $tahun . " ORDER BY indikator ASC");
        return $sql->result();
    }

    public function get_sub_manajemen_resiko($id_manajemen_resiko)
    {
        $sql = $this->db->query("select * from " . $this->_SUB_RESIKO . " where id_manajemen_resiko=" . $id_manajemen_resiko . " ORDER BY id_sub_indikator ASC");
        return $sql->result();
    }
    public function get_resiko()
    {
        $sql = $this->db->query('select mr.*, ir.indikator as nama_indikator from manajemen_resiko as mr join indikator_resiko as ir on mr.indikator=ir.id_indikator order by mr.tanggal ASC');
        return $sql->result();
    }

    public function get_resiko_by_id($id)
    {
        $sql = $this->db->query('select * from ' . $this->_RESIKO . ' where id_manajemen_resiko=' . $id);
        return $sql->result();
    }

    public function get_indikator_resiko()
    {

        $sql = $this->db->query('select * from indikator_resiko');
        return $sql->result();
    }

    public function get_indikator_sub2($max_year, $periode)
    {

        $sql = $this->db->query('select sr.*,si.sub_indikator from submanajemen_resiko as sr left join sub_indikator as si on sr.indikator=si.id_sub_indikator order by sr.tanggal ASC');
        return $sql->result();
    }

    public function get_indikator_sub($get_indikator_sub)
    {
        $sql = $this->db->query('select sr.*,si.sub_indikator from submanajemen_resiko as sr 
                                left join sub_indikator as si on sr.indikator=si.id_sub_indikator 
                                left join manajemen_resiko as mr on sr.id_manajemen_resiko=mr.id_manajemen_resiko 
                                where sr.id_manajemen_resiko=' . $get_indikator_sub . '
                                order by sr.tanggal ASC');
        return $sql->result();
    }


    public function get_kepatuhan($id)
    {
        $sql = $this->db->query('select * from kewajiban_kepatuhan where jenis_aspek=' . $id . ' order by id_kewajiban_kepatuhan asc');
        return $sql->result();
    }

    // public function get_opex()
    // {
    //     $sql = $this->db->query("select * from monitoring_rkap where jenis='Opex' order by id_monitoring_rkap asc");
    //     return $sql->result();
    // }
    public function get_opex($jenis)
    {
        $this->load->model('Datatables_model', 'dt');

        $this->dt->set_config([
            'table'             => $this->_MONITORING_RKAP,
            'select'            => '*',
            'column_order'      => [null, 'keterangan', 'tw', 'tahun', 'rencana', 'realisasi', 'deviasi', null],
            'column_search'     => ['keterangan', 'tw', 'tahun'],
            'numeric_columns'   => ['tahun', 'tw'],
            'order'             => ['id_monitoring_rkap' => 'DESC'],
            'where'             => ['jenis' => $jenis]
        ]);

        return [
            'data' => $this->dt->_get_datatables(),
            'count_filtered' => $this->dt->_count_filtered(),
            'count_all' => $this->dt->_count_all()
        ];
    }

    public function get_capex()
    {
        $sql = $this->db->query("select * from monitoring_rkap where jenis='Capex' order by id_monitoring_rkap asc");
        return $sql->result();
    }

    public function get_data_rkap($id)
    {
        $sql = $this->db->query("select * from monitoring_rkap where id_monitoring_rkap=" . $id);
        return $sql->row_array();
    }

    public function get_kepatuhan_byid($id)
    {
        $sql = $this->db->query("select * from kewajiban_kepatuhan where id_kewajiban_kepatuhan=" . $id);
        return $sql->row_array();
    }

    // KPI
    var $column_order = ['id', 'nama', 'satuan', 'polaritas', 'bobot', 'batas_nilai', 'periode', ' created_at']; // untuk sorting
    var $column_search = ['nama', 'satuan', 'periode', 'tahun']; // untuk pencarian
    var $order = ['created_at' => 'asc']; // default order

    // private function _get_datatables_query($table)
    // {
    //     $this->db->from($table);

    //     $i = 0;
    //     foreach ($this->column_search as $item) {
    //         if ($_GET['search']['value']) {
    //             $search = $this->db->escape_str($_GET['search']['value']);
    //             $search_expr = "($item LIKE '%$search%')";
    //             if ($i === 0) {
    //                 $this->db->where("($search_expr)");
    //             } else {
    //                 $this->db->or_where("($search_expr)");
    //             }
    //         }
    //         $i++;
    //     }

    //     if (isset($_GET['order'])) {
    //         $this->db->order_by(
    //             $this->column_order[$_GET['order']['0']['column']],
    //             $_GET['order']['0']['dir']
    //         );
    //     } else if ($this->order) {
    //         $this->db->order_by(key($this->order), $this->order[key($this->order)]);
    //     }
    // }
    private function _get_datatables_query($table, $tahun_default = null)
    {
        $this->db->from($table);

        // 🔎 Cek apakah user sedang mencari tahun tertentu
        $search_value = $_GET['search']['value'] ?? '';
        $search_value = trim($this->db->escape_str($search_value));

        // Jika user tidak mencari dan ada $tahun_default, maka pakai itu
        if ($tahun_default !== null && $search_value === '') {
            $this->db->where('tahun', $tahun_default);
        }

        // 🔁 Logika pencarian (bisa teks atau angka termasuk tahun)
        $i = 0;
        foreach ($this->column_search as $item) {
            if ($search_value) {
                $search_expr = "($item::text ILIKE '%$search_value%')";
                if ($i === 0) {
                    $this->db->where("($search_expr)");
                } else {
                    $this->db->or_where("($search_expr)");
                }
            }
            $i++;
        }

        // 🔃 Urutan
        if (isset($_GET['order'])) {
            $this->db->order_by(
                $this->column_order[$_GET['order']['0']['column']],
                $_GET['order']['0']['dir']
            );
        } else if ($this->order) {
            $this->db->order_by(key($this->order), $this->order[key($this->order)]);
        }
    }


    public function insert_kpi($data)
    {
        try {
            $this->db->insert($this->_KPI, $data);
            return ['status' => true];
        } catch (Exception $e) {
            return ['status' => false, 'error' => $e->getMessage()];
        }
    }

    public function update_kpi($id, $data)
    {
        try {
            $this->db->where('id', $id);
            $this->db->update($this->_KPI, $data);
            return ['status' => true];
        } catch (Exception $e) {
            return ['status' => false, 'error' => $e->getMessage()];
        }
    }

    public function delete_kpi($id)
    {
        try {
            $this->db->where('id', $id);
            $this->db->delete($this->_KPI);
            return ['success' => true];
        } catch (Exception $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    function _count_filtered()
    {
        $this->_get_datatables_query($this->_KPI);
        return $this->db->get()->num_rows();
    }

    function _count_all($table)
    {
        return $this->db->count_all($table);
    }

    public function get_kpi($tahun_default = null)
    {
        $this->_get_datatables_query($this->_KPI, $tahun_default);
        if ($_GET['length'] != -1)
            $this->db->limit($_GET['length'], $_GET['start']);
        return $this->db->get()->result();
    }

    function get_manajemen_resiko_dashboard()
    {
        $sql = "SELECT * FROM tb_manajemen_resiko
        WHERE (triwulan, EXTRACT(YEAR FROM tanggal)) = (
            SELECT triwulan, EXTRACT(YEAR FROM tanggal)
            FROM tb_manajemen_resiko
            ORDER BY EXTRACT(YEAR FROM tanggal) DESC, triwulan DESC
            LIMIT 1
        );";
        return $this->db->query($sql)->result();
    }
}
