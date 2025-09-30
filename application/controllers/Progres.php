<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Progres extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $cek = $this->session->userdata('username');

        if ($cek != '' || $cek != null) {
        } else {
            redirect('Login');
        }
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model(array('M_progres'));
    }

    public function maintenance()
    {
        $ses_data = array(
            'act_menu'   => 'bim',
            'title'      => 'bim',
            'breadcrumb' => 'bim',
        );
        $this->session->set_userdata($ses_data);
        $data = array();
        $this->template->load('template/admin_template', 'bim/v_bim.php');
    }

    public function progres_lahan()
    {
        $ses_data = array(
            'act_menu'   => 'progres_lahan',
            'title'      => 'Progres Lahan',
            'breadcrumb' => 'progres_lahan',
        );
        $this->session->set_userdata($ses_data);
        $data = [
            'seksi' => $this->M_progres->get_seksi(),
            'action_edit' => site_url('Progres/act_edit_progresLahan'),
        ];
        $this->template->load('template/admin_template', 'lahan/v_lahan.php', $data);
    }

    function getProgresLahan()
    {
        $this->load->model('M_progres');
        $result = $this->M_progres->get_progres_lahan();
        $data = [];
        $no = $_POST['start'];
        foreach ($result['data'] as $row) {
            $no++;

            if ($row->file != null) {
                $lokasi_file = base_url("file_uploads/progres/lahan/" . $row->file);
                $file = '<a href="' . $lokasi_file . '" target="_blank" class="btn btn-primary btn-sm" ><i class="fa fa-print"></i></a>';
            } else {
                $file = '-';
            }

            $aksi = '<td class="d-flex">
                <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editLahan" data-id_progres_lahan="' . $row->id_progres_lahan . '" data-rencana="' . $row->rencana . '" data-realisasi="' . $row->realisasi . '" data-kebutuhan_bidang="' . $row->kebutuhan_bidang . '" data-tgl_progres="' . $row->tgl_progres . '" data-seksi="' . $row->id_seksi . '"><i class="fa fa-edit"></i></a>
                <a href="' . base_url('Progres/hapus_lahan/' . $row->id_progres_lahan) . '" title="hapus" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Yakin menghapus data ?\')"><i class="fa fa-trash"></i></a>
            </td>';

            $data[] = [
                'id'                => $no,
                'tgl_progres'       => date('d-m-Y', strtotime($row->tgl_progres)),
                'seksi_progres'     => $row->seksi_progres,
                'kebutuhan_bidang'  => number_format($row->kebutuhan_bidang, 0, ',', '.'),
                'rencana'           => number_format($row->rencana, 2, ',', '.') . "%",
                'realisasi'         => number_format($row->realisasi, 2, ',', '.') . "%",
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

    public function add_progresLahan()
    {
        $ses_data = array(
            'act_menu'   => 'progres_lahan',
            'title'      => 'Progres Lahan',
            'breadcrumb' => 'progres_lahan',
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
        $tanggal = $this->input->post('tgl');
        $seksi = $this->input->post('seksi');
        $kebutuhan_bidang = $this->input->post('kebutuhan_bidang');
        $rencana = $this->input->post('rencana');
        $realisasi = $this->input->post('realisasi');

        $data = [
            'tgl_progres' => $tanggal,
            'id_seksi' => $seksi,
            'kebutuhan_bidang' => $kebutuhan_bidang,
            'rencana' => $rencana,
            'realisasi' => $realisasi,
            'create_date' => date('Y-m-d h:i:s'),
        ];

        if (!empty($_FILES['file']['name'])) {
            $config = [];

            $filename = $_FILES['file']['name'];
            $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

            $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
            $nama = str_replace($string_replace, '_', $filename);
            $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

            $data['file'] = $eks_file;

            $uploadPath = 'file_uploads/progres/lahan/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 0;
            $config['file_name'] = $eks_file;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('file')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
            } else {
                $this->M_progres->add_progresLahan($data);
                $this->session->set_flashdata('success', 'Data berhasil disimpan dengan file');
            }
        } else {
            $this->M_progres->add_progresLahan($data);
            $this->session->set_flashdata('success', 'Data berhasil disimpan tanpa file');
        }
        redirect('Progres/progres_lahan');
    }

    public function act_edit_progresLahan()
    {
        $id_progres_lahan = $this->input->post('id_progres_lahan_edit');
        $rencana = str_replace(',', '.', $this->input->post('rencana'));
        $realisasi = str_replace(',', '.', $this->input->post('realisasi'));
        $kebutuhan_bidang = str_replace(',', '.', $this->input->post('kebutuhan_bidang'));
        $tgl = date('Y-m-d', strtotime($this->input->post('tgl')));

        $data = [
            'rencana' => $rencana,
            'realisasi' => $realisasi,
            'kebutuhan_bidang' => $kebutuhan_bidang,
            'tgl_progres' => $tgl
        ];

        if (!empty($_FILES['file']['name'])) {
            $config = [];

            $filename = $_FILES['file']['name'];
            $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

            $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
            $nama = str_replace($string_replace, '_', $filename);
            $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

            $data['file'] = $eks_file;

            $uploadPath = 'file_uploads/progres/lahan/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 0;
            $config['file_name'] = $eks_file;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('file')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
            } else {
                $this->M_progres->update_progresLahan($id_progres_lahan, $data);
                $this->session->set_flashdata('success', 'Data berhasil diperbarui dengan file');
            }
        } else {
            $this->M_progres->update_progresLahan($id_progres_lahan, $data);
            $this->session->set_flashdata('success', 'Data berhasil diperbarui tanpa file');
        }
        redirect('Progres/progres_lahan');
    }

    public function hapus_lahan($id)
    {
        $this->db->where('id_progres_lahan', $id);
        if ($this->db->delete('progres_lahan')) {
            $this->session->set_flashdata('success', 'Data Berhasil Di Hapus');
        } else {
            $this->session->set_flashdata('error', 'Data Gagal Di Hapus');
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
            'seksi' => $this->M_progres->get_seksi(),
            'action_add' => site_url('Progres/act_add_progresKons'),
            'action_edit' => site_url('Progres/act_edit_progresKons'),
        );
        $this->template->load('template/admin_template', 'konstruksi/v_fisik.php', $data);
    }

    function getProgresKonstruksi()
    {
        $this->load->model('M_progres');
        $result = $this->M_progres->get_progres_fisik();
        $data = [];
        $no = $_POST['start'];
        foreach ($result['data'] as $row) {
            $no++;

            if ($row->file != null) {
                $lokasi_file = base_url("file_uploads/progres/konstruksi/" . $row->file);
                $file = '<a href="' . $lokasi_file . '" target="_blank" class="btn btn-primary btn-sm" ><i class="fa fa-print"></i></a>';
            } else {
                $file = '-';
            }

            $aksi = '<td class="d-flex">
                <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit_konstruksi" data-id_progres_konstruksi="' . $row->id_progres_konstruksi . '" data-rencana="' . $row->rencana . '" data-realisasi="' . $row->realisasi . '" data-tgl_progres="' . $row->tgl_progres . '" data-seksi="' . $row->seksi . '"><i class="fa fa-edit"></i></a>
                <a href="' . base_url('Progres/hapus_fisik/' . $row->id_progres_konstruksi) . '" title="hapus" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Yakin menghapus data ?\')"><i class="fa fa-trash"></i></a>
            </td>';

            $data[] = [
                'id'                => $no,
                'tgl_progres'       => date('d-m-Y', strtotime($row->tgl_progres)),
                'seksi_progres'     => $row->seksi_progres,
                'rencana'           => number_format($row->rencana, 2, ',', '.') . "%",
                'realisasi'         => number_format($row->realisasi, 2, ',', '.') . "%",
                'deviasi'           => number_format($row->realisasi - $row->rencana, 0, ',', '.') . "%",
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

    public function act_add_progresKons()
    {
        $tanggal = $this->input->post('tgl');
        $seksi = $this->input->post('seksi');
        $rencana = $this->input->post('rencana');
        $realisasi = $this->input->post('realisasi');

        $data = [
            'tgl_progres' => $tanggal,
            'seksi' => $seksi,
            'rencana' => $rencana,
            'realisasi' => $realisasi,
            'create_date' => date('Y-m-d h:i:s'),
        ];

        if (!empty($_FILES['file']['name'])) {
            $config = [];

            $filename = $_FILES['file']['name'];
            $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

            $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
            $nama = str_replace($string_replace, '_', $filename);
            $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

            $data['file'] = $eks_file;

            $uploadPath = 'file_uploads/progres/konstruksi/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 0;
            $config['file_name'] = $eks_file;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('file')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
            } else {
                $this->M_progres->add_progresFisik($data);
                $this->session->set_flashdata('success', 'Data berhasil disimpan dengan file');
            }
        } else {
            $this->M_progres->add_progresFisik($data);
            $this->session->set_flashdata('success', 'Data berhasil disimpan tanpa file');
        }
        redirect('Progres/progres_fisik');
    }

    public function act_edit_progresKons()
    {
        $id_progres_konstruksi = $this->input->post('id_progres_kons_edit');
        $tanggal = $this->input->post('tgl');
        $seksi = $this->input->post('seksi');
        $rencana = $this->input->post('rencana');
        $realisasi = $this->input->post('realisasi');

        $data = [
            'tgl_progres' => $tanggal,
            'seksi' => $seksi,
            'rencana' => $rencana,
            'realisasi' => $realisasi,
        ];

        if (!empty($_FILES['file']['name'])) {
            $config = [];

            $filename = $_FILES['file']['name'];
            $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

            $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
            $nama = str_replace($string_replace, '_', $filename);
            $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

            $data['file'] = $eks_file;

            $uploadPath = 'file_uploads/progres/konstruksi/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 0;
            $config['file_name'] = $eks_file;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('file')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
            } else {
                $this->M_progres->update_progresFisik($id_progres_konstruksi, $data);
                $this->session->set_flashdata('success', 'Data berhasil diperbarui dengan file');
                // $this->M_progres->update_progresFisik($data);
                // $this->session->set_flashdata('success', 'Data berhasil disimpan dengan file');
            }
        } else {
            $this->M_progres->update_progresFisik($id_progres_konstruksi, $data);
            $this->session->set_flashdata('success', 'Data berhasil disimpan tanpa file');
        }
        redirect('Progres/progres_fisik');
    }

    public function hapus_fisik($id)
    {
        $this->db->where('id_progres_konstruksi', $id);
        if ($this->db->delete('progres_konstruksi')) {
            $this->session->set_flashdata('success', 'Data Progres Konstruksi Berhasil Di Hapus');
        } else {
            $this->session->set_flashdata('error', 'Data Progres Konstruksi Gagal Di Hapus');
        }
        redirect('Progres/progres_fisik');
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
            'seksi' => $this->M_progres->get_seksi(),
            'action_add' => site_url('Progres/act_add_progresRta'),
            'action_edit' => site_url('Progres/act_edit_progresRta'),
        );
        $this->template->load('template/admin_template', 'rta/v_rta.php', $data);
    }

    function getProgresRTA()
    {
        $this->load->model('M_progres');
        $result = $this->M_progres->get_progres_rta();
        $data = [];
        $no = $_POST['start'];
        foreach ($result['data'] as $row) {
            $no++;

            if ($row->file != null) {
                $lokasi_file = base_url("file_uploads/progres/rta/" . $row->file);
                $file = '<a href="' . $lokasi_file . '" target="_blank" class="btn btn-primary btn-sm" ><i class="fa fa-print"></i></a>';
            } else {
                $file = '-';
            }

            $aksi = '<td class="d-flex">
                <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit_rta" data-id_progres_rta="' . $row->id_progres_rta . '" data-rencana="' . $row->rencana . '" data-realisasi="' . $row->realisasi . '" data-tgl_progres="' . $row->tgl_progres . '" data-seksi="' . $row->seksi . '"><i class="fa fa-edit"></i></a>
                <a href="' . base_url('Progres/hapus_rta/' . $row->id_progres_rta) . '" title="hapus" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Yakin menghapus data ?\')"><i class="fa fa-trash"></i></a>
            </td>';

            $data[] = [
                'id'                => $no,
                'tgl_progres'       => date('d-m-Y', strtotime($row->tgl_progres)),
                'seksi_progres'     => $row->seksi_progres,
                'rencana'           => number_format($row->rencana, 2, ',', '.') . "%",
                'realisasi'         => number_format($row->realisasi, 2, ',', '.') . "%",
                'deviasi'           => number_format($row->realisasi - $row->rencana, 2, ',', '.') . "%",
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

    public function act_add_progresRta()
    {
        $tanggal = $this->input->post('tgl');
        $seksi = $this->input->post('seksi');
        $rencana = $this->input->post('rencana');
        $realisasi = $this->input->post('realisasi');

        $data = [
            'tgl_progres' => $tanggal,
            'seksi' => $seksi,
            'rencana' => $rencana,
            'realisasi' => $realisasi,
            'create_date' => date('Y-m-d h:i:s'),
        ];

        if (!empty($_FILES['file']['name'])) {
            $config = [];

            $filename = $_FILES['file']['name'];
            $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

            $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
            $nama = str_replace($string_replace, '_', $filename);
            $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

            $data['file'] = $eks_file;

            $uploadPath = 'file_uploads/progres/rta/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 0;
            $config['file_name'] = $eks_file;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('file')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
            } else {
                $this->M_progres->add_progresRTA($data);
                $this->session->set_flashdata('success', 'Data berhasil disimpan dengan file');
            }
        } else {
            $this->M_progres->add_progresRTA($data);
            $this->session->set_flashdata('success', 'Data berhasil disimpan tanpa file');
        }
        redirect('Progres/rta');
    }

    public function act_edit_progresRta()
    {
        $id_progres_rta = $this->input->post('id_progres_rta_edit');
        $tanggal = $this->input->post('tgl_edit');
        $seksi = $this->input->post('seksi_edit');
        $rencana = $this->input->post('rencana_edit');
        $realisasi = $this->input->post('realisasi_edit');

        $data = [
            'tgl_progres' => $tanggal,
            'seksi' => $seksi,
            'rencana' => $rencana,
            'realisasi' => $realisasi,
        ];

        if (!empty($_FILES['file']['name'])) {
            $config = [];

            $filename = $_FILES['file']['name'];
            $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

            $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
            $nama = str_replace($string_replace, '_', $filename);
            $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

            $data['file'] = $eks_file;

            $uploadPath = 'file_uploads/progres/rta/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 0;
            $config['file_name'] = $eks_file;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('file')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
            } else {
                $this->M_progres->update_progresRTA($id_progres_rta, $data);
                $this->session->set_flashdata('success', 'Data berhasil diperbarui dengan file');
            }
        } else {
            $this->M_progres->update_progresRTA($id_progres_rta, $data);
            $this->session->set_flashdata('success', 'Data berhasil disimpan tanpa file');
        }

        redirect('Progres/rta');
    }

    public function hapus_rta($id)
    {
        $this->db->where('id_progres_rta', $id);
        if ($this->db->delete('progres_rta')) {
            $this->session->set_flashdata('success', 'Data RTA Berhasil Di Hapus');
        } else {
            $this->session->set_flashdata('error', 'Data RTA Gagal Di Hapus');
        }
        redirect('Progres/rta');
    }

    public function progres_nilai()
    {
        $ses_data = array(
            'act_menu'   => 'progres_nilai',
            'title'      => 'Progres Nilai',
            'breadcrumb' => 'progres_nilai',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'seksi' => $this->M_progres->get_seksi(),
        );
        $this->template->load('template/admin_template', 'nilai/v_nilai.php', $data);
    }

    function getProgresNilai()
    {
        $this->load->model('M_progres');
        $result = $this->M_progres->get_progres_nilai();
        $data = [];
        $no = $_POST['start'];
        foreach ($result['data'] as $row) {
            $no++;

            if ($row->file != null) {
                $lokasi_file = base_url("file_uploads/progres/nilai/" . $row->file);
                $file = '<a href="' . $lokasi_file . '" target="_blank" class="btn btn-primary btn-sm" ><i class="fa fa-print"></i></a>';
            } else {
                $file = '-';
            }

            $aksi = '<td class="d-flex">
                <a href="#" class="btn btn-success btn-sm d-none" data-toggle="modal" data-target="#edit_nilai" data-id_progres_nilai="' . $row->id_progres_nilai . '" data-kontrak="' . $row->kontrak_ppn . '" data-akrual_progres="' . $row->akrual_progres . '" data-terbayar="' . $row->telah_dibayar . '" data-belum_terbayar="' . $row->belum_terbayar . '" data-seksi="' . $row->seksi . '" ><i class="fa fa-edit"></i></a>
                <a href="' . base_url('Progres/hapus_nilai/' . $row->id_progres_nilai) . '" title="hapus" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Yakin menghapus data ?\')"><i class="fa fa-trash"></i></a>
            </td>';

            $data[] = [
                'id'                => $no,
                'tgl_progres'       => date('d-m-Y', strtotime($row->tgl_progres)),
                'seksi_progres'     => $row->seksi_progres,
                'kontrak'           => "Rp. " . number_format($row->kontrak_ppn, 2, ',', '.'),
                'akrual_progres'    => "Rp. " . number_format($row->akrual_progres, 2, ',', '.'),
                'deviasi'           => "Rp. " . number_format($row->deviasi_rupiah_akrual, 2, ',', '.'),
                'terbayar'          => "Rp. " . number_format($row->telah_dibayar, 2, ',', '.'),
                'belum_terbayar'    => "Rp. " . number_format($row->belum_terbayar, 2, ',', '.'),
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

    public function add_progresNilai()
    {
        $ses_data = array(
            'act_menu'   => 'progres_nilai',
            'title'      => 'Progres Nilai',
            'breadcrumb' => 'progres_nilai',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'action' => site_url('Progres/act_add_progresNilai'),
            'seksi' => $this->M_progres->get_seksi(),
        );
        $this->template->load('template/admin_template', 'nilai/add_nilai.php', $data);
    }

    public function act_add_progresNilai()
    {
        $tanggal = $this->input->post('tgl');
        $seksi = $this->input->post('seksi');
        $kontrak_ppn = $this->input->post('kontrak_ppn');
        $akrual_progres = $this->input->post('akrual_progres');
        $telah_dibayar = $this->input->post('telah_dibayar');
        $deviasi_rupiah_dibayar = $this->input->post('deviasi_rupiah_dibayar');

        $data = [
            'tgl_progres' => $tanggal,
            'seksi' => $seksi,
            'kontrak_ppn' => $kontrak_ppn,
            'akrual_progres' => $akrual_progres,
            'telah_dibayar' => $telah_dibayar,
            'deviasi_rupiah_dibayar' => $deviasi_rupiah_dibayar,
        ];

        if (!empty($_FILES['file']['name'])) {
            $config = [];

            $filename = $_FILES['file']['name'];
            $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

            $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
            $nama = str_replace($string_replace, '_', $filename);
            $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

            $data['file'] = $eks_file;

            $uploadPath = 'file_uploads/progres/nilai/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 0;
            $config['file_name'] = $eks_file;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('file')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
            } else {
                $this->M_progres->add_progresNilai($data);
                $this->session->set_flashdata('success', 'Data berhasil disimpan dengan file');
            }
        } else {
            $this->M_progres->add_progresNilai($data);
            $this->session->set_flashdata('success', 'Data berhasil disimpan tanpa file');
        }
        redirect('Progres/progres_nilai');
    }

    public function hapus_nilai($id)
    {
        $this->db->where('id_progres_nilai', $id);
        if ($this->db->delete('progres_nilai')) {
            $this->session->set_flashdata('success', 'Data Progres Nilai Berhasil Di Hapus');
        } else {
            $this->session->set_flashdata('error', 'Data Progres Nilai Gagal Di Hapus');
        }
        redirect('Progres/progres_nilai');
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
            $this->session->set_flashdata('success', 'Data Isu/Permasalahan Berhasil Di Hapus');
        } else {
            $this->session->set_flashdata('error', 'Data Isu/Permasalahan Gagal Di Hapus');
        }
        redirect('Progres/progres_lahan');
    }

    public function alokasi_dtt()
    {
        $ses_data = array(
            'act_menu'   => 'alokasi_dtt',
            'title'      => 'Alokasi Dtt',
            'breadcrumb' => 'Alokasi Dtt',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            // 'row' => $this->M_progres->get_dana_talangan(),
            // 'seksi' => $this->M_progres->get_seksi(),
            'action_edit' => site_url('Progres/act_edit_danaTanah'),
        );
        $this->template->load('template/admin_template', 'keuangan/alokasi_dtt.php', $data);
    }

    function alokasiDTT()
    {
        $this->load->model('M_progres');
        $result = $this->M_progres->alokasi_dtt();
        $data = [];
        $no = $_POST['start'];

        foreach ($result['data'] as $row) {
            $no++;

            if ($row->dok_file != null) {
                $lokasi_file = base_url("file_uploads/keuangan/" . $row->dok_file);
                $file = '<a href="' . $lokasi_file . '" target="_blank" class="btn btn-primary btn-sm" ><i class="fa fa-print"></i></a>';
            } else {
                $file = '-';
            }

            $aksi = '<td class="d-flex">
                <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editDtt" data-id_dtt="' . $row->id_dtt . '" data-tanggal="' . $row->tanggal . '" data-periode="' . $row->periode . '" data-ad_kumulatif="' . $row->ad_kumulatif . '" data-ad_periodik="' . $row->ad_periodik . '" data-ad_pl="' . $row->ad_pl . '" data-ad_dtt="' . $row->ad_dtt . '" data-persetujuan_dtt="' . $row->persetujuan_dtt . '" data-jenis="' . $row->jenis . '"><i class="fa fa-edit"></i></a>
                <a href="' . site_url('Progres/hapus_dtt/' . $row->id_dtt) . '" title="hapus" class="btn btn-danger btn-sm" onClick="javasciprt: return confirm(\'Yakin menghapus data ?\')"><i class="fa fa-trash"></i></a>
            </td>';

            $data[] = [
                'id'                    => $no,
                'tanggal'               => date('d-m-Y', strtotime($row->tanggal)),
                'periode'               => $row->periode,
                'kumulatif'             => "Rp. " . number_format($row->ad_kumulatif, 0, ',', '.'),
                'periodik'              => "Rp. " . number_format($row->ad_periodik, 0, ',', '.'),
                'pembayaran_langsung'   => "Rp. " . number_format($row->ad_pl, 0, ',', '.'),
                'dana_talangan'         => "Rp. " . number_format($row->ad_dtt, 0, ',', '.'),
                'persetujuan_dtt'       => "Rp. " . number_format($row->persetujuan_dtt, 0, ',', '.'),
                'file'                  => $file,
                'aksi'                  => $aksi
            ];
        }

        echo json_encode([
            "draw" => $_POST['draw'],
            "recordsTotal" => $result['count_all'],
            "recordsFiltered" => $result['count_filtered'],
            "data" => $data
        ]);
    }

    // Untuk Dashboard
    function getAlokasiDTT()
    {
        $row = $this->M_progres->getAlokasiDTT();
        $data_series = [];
        if ($row) {
            foreach ($row as $key => $value) {
                if ($key != 'tanggal') { // selain kolom tanggal
                    $formatted_value = 'Rp ' . number_format($value, 0, ',', '.');

                    $label = '';
                    $label_custom = '';
                    $color = '';
                    switch ($key) {
                        case 'ad_pl':
                            $label = 'Pembayaran Langsung';
                            $color = '#FFB848';
                            break;
                        case 'ad_dtt':
                            $label = 'Dana Talangan Tanah';
                            $color = '#0639BD';
                            break;
                        default:
                            $label = ucfirst(str_replace('_', ' ', $key)); // fallback otomatis
                            $color = '#000';
                            break;
                    }

                    $label_custom = $label . ' : <span class="badge badge-lg badge-pill" style="background:' . $color . ';color:#fff;font-size:11px;"><b>' . $formatted_value . '</b></span>';

                    $data_series[] = [
                        'name' => $label,
                        'name_custom' => $label_custom,
                        'color' => $color,
                        'y'    => (float)$value
                    ];
                }
            }

            $output = [
                'series'  => $data_series
            ];
        } else {
            $output = [
                'series'  => []
            ];
        }

        header('Content-Type: application/json');
        echo json_encode($output);
    }

    public function add_dtt()
    {
        $ses_data = array(
            'act_menu'   => 'alokasi_dtt',
            'title'      => 'Alokasi Dtt',
            'breadcrumb' => 'Alokasi Dtt',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'seksi' => $this->M_progres->get_seksi(),
            'action_add' => site_url('Progres/act_add_danaTanah'),

        );
        $this->template->load('template/admin_template', 'keuangan/add_alokasi_dtt.php', $data);
    }


    public function act_add_danaTanah()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $dana_akumulatif = str_replace('.', '', $this->input->post('dana_akumulatif'));
        $dana_periodik = str_replace('.', '', $this->input->post('dana_periodik'));
        $dana_pl = str_replace('.', '', $this->input->post('dana_pl'));
        $dana_dtt = str_replace('.', '', $this->input->post('dana_dtt'));
        $persetujuan_dtt = str_replace('.', '', $this->input->post('persetujuan_dtt'));

        $data = array(
            'ad_kumulatif' => $dana_akumulatif,
            'ad_periodik' => $dana_periodik,
            'ad_pl' => $dana_pl,
            'ad_dtt' => $dana_dtt,
            'persetujuan_dtt' => $persetujuan_dtt,
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'periode' => $this->input->post('periode'),
            'jenis' => $this->input->post('jenis'),
            'dok_file' => $eks_file,
            'create_date' => date('Y-m-d h:i:s'),
        );

        $data2 = array(
            'ad_kumulatif' => $dana_akumulatif,
            'ad_periodik' => $dana_periodik,
            'ad_pl' => $dana_pl,
            'ad_dtt' => $dana_dtt,
            'persetujuan_dtt' => $persetujuan_dtt,
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'periode' => $this->input->post('periode'),
            'jenis' => $this->input->post('jenis'),
            'create_date' => date('Y-m-d h:i:s'),
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

            if ($this->db->insert('dana_talangan', $data)) {
                echo $this->session->set_flashdata('success', 'Data Alokasi Dana Tanah Berhasil Di Tambah');
            } else {
                echo $this->session->set_flashdata('error', 'Data Alokasi Dana Tanah Gagal Di Tambah');
            }
        } else {

            if ($this->db->insert('dana_talangan', $data2)) {
                echo $this->session->set_flashdata('success', 'Data Alokasi Dana Tanah Berhasil Di Tambah tanpa file pendukung');
            } else {
                echo $this->session->set_flashdata('error', 'Data Alokasi Dana Tanah Gagal Di Tambah');
            }
        }

        redirect('Progres/alokasi_dtt');
    }

    public function act_edit_danaTanah()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $id_dtt = $this->input->post('id_dtt');
        $dana_akumulatif = str_replace('.', '', $this->input->post('dana_akumulatif'));
        $dana_periodik = str_replace('.', '', $this->input->post('dana_periodik'));
        $dana_pl = str_replace('.', '', $this->input->post('dana_pl'));
        $dana_dtt = str_replace('.', '', $this->input->post('dana_dtt'));
        $persetujuan_dtt = str_replace('.', '', $this->input->post('persetujuan_dtt'));

        $data = array(
            'ad_kumulatif' => $dana_akumulatif,
            'ad_periodik' => $dana_periodik,
            'ad_pl' => $dana_pl,
            'ad_dtt' => $dana_dtt,
            'persetujuan_dtt' => $persetujuan_dtt,
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'periode' => $this->input->post('periode'),
            'jenis' => $this->input->post('jenis'),
            'dok_file' => $eks_file,
        );

        $data2 = array(
            'ad_kumulatif' => $dana_akumulatif,
            'ad_periodik' => $dana_periodik,
            'ad_pl' => $dana_pl,
            'ad_dtt' => $dana_dtt,
            'persetujuan_dtt' => $persetujuan_dtt,
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'periode' => $this->input->post('periode'),
            'jenis' => $this->input->post('jenis'),
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
            $this->db->where('id_dtt', $id_dtt);
            if ($this->db->update('dana_talangan', $data)) {
                $this->session->set_flashdata('success', 'Data Alokasi Dana Tanah Berhasil Di Edit');
            } else {
                $this->session->set_flashdata('error', 'Data Alokasi Dana Tanah Gagal Di Edit');
            }
        } else {
            $this->db->where('id_dtt', $id_dtt);
            if ($this->db->update('dana_talangan', $data2)) {
                $this->session->set_flashdata('success', 'Data Alokasi Dana Tanah Berhasil Di Edit tanpa file pendukung');
            } else {
                $this->session->set_flashdata('error', 'Data Alokasi Dana Tanah Gagal Di Edit');
            }
        }

        redirect('Progres/alokasi_dtt');
    }

    public function hapus_dtt($id)
    {
        $this->db->where('id_dtt', $id);
        if ($this->db->delete('dana_talangan')) {
            $this->session->set_flashdata('success', 'Data Alokasi Dana Tanah Berhasil Di Hapus');
        } else {
            $this->session->set_flashdata('error', 'Data Alokasi Dana Tanah Gagal Di Hapus');
        }
        redirect('Progres/alokasi_dtt');
    }

    function getPenyerapanDtt()
    {
        $this->load->model('M_progres');
        $result = $this->M_progres->getPenyerapanDtt();
        $data = [];
        $no = $_POST['start'];

        foreach ($result['data'] as $row) {
            $no++;

            if ($row->dok_file != null) {
                $lokasi_file = base_url("file_uploads/keuangan/" . $row->dok_file);
                $file = '<a href="' . $lokasi_file . '" target="_blank" class="btn btn-primary btn-sm" ><i class="fa fa-print"></i></a>';
            } else {
                $file = '-';
            }

            $aksi = '<td class="text-center">
                <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editPenyerapanDtt" data-id_penyerapan="' . $row->id_penyerapan . '" data-tanggal="' . $row->tanggal . '" data-periode="' . $row->periode . '" data-realisasi_internal_pl="' . $row->realisasi_internal_pl . '" data-realisasi_internal_dtt="' . $row->realisasi_internal_dtt . '" data-realisasi_tanah="' . $row->realisasi_tanah . '" data-realisasi_pl="' . $row->realisasi_pl . '" data-realisasi_dtt="' . $row->realisasi_dtt . '" data-carry_over="' . $row->carry_over . '" data-jenis="' . $row->jenis . '"><i class="fa fa-edit"></i></a>
                <a href="' . site_url('Progres/hapus_penyerapan/' . $row->id_penyerapan) . '" title="hapus" class="btn btn-danger btn-sm" onClick="javasciprt: return confirm(\'Yakin menghapus data ?\')"><i class="fa fa-trash"></i></a>
            </td>';

            $data[] = [
                'id'                        => $no,
                'tanggal'                   => date('d-m-Y', strtotime($row->tanggal)),
                'periode'                   => $row->periode,
                'realisasi_internal_pl'     => "Rp. " . number_format($row->realisasi_internal_pl, 0, ',', '.'),
                'realisasi_internal_dtt'    => "Rp. " . number_format($row->realisasi_internal_dtt, 0, ',', '.'),
                'realisasi_tanah'           => "Rp. " . number_format($row->realisasi_tanah, 0, ',', '.'),
                'realisasi_pl'              => "Rp. " . number_format($row->realisasi_pl, 0, ',', '.'),
                'realisasi_dtt'             => "Rp. " . number_format($row->realisasi_dtt, 0, ',', '.'),
                'carry_over'                => "Rp. " . number_format($row->carry_over, 0, ',', '.'),
                'file'                      => $file,
                'aksi'                      => $aksi
            ];
        }

        echo json_encode([
            "draw" => $_POST['draw'],
            "recordsTotal" => $result['count_all'],
            "recordsFiltered" => $result['count_filtered'],
            "data" => $data
        ]);
    }

    public function penyerapan_dtt()
    {
        $ses_data = array(
            'act_menu'   => 'penyerapan_dtt',
            'title'      => 'Penyerapan Dtt',
            'breadcrumb' => 'Penyerapan Dtt',
        );
        $this->session->set_userdata($ses_data);
        $aa = $this->M_progres->get_dana_talangan();
        $data = array(
            'action_edit' => site_url('Progres/act_edit_penyerapan_dtt'),
        );
        $this->template->load('template/admin_template', 'keuangan/v_penyerapan_dtt.php', $data);
    }

    public function add_penyerapan_dt()
    {
        $ses_data = array(
            'act_menu'   => 'penyerapan_dtt',
            'title'      => 'Penyerapan Dtt',
            'breadcrumb' => 'Penyerapan Dtt',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'seksi' => $this->M_progres->get_seksi(),
            'action_add' => site_url('Progres/act_add_penyerapan'),

        );
        $this->template->load('template/admin_template', 'keuangan/add_penyerapan_dtt.php', $data);
    }

    public function act_add_penyerapan()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $realisasi_internal_pl = str_replace('.', '', $this->input->post('realisasi_internal_pl'));
        $realisasi_internal_dtt = str_replace('.', '', $this->input->post('realisasi_internal_dtt'));
        $realisasi_tanah = str_replace('.', '', $this->input->post('realisasi_tanah'));
        $realisasi_pl = str_replace('.', '', $this->input->post('realisasi_pl'));
        $realisasi_dtt = str_replace('.', '', $this->input->post('realisasi_dtt'));
        $carry_over = str_replace('.', '', $this->input->post('carry_over'));

        $data = array(
            'realisasi_internal_pl' => $realisasi_internal_pl,
            'realisasi_internal_dtt' => $realisasi_internal_dtt,
            'realisasi_tanah' => $realisasi_tanah,
            'realisasi_pl' => $realisasi_pl,
            'realisasi_dtt' => $realisasi_dtt,
            'carry_over' => $carry_over,
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'periode' => $this->input->post('periode'),
            'jenis' => $this->input->post('jenis'),
            'dok_file' => $eks_file,
            'create_date' => date('Y-m-d h:i:s'),
        );

        $data2 = array(
            'realisasi_internal_pl' => $realisasi_internal_pl,
            'realisasi_internal_dtt' => $realisasi_internal_dtt,
            'realisasi_tanah' => $realisasi_tanah,
            'realisasi_pl' => $realisasi_pl,
            'realisasi_dtt' => $realisasi_dtt,
            'carry_over' => $carry_over,
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'periode' => $this->input->post('periode'),
            'jenis' => $this->input->post('jenis'),
            'create_date' => date('Y-m-d h:i:s'),
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

            if ($this->db->insert('penyerapan_dt', $data)) {
                echo $this->session->set_flashdata('success', 'Data Penyerapan Dana Tanah Berhasil Di Tambah');
            } else {
                echo $this->session->set_flashdata('error', 'Data Penyerapan Dana Tanah Gagal Di Tambah');
            }
        } else {

            if ($this->db->insert('penyerapan_dt', $data2)) {
                echo $this->session->set_flashdata('success', 'Data Penyerapan Dana Tanah Berhasil Di Tambah tanpa file pendukung');
            } else {
                echo $this->session->set_flashdata('error', 'Data Penyerapan Dana Tanah Gagal Di Tambah');
            }
        }

        redirect('Progres/penyerapan_dtt');
    }

    public function act_edit_penyerapan_dtt()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $id_penyerapan = $this->input->post('id_penyerapan');
        $realisasi_internal_pl = str_replace('.', '', $this->input->post('realisasi_internal_pl'));
        $realisasi_internal_dtt = str_replace('.', '', $this->input->post('realisasi_internal_dtt'));
        $realisasi_tanah = str_replace('.', '', $this->input->post('realisasi_tanah'));
        $realisasi_pl = str_replace('.', '', $this->input->post('realisasi_pl'));
        $realisasi_dtt = str_replace('.', '', $this->input->post('realisasi_dtt'));
        $carry_over = str_replace('.', '', $this->input->post('carry_over'));

        $data = array(
            'realisasi_internal_pl' => $realisasi_internal_pl,
            'realisasi_internal_dtt' => $realisasi_internal_dtt,
            'realisasi_tanah' => $realisasi_tanah,
            'realisasi_pl' => $realisasi_pl,
            'realisasi_dtt' => $realisasi_dtt,
            'carry_over' => $carry_over,
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'periode' => $this->input->post('periode'),
            'jenis' => $this->input->post('jenis'),
            'dok_file' => $eks_file,
        );

        $data2 = array(
            'realisasi_internal_pl' => $realisasi_internal_pl,
            'realisasi_internal_dtt' => $realisasi_internal_dtt,
            'realisasi_tanah' => $realisasi_tanah,
            'realisasi_pl' => $realisasi_pl,
            'realisasi_dtt' => $realisasi_dtt,
            'carry_over' => $carry_over,
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'periode' => $this->input->post('periode'),
            'jenis' => $this->input->post('jenis'),
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
            $this->db->where('id_penyerapan', $id_penyerapan);
            if ($this->db->update('penyerapan_dt', $data)) {
                echo $this->session->set_flashdata('success', 'Data Penyerapan Dana Tanah Berhasil Di Update');
            } else {
                echo $this->session->set_flashdata('error', 'Data Penyerapan Dana Tanah Gagal Di Update');
            }
        } else {
            $this->db->where('id_penyerapan', $id_penyerapan);
            if ($this->db->update('penyerapan_dt', $data2)) {
                echo $this->session->set_flashdata('success', 'Data Penyerapan Dana Tanah Berhasil Di Update tanpa file pendukung');
            } else {
                echo $this->session->set_flashdata('error', 'Data Penyerapan Dana Tanah Gagal Di Update');
            }
        }

        redirect('Progres/penyerapan_dtt');
    }

    public function hapus_penyerapan($id)
    {
        $this->db->where('id_penyerapan', $id);
        if ($this->db->delete('penyerapan_dt')) {
            $this->session->set_flashdata('success', 'Data Penyerapan Dana Tanah Berhasil Di Hapus');
        } else {
            $this->session->set_flashdata('error', 'Data Penyerapan Dana Tanah Gagal Di Hapus');
        }
        redirect('Progres/penyerapan_dtt');
    }

    function getPenyerapanLMAN()
    {
        $this->load->model('M_progres');
        $result = $this->M_progres->getPenyerapanLMAN();
        $data = [];
        $no = $_POST['start'];

        foreach ($result['data'] as $row) {
            $no++;

            if ($row->dok_file != null) {
                $lokasi_file = base_url("file_uploads/keuangan/" . $row->dok_file);
                $file = '<a href="' . $lokasi_file . '" target="_blank" class="btn btn-primary btn-sm" ><i class="fa fa-print"></i></a>';
            } else {
                $file = '-';
            }

            $aksi = '<td class="text-center">
                <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editPengembalianLman" data-id_pengembalian_lman="' . $row->id_pengembalian_lman . '" data-tanggal="' . $row->tanggal . '" data-periode="' . $row->periode . '" data-rekon_dtt="' . $row->rekon_dtt . '" data-rekon_cof="' . $row->rekon_cof . '" data-pengembalian_dtt="' . $row->pengembalian_dtt . '" data-pengembalian_cof="' . $row->pengembalian_cof . '" data-penerimaan_kembali_dtt="' . $row->penerimaan_kembali_dtt . '" data-penerimaan_kembali_cof="' . $row->penerimaan_kembali_cof . '" data-jenis="' . $row->jenis . '"><i class="fa fa-edit"></i></a>
                <a href="' . site_url('Progres/hapus_pengembalian_lman/' . $row->id_pengembalian_lman) . '" title="hapus" class="btn btn-danger btn-sm" onClick="javasciprt: return confirm(\'Yakin menghapus data ?\')"><i class="fa fa-trash"></i></a>
            </td>';

            $data[] = [
                'id'                        => $no,
                'tanggal'                   => date('d-m-Y', strtotime($row->tanggal)),
                'periode'                   => $row->periode,
                'rekon_dtt'                 => "Rp. " . number_format($row->rekon_dtt, 0, ',', '.'),
                'rekon_cof'                 => "Rp. " . number_format($row->rekon_cof, 0, ',', '.'),
                'pengembalian_dtt'          => "Rp. " . number_format($row->pengembalian_dtt, 0, ',', '.'),
                'pengembalian_cof'          => "Rp. " . number_format($row->pengembalian_cof, 0, ',', '.'),
                'penerimaan_kembali_dtt'    => "Rp. " . number_format($row->penerimaan_kembali_dtt, 0, ',', '.'),
                'penerimaan_kembali_cof'    => "Rp. " . number_format($row->penerimaan_kembali_cof, 0, ',', '.'),
                'file'                      => $file,
                'aksi'                      => $aksi
            ];
        }

        echo json_encode([
            "draw" => $_POST['draw'],
            "recordsTotal" => $result['count_all'],
            "recordsFiltered" => $result['count_filtered'],
            "data" => $data
        ]);
    }

    public function pengembalian_lman()
    {
        $ses_data = array(
            'act_menu'   => 'pengembalian_lman',
            'title'      => 'Pengembalian LMAN',
            'breadcrumb' => 'Pengembalian LMAN',
        );
        $this->session->set_userdata($ses_data);
        $aa = $this->M_progres->get_dana_talangan();
        $data = array(
            // 'row' => $this->M_progres->get_dana_talangan(),
            // 'seksi' => $this->M_progres->get_seksi(),
            'action_edit' => site_url('Progres/act_edit_kembali_lman'),
        );
        $this->template->load('template/admin_template', 'keuangan/v_pengembalian_lman.php', $data);
    }

    public function add_pengembalian_lman()
    {
        $ses_data = array(
            'act_menu'   => 'pengembalian_lman',
            'title'      => 'Pengembalian LMAN',
            'breadcrumb' => 'Pengembalian LMAN',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'seksi' => $this->M_progres->get_seksi(),
            'action_add' => site_url('Progres/act_add_kembali_lman'),

        );
        $this->template->load('template/admin_template', 'keuangan/add_pengembalian_lman.php', $data);
    }

    public function act_add_kembali_lman()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $rekon_dtt = str_replace('.', '', $this->input->post('rekon_dtt'));
        $rekon_cof = str_replace('.', '', $this->input->post('rekon_cof'));
        $pengembalian_dtt = str_replace('.', '', $this->input->post('pengembalian_dtt'));
        $pengembalian_cof = str_replace('.', '', $this->input->post('pengembalian_cof'));
        $penerimaan_kembali_dtt = str_replace('.', '', $this->input->post('penerimaan_kembali_dtt'));
        $penerimaan_kembali_cof = str_replace('.', '', $this->input->post('penerimaan_kembali_cof'));

        $data = array(
            'rekon_dtt' => $rekon_dtt,
            'rekon_cof' => $rekon_cof,
            'pengembalian_dtt' => $pengembalian_dtt,
            'pengembalian_cof' => $pengembalian_cof,
            'penerimaan_kembali_dtt' => $penerimaan_kembali_dtt,
            'penerimaan_kembali_cof' => $penerimaan_kembali_cof,
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'periode' => $this->input->post('periode'),
            'jenis' => $this->input->post('jenis'),
            'dok_file' => $eks_file,
            'create_date' => date('Y-m-d h:i:s'),
        );

        $data2 = array(
            'rekon_dtt' => $rekon_dtt,
            'rekon_cof' => $rekon_cof,
            'pengembalian_dtt' => $pengembalian_dtt,
            'pengembalian_cof' => $pengembalian_cof,
            'penerimaan_kembali_dtt' => $penerimaan_kembali_dtt,
            'penerimaan_kembali_cof' => $penerimaan_kembali_cof,
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'periode' => $this->input->post('periode'),
            'jenis' => $this->input->post('jenis'),
            'create_date' => date('Y-m-d h:i:s'),
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

            if ($this->db->insert('pengembalian_lman', $data)) {
                echo $this->session->set_flashdata('success', 'Data Pengembalian LMAN Berhasil Di Tambah');
            } else {
                echo $this->session->set_flashdata('error', 'Data Pengembalian LMAN Gagal Di Tambah');
            }
        } else {

            if ($this->db->insert('pengembalian_lman', $data2)) {
                echo $this->session->set_flashdata('success', 'Data Pengembalian LMAN Berhasil Di Tambah tanpa file pendukung');
            } else {
                echo $this->session->set_flashdata('error', 'Data Pengembalian LMAN Gagal Di Tambah');
            }
        }

        redirect('Progres/pengembalian_lman');
    }

    public function act_edit_kembali_lman()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $id_pengembalian_lman = $this->input->post('id_pengembalian_lman');
        $rekon_dtt = str_replace('.', '', $this->input->post('rekon_dtt'));
        $rekon_cof = str_replace('.', '', $this->input->post('rekon_cof'));
        $pengembalian_dtt = str_replace('.', '', $this->input->post('pengembalian_dtt'));
        $pengembalian_cof = str_replace('.', '', $this->input->post('pengembalian_cof'));
        $penerimaan_kembali_dtt = str_replace('.', '', $this->input->post('penerimaan_kembali_dtt'));
        $penerimaan_kembali_cof = str_replace('.', '', $this->input->post('penerimaan_kembali_cof'));

        $data = array(
            'rekon_dtt' => $rekon_dtt,
            'rekon_cof' => $rekon_cof,
            'pengembalian_dtt' => $pengembalian_dtt,
            'pengembalian_cof' => $pengembalian_cof,
            'penerimaan_kembali_dtt' => $penerimaan_kembali_dtt,
            'penerimaan_kembali_cof' => $penerimaan_kembali_cof,
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'periode' => $this->input->post('periode'),
            'jenis' => $this->input->post('jenis'),
            'dok_file' => $eks_file,
        );

        $data2 = array(
            'rekon_dtt' => $rekon_dtt,
            'rekon_cof' => $rekon_cof,
            'pengembalian_dtt' => $pengembalian_dtt,
            'pengembalian_cof' => $pengembalian_cof,
            'penerimaan_kembali_dtt' => $penerimaan_kembali_dtt,
            'penerimaan_kembali_cof' => $penerimaan_kembali_cof,
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'periode' => $this->input->post('periode'),
            'jenis' => $this->input->post('jenis'),
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
            $this->db->where('id_pengembalian_lman', $id_pengembalian_lman);
            if ($this->db->update('pengembalian_lman', $data)) {
                echo $this->session->set_flashdata('success', 'Data Pengembalian LMAN Berhasil Di Update');
            } else {
                echo $this->session->set_flashdata('error', 'Data Pengembalian LMAN Gagal Di Update');
            }
        } else {
            $this->db->where('id_pengembalian_lman', $id_pengembalian_lman);
            if ($this->db->update('pengembalian_lman', $data2)) {
                echo $this->session->set_flashdata('success', 'Data Pengembalian LMAN Berhasil Di Update tanpa file pendukung');
            } else {
                echo $this->session->set_flashdata('error', 'Data Pengembalian LMAN Gagal Di Update');
            }
        }

        redirect('Progres/pengembalian_lman');
    }

    public function hapus_pengembalian_lman($id)
    {
        $this->db->where('id_pengembalian_lman', $id);
        if ($this->db->delete('pengembalian_lman')) {
            $this->session->set_flashdata('success', 'Data Pengembalian LMAN Berhasil Di Hapus');
        } else {
            $this->session->set_flashdata('error', 'Data Pengembalian LMAN Gagal Di Hapus');
        }
        redirect('Progres/pengembalian_lman');
    }

    function fasilitasDTT()
    {
        $this->load->model('M_progres');
        $result = $this->M_progres->fasilitasDTT();
        $data = [];
        $no = $_POST['start'];

        foreach ($result['data'] as $row) {
            $no++;

            if ($row->dok_file != null) {
                $lokasi_file = base_url("file_uploads/keuangan/" . $row->dok_file);
                $file = '<a href="' . $lokasi_file . '" target="_blank" class="btn btn-primary btn-sm" ><i class="fa fa-print"></i></a>';
            } else {
                $file = '-';
            }

            $aksi = '<td class="text-center">
                <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editFasilitasDtt" data-id_fasilitas_dtt="' . $row->id_fasilitas_dtt . '" data-tanggal="' . $row->tanggal . '" data-periode="' . $row->periode . '" data-plafon_kredit="' . $row->plafon_kredit . '" data-penarikan_kredit="' . $row->penarikan_kredit . '" data-pengembalian_hutang="' . $row->pengembalian_hutang . '" data-sisa_plafon="' . $row->sisa_plafon . '" data-jenis="' . $row->jenis . '"><i class="fa fa-edit"></i></a>
                <a href="' . site_url('Progres/hapus_fasilitas_dtt/' . $row->id_fasilitas_dtt) . '" title="hapus" class="btn btn-danger btn-sm" onClick="javasciprt: return confirm(\'Yakin menghapus data ?\')"><i class="fa fa-trash"></i></a>
            </td>';

            $data[] = [
                'id'                        => $no,
                'tanggal'                   => date('d-m-Y', strtotime($row->tanggal)),
                'periode'                   => $row->periode,
                'plafon_kredit'             => "Rp. " . number_format($row->plafon_kredit, 0, ',', '.'),
                'penarikan_kredit'          => "Rp. " . number_format($row->penarikan_kredit, 0, ',', '.'),
                'pengembalian_hutang'       => "Rp. " . number_format($row->pengembalian_hutang, 0, ',', '.'),
                'sisa_plafon'               => "Rp. " . number_format($row->sisa_plafon, 0, ',', '.'),
                'file'                      => $file,
                'aksi'                      => $aksi
            ];
        }

        echo json_encode([
            "draw" => $_POST['draw'],
            "recordsTotal" => $result['count_all'],
            "recordsFiltered" => $result['count_filtered'],
            "data" => $data
        ]);
    }

    public function fasilitas_dtt()
    {
        $ses_data = array(
            'act_menu'   => 'fasilitas_dtt',
            'title'      => 'Fasilitas DTT',
            'breadcrumb' => 'Fasilitas DTT',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            // 'row' => $this->M_progres->get_dana_talangan(),
            // 'seksi' => $this->M_progres->get_seksi(),
            'action_edit' => site_url('Progres/act_edit_fasilitas_dtt'),
        );
        $this->template->load('template/admin_template', 'keuangan/v_fasilitas_dtt.php', $data);
    }

    function getFasilitasDTT()
    {
        $row = $this->M_progres->getFasilitasDTT();
        $data_series = [];
        if ($row) {
            foreach ($row as $key => $value) {
                if ($key != 'tanggal') { // selain kolom tanggal
                    $formatted_value = 'Rp ' . number_format($value, 0, ',', '.');

                    $label = '';
                    $label_custom = '';
                    $color = '';
                    switch ($key) {
                        case 'penarikan_kredit':
                            $label = 'Outstanding';
                            $color = '#FFB848';
                            break;
                        case 'sisa_plafon':
                            $label = 'Sisa Plafon';
                            $color = '#0639BD';
                            break;
                        default:
                            $label = ucfirst(str_replace('_', ' ', $key)); // fallback otomatis
                            $color = '#000';
                            break;
                    }

                    $label_custom = $label . ' : <span class="badge badge-lg badge-pill" style="background:' . $color . ';color:#fff;font-size:11px;"><b>' . $formatted_value . '</b></span>';

                    $data_series[] = [
                        'name' => $label,
                        'name_custom' => $label_custom,
                        'color' => $color,
                        'y'    => (float)$value
                    ];
                }
            }

            $output = [
                'series'  => $data_series
            ];
        } else {
            $output = [
                'series'  => []
            ];
        }

        header('Content-Type: application/json');
        echo json_encode($output);
    }

    public function add_fasilitas_dtt()
    {
        $ses_data = array(
            'act_menu'   => 'fasilitas_dtt',
            'title'      => 'Fasilitas DTT',
            'breadcrumb' => 'Fasilitas DTT',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'seksi' => $this->M_progres->get_seksi(),
            'action_add' => site_url('Progres/act_add_fasilitas_dtt'),

        );
        $this->template->load('template/admin_template', 'keuangan/add_fasilitas_dtt.php', $data);
    }

    public function act_add_fasilitas_dtt()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $plafon_kredit = str_replace('.', '', $this->input->post('plafon_kredit'));
        $penarikan_kredit = str_replace('.', '', $this->input->post('penarikan_kredit'));
        $pengembalian_hutang = str_replace('.', '', $this->input->post('pengembalian_hutang'));
        $sisa_plafon = str_replace('.', '', $this->input->post('sisa_plafon'));

        $data = array(
            'plafon_kredit' => $plafon_kredit,
            'penarikan_kredit' => $penarikan_kredit,
            'pengembalian_hutang' => $pengembalian_hutang,
            'sisa_plafon' => $sisa_plafon,
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'periode' => $this->input->post('periode'),
            'jenis' => $this->input->post('jenis'),
            'dok_file' => $eks_file,
            'create_date' => date('Y-m-d h:i:s'),
        );

        $data2 = array(
            'plafon_kredit' => $plafon_kredit,
            'penarikan_kredit' => $penarikan_kredit,
            'pengembalian_hutang' => $pengembalian_hutang,
            'sisa_plafon' => $sisa_plafon,
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'periode' => $this->input->post('periode'),
            'jenis' => $this->input->post('jenis'),
            'create_date' => date('Y-m-d h:i:s'),
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

            if ($this->db->insert('fasilitas_dtt', $data)) {
                echo $this->session->set_flashdata('success', 'Data Fasilitas DTT Berhasil Di Tambah');
            } else {
                echo $this->session->set_flashdata('error', 'Data Fasilitas DTT Gagal Di Tambah');
            }
        } else {

            if ($this->db->insert('fasilitas_dtt', $data2)) {
                echo $this->session->set_flashdata('success', 'Data Fasilitas DTT Berhasil Di Tambah tanpa file pendukung');
            } else {
                echo $this->session->set_flashdata('error', 'Data Fasilitas DTT Gagal Di Tambah');
            }
        }

        redirect('Progres/fasilitas_dtt');
    }

    public function act_edit_fasilitas_dtt()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $id_fasilitas_dtt = $this->input->post('id_fasilitas_dtt');
        $plafon_kredit = str_replace('.', '', $this->input->post('plafon_kredit'));
        $penarikan_kredit = str_replace('.', '', $this->input->post('penarikan_kredit'));
        $pengembalian_hutang = str_replace('.', '', $this->input->post('pengembalian_hutang'));
        $sisa_plafon = str_replace('.', '', $this->input->post('sisa_plafon'));

        $data = array(
            'plafon_kredit' => $plafon_kredit,
            'penarikan_kredit' => $penarikan_kredit,
            'pengembalian_hutang' => $pengembalian_hutang,
            'sisa_plafon' => $sisa_plafon,
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'periode' => $this->input->post('periode'),
            'jenis' => $this->input->post('jenis'),
            'dok_file' => $eks_file,
        );

        $data2 = array(
            'plafon_kredit' => $plafon_kredit,
            'penarikan_kredit' => $penarikan_kredit,
            'pengembalian_hutang' => $pengembalian_hutang,
            'sisa_plafon' => $sisa_plafon,
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'periode' => $this->input->post('periode'),
            'jenis' => $this->input->post('jenis'),
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
            $this->db->where('id_fasilitas_dtt', $id_fasilitas_dtt);
            if ($this->db->update('fasilitas_dtt', $data)) {
                echo $this->session->set_flashdata('success', 'Data Fasilitas DTT Berhasil Di Update');
            } else {
                echo $this->session->set_flashdata('error', 'Data Fasilitas DTT Gagal Di Update');
            }
        } else {
            $this->db->where('id_fasilitas_dtt', $id_fasilitas_dtt);
            if ($this->db->update('fasilitas_dtt', $data2)) {
                echo $this->session->set_flashdata('success', 'Data Fasilitas DTT Berhasil Di Update tanpa file pendukung');
            } else {
                echo $this->session->set_flashdata('error', 'Data Fasilitas DTT Gagal Di Update');
            }
        }

        redirect('Progres/fasilitas_dtt');
    }

    public function hapus_fasilitas_dtt($id)
    {
        $this->db->where('id_fasilitas_dtt', $id);
        if ($this->db->delete('fasilitas_dtt')) {
            $this->session->set_flashdata('success', 'Data Fasilitas DTT Berhasil Di Hapus');
        } else {
            $this->session->set_flashdata('error', 'Data Fasilitas DTT Gagal Di Hapus');
        }
        redirect('Progres/fasilitas_dtt');
    }

    public function import_file_excel()
    {
        $this->load->model('M_progres', 'model_progres');
        $folder = 'excel/progres';
        $config['upload_path'] = 'file_uploads/' . $folder;
        $config['allowed_types'] = 'xlsx|xls';
        $filename = date('Y-m-d_H-i-s') . '_' . $_FILES['fileexcel']['name'];
        $config['file_name'] = $filename;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('fileexcel')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
            $upload_data = $this->upload->data(); //Mengambil detail data yang di upload
            $filename = $upload_data['file_name']; //Nama File
            $this->model_progres->import_excel($folder, $filename);
        }
        // Set flashdata untuk menampilkan pesan error atau success
        if (isset($error)) {
            $this->session->set_flashdata('error', 'Gagal upload file excel: ' . $error['error']);
        } else {
            $this->session->set_flashdata('success', 'Berhasil upload file excel');
        }

        redirect('progres/progres_nilai');
    }
}
