<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas_model extends CI_model {
	public function input_barang()
	{
		$data =  [
			'nama_barang' => $this->input->post('nama_barang', TRUE),
			'kode_barang' => $this->input->post('kode_barang', TRUE)
		];
		$this->db->insert('barang', $data);
	}
	public function barang()
	{
		return $this->db->get('barang')->result_array();
	}
	public function input_brngmasuk()
	{
		$data = [
			'id_barang' => $this->input->post('nama_barang', TRUE),
			'stok' => $this->input->post('stok', TRUE),
			'harga' => $this->input->post('harga', TRUE)
		];
		$this->db->insert('barang_masuk', $data);
	}
		public function input_brngkeluar()
	{
		$data = [
			'id_barang' => $this->input->post('nama_barang', TRUE),
			'stok_terjual' => $this->input->post('stok_keluar', TRUE),
			'harga_terjual' => $this->input->post('harga_keluar', TRUE)
		];
		$this->db->insert('barang_keluar', $data);
	}
	public function join_masuk()
	{
		$this->db->select(
			'*');
		$this->db->from('barang');
		$this->db->join('barang_masuk', 'barang.id_barang = barang_masuk.id_barang');
			$query = $this->db->get()->result_array();
		return $query;
	}
	public function join_keluar()
	{
		$this->db->select(
			'*');
		$this->db->from('barang');
		$this->db->join('barang_keluar', 'barang.id_barang = barang_keluar.id_barang');
			$query = $this->db->get()->result_array();
		return $query;
	}
	function hapus_barang($id)
	{
		$this->db->delete('barang_masuk', ['id_brng_masuk' => $id]);
	}
	function hapus_barang_keluar($id)
	{
		$this->db->delete('barang_keluar', ['id_barang_keluar' => $id]);
	}
	public function update_barang($id)
	{
		$data = [
			'stok' => $this->input->post('stok', TRUE),
			'harga' => $this->input->post('harga', TRUE)
		];
		$this->db->set($data);
		$this->db->where('id_brng_masuk', $id);
		$this->db->update('barang_masuk');
	}
	public function update_barang_keluar($id)
	{
		$data = [
			'stok_terjual' => $this->input->post('stok_keluar', TRUE),
			'harga_terjual' => $this->input->post('harga_keluar', TRUE)
		];
		$this->db->set($data);
		$this->db->where('id_barang_keluar', $id);
		$this->db->update('barang_keluar');
	}
}	