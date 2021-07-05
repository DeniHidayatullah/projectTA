<?php

class M_barang extends CI_Model{
	protected $_table = 'barang';

	public function lihat(){
		$query = $this->db->get($this->_table);
		return $query->result();
	}

	public function get_where($where){
		return $this->db->get_where('barang',$where);
	  }

	public function jumlah(){
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}

	public function lihat_stok(){
		$query = $this->db->get_where($this->_table, 'stok > 1');
		return $query->result();
	}

	public function getBy($data)
    {
        return $this->db->get_where('barang', ['barang_kode' => $data])->row_array();
    }

	public function lihat_id($barang_kode){
		$query = $this->db->get_where($this->_table, ['barang_kode' => $barang_kode]);
		return $query->row();
	}

	public function lihat_nama_barang($barang_kode){
		$query = $this->db->select('*');
		$query = $this->db->where(['barang_kode' => $barang_kode]);
		$query = $this->db->get($this->_table);
		return $query->row();
	}

	public function tambah($data){
		return $this->db->insert($this->_table, $data);
	}

	public function min_stok($stok, $nama_barang){
		$query = $this->db->set('stok', 'stok-' . $stok, false);
		$query = $this->db->where('barang_kode', $nama_barang);
		$query = $this->db->update($this->_table);
		return $query;
	}

	public function ubah($data, $kode_barang){
		$query = $this->db->set($data);
		$query = $this->db->where(['kode_barang' => $kode_barang]);
		$query = $this->db->update($this->_table);
		return $query;
	}

	public function hapus($kode_barang){
		return $this->db->delete($this->_table, ['kode_barang' => $kode_barang]);
	}

	public function updateBarang($data, $param)
    {
        return $this->db->update('barang', $data, ['barang_kode' => $param]);
    }
}