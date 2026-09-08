<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_tangki extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // ==================== KONTAK ====================

    public function getAllKontak()
    {
        return $this->db->where('aktif', '1')->order_by('urutan', 'ASC')->get('tangki_kontak')->result();
    }

    public function getKontakById($id)
    {
        return $this->db->where('id', $id)->get('tangki_kontak')->row();
    }

    public function insertKontak($data)
    {
        return $this->db->insert('tangki_kontak', $data);
    }

    public function updateKontak($id, $data)
    {
        return $this->db->where('id', $id)->update('tangki_kontak', $data);
    }

    public function deleteKontak($id)
    {
        return $this->db->where('id', $id)->update('tangki_kontak', ['aktif' => '0']);
    }

    // ==================== TARIF ====================

    public function getAllTarif()
    {
        return $this->db->where('aktif', '1')->order_by('urutan', 'ASC')->get('tangki_tarif')->result();
    }

    public function getTarifById($id)
    {
        return $this->db->where('id', $id)->get('tangki_tarif')->row();
    }

    public function insertTarif($data)
    {
        return $this->db->insert('tangki_tarif', $data);
    }

    public function updateTarif($id, $data)
    {
        return $this->db->where('id', $id)->update('tangki_tarif', $data);
    }

    public function deleteTarif($id)
    {
        return $this->db->where('id', $id)->update('tangki_tarif', ['aktif' => '0']);
    }
}
