<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminModel extends CI_Model
{
    // Mendapatkan data admin berdasarkan username
    public function getAdminByUsername($username)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('tb_admin');

        // Jika ada hasil, kembalikan data admin, jika tidak kembalikan null
        return $query->row_array();
    }
}
