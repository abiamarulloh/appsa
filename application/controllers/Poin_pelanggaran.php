<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poin_pelanggaran extends CI_Controller {
    public function __construct(){
		parent::__construct();
        $this->load->model('Poin_pelanggaran_model');
        $this->load->model('About_model');

        is_logged_in();
	}

 
    // Menu Poin_pelanggaran
    public function index()
	{
        $data['poin_pelanggaran'] = $this->Poin_pelanggaran_model->get_poin_pelanggaran();
        $data['about_us'] = $this->About_model->about_all();

        $this->form_validation->set_rules('pelanggaran' , 'Pelanggaran' , 'required', [
			'required' => "Pelanggaran Harus diisi !"
		]);
		$this->form_validation->set_rules('pasal' , 'Pasal Yang dilanggaran' , 'required', [
			'required' => 'Pasal Harus diisi !'
		]);
		$this->form_validation->set_rules('poin_pelanggaran' , 'Poin pelanggaran' , 'required',[
			'required' => 'Poin pelanggaran Harus diisi !',
		]);
		$this->form_validation->set_rules('tindakan' , 'tindakan' , 'required',[
			'required' => 'Tindakan Harus diisi !',
		]);


        if($this->form_validation->run() == false){
            $data['title'] = "Poin pelanggaran";
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();
            render($this,'poin_pelanggaran/index', $data);
        }else{
            $data = [
				'pelanggaran'   => htmlspecialchars($this->input->post('pelanggaran', true) ),
				'pasal'         => htmlspecialchars($this->input->post('pasal', true)),
				'poin'          => htmlspecialchars($this->input->post('poin_pelanggaran',true )),
				'tindakan'      => htmlspecialchars($this->input->post('tindakan', true))
			];

            $this->Poin_pelanggaran_model->insert_poin_pelanggaran($data);
            $this->session->set_flashdata("flash2", '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Poin pelanggaran berhasil ditambahkan.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('poin_pelanggaran');
        }
    }

    public function hapus($id){
        $data = $this->db->get_where('poin', ['id' => $id])->row_array();
        $this->Poin_pelanggaran_model->hapusPoin($id);
        $this->session->set_flashdata("flash2", '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data Poin <b>' . $data['pelanggaran']  .  '</b> berhasil dihapus.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('poin_pelanggaran');
    }


    
}
