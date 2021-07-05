<?php

class Model_penjualan extends CI_Model {
	protected $_table = 'transaksi_penjualan';
	// protected $_table2 = 'barang';

	public function lihat(){
		return $this->db->get($this->_table)->result();
	} 

	public function lihat_stok(){
		$query = $this->db->get_where($this->_table2, 'stok > 1');
		return $query->result();
	}

	public function jumlah(){
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}

	public function lihat_nomor_faktur($nomor_faktur){
		return $this->db->get_where($this->_table, ['nomor_faktur' => $nomor_faktur])->row();
	}

	public function tambah($data){
		return $this->db->insert($this->_table, $data);
	}

	public function hapus($nomor_faktur){
		return $this->db->delete($this->_table, ['nomor_faktur' => $nomor_faktur]);
	}

	public function lihat_nama_barang($barang_nama){
		$query = $this->db->select('*');
		$query = $this->db->where(['barang_nama' => $barang_nama]);
		$query = $this->db->get($this->_table2);
		return $query->row();
	}

	function gettahun()
    {
        $query = $this->db->query("SELECT YEAR(tanggal) AS tahun FROM transaksi_penjualan GROUP BY YEAR(tanggal) ORDER BY YEAR(tanggal) ASC");
        return $query->result();
    }

    function filterbybulan($tahun1, $bulanawal, $bulanakhir)
    {
        $query = $this->db->query("SELECT a.* , b.* , c.* from transaksi_penjualan  a join detail_penjualan b on a.nomor_faktur=b.nomor_faktur join barang c on b.barang_kode=c.barang_kode where YEAR(a.tanggal) = '$tahun1' and MONTH(a.tanggal) BETWEEN '$bulanawal' and '$bulanakhir' ORDER BY a.tanggal ASC");
        return $query->result();
    }

    function filterbytahun($tahun2)
    {
        $query = $this->db->query("SELECT a.* , b.* , c.* from transaksi_penjualan  a join detail_penjualan b on a.nomor_faktur=b.nomor_faktur join barang c on b.barang_kode=c.barang_kode where YEAR(a.tanggal) = '$tahun2' ORDER BY a.tanggal ASC");
        return $query->result();
    }

	public function Delete($table, $where)
      {
      $res = $this->db->delete($table, $where); // Kode ini digunakan untuk menghapus record yang sudah ada
      return $res;
      }
}