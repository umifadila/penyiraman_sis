<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginController extends CI_Controller
{
	public function index()
	{
		$data = ['judul' => 'Login'];
		$this->load->view('pages/login', $data);
	}

	public function authenticate()
	{
		// Ambil inputan username dan password
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		// Load model untuk mengakses database
		$this->load->model('AdminModel');

		// Cek apakah username ada dalam database
		$admin = $this->AdminModel->getAdminByUsername($username);

		if ($admin) {
			// Cek apakah password yang diinputkan sesuai dengan hash MD5 di database
			if (md5($password) === $admin['password']) {
				$this->session->set_userdata([
					'is_logged_in' => true,
					'username' => $admin['username'], // Simpan username di session
					'admin_id' => $admin['id'] // Anda bisa menyimpan id admin atau data lain
				]);
				echo json_encode([
					'status' => 'success',
					'message' => 'Login berhasil'
				]);
			} else {
				echo json_encode([
					'status' => 'error',
					'message' => 'Username atau password salah'
				]);
			}
		} else {
			echo json_encode([
				'status' => 'error',
				'message' => 'Username tidak ditemukan'
			]);
		}
	}
}
