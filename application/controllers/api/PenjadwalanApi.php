<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PenjadwalanApi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PenjadwalanModel');
        header('Content-Type: application/json');
    }

    // API untuk ambil penjadwalan berdasarkan hari dan waktu (RTC)
    public function get_by_rtc()
    {
       
        $hari = "Jumat";    // Contoh: 'Senin'
        $waktu = $this->input->get('waktu');  // Contoh: '07:00:00'

        if (!$hari || !$waktu) {
            echo json_encode([
                'status' => false,
                'message' => 'Parameter hari dan waktu harus diisi.'
            ]);
            return;
        }

        $result = $this->PenjadwalanModel->get_by_rtc($hari, $waktu);

        echo json_encode([
            'status' => true,
            'data' => $result
        ]);
    }
}
