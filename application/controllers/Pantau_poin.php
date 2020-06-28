<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pantau_poin extends CI_Controller {
    public function __construct(){
		parent::__construct();
        $this->load->model('Pantau_poin_model');
        $this->load->model('About_model');

	}

  
	public function index()
	{
        $data['title'] = "Pantau poin";
       
        $data['about_us'] = $this->About_model->about_all();
       
        if($this->input->post("keyword")){
            $data['keyword']  = htmlspecialchars($this->input->post("keyword", true));
        }else{
            $data['keyword'] = "";
        }
    
        $data['poin_prestasi_by_id'] = $this->Pantau_poin_model->getPoinPrestasiById( $data['keyword'])->row_array();
        $data['poin_prestasi_by_id_poin_prestasi'] = $this->Pantau_poin_model->getPoinPrestasiById( $data['keyword'])->result_array();


        // Hapus Poin
        $data['getMuridKelasJurusanByIdPoin'] = $this->Pantau_poin_model->getMuridKelasJurusanById( $data['keyword'])->result_array();
        $data['getMuridKelasJurusanByIdPoinAja'] = $this->Pantau_poin_model->getMuridKelasJurusanById( $data['keyword'])->row_array();


        $data['getMuridKelasJurusanById'] = $this->Pantau_poin_model->getMuridKelasJurusanById( $data['keyword'])->row_array();
        
        $data['getMuridKelasJurusanByIdPoin'] = $this->Pantau_poin_model->getMuridKelasJurusanById( $data['keyword'])->result_array();
       

        
        
        $this->load->view("pantau_poin/index", $data);

    }

   
}
