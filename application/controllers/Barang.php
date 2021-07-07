<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Model_master', 'v');
        $this->load->model('M_barang', 'w');
    }
    
    public $image = "default.jpg";

    public function index()
    {
        
        $data['title'] = "Data Barang";
        $data['User'] = $this->db->get_where('user',['username' => 
        $this->session->userdata('username')])->row_array();
        $data['barang'] = $this->v->getData('barang');
        $this->load->view("template/header", $data);
        $this->load->view('barang', $data);
        $this->load->view("template/footer");
    }

    public function detail($id)
    {
        $data['title'] = "Data Barang";
        $data['User'] = $this->db->get_where('user',['username' => 
        $this->session->userdata('username')])->row_array();
        $data['data'] = $this->v->getDetailData('barang' , 'barang_kode' , $id);
        $this->load->view("template/header",$data);
        $this->load->view('barangdetail',$data);
        $this->load->view("template/footer");
		
    }

    public function tambah(){
        $data['title'] = "Data Barang";
        $data['User'] = $this->db->get_where('user',['username' => 
        $this->session->userdata('username')])->row_array(); 
        $this->form_validation->set_rules('barang_kode' , 'barang_kode' , 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view("template/header",$data);
            $this->load->view('baranginsert',$data);
            $this->load->view("template/footer");
        } else {
            // $foto = $_FILES['foto']['name'];
            // $config['allowed_types'] = 'jpg|png|gif|jpeg';
            // $config['max_size'] = '2048';
            // $config['upload_path'] = './img/barang/';
            // $this->load->library('upload' , $config);
            // if ($this->upload->do_upload('foto')) {
            $image = $this->upload_image('foto', './img/barang/');
            $tambah = $this->v->insert("barang" , array(
                'barang_kode' =>$this->input->post('barang_kode'),
                'barang_nama' =>$this->input->post('barang_nama'),
                'jenis_bahan' =>$this->input->post('jenis_bahan'),
                'type_barang' =>$this->input->post('type_barang'),
                'harga_asli' =>$this->input->post('harga_asli'),
                'biaya_produksi' =>$this->input->post('biaya_produksi'),
                'biaya_tukang' =>$this->input->post('biaya_tukang'),
                'biaya_distribusi' =>$this->input->post('biaya_distribusi'),
                'biaya_lainlain' =>$this->input->post('biaya_lainlain'),
                'keuntungan' =>$this->input->post('keuntungan'),
                // 'harga_tunai' =>$this->input->post('harga_tunai'),
                // 'harga_kredit_bulananan' =>$this->input->post('harga_kredit_bulananan'),
                // 'harga_kredit_musiman' =>$this->input->post('harga_kredit_musiman'),
                'stok' =>$this->input->post('stok'),
                'foto' =>$image
            ));

            if($tambah){
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                Berhasil Menambahkan Data !
            </div>');
            redirect('barang');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    Gagal Menambahkan Data!
                </div>');
                redirect('barang');
            }
        // } else {
        //     $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">'
        //     . $this->upload->display_errors() .
        //     '</div>');
        //     redirect('barang');
        // }
        }
    }

    public function edit_data($barang_kode){
        
        // form validation config ===============================
        $this->form_validation->set_rules('barang_nama', 'barang_nama', 'required|trim|max_length[50]');
        $this->form_validation->set_rules('type_barang', 'type_barang', 'required|trim|max_length[100]');
        $data['data_edit'] = $this->w->getBy($barang_kode);
        // ===============================
        
        if ($this->form_validation->run() == FALSE) {
        $this->load->view("template/header",$data);
        $this->load->view('barangupdate',$data);
        $this->load->view("template/footer");
    } else {
        // update thumbnail atatu tidak
        if (!$_FILES['foto']) {
            $image = $data['data_edit']['foto'];
        } else {
            $image = $this->upload_image('foto', './img/barang/');
        }

        $data_user_update = [
            'barang_kode' =>$this->input->post('barang_kode'),
            'barang_nama' =>$this->input->post('barang_nama'),
            'jenis_bahan' =>$this->input->post('jenis_bahan'),
            'type_barang' =>$this->input->post('type_barang'),
            'harga_asli' =>$this->input->post('harga_asli'),
            'biaya_produksi' =>$this->input->post('biaya_produksi'),
            'biaya_tukang' =>$this->input->post('biaya_tukang'),
            'biaya_distribusi' =>$this->input->post('biaya_distribusi'),
            'biaya_lainlain' =>$this->input->post('biaya_lainlain'),
            'keuntungan' =>$this->input->post('keuntungan'),
            'stok' =>$this->input->post('stok'),
            'foto' => $image,

        ];

        if ($this->w->updateBarang($data_user_update, $barang_kode)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil Memperbaharui Data </div>');

            redirect('Barang');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal Memperbaharui Data</div>');

            redirect('Barang');
        }
    }
    }  


    private function _uploadImage()
	{
		$config['upload_path']          = './img/barang/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['file_name']            = $this->input->post('barang_kode');
		$config['overwrite']			= true;
		$config['max_size']             = 1024; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('foto')) {
			return $this->upload->data("file_name");
		}
		
		return "default.jpg";
	}

    
    public function delete($barang_kode){
        $barang_kode = array('barang_kode' => $barang_kode);
        $this->load->model('v');
        $this->v->Delete('barang', $barang_kode);
        redirect(base_url('barang'),'refresh');
    }

    // fungsi untuk upload image
    private function upload_image($name, $address)
    {
        $this->load->library('upload');
        // ./assets/images/
        $config['upload_path'] = $address; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
        $config['max_size'] = 10000;

        $this->upload->initialize($config);

        if (!empty($_FILES[$name]['name'])) {

            if ($this->upload->do_upload($name)) {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = $address . $gbr['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['quality'] = '80%';
                $config['width'] = 1024;
                $config['height'] = 800;
                $config['new_image'] = $address . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar = $gbr['file_name'];

                return $gambar;
            } else {
                echo "gagal upload";
            }
        } else {
            return 'no-image.jpg';
        }
    }
}