<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LogAksiModel extends CI_Model {

    private $table = 'tb_log_aksi';

    public function __construct() {
        parent::__construct();
    }

    // Hitung jumlah aksi hari ini berdasarkan jenis aksi
    public function count_today($jenis_aksi) {
        return $this->db
            ->where('jenis_aksi', $jenis_aksi)
            ->where('DATE(waktu_aksi)', date('Y-m-d'))
            ->count_all_results($this->table);
    }

    // Ambil semua log aksi
    public function get_all() {
        return $this->db
                    ->select('tb_log_aksi.*, tb_lokasi.jona')
                    ->join('tb_lokasi', 'tb_lokasi.id = tb_log_aksi.lokasi_id')
                    ->order_by('waktu_aksi', 'DESC')
                    ->get($this->table)
                    ->result();
    }

    // Ambil log aksi terbaru (limit default 10)
    public function get_latest($limit = 10) {
        return $this->db
                    ->select('tb_log_aksi.*, tb_lokasi.jona, tb_lokasi.nama')
                    ->join('tb_lokasi', 'tb_lokasi.id = tb_log_aksi.lokasi_id')
                    ->order_by('waktu_aksi', 'DESC')
                    ->limit($limit)
                    ->get($this->table)
                    ->result();
    }

    // Ambil log berdasarkan ID
    public function get_by_id($id) {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    // Hitung semua data log aksi
    public function count_all() {
        return $this->db->count_all($this->table);
    }

    // Ambil log berdasarkan lokasi
    public function get_by_lokasi($lokasi_id) {
        return $this->db
                    ->where('lokasi_id', $lokasi_id)
                    ->order_by('waktu_aksi', 'DESC')
                    ->get($this->table)
                    ->result();
    }

    // Ambil log berdasarkan jenis aksi
    public function get_by_jenis($jenis_aksi) {
        return $this->db
                    ->where('jenis_aksi', $jenis_aksi)
                    ->order_by('waktu_aksi', 'DESC')
                    ->get($this->table)
                    ->result();
    }

    // Tambahkan log aksi
    public function insert($data) {
        return $this->db->insert($this->table, $data);
    }

    // Update log aksi
    public function update($id, $data) {
        return $this->db->where('id', $id)->update($this->table, $data);
    }

    // Hapus log aksi
    public function delete($id) {
        return $this->db->where('id', $id)->delete($this->table);
    }
}
