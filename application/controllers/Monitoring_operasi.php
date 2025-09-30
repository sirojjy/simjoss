<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Monitoring_operasi extends CI_Controller
{
    private $_VOLUME = 'tb_perbandingan_volume';
    private $_PENDAPATAN = 'tb_perbandingan_pendapatan';
    function __construct()
    {
        parent::__construct();
        $cek = $this->session->userdata('username');

        if ($cek != '' || $cek != null) {
        } else {
            redirect('Login');
        }

        $this->load->model(array('M_monitoring_operasi'));
    }

    private function is_duplicate_volume($jenis, $tanggal, $exclude_id = null)
    {
        return $this->M_monitoring_operasi->is_exist_volume($jenis, $tanggal, $exclude_id);
    }

    private function is_duplicate_pendapatan($jenis, $tanggal, $exclude_id = null)
    {
        return $this->M_monitoring_operasi->is_exist_pendapatan($jenis, $tanggal, $exclude_id);
    }

    // VOLUME
    public function volume()
    {
        $this->template->load('template/admin_template', 'monitoring_operasi/v_volume');
    }

    public function get_volume()
    {
        $list = $this->M_monitoring_operasi->get_volume();
        $data = [];
        $no = $_GET['start'];

        foreach ($list as $volume) {
            $no++;
            $row = [];
            $row['id'] = $no;
            $row['jenis'] = strtoupper($volume->jenis);
            $row['tanggal'] = date('F Y', strtotime($volume->tanggal));
            $row['nilai'] = number_format($volume->nilai, 0, ',', '.');
            $row['created_at'] = $volume->created_at;
            $row['aksi'] = '
            <div class="btn-group" role="group">
                <a href="#" data-id="' . $volume->id . '" data-jenis="' . $volume->jenis . '" data-tanggal="' . $volume->tanggal . '" data-nilai="' . $volume->nilai . '" class="btn btn-sm btn-success mr-1 btn-edit"><i class="fa fa-edit"></i></a>
                <a href="' . site_url('Monitoring_operasi/delete_volume/' . $volume->id) . '" onclick="javasciprt: return confirm(\'Yakin menghapus data ?\')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
            </div>';
            $data[] = $row;
        }

        $output = [
            "draw" => intval($_GET['draw']),
            "recordsTotal" => $this->M_monitoring_operasi->count_all($this->_VOLUME),
            "recordsFiltered" => $this->M_monitoring_operasi->count_filtered(),
            "data" => $data,
        ];

        echo json_encode($output);
    }

    public function insert_volume()
    {
        $jenis = $this->input->post('jenis');
        $tanggal = $this->input->post('tanggal') . '-01'; // disatukan
        $nilai = str_replace('.', '', $this->input->post('nilai'));

        if ($this->is_duplicate_volume($jenis, $tanggal)) {
            $this->session->set_flashdata('error', 'Data dengan tanggal <strong>' . date('F Y', strtotime($tanggal)) . '</strong> dan jenis <strong>' . strtoupper($jenis) . '</strong> tersebut sudah ada.');
            redirect('Monitoring_operasi/volume');
            return;
        }

        $data = [
            'jenis' => $jenis,
            'tanggal' => $tanggal,
            'nilai' => $nilai,
            'created_at' => date('Y-m-d H:i:s')
        ];

        $insert = $this->M_monitoring_operasi->insert_volume($data);

        if ($insert) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        } else {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
        }

        redirect('Monitoring_operasi/volume');
    }

    public function update_volume()
    {
        $id = $this->input->post('id');
        $jenis = $this->input->post('jenis');
        $tanggal = $this->input->post('tanggal') . '-01'; // disatukan
        $nilai = str_replace('.', '', $this->input->post('nilai'));

        $data = [
            'jenis' => $jenis,
            'tanggal' => $tanggal,
            'nilai' => $nilai
        ];

        if ($this->is_duplicate_volume($jenis, $tanggal, $id)) {
            $this->session->set_flashdata('error', 'Data dengan tanggal <strong>' . date('F Y', strtotime($tanggal)) . '</strong> dan jenis <strong>' . strtoupper($jenis) . '</strong> tersebut sudah ada.');
            redirect('Monitoring_operasi/volume');
            return;
        }

        $update = $this->M_monitoring_operasi->update_volume($id, $data);

        if ($update) {
            $this->session->set_flashdata('success', 'Data berhasil diubah');
        } else {
            $this->session->set_flashdata('error', 'Data gagal diubah');
        }

        redirect('Monitoring_operasi/volume');
    }

    public function delete_volume($id)
    {
        $data = $this->M_monitoring_operasi->delete_volume($id);

        if ($data['success']) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Data gagal dihapus');
        }

        redirect('Monitoring_operasi/volume');
    }

    // PENDAPATAN
    public function pendapatan()
    {
        $this->template->load('template/admin_template', 'monitoring_operasi/v_pendapatan');
    }

    public function get_pendapatan()
    {
        $list = $this->M_monitoring_operasi->get_pendapatan();
        $data = [];
        $no = $_GET['start'];

        foreach ($list as $pendapatan) {
            $no++;
            $row = [];
            $row['id'] = $no;
            $row['jenis'] = strtoupper($pendapatan->jenis);
            $row['tanggal'] = date('F Y', strtotime($pendapatan->tanggal));
            $row['nilai'] = number_format($pendapatan->nilai, 0, ',', '.');
            $row['aksi'] = '
            <div class="btn-group" role="group">
                <a href="#" data-id="' . $pendapatan->id . '" data-jenis="' . $pendapatan->jenis . '" data-tanggal="' . $pendapatan->tanggal . '" data-nilai="' . $pendapatan->nilai . '" class="btn btn-sm btn-success mr-1 btn-edit"><i class="fa fa-edit"></i></a>
                <a href="' . site_url('Monitoring_operasi/delete_pendapatan/' . $pendapatan->id) . '" onclick="javasciprt: return confirm(\'Yakin menghapus data ?\')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
            </div>';
            $data[] = $row;
        }

        $output = [
            "draw" => intval($_GET['draw']),
            "recordsTotal" => $this->M_monitoring_operasi->count_all($this->_PENDAPATAN),
            "recordsFiltered" => $this->M_monitoring_operasi->count_filtered(),
            "data" => $data,
        ];

        echo json_encode($output);
    }

    public function insert_pendapatan()
    {
        $jenis = $this->input->post('jenis');
        $tanggal = $this->input->post('tanggal') . '-01'; // disatukan
        $nilai = str_replace('.', '', $this->input->post('nilai'));

        if ($this->is_duplicate_pendapatan($jenis, $tanggal)) {
            $this->session->set_flashdata('error', 'Data dengan tanggal <strong>' . date('F Y', strtotime($tanggal)) . '</strong> dan jenis <strong>' . strtoupper($jenis) . '</strong> tersebut sudah ada.');
            redirect('Monitoring_operasi/pendapatan');
            return;
        }

        $data = [
            'jenis' => $jenis,
            'tanggal' => $tanggal,
            'nilai' => $nilai,
            'created_at' => date('Y-m-d H:i:s')
        ];

        $insert = $this->M_monitoring_operasi->insert_pendapatan($data);

        if ($insert) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        } else {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
        }

        redirect('Monitoring_operasi/pendapatan');
    }

    public function update_pendapatan()
    {
        $id = $this->input->post('id');
        $jenis = $this->input->post('jenis');
        $tanggal = $this->input->post('tanggal') . '-01'; // disatukan
        $nilai = str_replace('.', '', $this->input->post('nilai'));

        $data = [
            'jenis' => $jenis,
            'tanggal' => $tanggal,
            'nilai' => $nilai
        ];

        if ($this->is_duplicate_pendapatan($jenis, $tanggal, $id)) {
            $this->session->set_flashdata('error', 'Data dengan tanggal <strong>' . date('F Y', strtotime($tanggal)) . '</strong> dan jenis <strong>' . strtoupper($jenis) . '</strong> tersebut sudah ada.');
            redirect('Monitoring_operasi/pendapatan');
            return;
        }

        $update = $this->M_monitoring_operasi->update_pendapatan($id, $data);

        if ($update) {
            $this->session->set_flashdata('success', 'Data berhasil diubah');
        } else {
            $this->session->set_flashdata('error', 'Data gagal diubah');
        }

        redirect('Monitoring_operasi/pendapatan');
    }

    public function delete_pendapatan($id)
    {
        $data = $this->M_monitoring_operasi->delete_pendapatan($id);

        if ($data['success']) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Data gagal dihapus');
        }

        redirect('Monitoring_operasi/pendapatan');
    }
}
