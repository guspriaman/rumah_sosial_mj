<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // cek_login();
    }

    //manajemen Buku
    public function index()
    {
        $data['judul'] = 'Data Pelanggan';
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
        $data['pelanggan'] = $this->ModelPelanggan->getPelanggan()->result_array();
        $data['lokasih'] = $this->ModelPelanggan->getLokasih()->result_array();

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



        //konfigurasi sebelum gambar diupload
        $config['upload_path'] = './assets/dist/img/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000'; 
        $config['max_width'] = '1024';
        $config['max_height'] = '1000';
        $config['file_name'] = 'img' . time();

        $this->load->library('upload', $config);

        if ($this->form_validation->run() == false) {

            $data['page_title'] = 'Data Pelanggan';
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('pelanggan/index', $data);
            $this->load->view('template/footer');
        } else {
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data();
                $gambar = $image['file_name'];
            } else {
                $gambar = '';
            }

            $data = [
                'nama_pelanggan' => $this->input->post('nama_pelanggan', true),
                'id_lokasih' => $this->input->post('id_lokasih', true),
                'no_tlp' => $this->input->post('no_tlp', true),
                'tgl_gabung' => $this->input->post('tgl_gabung', true),
                'image' => $gambar
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
        $data['lokasih'] = $this->ModelPelanggan->lokasihWhere(['id' => $this->uri->segment(3)])->result_array();
        $lokasih = $this->ModelPelanggan->joinLokasihPelanggan(['pelanggan.id_pelanggan' => $this->uri->segment(3)])->result_array();
        foreach ($lokasih as $l) {
            $data['id'] = $l['id_lokasih'];
            $data['l'] = $l['lokasih'];
        }
        $data['lokasih'] = $this->ModelPelanggan->getLokasih()->result_array();

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

        //konfigurasi sebelum gambar diupload
        $config['upload_path'] = './assets/dist/img/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1000';
        $config['file_name'] = 'img' . time();

        //memuat atau memanggil library upload
        $this->load->library('upload', $config);

        if ($this->form_validation->run() == false) {
            $data['page_title'] = 'Ubah Data Pelanggan';
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('Pelanggan/ubah_pelanggan', $data);
            $this->load->view('template/footer');
        } else {
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data();
                unlink('assets/dist/img/upload/' . $this->input->post('old_pict', TRUE));
                $gambar = $image['file_name'];
            } else {
                $gambar = $this->input->post('old_pict', TRUE);
            }

            $data = [
                'nama_pelanggan' => $this->input->post('nama_pelanggan', true),
                'id_lokasih' => $this->input->post('id_lokasih', true),
                'no_tlp' => $this->input->post('no_tlp', true),
                'tgl_gabung' => $this->input->post('tgl_gabung', true),
                'image' => $gambar
            ];

            $this->ModelPelanggan->updatePelanggan($data, ['id_pelanggan' => $this->input->post('id_pelanggan')]);
            redirect('pelanggan');
        }
    }

    //manajemen kategori
    public function lokasih()
    {
        $data['judul'] = 'Lokasih pelanggan';
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
        $data['lokasih'] = $this->ModelPelanggan->getLokasih()->result_array();
        $data['lokasih'] = $this->db->get('lokasih')->result_array();





        $this->form_validation->set_rules('lokasih', 'lokasih', 'required', [
            'required' => 'Lokasih Pelanggan harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $data['page_title'] = 'Data Lokasih';
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('lokasih/index', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'lokasih' => $this->input->post('lokasih', TRUE)
            ];

            $this->ModelPelanggan->simpanLokasih($data);
            redirect('pelanggan/lokasih');
        }
    }

    public function ubahLokasih()
    {
        $data['judul'] = 'Ubah Data Lokasih';
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
        $data['lokasih'] = $this->ModelPelanggan->lokasihWhere(['id_lokasih' => $this->uri->segment(3)])->result_array();


        $this->form_validation->set_rules('lokasih', 'Nama Lokasih', 'required|min_length[3]', [
            'required' => 'Nama Lokasih harus diisi',
            'min_length' => 'Nama Lokasih terlalu pendek'
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

            $this->ModelPelanggan->updateLokasih(['id_lokasih' => $this->input->post('id_lokasih')], $data);
            redirect('pelanggan/lokasih');
        }
    }

    public function hapusLokasih()
    {
        $where = ['id_lokasih' => $this->uri->segment(3)];
        $this->ModelPelanggan->hapusLokasih($where);
        redirect('pelanggan/lokasih');
    }
}

