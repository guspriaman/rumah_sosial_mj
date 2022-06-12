<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelPenjemputan extends CI_Model
{



    public function getPenjemputan()
    {
        return $this->db->get('penjemputan');
    }


    public function penjemputanWhere($where)
    {
        return $this->db->get_where('penjemputan', $where);
    }


    public function simpanPenjemputan($data = null)
    {
        $this->db->insert('penjemputan',$data);
    }


    public function updatePenjemputan($data = null, $where = null)
    {
        $this->db->update('penjemputan', $data, $where);
    }


    public function hapusPenjemputan($where = null)
    {
        $this->db->delete('penjemputan', $where);
    }


    public function joinLokasihPenjemputaan($where)
    {
       
        $this->db->select('penjemputaan.lokasih,lokasih.lokasih');
        $this->db->from('perjemputaan');
        $this->db->join('lokasih','lokasih.id_lokasih = perjemputaan.lokasih');
        $this->db->where($where);
        return $this->db->get();
    }

    public function joinPelangganPenjemputaan($where)
    {
        $this->db->select('penjemputaan.nama_pelanggan,pelanggan.nama_pelanggan');
        $this->db->from('penjemputaan');
        $this->db->join('pelanggan','pelanggan.id_pelanggan = penjemputaan.nama_pelanggan');
        $this->db->where($where);
        return $this->db->get();
    }

    public function joinPermintaanPenjemputan($where)
    {
        $this->db->select('penjemputan.nama_pic,pelanggan.nama_pic');
        $this->db->from('penjemputaan');
        $this->db->join('permintaan','permintaan.id_permintaan = penjemputan.nama_pic');
        $this->db->where($where);
        return $this->db->get();
    }  

}