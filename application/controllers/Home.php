<?php
class Home extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Model_master', 'v');
        
    }

    public function index()
    {
        $now = date("m");

        $arrayTitle = [];
        $before = $now - 5;
        $arrayNumber = [];
        $arrayValuepembelian = [];
    
        $month = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
    
        for($i = $before;$i <= $now;$i++) {
            if($i <= 0) {
                $temp = 12 + $i;
                $arrayTitle[] = '"'.$month[$temp - 1]." ".(date("Y") - 1).'"';
            } else {
                $temp = $i;
                $arrayTitle[] = '"'.$month[$temp - 1]." ".date("Y").'"';
            }
            $arrayNumber[] = str_pad($temp,2,0,STR_PAD_LEFT);
            $arrayValuepembelian[] = 0;
        }
    
        
        $data1 = $this->v->get_graph($arrayNumber)->result();
        // $data2 = $this->v->get_graph($arrayNumber,"service")->result();
    
        foreach($data1 as $row) {
            $key = array_search(str_pad($row->tanggal,2,0,STR_PAD_LEFT),$arrayNumber);
            $arrayValuepembelian[$key] = $row->total;
        }
        // foreach($data2 as $row) {
        //     $key = array_search(str_pad($row->date,2,0,STR_PAD_LEFT),$arrayNumber);
        //     $arrayValueService[$key] = $row->total;
        // }

        $data["title"] = $arrayTitle;
        $data["valuepembelian"] = $arrayValuepembelian;
        // var_dump($data);
        // die;
        $this->load->view('template/header',$data);
        $this->load->view('dashboard',$data);
        $this->load->view('template/footer',$data);
    }
}