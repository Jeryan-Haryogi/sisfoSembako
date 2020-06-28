<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {

	
	 function __construct(){
		parent:: __construct();
		if ($this->session->userdata('status') == FALSE) {
			redirect('login');
		}elseif ($this->session->userdata('role')) {
			if ($this->session->userdata('role') == 'admin') {
				redirect('admin');
			}elseif ($this->session->userdata('role') == 'kasir') {
				redirect('kasir');
			}

		}
		$this->load->library('form_validation');
		$this->load->model('Petugas_model');
		$this->load->library('form_validation');

	}
	public function index()
	{
		$data['title'] = 'Halaman Dashboard';
		$this->load->view('petugas/layout/header', $data);
		$this->load->view('petugas/layout/nav');
		$this->load->view('petugas/layout/sidebar');
		$this->load->view('petugas/index');
		$this->load->view('petugas/layout/setting');
		$this->load->view('petugas/layout/footer');
	}
	public function barang()
	{
		$data['count'] = $this->db->query('SELECT SUM(stok) FROM barang_masuk ')->result_array();
		$data['count2'] = $this->db->query('SELECT SUM(harga) FROM barang_masuk ')->result_array();
		$data['count_stok'] = $this->db->query("SELECT SUM(stok_terjual) FROM barang_keluar")->result_array();
		$data['count_hargaa'] = $this->db->query("SELECT SUM(harga_terjual) FROM tbl_pesanan")->result_array();
		$data['count_stokk'] = $this->db->query("SELECT SUM(stok_terjual) FROM tbl_pesanan")->result_array();
		$data['count_harga'] = $this->db->query("SELECT SUM(harga_terjual) FROM barang_keluar")->result_array();

		$data['title'] = 'Data Barang';
		$data['jmlhbrangkeluar'] = $this->db->query('SELECT COUNT(id_barang) FROM barang_keluar')->result_array();
		$data['jmlhbrangmsk'] =  $this->db->query('SELECT COUNT(id_barang) FROM barang_masuk')->result_array();

		$data['keluar'] = $this->Petugas_model->join_keluar();
		$data['barang'] = $this->Petugas_model->join_masuk();
		$data['barang2'] = $this->db->get('tbl_pesanan')->result_array();
		$this->load->view('petugas/layout/header', $data);
		$this->load->view('petugas/layout/nav');
		$this->load->view('petugas/layout/sidebar');
		$this->load->view('petugas/pages/barang',$data);
		$this->load->view('petugas/layout/setting');
		$this->load->view('petugas/layout/footer');		
	}
	public function update_pesanan($id)
	{	
		$this->form_validation->set_rules('nama_penerima', 'Nama Penerima', 'required');
		$this->form_validation->set_rules('kode', 'Kode Transaksi', 'required');
		$this->form_validation->set_rules('stok_terjual', 'Stok Terjual', 'required');
		$this->form_validation->set_rules('harga', 'hatga Terjual', 'required');
		if ($this->form_validation->run() == TRUE) {
			$data = [
				'nama_penerima' => $this->input->post('nama_penerima', TRUE),
				'kode_transaksi' => $this->input->post('kode', TRUE ),
				'stok_terjual' => $this->input->post('stok_terjual', TRUE),
				'harga_terjual' => $this->input->post('harga', TRUE)
			];
			$this->db->set($data);
			$this->db->where('id', $id);
			$this->db->update('tbl_pesanan');
			$this->session->set_flashdata('flash', 'Data Berhasil Diubah');
			redirect('petugas/barang');
		}

		$data['pesanan'] = $this->db->get_where('tbl_pesanan', ['id' => $id])->result_array();
			$data['csrf'] = array(
			        'name' => $this->security->get_csrf_token_name(),
			        'hash' => $this->security->get_csrf_hash()
				);
		$data['barang_masuk'] = $this->Petugas_model->barang();
		$data['title'] = 'Input barang Masuk';
		$this->load->view('petugas/layout/header', $data);
		$this->load->view('petugas/layout/nav');
		$this->load->view('petugas/layout/sidebar');
		$this->load->view('petugas/input/update_pesanan',$data);
		$this->load->view('petugas/layout/setting');
		$this->load->view('petugas/layout/footer');	
	}
	public function hapus_pesanan($id)
	{	
		$this->db->delete('tbl_pesanan', ['id' => $id]);
		$this->session->set_flashdata('flash', 'Data Berhasil Dihapus');
		redirect('petugas/barang');
	}
	public function input_barang()
	{	
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
		$this->form_validation->set_rules('kode_barang', 'Kode Barang', 'required');
		if ($this->form_validation->run() == TRUE) {
			$this->Petugas_model->input_barang();
			$this->session->set_flashdata('flash', 'Data Berhasil Ditambah');
			redirect('petugas/input_barang');
		}
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
		$data['csrf'] = array(
			        'name' => $this->security->get_csrf_token_name(),
			        'hash' => $this->security->get_csrf_hash()
				);
		$data['title'] = 'Input barang';
		$this->load->view('petugas/layout/header', $data);
		$this->load->view('petugas/layout/nav');
		$this->load->view('petugas/layout/sidebar');
		$this->load->view('petugas/input/input_barang',$data);
		$this->load->view('petugas/layout/setting');
		$this->load->view('petugas/layout/footer');	
	}
	public function input_barangmasuk()
	{
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
		$this->form_validation->set_rules('stok', 'Stok', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');
		if ($this->form_validation->run() == TRUE) {
			$this->Petugas_model->input_brngmasuk();
			$this->session->set_flashdata('flash', 'Data Berhasil Ditambah');
			redirect('petugas/input_barangmasuk');
		}
		$data['csrf'] = array(
			        'name' => $this->security->get_csrf_token_name(),
			        'hash' => $this->security->get_csrf_hash()
				);
		$data['barang_masuk'] = $this->Petugas_model->barang();
		$data['title'] = 'Input barang Masuk';
		$this->load->view('petugas/layout/header', $data);
		$this->load->view('petugas/layout/nav');
		$this->load->view('petugas/layout/sidebar');
		$this->load->view('petugas/input/input_barangmasuk',$data);
		$this->load->view('petugas/layout/setting');
		$this->load->view('petugas/layout/footer');	
	}
	public function input_barangkeluar()
	{
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
		$this->form_validation->set_rules('stok_keluar', 'Stok Keluar', 'required');
		$this->form_validation->set_rules('harga_keluar', 'Harga Keluar', 'required');
		if ($this->form_validation->run() == TRUE) {
			$this->Petugas_model->input_brngkeluar();
			$this->session->set_flashdata('flash', 'Data Berhasil Ditambah');
			redirect('petugas/input_barangkeluar');
		}
		$data['csrf'] = array(
			        'name' => $this->security->get_csrf_token_name(),
			        'hash' => $this->security->get_csrf_hash()
				);
		$data['barang_masuk'] = $this->Petugas_model->barang();
		$data['title'] = 'Input barang Keluar';
		$this->load->view('petugas/layout/header', $data);
		$this->load->view('petugas/layout/nav');
		$this->load->view('petugas/layout/sidebar');
		$this->load->view('petugas/input/input_barangkeluar',$data);
		$this->load->view('petugas/layout/setting');
		$this->load->view('petugas/layout/footer');	
	}

	public function hapus_barang($id)
	{
		$this->Petugas_model->hapus_barang($id);
		$this->session->set_flashdata('flash', 'Data Berhasil Dihapus');
		redirect('petugas/barang');
	}
	public function hapus_barang_keluar($id)
	{
		$this->Petugas_model->hapus_barang_keluar($id);
		$this->session->set_flashdata('flash', 'Data Berhasil Dihapus');
		redirect('petugas/barang');
	}
	public function update_barang($id)
	{
		$this->form_validation->set_rules('stok', 'Stok Barang', 'required');
		$this->form_validation->set_rules('harga', 'Harga Barang', 'required');
		if ($this->form_validation->run() == TRUE) {
			$this->Petugas_model->update_barang($id);
			$this->session->set_flashdata('flash', 'Data Berhasil DiUbah');
			redirect('petugas/barang');
		}else {
			$data['csrf'] = array(
			        'name' => $this->security->get_csrf_token_name(),
			        'hash' => $this->security->get_csrf_hash()
				);
		$data['barang_masuk'] = $this->db->get_where('barang_masuk', ['id_brng_masuk'=> $id])->result_array();
		$data['title'] = 'Update barang Masuk';
		$this->load->view('petugas/layout/header', $data);
		$this->load->view('petugas/layout/nav');
		$this->load->view('petugas/layout/sidebar');
		$this->load->view('petugas/input/update_barangmasuk',$data);
		$this->load->view('petugas/layout/setting');
		$this->load->view('petugas/layout/footer');	
		}
		
	}
	public function update_barang_keluar($id)
	{

		$this->form_validation->set_rules('stok_keluar', 'Stok Barang Keluar', 'required');
		$this->form_validation->set_rules('harga_keluar', 'Harga Barang Keluar', 'required');
		if ($this->form_validation->run() == TRUE) {
			$this->Petugas_model->update_barang_keluar($id);
			$this->session->set_flashdata('flash', 'Data Berhasil DiUbah');
			redirect('petugas/barang');
		}else {
			$data['barang_keluar'] = $this->db->get_where('barang_keluar', ['id_barang_keluar' => $id])->result_array();
			$data['csrf'] = array(
			        'name' => $this->security->get_csrf_token_name(),
			        'hash' => $this->security->get_csrf_hash()
				);
		$data['barang_masuk'] = $this->Petugas_model->barang();
		$data['title'] = 'Update barang Keluar';
		$this->load->view('petugas/layout/header', $data);
		$this->load->view('petugas/layout/nav');
		$this->load->view('petugas/layout/sidebar');
		$this->load->view('petugas/input/update_barangkeluar',$data);
		$this->load->view('petugas/layout/setting');
		$this->load->view('petugas/layout/footer');	
		}
		
	}
	public function laporan_barang()
	{

		$data['jmlhbrangkeluar'] = $this->db->query('SELECT COUNT(id_barang) FROM barang_keluar')->result_array();
		$data['jmlhbrangmsk'] =  $this->db->query('SELECT COUNT(id_barang) FROM barang_masuk')->result_array();
		$data['count'] = $this->db->query('SELECT SUM(stok) FROM barang_masuk ')->result_array();
		$data['count2'] = $this->db->query('SELECT SUM(harga) FROM barang_masuk ')->result_array();
		$data['count_stok'] = $this->db->query("SELECT SUM(stok_terjual) FROM barang_keluar")->result_array();
		$data['count_harga'] = $this->db->query("SELECT SUM(harga_terjual) FROM barang_keluar")->result_array();
		$data['title'] = 'Data Barang';
		$data['barang'] = $this->Petugas_model->join_masuk();
		$data['barang2'] = $this->Petugas_model->join_keluar();
		$this->load->view('petugas/layout/header', $data);
		$this->load->view('petugas/layout/nav');
		$this->load->view('petugas/layout/sidebar');
		$this->load->view('petugas/pages/laporan_barang',$data);
		$this->load->view('petugas/layout/setting');
		$this->load->view('petugas/layout/footer');			
	}
	public function cetak_barang()
	{
		$database = $this->Petugas_model->join_masuk();
		$count = $this->db->query('SELECT SUM(stok) FROM barang_masuk ')->result_array();
		$count2 =$this->db->query('SELECT SUM(harga) FROM barang_masuk ')->result_array();
		$count_stok =$this->db->query("SELECT SUM(stok_terjual) FROM barang_keluar")->result_array();
		$count_harga = $this->db->query("SELECT SUM(harga_terjual) FROM barang_keluar")->result_array();
		$jmlhbrangkeluar = $this->db->query('SELECT COUNT(id_barang) FROM barang_keluar')->result_array();
		$jmlhbrangmsk =  $this->db->query('SELECT COUNT(id_barang) FROM barang_masuk')->result_array();
		$barang_keluar = $this->Petugas_model->join_keluar();;
		$html = "<!DOCTYPE html>
				<html>
				<head>
					<title>
						Cetak Barang
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
				$html .= "<h3>Barang Masuk</h3>";
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
            $html .=   "<th></th>";
            $html .= "<th> Jumlah Stok Masuk : ".$count[0]['SUM(stok)']."</th>";
            $html .="<td ><b>Harga Masuk : Rp. ".number_format($count2[0]['SUM(harga)'],0,',','.')."</b></td>";
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

				$html .= "<h3>Barang Keluar</h3>";
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
          $html .=  " 
			<th></th><td ><b>Jumlah Stok Keluar : ".$count_stok[0]['SUM(stok_terjual)']."</b></td>";
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

				$html .= "<h3>Selisih Barang</h3>";
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
	public function logout()
	{
		session_unset();
		session_destroy();
		redirect('login');
	}
}
