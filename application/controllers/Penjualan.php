<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Model_master', 'v');
		$this->load->model('M_barang', 'm_barang');
		$this->load->model('Model_penjualan', 'm_penjualan');
		$this->load->model('Model_detail_penjualan', 'm_detail_penjualan');
		$this->load->model('M_pembayaran', 'm_pembayaran');
		$this->data['aktif'] = 'penjualan';
	}
	public function index()
	{

		$data['title'] = "Data penjualan";
		$data['penjualan'] = $this->v->getDatapenjualan('transaksi_penjualan');
		$this->load->view("template/header", $data);
		$this->load->view('penjualan', $data);
		$this->load->view("template/footer");
	}

	// public function detail($id)
	// {
	//     $data['title'] = "Data penjualan";
	//     $data['User'] = $this->db->get_where('user',['username' => 
	//     $this->session->userdata('username')])->row_array();
	//     $data['data'] = $this->v->getDetailData('transaksi_penjualan' , 'nomor_faktur' , $id);
	//     $this->load->view("template/header",$data);
	//     $this->load->view('penjualandetail',$data);
	//     $this->load->view("template/footer");

	// }

	//tambah cash
	public function tambahcash()
	{
		$data['title'] = 'Tambah Penjualan';
		$data['all_barang'] = $this->m_barang->lihat_stok();
		$data['all_pembayaran'] = $this->m_pembayaran->lihat();
		$data['all_penjualan'] = $this->m_penjualan->lihat();
		$data['barang'] = $this->v->getData('barang');

		$this->load->view("template/header", $data);
		$this->load->view('penjualancash', $data);
		$this->load->view("template/footer");
	}


	//tambah kredit
	public function tambahkredit()
	{
		$data['title'] = 'Tambah Penjualan';
		$data['all_barang'] = $this->m_barang->lihat_stok();
		$data['all_pembayaran'] = $this->m_pembayaran->lihat();
		$data['all_penjualan'] = $this->m_penjualan->lihat();
		$data['barang'] = $this->v->getData('barang');

		$this->load->view("template/header", $data);
		$this->load->view('penjualankredit', $data);
		$this->load->view("template/footer");
	}

	//proses tambah cash
	public function proses_tambahcash()
	{
		$jumlah_barang_dibeli = count($this->input->post('nama_barang_hidden'));
		$id_jenis_pembayaran = '1';
		$data_penjualan = [];

		$data_penjualan['nomor_faktur'] = $this->input->post('nomor_faktur');
		$data_penjualan['tanggal'] = $this->input->post('tanggal');
		$data_penjualan['total'] = $this->input->post('total_hidden');
		$data_penjualan['id_jenis_pembayaran'] = $id_jenis_pembayaran;
		$data_penjualan['nama_pembeli'] = $this->input->post('nama_pembeli_hidden');
		$data_penjualan['alamat_pembeli'] = $this->input->post('alamat_pembeli_hidden');
		$data_penjualan['no_telp'] = $this->input->post('no_telp_hidden');
		$data_penjualan['foto_ktp'] = $this->_uploadImage();

		$data_detail_penjualan = [];

		for ($i = 0; $i < $jumlah_barang_dibeli; $i++) {
			array_push($data_detail_penjualan, ['barang_kode' => $this->input->post('kode_barang_hidden')[$i]]);
			$data_detail_penjualan[$i]['nomor_faktur'] = $this->input->post('nomor_faktur');
			$data_detail_penjualan[$i]['harga'] = $this->input->post('harga_barang_hidden')[$i];
			$data_detail_penjualan[$i]['jumlah'] = $this->input->post('jumlah_hidden')[$i];
			$data_detail_penjualan[$i]['sub_total'] = $this->input->post('sub_total_hidden')[$i];
		}

		if ($this->m_penjualan->tambah($data_penjualan) && $this->m_detail_penjualan->tambah($data_detail_penjualan)) {
			for ($i = 0; $i < $jumlah_barang_dibeli; $i++) {
				$this->m_barang->min_stok($data_detail_penjualan[$i]['jumlah'], $data_detail_penjualan[$i]['barang_kode']) or die('gagal min stok');
			}
			$this->session->set_flashdata('success', 'Invoice <strong>Penjualan</strong> Berhasil Dibuat!');
			redirect('penjualan');
		} else {
			$this->session->set_flashdata('success', 'Invoice <strong>Penjualan</strong> Berhasil Dibuat!');
			redirect('penjualan');
		}
	}

	//proses tambah kredit
	public function proses_tambahkredit()
	{
		$jumlah_barang_dibeli = count($this->input->post('nama_barang_hidden'));

		$data_penjualan = [];

		$data_penjualan['nomor_faktur'] = $this->input->post('nomor_faktur');
		$data_penjualan['tanggal'] = $this->input->post('tanggal');
		$data_penjualan['id_jenis_pembayaran'] = $this->input->post('id_jenis_pembayaran_hidden');
		$data_penjualan['nama_pembeli'] = $this->input->post('nama_pembeli_hidden');
		$data_penjualan['alamat_pembeli'] = $this->input->post('alamat_pembeli_hidden');
		$data_penjualan['no_telp'] = $this->input->post('no_telp_hidden');
		$data_penjualan['foto_ktp'] = $this->_uploadImage();

		if (!$this->input->post('Grand_Total')) {
			$data_penjualan['total'] = $this->input->post('total_hidden');
		} else {
			$data_penjualan['total'] = $this->input->post('Grand_Total');
		}

		$data_detail_penjualan = [];

		for ($i = 0; $i < $jumlah_barang_dibeli; $i++) {
			array_push($data_detail_penjualan, ['barang_kode' => $this->input->post('kode_barang_hidden')[$i]]);
			$data_detail_penjualan[$i]['nomor_faktur'] = $this->input->post('nomor_faktur');
			$data_detail_penjualan[$i]['harga'] = $this->input->post('harga_barang_hidden')[$i];
			$data_detail_penjualan[$i]['jumlah'] = $this->input->post('jumlah_hidden')[$i];
			$data_detail_penjualan[$i]['sub_total'] = $this->input->post('sub_total_hidden')[$i];
		}

		if ($this->m_penjualan->tambah($data_penjualan) && $this->m_detail_penjualan->tambah($data_detail_penjualan)) {
			for ($i = 0; $i < $jumlah_barang_dibeli; $i++) {
				$this->m_barang->min_stok($data_detail_penjualan[$i]['jumlah'], $data_detail_penjualan[$i]['barang_kode']) or die('gagal min stok');
			}
			$this->session->set_flashdata('success', 'Invoice <strong>Penjualan</strong> Berhasil Dibuat!');
			redirect('penjualan');
		} else {
			$this->session->set_flashdata('success', 'Invoice <strong>Penjualan</strong> Berhasil Dibuat!');
			redirect('penjualan');
		}
	}

	public function detail($nomor_faktur)
	{
		$data['title'] = 'Detail Penjualan';
		$data['penjualan'] = $this->m_penjualan->lihat_nomor_faktur($nomor_faktur);
		$data['all_detail_penjualan'] = $this->m_detail_penjualan->lihat_nomor_faktur($nomor_faktur);
		$data['no'] = 1;
		$data['data_angsuran'] = $this->m_penjualan->data_angsuran($nomor_faktur);

		// var_dump($data);
		// die;


		$this->load->view("template/header", $data);
		$this->load->view('penjualandetail', $data);
		$this->load->view("template/footer");
	}

	public function get_all_barang()
	{
		$data = $this->m_barang->lihat_nama_barang($_POST['barang_kode']);
		echo json_encode($data);
	}

	//get buat kredit
	public function get_all_pembayaran()
	{
		$data = $this->m_pembayaran->lihat_pembayaran($_POST['id_jenis_pembayaran']);
		echo json_encode($data);
	}

	public function keranjang_barang()
	{
		$this->load->view('keranjang');
	}

	public function keranjang_barangkredit()
	{
		$this->load->view('keranjangkredit');
	}

	public function bayar_barang()
	{
		$this->load->view('bayar');
	}

	public function bayar_barangkredit()
	{
		$this->load->view('bayarkredit');
	}

	public function delete($nomor_faktur)
	{
		$nomor_faktur = array('nomor_faktur' => $nomor_faktur);
		$this->load->model('v');
		$this->v->Delete('transaksi_penjualan', $nomor_faktur);
		$this->v->Delete('detail_penjualan', $nomor_faktur);
		redirect(base_url('penjualan'), 'refresh');
	}

	public function laporanpenjualan()
	{

		$data['title'] = "Laporan Data penjualan";
		$data['tahun'] = $this->v->gettahun();
		$this->load->view("template/header", $data);
		$this->load->view('report/report_penjualan', $data);
		$this->load->view("template/footer");
	}

	public function laporanbybulan()
	{
		$data['title'] = "Laporan Dari Bulan";
		// user data

		$tahun1 = htmlspecialchars($this->input->post('tahun1', true));
		$bulanawal1 = htmlspecialchars($this->input->post('bulanawal1', true));
		$bulanakhir = htmlspecialchars($this->input->post('bulanakhir', true));

		$data['bybulan'] = $this->m_penjualan->filterbybulan($tahun1, $bulanawal1, $bulanakhir);
		$data['sum'] = $this->m_penjualan->sum();
		$this->load->view('report/laporan_by_bulan_penjualan', $data);
	}

	public function laporanbytahun()
	{
		$data['title'] = "Laporan Dari Tahun";
		// user data

		$tahun2 = htmlspecialchars($this->input->post('tahun2', true));

		$data['bytahun'] = $this->m_penjualan->filterbytahun($tahun2);
		$data['sum'] = $this->m_penjualan->sum();
		$this->load->view('report/laporan_by_tahun_penjualan', $data);
	}

	public function getDateAjax()
	{
		$barang_kode = $this->input->post('barang_kode');
		$date = $this->m_barang->get_where(['barang_kode' => $barang_kode])->result();
	}

	private function _uploadImage()
	{
		$config['upload_path']          = './img/ktp/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['file_name']            = $this->input->post('nomor_faktur');
		$config['overwrite']			= true;
		$config['max_size']             = 1024; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('foto_ktp_hidden')) {
			return $this->upload->data("file_name");
		}

		return "default.jpg";
	}
}
