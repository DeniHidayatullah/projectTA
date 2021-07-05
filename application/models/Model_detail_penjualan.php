<?php

class Model_detail_penjualan extends CI_Model {
	protected $_table = 'detail_penjualan';

	public function tambah($data){
		return $this->db->insert_batch($this->_table, $data);
	}

	public function lihat_nomor_faktur($nomor_faktur){
		// return $this->db->get_where($this->_table, ['nomor_faktur' => $nomor_faktur])->result();
		$query = $this->db->query("SELECT a.* , b.* , c.* from transaksi_penjualan  a join detail_penjualan b on a.nomor_faktur=b.nomor_faktur join barang c on b.barang_kode=c.barang_kode where a.nomor_faktur='$nomor_faktur' ");
        return $query->result();
	}

	public function hapus($nomor_faktur){
		return $this->db->delete($this->_table, ['nomor_faktur' => $nomor_faktur]);
	}
}