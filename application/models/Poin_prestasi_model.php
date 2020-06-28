<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poin_prestasi_model extends CI_Model {


	public function get_poin_prestasi(){
		$this->db->select('*');
		$this->db->from('poin_prestasi');
		$this->db->join('sub_poin_prestasi', 'sub_poin_prestasi.kode_prestasi = poin_prestasi.kode');
		return $this->db->get()->result_array();
	}


	public function get_poin_jenis_prestasi(){
		return $this->db->get("poin_prestasi")->result_array();
	}

	
	public function insert_poin_prestasi($data){
		return $this->db->insert("sub_poin_prestasi", $data);
	}

	public function hapusPoin($id){
		$this->db->where('id', $id);
		return $this->db->delete('sub_poin_prestasi');
	}
		

	
}
	

