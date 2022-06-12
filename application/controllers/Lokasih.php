<?php

use PhpParser\Node\Expr\AssignOp\Div;

defined('BASEPATH') or exit('No direct script access allowed');

class Lokasih extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelLokasih');
    }

    //manajemen Buku
    public function index()
    {
        $data['judul'] = 'Data Pelanggan';
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
        $data['lokasih'] = $this->ModelLokasih->getLokasih('lokasih')->result_array();

        $this->form_validation->set_rules('lokasih', 'lokasih', 'required', [
            'required' => 'Lokasih Pelanggan harus diisi',
        ]);

        if ($this->form_validation->run() == false) {

            $data['page_title'] = 'Data Lokasih';
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('lokasih/index', $data);
            $this->load->view('template/footer');
        } else {
            

            $data = [
                'lokasih' => $this->input->post('lokasih', true)
            ];

            $this->ModelLokasih->simpanLokasih($data);
            redirect('lokasih');
        }
    }

    public function ubahLokasih()
    {
        $data['judul'] = 'Ubah Data lokasih';
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
        $data['lokasih'] = $this->ModelLokasih->lokasihWhere(['id' => $this->uri->segment(3)])->result_array();


        $this->form_validation->set_rules('lokasih', 'Nama Lokasih', 'required|min_length[3]', [
            'required' => 'Nama Lokasih harus diisi',
            'min_length' => 'Nama lokasih terlalu pendek'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('lokasih/ubah_lokasih', $data);
            $this->load->view('template/footer');
        } else {

            $data = [
                'lokasih' => $this->input->post('lokasih', true)
            ];

            $this->ModelLokasih->updateLokasih(['id' => $this->input->post('id')], $data);
            redirect('lokasih');
        }
    }


    public function hapusLokasih()
    {
        $where = ['id' => $this->uri->segment(3)];
        $this->ModelLokasih->hapusLokasih($where);
        redirect('lokasih');
    }
}
