<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gudang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('email')) {
			redirect('auth');
		}  
		$this->load->library('form_validation');
        // cek_login();
    }

    public function index()
    {
        $data['judul'] = 'Data Minyak Jelantah';
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
        $data['gudang'] = $this->ModelGudang->getGudang()->result_array();
        $data['lokasih'] = $this->ModelLokasih->getLokasih()->result_array();
        $data['pelanggan'] = $this->ModelPelanggan->getPelanggan()->result_array();
        $data['lokasih'] = $this->db->get('lokasih')->result_array();
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
        $this->form_validation->set_rules('tgl_penjemputan', 'tgl_penjemputan', [

        ]);
        $this->form_validation->set_rules('lokasih', 'lokasih', [

        ]);
        $this->form_validation->set_rules('jumlah', 'jumlah', 'required', [
            'required' => 'Jumlah Minyak jelantah harus diisi',
        ]);

        $this->form_validation->set_rules('status', 'status', 'required', [
            'required' => 'Pilih Status Penjemputan',
        ]);

        
        if ($this->form_validation->run() == false) {

            $data['page_title'] = 'Data Gudang';
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('gudang/index', $data);
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

            $this->ModelGudang->simpanGudang($data);
            redirect('gudang');
        }
    }

    public function hapusGudang()
    {
        $where = ['id_gudang' => $this->uri->segment(3)];
        $this->ModelGudang->hapusGudang($where);
        redirect('gudang');
    }

    // public function ubahMj()
    // {
    //     $data['judul'] = 'Ubah Data Buku';
    //     $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
    //     $data['lokasih'] = $this->ModelMj->lokasihWhere(['id' => $this->uri->segment(3)])->result_array();
    //     $lokasih = $this->ModelMj->joinLokasihMj(['Mj.id_Mj' => $this->uri->segment(3)])->result_array();
    //     foreach ($lokasih as $l) {
    //         $data['id'] = $l['id_lokasih'];
    //         $data['l'] = $l['lokasih'];
    //     }
    //     $data['lokasih'] = $this->ModelMj->getLokasih()->result_array();

    //     $this->form_validation->set_rules('nama_Mj', 'nama_Mj', 'required|min_length[3]', [
    //         'required' => 'Nama Mj Harus Diisi',
    //         'min_length' => 'Nama Mj terlalu pendek'
    //     ]);

    //     $this->form_validation->set_rules('id_lokasih', 'lokasih', 'required', [
    //         'required' => 'Lokasih Mj harus diisi',
    //     ]);

    //     $this->form_validation->set_rules('no_tlp', 'no_tlp', 'required|min_length[3]|numeric', [
    //         'required' => 'Nomor Tlp Harus Diisi',
    //         'min_length' => 'No Tlp terlalu pendek',
    //         'numeric' => 'Yang anda masukan bukan angka'
    //     ]);

    //     $this->form_validation->set_rules('tgl_gabung', 'Tgl Gabung', 'required|min_length[3]', [
    //         'required' => 'Tahun terbit harus diisi',
    //         'min_length' => 'Tgl gabung terlalu pendek'
    //     ]);

    //     //konfigurasi sebelum gambar diupload
    //     $config['upload_path'] = './assets/img/upload/';
    //     $config['allowed_types'] = 'jpg|png|jpeg';
    //     $config['max_size'] = '3000';
    //     $config['max_width'] = '1024';
    //     $config['max_height'] = '1000';
    //     $config['file_name'] = 'img' . time();

    //     //memuat atau memanggil library upload
    //     $this->load->library('upload', $config);

    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('template/navbar', $data);
    //         $this->load->view('template/sidebar', $data);
    //         $this->load->view('Mj/ubah_Mj', $data);
    //         $this->load->view('template/footer');
    //     } else {
    //         if ($this->upload->do_upload('image')) {
    //             $image = $this->upload->data();
    //             unlink('assets/dist/img/upload/' . $this->input->post('old_pict', TRUE));
    //             $gambar = $image['file_name'];
    //         } else {
    //             $gambar = $this->input->post('old_pict', TRUE);
    //         }

    //         $data = [
    //             'nama_Mj' => $this->input->post('nama_Mj', true),
    //             'id_lokasih' => $this->input->post('id_lokasih', true),
    //             'no_tlp' => $this->input->post('no_tlp', true),
    //             'tgl_gabung' => $this->input->post('tgl_gabung', true),
    //             'image' => $gambar
    //         ];

    //         $this->ModelMj->updateMj($data, ['id_Mj' => $this->input->post('id_Mj')]);
    //         redirect('Mj');
    //     }
    // }

    //manajemen kategori
    // public function lokasih()
    // {
    //     $data['judul'] = 'Lokasih Mj';
    //     $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
    //     $data['lokasih'] = $this->ModelMj->getLokasih()->result_array();

    //     $this->form_validation->set_rules('lokasih', 'lokasih', 'required', [
    //         'required' => 'Lokasih Mj harus diisi'
    //     ]);

    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('template/navbar', $data);
    //         $this->load->view('template/sidebar', $data);
    //         $this->load->view('lokasih/index', $data);
    //         $this->load->view('template/footer');
    //     } else {
    //         $data = [
    //             'lokasih' => $this->input->post('lokasih', TRUE)
    //         ];

    //         $this->ModelMj->simpanLokasih($data);
    //         redirect('Mj/lokasih');
    //     }
    // }

    // public function ubahLokasih()
    // {
    //     $data['judul'] = 'Ubah Data Lokasih';
    //     $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
    //     $data['lokasih'] = $this->ModelMj->lokasihWhere(['id_lokasih' => $this->uri->segment(3)])->result_array();


    //     $this->form_validation->set_rules('lokasih', 'Nama Lokasih', 'required|min_length[3]', [
    //         'required' => 'Nama Lokasih harus diisi',
    //         'min_length' => 'Nama Lokasih terlalu pendek'
    //     ]);

    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('template/navbar', $data);
    //         $this->load->view('template/sidebar', $data);
    //         $this->load->view('lokasih/ubah_lokasih', $data);
    //         $this->load->view('template/footer');
    //     } else {

    //         $data = [
    //             'lokasih' => $this->input->post('lokasih', true)
    //         ];

    //         $this->ModelMj->updateLokasih(['id_lokasih' => $this->input->post('id_lokasih')], $data);
    //         redirect('Mj/lokasih');
    //     }
    // }

    // public function hapusLokasih()
    // {
    //     $where = ['id_lokasih' => $this->uri->segment(3)];
    //     $this->ModelMj->hapusLokasih($where);
    //     redirect('Mj/lokasih');
    // }
}


