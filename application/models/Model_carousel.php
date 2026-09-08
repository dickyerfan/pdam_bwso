<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_carousel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // Ambil semua data carousel yang aktif berdasarkan tipe (untuk public)
    public function getActiveByTipe($tipe = 'hero')
    {
        return $this->db->where('aktif', '1')->where('tipe', $tipe)->order_by('urutan', 'ASC')->get('carousel')->result();
    }

    // Ambil semua data carousel yang aktif (untuk public - semua tipe)
    public function getAllActive()
    {
        return $this->db->where('aktif', '1')->order_by('urutan', 'ASC')->get('carousel')->result();
    }

    // Ambil semua data carousel (untuk admin)
    public function getAll()
    {
        return $this->db->order_by('urutan', 'ASC')->get('carousel')->result();
    }

    // Ambil data carousel by ID
    public function getById($id)
    {
        return $this->db->where('id', $id)->get('carousel')->row();
    }

    // Tambah data carousel
    public function insert($data)
    {
        return $this->db->insert('carousel', $data);
    }

    // Update data carousel
    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update('carousel', $data);
    }

    // Hapus permanen
    public function deletePermanent($id)
    {
        return $this->db->where('id', $id)->delete('carousel');
    }

    // Nonaktifkan (soft delete)
    public function nonaktifkan($id)
    {
        return $this->db->where('id', $id)->update('carousel', ['aktif' => '0']);
    }

    // Aktifkan
    public function aktifkan($id)
    {
        return $this->db->where('id', $id)->update('carousel', ['aktif' => '1']);
    }
}
