<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pantau_poin_model extends CI_Model {

	public function insertUser($data)
	{
		return $this->db->insert('user', $data);
	}

	// detail 
	public function getMuridKelasJurusanById($keyword){
		$this->db->select('*, tbl_murid.nisn_id as nisn_id, tbl_murid_poin.id as murid_poin_id ,tbl_murid_poin.nisn_id as jumlah_pelanggaran, poin.poin as jumlah_poin');
		$this->db->from('tbl_murid');
		$this->db->join('tbl_murid_poin', 'tbl_murid_poin.nisn_id = tbl_murid.nisn_id', 'left');
		$this->db->join('poin', 'tbl_murid_poin.poin_id = poin.id', 'left');

		$this->db->where('tbl_murid.nisn_id', $keyword);

		return $this->db->get();
	}


	// Poin Prestasi Join
	public function getPoinPrestasiById($nisn){
		$this->db->select('*, tbl_murid.nisn_id as nisn_id, 
							murid_poin_prestasi.id as murid_poin_prestasi_id ,murid_poin_prestasi.nisn_id as jumlah_prestasi, 
							sub_poin_prestasi.poin as jumlah_poin_prestasi, 
							murid_poin_prestasi.id as murid_poin_prestasi_id'
							
		);
		$this->db->from('tbl_murid');
		$this->db->join('murid_poin_prestasi', 'murid_poin_prestasi.nisn_id = tbl_murid.nisn_id','left');
		$this->db->join('sub_poin_prestasi', 'murid_poin_prestasi.poin_id = sub_poin_prestasi.id', 'left');
		$this->db->join('poin_prestasi', 'sub_poin_prestasi.kode_prestasi = poin_prestasi.kode', 'left');

		$this->db->where('tbl_murid.nisn_id', $nisn);
		return $this->db->get();
	}


}
