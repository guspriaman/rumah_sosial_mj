<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelPelanggan extends CI_Model
{
    //manajemen buku
    public function getPelanggan()
    {
        return $this->db->get('pelanggan');
    }

    public function pelangganWhere($where)
    {
        return $this->db->get_where('pelanggan', $where);
    }

    public function simpanPelanggan($data = null)
    {
        $this->db->insert('pelanggan',$data);
    }

    public function updatePelanggan($data = null, $where = null)
    {
        $this->db->update('pelanggan', $data, $where);
    }

    public function hapusPelanggan($where = null)
    {
        $this->db->delete('pelanggan', $where);
    }

    public function joinLokasihPelanggan($where)
    {
        // $this->db->select('pelanggan.id_lokasih,lokasih.lokasih');
        $this->db->from('pelanggan');
        $this->db->join('lokasih','lokasih.id = pelanggan.id_lokasih');
        $this->db->where($where);
        return $this->db->get();
    }

    

}