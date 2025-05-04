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
        return $this->db->get($this->table)->result_array();
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
}
