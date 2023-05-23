<?php 


class M_ulangan extends CI_Model{
	public function get_data($table, $id=false, $field=false){
		
		if (!empty($id)){
			$this->db->where($field, $id);
    		return $this->db->get($table);
		}else{
    		return $this->db->get($table);
    	}
  		
	}

	public function input_data($data, $table, $field_id=false){

		 $this->db->insert($table,$data);

		  $this->db->query('SET @num = 0');
		  $this->db->query('UPDATE '. $table .' SET ' . $field_id .  ' = @num := (@num+1)');
		  $this->db->query('ALTER TABLE ' . $table . ' AUTO_INCREMENT =1');
	}	

	 public function update_data($data, $table, $where){
        $this->db->where($where);
        $this->db->update($table, $data);
    }

     public function delete_data($kondisi, $table){
    	$this->db->where($kondisi);
      	$this->db->delete($table);
    }

      public function get_data_s($id_ulangan){
    

    $query = $this->db->query("SELECT * FROM siswa LEFT JOIN hasil_ulangan ON hasil_ulangan.id_siswa = siswa.id_siswa WHERE hasil_ulangan.id_siswa is not null AND id_ulangan = '$id_ulangan'");
     
    
    return $query;
      
  }

  public function get_data_b($kelas){
    

    $query = $this->db->query("SELECT * FROM siswa LEFT JOIN hasil_ulangan ON hasil_ulangan.id_siswa = siswa.id_siswa WHERE hasil_ulangan.id_siswa is null AND siswa.id_kelas = '$kelas'");
     
    
    return $query;
      
  }


 


}