<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permintaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['judul'] = 'Data Minyak Jelantah';
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
        $data['permintaan'] = $this->ModelPermintaan->getPermintaan()->result_array();
        $data['lokasih'] = $this->ModelLokasih->getLokasih()->result_array();
        $data['pelanggan'] = $this->ModelPelanggan->getPelanggan()->result_array();

        $this->form_validation->set_rules('nama_pic', 'nama_pic', 'required|min_length[3]', [
            'required' => 'Nama pic Harus Diisi',
            'min_length' => 'Nama Minyak Jelantah terlalu pendek'
        ]);

        $this->form_validation->set_rules('nama_pelanggan', 'nama_pelanggan', 'required|min_length[3]', [
            'required' => 'Nama Pelanggan Harus Diisi',
            'min_length' => 'Nama Pelanggan Terlalu Pendek'
        ]);

        $this->form_validation->set_rules('lokasih', 'lokasih', 'required', [
            'required' => 'Lokasih Minyak jelantah harus diisi'
        ]);

        $this->form_validation->set_rules('jumlah', 'jumlah', 'required', [
            'required' => 'jumlah Minyak jelantah harus diisi'
        ]);

        
        $this->form_validation->set_rules('tgl_permintaan', 'Tgl_permintaan', 'required', [
            'required' => 'Tanggal Jumput Minyak Jelantah harus diisi'
        ]);



        if ($this->form_validation->run() == false) {

            $data['page_title'] = 'Minjak Jelantah';
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('permintaan/index', $data);
            $this->load->view('template/footer');
        } else {

            $data = [
                'nama_pic' => $this->input->post('nama_pic', true),
                'nama_pelanggan' => $this->input->post('nama_pelanggan', true),
                'lokasih' => $this->input->post('lokasih', true),
                'jumlah' => $this->input->post('jumlah', true),
                'tgl_permintaan' => $this->input->post('tgl_permintaan', true),
            ];

            $this->ModelPermintaan->simpanPermintaan($data);
            redirect('permintaan');
        }
    }

    public function hapusPermintaan()
    {
        $where = ['id_permintaan' => $this->uri->segment(3)];
        $this->ModelPermintaan->hapusPermintaan($where);
        redirect('permintaan');
    }
    public function ubahPermintaan()
    {
        $data['judul'] = 'Ubah Data Permintaan';
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
        $data['permintaan'] = $this->ModelPermintaan->permintaanWhere(['id_permintaan' => $this->uri->segment(3)])->result_array();
        $data['lokasih'] = $this->ModelLokasih->getLokasih()->result_array();
        $data['pelanggan'] = $this->ModelPelanggan->getPelanggan()->result_array();

        $this->form_validation->set_rules('nama_pic', 'nama_pic', 'required|min_length[3]', [
            'required' => 'Nama PIC harus diisi',
            'min_length' => 'Nama PIC terlalu pendek'
        ]);
        $this->form_validation->set_rules('nama_pelanggan', 'nama_pelanggan', 'required', [
            'required' => 'Nama pengarang harus diisi'
        ]);

        $this->form_validation->set_rules('lokasih', 'lokasih', 'required', [
            'required' => 'Nama lokasih harus diisi'
        ]);

        $this->form_validation->set_rules('jumlah', 'jumlah', 'required', [
            'required' => 'jumlah Minyak Jelantah harus diisi'
        ]);
        
        $this->form_validation->set_rules('tgl_permintaan', 'tgl_permintaan', 'required', [
            'required' => 'Tgl Permintaan Penjemputan harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $data['page_title'] = 'Ubah Data Permintaan';
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('permintaan/ubah_permintaan', $data);
            $this->load->view('template/footer');
        } else {

            $data = [
                'nama_pic' => $this->input->post('nama_pic', true),
                'nama_pelanggan' => $this->input->post('nama_pelanggan', true),
                'lokasih' => $this->input->post('lokasih', true),
                'jumlah' => $this->input->post('jumlah', true),
                'tgl_permintaan' => $this->input->post('tgl_permintaan', true),
            ];

            $this->ModelPermintaan->updatePermintaan($data, ['id_permintaan' => $this->input->post('id_permintaan')]);
            redirect('permintaan');
        }
    }
    

}

