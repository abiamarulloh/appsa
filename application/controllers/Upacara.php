<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upacara extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('About_model');
        
        is_logged_in();
	}

  
	public function index()
	{
        $data['about_us'] = $this->About_model->about_all();

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email','role_id') ])->row_array();
        $data['title'] = "Upacara";
        render($this,'upacara/index', $data, ['footer' => false ,'topbar' => false]);
    }


    
}
