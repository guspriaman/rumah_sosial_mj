<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keuangan extends CI_Controller
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
        $data['keuangan'] = $this->ModelKeuangan->getKeuangan()->result_array();
        $data['pelanggan'] = $this->ModelPelanggan->getPelanggan()->result_array();
        $data['permintaan'] = $this->ModelPermintaan->getPermintaan()->result_array();




        $this->form_validation->set_rules('nama_admin_k', 'nama_admin_k', 'required|min_length[3]', [
            'required' => 'Nama Admin Keuangan Harus Diisi',
            'min_length' => 'Nama Admin Keuangan terlalu pendek'
        ]);
        $this->form_validation->set_rules('nama_pic', 'nama_pic', 'required|min_length[3]', [
            'required' => 'Nama PIC Harus Diisi',
            'min_length' => 'Nama PIC terlalu pendek'
        ]);
        $this->form_validation->set_rules('nama_pelanggan', 'nama_pelanggan', 'required|min_length[3]', [
            'required' => 'Nama Pelanggan Harus Diisi',
            'min_length' => 'Nama Pelanggan terlalu pendek'
        ]);
        $this->form_validation->set_rules('tgl_Pembayaran', 'tgl_Pembayaran', [

        ]);
        $this->form_validation->set_rules('jumlah', 'jumlah', 'required', [
            'required' => 'Jumlah Minyak jelantah harus diisi',
        ]);
        $this->form_validation->set_rules('bayar', 'bayar', 'required', [
            'required' => 'Jumlah Minyak jelantah harus diisi',
        ]);

        $this->form_validation->set_rules('status', 'status', 'required', [
            'required' => 'Pilih Status pembayaran',
        ]);

        
        if ($this->form_validation->run() == false) {

            $data['page_title'] = 'Data Keuangan';
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('keuangan/index', $data);
            $this->load->view('template/footer');
        } else {

            $data = [
                'nama_admin_k' => $this->input->post('nama_admin_k', true),
                'nama_pic' => $this->input->post('nama_pic', true),
                'nama_pelanggan' => $this->input->post('nama_pelanggan', true),
                'tgl_pembayaran' => $this->input->post('tgl_pembayaran', true),
                'jumlah' => $this->input->post('jumlah', true),
                'bayar' => $this->input->post('bayar', true),
                'status' => $this->input->post('status', true),
            ];

            $this->ModelKeuangan->simpanKeuangan($data);
            redirect('keuangan');
        }
    }

    public function hapusKeuangan()
    {
        $where = ['id_Keuangan' => $this->uri->segment(3)];
        $this->ModelKeuangan->hapusKeuangan($where);
        redirect('keuangan');
    }

}


