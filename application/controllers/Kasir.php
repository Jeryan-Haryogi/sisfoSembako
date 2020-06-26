 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {

	 function __construct(){
		parent:: __construct();
		if ($this->session->userdata('status') == FALSE) {
			redirect('login');
		}elseif ($this->session->userdata('role') == 'petugas') {
			redirect('petugas');	
		}
		elseif ($this->session->userdata('role') == 'admin') {
			redirect('admin');	
		}
		$this->load->library('form_validation');
		$this->load->model('Kasir_model');


	}
	public function index()
	{
		$data['session'] = $this->session->userdata('nama');
		$this->load->view('kasir/layout/header');
		$this->load->view('kasir/layout/navbar');
		$this->load->view('kasir/layout/sidebar', $data);
		$this->load->view('kasir/index');
		$this->load->view('kasir/layout/footer');
	}
	public function input_barangkeluar()
	{
		$this->form_validation->set_rules('nama_penerima', 'Nama Penerima', 'required');
		$this->form_validation->set_rules('stok_terjual', 'Stok Terjual', 'required');
		$this->form_validation->set_rules('harga_terjual', 'Harga Terjual', 'required');
		if ($this->form_validation->run() == TRUE) {
			$this->Kasir_model->input_barangkeluar();
			$this->session->set_flashdata('flash', 'Data Berhasil Ditambahkan');
			redirect('kasir/input_barangkeluar');
		}
		$data['csrf'] = array(
			        'name' => $this->security->get_csrf_token_name(),
			        'hash' => $this->security->get_csrf_hash()
				);
		$data['barang'] = $this->Kasir_model->barang();
		$this->load->view('kasir/layout/header');
		$this->load->view('kasir/layout/navbar');
		$this->load->view('kasir/layout/sidebar');
		$this->load->view('kasir/input/input_barangkeluar', $data);
		$this->load->view('kasir/layout/footer');	
	}
	public function barang_keluar()
	{
		$data['count'] = $this->db->query('SELECT COUNT(id_barang) FROM barang_keluar')->result_array();
		$data['count2'] = $this->db->query('SELECT SUM(stok_terjual) FROM barang_keluar')->result_array();
		$data['count3'] = $this->db->query('SELECT SUM(harga_terjual) FROM barang_keluar')->result_array();
		$data['barang_keluar'] = $this->Kasir_model->barang_keluar();
		$data['title'] = 'Data Barang Keluar';
		$this->load->view('kasir/layout/header');
		$this->load->view('kasir/layout/navbar');
		$this->load->view('kasir/layout/sidebar');
		$this->load->view('kasir/pages/barang_keluar', $data);
		$this->load->view('kasir/layout/footer');	
	}
	public function update_barang($id)
	{
		$this->form_validation->set_rules('nama_penerima', 'Nama Penerima', 'required');
		$this->form_validation->set_rules('stok_terjual', 'Stok Terjual', 'required');
		$this->form_validation->set_rules('harga_terjual', 'Harga Terjual', 'required');
			if ($this->form_validation->run() == TRUE) {
				$data = [
					'id_barang' => $this->input->post('nama_barang'),
					'nama_penerima' => $this->input->post('nama_penerima'),
					'stok_terjual' => $this->input->post('stok_terjual'),
					'harga_terjual' => $this->input->post('harga_terjual')
				];
				$this->db->set($data);
				$this->db->where('id_barang_keluar', $id);
				$this->db->update('barang_keluar');
				$this->session->set_flashdata('flash', 'Data Berhasil Diubah');
				redirect('kasir/barang_keluar');

			}
		$data['update'] = $this->db->get_where('barang_keluar', ['id_barang_keluar' => $id])->result_array();
		$data['csrf'] = array(
			        'name' => $this->security->get_csrf_token_name(),
			        'hash' => $this->security->get_csrf_hash()
				);
		$data['barang'] = $this->Kasir_model->barang();
		$this->load->view('kasir/layout/header');
		$this->load->view('kasir/layout/navbar');
		$this->load->view('kasir/layout/sidebar');
		$this->load->view('kasir/input/update_barangkeluar', $data);
		$this->load->view('kasir/layout/footer');	
	}
	public function laporan_barang()
	{
		$data['count'] = $this->db->query('SELECT COUNT(id_barang) FROM barang_keluar')->result_array();
		$data['count2'] = $this->db->query('SELECT SUM(stok_terjual) FROM barang_keluar')->result_array();
		$data['count3'] = $this->db->query('SELECT SUM(harga_terjual) FROM barang_keluar')->result_array();
		$data['barang_keluar'] = $this->Kasir_model->barang_keluar();
		$data['title'] = 'Laporan Barang Keluar';
		$this->load->view('kasir/layout/header');
		$this->load->view('kasir/layout/navbar');
		$this->load->view('kasir/layout/sidebar');
		$this->load->view('kasir/pages/laporan_barang', $data);
		$this->load->view('kasir/layout/footer');		
	}
	public function cetak()
	{
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
						$kode = acak(5);
		$cont = $this->db->query('SELECT COUNT(id_barang) FROM barang_keluar')->result_array();
		$count_stok = $this->db->query("SELECT SUM(stok_terjual) FROM barang_keluar")->result_array();
		$count_harga = $this->db->query("SELECT SUM(harga_terjual) FROM barang_keluar")->result_array();
		$barang_keluar = $this->Kasir_model->barang_keluar();
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
				$html .= "<h2  style='margin-top: -200px;'><b>Laporan Barang Keluar</b></h2>";

				$html .= "<hr>";
	  	$html .= "<table border'1' cellpadding='10' cellspacing='0' style='width:100%; '>";
		$html .= "<thead>
	  		<tr>
	  		<th>No</th>
            <th>Nama Penerima</th>
            <th>Nama Barang</th>
             <th>Kode Barang</th>
             <th>Stok Keluar</th>
             <th>Harga Barang Keluar</th>
	  		</tr>
	  	</thead>";
	  	$html .= "<tfoot>";
	  	$html .= "<tr>";	  	
		$html .= "
			<th></th>
			<th ></th>
			<th  ><b>Jumlah Barang : ".$cont[0]['COUNT(id_barang)']."</b></th>";
			$html .= "<th></th>";
         $html .=   "<td ><b>Jumlah Stok Keluar : ".$count_stok[0]['SUM(stok_terjual)']."</b></td>";
            $html .=   "<td ><b>Harga Keluar : Rp. ".$count_harga[0]['SUM(harga_terjual)']."</b></td>";
		$html .= "</tr>";	  
		$html .= "</tfoot>";	  	
			
	  	$html .= "<tbody>";
	  	$no = 1;
	  	 foreach($barang_keluar as $user2) {
	  	 	$html .= "<tr>";
	  	 	$html .= "<td>".$no."</td>";
	  	 	$html .= "<td>".$user2['nama_penerima']."</td>";
	  	 	$html .= "<td>".$user2['nama_barang']."</td>";
	  	 	$html .= "<td>".$user2['kode_barang']."</td>";
	  	 	$html .= "<td>".$user2['stok_terjual']."</td>";
	  	 	$html .= "<td> Rp.".$user2['harga_terjual']."</td>";


	  	 	$html .= "</tr>";
	  	 	$no++;
	  	 }
	  	$html .= "</tbody>";
	  	$html .= "</table>";
	  	$html .= "<h2 style='text-align: center'> Kode Transaksi :".$kode."</h2>";
	  	$html .= "</body>";
	  	$html .= "</html>";
	  	$mpdf = new \Mpdf\Mpdf();
		$mpdf->WriteHTML($html);
		$mpdf->Output();
	}
	public function hapus_barang($id)
	{
		$this->db->get_where('barang_keluar', ['id_barang_keluar' => $id]);
		$this->session->set_flashdata('flash', 'Data Berhasil Dihapus');
		redirect('kasir/barang_keluar');
	}
	public function logout()
	{
		session_unset();
		session_destroy();
		redirect('login');
	}
}
