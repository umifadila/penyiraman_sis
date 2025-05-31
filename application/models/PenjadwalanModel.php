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

    
    // Hitung jumlah jadwal aktif
    public function count_active() {
        return $this->db
            ->where('is_aktif', 1)
            ->count_all_results($this->table);
    }

    // Ambil data jadwal mendatang (hari ini dan besok)
    // public function get_upcoming() {
    //     $today = date('Y-m-d');
    //     $tomorrow = date('Y-m-d', strtotime('+1 day'));

    //     return $this->db
    //         ->where_in('tanggal', [$today, $tomorrow])
    //         ->where('is_aktif', 1)
    //         ->order_by('waktu', 'ASC')
    //         ->get($this->table)
    //         ->result();
    // }
    public function get_upcoming()
    {
        $map_hari = [
            'Monday'    => 'Senin',
            'Tuesday'   => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday'  => 'Kamis',
            'Friday'    => 'Jumat',
            'Saturday'  => 'Sabtu',
            'Sunday'    => 'Minggu'
        ];
    
        // Buat array tanggal dan hari untuk 6 hari ke depan (termasuk hari ini)
        $tanggal_array = [];
        $hari_array = [];
    
        for ($i = 0; $i < 6; $i++) {
            $tanggal = date('Y-m-d', strtotime("+$i days"));
            $hari = $map_hari[date('l', strtotime($tanggal))];
            $tanggal_array[] = $tanggal;
            $hari_array[] = $hari;
        }
    
        $this->db->select('tb_penjadwalan.*, tb_lokasi.nama as nama_lokasi, tb_lokasi.jona, tb_lokasi.deskripsi');
        $this->db->from('tb_penjadwalan');
        $this->db->join('tb_lokasi', 'tb_penjadwalan.lokasi_id = tb_lokasi.id');
        $this->db->where('tb_penjadwalan.is_aktif', 1);
    
        $this->db->group_start();
            $this->db->where_in('tb_penjadwalan.tanggal', $tanggal_array);
            $this->db->or_where_in('tb_penjadwalan.hari', $hari_array);
        $this->db->group_end();
    
        $this->db->order_by('tb_penjadwalan.waktu', 'ASC');
    
        return $this->db->get()->result();
    }
    


    public function get_all_active()
    {
        return $this->db
            ->where('is_aktif', 1)
            ->get('tb_penjadwalan')
            ->result();
    }
  
    public function get_by_time($waktu)
{
    // Hitung range ±2 menit
    $start = date("H:i:s", strtotime($waktu) - 120); // 2 menit sebelum
    $end   = date("H:i:s", strtotime($waktu) + 120); // 2 menit setelah

    // Jalankan query manual dengan BETWEEN
    $this->db->where('is_aktif', 1);
    $this->db->where("waktu BETWEEN '{$start}' AND '{$end}'", null, false);

    return $this->db->get('tb_penjadwalan')->result();
}

    

}
