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
		$this->load->library('ciqrcode');




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
		$data['count'] = $this->db->query('SELECT COUNT(id_barang) FROM barang_keluar')->result_array();
		$data['count2'] = $this->db->query('SELECT SUM(stok_terjual) FROM barang_keluar')->result_array();
		$data['count3'] = $this->db->query('SELECT SUM(harga_terjual) FROM barang_keluar')->result_array();
		$data['barang_keluar'] = $this->Kasir_model->barang_keluar();
		$data['title'] = 'Data Barang Keluar';
		$this->load->view('kasir/layout/header');
		$this->load->view('kasir/layout/navbar');
		$this->load->view('kasir/layout/sidebar');
		$this->load->view('kasir/input/input_barangkeluar', $data);
		$this->load->view('kasir/layout/footer');	
	}
	public function tambah_keranjang($id)
	{
		$barang = $this->db->get_where('barang_masuk', ['id_barang'=> $id])->row();
		$barang2 = $this->db->get_where('barang', ['id_barang'=> $id])->row();	
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
redirect('kasir/input_barangkeluar');
	}
	public function hapus_keranjang()
	{
		$this->cart->destroy();
		$this->session->set_flashdata('flash', 'Keranjang Berhasil Dihapus');
		redirect('kasir/input_barangkeluar');
	}
	public function detail_keranjang()
	{
		$data['title'] = 'Data Barang Keluar';
		$this->load->view('kasir/layout/header');
		$this->load->view('kasir/layout/navbar');
		$this->load->view('kasir/layout/sidebar');
		$this->load->view('kasir/pages/detail_keranjang', $data);
		$this->load->view('kasir/layout/footer');	
	}
	public function barang_keluar()
	{
		$data['count'] = $this->db->query('SELECT COUNT(id_barang) FROM barang_keluar')->result_array();
		$data['count2'] = $this->db->query('SELECT SUM(stok_terjual) FROM barang_keluar')->result_array();
		$data['count3'] = $this->db->query('SELECT SUM(harga_terjual) FROM barang_keluar')->result_array();
		// $data['barang_keluar'] = $this->Kasir_model->barang_keluar();
		$data['pesanan'] = $this->db->get('tbl_pesanan')->result_array();
		$data['title'] = 'Data Barang Keluar';
		$this->load->view('kasir/layout/header');
		$this->load->view('kasir/layout/navbar');
		$this->load->view('kasir/layout/sidebar');
		$this->load->view('kasir/pages/barang_keluar', $data);
		$this->load->view('kasir/layout/footer');	
	}
	public function pembayaran()
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
			redirect('kasir/input_barangkeluar');
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
		$data['title'] = 'Data Barang Keluar';
		$this->load->view('kasir/layout/header');
		$this->load->view('kasir/layout/navbar');
		$this->load->view('kasir/layout/sidebar');
		$this->load->view('kasir/pages/pembayaran', $data);
		$this->load->view('kasir/layout/footer');	
	}
	public function hapus_pesanan($id)
	{
		$this->db->delete('tbl_pesanan', ['id' => $id]);
		$this->session->set_flashdata('flash', 'Data Berhasil Dihapus');
		redirect('kasir/barang_keluar');
	}
	public function update_pesanan($id)
	{
		$this->form_validation->set_rules('nama_penerima', 'Nama Penerima', 'required');
		$this->form_validation->set_rules('harga', 'Harga Beli', 'required');
		$this->form_validation->set_rules('kode', 'Kode Barang', 'required');
		$this->form_validation->set_rules('jmlbarang', 'Harga Beli', 'required');
		if ($this->form_validation->run() == TRUE) {
			$data = [
				'nama_penerima' => $this->input->post('nama_penerima', TRUE),
				'harga_terjual' => $this->input->post('harga', TRUE),
				'kode_transaksi' => $this->input->post('kode', TRUE),
				'stok_terjual' => $this->input->post('jmlbarang', TRUE),
			];
			$this->db->set($data);
			$this->db->where('id', $id);
			$this->db->update('tbl_pesanan');
			$this->session->set_flashdata('flash', 'Data Berhasil Diubah');
			redirect('kasir/barang_keluar');
		}
		$data['csrf'] = array(
			        'name' => $this->security->get_csrf_token_name(),
			        'hash' => $this->security->get_csrf_hash()
				);
		$data['barang'] = $this->db->get_where('tbl_pesanan', ['id' => $id])->result_array();
		$this->load->view('kasir/layout/header');
		$this->load->view('kasir/layout/navbar');
		$this->load->view('kasir/layout/sidebar');
		$this->load->view('kasir/input/update_pesanan', $data);
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
		
		$data['count2'] = $this->db->query('SELECT SUM(stok_terjual) FROM tbl_pesanan')->result_array();
		$data['count3'] = $this->db->query('SELECT SUM(harga_terjual) FROM tbl_pesanan')->result_array();
		$data['barang_keluar'] = $this->Kasir_model->barang_keluar();
		$data['brana'] = $this->db->get('tbl_pesanan')->result_array();
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
		$count_stok = $this->db->query("SELECT SUM(stok_terjual) FROM tbl_pesanan")->result_array();
		$count_harga = $this->db->query("SELECT SUM(harga_terjual) FROM tbl_pesanan")->result_array();
		$peasnan = $this->db->get('tbl_pesanan')->result_array();
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
				$html .= "<h2  style='margin-top: -200px;'><b>Laporan Pemesanan</b></h2>";

				$html .= "<hr>";
	  	$html .= "<table border'1' cellpadding='10' cellspacing='0' style='width:100%; '>";
		$html .= "<thead>
	  		<tr>
	  		<th>No</th>
            <th>Nama Penerima</th>
            <th>Kode Transaksi</th>
             <th>Stok Beli</th>
             <th>Jumlah Harga  </th>
	  		</tr>
	  	</thead>";
	  	$html .= "<tfoot>";
	  	$html .= "<tr>";	  	
		$html .= "
			<th></th>
			<th></th>";
			$html .= "<th></th>";
         $html .=   "<td ><b>Jumlah Stok Beli : ".$count_stok[0]['SUM(stok_terjual)']."</b></td>";
            $html .=   "<td ><b>Jumlah Harga : Rp. ".number_format($count_harga[0]['SUM(harga_terjual)'],0,',','.')."</b></td>";
		$html .= "</tr>";	  
		$html .= "</tfoot>";	  	
			
	  	$html .= "<tbody>";
	  	$no = 1;
	  	 foreach($peasnan as $user2) {
	  	 	$html .= "<tr>";
	  	 	$html .= "<td>".$no."</td>";
	  	 	$html .= "<td>".$user2['nama_penerima']."</td>";
	  	 	$html .= "<td>".$user2['kode_transaksi']."</td>";
	  	 	$html .= "<td>".$user2['stok_terjual']."</td>";
	  	 	$html .= "<td> Rp.".number_format($user2['harga_terjual'],0,',','.')."</td>";


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
		$mpdf->Output('laporan_pesanan.pdf', \Mpdf\Output\Destination::DOWNLOAD);
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
