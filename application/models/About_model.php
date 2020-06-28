<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About_model extends CI_Model {

    public function about_all(){
        return $this->db->get("about")->row_array();
    }




}
