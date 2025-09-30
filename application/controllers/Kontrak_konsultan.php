<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontrak_konsultan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $cek = $this->session->userdata('username');

        if ($cek != '' || $cek != null) {
        } else {
            redirect('Login');
        }
        //$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
        $this->load->model(array('M_master', 'M_kontrak'));
    }

    public function getDokumenAddendum()
    {
        $this->load->model('M_kontrak', 'kontrak_model');
        $tahapan_usulan = $this->input->post('id');
        $idKontrakKonstruksi = $this->input->post('idKontrakKonsultan');
        $data = $this->kontrak_model->getDokumenKonsultan($tahapan_usulan, $idKontrakKonstruksi, 'usulan');
        $no = 1;
        foreach ($data as $row) {
            if ($row->lokasi_file == 1) {
                $lokasi = 'Pusat';
            } else if ($row->lokasi_file == 2) {
                $lokasi = 'Banyudono';
            } else if ($row->lokasi_file == 3) {
                $lokasi = 'Klaten';
            } else if ($row->lokasi_file == 4) {
                $lokasi = 'Prambanan';
            }
            echo "<tr>
                <td class='text-center'>{$no}.</td>
                <td>" . ($row->nama_dok == null ? '-' : $row->nama_dok) . "</td>
                <td>" . ($row->nomor_dok == null ? '-' : $row->nomor_dok) . "</td>
                <td>" . (isset($row->tanggal_dok) ? date('d-m-Y', strtotime($row->tanggal_dok)) : '-') . "</td>
                <td>{$lokasi}</td>
                <td>{$row->pic}</td>
                <td class='text-center'>
                <a target=\"_blank\" href=\"" . base_url("file_uploads/kontrak_konsultan/tahapan_kontrak_konsultan/" . $row->dok_file) .
                "\">
                <button class=\"btn btn-sm btn-primary\"><i class=\"fa fa-print\"></i></button>
                </a>
                </td>";

            if ($this->session->userdata('level_user') == 1) {
                echo "<td class='text-center'>
                    <a class=\"btn btn-success btn-sm\" title='Edit' href='#' data-toggle='modal' data-target='#editDokumenAddendum' data-id_tahapan_addendum_konsultan='$row->id_tahapan_addendum_konsultan' data-id_kontrak_konsultan='$row->id_kontrak_konsultan' data-nama_dok='$row->nama_dok' data-nomor_dok='$row->nomor_dok' data-tanggal_dok='$row->tanggal_dok' data-lokasi_file='$row->lokasi_file' data-pic='$row->pic' data-dok_file='$row->dok_file'><i class=\"fa fa-edit\"></i></a>

                    <a class=\"btn btn-danger btn-sm\" href=\"" . site_url('Kontrak_konsultan/hapus_dokumen_konsultan/' . $row->id_tahapan_addendum_konsultan . '/' . $row->id_kontrak_konsultan) . "\" onClick=\"javasciprt: return confirm('Yakin menghapus data ?')\"><i class=\"fa fa-trash\"></i></a>
                  </td>";
            }
            echo "</tr>";
            $no++;
        }
    }

    public function index()
    {
        $ses_data = array(
            'act_menu'   => 'konsultan',
            'title'      => 'Kontrak Konsultan',
            'breadcrumb' => 'konsultan',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'row' => $this->M_kontrak->get_kontrakKonsultan(),
            'jenis' => 1,
        );
        $this->template->load('template/admin_template', 'kontrak/v_konsultan.php', $data);
    }

    public function add_dokumen()
    {
        $ses_data = array(
            'act_menu'   => 'dokumen',
            'title'      => 'Dokumen',
            'breadcrumb' => 'dokumen',
        );
        $this->session->set_userdata($ses_data);
        $this->template->load('template/admin_template', 'dokumen/add_dokumen.php');
    }

    public function add_kontrak()
    {
        $ses_data = array(
            'act_menu'   => 'konsultan',
            'title'      => 'Kontrak Konsultan',
            'breadcrumb' => 'konsultan',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'action' => site_url('Kontrak_konsultan/act_kontrak'),
        );
        $this->template->load('template/admin_template', 'kontrak/add_konsultan.php', $data);
    }

    public function act_kontrak()
    {

        $data = array(
            'nama_kontrak' => $this->input->post('nama_kontrak'),
            'jenis_konsultan' => $this->input->post('konsultan'),
            'seksi' => $this->input->post('seksi'),
            'nomor_kontrak' => $this->input->post('nomor_kontrak'),
            'tanggal_mulai' => date('Y-m-d', strtotime($this->input->post('tanggal_awal'))),
            'tanggal_akhir' => date('Y-m-d', strtotime($this->input->post('tanggal_akhir'))),
            'pihak_pertama' => $this->input->post('pihak1'),
            'pihak_kedua' => $this->input->post('pihak2'),
            'lingkup' => $this->input->post('lingkup'),
            'nilai_kontrak' => str_replace('.', '', $this->input->post('nilai')),
            'nilai_add' => str_replace('.', '', $this->input->post('nilai')),
            'create_date' => date('Y-m-d h:i:s'),
            'jenis' => 1,
        );

        if ($this->db->insert('tb_kontrak_konsultan', $data)) {
            echo $this->session->set_flashdata('msg', 'success');
        } else {
            echo $this->session->set_flashdata('msg', 'error');
        }

        redirect('Kontrak_konsultan');
    }

    public function update_kontrak($id)
    {

        $ses_data = array(
            'act_menu' => 'konsultan',
            'title' => 'konsultan',
            'breadcumb' => 'konsultan'
        );

        $this->session->set_userdata($ses_data);

        $row2 = $this->M_kontrak->get_kontrakKonsultan_by_id($id);
        if ($row2) {
            $data = array(
                'action' => site_url('Kontrak_konsultan/act_update_kontrak'),
                'id_kontrak' => $row2->id_kontrak_konsultan,
                'nama_kontrak' => $row2->nama_kontrak,
                'nomor_kontrak' => $row2->nomor_kontrak,
                'seksi' => $row2->seksi,
                'tanggal_mulai' => $row2->tanggal_mulai,
                'tanggal_akhir' => $row2->tanggal_akhir,
                'pihak_pertama' => $row2->pihak_pertama,
                'pihak_kedua' => $row2->pihak_kedua,
                'lingkup' => $row2->lingkup,
                'nilai' => $row2->nilai_kontrak,
            );
        }

        $this->template->load('template/admin_template', 'kontrak/edit_konsultan', $data);
    }

    public function act_update_kontrak()
    {
        $id_kontrak = $this->input->post('id_kontrak');

        $config = array();
        $data = array(
            'nama_kontrak' => $this->input->post('nama_kontrak'),
            'seksi' => $this->input->post('seksi'),
            'nomor_kontrak' => $this->input->post('nomor_kontrak'),
            'tanggal_mulai' => date('Y-m-d', strtotime($this->input->post('tanggal_awal'))),
            'tanggal_akhir' => date('Y-m-d', strtotime($this->input->post('tanggal_akhir'))),
            'pihak_pertama' => $this->input->post('pihak1'),
            'pihak_kedua' => $this->input->post('pihak2'),
            'lingkup' => $this->input->post('lingkup'),
            'nilai_kontrak' => str_replace('.', '', $this->input->post('nilai')),
        );


        $this->db->where('id_kontrak_konsultan', $id_kontrak);
        if ($this->db->update('tb_kontrak_konsultan', $data)) {
            echo $this->session->set_flashdata('msg', 'success');
        } else {
            echo $this->session->set_flashdata('msg', 'error');
        }

        redirect('Kontrak_konsultan');
    }

    public function upload_dok($id_kontrak)
    {
        $ses_data = array(
            'act_menu'   => 'konsultan',
            'title'      => 'Kontrak Konsultan',
            'breadcrumb' => 'konsultan',
        );
        $this->session->set_userdata($ses_data);
        // $nama = $this->db->query('select nama_kontrak from tb_kontrak_konsultan where id_kontrak_konsultan=' . $id_kontrak)->row();\
        $nama = $this->M_kontrak->getNamaKontrak($id_kontrak);
        $data = array(
            'id_kontrak' => $id_kontrak,
            'nama_kontrak' => $nama->nama_kontrak,
        );
        $this->template->load('template/admin_template', 'kontrak/upload_dok.php', $data);
    }

    public function act_Upload_dokLain()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', '&', ']', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $id_kontrak = $this->input->post('id_kontrakLain');

        $data = array(
            'id_kontrak_konsultan' => $id_kontrak,
            'id_dok_master' => 100,
            'keterangan' => $this->input->post('nama_dok'),
            'nomor_dok' => $this->input->post('nomor_dok'),
            'kantor' => $this->input->post('kantor'),
            'no_rak' => $this->input->post('no_rak'),
            'no_box' => $this->input->post('no_box'),
            'pic' => $this->input->post('pic'),
            'tanggal_dok' => date('Y-m-d', strtotime($this->input->post('tanggal_dok'))),
            'dok_file' => $eks_file,
            'create_date' => date('Y-m-d h:i:s'),
        );

        $uploadPath = 'file_uploads/kontrak_konsultan/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->insert('detail_dok_konsultan', $data);
            echo $this->session->set_flashdata('msg', 'success');
        } else {
            echo $this->session->set_flashdata('msg', 'error');
        }

        redirect('Kontrak_konsultan/upload_dok/' . $id_kontrak);
    }

    public function act_Upload_dokKonsultan()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', '&', ']', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $id_kontrak = $this->input->post('id_kontrak');

        $data = array(
            'id_kontrak_konsultan' => $id_kontrak,
            'id_dok_master' => $this->input->post('id_dok_master'),
            'nomor_dok' => $this->input->post('nomor_dok'),
            'kantor' => $this->input->post('kantor'),
            'no_rak' => $this->input->post('no_rak'),
            'no_box' => $this->input->post('no_box'),
            'pic' => $this->input->post('pic'),
            'tanggal_dok' => date('Y-m-d', strtotime($this->input->post('tanggal_dok'))),
            'dok_file' => $eks_file,
            'create_date' => date('Y-m-d h:i:s'),
        );

        $uploadPath = 'file_uploads/kontrak_konsultan/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->insert('detail_dok_konsultan', $data);
            echo $this->session->set_flashdata('msg', 'success');
        } else {
            echo $this->session->set_flashdata('msg', 'error');
        }

        redirect('Kontrak_konsultan/upload_dok/' . $id_kontrak);
    }

    public function act_Update_dokKonsultan()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $id_detail_dok = $this->input->post('id_detail_dok');
        $id_kontrak = $this->input->post('id_kontrak_update');

        $data = array(
            'nomor_dok' => $this->input->post('nomor_dok_update'),
            'tanggal_dok' => date('Y-m-d', strtotime($this->input->post('tanggal_dok_update'))),
            'dok_file' => $eks_file,
            'kantor' => $this->input->post('kantor'),
            'no_rak' => $this->input->post('no_rak_update'),
            'no_box' => $this->input->post('no_box_update'),
            'pic' => $this->input->post('pic_update'),
        );
        $data2 = array(
            'nomor_dok' => $this->input->post('nomor_dok_update'),
            'tanggal_dok' => date('Y-m-d', strtotime($this->input->post('tanggal_dok_update'))),
            'kantor' => $this->input->post('kantor'),
            'no_rak' => $this->input->post('no_rak_update'),
            'no_box' => $this->input->post('no_box_update'),
            'pic' => $this->input->post('pic_update'),
        );

        $uploadPath = 'file_uploads/kontrak_konsultan/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->where('id_detail_dok', $id_detail_dok);
            if ($this->db->update('detail_dok_konsultan', $data)) {
                echo $this->session->set_flashdata('msg', 'success');
            } else {
                echo $this->session->set_flashdata('msg', 'error');
            }
        } else {
            // print_r($data2); exit();
            $this->db->where('id_detail_dok', $id_detail_dok);
            if ($this->db->update('detail_dok_konsultan', $data2)) {
                echo $this->session->set_flashdata('msg', 'success');
            } else {
                echo $this->session->set_flashdata('msg', 'error');
            }
        }

        redirect('Kontrak_konsultan/upload_dok/' . $id_kontrak);
    }

    public function act_Update_dokLain()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $id_detail_dok = $this->input->post('id_detail_dokLain');
        $id_kontrak = $this->input->post('id_kontrak_l');

        $data = array(
            'keterangan' => $this->input->post('nama_dok_l'),
            'nomor_dok' => $this->input->post('nomor_dok_l'),
            'tanggal_dok' => date('Y-m-d', strtotime($this->input->post('tanggal_dok_l'))),
            'dok_file' => $eks_file,
            'kantor' => $this->input->post('kantor_l'),
            'no_rak' => $this->input->post('no_rak_l'),
            'no_box' => $this->input->post('no_box_l'),
            'pic' => $this->input->post('pic_l'),
        );
        $data2 = array(
            'keterangan' => $this->input->post('nama_dok_l'),
            'nomor_dok' => $this->input->post('nomor_dok_l'),
            'tanggal_dok' => date('Y-m-d', strtotime($this->input->post('tanggal_dok_l'))),
            'kantor' => $this->input->post('kantor_l'),
            'no_rak' => $this->input->post('no_rak_l'),
            'no_box' => $this->input->post('no_box_l'),
            'pic' => $this->input->post('pic_l'),
        );

        $uploadPath = 'file_uploads/kontrak_konsultan/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->where('id_detail_dok', $id_detail_dok);
            if ($this->db->update('detail_dok_konsultan', $data)) {
                echo $this->session->set_flashdata('msg', 'success');
            } else {
                echo $this->session->set_flashdata('msg', 'error');
            }
        } else {
            // print_r($data2); exit();
            $this->db->where('id_detail_dok', $id_detail_dok);
            if ($this->db->update('detail_dok_konsultan', $data2)) {
                echo $this->session->set_flashdata('msg', 'success');
            } else {
                echo $this->session->set_flashdata('msg', 'error');
            }
        }

        redirect('Kontrak_konsultan/upload_dok/' . $id_kontrak);
    }

    public function hapus_dokLain($id_kontrak, $id)
    {
        $this->db->where('id_detail_dok', $id);
        if ($this->db->delete('detail_dok_konsultan')) {
            $this->session->set_flashdata('message_success', 'Data Berhasil Di Hapus');
        } else {
            $this->session->set_flashdata('message_error', 'Data Gagal Di Hapus');
        }
        redirect('Kontrak_konsultan/upload_dok/' . $id_kontrak);
    }

    public function act_add_AddendumKonsultan()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = 'Addendum-' . $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $id_kontrak = $this->input->post('id_kontrak');

        $replace = [
            '.' => '',
            ',' => '.',
        ];

        $data = array(
            'id_kontrak' => $id_kontrak,
            'add_ke' => $this->input->post('add_ke'),
            'nomor_dok' => $this->input->post('nomor_dok'),
            'tanggal_dok' => date('Y-m-d', strtotime($this->input->post('tanggal_dok'))),
            'nilai' => str_replace(array_keys($replace), $replace, $this->input->post('nilai')),
            'dok_file' => $eks_file,
            'keterangan' => $this->input->post('keterangan'),
            'justifikasi_eks' => $this->input->post('justifikasi_eks'),
            'create_date' => date('Y-m-d h:i:s'),
        );

        $data_kon = array(
            'nilai_add' => str_replace(array_keys($replace), $replace, $this->input->post('nilai')),
        );

        $uploadPath = 'file_uploads/kontrak_konsultan/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->insert('addendum_konsultan', $data);
            $this->db->where('id_kontrak_konsultan', $id_kontrak);
            $this->db->update('tb_kontrak_konsultan', $data_kon);
            echo $this->session->set_flashdata('success', 'Data berhasil disimpan');
        } else {
            echo $this->session->set_flashdata('error', 'Data gagal disimpan');
        }

        redirect('Kontrak_konsultan/detail/' . $id_kontrak .  '#data_addendum');
    }

    public function act_add_Addendum($jenis)
    {
        //     $config = array();
        //     $config2 = array();

        //     $filename = $_FILES['file']['name'];
        //     $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        //     $filename2 = $_FILES['file_eks']['name'];
        //     $ekstensi_file2 = substr(strtolower(strrchr($filename2, ".")), 1);

        //     $string_replace = array('/', ';', '[', '&', ']', '{', '}', '|', '^', '~', ' ', '.', '-');
        //     $nama = str_replace($string_replace, '_', $filename);
        //     $eks_file = 'Addendum-' . $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        //     $nama2 = str_replace($string_replace, '_', $filename2);
        //     $eks_file2 = 'Justifikasi-Eksternal-' . $nama2 . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file2;

        //     $id_kontrak = $this->input->post('id_kontrak');

        //     $data = array(
        //         'id_kontrak' => $id_kontrak,
        //         'add_ke' => $this->input->post('add_ke'),
        //         'nomor_dok' => $this->input->post('nomor_dok'),
        //         'tanggal_dok' => date('Y-m-d', strtotime($this->input->post('tanggal_dok'))),
        //         'nilai' => str_replace('.', '', $this->input->post('nilai')),
        //         'dok_file' => $eks_file,
        //         'keterangan' => $this->input->post('keterangan'),
        //         'justifikasi_eks' => $this->input->post('justifikasi_eks'),
        //         'file_eksternal' => $eks_file2,
        //         'create_date' => date('Y-m-d h:i:s'),
        //     );

        //     $data_kon = array(
        //         'nilai_add' => str_replace('.', '', $this->input->post('nilai')),
        //     );

        //     $uploadPath = 'file_uploads/kontrak_konsultan/';
        //     $config['upload_path'] = $uploadPath;
        //     $config['allowed_types'] = 'pdf';
        //     $config['max_size'] = 0;
        //     $config['file_name'] = $eks_file;

        //     $config2['upload_path'] = $uploadPath;
        //     $config2['allowed_types'] = 'pdf';
        //     $config2['max_size'] = 0;
        //     $config2['file_name'] = $eks_file2;

        //     $this->load->library('upload', $config);
        //     $this->upload->initialize($config);
        //     $this->load->library('upload', $config2);
        //     $this->upload->initialize($config2);
        //     if ($this->upload->do_upload('file')) {
        //         $this->upload->data();
        //         $this->db->insert('addendum_konsultan', $data);
        //         $this->db->where('id_kontrak_konsultan', $id_kontrak);
        //         $this->db->update('tb_kontrak_konsultan', $data_kon);
        //         echo $this->session->set_flashdata('msg', 'success');
        //     } else {
        //         echo $this->session->set_flashdata('msg', 'error');
        //     }

        //     // $error = array('error' => $this->upload->display_errors());
        //     //     print_r($error); exit();
        //     if ($jenis == 1) {
        //         redirect('Kontrak_konsultan');
        //     } else if ($jenis == 2) {
        //         redirect('Kontrak_konsultan/nonTol');
        //     } else {
        //         redirect('Kontrak_konsultan/peralatanTol');
        //     }
    }

    public function detail($id_kontrak)
    {
        $ses_data = array(
            'act_menu'   => 'konsultan',
            'title'      => 'Kontrak konsultan',
            'breadcrumb' => 'konsultan',
        );
        $this->session->set_userdata($ses_data);
        $nama = $this->db->query('SELECT nama_kontrak FROM tb_kontrak_konsultan WHERE id_kontrak_konsultan=' . $id_kontrak)->row();
        $nilai_terbayar = $this->db->query("SELECT COALESCE(sum(nilai),0) as sum FROM pembayaran WHERE id_kontrak_konsultan=" . $id_kontrak)->row()->sum;
        $data_kontrak_konsultan = $this->db->get_where('tb_kontrak_konsultan', ['id_kontrak_konsultan' => $id_kontrak])->result();
        $addendum_available = $this->db->query("SELECT DISTINCT add_ke FROM addendum_konsultan WHERE id_kontrak = " . $id_kontrak . " ORDER BY add_ke ASC")->result();
        $data = array(
            'id_kontrak' => $id_kontrak,
            'nama_kontrak' => $nama->nama_kontrak,
            'row' => $this->M_kontrak->get_pembayaranKonsultan($id_kontrak),
            'nilai_terbayar' => $nilai_terbayar,
            'laporan' => $this->M_kontrak->get_lapKonsultan($id_kontrak),
            'data_kontrak_konsultan' => $data_kontrak_konsultan,
            'addendum_available' => $addendum_available
        );
        $this->template->load('template/admin_template', 'kontrak/detail_konsultan.php', $data);
    }

    public function act_add_TahapanAddendumKonsultan()
    {
        $id_kontrak = $this->input->post('id_kontrak');
        $tahapan_add = $this->input->post('tahapan_add');
        if (empty($id_kontrak)) {
            show_error('ID kontrak tidak ditemukan', 500); // atau redirect ke halaman error
        }

        $dok_file = $_FILES['dok_file']['name'];
        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
        $eks_file = str_replace($string_replace, '_', $dok_file);

        $eks_file = 'TahapanAddendum-' . $eks_file . '_' . date('d-m-Y_h-i-s') . '.pdf';

        $data = array(
            'id_kontrak_konsultan' => $this->input->post('id_kontrak'),
            'tahapan_add' => $tahapan_add,
            'nama_dok' => $this->input->post('nama_dok'),
            'nomor_dok' => $this->input->post('nomor_dok'),
            'tanggal_dok' => date('Y-m-d', strtotime($this->input->post('tanggal_dok'))),
            'lokasi_file' => $this->input->post('lokasi_file'),
            'pic' => $this->input->post('pic'),
            'dok_file' => $eks_file,
            'create_date' => date('Y-m-d H:i:s'),
            'jenis_dokumen' => '',
        );

        $uploadPath = 'file_uploads/kontrak_konsultan/tahapan_kontrak_konsultan/';

        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('dok_file')) {
            $this->upload->data();
            $this->db->insert('tahapan_addendum_konsultan', $data);
            echo $this->session->set_flashdata('success', 'Data berhasil disimpan');
        } else {
            echo $this->session->set_flashdata('error', 'Data gagal disimpan');
        }

        redirect('Kontrak_konsultan/detail/' . $id_kontrak . '?add_ke=' . $tahapan_add . '#data_addendum');
    }

    public function act_update_dokumen_addendum()
    {
        $id_tahapan_addendum_konstruksi = $this->input->post('id_tahapan_addendum_konsultan');
        $id_kontrak_konsultan = $this->input->post('id_kontrak_konsultan');
        $tahapan_add = $this->input->post('tahapan_add');
        if (empty($id_kontrak_konsultan)) {
            show_error('ID kontrak tidak ditemukan', 500); // atau redirect ke halaman error
        }

        $dok_file = $_FILES['dok_file']['name'];
        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
        $eks_file = str_replace($string_replace, '_', $dok_file);

        $eks_file = 'TahapanAddendum-' . $eks_file . '_' . date('d-m-Y_h-i-s') . '.pdf';

        $data = array(
            'id_kontrak_konsultan' => $id_kontrak_konsultan,
            'tahapan_add' => $tahapan_add,
            'nama_dok' => $this->input->post('nama_dok'),
            'nomor_dok' => $this->input->post('nomor_dok'),
            'tanggal_dok' => date('Y-m-d', strtotime($this->input->post('tanggal_dok'))),
            'lokasi_file' => $this->input->post('lokasi_file'),
            'pic' => $this->input->post('pic'),
            // 'dok_file' => $eks_file,
            'create_date' => date('Y-m-d H:i:s'),
            'jenis_dokumen' => '',
        );

        $uploadPath = 'file_uploads/kontrak_konsultan/tahapan_kontrak_konsultan/';

        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('dok_file')) {
            $data['dok_file'] = $eks_file;
            $this->upload->data();
            $this->db->where('id_tahapan_addendum_konsultan', $id_tahapan_addendum_konstruksi);
            if ($this->db->update('tahapan_addendum_konsultan', $data)) {
                echo $this->session->set_flashdata('success', 'Data berhasil disimpan');
            } else {
                echo $this->session->set_flashdata('error', 'Data gagal disimpan');
            }
        } else {
            $this->db->where('id_tahapan_addendum_konsultan', $id_tahapan_addendum_konstruksi);
            if ($this->db->update('tahapan_addendum_konsultan', $data)) {
                echo $this->session->set_flashdata('success', 'Data berhasil disimpan');
            } else {
                echo $this->session->set_flashdata('error', 'Data gagal disimpan');
            }
        }

        redirect('Kontrak_konsultan/detail/' . $id_kontrak_konsultan . '?add_ke=' . $tahapan_add . '#data_addendum');
    }









    public function pembayaran($id_kontrak)
    {
        $ses_data = array(
            'act_menu'   => 'konsultan',
            'title'      => 'Kontrak konsultan',
            'breadcrumb' => 'konsultan',
        );
        $this->session->set_userdata($ses_data);
        $nama = $this->db->query('select nama_kontrak from tb_kontrak_konsultan where id_kontrak_konsultan=' . $id_kontrak)->row();
        $data = array(
            'id_kontrak' => $id_kontrak,
            'nama_kontrak' => $nama->nama_kontrak,
            'row' => $this->M_kontrak->get_pembayaranKonsultan($id_kontrak),
        );
        $this->template->load('template/admin_template', 'kontrak/pembayaran_konsultan.php', $data);
    }

    public function add_pembayaran($id_kontrak)
    {
        $ses_data = array(
            'act_menu'   => 'konsultan',
            'title'      => 'Kontrak konsultan',
            'breadcrumb' => 'konsultan',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'action' => site_url('Kontrak_konsultan/act_pembayaran'),
            'id_kontrak' => $id_kontrak,
        );
        $this->template->load('template/admin_template', 'kontrak/add_pembayaran_konsultan.php', $data);
    }

    public function act_pembayaran()
    {
        $id_kontrak = $this->input->post('id_kontrak');
        $id_dok_master = $this->input->post('id_dok_master');
        $nomor_dok = $this->input->post('nomor_dok');
        $tanggal_dok = date('Y-m-d', strtotime($this->input->post('tanggal')));

        $data = array(
            'id_kontrak_konsultan' => $id_kontrak,
            'termin' => $this->input->post('termin'),
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'keterangan' => $this->input->post('keterangan'),
            'pmn' => $this->input->post('pmn'),
            'nilai' => str_replace('.', '', $this->input->post('nilai')),
            'create_date' => date('Y-m-d h:i:s'),
        );

        // print_r($tanggal_dok); exit();

        $nama_File = $_FILES['file_evidence']['name'];
        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '-');
        $namaFile = str_replace($string_replace, '_', $nama_File);

        if ($this->db->insert('pembayaran', $data)) {
            $get_last_save_id = $this->db->insert_id();
            for ($i = 0; $i < count($namaFile); $i++) {
                $_FILES['file']['name']     = $_FILES['file_evidence']['name'][$i];
                $_FILES['file']['type']     = $_FILES['file_evidence']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['file_evidence']['tmp_name'][$i];
                $_FILES['file']['error']     = $_FILES['file_evidence']['error'][$i];
                $_FILES['file']['size']     = $_FILES['file_evidence']['size'][$i];

                $uploadPath = 'file_uploads/kontrak_konsultan/dokumen_pembayaran/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = '*';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('file')) {
                    $fileData = $this->upload->data();
                    $uploadData[$i]['id_pembayaran'] = $get_last_save_id;
                    $uploadData[$i]['id_kontrak_konsultan'] = $id_kontrak;
                    $uploadData[$i]['dok_file'] = $fileData['file_name'];
                    $uploadData[$i]['id_dok_master'] = $id_dok_master[$i];
                    $uploadData[$i]['nomor_dok'] = $nomor_dok[$i];
                    $uploadData[$i]['tanggal_dok'] = $tanggal_dok;
                    $uploadData[$i]['create_date'] = date('Y-m-d h:i:s');
                } else {
                    $error = array('error' => $this->upload->display_errors());
                    print_r($error);
                }
            }

            // print_r($uploadData); exit();

            if (!empty($uploadData)) {
                $insert = $this->db->insert_batch('detail_dok_konsultan', $uploadData);
            }
            echo $this->session->set_flashdata('msg', 'success');
        } else {
            echo $this->session->set_flashdata('msg', 'error');
        }

        redirect('Kontrak_konsultan/pembayaran/' . $id_kontrak);
    }

    public function laporan($id_kontrak)
    {
        $ses_data = array(
            'act_menu'   => 'konsultan',
            'title'      => 'Kontrak konsultan',
            'breadcrumb' => 'konsultan',
        );
        $this->session->set_userdata($ses_data);
        $nama = $this->db->query('select nama_kontrak from tb_kontrak_konsultan where id_kontrak_konsultan=' . $id_kontrak)->row();
        $data = array(
            'id_kontrak' => $id_kontrak,
            'nama_kontrak' => $nama->nama_kontrak,
            'row' => $this->M_kontrak->get_lapKonsultan($id_kontrak),
            'aksi' => 'add_laporan',
            'hapus' => 'hapus_laporan',
            'edit' => 'update_laporan',
        );
        $this->template->load('template/admin_template', 'konsultan/v_laporan.php', $data);
    }

    public function add_laporan($id_kontrak)
    {
        $ses_data = array(
            'act_menu'   => 'konsultan',
            'title'      => 'Kontrak konsultan',
            'breadcrumb' => 'konsultan',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'action' => site_url('Kontrak_konsultan/act_laporan'),
            'id_kontrak' => $id_kontrak,

        );
        $this->template->load('template/admin_template', 'konsultan/add_laporan.php', $data);
    }

    public function act_laporan()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);
        $id_kontrak = $this->input->post('id_kontrak');

        $string_replace = array('/', ';', '[', '&', ']', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $data = array(
            'id_kontrak_konsultan' => $this->input->post('id_kontrak'),
            'jenis_lap' => $this->input->post('jenis_lap'),
            'bulan' => $this->input->post('bulan'),
            'tanggal_lap' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'keterangan' => $this->input->post('keterangan'),
            'dok_file' => $eks_file,
            'create_date' => date('Y-m-d h:i:s'),
            'kantor' => $this->input->post('lokasi'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'),
            'pic' => $this->input->post('pic'),
        );

        $uploadPath = 'file_uploads/laporan_konsultan/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->insert('laporan_konsultan', $data);
            echo $this->session->set_flashdata('msg', 'success');
        } else {
            echo $this->session->set_flashdata('msg', 'error');
        }

        // $error = array('error' => $this->upload->display_errors());
        // print_r($error); exit();

        redirect('Kontrak_konsultan/laporan/' . $id_kontrak);
    }

    public function hapus_laporan($id, $id_kontrak)
    {
        $this->db->where('id_laporan', $id);
        if ($this->db->delete('laporan_konsultan')) {
            $this->session->set_flashdata('message_success', 'Data Berhasil Di Hapus');
        } else {
            $this->session->set_flashdata('message_error', 'Data Gagal Di Hapus');
        }
        redirect('Kontrak_konsultan/laporan/' . $id_kontrak);
    }

    public function update_laporan($id, $id_kontrak)
    {

        $ses_data = array(
            'act_menu'   => 'konsultan',
            'title'      => 'Kontrak konsultan',
            'breadcrumb' => 'konsultan',
        );
        $this->session->set_userdata($ses_data);

        $row = $this->M_kontrak->get_lapKonsultan_byId($id);

        if ($row) {

            $data = array(
                'action' => site_url('Kontrak_konsultan/act_update_laporan'),
                'id_kontrak' => $row->id_kontrak_konsultan,
                'id_laporan' => $row->id_laporan,
                'jenis_lap' => $row->jenis_lap,
                'bulan' => $row->bulan,
                'tanggal_lap' => $row->tanggal_lap,
                'keterangan' => $row->keterangan,
                'dok_file' => $row->dok_file,
                'kantor' => $row->kantor,
                'pic' => $row->pic,
                'no_rak' => $row->no_rak,
                'no_box' => $row->no_box,
            );
        }


        $this->template->load('template/admin_template', 'konsultan/update_laporan.php', $data);
    }

    function act_update_laporan()
    {
        $config = array();
        $id_kontrak = $this->input->post('id_kontrak');
        $id_laporan = $this->input->post('id_laporan');

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $data = array(
            'jenis_lap' => $this->input->post('jenis_lap'),
            'bulan' => $this->input->post('bulan'),
            'tanggal_lap' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'keterangan' => $this->input->post('keterangan'),
            'dok_file' => $eks_file,
            'kantor' => $this->input->post('lokasi'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'),
            'pic' => $this->input->post('pic'),
        );

        $data2 = array(
            'jenis_lap' => $this->input->post('jenis_lap'),
            'bulan' => $this->input->post('bulan'),
            'tanggal_lap' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'keterangan' => $this->input->post('keterangan'),
            'kantor' => $this->input->post('lokasi'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'),
            'pic' => $this->input->post('pic'),
        );

        $uploadPath = 'file_uploads/laporan_konsultan/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->where('id_laporan', $id_laporan);
            if ($this->db->update('laporan_konsultan', $data)) {
                echo $this->session->set_flashdata('msg', 'success');
            } else {
                echo $this->session->set_flashdata('msg', 'error');
            }
        } else {
            // print_r($data2); exit();
            $this->db->where('id_laporan', $id_laporan);
            if ($this->db->update('laporan_konsultan', $data2)) {
                echo $this->session->set_flashdata('msg', 'success');
            } else {
                echo $this->session->set_flashdata('msg', 'error');
            }
        }


        redirect('Kontrak_konsultan/laporan/' . $id_kontrak);
    }

    public function get_detail_addendum()
    {
        $id = $this->input->get('idkontrak');
        $year = date('Y');

        $aset =  $this->db->query(" select * from addendum_konsultan where id_kontrak=" . $id)->result();
        echo json_encode($aset);
    }

    public function hapus_kontrak($id)
    {
        $this->db->where('id_kontrak_konsultan', $id);
        if ($this->db->delete('tb_kontrak_konsultan')) {
            $this->db->where('id_kontrak', $id);
            $this->db->delete('addendum_konsultan');
            $this->db->where('id_kontrak_konsultan', $id);
            $this->db->delete('detail_dok_konsultan');
            $this->db->where('id_kontrak_konsultan', $id);
            $this->db->delete('pembayaran');
            $this->session->set_flashdata('message_success', 'Data Berhasil Di Hapus');
        } else {
            $this->session->set_flashdata('message_error', 'Data Gagal Di Hapus');
        }
        redirect('Kontrak_konsultan');
    }

    public function hapus_pembayaran($id, $id_kontrak)
    {
        $this->db->where('id_pembayaran', $id);
        if ($this->db->delete('pembayaran')) {
            $this->db->where('id_pembayaran', $id);
            $this->db->delete('detail_dok_konsultan');
            $this->session->set_flashdata('message_success', 'Data Berhasil Di Hapus');
        } else {
            $this->session->set_flashdata('message_error', 'Data Gagal Di Hapus');
        }
        redirect('Kontrak_konsultan/pembayaran/' . $id_kontrak);
    }

    public function update_pembayaran($id, $id_kontrak)
    {

        $ses_data = array(
            'act_menu'   => 'konsultan',
            'title'      => 'Kontrak konsultan',
            'breadcrumb' => 'konsultan',
        );
        $this->session->set_userdata($ses_data);

        $row = $this->M_kontrak->get_pembayaranKonsultan_byId($id);

        if ($row) {
            $asset = $this->M_kontrak->get_dokPembayaranKonsultan($row->id_pembayaran);
            $jenis = array();
            foreach ($asset as $key) {
                $jenis[] = array($key);
            }

            $data = array(
                'action' => site_url('Kontrak_konsultan/act_update_pembayaran'),
                'id_kontrak' => $id_kontrak,
                'id_pembayaran' => $row->id_pembayaran,
                'termin' => $row->termin,
                'tanggal' => $row->tanggal,
                'keterangan' => $row->keterangan,
                'nilai' => $row->nilai,
                'jenis' => $jenis,
            );
        }


        $this->template->load('template/admin_template', 'kontrak/update_pembayaranKonsultan.php', $data);
    }

    public function act_update_pembayaran()
    {

        $config = array();
        $id_kontrak = $this->input->post('id_kontrak');
        $id_detail_dok = $this->input->post('id_detail_dok');
        $id_pembayaran = $this->input->post('id_pembayaran');
        $id_dok_master = $this->input->post('id_dok_master');
        $nomor_dok = $this->input->post('nomor_dok');
        // $tanggal_dok = date('Y-m-d',strtotime($this->input->post('tanggal')));

        $data = array(
            // 'id_kontrak_konsultan' => $id_kontrak,
            'termin' => $this->input->post('termin'),
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'keterangan' => $this->input->post('keterangan'),
            'nilai' => str_replace('.', '', $this->input->post('nilai')),
        );


        $this->db->where('id_pembayaran', $id_pembayaran);
        if ($this->db->update('pembayaran', $data)) {
            echo $this->session->set_flashdata('msg', 'success');
        } else {
            echo $this->session->set_flashdata('msg', 'error');
        }


        // $jenis = $this->input->post('klasifikasi');
        // $klausul = $this->input->post('klausul');
        // $ketidaksesuaian = $this->input->post('issue');
        // $id_list_ncr = $this->input->post('id_list_ncr');
        // if($ketidaksesuaian!=null || $ketidaksesuaian!="" || $ketidaksesuaian!=" "){
        //     for($a = 0; $a < count($ketidaksesuaian); $a++){
        //         $data_issue[] = array(
        //             'id_list_ncr' => $id_list_ncr[$a],
        //             'jenis' => $jenis[$a],
        //             'klausul' => $klausul[$a],
        //             'ketidaksesuaian' => $ketidaksesuaian[$a], 

        //         );
        //     }

        //     if (count($data_issue) > 0) {
        //         $this->db->update_batch('list_ncr', $data_issue, 'id_list_ncr');
        //     }
        // }

        // $id_ncr_new = $this->input->post('id_ncr');
        // $jenis_new = $this->input->post('klasifikasi_new');
        // $klausul_new = $this->input->post('klausul_new');
        // $ketidaksesuaian_new = $this->input->post('issue_new');
        // if($ketidaksesuaian_new!=null || $ketidaksesuaian_new!="" || $ketidaksesuaian_new!=" "){
        //     for($i = 0; $i < count($ketidaksesuaian_new); $i++){
        //         $data_issue_new[] = array(
        //             'id_ncr' => $id_ncr_new,
        //             'jenis' => $jenis_new[$i],
        //             'klausul' => $klausul_new[$i],
        //             'ketidaksesuaian' => $ketidaksesuaian_new[$i], 
        //             'create_date' => date('Y-m-d h:i:s'),
        //         );
        //     }

        //     if (count($data_issue_new) > 0) {
        //         $this->db->insert_batch('list_ncr', $data_issue_new);
        //     }
        // }

        redirect('Kontrak_konsultan/pembayaran/' . $id_kontrak);
    }

    public function act_UploadPembayaran_edit()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', '&', ']', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $id_kontrak = $this->input->post('id_kontrak');
        $id_pembayaran = $this->input->post('id_pembayaran');

        $data = array(
            'id_kontrak_konsultan' => $id_kontrak,
            'id_dok_master' => $this->input->post('id_dok_master'),
            'nomor_dok' => $this->input->post('nomor_dok'),
            'tanggal_dok' => date('Y-m-d', strtotime($this->input->post('tanggal_dok'))),
            'dok_file' => $eks_file,
            'create_date' => date('Y-m-d h:i:s'),
            'id_pembayaran' => $id_pembayaran,
        );

        $uploadPath = 'file_uploads/kontrak_konsultan/dokumen_pembayaran/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->insert('detail_dok_konsultan', $data);
            echo $this->session->set_flashdata('msg', 'success');
        } else {
            echo $this->session->set_flashdata('msg', 'error');
        }

        redirect('Kontrak_konsultan/update_pembayaran/' . $id_pembayaran . '/' . $id_kontrak);
    }

    public function act_dokPembayaran_edit()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $id_detail_dok = $this->input->post('id_detail_dok');
        $id_kontrak = $this->input->post('id_kontrak_update');
        $id_pembayaran = $this->input->post('id_pembayaran_update');

        $data = array(
            'nomor_dok' => $this->input->post('nomor_dok_update'),
            'tanggal_dok' => date('Y-m-d', strtotime($this->input->post('tanggal_dok_update'))),
            'dok_file' => $eks_file,
        );
        $data2 = array(
            'nomor_dok' => $this->input->post('nomor_dok_update'),
            'tanggal_dok' => date('Y-m-d', strtotime($this->input->post('tanggal_dok_update'))),
        );

        $uploadPath = 'file_uploads/kontrak_konsultan/dokumen_pembayaran/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->where('id_detail_dok', $id_detail_dok);
            if ($this->db->update('detail_dok_konsultan', $data)) {
                echo $this->session->set_flashdata('msg', 'success');
            } else {
                echo $this->session->set_flashdata('msg', 'error');
            }
        } else {
            // print_r($data2); exit();
            $this->db->where('id_detail_dok', $id_detail_dok);
            if ($this->db->update('detail_dok_konsultan', $data2)) {
                echo $this->session->set_flashdata('msg', 'success');
            } else {
                echo $this->session->set_flashdata('msg', 'error');
            }
        }

        redirect('Kontrak_konsultan/update_pembayaran/' . $id_pembayaran . '/' . $id_kontrak);
    }

    public function get_detail_dokPembayaran()
    {
        $id = $this->input->get('idpembayaran');
        $year = date('Y');

        $aset =  $this->db->query("select dm.id_dok_master, dm.nama_dok, (select dd.dok_file from detail_dok_konsultan as dd where dd.id_dok_master = dm.id_dok_master and dd.id_pembayaran=" . $id . " order by dd.id_detail_dok desc limit 1) from dok_master as dm  order by dm.id_dok_master asc")->result();

        echo json_encode($aset);
    }

    public function hapus_addendum($id, $id_kontrak)
    {
        $check = $this->db->get_where('addendum_konsultan', ['id_addendum' => $id])->num_rows();
        if ($check > 0) {
            $this->session->set_flashdata('error', 'Data Gagal Di Hapus Karena Memiliki Dokumen Addendum');
        } else {
            $this->db->where('id_addendum', $id);
            if ($this->db->delete('addendum_konsultan')) {
                $this->session->set_flashdata('success', 'Data Berhasil Di Hapus');
            } else {
                $this->session->set_flashdata('error', 'Data Gagal Di Hapus');
            }
        }

        redirect('Kontrak_konsultan/detail/' . $id_kontrak . '#data_addendum');
    }

    function act_update_Addendum()
    {
        $config = array();
        $id_addendum = $this->input->post('id_addendum');
        $id_kontrak = $this->input->post('id_kontrak');

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '{', '&', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = 'Addendum-' . $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $data = array(
            'add_ke' => $this->input->post('add_ke'),
            'nomor_dok' => $this->input->post('nomor_dok'),
            'tanggal_dok' => date('Y-m-d', strtotime($this->input->post('tanggal_dok'))),
            'nilai' => str_replace('.', '', $this->input->post('nilai')),
            'dok_file' => $eks_file,
            'keterangan' => $this->input->post('keterangan'),
        );

        $data2 = array(
            'add_ke' => $this->input->post('add_ke'),
            'nomor_dok' => $this->input->post('nomor_dok'),
            'tanggal_dok' => date('Y-m-d', strtotime($this->input->post('tanggal_dok'))),
            'nilai' => str_replace('.', '', $this->input->post('nilai')),
            'keterangan' => $this->input->post('keterangan'),
        );

        $uploadPath = 'file_uploads/kontrak_konsultan/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;
        $config['file_permissions'] = 0777;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->where('id_addendum', $id_addendum);
            if ($this->db->update('addendum_konsultan', $data)) {
                echo $this->session->set_flashdata('msg', 'success');
            } else {
                echo $this->session->set_flashdata('msg', 'error');
            }
        } else {
            // print_r($data2); exit();
            $this->db->where('id_addendum', $id_addendum);
            if ($this->db->update('addendum_konsultan', $data2)) {
                echo $this->session->set_flashdata('msg', 'success');
            } else {
                echo $this->session->set_flashdata('msg', 'error');
            }
        }


        redirect('Kontrak_konsultan/detail/' . $id_kontrak);
    }


    // Non Tol
    public function nonTol()
    {
        $ses_data = array(
            'act_menu'   => 'konsultan_nonTol',
            'title'      => 'Kontrak Konsultan',
            'breadcrumb' => 'konsultan_nonTol',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'row' => $this->M_kontrak->get_kontrakKonsultanNonTol(),
            'jenis' => 2,
        );
        $this->template->load('template/admin_template', 'kontrak/v_konsultanNonTol.php', $data);
    }

    public function detail_nonTol($id_kontrak)
    {
        $ses_data = array(
            'act_menu'   => 'konsultan_nonTol',
            'title'      => 'Kontrak konsultan',
            'breadcrumb' => 'konsultan_nonTol',
        );
        $this->session->set_userdata($ses_data);
        $nama = $this->db->query('select nama_kontrak from tb_kontrak_konsultan where id_kontrak_konsultan=' . $id_kontrak)->row();
        $nilai_terbayar = $this->db->query("select COALESCE(sum(nilai),0) as sum from pembayaran where id_kontrak_konsultan=" . $id_kontrak)->row()->sum;
        $data = array(
            'id_kontrak' => $id_kontrak,
            'nama_kontrak' => $nama->nama_kontrak,
            'row' => $this->M_kontrak->get_pembayaranKonsultan($id_kontrak),
            'nilai_terbayar' => $nilai_terbayar,
            'laporan' => $this->M_kontrak->get_lapKonsultan($id_kontrak),
        );
        $this->template->load('template/admin_template', 'kontrak/detail_konsultan.php', $data);
    }

    public function add_kontrakNonTol()
    {
        $ses_data = array(
            'act_menu'   => 'konsultan_nonTol',
            'title'      => 'Kontrak Konsultan',
            'breadcrumb' => 'konsultan_nonTol',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'action' => site_url('Kontrak_konsultan/act_kontrakNonTol'),
        );
        $this->template->load('template/admin_template', 'kontrak/add_konsultanNonTol.php', $data);
    }
    public function act_kontrakNonTol()
    {

        $data = array(
            'nama_kontrak' => $this->input->post('nama_kontrak'),
            'lokasi' => $this->input->post('lokasi'),
            'seksi' => $this->input->post('seksi'),
            'nomor_kontrak' => $this->input->post('nomor_kontrak'),
            'tanggal_mulai' => date('Y-m-d', strtotime($this->input->post('tanggal_awal'))),
            'tanggal_akhir' => date('Y-m-d', strtotime($this->input->post('tanggal_akhir'))),
            'pihak_pertama' => $this->input->post('pihak1'),
            'pihak_kedua' => $this->input->post('pihak2'),
            'lingkup' => $this->input->post('lingkup'),
            'nilai_kontrak' => str_replace('.', '', $this->input->post('nilai')),
            'nilai_add' => str_replace('.', '', $this->input->post('nilai')),
            'create_date' => date('Y-m-d h:i:s'),
            'jenis' => 2,
            'jenis_konsultannontol' => $this->input->post('jenis'),
        );

        if ($this->db->insert('tb_kontrak_konsultan', $data)) {
            echo $this->session->set_flashdata('msg', 'success');
        } else {
            echo $this->session->set_flashdata('msg', 'error');
        }
        // print_r($error); exit();
        redirect('Kontrak_konsultan/nonTol');
    }

    public function hapus_kontrakNonTol($id)
    {
        $this->db->where('id_kontrak_konsultan', $id);
        if ($this->db->delete('tb_kontrak_konsultan')) {
            $this->db->where('id_kontrak', $id);
            $this->db->delete('addendum_konsultan');
            $this->db->where('id_kontrak_konsultan', $id);
            $this->db->delete('detail_dok_konsultan');
            $this->session->set_flashdata('message_success', 'Data Berhasil Di Hapus');
        } else {
            $this->session->set_flashdata('message_error', 'Data Gagal Di Hapus');
        }
        redirect('Kontrak_konsultan/nonTol');
    }

    public function update_kontrakNonTol($id)
    {

        $ses_data = array(
            'act_menu' => 'konsultan_nonTol',
            'title' => 'konsultan',
            'breadcumb' => 'konsultan_nonTol'
        );

        $this->session->set_userdata($ses_data);

        $row2 = $this->M_kontrak->get_kontrakKonsultan_by_id($id);
        if ($row2) {
            $data = array(
                'action' => site_url('Kontrak_konsultan/act_update_kontrakNonTol'),
                'id_kontrak' => $row2->id_kontrak_konsultan,
                'nama_kontrak' => $row2->nama_kontrak,
                'nomor_kontrak' => $row2->nomor_kontrak,
                'seksi' => $row2->seksi,
                'tanggal_mulai' => $row2->tanggal_mulai,
                'tanggal_akhir' => $row2->tanggal_akhir,
                'pihak_pertama' => $row2->pihak_pertama,
                'pihak_kedua' => $row2->pihak_kedua,
                'lingkup' => $row2->lingkup,
                'nilai' => $row2->nilai_kontrak,
                'lokasi' => $row2->lokasi,
                'jenis' => $row2->jenis_konsultannontol,
            );
        }

        $this->template->load('template/admin_template', 'kontrak/edit_konsultanNonTol', $data);
    }
    public function act_update_kontrakNonTol()
    {
        $id_kontrak = $this->input->post('id_kontrak');

        $config = array();
        $data = array(
            'nama_kontrak' => $this->input->post('nama_kontrak'),
            'seksi' => $this->input->post('seksi'),
            'lokasi' => $this->input->post('lokasi'),
            'nomor_kontrak' => $this->input->post('nomor_kontrak'),
            'tanggal_mulai' => date('Y-m-d', strtotime($this->input->post('tanggal_awal'))),
            'tanggal_akhir' => date('Y-m-d', strtotime($this->input->post('tanggal_akhir'))),
            'pihak_pertama' => $this->input->post('pihak1'),
            'pihak_kedua' => $this->input->post('pihak2'),
            'lingkup' => $this->input->post('lingkup'),
            'nilai_kontrak' => str_replace('.', '', $this->input->post('nilai')),
            'jenis_konsultannontol' => $this->input->post('jenis'),
        );


        $this->db->where('id_kontrak_konsultan', $id_kontrak);
        if ($this->db->update('tb_kontrak_konsultan', $data)) {
            echo $this->session->set_flashdata('msg', 'success');
        } else {
            echo $this->session->set_flashdata('msg', 'error');
        }

        redirect('Kontrak_konsultan/nonTol');
    }

    // PERALATAN TOL
    public function peralatanTol()
    {
        $ses_data = array(
            'act_menu'   => 'peralatanTol',
            'title'      => 'Kontrak peralatanTol',
            'breadcrumb' => 'peralatanTol',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'row' => $this->M_kontrak->get_kontrakPeralatanTol(),
            'jenis' => 3,
        );
        $this->template->load('template/admin_template', 'kontrak/v_peralatanTol.php', $data);
    }

    public function add_peralatanTol()
    {
        $ses_data = array(
            'act_menu'   => 'peralatanTol',
            'title'      => 'Kontrak peralatanTol',
            'breadcrumb' => 'peralatanTol',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'action' => site_url('Kontrak_konsultan/act_kontrakPeralatan'),
        );
        $this->template->load('template/admin_template', 'kontrak/add_peralatanTol.php', $data);
    }

    public function act_kontrakPeralatan()
    {

        $data = array(
            'nama_kontrak' => $this->input->post('nama_kontrak'),
            'lokasi' => $this->input->post('lokasi'),
            'seksi' => $this->input->post('seksi'),
            'nomor_kontrak' => $this->input->post('nomor_kontrak'),
            'tanggal_mulai' => date('Y-m-d', strtotime($this->input->post('tanggal_awal'))),
            'tanggal_akhir' => date('Y-m-d', strtotime($this->input->post('tanggal_akhir'))),
            'pihak_pertama' => $this->input->post('pihak1'),
            'pihak_kedua' => $this->input->post('pihak2'),
            'lingkup' => $this->input->post('lingkup'),
            'nilai_kontrak' => str_replace('.', '', $this->input->post('nilai')),
            'nilai_add' => str_replace('.', '', $this->input->post('nilai')),
            'create_date' => date('Y-m-d h:i:s'),
            'jenis' => 3,
            'jenis_peralatan' => $this->input->post('jenis'),
        );

        if ($this->db->insert('tb_kontrak_konsultan', $data)) {
            echo $this->session->set_flashdata('msg', 'success');
        } else {
            echo $this->session->set_flashdata('msg', 'error');
        }

        redirect('Kontrak_konsultan/peralatanTol');
    }

    public function update_peralatanTol($id)
    {

        $ses_data = array(
            'act_menu' => 'peralatanTol',
            'title' => 'peralatanTol',
            'breadcumb' => 'peralatanTol'
        );

        $this->session->set_userdata($ses_data);

        $row2 = $this->M_kontrak->get_kontrakKonsultan_by_id($id);
        if ($row2) {
            $data = array(
                'action' => site_url('Kontrak_konsultan/act_update_peralatanTol'),
                'id_kontrak' => $row2->id_kontrak_konsultan,
                'nama_kontrak' => $row2->nama_kontrak,
                'nomor_kontrak' => $row2->nomor_kontrak,
                'seksi' => $row2->seksi,
                'tanggal_mulai' => $row2->tanggal_mulai,
                'tanggal_akhir' => $row2->tanggal_akhir,
                'pihak_pertama' => $row2->pihak_pertama,
                'pihak_kedua' => $row2->pihak_kedua,
                'lingkup' => $row2->lingkup,
                'nilai' => $row2->nilai_kontrak,
                'lokasi' => $row2->lokasi,
                'seksi' => $row2->seksi,
                'jenis' => $row2->jenis_peralatan,
            );
        }

        $this->template->load('template/admin_template', 'kontrak/edit_peralatanTol', $data);
    }

    public function act_update_peralatanTol()
    {
        $id_kontrak = $this->input->post('id_kontrak');

        $config = array();
        $data = array(
            'nama_kontrak' => $this->input->post('nama_kontrak'),
            'lokasi' => $this->input->post('lokasi'),
            'seksi' => $this->input->post('seksi'),
            'nomor_kontrak' => $this->input->post('nomor_kontrak'),
            'tanggal_mulai' => date('Y-m-d', strtotime($this->input->post('tanggal_awal'))),
            'tanggal_akhir' => date('Y-m-d', strtotime($this->input->post('tanggal_akhir'))),
            'pihak_pertama' => $this->input->post('pihak1'),
            'pihak_kedua' => $this->input->post('pihak2'),
            'lingkup' => $this->input->post('lingkup'),
            'nilai_kontrak' => str_replace('.', '', $this->input->post('nilai')),
            'jenis_peralatan' => $this->input->post('jenis'),
        );


        $this->db->where('id_kontrak_konsultan', $id_kontrak);
        if ($this->db->update('tb_kontrak_konsultan', $data)) {
            echo $this->session->set_flashdata('msg', 'success');
        } else {
            echo $this->session->set_flashdata('msg', 'error');
        }

        redirect('Kontrak_konsultan/peralatanTol');
    }

    public function hapus_peralatanTol($id)
    {
        $this->db->where('id_kontrak_konsultan', $id);
        if ($this->db->delete('tb_kontrak_konsultan')) {
            $this->db->where('id_kontrak', $id);
            $this->db->delete('addendum_konsultan');
            $this->db->where('id_kontrak_konsultan', $id);
            $this->db->delete('detail_dok_konsultan');
            $this->session->set_flashdata('message_success', 'Data Berhasil Di Hapus');
        } else {
            $this->session->set_flashdata('message_error', 'Data Gagal Di Hapus');
        }
        redirect('Kontrak_konsultan/peralatanTol');
    }

    public function laporanNonTol($id_kontrak)
    {
        $ses_data = array(
            'act_menu'   => 'konsultan_nonTol',
            'title'      => 'Kontrak Konsultan non Tol',
            'breadcrumb' => 'konsultan_nonTol',
        );
        $this->session->set_userdata($ses_data);
        $nama = $this->db->query('select nama_kontrak from tb_kontrak_konsultan where id_kontrak_konsultan=' . $id_kontrak)->row();
        $data = array(
            'id_kontrak' => $id_kontrak,
            'nama_kontrak' => $nama->nama_kontrak,
            'row' => $this->M_kontrak->get_lapKonsultan($id_kontrak),
            'aksi' => 'add_laporanNonTol',
            'hapus' => 'hapus_laporanNonTol',
            'edit' => 'edit_laporan_NonTol',
        );
        $this->template->load('template/admin_template', 'konsultan/v_laporan.php', $data);
    }

    public function add_laporanNonTol($id_kontrak)
    {
        $ses_data = array(
            'act_menu'   => 'konsultan_nonTol',
            'title'      => 'Kontrak konsultan Non Tol',
            'breadcrumb' => 'konsultan_nonTol',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'action' => site_url('Kontrak_konsultan/act_laporanNonTol'),
            'id_kontrak' => $id_kontrak,
        );
        $this->template->load('template/admin_template', 'konsultan/add_laporan.php', $data);
    }

    public function act_laporanNonTol()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);
        $id_kontrak = $this->input->post('id_kontrak');

        $string_replace = array('/', ';', '[', '&', ']', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $data = array(
            'id_kontrak_konsultan' => $this->input->post('id_kontrak'),
            'jenis_lap' => $this->input->post('jenis_lap'),
            'bulan' => $this->input->post('bulan'),
            'tanggal_lap' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'keterangan' => $this->input->post('keterangan'),
            'dok_file' => $eks_file,
            'create_date' => date('Y-m-d h:i:s'),
            'kantor' => $this->input->post('lokasi'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'),
            'pic' => $this->input->post('pic'),
        );

        $uploadPath = 'file_uploads/laporan_konsultan/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->insert('laporan_konsultan', $data);
            echo $this->session->set_flashdata('msg', 'success');
        } else {
            echo $this->session->set_flashdata('msg', 'error');
        }

        // $error = array('error' => $this->upload->display_errors());
        // print_r($error); exit();

        redirect('Kontrak_konsultan/laporanNonTol/' . $id_kontrak);
    }

    public function hapus_laporanNonTol($id, $id_kontrak)
    {
        $this->db->where('id_laporan', $id);
        if ($this->db->delete('laporan_konsultan')) {
            $this->session->set_flashdata('message_success', 'Data Berhasil Di Hapus');
        } else {
            $this->session->set_flashdata('message_error', 'Data Gagal Di Hapus');
        }
        redirect('Kontrak_konsultan/laporanNonTol/' . $id_kontrak);
    }

    public function edit_laporan_NonTol($id, $id_kontrak)
    {

        $ses_data = array(
            'act_menu'   => 'konsultan_nonTol',
            'title'      => 'Kontrak konsultan_nonTol',
            'breadcrumb' => 'konsultan_nonTol',
        );
        $this->session->set_userdata($ses_data);

        $row = $this->M_kontrak->get_lapKonsultan_byId($id);

        if ($row) {

            $data = array(
                'action' => site_url('Kontrak_konsultan/act_update_laporanNonTol'),
                'id_kontrak' => $row->id_kontrak_konsultan,
                'id_laporan' => $row->id_laporan,
                'jenis_lap' => $row->jenis_lap,
                'bulan' => $row->bulan,
                'tanggal_lap' => $row->tanggal_lap,
                'keterangan' => $row->keterangan,
                'dok_file' => $row->dok_file,
                'kantor' => $row->kantor,
                'pic' => $row->pic,
                'no_rak' => $row->no_rak,
                'no_box' => $row->no_box,
            );
        }


        $this->template->load('template/admin_template', 'konsultan/update_laporan.php', $data);
    }

    function act_update_laporanNonTol()
    {
        $config = array();
        $id_kontrak = $this->input->post('id_kontrak');
        $id_laporan = $this->input->post('id_laporan');

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $data = array(
            'jenis_lap' => $this->input->post('jenis_lap'),
            'bulan' => $this->input->post('bulan'),
            'tanggal_lap' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'keterangan' => $this->input->post('keterangan'),
            'dok_file' => $eks_file,
            'kantor' => $this->input->post('lokasi'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'),
            'pic' => $this->input->post('pic'),
        );

        $data2 = array(
            'jenis_lap' => $this->input->post('jenis_lap'),
            'bulan' => $this->input->post('bulan'),
            'tanggal_lap' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'keterangan' => $this->input->post('keterangan'),
            'kantor' => $this->input->post('lokasi'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'),
            'pic' => $this->input->post('pic'),
        );

        $uploadPath = 'file_uploads/laporan_konsultan/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->where('id_laporan', $id_laporan);
            if ($this->db->update('laporan_konsultan', $data)) {
                echo $this->session->set_flashdata('msg', 'success');
            } else {
                echo $this->session->set_flashdata('msg', 'error');
            }
        } else {
            // print_r($data2); exit();
            $this->db->where('id_laporan', $id_laporan);
            if ($this->db->update('laporan_konsultan', $data2)) {
                echo $this->session->set_flashdata('msg', 'success');
            } else {
                echo $this->session->set_flashdata('msg', 'error');
            }
        }


        redirect('Kontrak_konsultan/laporanNonTol/' . $id_kontrak);
    }

    public function laporanPeralatan($id_kontrak)
    {
        $ses_data = array(
            'act_menu'   => 'peralatanTol',
            'title'      => 'Kontrak Peralatan Tol',
            'breadcrumb' => 'peralatanTol',
        );
        $this->session->set_userdata($ses_data);
        $nama = $this->db->query('select nama_kontrak from tb_kontrak_konsultan where id_kontrak_konsultan=' . $id_kontrak)->row();
        $data = array(
            'id_kontrak' => $id_kontrak,
            'nama_kontrak' => $nama->nama_kontrak,
            'row' => $this->M_kontrak->get_lapKonsultan($id_kontrak),
            'aksi' => 'add_laporanPeralatan',
            'hapus' => 'hapus_laporanPeralatan',
            'edit' => 'edit_laporanPeralatan',
        );
        $this->template->load('template/admin_template', 'konsultan/v_laporan.php', $data);
    }

    public function add_laporanPeralatan($id_kontrak)
    {
        $ses_data = array(
            'act_menu'   => 'peralatanTol',
            'title'      => 'Kontrak Peralatan Tol',
            'breadcrumb' => 'peralatanTol',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'action' => site_url('Kontrak_konsultan/act_laporanPeralatan'),
            'id_kontrak' => $id_kontrak,
        );
        $this->template->load('template/admin_template', 'konsultan/add_laporan.php', $data);
    }

    public function act_laporanPeralatan()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);
        $id_kontrak = $this->input->post('id_kontrak');

        $string_replace = array('/', ';', '[', '&', ']', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $data = array(
            'id_kontrak_konsultan' => $this->input->post('id_kontrak'),
            'jenis_lap' => $this->input->post('jenis_lap'),
            'bulan' => $this->input->post('bulan'),
            'tanggal_lap' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'keterangan' => $this->input->post('keterangan'),
            'dok_file' => $eks_file,
            'create_date' => date('Y-m-d h:i:s'),
            'kantor' => $this->input->post('lokasi'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'),
            'pic' => $this->input->post('pic'),
        );

        $uploadPath = 'file_uploads/laporan_konsultan/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->insert('laporan_konsultan', $data);
            echo $this->session->set_flashdata('msg', 'success');
        } else {
            echo $this->session->set_flashdata('msg', 'error');
        }

        // $error = array('error' => $this->upload->display_errors());
        // print_r($error); exit();

        redirect('Kontrak_konsultan/laporanPeralatan/' . $id_kontrak);
    }

    public function hapus_laporanPeralatan($id, $id_kontrak)
    {
        $this->db->where('id_laporan', $id);
        if ($this->db->delete('laporan_konsultan')) {
            $this->session->set_flashdata('message_success', 'Data Berhasil Di Hapus');
        } else {
            $this->session->set_flashdata('message_error', 'Data Gagal Di Hapus');
        }
        redirect('Kontrak_konsultan/laporanPeralatan/' . $id_kontrak);
    }

    public function edit_laporanPeralatan($id, $id_kontrak)
    {

        $ses_data = array(
            'act_menu'   => 'peralatanTol',
            'title'      => 'Kontrak Peralatan Tol',
            'breadcrumb' => 'peralatanTol',
        );
        $this->session->set_userdata($ses_data);

        $row = $this->M_kontrak->get_lapKonsultan_byId($id);

        if ($row) {

            $data = array(
                'action' => site_url('Kontrak_konsultan/act_update_laporanPeralatan'),
                'id_kontrak' => $row->id_kontrak_konsultan,
                'id_laporan' => $row->id_laporan,
                'jenis_lap' => $row->jenis_lap,
                'bulan' => $row->bulan,
                'tanggal_lap' => $row->tanggal_lap,
                'keterangan' => $row->keterangan,
                'dok_file' => $row->dok_file,
                'kantor' => $row->kantor,
                'pic' => $row->pic,
                'no_rak' => $row->no_rak,
                'no_box' => $row->no_box,
            );
        }


        $this->template->load('template/admin_template', 'konsultan/update_laporan.php', $data);
    }

    function act_update_laporanPeralatan()
    {
        $config = array();
        $id_kontrak = $this->input->post('id_kontrak');
        $id_laporan = $this->input->post('id_laporan');

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $data = array(
            'jenis_lap' => $this->input->post('jenis_lap'),
            'bulan' => $this->input->post('bulan'),
            'tanggal_lap' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'keterangan' => $this->input->post('keterangan'),
            'dok_file' => $eks_file,
            'kantor' => $this->input->post('lokasi'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'),
            'pic' => $this->input->post('pic'),
        );

        $data2 = array(
            'jenis_lap' => $this->input->post('jenis_lap'),
            'bulan' => $this->input->post('bulan'),
            'tanggal_lap' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'keterangan' => $this->input->post('keterangan'),
            'kantor' => $this->input->post('lokasi'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'),
            'pic' => $this->input->post('pic'),
        );

        $uploadPath = 'file_uploads/laporan_konsultan/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->where('id_laporan', $id_laporan);
            if ($this->db->update('laporan_konsultan', $data)) {
                echo $this->session->set_flashdata('msg', 'success');
            } else {
                echo $this->session->set_flashdata('msg', 'error');
            }
        } else {
            // print_r($data2); exit();
            $this->db->where('id_laporan', $id_laporan);
            if ($this->db->update('laporan_konsultan', $data2)) {
                echo $this->session->set_flashdata('msg', 'success');
            } else {
                echo $this->session->set_flashdata('msg', 'error');
            }
        }
        redirect('Kontrak_konsultan/laporanPeralatan/' . $id_kontrak);
    }

    // Update Data Addendum
    function act_update_AddendumKonsultan()
    {
        $config = array();
        $id_addendum = $this->input->post('id_addendum');
        $id_kontrak = $this->input->post('id_kontrak');

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '{', '}', '&', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = 'Addendum-' . $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $data = array(
            'add_ke' => $this->input->post('add_ke'),
            'nomor_dok' => $this->input->post('nomor_dok'),
            'tanggal_dok' => date('Y-m-d', strtotime($this->input->post('tanggal_dok'))),
            'nilai' => str_replace('.', '', $this->input->post('nilai')),
            'dok_file' => $eks_file,
            'keterangan' => $this->input->post('keterangan'),
            'keterangan_justifikasi' => $this->input->post('keterangan_justifikasi'),
        );

        $data2 = array(
            'add_ke' => $this->input->post('add_ke'),
            'nomor_dok' => $this->input->post('nomor_dok'),
            'tanggal_dok' => date('Y-m-d', strtotime($this->input->post('tanggal_dok'))),
            'nilai' => str_replace('.', '', $this->input->post('nilai')),
            'keterangan' => $this->input->post('keterangan'),
            'justifikasi_eks' => $this->input->post('justifikasi_eks'),
        );

        $replace = [
            '.' => '',
            ',' => '.',
        ];

        $data_kon = array(
            'nilai_add' => str_replace(array_keys($replace), $replace, $this->input->post('nilai')),
        );

        $uploadPath = 'file_uploads/kontrak_konsultan/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->db->where('id_kontrak_konsultan', $id_kontrak);
        $this->db->update('tb_kontrak_konsultan', $data_kon);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->where('id_addendum', $id_addendum);
            if ($this->db->update('addendum_konsultan', $data)) {
                echo $this->session->set_flashdata('success', 'Data berhasil diupdate');
            } else {
                echo $this->session->set_flashdata('error', 'Data gagal diupdate');
            }
        } else {
            $this->db->where('id_addendum', $id_addendum);
            if ($this->db->update('addendum_konsultan', $data2)) {
                echo $this->session->set_flashdata('success', 'Data berhasil diupdate');
            } else {
                echo $this->session->set_flashdata('error', 'Data gagal diupdate');
            }
        }

        redirect('Kontrak_konsultan/detail/' . $id_kontrak . '#data_addendum');
    }
}
