<?php
if (!defined('BASEPATH'))

    exit('No direct script access allowed');


class M_audit extends CI_Model
{
    private $_AUDIT = 'audit';

    public function __construct()
    {
        parent::__construct();
    }

    public function getAudit($id)
    {
        $this->load->model('Datatables_model', 'dt');

        $this->dt->set_config([
            'table'             => $this->_AUDIT,
            'select'            => 'id_audit,uraian_temuan,tanggal,kategori,iso,klausul,tindak_lanjut,status,file',
            'column_order'      => ['id_audit', 'uraian_temuan', 'tanggal', 'kategori', 'iso', 'klausul', 'tindak_lanjut', 'status'],
            'column_search'     => ['uraian_temuan', 'tanggal', 'kategori', 'iso', 'klausul', 'tindak_lanjut', 'status'],
            'numeric_columns'   => ['tanggal', 'kategori', 'iso', 'status'],
            'order'             => ['id_audit' => 'DESC'],
            'where'             => ['jenis_audit' => $id]
        ]);

        return [
            'data' => $this->dt->_get_datatables(),
            'count_filtered' => $this->dt->_count_filtered(),
            'count_all' => $this->dt->_count_all()
        ];
    }

    public function get_audit($id)
    {
        $sql = $this->db->query('select * from audit where jenis_audit=' . $id . ' order by id_audit ASC');
        return $sql->result();
    }

    public function get_audit_id($id)
    {
        $sql = $this->db->query('select * from audit where id_audit=' . $id);
        return $sql->row_array();
    }
}
