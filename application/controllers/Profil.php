<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->library('form_validation');
        // cek_login();
    }

    public function index()
    {
        // $data['judul'] = 'Profil Saya';
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
		$data['page_title'] = 'Profil Saya';
        $this->load->view('user/user_data', $data);
    }

    // public function anggota()
    // {
    //     $data['judul'] = 'Data Anggota';
    //     $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
    //     $this->db->where('role_id', 1);
    //     $data['anggota'] = $this->db->get('user')->result_array();

    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('user/anggota', $data);
    //     $this->load->view('templates/footer');
    // }

    public function ubahProfil()
    {
        // $data['judul'] = 'Ubah Profil';
        // $data['user'] = $this->db->cekData('user',['email' => $this->session->userdata('email')])->row_array();
		$data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim', [
            'required' => 'Nama tidak Boleh Kosong'
        ]);


        if ($this->form_validation->run() == false) {
            $data['page_title'] = 'Ubah Profil';
            $this->load->view('user/ubah_profil', $data);

        } else {
            $nama = $this->input->post('nama', true);
            $email = $this->input->post('email', true);

            //jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['upload_path'] = './assets/dist/img/profil/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '3000';
                $config['max_width'] = '1024';
                $config['max_height'] = '1000';
                $config['file_name'] = 'pro' . time();

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $gambar_lama = $data['user']['image'];
                    if ($gambar_lama != 'default.jpg') {
                        unlink(FCPATH . 'assets/dist/img/profil/' . $gambar_lama);
                    }

                    $gambar_baru = $this->upload->data('file_name');
                    $this->db->set('image', $gambar_baru);
                } else { }
            }

            $this->db->set('nama', $nama);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Profil Berhasil diubah </div>');
            redirect('profil');
        }
    }

    // public function ubahPassword()
    // {
    //     $data['judul'] = 'Ubah Password';
    //     $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

    //     $this->form_validation->set_rules('password_sekarang', 'Password Saat ini', 'required|trim', [
    //         'required' => 'Password saat ini harus diisi'
    //     ]);

    //     $this->form_validation->set_rules('password_baru1', 'Password Baru', 'required|trim|min_length[4]|matches[password_baru2]', [
    //         'required' => 'Password Baru harus diisi',
    //         'min_length' => 'Password tidak boleh kurang dari 4 digit',
    //         'matches' => 'Password Baru tidak sama dengan ulangi password'
    //     ]);

    //     $this->form_validation->set_rules('password_baru2', 'Konfirmasi Password Baru', 'required|trim|min_length[4]|matches[password_baru1]', [
    //         'required' => 'Ulangi Password harus diisi',
    //         'min_length' => 'Password tidak boleh kurang dari 4 digit',
    //         'matches' => 'Ulangi Password tidak sama dengan password baru'
    //     ]);

    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('templates/header', $data);
    //         $this->load->view('templates/sidebar', $data);
    //         $this->load->view('templates/topbar', $data);
    //         $this->load->view('user/ubah-password', $data);
    //         $this->load->view('templates/footer');
    //     } else {
    //         $pwd_skrg = $this->input->post('password_sekarang', true);
    //         $pwd_baru = $this->input->post('password_baru1', true);
    //         if (!password_verify($pwd_skrg, $data['user']['password'])) {
    //             $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password Saat ini Salah!!! </div>');
    //             redirect('user/ubahPassword');
    //         } else {
    //             if ($pwd_skrg == $pwd_baru) {
    //                 $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password Baru tidak boleh sama dengan password saat ini!!! </div>');
    //                 redirect('user/ubahPassword');
    //             } else {
    //                 //password ok
    //                 $password_hash = password_hash($pwd_baru, PASSWORD_DEFAULT);

    //                 $this->db->set('password', $password_hash);
    //                 $this->db->where('email', $this->session->userdata('email'));
    //                 $this->db->update('user');

    //                 $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Password Berhasil diubah</div>');
    //                 redirect('user/ubahPassword');
    //             }
    //         }
    //     }
    // }
}