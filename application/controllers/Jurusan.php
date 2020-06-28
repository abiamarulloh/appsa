<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Controller {
    public function __construct(){
		parent::__construct();
        $this->load->model('Jurusan_model');
        $this->load->model('About_model');

        is_logged_in();
    }

    // Jurusan Index
    public function index(){
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();
        $user = $data['user'];

        $data['about_us'] = $this->About_model->about_all();
            
            
            $data['jurusanAll'] = $this->Jurusan_model->jurusanAll();
            $data['tbl_Murid_0'] = $this->db->get('tbl_murid')->num_rows();


            $data['title'] = "Jurusan";
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();
            render($this,'jurusan/index',$data );
  
    }
    

    public function tambah_jurusan(){
        $data['about_us'] = $this->About_model->about_all();

        $this->form_validation->set_rules('kodeJurusan', '', 'required',[
            'required' => 'Kode Jurusan tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('singkatanJurusan', '', 'required',[
            'required' => 'Singkatan Jurusan tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('namaJurusan', '', 'required',[
            'required' => 'Nama Jurusan tidak boleh kosong'
        ]);


        if($this->form_validation->run() == false) {
            $data['title'] = "Tambah Jurusan";
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();
            render($this,'jurusan/tambah_jurusan',$data );
        }else{
            $data = [
                'kode_jurusan' => htmlspecialchars($this->input->post('kodeJurusan', true)),
                'singkatan_jurusan' => htmlspecialchars($this->input->post('singkatanJurusan', true)),
                'nama_jurusan' => htmlspecialchars($this->input->post('namaJurusan', true)),
                'status' => 1
            ];

            $this->Jurusan_model->insert_jurusan($data);
            $this->session->set_flashdata("flash2", '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Jurusan <b>'. $this->input->post('namaJurusan')  .'</b> berhasil ditambahkan.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('jurusan');
        }


    }


    public function enable($id){
        $data['about_us'] = $this->About_model->about_all();

        $data = [
            'status' => 1
        ];
        $this->Jurusan_model->edit_jurusan($data, $id);
        $this->session->set_flashdata("flash2", '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data Jurusan <b>' . $nama  .  '</b> berhasil diperbarui.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('jurusan');
	}

    public function disable($id){
        $data['about_us'] = $this->About_model->about_all();

        $data = [
            'status' => 0
        ];
        
        $this->Jurusan_model->edit_jurusan($data, $id);
        $this->session->set_flashdata("flash2", '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data Jurusan <b>' . $nama  .  '</b> berhasil diperbarui.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('jurusan');
    }
    

    // Hapus Jurusan
    public function hapus_jurusan($id){
        $data['about_us'] = $this->About_model->about_all();

        $this->Jurusan_model->hapus_jurusan($id);
        $jurusan = $this->db->get_where('jurusan', ['id' => $id])->row_array();
        $this->session->set_flashdata("flash2", '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data jurusan <b>'. $jurusan['nama_jurusan']  .'</b> berhasil dihapus.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect("jurusan");
    }




}