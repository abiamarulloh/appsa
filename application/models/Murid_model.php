<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Murid_model extends CI_Model {

	public function insertMurid($data)
	{
		return $this->db->insert('tbl_murid', $data);
	}

	public function murid_all(){
				$this->db->where_not_in('tbl_murid.kelas', 4);
		return $this->db->get("tbl_murid")->result_array();
	}



	public function getPoin(){
		return $this->db->get('poin')->result_array();
	}


	public function insert_poin_murid($data){
		return $this->db->insert('tbl_murid_poin', $data);
	}
	

	public function getMuridKelasJurusan($data){
		$kelas = $data['kelas_id'];
		$jurusan = $data['jurusan_id'];
		
		// Jika admin
		if( $kelas == 0 && $jurusan == 0 ){
			$this->db->select('*, tbl_murid.nisn_id as nisn_id, count(tbl_murid_poin.kelas) as jumlah_pelanggaran , sum(poin.poin) as jumlah_poin, tbl_murid.kelas as kelas_murid , max(tbl_murid_poin.kelas) as kelas_poin');
			$this->db->from('tbl_murid');
			$this->db->join('tbl_murid_poin', 'tbl_murid_poin.nisn_id = tbl_murid.nisn_id','left');

			$this->db->join('poin', 'poin.id = tbl_murid_poin.poin_id','left');
			
			// Jika sudah lulus tidak ditampilkan di tabel murid
			$this->db->where_not_in('tbl_murid.kelas', 4);
			$this->db->group_by('tbl_murid.nisn_id');
			return $this->db->get()->result_array();
		
		// Jika User Biasa
		}else{
			$this->db->select('*, tbl_murid.nisn_id as nisn_id ,count(tbl_murid_poin.nisn_id) as jumlah_pelanggaran, sum(poin.poin) as jumlah_poin, tbl_murid.kelas as kelas_murid,tbl_murid_poin.kelas as kelas_poin');
			$this->db->from('tbl_murid');
			$this->db->join('tbl_murid_poin', 'tbl_murid_poin.nisn_id = tbl_murid.nisn_id', 'left');
			$this->db->join('poin', 'tbl_murid_poin.poin_id = poin.id', 'left');
		
			
			$this->db->where('tbl_murid.kelas', $kelas);
			$this->db->where('jurusan', $jurusan);
			

			$this->db->where_not_in('tbl_murid.kelas', 4);
			
			$this->db->group_by('tbl_murid.nisn_id');

			return $this->db->get()->result_array();
		}
	}


	
	public function getMuridKelasJurusanByPrestasi($data){
		$kelas = $data['kelas_id'];
		$jurusan = $data['jurusan_id'];

		if( $kelas == 0 && $jurusan == 0 ){
			
			$this->db->select('*, tbl_murid.nisn_id as nisn_id , count(murid_poin_prestasi.nisn_id) as jumlah_prestasi, sum(sub_poin_prestasi.poin) as jumlah_poin_prestasi');
			$this->db->from('tbl_murid');
			$this->db->join('murid_poin_prestasi', 'murid_poin_prestasi.nisn_id = tbl_murid.nisn_id','left');
			$this->db->join('sub_poin_prestasi', 'sub_poin_prestasi.id = murid_poin_prestasi.poin_id','left');
			
			$this->db->group_by('tbl_murid.nisn_id');
			return $this->db->get()->result_array();
		
		}else{
			$this->db->select('*, tbl_murid.nisn_id as nisn_id , count(murid_poin_prestasi.nisn_id) as jumlah_prestasi, sum(sub_poin_prestasi.poin) as jumlah_poin_prestasi');
			$this->db->from('tbl_murid');
			$this->db->join('murid_poin_prestasi', 'murid_poin_prestasi.nisn_id = tbl_murid.nisn_id','left');
			$this->db->join('sub_poin_prestasi', 'sub_poin_prestasi.id = murid_poin_prestasi.poin_id','left');
		

			$this->db->where('tbl_murid.kelas', $kelas);
			$this->db->where('jurusan', $jurusan);

		
			$this->db->group_by('tbl_murid.nisn_id');

			return $this->db->get()->result_array();
		}
	}


	public function getMuridKelasJurusanHapusPoin($nisn_id){
		$this->db->select('*, tbl_murid.nisn_id as nisn_id ,count(tbl_murid_poin.nisn_id) as jumlah_pelanggaran, sum(poin.poin) as jumlah_poin');
		$this->db->from('tbl_murid');
		$this->db->join('tbl_murid_poin', 'tbl_murid_poin.nisn_id = tbl_murid.nisn_id','left');
		$this->db->join('poin', 'tbl_murid_poin.poin_id = poin.id', 'left');
		$this->db->group_by('tbl_murid.nisn_id');

		$this->db->where('tbl_murid.nisn_id', $nisn_id);
		return $this->db->get()->result_array();
	
	}


	// detail 
	public function getMuridKelasJurusanById($nisn){
		$this->db->select('*, tbl_murid.nisn_id as nisn_id, tbl_murid_poin.id as murid_poin_id ,tbl_murid_poin.nisn_id as jumlah_pelanggaran, poin.poin as jumlah_poin, tbl_murid.kelas as kelas_murid, tbl_murid_poin.kelas as kelas_poin');
		$this->db->from('tbl_murid');
		$this->db->join('tbl_murid_poin', 'tbl_murid_poin.nisn_id = tbl_murid.nisn_id', 'left');
		$this->db->join('poin', 'tbl_murid_poin.poin_id = poin.id', 'left');

		$this->db->where('tbl_murid.nisn_id', $nisn);

		return $this->db->get();
	}

	// Poin Prestasi Join
	public function getPoinPrestasiById($nisn){
		$this->db->select('*, tbl_murid.nisn_id as nisn_id, 
							murid_poin_prestasi.id as murid_poin_prestasi_id ,murid_poin_prestasi.nisn_id as jumlah_prestasi, 
							sub_poin_prestasi.poin as jumlah_poin_prestasi, 
							murid_poin_prestasi.id as murid_poin_prestasi_id, tbl_murid.kelas as kelas_murid, murid_poin_prestasi.kelas as kelas_prestasi'
							
		);
		$this->db->from('tbl_murid');
		$this->db->join('murid_poin_prestasi', 'murid_poin_prestasi.nisn_id = tbl_murid.nisn_id','left');
		$this->db->join('sub_poin_prestasi', 'murid_poin_prestasi.poin_id = sub_poin_prestasi.id', 'left');
		$this->db->join('poin_prestasi', 'sub_poin_prestasi.kode_prestasi = poin_prestasi.kode', 'left');

		$this->db->where('tbl_murid.nisn_id', $nisn);
		return $this->db->get();
	}


	public function editMurid($data, $nisn_id){
				$this->db->where('nisn_id', $nisn_id);
		return  $this->db->update('tbl_murid', $data);

	}

	public function hapusMurid($nisn_id){
		$this->db->where('nisn_id', $nisn_id);
		return $this->db->delete('tbl_murid');
	}

	// Hapus Poin Pelanggaran Berdasarkan Id
	public function hapusMuridPoinId($murid_poin_id){
		$this->db->where('id', $murid_poin_id);
		return $this->db->delete('tbl_murid_poin');
	}

	// Hapus Poin Prestasi Berdasarkan Id
	public function hapusMuridPoinPrestasiId($murid_poin_id){
		$this->db->where('id', $murid_poin_id);
		return $this->db->delete('murid_poin_prestasi');
	}
	
	public function getMuridById($nisn_id){
		return $this->db->get_where('tbl_murid', ['nisn_id' => $nisn_id])->row_array();
	}


	
	public function jurusanAll() {
		return $this->db->get("jurusan")->result_array();
	}


	// Poin Prestasi 
	public function getPoinPrestasi(){
		$this->db->select('*, sub_poin_prestasi.id as poin_id');
		$this->db->from('poin_prestasi');
		$this->db->join('sub_poin_prestasi', 'poin_prestasi.kode = sub_poin_prestasi.kode_prestasi');
		return $this->db->get();
	}


	
	// Menambahkan Poin Prestasi pada salah satu Murid
	public function insert_poin_prestasi_murid($data){
		return $this->db->insert('murid_poin_prestasi', $data);
	}


	public function getPoinPelanggaran($nisn, $kelas_murid) {
		$this->db->where("tbl_murid_poin.kelas", $kelas_murid);
		$this->db->where('nisn_id' , $nisn);
		$this->db->group_by("tbl_murid_poin.kelas");
		return $this->db->get("tbl_murid_poin");
	}


}