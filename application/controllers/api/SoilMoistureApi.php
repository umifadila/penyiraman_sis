<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SoilMoistureApi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('SoilMoistureModel');
        header('Content-Type: application/json');
    }

    public function insert()
    {
        $lokasi_id = $this->input->post('lokasi_id');
        $kelembaban = $this->input->post('kelembaban');

        if (!$lokasi_id || !$kelembaban) {
            echo json_encode([
                'status' => false,
                'message' => 'lokasi_id dan kelembaban wajib diisi.'
            ]);
            return;
        }

        // Data yang akan disimpan
        $data = [
            'lokasi_id' => $lokasi_id,
            'kelembaban' => $kelembaban,
            'waktu_pencatatan' => date('Y-m-d H:i:s')
        ];

        // Simpan ke database lewat model
        $sukses = $this->SoilMoistureModel->insert($data);

        // Response JSON
        echo json_encode([
            'status' => $sukses,
            'message' => $sukses ? 'Data berhasil disimpan.' : 'Gagal menyimpan data.'
        ]);
    }
}
