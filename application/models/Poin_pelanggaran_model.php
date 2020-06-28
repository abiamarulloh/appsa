<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poin_pelanggaran_model extends CI_Model {


	public function get_poin_pelanggaran(){
		return $this->db->get('poin')->result_array();
	}

	// fungsi menambahkan data Poin
	public function insert_poin_pelanggaran($data)
	{
		return $this->db->insert('poin', $data);
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

	public function hapusPoin($id){
		$this->db->where('id', $id);
		return $this->db->delete('poin');
	}

	

}
