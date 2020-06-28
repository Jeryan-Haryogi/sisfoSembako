<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {


	 function __construct(){
		parent:: __construct();
		if ($this->session->userdata('status') == FALSE) {
			redirect('login');
		}elseif ($this->session->userdata('role') == 'petugas') {
			redirect('petugas');	
		}elseif ($this->session->userdata('role') == 'kasir') {
			redirect('kasir');
		}
		$this->load->library('form_validation');
		$this->load->model('Admin_model');
		$this->load->library('form_validation');

	}
	public function index()
	{	
		
		
		$data['title'] = 'Dahsboard';

		$this->load->view('admin/thamplate/header');
		$this->load->view('admin/thamplate/sidebar');
		$this->load->view('admin/thamplate/navbar', $data);
		$this->load->view('admin/Index');
		$this->load->view('admin/thamplate/footer');
	}
	Public function data_admin()
	{
		$data['title'] = 'Data Admin';
		$data['database'] = $this->Admin_model->select_admin();
		$this->load->view('admin/thamplate/header');
		$this->load->view('admin/thamplate/sidebar');
		$this->load->view('admin/thamplate/navbar', $data);
		$this->load->view('admin/tables/data_admin.php', $data);
		$this->load->view('admin/thamplate/footer');
	}
	public function data_petugas()
	{
		$data['title'] = 'Data Petugas';
		$data['database'] = $this->Admin_model->select_petugas();
		$this->load->view('admin/thamplate/header');
		$this->load->view('admin/thamplate/sidebar');
		$this->load->view('admin/thamplate/navbar', $data);
		$this->load->view('admin/tables/data_petugas.php', $data);
		$this->load->view('admin/thamplate/footer');	
	}
	Public function data_kasir()
	{
		$data['title'] = 'Data Kasir';
		$data['kasir'] = $this->Admin_model->select_kasir();
		$this->load->view('admin/thamplate/header');
		$this->load->view('admin/thamplate/sidebar');
		$this->load->view('admin/thamplate/navbar', $data);
		$this->load->view('admin/tables/data_kasir.php', $data);
		$this->load->view('admin/thamplate/footer');
	}
	public function data_barang()
	{
		$data['title'] = 'Data Barang';
		$data['count'] = $this->Admin_model->count_barang();
		$data['count2'] = $this->db->query('SELECT SUM(harga) FROM barang_masuk ')->result_array();
		$data['barang'] = $this->Admin_model->select_barang();
		$data['count_stok'] = $this->db->query("SELECT SUM(stok_terjual) FROM tbl_pesanan")->result_array();
		$data['count_stok2'] = $this->db->query("SELECT SUM(stok_terjual) FROM barang_keluar")->result_array();
		$data['count_harga'] = $this->db->query("SELECT SUM(harga_terjual) FROM tbl_pesanan")->result_array();
		$data['count_harga2'] = $this->db->query("SELECT SUM(harga_terjual) FROM barang_keluar")->result_array();
		$data['jmlhbrang'] = $this->db->query('SELECT COUNT(id_barang) FROM barang_keluar')->result_array();
		$data['jmlhbrangmsk'] = $this->db->query('SELECT COUNT(id_barang) FROM barang_masuk')->result_array();
		$data['barang_keluar'] = $this->Admin_model->select_barang_keluar();
		$this->load->view('admin/thamplate/header');
		$this->load->view('admin/thamplate/sidebar');
		$this->load->view('admin/thamplate/navbar', $data);
		$this->load->view('admin/tables/data_barang.php', $data);
		$this->load->view('admin/thamplate/footer');	
	}
	Public function update_barang($id)
	{				
		
			$this->form_validation->set_rules('stok_barang', 'Stok Barang', 'required');
    		$this->form_validation->set_rules('harga', 'Harga Barang', 'required');
		if ($this->form_validation->run() == TRUE) {
			$this->Admin_model->update_barang2($id);
			$this->session->set_flashdata('flash', 'Data Berhasil Di Ubah');
			redirect('admin/data_barang');
		}else {
			$data['csrf'] = array(
			        'name' => $this->security->get_csrf_token_name(),
			        'hash' => $this->security->get_csrf_hash()
						);
					$data['data'] = $this->db->get('barang')->result_array();
					$data['title'] = 'Input Petugas';
					$data['brng_masuk'] = $this->Admin_model->detail_barang_masuk($id);
								$this->load->view('admin/thamplate/header');
					$this->load->view('admin/thamplate/sidebar');
					$this->load->view('admin/thamplate/navbar', $data);
					$this->load->view('admin/input/update_barang', $data);
					$this->load->view('admin/thamplate/footer');
		}
					
	}
	function hapus_barang($id)
	{
		$this->Admin_model->hapus_barang($id);
		$this->session->set_flashdata('flash', 'Data Berhasil Dihapus');
		redirect('admin/data_barang');
	}
	Public function profile()
	{
		 $this->form_validation->set_rules('Passowrd', 'Password Lama', 'required|exact_length[8]');
    	$this->form_validation->set_rules('Passwordbaru', 'Password Baru', 'required|exact_length[8]');
    	$this->form_validation->set_rules('Passwordbaru2', 'Komfirmasi Password Baru', 'required|exact_length[8]|matches[Passwordbaru]');

		if ($this->form_validation->run() == TRUE)
            {
            	$this->Admin_model->profile();
                redirect('admin/profile');
             }
              else {

                	
					$data['csrf'] = array(
			        'name' => $this->security->get_csrf_token_name(),
			        'hash' => $this->security->get_csrf_hash()
				);
                	$data['title'] = 'Profile';
					$this->load->view('admin/thamplate/header');
					$this->load->view('admin/thamplate/sidebar');
					$this->load->view('admin/thamplate/navbar', $data);
					$this->load->view('admin/pages/profile.php');
					$this->load->view('admin/thamplate/footer');	
                }
			
			
	}
	Public function hapus_pesanan($id)
	{
		$this->db->delete('tbl_pesanan', ['id' => $id]);
		$this->session->set_flashdata('flash', 'Data Berhasil Dihapus');
		redirect('admin/data_barang');
	}
	Public function input_admin() 
	{

		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
    	$this->form_validation->set_rules('username', 'Username', 'required');
    	$this->form_validation->set_rules('password', 'Password', 'required|exact_length[8]');
    	$this->form_validation->set_rules('password2', 'Komfirmasi Password', 'required|matches[password]');

		  if ($this->form_validation->run() == TRUE)
                {
                	$this->Admin_model->input_admin();
                	// $data['title'] = 'Dahsboard';
                	$this->session->set_flashdata('flash', 'Data Berhasil Ditambah');
                	redirect('admin/data_admin');
                }
                else
                {
                		$data['csrf'] = array(
			        'name' => $this->security->get_csrf_token_name(),
			        'hash' => $this->security->get_csrf_hash()
				);
					$data['title'] = 'Input Admin';
					$this->load->view('admin/thamplate/header');
					$this->load->view('admin/thamplate/sidebar');
					$this->load->view('admin/thamplate/navbar', $data);
					$this->load->view('admin/input/admin', $data);
					$this->load->view('admin/thamplate/footer');
                }
	
	}
	Public function input_kasir()
	{		


		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
    	$this->form_validation->set_rules('username', 'Username', 'required');
    	$this->form_validation->set_rules('kode_kasir', 'Kode Kasir', 'required');
    	$this->form_validation->set_rules('password', 'Password', 'required|exact_length[8]');
    	$this->form_validation->set_rules('password2', 'Komfirmasi Password', 'required|matches[password]');

					if ($this->form_validation->run() == TRUE) {
						$this->Admin_model->input_kasir();
						$this->session->set_flashdata('flash', 'Data Berhasil Ditambah');
						redirect('admin/input_kasir');
					}else {
						$data['title'] = 'Input Kasir';
					$data['csrf'] = array(
			        'name' => $this->security->get_csrf_token_name(),
			        'hash' => $this->security->get_csrf_hash()
				);
					function acak($panjang)
						{
						    $karakter= '123456789389472834729347293234293472323847293742323426234623482342863428364';
						    $string = '';
						    for ($i = 0; $i < $panjang; $i++) {
						  $pos = rand(0, strlen($karakter)-1);
						  $string .= $karakter{$pos};
						    }
						    return $string;
						}
						//cara memanggilnya
						$data['kode'] = acak(5);
					$this->load->view('admin/thamplate/header');
					$this->load->view('admin/thamplate/sidebar');
					$this->load->view('admin/thamplate/navbar', $data);
					$this->load->view('admin/input/kasir', $data);
					$this->load->view('admin/thamplate/footer');
					}
					
	}
	Public function input_petugas()
	{					$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
    	$this->form_validation->set_rules('username', 'Username', 'required');
    	$this->form_validation->set_rules('kode_petugas', 'Kode Kasir', 'required');
    	$this->form_validation->set_rules('password', 'Password', 'required|exact_length[8]');
    	$this->form_validation->set_rules('password2', 'Komfirmasi Password', 'required|matches[password]');

						if ($this->form_validation->run() == TRUE) {
							$this->Admin_model->input_petugas();
							$this->session->set_flashdata('flash', 'Data Berhasil Ditambah');
							redirect('admin/input_petugas');
						}else {
							$data['csrf'] = array(
			        'name' => $this->security->get_csrf_token_name(),
			        'hash' => $this->security->get_csrf_hash()
						);
					$data['title'] = 'Input Petugas';
					function acak($panjang)
						{
						    $karakter= '123456789389472834729347293234293472323847293742323426234623482342863428364';
						    $string = '';
						    for ($i = 0; $i < $panjang; $i++) {
						  $pos = rand(0, strlen($karakter)-1);
						  $string .= $karakter{$pos};
						    }
						    return $string;
						}
						//cara memanggilnya
						$data['kode'] = acak(5);
					$this->load->view('admin/thamplate/header');
					$this->load->view('admin/thamplate/sidebar');
					$this->load->view('admin/thamplate/navbar', $data);
					$this->load->view('admin/input/petugas', $data);
					$this->load->view('admin/thamplate/footer');
						}
	}
	public function input_barang()
	{
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
    	$this->form_validation->set_rules('kode_brang', 'Kode Barang', 'required');
		if ($this->form_validation->run() == TRUE) {
			$this->Admin_model->input_barang();
			$this->session->set_flashdata('flash', 'Data Berhasil Ditambah');
			redirect('admin/input_barang');
		}else {
			$data['csrf'] = array(
			        'name' => $this->security->get_csrf_token_name(),
			        'hash' => $this->security->get_csrf_hash()
						);
					$data['title'] = 'Input Petugas';
					function acak($panjang)
						{
						    $karakter= '123456789389472834729347293234293472323847293742323426234623482342863428364';
						    $string = '';
						    for ($i = 0; $i < $panjang; $i++) {
						  $pos = rand(0, strlen($karakter)-1);
						  $string .= $karakter{$pos};
						    }
						    return $string;
						}
						//cara memanggilnya
						$data['kode'] = acak(5);
					$this->load->view('admin/thamplate/header');
					$this->load->view('admin/thamplate/sidebar');
					$this->load->view('admin/thamplate/navbar', $data);
					$this->load->view('admin/input/barang', $data);
					$this->load->view('admin/thamplate/footer');
		}
		
	}
	public function barang_masuk()
	{
		$this->form_validation->set_rules('stok_barang', 'Stok Barang', 'required');
    	$this->form_validation->set_rules('harga', 'Harga Barang', 'required');
		if ($this->form_validation->run() == TRUE) {
			$this->Admin_model->barang_masuk();
			$this->session->set_flashdata('flash', 'Data Berhasil Ditambah');
			redirect('admin/barang_masuk');
		}else {
			$data['csrf'] = array(
			        'name' => $this->security->get_csrf_token_name(),
			        'hash' => $this->security->get_csrf_hash()
						);
					$data['data'] = $this->db->get('barang')->result_array();
					$data['title'] = 'Input Petugas';
					function acak($panjang)
						{
						    $karakter= '123456789389472834729347293234293472323847293742323426234623482342863428364';
						    $string = '';
						    for ($i = 0; $i < $panjang; $i++) {
						  $pos = rand(0, strlen($karakter)-1);
						  $string .= $karakter{$pos};
						    }
						    return $string;
						}
						//cara memanggilnya
						$data['kode'] = acak(5);
					$this->load->view('admin/thamplate/header');
					$this->load->view('admin/thamplate/sidebar');
					$this->load->view('admin/thamplate/navbar', $data);
					$this->load->view('admin/input/barang_masuk', $data);
					$this->load->view('admin/thamplate/footer');
		}
	}
	Public function keranjang_barang($id)
	{	
		$barang = $this->db->get_where('barang_masuk', ['id_barang'=> $id])->row();
		$barang2 = $this->db->get_where('barang', ['id_barang'=> $id])->row();	
		$data = array(
        'id'      => $barang->id_barang,
        'qty'     => 1,
        'kode'    => $barang2->kode_barang,
        'stok' 		=>$barang->stok,
        'price'   => $barang->harga,
        'name'    => $barang2->nama_barang,
);


		$this->cart->insert($data);
redirect('admin/barang_keluar');

	}
	Public function pembayaran()
	{
		$this->form_validation->set_rules('nama_penerima', 'Nama Penerima', 'required');
		$this->form_validation->set_rules('harga', 'Harga Beli', 'required');
		$this->form_validation->set_rules('kode', 'Kode Barang', 'required');
		$this->form_validation->set_rules('jmlbarang', 'Harga Beli', 'required');
		if ($this->form_validation->run() == TRUE) {
			$keranjang = $this->cart->contents();
			$barang = "";
			foreach ($keranjang as $nama) {
				$data = [
					'id_barang' => $nama['id'],
					'stok_terjual' => $nama['qty'],
					'harga_terjual' => $nama['subtotal']

				];
				$this->db->insert('barang_keluar', $data);
			}
			$data = [
				'nama_penerima' => $this->input->post('nama_penerima', TRUE),
				'stok_terjual' => $this->input->post('jmlbarang', TRUE),
				'harga_terjual' => $this->input->post('harga', TRUE),
				'kode_transaksi' => $this->input->post('kode', TRUE)
			];
			$this->db->insert('tbl_pesanan', $data);
			$this->cart->destroy();
			$this->session->set_flashdata('flash', 'Pembayaran Berhasil');
			redirect('admin/barang_keluar');
		}
		$data['title'] = 'Input Kasir';
					$data['csrf'] = array(
			        'name' => $this->security->get_csrf_token_name(),
			        'hash' => $this->security->get_csrf_hash()
				);
					function acak($panjang)
						{
						    $karakter= '123456789389472834729347293234293472323847293742323426234623482342863428364';
						    $string = '';
						    for ($i = 0; $i < $panjang; $i++) {
						  $pos = rand(0, strlen($karakter)-1);
						  $string .= $karakter{$pos};
						    }
						    return $string;
						}
						//cara memanggilnya
						$data['kode'] = acak(5);
    	$data['title'] = 'Data Barang';
		$this->load->view('admin/thamplate/header');
	$this->load->view('admin/thamplate/sidebar');
	$this->load->view('admin/thamplate/navbar', $data);
	$this->load->view('admin/pages/pembayaran', $data);
	$this->load->view('admin/thamplate/footer');
	}
	Public function hapus_keranjang()
	{
		$this->cart->destroy();
		redirect('admin/barang_keluar');
	}
	Public function detail_keranjang()
	{

    	$data['title'] = 'Data Barang';
    	$data['detail_keranjang'] = $this->cart->contents();
		$this->load->view('admin/thamplate/header');
		$this->load->view('admin/thamplate/sidebar');
		$this->load->view('admin/thamplate/navbar', $data);
		$this->load->view('admin/pages/detail_keranjang.php', $data);
		$this->load->view('admin/thamplate/footer');	
	}
	public function barang_keluar()
	{

    $data['title'] = 'Data Barang';
		$data['count'] = $this->Admin_model->count_barang();
		$data['count2'] = $this->db->query('SELECT SUM(harga) FROM barang_masuk ')->result_array();
		$data['barang'] = $this->Admin_model->select_barang();
		$data['count_stok'] = $this->db->query("SELECT SUM(stok_terjual) FROM barang_keluar")->result_array();
		$data['count_harga'] = $this->db->query("SELECT SUM(harga_terjual) FROM barang_keluar")->result_array();
		$data['jmlhbrang'] = $this->db->query('SELECT COUNT(id_barang) FROM barang_keluar')->result_array();
		$data['jmlhbrangmsk'] = $this->db->query('SELECT COUNT(id_barang) FROM barang_masuk')->result_array();
		$data['barang_keluar'] = $this->Admin_model->select_barang_keluar();
		$this->load->view('admin/thamplate/header');
		$this->load->view('admin/thamplate/sidebar');
		$this->load->view('admin/thamplate/navbar', $data);
		$this->load->view('admin/input/barang_keluar.php', $data);
		$this->load->view('admin/thamplate/footer');	
		
	}
	public function update_admin($id)
	{	
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
    	$this->form_validation->set_rules('username', 'Username', 'required');
    	$this->form_validation->set_rules('password', 'Password', 'required|exact_length[8]');
    	$this->form_validation->set_rules('password2', 'Komfirmasi Password', 'required|matches[password]');
		if ($this->form_validation->run() == TRUE) {
			$this->Admin_model->update_admin($id);
			$this->session->set_flashdata('flash', 'Data Berhasil di Ubah');
			redirect('admin/data_admin');
		} else {
			$data['csrf'] = array(
			        'name' => $this->security->get_csrf_token_name(),
			        'hash' => $this->security->get_csrf_hash()
				);
			$data['admin'] = $this->Admin_model->selection_admin($id);
					$data['title'] = 'Update Data  Admin';
					$this->load->view('admin/thamplate/header');
					$this->load->view('admin/thamplate/sidebar');
					$this->load->view('admin/thamplate/navbar', $data);
					$this->load->view('admin/input/update_admin', $data);
					$this->load->view('admin/thamplate/footer');
		}
	}
	Public function data_keluar()
	{
		$this->form_validation->set_rules('stok_barang', 'Stok Barang', 'required');
		$this->form_validation->set_rules('harga', 'Harga Barang', 'required');
		if ($this->form_validation->run() == TRUE) {
			$data = [
				'id_barang' => $this->input->post('id_barang'),
				'stok_terjual' => $this->input->post('stok_barang'),
				'harga_terjual' => $this->input->post('harga')
			];
			$this->db->insert('barang_keluar', $data);
			$this->session->set_flashdata('flash', 'Data Berhasil Ditambah');
			redirect('admin/data_keluar');
		}
		$data['data'] = $this->db->get('barang')->result_array();

		$data['csrf'] = array(
			        'name' => $this->security->get_csrf_token_name(),
			        'hash' => $this->security->get_csrf_hash()
				);
					$data['title'] = 'Input Barang Keluar';
					$this->load->view('admin/thamplate/header');
					$this->load->view('admin/thamplate/sidebar');
					$this->load->view('admin/thamplate/navbar', $data);
					$this->load->view('admin/input/data_keluar', $data);
					$this->load->view('admin/thamplate/footer');
	}
	Public function hapus_admin($id)
	{
		$this->Admin_model->hapus_admin($id);
		$this->session->set_flashdata('flash', 'Data Berhasil Dihapus');
		redirect('admin/data_admin');
	}
	public function update_petugas($id)
	{				$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
    	$this->form_validation->set_rules('username', 'Username', 'required');
    	$this->form_validation->set_rules('kode_petugas', 'Kode Kasir', 'required');
    	$this->form_validation->set_rules('password', 'Password', 'required|exact_length[8]');
    	$this->form_validation->set_rules('password2', 'Komfirmasi Password', 'required|matches[password]');

					if ($this->form_validation->run() == TRUE) {
						$this->Admin_model->update_petugas($id);
						$this->session->set_flashdata('flash', 'Data Berhasil Di Ubah');
						redirect('admin/data_petugas');
					}else {
						$data['csrf'] = array(
			        'name' => $this->security->get_csrf_token_name(),
			        'hash' => $this->security->get_csrf_hash()
						);
					$data['title'] = 'Update Data Petugas';
					$data['petugas'] = $this->Admin_model->selection_petugas($id);
					$this->load->view('admin/thamplate/header');
					$this->load->view('admin/thamplate/sidebar');
					$this->load->view('admin/thamplate/navbar', $data);
					$this->load->view('admin/input/update_petugas', $data);
					$this->load->view('admin/thamplate/footer');
					}
	}
	public function hapus_petugas($id)
	{
		$this->Admin_model->hapus_petugas($id);
		$this->session->set_flashdata('flash', 'Data Berhasil Dihapus');
		redirect('admin/data_petugas');
	}
	public function update_kasir($id)
	{
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
    	$this->form_validation->set_rules('username', 'Username', 'required');
    	$this->form_validation->set_rules('kode_kasir', 'Kode Kasir', 'required');
    	$this->form_validation->set_rules('password', 'Password', 'required|exact_length[8]');
    	$this->form_validation->set_rules('password2', 'Komfirmasi Password', 'required|matches[password]');
		if ($this->form_validation->run() == TRUE) {
			$this->Admin_model->update_kasir($id);
			$this->session->set_flashdata('flash', 'Data Berhasil Ubah');
		redirect('admin/data_kasir');
		}else {
			$data['csrf'] = array(
			        'name' => $this->security->get_csrf_token_name(),
			        'hash' => $this->security->get_csrf_hash()
						);
					$data['title'] = 'Update Data Kasir';
					$data['kasir'] = $this->Admin_model->selection_kasir($id);
					$this->load->view('admin/thamplate/header');
					$this->load->view('admin/thamplate/sidebar');
					$this->load->view('admin/thamplate/navbar', $data);
					$this->load->view('admin/input/update_kasir', $data);
					$this->load->view('admin/thamplate/footer');	
		}
		
	}
	public function hapus_kasir($id)
	{
		$this->Admin_model->hapus_kasir($id);
		$this->session->set_flashdata('flash', 'Data Berhasil Dihapus');
		redirect('admin/data_kasir');
	}
	public function laporan_admin()
	{
		$data['title'] = 'Laporan Admin';
		$data['database'] = $this->Admin_model->select_admin();
		$this->load->view('admin/thamplate/header');
		$this->load->view('admin/thamplate/sidebar');
		$this->load->view('admin/thamplate/navbar', $data);
		$this->load->view('admin/pages/laporan_admin.php', $data);
		$this->load->view('admin/thamplate/footer');
	}
	public function cetak_admin()
	{		
		$database = $this->Admin_model->select_admin();
		$html = "<!DOCTYPE html>
				<html>
				<head>
					<title>
						Cetak Admin
					</title>
					<style>
				 	body{

				 	font-family: arial;	
				 	}
				 	table,th,td {
				 		 border: 1px solid black;
				 	}
				 	tr:nth-child(event){
				 		background-color: #ddd;
				 	}
				 	</style>
				</head>
				<body>";
				$html .= "<h2 ><b>SISTEM PELAYANAN SEMBAKO</b></h2>";
				$html .= "<h2  style='margin-top: -200px;'><b>Laporan Admin</b></h2>";

				$html .= "<hr>";
		$html .= "<table border'1' cellpadding='10' cellspacing='0' style='width:100%; '>";
		$html .= "<thead>
	  		<tr>
	  			<th>No</th>
	  			<th >Nama Lengkap</th>
	  			<th>Username</th>
	  			<th>level</th>
	  		</tr>
	  	</thead>";
	  	$html .= "<tbody>";
	  	$no = 1;
	  	 foreach($database as $user) {
	  	 	$html .= "<tr>";
	  	 	$html .= "<td>".$no."</td>";
	  	 	$html .= "<td>".$user['nama_lengkap']."</td>";
	  	 	$html .= "<td>".$user['username']."</td>";
	  	 	$html .= "<td>".$user['level']."</td>";
	  	 	$html .= "</tr>";
	  	 	$no++;
	  	 }
	  	$html .= "</tbody>";
	  	$html .= "</table>";
	  	$html .= "</body>";
	  	$html .= "</html>";
	  	$mpdf = new \Mpdf\Mpdf();
		$mpdf->WriteHTML($html);
		$mpdf->Output('Laporan_admin.pdf', \Mpdf\Output\Destination::DOWNLOAD);
	}
	Public function laporan_petugas()
	{
		$data['title'] = 'Laporan Petugas';
		$data['database'] = $this->Admin_model->select_petugas();
		$this->load->view('admin/thamplate/header');
		$this->load->view('admin/thamplate/sidebar');
		$this->load->view('admin/thamplate/navbar', $data);
		$this->load->view('admin/pages/laporan_petugas.php', $data);
		$this->load->view('admin/thamplate/footer');	
	}
	public function cetak_petugas()
	{
		$database = $this->Admin_model->select_petugas();
		$html = "<!DOCTYPE html>
				<html>
				<head>
					<title>
						Cetak Petugas
					</title>
					<style>
				 	body{

				 	font-family: arial;	
				 	}
				 	table,th,td {
				 		 border: 1px solid black;
				 	}
				 	tr:nth-child(event){
				 		background-color: #ddd;
				 	}
				 	</style>
				</head>
				<body>";
				$html .= "<h2 ><b>SISTEM PELAYANAN SEMBAKO</b></h2>";
				$html .= "<h2  style='margin-top: -200px;'><b>Laporan Petugas</b></h2>";

				$html .= "<hr>";
		$html .= "<table border'1' cellpadding='10' cellspacing='0' style='width:100%; '>";
		$html .= "<thead>
	  		<tr>
	  		<th>No</th>
             <th>Nama Lengkap</th>
             <th>Username</th>
              <th>Level</th>
             <th>Kode Petugas</th>
	  		</tr>
	  	</thead>";
	  	$html .= "<tbody>";
	  	$no = 1;
	  	 foreach($database as $user) {
	  	 	$html .= "<tr>";
	  	 	$html .= "<td>".$no."</td>";
	  	 	$html .= "<td>".$user['nama_lengkap']."</td>";
	  	 	$html .= "<td>".$user['username']."</td>";
	  	 	$html .= "<td>".$user['level']."</td>";
	  	 	$html .= "<td>".$user['kode_petugas']."</td>";
	  	 	$html .= "</tr>";
	  	 	$no++;
	  	 }
	  	$html .= "</tbody>";
	  	$html .= "</table>";
	  	$html .= "</body>";
	  	$html .= "</html>";
	  	$mpdf = new \Mpdf\Mpdf();
		$mpdf->WriteHTML($html);
		$mpdf->Output('Laporan_petugas.pdf', \Mpdf\Output\Destination::DOWNLOAD);
	}
	public function laporan_kasir()
	{
		$data['title'] = 'Laporan Kasir';
		$data['kasir'] = $this->Admin_model->select_kasir();
		$this->load->view('admin/thamplate/header');
		$this->load->view('admin/thamplate/sidebar');
		$this->load->view('admin/thamplate/navbar', $data);
		$this->load->view('admin/pages/laporan_kasir.php', $data);
		$this->load->view('admin/thamplate/footer');
	}
	public function cetak_kasir()
	{
		$database = $this->Admin_model->select_kasir();
		$html = "<!DOCTYPE html>
				<html>
				<head>
					<title>
						Cetak Petugas
					</title>
					<style>
				 	body{

				 	font-family: arial;	
				 	}
				 	table,th,td {
				 		 border: 1px solid black;
				 	}
				 	tr:nth-child(event){
				 		background-color: #ddd;
				 	}
				 	</style>
				</head>
				<body>";
				$html .= "<h2 ><b>SISTEM PELAYANAN SEMBAKO</b></h2>";
				$html .= "<h2  style='margin-top: -200px;'><b>Laporan Kasir</b></h2>";

				$html .= "<hr>";
		$html .= "<table border'1' cellpadding='10' cellspacing='0' style='width:100%; '>";
		$html .= "<thead>
	  		<tr>
	  		<th>No</th>
             <th>Nama Lengkap</th>
             <th>Username</th>
              <th>Level</th>
             <th>Kode Petugas</th>
	  		</tr>
	  	</thead>";
	  	$html .= "<tbody>";
	  	$no = 1;
	  	 foreach($database as $user) {
	  	 	$html .= "<tr>";
	  	 	$html .= "<td>".$no."</td>";
	  	 	$html .= "<td>".$user['nama_lengkap']."</td>";
	  	 	$html .= "<td>".$user['username']."</td>";
	  	 	$html .= "<td>".$user['level']."</td>";
	  	 	$html .= "<td>".$user['kd_kasir']."</td>";
	  	 	$html .= "</tr>";
	  	 	$no++;
	  	 }
	  	$html .= "</tbody>";
	  	$html .= "</table>";
	  	$html .= "</body>";
	  	$html .= "</html>";
	  	$mpdf = new \Mpdf\Mpdf();
		$mpdf->WriteHTML($html);
		$mpdf->Output('Laporan_kasir.pdf', \Mpdf\Output\Destination::DOWNLOAD);
	}
	public function laporan_barang()
	{
		$data['title'] = 'Data Barang';
		$data['count'] = $this->Admin_model->count_barang();
		$data['count2'] = $this->db->query('SELECT SUM(harga) FROM barang_masuk ')->result_array();
		$data['barang'] = $this->Admin_model->select_barang();
		$data['barang_masuk'] = $this->db->query('SELECT COUNT(id_barang) FROM barang_keluar')->result_array();
		$data['count_stok'] = $this->db->query("SELECT SUM(stok_terjual) FROM barang_keluar")->result_array();
		$data['count_stok2'] = $this->db->query("SELECT SUM(stok_terjual) FROM tbl_pesanan")->result_array();
		$data['count_harga'] = $this->db->query("SELECT SUM(harga_terjual) FROM barang_keluar")->result_array();
		$data['count_harga2'] = $this->db->query("SELECT SUM(harga_terjual) FROM tbl_pesanan")->result_array();
		$data['jmlhbarang']  = $this->db->query('SELECT COUNT(id_barang) FROM barang_keluar')->result_array();
		$data['barang_keluar'] = $this->Admin_model->select_barang_keluar();
		$this->load->view('admin/thamplate/header');
		$this->load->view('admin/thamplate/sidebar');
		$this->load->view('admin/thamplate/navbar', $data);
		$this->load->view('admin/pages/laporan_barang.php', $data);
		$this->load->view('admin/thamplate/footer');	
	}
	Public function update_barang_keluar($id)
	{					
						$this->form_validation->set_rules('stok', 'Stok Barang', 'required');
				    	$this->form_validation->set_rules('harga', 'Harga Barang', 'required');
				    	if ($this->form_validation->run() == TRUE) {
				    		$data = [ 
				    			'stok_terjual' => $this->input->post('stok', TRUE),
				    			'harga_terjual' => $this->input->post('harga', TRUE)
				    		];
				    		$this->db->set($data);
				    		$this->db->where('id_barang_keluar', $id);
				    		$this->db->update('barang_keluar');
				    		$this->session->set_flashdata('flash', 'Data Berhasil Diubah');
				    		redirect('admin/data_barang');
				    	}
					$data['csrf'] = array(
			        'name' => $this->security->get_csrf_token_name(),
			        'hash' => $this->security->get_csrf_hash()
						);
					$data['detil'] = $this->db->get_where('barang_keluar', ['id_barang_keluar' => $id])->result_array();
					$data['title'] = 'Update Barang Keluar';
					$data['data'] = $this->db->get('barang')->result_array();
					$this->load->view('admin/thamplate/header');
					$this->load->view('admin/thamplate/sidebar');
					$this->load->view('admin/thamplate/navbar', $data);
					$this->load->view('admin/input/update_barang_keluar', $data);
					$this->load->view('admin/thamplate/footer');
	}
	public function update_pesanan($id)
	{

		$this->form_validation->set_rules('nama_penerima', 'Nama Penerima', 'required');
		$this->form_validation->set_rules('kode', 'Kode Transaksi', 'required');
		$this->form_validation->set_rules('stok', 'Stok Beli', 'required');
		$this->form_validation->set_rules('harga', 'Harga Beli', 'required');
		if ($this->form_validation->run() == TRUE) {
			$data = [
				'nama_penerima' => $this->input->post('nama_penerima', TRUE),
				'kode_transaksi' =>  $this->input->post('kode', TRUE),
				'stok_terjual' =>  $this->input->post('stok', TRUE),
				'harga_terjual' =>  $this->input->post('harga', TRUE)
			];
			$this->db->set($data);
			$this->db->where('id', $id);
			$this->db->update('tbl_pesanan');
			$this->session->set_flashdata('flash', 'Data Berhasil Diubah');
			redirect('admin/data_barang');
		}
			$data['csrf'] = array(
			        'name' => $this->security->get_csrf_token_name(),
			        'hash' => $this->security->get_csrf_hash()
						);
					$data['detil'] = $this->db->get_where('tbl_pesanan', ['id' => $id])->result_array();
					$data['title'] = 'Update Barang Keluar';
					$data['data'] = $this->db->get('barang')->result_array();
					$this->load->view('admin/thamplate/header');
					$this->load->view('admin/thamplate/sidebar');
					$this->load->view('admin/thamplate/navbar', $data);
					$this->load->view('admin/input/update_pesanan', $data);
					$this->load->view('admin/thamplate/footer');
	}

	Public function hapus_barang_keluar($id)
	{
		$this->db->delete('barang_keluar', ['id_barang_keluar'=> $id]);
		$this->session->set_flashdata('flash', 'Data Berhasil Dihapus');
		redirect('admin/data_barang');
	}
	Public function cetak_barang()
	{

		$database = $this->Admin_model->select_barang();
		$count = $this->Admin_model->count_barang();
		$count2 = $this->db->query('SELECT SUM(harga) FROM barang_masuk ')->result_array();
		$barang = $this->Admin_model->select_barang();
		$count_stok = $this->db->query("SELECT SUM(stok_terjual) FROM barang_keluar")->result_array();
		$count_harga = $this->db->query("SELECT SUM(harga_terjual) FROM barang_keluar")->result_array();
		$barang_keluar = $this->Admin_model->select_barang_keluar();
		$jmlhbrangkeluar = $this->db->query('SELECT COUNT(id_barang) FROM barang_keluar')->result_array();
		$jmlhbrangmsk =  $this->db->query('SELECT COUNT(id_barang) FROM barang_masuk')->result_array();
		$tbl_pesanan = $this->db->get('tbl_pesanan')->result_array();
		$html = "<!DOCTYPE html>
				<html>
				<head>
					<title>
						Cetak Petugas
					</title>
					<style>
				 	body{

				 	font-family: arial;	
				 	}
				 	table,th,td {
				 		 border: 1px solid black;
				 	}
				 	tr:nth-child(event){
				 		background-color: #ddd;
				 	}
				 	</style>
				</head>
				<body>";
				$html .= "<h2 ><b>SISTEM PELAYANAN SEMBAKO</b></h2>";
				$html .= "<h2  style='margin-top: -200px;'><b>Laporan Barang</b></h2>";

				$html .= "<hr>";

	  	$html .= "<h2>DAFTAR BARANG MASUK </h2>";
		$html .= "<table border'1' cellpadding='10' cellspacing='0' style='width:100%; '>";
		$html .= "<thead>
	  		<tr>
	  		<th>No</th>
            <th>Nama Barang</th>
             <th>Kode Barang</th>
             <th>Stok</th>
             <th>Harga Barang Masuk</th>
	  		</tr>
	  	</thead>";
	  	$html .= "<tfoot>";
	  	$html .= "<tr>";	  	
		$html .= "
			<th></th>
			<th> Jumlah Barang Masuk : ".$jmlhbrangmsk[0]['COUNT(id_barang)']."</th>";
		$html .= "<th></th>
			<td ><b>Jumlah Stok : ".$count[0]['SUM(stok)']."</b></td>";
            $html .=   "<td ><b>Harga Masuk : Rp. ".number_format($count2[0]['SUM(harga)'],0,',','.')."</b></td>";
		$html .= "</tr>";	  
		$html .= "</tfoot>";	  	
			
	  	$html .= "<tbody>";
	  	$no = 1;
	  	 foreach($database as $user) {
	  	 	$html .= "<tr>";
	  	 	$html .= "<td>".$no."</td>";
	  	 	$html .= "<td>".$user['nama_barang']."</td>";
	  	 	$html .= "<td>".$user['kode_barang']."</td>";
	  	 	$html .= "<td>".$user['stok']."</td>";
	  	 	$html .= "<td> Rp.".number_format($user['harga'],0,',','.')."</td>";


	  	 	$html .= "</tr>";
	  	 	$no++;
	  	 }
	  	$html .= "</tbody>";
	  	$html .= "</table>";
	  	$html .= "<h2>DAFTAR BARANG KELUAR</h2>";
	  	$html .= "<table border'1' cellpadding='10' cellspacing='0' style='width:100%; '>";
		$html .= "<thead>
	  		<tr>
	  		<th>No</th>
            <th>Nama Barang</th>
             <th>Kode Barang</th>
             <th>Stok Keluar</th>
             <th>Harga Barang Keluar</th>
	  		</tr>
	  	</thead>";
	  	$html .= "<tfoot>";
	  	$html .= "<tr>";	  	
		$html .= "
			<th></th>";
		$html .=  "<td ><b>Jumlah Barang Keluar : ".$jmlhbrangkeluar[0]['COUNT(id_barang)']."</b></td>";
          $html .=   "<th><td ><b>Jumlah Stok Keluar : ".$count_stok[0]['SUM(stok_terjual)']."</b></td>";
            $html .=   "<td ><b>Harga Keluar : Rp. ".number_format($count_harga[0]['SUM(harga_terjual)'],0,',','.')."</b></td>";
		$html .= "</tr>";	  
		$html .= "</tfoot>";	  	
			
	  	$html .= "<tbody>";
	  	$no = 1;
	  	 foreach($barang_keluar as $user2) {
	  	 	$html .= "<tr>";
	  	 	$html .= "<td>".$no."</td>";
	  	 	$html .= "<td>".$user2['nama_barang']."</td>";
	  	 	$html .= "<td>".$user2['kode_barang']."</td>";
	  	 	$html .= "<td>".$user2['stok_terjual']."</td>";
	  	 	$html .= "<td> Rp.".number_format($user2['harga_terjual'],0,',','.')."</td>";


	  	 	$html .= "</tr>";
	  	 	$no++;
	  	 }
	  	$html .= "</tbody>";
	  	$html .= "</table>";

	  	$html .= "<h2>DAFTAR PESANAN</h2>";
	  	$html .= "<table border'1' cellpadding='10' cellspacing='0' style='width:100%; '>";
		$html .= "<thead>
	  		<tr>
	  		<th>No</th>
            <th>Nama Barang</th>
             <th>Kode Transaksi</th>
             <th>Stok Keluar</th>
             <th>Harga Barang Keluar</th>
	  		</tr>
	  	</thead>";
	  	$html .= "<tfoot>";
	  	$html .= "<tr>";	  	
		$html .= "
			<th></th>";
		$html .=  "<td ><b>Jumlah Barang Keluar : ".$jmlhbrangkeluar[0]['COUNT(id_barang)']."</b></td>";
          $html .=   "<th><td ><b>Jumlah Stok Keluar : ".$count_stok[0]['SUM(stok_terjual)']."</b></td>";
            $html .=   "<td ><b>Harga Keluar : Rp. ".number_format($count_harga[0]['SUM(harga_terjual)'],0,',','.')."</b></td>";
		$html .= "</tr>";	  
		$html .= "</tfoot>";	  	
			
	  	$html .= "<tbody>";
	  	$no = 1;
	  	 foreach($tbl_pesanan as $asa) {
	  	 	$html .= "<tr>";
	  	 	$html .= "<td>".$no."</td>";
	  	 	$html .= "<td>".$asa['nama_penerima']."</td>";
	  	 	$html .= "<td>".$asa['kode_transaksi']."</td>";
	  	 	$html .= "<td>".$asa['stok_terjual']."</td>";
	  	 	$html .= "<td> Rp.".number_format($asa['harga_terjual'],0,',','.')."</td>";


	  	 	$html .= "</tr>";
	  	 	$no++;
	  	 }
	  	$html .= "</tbody>";
	  	$html .= "</table>";

	  	$html .= "<h2>TOTAL SELISIH BARANG</h2>";
	  	$html .= "<table border'1' cellpadding='10' cellspacing='0' style='width:100%;'  style='margin-top: 20px'>";
		$html .= "<thead>
	  		<tr>
	  		<th>No</th>
            <th>Stok Barang Masuk</th>
             <th>Stok Barang Keluar</th>
             <th>Harga Barang Masuk</th>
             <th>Harga Barang Keluar</th>
	  		</tr>
	  	</thead>";
	  	$html .= "<tfoot>";
	  	$html .= "<tr>";	  	
	  	$jm = $count[0]['SUM(stok)'] - $count_stok[0]['SUM(stok_terjual)'];
	  	$sf = $count2[0]['SUM(harga)'] - $count_harga[0]['SUM(harga_terjual)'];
		$html .= "
			<th></th>

            <td colspan='2'><b>Selisih Stok : ".$jm."</b></td>";
            $html .=   "<td colspan='2'><b>Selisih Harga : Rp. ".number_format($sf,0,',','.')."</b></td>";
		$html .= "</tr>";	  
		$html .= "</tfoot>";	  	
			
	  	$html .= "<tbody>";
	  	$no = 1;
	  	 	$html .= "<tr>";
	  	 	$html .= "<td>".$no."</td>";
	  	 	$html .= "<td>".$count[0]['SUM(stok)']."</td>";
	  	 	$html .= "<td>".$count_stok[0]['SUM(stok_terjual)']."</td>";
	  	 	$html .= "<td> Rp.".number_format($count2[0]['SUM(harga)'],0,',','.')."</td>";
	  	 	$html .= "<td> Rp.".number_format($count_harga[0]['SUM(harga_terjual)'],0,',','.')."</td>";


	  	 	$html .= "</tr>";
	  	
	  	$html .= "</tbody>";
	  	$html .= "</table>";
	  	$html .= "</body>";
	  	$html .= "</html>";
	  	$mpdf = new \Mpdf\Mpdf();
		$mpdf->WriteHTML($html);
		$mpdf->Output('laporan_barang.pdf', \Mpdf\Output\Destination::DOWNLOAD);
	}
	Public function  logout()
	{

		$this->session->sess_destroy();
		redirect('login');
	}
}
