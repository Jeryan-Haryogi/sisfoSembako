<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	 function __construct(){
		parent:: __construct();
		$this->load->library('form_validation');
		$this->load->model('Admin_model');
		$this->load->library('form_validation');

	}
	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		if ($this->form_validation->run() == TRUE) {
			$data = [
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		];
		$username = $this->input->post('username');
		$cek_admin = $this->db->get_where('admin', $data)->num_rows();
		$cek_petugas = $this->db->get_where('petugas', $data)->num_rows();
		$cek_kasir = $this->db->get_where('kasir', $data)->num_rows();
		if ($cek_admin > 0) {
			$sesion_admin = [
				'nama' => $username,
				'status' => TRUE, 
				'role' => 'admin'
			];
			$this->session->set_userdata($sesion_admin);
			redirect('admin');
		}elseif ($cek_petugas > 0) {
			$sesion_admin = [
				'nama' => $username,
				'status' => TRUE,
				'role' => 'petugas'
			];
			$this->session->set_userdata($sesion_admin);
			redirect('petugas');
		}elseif ($cek_kasir > 0 ) {
			$sesion_kasir = [
				'nama' => $username,
				'status' => TRUE,
				'role' => 'kasir'
			];
			$this->session->set_userdata($sesion_kasir);
			redirect('kasir');
		}
		else {
			$this->session->set_flashdata('flash', 'Username / password Salah');
			redirect('login');
		}
		}else {
			$data['title'] = 'Halaman Login';

		$data['csrf'] = array(
			        'name' => $this->security->get_csrf_token_name(),
			        'hash' => $this->security->get_csrf_hash()
				);
		$this->load->view('login', $data);
		}
		
		}
			
}
