<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Auth_model');
		$this->load->model('About_model');

	}

	public function index()
	{

		if($this->session->has_userdata('email') == true){
            redirect('upacara');
		}
	

		// Covid-19
		$url="https://covid19.mathdro.id/api/confirmed";
		$get_url = file_get_contents($url);
		$json = json_decode($get_url);
		
	
		
		$data['datalist'] = $json;

		$data['about_us'] = $this->About_model->about_all();

		
		$data['title'] = "Login - APPSA";
		
		$this->form_validation->set_rules('email', '', 'required', [
			'required' => "email tidak boleh kosong." 
		]);
		$this->form_validation->set_rules('password', '', 'required', [
			'required' => "kata Sandi  tidak boleh kosong.",
		]);

		if($this->form_validation->run() == false){
			$this->load->view('auth/index', $data);
		}else{
			$this->_login();
		}
	}

	private function _login(){
		// input user
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		// user tabel
		$user = $this->db->get_where('user', ['email' => $email])->row_array();
		
		if($user) {
			if(password_verify($password, $user['password'])) {
				
				$data = [
					'email' => $user['email'],
					'role_id' => $user['role_id']
				];
				$this->session->set_userdata($data);
				redirect("upacara");
			}else{
				$this->session->set_flashdata("flash", '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Password Salah</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
			redirect('auth');
			}

		}else {
			$this->session->set_flashdata("flash", '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Email Tidak Terdaftar</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
			redirect('auth');
		}

	}
  
	public function register()
	{

		
        $data['title'] = "Register";
		
		$this->form_validation->set_rules('nama', '', 'required', [
			'required' => "Nama Lengkap harus diisi !"
		]);
		$this->form_validation->set_rules('email', '', 'required', [
			'required' => "Email Lengkap harus diisi !"
		]);
		$this->form_validation->set_rules('password1', '', 'required|min_length[5]', [
			'required' => "kata Sandi  harus diisi !",
			'min_length' => "kata sandi terlalu Pendek"
		]);
		$this->form_validation->set_rules('password2', '', 'required|matches[password1]', [
			'required' => "Konfirmasi Kata sandi harus diisi !",
			'matches' => "kata sandi Tidak Sama"
		]);
		if($this->form_validation->run() == false){
			$this->load->view('templates/header', $data);
			$this->load->view('auth/register', $data);
			$this->load->view('templates/footer', $data);        
		}else{
			$data = [
				'nama' => htmlspecialchars($this->input->post('nama',true)),
				'email' => htmlspecialchars($this->input->post('email',true)),
				'password' => htmlspecialchars($this->input->post('password1',true)),
				'kelas_id' => htmlspecialchars($this->input->post('kelas',true)),
				'jurusan_id' => htmlspecialchars($this->input->post('jurusan',true))
			];

			$this->Auth_model->insertUser($data);
			$this->session->set_flashdata("flash", '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil daftar, Silahkan Login!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
			redirect('auth');
		}
	}

	public function logout(){
		$this->session->unset_userdata('email');
		$this->session->set_flashdata("flash", '<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Anda Berhasil Logout</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>');
	redirect('auth');
	}
	
	public function blocked_access(){
		 $this->load->view("auth/blocked_access");
	}


	

}
