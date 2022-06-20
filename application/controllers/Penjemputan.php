<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjemputan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('email')) {
			redirect('auth');
		}  
		$this->load->library('form_validation');
        

    }

    public function index()
    {
        $data['judul'] = 'Data Minyak Jelantah';
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
        $data['penjemputan'] = $this->ModelPenjemputan->getPenjemputan()->result_array();
        $data['permintaan'] = $this->ModelPermintaan->getPermintaan()->result_array();
        $data['lokasih'] = $this->ModelLokasih->getLokasih()->result_array();
        $data['pelanggan'] = $this->ModelPelanggan->getPelanggan()->result_array();
        // $data['lokasih'] = $this->db->get('lokasih')->result_array();
        // $data['mj'] = $this->ModelMJ->getMj()->result_array();


        $this->form_validation->set_rules('nama_admin_g', 'nama_admin_g', 'required|min_length[3]', [
            'required' => 'Nama Admin Gudang Harus Diisi',
            'min_length' => 'Nama Admin Gudang terlalu pendek'
        ]);

        $this->form_validation->set_rules('nama_pic', 'nama_pic', 'required|min_length[3]', [
            'required' => 'Nama PIC Harus Diisi',
            'min_length' => 'Nama PIC terlalu pendek'
        ]);

        $this->form_validation->set_rules('nama_pelanggan', 'nama_pelanggan', 'required|min_length[3]', [
            'required' => 'Nama Pelanggan Harus Diisi',
            'min_length' => 'Nama Pelanggan terlalu pendek'
        ]);

        $this->form_validation->set_rules('tgl_penjemputan', 'tgl_penjemputan');

        $this->form_validation->set_rules('lokasih', 'lokasih');

        $this->form_validation->set_rules('jumlah', 'jumlah', 'required', [
            'required' => 'Jumlah Minyak jelantah harus diisi',
        ]);


        $this->form_validation->set_rules('status', 'status', 'required', [
            'required' => 'Pilih Status Penjemputan',
        ]);

        
        if ($this->form_validation->run() == false) {

            $data['page_title'] = 'Data Penjemputan';
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('penjemputan/index', $data);
            $this->load->view('template/footer');
        } else {

            $data = [
                'nama_admin_g' => $this->input->post('nama_admin_g', true),
                'nama_pic' => $this->input->post('nama_pic', true),
                'nama_pelanggan' => $this->input->post('nama_pelanggan', true),
                'tgl_penjemputan' => $this->input->post('tgl_penjemputan', true),
                'lokasih' => $this->input->post('lokasih', true),
                'jumlah' => $this->input->post('jumlah', true),
                'status' => $this->input->post('status', true),
            ];

            $this->ModelPenjemputan->simpanPenjemputan($data);
            redirect('penjemputan');
        }
    }




    public function ubahPenjemputan()
    {
        $data['judul'] = 'Ubah Data Permintaan';
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
        $data['penjemputan'] = $this->ModelPenjemputan->penjemputanWhere(['id_penjemputan' => $this->uri->segment(3)])->result_array();
        $data['permintaan'] = $this->ModelPermintaan->getPermintaan()->result_array();
        $data['lokasih'] = $this->ModelLokasih->getLokasih()->result_array();
        $data['pelanggan'] = $this->ModelPelanggan->getPelanggan()->result_array();

        $this->form_validation->set_rules('nama_admin_g', 'nama_admin_g', 'required|min_length[3]', [
            'required' => 'Nama Admin Gudang harus diisi',
            'min_length' => 'Nama Admin Gudang terlalu pendek'
        ]);
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
        
        $this->form_validation->set_rules('tgl_penjemputan', 'tgl_penjemputan', 'required', [
            'required' => 'Tgl Permintaan Penjemputan harus diisi'
        ]);
        $this->form_validation->set_rules('status', 'status', [
        ]);

        if ($this->form_validation->run() == false) {
            $data['page_title'] = 'ubah Data Penjemputan';
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('penjemputan/ubah_penjemputan', $data);
            $this->load->view('template/footer');
        } else {

            $data = [
                'nama_admin_g' => $this->input->post('nama_admin_g', true),
                'nama_pic' => $this->input->post('nama_pic', true),
                'nama_pelanggan' => $this->input->post('nama_pelanggan', true),
                'lokasih' => $this->input->post('lokasih', true),
                'jumlah' => $this->input->post('jumlah', true),
                'tgl_penjemputan' => $this->input->post('tgl_penjemputan', true),
                'status' => $this->input->post('status', true)
            ];

            $this->ModelPenjemputan->updatePenjemputan($data, ['id_penjemputan' => $this->input->post('id_penjemputan')]);
            redirect('penjemputan');
        }
    }

    public function hapusPenjemputan()
    {
        $where = ['id_penjemputan' => $this->uri->segment(3)];
        $this->ModelPenjemputan->hapusPenjemputan($where);
        redirect('penjemputan');
    }

}


