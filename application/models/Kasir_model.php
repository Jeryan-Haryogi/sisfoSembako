<?php 
class Kasir_model extends CI_Model {
	public function barang()
	{
		return $this->db->get('barang')->result_array();
	}
	public function input_barangkeluar()
	{
		$data = [
			'id_barang' => $this->input->post('nama_barang'),
			'nama_penerima' => $this->input->post('nama_penerima', TRUE),
			'stok_terjual' => $this->input->post('stok_terjual', TRUE),
			'harga_terjual'=> $this->input->post('harga_terjual', TRUE)
		];
		$this->db->insert('barang_keluar', $data);
	}
	public function barang_keluar()
	{
		$this->db->select(
			'*');
		$this->db->from('barang');
		$this->db->join('barang_masuk', 'barang.id_barang = barang_masuk.id_barang');
		
		$query = $this->db->get()->result_array();
		return $query;
	}
}