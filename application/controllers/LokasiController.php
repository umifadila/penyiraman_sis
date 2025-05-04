<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LokasiController extends CI_Controller
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


	public function index()
	{
		$data = [
			'judul' => 'Data Lokasi',
			'lokasi' => $this->LokasiModel->get_all()
		];
		$this->template->load('template/index', 'pages/lokasi/index', $data, false);
	}

	public function create()
	{
		$data = ['judul' => 'Tambah Lokasi'];
		$this->template->load('template/index', 'pages/lokasi/create', $data, false);
	}

	public function store()
	{
		$last_jona = $this->LokasiModel->get_last_jona();

		if (!empty($last_jona)) {  // Mengecek apakah $last_jona tidak kosong
			preg_match('/(\d+)/', $last_jona, $matches);
			$counter = str_pad($matches[0] + 1, 4, '0', STR_PAD_LEFT);
		} else {
			$counter = '0001';  // Ganti 0001 jadi string supaya lebih konsisten
		}


		$jona = 'JONA-C' . $counter;

		$data = [
			'nama' => $this->input->post('nama'),
			'jona' => $jona,
			'deskripsi' => $this->input->post('deskripsi')
		];

		$this->LokasiModel->insert($data);
		$this->session->set_flashdata('success', 'Data lokasi berhasil ditambahkan!');
		redirect('lokasi');
	}

	public function edit($id)
	{
		$data = [
			'judul' => 'Edit Lokasi',
			'lokasi' => $this->LokasiModel->get_by_id($id)
		];

		$this->template->load('template/index', 'pages/lokasi/edit', $data, false);
	}

	public function update($id)
	{
		$data = [
			'nama' => $this->input->post('nama'),
			'deskripsi' => $this->input->post('deskripsi')
		];

		$this->LokasiModel->update($id, $data);
		$this->session->set_flashdata('success', 'Data lokasi berhasil diperbarui!');
		redirect('lokasi');
	}

	public function delete($id)
	{
		$this->LokasiModel->delete($id);
		$this->session->set_flashdata('success', 'Data lokasi berhasil dihapus!');
		redirect('lokasi');
	}
}
