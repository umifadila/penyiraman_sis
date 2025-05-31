<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LokasiModel extends CI_Model
{
    // Nama tabel yang digunakan oleh model
    private $table = 'tb_lokasi';

    public function __construct()
    {
        parent::__construct();
    }

    // Menghitung semua data lokasi
    public function count_all() {
        return $this->db->count_all($this->table);
    }

    // Fungsi untuk mengambil semua data lokasi
    public function get_all()
    {
        return $this->db->get($this->table)->result_array();
    }

    // Fungsi untuk mengambil lokasi berdasarkan ID
    public function get_by_id($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row_array();
    }

    // Fungsi untuk mendapatkan kode jona terakhir
    public function get_last_jona()
    {
        $this->db->select('jona');
        $this->db->from('tb_lokasi');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->jona;
        }

        return null; // Jika belum ada data, return null
    }

    // Fungsi untuk menambahkan data lokasi
    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    // Fungsi untuk memperbarui data lokasi berdasarkan ID
    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    // Fungsi untuk menghapus data lokasi berdasarkan ID
    public function delete($id)
    {
        return $this->db->delete($this->table, ['id' => $id]);
    }
}
