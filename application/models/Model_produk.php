<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_produk extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        return $this->db->where('aktif', '1')->order_by('urutan', 'ASC')->get('ijen_produk')->result();
    }

    public function getById($id)
    {
        return $this->db->where('id', $id)->get('ijen_produk')->row();
    }

    public function insert($data)
    {
        return $this->db->insert('ijen_produk', $data);
    }

    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update('ijen_produk', $data);
    }

    public function delete($id)
    {
        return $this->db->where('id', $id)->update('ijen_produk', ['aktif' => '0']);
    }
}
