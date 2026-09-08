<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_upk extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // Ambil semua data UPK yang aktif
    public function getAllUpk()
    {
        return $this->db->where('aktif', '1')->get('no_pengaduan_upk')->result();
    }

    // Ambil data UPK by ID
    public function getUpkById($id)
    {
        return $this->db->where('id', $id)->get('no_pengaduan_upk')->row();
    }

    // Tambah data UPK
    public function insertUpk($data)
    {
        return $this->db->insert('no_pengaduan_upk', $data);
    }

    // Update data UPK
    public function updateUpk($id, $data)
    {
        return $this->db->where('id', $id)->update('no_pengaduan_upk', $data);
    }

    // Hapus data UPK (soft delete)
    public function deleteUpk($id)
    {
        return $this->db->where('id', $id)->update('no_pengaduan_upk', ['aktif' => '0']);
    }
}
