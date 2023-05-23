<?php 

class M_manajemen_guru extends CI_Model{


	public function get_data($table, $id=false){
		
		if (!empty($id)) {
			$this->db->where('id_guru', $id);
    		return $this->db->get($table);
		}else{
    	return $this->db->get($table);
    	}
  		
	}

	public function input_data($data, $table){
		 $this->db->insert($table,$data);
	}



	public function update_status($id, $table, $status){
		
		
		$query = $this->db->query("UPDATE $table SET status='$status' WHERE id_guru='$id'");
		return $query;

	;
     
    }

	 public function update_data($data, $table, $where){
        $this->db->where($where);
        $this->db->update($table, $data);
    }

   


	public function delete_data($kondisi){
    	$this->db->where($kondisi);
      	$this->db->delete('guru');
    }


	




}