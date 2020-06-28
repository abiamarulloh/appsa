<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poin_prestasi extends CI_Controller {
    public function __construct(){
		parent::__construct();
        $this->load->model('Poin_prestasi_model');
        $this->load->model('About_model');

        is_logged_in();
	}

 
    // Menu Poin_prestasi
    public function index()
	{
        $data['poin_prestasi'] = $this->Poin_prestasi_model->get_poin_prestasi();
        $data['get_poin_jenis_prestasi'] = $this->Poin_prestasi_model->get_poin_jenis_prestasi();

        $data['prestasi_all'] = $this->db->get('poin_prestasi')->result_array();

        $data['about_us'] = $this->About_model->about_all();
     
		$this->form_validation->set_rules('jenis_prestasi' , '' , 'required', [
			'required' => 'Jenis Prestasi Harus diisi !'
		]);
		$this->form_validation->set_rules('detail_prestasi' , '' , 'required',[
			'required' => 'Detail Prestasi Harus diisi !'
		]);
		$this->form_validation->set_rules('poin_prestasi' , '' , 'required',[
			'required' => 'Poin Prestasi Harus diisi !'
		]);


        if($this->form_validation->run() == false){
            $data['title'] = "Poin prestasi";
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();
            render($this,'poin_prestasi/index', $data);
        }else{
            $data = [
				'kode_prestasi'      => htmlspecialchars($this->input->post('jenis_prestasi', true) ),
				'sub_jenis_prestasi' => htmlspecialchars($this->input->post('detail_prestasi',true )),
                'poin'                => htmlspecialchars($this->input->post('poin_prestasi', true)),
            ];

           if( $this->input->post('jenis_prestasi') == 0){
            $this->session->set_flashdata("danger", '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Harap pilih jenis prestasi dulu !.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('poin_prestasi');
           }else{
            $this->Poin_prestasi_model->insert_poin_prestasi($data);
            $this->session->set_flashdata("flash2", '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Poin Prestasi berhasil ditambahkan.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('poin_prestasi');
           }
    
        }
    }


    public function hapus($id){
        $data = $this->db->get_where('sub_poin_prestasi', ['id' => $id])->row_array();
        $this->Poin_prestasi_model->hapusPoin($id);
        $this->session->set_flashdata("flash2", '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data Poin <b>' . $data['sub_jenis_prestasi']  .  '</b> berhasil dihapus.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('poin_prestasi');
    }


    

    
}