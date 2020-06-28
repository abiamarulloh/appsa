<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Managemen_menu extends CI_Controller {
    public function __construct(){
		parent::__construct();
        $this->load->model('Managemen_menu_model');
        $this->load->model('About_model');

        is_logged_in();
    }
    
    // View Menu
	public function index()
	{
        $data['about_us'] = $this->About_model->about_all();

        $data['user']     = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();
        $data['get_menu'] = $this->Managemen_menu_model->getMenu(); 
        $data['get_role'] = $this->Managemen_menu_model->getRole(); 
        $data['get_menu_role'] = $this->Managemen_menu_model->getMenuRole(); 

        $data['title'] = "Management Menu";
        render($this,'managemen_menu/index', $data);
    }

    // View  role
    public function v_role()
	{
        $data['about_us'] = $this->About_model->about_all();

        $data['user']     = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();
        $data['get_menu'] = $this->Managemen_menu_model->getMenu(); 
        $data['get_role'] = $this->Managemen_menu_model->getRole(); 
        $data['get_menu_role'] = $this->Managemen_menu_model->getMenuRole(); 

        $data['title'] = "Managemen Menu - Tambah Role";
        render($this,'managemen_menu/v_role', $data);
    }


       // View  Menu
    public function v_menu()
	{
        $data['about_us'] = $this->About_model->about_all();

        $data['user']     = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();
        $data['get_menu'] = $this->Managemen_menu_model->getMenu(); 
        $data['get_role'] = $this->Managemen_menu_model->getRole(); 
        $data['get_menu_role'] = $this->Managemen_menu_model->getMenuRole(); 

        $data['title'] = "Managemen Menu - Tambah Menu";
        render($this,'managemen_menu/v_menu', $data);
    }


    // View access Menu
    public function v_access_menu()
	{
        $data['about_us'] = $this->About_model->about_all();

        $data['user']     = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();
        $data['get_menu'] = $this->Managemen_menu_model->getMenu(); 
        $data['get_role'] = $this->Managemen_menu_model->getRole(); 
        $data['get_menu_role'] = $this->Managemen_menu_model->getMenuRole(); 

        $data['title'] = "Management Menu - Akses Menu";
        render($this,'managemen_menu/v_access_menu', $data);
    }




    // Add Menu
    public function add_menu()
	{
        $data['about_us'] = $this->About_model->about_all();
   
        $this->form_validation->set_rules('menu_id', '', 'required',[
            'required' => 'ID Menu tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('url', '', 'required',[
            'required' => 'URL  tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('icon', '', 'required',[
            'required' => 'Icon tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('nama_menu', '', 'required',[
            'required' => 'Nama Menu tidak boleh kosong'
        ]);


        if($this->form_validation->run() == false) {
            $data['user']     = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();
            $data['title'] = "Tambah Menu";
            render($this,'managemen_menu/add_menu', $data);
        }else{
            $data = [
                'menu_id' => htmlspecialchars($this->input->post('menu_id', true)),
                'url' => htmlspecialchars($this->input->post('url', true)),
                'icon' => htmlspecialchars($this->input->post('icon', true)),
                'nama_menu' => htmlspecialchars($this->input->post('nama_menu', true)),
            ];

            // Cek ID Menu Duplikat
            $menu_id = $this->db->get_where("menu", ['menu_id' => $data['menu_id'] ])->row_array();
            if($menu_id['menu_id'] == $data['menu_id']){
                $this->session->set_flashdata("add_menu", '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>ID Menu <b>'.  $data['menu_id']  .'</b> Sudah terpakai.</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('managemen_menu/add_menu');
            }else{
                $this->Managemen_menu_model->insertMenu($data);
                $this->session->set_flashdata("add_menu", '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data Menu <b>'.  $data['nama_menu'] .'</b> berhasil ditambahkan.</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('managemen_menu/v_menu');
            }

        }

    }


    // Add role
    public function add_role()
	{
        $data['about_us'] = $this->About_model->about_all();
    

        $this->form_validation->set_rules('role_id', '', 'required',[
            'required' => 'ID Role tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('role', '', 'required',[
            'required' => 'Role  tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('description', '', 'required',[
            'required' => 'Description  tidak boleh kosong'
        ]);



        if($this->form_validation->run() == false) {
            $data['user']     = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();
            $data['title'] = "Tambah Role";
            render($this,'managemen_menu/add_role', $data);
        }else{
            $data = [
                'role_id' => htmlspecialchars($this->input->post('role_id', true)),
                'role' => htmlspecialchars($this->input->post('role', true)),
                'description' => htmlspecialchars($this->input->post('description', true)),
            ];

            // Cek ID Menu Duplikat
            $role_id = $this->db->get_where("role", ['role_id' => $data['role_id'] ])->row_array();
            if($role_id['role_id'] == $data['role_id']){
                $this->session->set_flashdata("add_role", '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>ID Role <b>'. $data['role_id'] .'</b> Sudah terpakai.</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('managemen_menu/add_role');
            }else{
                $this->Managemen_menu_model->insertRole($data);
                $this->session->set_flashdata("add_role", '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data Role <b>'. $data['role']  .'</b> berhasil ditambahkan.</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('managemen_menu/v_role');
            }

        }


    }


    // Add access menu
    public function add_access_menu()
	{   
        $data['about_us'] = $this->About_model->about_all();

        $data['get_menu'] = $this->Managemen_menu_model->getMenu(); 
        $data['get_role'] = $this->Managemen_menu_model->getRole(); 
        $data['user']     = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();

        $this->form_validation->set_rules('role_id', '', 'required',[
            'required' => 'Role tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('menu_id', '', 'required',[
            'required' => 'Menu  tidak boleh kosong'
        ]);


        if($this->form_validation->run() == false) {
            $data['title'] = "Tambah Menu Role";
            render($this,'managemen_menu/add_access_menu', $data);
        }else{
            $data = [
                'menu_id' => htmlspecialchars($this->input->post('menu_id', true)),
                'role_id' => htmlspecialchars($this->input->post('role_id', true))
            ];

            // Cek ID Menu dan ID Role harus Pilih terlebih dahulu
            if( $data['role_id'] == 0 && $data['menu_id'] == 0 || $data['role_id'] == 0 && $data['menu_id'] != 0 || $data['role_id'] != 0 && $data['menu_id'] == 0){
                $this->session->set_flashdata("access_menu", '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Silahkan Pilih Data terlebih dahulu</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('managemen_menu/add_access_menu');
            }else{
                $this->Managemen_menu_model->insertMenuRole($data);
                $this->session->set_flashdata("access_menu", '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data Role Access Menu  berhasil ditambahkan.</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('managemen_menu/v_access_menu');
            }
        }
        
    }




    // Edit Menu Item
    public function edit_menu_item($id){
       
        $data['about_us'] = $this->About_model->about_all();
       

        $this->form_validation->set_rules('menu_id', '', 'required',[
            'required' => 'ID Menu tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('url', '', 'required',[
            'required' => 'URL  tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('icon', '', 'required',[
            'required' => 'Icon tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('nama_menu', '', 'required',[
            'required' => 'Nama Menu tidak boleh kosong'
        ]);


        if($this->form_validation->run() == false) {
            $data['user']     = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();
            $data['get_menu_item'] = $this->Managemen_menu_model->getMenuItem($id)->row(); 
            $data['title'] = "Managemen Menu - Edit Menu";
            render($this,'managemen_menu/edit_menu_item', $data);
        }else{
            $data = [
                'id' => htmlspecialchars($this->input->post('id', true)),
                'menu_id' => htmlspecialchars($this->input->post('menu_id', true)),
                'url' => htmlspecialchars($this->input->post('url', true)),
                'icon' => htmlspecialchars($this->input->post('icon', true)),
                'nama_menu' => htmlspecialchars($this->input->post('nama_menu', true))
            ];

 
            $this->Managemen_menu_model->updateMenu($data, $id);
            $this->session->set_flashdata("add_menu", '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Menu <b>'.  $data['nama_menu'] .'</b> berhasil diperbarui.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('managemen_menu/v_menu');

        }
    }


    // Delete Menu Item
    public function delete_menu_item($id){
        $data['about_us'] = $this->About_model->about_all();

            $data = $this->db->get_where("menu", ['id' => $id])->row();
            $this->Managemen_menu_model->deleteMenu($id);
            $this->session->set_flashdata("add_menu", '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Data Menu <b>'.  $data->nama_menu .'</b> berhasil dihapus.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('managemen_menu/v_menu');
    }


    // Edit access menu
    public function edit_access_menu_item($id)
	{   
        $data['about_us'] = $this->About_model->about_all();

        $data['get_menu_role_item'] = $this->Managemen_menu_model->getMenuRoleItem($id); 
        $nama_menu = $data['get_menu_role_item']->nama_menu;
        $nama_role = $data['get_menu_role_item']->role;
        $id_menu_role =  $data['get_menu_role_item']->id_menu_role;
        $data['get_menu'] = $this->Managemen_menu_model->getMenu(); 
        $data['get_role'] = $this->Managemen_menu_model->getRole(); 

        $data['user']     = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();

        $this->form_validation->set_rules('role_id', '', 'required',[
            'required' => 'Role tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('menu_id', '', 'required',[
            'required' => 'Menu  tidak boleh kosong'
        ]);


        if($this->form_validation->run() == false) {
            $data['title'] = "Tambah Menu Role";
            render($this,'managemen_menu/edit_access_menu_item', $data);
        }else{
            $data = [
                'id' => htmlspecialchars($this->input->post('id', true)),
                'menu_id' => htmlspecialchars($this->input->post('menu_id', true)),
                'role_id' => htmlspecialchars($this->input->post('role_id', true))
            ];

            // Cek ID Menu dan ID Role harus Pilih terlebih dahulu
            if( $data['role_id'] == 0 && $data['menu_id'] == 0 || $data['role_id'] == 0 && $data['menu_id'] != 0 || $data['role_id'] != 0 && $data['menu_id'] == 0){
                $this->session->set_flashdata("access_menu", '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Silahkan Pilih Data terlebih dahulu</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('managemen_menu/edit_access_menu_item/' . $id_menu_role);
            }else{
                $this->Managemen_menu_model->updateMenuRole($data, $id);
                $this->session->set_flashdata("access_menu", '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data Role Access Menu "' . $nama_menu  . '" dan Role "'  .  $nama_role . '"  berhasil diupdate.</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('managemen_menu/v_access_menu');
            }
        }
        
    }


    // Delete Menu Item
    public function delete_access_menu_item($id){
        $data['about_us'] = $this->About_model->about_all();

            $data = $this->db->get_where("menu", ['id' => $id])->row();
            $this->Managemen_menu_model->deleteMenu($id);
            $this->session->set_flashdata("add_menu", '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Data Menu <b>'.  $data->nama_menu .'</b> berhasil dihapus.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('managemen_menu/v_access_menu');
    }

    
}