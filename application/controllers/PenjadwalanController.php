<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PenjadwalanController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('PenjadwalanModel');
        $this->load->model('LokasiModel');

        // Cek apakah session login ada
        if (!$this->session->userdata('is_logged_in')) {
            redirect('login');
        }
    }

    public function index()
    {

        $data = [
            'judul' => 'Data Penjadwalan',
            'penjadwalan' => $this->PenjadwalanModel->get_all()
        ];
        $this->template->load('template/index', 'pages/penjadwalan/index', $data, false);
    }

    public function create()
    {
        $data = [
            'judul' => 'Tambah Penjadwalan',
            'lokasi' => $this->LokasiModel->get_all()
        ];
        $this->template->load('template/index', 'pages/penjadwalan/create', $data, false);
    }

    public function store()
    {
        $data = [
            'lokasi_id'     => $this->input->post('lokasi_id'),
            'type'          => $this->input->post('type'),
            'hari'          => $this->input->post('hari'),
            'tanggal'       => $this->input->post('tanggal'),
            'waktu'         => $this->input->post('waktu'),
            'is_aktif'      => 1,
            'keterangan'    => $this->input->post('keterangan')
        ];

        $this->PenjadwalanModel->insert($data);
        $this->session->set_flashdata('success', 'Penjadwalan berhasil ditambahkan!');
        redirect('penjadwalan');
    }

    public function edit($id)
    {
        $data = [
            'judul'        => 'Edit Penjadwalan',
            'penjadwalan'  => $this->PenjadwalanModel->get_by_id($id),
            'lokasi'       => $this->LokasiModel->get_all()
        ];
        $this->template->load('template/index', 'pages/penjadwalan/edit', $data, false);
    }

    public function update($id)
    {
        $data = [
            'lokasi_id'     => $this->input->post('lokasi_id'),
            'type'          => $this->input->post('type'),
            'hari'          => $this->input->post('hari'),
            'tanggal'       => $this->input->post('tanggal'),
            'waktu'         => $this->input->post('waktu'),
            'is_aktif'      => $this->input->post('is_aktif'),
            'keterangan'    => $this->input->post('keterangan')
        ];

        $this->PenjadwalanModel->update($id, $data);
        $this->session->set_flashdata('success', 'Penjadwalan berhasil diperbarui!');
        redirect('penjadwalan');
    }

    public function delete($id)
    {
        $this->PenjadwalanModel->delete($id);
        $this->session->set_flashdata('success', 'Penjadwalan berhasil dihapus!');
        redirect('penjadwalan');
    }
}
