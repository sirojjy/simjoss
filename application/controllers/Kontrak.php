<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontrak extends CI_Controller
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

    function getDokumenDasarKontrak()
    {
        $id_kontrak = $this->input->post('id_kontrak');
        $data = $this->M_kontrak->getDokumenDasarKontrak($id_kontrak);
        echo json_encode($data);
    }

    function getDokumenDasarPekerjaan()
    {
        $id_kontrak = $this->input->post('id_kontrak');
        $data = $this->M_kontrak->getDokumenDasarPekerjaan($id_kontrak);
        echo json_encode($data);
    }

    public function index()
    {
        $ses_data = array(
            'act_menu'   => 'kontrak',
            'title'      => 'Kontrak',
            'breadcrumb' => 'kontrak',
        );
        $this->session->set_userdata($ses_data);
        $this->template->load('template/admin_template', 'kontrak/v_kontrak.php');
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


    public function konstruksi()
    {
        $ses_data = array(
            'act_menu'   => 'konstruksi',
            'title'      => 'Kontrak konstruksi',
            'breadcrumb' => 'konstruksi',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'row' => $this->M_kontrak->get_kontrakKonstruksi(),
        );
        $this->template->load('template/admin_template', 'kontrak/v_konstruksi.php', $data);
    }

    public function add_kontrak_konstruksi()
    {
        $ses_data = array(
            'act_menu'   => 'konstruksi',
            'title'      => 'Kontrak konstruksi',
            'breadcrumb' => 'konstruksi',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'action' => site_url('Kontrak/act_kontrakKonstruksi'),
        );
        $this->template->load('template/admin_template', 'kontrak/add_konstruksi.php', $data);
    }
    public function act_kontrakKonstruksi()
    {

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
            'created_at' => date('Y-m-d h:i:s'),
        );

        if ($this->db->insert('tb_kontrak_konstruksi', $data)) {
            $get_last_save_id = $this->db->insert_id();

            $nama_dok = $this->input->post('nama_dok');
            if ($nama_dok != null || $nama_dok != "" || $nama_dok != " ") {
                for ($a = 0; $a < count($nama_dok); $a++) {
                    $data_dok[] = array(
                        'id_kontrak' => $get_last_save_id,
                        'id_dok_master' => $nama_dok[$a],
                    );
                }

                if (count($data_dok) > 0) {
                    $this->db->insert_batch('kelengkapan_dok_konstruksi', $data_dok);
                }
            }

            echo $this->session->set_flashdata('success', 'Data berhasil disimpan');
        } else {
            echo $this->session->set_flashdata('error', 'Data gagal disimpan');
        }

        redirect('Kontrak/konstruksi');
    }

    public function upload_dok_konstruksi($id_kontrak)
    {
        $ses_data = array(
            'act_menu'   => 'konstruksi',
            'title'      => 'Kontrak konstruksi',
            'breadcrumb' => 'konstruksi',
        );
        $this->session->set_userdata($ses_data);
        $nama = $this->db->query('select nama_kontrak from tb_kontrak_konstruksi where id_kontrak_konstruksi=' . $id_kontrak)->row();
        $data = array(
            'id_kontrak' => $id_kontrak,
            'nama_kontrak' => $nama->nama_kontrak,
        );
        $this->template->load('template/admin_template', 'kontrak/upload_dok_konstruksi.php', $data);
    }

    public function act_Upload_dokKonstruksi()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $id_kontrak = $this->input->post('id_kontrak');

        $data = array(
            'id_kontrak_konstruksi' => $id_kontrak,
            'id_dok_master' => $this->input->post('id_dok_master'),
            'nomor_dok' => $this->input->post('nomor_dok'),
            'tanggal_dok' => date('Y-m-d', strtotime($this->input->post('tanggal_dok'))),
            'dok_file' => $eks_file,
            'create_date' => date('Y-m-d h:i:s'),
        );

        $uploadPath = 'file_uploads/kontrak_konstruksi/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->insert('detail_dok_konstruksi', $data);
            echo $this->session->set_flashdata('success', 'Data berhasil disimpan');
        } else {
            echo $this->session->set_flashdata('error', 'Data gagal disimpan');
        }

        // $error = array('error' => $this->upload->display_errors());
        //     print_r($error); exit();

        redirect('Kontrak/upload_dok_konstruksi/' . $id_kontrak);
    }

    public function act_Update_dokKonstruksi()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', '&', ']', '{', '}', '|', '^', '~', ' ', '.', '-');
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

        $uploadPath = 'file_uploads/kontrak_konstruksi/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->where('id_detail_dok', $id_detail_dok);
            if ($this->db->update('detail_dok_konstruksi', $data)) {
                echo $this->session->set_flashdata('success', 'Data berhasil disimpan');
            } else {
                echo $this->session->set_flashdata('error', 'Data gagal disimpan');
            }
        } else {
            // print_r($data2); exit();
            $this->db->where('id_detail_dok', $id_detail_dok);
            if ($this->db->update('detail_dok_konstruksi', $data2)) {
                echo $this->session->set_flashdata('success', 'Data berhasil disimpan');
            } else {
                echo $this->session->set_flashdata('error', 'Data gagal disimpan');
            }
        }

        redirect('Kontrak/upload_dok_konstruksi/' . $id_kontrak);
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
            'id_kontrak_konstruksi' => $id_kontrak,
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

        $uploadPath = 'file_uploads/kontrak_konstruksi/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->insert('detail_dok_konstruksi', $data);
            echo $this->session->set_flashdata('success', 'Data berhasil disimpan');
        } else {
            echo $this->session->set_flashdata('error', 'Data gagal disimpan');
        }

        redirect('Kontrak/upload_dok_konstruksi/' . $id_kontrak);
    }

    public function act_Update_dokLain()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', '&', ']', '{', '}', '|', '^', '~', ' ', '.', '-');
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

        $uploadPath = 'file_uploads/kontrak_konstruksi/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->where('id_detail_dok', $id_detail_dok);
            if ($this->db->update('detail_dok_konstruksi', $data)) {
                echo $this->session->set_flashdata('success', 'Data berhasil diupdate');
            } else {
                echo $this->session->set_flashdata('error', 'Data gagal diupdate');
            }
        } else {
            // print_r($data2); exit();
            $this->db->where('id_detail_dok', $id_detail_dok);
            if ($this->db->update('detail_dok_konstruksi', $data2)) {
                echo $this->session->set_flashdata('success', 'Data berhasil diupdate');
            } else {
                echo $this->session->set_flashdata('error', 'Data gagal diupdate');
            }
        }

        redirect('Kontrak/upload_dok_konstruksi/' . $id_kontrak);
    }

    public function hapus_dokLain_konstruksi($id_kontrak, $id)
    {
        $this->db->where('id_detail_dok', $id);
        if ($this->db->delete('detail_dok_konstruksi')) {
            $this->session->set_flashdata('success', 'Data Berhasil Di Hapus');
        } else {
            $this->session->set_flashdata('error', 'Data Gagal Di Hapus');
        }
        redirect('Kontrak/upload_dok_konstruksi/' . $id_kontrak);
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

        $data = array(
            'id_kontrak' => $id_kontrak,
            'add_ke' => $this->input->post('add_ke'),
            'nomor_dok' => $this->input->post('nomor_dok'),
            'tanggal_dok' => date('Y-m-d', strtotime($this->input->post('tanggal_dok'))),
            'nilai' => str_replace('.', '', $this->input->post('nilai')),
            'dok_file' => $eks_file,
            'keterangan' => $this->input->post('keterangan'),
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
            $this->db->insert('addendum_konsultan', $data);
            echo $this->session->set_flashdata('success', 'Data berhasil disimpan');
        } else {
            echo $this->session->set_flashdata('error', 'Data gagal disimpan');
        }
        redirect('Kontrak/konsultan');
    }

    public function act_add_TahapanAddendumKonstruksi()
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
            'id_kontrak_konstruksi' => $this->input->post('id_kontrak'),
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

        $uploadPath = 'file_uploads/kontrak_konstruksi/tahapan_kontrak_konstruksi/';

        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('dok_file')) {
            $this->upload->data();
            $this->db->insert('tahapan_addendum_konstruksi', $data);
            echo $this->session->set_flashdata('success', 'Data berhasil disimpan');
        } else {
            echo $this->session->set_flashdata('error', 'Data gagal disimpan');
        }

        redirect('Kontrak/detail_kon_konstruksi/' . $id_kontrak . '?add_ke=' . $tahapan_add . '#data_addendum');
    }

    public function act_update_dokumen_addendum()
    {
        $id_tahapan_addendum_konstruksi = $this->input->post('id_tahapan_addendum_konstruksi');
        $id_kontrak_konstruksi = $this->input->post('id_kontrak_konstruksi');
        $tahapan_add = $this->input->post('tahapan_add');
        if (empty($id_kontrak_konstruksi)) {
            show_error('ID kontrak tidak ditemukan', 500); // atau redirect ke halaman error
        }

        $dok_file = $_FILES['dok_file']['name'];
        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
        $eks_file = str_replace($string_replace, '_', $dok_file);

        $eks_file = 'TahapanAddendum-' . $eks_file . '_' . date('d-m-Y_h-i-s') . '.pdf';

        $data = array(
            'id_kontrak_konstruksi' => $id_kontrak_konstruksi,
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

        $uploadPath = 'file_uploads/kontrak_konstruksi/tahapan_kontrak_konstruksi/';

        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('dok_file')) {
            $data['dok_file'] = $eks_file;
            $this->upload->data();
            $this->db->where('id_tahapan_addendum_konstruksi', $id_tahapan_addendum_konstruksi);
            if ($this->db->update('tahapan_addendum_konstruksi', $data)) {
                echo $this->session->set_flashdata('success', 'Data berhasil disimpan');
            } else {
                echo $this->session->set_flashdata('error', 'Data gagal disimpan');
            }
        } else {
            $this->db->where('id_tahapan_addendum_konstruksi', $id_tahapan_addendum_konstruksi);
            if ($this->db->update('tahapan_addendum_konstruksi', $data)) {
                echo $this->session->set_flashdata('success', 'Data berhasil disimpan');
            } else {
                echo $this->session->set_flashdata('error', 'Data gagal disimpan');
            }
        }

        redirect('Kontrak/detail_kon_konstruksi/' . $id_kontrak_konstruksi . '?add_ke=' . $tahapan_add . '#data_addendum');
    }

    // function act_update_TahapanAddendumKonstruksi()
    // {
    //     $config = array();
    //     $id_tahapan_addendum_konstruksi = $this->input->post('id_tahapan_addendum_konstruksi');
    //     $id_kontrak = $this->input->post('id_kontrak');

    //     $filename = $_FILES['file']['name'];
    //     $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

    //     $string_replace = array('/', ';', '[', ']', '{', '}', '&', '|', '^', '~', ' ', '.', '-');
    //     $nama = str_replace($string_replace, '_', $filename);
    //     $eks_file = 'TahapanAddendum-' . $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

    //     $data = array(
    //         'tahapan_add' => $this->input->post('tahapan_add'),
    //         'nomor_dok' => $this->input->post('nomor_dok'),
    //         'tanggal_dok' => date('Y-m-d', strtotime($this->input->post('tanggal_dok'))),
    //         'nilai' => str_replace('.', '', $this->input->post('nilai')),
    //         'dok_file' => $eks_file,
    //         'keterangan' => $this->input->post('keterangan'),
    //     );

    //     $data2 = array(
    //         'tahapan_add' => $this->input->post('tahapan_add'),
    //         'nomor_dok' => $this->input->post('nomor_dok'),
    //         'tanggal_dok' => date('Y-m-d', strtotime($this->input->post('tanggal_dok'))),
    //         'nilai' => str_replace('.', '', $this->input->post('nilai')),
    //         'keterangan' => $this->input->post('keterangan'),
    //     );

    //     $uploadPath = 'file_uploads/kontrak_konstruksi/';
    //     $config['upload_path'] = $uploadPath;
    //     $config['allowed_types'] = 'pdf';
    //     $config['max_size'] = 0;
    //     $config['file_name'] = $eks_file;

    //     $this->load->library('upload', $config);
    //     $this->upload->initialize($config);
    //     if ($this->upload->do_upload('file')) {
    //         $this->upload->data();
    //         $this->db->where('id_tahapan_addendum_konstruksi', $id_tahapan_addendum_konstruksi);
    //         if ($this->db->update('tahapan_addendum_konstruksi', $data)) {
    //             echo $this->session->set_flashdata('success', 'Data berhasil disimpan');
    //         } else {
    //             echo $this->session->set_flashdata('error', 'Data gagal disimpan');
    //         }
    //     } else {
    //         // print_r($data2); exit();
    //         $this->db->where('id_tahapan_addendum_konstruksi', $id_tahapan_addendum_konstruksi);
    //         if ($this->db->update('tahapan_addendum_konstruksi', $data2)) {
    //             echo $this->session->set_flashdata('success', 'Data berhasil disimpan');
    //         } else {
    //             echo $this->session->set_flashdata('error', 'Data gagal disimpan');
    //         }
    //     }

    //     redirect('Kontrak/detail_kon_konstruksi/' . $id_kontrak);
    // }


    public function act_add_AddendumKonstruksi()
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
            'keterangan_justifikasi' => $this->input->post('keterangan_justifikasi'),
            'create_date' => date('Y-m-d h:i:s'),
        );

        $data_kon = array(
            'nilai_addendum' => str_replace(array_keys($replace), $replace, $this->input->post('nilai')),
        );

        $uploadPath = 'file_uploads/kontrak_konstruksi/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->insert('addendum_konstruksi', $data);
            $this->db->where('id_kontrak_konstruksi', $id_kontrak);
            $this->db->update('tb_kontrak_konstruksi', $data_kon);
            echo $this->session->set_flashdata('success', 'Data berhasil disimpan');
        } else {
            echo $this->session->set_flashdata('error', 'Data gagal disimpan');
        }

        log_message('data', json_encode($data));

        // $error = array('error' => $this->upload->display_errors());
        // print_r($error);
        // exit();

        redirect('Kontrak/detail_kon_konstruksi/' . $id_kontrak .  '#data_addendum');
    }

    public function update_kontrak($id)
    {

        $ses_data = array(
            'act_menu' => 'konstruksi',
            'title' => 'konstruksi',
            'breadcumb' => 'konstruksi'
        );

        $this->session->set_userdata($ses_data);

        $row2 = $this->M_kontrak->get_kontrak_by_id($id);
        if ($row2) {
            $data = array(
                'action' => site_url('Kontrak/act_update_kontrak'),
                'id_kontrak' => $row2->id_kontrak_konstruksi,
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

        $this->template->load('template/admin_template', 'kontrak/edit_konstruksi', $data);
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

        $result = $this->M_kontrak->update_kontrak($id_kontrak, $data);
        if ($result) {
            echo $this->session->set_flashdata('success', 'Data berhasil disimpan');
        } else {
            echo $this->session->set_flashdata('error', 'Data gagal disimpan');
        }
        // $this->db->where('id_kontrak_konstruksi', $id_kontrak);
        // if ($this->db->update('tb_kontrak_konstruksi', $data)) {
        //     echo $this->session->set_flashdata('success', 'Data berhasil disimpan');
        // } else {
        //     echo $this->session->set_flashdata('error', 'Data gagal disimpan');
        // }

        redirect('Kontrak/konstruksi');
    }

    public function detail_kon_konstruksi($id_kontrak)
    {
        $ses_data = array(
            'act_menu'   => 'konstruksi',
            'title'      => 'Kontrak konstruksi',
            'breadcrumb' => 'konstruksi',
        );
        $this->session->set_userdata($ses_data);
        $nama = $this->db->query('select nama_kontrak from tb_kontrak_konstruksi where id_kontrak_konstruksi=' . $id_kontrak)->row();
        $nilai_terbayar = $this->db->query("select COALESCE(sum(nilai),0) as sum from pembayaran where id_kontrak_konstruksi=" . $id_kontrak)->row()->sum;
        $data_kontrak_konstruksi = $this->db->get_where('tb_kontrak_konstruksi', ['id_kontrak_konstruksi' => $id_kontrak])->result();
        $addendum_available = $this->db->query("SELECT DISTINCT add_ke FROM addendum_konstruksi WHERE id_kontrak = " . $id_kontrak . " ORDER BY add_ke ASC")->result();

        $data = [
            'id_kontrak' => $id_kontrak,
            'nama_kontrak' => $nama->nama_kontrak,
            'row' => $this->M_kontrak->get_pembayaranKonstruksi($id_kontrak),
            'row_mc' => $this->M_kontrak->get_mc($id_kontrak),
            'nilai_terbayar' => $nilai_terbayar,
            'data_kontrak_konstruksi' => $data_kontrak_konstruksi,
            'addendum_available' => $addendum_available,
        ];

        $this->template->load('template/admin_template', 'kontrak/detail_konstruksi.php', $data);
    }

    public function pembayaran($id_kontrak)
    {
        $ses_data = array(
            'act_menu'   => 'konstruksi',
            'title'      => 'Kontrak konstruksi',
            'breadcrumb' => 'konstruksi',
        );
        $this->session->set_userdata($ses_data);
        $nama = $this->db->query('select nama_kontrak from tb_kontrak_konstruksi where id_kontrak_konstruksi=' . $id_kontrak)->row();
        $data = array(
            'id_kontrak' => $id_kontrak,
            'nama_kontrak' => $nama->nama_kontrak,
            'row' => $this->M_kontrak->get_pembayaranKonstruksi($id_kontrak),
        );
        $this->template->load('template/admin_template', 'kontrak/pembayaran_konstruksi.php', $data);
    }

    public function add_pembayaran_konstruksi($id_kontrak)
    {
        $ses_data = array(
            'act_menu'   => 'konstruksi',
            'title'      => 'Kontrak konstruksi',
            'breadcrumb' => 'konstruksi',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'action' => site_url('Kontrak/act_pembayaran'),
            'id_kontrak' => $id_kontrak,
        );
        $this->template->load('template/admin_template', 'kontrak/add_pembayaran_konstruksi.php', $data);
    }

    public function act_pembayaran()
    {
        $id_kontrak = $this->input->post('id_kontrak');
        $id_dok_master = $this->input->post('id_dok_master');
        $nomor_dok = $this->input->post('nomor_dok');
        $tanggal_dok = date('Y-m-d', strtotime($this->input->post('tanggal')));

        $data = array(
            'id_kontrak_konstruksi' => $id_kontrak,
            'termin' => $this->input->post('termin'),
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'keterangan' => $this->input->post('keterangan'),
            'pmn' => $this->input->post('pmn'),
            'nilai' => str_replace('.', '', $this->input->post('nilai')),
            'create_date' => date('Y-m-d h:i:s'),
        );

        // print_r($tanggal_dok); exit();

        $nama_File = $_FILES['file_evidence']['name'];
        $string_replace = array('/', ';', '[', ']', '{', '&', '}', '|', '^', '~', ' ', '-');
        $namaFile = str_replace($string_replace, '_', $nama_File);

        if ($this->db->insert('pembayaran', $data)) {
            $get_last_save_id = $this->db->insert_id();
            for ($i = 0; $i < count($namaFile); $i++) {
                $_FILES['file']['name']     = $_FILES['file_evidence']['name'][$i];
                $_FILES['file']['type']     = $_FILES['file_evidence']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['file_evidence']['tmp_name'][$i];
                $_FILES['file']['error']     = $_FILES['file_evidence']['error'][$i];
                $_FILES['file']['size']     = $_FILES['file_evidence']['size'][$i];

                $uploadPath = 'file_uploads/kontrak_konstruksi/dokumen_pembayaran/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = '*';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('file')) {
                    $fileData = $this->upload->data();
                    $uploadData[$i]['id_pembayaran'] = $get_last_save_id;
                    $uploadData[$i]['id_kontrak_konstruksi'] = $id_kontrak;
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
            if (!empty($uploadData)) {
                $insert = $this->db->insert_batch('detail_dok_konstruksi', $uploadData);
            }
            echo $this->session->set_flashdata('success', 'Data berhasil disimpan');
        } else {
            echo $this->session->set_flashdata('error', 'Data gagal disimpan');
        }

        redirect('Kontrak/pembayaran/' . $id_kontrak);
    }

    public function get_detail_addendum()
    {
        $this->load->model('M_kontrak');
        $id = $this->input->get('idkontrak');
        $year = date('Y');

        $aset = $this->M_kontrak->get_dokumen_konstruksi_by_id($id);
        echo json_encode($aset);
    }

    public function hapus_konstruksi($id)
    {
        $this->db->where('id_kontrak_konstruksi', $id);
        if ($this->db->delete('tb_kontrak_konstruksi')) {
            $this->db->where('id_kontrak', $id);
            $this->db->delete('addendum_konstruksi');
            $this->db->where('id_kontrak_konstruksi', $id);
            $this->db->delete('detail_dok_konstruksi');
            $this->db->where('id_kontrak_konstruksi', $id);
            $this->db->delete('pembayaran');
            $this->db->where('id_kontrak', $id);
            $this->db->delete('kelengkapan_dok_konstruksi');
            $this->db->where('id_kontrak', $id);
            $this->db->delete('mc');
            $this->session->set_flashdata('success', 'Data Berhasil Di Hapus');
        } else {
            $this->session->set_flashdata('error', 'Data Gagal Di Hapus');
        }
        redirect('Kontrak/konstruksi');
    }

    public function get_detail_dokPembayaran()
    {
        $id = $this->input->get('idpembayaran');
        $year = date('Y');

        $aset =  $this->db->query("select dm.id_dok_master, dm.nama_dok, (select dd.dok_file from detail_dok_konstruksi as dd where dd.id_dok_master = dm.id_dok_master and dd.id_pembayaran=" . $id . " order by dd.id_detail_dok desc limit 1) from dok_master as dm where dm.id_dok_master in (76,77,78,79,31,32,33,34) order by dm.id_dok_master asc")->result();

        echo json_encode($aset);
    }

    public function hapus_pembayaran($id, $id_kontrak)
    {
        $this->db->where('id_pembayaran', $id);
        if ($this->db->delete('pembayaran')) {
            $this->db->where('id_pembayaran', $id);
            $this->db->delete('detail_dok_konstruksi');
            $this->session->set_flashdata('success', 'Data Berhasil Di Hapus');
        } else {
            $this->session->set_flashdata('error', 'Data Gagal Di Hapus');
        }
        redirect('Kontrak/pembayaran/' . $id_kontrak);
    }

    public function update_pembayaran($id, $id_kontrak)
    {

        $ses_data = array(
            'act_menu'   => 'konstruksi',
            'title'      => 'Kontrak konstruksi',
            'breadcrumb' => 'konstruksi',
        );
        $this->session->set_userdata($ses_data);

        $row = $this->M_kontrak->get_pembayaranKonsultan_byId($id);

        if ($row) {
            $asset = $this->M_kontrak->get_dokPembayaranKonstruksi($row->id_pembayaran);
            $jenis = array();
            foreach ($asset as $key) {
                $jenis[] = array($key);
            }

            $data = array(
                'action' => site_url('Kontrak/act_update_pembayaran'),
                'id_kontrak' => $id_kontrak,
                'id_pembayaran' => $row->id_pembayaran,
                'termin' => $row->termin,
                'tanggal' => $row->tanggal,
                'keterangan' => $row->keterangan,
                'nilai' => $row->nilai,
                'jenis' => $jenis,
            );
        }


        $this->template->load('template/admin_template', 'kontrak/update_pembayaranKonstruksi.php', $data);
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
            echo $this->session->set_flashdata('success', 'Data berhasil diupdate');
        } else {
            echo $this->session->set_flashdata('error', 'Data gagal diupdate');
        }

        redirect('Kontrak/pembayaran/' . $id_kontrak);
    }

    public function act_UploadPembayaran_edit()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '{', '&', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $id_kontrak = $this->input->post('id_kontrak');
        $id_pembayaran = $this->input->post('id_pembayaran');

        $data = array(
            'id_kontrak_konstruksi' => $id_kontrak,
            'id_dok_master' => $this->input->post('id_dok_master'),
            'nomor_dok' => $this->input->post('nomor_dok'),
            'tanggal_dok' => date('Y-m-d', strtotime($this->input->post('tanggal_dok'))),
            'dok_file' => $eks_file,
            'create_date' => date('Y-m-d h:i:s'),
            'id_pembayaran' => $id_pembayaran,
        );

        $uploadPath = 'file_uploads/kontrak_konstruksi/dokumen_pembayaran/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->insert('detail_dok_konstruksi', $data);
            echo $this->session->set_flashdata('success', 'Data berhasil disimpan');
        } else {
            echo $this->session->set_flashdata('error', 'Data gagal disimpan');
        }

        redirect('Kontrak/update_pembayaran/' . $id_pembayaran . '/' . $id_kontrak);
    }

    public function act_dokPembayaran_edit()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '{', '}', '&', '|', '^', '~', ' ', '.', '-');
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

        $uploadPath = 'file_uploads/kontrak_konstruksi/dokumen_pembayaran/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->where('id_detail_dok', $id_detail_dok);
            if ($this->db->update('detail_dok_konstruksi', $data)) {
                echo $this->session->set_flashdata('success', 'Data berhasil disimpan');
            } else {
                echo $this->session->set_flashdata('error', 'Data gagal disimpan');
            }
        } else {
            // print_r($data2); exit();
            $this->db->where('id_detail_dok', $id_detail_dok);
            if ($this->db->update('detail_dok_konstruksi', $data2)) {
                echo $this->session->set_flashdata('success', 'Data berhasil disimpan');
            } else {
                echo $this->session->set_flashdata('error', 'Data gagal disimpan');
            }
        }

        redirect('Kontrak/update_pembayaran/' . $id_pembayaran . '/' . $id_kontrak);
    }

    public function hapus_addendum($id, $id_kontrak)
    {
        $check = $this->db->get_where('addendum_konstruksi', ['id_addendum' => $id])->num_rows();
        if ($check > 0) {
            $this->session->set_flashdata('error', 'Data Gagal Di Hapus Karena Memiliki Dokumen Addendum');
        } else {
            $this->db->where('id_addendum', $id);
            if ($this->db->delete('addendum_konstruksi')) {
                $this->session->set_flashdata('success', 'Data Berhasil Di Hapus');
            } else {
                $this->session->set_flashdata('error', 'Data Gagal Di Hapus');
            }
        }
        redirect('Kontrak/detail_kon_konstruksi/' . $id_kontrak . '#data_addendum');
    }

    function act_update_AddendumKonstruksi()
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
            'keterangan_justifikasi' => $this->input->post('keterangan_justifikasi'),
        );

        $replace = [
            '.' => '',
            ',' => '.',
        ];

        $data_kon = array(
            'nilai_addendum' => str_replace(array_keys($replace), $replace, $this->input->post('nilai')),
        );

        $uploadPath = 'file_uploads/kontrak_konstruksi/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->db->where('id_kontrak_konstruksi', $id_kontrak);
        $this->db->update('tb_kontrak_konstruksi', $data_kon);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->where('id_addendum', $id_addendum);
            if ($this->db->update('addendum_konstruksi', $data)) {
                echo $this->session->set_flashdata('success', 'Data berhasil diupdate');
            } else {
                echo $this->session->set_flashdata('error', 'Data gagal diupdate');
            }
        } else {
            // print_r($data2); exit();
            $this->db->where('id_addendum', $id_addendum);
            if ($this->db->update('addendum_konstruksi', $data2)) {
                echo $this->session->set_flashdata('success', 'Data berhasil diupdate');
            } else {
                echo $this->session->set_flashdata('error', 'Data gagal diupdate');
            }
        }


        redirect('Kontrak/detail_kon_konstruksi/' . $id_kontrak);
    }


    function act_update_AddendumNonTol()
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
        );

        $data2 = array(
            'add_ke' => $this->input->post('add_ke'),
            'nomor_dok' => $this->input->post('nomor_dok'),
            'tanggal_dok' => date('Y-m-d', strtotime($this->input->post('tanggal_dok'))),
            'nilai' => str_replace('.', '', $this->input->post('nilai')),
            'keterangan' => $this->input->post('keterangan'),
        );

        $uploadPath = 'file_uploads/konstruksi_nonTol/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->where('id_addendum', $id_addendum);
            if ($this->db->update('addendum_konsnontol', $data)) {
                echo $this->session->set_flashdata('success', 'Data berhasil diupdate');
            } else {
                echo $this->session->set_flashdata('error', 'Data gagal diupdate');
            }
        } else {
            // print_r($data2); exit();
            $this->db->where('id_addendum', $id_addendum);
            if ($this->db->update('addendum_konsnontol', $data2)) {
                echo $this->session->set_flashdata('success', 'Data berhasil diupdate');
            } else {
                echo $this->session->set_flashdata('error', 'Data gagal diupdate');
            }
        }


        redirect('Kontrak/detailNonTol/' . $id_kontrak);
    }

    /// Kontrak Konstruksi Non Tol


    public function add_konstruksiNonTol()
    {
        $ses_data = array(
            'act_menu'   => 'konstruksi_nonTol',
            'title'      => 'Kontrak konstruksi',
            'breadcrumb' => 'konstruksi_nonTol',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'action' => site_url('Kontrak/act_konstruksiNonTol'),
        );
        $this->template->load('template/admin_template', 'kontrak/add_konstruksiNonTol.php', $data);
    }

    public function act_konstruksiNonTol()
    {

        $data = array(
            'jenis' => $this->input->post('jenis'),
            'nama_kontrak' => $this->input->post('nama_kontrak'),
            'nomor_kontrak' => $this->input->post('nomor_kontrak'),
            'tanggal_mulai' => date('Y-m-d', strtotime($this->input->post('tanggal_awal'))),
            'tanggal_akhir' => date('Y-m-d', strtotime($this->input->post('tanggal_akhir'))),
            'pihak_pertama' => $this->input->post('pihak1'),
            'pihak_kedua' => $this->input->post('pihak2'),
            'lingkup' => $this->input->post('lingkup'),
            'nilai_kontrak' => str_replace('.', '', $this->input->post('nilai')),
            'nilai_add' => str_replace('.', '', $this->input->post('nilai')),
            'lokasi' => $this->input->post('lokasi'),
            'seksi' => $this->input->post('seksi'),
            'create_date' => date('Y-m-d h:i:s'),
        );

        if ($this->db->insert('kontrak_konstruksi_nontol', $data)) {
            echo $this->session->set_flashdata('success', 'Data berhasil disimpan');
        } else {
            echo $this->session->set_flashdata('error', 'Data gagal disimpan');
        }

        redirect('Kontrak/nonTol');
    }

    public function hapus_konstruksiNonTol($id)
    {
        $this->db->where('id_kontrak_nontol', $id);
        if ($this->db->delete('kontrak_konstruksi_nontol')) {
            $this->db->where('id_kontrak', $id);
            $this->db->delete('addendum_konsnontol');
            $this->db->where('id_kontrak_nontol', $id);
            $this->db->delete('detail_dok_nontol');
            $this->db->where('id_kontrak_konstruksinontol', $id);
            $this->db->delete('pembayaran');
            $this->session->set_flashdata('success', 'Data Berhasil Di Hapus');
        } else {
            $this->session->set_flashdata('error', 'Data Gagal Di Hapus');
        }
        redirect('Kontrak/nonTol');
    }

    public function act_add_AddendumNonTol()
    {
        $config = array();
        $config2 = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $filename2 = $_FILES['file_eks']['name'];
        $ekstensi_file2 = substr(strtolower(strrchr($filename2, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = 'Addendum-' . $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $nama2 = str_replace($string_replace, '_', $filename2);
        $eks_file2 = 'Justifikasi-Eksternal-' . $nama2 . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file2;

        $id_kontrak = $this->input->post('id_kontrak');

        $data = array(
            'id_kontrak' => $id_kontrak,
            'add_ke' => $this->input->post('add_ke'),
            'nomor_dok' => $this->input->post('nomor_dok'),
            'tanggal_dok' => date('Y-m-d', strtotime($this->input->post('tanggal_dok'))),
            'nilai' => str_replace('.', '', $this->input->post('nilai')),
            'dok_file' => $eks_file,
            'keterangan' => $this->input->post('keterangan'),
            'justifikasi_eks' => $this->input->post('justifikasi_eks'),
            'file_eksternal' => $eks_file2,
            'create_date' => date('Y-m-d h:i:s'),
        );

        $data_kon = array(
            'nilai_add' => str_replace('.', '', $this->input->post('nilai')),
        );

        $uploadPath = 'file_uploads/konstruksi_nonTol/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $config2['upload_path'] = $uploadPath;
        $config2['allowed_types'] = 'pdf';
        $config2['max_size'] = 0;
        $config2['file_name'] = $eks_file2;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->load->library('upload', $config2);
        $this->upload->initialize($config2);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->insert('addendum_konsnontol', $data);
            $this->db->where('id_kontrak_nontol', $id_kontrak);
            $this->db->update('kontrak_konstruksi_nontol', $data_kon);
            echo $this->session->set_flashdata('success', 'Data berhasil disimpan');
        } else {
            echo $this->session->set_flashdata('error', 'Data gagal disimpan');
        }

        // $error = array('error' => $this->upload->display_errors());
        //     print_r($error); exit();

        redirect('Kontrak/nonTol');
    }

    public function get_detail_addendumNonTol()
    {

        $id = $this->input->get('idkontrak');
        $year = date('Y');
        $aset =  $this->db->query(" select * from addendum_konsnontol where id_kontrak=" . $id . "order by add_ke ASC")->result();
        echo json_encode($aset);
    }

    public function upload_dok_nonTol($id_kontrak)
    {
        $ses_data = array(
            'act_menu'   => 'konstruksi_nonTol',
            'title'      => 'Kontrak konstruksi',
            'breadcrumb' => 'konstruksi_nonTol',
        );
        $this->session->set_userdata($ses_data);
        $nama = $this->db->query('select nama_kontrak from kontrak_konstruksi_nontol where id_kontrak_nontol=' . $id_kontrak)->row();
        $data = array(
            'id_kontrak' => $id_kontrak,
            'nama_kontrak' => $nama->nama_kontrak,
        );
        $this->template->load('template/admin_template', 'kontrak/upload_dok_konsNonTol.php', $data);
    }

    public function act_Upload_dokLainNonTol()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $id_kontrak = $this->input->post('id_kontrakLain');

        $data_nontol = array(
            'id_kontrak_nontol' => $id_kontrak,
            'id_dok_master' => 100,
            'nomor_dok' => $this->input->post('nomor_dok'),
            'keterangan' => $this->input->post('nama_dok'),
            'tanggal_dok' => date('Y-m-d', strtotime($this->input->post('tanggal_dok'))),
            'dok_file' => $eks_file,
            'create_date' => date('Y-m-d h:i:s'),
            'kantor' => $this->input->post('kantor'),
            'no_rak' => $this->input->post('no_rak'),
            'no_box' => $this->input->post('no_box'),
            'pic' => $this->input->post('pic'),
        );

        $uploadPath = 'file_uploads/konstruksi_nonTol/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            // print_r($data_nontol); exit();
            $this->db->insert('detail_dok_nontol', $data_nontol);
            echo $this->session->set_flashdata('success', 'Data berhasil disimpan');
        } else {
            echo $this->session->set_flashdata('error', 'Data gagal disimpan');
        }

        // $error = array('error' => $this->upload->display_errors());
        //     print_r($error); exit();

        redirect('Kontrak/upload_dok_nonTol/' . $id_kontrak);
    }

    public function act_Update_dokLainNonTol()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', '&', ']', '{', '}', '|', '^', '~', ' ', '.', '-');
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

        $uploadPath = 'file_uploads/konstruksi_nonTol/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->where('id_detail_dok', $id_detail_dok);
            if ($this->db->update('detail_dok_nontol', $data)) {
                echo $this->session->set_flashdata('success', 'Data berhasil diupdate');
            } else {
                echo $this->session->set_flashdata('error', 'Data gagal diupdate');
            }
        } else {
            // print_r($data2); exit();
            $this->db->where('id_detail_dok', $id_detail_dok);
            if ($this->db->update('detail_dok_nontol', $data2)) {
                echo $this->session->set_flashdata('success', 'Data berhasil diupdate');
            } else {
                echo $this->session->set_flashdata('error', 'Data gagal diupdate');
            }
        }

        redirect('Kontrak/upload_dok_nonTol/' . $id_kontrak);
    }

    public function hapus_dokLain_konsNonTol($id_kontrak, $id)
    {
        $this->db->where('id_detail_dok', $id);
        if ($this->db->delete('detail_dok_nontol')) {
            $this->session->set_flashdata('success', 'Data Berhasil Di Hapus');
        } else {
            $this->session->set_flashdata('error', 'Data Gagal Di Hapus');
        }
        redirect('Kontrak/upload_dok_nonTol/' . $id_kontrak);
    }

    public function act_Upload_dokNonTol()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $id_kontrak = $this->input->post('id_kontrak');

        $data = array(
            'id_kontrak_nontol' => $id_kontrak,
            'id_dok_master' => $this->input->post('id_dok_master'),
            'nomor_dok' => $this->input->post('nomor_dok'),
            'tanggal_dok' => date('Y-m-d', strtotime($this->input->post('tanggal_dok'))),
            'dok_file' => $eks_file,
            'create_date' => date('Y-m-d h:i:s'),
            'kantor' => $this->input->post('kantor'),
            'no_rak' => $this->input->post('no_rak'),
            'no_box' => $this->input->post('no_box'),
            'pic' => $this->input->post('pic'),
        );

        $uploadPath = 'file_uploads/konstruksi_nonTol/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->insert('detail_dok_nontol', $data);
            echo $this->session->set_flashdata('success', 'Data berhasil disimpan');
        } else {
            echo $this->session->set_flashdata('error', 'Data gagal disimpan');
        }

        // $error = array('error' => $this->upload->display_errors());
        //     print_r($error); exit();

        redirect('Kontrak/upload_dok_nonTol/' . $id_kontrak);
    }

    public function act_Update_dokNonTol()
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

        $uploadPath = 'file_uploads/konstruksi_nonTol/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->where('id_detail_dok', $id_detail_dok);
            if ($this->db->update('detail_dok_nontol', $data)) {
                echo $this->session->set_flashdata('success', 'Data berhasil diupdate');
            } else {
                echo $this->session->set_flashdata('error', 'Data gagal diupdate');
            }
        } else {
            // print_r($data2); exit();
            $this->db->where('id_detail_dok', $id_detail_dok);
            if ($this->db->update('detail_dok_nontol', $data2)) {
                echo $this->session->set_flashdata('success', 'Data berhasil diupdate');
            } else {
                echo $this->session->set_flashdata('error', 'Data gagal diupdate');
            }
        }

        redirect('Kontrak/upload_dok_nonTol/' . $id_kontrak);
    }

    public function update_kontrakNonTol($id)
    {

        $ses_data = array(
            'act_menu' => 'konstruksi_nonTol',
            'title' => 'konstruksi_nonTol',
            'breadcumb' => 'konstruksi_nonTol'
        );

        $this->session->set_userdata($ses_data);

        $row2 = $this->M_kontrak->get_konstruksiNonTol_byId($id);
        if ($row2) {
            $data = array(
                'action' => site_url('Kontrak/act_update_kontrakNonTol'),
                'id_kontrak' => $row2->id_kontrak_nontol,
                'nama_kontrak' => $row2->nama_kontrak,
                'nomor_kontrak' => $row2->nomor_kontrak,
                'tanggal_mulai' => $row2->tanggal_mulai,
                'tanggal_akhir' => $row2->tanggal_akhir,
                'pihak_pertama' => $row2->pihak_pertama,
                'pihak_kedua' => $row2->pihak_kedua,
                'lingkup' => $row2->lingkup,
                'nilai' => $row2->nilai_kontrak,
                'lokasi' => $row2->lokasi,
                'seksi' => $row2->seksi,
                'jenis' => $row2->jenis,
            );
        }

        $this->template->load('template/admin_template', 'kontrak/edit_konstruksiNonTol', $data);
    }

    public function act_update_kontrakNonTol()
    {
        $id_kontrak = $this->input->post('id_kontrak');

        $config = array();
        $data = array(
            'jenis' => $this->input->post('jenis'),
            'nama_kontrak' => $this->input->post('nama_kontrak'),
            'lokasi' => $this->input->post('lokasi'),
            'nomor_kontrak' => $this->input->post('nomor_kontrak'),
            'tanggal_mulai' => date('Y-m-d', strtotime($this->input->post('tanggal_awal'))),
            'tanggal_akhir' => date('Y-m-d', strtotime($this->input->post('tanggal_akhir'))),
            'pihak_pertama' => $this->input->post('pihak1'),
            'pihak_kedua' => $this->input->post('pihak2'),
            'lingkup' => $this->input->post('lingkup'),
            'seksi' => $this->input->post('seksi'),
            'nilai_kontrak' => str_replace('.', '', $this->input->post('nilai')),
        );


        $this->db->where('id_kontrak_nontol', $id_kontrak);
        if ($this->db->update('kontrak_konstruksi_nontol', $data)) {
            echo $this->session->set_flashdata('success', 'Data berhasil diupdate');
        } else {
            echo $this->session->set_flashdata('error', 'Data gagal diupdate');
        }

        redirect('Kontrak/nonTol');
    }

    public function pembayaran_nonTol($id_kontrak)
    {
        $ses_data = array(
            'act_menu'   => 'konstruksi_nonTol',
            'title'      => 'Kontrak konstruksi',
            'breadcrumb' => 'konstruksi_nonTol',
        );
        $this->session->set_userdata($ses_data);
        $nama = $this->db->query('select nama_kontrak from kontrak_konstruksi_nontol where id_kontrak_nontol=' . $id_kontrak)->row();
        $data = array(
            'id_kontrak' => $id_kontrak,
            'nama_kontrak' => $nama->nama_kontrak,
            'row' => $this->M_kontrak->get_pembayaranKonstruksiNonTol($id_kontrak),
        );
        $this->template->load('template/admin_template', 'kontrak/pembayaran_nonTol.php', $data);
    }

    public function add_pembayaranNonTol($id_kontrak)
    {
        $ses_data = array(
            'act_menu'   => 'konstruksi_nonTol',
            'title'      => 'Kontrak konstruksi',
            'breadcrumb' => 'konstruksi_nonTol',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'action' => site_url('Kontrak/act_pembayaraNonTol'),
            'id_kontrak' => $id_kontrak,
        );
        $this->template->load('template/admin_template', 'kontrak/add_pembayaran_nonTol.php', $data);
    }

    public function act_pembayaraNonTol()
    {
        $id_kontrak = $this->input->post('id_kontrak');
        $id_dok_master = $this->input->post('id_dok_master');
        $nomor_dok = $this->input->post('nomor_dok');
        $tanggal_dok = date('Y-m-d', strtotime($this->input->post('tanggal')));

        $data = array(
            'id_kontrak_konstruksinontol' => $id_kontrak,
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

                $uploadPath = 'file_uploads/konstruksi_nonTol/dokumen_pembayaran/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = '*';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('file')) {
                    $fileData = $this->upload->data();
                    $uploadData[$i]['id_pembayaran'] = $get_last_save_id;
                    $uploadData[$i]['id_kontrak_nontol'] = $id_kontrak;
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
                $insert = $this->db->insert_batch('detail_dok_nontol', $uploadData);
            }
            echo $this->session->set_flashdata('success', 'Data berhasil disimpan');
        } else {
            echo $this->session->set_flashdata('error', 'Data gagal disimpan');
        }

        redirect('Kontrak/pembayaran_nonTol/' . $id_kontrak);
    }

    public function get_detail_dokPembayaranNonTol()
    {
        $id = $this->input->get('idpembayaran');
        $year = date('Y');

        $aset =  $this->db->query("select dm.id_dok_master, dm.nama_dok, (select dd.dok_file from detail_dok_nontol as dd where dd.id_dok_master = dm.id_dok_master and dd.id_pembayaran=" . $id . " order by dd.id_detail_dok desc limit 1) from dok_master as dm where dm.id_dok_master in (76,77,78,79,31,32,33,34) order by dm.id_dok_master asc")->result();

        echo json_encode($aset);
    }

    public function update_pembayaranNonTol($id, $id_kontrak)
    {

        $ses_data = array(
            'act_menu'   => 'konstruksi_nonTol',
            'title'      => 'Kontrak konstruksi_nonTol',
            'breadcrumb' => 'konstruksi_nonTol',
        );
        $this->session->set_userdata($ses_data);

        $row = $this->M_kontrak->get_pembayaranKonstruksiNonTol_byId($id);

        if ($row) {
            $asset = $this->M_kontrak->get_dokPembayaranKonstruksiNonTol($row->id_pembayaran);
            $jenis = array();
            foreach ($asset as $key) {
                $jenis[] = array($key);
            }

            $data = array(
                'action' => site_url('Kontrak/act_update_pembayaranNonTol'),
                'id_kontrak' => $id_kontrak,
                'id_pembayaran' => $row->id_pembayaran,
                'termin' => $row->termin,
                'tanggal' => $row->tanggal,
                'keterangan' => $row->keterangan,
                'nilai' => $row->nilai,
                'jenis' => $jenis,
            );
        }


        $this->template->load('template/admin_template', 'kontrak/update_pembayaranKonstruksiNonTol.php', $data);
    }

    public function act_UploadPembayaranNonTol_edit()
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
            'id_kontrak_nontol' => $id_kontrak,
            'id_dok_master' => $this->input->post('id_dok_master'),
            'nomor_dok' => $this->input->post('nomor_dok'),
            'tanggal_dok' => date('Y-m-d', strtotime($this->input->post('tanggal_dok'))),
            'dok_file' => $eks_file,
            'create_date' => date('Y-m-d h:i:s'),
            'id_pembayaran' => $id_pembayaran,
        );

        $uploadPath = 'file_uploads/konstruksi_nonTol/dokumen_pembayaran/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->insert('detail_dok_nontol', $data);
            echo $this->session->set_flashdata('success', 'Data berhasil disimpan');
        } else {
            echo $this->session->set_flashdata('error', 'Data gagal disimpan');
        }

        redirect('Kontrak/update_pembayaranNonTol/' . $id_pembayaran . '/' . $id_kontrak);
    }
    public function act_dokPembayaranNonTol_edit()
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

        $uploadPath = 'file_uploads/konstruksi_nonTol/dokumen_pembayaran/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->where('id_detail_dok', $id_detail_dok);
            if ($this->db->update('detail_dok_nontol', $data)) {
                echo $this->session->set_flashdata('success', 'Data berhasil disimpan');
            } else {
                echo $this->session->set_flashdata('error', 'Data gagal disimpan');
            }
        } else {
            // print_r($data2); exit();
            $this->db->where('id_detail_dok', $id_detail_dok);
            if ($this->db->update('detail_dok_nontol', $data2)) {
                echo $this->session->set_flashdata('success', 'Data berhasil disimpan');
            } else {
                echo $this->session->set_flashdata('error', 'Data gagal disimpan');
            }
        }

        redirect('Kontrak/update_pembayaranNonTol/' . $id_pembayaran . '/' . $id_kontrak);
    }

    public function hapus_pembayaranNonTol($id, $id_kontrak)
    {
        $this->db->where('id_pembayaran', $id);
        if ($this->db->delete('pembayaran')) {
            $this->db->where('id_pembayaran', $id);
            $this->db->delete('detail_dok_nontol');
            $this->session->set_flashdata('success', 'Data Berhasil Di Hapus');
        } else {
            $this->session->set_flashdata('error', 'Data Gagal Di Hapus');
        }
        redirect('Kontrak/pembayaran_nonTol/' . $id_kontrak);
    }

    public function dok_lain($id_kontrak)
    {
        $ses_data = array(
            'act_menu'   => 'konstruksi',
            'title'      => 'Kontrak konstruksi',
            'breadcrumb' => 'konstruksi',
        );
        $this->session->set_userdata($ses_data);
        $nama = $this->db->query('select nama_kontrak from tb_kontrak_konstruksi where id_kontrak_konstruksi=' . $id_kontrak)->row();
        $data = array(
            'id_kontrak' => $id_kontrak,
            'nama_kontrak' => $nama->nama_kontrak,
            'row' => $this->M_kontrak->get_dokumenLain($id_kontrak),

        );
        $this->template->load('template/admin_template', 'kontrak/dokumen_lain.php', $data);
    }

    public function add_dokLain($id_kontrak)
    {
        $ses_data = array(
            'act_menu'   => 'konstruksi',
            'title'      => 'Kontrak konstruksi',
            'breadcrumb' => 'konstruksi',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'action' => site_url('Kontrak/act_addDokLain'),
            'id_kontrak' => $id_kontrak,
        );
        $this->template->load('template/admin_template', 'kontrak/add_dokumenLain.php', $data);
    }

    public function act_addDokLain()
    {
        $config = array();

        $id_kontrak = $this->input->post('id_kontrak');

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $data = array(
            'id_kontrak' => $id_kontrak,
            'jenis_dok' => $this->input->post('jenis_dok'),
            'tanggal_dok' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'keterangan' => $this->input->post('nama_dok'),
            'dok_file' => $eks_file,
            'create_date' => date('Y-m-d h:i:s'),
            'kantor' => $this->input->post('lokasi'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'),
        );

        $uploadPath = 'file_uploads/dokumenLain_konstruksi/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->insert('dokumen_lain', $data);
            echo $this->session->set_flashdata('success', 'Data berhasil disimpan');
        } else {
            echo $this->session->set_flashdata('error', 'Data gagal disimpan');
        }

        redirect('Kontrak/dok_lain/' . $id_kontrak);
    }

    public function hapus_dokLain($id, $id_kontrak)
    {
        $this->db->where('id_dok', $id);
        if ($this->db->delete('dokumen_lain')) {
            $this->session->set_flashdata('success', 'Data Berhasil Di Hapus');
        } else {
            $this->session->set_flashdata('error', 'Data Gagal Di Hapus');
        }
        redirect('Kontrak/dok_lain/' . $id_kontrak);
    }

    public function Dok_mc($id_mc)
    {
        $ses_data = array(
            'act_menu'   => 'konstruksi',
            'title'      => 'Kontrak konstruksi',
            'breadcrumb' => 'konstruksi',
        );
        $this->session->set_userdata($ses_data);
        // $nama = $this->db->query('select nama_kontrak from tb_kontrak_konstruksi where id_kontrak_konstruksi='.$id_kontrak)->row();
        $data = array(
            'id_mc' => $id_mc,
            // 'nama_kontrak' => $nama->nama_kontrak,
            'row' => $this->M_kontrak->get_dok_mc($id_mc),
        );
        $this->template->load('template/admin_template', 'kontrak/v_dok_mc.php', $data);
    }

    public function sertifikat_bulanan($id_kontrak)
    {
        $ses_data = array(
            'act_menu'   => 'konstruksi',
            'title'      => 'Kontrak konstruksi',
            'breadcrumb' => 'konstruksi',
        );
        $this->session->set_userdata($ses_data);
        $nama = $this->db->query('select nama_kontrak from tb_kontrak_konstruksi where id_kontrak_konstruksi=' . $id_kontrak)->row();
        $data = array(
            'id_kontrak' => $id_kontrak,
            'nama_kontrak' => $nama->nama_kontrak,
            'row' => $this->M_kontrak->get_mc($id_kontrak),
        );
        $this->template->load('template/admin_template', 'kontrak/sertifikat_bulanan.php', $data);
    }

    public function add_mc($id_kontrak)
    {
        $ses_data = array(
            'act_menu'   => 'konstruksi',
            'title'      => 'Kontrak konstruksi',
            'breadcrumb' => 'konstruksi',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'action' => site_url('Kontrak/act_addMc'),
            'id_kontrak' => $id_kontrak,
        );
        $this->template->load('template/admin_template', 'kontrak/add_mc.php', $data);
    }

    public function act_addMc()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);
        $id_kontrak = $this->input->post('id_kontrak');

        $string_replace = array('/', ';', '[', '&', ']', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $data = array(
            'id_kontrak' => $id_kontrak,
            'nomor_mc' => $this->input->post('mc_no'),
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'keterangan' => $this->input->post('keterangan'),
            'bulan' => $this->input->post('bulan'),
            'tahun' => $this->input->post('tahun'),
            'dok_file' => $eks_file,
            'create_date' => date('Y-m-d h:i:s'),
            'kantor' => $this->input->post('lokasi'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'),
            // 'pic' => $this->input->post('pic'),            
        );

        $data2 = array(
            'id_kontrak' => $id_kontrak,
            'nomor_mc' => $this->input->post('mc_no'),
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'keterangan' => $this->input->post('keterangan'),
            'bulan' => $this->input->post('bulan'),
            'tahun' => $this->input->post('tahun'),
            'create_date' => date('Y-m-d h:i:s'),
            'kantor' => $this->input->post('lokasi'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'),
            // 'pic' => $this->input->post('pic'),            
        );

        $uploadPath = 'file_uploads/mc/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;


        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            if ($this->db->insert('mc', $data)) {
                echo $this->session->set_flashdata('success', 'Data berhasil disimpan');
            } else {
                echo $this->session->set_flashdata('error', 'Data gagal disimpan');
            }
        } else {
            if ($this->db->insert('mc', $data2)) {
                echo $this->session->set_flashdata('success', 'Data berhasil disimpan');
            } else {
                echo $this->session->set_flashdata('error', 'Data gagal disimpan');
            }
        }

        // $error = array('error' => $this->upload->display_errors());
        // print_r($error); exit();

        redirect('Kontrak/sertifikat_bulanan/' . $id_kontrak);
    }

    public function act_addDokMc()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);
        $id_kontrak = $this->input->post('id_kontrak');
        $id_mc = $this->input->post('id_mc');

        $string_replace = array('/', ';', '[', '&', ']', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $data = array(
            'id_kontrak_konstruksi' => $id_kontrak,
            'id_mc' => $id_mc,
            'id_dok_master' => $this->input->post('id_dok_master'),
            'tanggal_dok' => date('Y-m-d'),
            'keterangan' => $this->input->post('keterangan'),
            'dok_file' => $eks_file,
            'create_date' => date('Y-m-d h:i:s'),
            'jml_halaman' => $this->input->post('halaman'),
            'pic' => $this->input->post('pic'),
            'kantor' => $this->input->post('kantor'),
            'no_rak' => $this->input->post('no_rak'),
            'no_box' => $this->input->post('no_box'),
        );

        $uploadPath = 'file_uploads/mc/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->insert('detail_dok_konstruksi', $data);
            echo $this->session->set_flashdata('success', 'Data berhasil disimpan');
        } else {
            echo $this->session->set_flashdata('error', 'Data gagal disimpan');
        }

        // $error = array('error' => $this->upload->display_errors());
        // print_r($error); exit();

        redirect('Kontrak/sertifikat_bulanan/' . $id_kontrak);
    }

    public function hapus_mc($id, $id_kontrak)
    {
        $this->db->where('id_mc', $id);
        if ($this->db->delete('mc')) {
            $this->db->where('id_mc', $id);
            $this->db->delete('detail_dok_konstruksi');
            $this->session->set_flashdata('success', 'Data Berhasil Di Hapus');
        } else {
            $this->session->set_flashdata('error', 'Data Gagal Di Hapus');
        }
        redirect('Kontrak/sertifikat_bulanan/' . $id_kontrak);
    }

    public function update_mc($id, $id_kontrak)
    {
        $ses_data = array(
            'act_menu'   => 'konstruksi',
            'title'      => 'konstruksi',
            'breadcrumb' => 'konstruksi',
        );
        $this->session->set_userdata($ses_data);
        $row2 = $this->M_kontrak->get_mc_by_id($id);
        if ($row2) {
            $data = array(
                'action' => site_url('Kontrak/act_updateMc'),
                'id_mc' => $row2->id_mc,
                'id_kontrak' => $row2->id_kontrak,
                'tanggal' => $row2->tanggal,
                'nomor_mc' => $row2->nomor_mc,
                'file' => $row2->dok_file,
                'bulan' => $row2->bulan,
                'tahun' => $row2->tahun,
                'keterangan' => $row2->keterangan,
                'kantor' => $row2->kantor,
                // 'pic' => $row2->pic,
                'no_rak' => $row2->no_rak,
                'no_box' => $row2->no_box,
            );
        }
        $this->template->load('template/admin_template', 'kontrak/update_mc.php', $data);
    }

    function act_updateMc()
    {
        $config = array();
        $id_mc = $this->input->post('id_mc');
        $id_kontrak = $this->input->post('id_kontrak');

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $data = array(
            'nomor_mc' => $this->input->post('mc_no'),
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'keterangan' => $this->input->post('keterangan'),
            'bulan' => $this->input->post('bulan'),
            'tahun' => $this->input->post('tahun'),
            'dok_file' => $eks_file,
            'kantor' => $this->input->post('lokasi'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'),
        );

        $data2 = array(
            'nomor_mc' => $this->input->post('mc_no'),
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'keterangan' => $this->input->post('keterangan'),
            'bulan' => $this->input->post('bulan'),
            'tahun' => $this->input->post('tahun'),
            'kantor' => $this->input->post('lokasi'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'),
        );

        $uploadPath = 'file_uploads/mc/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->where('id_mc', $id_mc);
            if ($this->db->update('mc', $data)) {
                echo $this->session->set_flashdata('success', 'Data berhasil disimpan');
            } else {
                echo $this->session->set_flashdata('error', 'Data gagal disimpan');
            }
        } else {
            // print_r($data2); exit();
            $this->db->where('id_mc', $id_mc);
            if ($this->db->update('mc', $data2)) {
                echo $this->session->set_flashdata('success', 'Data berhasil disimpan');
            } else {
                echo $this->session->set_flashdata('error', 'Data gagal disimpan');
            }
        }


        redirect('Kontrak/sertifikat_bulanan/' . $id_kontrak);
    }

    function act_update_DokMc()
    {
        $config = array();
        $id_detail_dok = $this->input->post('id_detail_dok');
        $id_mc = $this->input->post('id_mc');

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $data = array(
            'keterangan' => $this->input->post('keterangan'),
            'jml_halaman' => $this->input->post('jml_halaman'),
            'pic' => $this->input->post('pic'),
            'dok_file' => $eks_file,
            'kantor' => $this->input->post('kantor'),
            'no_rak' => $this->input->post('no_rak'),
            'no_box' => $this->input->post('no_box'),
        );

        $data2 = array(
            'keterangan' => $this->input->post('keterangan'),
            'jml_halaman' => $this->input->post('jml_halaman'),
            'pic' => $this->input->post('pic'),
            'kantor' => $this->input->post('kantor'),
            'no_rak' => $this->input->post('no_rak'),
            'no_box' => $this->input->post('no_box'),
        );

        $uploadPath = 'file_uploads/mc/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->where('id_detail_dok', $id_detail_dok);
            if ($this->db->update('detail_dok_konstruksi', $data)) {
                echo $this->session->set_flashdata('success', 'Data berhasil disimpan');
            } else {
                echo $this->session->set_flashdata('error', 'Data gagal disimpan');
            }
        } else {
            // print_r($data2); exit();
            $this->db->where('id_detail_dok', $id_detail_dok);
            if ($this->db->update('detail_dok_konstruksi', $data2)) {
                echo $this->session->set_flashdata('success', 'Data berhasil disimpan');
            } else {
                echo $this->session->set_flashdata('error', 'Data gagal disimpan');
            }
        }


        redirect('Kontrak/Dok_Mc/' . $id_mc);
    }

    public function get_detaildokMc()
    {

        $id = $this->input->get('idmc');
        $year = date('Y');

        $aset =  $this->db->query(" select * from detail_dok_konstruksi join dok_master on dok_master.id_dok_master=detail_dok_konstruksi.id_dok_master where id_mc=" . $id)->result();
        echo json_encode($aset);
    }

    public function lainnya()
    {
        $ses_data = array(
            'act_menu'   => 'lainnya',
            'title'      => 'Kontrak Lainnya',
            'breadcrumb' => 'lainnya',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'row' => $this->M_kontrak->get_kontrakLainnya(),
        );
        $this->template->load('template/admin_template', 'kontrak/v_lainnya.php', $data);
    }

    public function add_kontrakLainnya()
    {
        $ses_data = array(
            'act_menu'   => 'lainnya',
            'title'      => 'Kontrak lainnya',
            'breadcrumb' => 'lainnya',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'action' => site_url('Kontrak/act_kontrakLainnya'),
        );
        $this->template->load('template/admin_template', 'kontrak/add_kontrakLainnya.php', $data);
    }

    public function act_kontrakLainnya()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', '&', ']', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $data = array(
            'nama_kontrak' => $this->input->post('nama_kontrak'),
            'nomor_kontrak' => $this->input->post('nomor_kontrak'),
            'tanggal_mulai' => date('Y-m-d', strtotime($this->input->post('tanggal_awal'))),
            'tanggal_akhir' => date('Y-m-d', strtotime($this->input->post('tanggal_akhir'))),
            'pihak_pertama' => $this->input->post('pihak1'),
            'pihak_kedua' => $this->input->post('pihak2'),
            'nilai_kontrak' => str_replace('.', '', $this->input->post('nilai')),
            'keterangan' => $this->input->post('keterangan'),
            'dok_file' => $eks_file,
            'create_date' => date('Y-m-d h:i:s'),
            'kantor' => $this->input->post('kantor'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'),
            'pic' => $this->input->post('pic'),
            // 'bulan' => $this->input->post('bulan'),             
        );

        $uploadPath = 'file_uploads/kontrak_lainnya/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->insert('kontrak_lainnya', $data);
            echo $this->session->set_flashdata('success', 'Data berhasil disimpan');
        } else {
            echo $this->session->set_flashdata('error', 'Data gagal disimpan');
        }

        // $error = array('error' => $this->upload->display_errors());
        // print_r($error); exit();

        redirect('Kontrak/lainnya');
    }

    public function edit_kontrakLain($id)
    {

        $ses_data = array(
            'act_menu' => 'lainnya',
            'title' => 'lainnya',
            'breadcumb' => 'lainnya'
        );

        $this->session->set_userdata($ses_data);

        $row2 = $this->M_kontrak->get_kontrakLain_byId($id);

        if ($row2) {
            $data = array(
                'action' => site_url('Kontrak/act_update_kontrakLain'),
                'id_kontrak' => $row2->id_kontrak,
                'nama_kontrak' => $row2->nama_kontrak,
                'nomor_kontrak' => $row2->nomor_kontrak,
                'tanggal_mulai' => $row2->tanggal_mulai,
                'tanggal_akhir' => $row2->tanggal_akhir,
                'pihak_pertama' => $row2->pihak_pertama,
                'pihak_kedua' => $row2->pihak_kedua,
                'keterangan' => $row2->keterangan,
                'nilai' => $row2->nilai_kontrak,
                'file' => $row2->dok_file,
                'pic' => $row2->pic,
                'kantor' => $row2->kantor,
                'no_rak' => $row2->no_rak,
                'no_box' => $row2->no_box,
            );
        }
        $this->template->load('template/admin_template', 'kontrak/edit_kontrakLainnya', $data);
    }

    function act_update_kontrakLain()
    {
        $config = array();
        $id_kontrak = $this->input->post('id_kontrak');

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $data = array(
            'nama_kontrak' => $this->input->post('nama_kontrak'),
            'nomor_kontrak' => $this->input->post('nomor_kontrak'),
            'tanggal_mulai' => date('Y-m-d', strtotime($this->input->post('tanggal_awal'))),
            'tanggal_akhir' => date('Y-m-d', strtotime($this->input->post('tanggal_akhir'))),
            'pihak_pertama' => $this->input->post('pihak1'),
            'pihak_kedua' => $this->input->post('pihak2'),
            'nilai_kontrak' => str_replace('.', '', $this->input->post('nilai')),
            'keterangan' => $this->input->post('keterangan'),
            'dok_file' => $eks_file,
            'kantor' => $this->input->post('kantor'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'),
            'pic' => $this->input->post('pic'),
        );

        $data2 = array(
            'nama_kontrak' => $this->input->post('nama_kontrak'),
            'nomor_kontrak' => $this->input->post('nomor_kontrak'),
            'tanggal_mulai' => date('Y-m-d', strtotime($this->input->post('tanggal_awal'))),
            'tanggal_akhir' => date('Y-m-d', strtotime($this->input->post('tanggal_akhir'))),
            'pihak_pertama' => $this->input->post('pihak1'),
            'pihak_kedua' => $this->input->post('pihak2'),
            'nilai_kontrak' => str_replace('.', '', $this->input->post('nilai')),
            'keterangan' => $this->input->post('keterangan'),
            'kantor' => $this->input->post('kantor'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'),
            'pic' => $this->input->post('pic'),
        );

        $uploadPath = 'file_uploads/kontrak_lainnya/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->where('id_kontrak', $id_kontrak);
            if ($this->db->update('kontrak_lainnya', $data)) {
                echo $this->session->set_flashdata('success', 'Data berhasil disimpan');
            } else {
                echo $this->session->set_flashdata('error', 'Data gagal disimpan');
            }
        } else {
            // print_r($data2); exit();
            $this->db->where('id_kontrak', $id_kontrak);
            if ($this->db->update('kontrak_lainnya', $data2)) {
                echo $this->session->set_flashdata('success', 'Data berhasil disimpan');
            } else {
                echo $this->session->set_flashdata('error', 'Data gagal disimpan');
            }
        }


        redirect('Kontrak/lainnya');
    }

    public function hapus_kontrakLain($id_kontrak)
    {
        $this->db->where('id_kontrak', $id_kontrak);
        if ($this->db->delete('kontrak_lainnya')) {
            $this->session->set_flashdata('success', 'Data Berhasil Di Hapus');
        } else {
            $this->session->set_flashdata('error', 'Data Gagal Di Hapus');
        }
        redirect('Kontrak/lainnya');
    }

    public function laporan_konstruksiNonTol($id_kontrak)
    {
        $ses_data = array(
            'act_menu'   => 'konstruksi_nonTol',
            'title'      => 'Kontrak konstruksi_nonTol',
            'breadcrumb' => 'konstruksi_nonTol',
        );
        $this->session->set_userdata($ses_data);
        $nama = $this->db->query('select nama_kontrak from kontrak_konstruksi_nontol where id_kontrak_nontol=' . $id_kontrak)->row();
        $data = array(
            'id_kontrak' => $id_kontrak,
            'nama_kontrak' => $nama->nama_kontrak,
            'row' => $this->M_kontrak->get_lapKonstruksiNonTol($id_kontrak),
        );
        $this->template->load('template/admin_template', 'kontrak/v_laporanKonstruksiNonTol.php', $data);
    }

    public function add_laporan_konstruksiNonTol($id_kontrak)
    {
        $ses_data = array(
            'act_menu'   => 'konstruksi_nonTol',
            'title'      => 'Kontrak konstruksi_nonTol',
            'breadcrumb' => 'konstruksi_nonTol',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'action' => site_url('Kontrak/act_laporan_konstruksiNonTol'),
            'id_kontrak' => $id_kontrak,
        );
        $this->template->load('template/admin_template', 'kontrak/add_laporan_konstruksiNonTol.php', $data);
    }

    public function act_laporan_konstruksiNonTol()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);
        $id_kontrak = $this->input->post('id_kontrak');

        $string_replace = array('/', ';', '[', '&', ']', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $data = array(
            'id_kontrak_nontol' => $this->input->post('id_kontrak'),
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

        $uploadPath = 'file_uploads/laporan_konstruksi/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->insert('laporan_konstruksi', $data);
            echo $this->session->set_flashdata('success', 'Data berhasil disimpan');
        } else {
            echo $this->session->set_flashdata('error', 'Data gagal disimpan');
        }

        // $error = array('error' => $this->upload->display_errors());
        // print_r($error); exit();

        redirect('Kontrak/laporan_konstruksiNonTol/' . $id_kontrak);
    }

    public function hapus_laporanKonstruksi($id, $id_kontrak)
    {
        $this->db->where('id_laporan', $id);
        if ($this->db->delete('laporan_konstruksi')) {
            echo $this->session->set_flashdata('success', 'Data berhasil disimpan');
        } else {
            echo $this->session->set_flashdata('error', 'Data gagal disimpan');
        }
        redirect('Kontrak/laporan_konstruksiNonTol/' . $id_kontrak);
    }

    public function update_laporanKonstruksi($id, $id_kontrak)
    {

        $ses_data = array(
            'act_menu'   => 'konstruksi_nonTol',
            'title'      => 'Kontrak konstruksi_nonTol',
            'breadcrumb' => 'konstruksi_nonTol',
        );
        $this->session->set_userdata($ses_data);

        $row = $this->M_kontrak->get_lapKonstruksi_byId($id);

        if ($row) {
            $data = array(
                'action' => site_url('Kontrak/act_update_laporanKonstruksi'),
                'id_kontrak' => $row->id_kontrak_nontol,
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
        $this->template->load('template/admin_template', 'kontrak/update_laporanKonstruksi.php', $data);
    }

    function act_update_laporanKonstruksi()
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

        $uploadPath = 'file_uploads/laporan_konstruksi/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->where('id_laporan', $id_laporan);
            if ($this->db->update('laporan_konstruksi', $data)) {
                echo $this->session->set_flashdata('success', 'Data berhasil disimpan');
            } else {
                echo $this->session->set_flashdata('error', 'Data gagal disimpan');
            }
        } else {
            // print_r($data2); exit();
            $this->db->where('id_laporan', $id_laporan);
            if ($this->db->update('laporan_konstruksi', $data2)) {
                echo $this->session->set_flashdata('success', 'Data berhasil disimpan');
            } else {
                echo $this->session->set_flashdata('error', 'Data gagal disimpan');
            }
        }

        redirect('Kontrak/laporan_konstruksiNonTol/' . $id_kontrak);
    }

    public function getDokumenLain()
    {
        $this->load->model('M_kontrak');
        $idKontrakKonstruksi = $this->input->post('id_kontrak');
        $result = $this->M_kontrak->getDokumenLain($idKontrakKonstruksi);

        $data = [];
        $no = $_POST['start'];
        foreach ($result['data'] as $row) {
            $no++;

            if (!empty($row->dok_file)) {
                $dok_file = '<a href="' . base_url('file_uploads/kontrak_konstruksi/' . $row->dok_file) . '" class="btn btn-sm btn-primary" target="_blank"><i class="fa fa-print"></i></a>';
            } else {
                $dok_file = '<button class="btn btn-sm btn-danger">Belum diupload</button>';
            }

            $tanggal_dok = !empty($row->tanggal_dok) ? date('d-m-Y', strtotime($row->tanggal_dok)) : '-';
            $pic = !empty($row->pic) || $row->pic == "" ? $row->pic : '-';
            $data[] = [
                'id'          => $no,
                'keterangan'  => $row->keterangan,
                'nomor_dok'   => $row->nomor_dok ?? '-',
                'tanggal_dok' => $tanggal_dok,
                'kantor'      => $row->kantor ?? '-',
                'pic'         => $pic,
                'dok_file'    => $dok_file,
            ];
        }

        echo json_encode([
            "draw" => $_POST['draw'],
            "recordsTotal" => $result['count_all'],
            "recordsFiltered" => $result['count_filtered'],
            "data" => $data
        ]);
    }

    public function edit_dokumen_konstruksi($id_tahapan_addendum_konstruksi, $id_kontrak_konstruksi)
    {
        $this->load->model('M_kontrak', 'kontrak_model');
        $data = [
            'row' => $this->kontrak_model->getDokumenTahapanById($id_tahapan_addendum_konstruksi, $id_kontrak_konstruksi),
        ];

        return $this->load->view('kontrak/edit_dokumen_konstruksi', $data);
    }

    public function hapus_dokumen_konstruksi($id_tahapan_addendum_konstruksi, $id_kontrak_konstruksi)
    {
        $this->load->model('M_kontrak', 'kontrak_model');
        $this->kontrak_model->hapus_dokumen_konstruksi($id_tahapan_addendum_konstruksi);

        $this->session->set_flashdata('success', 'Dokumen Addendum berhasil dihapus');

        redirect('Kontrak/detail_kon_konstruksi/' . $id_kontrak_konstruksi . '#data_addendum');
    }
    public function getDokumenAddendum()
    {
        $this->load->model('M_kontrak', 'kontrak_model');
        $tahapan_usulan = $this->input->post('id');
        $idKontrakKonstruksi = $this->input->post('idKontrakKonstruksi');
        $data = $this->kontrak_model->getDokumenTahapan($tahapan_usulan, $idKontrakKonstruksi, 'usulan');
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
                <a target=\"_blank\" href=\"" . base_url("file_uploads/kontrak_konstruksi/tahapan_kontrak_konstruksi/" . $row->dok_file) .
                "\">
                <button class=\"btn btn-sm btn-primary\"><i class=\"fa fa-print\"></i></button>
                </a>
                </td>";

            if ($this->session->userdata('level_user') == 1) {
                echo "<td class='text-center'>
                    <a class=\"btn btn-success btn-sm\" title='Edit' href='#' data-toggle='modal' data-target='#editDokumenAddendum' data-id_tahapan_addendum_konstruksi='$row->id_tahapan_addendum_konstruksi' data-id_kontrak_konstruksi='$row->id_kontrak_konstruksi' data-nama_dok='$row->nama_dok' data-nomor_dok='$row->nomor_dok' data-tanggal_dok='$row->tanggal_dok' data-lokasi_file='$row->lokasi_file' data-pic='$row->pic' data-dok_file='$row->dok_file'><i class=\"fa fa-edit\"></i></a>
                    <a class=\"btn btn-danger btn-sm\" href=\"" . site_url('Kontrak/hapus_dokumen_konstruksi/' . $row->id_tahapan_addendum_konstruksi . '/' . $row->id_kontrak_konstruksi) . "\" onClick=\"javasciprt: return confirm('Yakin menghapus data ?')\"><i class=\"fa fa-trash\"></i></a>
                  </td>";
            }
            echo "</tr>";

            $no++;
        }
    }

    public function act_add_TahapanUsulanAddendum()
    {
        $id_kontrak = $this->input->post('id_kontrak');
        $tahapan_add = $this->input->post('tahapan_add');
        $nama_dokumen = $this->input->post('nama_dokumen');
        $id_jenis_dokumen = $this->input->post('id_jenis_dokumen');
        if (empty($id_kontrak)) {
            log_message('error', 'ID kontrak kosong saat submit Addendum Konstruksi');
            show_error('ID kontrak tidak ditemukan', 500); // atau redirect ke halaman error
        }


        $this->load->model('M_kontrak', 'kontrak_model');
        $check = $this->kontrak_model->check_tahapan_konstruksi($tahapan_add, $id_kontrak, 'usulan', $id_jenis_dokumen);

        if ($check > 0) {
            echo $this->session->set_flashdata('error', 'Usulan Pengadaan Addendum sudah ada');
            redirect('Kontrak/detail_kon_konstruksi/' . $id_kontrak . '?add_ke=' . $tahapan_add . '#data_addendum');
        }

        $dok_file = $_FILES['dok_file']['name'];
        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
        $eks_file = str_replace($string_replace, '_', $dok_file);

        $eks_file = 'Usulan-Pengadaan-Addendum-' . $eks_file . '_' . date('d-m-Y_h-i-s') . '.pdf';

        $data = array(
            'id_kontrak_konstruksi' => $this->input->post('id_kontrak'),
            'tahapan_add' => $tahapan_add,
            'nama_dok' => $nama_dokumen,
            'nomor_dok' => $this->input->post('nomor_dok'),
            'tanggal_dok' => date('Y-m-d', strtotime($this->input->post('tanggal_dok'))),
            'lokasi_file' => $this->input->post('lokasi_file'),
            'pic' => $this->input->post('pic'),
            'dok_file' => $eks_file,
            'create_date' => date('Y-m-d H:i:s'),
            'jenis_dokumen' => 'usulan',
            'id_jenis_dokumen' => $id_jenis_dokumen,
        );

        $uploadPath = 'file_uploads/kontrak_konstruksi/tahapan_kontrak_konstruksi/';

        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('dok_file')) {
            $this->upload->data();
            $this->db->insert('tahapan_addendum_konstruksi', $data);
            echo $this->session->set_flashdata('success', 'Data berhasil disimpan');
        } else {
            echo $this->session->set_flashdata('error', 'Data gagal disimpan');
        }

        redirect('Kontrak/detail_kon_konstruksi/' . $id_kontrak . '?add_ke=' . $tahapan_add . '#data_addendum');
    }

    public function act_add_TahapanPengadaanAddendum()
    {
        $id_kontrak = $this->input->post('id_kontrak');
        $tahapan_add = $this->input->post('tahapan_add');
        $nama_dokumen = $this->input->post('nama_dokumen');
        $id_jenis_dokumen = $this->input->post('id_jenis_dokumen');
        if (empty($id_kontrak)) {
            log_message('error', 'ID kontrak kosong saat submit Addendum Konstruksi');
            show_error('ID kontrak tidak ditemukan', 500); // atau redirect ke halaman error
        }

        $this->load->model('M_kontrak', 'kontrak_model');
        $check = $this->kontrak_model->check_tahapan_konstruksi($tahapan_add, $id_kontrak, 'pengadaan', $id_jenis_dokumen);

        if ($check > 0) {
            echo $this->session->set_flashdata('error', 'Pengadaan Addendum sudah ada');
            redirect('Kontrak/detail_kon_konstruksi/' . $id_kontrak . '?add_ke=' . $tahapan_add . '#data_addendum');
        }

        $dok_file = $_FILES['dok_file']['name'];
        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
        $eks_file = str_replace($string_replace, '_', $dok_file);

        $eks_file = 'Pengadaan-Addendum-' . $eks_file . '_' . date('d-m-Y_h-i-s') . '.pdf';

        $data = array(
            'id_kontrak_konstruksi' => $this->input->post('id_kontrak'),
            'tahapan_add' => $tahapan_add,
            'nama_dok' => $nama_dokumen,
            'nomor_dok' => $this->input->post('nomor_dok'),
            'tanggal_dok' => date('Y-m-d', strtotime($this->input->post('tanggal_dok'))),
            'lokasi_file' => $this->input->post('lokasi_file'),
            'pic' => $this->input->post('pic'),
            'dok_file' => $eks_file,
            'create_date' => date('Y-m-d H:i:s'),
            'jenis_dokumen' => 'pengadaan',
            'id_jenis_dokumen' => $id_jenis_dokumen,
        );

        $uploadPath = 'file_uploads/kontrak_konstruksi/tahapan_kontrak_konstruksi/';

        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('dok_file')) {
            $this->upload->data();
            $this->db->insert('tahapan_addendum_konstruksi', $data);
            echo $this->session->set_flashdata('success', 'Data berhasil disimpan');
        } else {
            echo $this->session->set_flashdata('error', 'Data gagal disimpan');
        }

        redirect('Kontrak/detail_kon_konstruksi/' . $id_kontrak . '?add_ke=' . $tahapan_add . '#data_addendum');
    }

    // SUB MENU KONTRAK NON TOL
    public function nonTol()
    {
        $ses_data = array(
            'act_menu'   => 'konstruksi_nonTol',
            'title'      => 'konstruksi_nonTol',
            'breadcrumb' => 'konstruksi_nonTol',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'row' => $this->M_kontrak->get_konstruksiNonTol(),
        );
        $this->template->load('template/admin_template', 'kontrak/non-tol/v_konstruksiNonTol.php', $data);
    }

    public function detailNonTol($id_kontrak)
    {
        $ses_data = array(
            'act_menu'   => 'konstruksi_nonTol',
            'title'      => 'Kontrak konsultan',
            'breadcrumb' => 'konstruksi_nonTol',
        );
        $this->session->set_userdata($ses_data);
        $nama = $this->db->query('select nama_kontrak from kontrak_konstruksi_nontol where id_kontrak_nontol=' . $id_kontrak)->row();
        // $nilai_terbayar = $this->db->query("select COALESCE(sum(nilai),0) as sum from pembayaran where id_kontrak_konsultan=".$id_kontrak)->row()->sum;
        $data = array(
            'id_kontrak' => $id_kontrak,
            'nama_kontrak' => $nama->nama_kontrak,
            'row' => $this->M_kontrak->get_pembayaranKonstruksiNonTol($id_kontrak),
            // 'nilai_terbayar' => $nilai_terbayar,
            'laporan' => $this->M_kontrak->get_lapKonstruksiNonTol($id_kontrak),
        );
        $this->template->load('template/admin_template', 'kontrak/detail_konsNonTol.php', $data);
    }
}
