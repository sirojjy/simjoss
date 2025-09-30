<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class M_Keuangan extends CI_Model
{
    private $_KREDIT_INVESTASI = 'kredit_investasi';
    private $_EKUITI = 'equity';

    public function getKreditInvestasi()
    {
        $this->load->model('Datatables_model', 'dt');

        $this->dt->set_config([
            'table'             => $this->_KREDIT_INVESTASI,
            'select'            => 'id_kredit,tanggal,ki_pokok_penarikan,ki_idc_penarikan,dok_file',
            'column_order'      => ['id_kredit', 'tanggal', null, 'ki_pokok_penarikan', null, null, 'ki_idc_penarikan'],
            'column_search'     => ['tanggal', 'ki_pokok_penarikan', 'ki_idc_penarikan'],
            'numeric_columns'   => ['tanggal', 'ki_pokok_penarikan', 'ki_idc_penarikan'],
            'order'             => ['tanggal' => 'DESC'],
        ]);

        return [
            'data' => $this->dt->_get_datatables(),
            'count_filtered' => $this->dt->_count_filtered(),
            'count_all' => $this->dt->_count_all()
        ];
    }

    public function getEkuiti()
    {
        $this->load->model('Datatables_model', 'dt');

        $this->dt->set_config([
            'table'             => $this->_EKUITI,
            'select'            => 'id_equity,tanggal,terpakai_pmn,terpakai_non,dok_file',
            'column_order'      => ['id_equity', 'tanggal', null, null, 'terpakai_pmn', 'terpakai_non'],
            'column_search'     => ['tanggal', 'terpakai_pmn', 'terpakai_non'],
            'numeric_columns'   => ['tanggal', 'terpakai_pmn', 'terpakai_non'],
            'order'             => ['tanggal' => 'DESC'],
        ]);

        return [
            'data' => $this->dt->_get_datatables(),
            'count_filtered' => $this->dt->_count_filtered(),
            'count_all' => $this->dt->_count_all()
        ];
    }
}
