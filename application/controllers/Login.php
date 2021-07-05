<?php 
 
class Login extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('Model_login');
 
	}
 
	function index(){
		$this->load->view('login');
	}
 
	function aksi_login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $where = array(
            'username' => $username,
            'password' => $password
            );
        $cek = $this->Model_login->cek_login("user",$where)->num_rows();
        if($cek > 0){
     
            $data_session = array(
                'nama' => $username,
                'status' => "login"
                );
     
            $this->session->set_userdata($data_session);
     
            redirect(base_url("Home"));
        }else{
            echo "Username dan password salah !";
        }
    }

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}