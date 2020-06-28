<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct(){
		parent::__construct();
        $this->load->model('Dashboard_model');
        $this->load->model('About_model');
        is_logged_in();
	}

  
	public function index()
	{
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();

        $data['about_us'] = $this->About_model->about_all();

        
        $data['users'] = $this->Dashboard_model->getUsers();
        $data['muridAll'] = $this->Dashboard_model->getMuridAll();
        $data['muridMale'] = $this->Dashboard_model->getMuridMale();
        $data['muridFemale'] = $this->Dashboard_model->getMuridFemale();

        $data['alumniAll'] = $this->Dashboard_model->getAlumnidAll();
        $data['alumniMale'] = $this->Dashboard_model->getAlumniMale();
        $data['alumniFemale'] = $this->Dashboard_model->getAlumniFemale();


        $data['title'] = "Dashboard";
        render($this,'dashboard/index', $data);
    }


    
}
