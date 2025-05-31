<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SoilMoistureModel extends CI_Model {

    private $table = 'tb_soil_moisture';

    public function __construct() {
        parent::__construct();
    }

    // Ambil semua data kelembaban
    public function get_all() {
        return $this->db
                    ->select('tb_soil_moisture.*, tb_lokasi.nama_lokasi')
                    ->join('tb_lokasi', 'tb_lokasi.id = tb_soil_moisture.lokasi_id')
                    ->get($this->table)
                    ->result();
    }

    // Ambil data berdasarkan ID
    public function get_by_id($id) {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    // Ambil data berdasarkan lokasi
    public function get_by_lokasi($lokasi_id) {
        return $this->db
                    ->where('lokasi_id', $lokasi_id)
                    ->order_by('waktu_pencatatan', 'DESC')
                    ->get($this->table)
                    ->result();
    }

    // Ambil data kelembaban terbaru per lokasi
    public function get_recent_per_lokasi() {
        $subquery = $this->db->select('MAX(waktu_pencatatan) as max_waktu, lokasi_id')
                             ->from($this->table)
                             ->group_by('lokasi_id')
                             ->get_compiled_select();

        return $this->db->select('sm.*, l.jona, l.nama')
                        ->from("$this->table sm")
                        ->join("($subquery) recent", 'sm.lokasi_id = recent.lokasi_id AND sm.waktu_pencatatan = recent.max_waktu')
                        ->join('tb_lokasi l', 'l.id = sm.lokasi_id')
                        ->get()
                        ->result();
    }

    // Tambah data baru
    public function insert($data) {
        return $this->db->insert($this->table, $data);
    }

    // Update data
    public function update($id, $data) {
        return $this->db->where('id', $id)->update($this->table, $data);
    }

    // Hapus data
    public function delete($id) {
        return $this->db->where('id', $id)->delete($this->table);
    }
}
