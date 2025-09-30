<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datatables_model extends CI_Model
{
    protected $table;
    protected $select;
    protected $column_order = [];
    protected $column_search = [];
    protected $numeric_columns = []; // kolom numeric untuk CAST
    protected $order = [];
    protected $joins = [];
    protected $where = [];
    protected $where_in = [];

    public function set_config($config = [])
    {
        $this->table            = $config['table'];
        $this->select           = $config['select'] ?? '*';
        $this->column_order     = $config['column_order'];
        $this->column_search    = $config['column_search'];
        $this->numeric_columns  = $config['numeric_columns'] ?? []; // << tambahan
        $this->order            = $config['order'];
        $this->joins            = $config['joins'] ?? [];
        $this->where            = $config['where'] ?? [];
        $this->where_in         = $config['where_in'] ?? [];
    }

    private function _get_query()
    {
        $this->db->select($this->select);
        $this->db->from($this->table);

        // JOIN
        if (!empty($this->joins)) {
            foreach ($this->joins as $join) {
                $this->db->join($join['table'], $join['on'], $join['type'] ?? 'left');
            }
        }

        // WHERE
        if (!empty($this->where)) {
            $this->db->where($this->where);
        }

        // WHERE IN
        if (!empty($this->where_in)) {
            foreach ($this->where_in as $field => $values) {
                $this->db->where_in($field, $values);
            }
        }

        // Search
        if (!empty($_POST['search']['value'])) {
            $search_value = trim($_POST['search']['value']);
            $this->db->group_start();

            foreach ($this->column_search as $idx => $item) {
                // Deteksi kolom numeric untuk CAST
                if (in_array($item, $this->numeric_columns)) {
                    $like = "CAST($item AS TEXT) ILIKE '%" . $this->db->escape_like_str($search_value) . "%'";
                    $this->db->or_where($like, null, false);
                } else {
                    $this->db->or_like($item, $search_value);
                }
            }

            $this->db->group_end();
        }

        // Order
        if (isset($_POST['order'])) {
            $colIdx = intval($_POST['order'][0]['column']); // ambil index kolom dari request
            $colDir = strtoupper($_POST['order'][0]['dir']); // ASC/DESC

            if (isset($this->column_order[$colIdx]) && $this->column_order[$colIdx] !== null) {
                $this->db->order_by($this->column_order[$colIdx], $colDir);
            }
        } else if (!empty($this->order)) {
            foreach ($this->order as $key => $val) {
                $this->db->order_by($key, $val);
            }
        }
    }

    public function _get_datatables()
    {
        $this->_get_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        return $this->db->get()->result();
    }

    public function _count_filtered()
    {
        $this->_get_query();
        return $this->db->count_all_results();
    }

    public function _count_all()
    {
        $this->db->from($this->table);

        if (!empty($this->joins)) {
            foreach ($this->joins as $join) {
                $this->db->join($join['table'], $join['on'], $join['type'] ?? 'left');
            }
        }

        if (!empty($this->where)) {
            $this->db->where($this->where);
        }

        if (!empty($this->where_in)) {
            foreach ($this->where_in as $field => $values) {
                $this->db->where_in($field, $values);
            }
        }

        return $this->db->count_all_results();
    }
}
