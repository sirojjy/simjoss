<?php
if (!defined('BASEPATH'))

    exit('No direct script access allowed');


class M_progres extends CI_Model
{
    private $_PROGRES_NILAI = 'progres_nilai';
    private $_SEKSI = 'seksi';
    private $_DANA_TALANGAN = 'dana_talangan';
    private $_PROGRES_LAHAN = 'progres_lahan';
    private $_PROGRES_KONSTRUKSI = 'progres_konstruksi';
    private $_PROGRES_RTA = 'progres_rta';
    private $_PENYERAPAN_DT = 'penyerapan_dt';
    private $_PENGEMBALIAN_LMAN = 'pengembalian_lman';
    private $_FASILITAS_DTT = 'fasilitas_dtt';

    public function get_progres_lahan()
    {
        $this->load->model('Datatables_model', 'dt');

        $this->dt->set_config([
            'table'             => $this->_PROGRES_LAHAN . ' pl',
            'select'            => 'pl.*, s.seksi as seksi_progres',
            'column_order'      => ['pl.id_progres_lahan', 'pl.tgl_progres', 's.seksi', 'pl.kebutuhan_bidang', 'pl.rencana', 'pl.realisasi'],
            'column_search'     => ['pl.tgl_progres', 'pl.kebutuhan_bidang', 'pl.rencana', 'pl.realisasi', 's.seksi'], // atau 'seksi_progres' jika menggunakan alias
            'numeric_columns'   => ['pl.tgl_progres', 'pl.kebutuhan_bidang', 'pl.rencana', 'pl.realisasi'],
            'order'             => ['tgl_progres' => 'DESC'],
            'joins'             => [
                [
                    'table' => $this->_SEKSI . ' s',
                    'on'    => 's.id_seksi = pl.id_seksi',
                    'type'  => 'LEFT'
                ]
            ]
        ]);

        return [
            'data' => $this->dt->_get_datatables(),
            'count_filtered' => $this->dt->_count_filtered(),
            'count_all' => $this->dt->_count_all()
        ];
    }

    public function add_progresLahan($data)
    {
        $this->db->insert($this->_PROGRES_LAHAN, $data);
    }

    public function update_progresLahan($id, $data)
    {
        $this->db->where('id_progres_lahan', $id);
        $this->db->update($this->_PROGRES_LAHAN, $data);
    }

    public function add_progresFisik($data)
    {
        $this->db->insert($this->_PROGRES_KONSTRUKSI, $data);
    }

    public function update_progresFisik($id, $data)
    {
        $this->db->where('id_progres_konstruksi', $id);
        $this->db->update($this->_PROGRES_KONSTRUKSI, $data);
    }

    public function get_progres_fisik()
    {
        // $query = $this->db->query("select pl.*, s.seksi as seksi_progres from progres_konstruksi as pl left join seksi as s on pl.seksi=s.id_seksi order by tgl_progres desc");
        // return $query->result();

        $this->load->model('Datatables_model', 'dt');

        $this->dt->set_config([
            'table'             => $this->_PROGRES_KONSTRUKSI . ' pk',
            'select'            => 'pk.*, s.seksi as seksi_progres',
            'column_order'      => ['pk.id_progres_konstruksi', 'pk.tgl_progres', 's.seksi', 'pk.rencana', 'pk.realisasi'],
            'column_search'     => ['pk.tgl_progres', 'pk.rencana', 'pk.realisasi', 's.seksi'], // atau 'seksi_progres' jika menggunakan alias
            'numeric_columns'   => ['pk.tgl_progres', 'pk.rencana', 'pk.realisasi'],
            'order'             => ['tgl_progres' => 'DESC'],
            'joins'             => [
                [
                    'table' => $this->_SEKSI . ' s',
                    'on'    => 's.id_seksi = pk.seksi',
                    'type'  => 'LEFT'
                ]
            ]
        ]);

        return [
            'data' => $this->dt->_get_datatables(),
            'count_filtered' => $this->dt->_count_filtered(),
            'count_all' => $this->dt->_count_all()
        ];
    }

