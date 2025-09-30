<?php
if (!defined('BASEPATH'))

    exit('No direct script access allowed');

class M_monitoring_operasi extends CI_Model
{
    private $_VOLUME = 'tb_perbandingan_volume';
    private $_PENDAPATAN = 'tb_perbandingan_pendapatan';
    var $column_order = ['id', 'jenis', 'tanggal', 'nilai', 'created_at']; // untuk sorting
    var $column_search = ['jenis', 'tanggal']; // untuk pencarian
    var $order = ['created_at' => 'desc']; // default order
    public function __construct()
    {
        parent::__construct();
    }

    private function _get_datatables_query($table)
    {
        $this->db->from($table);

        $i = 0;
        foreach ($this->column_search as $item) {
            if ($_GET['search']['value']) {
                $search = $this->db->escape_str($_GET['search']['value']);

                if ($item == 'tanggal') {
                    $search_expr = "TO_CHAR(tanggal, 'Month YYYY') ILIKE '%$search%'";
                } else {
                    $search_expr = "$item ILIKE '%$search%'";
                }

                if ($i === 0) {
                    $this->db->where("($search_expr)");
                } else {
                    $this->db->or_where("($search_expr)");
                }
            }
            $i++;
        }

        if (isset($_GET['order'])) {
            $this->db->order_by(
                $this->column_order[$_GET['order']['0']['column']],
                $_GET['order']['0']['dir']
            );
        } else if ($this->order) {
            $this->db->order_by(key($this->order), $this->order[key($this->order)]);
        }
    }

    function get_volume()
    {
        $this->_get_datatables_query($this->_VOLUME);
        if ($_GET['length'] != -1)
            $this->db->limit($_GET['length'], $_GET['start']);
        return $this->db->get()->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query($this->_VOLUME);
        return $this->db->get()->num_rows();
    }

    function count_all($table)
    {
        return $this->db->count_all($table);
    }

    public function insert_volume($data)
    {
        try {
            $this->db->insert($this->_VOLUME, $data);
            return ['success' => true];
        } catch (Exception $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    public function update_volume($id, $data)
    {
        try {
            $this->db->where('id', $id);
            $this->db->update($this->_VOLUME, $data);
            return ['success' => true];
        } catch (Exception $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    public function delete_volume($id)
    {
        try {
            $this->db->where('id', $id);
            $this->db->delete($this->_VOLUME);
            return ['success' => true];
        } catch (Exception $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    public function is_exist_volume($jenis, $tanggal, $exclude_id = null)
    {
        $this->db->where('jenis', $jenis);
        $this->db->where('tanggal', $tanggal);
        if (!empty($exclude_id)) {
            $this->db->where('id !=', $exclude_id);
        }

        return $this->db->get($this->_VOLUME)->num_rows() > 0;
    }

    function get_pendapatan()
    {
        $this->_get_datatables_query($this->_PENDAPATAN);
        if ($_GET['length'] != -1)
            $this->db->limit($_GET['length'], $_GET['start']);
        return $this->db->get()->result();
    }

    public function insert_pendapatan($data)
    {
        try {
            $this->db->insert($this->_PENDAPATAN, $data);
            return ['success' => true];
        } catch (Exception $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    public function update_pendapatan($id, $data)
    {
        try {
            $this->db->where('id', $id);
            $this->db->update($this->_PENDAPATAN, $data);
            return ['success' => true];
        } catch (Exception $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    public function delete_pendapatan($id)
    {
        try {
            $this->db->where('id', $id);
            $this->db->delete($this->_PENDAPATAN);
            return ['success' => true];
        } catch (Exception $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    public function is_exist_pendapatan($jenis, $tanggal, $exclude_id = null)
    {
        $this->db->where('jenis', $jenis);
        $this->db->where('tanggal', $tanggal);
        if (!empty($exclude_id)) {
            $this->db->where('id !=', $exclude_id);
        }

        return $this->db->get($this->_PENDAPATAN)->num_rows() > 0;
    }
}
