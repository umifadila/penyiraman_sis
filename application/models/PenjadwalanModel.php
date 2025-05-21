<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PenjadwalanModel extends CI_Model
{
    private $table = 'tb_penjadwalan';

    public function __construct()
    {
        parent::__construct();
    }


    // Mengambil semua data penjadwalan
    public function get_all()
    {
        $this->db->select('tb_penjadwalan.*, tb_lokasi.nama as nama_lokasi, tb_lokasi.jona, tb_lokasi.deskripsi');
        $this->db->from('tb_penjadwalan');
        $this->db->join('tb_lokasi', 'tb_penjadwalan.lokasi_id = tb_lokasi.id');
        return $this->db->get()->result_array();
    }


    // Mengambil data penjadwalan berdasarkan ID
    public function get_by_id($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row_array();
    }

    // Menyimpan data penjadwalan baru
    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    // Memperbarui data penjadwalan berdasarkan ID
    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    // Menghapus data penjadwalan berdasarkan ID
    public function delete($id)
    {
        return $this->db->delete($this->table, ['id' => $id]);
    }

    public function get_by_rtc($hari, $waktu)
    {
        $this->db->select('tb_penjadwalan.*, tb_lokasi.nama as nama_lokasi, tb_lokasi.jona, tb_lokasi.deskripsi');
        $this->db->from($this->table);
        $this->db->join('tb_lokasi', 'tb_penjadwalan.lokasi_id = tb_lokasi.id');
        $this->db->group_start();
        $this->db->where('tb_penjadwalan.hari', $hari);
        $this->db->or_where('tb_penjadwalan.waktu', $waktu);
        $this->db->group_end();
        $this->db->where('tb_penjadwalan.is_aktif', 1); // hanyaa ambil yang aktif
        return $this->db->get()->result_array();
    }

}
