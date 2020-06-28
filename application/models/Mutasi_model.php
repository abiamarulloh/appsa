<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mutasi_model extends CI_Model {


    public function getMuridKelasJurusan($data){
		$kelas = $data['kelas_id'];
		$jurusan = $data['jurusan_id'];

		if( $kelas == 0 && $jurusan == 0 ){
			
			$this->db->select('*, tbl_murid.nisn_id as nisn_id ,count(tbl_murid_poin.nisn_id) as jumlah_pelanggaran, sum(poin.poin) as jumlah_poin , tbl_murid.kelas as kelas_murid');
			$this->db->from('tbl_murid');
			$this->db->join('tbl_murid_poin', 'tbl_murid_poin.nisn_id = tbl_murid.nisn_id','left');
			$this->db->join('poin', 'poin.id = tbl_murid_poin.poin_id','left');
								
			$this->db->group_by('tbl_murid.nisn_id');
			return $this->db->get()->result_array();
		
		}else{
			$this->db->select('*, tbl_murid.nisn_id as nisn_id ,count(tbl_murid_poin.nisn_id) as jumlah_pelanggaran, sum(poin.poin) as jumlah_poin, tbl_murid.kelas as kelas_murid');
			$this->db->from('tbl_murid');
			$this->db->join('tbl_murid_poin', 'tbl_murid_poin.nisn_id = tbl_murid.nisn_id', 'left');
			$this->db->join('poin', 'tbl_murid_poin.poin_id = poin.id', 'left');
		
			$this->db->group_by('tbl_murid.nisn_id');

			$this->db->where('kelas', $kelas);
			$this->db->where('jurusan', $jurusan);
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
		
			$this->db->group_by('tbl_murid.nisn_id');

			$this->db->where('kelas', $kelas);
			$this->db->where('jurusan', $jurusan);
			return $this->db->get()->result_array();
		}
	}


    public function jurusanAll() {
		return $this->db->get("jurusan")->result_array();
	}




	// Mutasi Murid kelas 
	/**
	 * mutasi kelas x => xi
	 * mutasi kelas xi => xii
	 * mutaso kelas xii => lulus
	 */
	// Mutasi Now
	public function mutasiNow($nisnCheckItem , $date_graduation) {	
		// Mengeluarkan NISN ARRAY dengan cara di Foreach 
		foreach($nisnCheckItem as $nCI){
			// Hasil Foreach yang akan digunakan untuk naik kelas 
			$query_murid = $this->db->get_where("tbl_murid", ['nisn_id' => $nCI])->row_array();
			

			// Jika murid kelas 3 maka kelas ditambah 1
			if($query_murid["kelas"] == 3){
				$kelas = $query_murid['kelas'] + 1 ;
				$data = [
						"kelas" 			=> $kelas,
						"date_graduation"	=> $date_graduation
					];
				
				// Mengacu pada nisn
				$this->db->where("nisn_id", $query_murid['nisn_id'] );

				// Update kelas
				$this->db->update("tbl_murid", $data );

			// Jika murid kelas 2 maka kelas ditambah 1
			}elseif( $query_murid["kelas"] == 2 ){
				$kelas = $query_murid['kelas'] + 1 ;
				$data = [
						"kelas" => $kelas 
					];
				
				// Mengacu pada nisn
				$this->db->where("nisn_id", $query_murid['nisn_id'] );

				// Update kelas
				$this->db->update("tbl_murid", $data );


			// Jika murid kelas 1 maka kelas ditambah 1
			}elseif( $query_murid["kelas"] == 1 ){

				$kelas = $query_murid['kelas'] + 1 ;
				$data = [
						"kelas" => $kelas 
					];
				
				// Mengacu pada nisn
				$this->db->where("nisn_id", $query_murid['nisn_id'] );

				// Update kelas
				$this->db->update("tbl_murid", $data );

			}
				
			
		}

	}





	// Insert Date Graduation
	public function insertDateGraduation($data){
		return $this->db->insert("date_graduation", $data);
	}



	public function getSiswiJoin($date){
		$this->db->select('* , max(haid.tanggal) as tanggal, count(haid.tanggal) as tanggalCount, tbl_murid.kelas as kelas_murid');
		$this->db->from('tbl_murid');
		$this->db->join('haid', 'haid.nisn_tbl_murid = tbl_murid.nisn_id','left');
		$this->db->where('jk', 0);
		$this->db->where('date_graduation', $date);

		$this->db->group_by('tbl_murid.nisn_id');
		
		return $this->db->get();
	}


	public function deleteMutasi($date_graduation){
		$this->db->where('date_graduation' , $date_graduation['date_graduation']);
		return $this->db->delete(['tbl_murid', 'date_graduation']);
	}

}
