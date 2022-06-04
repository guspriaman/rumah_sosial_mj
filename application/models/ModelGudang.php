<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelGudang extends CI_Model
{
    //manajemen buku
    public function getGudang()
    {
        return $this->db->get('gudang');
    }

    public function gudangWhere($where)
    {
        return $this->db->get_where('gudang', $where);
    }

    public function simpanGudang($data = null)
    {
        $this->db->insert('gudang',$data);
    }

    public function updateGudang($data = null, $where = null)
    {
        $this->db->update('gudang', $data, $where);
    }

    public function hapusGudang($where = null)
    {
        $this->db->delete('gudang', $where);
    }

    // public function total($field, $where)
    // {
    //     $this->db->select_sum($field);
    //     if(!empty($where) && count($where) > 0){
    //         $this->db->where($where);
    //     }
    //     $this->db->from('gudang');
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
    // public function joinMjGudang($where)
    // {
    //     $this->db->select('gudang.id_gudang,mj.nama_pic');
    //     $this->db->from('gudang');
    //     $this->db->join('mj','mj.id_mj = gudang.nama_pic');
    //     $this->db->where($where);
    //     return $this->db->get();
    // }
    public function joinLokasihGudang($where)
    {
        $this->db->select('gudang.lokasih,lokasih.lokasih');
        $this->db->from('gudang');
        $this->db->join('lokasih','lokasih.id_lokasih = gudang.lokasih');
        $this->db->where($where);
        return $this->db->get();
    }
    public function joinPelangganhGudang($where)
    {
        $this->db->select('gudang.nama_pelanggan,pelanggan.nama_pelanggan');
        $this->db->from('gudang');
        $this->db->join('pelanggan','pelanggan.id_pelanggan = gudang.nama_pelanggan');
        $this->db->where($where);
        return $this->db->get();
    }

    // public function getLimitPelenggan()
    // {
    //     $this->db->limit(5);
    //     return $this->db->get('gudang');
    // }

}