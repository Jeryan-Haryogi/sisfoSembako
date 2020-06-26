<?php 
class Admin_model extends CI_Model {
	Public function select_admin()
	{
		return $this->db->get('admin')->result_array();
		
	}
	Public function select_petugas()
	{
		return $this->db->get('petugas')->result_array();
	}
	Public function select_kasir()
	{
		return $this->db->get('kasir')->result_array();
	}
	Public function select_barang()
	{
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->join('barang_masuk', 'barang.id_barang = barang_masuk.id_barang');

		
		$query = $this->db->get()->result_array();
		return $query;
	}
	Public function select_barang_keluar()
	{
		$this->db->select(
			'*');
		$this->db->from('barang');
		$this->db->join('barang_keluar', 'barang.id_barang = barang_keluar.id_barang');
		
		$query = $this->db->get()->result_array();
		return $query;
	}
	Public function count_barang()
	{
		$query = "SELECT SUM(stok) FROM barang_masuk";
		return $this->db->query($query)->result_array();
	}
	Public function selection_kasir($id)
	{
		return $this->db->get_where('kasir', ['id' => $id])->result_array();
	}
	Public function selection_petugas($id)
	{
		return $this->db->get_where('petugas', ['id' => $id])->result_array();
	}
	Public function selection_admin($id)
	{
		return $this->db->get_where('admin', ['id' => $id])->result_array();
	}
	Public function data_barang()
	{
		return $this->db->get('barang')->result_array();
	}
	Public function input_admin()
	{
		$data = array(
        'nama_lengkap' => $this->input->post('nama_lengkap', TRUE),
        'username' => $this->input->post('username', TRUE),
        'password' => $this->input->post('password', TRUE),
        'level' => $this->input->post('level', TRUE)
		);
		$this->db->insert('admin', $data);
	}
	Public function input_kasir()
	{
		$data = [
			'nama_lengkap' => $this->input->post('nama_lengkap', TRUE),
			'username' => $this->input->post('username', TRUE),
	        'password' => $this->input->post('password', TRUE),
	        'level' => $this->input->post('level', TRUE),
	        'kd_kasir' => $this->input->post('kode_kasir', TRUE),
		];
		$this->db->insert('kasir', $data);
	}
	Public function input_petugas()
	{
			$data = [
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'username' => $this->input->post('username'),
	        'password' => $this->input->post('password'),
	        'level' => $this->input->post('level'),
	        'kode_petugas' => $this->input->post('kode_petugas'),
		];
		$this->db->insert('petugas', $data);

	}
	Public function input_barang()
	{
			$data = [
			'nama_barang' => $this->input->post('nama_barang', TRUE),
			'kode_barang' => $this->input->post('kode_brang', TRUE)
		];
		$this->db->insert('barang', $data);

	}
	Public function barang_masuk()
	{
		$data = [
			'id_barang' => $this->input->post('id_barang', TRUE),
			'stok' => $this->input->post('stok_barang', TRUE),
			'harga' => $this->input->post('harga', TRUE)
	
		];
		$this->db->insert('barang_masuk', $data);
	}
	Public function detail_barang_masuk($id)
	{	
		return $this->db->get_where('barang_masuk', ['id_barang' => $id]);
	}
	Public function update_barang2($id)
	{
		$data = [

			'stok' => $this->input->post('stok_barang'),
			'harga' => $this->input->post('harga')
		];
		$this->db->set($data);
		$this->db->where('id_barang', $id);
		$this->db->update('barang_masuk');

	}
	Public function hapus_barang($id)
	{	
		return $this->db->delete('barang_masuk', ['id_barang' => $id]);

	}
	Public function barang_keluar()
	{
			$data = [
			'id_barang' => $this->input->post('id_barang', TRUE),
			'nama_penerima' => $this->input->post('nama_penerima', TRUE),
			'stok_terjual' => $this->input->post('stok', TRUE),
			'harga_terjual' => $this->input->post('harga', TRUE)
		];
		$this->db->insert('barang_keluar', $data);
	}

	Public function update_admin($id)
	{
		$data = array(
        'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
        'username' => $this->input->post('username',TRUE),
        'password' => $this->input->post('password',TRUE),
        'level' => $this->input->post('level', TRUE)
		);
		$this->db->set($data);
		$this->db->where('id', $id);
		$this->db->update('admin');
	}
	Public function hapus_admin($id)
	{
		$data = [
			'id' => $id
		];
		$this->db->delete('admin', $data);
	}
	Public function update_petugas($id)
	{
		$data = [
			'nama_lengkap' => $this->input->post('nama_lengkap', TRUE),
			'username' => $this->input->post('username', TRUE),
	        'password' => $this->input->post('password', TRUE),
	        'level' => $this->input->post('level', TRUE),
	        'kode_petugas' => $this->input->post('kode_petugas', TRUE),
		];
		$this->db->set($data);
		$this->db->where('id', $id);
		$this->db->update('petugas');
	}
	Public function hapus_petugas($id)
	{
		$data = [
			'id' => $id
		];
		$this->db->delete('petugas', $data);
	}
	Public function update_kasir($id)
	{
		$data = [
			'nama_lengkap' => $this->input->post('nama_lengkap', TRUE),
			'username' => $this->input->post('username', TRUE),
	        'password' => $this->input->post('password',TRUE),
	        'level' => $this->input->post('level',TRUE),
	        'kd_kasir' => $this->input->post('kode_kasir',TRUE),
		];
		$this->db->set($data);
		$this->db->where('id', $id);
		$this->db->update('kasir');
	}
	Public function hapus_kasir($id)
	{
		$data = [
			'id' => $id
		];
		$this->db->delete('kasir', $data);
	}
	Public function profile()
	{
		$password = $this->input->post('Passowrd');
		$password2 = $this->db->query("SELECT * FROM admin WHERE password = $password" );
		if ($password2) {
			$data = [
				'password' => $this->input->post('Passwordbaru')
			];
			$data2 = $this->input->post('Passwordbaru');
			$this->db->set($data);
			$this->db->where('password', $password);
			$success = $this->db->update('admin');
			if (!$success) {
			$this->session->set_flashdata('flash', 'password Gagal Diubah');
			}
		 	$this->session->set_flashdata('flash', 'Data Berhasil Diubah');

		}

	}
}