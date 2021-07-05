<?php

class Model_master extends CI_Model {
    public function index($tabel)
      {
        return $query = $this->db->query("SELECT * FROM $tabel ")->result_array();
      }
    public function getData($tb)
      {
        return $query = $this->db->query("SELECT * FROM $tb")->result_array();
      }
      public function getDatapenjualan($tb)
      {
        // return $query = $this->db->query("SELECT * FROM $tb a join barang c on a.barang_kode=c.barang_kode")->result_array();
        return $query = $this->db->query("SELECT * FROM $tb a join detail_penjualan b on a.nomor_faktur=b.nomor_faktur join barang c on b.barang_kode=c.barang_kode ")->result_array();
      }
      public function getDetailData($tb , $column , $id){
        return $query = $this->db->query("SELECT * FROM $tb  WHERE $column = '$id' GROUP BY $column")->result_array();
      }
    public function GetWhere($table, $data)
      {
        $res=$this->db->get_where($table, $data);
        return $res->result_array();
      }
    public function insert($tabel, $arr)
      {
          $cek = $this->db->insert($tabel, $arr);
          return $cek;
      }
    public function Delete($table, $where)
      {
      $res = $this->db->delete($table, $where); // Kode ini digunakan untuk menghapus record yang sudah ada
      return $res;
      }
    public function Update($table, $data, $where)
      {
      $res = $this->db->update($table, $data, $where); // Kode ini digunakan untuk merubah record yang sudah ada dalam sebuah tabel
      return $res;
      }

      public function cekkodepembelian()
    {
        $query = $this->db->query("SELECT MAX(kode_pembelian) as kodepembelian from transaksi_pembelian");
        $hasil = $query->row();
        return $hasil->kodepembelian;
    }


    function gettahun()
    {
        $query = $this->db->query("SELECT YEAR(tanggal) AS tahun FROM transaksi_pembelian GROUP BY YEAR(tanggal) ORDER BY YEAR(tanggal) ASC");
        return $query->result();
    }

    function filterbybulan($tahun1, $bulanawal, $bulanakhir)
    {
        $query = $this->db->query("SELECT * from transaksi_pembelian where YEAR(tanggal) = '$tahun1' and MONTH(tanggal) BETWEEN '$bulanawal' and '$bulanakhir' ORDER BY tanggal ASC");
        return $query->result();
    }

    function filterbytahun($tahun2)
    {
        $query = $this->db->query("SELECT * from transaksi_pembelian where YEAR(tanggal) = '$tahun2' ORDER BY tanggal ASC");
        return $query->result();
    }

    function get_graph($month) {

      $count = count($month) - 1;
      $start_month = $month[0];
      $end_month = $month[$count];

      if($start_month > $end_month) {
          $date = (date("Y") - 1)."-".$start_month."-01 00:00:00";
      } else {
          $date = date("Y")."-".$start_month."-01 00:00:00";
      }

      $this->db->select("transaksi_pembelian.*, MONTH(tanggal)");
      $this->db->group_by("MONTH(tanggal)");
      return $this->db->get("transaksi_pembelian");
      
  }

  public function graph()
	{
		$data = $this->db->query("SELECT * from transaksi_pembelian");
		return $data->result();
	}
}