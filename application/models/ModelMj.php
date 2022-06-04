<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelMj extends CI_Model
{
    //manajemen buku
    public function getMj()
    {
        return $this->db->get('mj');
    }

    public function mjWhere($where)
    {
        return $this->db->get_where('mj', $where);
    }

    public function simpanMj($data = null)
    {
        $this->db->insert('mj',$data);
    }

    public function updateMj($data = null, $where = null)
    {
        $this->db->update('mj', $data, $where);
    }

    public function hapusMj($where = null)
    {
        $this->db->delete('mj', $where);
    }

    // public function total($field, $where)
    // {
    //     $this->db->select_sum($field);
    //     if(!empty($where) && count($where) > 0){
    //         $this->db->where($where);
    //     }
    //     $this->db->from('mj');
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
    public function joinLokasihmj($where)
    {
        $this->db->select('mj.id_lokasih,lokasih.lokasih');
        $this->db->from('mj');
        $this->db->join('lokasih','lokasih.id_lokasih = mj.lokasih');
        $this->db->where($where);
        return $this->db->get();
    }

    // public function getLokasihMj()
    // {
    //     $query = "SELECT `mj`.*, `lokasih`,`lokasih`
    //     FROM 'mj' JOIN `lokasih`
    //     ON `mj`.`id_mj` = `lokasih`.`id_lokasih`
    //     ";
    //     return $this->db->query($query)->result_array();
    // }
    public function joinPelangganhmj($where)
    {
        $this->db->select('mj.nama_pelanggan,pelanggan.nama_pelanggan');
        $this->db->from('mj');
        $this->db->join('pelanggan','pelanggan.id_pelanggan = mj.nama_pelanggan');
        $this->db->where($where);
        return $this->db->get();
    }

    // public function getLimitPelenggan()
    // {
    //     $this->db->limit(5);
    //     return $this->db->get('mj');
    // }

}