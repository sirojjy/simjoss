<?php
if (!defined('BASEPATH'))

    exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class M_dokumen extends CI_Model
{

    private $_KRONOLOGIS = 'tb_kronologis';
    private $_KORPORASI = 'korporasi';
    private $_PEMBIAYAAN = 'pembiayaan';
    private $_DOKUMEN_LAIN = 'dokumen_lain';
    private $_DOKUMEN = 'dokumen';

    public function __construct()
    {
        parent::__construct();
    }

    public function getKorporasi()
    {
        $this->load->model('Datatables_model', 'dt');

        $this->dt->set_config([
            'table'             => $this->_KORPORASI,
            'select'            => 'id,jenis_dokumen,no_akta,tanggal_akta,perihal,keterangan,file',
            'column_order'      => ['id', 'jenis_dokumen', 'no_akta', 'tanggal_akta'],
            'column_search'     => ['jenis_dokumen', 'no_akta', 'tanggal_akta', 'perihal', 'keterangan'],
            'numeric_columns'   => ['no_akta', 'tanggal_akta'],
            'order'             => ['tanggal_akta' => 'DESC'],
        ]);

        return [
            'data' => $this->dt->_get_datatables(),
            'count_filtered' => $this->dt->_count_filtered(),
            'count_all' => $this->dt->_count_all()
        ];
    }

    public function getPembiayaan()
    {
        $this->load->model('Datatables_model', 'dt');

        $this->dt->set_config([
            'table'             => $this->_PEMBIAYAAN,
            'select'            => 'id,jenis_dokumen,no_akta,tanggal_akta,perihal,file',
            'column_order'      => ['id', 'jenis_dokumen', 'no_akta', 'tanggal_akta'],
            'column_search'     => ['jenis_dokumen', 'no_akta', 'tanggal_akta', 'perihal'],
            'numeric_columns'   => ['no_akta', 'tanggal_akta'],
            'order'             => ['tanggal_akta' => 'DESC'],
        ]);

        return [
            'data' => $this->dt->_get_datatables(),
            'count_filtered' => $this->dt->_count_filtered(),
            'count_all' => $this->dt->_count_all()
        ];
    }

    public function getDokumenLain($jenis = null)
    {

        // $sql = $this->db->query("SELECT * FROM dokumen WHERE jenis IN ( 'rkap', 'risalah', 'dok_lain') ORDER BY create_date DESC");
        // return $sql->result();

        $this->load->model('Datatables_model', 'dt');

        $this->dt->set_config([
            'table'             => $this->_DOKUMEN,
            'select'            => 'id_dokumen,nama,nomor,nomor_revisi,tanggal ,dok_file,kantor,divisi,iso_9001,iso_14001,iso_37001,iso_45001',
            'column_order'      => ['id_dokumen', 'nama', 'nomor', 'tanggal', null, 'kantor'],
            'column_search'     => ['nama', 'nomor', 'nomor_revisi', 'tanggal', 'kantor', 'divisi'],
            'numeric_columns'   => ['nomor_revisi', 'tanggal'],
            'order'             => ['tanggal' => 'DESC'],
            'where_in'          => [
                'jenis' => $jenis
            ]
        ]);

        return [
            'data' => $this->dt->_get_datatables(),
            'count_filtered' => $this->dt->_count_filtered(),
            'count_all' => $this->dt->_count_all()
        ];
    }

    public function get_dokumenKorporasiById($id)
    {
        $sql = $this->db->query("SELECT * FROM " . $this->_KORPORASI . " WHERE id = '$id'");
        return $sql->row();
    }

    public function get_dokumenPembiayaanById($id)
    {
        $sql = $this->db->query("SELECT * FROM " . $this->_PEMBIAYAAN . " WHERE id = '$id'");
        return $sql->row();
    }

    public function get_all($all)
    {
        $query = $this->db->query("select * from users");
        return $query->result();
    }

    public function get_akta()
    {
        $sql = $this->db->query("select * from dokumen where jenis='akta' order by tanggal DESC");
        return $sql->result();
    }

    public function get_dokLama()
    {
        $sql = $this->db->query("select * from dokumen where jenis='dok_lama' order by tanggal DESC");
        return $sql->result();
    }

    public function get_legal()
    {
        $sql = $this->db->query("select * from dokumen where jenis='legal' order by tanggal DESC");
        return $sql->result();
    }

    public function get_risalah()
    {
        $sql = $this->db->query("select * from dokumen where jenis='risalah' order by tanggal DESC");
        return $sql->result();
    }

    public function get_rkap()
    {
        $sql = $this->db->query("select * from dokumen where jenis='rkap' order by tanggal DESC");
        return $sql->result();
    }

    public function get_mou()
    {
        $sql = $this->db->query("select * from dokumen where jenis='mou' order by tanggal DESC");
        return $sql->result();
    }

    public function get_sop()
    {
        $sql = $this->db->query("select * from dokumen where jenis='sop' order by tanggal DESC");
        return $sql->result();
    }

    public function get_dokPembiayaan()
    {
        $sql = $this->db->query("SELECT * FROM dokumen WHERE jenis IN ( 'akta', 'mou', 'laporan' ) ORDER BY create_date DESC");
        return $sql->result();
    }

    public function get_laporan()
    {
        $sql = $this->db->query("select * from dokumen where jenis='laporan' order by tanggal DESC");
        return $sql->result();
    }

    public function get_kronologis()
    {
        $sql = $this->db->query("select * from " . $this->_KRONOLOGIS . " order by id_tahapan ASC, tanggal ASC");
        return $sql->result();
    }

    function get_riwayat_buku_putih()
    {
        $this->load->model('Datatables_model', 'dt');

        $this->dt->set_config([
            'table'             => $this->_KRONOLOGIS,
            'select'            => '*',
            'column_order'      => ['id_kronologis', 'jenis_dokumen', 'nomor_dokumen', 'tanggal', 'pihak', null, null, null],
            'column_search'     => ['jenis_dokumen', 'nomor_dokumen', 'tanggal', "pihak"],
            'numeric_columns'   => ['tanggal'],
            'order'             => ['id_kronologis' => 'DESC'],
        ]);

        return [
            'data' => $this->dt->_get_datatables(),
            'count_filtered' => $this->dt->_count_filtered(),
            'count_all' => $this->dt->_count_all()
        ];
    }

    public function get_data_by_id($id)
    {

        $sql = $this->db->query('select * from dokumen where id_dokumen = ' . $id);
        return $sql->row();
    }

    public function get_kronologis_by_id($id)
    {
        $sql = $this->db->query("select * from " . $this->_KRONOLOGIS . " where id_kronologis = " . $id);
        return $sql->row();
    }

    public function get_kronologis1()
    {
        $sql = $this->db->query("select * from " . $this->_KRONOLOGIS . " where id_tahapan=1 and tanggal!='2018-03-16' order by tanggal ASC");
        return $sql->result();
    }

    public function get_kronologis2()
    {
        $sql = $this->db->query("select * from " . $this->_KRONOLOGIS . " where id_tahapan=2  order by tanggal ASC");
        return $sql->result();
    }

    public function get_kronologis31()
    {
        $sql = $this->db->query("select * from " . $this->_KRONOLOGIS . " where id_tahapan=6 order by tanggal ASC");
        return $sql->result();
    }

    public function get_kronologis32()
    {
        $sql = $this->db->query("select * from " . $this->_KRONOLOGIS . " where id_tahapan=3 and sub_tahapan='2' order by tanggal ASC");
        return $sql->result();
    }

    public function get_kronologis33()
    {
        $sql = $this->db->query("select * from " . $this->_KRONOLOGIS . " where id_tahapan=3 and sub_tahapan='3' order by tanggal ASC");
        return $sql->result();
    }

    public function get_kronologis41()
    {
        $sql = $this->db->query("select * from " . $this->_KRONOLOGIS . " where id_tahapan=4 and sub_tahapan='2' order by tanggal ASC");
        return $sql->result();
    }

    public function get_kronologis42()
    {
        $sql = $this->db->query("select * from " . $this->_KRONOLOGIS . " where id_tahapan=4 and sub_tahapan='3' order by tanggal ASC");
        return $sql->result();
    }

    public function get_kronologis43()
    {
        $sql = $this->db->query("select * from " . $this->_KRONOLOGIS . " where id_tahapan=4 and sub_tahapan='4' order by tanggal ASC");
        return $sql->result();
    }

    public function get_kronologis44()
    {
        $sql = $this->db->query("select * from " . $this->_KRONOLOGIS . " where id_tahapan=4 and sub_tahapan='9' order by tanggal ASC");
        return $sql->result();
    }

    public function get_kronologis45()
    {
        $sql = $this->db->query("select * from " . $this->_KRONOLOGIS . " where id_tahapan=4 and sub_tahapan='10' order by tanggal ASC");
        return $sql->result();
    }

    public function get_kronologis5()
    {
        $sql = $this->db->query("select * from " . $this->_KRONOLOGIS . " where id_tahapan=5 order by tanggal ASC");
        return $sql->result();
    }

    public function excelToDate($value)
    {
        if ($value != null) {
            if (@date('Y', strtotime($value)) == 1970) {
                $date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToTimestamp($value);
                return date('Y-m-d', $date);
            } else {
                return date('Y-m-d', strtotime($value));
            }
        } else {
            return null;
        }
    }

    public function import_excel($directory, $filename)
    {
        ini_set('memory_limit', '-1');
        $inputFileName = './file_uploads/' . $directory . '/' . $filename;
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $reader->setReadDataOnly(true);
        try {
            $objPHPExcel = $reader->load($inputFileName);
        } catch (Exception $e) {
            die('Error loading file :' . $e->getMessage());
        }

        $worksheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
        unset($worksheet[1]);

        $this->db->trans_start();
        $this->db->query('TRUNCATE TABLE ' . $this->_KRONOLOGIS);

        foreach ($worksheet as $i => $row) {
            $data = [
                'id_tahapan' => $row['B'],
                'sub_tahapan' => $row['C'],
                'jenis_dokumen' => $row['D'],
                'nomor_dokumen' => $row['E'],
                'tanggal' => $this->excelToDate($row['F']),
                'pihak' => $row['G'],
                'jumlah_halaman' => $row['H'],
                'file' => $row['I'],
                'created_at' => date('Y-m-d H:i:s'),
            ];
            $this->db->insert($this->_KRONOLOGIS, $data);
        }
        if ($this->db->trans_status() === FALSE) {
            $this->session->set_flashdata('error', 'Gagal Import Data');
            $this->db->trans_rollback();
        } else {
            $this->session->set_flashdata('success', 'Berhasil Import Data');
            $this->db->trans_commit();
        }

        return true;
    }

    public function update_file_kronologis($data, $eks_file)
    {
        $this->db->where('id_kronologis', $data['id_kronologis']);
        $this->db->update($this->_KRONOLOGIS, ['file' => $eks_file]);

        return true;
    }

    function getRiwayatBukuPutih()
    {
        $this->load->model('Datatables_model', 'dt');

        $this->dt->set_config([
            'table'             => 'tb_kronologis',
            'select'            => '*',
            'column_order'      => [null, "jenis_dokumen", "id_tahapan", "tanggal", "nomor_dokumen", "pihak", "file", null],
            'column_search'     => ['jenis_dokumen', 'nomor_dokumen', 'tahun', "pihak"],
            'numeric_columns'   => ['tahun', 'tw'],
            'order'             => ['id_kronologis' => 'DESC']
        ]);

        return [
            'data' => $this->dt->_get_datatables(),
            'count_filtered' => $this->dt->_count_filtered(),
            'count_all' => $this->dt->_count_all()
        ];
    }

    public function getSOP($jenis = null)
    {
        $this->load->model('Datatables_model', 'dt');

        $this->dt->set_config([
            'table'             => $this->_DOKUMEN,
            'select'            => 'id_dokumen,nama,nomor,nomor_revisi,tanggal ,dok_file,kantor,divisi,iso_9001,iso_14001,iso_37001,iso_45001',
            'column_order'      => [null, 'nama', 'nomor', 'nomor_revisi', 'tanggal', null, 'kantor', 'divisi'],
            'column_search'     => ['nama', 'nomor', 'nomor_revisi', 'tanggal', 'kantor', 'divisi'],
            'numeric_columns'   => ['nomor_revisi', 'tanggal'],
            'order'             => ['tanggal' => 'DESC'],
            'where'             => ['jenis' => $jenis]
        ]);

        return [
            'data' => $this->dt->_get_datatables(),
            'count_filtered' => $this->dt->_count_filtered(),
            'count_all' => $this->dt->_count_all()
        ];
    }
}
