<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelKeuangan extends CI_Model
{
    //manajemen buku
    public function getKeuangan()
    {
        return $this->db->get('keuangan');
    }

    public function KeuanganWhere($where)
    {
        return $this->db->get_where('keuangan', $where);
    }

    public function simpanKeuangan($data = null)
    {
        $this->db->insert('keuangan',$data);
    }

    public function updateKeuangan($data = null, $where = null)
    {
        $this->db->update('keuangan', $data, $where);
    }

    public function hapusKeuangan($where = null)
    {
        $this->db->delete('keuangan', $where);
    }

    // public function total($field, $where)
    // {
    //     $this->db->select_sum($field);
    //     if(!empty($where) && count($where) > 0){
    //         $this->db->where($where);
    //     }
    //     $this->db->from('Keuangan');
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
    // public function joinMjKeuangan($where)
    // {
    //     $this->db->select('Keuangan.id_Keuangan,mj.nama_pic');
    //     $this->db->from('Keuangan');
    //     $this->db->join('mj','mj.id_mj = Keuangan.nama_pic');
    //     $this->db->where($where);
    //     return $this->db->get();
    // }
    public function joinPelangganhKeuangan($where)
    {
        $this->db->select('keuangan.nama_pelanggan,pelanggan.nama_pelanggan');
        $this->db->from('keuangan');
        $this->db->join('pelanggan','pelanggan.id_pelanggan = keuangan.nama_pelanggan');
        $this->db->where($where);
        return $this->db->get();
    }

    // public function getLimitPelenggan()
    // {
    //     $this->db->limit(5);
    //     return $this->db->get('Keuangan');
    // }

}