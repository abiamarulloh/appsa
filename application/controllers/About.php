<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {
    public function __construct(){
		parent::__construct();
        $this->load->model('About_model');
        is_logged_in();
	}

  
	public function index()
	{
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();

        $data['about_us'] = $this->About_model->about_all();

    
            $this->form_validation->set_rules('name_school' , '' , 'required',[
                'required' => 'Nama Sekolah Harus diisi !'
            ]);
            $this->form_validation->set_rules('address_school' , '' , 'required',[
                'required' => 'Alamat Sekolah Harus diisi !'
            ]);
          
         
            if($this->form_validation->run() == false){        
                $data['title'] = "About us";
                render($this,'about/index', $data);
            }else{
              

                $name_school = htmlspecialchars($this->input->post('name_school', true) );
                $address_school = htmlspecialchars($this->input->post('address_school', true) );
                $date = time();

                // Cek Jika ada gambar yang di upload
                $upload_image = $_FILES['image']['name'];

                if($upload_image){
                    $config['upload_path'] = "./assets/sbadmin2/img/about/" ;
                    $config['allowed_types'] = "gif|jpg|jpeg|png|webp" ;
                    $config['max_size'] = "2048" ;

                    $this->load->library('upload', $config);

                    if($this->upload->do_upload("image")){
                        $Query_foto_lama = $this->db->get("about")->row_array();
                        $foto_lama = $Query_foto_lama['image'];

                        if($foto_lama != "default.png"){
                            unlink(FCPATH . "assets/sbadmin2/img/about/" . $foto_lama);
                        }

                        $image_new = $this->upload->data("file_name");
                        $this->db->set("image", $image_new );
                    }else {
                        echo $this->upload->display_errors();
                    }
                    
                }
              

                $this->db->set("name_school", $name_school );
                $this->db->set("address_school", $address_school );
                $this->db->set("date", $date );
                $this->db->update("about");
    
                $this->session->set_flashdata("flash2", '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data Detail Sekolah berhasil di Perbarui.</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('about');
            }
    
    }


    
}