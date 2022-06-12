<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    //manajemen Buku
    public function index()
    {
        $data['judul'] = 'Data Pelanggan';
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
        $data['pelanggan'] = $this->ModelPelanggan->getPelanggan()->result_array();
        $data['lokasih'] = $this->ModelLokasih->getLokasih()->result_array();

        $this->form_validation->set_rules('nama_pelanggan', 'nama_pelanggan', 'required|min_length[3]', [
            'required' => 'Nama Pelanggan Harus Diisi',
            'min_length' => 'Nama Pelanggan terlalu pendek'
        ]);

        $this->form_validation->set_rules('id_lokasih', 'lokasih', 'required', [
            'required' => 'Lokasih Pelanggan harus diisi',
        ]);

        $this->form_validation->set_rules('no_tlp', 'no_tlp', 'required|min_length[3]|numeric', [
            'required' => 'Nomor Tlp Harus Diisi',
            'min_length' => 'No Tlp terlalu pendek',
            'numeric' => 'Yang anda masukan bukan angka'
        ]);

        $this->form_validation->set_rules('tgl_gabung', 'Tgl Gabung', 'required|min_length[3]', [
            'required' => 'Tahun terbit harus diisi',
            'min_length' => 'Tgl gabung terlalu pendek'
        ]);


        if ($this->form_validation->run() == false) {

            $data['page_title'] = 'Data Pelanggan';
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('pelanggan/index', $data);
            $this->load->view('template/footer');
        } else {

            $data = [
                'nama_pelanggan' => $this->input->post('nama_pelanggan', true),
                'id_lokasih' => $this->input->post('id_lokasih', true),
                'no_tlp' => $this->input->post('no_tlp', true),
                'tgl_gabung' => $this->input->post('tgl_gabung', true),
            ];

            $this->ModelPelanggan->simpanPelanggan($data);
            redirect('pelanggan');
        }
    }
    public function hapusPelanggan()
    {
        $where = ['id_pelanggan' => $this->uri->segment(3)];
        $this->ModelPelanggan->hapusPelanggan($where);
        redirect('pelanggan');
    }


    public function ubahPelanggan()
    {
        $data['judul'] = 'Ubah Data Buku';
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
        $data['pelanggan'] = $this->ModelPelanggan->pelangganWhere(['id_pelanggan' => $this->uri->segment(3)])->result_array();
        $lokasih = $this->ModelPelanggan->joinLokasihPelanggan(['pelanggan.id_pelanggan' => $this->uri->segment(3)])->result_array();
        foreach ($lokasih as $l) {
            $data['id'] = $l['id_lokasih'];
            $data['l'] = $l['lokasih'];
        }
        $data['lokasih'] = $this->ModelLokasih->getLokasih()->result_array();

        $this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'required|min_length[3]', [
            'required' => 'Nama Pelanggan harus diisi',
            'min_length' => 'Nama Pelanggan terlalu pendek'
        ]);
        $this->form_validation->set_rules('id_lokasih', 'lokasih', 'required', [
            'required' => 'Lokasih pengarang harus diisi',
        ]);
        $this->form_validation->set_rules('no_tlp', 'No Tlp Pelanggan', 'required|min_length[3]', [
            'required' => 'No Tlp Pelanggan harus diisi',
            'min_length' => 'No Tlp Pelanggan terlalu pendek'
        ]);

        $this->form_validation->set_rules('tgl_gabung', 'Tgl Gabung Pelanggan', 'required|min_length[3]', [
            'required' => 'Tgl Gabung Pelanggan harus diisi',
            'min_length' => 'Tgl Gabung Pelanggan terlalu pendek'
        ]);
        
        if ($this->form_validation->run() == false) {
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('pelanggan/ubah_pelanggan', $data);
            $this->load->view('template/footer');
        } else {

            $data = [
                'nama_pelanggan' => $this->input->post('nama_pelanggan', true),
                'id_pelanggan' => $this->input->post('id_pelanggan', true),
                'no_tlp' => $this->input->post('no_tlp', true),
                'tgl_gabung' => $this->input->post('tgl_gabung', true),

            ];

            $this->ModelPelanggan->updatePelanggan($data, ['id_pelanggan' => $this->input->post('id_pelanggan')]);
            redirect('pelanggan');
        }
    }
}