    public function get_progres_rta()
    {
        // $query = $this->db->query("select pr.*, s.seksi as seksi_progres from progres_rta as pr left join seksi as s on pr.seksi=s.id_seksi order by tgl_progres desc");
        // return $query->result();

        $this->load->model('Datatables_model', 'dt');

        $this->dt->set_config([
            'table'             => $this->_PROGRES_RTA . ' pl',
            'select'            => 'pl.*, s.seksi as seksi_progres',
            'column_order'      => ['pl.id_progres_rta', 'pl.tgl_progres', 's.seksi', 'pl.rencana', 'pl.realisasi'],
            'column_search'     => ['pl.tgl_progres', 'pl.rencana', 'pl.realisasi', 's.seksi'], // atau 'seksi_progres' jika menggunakan alias
            'numeric_columns'   => ['pl.tgl_progres', 'pl.rencana', 'pl.realisasi'],
            'order'             => ['tgl_progres' => 'DESC'],
            'joins'             => [
                [
                    'table' => $this->_SEKSI . ' s',
                    'on'    => 's.id_seksi = pl.seksi',
                    'type'  => 'LEFT'
                ]
            ]
        ]);

        return [
            'data' => $this->dt->_get_datatables(),
            'count_filtered' => $this->dt->_count_filtered(),
            'count_all' => $this->dt->_count_all()
        ];
    }

    public function add_progresRTA($data)
    {
        $this->db->insert($this->_PROGRES_RTA, $data);
    }

    public function update_progresRTA($id, $data)
    {
        $this->db->where('id_progres_rta', $id);
        $this->db->update($this->_PROGRES_RTA, $data);
    }

    public function get_progres_nilai()
    {
        $this->load->model('Datatables_model', 'dt');

        $this->dt->set_config([
            'table'             => $this->_PROGRES_NILAI . ' pl',
            'select'            => 'pl.*, s.seksi as seksi_progres',
            'column_order'      => ['pl.id_progres_nilai', 'pl.tgl_progres', 's.seksi', 'pl.kontrak_ppn', 'pl.akrual_progres', 'pl.deviasi_rupiah_akrual', 'pl.telah_dibayar', 'pl.belum_terbayar'],
            'column_search'     => ['pl.tgl_progres', 's.seksi', 'pl.kontrak_ppn', 'pl.akrual_progres', 'pl.deviasi_rupiah_akrual', 'pl.telah_dibayar', 'pl.belum_terbayar'], // atau 'seksi_progres' jika menggunakan alias
            'numeric_columns'   => ['pl.tgl_progres', 'pl.kontrak_ppn', 'pl.akrual_progres', 'pl.deviasi_rupiah_akrual', 'pl.telah_dibayar', 'pl.belum_terbayar'],
            'order'             => ['tgl_progres' => 'DESC'],
            'joins'             => [
                [
                    'table' => $this->_SEKSI . ' s',
                    'on'    => 's.id_seksi = pl.seksi',
                    'type'  => 'LEFT'
                ]
            ]
        ]);

        return [
            'data' => $this->dt->_get_datatables(),
            'count_filtered' => $this->dt->_count_filtered(),
            'count_all' => $this->dt->_count_all()
        ];
    }

    public function add_progresNilai($data)
    {
        $this->db->insert($this->_PROGRES_NILAI, $data);
    }

    public function get_seksi()
    {
        $query = $this->db->query("select * from " . $this->_SEKSI . " order by seksi asc");
        return $query->result();
    }

    public function get_dtt()
    {
        $query = $this->db->query("select * from dtt order by tanggal desc");
        return $query->result();
    }

    public function get_dana_talangan()
    {
        $query = $this->db->query("select * from " . $this->_DANA_TALANGAN . " order by tanggal desc");
        return $query->result();
    }

