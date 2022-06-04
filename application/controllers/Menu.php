<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    //manajemen Buku
    public function index()
    {
        $data['judul'] = 'Data Menu';
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->ModelMenu->getUser_menu()->result_array();


        $this->form_validation->set_rules('menu', 'menu', 'required', [
            'required' => 'Menu harus diisi'

        ]);

        if ($this->form_validation->run() == false) {
            $data['page_title'] = 'Profil Saya';
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'menu' => $this->input->post('menu', true)
            ];

            $this->ModelMenu->simpanMenu($data);
            redirect('menu');
        }
    }


    public function ubahMenu()
    {
        $data['judul'] = 'Ubah Data Menu';
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();

        
        $this->form_validation->set_rules('menu', 'menu', 'required', [
            'required' => 'Menu harus diisi'

        ]);
        
        if ($this->form_validation->run() == false) {
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('menu/ubah_menu', $data);
            $this->load->view('template/footer');
        } else {

            $data = [
                'menu' => $this->input->post('menu', true)
            ];
            
            $this->ModelMenu->updateMenu(['id' => $this->input->post('id')], $data);
            redirect('menu');
        }
    }
    public function hapusMenu()
    {
        $where = ['id' => $this->uri->segment('3')];
        $this->ModelMenu->hapusMenu($where);
        redirect('menu');
    }
}
