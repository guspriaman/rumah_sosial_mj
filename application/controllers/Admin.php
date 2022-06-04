<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {


	public function __construct()
    {
        parent::__construct();
		if(!$this->session->userdata('email')) {
			redirect('auth');
		}
        // cek_login();
        // cek_user();

    }


	public function index()
	{

		// $data['user'] =$this->db->get_where('user',['email' =>
		// $this->session->userdata('email')])->row_array();
		
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'dashboard';
		$data['page_title'] = 'Admin';
		$this->load->view('admin/index', $data);
	}
}
 