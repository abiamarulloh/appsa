<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan_model extends CI_Model {


	public function insert_jurusan($data)
	{
		return $this->db->insert('jurusan', $data);
	}

	public function jurusanAll() {
		return $this->db->get("jurusan")->result_array();
	}

	public function edit_jurusan($data, $id) {
		$this->db->where('id' , $id);
		return $this->db->update("jurusan", $data);
	}



	public function hapus_jurusan($id){
		$this->db->where('id', $id);
		return $this->db->delete('jurusan');
	}


}
