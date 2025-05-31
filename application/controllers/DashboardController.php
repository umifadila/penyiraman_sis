<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');

		// Cek apakah session login ada
		if (!$this->session->userdata('is_logged_in')) {
			// Jika tidak ada session, redirect ke halaman login
			redirect('login');
		}
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
{
// 	$this->load->model('PenjadwalanModel');
// print_r($this->PenjadwalanModel->get_upcoming());
// 	die;
    $data = ['judul' => 'Dashboard'];
    $this->template->load('template/index', 'pages/dashboard', $data, false);
}


public function get_dashboard_data_ajax()
{
    if (!$this->input->is_ajax_request()) {
        show_error('No direct script access allowed');
    }

    $this->load->model('LokasiModel');
    $this->load->model('SoilMoistureModel');
    $this->load->model('LogAksiModel');
    $this->load->model('PenjadwalanModel');

    $data = [
        'judul' => 'Dashboard',
        'jml_lokasi' => $this->LokasiModel->count_all(),
        'penyiraman_today' => $this->LogAksiModel->count_today('penyiraman'),
        'pemupukan_today' => $this->LogAksiModel->count_today('pemupukan'),
        'jadwal_aktif' => $this->PenjadwalanModel->count_active(),
        'soil_recent' => $this->SoilMoistureModel->get_recent_per_lokasi(),
        'log_aksi' => $this->LogAksiModel->get_latest(10),
        'jadwal_mendatang' => $this->PenjadwalanModel->get_upcoming()
    ];

    echo json_encode([
        'status' => 'success',
        'data' => $data
    ]);
}


	
}
