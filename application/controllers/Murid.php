<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Murid extends CI_Controller {
    public function __construct(){
		parent::__construct();
        $this->load->model('Murid_model');
        $this->load->model('About_model');
        $this->load->model('Setting_pdf_model');
        $this->load->model('Users_model');

        is_logged_in();
	}

    // Murid Index
    public function index(){
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email', 'role_id') ])->row_array();

        $data['about_us'] = $this->About_model->about_all();

        
        
        $data['jurusanAll'] = $this->Murid_model->jurusanAll();
        $data['getMuridKelasJurusan'] = $this->Murid_model->getMuridKelasJurusan($data['user']);
        $data['getDataPrestasi'] = $this->Murid_model->getMuridKelasJurusanByPrestasi($data['user']);

        $data['murid_all'] = $this->Murid_model->murid_all();
        
        $data['tbl_murid_0'] = $this->db->get('tbl_murid')->num_rows();

       
        
        $this->form_validation->set_rules('nisn','','required|numeric',[
            'required' => "nis tidak boleh kosong!",
            'numeric' => "nis harus berupa angka!"
        ]);
        $this->form_validation->set_rules('nama','','required',[
            'required' => "nama tidak boleh kosong!"
        ]);
        $this->form_validation->set_rules('kelas','','required',[
            'required' => "kelas tidak boleh kosong!"
        ]);
        $this->form_validation->set_rules('jurusan','','required',[
            'required' => "jurusan tidak boleh kosong!"
        ]);

        $data['title'] = "Murid";
        if($this->form_validation->run() == false){
            render($this,'murid/index',$data );
        }else {
            $data = [
                'nisn_id'   => htmlspecialchars($this->input->post('nisn', true)),
                'nama'      => htmlspecialchars($this->input->post('nama', true)),
                'kelas'     => htmlspecialchars($this->input->post('kelas', true)),
                'jurusan'   => htmlspecialchars($this->input->post('jurusan', true)),
                'jk'        => htmlspecialchars($this->input->post('jk', true)),
                'date'      => time(),
                'date_graduation' => 0
            ];


            // JIka nisn lebih dari satu dalam tabel murid maka tolak
            $nisn = $this->db->get_where('tbl_murid', ['nisn_id' => $data['nisn_id']])->row_array();
            if($nisn > 1 ){
                $this->session->set_flashdata("flash2", '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data Murid yang ditambahkan Sudah Ada.</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('murid');
            }else{

                $this->Murid_model->insertMurid($data);
                $this->session->set_flashdata("flash2", '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data Murid <b>' . $data['nama']  . '</b> berhasil ditambahkan.</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('murid');
            }
        }  
      
    }
    


    // Murid // Beri Poin
    public function beri_poin_murid($nisn_id)
	{
        $data['about_us'] = $this->About_model->about_all();

        $data['poin'] = $this->Murid_model->getPoin();
        $data['title'] = "Beri Poin Pelanggaran";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email','role_id') ])->row_array();
        
        $data['getMuridById'] = $this->Murid_model->getMuridById($nisn_id);
        $nama = $data['getMuridById']['nama'];
        if(!$nisn_id){
            redirect('dashboard');
        }
        
        $this->form_validation->set_rules('date', '', 'required',[
            'required' => "Tidak Boleh Kosong"
        ]);

        if($this->form_validation->run() == false ){
            render($this,'murid/beri_poin_murid', $data);
        }else {
            $data = [
                'nisn_id' => $this->input->post('nisn_id'),
                'poin_id' => $this->input->post('poin'),
                'date' => $this->input->post('date'),
                'kelas' => $this->input->post('kelas')
            ];
            
            $this->Murid_model->insert_poin_murid($data);

            $this->session->set_flashdata("flash2", '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Beri Poin Pelanggaran ' . $nama   . ' berhasil ditambahkan.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('murid/beri_poin_murid/' . $nisn_id );


        }
    }  
    


    
    // Murid // Beri Poin Murid Prestasi
    public function beri_poin_prestasi_murid($nisn_id)
	{
        $data['poin_prestasi'] = $this->Murid_model->getPoinPrestasi()->result_array();
        $data['about_us'] = $this->About_model->about_all();
    

        $data['title'] = "Beri Poin Prestasi";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email','role_id') ])->row_array();
        
        $data['getMuridById'] = $this->Murid_model->getMuridById($nisn_id);
        $nama = $data['getMuridById']['nama'];
        if(!$nisn_id){
            redirect('dashboard');
        }
        
        $this->form_validation->set_rules('date', '', 'required',[
            'required' => "Tidak Boleh Kosong"
        ]);

        if($this->form_validation->run() == false ){
            render($this,'murid/beri_poin_prestasi_murid', $data);
        }else {
            $data = [
                'nisn_id' => $this->input->post('nisn_id'),
                'poin_id' => $this->input->post('poin_prestasi'),
                'date' => $this->input->post('date'),
                'kelas' => $this->input->post('kelas')
            ];
            
            $this->Murid_model->insert_poin_prestasi_murid($data);

            $this->session->set_flashdata("flash2", '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Beri Poin Prestasi ' . $nama   . ' berhasil ditambahkan.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('murid/beri_poin_prestasi_murid/' . $nisn_id );


        }
    }  



    // Option Detail Murid
    public function option_detail_murid($nisn){
        $data['title'] = "Detail Murid";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();
        if( $nisn == null ){
            redirect('dashboard');
        }

        $data['about_us'] = $this->About_model->about_all();

        
        $data['poin_prestasi_by_id'] = $this->Murid_model->getPoinPrestasiById($nisn)->row_array();
        $data['poin_prestasi_by_id_poin_prestasi'] = $this->Murid_model->getPoinPrestasiById($nisn)->result_array();


        // Hapus Poin
        $data['getMuridKelasJurusanByIdPoin'] = $this->Murid_model->getMuridKelasJurusanById($nisn)->result_array();
        $data['getMuridKelasJurusanByIdPoinAja'] = $this->Murid_model->getMuridKelasJurusanById($nisn)->row_array();


        $data['getMuridKelasJurusanById'] = $this->Murid_model->getMuridKelasJurusanById($nisn)->row_array();
        
        $data['getMuridKelasJurusanByIdPoin'] = $this->Murid_model->getMuridKelasJurusanById($nisn)->result_array();
        

        render($this,'murid/option_detail_murid', $data);
        $this->session->set_flashdata('nisn', $nisn);

    }


    
    



    // Edit Murid
    public function edit_murid($nisn_id){
        $data['about_us'] = $this->About_model->about_all();

        $data['title'] = "Edit Murid";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();
        $data['jurusanAll'] = $this->Murid_model->jurusanAll();
      
        $data['getMuridKelasJurusanById'] = $this->Murid_model->getMuridKelasJurusanById($nisn_id)->row_array();
        $nama = $data['getMuridKelasJurusanById']['nama'];
        $kelas = $data['getMuridKelasJurusanById']['kelas_murid'];
       
        $this->form_validation->set_rules('nama', '', 'required',[
            'required' => 'Nama tidak boleh kosong.'
        ]);

        if($this->form_validation->run() == false){        
            render($this,'murid/edit_murid', $data);

        }else{
            $data = [
                'nisn_id'   => htmlspecialchars($this->input->post('nisn_id', true) ),
                'nama'      => htmlspecialchars($this->input->post('nama', true)),
                'kelas'     => htmlspecialchars($this->input->post('kelas',true )),
                'jurusan'   => htmlspecialchars($this->input->post('jurusan', true)),
                'jk'        => htmlspecialchars($this->input->post('jk', true)),
                'date'      => time()
            ];

           
            $this->Murid_model->editMurid($data, $nisn_id);
            
            if($kelas == 1) { 
               $this->session->set_flashdata("flash2", '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Murid <b>' . $nama  .  '</b> berhasil diperbarui.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
                redirect('murid/detail_kelas_x/' . $nisn_id);
            }elseif($kelas == 2) { 
               $this->session->set_flashdata("flash2", '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Murid <b>' . $nama  .  '</b> berhasil diperbarui.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
                redirect('murid/detail_kelas_xi/' . $nisn_id); 
            }elseif($kelas == 3) { 
               $this->session->set_flashdata("flash2", '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Murid <b>' . $nama  .  '</b> berhasil diperbarui.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
                redirect('murid/detail_kelas_xii/' . $nisn_id); 
            }
        }
    }


    // Hapus Murid
    public function hapus_murid($nisn_id){
        $data['about_us'] = $this->About_model->about_all();

        $nama = $this->db->get_where('tbl_murid', ['nisn_id' => $nisn_id])->row_array();
        $this->Murid_model->hapusMurid($nisn_id);
        $this->session->set_flashdata("flash2", '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data Murid <b>' . $nama['nama']  .  '</b> berhasil dihapus.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('murid');
    }




    //  Poin Murid pelanggaran Hapus // button hapus
    public function hapus_poin_pelanggaran_murid($murid_poin_id){
        $data['about_us'] = $this->About_model->about_all();

        $nisn =  $this->db->get_where('tbl_murid_poin', ['id' => $murid_poin_id])->row();

        $data['getMuridKelasJurusanByIdPoinAja'] = $this->Murid_model->getMuridKelasJurusanById( $nisn->nisn_id)->row_array();
        $nama = $data['getMuridKelasJurusanByIdPoinAja']['nama'];
        $kelas = $data['getMuridKelasJurusanByIdPoinAja']['kelas_murid'];
  
        if($kelas == 1) { 
            $this->Murid_model->hapusMuridPoinId($murid_poin_id);
            $this->session->set_flashdata("flash2", '<div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Data Poin Pelanggaran ' .  $nama . '  berhasil dihapus.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('murid/detail_kelas_x/' . $nisn->nisn_id);
        }elseif($kelas == 2) { 
            $this->Murid_model->hapusMuridPoinId($murid_poin_id);
            $this->session->set_flashdata("flash2", '<div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Data Poin Pelanggaran ' .  $nama . '  berhasil dihapus.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('murid/detail_kelas_xi/' . $nisn->nisn_id); 
        }elseif($kelas == 3) { 
            $this->Murid_model->hapusMuridPoinId($murid_poin_id);
            $this->session->set_flashdata("flash2", '<div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Data Poin Pelanggaran ' .  $nama . '  berhasil dihapus.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('murid/detail_kelas_xii/' . $nisn->nisn_id); 
        }

    }

    //  Poin Murid Prestasi Hapus // button hapus
    public function hapus_poin_prestasi_murid($murid_poin_id){
        $data['about_us'] = $this->About_model->about_all();

        $nisn =  $this->db->get_where('murid_poin_prestasi', ['id' => $murid_poin_id])->row();

        $data['getMuridKelasJurusanByIdPoinAja'] = $this->Murid_model->getMuridKelasJurusanById( $nisn->nisn_id )->row_array();
        
        $nama = $data['getMuridKelasJurusanByIdPoinAja']['nama'];
        $kelas = $data['getMuridKelasJurusanByIdPoinAja']['kelas_murid'];

  

        if($kelas == 1) { 
            $this->Murid_model->hapusMuridPoinPrestasiId($murid_poin_id);
            $this->session->set_flashdata("flash2", '<div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Data Poin Prestasi ' .  $nama . '  berhasil dihapus.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('murid/detail_kelas_x/' . $nisn->nisn_id);
        }elseif($kelas == 2) { 
            $this->Murid_model->hapusMuridPoinPrestasiId($murid_poin_id);
            $this->session->set_flashdata("flash2", '<div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Data Poin Prestasi ' .  $nama . '  berhasil dihapus.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('murid/detail_kelas_xi/' . $nisn->nisn_id); 
        }elseif($kelas == 3) { 
            $this->Murid_model->hapusMuridPoinPrestasiId($murid_poin_id);
            $this->session->set_flashdata("flash2", '<div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Data Poin Prestasi ' .  $nama . '  berhasil dihapus.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('murid/detail_kelas_xii/' . $nisn->nisn_id); 
        }


        
    }


    // Detail Kelas X
    public function detail_kelas_x($nisn){
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
        
        render($this,'murid/detail_kelas_x', $data);
        $this->session->set_flashdata('nisn', $nisn);

    }

        // Detail Kelas XI
        public function detail_kelas_xi($nisn){
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
            
            render($this,'murid/detail_kelas_xi', $data);
            $this->session->set_flashdata('nisn', $nisn);
        }

        // Detail Kelas XII
        public function detail_kelas_xii($nisn){
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
    
        render($this,'murid/detail_kelas_xii', $data);
        $this->session->set_flashdata('nisn', $nisn);
    }




    // Export PDF KELAS X
    public function laporan_poin_pdf_x($nisn){
        $data['about_us'] = $this->About_model->about_all();

        // Setting Laporan PDF
        $data['laporan_pdf'] = $this->Setting_pdf_model->laporan_pdf();
        $data['jurusanAll'] = $this->Users_model->jurusanAll();

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
    

        $this->load->view('murid/laporan_poin_pdf_x', $data);
    
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
        $data['about_us'] = $this->About_model->about_all();
        // Setting Laporan PDF
        $data['laporan_pdf'] = $this->Setting_pdf_model->laporan_pdf();
        $data['jurusanAll'] = $this->Users_model->jurusanAll();

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
    

        $this->load->view('murid/laporan_poin_pdf_xi', $data);
    
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
        $data['about_us'] = $this->About_model->about_all();
        $data['jurusanAll'] = $this->Users_model->jurusanAll();

        // Setting Laporan PDF
        $data['laporan_pdf'] = $this->Setting_pdf_model->laporan_pdf();

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
    

        $this->load->view('murid/laporan_poin_pdf_xii', $data);
    
        $paper_size = 'A4';
        $orientation = 'Portrait';
        $html = $this->output->get_output();
        $this->pdf->set_paper($paper_size , $orientation );

        $this->pdf->load_html($html);
        // Output the generated PDF to Browser
        $this->pdf->render();
        $this->pdf->stream('Laporan_Poin_Pelanggaran_kelas_xii_'. $data['getMuridKelasJurusanById']['nama'] .  '.pdf', Array('Attachment' => 0));
    }



      // Hal yang harus dilakukan
    //   public function update_kelas(){
    //     // query tbl_murid tampilkan
    //     $murid_kelas = $this->db->get("tbl_murid")->result_array();

    //     // Query tbl_murid masukkan kelas tbl_murid ke dalam kelas tbl_murid_poin
    //     foreach($murid_kelas as $kelas){
    //         $data =  [
    //             "kelas" => $kelas['kelas']
    //         ];

    //         $this->db->where("nisn_id", $kelas['nisn_id']);
    //         $this->db->update("tbl_murid_poin", $data);
         
    //     }
    // }
       


}