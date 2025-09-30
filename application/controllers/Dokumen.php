<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokumen extends CI_Controller
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
        $this->load->model(array('M_dokumen'));
    }

    public function export_file_excel()
    {
        require_once APPPATH . 'libraries/PHPExcel.php';
        $excel = new PHPExcel();
        $excel->setActiveSheetIndex(0);
        $sheet = $excel->getActiveSheet();

        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Tahapan');
        $sheet->setCellValue('C1', 'Sub Tahapan');
        $sheet->setCellValue('D1', 'Jenis Dokumen');
        $sheet->setCellValue('E1', 'Nomor Dokumen');
        $sheet->setCellValue('F1', 'Tanggal (m/d/Y)');
        $sheet->setCellValue('G1', 'Pihak');
        $sheet->setCellValue('H1', 'Jumlah Halaman');
        $sheet->setCellValue('I1', 'Nama File');

        $sheet->getStyle('A1')->getFont()->setBold(true);
        $sheet->getStyle('B1')->getFont()->setBold(true);
        $sheet->getStyle('C1')->getFont()->setItalic(true);
        $sheet->getStyle('D1')->getFont()->setBold(true);
        $sheet->getStyle('F1')->getFont()->setBold(true);
        $sheet->getStyle('H1')->getFont()->setBold(true);

        $row = 2;
        $data = $this->db->query("SELECT * FROM tb_kronologis ORDER BY id_kronologis ASC")->result();

        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $item->id_kronologis);
            $sheet->setCellValue('B' . $row, $item->id_tahapan);
            $sheet->setCellValue('C' . $row, $item->sub_tahapan);
            $sheet->setCellValue('D' . $row, $item->jenis_dokumen);
            $sheet->setCellValue('E' . $row, $item->nomor_dokumen);
            $sheet->setCellValue('F' . $row, date('m/d/Y', strtotime($item->tanggal)));
            $sheet->setCellValue('G' . $row, $item->pihak);
            $sheet->setCellValue('H' . $row, $item->jumlah_halaman);
            $sheet->setCellValue('I' . $row, $item->file);
            $row++;
        }

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="template-kronologis-' . date('Y-m-d-H-i-s') . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $writer->save('php://output');
        exit;
    }

    public function import_file_excel()
    {
        $this->load->model('M_dokumen', 'model_dokumen');
        $folder = 'excel';
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
            $this->model_dokumen->import_excel($folder, $filename);
        }

        if (isset($error)) {
            $this->session->set_flashdata('error', 'Gagal upload file excel: ' . $error['error']);
        } else {
            $this->session->set_flashdata('success', 'Berhasil upload file excel');
        }

        redirect('dokumen/riwayat_buku_putih');
    }

    public function dokumen_buku_putih($filename = 'Buku_Putih_Semester_I_PT_JMJ_Rev_1.pdf')
    {
        // Path lengkap ke file PDF
        $filepath = FCPATH . 'file_uploads/' . $filename;
        if (!file_exists($filepath)) {
            show_404();
            return;
        }

        // Siapkan URL file PDF untuk view
        $data['pdf_url'] = base_url('file_uploads/' . $filename);

        $this->template->load('template/admin_template', 'dokumen/dokumen_buku_putih.php', $data);
    }

    public function riwayat_buku_putih()
    {
        $data = [
            'title' => "Riwayat Buku Putih",
            'menu' => 'riwayat_buku_putih',
            'submenu' => 'riwayat_buku_putih',
        ];
        $this->template->load('template/admin_template', 'dokumen/riwayat_buku_putih.php', $data);
    }

    function getRiwayatBukuPutih()
    {
        $this->load->model('M_dokumen');
        $result = $this->M_dokumen->get_riwayat_buku_putih();
        $data = [];
        $no = $_POST['start'];
        foreach ($result['data'] as $row) {
            $no++;

            if ($row->id_tahapan == 1) {
                $tahapan = 'Pra Perencanaan KPBU';
            } elseif ($row->id_tahapan == 2) {
                $tahapan = 'Perencanaan KPBU';
            } elseif ($row->id_tahapan == 3) {
                $tahapan = 'Penyiapan KPBU';
            } elseif ($row->id_tahapan == 4) {
                $tahapan = 'Pelaksanaan PPJT';
            } elseif ($row->id_tahapan == 5) {
                $tahapan = 'Operasional';
            } else {
                $tahapan = ' ';
            }

            if ($row->file != null) {
                $lokasi_file = base_url("file_uploads/dokumen/kronologis/" . $row->file);
                $file = '<a href="#" onclick="showFile(' . $row->id_kronologis . ',\'' . $lokasi_file . '\')" class="btn btn-sm btn-default"><i class="fa fa-eye"></i></a>';
            } else {
                $file = '<a href="#" onclick="updateFile(' . $row->id_kronologis . ')" class="btn btn-success btn-sm"><i class="fa fa-upload"></i></a>';
            }

            $aksi = '<td>
                <a href="' . site_url("dokumen/hapus_kronologis/" . $row->id_kronologis) . '" title="hapus" class="btn btn-danger btn-sm" onClick="javasciprt: return confirm(\'Yakin menghapus data ?\')"><i class="fa fa-trash"></i></a>
            </td>';

            $data[] = [
                'id'          => $no,
                'jenis_dokumen' => $row->jenis_dokumen,
                'tahapan'     => $tahapan,
                'tanggal'     => date('d-m-Y', strtotime($row->tanggal)),
                'nomor_dokumen' => $row->nomor_dokumen,
                'pihak'       => $row->pihak,
                'file'        => $file,
                'aksi'        => $aksi
            ];
        }

        echo json_encode([
            "draw" => $_POST['draw'],
            "recordsTotal" => $result['count_all'],
            "recordsFiltered" => $result['count_filtered'],
            "data" => $data
        ]);
    }


    function getKorporasi()
    {
        $result = $this->M_dokumen->getKorporasi();
        $data = [];
        $no = $_POST['start'];

        foreach ($result['data'] as $row) {
            $no++;

            if ($row->file != null) {
                $lokasi_file = base_url("file_uploads/dokumen/korporasi/" . $row->file);
                $file = '<a href="' . $lokasi_file . '" target="_blank" class="btn btn-primary btn-sm" ><i class="fa fa-print"></i></a>';
            } else {
                $file = '-';
            }

            $aksi = '<td class="d-flex">
                <a href="' . site_url('Dokumen/edit_korporasi/' . $row->id) . '" title="edit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                <a href="' . site_url('Dokumen/delete_korporasi/' . $row->id) . '" title="hapus" class="btn btn-danger btn-sm" onClick="javasciprt: return confirm(\'Yakin menghapus data ?\')"><i class="fa fa-trash"></i></a>
            </td>';

            $data[] = [
                'id'                => $no,
                'jenis_dokumen'     => htmlspecialchars($row->jenis_dokumen),
                'no_akta'           => !$row->no_akta ? '-' : $row->no_akta,
                'tanggal_akta'      => date('d-m-Y', strtotime($row->tanggal_akta)),
                'perihal'           => htmlspecialchars($row->perihal),
                'keterangan'        => htmlspecialchars((!$row->keterangan ? '-' : $row->keterangan)),
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

    // Dokumen Korporasi
    public function korporasi()
    {
        $data = array(
            'title' => "Dokumen Korporasi",
            'menu' => 'Dokumen',
            'submenu' => 'Dokumen Korporasi',
        );
        $this->template->load('template/admin_template', 'dokumen/korporasi/v_dokumenKorporasi', $data);
    }

    public function add_korporasi()
    {
        $data = [
            'title' => "Tambah Dokumen Korporasi",
            'menu' => 'Dokumen',
            'submenu' => 'Dokumen Korporasi',
            'action' => site_url('Dokumen/act_addKorporasi'),
        ];

        $this->template->load('template/admin_template', 'dokumen/korporasi/add_korporasi', $data);
    }

    public function act_addKorporasi()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $data = array(
            'perihal' => $this->input->post('perihal'),
            'no_akta' => $this->input->post('no_akta'),
            'tanggal_akta' => date('Y-m-d', strtotime($this->input->post('tanggal_akta'))),
            'jenis_dokumen' => $this->input->post('jenis_dokumen'),
            'keterangan' => $this->input->post('keterangan'),
            'file' => $eks_file,
            'created_at' => date('Y-m-d h:i:s')
        );

        $uploadPath = 'file_uploads/dokumen/korporasi/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;
        $config['file_permissions'] = 0777;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->insert('korporasi', $data);
            echo $this->session->set_flashdata('success', 'Dokumen Berhasil Ditambahkan');
        } else {
            echo $this->session->set_flashdata('error', 'Dokumen Gagal Ditambahkan');
        }

        redirect('Dokumen/korporasi');
    }

    public function edit_korporasi($id)
    {
        $data = array(
            'title' => "Edit Dokumen Korporasi",
            'menu' => 'Dokumen',
            'submenu' => 'Dokumen Korporasi',
            'data' => $this->M_dokumen->get_dokumenKorporasiById($id),
            'action' => site_url('Dokumen/act_editKorporasi/'),
        );
        $this->template->load('template/admin_template', 'dokumen/korporasi/v_edit_korporasi', $data);
    }

    public function act_editKorporasi()
    {
        $id = $this->input->post('id');
        $perihal = $this->input->post('perihal');
        $no_akta = $this->input->post('no_akta');
        $tanggal_akta = date('Y-m-d', strtotime($this->input->post('tanggal_akta')));
        $jenis_dokumen = $this->input->post('jenis_dokumen');
        $keterangan = $this->input->post('keterangan');

        if ($_FILES['file']['name'] != '') {
            $config = [];

            $filename = $_FILES['file']['name'];
            $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

            $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
            $nama = str_replace($string_replace, '_', $filename);
            $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

            $uploadPath = 'file_uploads/dokumen/korporasi/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 0;
            $config['file_name'] = $eks_file;
            $config['file_permissions'] = 0777;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('file')) {
                $this->upload->data();
            }

            $data = [
                'perihal' => $perihal,
                'no_akta' => $no_akta,
                'tanggal_akta' => $tanggal_akta,
                'jenis_dokumen' => $jenis_dokumen,
                'keterangan' => $keterangan,
                'file' => $eks_file,
            ];
        } else {
            $data = [
                'perihal' => $perihal,
                'no_akta' => $no_akta,
                'tanggal_akta' => $tanggal_akta,
                'jenis_dokumen' => $jenis_dokumen,
                'keterangan' => $keterangan,
            ];
        }

        $this->db->where('id', $id);
        if ($this->db->update('korporasi', $data)) {
            $this->session->set_flashdata('success', 'Data Berhasil Di Update');
        } else {
            $this->session->set_flashdata('error', 'Data Gagal Di Update');
        }
        redirect('Dokumen/korporasi');
    }

    public function delete_korporasi($id)
    {
        $data = $this->db->get_where('korporasi', ['id' => $id])->row();
        $path = 'file_uploads/dokumen/korporasi/' . $data->file;

        if (file_exists($path)) {
            unlink($path);
            $this->db->delete('korporasi', ['id' => $id]);
            echo $this->session->set_flashdata('success', 'Dokumen Berhasil Dihapus');
        } else {
            echo $this->session->set_flashdata('error', 'Dokumen Gagal Dihapus');
        }
        redirect('Dokumen/korporasi');
    }

    function getPembiayaan()
    {
        $result = $this->M_dokumen->getPembiayaan();
        $data = [];
        $no = $_POST['start'];

        foreach ($result['data'] as $row) {
            $no++;

            if ($row->file != null) {
                $lokasi_file = base_url("file_uploads/dokumen/pembiayaan/" . $row->file);
                $file = '<a href="' . $lokasi_file . '" target="_blank" class="btn btn-primary btn-sm" ><i class="fa fa-print"></i></a>';
            } else {
                $file = '-';
            }

            $aksi = '<td class="d-flex">
                <a href="' . site_url('Dokumen/edit_pembiayaan/' . $row->id) . '" title="edit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                <a href="' . site_url('Dokumen/delete_pembiayaan/' . $row->id) . '" title="hapus" class="btn btn-danger btn-sm" onClick="javasciprt: return confirm(\'Yakin menghapus data ?\')"><i class="fa fa-trash"></i></a>
            </td>';

            $data[] = [
                'id'                => $no,
                'jenis_dokumen'     => htmlspecialchars($row->jenis_dokumen),
                'no_akta'           => (!$row->no_akta ? '-' : $row->no_akta),
                'tanggal_akta'      => date('d-m-Y', strtotime($row->tanggal_akta)),
                'perihal'           => htmlspecialchars($row->perihal),
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

    // Dokumen Pembiayaan
    public function pembiayaan()
    {
        $data = array(
            'title' => "Dokumen Pembiayaan",
            'menu' => 'Dokumen',
            'submenu' => 'Dokumen Pembiayaan',
        );

        $this->template->load('template/admin_template', 'dokumen/pembiayaan/v_dokPembiayaan.php', $data);
    }

    public function add_pembiayaan()
    {
        $data = array(
            'title'      => 'Tambah Dokumen Pembiayaan',
            'menu' => 'Dokumen',
            'submenu' => 'Dokumen Pembiayaan',
            'action' => site_url('Dokumen/act_addPembiayaan'),
        );

        $this->template->load('template/admin_template', 'dokumen/pembiayaan/add_pembiayaan.php', $data);
    }

    public function act_addPembiayaan()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $data = array(
            'perihal' => $this->input->post('perihal'),
            'no_akta' => $this->input->post('no_akta'),
            'tanggal_akta' => date('Y-m-d', strtotime($this->input->post('tanggal_akta'))),
            'jenis_dokumen' => $this->input->post('jenis_dokumen'),
            'keterangan' => $this->input->post('keterangan'),
            'file' => $eks_file,
            'created_at' => date('Y-m-d h:i:s')
        );

        $uploadPath = 'file_uploads/dokumen/pembiayaan/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->insert('pembiayaan', $data);
            echo $this->session->set_flashdata('success', 'Data berhasil ditambahkan.');
        } else {
            echo $this->session->set_flashdata('error', 'Data gagal ditambahkan.');
        }

        redirect('Dokumen/pembiayaan');
    }

    public function edit_pembiayaan($id)
    {
        $data = [
            'title'      => 'Edit Dokumen Pembiayaan',
            'menu' => 'Dokumen',
            'submenu' => 'Dokumen Pembiayaan',
            'action' => site_url('Dokumen/act_editPembiayaan/' . $id),
            'data' => $this->M_dokumen->get_dokumenPembiayaanById($id)
        ];

        $this->template->load('template/admin_template', 'dokumen/pembiayaan/edit_pembiayaan.php', $data);
    }

    public function act_editPembiayaan()
    {
        $id = $this->input->post('id');
        $perihal = $this->input->post('perihal');
        $no_akta = $this->input->post('no_akta');
        $tanggal_akta = date('Y-m-d', strtotime($this->input->post('tanggal_akta')));
        $jenis_dokumen = $this->input->post('jenis_dokumen');
        $keterangan = $this->input->post('keterangan');

        if ($_FILES['file']['name'] != '') {
            $config = [];

            $filename = $_FILES['file']['name'];
            $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

            $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
            $nama = str_replace($string_replace, '_', $filename);
            $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

            $uploadPath = 'file_uploads/dokumen/pembiayaan/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 0;
            $config['file_name'] = $eks_file;
            $config['file_permissions'] = 0777;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('file')) {
                $this->upload->data();
            }

            $data = [
                'perihal' => $perihal,
                'no_akta' => $no_akta,
                'tanggal_akta' => $tanggal_akta,
                'jenis_dokumen' => $jenis_dokumen,
                'keterangan' => $keterangan,
                'file' => $eks_file,
            ];
        } else {
            $data = [
                'perihal' => $perihal,
                'no_akta' => $no_akta,
                'tanggal_akta' => $tanggal_akta,
                'jenis_dokumen' => $jenis_dokumen,
                'keterangan' => $keterangan,
            ];
        }

        $this->db->where('id', $id);
        if ($this->db->update('pembiayaan', $data)) {
            $this->session->set_flashdata('success', 'Data Berhasil Di Update');
        } else {
            $this->session->set_flashdata('error', 'Data Gagal Di Update');
        }
        redirect('Dokumen/pembiayaan');
    }

    public function hapus_pembiayaan($id)
    {
        $data = $this->db->get_where('pembiayaan', ['id' => $id])->row();
        $path = 'file_uploads/dokumen/pembiayaan/' . $data->file;

        if (file_exists($path)) {
            unlink($path);
            $this->db->delete('pembiayaan', ['id' => $id]);
            echo $this->session->set_flashdata('success', 'Dokumen Berhasil Dihapus');
        } else {
            echo $this->session->set_flashdata('error', 'Dokumen Gagal Dihapus');
        }
        redirect('Dokumen/pembiayaan');
    }

    function getDokumenLain()
    {
        $result = $this->M_dokumen->getDokumenLain(['rkap', 'risalah', 'dok_lain']);
        $data = [];
        $no = $_POST['start'];

        foreach ($result['data'] as $row) {
            $no++;

            if ($row->dok_file != null) {
                $lokasi_file = base_url("file_uploads/dokumen/dok_lain/" . $row->dok_file);
                $file = '<a href="' . $lokasi_file . '" target="_blank" class="btn btn-primary btn-sm" ><i class="fa fa-print"></i></a>';
            } else {
                $file = '-';
            }

            $aksi = '<td class="d-flex">
                <a href="#" class="btn btn-success btn-sm d-none"><i class="fa fa-edit"></i></a>
                <a href="' . site_url('Dokumen/edit_dokLain/' . $row->id_dokumen) . '" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                <a href="' . site_url('Dokumen/hapus_dokLain/' . $row->id_dokumen) . '" title="hapus" class="btn btn-danger btn-sm" onClick="javasciprt: return confirm(\'Yakin menghapus data ?\')"><i class="fa fa-trash"></i></a>
            </td>';

            $data[] = [
                'id'                => $no,
                'nama'              => htmlspecialchars($row->nama),
                'nomor'             => $row->nomor,
                'tanggal'           => date('d-m-Y', strtotime($row->tanggal)),
                'file'              => $file,
                'kantor'            => !$row->kantor ? '-' : $row->kantor,
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

    // Dokumen Lainnya
    public function dok_lain()
    {
        $data = array(
            'title'      => 'Dokumen Lainnya',
        );
        $this->template->load('template/admin_template', 'dokumen/lainnya/v_dok_lain.php', $data);
    }

    public function add_dokLain()
    {
        $data = array(
            'title'      => 'Tambah Dokumen Lainnya',
            'menu' => 'Dokumen',
            'submenu' => 'Dokumen Lainnya',
            'action' => site_url('Dokumen/act_addDokLain'),
        );
        $this->template->load('template/admin_template', 'dokumen/lainnya/add_dokLain.php', $data);
    }

    public function act_addDokLain()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '&', '[', ']', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $data = array(
            'nama' => $this->input->post('nama'),
            'nomor' => $this->input->post('nomor'),
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'keterangan' => $this->input->post('keterangan'),
            'dok_file' => $eks_file,
            'create_date' => date('Y-m-d h:i:s'),
            'jenis' => 'dok_lain',
            'kantor' => $this->input->post('kantor'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'),
            'pic' => $this->input->post('pic'),
        );

        $uploadPath = 'file_uploads/dokumen/dok_lain/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->insert('dokumen', $data);
            echo $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        } else {
            echo $this->session->set_flashdata('error', 'Data Gagal Disimpan');
        }

        redirect('Dokumen/dok_lain');
    }

    public function edit_dokLain($id)
    {
        $data = [
            'title' => 'Edit Dokumen Lainnya',
            'menu' => 'Dokumen',
            'submenu' => 'Dokumen Lainnya',
            'action' => site_url('Dokumen/act_update_dokLain'),
            'data' => $this->M_dokumen->get_data_by_id($id),
        ];

        $this->template->load('template/admin_template', 'dokumen/lainnya/edit_dokLain.php', $data);
    }

    function act_update_dokLain()
    {
        $config = array();
        $id_dokumen = $this->input->post('id_dokumen');

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $data = array(
            'nama' => $this->input->post('nama'),
            'nomor' => $this->input->post('nomor'),
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'keterangan' => $this->input->post('keterangan'),
            'dok_file' => $eks_file,
            'kantor' => $this->input->post('kantor'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'),
            'pic' => $this->input->post('pic'),
        );

        $data2 = array(
            'nama' => $this->input->post('nama'),
            'nomor' => $this->input->post('nomor'),
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'keterangan' => $this->input->post('keterangan'),
            'kantor' => $this->input->post('kantor'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'),
            'pic' => $this->input->post('pic'),
        );

        $uploadPath = 'file_uploads/dokumen/dok_lain/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->where('id_dokumen', $id_dokumen);
            if ($this->db->update('dokumen', $data)) {
                echo $this->session->set_flashdata('success', 'Data Berhasil Diubah');
            } else {
                echo $this->session->set_flashdata('error', 'Data Gagal Diubah');
            }
        } else {
            $this->db->where('id_dokumen', $id_dokumen);
            if ($this->db->update('dokumen', $data2)) {
                echo $this->session->set_flashdata('success', 'Data Berhasil Diubah');
            } else {
                echo $this->session->set_flashdata('error', 'Data Gagal Diubah');
            }
        }

        redirect('Dokumen/dok_lain');
    }

    public function hapus_dokLain($id)
    {
        $this->db->where('id_dokumen', $id);
        if ($this->db->delete('dokumen')) {
            $this->session->set_flashdata('success', 'Data Berhasil Di Hapus');
        } else {
            $this->session->set_flashdata('error', 'Data Gagal Di Hapus');
        }
        redirect('Dokumen/dok_lain');
    }

    // Dokumen Lama
    public function lama()
    {
        $ses_data = array(
            'act_menu'   => 'lama',
            'title'      => 'Dokumen Lama',
            'breadcrumb' => 'lama',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'row' => $this->M_dokumen->get_dokLama(),
        );
        $this->template->load('template/admin_template', 'dokumen/v_dokLama.php', $data);
    }

    public function add_dokLama()
    {
        $ses_data = array(
            'act_menu'   => 'lama',
            'title'      => 'Dokumen Lama',
            'breadcrumb' => 'lama',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'action' => site_url('Dokumen/act_addDokLama'),
        );
        $this->template->load('template/admin_template', 'dokumen/add_dokLama.php', $data);
    }

    public function act_addDokLama()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $data = array(
            'nama' => $this->input->post('nama'),
            'nomor' => $this->input->post('nomor'),
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'keterangan' => $this->input->post('keterangan'),
            'dok_file' => $eks_file,
            'create_date' => date('Y-m-d h:i:s'),
            'jenis' => 'dok_lama',
            'kantor' => $this->input->post('kantor'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'),
            'pic' => $this->input->post('pic'),
        );

        $uploadPath = 'file_uploads/dokumen/dok_lama/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->insert('dokumen', $data);
            echo $this->session->set_flashdata('success', 'Data Berhasil Di Tambahkan');
        } else {
            echo $this->session->set_flashdata('error', 'Data Gagal Di Tambahkan');
        }

        redirect('Dokumen/lama');
    }

    public function hapus_dokLama($id)
    {
        $this->db->where('id_dokumen', $id);
        if ($this->db->delete('dokumen')) {
            $this->session->set_flashdata('success', 'Data Berhasil Di Hapus');
        } else {
            $this->session->set_flashdata('error', 'Data Gagal Di Hapus');
        }
        redirect('Dokumen/lama');
    }

    public function edit_dokLama($id)
    {
        $ses_data = array(
            'act_menu'   => 'lama',
            'title'      => 'Dokumen Lama',
            'breadcrumb' => 'lama',
        );
        $this->session->set_userdata($ses_data);
        $row2 = $this->M_dokumen->get_data_by_id($id);
        if ($row2) {
            $data = array(
                'action' => site_url('Dokumen/act_update_dokLama'),
                'id_dokumen' => $row2->id_dokumen,
                'nama' => $row2->nama,
                'nomor' => $row2->nomor,
                'tanggal' => $row2->tanggal,
                'file' => $row2->dok_file,
                'keterangan' => $row2->keterangan,
                'kantor' => $row2->kantor,
                'pic' => $row2->pic,
                'no_rak' => $row2->no_rak,
                'no_box' => $row2->no_box,
            );
        }
        $this->template->load('template/admin_template', 'dokumen/edit_dokLama.php', $data);
    }

    function act_update_dokLama()
    {
        $config = array();
        $id_dokumen = $this->input->post('id_dokumen');

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $data = array(
            'nama' => $this->input->post('nama'),
            'nomor' => $this->input->post('nomor'),
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'keterangan' => $this->input->post('keterangan'),
            'dok_file' => $eks_file,
            'kantor' => $this->input->post('kantor'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'),
            'pic' => $this->input->post('pic'),
        );

        $data2 = array(
            'nama' => $this->input->post('nama'),
            'nomor' => $this->input->post('nomor'),
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'keterangan' => $this->input->post('keterangan'),
            'kantor' => $this->input->post('kantor'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'),
            'pic' => $this->input->post('pic'),
        );

        $uploadPath = 'file_uploads/dokumen/dok_lama/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->where('id_dokumen', $id_dokumen);
            if ($this->db->update('dokumen', $data)) {
                echo $this->session->set_flashdata('msg', 'success');
            } else {
                echo $this->session->set_flashdata('msg', 'error');
            }
        } else {
            // print_r($data2); exit();
            $this->db->where('id_dokumen', $id_dokumen);
            if ($this->db->update('dokumen', $data2)) {
                echo $this->session->set_flashdata('msg', 'success');
            } else {
                echo $this->session->set_flashdata('msg', 'error');
            }
        }


        redirect('Dokumen/lama');
    }

    public function akta()
    {
        $ses_data = array(
            'act_menu'   => 'akta',
            'title'      => 'Akta',
            'breadcrumb' => 'akta',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'row' => $this->M_dokumen->get_akta(),
        );
        $this->template->load('template/admin_template', 'dokumen/v_akta.php', $data);
    }
    public function add_akta()
    {
        $ses_data = array(
            'act_menu'   => 'akta',
            'title'      => 'Akta',
            'breadcrumb' => 'akta',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'action' => site_url('Dokumen/act_addAkta'),
        );
        $this->template->load('template/admin_template', 'dokumen/add_akta.php', $data);
    }

    public function act_addAkta()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $data = array(
            'nama' => $this->input->post('nama'),
            'nomor' => $this->input->post('nomor'),
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'keterangan' => $this->input->post('keterangan'),
            'dok_file' => $eks_file,
            'create_date' => date('Y-m-d h:i:s'),
            'jenis' => 'akta',
            'kantor' => $this->input->post('kantor'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'),
            'pic' => $this->input->post('pic'),
        );

        $uploadPath = 'file_uploads/dokumen/akta/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->insert('dokumen', $data);
            echo $this->session->set_flashdata('msg', 'success');
        } else {
            echo $this->session->set_flashdata('msg', 'error');
        }

        redirect('Dokumen/akta');
    }

    public function hapus_akta($id)
    {
        $this->db->where('id_dokumen', $id);
        if ($this->db->delete('dokumen')) {
            $this->session->set_flashdata('message_success', 'Data Berhasil Di Hapus');
        } else {
            $this->session->set_flashdata('message_error', 'Data Gagal Di Hapus');
        }
        redirect('Dokumen/akta');
    }

    public function edit_akta($id)
    {
        $ses_data = array(
            'act_menu'   => 'akta',
            'title'      => 'Akta',
            'breadcrumb' => 'akta',
        );
        $this->session->set_userdata($ses_data);
        $row2 = $this->M_dokumen->get_data_by_id($id);
        if ($row2) {
            $data = array(
                'action' => site_url('Dokumen/act_update_akta'),
                'id_dokumen' => $row2->id_dokumen,
                'nama' => $row2->nama,
                'nomor' => $row2->nomor,
                'tanggal' => $row2->tanggal,
                'file' => $row2->dok_file,
                'keterangan' => $row2->keterangan,
                'kantor' => $row2->kantor,
                'pic' => $row2->pic,
                'no_rak' => $row2->no_rak,
                'no_box' => $row2->no_box,
            );
        }
        $this->template->load('template/admin_template', 'dokumen/edit_akta.php', $data);
    }

    function act_update_akta()
    {
        $config = array();
        $id_dokumen = $this->input->post('id_dokumen');

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $data = array(
            'nama' => $this->input->post('nama'),
            'nomor' => $this->input->post('nomor'),
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'keterangan' => $this->input->post('keterangan'),
            'dok_file' => $eks_file,
            'kantor' => $this->input->post('kantor'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'),
            'pic' => $this->input->post('pic'),
        );

        $data2 = array(
            'nama' => $this->input->post('nama'),
            'nomor' => $this->input->post('nomor'),
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'keterangan' => $this->input->post('keterangan'),
            'kantor' => $this->input->post('kantor'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'),
            'pic' => $this->input->post('pic'),
        );

        $uploadPath = 'file_uploads/dokumen/akta/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->where('id_dokumen', $id_dokumen);
            if ($this->db->update('dokumen', $data)) {
                echo $this->session->set_flashdata('msg', 'success');
            } else {
                echo $this->session->set_flashdata('msg', 'error');
            }
        } else {
            // print_r($data2); exit();
            $this->db->where('id_dokumen', $id_dokumen);
            if ($this->db->update('dokumen', $data2)) {
                echo $this->session->set_flashdata('msg', 'success');
            } else {
                echo $this->session->set_flashdata('msg', 'error');
            }
        }


        redirect('Dokumen/akta');
    }

    // Legal

    public function legal()
    {
        $ses_data = array(
            'act_menu'   => 'legal',
            'title'      => 'Legal',
            'breadcrumb' => 'legal',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'row' => $this->M_dokumen->get_legal(),
        );
        $this->template->load('template/admin_template', 'dokumen/v_legal.php', $data);
    }
    public function add_legal()
    {
        $ses_data = array(
            'act_menu'   => 'legal',
            'title'      => 'Legal',
            'breadcrumb' => 'legal',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'action' => site_url('Dokumen/act_addLegal'),
        );
        $this->template->load('template/admin_template', 'dokumen/add_legal.php', $data);
    }

    public function act_addLegal()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '&', '[', ']', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $data = array(
            'nama' => $this->input->post('nama'),
            'nomor' => $this->input->post('nomor'),
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'keterangan' => $this->input->post('keterangan'),
            'dok_file' => $eks_file,
            'create_date' => date('Y-m-d h:i:s'),
            'jenis' => 'legal',
            'kantor' => $this->input->post('kantor'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'),
            'pic' => $this->input->post('pic'),
        );

        $uploadPath = 'file_uploads/dokumen/legal/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->insert('dokumen', $data);
            echo $this->session->set_flashdata('msg', 'success');
        } else {
            echo $this->session->set_flashdata('msg', 'error');
        }

        redirect('Dokumen/legal');
    }

    public function hapus_legal($id)
    {
        $this->db->where('id_dokumen', $id);
        if ($this->db->delete('dokumen')) {
            $this->session->set_flashdata('message_success', 'Data Berhasil Di Hapus');
        } else {
            $this->session->set_flashdata('message_error', 'Data Gagal Di Hapus');
        }
        redirect('Dokumen/legal');
    }

    public function edit_legal($id)
    {
        $ses_data = array(
            'act_menu'   => 'legal',
            'title'      => 'legal',
            'breadcrumb' => 'legal',
        );
        $this->session->set_userdata($ses_data);
        $row2 = $this->M_dokumen->get_data_by_id($id);
        if ($row2) {
            $data = array(
                'action' => site_url('Dokumen/act_update_legal'),
                'id_dokumen' => $row2->id_dokumen,
                'nama' => $row2->nama,
                'nomor' => $row2->nomor,
                'tanggal' => $row2->tanggal,
                'file' => $row2->dok_file,
                'keterangan' => $row2->keterangan,
                'kantor' => $row2->kantor,
                'pic' => $row2->pic,
                'no_rak' => $row2->no_rak,
                'no_box' => $row2->no_box,
            );
        }
        $this->template->load('template/admin_template', 'dokumen/edit_legal.php', $data);
    }

    function act_update_legal()
    {
        $config = array();
        $id_dokumen = $this->input->post('id_dokumen');

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $data = array(
            'nama' => $this->input->post('nama'),
            'nomor' => $this->input->post('nomor'),
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'keterangan' => $this->input->post('keterangan'),
            'dok_file' => $eks_file,
            'kantor' => $this->input->post('kantor'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'),
            'pic' => $this->input->post('pic'),
        );

        $data2 = array(
            'nama' => $this->input->post('nama'),
            'nomor' => $this->input->post('nomor'),
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'keterangan' => $this->input->post('keterangan'),
            'kantor' => $this->input->post('kantor'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'),
            'pic' => $this->input->post('pic'),
        );

        $uploadPath = 'file_uploads/dokumen/legal/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->where('id_dokumen', $id_dokumen);
            if ($this->db->update('dokumen', $data)) {
                echo $this->session->set_flashdata('msg', 'success');
            } else {
                echo $this->session->set_flashdata('msg', 'error');
            }
        } else {
            // print_r($data2); exit();
            $this->db->where('id_dokumen', $id_dokumen);
            if ($this->db->update('dokumen', $data2)) {
                echo $this->session->set_flashdata('msg', 'success');
            } else {
                echo $this->session->set_flashdata('msg', 'error');
            }
        }

        redirect('Dokumen/legal');
    }

    //risalah
    public function risalah()
    {
        $ses_data = array(
            'act_menu'   => 'risalah',
            'title'      => 'Risalah',
            'breadcrumb' => 'risalah',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'row' => $this->M_dokumen->get_risalah(),
        );
        $this->template->load('template/admin_template', 'dokumen/v_risalah.php', $data);
    }
    public function add_risalah()
    {
        $ses_data = array(
            'act_menu'   => 'risalah',
            'title'      => 'Risalah',
            'breadcrumb' => 'risalah',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'action' => site_url('Dokumen/act_addRisalah'),
        );
        $this->template->load('template/admin_template', 'dokumen/add_risalah.php', $data);
    }

    public function act_addRisalah()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '&', '[', ']', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $data = array(
            'nama' => $this->input->post('nama'),
            'nomor' => $this->input->post('nomor'),
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'keterangan' => $this->input->post('keterangan'),
            'dok_file' => $eks_file,
            'create_date' => date('Y-m-d h:i:s'),
            'jenis' => 'risalah',
            'kantor' => $this->input->post('kantor'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'),
            'pic' => $this->input->post('pic'),
        );

        $uploadPath = 'file_uploads/dokumen/risalah/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->insert('dokumen', $data);
            echo $this->session->set_flashdata('msg', 'success');
        } else {
            echo $this->session->set_flashdata('msg', 'error');
        }

        redirect('Dokumen/risalah');
    }

    public function hapus_risalah($id)
    {
        $this->db->where('id_dokumen', $id);
        if ($this->db->delete('dokumen')) {
            $this->session->set_flashdata('message_success', 'Data Berhasil Di Hapus');
        } else {
            $this->session->set_flashdata('message_error', 'Data Gagal Di Hapus');
        }
        redirect('Dokumen/risalah');
    }

    public function edit_risalah($id)
    {
        $ses_data = array(
            'act_menu'   => 'risalah',
            'title'      => 'Risalah',
            'breadcrumb' => 'risalah',
        );
        $this->session->set_userdata($ses_data);
        $row2 = $this->M_dokumen->get_data_by_id($id);
        if ($row2) {
            $data = array(
                'action' => site_url('Dokumen/act_update_risalah'),
                'id_dokumen' => $row2->id_dokumen,
                'nama' => $row2->nama,
                'nomor' => $row2->nomor,
                'tanggal' => $row2->tanggal,
                'file' => $row2->dok_file,
                'keterangan' => $row2->keterangan,
                'kantor' => $row2->kantor,
                'pic' => $row2->pic,
                'no_rak' => $row2->no_rak,
                'no_box' => $row2->no_box,
            );
        }
        $this->template->load('template/admin_template', 'dokumen/edit_risalah.php', $data);
    }

    function act_update_risalah()
    {
        $config = array();
        $id_dokumen = $this->input->post('id_dokumen');

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $data = array(
            'nama' => $this->input->post('nama'),
            'nomor' => $this->input->post('nomor'),
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'keterangan' => $this->input->post('keterangan'),
            'dok_file' => $eks_file,
            'kantor' => $this->input->post('kantor'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'),
            'pic' => $this->input->post('pic'),
        );

        $data2 = array(
            'nama' => $this->input->post('nama'),
            'nomor' => $this->input->post('nomor'),
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'keterangan' => $this->input->post('keterangan'),
            'kantor' => $this->input->post('kantor'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'),
            'pic' => $this->input->post('pic'),
        );

        $uploadPath = 'file_uploads/dokumen/risalah/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->where('id_dokumen', $id_dokumen);
            if ($this->db->update('dokumen', $data)) {
                echo $this->session->set_flashdata('msg', 'success');
            } else {
                echo $this->session->set_flashdata('msg', 'error');
            }
        } else {
            // print_r($data2); exit();
            $this->db->where('id_dokumen', $id_dokumen);
            if ($this->db->update('dokumen', $data2)) {
                echo $this->session->set_flashdata('msg', 'success');
            } else {
                echo $this->session->set_flashdata('msg', 'error');
            }
        }

        redirect('Dokumen/risalah');
    }

    function getSOP()
    {
        $result = $this->M_dokumen->getSOP("sop");
        $data = [];
        $no = $_POST['start'];

        foreach ($result['data'] as $row) {
            $no++;

            if ($row->dok_file != null) {
                $lokasi_file = base_url("file_uploads/dokumen/sop/" . $row->dok_file);
                $file = '<a href="' . $lokasi_file . '" target="_blank" class="btn btn-primary btn-sm" ><i class="fa fa-print"></i></a>';
            } else {
                $file = '-';
            }

            $aksi = '<td class="d-flex">
                <a href="#" class="btn btn-success btn-sm d-none"><i class="fa fa-edit"></i></a>
                <a href="' . site_url('Dokumen/edit_sop/' . $row->id_dokumen) . '" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                <a href="' . site_url('Dokumen/hapus_sop/' . $row->id_dokumen) . '" title="hapus" class="btn btn-danger btn-sm" onClick="javasciprt: return confirm(\'Yakin menghapus data ?\')"><i class="fa fa-trash"></i></a>
            </td>';

            $iso_9001 = $row->iso_9001 == 1 ? "<span class='badge badge-info'>ISO 9001</span>" : "";
            $iso_14001 = $row->iso_14001 == 1 ? "<span class='badge badge-primary'>ISO 14001</span>" : "";
            $iso_45001 = $row->iso_45001 == 1 ? "<span class='badge badge-secondary'>ISO 45001</span>" : "";
            $iso_37001 = $row->iso_37001 == 1 ? "<span class='badge badge-dark' style='background-color: #ad6ace'>ISO 37001</span>" : "";

            $data[] = [
                'id'                => $no,
                'nama'              => htmlspecialchars($row->nama),
                'nomor'             => $row->nomor,
                'nomor_revisi'      => $row->nomor_revisi,
                'tanggal'           => date('d-m-Y', strtotime($row->tanggal)),
                'file'              => $file,
                'kantor'            => !$row->kantor ? '-' : $row->kantor,
                'divisi'            => $row->divisi,
                'iso'               => $iso_9001 . ' ' . $iso_14001 . ' ' . $iso_45001 . ' ' . $iso_37001,
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

    public function sop()
    {
        $ses_data = array(
            'act_menu'   => 'sop',
            'title'      => 'SOP',
            'breadcrumb' => 'sop',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'row' => $this->M_dokumen->get_sop(),
        );
        $this->template->load('template/admin_template', 'dokumen/v_sop.php', $data);
    }

    public function add_sop()
    {
        $ses_data = array(
            'act_menu'   => 'sop',
            'title'      => 'SOP',
            'breadcrumb' => 'sop',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'action' => site_url('Dokumen/act_addSop'),
        );
        $this->template->load('template/admin_template', 'dokumen/add_sop.php', $data);
    }

    public function act_addSop()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '&', '[', ']', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $data = array(
            'nama' => $this->input->post('nama'),
            'nomor' => $this->input->post('nomor'),
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'keterangan' => $this->input->post('keterangan'),
            'dok_file' => $eks_file,
            'create_date' => date('Y-m-d h:i:s'),
            'jenis' => 'sop',
            'kantor' => $this->input->post('kantor'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'),
            'pic' => $this->input->post('pic'),
            'nomor_revisi' => $this->input->post('nomor_revisi'),
            'divisi' => $this->input->post('divisi'),
            'iso_9001' => $this->input->post('iso_9001'),
            'iso_14001' => $this->input->post('iso_14001'),
            'iso_45001' => $this->input->post('iso_45001'),
            'iso_37001' => $this->input->post('iso_37001'),
        );

        // print_r($data); exit();
        $uploadPath = 'file_uploads/dokumen/sop/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->insert('dokumen', $data);
            echo $this->session->set_flashdata('msg', 'success');
        } else {
            echo $this->session->set_flashdata('msg', 'error');
        }

        redirect('Dokumen/sop');
    }

    public function hapus_sop($id)
    {
        $this->db->where('id_dokumen', $id);
        if ($this->db->delete('dokumen')) {
            $this->session->set_flashdata('message_success', 'Data Berhasil Di Hapus');
        } else {
            $this->session->set_flashdata('message_error', 'Data Gagal Di Hapus');
        }
        redirect('Dokumen/sop');
    }

    public function edit_sop($id)
    {
        $ses_data = array(
            'act_menu'   => 'sop',
            'title'      => 'SOP',
            'breadcrumb' => 'sop',
        );
        $this->session->set_userdata($ses_data);
        $row2 = $this->M_dokumen->get_data_by_id($id);
        if ($row2) {
            $data = array(
                'action' => site_url('Dokumen/act_update_sop'),
                'id_dokumen' => $row2->id_dokumen,
                'nama' => $row2->nama,
                'nomor' => $row2->nomor,
                'tanggal' => $row2->tanggal,
                'file' => $row2->dok_file,
                'keterangan' => $row2->keterangan,
                'kantor' => $row2->kantor,
                'pic' => $row2->pic,
                'no_rak' => $row2->no_rak,
                'no_box' => $row2->no_box,
                'nomor_revisi' => $row2->nomor_revisi,
                'divisi' => $row2->divisi,
                'iso_9001' => $row2->iso_9001,
                'iso_14001' => $row2->iso_14001,
                'iso_45001' => $row2->iso_45001,
                'iso_37001' => $row2->iso_37001,
            );
        }
        $this->template->load('template/admin_template', 'dokumen/edit_sop.php', $data);
    }

    function act_update_sop()
    {
        $config = array();
        $id_dokumen = $this->input->post('id_dokumen');

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $data = array(
            'nama' => $this->input->post('nama'),
            'nomor' => $this->input->post('nomor'),
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'keterangan' => $this->input->post('keterangan'),
            'dok_file' => $eks_file,
            'kantor' => $this->input->post('kantor'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'),
            'pic' => $this->input->post('pic'),
            'nomor_revisi' => $this->input->post('nomor_revisi'),
            'divisi' => $this->input->post('divisi'),
            'iso_9001' => $this->input->post('iso_9001'),
            'iso_14001' => $this->input->post('iso_14001'),
            'iso_45001' => $this->input->post('iso_45001'),
            'iso_37001' => $this->input->post('iso_37001'),
        );

        $data2 = array(
            'nama' => $this->input->post('nama'),
            'nomor' => $this->input->post('nomor'),
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'keterangan' => $this->input->post('keterangan'),
            'kantor' => $this->input->post('kantor'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'),
            'pic' => $this->input->post('pic'),
            'nomor_revisi' => $this->input->post('nomor_revisi'),
            'divisi' => $this->input->post('divisi'),
            'iso_9001' => $this->input->post('iso_9001'),
            'iso_14001' => $this->input->post('iso_14001'),
            'iso_45001' => $this->input->post('iso_45001'),
            'iso_37001' => $this->input->post('iso_37001'),
        );

        $uploadPath = 'file_uploads/dokumen/sop/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->where('id_dokumen', $id_dokumen);
            if ($this->db->update('dokumen', $data)) {
                echo $this->session->set_flashdata('msg', 'success');
            } else {
                echo $this->session->set_flashdata('msg', 'error');
            }
        } else {
            // print_r($data2); exit();
            $this->db->where('id_dokumen', $id_dokumen);
            if ($this->db->update('dokumen', $data2)) {
                echo $this->session->set_flashdata('msg', 'success');
            } else {
                echo $this->session->set_flashdata('msg', 'error');
            }
        }

        redirect('Dokumen/sop');
    }

    public function rkap()
    {
        $ses_data = array(
            'act_menu'   => 'rkap',
            'title'      => 'RKAP',
            'breadcrumb' => 'rkap',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'row' => $this->M_dokumen->get_rkap(),
        );
        $this->template->load('template/admin_template', 'dokumen/v_rkap.php', $data);
    }

    public function add_rkap()
    {
        $ses_data = array(
            'act_menu'   => 'rkap',
            'title'      => 'RKAP',
            'breadcrumb' => 'rkap',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'action' => site_url('Dokumen/act_addRkap'),
        );
        $this->template->load('template/admin_template', 'dokumen/add_rkap.php', $data);
    }

    public function act_addRkap()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '&', '[', ']', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $data = array(
            'nama' => $this->input->post('nama'),
            'nomor' => $this->input->post('nomor'),
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'keterangan' => $this->input->post('keterangan'),
            'dok_file' => $eks_file,
            'create_date' => date('Y-m-d h:i:s'),
            'jenis' => 'rkap',
            'kantor' => $this->input->post('kantor'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'),
            'pic' => $this->input->post('pic'),
        );

        $uploadPath = 'file_uploads/dokumen/rkap/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->insert('dokumen', $data);
            echo $this->session->set_flashdata('msg', 'success');
        } else {
            echo $this->session->set_flashdata('msg', 'error');
        }

        redirect('Dokumen/rkap');
    }

    public function hapus_rkap($id)
    {
        $this->db->where('id_dokumen', $id);
        if ($this->db->delete('dokumen')) {
            $this->session->set_flashdata('message_success', 'Data Berhasil Di Hapus');
        } else {
            $this->session->set_flashdata('message_error', 'Data Gagal Di Hapus');
        }
        redirect('Dokumen/rkap');
    }

    public function edit_rkap($id)
    {
        $ses_data = array(
            'act_menu'   => 'rkap',
            'title'      => 'RKAP',
            'breadcrumb' => 'rkap',
        );
        $this->session->set_userdata($ses_data);
        $row2 = $this->M_dokumen->get_data_by_id($id);
        if ($row2) {
            $data = array(
                'action' => site_url('Dokumen/act_update_rkap'),
                'id_dokumen' => $row2->id_dokumen,
                'nama' => $row2->nama,
                'nomor' => $row2->nomor,
                'tanggal' => $row2->tanggal,
                'file' => $row2->dok_file,
                'keterangan' => $row2->keterangan,
                'kantor' => $row2->kantor,
                'pic' => $row2->pic,
                'no_rak' => $row2->no_rak,
                'no_box' => $row2->no_box,
            );
        }
        $this->template->load('template/admin_template', 'dokumen/edit_rkap.php', $data);
    }

    function act_update_rkap()
    {
        $config = array();
        $id_dokumen = $this->input->post('id_dokumen');

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $data = array(
            'nama' => $this->input->post('nama'),
            'nomor' => $this->input->post('nomor'),
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'keterangan' => $this->input->post('keterangan'),
            'dok_file' => $eks_file,
            'kantor' => $this->input->post('kantor'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'),
            'pic' => $this->input->post('pic'),
        );

        $data2 = array(
            'nama' => $this->input->post('nama'),
            'nomor' => $this->input->post('nomor'),
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'keterangan' => $this->input->post('keterangan'),
            'kantor' => $this->input->post('kantor'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'),
            'pic' => $this->input->post('pic'),
        );

        $uploadPath = 'file_uploads/dokumen/rkap/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->where('id_dokumen', $id_dokumen);
            if ($this->db->update('dokumen', $data)) {
                echo $this->session->set_flashdata('msg', 'success');
            } else {
                echo $this->session->set_flashdata('msg', 'error');
            }
        } else {
            // print_r($data2); exit();
            $this->db->where('id_dokumen', $id_dokumen);
            if ($this->db->update('dokumen', $data2)) {
                echo $this->session->set_flashdata('msg', 'success');
            } else {
                echo $this->session->set_flashdata('msg', 'error');
            }
        }

        redirect('Dokumen/rkap');
    }

    public function mou()
    {
        $ses_data = array(
            'act_menu'   => 'mou',
            'title'      => 'MoU',
            'breadcrumb' => 'mou',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'row' => $this->M_dokumen->get_mou(),
        );
        $this->template->load('template/admin_template', 'dokumen/v_mou.php', $data);
    }
    public function add_mou()
    {
        $ses_data = array(
            'act_menu'   => 'mou',
            'title'      => 'MoU',
            'breadcrumb' => 'mou',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'action' => site_url('Dokumen/act_addMou'),
        );
        $this->template->load('template/admin_template', 'dokumen/add_mou.php', $data);
    }

    public function act_addMou()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $data = array(
            'nama' => $this->input->post('nama'),
            'nomor' => $this->input->post('nomor'),
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'keterangan' => $this->input->post('keterangan'),
            'dok_file' => $eks_file,
            'create_date' => date('Y-m-d h:i:s'),
            'jenis' => 'mou',
            'kantor' => $this->input->post('kantor'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'),
            'pic' => $this->input->post('pic'),
        );

        $uploadPath = 'file_uploads/dokumen/mou/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->insert('dokumen', $data);
            echo $this->session->set_flashdata('msg', 'success');
        } else {
            echo $this->session->set_flashdata('msg', 'error');
        }

        redirect('Dokumen/mou');
    }

    public function hapus_mou($id)
    {
        $this->db->where('id_dokumen', $id);
        if ($this->db->delete('dokumen')) {
            $this->session->set_flashdata('message_success', 'Data Berhasil Di Hapus');
        } else {
            $this->session->set_flashdata('message_error', 'Data Gagal Di Hapus');
        }
        redirect('Dokumen/mou');
    }

    public function edit_mou($id)
    {
        $ses_data = array(
            'act_menu'   => 'mou',
            'title'      => 'MoU',
            'breadcrumb' => 'mou',
        );
        $this->session->set_userdata($ses_data);
        $row2 = $this->M_dokumen->get_data_by_id($id);
        if ($row2) {
            $data = array(
                'action' => site_url('Dokumen/act_update_mou'),
                'id_dokumen' => $row2->id_dokumen,
                'nama' => $row2->nama,
                'nomor' => $row2->nomor,
                'tanggal' => $row2->tanggal,
                'file' => $row2->dok_file,
                'keterangan' => $row2->keterangan,
                'kantor' => $row2->kantor,
                'pic' => $row2->pic,
                'no_rak' => $row2->no_rak,
                'no_box' => $row2->no_box,
            );
        }
        $this->template->load('template/admin_template', 'dokumen/edit_mou.php', $data);
    }

    function act_update_mou()
    {
        $config = array();
        $id_dokumen = $this->input->post('id_dokumen');

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $data = array(
            'nama' => $this->input->post('nama'),
            'nomor' => $this->input->post('nomor'),
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'keterangan' => $this->input->post('keterangan'),
            'dok_file' => $eks_file,
            'kantor' => $this->input->post('kantor'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'),
            'pic' => $this->input->post('pic'),
        );

        $data2 = array(
            'nama' => $this->input->post('nama'),
            'nomor' => $this->input->post('nomor'),
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'keterangan' => $this->input->post('keterangan'),
            'kantor' => $this->input->post('kantor'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'),
            'pic' => $this->input->post('pic'),
        );

        $uploadPath = 'file_uploads/dokumen/mou/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->where('id_dokumen', $id_dokumen);
            if ($this->db->update('dokumen', $data)) {
                echo $this->session->set_flashdata('msg', 'success');
            } else {
                echo $this->session->set_flashdata('msg', 'error');
            }
        } else {
            // print_r($data2); exit();
            $this->db->where('id_dokumen', $id_dokumen);
            if ($this->db->update('dokumen', $data2)) {
                echo $this->session->set_flashdata('msg', 'success');
            } else {
                echo $this->session->set_flashdata('msg', 'error');
            }
        }


        redirect('Dokumen/mou');
    }

    public function kronologis()
    {
        $ses_data = array(
            'act_menu'   => 'kronologis',
            'title'      => 'Kronologis',
            'breadcrumb' => 'kronologis',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'row' => $this->M_dokumen->get_kronologis(),
        );
        $this->template->load('template/admin_template', 'dokumen/v_kronologis.php', $data);
    }

    public function add_kronologis()
    {
        $ses_data = array(
            'act_menu'   => 'kronologis',
            'title'      => 'Kronologis',
            'breadcrumb' => 'kronologis',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'action' => site_url('Dokumen/act_addKronologis'),
        );
        $this->template->load('template/admin_template', 'dokumen/add_kronologis.php', $data);
    }

    public function act_addKronologis()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $data = array(
            'id_tahapan' => $this->input->post('tahapan'),
            'jenis_dokumen' => $this->input->post('jenis_dokumen'),
            'nomor_dokumen' => $this->input->post('nomor_dokumen'),
            'sub_tahapan' => $this->input->post('sub_tahapan'),
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'pihak' => $this->input->post('pihak'),
            'jumlah_halaman' => $this->input->post('jumlah_halaman'),
            'file' => $eks_file,
            'create_date' => date('Y-m-d h:i:s'),
        );

        $data2 = array(
            'id_tahapan' => $this->input->post('tahapan'),
            'jenis_dokumen' => $this->input->post('jenis_dokumen'),
            'nomor_dokumen' => $this->input->post('nomor_dokumen'),
            'sub_tahapan' => $this->input->post('sub_tahapan'),
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'pihak' => $this->input->post('pihak'),
            'jumlah_halaman' => $this->input->post('jumlah_halaman'),
            'create_date' => date('Y-m-d h:i:s'),
        );

        $uploadPath = 'file_uploads/dokumen/kronologis/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            if ($this->db->insert('kronologis', $data)) {
                echo $this->session->set_flashdata('success', "Data berhasil disimpan");
            } else {
                echo $this->session->set_flashdata('error', "Data gagal disimpan");
            }
        } else {
            if ($this->db->insert('kronologis', $data2)) {
                echo $this->session->set_flashdata('success', "Data berhasil disimpan");
            } else {
                echo $this->session->set_flashdata('error', "Data gagal disimpan");
            }
        }
        redirect('Dokumen/kronologis');
    }

    public function hapus_kronologis($id)
    {
        $this->db->where('id_kronologis', $id);
        if ($this->db->delete('tb_kronologis')) {
            $this->session->set_flashdata('success', 'Data Berhasil Di Hapus');
        } else {
            $this->session->set_flashdata('error', 'Data Gagal Di Hapus');
        }
        redirect('Dokumen/riwayat_buku_putih');
    }

    public function edit_kronologis($id)
    {
        $ses_data = array(
            'act_menu'   => 'kronologis',
            'title'      => 'Kronologis',
            'breadcrumb' => 'kronologis',
        );
        $this->session->set_userdata($ses_data);
        $row2 = $this->M_dokumen->get_kronologis_by_id($id);
        if ($row2) {
            $data = array(
                'action' => site_url('Dokumen/act_update_kronologis'),
                'id_kronologis' => $row2->id_kronologis,
                'id_tahapan' => $row2->id_tahapan,
                'jenis_dokumen' => $row2->jenis_dokumen,
                'nomor_dokumen' => $row2->nomor_dokumen,
                'tanggal' => $row2->tanggal,
                'pihak' => $row2->pihak,
                'jumlah_halaman' => $row2->jumlah_halaman,
                'file' => $row2->file,
                'sub_tahapan' => $row2->sub_tahapan,

            );
        }
        $this->template->load('template/admin_template', 'dokumen/edit_kronologis.php', $data);
    }

    public function act_update_kronologis()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '[', ']', '&', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $id_kronologis = $this->input->post('id_kronologis');
        $sub_tahapan = $this->input->post('sub_tahapan');

        $data = array(
            'id_tahapan' => $this->input->post('tahapan'),
            'jenis_dokumen' => $this->input->post('jenis_dokumen'),
            'nomor_dokumen' => $this->input->post('nomor_dokumen'),
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'pihak' => $this->input->post('pihak'),
            'jumlah_halaman' => $this->input->post('jumlah_halaman'),
            'file' => $eks_file,
            'sub_tahapan' => $sub_tahapan,
        );

        $data2 = array(
            'id_tahapan' => $this->input->post('tahapan'),
            'jenis_dokumen' => $this->input->post('jenis_dokumen'),
            'nomor_dokumen' => $this->input->post('nomor_dokumen'),
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'pihak' => $this->input->post('pihak'),
            'jumlah_halaman' => $this->input->post('jumlah_halaman'),
            'sub_tahapan' => $sub_tahapan,
        );

        $uploadPath = 'file_uploads/dokumen/kronologis/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->where('id_kronologis', $id_kronologis);
            if ($this->db->update('kronologis', $data)) {
                echo $this->session->set_flashdata('success', "Data berhasil di update");
            } else {
                echo $this->session->set_flashdata('error', "Data gagal di update");
            }
        } else {
            $this->db->where('id_kronologis', $id_kronologis);
            if ($this->db->update('kronologis', $data2)) {
                echo $this->session->set_flashdata('success', "Data berhasil di update");
            } else {
                echo $this->session->set_flashdata('error', "Data gagal di update");
            }
        }

        redirect('Dokumen/kronologis');
    }

    public function laporan_eksternal()
    {
        $ses_data = array(
            'act_menu'   => 'laporan_eksternal',
            'title'      => 'Laporan Eksternal',
            'breadcrumb' => 'laporan_eksternal',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'row' => $this->M_dokumen->get_laporan(),
        );
        $this->template->load('template/admin_template', 'dokumen/v_laporan.php', $data);
    }

    public function add_laporan()
    {
        $ses_data = array(
            'act_menu'   => 'laporan_eksternal',
            'title'      => 'Laporan Eksternal',
            'breadcrumb' => 'laporan_eksternal',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'action' => site_url('Dokumen/act_addLaporan'),
        );
        $this->template->load('template/admin_template', 'dokumen/add_laporan.php', $data);
    }

    public function act_addLaporan()
    {
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '&', '[', ']', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $data = array(
            'nama' => $this->input->post('nama'),
            'nomor' => $this->input->post('nomor'),
            'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
            'keterangan' => $this->input->post('keterangan'),
            'dok_file' => $eks_file,
            'create_date' => date('Y-m-d h:i:s'),
            'jenis' => 'laporan',
            'kantor' => $this->input->post('kantor'),
            'no_rak' => $this->input->post('rak'),
            'no_box' => $this->input->post('box'),
            'pic' => $this->input->post('pic'),
        );

        $uploadPath = 'file_uploads/dokumen/laporan_eksternal/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->db->insert('dokumen', $data);
            echo $this->session->set_flashdata('success', 'Data Berhasil Di Tambahkan');
        } else {
            echo $this->session->set_flashdata('error', 'Data Berhasil Di Tambahkan');
        }

        redirect('Dokumen/laporan_eksternal');
    }

    public function hapus_laporan($id)
    {
        $this->db->where('id_dokumen', $id);
        if ($this->db->delete('dokumen')) {
            $this->session->set_flashdata('success', 'Data Berhasil Di Hapus');
        } else {
            $this->session->set_flashdata('error', 'Data Gagal Di Hapus');
        }
        redirect('Dokumen/laporan_eksternal');
    }

    public function buku_putih()
    {
        $ses_data = array(
            'act_menu'   => 'buku_putih',
            'title'      => 'Buku Putih',
            'breadcrumb' => 'buku_putih',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            'row' => $this->M_dokumen->get_laporan(),
        );
        $this->template->load('template/admin_template', 'v_bukuPutih.php');
    }

    public function company_profile()
    {
        $ses_data = array(
            'act_menu'   => 'company_profile',
            'title'      => 'company_profile',
            'breadcrumb' => 'company_profile',
        );
        $this->session->set_userdata($ses_data);
        $data = array(
            // 'row' => $this->M_dokumen->get_dokLama(),
        );
        $this->template->load('template/admin_template', 'dokumen/v_company_profile.php', $data);
    }

    public function update_file_kronologis()
    {
        // load model
        $this->load->model('M_dokumen', 'model_dokumen');
        $config = array();

        $filename = $_FILES['file']['name'];
        $ekstensi_file = substr(strtolower(strrchr($filename, ".")), 1);

        $string_replace = array('/', ';', '&', '[', ']', '{', '}', '|', '^', '~', ' ', '.', '-');
        $nama = str_replace($string_replace, '_', $filename);
        $eks_file = $nama . '_' . date('d-m-Y_h-i-s') . '.' . $ekstensi_file;

        $uploadPath = 'file_uploads/dokumen/kronologis/';
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        $config['file_name'] = $eks_file;

        $data = [
            'id_kronologis' => $this->input->post('id_kronologis'),
        ];

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $this->upload->data();
            $this->model_dokumen->update_file_kronologis($data, $eks_file);
            $this->session->set_flashdata('success', 'Dokumen Berhasil Di Upload');
        } else {
            $this->session->set_flashdata('error', 'Dokumen Gagal Di Upload');
        }

        redirect('Dokumen/riwayat_buku_putih');
    }
}
