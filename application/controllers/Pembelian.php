<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Model_master', 'v');
    }
    public function index()
    {
        $data['title'] = "Data Pembelian";
        $data['User'] = $this->db->get_where('user',['username' => 
        $this->session->userdata('username')])->row_array();
        $data['pembelian'] = $this->v->getData('transaksi_pembelian');
        $this->load->view("template/header", $data);
        $this->load->view('pembelian', $data);
        $this->load->view("template/footer");
    }

    public function detail($id)
    {
        $data['title'] = "Data Pembelian";
        $data['User'] = $this->db->get_where('user',['username' => 
        $this->session->userdata('username')])->row_array();
        $data['data'] = $this->v->getDetailData('transaksi_pembelian' , 'kode_pembelian' , $id);
        $this->load->view("template/header",$data);
        $this->load->view('pembeliandetail',$data);
        $this->load->view("template/footer");
		
    }

    public function tambah(){
        $data['title'] = "Data Pembelian";
        $dariDB = $this->v->cekkodepembelian();
        // contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
        $nourut = substr($dariDB, 3, 4);
        $kodeSekarang = $nourut + 1;
        $data = array('kode_pembelian' => $kodeSekarang);
        $data['User'] = $this->db->get_where('user',['username' => 
        $this->session->userdata('username')])->row_array(); 
        $this->form_validation->set_rules('kode_pembelian' , 'kode_pembelian' , 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view("template/header",$data);
            $this->load->view('pembelianinsert',$data);
            $this->load->view("template/footer");
        } else {
            $harga=$this->input->post('harga');
            $jumlah=$this->input->post('jumlah');
            $total=$harga*$jumlah;
            $tambah = $this->v->insert("transaksi_pembelian" , array(
                'kode_pembelian' =>$this->input->post('kode_pembelian'),
                'nama_barang' =>$this->input->post('nama_barang'),
                'jenis_barang' =>$this->input->post('jenis_barang'),
                'type_barang' =>$this->input->post('type_barang'),
                'harga' =>$this->input->post('harga'),
                'jumlah' =>$this->input->post('jumlah'),
                'total' =>$total,
                'tanggal' =>$this->input->post('tanggal')
            ));

            if($tambah){
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                Berhasil Menambahkan Data !
            </div>');
            redirect('pembelian');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    Gagal Menambahkan Data!
                </div>');
                redirect('pembelian');
            }
        }
    }

    public function edit_data($kode_pembelian){
        $dariDB = $this->v->cekkodepembelian();
        // contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
        $nourut = substr($dariDB, 3, 4);
        $kodeSekarang = $nourut + 1;
        $data = array('kode_pembelian' => $kodeSekarang);
        $this->load->model('v');
        $pembalian = $this->v->GetWhere('transaksi_pembelian', array('kode_pembelian' => $kode_pembelian));
        $data = array(
            'kode_pembelian' => $pembalian[0]['kode_pembelian'],
            'nama_barang' => $pembalian[0]['nama_barang'],
            'jenis_barang' => $pembalian[0]['jenis_barang'],
            'type_barang' => $pembalian[0]['type_barang'],
            'harga' => $pembalian[0]['harga'],
            'jumlah' => $pembalian[0]['jumlah'],
            'total' => $pembalian[0]['total'],
            'tanggal' => $pembalian[0]['tanggal']
            );
        $this->load->view("template/header",$data);
        $this->load->view('pembelianupdate',$data);
        $this->load->view("template/footer");
    }

    public function update_data(){
        $kode_pembelian = $_POST['kode_pembelian'];
        $nama_barang = $_POST['nama_barang'];
        $jenis_barang = $_POST['jenis_barang'];
        $type_barang = $_POST['type_barang'];
        $harga = $_POST['harga'];
        $jumlah = $_POST['jumlah'];
        $total = $_POST['total'];
        $tanggal = $_POST['tanggal'];

        $data = array(
            'nama_barang' => $nama_barang,
            'jenis_barang' => $jenis_barang,
            'type_barang' => $type_barang,
            'harga' => $harga,
            'jumlah' => $jumlah,
            'total' => $total,
            'tanggal' => $tanggal
         );
        $where = array(
            'kode_pembelian' => $kode_pembelian,
        );
        $this->load->model('v');
        $res = $this->v->Update('transaksi_pembelian', $data, $where);
        if ($res>0) {
            redirect('pembelian','refresh');
        }
    }

    public function delete($kode_pembelian){
        $kode_pembelian = array('kode_pembelian' => $kode_pembelian);
        $this->load->model('v');
        $this->v->Delete('transaksi_pembelian', $kode_pembelian);
        redirect(base_url('pembelian'),'refresh');
    }

    public function laporanpembelian()
    {
        $data['title'] = "Laporan Data Pembelian";
        $data['tahun'] = $this->v->gettahun();
        // $data['pembelian'] = $this->v->getDatapenjualan('transaksi_pembelian');
        $this->load->view("template/header", $data);
        $this->load->view('report/report_pembelian', $data);
        $this->load->view("template/footer");
    }

    public function laporanbybulan()
    {
        $data['title'] = "Laporan Dari Bulan";
        // user data

        $tahun1 = htmlspecialchars($this->input->post('tahun1', true));
        $bulanawal1 = htmlspecialchars($this->input->post('bulanawal1', true));
        $bulanakhir = htmlspecialchars($this->input->post('bulanakhir', true));

        $data['bybulan'] = $this->v->filterbybulan($tahun1, $bulanawal1, $bulanakhir);
        $this->load->view('report/laporan_by_bulan_pembelian', $data);
    }

    public function laporanbytahun()
    {
        $data['title'] = "Laporan Dari Tahun";
        // user data

        $tahun2 = htmlspecialchars($this->input->post('tahun2', true));

        $data['bytahun'] = $this->v->filterbytahun($tahun2);
        $this->load->view('report/laporan_by_tahun_pembelian', $data);
    }

}