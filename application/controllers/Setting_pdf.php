<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_pdf extends CI_Controller {
    public function __construct(){
		parent::__construct();
        $this->load->model('Setting_pdf_model');
        $this->load->model('About_model');

        is_logged_in();
	}

  
	public function index()
	{
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();

        $data['about_us'] = $this->About_model->about_all();
        $data['role_admin_user'] = $this->Setting_pdf_model->role_admin();
        $data['role_admin_role'] = $this->Setting_pdf_model->role_admin_role();

        // Query laporan pdf 
        $data['laporan_pdf'] = $this->Setting_pdf_model->laporan_pdf();


        $this->form_validation->set_rules('input_left','','required',[
            'required' => "Input left tidak boleh kosong!",
        ]);
        // $this->form_validation->set_rules('input_right','','required',[
        //     'required' => "Input right tidak boleh kosong!",
        // ]);

        if($this->form_validation->run() == false) {
            $data['title'] = "Setting Laporan PDF";
            render($this,'setting_pdf/index', $data);
        }else {
            $data =[
                "input_left"    => $this->input->post("input_left"),
                "date"          => time()
            ];

                $this->Setting_pdf_model->updateLaporanPdf($data);
                $this->session->set_flashdata("flash2", '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Pengaturan Laporan PDF berhasil diperbarui.</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('setting_pdf');
        }
    }


    
}