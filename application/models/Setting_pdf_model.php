<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_pdf_model extends CI_Model {

    public function role_admin(){
        $this->db->where("role_id", 1);
        return $this->db->get("user")->result_array();
    }


    public function role_admin_role(){
        $this->db->where_not_in("role_id", 1);
        return $this->db->get("role")->result_array();
    }

    public function updateLaporanPdf($data){
        $this->db->update("laporan_pdf", $data);
    }


    public function laporan_pdf(){
        $this->db->select('*');
        $this->db->from('laporan_pdf');
        $this->db->join('user', 'user.description = laporan_pdf.input_left', 'left');
        return $this->db->get()->row_array();
    }

}
