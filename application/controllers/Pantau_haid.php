<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pantau_haid extends CI_Controller {
    public function __construct(){
		parent::__construct();
        $this->load->model('Pantau_haid_model');
        $this->load->model('About_model');

	}

  
	public function index()
	{
        $data['title'] = "Pantau Haid";
        $data['about_us'] = $this->About_model->about_all();
         
        if($this->input->post("keyword")){
            $data['keyword']  = htmlspecialchars($this->input->post("keyword", true));
        }else{
            $data['keyword'] = "";
        }

        $data['getMuridKelasJurusanById'] = $this->Pantau_haid_model->getMuridKelasJurusanById($data['keyword'])->row_array();
            
      //  menampilkan data haid murid
        $data['getSiswiJoin_pagi']   = $this->Pantau_haid_model->getSiswiJoinById_pagi($data['keyword'])->result_array();

        $data['getSiswiJoin_siang']   = $this->Pantau_haid_model->getSiswiJoinById_siang($data['keyword'])->result_array();

        $data['getSiswiById'] = $this->Pantau_haid_model->getSiswiById($data['keyword'])->row_array();
        
        $data['getSiswiJoinByTanggal']   = $this->Pantau_haid_model->getSiswiJoinByTanggal($data['keyword'])->result_array();


        $this->load->view("pantau_haid/index", $data);
    }

   
}
