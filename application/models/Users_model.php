<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

	public function jurusanAll() {
		return $this->db->get("jurusan")->result_array();
	}
	

	public function getMuridKelasJurusan($data){
		$kelas = $data['kelas_id'];
		$jurusan = $data['jurusan_id'];
		$keywoard = $this->input->post('cariMurid');
		
		if($kelas == 9 && $jurusan == 9 || $kelas == 10 && $jurusan == 10 ){
			
			$this->db->select('*, tbl_murid.nisn_id as nisn_id ,count(tbl_murid_poin.nisn_id) as jumlah_pelanggaran, sum(poin.poin) as jumlah_poin');
			$this->db->from('tbl_murid');
			$this->db->join('tbl_murid_poin', 'tbl_murid_poin.nisn_id = tbl_murid.nisn_id','left');
			$this->db->join('poin', 'tbl_murid_poin.poin_id = poin.id', 'left');
			$this->db->group_by('tbl_murid.nisn_id');
			$this->db->like('nama', $keywoard);
			return $this->db->get()->result_array();
		}else{
			$this->db->select('*, tbl_murid.nisn_id as nisn_id, count(tbl_murid_poin.nisn_id) as jumlah_pelanggaran, sum(poin.poin) as jumlah_poin');
			$this->db->from('tbl_murid');
			$this->db->join('tbl_murid_poin', 'tbl_murid_poin.nisn_id = tbl_murid.nisn_id', 'left');
			$this->db->join('poin', 'tbl_murid_poin.poin_id = poin.id', 'left');
			$this->db->group_by('tbl_murid.nisn_id');

			$this->db->where('kelas', $kelas);
			$this->db->where('jurusan', $jurusan);
			return $this->db->get()->result_array();
		}
	}



	// Tambah Users
	public function insertUsers($data){
		return $this->db->insert('user', $data);
	}

	// Tampilkan Data Users
	public function getUsers(){
		return $this->db->get('user');
	}


	public function hapusUsers($id){
		$this->db->where('id', $id);
		return $this->db->delete('user');
	}

	
	public function getUsersById($id){
		return $this->db->get_where('user', ['id' => $id]);
	}

	public function updateUsers($id, $data){
		$this->db->where('id', $id);
		return $this->db->update('user', $data);
	}

	public function updateKelasJurusanUser($id, $data){
		$this->db->where('id', $id);
		return $this->db->update('user', $data);
	}

	
	public function updatePasswordUsers($id, $data){
		$this->db->where('id', $id);
		return $this->db->update('user', $data);
	}


}
