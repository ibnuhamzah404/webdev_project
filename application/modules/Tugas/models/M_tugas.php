<?php 


class M_tugas extends CI_Model{
	public function get_data($table, $id=false, $field=false){
		
		if (!empty($id)){
			$this->db->where($field, $id);
    		return $this->db->get($table);
		}else{
    		return $this->db->get($table);
    	}
  		
	}

	public function get_data_bm($kelas){
		

		$query = $this->db->query("SELECT * FROM siswa LEFT JOIN hasil_tugas ON hasil_tugas.id_siswa = siswa.id_siswa WHERE siswa.id_kelas = '$kelas' AND hasil_tugas.id_siswa is NULL OR siswa.id_siswa is NULL");
		
		// $query = $this->db->query("SELECT siswa.username, siswa.id_kelas, hasil_tugas.status FROM hasil_tugas JOIN siswa ON hasil_tugas.id_siswa =siswa.id_siswa WHERE hasil_tugas.status = '$status' AND siswa.id_kelas = '$kelas'  AND  hasil_tugas.id_tugas='$id_tugas'");
		
		return $query;
  		
	}

	public function get_data_w($kelas, $id_tugas){
		

		$query = $this->db->query("SELECT siswa.nama, hasil_tugas.id_tugas, hasil_tugas.id_siswa, siswa.username, siswa.id_kelas FROM siswa INNER JOIN hasil_tugas ON siswa.id_siswa = hasil_tugas.id_siswa WHERE siswa.id_kelas = '$kelas' AND id_tugas = '$id_tugas' AND status_pengumpulan = 'Y'");
		
		// $query = $this->db->query("SELECT siswa.username, siswa.id_kelas, hasil_tugas.status FROM hasil_tugas JOIN siswa ON hasil_tugas.id_siswa =siswa.id_siswa WHERE hasil_tugas.status = '$status' AND siswa.id_kelas = '$kelas'  AND  hasil_tugas.id_tugas='$id_tugas'");

		// SELECT * FROM siswa LEFT JOIN hasil_ulangan ON hasil_ulangan.id_siswa = siswa.id_siswa WHERE hasil_ulangan.id_siswa is not null
		
		return $query;
  		
	}

	public function input_data($data, $table){
		 $this->db->insert($table,$data);
	}

	 public function update_data($data, $table, $where){
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function delete_data($kondisi, $table){
    	$this->db->where($kondisi);
      	$this->db->delete($table);
    }

    public function download_tugas($id_siswa, $id_tugas){

     $query= $this->db->get_where('hasil_tugas', array('id_tugas'=>$id_tugas, 'id_siswa' => $id_siswa, 'status_pengumpulan' => 'Y'));
     return $query->row_array();
	  }

	   public function get_id_guru($kondisi){
    
      return $this->db->query("SELECT id_guru FROM guru WHERE `username` = '$kondisi'");

      
  }

   public function get_kelas($username){

      return $this->db->query("SELECT `nama_kelas` FROM kelas WHERE wali_kelas ='$username'");
   
  }

  public function update_nilai($nilai, $id_siswa, $id_tugas){
    
      return $this->db->query("UPDATE hasil_tugas SET `nilai` = '$nilai', `status_penilaian` = 'Y' WHERE `id_tugas` = '$id_tugas' AND `id_siswa` = $id_siswa");

      
  }


}