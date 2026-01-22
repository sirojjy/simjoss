<?php
if (!defined('BASEPATH'))

  exit('No direct script access allowed');


class M_dashboard extends CI_Model
{

  private $_KONSULTAN = 'tb_kontrak_konsultan';
  private $_PERBANDINGAN_VOLUME = 'tb_perbandingan_volume';
  private $_PERBANDINGAN_PENDAPATAN = 'tb_perbandingan_pendapatan';

  public function __construct()
  {
    parent::__construct();
  }

  public function get_perbandingan_volume($year = null)
  {
    if ($year == null) {
      $year = date('Y');
    }
    $sql = "SELECT
                TO_CHAR(tanggal, 'Mon') AS bulan,
                MAX(CASE WHEN jenis = 'ppjt' THEN nilai END) AS ppjt,
                MAX(CASE WHEN jenis = 'rkap' THEN nilai END) AS rkap,
                MAX(CASE WHEN jenis = 'realisasi' THEN nilai END) AS realisasi,
                MAX(CASE WHEN jenis = 'prognosa' THEN nilai END) AS prognosa
            FROM tb_perbandingan_volume
            WHERE EXTRACT(YEAR FROM tanggal) = $year
            GROUP BY TO_CHAR(tanggal, 'Mon'), DATE_TRUNC('month', tanggal)
            ORDER BY DATE_TRUNC('month', tanggal)";

    $query = $this->db->query($sql);
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return [];
    }
  }

  public function get_perbandingan_pendapatan($year = null)
  {
    if ($year == null) {
      $year = date('Y');
    }
    $sql = "SELECT
                TO_CHAR(tanggal, 'Mon') AS bulan,
                MAX(CASE WHEN jenis = 'ppjt' THEN nilai END) AS ppjt,
                MAX(CASE WHEN jenis = 'rkap' THEN nilai END) AS rkap,
                MAX(CASE WHEN jenis = 'realisasi' THEN nilai END) AS realisasi,
                MAX(CASE WHEN jenis = 'prognosa' THEN nilai END) AS prognosa
            FROM tb_perbandingan_pendapatan
            WHERE EXTRACT(YEAR FROM tanggal) = $year
            GROUP BY TO_CHAR(tanggal, 'Mon'), DATE_TRUNC('month', tanggal)
            ORDER BY DATE_TRUNC('month', tanggal)";

    $query = $this->db->query($sql);
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return [];
    }
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

  public function k_kak()
  {
    $query = $this->db->select("count(distinct id_kontrak_konsultan) as jumlah from " .  $this->_KONSULTAN . " as kk where not exists (SELECT id_kontrak_konsultan from detail_dok_konsultan as dd where dd.id_kontrak_konsultan = kk.id_kontrak_konsultan and dd.id_dok_master=13)");
    return $query->get()->row()->jumlah;
  }
  public function k_pemenang_lelang()
  {
    $query = $this->db->select("count(distinct id_kontrak_konsultan) as jumlah from " .  $this->_KONSULTAN . " as kk where not exists (SELECT id_kontrak_konsultan from detail_dok_konsultan as dd where dd.id_kontrak_konsultan = kk.id_kontrak_konsultan and dd.id_dok_master=9)");
    return $query->get()->row()->jumlah;
  }
  public function k_dok_kons($id_dok)
  {
    $query = $this->db->select("count(distinct id_kontrak_konsultan) as jumlah from " .  $this->_KONSULTAN . " as kk where not exists (SELECT id_kontrak_konsultan from detail_dok_konsultan as dd where dd.id_kontrak_konsultan = kk.id_kontrak_konsultan and dd.id_dok_master=" . $id_dok . ") and jenis=1");
    return $query->get()->row()->jumlah;
  }
  public function k_dok_konsNonTol($id_dok)
  {
    $query = $this->db->select("count(distinct id_kontrak_konsultan) as jumlah from " .  $this->_KONSULTAN . " as kk where not exists (SELECT id_kontrak_konsultan from detail_dok_konsultan as dd where dd.id_kontrak_konsultan = kk.id_kontrak_konsultan and dd.id_dok_master=" . $id_dok . ") and jenis=2");
    return $query->get()->row()->jumlah;
  }
  public function k_dok_konstruksi($id_dok)
  {
    $query = $this->db->select("count(distinct id_kontrak_konstruksi) as jumlah from tb_kontrak_konstruksi as kk where not exists (SELECT id_kontrak_konstruksi from detail_dok_konstruksi as dd where dd.id_kontrak_konstruksi = kk.id_kontrak_konstruksi and dd.id_dok_master=" . $id_dok . ")");
    return $query->get()->row()->jumlah;
  }
  public function k_dok_proyek_konstruksi($id_dok)
  {
    $query = $this->db->select("count(distinct id_mc) as jumlah from mc as kk where not exists (SELECT id_mc from detail_dok_konstruksi as dd where dd.id_mc = kk.id_mc and dd.id_dok_master=" . $id_dok . ")");
    return $query->get()->row()->jumlah;
  }

  public function k_dokPembayaran_konsultan($id_dok)
  {
    $query = $this->db->select("count(distinct id_pembayaran) as jumlah from pembayaran as kk where not exists (SELECT id_pembayaran from detail_dok_konsultan as dd where dd.id_pembayaran = kk.id_pembayaran and dd.id_dok_master=" . $id_dok . ") and id_kontrak_konsultan is not null");
    return $query->get()->row()->jumlah;
  }
  public function k_dokPembayaran_konstruksi($id_dok)
  {
    $query = $this->db->select("count(distinct id_pembayaran) as jumlah from pembayaran as kk where not exists (SELECT id_pembayaran from detail_dok_konstruksi as dd where dd.id_pembayaran = kk.id_pembayaran and dd.id_dok_master=" . $id_dok . ") and id_kontrak_konstruksi is not null");
    return $query->get()->row()->jumlah;
  }

  public function nilai_kontrak($bulan, $year)
  {
    $query = $this->db->select("COALESCE(sum(nilai),0) as sum from pembayaran where extract(month from tanggal)=" . $bulan . " and extract (year from tanggal)=" . $year);
    return $query->get()->row()->sum;
  }
  public function nilai_lain($bulan, $year)
  {
    $query = $this->db->select("COALESCE(sum(nilai),0) as sum from pembayaran_lain where bulan=" . $bulan . " and extract (year from tanggal)=" . $year);
    return $query->get()->row()->sum;
  }

  public function get_data_kontrak($bulan)
  {
    $query = $this->db->query("select * from pembayaran where extract(month from tanggal)=" . $bulan);
    return $query->result();
  }
  public function get_data_lain($bulan)
  {
    $query = $this->db->query("select * from pembayaran_lain where bulan=" . $bulan);
    return $query->result();
  }

  public function get_data_kontrak_all()
  {
    $query = $this->db->query("select * from pembayaran order by tanggal DESC");
    return $query->result();
  }
  public function get_data_lain_all()
  {
    $query = $this->db->query("select * from pembayaran_lain order by tanggal DESC");
    return $query->result();
  }

  public function jml_dokKonstruksi()
  {
    $query = $this->db->select("count(id_detail_dok) as jumlah from detail_dok_konstruksi");
    return $query->get()->row()->jumlah;
  }
  public function jml_dokKonsultan()
  {
    $query = $this->db->select("count(id_detail_dok) as jumlah from detail_dok_konsultan");
    return $query->get()->row()->jumlah;
  }
  public function jml_dokNonTol()
  {
    $query = $this->db->select("count(id_detail_dok) as jumlah from detail_dok_nontol");
    return $query->get()->row()->jumlah;
  }
  public function jml_dokKontrakLain()
  {
    $query = $this->db->select("count(id_kontrak) as jumlah from kontrak_lainnya");
    return $query->get()->row()->jumlah;
  }
  public function jml_addKonstruksi()
  {
    $query = $this->db->select("count(id_addendum) as jumlah from addendum_konstruksi");
    return $query->get()->row()->jumlah;
  }
  public function jml_addKonsultan()
  {
    $query = $this->db->select("count(id_addendum) as jumlah from addendum_konsultan");
    return $query->get()->row()->jumlah;
  }
  public function jml_addKonsNonTol()
  {
    $query = $this->db->select("count(id_addendum) as jumlah from addendum_konsnontol");
    return $query->get()->row()->jumlah;
  }
  public function jml_dokumen()
  {
    $query = $this->db->select("count(id_dokumen) as jumlah from dokumen");
    return $query->get()->row()->jumlah;
  }
  public function jml_lapKonstruksi()
  {
    $query = $this->db->select("count(id_laporan) as jumlah from laporan_konstruksi");
    return $query->get()->row()->jumlah;
  }
  public function jml_lapKonsultan()
  {
    $query = $this->db->select("count(id_laporan) as jumlah from laporan_konsultan");
    return $query->get()->row()->jumlah;
  }
  public function jml_mc()
  {
    $query = $this->db->select("count(id_mc) as jumlah from mc");
    return $query->get()->row()->jumlah;
  }
  public function jml_pembayaranLain()
  {
    $query = $this->db->select("count(id_pembayaran_lain) as jumlah from pembayaran_lain");
    return $query->get()->row()->jumlah;
  }
  public function jml_ppjt()
  {
    $query = $this->db->select("count(id_ppjt) as jumlah from ppjt");
    return $query->get()->row()->jumlah;
  }
  public function jml_nonPmn()
  {
    $query = $this->db->select("count(id_nonpmn) as jumlah from non_pmn");
    return $query->get()->row()->jumlah;
  }

  public function jml_kepatuhanAda($id)
  {
    $query = $this->db->select("count(id_kewajiban_kepatuhan) as jumlah from kewajiban_kepatuhan where jenis_aspek=" . $id . " and status=1");
    return $query->get()->row()->jumlah;
  }
  public function jml_kepatuhanTidak($id)
  {
    $query = $this->db->select("count(id_kewajiban_kepatuhan) as jumlah from kewajiban_kepatuhan where jenis_aspek=" . $id . " and status=0");
    return $query->get()->row()->jumlah;
  }
  public function opex_rencana($tw)
  {
    $query = $this->db->select("COALESCE(sum(rencana),0) as sum from monitoring_rkap where jenis='Opex' and tw=" . $tw . " and tahun='2025'");
    return $query->get()->row()->sum;
  }
  public function opex_realisasi($tw)
  {
    $query = $this->db->select("COALESCE(sum(realisasi),0) as sum from monitoring_rkap where jenis='Opex' and tw=" . $tw . " and tahun='2025'");
    return $query->get()->row()->sum;
  }

  public function capex_rencana($tw)
  {
    $query = $this->db->select("COALESCE(sum(rencana),0) as sum from monitoring_rkap where jenis='Capex' and tw=" . $tw . " and tahun='2025'");
    return $query->get()->row()->sum;
  }
  public function capex_realisasi($tw)
  {
    $query = $this->db->select("COALESCE(sum(realisasi),0) as sum from monitoring_rkap where jenis='Capex' and tw=" . $tw . " and tahun='2025'");
    return $query->get()->row()->sum;
  }
  public function get_issue($id)
  {
    $sql = $this->db->query("select issue, rekomendasi from issue where status=1 and jenis_progres=" . $id . " order by id_issue desc limit 1");
    return $sql->row();
  }
}
