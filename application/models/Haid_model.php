<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Haid_model extends CI_Model {

	
	// detail 
	public function getMuridKelasJurusanById($nisn_id){
		$this->db->select('*, tbl_murid.nisn_id as nisn_id, tbl_murid_poin.id as murid_poin_id ,tbl_murid_poin.nisn_id as jumlah_pelanggaran, poin.poin as jumlah_poin');
		$this->db->from('tbl_murid');
		$this->db->join('tbl_murid_poin', 'tbl_murid_poin.nisn_id = tbl_murid.nisn_id', 'left');
		$this->db->join('poin', 'tbl_murid_poin.poin_id = poin.id', 'left');

		$this->db->where('tbl_murid.nisn_id', $nisn_id);
		return $this->db->get();
	}



	public function getSiswiJoin(){
		$this->db->select('* , max(haid.tanggal) as tanggal, count(haid.tanggal) as tanggalCount, tbl_murid.kelas as kelas_murid');
		$this->db->from('tbl_murid');
		$this->db->join('haid', 'haid.nisn_tbl_murid = tbl_murid.nisn_id','left');
		$this->db->where('jk', 0);
		$this->db->group_by('tbl_murid.nisn_id');
		$this->db->where_not_in('tbl_murid.kelas', 4);

		return $this->db->get();
	}

	public function getMuridById($nisn_id){
		return $this->db->get_where('tbl_murid', ['nisn_id' => $nisn_id])->row_array();
	}

	public function getSiswiJoinByTanggal(){
		$this->db->select('* , max(haid.tanggal) as tanggal, count(haid.tanggal) as tanggalCount');
		$this->db->from('tbl_murid');
		$this->db->join('haid', 'haid.nisn_tbl_murid = tbl_murid.nisn_id','left');
		$this->db->where('jk', 0);
		$this->db->group_by('haid.tanggal');

		return $this->db->get();
	}
	

	public function getSiswiJoinById_pagi($nisn_id){
		$this->db->select('* , haid.kelas as kelasHaid, tbl_murid.kelas as kelasMurid');
		$this->db->from('tbl_murid');
		$this->db->join('haid', 'haid.nisn_tbl_murid = tbl_murid.nisn_id','left');
		$this->db->where('jk', 0);
		$this->db->where('haid.nisn_tbl_murid', $nisn_id);
		$this->db->where('waktu', 1);

		return $this->db->get();
	}

	public function getSiswiJoinById_siang($nisn_id){
		$this->db->select('*, haid.kelas as kelasHaid, tbl_murid.kelas as kelasMurid');
		$this->db->from('tbl_murid');
		$this->db->join('haid', 'haid.nisn_tbl_murid = tbl_murid.nisn_id','left');
		$this->db->where('jk', 0);
		$this->db->where('haid.nisn_tbl_murid', $nisn_id);
		$this->db->where('waktu', 0);

		return $this->db->get();
	}


	public function getSiswiById($nisn_id){
		$this->db->select('*, haid.kelas as kelasHaid, tbl_murid.kelas as kelasMurid');
		$this->db->from('tbl_murid');
		$this->db->join('haid', 'haid.nisn_tbl_murid = tbl_murid.nisn_id','left');
		$this->db->where('nisn_id', $nisn_id);
		$this->db->where('jk' , 0);
		return $this->db->get();
	}

	
	public function insertHaid($data){
		return $this->db->insert('haid', $data);
	}

	
	// hal yang harus dilakukan saat setup untuk abi
	public function updateHaid($data,$nisn_id){
		$this->db->where('nisn_tbl_murid',$nisn_id);
		return $this->db->update('haid', $data);
	}

	public function hapusHaid($id){
		$this->db->where('id', $id);
		return $this->db->delete('haid');
	}




	


}
