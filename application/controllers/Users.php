<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
    public function __construct(){
		parent::__construct();
        $this->load->model('Users_model');
        $this->load->model('About_model');
        is_logged_in();
	}
	
    // Menu Users
    public function index(){
        $data['about_us'] = $this->About_model->about_all();
            
        $data['title'] = "Users";
        $data['jurusanAll'] = $this->Users_model->jurusanAll();
        
        // Tampilkan Users
        $data['getUsers']  = $this->Users_model->getUsers()->result_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();
        $user = $data['user'];

        // Query Memanggil Data Role
        $data['role_id'] = $this->db->get('role')->result_array();


        $this->form_validation->set_rules('nama' , '' , 'required', [
            'required' => 'Nama Lengkap Users Harus diisi !'
        ]);
        $this->form_validation->set_rules('email' , '' , 'required',[
            'required' => 'Email Harus diisi !'
        ]);
        $this->form_validation->set_rules('password' , '' , 'required',[
            'required' => 'Password Harus diisi !'
        ]);

        $this->form_validation->set_rules('desc' , '' , 'required',[
            'required' => 'Deskripsi Harus diisi !'
        ]);
        
        if($this->form_validation->run() == false){        
            render($this,'users/index',$data );
        }else{
            $data = [
                'role_id'       => htmlspecialchars($this->input->post('role_id', true) ),
                'nama'          => htmlspecialchars($this->input->post('nama', true) ),
                'email'         => htmlspecialchars($this->input->post('email', true)),
                'password'      => password_hash($this->input->post('password' ), PASSWORD_DEFAULT),
                'description'   => htmlspecialchars($this->input->post('desc', true)),
                'date'          => time()
            ];

            $this->Users_model->insertUsers($data);
            $this->session->set_flashdata("flash2", '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Users berhasil ditambahkan.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('users');
        }

    }


    // edit Users
    public function edit_user($id){
        $data['about_us'] = $this->About_model->about_all();

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();

        $data['title'] = "Edit Users";
        $data['getUsersById']  = $this->Users_model->getUsersById($id)->row_array();

        $data['jurusanAll'] = $this->Users_model->jurusanAll();
        
        $this->form_validation->set_rules('nama' , '' , 'required', [
            'required' => 'Nama Lengkap Users Harus diisi !'
        ]);
        $this->form_validation->set_rules('email' , '' , 'required',[
            'required' => 'Email Harus diisi !'
        ]);
      

        $this->form_validation->set_rules('description' , '' , 'required',[
            'required' => 'Deskripsi Harus diisi !'
        ]);

        if($this->form_validation->run() == false){        
            $this->load->view('users/edit_user', $data);
        }else{
            $data = [
                'id'            => htmlspecialchars($this->input->post('id', true) ),
                'nama'          => htmlspecialchars($this->input->post('nama', true) ),
                'email'         => htmlspecialchars($this->input->post('email', true)),
                'kelas_id'   => htmlspecialchars($this->input->post('kelas', true)),
                'jurusan_id'   => htmlspecialchars($this->input->post('jurusan', true)),
                'description'   => htmlspecialchars($this->input->post('description', true)),
                'date'          => time()
            ];

            $this->Users_model->updateUsers($id,$data);
            $this->session->set_flashdata("flash2", '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Users berhasil di Perbarui.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('users');
        }

    }



    
    public function hapus_users($id){
        $data['about_us'] = $this->About_model->about_all();

        $this->Users_model->hapusUsers($id);
        $this->session->set_flashdata("flash2", '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data Users  berhasil dihapus.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('Users/');
    }


    public function give_access_user($id){
        $data['about_us'] = $this->About_model->about_all();

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();

        $data['title'] = "Beri Akses Users";
        $data['getUsersById']  = $this->Users_model->getUsersById($id)->row_array();
        $data['jurusanAll'] = $this->Users_model->jurusanAll();


        $this->form_validation->set_rules('kelas' , '' , 'required',[
            'required' => 'kelas Harus diisi !'
        ]);

        $this->form_validation->set_rules('jurusan' , '' , 'required',[
            'required' => 'Jurusan Harus diisi !'
        ]);

        if($this->form_validation->run() == false) {
            $this->load->view('users/give_access_user', $data);
        }else {
            $data = [
                'id'                => htmlspecialchars($this->input->post('id', true) ),
                'kelas_id'          => htmlspecialchars($this->input->post('kelas', true)),
                'jurusan_id'        => htmlspecialchars($this->input->post('jurusan', true)),
                'date'              => time()
            ];
    
            $this->Users_model->updateKelasJurusanUser($id,$data);
            $this->session->set_flashdata("flash2", '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data kelas dan Jurusan User berhasil di Perbarui.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('users');
        }
       
    }


    // Ganti Password
    public function edit_password_user($id){
        $data['about_us'] = $this->About_model->about_all();

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();

        $data['title'] = "Edit Users";
        $data['getUsersById']  = $this->Users_model->getUsersById($id)->row_array();

        $data['jurusanAll'] = $this->Users_model->jurusanAll();
        
    
        $this->form_validation->set_rules('password' , '' , 'required',[
            'required' => 'password Harus diisi !'
        ]);
      
     
        if($this->form_validation->run() == false){        
            $this->load->view('users/edit_password_user', $data);
        }else{
            $data = [
                'id'            => htmlspecialchars($this->input->post('id', true) ),
                'password'          =>  password_hash( $this->input->post('password'), PASSWORD_DEFAULT ),
                'date'          => time()
            ];

            $this->Users_model->updatePasswordUsers($id,$data);
            $this->session->set_flashdata("flash2", '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Password User berhasil di Perbarui.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('users');
        }

    }



}