<?php defined('BASEPATH') or exit('No direct script access allowed');

class Keuangan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $cek = $this->session->userdata('username');

        if ($cek != '' || $cek != null) {
        } else {
            redirect('Login');
        }

        $this->load->model(array('M_progres'));
    }

    public function dtt()
    {
        $ses_data = array(
            'act_menu'   => 'dtt',
            'title'      => 'Progres dtt',
            'breadcrumb' => 'dtt',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'row' => $this->M_progres->get_dtt(),
            // 'seksi' => $this->M_progres->get_seksi(),
            // 'action_edit' => site_url('Progres/act_edit_progresLahan'),
        );
        $this->template->load('template/admin_template', 'keuangan/v_dtt.php', $data);
    }

    public function add_dtt()
    {
        $ses_data = array(
            'act_menu'   => 'dtt',
            'title'      => 'dtt Lahan',
            'breadcrumb' => 'dtt',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'action' => site_url('Progres/act_add_progresLahan'),
            'seksi' => $this->M_progres->get_seksi(),
        );
        $this->template->load('template/admin_template', 'lahan/add_lahan.php', $data);
    }

    public function act_add_progresLahan()
    {
        $config = array();
        $config2 = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $filename_isu = $_FILES['file_evidence']['name'];
        $ekstensi_file_isu = substr(strtolower(strrchr($filename_isu, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $nama_isu = str_replace($string_replace, '_', $filename_isu);
        $eks_file_isu = $nama_isu . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file_isu;

        $rencana = str_replace(',', '.', $this->input->post('rencana'));
        $realisasi = str_replace(',', '.', $this->input->post('realisasi'));

        $data = array(
            'tgl_progres' => date('Y-m-d', strtotime($this->input->post('tgl'))),
            'id_seksi' => $this->input->post('seksi'),
            'rencana' => $rencana,
            'realisasi' => $realisasi,
            'kebutuhan_bidang' => $this->input->post('kebutuhan_bidang'),
            'file' => $eks_file,
            'create_date' => date('Y-m-d h:i:s'),
        );

        $data2 = array(
            'tgl_progres' => date('Y-m-d', strtotime($this->input->post('tgl'))),
            'id_seksi' => $this->input->post('seksi'),
            'rencana' => $rencana,
            'realisasi' => $realisasi,
            'kebutuhan_bidang' => $this->input->post('kebutuhan_bidang'),
            'create_date' => date('Y-m-d h:i:s'),
        );
        // print_r($data); exit();
        $uploadPath = 'file_uploads/progres/lahan/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            if ($this->db->insert('progres_lahan', $data)) {
                $get_last_save_id = $this->db->insert_id();
                if (!empty($this->input->post('tgl_issue'))) {
                    $config2['upload_path'] = $uploadPath;
                    $config2['allowed_types'] = 'pdf';
                    $config2['max_size'] = 0;
                    $config2['file_name'] = $eks_file_isu;

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('file_evidence')) {
                        $this->upload->data();

                        $data_isu = array(
                            'id_progres_lahan' => $get_last_save_id,
                            'tanggal' => date('Y-m-d', strtotime($this->input->post('tgl_issue'))),
                            'issue' => $this->input->post('issue'),
                            'rekomendasi' => $this->input->post('rekomendasi'),
                            'status' => $this->input->post('status'),
                            'file' => $eks_file_isu,
                            'create_date' => date('Y-m-d h:i:s'),
                            'jenis_progres' => 'lahan',
                        );
                        $this->db->insert('issue', $data_isu);
                    } else {
                        $data_isu2 = array(
                            'id_progres_lahan' => $get_last_save_id,
                            'tanggal' => date('Y-m-d', strtotime($this->input->post('tgl_issue'))),
                            'issue' => $this->input->post('issue'),
                            'rekomendasi' => $this->input->post('rekomendasi'),
                            'status' => $this->input->post('status'),
                            'create_date' => date('Y-m-d h:i:s'),
                            'jenis_progres' => 'lahan',
                        );
                        $this->db->insert('issue', $data_isu2);
                    }
                }
            }
            echo $this->session->set_flashdata('message_success', 'Data Berhasil Di Tambah');
        } else {
            if ($this->db->insert('progres_lahan', $data2)) {
                $get_last_save_id = $this->db->insert_id();
                if (!empty($this->input->post('tgl_issue'))) {
                    $config2['upload_path'] = $uploadPath;
                    $config2['allowed_types'] = 'pdf';
                    $config2['max_size'] = 0;
                    $config2['file_name'] = $eks_file_isu;

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('file_evidence')) {
                        $this->upload->data();

                        $data_isu = array(
                            'id_progres_lahan' => $get_last_save_id,
                            'tanggal' => date('Y-m-d', strtotime($this->input->post('tgl_issue'))),
                            'issue' => $this->input->post('issue'),
                            'rekomendasi' => $this->input->post('rekomendasi'),
                            'status' => $this->input->post('status'),
                            'file' => $eks_file_isu,
                            'create_date' => date('Y-m-d h:i:s'),
                            'jenis_progres' => 'lahan',
                        );
                        $this->db->insert('issue', $data_isu);
                    } else {
                        $data_isu2 = array(
                            'id_progres_lahan' => $get_last_save_id,
                            'tanggal' => date('Y-m-d', strtotime($this->input->post('tgl_issue'))),
                            'issue' => $this->input->post('issue'),
                            'rekomendasi' => $this->input->post('rekomendasi'),
                            'status' => $this->input->post('status'),
                            'create_date' => date('Y-m-d h:i:s'),
                            'jenis_progres' => 'lahan',
                        );
                        $this->db->insert('issue', $data_isu2);
                    }
                }
                echo $this->session->set_flashdata('message_success', 'Data Berhasil Di Tambah');
            } else {
                echo $this->session->set_flashdata('message_error', 'Data Gagal Di Tambah');
            }
        }

        redirect('Progres/progres_lahan');
    }

    public function act_edit_progresLahan()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $id_progres = $this->input->post('id_progres_lahan_edit');
        $rencana = str_replace(',', '.', $this->input->post('rencana'));
        $realisasi = str_replace(',', '.', $this->input->post('realisasi'));

        $data = array(
            'tgl_progres' => date('Y-m-d', strtotime($this->input->post('tgl'))),
            'id_seksi' => $this->input->post('seksi'),
            'rencana' => $rencana,
            'realisasi' => $realisasi,
            'kebutuhan_bidang' => $this->input->post('kebutuhan_bidang'),
            'file' => $eks_file,
            'create_date' => date('Y-m-d h:i:s'),
        );

        $data2 = array(
            'tgl_progres' => date('Y-m-d', strtotime($this->input->post('tgl'))),
            'id_seksi' => $this->input->post('seksi'),
            'rencana' => $rencana,
            'realisasi' => $realisasi,
            'kebutuhan_bidang' => $this->input->post('kebutuhan_bidang'),
        );

        $uploadPath = 'file_uploads/progres/lahan/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->where('id_progres_lahan', $id_progres);
            if ($this->db->update('progres_lahan', $data)) {
                echo $this->session->set_flashdata('message_success', 'Data Berhasil Di Edit');
            } else {
                echo $this->session->set_flashdata('message_error', 'Data Gagal Di Edit');
            }
        } else {
            $this->db->where('id_progres_lahan', $id_progres);
            if ($this->db->update('progres_lahan', $data2)) {
                echo $this->session->set_flashdata('message_success', 'Data Berhasil Di Edit tanpa update file pendukung');
            } else {
                echo $this->session->set_flashdata('message_error', 'Data Gagal Di Edit');
            }
        }

        redirect('Progres/progres_lahan');
    }

    public function hapus_lahan($id)
    {
        $this->db->where('id_progres_lahan', $id);
        if ($this->db->delete('progres_lahan')) {
            $this->db->where('id_progres_lahan', $id);
            $this->db->delete('issue');
            $this->session->set_flashdata('message_success', 'Data Berhasil Di Hapus');
        } else {
            $this->session->set_flashdata('message_error', 'Data Gagal Di Hapus');
        }
        redirect('Progres/progres_lahan');
    }

    public function progres_fisik()
    {
        $ses_data = array(
            'act_menu'   => 'progres_fisik',
            'title'      => 'Progres Fisik',
            'breadcrumb' => 'progres_fisik',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'row' => $this->M_progres->get_progres_konstruksi(),
            'seksi' => $this->M_progres->get_seksi(),
            'action_add' => site_url('Progres/act_add_progresKons'),
            'action_edit' => site_url('Progres/act_edit_progresKons'),
        );
        $this->template->load('template/admin_template', 'konstruksi/v_fisik.php', $data);
    }

    public function act_add_progresKons()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $rencana = str_replace(',', '.', $this->input->post('rencana'));
        $realisasi = str_replace(',', '.', $this->input->post('realisasi'));

        $data = array(
            'tgl_progres' => date('Y-m-d', strtotime($this->input->post('tgl'))),
            'seksi' => $this->input->post('seksi'),
            'rencana' => $rencana,
            'realisasi' => $realisasi,
            'file' => $eks_file,
            'create_date' => date('Y-m-d h:i:s'),
        );

        $data2 = array(
            'tgl_progres' => date('Y-m-d', strtotime($this->input->post('tgl'))),
            'seksi' => $this->input->post('seksi'),
            'rencana' => $rencana,
            'realisasi' => $realisasi,
            'create_date' => date('Y-m-d h:i:s'),
        );

        $uploadPath = 'file_uploads/progres/konstruksi/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            if ($this->db->insert('progres_konstruksi', $data)) {
                echo $this->session->set_flashdata('message_success', 'Data Progres Konstruksi Berhasil Di Tambah');
            } else {
                echo $this->session->set_flashdata('message_error', 'Data Progres Konstruksi Gagal Di Tambah');
            }
        } else {
            if ($this->db->insert('progres_konstruksi', $data2)) {
                echo $this->session->set_flashdata('message_success', 'Data Progres Konstruksi Berhasil Di Tambah tanpa file pendukung');
            } else {
                echo $this->session->set_flashdata('message_error', 'Data Progres Konstruksi Gagal Di Tambah');
            }
        }

        redirect('Progres/progres_fisik');
    }

    public function act_edit_progresKons()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $id_progres_konstruksi = $this->input->post('id_progres_kons_edit');
        $rencana = str_replace(',', '.', $this->input->post('rencana_edit'));
        $realisasi = str_replace(',', '.', $this->input->post('realisasi_edit'));

        $data = array(
            'tgl_progres' => date('Y-m-d', strtotime($this->input->post('tgl_edit'))),
            'seksi' => $this->input->post('seksi_edit'),
            'rencana' => $rencana,
            'realisasi' => $realisasi,
            'file' => $eks_file,
            'create_date' => date('Y-m-d h:i:s'),
        );

        $data2 = array(
            'tgl_progres' => date('Y-m-d', strtotime($this->input->post('tgl_edit'))),
            'seksi' => $this->input->post('seksi_edit'),
            'rencana' => $rencana,
            'realisasi' => $realisasi,
            'create_date' => date('Y-m-d h:i:s'),
        );

        $uploadPath = 'file_uploads/progres/konstruksi/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->where('id_progres_konstruksi', $id_progres_konstruksi);
            if ($this->db->update('progres_konstruksi', $data)) {
                echo $this->session->set_flashdata('message_success', 'Data Progres Konstruksi Berhasil Di Tambah');
            } else {
                echo $this->session->set_flashdata('message_error', 'Data Progres Konstruksi Gagal Di Tambah');
            }
        } else {
            $this->db->where('id_progres_konstruksi', $id_progres_konstruksi);
            if ($this->db->update('progres_konstruksi', $data2)) {
                echo $this->session->set_flashdata('message_success', 'Data Progres Konstruksi Berhasil Di Tambah tanpa file pendukung');
            } else {
                echo $this->session->set_flashdata('message_error', 'Data Progres Konstruksi Gagal Di Tambah');
            }
        }

        redirect('Progres/progres_fisik');
    }

    public function hapus_fisik($id)
    {
        $this->db->where('id_progres_konstruksi', $id);
        if ($this->db->delete('progres_konstruksi')) {
            $this->session->set_flashdata('message_success', 'Data Progres Konstruksi Berhasil Di Hapus');
        } else {
            $this->session->set_flashdata('message_error', 'Data Progres Konstruksi Gagal Di Hapus');
        }
        redirect('Progres/progres_fisik');
    }

    public function get_isu_lahan()
    {

        $id_progres_lahan = $this->input->get('id_progres_lahan');

        $isu_lahan =  $this->db->query("select * from issue where id_progres_lahan=" . $id_progres_lahan)->result();

        foreach ($isu_lahan as $il) {

            if ($il->status == 1) {
                $status = '<span class="badge badge-danger">Open</span>';
            } else {
                $status = '<span class="badge badge-success">Close</span>';
            }

            if ($il->file != null || $il->file != '') {
                $file = '<a href="' . base_url("file_uploads/issue/" . $il->file) . '" target="_blank" class="btn btn-primary btn-sm" ><i class="fa fa-print"></i></a>';
            } else {
                $file = '-';
            }


            $alert = "return confirm('Yakin menghapus data ?')";
            $hapus = '<a href="' . site_url("Progres/hapus_isu/" . $il->id_issue) . '"  title="hapus" class="btn btn-danger btn-sm" onClick="javasciprt: ' . $alert . '" >Hapus</a>';

            $data[] = array(
                'id_progres_lahan' => $il->id_progres_lahan,
                'tanggal' => date('d-m-Y', strtotime($il->tanggal)),
                'issue' => $il->issue,
                'rekomendasi' => $il->rekomendasi,
                'status' => $status,
                'file' => $file,
                'aksi' => $hapus,
            );
        }

        echo json_encode($data);
    }

    public function hapus_isu($id)
    {
        $this->db->where('id_issue', $id);
        if ($this->db->delete('issue')) {
            $this->session->set_flashdata('message_success', 'Data Isu/Permasalahan Berhasil Di Hapus');
        } else {
            $this->session->set_flashdata('message_error', 'Data Isu/Permasalahan Gagal Di Hapus');
        }
        redirect('Progres/progres_lahan');
    }

    public function rta()
    {
        $ses_data = array(
            'act_menu'   => 'rta',
            'title'      => 'RTA',
            'breadcrumb' => 'rta',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'row' => $this->M_progres->get_progres_rta(),
            'seksi' => $this->M_progres->get_seksi(),
            'action_add' => site_url('Progres/act_add_progresRta'),
            'action_edit' => site_url('Progres/act_edit_progresRta'),
        );
        $this->template->load('template/admin_template', 'rta/v_rta.php', $data);
    }

    public function act_add_progresRta()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $rencana = str_replace(',', '.', $this->input->post('rencana'));
        $realisasi = str_replace(',', '.', $this->input->post('realisasi'));

        $data = array(
            'tgl_progres' => date('Y-m-d', strtotime($this->input->post('tgl'))),
            'seksi' => $this->input->post('seksi'),
            'rencana' => $rencana,
            'realisasi' => $realisasi,
            'file' => $eks_file,
            'create_date' => date('Y-m-d h:i:s'),
        );

        $data2 = array(
            'tgl_progres' => date('Y-m-d', strtotime($this->input->post('tgl'))),
            'seksi' => $this->input->post('seksi'),
            'rencana' => $rencana,
            'realisasi' => $realisasi,
            'create_date' => date('Y-m-d h:i:s'),
        );

        $uploadPath = 'file_uploads/progres/rta/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            if ($this->db->insert('progres_rta', $data)) {
                echo $this->session->set_flashdata('message_success', 'Data Progres RTA Berhasil Di Tambah');
            } else {
                echo $this->session->set_flashdata('message_error', 'Data Progres RTA Gagal Di Tambah');
            }
        } else {
            if ($this->db->insert('progres_rta', $data2)) {
                echo $this->session->set_flashdata('message_success', 'Data Progres RTA Berhasil Di Tambah tanpa file pendukung');
            } else {
                echo $this->session->set_flashdata('message_error', 'Data Progres RTA Gagal Di Tambah');
            }
        }

        redirect('Progres/rta');
    }

    public function act_edit_progresRta()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $id_progres_rta = $this->input->post('id_progres_rta_edit');
        $rencana = str_replace(',', '.', $this->input->post('rencana_edit'));
        $realisasi = str_replace(',', '.', $this->input->post('realisasi_edit'));

        $data = array(
            'tgl_progres' => date('Y-m-d', strtotime($this->input->post('tgl_edit'))),
            'seksi' => $this->input->post('seksi_edit'),
            'rencana' => $rencana,
            'realisasi' => $realisasi,
            'file' => $eks_file,
            'update_date' => date('Y-m-d h:i:s'),
        );

        $data2 = array(
            'tgl_progres' => date('Y-m-d', strtotime($this->input->post('tgl_edit'))),
            'seksi' => $this->input->post('seksi_edit'),
            'rencana' => $rencana,
            'realisasi' => $realisasi,
            'update_date' => date('Y-m-d h:i:s'),
        );

        $uploadPath = 'file_uploads/progres/konstruksi/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->where('id_progres_rta', $id_progres_rta);
            if ($this->db->update('progres_rta', $data)) {
                echo $this->session->set_flashdata('message_success', 'Data Progres Konstruksi Berhasil Di Tambah');
            } else {
                echo $this->session->set_flashdata('message_error', 'Data Progres Konstruksi Gagal Di Tambah');
            }
        } else {
            $this->db->where('id_progres_rta', $id_progres_rta);
            if ($this->db->update('progres_rta', $data2)) {
                echo $this->session->set_flashdata('message_success', 'Data Progres Konstruksi Berhasil Di Tambah tanpa file pendukung');
            } else {
                echo $this->session->set_flashdata('message_error', 'Data Progres Konstruksi Gagal Di Tambah');
            }
        }

        redirect('Progres/rta');
    }

    public function hapus_rta($id)
    {
        $this->db->where('id_progres_rta', $id);
        if ($this->db->delete('progres_rta')) {
            $this->session->set_flashdata('message_success', 'Data RTA Berhasil Di Hapus');
        } else {
            $this->session->set_flashdata('message_error', 'Data RTA Gagal Di Hapus');
        }
        redirect('Progres/rta');
    }

    function getKreditInvestasi()
    {
        $this->load->model('M_Keuangan');
        $result = $this->M_Keuangan->getKreditInvestasi();
        $data = [];
        $no = $_POST['start'];
        $ki_pokok_plafon = 9362003000000;
        $ki_idc_plafon = 531213000000;

        foreach ($result['data'] as $row) {
            $no++;

            if ($row->dok_file != null) {
                $lokasi_file = base_url("file_uploads/keuangan/" . $row->dok_file);
                $file = '<a href="' . $lokasi_file . '" target="_blank" class="btn btn-primary btn-sm" ><i class="fa fa-print"></i></a>';
            } else {
                $file = '-';
            }

            $aksi = '<td class="d-flex">
                <a href="#" class="btn btn-success btn-sm d-none" data-toggle="modal" data-target="#editKreditInvestasi" data-id_kredit="' . $row->id_kredit . '" data-tanggal="' . $row->tanggal . '" data-ki_pokok_penarikan="' . $row->ki_pokok_penarikan . '" data-ki_idc_penarikan="' . $row->ki_idc_penarikan . '" data-dok_file="' . $row->dok_file . '"><i class="fa fa-edit"></i></a>
                <a href="' . site_url('Keuangan/hapus_ki/' . $row->id_kredit) . '" title="hapus" class="btn btn-danger btn-sm" onClick="javasciprt: return confirm(\'Yakin menghapus data ?\')"><i class="fa fa-trash"></i></a>
            </td>';

            $data[] = [
                'id'                => $no,
                'tanggal'           => date('d-m-Y', strtotime($row->tanggal)),
                'plafon_pokok'      => "Rp. " . number_format($ki_pokok_plafon, 2, ',', '.'),
                'pokok_penarikan'   => "Rp. " . number_format($row->ki_pokok_penarikan, 2, ',', '.'),
                'sisa_pokok'        => "Rp. " . number_format(($ki_pokok_plafon - $row->ki_pokok_penarikan), 2, ',', '.'),
                'plafon_idc'        => "Rp. " . number_format($ki_idc_plafon, 2, ',', '.'),
                'idc_penarikan'     => "Rp. " . number_format($row->ki_idc_penarikan, 2, ',', '.'),
                'sisa_idc'          => "Rp. " . number_format(($ki_idc_plafon - $row->ki_idc_penarikan), 2, ',', '.'),
                'file'              => $file,
                'aksi'              => $aksi
            ];
        }

        echo json_encode([
            "draw" => $_POST['draw'],
            "recordsTotal" => $result['count_all'],
            "recordsFiltered" => $result['count_filtered'],
            "data" => $data
        ]);
    }

    public function kredit_investasi()
    {
        $ses_data = array(
            'act_menu'   => 'kredit_investasi',
            'title'      => 'kredit_investasi',
            'breadcrumb' => 'kredit_investasi',
        );
        $this->session->set_userdata($ses_data);
        $data = [
            'action_edit' => site_url('Keuangan/update_ki'),
        ];
        $this->template->load('template/admin_template', 'keuangan/v_ki.php');
    }

    public function add_ki()
    {
        $ses_data = array(
            'act_menu'   => 'kredit_investasi',
            'title'      => 'kredit_investasi',
            'breadcrumb' => 'kredit_investasi',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'action' => site_url('Keuangan/act_addKI'),
        );
        $this->template->load('template/admin_template', 'keuangan/add_ki.php', $data);
    }

    public function act_addKI()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $data = array(

            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            // 'ki_pokok_plafon' => str_replace('.', '', $this->input->post('ki_pokok_plafon')),
            'ki_pokok_penarikan' => str_replace('.', '', $this->input->post('ki_pokok_penarikan')),
            // 'ki_idc_plafon' => str_replace('.', '', $this->input->post('ki_idc_plafon')),
            'ki_idc_penarikan' => str_replace('.', '', $this->input->post('ki_idc_penarikan')),
            'keterangan' => $this->input->post('keterangan'),
            'create_date' => date('Y-m-d h:i:s'),
            'dok_file' => $eks_file,
        );

        $uploadPath = 'file_uploads/keuangan/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->insert('kredit_investasi', $data);
            echo $this->session->set_flashdata('success', 'Data Berhasil Di Tambahkan');
        } else {
            echo $this->session->set_flashdata('error', 'Data Gagal Di Tambahkan');
        }

        redirect('Keuangan/kredit_investasi');
    }

    public function update_ki($id) {}

    public function hapus_ki($id)
    {
        $this->db->where('id_kredit', $id);
        if ($this->db->delete('kredit_investasi')) {
            $this->session->set_flashdata('success', 'Data Berhasil Di Hapus');
        } else {
            $this->session->set_flashdata('error', 'Data Gagal Di Hapus');
        }
        redirect('Keuangan/kredit_investasi');
    }

    function getEkuiti()
    {
        $this->load->model('M_Keuangan');
        $result = $this->M_Keuangan->getEkuiti();
        $data = [];
        $no = $_POST['start'];
        $pmn = 1117909000000;
        $non_pmn = 1317628000000;

        foreach ($result['data'] as $row) {
            $no++;

            if ($row->dok_file != null) {
                $lokasi_file = base_url("file_uploads/keuangan/" . $row->dok_file);
                $file = '<a href="' . $lokasi_file . '" target="_blank" class="btn btn-primary btn-sm" ><i class="fa fa-print"></i></a>';
            } else {
                $file = '-';
            }

            $aksi = '<td class="d-flex">
                <a href="#" class="btn btn-success btn-sm d-none"><i class="fa fa-edit"></i></a>
                <a href="' . site_url('Keuangan/hapus_ekuiti/' . $row->id_equity) . '" title="hapus" class="btn btn-danger btn-sm" onClick="javasciprt: return confirm(\'Yakin menghapus data ?\')"><i class="fa fa-trash"></i></a>
            </td>';

            $data[] = [
                'id'                => $no,
                'tanggal'           => date('d-m-Y', strtotime($row->tanggal)),
                'total_pmn'         => "Rp. " . number_format($pmn, 2, ',', '.'),
                'total_non_pmn'     => "Rp. " . number_format($non_pmn, 2, ',', '.'),
                'terpakai_pmn'      => "Rp. " . number_format($row->terpakai_pmn, 2, ',', '.'),
                'terpakai_non'      => "Rp. " . number_format($row->terpakai_non, 2, ',', '.'),
                'sisa_pmn'          => "Rp. " . number_format(($pmn - $row->terpakai_pmn), 2, ',', '.'),
                'sisa_non_pmn'      => "Rp. " . number_format(($non_pmn - $row->terpakai_non), 2, ',', '.'),
                'file'              => $file,
                'aksi'              => $aksi
            ];
        }

        echo json_encode([
            "draw" => $_POST['draw'],
            "recordsTotal" => $result['count_all'],
            "recordsFiltered" => $result['count_filtered'],
            "data" => $data
        ]);
    }

    public function ekuiti()
    {
        $ses_data = array(
            'act_menu'   => 'ekuiti',
            'title'      => 'ekuiti',
            'breadcrumb' => 'ekuiti',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            // 'row' => $this->M_progres->get_dtt(),
            // 'seksi' => $this->M_progres->get_seksi(),
            // 'action_edit' => site_url('Progres/act_edit_progresLahan'),
        );
        $this->template->load('template/admin_template', 'keuangan/v_ekuiti.php', $data);
    }

    public function add_ekuiti()
    {
        $ses_data = array(
            'act_menu'   => 'ekuiti',
            'title'      => 'ekuiti',
            'breadcrumb' => 'ekuiti',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'action' => site_url('Keuangan/act_addEkuiti'),
        );
        $this->template->load('template/admin_template', 'keuangan/add_ekuiti.php', $data);
    }

    public function act_addEkuiti()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $data = array(

            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'terpakai_pmn' => str_replace('.', '', $this->input->post('terpakai_pmn')),
            'terpakai_non' => str_replace('.', '', $this->input->post('terpakai_non')),
            'keterangan' => $this->input->post('keterangan'),
            'create_date' => date('Y-m-d h:i:s'),
            'dok_file' => $eks_file,
        );

        $uploadPath = 'file_uploads/keuangan/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->insert('equity', $data);
            echo $this->session->set_flashdata('success', 'Data Berhasil Di Tambahkan');
        } else {
            echo $this->session->set_flashdata('error', 'Data Gagal Di Tambahkan');
        }
        redirect('Keuangan/ekuiti');
    }

    public function hapus_ekuiti($id)
    {
        $this->db->where('id_equity', $id);
        if ($this->db->delete('equity')) {
            $this->session->set_flashdata('success', 'Data Berhasil Di Hapus');
        } else {
            $this->session->set_flashdata('error', 'Data Gagal Di Hapus');
        }
        redirect('Keuangan/ekuiti');
    }
}
