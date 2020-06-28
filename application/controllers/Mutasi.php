<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mutasi extends CI_Controller {
    public function __construct(){
		parent::__construct();
        $this->load->model('Mutasi_model');
        $this->load->model('Murid_model');
        $this->load->model('Haid_model');
        $this->load->model('About_model');
        $this->load->model('Users_model');
        $this->load->model('Setting_pdf_model');

        is_logged_in();
	}
	
    // Index Mutasi OPTION LIST OR ACTION
    public function index(){
        $data['about_us'] = $this->About_model->about_all();
        $data['jurusanAll'] = $this->Users_model->jurusanAll();
            
        $data['title'] = "Mutasi";
        
        // $data['getWalikelas']  = $this->Mutasi_model->getMutasi()->result_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();
        $user = $data['user'];

        render($this,'mutasi/index',$data );

    }




    // ACTION Mutasi
    public function action_mutasi(){
        $data['about_us'] = $this->About_model->about_all();
        $data['jurusanAll'] = $this->Users_model->jurusanAll();
            
        $data['title'] = "Action Mutasi";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();


        $data['jurusanAll'] = $this->Mutasi_model->jurusanAll();
        $data['getMuridKelasJurusan'] = $this->Mutasi_model->getMuridKelasJurusan($data['user']);
        $data['getDataPrestasi'] = $this->Mutasi_model->getMuridKelasJurusanByPrestasi($data['user']);

        $data['tbl_murid_0'] = $this->db->get('tbl_murid')->num_rows();


        if(!$this->input->post("checkItem")) {
            render($this,'mutasi/action_mutasi',$data );
        }else{
            $nisnCheckItem      =  $this->input->post("checkItem");
            $date_graduation    =  $this->input->post("date_graduation");

            // Jika tahun kelulusannya sudah ditambahkan dan terdapat sessionnya maka
            if($date_graduation){
                $this->Mutasi_model->mutasiNow($nisnCheckItem, $date_graduation);
                $this->session->set_flashdata("info-mutasi", '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Mutasi data berhasil, maka kelas x naik ke kelas xi, kelas xi naik ke kelas xii, dan kelas xii telah di luluskan. untuk data poin dari kelas x sampai kelas xii masih tersimpan dengan aman.</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                $this->session->unset_userdata('date_graduation');
                $this->session->unset_userdata('name_graduation');
                $this->session->unset_userdata('pw_post');

                redirect('mutasi');

            // Jika tahun kelulusannya belum ada maka beri peringatan dan pemberitahuan !!!
            }else {
                $base_url  = base_url('mutasi/add_date_graduation');
                $this->session->set_flashdata("info-mutasi", '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Mutasi data Gagal, kamu harus memberi nama dan tahun kelulusan terlebih dahulu dengan menekan tombol 
                    <a href=' . $base_url . ' class="btn btn-primary">Tambah Tahun Kelulusan</a> 
                </strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('mutasi/action_mutasi');

            }
        }
    }



    // ACTION Mutasi
    public function list_mutasi(){
        $data['about_us'] = $this->About_model->about_all();
            
        $data['title'] = "List Mutasi";
        $data['jurusanAll'] = $this->Users_model->jurusanAll();
        
        // $data['mutasi']  = $this->Mutasi_model->getMutasi()->result_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();
        $user = $data['user'];

        $data['date_graduation'] = $this->db->get("date_graduation")->result_array();

        $this->form_validation->set_rules("date_graduation", "", "required");

        if( $this->form_validation->run() == false ) {
            render($this,'mutasi/list_mutasi', $data );
        }else {
            $date_graduation = $this->input->post("date_graduation");
            $db_date_graduation = $this->db->get_where("date_graduation", ['date_graduation' => $date_graduation])->row_array();

            
            // Cek select Option ada atau tidak di database
            if( $date_graduation ==  0 ){
                $this->session->set_flashdata("info-mutasi", '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Silahkan Pilih Data terlebih dahulu</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('mutasi/list_mutasi/');
            }else{
                $date_graduation = [
                    "date_graduation" => $this->input->post("date_graduation")
                ];

                $this->session->set_userdata($date_graduation);
                redirect("mutasi/show_mutasi_murid/" );
            }

        }

    }



    // ACTION Mutasi
    public function show_mutasi_murid(){
        $data['about_us'] = $this->About_model->about_all();
        
        $data['title'] = "List Mutasi Murid ";
        
        // $data['mutasi']  = $this->Mutasi_model->getMutasi()->result_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();
        $user = $data['user'];
        $data['jurusanAll'] = $this->Users_model->jurusanAll();

        $data['date_graduation'] = $this->db->get_where("date_graduation", ['date_graduation' =>  $this->session->userdata("date_graduation")])->row_array();

        // Menampilkan data murid beserta Poin 
        $data['getMuridKelasJurusan'] = $this->Mutasi_model->getMuridKelasJurusan($data['user']);
        $data['getDataPrestasi'] = $this->Mutasi_model->getMuridKelasJurusanByPrestasi($data['user']);
        $data['jurusanAll'] = $this->Mutasi_model->jurusanAll();

        render($this,'mutasi/show_mutasi_murid', $data );

    }



     // ACTION Haid
    public function show_mutasi_Haid(){
        $data['about_us'] = $this->About_model->about_all();
        
        $data['title'] = "List Mutasi Haid ";
        $data['jurusanAll'] = $this->Users_model->jurusanAll();
        
        // $data['mutasi']  = $this->Mutasi_model->getMutasi()->result_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();
        $user = $data['user'];

        $data['date_graduation'] = $this->db->get_where("date_graduation", ['date_graduation' =>  $this->session->userdata("date_graduation")])->row_array();

        // Menampilkan data murid beserta Poin 
        $date  = $data['date_graduation']['date_graduation'];
        $data['getSiswiJoin'] = $this->Mutasi_model->getSiswiJoin($date)->result_array();
        render($this,'mutasi/show_mutasi_haid',$data );

    }

       // ACTION Mutasi
    public function list_mutasi_haid(){
        $data['about_us'] = $this->About_model->about_all();
            
        $data['title'] = "List Mutasi Haid";
        $data['jurusanAll'] = $this->Users_model->jurusanAll();
        
        // $data['mutasi']  = $this->Mutasi_model->getMutasi()->result_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();
        $user = $data['user'];

        $data['date_graduation'] = $this->db->get("date_graduation")->result_array();

        $this->form_validation->set_rules("date_graduation", "", "required");

        if( $this->form_validation->run() == false ) {
            render($this,'mutasi/list_mutasi_haid',$data );
        }else {
            $date_graduation = $this->input->post("date_graduation");
            $db_date_graduation = $this->db->get_where("date_graduation", ['date_graduation' => $date_graduation])->row_array();

            
            // Cek select Option ada atau tidak di database
            if( $date_graduation ==  0 ){
                $this->session->set_flashdata("info-mutasi", '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Silahkan Pilih Data terlebih dahulu</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('mutasi/list_mutasi_haid/');
            }else{
                $date_graduation = [
                    "date_graduation" => $this->input->post("date_graduation")
                ];

                $this->session->set_userdata($date_graduation);
                redirect("mutasi/show_mutasi_haid/");
            }

        }

    }




    // Add Date Graduation -> baru bisa memutasi murid
    public function add_date_graduation(){
        $data['about_us'] = $this->About_model->about_all();
    
        $data['title'] = "Tambah Tahun Kelulusan";
        $data['jurusanAll'] = $this->Users_model->jurusanAll();
        
        // $data['mutasi']  = $this->Mutasi_model->getMutasi()->result_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();
        $user = $data['user'];


        $this->form_validation->set_rules("name_graduation", "", "required",[
            "required" => "Nama kelulusan harus di isi untuk melanjutkan ke tahap berikutnya"
        ]);

        $this->form_validation->set_rules("date_graduation", "", "required",[
            "required" => "Tahun kelulusan harus di isi untuk melanjutkan ke tahap berikutnya"
        ]);
        if($this->form_validation->run() == false) {
            render($this,'mutasi/add_date_graduation',$data );
        }else {
            $data = [
                "name_graduation" => htmlspecialchars($this->input->post("name_graduation", true)),
                "date_graduation" => htmlspecialchars( date("Y", strtotime($this->input->post("date_graduation", true))) ),
                "date_created" => time()
            ];


            // Mengambil data dari  tabel date graduation
            $tahun_lulus_already_exists = $this->db->get_where("date_graduation", ['date_graduation' => $data['date_graduation']])->row_array();
            
            // Mengecek apakah terjadi data yang duplikat ? 
            if($tahun_lulus_already_exists) {
                $this->session->set_flashdata("info-mutasi", '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Tahun kelulusan tidak boleh duplikat, silahkan isi dengan tahun yang benar saat ini. </strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('mutasi/add_date_graduation');

            // Jika tidak duplikat maka tambahkan ke tabel date_graduation
            }else{
                
                $this->Mutasi_model->insertDateGraduation($data);
                $this->session->set_userdata($data);
                $this->session->set_flashdata("info-mutasi", '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Tahun kelulusan berhasil ditambahkan, silahkan mutasi murid saat ini. </strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('mutasi/action_mutasi');
            }

        }

    }


    // Security Mutasi
    public function mutasi_security(){
        $data['about_us'] = $this->About_model->about_all();
                
        $data['title'] = "Security Mutasi";
        $data['jurusanAll'] = $this->Users_model->jurusanAll();
        
        // $data['mutasi']  = $this->Mutasi_model->getMutasi()->result_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();
        $user = $data['user'];

        $this->form_validation->set_rules("password", "", "required",[
            "required" => "Security Mutasi harus di isi untuk melanjutkan ke tahap berikutnya"
        ]);
        if($this->form_validation->run() == false) {
            render($this,'mutasi/mutasi_security',$data );
        }else{

            // Mengambil data user
            $user= $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();

            // Ngambil data password dari user administrator
            $password_db        = $user["password"];
            $password_post      = [
                "pw_post"   => $this->input->post("password") 
            ];

            if( password_verify($password_post['pw_post'], $password_db)  ){
                echo "<script>alert('Security Mutasi Benar, Lanjutkan');window.location='action_mutasi'</script>";
                $this->session->set_userdata($password_post);
            }else{
                $this->session->set_flashdata("info-mutasi", '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Security Mutasi salah, masukkan dengan benar. </strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('mutasi/mutasi_security');
            }

        }
    }



    // Keluar dari action mutasi 
    public function logout_mutasi(){
        $this->session->unset_userdata("pw_post");
        $this->session->set_flashdata("info-mutasi", '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Selamat, Kamu berhasil keluar dari Mutasi. </strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect("mutasi");
    }


    
    // Detail Murid
    public function option_detail_murid($nisn){
        $data['jurusanAll'] = $this->Users_model->jurusanAll();

        $data['about_us'] = $this->About_model->about_all();
        $data['title'] = "Detail Murid";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();
        if( $nisn == null ){
            redirect('dashboard');
        }
        
        $data['poin_prestasi_by_id'] = $this->Murid_model->getPoinPrestasiById($nisn)->row_array();
        $data['poin_prestasi_by_id_poin_prestasi'] = $this->Murid_model->getPoinPrestasiById($nisn)->result_array();


        // Hapus Poin
        $data['getMuridKelasJurusanByIdPoin'] = $this->Murid_model->getMuridKelasJurusanById($nisn)->result_array();
        $data['getMuridKelasJurusanByIdPoinAja'] = $this->Murid_model->getMuridKelasJurusanById($nisn)->row_array();


        $data['getMuridKelasJurusanById'] = $this->Murid_model->getMuridKelasJurusanById($nisn)->row_array();
        
        $data['getMuridKelasJurusanByIdPoin'] = $this->Murid_model->getMuridKelasJurusanById($nisn)->result_array();
        

        render($this,'mutasi/option_detail_murid', $data);
        $this->session->set_flashdata('nisn', $nisn);

    }



        // Detail Kelas X
        public function detail_kelas_x($nisn){
        $data['jurusanAll'] = $this->Users_model->jurusanAll();

        $data['about_us'] = $this->About_model->about_all();
        $data['title'] = "Detail Murid kelas X";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();
        if( $nisn == null ){
            redirect('dashboard');
        }
        
        $data['poin_prestasi_by_id'] = $this->Murid_model->getPoinPrestasiById($nisn)->row_array();
        $data['poin_prestasi_by_id_poin_prestasi'] = $this->Murid_model->getPoinPrestasiById($nisn)->result_array();


        // Hapus Poin
        $data['getMuridKelasJurusanByIdPoin'] = $this->Murid_model->getMuridKelasJurusanById($nisn)->result_array();
        $data['getMuridKelasJurusanByIdPoinAja'] = $this->Murid_model->getMuridKelasJurusanById($nisn)->row_array();


        $data['getMuridKelasJurusanById'] = $this->Murid_model->getMuridKelasJurusanById($nisn)->row_array();
        
        $data['getMuridKelasJurusanByIdPoin'] = $this->Murid_model->getMuridKelasJurusanById($nisn)->result_array();
        

        render($this,'mutasi/detail_kelas_x', $data);
        $this->session->set_flashdata('nisn', $nisn);

    }

    // Detail Kelas XI
    public function detail_kelas_xi($nisn){
        $data['jurusanAll'] = $this->Users_model->jurusanAll();

        $data['about_us'] = $this->About_model->about_all();
        $data['title'] = "Detail Murid kelas X";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();
        if( $nisn == null ){
            redirect('dashboard');
        }
        
        $data['poin_prestasi_by_id'] = $this->Murid_model->getPoinPrestasiById($nisn)->row_array();
        $data['poin_prestasi_by_id_poin_prestasi'] = $this->Murid_model->getPoinPrestasiById($nisn)->result_array();


        // Hapus Poin
        $data['getMuridKelasJurusanByIdPoin'] = $this->Murid_model->getMuridKelasJurusanById($nisn)->result_array();
        $data['getMuridKelasJurusanByIdPoinAja'] = $this->Murid_model->getMuridKelasJurusanById($nisn)->row_array();


        $data['getMuridKelasJurusanById'] = $this->Murid_model->getMuridKelasJurusanById($nisn)->row_array();
        
        $data['getMuridKelasJurusanByIdPoin'] = $this->Murid_model->getMuridKelasJurusanById($nisn)->result_array();
        

        render($this,'mutasi/detail_kelas_xi', $data);
        $this->session->set_flashdata('nisn', $nisn);
    }

    // Detail Kelas XII
    public function detail_kelas_xii($nisn){
        $data['jurusanAll'] = $this->Users_model->jurusanAll();

        $data['about_us'] = $this->About_model->about_all();
        $data['title'] = "Detail Murid kelas X";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();
        if( $nisn == null ){
            redirect('dashboard');
        }
        
        $data['poin_prestasi_by_id'] = $this->Murid_model->getPoinPrestasiById($nisn)->row_array();
        $data['poin_prestasi_by_id_poin_prestasi'] = $this->Murid_model->getPoinPrestasiById($nisn)->result_array();


        // Hapus Poin
        $data['getMuridKelasJurusanByIdPoin'] = $this->Murid_model->getMuridKelasJurusanById($nisn)->result_array();
        $data['getMuridKelasJurusanByIdPoinAja'] = $this->Murid_model->getMuridKelasJurusanById($nisn)->row_array();


        $data['getMuridKelasJurusanById'] = $this->Murid_model->getMuridKelasJurusanById($nisn)->row_array();
        
        $data['getMuridKelasJurusanByIdPoin'] = $this->Murid_model->getMuridKelasJurusanById($nisn)->result_array();
        

        render($this,'mutasi/detail_kelas_xii', $data);
        $this->session->set_flashdata('nisn', $nisn);
    }




    // Export PDF KELAS X
    public function laporan_poin_pdf_x($nisn){
        $data['jurusanAll'] = $this->Users_model->jurusanAll();
     // Setting Laporan PDF
     $data['laporan_pdf'] = $this->Setting_pdf_model->laporan_pdf();
        $data['about_us'] = $this->About_model->about_all();
        $data['title'] = "Pdf Murid";
        $this->load->library('Pdf');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();
        $data['userAll'] = $this->db->get_where('user')->result_array();
        if( !$nisn ){
            redirect('dashboard');
        }
        $data['poin_prestasi_by_id'] = $this->Murid_model->getPoinPrestasiById($nisn)->row_array();
        $data['poin_prestasi_by_id_poin_prestasi'] = $this->Murid_model->getPoinPrestasiById($nisn)->result_array();


        // Hapus Poin
        $data['getMuridKelasJurusanByIdPoin'] = $this->Murid_model->getMuridKelasJurusanById($nisn)->result_array();
        $data['getMuridKelasJurusanByIdPoinAja'] = $this->Murid_model->getMuridKelasJurusanById($nisn)->row_array();


        $data['getMuridKelasJurusanById'] = $this->Murid_model->getMuridKelasJurusanById($nisn)->row_array();
        
        $data['getMuridKelasJurusanByIdPoin'] = $this->Murid_model->getMuridKelasJurusanById($nisn)->result_array();
       
    
        $this->load->view('mutasi/laporan_poin_pdf_x', $data);
     
        $paper_size = 'A4';
        $orientation = 'Portrait';
        $html = $this->output->get_output();
        $this->pdf->set_paper($paper_size , $orientation );
    
        $this->pdf->load_html($html);
        // Output the generated PDF to Browser
        $this->pdf->render();
        $this->pdf->stream('Laporan_Poin_Pelanggaran_kelas_x_'. $data['getMuridKelasJurusanById']['nama'] .  '.pdf', Array('Attachment' => 0));
    }



    // Export PDF KELAS XI
    public function laporan_poin_pdf_xi($nisn){
        $data['jurusanAll'] = $this->Users_model->jurusanAll();
     // Setting Laporan PDF
     $data['laporan_pdf'] = $this->Setting_pdf_model->laporan_pdf();
        $data['about_us'] = $this->About_model->about_all();
        $data['title'] = "Pdf Murid";
        $this->load->library('Pdf');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();
        $data['userAll'] = $this->db->get_where('user')->result_array();
        if( !$nisn ){
            redirect('dashboard');
        }
        $data['poin_prestasi_by_id'] = $this->Murid_model->getPoinPrestasiById($nisn)->row_array();
        $data['poin_prestasi_by_id_poin_prestasi'] = $this->Murid_model->getPoinPrestasiById($nisn)->result_array();


        // Hapus Poin
        $data['getMuridKelasJurusanByIdPoin'] = $this->Murid_model->getMuridKelasJurusanById($nisn)->result_array();
        $data['getMuridKelasJurusanByIdPoinAja'] = $this->Murid_model->getMuridKelasJurusanById($nisn)->row_array();


        $data['getMuridKelasJurusanById'] = $this->Murid_model->getMuridKelasJurusanById($nisn)->row_array();
        
        $data['getMuridKelasJurusanByIdPoin'] = $this->Murid_model->getMuridKelasJurusanById($nisn)->result_array();
       
    
        $this->load->view('mutasi/laporan_poin_pdf_xi', $data);
     
        $paper_size = 'A4';
        $orientation = 'Portrait';
        $html = $this->output->get_output();
        $this->pdf->set_paper($paper_size , $orientation );
    
        $this->pdf->load_html($html);
        // Output the generated PDF to Browser
        $this->pdf->render();
        $this->pdf->stream('Laporan_Poin_Pelanggaran_kelas_xi_'. $data['getMuridKelasJurusanById']['nama'] .  '.pdf', Array('Attachment' => 0));
    }


    // Export PDF Kelas XII
    public function laporan_poin_pdf_xii($nisn){
        $data['jurusanAll'] = $this->Users_model->jurusanAll();
     // Setting Laporan PDF
     $data['laporan_pdf'] = $this->Setting_pdf_model->laporan_pdf();
        $data['about_us'] = $this->About_model->about_all();
        $data['title'] = "Pdf Murid";
        $this->load->library('Pdf');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();
        $data['userAll'] = $this->db->get_where('user')->result_array();
        if( !$nisn ){
            redirect('dashboard');
        }
        $data['poin_prestasi_by_id'] = $this->Murid_model->getPoinPrestasiById($nisn)->row_array();
        $data['poin_prestasi_by_id_poin_prestasi'] = $this->Murid_model->getPoinPrestasiById($nisn)->result_array();


        // Hapus Poin
        $data['getMuridKelasJurusanByIdPoin'] = $this->Murid_model->getMuridKelasJurusanById($nisn)->result_array();
        $data['getMuridKelasJurusanByIdPoinAja'] = $this->Murid_model->getMuridKelasJurusanById($nisn)->row_array();


        $data['getMuridKelasJurusanById'] = $this->Murid_model->getMuridKelasJurusanById($nisn)->row_array();
        
        $data['getMuridKelasJurusanByIdPoin'] = $this->Murid_model->getMuridKelasJurusanById($nisn)->result_array();
       
    
        $this->load->view('mutasi/laporan_poin_pdf_xii', $data);
     
        $paper_size = 'A4';
        $orientation = 'Portrait';
        $html = $this->output->get_output();
        $this->pdf->set_paper($paper_size , $orientation );
    
        $this->pdf->load_html($html);
        // Output the generated PDF to Browser
        $this->pdf->render();
        $this->pdf->stream('Laporan_Poin_Pelanggaran_kelas_xii_'. $data['getMuridKelasJurusanById']['nama'] .  '.pdf', Array('Attachment' => 0));
    }


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
        render($this,'mutasi/option_detail_haid', $data);
        $this->session->set_flashdata('nisn', $nisn_id);
    }

    // Haid
     // detail Kelas XI
     public function detail_haid_xi($nisn_id){
        $data['about_us'] = $this->About_model->about_all();


        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();
        
        $data['getSiswiJoin_pagi']   = $this->Haid_model->getSiswiJoinById_pagi($nisn_id)->result_array();

        $data['getSiswiJoin_siang']   = $this->Haid_model->getSiswiJoinById_siang($nisn_id)->result_array();

        $data['getSiswiById'] = $this->Haid_model->getSiswiById($nisn_id)->row_array();
        
        $data['getSiswiJoinByTanggal']   = $this->Haid_model->getSiswiJoinByTanggal($nisn_id)->result_array();
        
        $data['title'] = "Detail Haid Kelas XI";
        render($this,'mutasi/detail_haid_xi', $data);
    }

    // detail Kelas X
    public function detail_haid_x($nisn_id){
        $data['about_us'] = $this->About_model->about_all();

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();
        $data['getSiswiJoin'] = $this->Haid_model->getSiswiJoin()->result_array();
        
        $data['getSiswiJoin_pagi']   = $this->Haid_model->getSiswiJoinById_pagi($nisn_id)->result_array();

        $data['getSiswiJoin_siang']   = $this->Haid_model->getSiswiJoinById_siang($nisn_id)->result_array();

        $data['getSiswiById'] = $this->Haid_model->getSiswiById($nisn_id)->row_array();
        
        $data['getSiswiJoinByTanggal']   = $this->Haid_model->getSiswiJoinByTanggal($nisn_id)->result_array();
        
        $data['title'] = "Detail Haid Kelas X";
        render($this,'mutasi/detail_haid_x', $data);

    }


    // detail Kelas XII
    public function detail_haid_xii($nisn_id){
        $data['about_us'] = $this->About_model->about_all();


        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();
        
        $data['getSiswiJoin_pagi']   = $this->Haid_model->getSiswiJoinById_pagi($nisn_id)->result_array();

        $data['getSiswiJoin_siang']   = $this->Haid_model->getSiswiJoinById_siang($nisn_id)->result_array();

        $data['getSiswiById'] = $this->Haid_model->getSiswiById($nisn_id)->row_array();
        
        $data['getSiswiJoinByTanggal']   = $this->Haid_model->getSiswiJoinByTanggal($nisn_id)->result_array();
        
        $data['title'] = "Detail Haid Kelas XII";
        render($this,'mutasi/detail_haid_xii', $data);

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

        
        $this->load->view('mutasi/laporan_haid_pdf_x', $data);
     
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

       
       $this->load->view('mutasi/laporan_haid_pdf_xi', $data);
    
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

       
       $this->load->view('mutasi/laporan_haid_pdf_xii', $data);
    
       $paper_size = 'A4';
       $orientation = 'Portrait';
       $html = $this->output->get_output();
       $this->pdf->set_paper($paper_size , $orientation );
   
       $this->pdf->load_html($html);
       // Output the generated PDF to Browser
       $this->pdf->render();
       $this->pdf->stream('Laporan_haid_Kelas_XII' . $data['getMuridKelasJurusanById']['nama'] . '.pdf', Array('Attachment' => 0));
   }




    //    Hapus Mutasi Angkatan Tertentu
    public function hapus_daftar_mutasi(){
        $data['about_us'] = $this->About_model->about_all();
            
        $data['title'] = "List Mutasi";
        $data['jurusanAll'] = $this->Users_model->jurusanAll();
        
        // $data['mutasi']  = $this->Mutasi_model->getMutasi()->result_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();
        $user = $data['user'];

        $data['date_graduation'] = $this->db->get("date_graduation")->result_array();

        $this->form_validation->set_rules("date_graduation", "", "required");

        if( $this->form_validation->run() == false ) {
            render($this,'mutasi/hapus_daftar_mutasi', $data );
        }else {
            $date_graduation = $this->input->post("date_graduation");
            $db_date_graduation = $this->db->get_where("date_graduation", ['date_graduation' => $date_graduation])->row_array();

            
            // Cek select Option ada atau tidak di database
            if( $date_graduation ==  0 ){
                $this->session->set_flashdata("info-mutasi", '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Silahkan Pilih Data terlebih dahulu</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('mutasi/hapus_daftar_mutasi/');
            }else{
                $date_graduation = [
                    "date_graduation" => $this->input->post("date_graduation")
                ];

                $this->Mutasi_model->deleteMutasi($date_graduation);
                $this->session->set_flashdata("info-mutasi", '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Hapus Daftar Murid Mutasi Angkatan tahun ' . $date_graduation['date_graduation'] . ' berhasil</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect("mutasi" );
            }

        }

    }
}