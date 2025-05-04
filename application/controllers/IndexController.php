<?php 
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

?>