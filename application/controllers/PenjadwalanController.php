<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PenjadwalanController extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('PenjadwalanModel');
		$this->load->model('LokasiModel');  // Memuat model LokasiModel untuk mendapatkan lokasi

		// Cek apakah session login ada
		if (!$this->session->userdata('is_logged_in')) {
			// Jika tidak ada session, redirect ke halaman login
			redirect('login');
		}
	}

	// Menampilkan semua data penjadwalan
	public function index()
	{
		$data = [
			'judul' => 'Data Penjadwalan',
			'penjadwalan' => $this->PenjadwalanModel->get_all(),
		];
		$this->template->load('template/index', 'pages/penjadwalan/index', $data, false);
	}

	// Menampilkan form tambah penjadwalan
	public function create()
	{
		// Mendapatkan data lokasi untuk dropdown
		$data = [
			'judul' => 'Tambah Penjadwalan',
			'lokasi' => $this->LokasiModel->get_all()  // Mengambil semua lokasi dari model LokasiModel
		];
		$this->template->load('template/index', 'pages/penjadwalan/create', $data, false);
	}

	// Menyimpan penjadwalan baru
	public function store()
	{
		$data = [
			'lokasi_id' => $this->input->post('lokasi_id'),  // ID lokasi
			'type' => $this->input->post('type'),  // Jenis jadwal (penyiraman/pemupukan)
			'hari' => $this->input->post('hari'),  // Hari jadwal (misalnya: Senin, Selasa, dll.)
			'tanggal' => $this->input->post('tanggal'),  // Tanggal sekali jalan
			'waktu' => $this->input->post('waktu'),  // Waktu pelaksanaan
			'durasi_menit' => $this->input->post('durasi_menit'),  // Durasi dalam menit
			'is_aktif' => $this->input->post('is_aktif'),  // Status aktif atau tidak
			'keterangan' => $this->input->post('keterangan'),  // Catatan tambahan
		];

		$this->PenjadwalanModel->insert($data);  // Menyimpan data ke database
		redirect('penjadwalan');  // Mengarahkan ke halaman penjadwalan setelah data disimpan
	}

	// Menampilkan form edit penjadwalan
	public function edit($id)
	{
		// Mendapatkan data penjadwalan dan lokasi untuk form edit
		$data = [
			'judul' => 'Edit Penjadwalan',
			'penjadwalan' => $this->PenjadwalanModel->get_by_id($id),  // Mengambil data penjadwalan berdasarkan ID
			'lokasi' => $this->LokasiModel->get_all()  // Mengambil semua lokasi untuk dropdown
		];
		$this->template->load('template/index', 'pages/penjadwalan/edit', $data, false);
	}

	// Memperbarui penjadwalan
	public function update($id)
	{
		$data = [
			'lokasi_id' => $this->input->post('lokasi_id'),  // ID lokasi
			'type' => $this->input->post('type'),  // Jenis jadwal (penyiraman/pemupukan)
			'hari' => $this->input->post('hari'),  // Hari jadwal
			'tanggal' => $this->input->post('tanggal'),  // Tanggal sekali jalan
			'waktu' => $this->input->post('waktu'),  // Waktu pelaksanaan
			'durasi_menit' => $this->input->post('durasi_menit'),  // Durasi dalam menit
			'is_aktif' => $this->input->post('is_aktif'),  // Status aktif atau tidak
			'keterangan' => $this->input->post('keterangan'),  // Catatan tambahan
		];

		$this->PenjadwalanModel->update($id, $data);  // Memperbarui data penjadwalan di database
		redirect('penjadwalan');  // Mengarahkan ke halaman penjadwalan setelah data diperbarui
	}

	// Menghapus penjadwalan
	public function delete($id)
	{
		$this->PenjadwalanModel->delete($id);  // Menghapus penjadwalan berdasarkan ID
		redirect('penjadwalan');  // Mengarahkan ke halaman penjadwalan setelah data dihapus
	}
}
