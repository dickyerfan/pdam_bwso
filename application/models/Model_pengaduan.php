<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_pengaduan extends CI_Model
{
    public function getPengaduan()
    {
        return $this->db->get('pengaduan')->result();
    }

    public function get_detail_pengaduan($id_pengaduan)
    {
        $this->db->select('*');
        $this->db->from('pengaduan');
        $this->db->where('id_pengaduan', $id_pengaduan);
        $this->db->order_by('pengaduan.id_pengaduan', 'DESC');
        return $this->db->get()->result();
    }
}
