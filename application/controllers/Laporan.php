<?php
defined('BASEPATH') or exit('No Direct script access allowed');
class Laporan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_user();
    }
    public function laporan_penjemputan()
    {
        $data['judul'] = 'Laporan Data Penejemputan';
        $data['page_title'] = 'Laporan Penjemputan';
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
        $data['penjemputan'] = $this->ModelPenjemputan->getPenjemputan()->result_array();
        $data['permintaan'] = $this->ModelPermintaan->getPermintaan()->result_array();
        $data['lokasih'] = $this->ModelLokasih->getLokasih()->result_array();
        $data['pelanggan'] = $this->ModelPelanggan->getPelanggan()->result_array();
        $this->load->view('template/navbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('penjemputan/laporan_penjemputan', $data);
        $this->load->view('template/footer');
    }

    public function cetak_laporan_penjemputan()
    {
        $data['penjemputan'] = $this->ModelPenjemputan->getPenjemputan()->result_array();
        $data['permintaan'] = $this->ModelPermintaan->getPermintaan()->result_array();
        $data['lokasih'] = $this->ModelLokasih->getLokasih()->result_array();
        $data['pelanggan'] = $this->ModelPelanggan->getPelanggan()->result_array();

        $this->load->view('penjemputan/laporan_print_penjemputan', $data);
    }

    public function laporan_penjemputan_pdf()
    {
        {
            $this->load->library('dompdf_gen');

            $data['penjemputan'] = $this->ModelPenjemputan->getPenjemputan()->result_array();
            $data['permintaan'] = $this->ModelPermintaan->getPermintaan()->result_array();
            $data['lokasih'] = $this->ModelLokasih->getLokasih()->result_array();
            $data['pelanggan'] = $this->ModelPelanggan->getPelanggan()->result_array();

            $this->load->view('penjemputan/laporan_pdf_penjemputan', $data);

            $paper_size = 'A4'; //ukuran kertas
            $orientation = 'landscape'; //tipe format kertas potrait atau landscape
            $html = $this->output->get_output();

            $this->dompdf->load_html($html);
            $this->dompdf->render();
            $this->dompdf->stream("laporan_data_penjemputan.pdf", array('attaachment => 0'));
            // nama file pdf yang di hasilkan
            
        }
    }


    public function export_excel()
    {
        $data = array('title' => 'Laporan Penjemputan Minyak Jelantah',
        'penjemputan' => $this->ModelPenjemputan->getPenjemputan()->result_array());
        $this->load->view('penjemputan/export_excel_penjemputan', $data);
    }



    public function laporan_keuangan()
    {
        $data['judul'] = 'Laporan Data Pembayaran';
        $data['page_title'] = 'Laporan Keuangan';
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
        $data['keuangan'] = $this->ModelKeuangan->getKeuangan()->result_array();
        $data['permintaan'] = $this->ModelPermintaan->getPermintaan()->result_array();
        $data['lokasih'] = $this->ModelLokasih->getLokasih()->result_array();
        $data['pelanggan'] = $this->ModelPelanggan->getPelanggan()->result_array();
        $this->load->view('template/navbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('keuangan/laporan_keuangan', $data);
        $this->load->view('template/footer');
    }

    public function cetak_laporan_keuangan()
    {
        $data['keuangan'] = $this->ModelKeuangan->getKeuangan()->result_array();
        $data['permintaan'] = $this->ModelPermintaan->getPermintaan()->result_array();
        $data['lokasih'] = $this->ModelLokasih->getLokasih()->result_array();
        $data['pelanggan'] = $this->ModelPelanggan->getPelanggan()->result_array();

        $this->load->view('keuangan/laporan_print_keuangan', $data);
    }

    public function laporan_keuangan_pdf()
    {
        {
            $this->load->library('dompdf_gen');

            $data['keuangan'] = $this->ModelKeuangan->getKeuangan()->result_array();
            $data['permintaan'] = $this->ModelPermintaan->getPermintaan()->result_array();
            $data['lokasih'] = $this->ModelLokasih->getLokasih()->result_array();
            $data['pelanggan'] = $this->ModelPelanggan->getPelanggan()->result_array();

            $this->load->view('keuangan/laporan_pdf_keuangan', $data);

            $paper_size = 'A4'; //ukuran kertas
            $orientation = 'landscape'; //tipe format kertas potrait atau landscape
            $html = $this->output->get_output();

            $this->dompdf->load_html($html);
            $this->dompdf->render();
            $this->dompdf->stream("laporan_data_keuangan.pdf", array('attaachment => 0'));
            // nama file pdf yang di hasilkan
            
        }
    }


    public function export_excel_keuangan()
    {
        $data = array('title' => 'Laporan Pembayaran Minyak Jelantah',
        'keuangan' => $this->ModelKeuangan->getKeuangan()->result_array());
        $this->load->view('keuangan/export_excel_keuangan', $data);
    }






    // public function laporan_anggota()
    // {
    //     $data['judul'] = 'Laporan Data Anggota';
    //     $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
    //     $data['anggota'] = $this->db->get('user')->result_array();
    //     $this->db->where('role_id',2);
        
        
    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar');
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('member/laporan-anggota', $data);
    //     $this->load->view('templates/footer');
    // }
    // public function laporan_print_anggota()
    // {
    //     $data['anggota'] = $this->db->get('user')->result_array();


    //     $this->load->view('member/laporan_print_anggota', $data);
    // }

    // public function laporan_anggota_pdf()
    // {
    //     {
    //         $this->load->library('dompdf_gen');
            
    //         $data['anggota'] = $this->db->get('user')->result_array();

    //         $this->load->view('member/laporan-pdf-anggota', $data);
            
    //         $paper_size = 'A4'; // ukuran kertas
    //         $orientation = 'landscape'; //tipe format kertas potrait atau landscape
    //         $html = $this->output->get_output();
            
    //         $this->dompdf->set_paper($paper_size, $orientation);
    //         //Convert to PDF
    //         $this->dompdf->load_html($html);
    //         $this->dompdf->render();
    //         $this->dompdf->stream("laporan data anggota.pdf", array('Attachment' => 0));
    //         // nama file pdf yang di hasilkan
    //     }
    //  }

    // public function export_excel_anggota()
    // {
    //     $data = array('title' => 'Laporan Anggota',
    //     'anggota' => $this->ModelUser->getUser()->result_array());
    //     // $data['anggota'] = $this->db->get('user')->result_array();
    //     $this->load->view('member/export_excel_anggota', $data);
    // }






    // public function laporan_pinjam()
    // {
    //     $data['judul'] = 'Laporan Data Peminjaman';
    //     $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
    //     $data['laporan'] = $this->db->query("select * from pinjam p,detail_pinjam d,buku b,user u where d.id_buku=b.id and p.id_user=u.id and p.no_pinjam=d.no_pinjam")->result_array();
    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar');
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('pinjam/laporan-pinjam', $data);
    //     $this->load->view('templates/footer');
    // }
    // public function cetak_laporan_pinjam()
    // {
    //     $data['laporan'] = $this->db->query("select * from pinjam p,detail_pinjam d,buku b,user u where d.id_buku=b.id and p.id_user=u.id and p.no_pinjam=d.no_pinjam")->result_array();
    //     $this->load->view('pinjam/laporan-print-pinjam', $data);
    // }

    // public function laporan_pinjam_pdf()
    // {
    //     {
    //     $this->load->library('dompdf_gen');
        
    //     $data['laporan'] = $this->db->query("select * from pinjam p,detail_pinjam d,buku b,user u where d.id_buku=b.id and p.id_user=u.id and p.no_pinjam=d.no_pinjam")->result_array();
    //     $this->load->view('pinjam/laporan-pdf-pinjam', $data);
        
    //     $paper_size = 'A4'; // ukuran kertas
    //     $orientation = 'landscape'; //tipe format kertas potrait atau landscape
    //     $html = $this->output->get_output();
        
    //     $this->dompdf->set_paper($paper_size, $orientation);
    //     //Convert to PDF
    //     $this->dompdf->load_html($html);
    //     $this->dompdf->render();
    //     $this->dompdf->stream("laporan data peminjaman.pdf", array('Attachment' => 0));
    //     // nama file pdf yang di hasilkan
    //     }
    //  }

    // public function export_excel_pinjam()
    //     {
    //         $data = array( 'title' => 'Laporan Data Peminjaman Buku','laporan' => $this->db->query("select * from pinjam p,detail_pinjam d,buku b,user u where d.id_buku=b.id and p.id_user=u.id and p.no_pinjam=d.no_pinjam")->result_array());
    //         $this->load->view('pinjam/export-excel-pinjam', $data);
    //     }


}