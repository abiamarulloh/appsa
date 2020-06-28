<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Haid extends CI_Controller {
    public function __construct(){
		parent::__construct();
        $this->load->model('Haid_model');
        $this->load->model('About_model');
        $this->load->model('Murid_model');
        $this->load->model('Setting_pdf_model');
        $this->load->model('Users_model');

        is_logged_in();
	}


    // Haid Index
    public function index(){
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();
        $user = $data['user'];
        
        $data['about_us'] = $this->About_model->about_all();

        $data['jurusanAll'] = $this->Murid_model->jurusanAll();

        $data['getSiswiJoin'] = $this->Haid_model->getSiswiJoin()->result_array();
        $data['title'] = "Haid";
        render($this,'haid/index', $data);
    }


    // Tambah Tanggal Haid
    public function tambah_haid($nisn_id){
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();

        $data['about_us'] = $this->About_model->about_all();

       
        $data['getSiswiById'] = $this->Haid_model->getSiswiById($nisn_id)->row_array();
        $nama = $data['getSiswiById']['nama'];

        $this->form_validation->set_rules('nisn_tbl_murid', '', 'required',[
            'required' => 'Nisn Tidak Boleh Kosong !!!'
        ]);

        $this->form_validation->set_rules('tanggal', '', 'required',[
            'required' => 'Tanggal Tidak Boleh Kosong !!!'
        ]);

        $this->form_validation->set_rules('harike', '', 'required',[
            'required' => 'Hari ke- Tidak Boleh Kosong !!!'
        ]);

        if($this->form_validation->run() == false){        
            $data['title'] = "Tambah Bulan Haid";
            render($this,'haid/tambah_haid', $data);

        }else{
            $data = [
                'nisn_tbl_murid'    => htmlspecialchars($this->input->post('nisn_tbl_murid', true) ),
                'tanggal'           => htmlspecialchars($this->input->post('tanggal', true)),
                'harike'            => htmlspecialchars($this->input->post('harike', true)),
                'waktu'             => htmlspecialchars($this->input->post('waktu', true)),
                'date'              => time(),
                'kelas'             => htmlspecialchars($this->input->post("kelasUpdate", true))
            ];

            $this->Haid_model->insertHaid($data);
            $this->session->set_flashdata("flash2", '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Haid ' . $nama . ' berhasil ditambahkan.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('haid');
        }


    }


    // Edit Tanggal Haid
    public function edit_haid($nisn_id){
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();

        $data['about_us'] = $this->About_model->about_all();

       
        $data['getSiswiById']       = $this->Haid_model->getSiswiById($nisn_id)->row_array();
        $data['getSiswiJoinById']   = $this->Haid_model->getSiswiJoinById($nisn_id)->row_array();
        

        $this->form_validation->set_rules('nisn_tbl_murid', '', 'required',[
            'required' => 'Nama Tidak Boleh Kosong !!!'
        ]);

        if($this->form_validation->run() == false){        
            $data['title'] = "Edit Bulan Haid";
            render($this,'haid/edit_haid', $data);

        }else{
            $data = [
                'nisn_tbl_murid'    => htmlspecialchars($this->input->post('nisn_tbl_murid', true) ),
                'tanggal'             => $this->input->post('tanggal', true),
                'date'              => time()
            ];

            $this->Haid_model->updateHaid($data, $nisn_id);
            $this->session->set_flashdata("flash2", '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Murid Haid berhasil diedit.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('haid/index');
        }


    }

    // Detail Tanggal Haid
    public function option_detail_haid($nisn_id){
        $data['title'] = "Option Detail Haid";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();
        if( $nisn_id == null ){
            redirect('dashboard');
        }

        $data['about_us'] = $this->About_model->about_all();

        
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();
       
        $data['getSiswiJoin_pagi']   = $this->Haid_model->getSiswiJoinById_pagi($nisn_id)->result_array();

        $data['getSiswiJoin_siang']   = $this->Haid_model->getSiswiJoinById_siang($nisn_id)->result_array();

        $data['getSiswiById'] = $this->Haid_model->getSiswiById($nisn_id)->row_array();
        
        $data['getSiswiJoinByTanggal']   = $this->Haid_model->getSiswiJoinByTanggal($nisn_id)->result_array();
        
        $data['title'] = "Option Detail Haid";
        render($this,'haid/option_detail_haid', $data);
        $this->session->set_flashdata('nisn', $nisn_id);

    }

    // detail Kelas X
    public function detail_kelas_x($nisn_id){
        $data['about_us'] = $this->About_model->about_all();

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();
        $data['getSiswiJoin'] = $this->Haid_model->getSiswiJoin()->result_array();
       
        $data['getSiswiJoin_pagi']   = $this->Haid_model->getSiswiJoinById_pagi($nisn_id)->result_array();

        $data['getSiswiJoin_siang']   = $this->Haid_model->getSiswiJoinById_siang($nisn_id)->result_array();

        $data['getSiswiById'] = $this->Haid_model->getSiswiById($nisn_id)->row_array();
        
        $data['getSiswiJoinByTanggal']   = $this->Haid_model->getSiswiJoinByTanggal($nisn_id)->result_array();
        
        $data['title'] = "Detail Haid Kelas X";
        render($this,'haid/detail_kelas_x', $data);

    }

    // detail Kelas XI
    public function detail_kelas_xi($nisn_id){
        $data['about_us'] = $this->About_model->about_all();


        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();
        
        $data['getSiswiJoin_pagi']   = $this->Haid_model->getSiswiJoinById_pagi($nisn_id)->result_array();

        $data['getSiswiJoin_siang']   = $this->Haid_model->getSiswiJoinById_siang($nisn_id)->result_array();

        $data['getSiswiById'] = $this->Haid_model->getSiswiById($nisn_id)->row_array();
        
        $data['getSiswiJoinByTanggal']   = $this->Haid_model->getSiswiJoinByTanggal($nisn_id)->result_array();
        
        $data['title'] = "Detail Haid Kelas XI";
        render($this,'haid/detail_kelas_xi', $data);
    }


    // detail Kelas XII
    public function detail_kelas_xii($nisn_id){
        $data['about_us'] = $this->About_model->about_all();


        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();
        
        $data['getSiswiJoin_pagi']   = $this->Haid_model->getSiswiJoinById_pagi($nisn_id)->result_array();

        $data['getSiswiJoin_siang']   = $this->Haid_model->getSiswiJoinById_siang($nisn_id)->result_array();

        $data['getSiswiById'] = $this->Haid_model->getSiswiById($nisn_id)->row_array();
        
        $data['getSiswiJoinByTanggal']   = $this->Haid_model->getSiswiJoinByTanggal($nisn_id)->result_array();
        
        $data['title'] = "Detail Haid Kelas XII";
        render($this,'haid/detail_kelas_xii', $data);

    }

    // Hapus Tanggal Haid
    public function hapus_haid($id){
        $data['about_us'] = $this->About_model->about_all();

        $this->db->from("tbl_murid");
        $this->db->join("haid", "haid.nisn_tbl_murid = tbl_murid.nisn_id");
        $this->db->where(['id' => $id]);
        $murid = $this->db->get()->row_array();
        

        $this->Haid_model->hapusHaid($id);
        $this->session->set_flashdata("flash2", '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data haid <b>'. $murid['nama']  .'</b> berhasil dihapus.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        if($murid['kelas'] == 1) { redirect('haid/detail_kelas_x/' . $murid['nisn_id']); }
        elseif($murid['kelas'] == 2) { redirect('haid/detail_kelas_xi/' . $murid['nisn_id']); }
        elseif($murid['kelas'] == 3) { redirect('haid/detail_kelas_xii/' . $murid['nisn_id']); }
    }


     // Export PDF Haid
     public function laporan_haid_pdf_x($nisn_id){
        $data['about_us'] = $this->About_model->about_all();
        
         $data['title'] = "Pdf Murid Haid";
         $this->load->library('Pdf');
         $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();
         $data['userAll'] = $this->db->get_where('user')->result_array();

         $data['jurusanAll'] = $this->Users_model->jurusanAll();

        // Setting Laporan PDF
        $data['laporan_pdf'] = $this->Setting_pdf_model->laporan_pdf();


        //  menampilkan data murid
         $data['getMuridKelasJurusanById'] = $this->Haid_model->getMuridKelasJurusanById($nisn_id)->row_array();
         
         $data['getMuridKelasJurusanByIdPoin'] = $this->Haid_model->getMuridKelasJurusanById($nisn_id)->result_array();
       
         

        //  menampilkan data haid murid
        $data['getSiswiJoin_pagi']   = $this->Haid_model->getSiswiJoinById_pagi($nisn_id)->result_array();

        $data['getSiswiJoin_siang']   = $this->Haid_model->getSiswiJoinById_siang($nisn_id)->result_array();

        $data['getSiswiById'] = $this->Haid_model->getSiswiById($nisn_id)->row_array();
        
        $data['getSiswiJoinByTanggal']   = $this->Haid_model->getSiswiJoinByTanggal($nisn_id)->result_array();

        
        $this->load->view('haid/laporan_haid_pdf_x', $data);
     
        $paper_size = 'A4';
        $orientation = 'Portrait';
        $html = $this->output->get_output();
        $this->pdf->set_paper($paper_size , $orientation );
    
        $this->pdf->load_html($html);
        // Output the generated PDF to Browser
        $this->pdf->render();
        $this->pdf->stream('Laporan_haid_Kelas_X' . $data['getMuridKelasJurusanById']['nama'] . '.pdf', Array('Attachment' => 0));
    }

    // Laporan Kelas XI
    public function laporan_haid_pdf_xi($nisn_id){
        $data['about_us'] = $this->About_model->about_all();
        // Setting Laporan PDF
        $data['laporan_pdf'] = $this->Setting_pdf_model->laporan_pdf();

        $data['jurusanAll'] = $this->Users_model->jurusanAll();

        $data['title'] = "Pdf Murid Haid";
        $this->load->library('Pdf');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();
        $data['userAll'] = $this->db->get_where('user')->result_array();


       //  menampilkan data murid
        $data['getMuridKelasJurusanById'] = $this->Haid_model->getMuridKelasJurusanById($nisn_id)->row_array();
        
        $data['getMuridKelasJurusanByIdPoin'] = $this->Haid_model->getMuridKelasJurusanById($nisn_id)->result_array();
      
        

       //  menampilkan data haid murid
       $data['getSiswiJoin_pagi']   = $this->Haid_model->getSiswiJoinById_pagi($nisn_id)->result_array();

       $data['getSiswiJoin_siang']   = $this->Haid_model->getSiswiJoinById_siang($nisn_id)->result_array();

       $data['getSiswiById'] = $this->Haid_model->getSiswiById($nisn_id)->row_array();
       
       $data['getSiswiJoinByTanggal']   = $this->Haid_model->getSiswiJoinByTanggal($nisn_id)->result_array();

       
       $this->load->view('haid/laporan_haid_pdf_xi', $data);
    
       $paper_size = 'A4';
       $orientation = 'Portrait';
       $html = $this->output->get_output();
       $this->pdf->set_paper($paper_size , $orientation );
   
       $this->pdf->load_html($html);
       // Output the generated PDF to Browser
       $this->pdf->render();
       $this->pdf->stream('Laporan_haid_kelas_XI' . $data['getMuridKelasJurusanById']['nama'] . '.pdf', Array('Attachment' => 0));
   }


    // Laporan Haid Kelas XII
    public function laporan_haid_pdf_xii($nisn_id){
        $data['about_us'] = $this->About_model->about_all();
        
        $data['jurusanAll'] = $this->Users_model->jurusanAll();

        // Setting Laporan PDF
        $data['laporan_pdf'] = $this->Setting_pdf_model->laporan_pdf();

        $data['title'] = "Pdf Murid Haid";
        $this->load->library('Pdf');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();
        $data['userAll'] = $this->db->get_where('user')->result_array();


       //  menampilkan data murid
        $data['getMuridKelasJurusanById'] = $this->Haid_model->getMuridKelasJurusanById($nisn_id)->row_array();
        
        $data['getMuridKelasJurusanByIdPoin'] = $this->Haid_model->getMuridKelasJurusanById($nisn_id)->result_array();
      
        

       //  menampilkan data haid murid
       $data['getSiswiJoin_pagi']   = $this->Haid_model->getSiswiJoinById_pagi($nisn_id)->result_array();

       $data['getSiswiJoin_siang']   = $this->Haid_model->getSiswiJoinById_siang($nisn_id)->result_array();

       $data['getSiswiById'] = $this->Haid_model->getSiswiById($nisn_id)->row_array();
       
       $data['getSiswiJoinByTanggal']   = $this->Haid_model->getSiswiJoinByTanggal($nisn_id)->result_array();

       
       $this->load->view('haid/laporan_haid_pdf_xii', $data);
    
       $paper_size = 'A4';
       $orientation = 'Portrait';
       $html = $this->output->get_output();
       $this->pdf->set_paper($paper_size , $orientation );
   
       $this->pdf->load_html($html);
       // Output the generated PDF to Browser
       $this->pdf->render();
       $this->pdf->stream('Laporan_haid_Kelas_XII' . $data['getMuridKelasJurusanById']['nama'] . '.pdf', Array('Attachment' => 0));
   }
   



    // Fungsi Yang harus dijalankan Pertama Kali
    // public function updateKelas(){
    //     // query tbl_murid tampilkan
    //     $murid_kelas = $this->db->get("tbl_murid")->result_array();

    //     // Query tbl_murid masukkan kelas tbl_murid ke dalam kelas tbl_murid_poin
    //     foreach($murid_kelas as $kelas){
    //         $data =  [
    //             "kelas" => $kelas['kelas']
    //         ];

    //         $this->db->where("nisn_tbl_murid", $kelas['nisn_id']);
    //         $this->db->update("haid", $data);
            
    //     }

    // }




    



    
}