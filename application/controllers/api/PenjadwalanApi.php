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
        $waktu = $this->input->get('waktu');  // Contoh: '07:00:00'
    
        if (!$waktu) {
            echo json_encode([
                'status' => false,
                'message' => 'Parameter waktu harus diisi.'
            ]);
            return;
        }
    
        // Ambil semua jadwal yang cocok dengan waktu (baik harian atau sekali jalan)
        $result = $this->PenjadwalanModel->get_by_time($waktu);
    
        echo json_encode([
            'status' => true,
            'data' => $result
        ]);
    }
    

    // API untuk ambil semua penjadwalan yang aktif
        public function get_all_active()
        {
            $result = $this->PenjadwalanModel->get_all_active();

            echo json_encode([
                'status' => true,
                'data' => $result
            ]);
            
        }

}
