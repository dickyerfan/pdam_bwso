<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_kapasitas extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // ==================== UPK ====================
    
    public function getAllUpk()
    {
        return $this->db->where('aktif', '1')->order_by('urutan', 'ASC')->get('kapasitas_upk')->result();
    }

    public function getUpkById($id)
    {
        return $this->db->where('id', $id)->get('kapasitas_upk')->row();
    }

    public function insertUpk($data)
    {
        return $this->db->insert('kapasitas_upk', $data);
    }

    public function updateUpk($id, $data)
    {
        return $this->db->where('id', $id)->update('kapasitas_upk', $data);
    }

    public function deleteUpk($id)
    {
        return $this->db->where('id', $id)->update('kapasitas_upk', ['aktif' => '0']);
    }

    // ==================== DETAIL ====================

    public function getAllDetail()
    {
        $this->db->select('kapasitas_detail.*, kapasitas_upk.nama_upk');
        $this->db->join('kapasitas_upk', 'kapasitas_upk.id = kapasitas_detail.upk_id');
        return $this->db->where('kapasitas_detail.aktif', '1')->get('kapasitas_detail')->result();
    }

    public function getDetailByUpk($upk_id)
    {
        return $this->db->where('upk_id', $upk_id)->where('aktif', '1')->get('kapasitas_detail')->result();
    }

    public function getDetailById($id)
    {
        return $this->db->where('id', $id)->get('kapasitas_detail')->row();
    }

    public function insertDetail($data)
    {
        return $this->db->insert('kapasitas_detail', $data);
    }

    public function updateDetail($id, $data)
    {
        return $this->db->where('id', $id)->update('kapasitas_detail', $data);
    }

    public function deleteDetail($id)
    {
        return $this->db->where('id', $id)->update('kapasitas_detail', ['aktif' => '0']);
    }

    // Untuk halaman publik
    public function getUpkWithDetail()
    {
        $upk = $this->db->where('aktif', '1')->order_by('urutan', 'ASC')->get('kapasitas_upk')->result();
        foreach ($upk as &$row) {
            $row->detail = $this->db->where('upk_id', $row->id)->where('aktif', '1')->get('kapasitas_detail')->result();
        }
        return $upk;
    }
}
