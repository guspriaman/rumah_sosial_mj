<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelLokasih extends CI_Model
{
    //manajemen buku
    public function getLokasih()
    {
        return $this->db->get('lokasih');
    }

    public function lokasihWhere($where)
    {
        return $this->db->get_where('lokasih', $where);
    }

    public function simpanLokasih($data = null)
    {
        $this->db->insert('lokasih',$data);
    }

    public function updateLokasih($where = null, $data = null)
    {
        $this->db->update('lokasih', $data, $where);
    }

    public function hapusLokasih($where = null)
    {
        $this->db->delete('lokasih', $where);
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
    

}