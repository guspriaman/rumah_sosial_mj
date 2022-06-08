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

    // public function total($field, $where)
    // {
    //     $this->db->select_sum($field);
    //     if(!empty($where) && count($where) > 0){
    //         $this->db->where($where);
    //     }
    //     $this->db->from('pelanggan');
    //     return $this->db->get()->row($field);
    // }
    
    //manajemen kategori
    // public function getLokasih()
    // {
    //     return $this->db->get('lokasih');
    // }

    // public function kategoriWhere($where)
    // {
    //     return $this->db->get_where('lokasih', $where);
    // }

    // public function simpanLokasih($data = null)
    // {
    //     $this->db->insert('lokasih', $data);
    // }

    // public function hapusLokasih($where = null)
    // {
    //     $this->db->delete('lokasih', $where);
    // }

    // public function updateLokasih($where = null, $data = null)
    // {
    //     $this->db->update('lokasih', $data, $where);
    // }

    //join
    // public function joinLokasihPelanggan($where)
    // {
    //     $this->db->select('pelanggan.*,lokasih.lokasih');
    //     $this->db->from('pelanggan');
    //     $this->db->join('lokasih','lokasih.id_lokasih = pelanggan.id_pelanggan');
    //     $this->db->where($where);
    //     return $this->db->get();
    // }

    // public function getLokasihPelanggan()
    // {
    //     $query = "SELECT `pelanggan`.*, `lokasih`,`lokasih`
    //     FROM 'pelanggan' JOIN `lokasih`
    //     ON `pelanggan`.`id_pelanggan` = `lokasih`.`id_lokasih`
    //     ";
    //     return $this->db->query($query)->result_array();
    // }

    // public function getLimitPelenggan()
    // {
    //     $this->db->limit(5);
    //     return $this->db->get('pelanggan');
    // }

}