<?php 


class M_varkquiz extends CI_Model{
	public function get_data($table){
		
    	return $this->db->get($table);

  		
	}


  public function get_id_siswa($kondisi){
    
      return $this->db->query("SELECT id_siswa FROM siswa WHERE `username` = '$kondisi'");

      
  }

  public function input_data($data, $table){
     $this->db->insert($table,$data);
  }

   public function status_vark($id, $table){
    $result = $this->db
                     ->where('id_siswa', $id)
                     
                     ->limit(1)
                     ->get($table);

     if($result->num_rows() > 0){
 
    return TRUE;
  }else{
   
    return FALSE;
  }
  }
	

  public function get_count($table){
    $this->db->from($table);
 
    return $num_rows = $this->db->count_all_results();
  }

   public function update_data($data, $table, $where){
        $this->db->where($where);
        $this->db->update($table, $data);
    }

}