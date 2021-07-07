<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {
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
    
    }

    //proses tambah cash
	public function proses_tambah(){
		$data['nomor_faktur'] = $this->uri->segment('3');
		$data['bayar'] = $this->uri->segment('4');
		$data['title'] = "Data Pembayaran";
        $this->form_validation->set_rules('kode_angsuran' , 'kode_angsuran' , 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view("template/header",$data);
            $this->load->view('pembayarankredit',$data);
            $this->load->view("template/footer");
        } else {
            $data_bayar = [
                'kode_angsuran' => $this->input->post('kode_angsuran', true),
                'nomor_faktur' => $this->input->post('nomor_faktur', true),
                'angsuran_ke' => $this->input->post('angsuran_ke', true),
                'bayar' => $this->input->post('bayar', true),
                'tanggal' => $this->input->post('tanggal', true),
            ];

            if ($this->m_pembayaran->insertAngsuran($data_bayar)) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                Berhasil Menambahkan Data !
            </div>');
            redirect('penjualan');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    Gagal Menambahkan Data!
                </div>');
                redirect('penjualan');	
            }
        }
	}

	public function tambah_cicilan(){
		$data['nomor_faktur'] = $this->uri->segment('3');
		$data['bayar'] = $this->uri->segment('4');
		$data['title'] = "Data Pembayaran";
     
		$data_bayar = [
			'kode_angsuran' => $this->input->post('kode_angsuran', true),
			'nomor_faktur' => $this->input->post('nomor_faktur', true),
			'angsuran_ke' => $this->input->post('angsuran_ke', true),
			'bayar' => $this->input->post('bayar', true),
			'tanggal' => $this->input->post('tanggal', true),
		];

		if ($this->m_pembayaran->insertAngsuran($data_bayar)) {
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
			Berhasil Menambahkan Data !
		</div>');
		redirect('penjualan');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
				Gagal Menambahkan Data!
			</div>');
			redirect('penjualan');	
		}
	}

  
}