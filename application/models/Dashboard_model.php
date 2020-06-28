<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

public function getUsers(){
    return $this->db->get("user")->num_rows();
}

public function getMuridAll(){
    $this->db->where_not_in("tbl_murid.kelas", 4);
    return $this->db->get("tbl_murid")->num_rows();
}

public function getMuridMale(){
    $this->db->where_not_in("tbl_murid.kelas", 4);
    return $this->db->get_where("tbl_murid", ["jk" => 1])->num_rows();
}

public function getMuridFemale(){
    $this->db->where_not_in("tbl_murid.kelas", 4);
    return $this->db->get_where("tbl_murid", ["jk" => 0])->num_rows();
}

public function getAlumnidAll(){
    $this->db->where("tbl_murid.kelas", 4);
    return $this->db->get("tbl_murid")->num_rows();
}

public function getAlumniMale(){
    $this->db->where("tbl_murid.kelas", 4);
    return $this->db->get_where("tbl_murid", ["jk" => 1])->num_rows();
}

public function getAlumniFemale(){
    $this->db->where("tbl_murid.kelas", 4);
    return $this->db->get_where("tbl_murid", ["jk" => 0])->num_rows();
}

}