    public function getAlokasiDTT()
    {
        $this->db->select('ad_pl, ad_dtt, tanggal');
        $this->db->from('dana_talangan');
        $this->db->order_by('tanggal', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getFasilitasDTT()
    {
        $this->db->select('penarikan_kredit, sisa_plafon, tanggal');
        $this->db->from('fasilitas_dtt');
        $this->db->order_by('tanggal', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function alokasi_dtt()
    {
        $this->load->model('Datatables_model', 'dt');

        $this->dt->set_config([
            'table'             => $this->_DANA_TALANGAN,
            'select'            => 'id_dtt,tanggal,periode,ad_kumulatif,ad_periodik,ad_pl,ad_dtt,persetujuan_dtt,jenis,dok_file',
            'column_order'      => ['id_dtt', 'tanggal', 'periode', 'ad_kumulatif', 'ad_periodik', 'ad_pl', 'ad_dtt', 'persetujuan_dtt'],
            'column_search'     => ['tanggal', 'periode', 'ad_kumulatif', 'ad_periodik', 'ad_pl', 'ad_dtt', 'persetujuan_dtt'],
            'numeric_columns'   => ['tanggal', 'periode', 'ad_kumulatif', 'ad_periodik', 'ad_pl', 'ad_dtt', 'persetujuan_dtt'],
            'order'             => ['tanggal' => 'DESC'],
        ]);

        return [
            'data' => $this->dt->_get_datatables(),
            'count_filtered' => $this->dt->_count_filtered(),
            'count_all' => $this->dt->_count_all()
        ];
    }

    public function getPenyerapanDtt()
    {
        $this->load->model('Datatables_model', 'dt');

        $this->dt->set_config([
            'table'             => $this->_PENYERAPAN_DT,
            'select'            => 'id_penyerapan,tanggal,periode,realisasi_internal_pl,realisasi_internal_dtt,realisasi_tanah,realisasi_pl,realisasi_dtt,carry_over,jenis,dok_file',
            'column_order'      => ['id_penyerapan', 'tanggal', 'periode', 'realisasi_internal_pl', 'realisasi_internal_dtt', 'realisasi_tanah', 'realisasi_pl', 'realisasi_dtt', 'carry_over'],
            'column_search'     => ['tanggal', 'periode', 'realisasi_internal_pl', 'realisasi_internal_dtt', 'realisasi_tanah', 'realisasi_pl', 'realisasi_dtt', 'carry_over'],
            'numeric_columns'   => ['tanggal', 'periode', 'realisasi_internal_pl', 'realisasi_internal_dtt', 'realisasi_tanah', 'realisasi_pl', 'realisasi_dtt', 'carry_over'],
            'order'             => ['tanggal' => 'DESC'],
        ]);

        return [
            'data' => $this->dt->_get_datatables(),
            'count_filtered' => $this->dt->_count_filtered(),
            'count_all' => $this->dt->_count_all()
        ];
    }

    public function getPenyerapanLMAN()
    {
        $this->load->model('Datatables_model', 'dt');

        $this->dt->set_config([
            'table'             => $this->_PENGEMBALIAN_LMAN,
            'select'            => 'id_pengembalian_lman,tanggal,periode,rekon_dtt,rekon_cof,pengembalian_dtt,pengembalian_cof,penerimaan_kembali_dtt,penerimaan_kembali_cof,jenis,dok_file',
            'column_order'      => ['id_pengembalian_lman', 'tanggal', 'periode', 'rekon_dtt', 'rekon_cof', 'pengembalian_dtt', 'pengembalian_cof', 'penerimaan_kembali_dtt', 'penerimaan_kembali_cof'],
            'column_search'     => ['tanggal', 'periode', 'rekon_dtt', 'rekon_cof', 'pengembalian_dtt', 'pengembalian_cof', 'penerimaan_kembali_dtt', 'penerimaan_kembali_cof'],
            'numeric_columns'   => ['tanggal', 'periode', 'rekon_dtt', 'rekon_cof', 'pengembalian_dtt', 'pengembalian_cof', 'penerimaan_kembali_dtt', 'penerimaan_kembali_cof'],
            'order'             => ['tanggal' => 'DESC'],
        ]);

        return [
            'data' => $this->dt->_get_datatables(),
            'count_filtered' => $this->dt->_count_filtered(),
            'count_all' => $this->dt->_count_all()
        ];
    }

    public function fasilitasDTT()
    {
        $this->load->model('Datatables_model', 'dt');

        $this->dt->set_config([
            'table'             => $this->_FASILITAS_DTT,
            'select'            => 'id_fasilitas_dtt,tanggal,periode,plafon_kredit,penarikan_kredit,pengembalian_hutang,sisa_plafon,jenis,dok_file',
            'column_order'      => ['id_fasilitas_dtt', 'tanggal', 'periode', 'plafon_kredit', 'penarikan_kredit', 'pengembalian_hutang', 'sisa_plafon'],
            'column_search'     => ['tanggal', 'periode', 'plafon_kredit', 'penarikan_kredit', 'pengembalian_hutang', 'sisa_plafon'],
            'numeric_columns'   => ['tanggal', 'periode', 'plafon_kredit', 'penarikan_kredit', 'pengembalian_hutang', 'sisa_plafon'],
            'order'             => ['tanggal' => 'DESC'],
        ]);

        return [
            'data' => $this->dt->_get_datatables(),
            'count_filtered' => $this->dt->_count_filtered(),
            'count_all' => $this->dt->_count_all()
        ];
    }
}
